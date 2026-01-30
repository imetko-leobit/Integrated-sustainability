/******/ (() => { // webpackBootstrap
/*!**********************************************************!*\
  !*** ./src/scripts/components/equipment_image_slider.js ***!
  \**********************************************************/
document.addEventListener('DOMContentLoaded', function () {
  var sliderSections = document.querySelectorAll('.equipment-image-slider');
  sliderSections.forEach(function (section) {
    var thumbsContainer = section.querySelector('.js-equipment-thumbs-slider');
    var mainContainer = section.querySelector('.js-equipment-main-slider');
    var nextBtn = section.querySelector('.js-equipment-next');
    var prevBtn = section.querySelector('.js-equipment-prev');
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