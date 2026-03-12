/******/ (() => { // webpackBootstrap
/*!*************************************************!*\
  !*** ./src/scripts/section/block_team_cards.js ***!
  \*************************************************/
document.addEventListener('DOMContentLoaded', function () {
  // Initialize Swiper sliders for mobile
  var sliders = document.querySelectorAll('[class*="js-team-slider-"]');
  sliders.forEach(function (slider) {
    var _Array$from$find;
    // Extract row number from class name more safely
    var rowNum = (_Array$from$find = Array.from(slider.classList).find(function (cls) {
      return cls.startsWith('js-team-slider-');
    })) === null || _Array$from$find === void 0 ? void 0 : _Array$from$find.split('-').pop();
    if (!rowNum) return;
    new Swiper(slider, {
      slidesPerView: 'auto',
      spaceBetween: 16,
      centeredSlides: false,
      navigation: {
        nextEl: ".js-team-next-".concat(rowNum),
        prevEl: ".js-team-prev-".concat(rowNum)
      },
      breakpoints: {
        320: {
          slidesPerView: 1.2,
          spaceBetween: 16
        },
        480: {
          slidesPerView: 1.5,
          spaceBetween: 16
        },
        640: {
          slidesPerView: 2.2,
          spaceBetween: 16
        }
      }
    });
  });

  // Load More functionality for desktop (card-based pagination)
  var loadMoreBtn = document.querySelector('.js-load-more-team');
  if (loadMoreBtn) {
    var section = loadMoreBtn.closest('.block-team-cards');
    if (!section) return;
    var cards = section.querySelectorAll('.team-card-item');
    var loadMoreCount = parseInt(section.dataset.loadMore) || 6;
    var visibleCount = parseInt(section.dataset.showInitially) || 6;

    // Helper function to update Load More button visibility
    var updateLoadMoreButtonVisibility = function updateLoadMoreButtonVisibility() {
      if (visibleCount >= cards.length) {
        loadMoreBtn.style.display = 'none';
      } else {
        loadMoreBtn.style.display = '';
      }
    };
    loadMoreBtn.addEventListener('click', function () {
      // Show next batch of cards
      var cardsToShow = Array.from(cards).slice(visibleCount, visibleCount + loadMoreCount);
      cardsToShow.forEach(function (card) {
        card.classList.remove('is-hidden');
      });
      visibleCount += cardsToShow.length;
      updateLoadMoreButtonVisibility();
    });

    // Initialize button visibility
    updateLoadMoreButtonVisibility();
  }
});
/******/ })()
;