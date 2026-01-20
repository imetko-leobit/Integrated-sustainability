document.addEventListener('DOMContentLoaded', () => {
  const breadcrumbs = document.querySelector('.header-subheader');
  const heroSection = document.querySelector('.block-hero');

  // Only initialize if both breadcrumbs and hero section exist
  if (!breadcrumbs || !heroSection) {
    return;
  }

  // Create an Intersection Observer to watch the hero section
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Hero is visible - show breadcrumbs
        breadcrumbs.classList.remove('breadcrumbs--hidden');
      } else {
        // Hero is not visible - hide breadcrumbs
        breadcrumbs.classList.add('breadcrumbs--hidden');
      }
    });
  }, {
    // Trigger when any part of the hero section is visible
    threshold: 0,
    // Use viewport as root
    root: null,
    // No margin
    rootMargin: '0px'
  });

  // Start observing the hero section
  observer.observe(heroSection);
});