/******/ (() => { // webpackBootstrap
/*!*****************************************************!*\
  !*** ./src/scripts/components/header_controller.js ***!
  \*****************************************************/
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
/******/ })()
;