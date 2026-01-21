document.addEventListener('DOMContentLoaded', () => {
  const sliderSections = document.querySelectorAll('.equipment-image-slider');

  sliderSections.forEach(section => {
      const thumbsContainer = section.querySelector('.js-equipment-thumbs-slider');
      const mainContainer = section.querySelector('.js-equipment-main-slider');
      const nextBtn = section.querySelector('.js-equipment-next');
      const prevBtn = section.querySelector('.js-equipment-prev');

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
