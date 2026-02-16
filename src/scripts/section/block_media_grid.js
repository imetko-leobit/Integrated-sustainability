document.addEventListener('DOMContentLoaded', function() {
  const accordionTriggers = document.querySelectorAll('.js-accordion-trigger');

  if (accordionTriggers.length === 0) {
    return;
  }

  accordionTriggers.forEach(trigger => {
    trigger.addEventListener('click', function() {
      const currentCard = this.closest('.media-card');
      const isOpen = currentCard.classList.contains('is-open');

      document.querySelectorAll('.media-card.is-open').forEach(card => {
        card.classList.remove('is-open');
      });

      if (!isOpen) {
        currentCard.classList.add('is-open');

        setTimeout(() => {
          currentCard.scrollIntoView({
            behavior: 'smooth',
            block: 'nearest'
          });
        }, 300);
      }
    });
  });
});
