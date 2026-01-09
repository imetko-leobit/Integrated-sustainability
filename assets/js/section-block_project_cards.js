/******/ (() => { // webpackBootstrap
/*!****************************************************!*\
  !*** ./src/scripts/section/block_project_cards.js ***!
  \****************************************************/
document.addEventListener('DOMContentLoaded', function () {
  var DESKTOP_BREAKPOINT = '(min-width: 1200px)';

  // 2. Функція для перевірки, чи це десктоп
  var isDesktop = function isDesktop() {
    return window.matchMedia(DESKTOP_BREAKPOINT).matches;
  };
  var rotatorContainer = document.querySelector('.js-project-card-rotator');
  if (!rotatorContainer) return;
  var rotationSequence = ['P1', 'P2', 'P3', 'P4', 'P5']; // P1 -> P2 -> P3 -> P4 -> P5 -> P1

  var positionToClass = {
    'P1': 'card__container--full',
    'P2': 'card__container--half-simple',
    'P3': 'card__container--small-left',
    'P4': 'card__container--small-right',
    'P5': 'card__container--half'
  };
  var cards = Array.from(rotatorContainer.querySelectorAll('.card__container'));
  var interval = parseInt(rotatorContainer.dataset.rotationInterval, 10) || 7000;
  var rotateCards = function rotateCards() {
    cards.forEach(function (card) {
      var currentPos = card.dataset.position;
      var currentIndex = rotationSequence.indexOf(currentPos);
      var nextIndex = (currentIndex + 1) % rotationSequence.length;
      var nextPos = rotationSequence[nextIndex];
      var nextClass = positionToClass[nextPos];
      Object.values(positionToClass).forEach(function (cls) {
        card.classList.remove(cls);
      });
      card.classList.add(nextClass);
      card.dataset.position = nextPos;
    });
  };
  if (isDesktop()) {
    setInterval(rotateCards, interval);
  }
});
/******/ })()
;