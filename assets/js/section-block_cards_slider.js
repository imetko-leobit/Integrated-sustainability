/******/ (() => { // webpackBootstrap
/*!***************************************************!*\
  !*** ./src/scripts/section/block_cards_slider.js ***!
  \***************************************************/
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
document.addEventListener('DOMContentLoaded', function () {
  new Swiper('.js-projects-cards-slider', {
    direction: 'vertical',
    slidesPerView: 'auto',
    spaceBetween: 32,
    allowTouchMove: false,
    watchOverflow: false,
    breakpoints: {
      992: {
        direction: 'horizontal',
        slidesPerView: 3,
        effect: 'slide',
        spaceBetween: 32,
        loop: true,
        navigation: {
          nextEl: '.js-button-next',
          prevEl: '.js-button-prev'
        }
      },
      1200: _defineProperty({
        direction: 'horizontal',
        slidesPerView: 3,
        effect: 'slide',
        spaceBetween: 32,
        loop: true,
        navigation: {
          nextEl: '.js-button-next',
          prevEl: '.js-button-prev'
        }
      }, "spaceBetween", 56)
    }
  });
});
/******/ })()
;