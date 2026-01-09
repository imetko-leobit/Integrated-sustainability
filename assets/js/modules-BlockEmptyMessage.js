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
/*!**************************************************!*\
  !*** ./src/scripts/modules/BlockEmptyMessage.js ***!
  \**************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   BlockEmptyMessage: () => (/* binding */ BlockEmptyMessage)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _createForOfIteratorHelper(r, e) { var t = "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (!t) { if (Array.isArray(r) || (t = _unsupportedIterableToArray(r)) || e && r && "number" == typeof r.length) { t && (r = t); var _n = 0, F = function F() {}; return { s: F, n: function n() { return _n >= r.length ? { done: !0 } : { done: !1, value: r[_n++] }; }, e: function e(r) { throw r; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var o, a = !0, u = !1; return { s: function s() { t = t.call(r); }, n: function n() { var r = t.next(); return a = r.done, r; }, e: function e(r) { u = !0, o = r; }, f: function f() { try { a || null == t["return"] || t["return"](); } finally { if (u) throw o; } } }; }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var BlockEmptyMessage = /*#__PURE__*/function () {
  function BlockEmptyMessage() {
    _classCallCheck(this, BlockEmptyMessage);
    _defineProperty(this, "minBlockHeight", 10);
    _defineProperty(this, "resizeObserver", null);
  }
  return _createClass(BlockEmptyMessage, [{
    key: "initialize",
    value: function initialize() {
      var _this = this;
      this.resizeObserver = new ResizeObserver(function (entries) {
        return _this.onBlockResize(entries);
      });
      document.addEventListener('DOMContentLoaded', function () {
        if (!_this.inEditor()) {
          return;
        }
        _this.observeBlockChanges();
      });
    }
  }, {
    key: "onBlockResize",
    value: function onBlockResize(entries) {
      var _iterator = _createForOfIteratorHelper(entries),
        _step;
      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var entry = _step.value;
          var block = entry.target;
          var isEmpty = this.isEmpty(block);
          if (isEmpty) {
            if (!this.hasMessage(block)) {
              var message = this.createMessage(block);
              this.addMessageToBlock(block, message);
            }
          } else if (this.hasMessage(block)) {
            this.removeMessageFromBlock(block);
          }
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }
    }
  }, {
    key: "inEditor",
    value: function inEditor() {
      var blockContainer = document.querySelector('.block-editor__container');
      return Boolean(blockContainer);
    }
  }, {
    key: "observeBlockChanges",
    value: function observeBlockChanges() {
      var _this2 = this;
      var blockContainer = document.querySelector('.block-editor__container');
      var observerOptions = {
        childList: true,
        subtree: true
      };
      var observer = new MutationObserver(function () {
        return _this2.addBlockListeners(blockContainer);
      });
      observer.observe(blockContainer, observerOptions);
    }
  }, {
    key: "addBlockListeners",
    value: function addBlockListeners(blockContainer) {
      var blocks = blockContainer.querySelectorAll('.acf-block-preview');
      var _iterator2 = _createForOfIteratorHelper(blocks),
        _step2;
      try {
        for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
          var block = _step2.value;
          this.addBlockListener(block);
        }
      } catch (err) {
        _iterator2.e(err);
      } finally {
        _iterator2.f();
      }
    }
  }, {
    key: "addBlockListener",
    value: function addBlockListener(block) {
      this.resizeObserver.unobserve(block);
      this.resizeObserver.observe(block);
    }
  }, {
    key: "isEmpty",
    value: function isEmpty(block) {
      if (this.hasMessage(block)) {
        var message = this.queryMessage(block);
        var messageHeight = message.clientHeight;
        var style = getComputedStyle(message);
        var marginBottom = Number.parseInt((style === null || style === void 0 ? void 0 : style.marginBottom) || 0, 10);
        var marginTop = Number.parseInt((style === null || style === void 0 ? void 0 : style.marginTop) || 0, 10);
        var margin = marginBottom + marginTop;
        return block.clientHeight <= messageHeight + margin;
      }
      return block.clientHeight < this.minBlockHeight;
    }
  }, {
    key: "createMessage",
    value: function createMessage(block) {
      var wrapper = document.createElement('div');
      var notice = document.createElement('section');
      var message = document.createElement('p');
      var title = this.blockTitle(block);
      message.innerHTML = "".concat(title, " is empty. Edit the content on the sidebar.");
      notice.classList.add('notice', 'notice-info');
      notice.prepend(message);
      wrapper.classList.add('empty-block');
      wrapper.prepend(notice);
      return wrapper;
    }
  }, {
    key: "blockTitle",
    value: function blockTitle(block) {
      var defaultTitle = 'Block';
      if (!block) {
        return defaultTitle;
      }

      // find parent
      var parent = block.closest('.wp-block');
      if (!parent) {
        return defaultTitle;
      }
      var title = parent.dataset.title;
      return title ? title + ' block' : defaultTitle;
    }
  }, {
    key: "addMessageToBlock",
    value: function addMessageToBlock(block, message) {
      block.prepend(message);
    }
  }, {
    key: "queryMessage",
    value: function queryMessage(block) {
      return block.querySelector('.empty-block');
    }
  }, {
    key: "hasMessage",
    value: function hasMessage(block) {
      var message = this.queryMessage(block);
      return Boolean(message);
    }
  }, {
    key: "removeMessageFromBlock",
    value: function removeMessageFromBlock(block) {
      var message = this.queryMessage(block);
      if (!message) {
        return;
      }
      message.remove();
    }
  }]);
}();
/******/ })()
;