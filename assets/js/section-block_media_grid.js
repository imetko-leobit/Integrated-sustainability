/******/ (() => { // webpackBootstrap
/*!*************************************************!*\
  !*** ./src/scripts/section/block_media_grid.js ***!
  \*************************************************/
document.addEventListener('DOMContentLoaded', function () {
  var accordionTriggers = document.querySelectorAll('.js-accordion-trigger');
  if (accordionTriggers.length === 0) {
    return;
  }
  accordionTriggers.forEach(function (trigger) {
    trigger.addEventListener('click', function () {
      var currentCard = this.closest('.media-card');
      var isOpen = currentCard.classList.contains('is-open');
      document.querySelectorAll('.media-card.is-open').forEach(function (card) {
        card.classList.remove('is-open');
      });
      if (!isOpen) {
        currentCard.classList.add('is-open');
        setTimeout(function () {
          currentCard.scrollIntoView({
            behavior: 'smooth',
            block: 'nearest'
          });
        }, 300);
      }
    });
  });
});
/******/ })()
;