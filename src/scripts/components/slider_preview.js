document.addEventListener('DOMContentLoaded', () => {
  const sliderSections = document.querySelectorAll('.slider-preview');

  sliderSections.forEach(section => {
      const thumbsContainer = section.querySelector('.js-thumbs-slider-preview');
      const mainContainer = section.querySelector('.js-main-slider-preview');
      const nextBtn = section.querySelector('.js-projects-prev');
      const prevBtn = section.querySelector('.js-projects-next');

      if (thumbsContainer && mainContainer) {
          const thumbsSwiper = new Swiper(thumbsContainer, {
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
                  swiper: thumbsSwiper,
              },
              navigation: {
                  nextEl: nextBtn,
                  prevEl: prevBtn,
              },
          });
      }
  });
});