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
/*!******************************************!*\
  !*** ./src/scripts/modules/Accordion.js ***!
  \******************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ initInsightAccordion)
/* harmony export */ });
function initInsightAccordion() {
  var containers = document.querySelectorAll('.js-accordion-container');
  if (!containers.length) return;
  containers.forEach(function (container) {
    var items = container.querySelectorAll('.accordion-item');
    var defaultActiveIndex = container.dataset.defaultActiveIndex !== undefined ? parseInt(container.dataset.defaultActiveIndex, 10) : -1;
    items.forEach(function (item, index) {
      var content = item.querySelector('.accordion-item__content');
      content.style.overflow = 'hidden';
      content.style.transition = 'max-height 0.3s ease';
      var expandBtn = item.querySelector('.accordion-item__expand-btn');
      if (index === defaultActiveIndex || item.classList.contains('is-open')) {
        item.classList.add('is-open');
        content.style.maxHeight = content.scrollHeight + 'px';
        if (expandBtn) expandBtn.style.display = 'none';
      } else {
        content.style.maxHeight = '0';
      }
    });
    container.addEventListener('click', function (e) {
      var trigger = e.target.closest('.js-accordion-trigger');
      if (!trigger) return;
      var item = trigger.closest('.accordion-item');
      var content = item.querySelector('.accordion-item__content');
      var expandBtn = item.querySelector('.accordion-item__expand-btn');
      var isOpen = item.classList.contains('is-open');

      // Закриваємо всі інші
      items.forEach(function (otherItem) {
        if (otherItem !== item) {
          var otherContent = otherItem.querySelector('.accordion-item__content');
          var otherBtn = otherItem.querySelector('.accordion-item__expand-btn');
          otherContent.style.maxHeight = '0';
          otherItem.classList.remove('is-open');
          if (otherBtn) otherBtn.style.display = '';
        }
      });
      if (isOpen) {
        content.style.maxHeight = '0';
        item.classList.remove('is-open');
        if (expandBtn) expandBtn.style.display = '';
      } else {
        requestAnimationFrame(function () {
          content.style.maxHeight = content.scrollHeight + 'px';
          item.classList.add('is-open');
          if (expandBtn) expandBtn.style.display = 'none';
        });
      }
    });
  });
}
/******/ })()
;