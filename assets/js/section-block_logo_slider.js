/******/ (() => { // webpackBootstrap
/*!**************************************************!*\
  !*** ./src/scripts/section/block_logo_slider.js ***!
  \**************************************************/
document.addEventListener('DOMContentLoaded', function () {
  new Swiper('.js-logo-swiper-container', {
    slidesPerView: 5,
    spaceBetween: 40,
    loop: true,
    autoplay: {
      delay: 7000,
      disableOnInteraction: false
    },
    freeMode: true,
    mousewheel: true,
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      767: {
        slidesPerView: 3,
        spaceBetween: 10
      },
      991: {
        slidesPerView: 3,
        spaceBetween: 40
      },
      1199: {
        slidesPerView: 5,
        spaceBetween: 40
      },
      1499: {
        slidesPerView: 7,
        spaceBetween: 40
      }
    }
  });
});
/******/ })()
;