/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/scripts/components/breadcrumb_observer.js":
/*!*******************************************************!*\
  !*** ./src/scripts/components/breadcrumb_observer.js ***!
  \*******************************************************/
/***/ (() => {

document.addEventListener('DOMContentLoaded', function () {
  var breadcrumbs = document.querySelector('.header-subheader');
  var heroSection = document.querySelector('.block-hero');

  // Only initialize if both breadcrumbs and hero section exist
  if (!breadcrumbs || !heroSection) {
    return;
  }

  // Create an Intersection Observer to watch the hero section
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        // Hero is visible - show breadcrumbs
        breadcrumbs.classList.remove('breadcrumbs--hidden');
      } else {
        // Hero is not visible - hide breadcrumbs
        breadcrumbs.classList.add('breadcrumbs--hidden');
      }
    });
  }, {
    // Trigger when any part of the hero section is visible
    threshold: 0,
    // Use viewport as root
    root: null,
    // No margin
    rootMargin: '0px'
  });

  // Start observing the hero section
  observer.observe(heroSection);
});

/***/ }),

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
/* harmony export */   "default": () => (/* binding */ initInsightAccordion)
/* harmony export */ });
function initInsightAccordion() {
  var container = document.querySelector('.js-accordion-container');
  if (!container) return;
  var items = container.querySelectorAll('.accordion-item');
  items.forEach(function (item, index) {
    var content = item.querySelector('.accordion-item__content');
    content.style.overflow = 'hidden';
    content.style.transition = 'max-height 0.3s ease';
    var expandBtn = item.querySelector('.accordion-item__expand-btn'); // кнопка “Збільшити текст”

    // Ініціалізація: перший відкритий
    if (index === 0 || item.classList.contains('is-open')) {
      item.classList.add('is-open');
      content.style.maxHeight = content.scrollHeight + 'px';
      if (expandBtn) expandBtn.style.display = 'none'; // приховуємо кнопку
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
        if (otherBtn) otherBtn.style.display = ''; // показуємо кнопку, якщо була прихована
      }
    });
    if (isOpen) {
      content.style.maxHeight = '0';
      item.classList.remove('is-open');
      if (expandBtn) expandBtn.style.display = ''; // показуємо кнопку
    } else {
      requestAnimationFrame(function () {
        content.style.maxHeight = content.scrollHeight + 'px';
        item.classList.add('is-open');
        if (expandBtn) expandBtn.style.display = 'none'; // приховуємо кнопку
      });
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
/* harmony import */ var _components_breadcrumb_observer__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components/breadcrumb_observer */ "./src/scripts/components/breadcrumb_observer.js");
/* harmony import */ var _components_breadcrumb_observer__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_components_breadcrumb_observer__WEBPACK_IMPORTED_MODULE_3__);


// import './components/menu_controller';


document.addEventListener("DOMContentLoaded", function () {
  (0,_modules_Accordion__WEBPACK_IMPORTED_MODULE_0__["default"])();
});
})();

/******/ })()
;