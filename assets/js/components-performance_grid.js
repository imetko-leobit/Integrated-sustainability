/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/scripts/modules/PerformanceGrid.js":
/*!************************************************!*\
  !*** ./src/scripts/modules/PerformanceGrid.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ initPerformanceGrid)
/* harmony export */ });
function initPerformanceGrid() {
  var container = document.querySelector(".js-overlay-container");
  if (!container) return;

  // --- 1. (MASK) ---
  var applyOverlayMask = function applyOverlayMask(e) {
    var rect = container.getBoundingClientRect();
    var x = e.clientX - rect.left;
    var y = e.clientY - rect.top;
    container.style.setProperty("--x", "".concat(x, "px"));
    container.style.setProperty("--y", "".concat(y, "px"));
    container.style.setProperty("--opacity", "1");
  };
  var removeOverlayMask = function removeOverlayMask() {
    container.style.setProperty("--opacity", "0");
  };
  container.addEventListener("pointermove", applyOverlayMask);
  container.addEventListener("pointerleave", removeOverlayMask);

  // --- 2. (SCALE SYNC) ---
  var baseItems = container.querySelectorAll(".performance-grid__container .performance-grid__item");
  var overlayItems = container.querySelectorAll(".performance-grid__overlay .performance-grid__item");
  baseItems.forEach(function (item, index) {
    item.addEventListener("mouseenter", function () {
      item.classList.add("is-scaled");
      if (overlayItems[index]) {
        overlayItems[index].classList.add("is-scaled");
      }
    });
    item.addEventListener("mouseleave", function () {
      item.classList.remove("is-scaled");
      if (overlayItems[index]) {
        overlayItems[index].classList.remove("is-scaled");
      }
    });
  });
}

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
/*!****************************************************!*\
  !*** ./src/scripts/components/performance_grid.js ***!
  \****************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_PerformanceGrid__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../modules/PerformanceGrid */ "./src/scripts/modules/PerformanceGrid.js");

var elements = document.querySelectorAll('.performance-grid');
elements.forEach(function (element) {
  new _modules_PerformanceGrid__WEBPACK_IMPORTED_MODULE_0__["default"](element);
});
})();

/******/ })()
;