document.addEventListener('DOMContentLoaded', function() {
  // Initialize Swiper sliders for mobile
  const sliders = document.querySelectorAll('[class*="js-team-slider-"]');
  
  sliders.forEach(slider => {
    // Extract row number from class name more safely
    const rowNum = Array.from(slider.classList)
      .find(cls => cls.startsWith('js-team-slider-'))
      ?.split('-').pop();
    
    if (!rowNum) return;
    
    new Swiper(slider, {
      slidesPerView: 'auto',
      spaceBetween: 16,
      centeredSlides: false,
      navigation: {
        nextEl: `.js-team-next-${rowNum}`,
        prevEl: `.js-team-prev-${rowNum}`,
      },
      breakpoints: {
        320: {
          slidesPerView: 1.2,
          spaceBetween: 16,
        },
        480: {
          slidesPerView: 1.5,
          spaceBetween: 16,
        },
        640: {
          slidesPerView: 2.2,
          spaceBetween: 16,
        },
      },
    });
  });

  // Load More functionality for desktop
  const loadMoreBtn = document.querySelector('.js-load-more-team');
  
  if (loadMoreBtn) {
    const rows = document.querySelectorAll('.block-team-cards__row');
    let visibleRows = 1;
    
    // Helper function to manage Load More button visibility
    const updateLoadMoreButtonVisibility = () => {
      if (visibleRows >= rows.length) {
        loadMoreBtn.style.display = 'none';
      }
    };
    
    loadMoreBtn.addEventListener('click', function() {
      // Show next row
      if (visibleRows < rows.length) {
        rows[visibleRows].classList.remove('is-hidden');
        visibleRows++;
      }
      
      updateLoadMoreButtonVisibility();
    });
    
    // Initialize button visibility
    updateLoadMoreButtonVisibility();
  }
});
