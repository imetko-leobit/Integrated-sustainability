document.addEventListener('DOMContentLoaded', function () {
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

  // Load More functionality for desktop (card-based pagination)
  const loadMoreBtn = document.querySelector('.js-load-more-team');

  if (loadMoreBtn) {
    const section = loadMoreBtn.closest('.block-team-cards');
    if (!section) return;

    const cards = section.querySelectorAll('.team-card-item');
    const loadMoreCount = parseInt(section.dataset.loadMore) || 6;
    let visibleCount = parseInt(section.dataset.showInitially) || 6;

    // Helper function to update Load More button visibility
    const updateLoadMoreButtonVisibility = () => {
      if (visibleCount >= cards.length) {
        loadMoreBtn.style.display = 'none';
      } else {
        loadMoreBtn.style.display = '';
      }
    };

    loadMoreBtn.addEventListener('click', function () {
      // Show next batch of cards
      const cardsToShow = Array.from(cards).slice(visibleCount, visibleCount + loadMoreCount);

      cardsToShow.forEach(card => {
        card.classList.remove('is-hidden');
      });

      visibleCount += cardsToShow.length;
      updateLoadMoreButtonVisibility();
    });

    // Initialize button visibility
    updateLoadMoreButtonVisibility();
  }
});
