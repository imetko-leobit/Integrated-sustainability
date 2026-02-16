import PostsFilter from "../modules/FilterHandler.js";
import InfiniteScroll from "../modules/InfiniteScroll.js";

// Initialize posts filter and infinite scroll
document.addEventListener("DOMContentLoaded", () => {
  const filterForm = document.querySelector(".filter-form");

  if (filterForm) {
    // Initialize filter
    const filter = new PostsFilter(".filter-form");
    // Initialize infinite scroll
    new InfiniteScroll(".scroll-trigger", filter);
  }

  const container = document.querySelector('.js-publications-timer');
  if (!container) return;

  let cards = Array.from(container.querySelectorAll('.post-card'));

  let currentIndex = -1;
  let timer = null;
  let isInView = false;
  const INTERVAL_TIME = 5000;

  const refreshCards = () => {
    cards = Array.from(container.querySelectorAll('.post-card'));
    if (cards.length === 0) {
      stopTimer();
      currentIndex = -1;
      return;
    }

    if (currentIndex >= cards.length) {
      currentIndex = -1;
    }
  };

  const showNextCard = () => {
    if (cards.length === 0) return;

    cards.forEach(card => card.classList.remove('is-active'));

    currentIndex = (currentIndex + 1) % cards.length;

    cards[currentIndex].classList.add('is-active');
  };

  const startTimer = () => {
    if (!timer && cards.length > 0) {
      timer = setInterval(showNextCard, INTERVAL_TIME);
    }
  };

  const stopTimer = () => {
    clearInterval(timer);
    timer = null;
    cards.forEach(card => card.classList.remove('is-active'));
  };

  const observerOptions = {
    threshold: 0.3
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        isInView = true;
        startTimer();
        if (currentIndex === -1) showNextCard();
      } else {
        isInView = false;
        stopTimer();
      }
    });
  }, observerOptions);

  observer.observe(container);

  container.addEventListener('mouseenter', stopTimer);

  container.addEventListener('mouseleave', startTimer);

  document.addEventListener('postsLoaded', () => {
    refreshCards();
    if (isInView && currentIndex === -1) {
      showNextCard();
      startTimer();
    }
  });

  const mutationObserver = new MutationObserver(() => {
    refreshCards();
    if (isInView && currentIndex === -1) {
      showNextCard();
      startTimer();
    }
  });

  mutationObserver.observe(container, { childList: true, subtree: true });
});
