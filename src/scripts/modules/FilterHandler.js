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

    this.excludedIds = [];
    this.currentPage = 1;
    this.hasMore = true;
    this.isLoading = false;
    this.filterTimeout = null;
    this.hasFilters = false;

    this.init();
  }

  init() {
    // Listen to all form inputs
    const inputs = this.form.querySelectorAll("input, select");
    inputs.forEach((input) => {
      // Use 'input' for text fields, 'change' for selects
      if (input.tagName === "SELECT") {
        input.addEventListener("change", () => this.handleFilterChange());
      } else {
        input.addEventListener("input", () => this.handleFilterChange());
      }
    });

    // Load initial posts
    this.loadPosts(true);
  }

  handleFilterChange() {
    // Clear previous timeout
    clearTimeout(this.filterTimeout);

    // Set new timeout (2 seconds debounce)
    this.filterTimeout = setTimeout(() => {
      this.applyFilters();
    }, 2000);
  }

  applyFilters() {
    // Reset state
    this.excludedIds = [];
    this.currentPage = 1;
    this.hasMore = true;

    // Clear container
    if (this.container) {
      this.container.innerHTML = "";
    }

    // Check if any filters are active
    this.hasFilters = this.checkIfFiltersActive();

    // Load filtered posts
    this.loadPosts(true);
  }

  checkIfFiltersActive() {
    const formData = new FormData(this.form);

    // Check search
    if (formData.get("s")?.trim()) return true;

    // Check taxonomies
    const taxonomies = [
      "locations",
      "industries",
      "project_services",
      "project_tags",
    ];
    for (const tax of taxonomies) {
      const values = formData.getAll(`${tax}[]`).filter((v) => v);
      if (values.length > 0) return true;
    }

    // Check sort
    if (formData.get("rank")) return true;

    return false;
  }

  loadPosts(isInitial = false) {
    if (this.isLoading || !this.hasMore) return;

    this.isLoading = true;
    this.showLoader();

    const formData = new FormData(this.form);

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

    // Add excluded IDs array
    this.excludedIds.forEach((id) => {
      params.append("excluded_ids[]", id);
    });

    // Add taxonomy arrays
    const locations = formData.getAll("locations[]").filter((v) => v);
    locations.forEach((val) => params.append("locations[]", val));

    const industries = formData.getAll("industries[]").filter((v) => v);
    industries.forEach((val) => params.append("industries[]", val));

    const services = formData.getAll("project_services[]").filter((v) => v);
    services.forEach((val) => params.append("project_services[]", val));

    const tags = formData.getAll("project_tags[]").filter((v) => v);
    tags.forEach((val) => params.append("project_tags[]", val));

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
      });
  }

  handleSuccess(data) {
    // Append new posts
    if (this.container && data.html) {
      this.container.insertAdjacentHTML("beforeend", data.html);
    }

    // Update excluded IDs
    if (data.post_ids && data.post_ids.length > 0) {
      this.excludedIds.push(...data.post_ids);
    }

    // Update pagination state
    this.hasMore = data.has_more || false;

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
