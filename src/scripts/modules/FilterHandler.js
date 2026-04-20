/**
 * Posts Filter Module
 * Handles form filtering with debounce and AJAX requests
 */

class PostsFilter {
  constructor(formSelector) {
    this.form = document.querySelector(formSelector);
    if (!this.form) return;

    this.container = document.querySelector(".publications");
    this.loader = document.querySelector(".loader");
    this.postType = this.form.dataset.postType;
    this.projectPostType = this.form.dataset.projectPostType || "projects";
    this.insightPostType = this.form.dataset.insightPostType || "insight";
    this.initialInsightTermId =
      this.form.dataset.initialCurrentInsightTermId || "";
    this.initialInsightTaxonomy =
      this.form.dataset.initialCurrentInsightTaxonomy || "";
    this.searchResultsTitle = document.querySelector(
      ".js-search-results-title",
    );
    this.filterFormWrapper = document.querySelector(".block-filter-form");
    this.btnOpen = document.querySelector(".filter-button--open");
    this.btnClose = document.querySelector(".filter-button--close");

    this.excludedIds = [];
    this.currentPage = 1;
    this.hasMore = true;
    this.isLoading = false;
    this.filterTimeout = null;
    this.hasFilters = false;
    this.totalResults = 0;
    this.searchQuery = "";
    this.choicesInstances = [];
    this.pendingReload = false;

    this.init();
  }

  init() {
    // Initialize Choices.js for selects
    this.initializeChoices();

    // Initialize filter open/close buttons
    this.initializeFilterButtons();

    // Listen to all form inputs
    const inputs = this.form.querySelectorAll("input, select");
    inputs.forEach((input) => {
      if (input.classList.contains("filter-toggle__input")) {
        return;
      }

      // Use 'input' for text fields, 'change' for selects
      if (input.tagName === "SELECT") {
        input.addEventListener("change", () => this.handleFilterChange());
      } else {
        input.addEventListener("input", () => this.handleFilterChange());
      }
    });

    document.addEventListener("filterPostTypeChange", (event) => {
      const nextPostType = event.detail?.postType || "";

      if (!nextPostType || nextPostType === this.postType) {
        return;
      }

      this.switchPostType(nextPostType);
    });

    this.hasFilters = this.checkIfFiltersActive();

    // Load initial posts (title will be updated in handleSuccess)
    this.loadPosts(true);
  }

  getFilterSelects() {
    return this.form.querySelectorAll(".filter-select");
  }

  getCurrentInsightContext() {
    const termId = this.form.dataset.currentInsightTermId;
    const taxonomy = this.form.dataset.currentInsightTaxonomy;

    if (!termId || taxonomy !== "insights_categories") {
      return null;
    }

    return {
      termId,
      taxonomy,
    };
  }

  /**
   * Initialize Choices.js for all select elements
   */
  initializeChoices() {
    if (typeof Choices === "undefined") {
      console.warn("Choices.js is not loaded");
      return;
    }

    // Initialize regular selects
    const regularSelects = this.form.querySelectorAll(".regular-select");
    regularSelects.forEach((selectElement) => {
      const choicesInstance = new Choices(selectElement, {
        removeItemButton: true,
        placeholder: true,
        maxItemCount: 5,
        itemSelectText: "",
        searchEnabled: false,
      });
      this.choicesInstances.push(choicesInstance);
    });

    // Initialize clearable selects
    const filterSort = this.form.querySelectorAll(".regular-select-clearable");
    filterSort.forEach((selectElement) => {
      const choicesInstance = new Choices(selectElement, {
        removeItemButton: true,
        shouldSort: false,
        placeholder: true,
        placeholderValue: null,
        searchPlaceholderValue: null,
        maxItemCount: 5,
        itemSelectText: "",
        searchEnabled: false,
        allowHTML: true,
      });
      this.choicesInstances.push(choicesInstance);
    });
  }

  /**
   * Initialize filter open/close buttons
   */
  initializeFilterButtons() {
    if (this.btnOpen && this.filterFormWrapper) {
      this.btnOpen.addEventListener("click", (e) => {
        e.preventDefault();
        this.filterFormWrapper.classList.add("is-open");
      });
    }

    if (this.btnClose && this.filterFormWrapper) {
      this.btnClose.addEventListener("click", (e) => {
        e.preventDefault();
        this.filterFormWrapper.classList.remove("is-open");
      });
    }
  }

  /**
   * Update search results title
   */
  updateSearchResultsTitle() {
    if (!this.searchResultsTitle) return;

    const searchInput = this.form.querySelector('input[name="s"]');
    const searchQuery = searchInput?.value?.trim() || "";

    if (searchQuery) {
      const titleText =
        this.searchResultsTitle.dataset.titleText || "search results for";
      const resultsText = `${this.totalResults} ${titleText} "${searchQuery}"`;
      this.searchResultsTitle.textContent = resultsText;
      this.searchResultsTitle.style.display = "block";
    } else {
      this.searchResultsTitle.textContent = "";
      this.searchResultsTitle.style.display = "none";
    }
  }

  handleFilterChange() {
    // Clear previous timeout
    clearTimeout(this.filterTimeout);

    // Set new timeout (2 seconds debounce)
    this.filterTimeout = setTimeout(() => {
      this.applyFilters();
    }, 2000);
  }

  resetFormControls() {
    const searchInput = this.form.querySelector('input[name="s"]');
    if (searchInput) {
      searchInput.value = "";
    }

    this.getFilterSelects().forEach((selectElement) => {
      Array.from(selectElement.options).forEach((option) => {
        option.selected = false;
      });
    });

    const rankSelect = this.form.querySelector('select[name="rank"]');
    if (rankSelect) {
      rankSelect.value = "";
    }

    this.choicesInstances.forEach((choicesInstance) => {
      if (typeof choicesInstance.removeActiveItems === "function") {
        choicesInstance.removeActiveItems();
      }
    });
  }

  updateInsightContext(postType) {
    if (
      postType === this.insightPostType &&
      this.initialInsightTermId &&
      this.initialInsightTaxonomy
    ) {
      this.form.dataset.currentInsightTermId = this.initialInsightTermId;
      this.form.dataset.currentInsightTaxonomy = this.initialInsightTaxonomy;
      return;
    }

    delete this.form.dataset.currentInsightTermId;
    delete this.form.dataset.currentInsightTaxonomy;
  }

  switchPostType(postType) {
    clearTimeout(this.filterTimeout);

    this.postType = postType;
    this.form.dataset.postType = postType;

    this.updateInsightContext(postType);
    this.resetFormControls();
    this.applyFilters();
  }

  applyFilters() {
    // Reset state
    this.excludedIds = [];
    this.currentPage = 1;
    this.hasMore = true;
    this.totalResults = 0;
    this.pendingReload = false;

    // Clear container
    if (this.container) {
      this.container.innerHTML = "";
    }

    // Check if any filters are active
    this.hasFilters = this.checkIfFiltersActive();

    // Load filtered posts - title will be updated in handleSuccess
    this.loadPosts(true);
  }

  checkIfFiltersActive() {
    const formData = new FormData(this.form);

    // Check search
    const searchValue = formData.get("s");
    if (searchValue && searchValue.trim()) return true;

    // Check taxonomy filters
    const filterSelects = Array.from(this.getFilterSelects());
    for (let i = 0; i < filterSelects.length; i++) {
      const selectElement = filterSelects[i];
      if (!selectElement || !selectElement.name) {
        continue;
      }

      const values = formData
        .getAll(selectElement.name)
        .filter((value) => value && value.trim());
      if (values.length > 0) return true;
    }

    if (this.getCurrentInsightContext()) return true;

    // Check sort (ensure it's not empty string)
    const rankValue = formData.get("rank");
    if (rankValue && rankValue.trim()) return true;

    return false;
  }

  loadPosts(isInitial = false) {
    // Allow initial/reload requests to run regardless of previous pagination state.
    if (!isInitial && !this.hasMore) return;

    // If request is already in flight, queue one fresh reload with latest form state.
    if (this.isLoading) {
      this.pendingReload = true;
      return;
    }

    this.isLoading = true;
    this.showLoader();

    const formData = new FormData(this.form);
    const currentInsightContext = this.getCurrentInsightContext();

    // Prepare data object
    const data = {
      action: "load_filtered_posts",
      nonce: window.filterPostsData?.nonce || "",
      post_type: this.postType,
      page: this.currentPage,
      has_filters: this.hasFilters,
      s: formData.get("s") || "",
      rank: formData.get("rank") || "",
    };

    // Build URLSearchParams manually to handle arrays correctly
    const params = new URLSearchParams();

    // Add simple fields
    params.append("action", data.action);
    params.append("nonce", data.nonce);
    params.append("post_type", data.post_type);
    params.append("page", data.page);
    params.append("has_filters", data.has_filters);
    params.append("s", data.s);
    params.append("rank", data.rank);

    if (currentInsightContext) {
      params.append("current_insight_term_id", currentInsightContext.termId);
      params.append("current_insight_taxonomy", currentInsightContext.taxonomy);
    }

    // Add excluded IDs array
    this.excludedIds.forEach((id) => {
      params.append("excluded_ids[]", id);
    });

    // Add taxonomy arrays
    this.getFilterSelects().forEach((selectElement) => {
      if (!selectElement || !selectElement.name) {
        return;
      }

      const values = formData
        .getAll(selectElement.name)
        .filter((value) => value);
      values.forEach((value) => params.append(selectElement.name, value));
    });

    fetch(window.filterPostsData?.ajaxUrl || "/wp-admin/admin-ajax.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: params,
    })
      .then((response) => response.json())
      .then((result) => {
        if (result.success) {
          this.handleSuccess(result.data);
        } else {
          console.error("Filter error:", result.data?.message);
        }
      })
      .catch((error) => {
        console.error("AJAX error:", error);
      })
      .finally(() => {
        this.isLoading = false;
        this.hideLoader();

        if (this.pendingReload) {
          this.pendingReload = false;
          this.loadPosts(true);
        }
      });
  }

  handleSuccess(data) {
    const postIds = Array.isArray(data.post_ids)
      ? data.post_ids
      : data.post_ids
        ? [data.post_ids]
        : [];

    // Append new posts
    if (this.container && data.html) {
      this.container.insertAdjacentHTML("beforeend", data.html);
    }

    // Update excluded IDs
    if (postIds.length > 0) {
      postIds.forEach((id) => {
        this.excludedIds.push(id);
      });
    }

    // Update pagination state
    this.hasMore = data.has_more || false;

    // Update total results count only on first page load (initial filter application)
    if (this.currentPage === 1) {
      if (typeof data.total_results !== "undefined") {
        this.totalResults = data.total_results;
      } else if (postIds.length > 0) {
        // If server doesn't return total_results, count from post_ids on first page
        this.totalResults = postIds.length;
      }
      console.log("Total results:", this.totalResults, "Data:", data);
    }

    // Update search results title
    this.updateSearchResultsTitle();

    // Increment page for next load
    if (this.hasMore) {
      this.currentPage++;
    }

    // Dispatch custom event for infinite scroll
    const event = new CustomEvent("postsLoaded", {
      detail: {
        hasMore: this.hasMore,
        page: this.currentPage,
      },
    });
    document.dispatchEvent(event);
  }

  showLoader() {
    if (this.loader) {
      this.loader.style.display = "block";
    }
  }

  hideLoader() {
    if (this.loader) {
      this.loader.style.display = "none";
    }
  }

  // Public method for infinite scroll
  loadMore() {
    if (!this.isLoading && this.hasMore) {
      this.loadPosts();
    }
  }
}

export default PostsFilter;
