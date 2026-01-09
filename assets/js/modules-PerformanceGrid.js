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
/*!************************************************!*\
  !*** ./src/scripts/modules/PerformanceGrid.js ***!
  \************************************************/
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
/******/ })()
;