/******/ (() => { // webpackBootstrap
/*!*************************************************!*\
  !*** ./src/scripts/section/block_team_cards.js ***!
  \*************************************************/
document.addEventListener('DOMContentLoaded', function () {
  // Initialize Swiper sliders for mobile
  var sliders = document.querySelectorAll('[class*="js-team-slider-"]');
  sliders.forEach(function (slider) {
    var rowNum = slider.classList[1].split('-').pop();
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

  // Load More functionality for desktop
  var loadMoreBtn = document.querySelector('.js-load-more-team');
  if (loadMoreBtn) {
    var rows = document.querySelectorAll('.block-team-cards__row');
    var visibleRows = 1;
    loadMoreBtn.addEventListener('click', function () {
      // Show next row
      if (visibleRows < rows.length) {
        rows[visibleRows].classList.remove('is-hidden');
        visibleRows++;
      }

      // Hide button when all rows are visible
      if (visibleRows >= rows.length) {
        loadMoreBtn.style.display = 'none';
      }
    });

    // Hide button initially if all rows are visible
    if (visibleRows >= rows.length) {
      loadMoreBtn.style.display = 'none';
    }
  }
});
/******/ })()
;