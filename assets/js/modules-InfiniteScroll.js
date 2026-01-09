/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
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
/*!***********************************************!*\
  !*** ./src/scripts/modules/InfiniteScroll.js ***!
  \***********************************************/
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
/******/ })()
;