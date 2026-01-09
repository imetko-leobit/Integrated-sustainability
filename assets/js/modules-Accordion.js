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
/* harmony export */   "default": () => (/* binding */ initAccordion)
/* harmony export */ });
function initAccordion() {
  var triggers = document.querySelectorAll('.js-accordion-trigger');
  triggers.forEach(function (trigger) {
    var handleClick = function handleClick(e) {
      e.preventDefault();
      var item = trigger.closest('.accordion-item');
      var content = item.querySelector('.accordion-item__content');
      if (item.classList.contains('is-open')) {
        content.style.maxHeight = null;
        setTimeout(function () {
          if (!item.classList.contains('is-open')) content.style.display = 'none';
        }, 300);
        item.classList.remove('is-open');
      } else {
        content.style.display = 'block';
        setTimeout(function () {
          content.style.maxHeight = content.scrollHeight + 'px';
        }, 10);
        item.classList.add('is-open');
      }
    };
    trigger.removeEventListener('click', trigger._currentHandler);
    trigger.addEventListener('click', handleClick);
    trigger._currentHandler = handleClick;
  });
  document.querySelectorAll('.accordion-item.is-open .accordion-item__content').forEach(function (content) {
    content.style.display = 'block';
    content.style.maxHeight = content.scrollHeight + 'px';
  });
}
;
/******/ })()
;