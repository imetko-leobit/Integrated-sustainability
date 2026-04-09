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
/*!**************************************!*\
  !*** ./src/scripts/modules/popup.js ***!
  \**************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ initPopup)
/* harmony export */ });
/** @module popup */

var CLASS_OPEN = 'is-open';
var ATTR_POPUP = 'data-popup';

/**
 * Open a popup by its element ID.
 * @param {string} id  The id attribute of the [data-popup] element.
 */
function openPopup(id) {
  var _popup$querySelector;
  var popup = document.getElementById(id);
  if (!popup || !popup.hasAttribute(ATTR_POPUP)) return;
  popup.classList.add(CLASS_OPEN);
  popup.setAttribute('aria-hidden', 'false');
  document.documentElement.classList.add('popup-open');

  // Move focus to the close button for keyboard / screen-reader users.
  (_popup$querySelector = popup.querySelector('[data-popup-close]')) === null || _popup$querySelector === void 0 || _popup$querySelector.focus();
}

/**
 * Close a popup.
 * @param {string|HTMLElement} idOrEl  Either the popup id string or any element
 *                                      that is a descendant of (or is) [data-popup].
 */
function closePopup(idOrEl) {
  var popup = typeof idOrEl === 'string' ? document.getElementById(idOrEl) : idOrEl.closest('[data-popup]');
  if (!popup) return;
  popup.classList.remove(CLASS_OPEN);
  popup.setAttribute('aria-hidden', 'true');

  // Remove body scroll-lock only when no other popup is still open.
  if (!document.querySelector("[data-popup].".concat(CLASS_OPEN))) {
    document.documentElement.classList.remove('popup-open');
  }
}

/**
 * Initialise popup functionality across the whole document.
 *
 * Uses event delegation so popups added dynamically also work.
 *
 * Trigger elements:
 *   <button data-popup-open="popup-id">Open</button>
 *
 * Close elements (already placed inside popup.php):
 *   <button data-popup-close>Close</button>   (close button)
 *   <div    data-popup-close>…</div>          (overlay)
 *
 * Global JS API:
 *   window.MATPopup.open('popup-id')
 *   window.MATPopup.close('popup-id')
 */
function initPopup() {
  // Delegated click: open triggers + close triggers.
  document.addEventListener('click', function (e) {
    var openTrigger = e.target.closest('[data-popup-open]');
    if (openTrigger) {
      e.preventDefault();
      openPopup(openTrigger.dataset.popupOpen);
      return;
    }

    // Support anchor links whose href points to a [data-popup] element, e.g.:
    //   <a href="#show_popup">Open</a>
    var anchor = e.target.closest('a[href^="#"]');
    if (anchor) {
      var id = anchor.getAttribute('href').slice(1);
      var target = id ? document.getElementById(id) : null;
      if (target !== null && target !== void 0 && target.hasAttribute(ATTR_POPUP)) {
        e.preventDefault();
        openPopup(id);
        return;
      }
    }
    var closeTrigger = e.target.closest('[data-popup-close]');
    if (closeTrigger) {
      e.preventDefault();
      closePopup(closeTrigger);
    }
  });

  // ESC key closes all currently open popups.
  document.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') return;
    document.querySelectorAll("[data-popup].".concat(CLASS_OPEN)).forEach(function (popup) {
      closePopup(popup);
    });
  });

  // Expose a global API for external scripts / inline onclick handlers.
  window.MATPopup = {
    open: openPopup,
    close: closePopup
  };
}
/******/ })()
;