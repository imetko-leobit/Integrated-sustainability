/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/scripts/components/header_controller.js":
/*!*****************************************************!*\
  !*** ./src/scripts/components/header_controller.js ***!
  \*****************************************************/
/***/ (() => {

document.addEventListener('DOMContentLoaded', function () {
  var header = document.querySelector('.header');
  var handleScroll = function handleScroll() {
    if (window.scrollY > 50) {
      header.classList.add('header--scrolled');
    } else {
      header.classList.remove('header--scrolled');
    }
  };
  window.addEventListener('scroll', handleScroll);
});

/***/ }),

/***/ "./src/scripts/components/search.js":
/*!******************************************!*\
  !*** ./src/scripts/components/search.js ***!
  \******************************************/
/***/ (() => {

document.addEventListener('DOMContentLoaded', function () {
  var searchContainer = document.getElementById('header-search-container');
  var searchToggle = document.querySelector('.search-toggle');
  var searchClose = document.querySelector('.search-close');
  var searchInput = document.getElementById('header-search-input');
  var CLASS_ACTIVE = 'is-active';
  function toggleSearch(e) {
    e.preventDefault();
    var isActive = searchContainer.classList.toggle(CLASS_ACTIVE);
    searchToggle.setAttribute('aria-expanded', isActive);
    if (isActive) {
      searchInput.focus();
    } else {
      searchInput.value = '';
    }
  }
  searchToggle === null || searchToggle === void 0 || searchToggle.addEventListener('click', toggleSearch);
  searchClose === null || searchClose === void 0 || searchClose.addEventListener('click', toggleSearch);
  document.addEventListener('click', function (e) {
    if (searchContainer.classList.contains(CLASS_ACTIVE) && window.innerWidth > 991) {
      if (!searchContainer.contains(e.target) && e.target !== searchToggle) {
        searchContainer.classList.remove(CLASS_ACTIVE);
        searchToggle.setAttribute('aria-expanded', 'false');
      }
    }
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && searchContainer.classList.contains(CLASS_ACTIVE)) {
      toggleSearch(e);
    }
  });
});

/***/ }),

/***/ "./src/scripts/modules/Accordion.js":
/*!******************************************!*\
  !*** ./src/scripts/modules/Accordion.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
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
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
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
// This entry needs to be wrapped in an IIFE because it needs to be in strict mode.
(() => {
"use strict";
/*!*******************************!*\
  !*** ./src/scripts/common.js ***!
  \*******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_Accordion__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/Accordion */ "./src/scripts/modules/Accordion.js");
/* harmony import */ var _components_header_controller__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/header_controller */ "./src/scripts/components/header_controller.js");
/* harmony import */ var _components_header_controller__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_components_header_controller__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _components_search__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/search */ "./src/scripts/components/search.js");
/* harmony import */ var _components_search__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_components_search__WEBPACK_IMPORTED_MODULE_2__);


// import './components/menu_controller';

document.addEventListener('DOMContentLoaded', function () {
  (0,_modules_Accordion__WEBPACK_IMPORTED_MODULE_0__["default"])();
});
})();

/******/ })()
;