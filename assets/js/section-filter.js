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
function _toConsumableArray(r) { return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _iterableToArray(r) { if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r); }
function _arrayWithoutHoles(r) { if (Array.isArray(r)) return _arrayLikeToArray(r); }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
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
    this.excludedIds = [];
    this.currentPage = 1;
    this.hasMore = true;
    this.isLoading = false;
    this.filterTimeout = null;
    this.hasFilters = false;
    this.init();
  }
  return _createClass(PostsFilter, [{
    key: "init",
    value: function init() {
      var _this = this;
      // Listen to all form inputs
      var inputs = this.form.querySelectorAll("input, select");
      inputs.forEach(function (input) {
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

      // Load initial posts
      this.loadPosts(true);
    }
  }, {
    key: "handleFilterChange",
    value: function handleFilterChange() {
      var _this2 = this;
      // Clear previous timeout
      clearTimeout(this.filterTimeout);

      // Set new timeout (2 seconds debounce)
      this.filterTimeout = setTimeout(function () {
        _this2.applyFilters();
      }, 2000);
    }
  }, {
    key: "applyFilters",
    value: function applyFilters() {
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
  }, {
    key: "checkIfFiltersActive",
    value: function checkIfFiltersActive() {
      var _formData$get;
      var formData = new FormData(this.form);

      // Check search
      if ((_formData$get = formData.get("s")) !== null && _formData$get !== void 0 && _formData$get.trim()) return true;

      // Check taxonomies
      var taxonomies = ["locations", "industries", "project_services", "project_tags"];
      for (var _i = 0, _taxonomies = taxonomies; _i < _taxonomies.length; _i++) {
        var tax = _taxonomies[_i];
        var values = formData.getAll("".concat(tax, "[]")).filter(function (v) {
          return v;
        });
        if (values.length > 0) return true;
      }

      // Check sort
      if (formData.get("rank")) return true;
      return false;
    }
  }, {
    key: "loadPosts",
    value: function loadPosts() {
      var _window$filterPostsDa,
        _window$filterPostsDa2,
        _this3 = this;
      var isInitial = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
      if (this.isLoading || !this.hasMore) return;
      this.isLoading = true;
      this.showLoader();
      var formData = new FormData(this.form);

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

      // Add excluded IDs array
      this.excludedIds.forEach(function (id) {
        params.append("excluded_ids[]", id);
      });

      // Add taxonomy arrays
      var locations = formData.getAll("locations[]").filter(function (v) {
        return v;
      });
      locations.forEach(function (val) {
        return params.append("locations[]", val);
      });
      var industries = formData.getAll("industries[]").filter(function (v) {
        return v;
      });
      industries.forEach(function (val) {
        return params.append("industries[]", val);
      });
      var services = formData.getAll("project_services[]").filter(function (v) {
        return v;
      });
      services.forEach(function (val) {
        return params.append("project_services[]", val);
      });
      var tags = formData.getAll("project_tags[]").filter(function (v) {
        return v;
      });
      tags.forEach(function (val) {
        return params.append("project_tags[]", val);
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
          _this3.handleSuccess(result.data);
        } else {
          var _result$data;
          console.error("Filter error:", (_result$data = result.data) === null || _result$data === void 0 ? void 0 : _result$data.message);
        }
      })["catch"](function (error) {
        console.error("AJAX error:", error);
      })["finally"](function () {
        _this3.isLoading = false;
        _this3.hideLoader();
      });
    }
  }, {
    key: "handleSuccess",
    value: function handleSuccess(data) {
      // Append new posts
      if (this.container && data.html) {
        this.container.insertAdjacentHTML("beforeend", data.html);
      }

      // Update excluded IDs
      if (data.post_ids && data.post_ids.length > 0) {
        var _this$excludedIds;
        (_this$excludedIds = this.excludedIds).push.apply(_this$excludedIds, _toConsumableArray(data.post_ids));
      }

      // Update pagination state
      this.hasMore = data.has_more || false;

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
  var filterForm = document.querySelector(".posts-filter-form");
  if (filterForm) {
    // Initialize filter
    var filter = new _modules_FilterHandler_js__WEBPACK_IMPORTED_MODULE_0__["default"](".posts-filter-form");
    // Initialize infinite scroll
    new _modules_InfiniteScroll_js__WEBPACK_IMPORTED_MODULE_1__["default"](".scroll-trigger", filter);
  }
});
})();

/******/ })()
;