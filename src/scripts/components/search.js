document.addEventListener('DOMContentLoaded', () => {
  const searchContainer = document.getElementById('header-search-container');
  const searchToggle = document.querySelector('.search-toggle');
  const searchClose = document.querySelector('.search-close');
  const searchInput = document.getElementById('header-search-input');
  
  const CLASS_ACTIVE = 'is-active';

  function toggleSearch(e) {
      e.preventDefault(); 
      
      const isActive = searchContainer.classList.toggle(CLASS_ACTIVE);
      searchToggle.setAttribute('aria-expanded', isActive);

      if (isActive) {
          searchInput.focus();
      } else {
          searchInput.value = '';
      }
  }

  searchToggle?.addEventListener('click', toggleSearch);
  searchClose?.addEventListener('click', toggleSearch);

  document.addEventListener('click', (e) => {
      if (searchContainer.classList.contains(CLASS_ACTIVE) && window.innerWidth > 991) {
          if (!searchContainer.contains(e.target) && e.target !== searchToggle) {
              searchContainer.classList.remove(CLASS_ACTIVE);
              searchToggle.setAttribute('aria-expanded', 'false');
          }
      }
  });

  document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && searchContainer.classList.contains(CLASS_ACTIVE)) {
          toggleSearch(e);
      }
  });
});