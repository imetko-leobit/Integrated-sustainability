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

  let activeIndex = 0;

  function setActive(index) {
    if (index < 0 || index >= allItems.length) return;
    activeIndex = index;

    allItems.forEach((item, i) => {
      const icon = item.querySelector('.icon');
      if (i === index) {
        item.classList.add('is-open');
        icon.innerHTML = ARROW_UP;

        const itemTop = item.offsetTop;
        const itemBottom = itemTop + item.offsetHeight;
        const scrollTop = container.scrollTop;
        const containerHeight = container.clientHeight;

        if (itemTop < scrollTop) {
          container.scrollTo({ top: itemTop, behavior: 'smooth' });
        } else if (itemBottom > scrollTop + containerHeight) {
          container.scrollTo({ top: itemBottom - containerHeight, behavior: 'smooth' });
        }
      } else {
        item.classList.remove('is-open');
        icon.innerHTML = ARROW_DOWN;
      }
    });
  }

  window.toggleItem = function (index) {
    if (index !== activeIndex) setActive(index);
  };

  function onWheelStep(e) {
    e.preventDefault();

    const delta = e.deltaY;

    if (delta > 0 && activeIndex < allItems.length - 1) {
      setActive(activeIndex + 1);
    } else if (delta < 0 && activeIndex > 0) {
      setActive(activeIndex - 1);
    }
  }

  function throttle(fn, delay) {
    let allow = true;
    return function (...args) {
      if (!allow) return;
      allow = false;
      fn.apply(this, args);
      setTimeout(() => (allow = true), delay);
    };
  }

  container.addEventListener('wheel', throttle(onWheelStep, 500), { passive: false });

  setActive(0);
});
