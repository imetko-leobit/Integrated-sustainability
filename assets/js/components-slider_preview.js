/******/ (() => { // webpackBootstrap
/*!**************************************************!*\
  !*** ./src/scripts/components/slider_preview.js ***!
  \**************************************************/
document.addEventListener('DOMContentLoaded', function () {
  var sliderSections = document.querySelectorAll('.slider-preview');
  sliderSections.forEach(function (section) {
    var thumbsContainer = section.querySelector('.js-thumbs-slider-preview');
    var mainContainer = section.querySelector('.js-main-slider-preview');
    var nextBtn = section.querySelector('.js-projects-prev');
    var prevBtn = section.querySelector('.js-projects-next');
    if (thumbsContainer && mainContainer) {
      var thumbsSwiper = new Swiper(thumbsContainer, {
        slidesPerView: 2,
        spaceBetween: 16,
        loop: true,
        watchSlidesProgress: true,
        breakpoints: {
          992: {
            slidesPerView: 3,
            spaceBetween: 56
          }
        }
      });
      new Swiper(mainContainer, {
        slidesPerView: 1,
        loop: true,
        thumbs: {
          swiper: thumbsSwiper
        },
        navigation: {
          nextEl: nextBtn,
          prevEl: prevBtn
        }
      });
    }
  });
});
/******/ })()
;