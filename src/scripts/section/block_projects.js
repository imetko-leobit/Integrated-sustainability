document.addEventListener('DOMContentLoaded', () => {
    
  const portfolioLinkElement = document.querySelector('.js-project-portfolio-link');
  
  if (!portfolioLinkElement) {
      console.error("Portfolio link element not found.");
      return;
  }

  let portfolioLinks = [];
  try {
      const jsonString = portfolioLinkElement.dataset.portfolioLinks;
      if (jsonString) {
          portfolioLinks = JSON.parse(jsonString);
      }
  } catch (e) {
      console.error("Error parsing portfolio links JSON:", e);
      return;
  }


  const updatePortfolioLink = (index) => {
      if (portfolioLinkElement && portfolioLinks[index] !== undefined) {
          portfolioLinkElement.href = portfolioLinks[index];
      }
  };

  const textSwiper = new Swiper('.js-projects-text-slider', {
      slidesPerView: 1,
      effect: 'fade', 
      fadeEffect: { crossFade: true },
      allowTouchMove: false, 
      
      navigation: {
          nextEl: '.js-projects-text-slider .js-projects-next', 
          prevEl: '.js-projects-text-slider .js-projects-prev',
      },
      
      watchOverflow: true,
      on: {
          init: function () {
              this.update();
              updatePortfolioLink(this.realIndex);
          },
          slideChange: function () {
              this.update();
              updatePortfolioLink(this.realIndex);
          }
      }
  });

  const imageSwiper = new Swiper('.js-projects-image-slider', {
      slidesPerView: 1,
      effect: 'slide', 
      allowTouchMove: false,
      
      controller: {
          control: textSwiper,
      },
  });

  textSwiper.controller.control = imageSwiper;
});