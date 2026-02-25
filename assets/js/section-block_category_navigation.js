/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/scripts/modules/CategoryNavigation.js":
/*!***************************************************!*\
  !*** ./src/scripts/modules/CategoryNavigation.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ initCategoryNavigation)
/* harmony export */ });
function initCategoryNavigation() {
  var container = document.querySelector('.block-category-navigation');
  if (!container) return;
  var industryList = container.querySelector('#industryList');
  var cardImage = container.querySelector('#cardImage');
  var cardTitle = container.querySelector('#cardTitle');
  var cardDesc = container.querySelector('#cardDesc');
  var cardLink = container.querySelector('#cardLink'); // Твоя кнопка/лінк всередині
  var industryCard = container.querySelector('#industryCard'); // Тег <a> навколо всієї картки

  function updateCard(data) {
    if (!cardImage) return;
    var newImg = new Image();
    newImg.onload = function () {
      cardImage.style.opacity = '0';
      setTimeout(function () {
        cardImage.src = data.image;
        cardImage.alt = data.title;

        // Оновлюємо посилання навколо всієї картки
        if (industryCard) {
          industryCard.href = data.link;
        }
        if (cardTitle) {
          var arrow = cardTitle.querySelector('.arrow-icon');
          cardTitle.textContent = data.title + ' ';
          if (arrow) cardTitle.appendChild(arrow);
        }
        if (cardDesc) cardDesc.textContent = data.desc;

        // Оновлюємо посилання в кнопці (якщо вона є окремо)
        if (cardLink) cardLink.href = data.link;
        cardImage.style.opacity = '1';
      }, 200);
    };
    newImg.src = data.image;
  }
  industryList.addEventListener('click', function (e) {
    var targetLi = e.target.closest('li');
    if (!targetLi) return;
    e.stopPropagation();

    // 1. Клік по ПІДПУНКТУ
    if (targetLi.classList.contains('category-navigation__subitem')) {
      container.querySelectorAll('.category-navigation__subitem').forEach(function (s) {
        return s.classList.remove('active');
      });
      targetLi.classList.add('active');
      updateCard(targetLi.dataset);
      return;
    }

    // 2. Клік по ОСНОВНОМУ ПУНКТУ
    if (targetLi.classList.contains('category-navigation__nav-item')) {
      container.querySelectorAll('.category-navigation__nav-item').forEach(function (li) {
        return li.classList.remove('active');
      });
      container.querySelectorAll('.category-navigation__subitem').forEach(function (sub) {
        return sub.classList.remove('active');
      });
      targetLi.classList.add('active');
      updateCard(targetLi.dataset);
    }
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
/*!**********************************************************!*\
  !*** ./src/scripts/section/block_category_navigation.js ***!
  \**********************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_CategoryNavigation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../modules/CategoryNavigation */ "./src/scripts/modules/CategoryNavigation.js");

var elements = document.querySelectorAll('.block-category-navigation');
elements.forEach(function (element) {
  new _modules_CategoryNavigation__WEBPACK_IMPORTED_MODULE_0__["default"](element);
});
})();

/******/ })()
;