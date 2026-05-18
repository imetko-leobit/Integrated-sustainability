document.addEventListener('DOMContentLoaded', () => {
  const header = document.querySelector('.header');

  const handleScroll = () => {
    if (window.innerWidth <= 991) return;

    if (window.scrollY > 50) {
      header.classList.add('header--scrolled');
    } else {
      header.classList.remove('header--scrolled');
    }
  };

  window.addEventListener('scroll', handleScroll);

  window.addEventListener('resize', () => {
    if (window.innerWidth <= 991) {
      header.classList.remove('header--scrolled');
    } else {
      handleScroll();
    }
  });
});