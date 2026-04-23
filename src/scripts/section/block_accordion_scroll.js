document.addEventListener("DOMContentLoaded", function () {
  const accordionImage = document.getElementById("accordionImage");
  const container = document.getElementById("scrollContainer");
  if (!container) return;

  const allItems = container.querySelectorAll(".item");
  let activeIndex = 0;

  function setActive(index) {
    if (index < 0 || index >= allItems.length) return;
    activeIndex = index;

    allItems.forEach((item, i) => {
      const icon = item.querySelector(".icon");
      if (i === index) {
        item.classList.add("is-open");
        accordionImage.src = item.dataset.image;

        const itemTop = item.offsetTop;
        const itemBottom = itemTop + item.offsetHeight;
        const scrollTop = container.scrollTop;
        const containerHeight = container.clientHeight;

        if (itemTop < scrollTop) {
          container.scrollTo({ top: itemTop, behavior: "smooth" });
        } else if (itemBottom > scrollTop + containerHeight) {
          container.scrollTo({
            top: itemBottom - containerHeight,
            behavior: "smooth",
          });
        }
      } else {
        item.classList.remove("is-open");
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

  container.addEventListener("wheel", throttle(onWheelStep, 500), {
    passive: false,
  });

  setActive(0);
});
