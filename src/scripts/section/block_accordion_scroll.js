document.addEventListener('DOMContentLoaded', function () {
  const container = document.getElementById('scrollContainer');
  if (!container) return;

  const allItems = container.querySelectorAll('.item');

  const ARROW_DOWN = `
<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M0.548316 15.8716L16 16C15.9627 12.1306 15.909 4.41732 15.8716 0.548268L13.9369 0.515595C13.9719 3.99757 14 8.61815 14.0373 12.6838L1.35357 0L0 1.35357L12.6837 14.0373L0.524554 13.9277L0.545558 15.8717L0.548316 15.8716Z" fill="white" />
</svg>`;

  const ARROW_UP = `
<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.8716 15.4517L16 0C12.1306 0.0373402 4.41732 0.0910145 0.548268 0.128355L0.515595 2.06306C3.99757 2.02805 8.61815 2.00004 12.6838 1.9627L0 14.6464L1.35357 16L14.0373 3.31627L13.9277 15.4754L15.8717 15.4544L15.8716 15.4517Z" fill="#040404" />
</svg>`;

  function toggleItem(index) {
    const targetItem = document.getElementById('item-' + index);
    if (!targetItem) return;

    const isOpen = targetItem.classList.contains('is-open');

    // Close all items
    allItems.forEach((item) => {
      item.classList.remove('is-open');
      const icon = item.querySelector('.icon');
      if (icon) {
        icon.innerHTML = ARROW_DOWN;
      }
    });

    // Open current item if it wasn't open
    if (!isOpen) {
      targetItem.classList.add('is-open');
      const icon = targetItem.querySelector('.icon');
      if (icon) {
        icon.innerHTML = ARROW_UP;
      }
    }
  }

  // Add event listeners to all buttons and titles
  allItems.forEach((item) => {
    const button = item.querySelector('[data-toggle]');
    const title = item.querySelector('.title[data-toggle]');
    const index = item.dataset.index;

    if (button) {
      button.addEventListener('click', (e) => {
        e.preventDefault();
        toggleItem(index);
      });
    }

    if (title) {
      title.addEventListener('click', () => {
        toggleItem(index);
      });
    }
  });
});
