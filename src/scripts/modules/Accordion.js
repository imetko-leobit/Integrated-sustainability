export default function initInsightAccordion() {
  const containers = document.querySelectorAll('.js-accordion-container');
  if (!containers.length) return;

  containers.forEach((container) => {
    const items = container.querySelectorAll('.accordion-item');
    const defaultActiveIndex = container.dataset.defaultActiveIndex !== undefined
      ? parseInt(container.dataset.defaultActiveIndex, 10)
      : -1;

    items.forEach((item, index) => {
      const content = item.querySelector('.accordion-item__content');
      content.style.overflow = 'hidden';
      content.style.transition = 'max-height 0.3s ease';

      const expandBtn = item.querySelector('.accordion-item__expand-btn');

      if (index === defaultActiveIndex || item.classList.contains('is-open')) {
        item.classList.add('is-open');
        content.style.maxHeight = content.scrollHeight + 'px';
        if (expandBtn) expandBtn.style.display = 'none';
      } else {
        content.style.maxHeight = '0';
      }
    });

    document.fonts.ready.then(() => {
      items.forEach((item) => {
        if (item.classList.contains('is-open')) {
          const content = item.querySelector('.accordion-item__content');
          content.style.maxHeight = content.scrollHeight + 'px';
        }
      });
    }).catch(() => { });

    container.addEventListener('click', (e) => {
      const trigger = e.target.closest('.js-accordion-trigger');
      if (!trigger) return;

      const item = trigger.closest('.accordion-item');
      const content = item.querySelector('.accordion-item__content');
      const expandBtn = item.querySelector('.accordion-item__expand-btn');
      const isOpen = item.classList.contains('is-open');

      // Закриваємо всі інші
      items.forEach((otherItem) => {
        if (otherItem !== item) {
          const otherContent = otherItem.querySelector(
            '.accordion-item__content',
          );
          const otherBtn = otherItem.querySelector(
            '.accordion-item__expand-btn',
          );
          otherContent.style.maxHeight = '0';
          otherItem.classList.remove('is-open');
          if (otherBtn) otherBtn.style.display = '';
        }
      });

      if (isOpen) {
        content.style.maxHeight = '0';
        item.classList.remove('is-open');
        if (expandBtn) expandBtn.style.display = '';
      } else {
        requestAnimationFrame(() => {
          content.style.maxHeight = content.scrollHeight + 'px';
          item.classList.add('is-open');
          if (expandBtn) expandBtn.style.display = 'none';
        });
      }
    });
  });
}
