export default function initPerformanceGrid() {
    const container = document.querySelector(".js-overlay-container");
  if (!container) return;

  // --- 1. (MASK) ---
  const applyOverlayMask = (e) => {
    const rect = container.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    container.style.setProperty("--x", `${x}px`);
    container.style.setProperty("--y", `${y}px`);
    container.style.setProperty("--opacity", "1");
  };

  const removeOverlayMask = () => {
    container.style.setProperty("--opacity", "0");
  };

  container.addEventListener("pointermove", applyOverlayMask);
  container.addEventListener("pointerleave", removeOverlayMask);

  // --- 2. (SCALE SYNC) ---
  const baseItems = container.querySelectorAll(".performance-grid__container .performance-grid__item");
  const overlayItems = container.querySelectorAll(".performance-grid__overlay .performance-grid__item");

  baseItems.forEach((item, index) => {
    item.addEventListener("mouseenter", () => {
      item.classList.add("is-scaled");
      if (overlayItems[index]) {
        overlayItems[index].classList.add("is-scaled");
      }
    });

    item.addEventListener("mouseleave", () => {
      item.classList.remove("is-scaled");
      if (overlayItems[index]) {
        overlayItems[index].classList.remove("is-scaled");
      }
    });
  });
  }