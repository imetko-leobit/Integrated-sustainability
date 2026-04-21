/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/scripts/modules/FilterHandler.js":
/*!**********************************************!*\
  !*** ./src/scripts/modules/FilterHandler.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
/**
 * Posts Filter Module
 * Handles form filtering with debounce and AJAX requests
 */
var PostsFilter = /*#__PURE__*/function () {
  function PostsFilter(formSelector) {
    _classCallCheck(this, PostsFilter);
    this.form = document.querySelector(formSelector);
    if (!this.form) return;
    this.container = document.querySelector(".publications");
    this.loader = document.querySelector(".loader");
    this.postType = this.form.dataset.postType;
    this.projectPostType = this.form.dataset.projectPostType || "projects";
    this.insightPostType = this.form.dataset.insightPostType || "insight";
    this.initialInsightTermId = this.form.dataset.initialCurrentInsightTermId || "";
    this.initialInsightTaxonomy = this.form.dataset.initialCurrentInsightTaxonomy || "";
    this.searchResultsTitle = document.querySelector(".js-search-results-title");
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
  return _createClass(PostsFilter, [{
    key: "init",
    value: function init() {
      var _this = this;
      // Initialize Choices.js for selects
      this.initializeChoices();

      // Initialize filter open/close buttons
      this.initializeFilterButtons();

      // Listen to all form inputs
      var inputs = this.form.querySelectorAll("input, select");
      inputs.forEach(function (input) {
        if (input.classList.contains("filter-toggle__input")) {
          return;
        }

        // Use 'input' for text fields, 'change' for selects
        if (input.tagName === "SELECT") {
          input.addEventListener("change", function () {
            return _this.handleFilterChange();
          });
        } else {
          input.addEventListener("input", function () {
            return _this.handleFilterChange();
          });
        }
      });
      document.addEventListener("filterPostTypeChange", function (event) {
        var _event$detail;
        var nextPostType = ((_event$detail = event.detail) === null || _event$detail === void 0 ? void 0 : _event$detail.postType) || "";
        if (!nextPostType || nextPostType === _this.postType) {
          return;
        }
        _this.switchPostType(nextPostType);
      });
      this.hasFilters = this.checkIfFiltersActive();

      // Load initial posts (title will be updated in handleSuccess)
      this.loadPosts(true);
    }
  }, {
    key: "getFilterSelects",
    value: function getFilterSelects() {
      return this.form.querySelectorAll(".filter-select");
    }
  }, {
    key: "getCurrentInsightContext",
    value: function getCurrentInsightContext() {
      var termId = this.form.dataset.currentInsightTermId;
      var taxonomy = this.form.dataset.currentInsightTaxonomy;
      if (!termId || taxonomy !== "insights_categories") {
        return null;
      }
      return {
        termId: termId,
        taxonomy: taxonomy
      };
    }

    /**
     * Initialize Choices.js for all select elements
     */
  }, {
    key: "initializeChoices",
    value: function initializeChoices() {
      var _this2 = this;
      if (typeof Choices === "undefined") {
        console.warn("Choices.js is not loaded");
        return;
      }

      // Initialize regular selects
      var regularSelects = this.form.querySelectorAll(".regular-select");
      regularSelects.forEach(function (selectElement) {
        var choicesInstance = new Choices(selectElement, {
          removeItemButton: true,
          placeholder: true,
          maxItemCount: 5,
          itemSelectText: "",
          searchEnabled: false
        });
        _this2.choicesInstances.push(choicesInstance);
      });

      // Initialize clearable selects
      var filterSort = this.form.querySelectorAll(".regular-select-clearable");
      filterSort.forEach(function (selectElement) {
        var choicesInstance = new Choices(selectElement, {
          removeItemButton: true,
          shouldSort: false,
          placeholder: true,
          placeholderValue: null,
          searchPlaceholderValue: null,
          maxItemCount: 5,
          itemSelectText: "",
          searchEnabled: false,
          allowHTML: true
        });
        _this2.choicesInstances.push(choicesInstance);
      });
    }

    /**
     * Initialize filter open/close buttons
     */
  }, {
    key: "initializeFilterButtons",
    value: function initializeFilterButtons() {
      var _this3 = this;
      if (this.btnOpen && this.filterFormWrapper) {
        this.btnOpen.addEventListener("click", function (e) {
          e.preventDefault();
          _this3.filterFormWrapper.classList.add("is-open");
        });
      }
      if (this.btnClose && this.filterFormWrapper) {
        this.btnClose.addEventListener("click", function (e) {
          e.preventDefault();
          _this3.filterFormWrapper.classList.remove("is-open");
        });
      }
    }

    /**
     * Update search results title
     */
  }, {
    key: "updateSearchResultsTitle",
    value: function updateSearchResultsTitle() {
      var _searchInput$value;
      if (!this.searchResultsTitle) return;
      var searchInput = this.form.querySelector('input[name="s"]');
      var searchQuery = (searchInput === null || searchInput === void 0 || (_searchInput$value = searchInput.value) === null || _searchInput$value === void 0 ? void 0 : _searchInput$value.trim()) || "";
      if (searchQuery) {
        var titleText = this.searchResultsTitle.dataset.titleText || "search results for";
        var resultsText = "".concat(this.totalResults, " ").concat(titleText, " \"").concat(searchQuery, "\"");
        this.searchResultsTitle.textContent = resultsText;
        this.searchResultsTitle.style.display = "block";
      } else {
        this.searchResultsTitle.textContent = "";
        this.searchResultsTitle.style.display = "none";
      }
    }
  }, {
    key: "handleFilterChange",
    value: function handleFilterChange() {
      var _this4 = this;
      // Clear previous timeout
      clearTimeout(this.filterTimeout);

      // Set new timeout (2 seconds debounce)
      this.filterTimeout = setTimeout(function () {
        _this4.applyFilters();
      }, 2000);
    }
  }, {
    key: "resetFormControls",
    value: function resetFormControls() {
      var searchInput = this.form.querySelector('input[name="s"]');
      if (searchInput) {
        searchInput.value = "";
      }
      this.getFilterSelects().forEach(function (selectElement) {
        Array.from(selectElement.options).forEach(function (option) {
          option.selected = false;
        });
      });
      var rankSelect = this.form.querySelector('select[name="rank"]');
      if (rankSelect) {
        rankSelect.value = "";
      }
      this.choicesInstances.forEach(function (choicesInstance) {
        if (typeof choicesInstance.removeActiveItems === "function") {
          choicesInstance.removeActiveItems();
        }
      });
    }
  }, {
    key: "updateInsightContext",
    value: function updateInsightContext(postType) {
      if (postType === this.insightPostType && this.initialInsightTermId && this.initialInsightTaxonomy) {
        this.form.dataset.currentInsightTermId = this.initialInsightTermId;
        this.form.dataset.currentInsightTaxonomy = this.initialInsightTaxonomy;
        return;
      }
      delete this.form.dataset.currentInsightTermId;
      delete this.form.dataset.currentInsightTaxonomy;
    }
  }, {
    key: "switchPostType",
    value: function switchPostType(postType) {
      clearTimeout(this.filterTimeout);
      this.postType = postType;
      this.form.dataset.postType = postType;
      this.updateInsightContext(postType);
      this.resetFormControls();
      this.applyFilters();
    }
  }, {
    key: "applyFilters",
    value: function applyFilters() {
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
  }, {
    key: "checkIfFiltersActive",
    value: function checkIfFiltersActive() {
      var formData = new FormData(this.form);

      // Check search
      var searchValue = formData.get("s");
      if (searchValue && searchValue.trim()) return true;

      // Check taxonomy filters
      var filterSelects = Array.from(this.getFilterSelects());
      for (var i = 0; i < filterSelects.length; i++) {
        var selectElement = filterSelects[i];
        if (!selectElement || !selectElement.name) {
          continue;
        }
        var values = formData.getAll(selectElement.name).filter(function (value) {
          return value && value.trim();
        });
        if (values.length > 0) return true;
      }
      if (this.getCurrentInsightContext()) return true;

      // Check sort (ensure it's not empty string)
      var rankValue = formData.get("rank");
      if (rankValue && rankValue.trim()) return true;
      return false;
    }
  }, {
    key: "loadPosts",
    value: function loadPosts() {
      var _window$filterPostsDa,
        _window$filterPostsDa2,
        _this5 = this;
      var isInitial = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
      // Allow initial/reload requests to run regardless of previous pagination state.
      if (!isInitial && !this.hasMore) return;

      // If request is already in flight, queue one fresh reload with latest form state.
      if (this.isLoading) {
        this.pendingReload = true;
        return;
      }
      this.isLoading = true;
      this.showLoader();
      var formData = new FormData(this.form);
      var currentInsightContext = this.getCurrentInsightContext();

      // Prepare data object
      var data = {
        action: "load_filtered_posts",
        nonce: ((_window$filterPostsDa = window.filterPostsData) === null || _window$filterPostsDa === void 0 ? void 0 : _window$filterPostsDa.nonce) || "",
        post_type: this.postType,
        page: this.currentPage,
        has_filters: this.hasFilters,
        s: formData.get("s") || "",
        rank: formData.get("rank") || ""
      };

      // Build URLSearchParams manually to handle arrays correctly
      var params = new URLSearchParams();

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
      this.excludedIds.forEach(function (id) {
        params.append("excluded_ids[]", id);
      });

      // Add taxonomy arrays
      this.getFilterSelects().forEach(function (selectElement) {
        if (!selectElement || !selectElement.name) {
          return;
        }
        var values = formData.getAll(selectElement.name).filter(function (value) {
          return value;
        });
        values.forEach(function (value) {
          return params.append(selectElement.name, value);
        });
      });
      fetch(((_window$filterPostsDa2 = window.filterPostsData) === null || _window$filterPostsDa2 === void 0 ? void 0 : _window$filterPostsDa2.ajaxUrl) || "/wp-admin/admin-ajax.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: params
      }).then(function (response) {
        return response.json();
      }).then(function (result) {
        if (result.success) {
          _this5.handleSuccess(result.data);
        } else {
          var _result$data;
          console.error("Filter error:", (_result$data = result.data) === null || _result$data === void 0 ? void 0 : _result$data.message);
        }
      })["catch"](function (error) {
        console.error("AJAX error:", error);
      })["finally"](function () {
        _this5.isLoading = false;
        _this5.hideLoader();
        if (_this5.pendingReload) {
          _this5.pendingReload = false;
          _this5.loadPosts(true);
        }
      });
    }
  }, {
    key: "handleSuccess",
    value: function handleSuccess(data) {
      var _this6 = this;
      var postIds = Array.isArray(data.post_ids) ? data.post_ids : data.post_ids ? [data.post_ids] : [];

      // Append new posts
      if (this.container && data.html) {
        this.container.insertAdjacentHTML("beforeend", data.html);
      }

      // Update excluded IDs
      if (postIds.length > 0) {
        postIds.forEach(function (id) {
          _this6.excludedIds.push(id);
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
      var event = new CustomEvent("postsLoaded", {
        detail: {
          hasMore: this.hasMore,
          page: this.currentPage
        }
      });
      document.dispatchEvent(event);
    }
  }, {
    key: "showLoader",
    value: function showLoader() {
      if (this.loader) {
        this.loader.style.display = "block";
      }
    }
  }, {
    key: "hideLoader",
    value: function hideLoader() {
      if (this.loader) {
        this.loader.style.display = "none";
      }
    }

    // Public method for infinite scroll
  }, {
    key: "loadMore",
    value: function loadMore() {
      if (!this.isLoading && this.hasMore) {
        this.loadPosts();
      }
    }
  }]);
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (PostsFilter);

/***/ }),

/***/ "./src/scripts/modules/InfiniteScroll.js":
/*!***********************************************!*\
  !*** ./src/scripts/modules/InfiniteScroll.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
/**
 * Infinite Scroll Module
 * Uses Intersection Observer API to detect when scroll trigger is visible
 */
var InfiniteScroll = /*#__PURE__*/function () {
  function InfiniteScroll(triggerSelector, filterInstance) {
    _classCallCheck(this, InfiniteScroll);
    this.trigger = document.querySelector(triggerSelector);
    this.filter = filterInstance;
    if (!this.trigger || !this.filter) return;
    this.observer = null;
    this.init();
  }
  return _createClass(InfiniteScroll, [{
    key: "init",
    value: function init() {
      var _this = this;
      // Create Intersection Observer
      this.observer = new IntersectionObserver(function (entries) {
        return _this.handleIntersection(entries);
      }, {
        root: null,
        // viewport
        rootMargin: "100px",
        // trigger 100px before trigger element is visible
        threshold: 0.1
      });

      // Start observing
      this.observer.observe(this.trigger);
      console.log("InfiniteScroll: Observing trigger element");

      // Listen to posts loaded event to re-observe if needed
      document.addEventListener("postsLoaded", function (e) {
        _this.handlePostsLoaded(e.detail);
      });
    }
  }, {
    key: "handleIntersection",
    value: function handleIntersection(entries) {
      var _this2 = this;
      entries.forEach(function (entry) {
        if (entry.isIntersecting && !_this2.filter.isLoading && _this2.filter.hasMore) {
          // Trigger is visible, load more posts
          _this2.filter.loadMore();
        }
      });
    }
  }, {
    key: "handlePostsLoaded",
    value: function handlePostsLoaded(detail) {
      // If no more posts, stop observing
      if (!detail.hasMore) {
        this.destroy();
      }
    }
  }, {
    key: "destroy",
    value: function destroy() {
      if (this.observer) {
        this.observer.disconnect();
        this.observer = null;
      }
    }
  }]);
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (InfiniteScroll);

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!***************************************!*\
  !*** ./src/scripts/section/filter.js ***!
  \***************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_FilterHandler_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../modules/FilterHandler.js */ "./src/scripts/modules/FilterHandler.js");
/* harmony import */ var _modules_InfiniteScroll_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../modules/InfiniteScroll.js */ "./src/scripts/modules/InfiniteScroll.js");



// Initialize posts filter and infinite scroll
document.addEventListener("DOMContentLoaded", function () {
  var filterForm = document.querySelector(".filter-form");
  if (filterForm) {
    // Initialize filter
    var filter = new _modules_FilterHandler_js__WEBPACK_IMPORTED_MODULE_0__["default"](".filter-form");
    // Initialize infinite scroll
    new _modules_InfiniteScroll_js__WEBPACK_IMPORTED_MODULE_1__["default"](".scroll-trigger", filter);
  }
  var container = document.querySelector(".js-publications-timer");
  if (!container) return;
  var cards = Array.from(container.querySelectorAll(".post-card"));
  var currentIndex = -1;
  var timer = null;
  var isInView = false;
  var INTERVAL_TIME = 5000;
  var refreshCards = function refreshCards() {
    cards = Array.from(container.querySelectorAll(".post-card"));
    if (cards.length === 0) {
      stopTimer();
      currentIndex = -1;
      return;
    }
    if (currentIndex >= cards.length) {
      currentIndex = -1;
    }
  };
  var getVisibleCards = function getVisibleCards() {
    return cards.filter(function (card) {
      var rect = card.getBoundingClientRect();
      return rect.top >= 0 && rect.bottom <= window.innerHeight;
    });
  };
  var showNextCard = function showNextCard() {
    var visibleCards = getVisibleCards();
    if (visibleCards.length === 0) return;
    cards.forEach(function (card) {
      return card.classList.remove("is-active");
    });
    currentIndex = (currentIndex + 1) % visibleCards.length;
    visibleCards[currentIndex].classList.add("is-active");
  };
  var startTimer = function startTimer() {
    if (!timer && cards.length > 0) {
      timer = setInterval(showNextCard, INTERVAL_TIME);
    }
  };
  var stopTimer = function stopTimer() {
    clearInterval(timer);
    timer = null;
    cards.forEach(function (card) {
      return card.classList.remove("is-active");
    });
  };
  var observerOptions = {
    threshold: 0.3
  };
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        isInView = true;
        startTimer();
        if (currentIndex === -1) showNextCard();
      } else {
        isInView = false;
        stopTimer();
      }
    });
  }, observerOptions);
  observer.observe(container);
  container.addEventListener("mouseenter", stopTimer);
  container.addEventListener("mouseleave", startTimer);
  window.addEventListener("scroll", function () {
    var visibleCards = getVisibleCards();
    if (!visibleCards.includes(cards[currentIndex])) {
      currentIndex = -1;
      showNextCard();
    }
  });
  document.addEventListener("postsLoaded", function () {
    refreshCards();
    if (isInView && currentIndex === -1) {
      showNextCard();
      startTimer();
    }
  });
  var mutationObserver = new MutationObserver(function () {
    refreshCards();
    if (isInView && currentIndex === -1) {
      showNextCard();
      startTimer();
    }
  });
  mutationObserver.observe(container, {
    childList: true,
    subtree: true
  });
});
})();

/******/ })()
;