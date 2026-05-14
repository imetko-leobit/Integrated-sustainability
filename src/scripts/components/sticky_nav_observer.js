document.addEventListener("DOMContentLoaded", () => {
  const stickyNav = document.querySelector(".mini-nav-sticky");
  const ctaBlocks = document.querySelectorAll(".block-cta");

  if (!stickyNav || ctaBlocks.length === 0) {
    return;
  }

  const hiddenClass = "is-hidden";
  let isTicking = false;

  const getClosestCtaTop = () => {
    let closestTop = Number.POSITIVE_INFINITY;

    ctaBlocks.forEach((ctaBlock) => {
      const ctaRect = ctaBlock.getBoundingClientRect();
      const distance = Math.abs(ctaRect.top);

      if (distance < Math.abs(closestTop)) {
        closestTop = ctaRect.top;
      }
    });

    return closestTop;
  };

  const updateStickyNavVisibility = () => {
    const navRect = stickyNav.getBoundingClientRect();
    const closestCtaTop = getClosestCtaTop();
    const shouldHide = navRect.bottom >= closestCtaTop;

    stickyNav.classList.toggle(hiddenClass, shouldHide);
  };

  const requestVisibilityUpdate = () => {
    if (isTicking) {
      return;
    }

    isTicking = true;
    window.requestAnimationFrame(() => {
      updateStickyNavVisibility();
      isTicking = false;
    });
  };

  updateStickyNavVisibility();

  window.addEventListener("scroll", requestVisibilityUpdate, { passive: true });
  window.addEventListener("resize", requestVisibilityUpdate);
});
