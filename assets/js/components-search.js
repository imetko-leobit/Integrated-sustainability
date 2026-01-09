/******/ (() => { // webpackBootstrap
/*!******************************************!*\
  !*** ./src/scripts/components/search.js ***!
  \******************************************/
document.addEventListener('DOMContentLoaded', function () {
  var searchContainer = document.getElementById('header-search-container');
  var searchToggle = document.querySelector('.search-toggle');
  var searchClose = document.querySelector('.search-close');
  var searchInput = document.getElementById('header-search-input');
  var CLASS_ACTIVE = 'is-active';
  function toggleSearch(e) {
    e.preventDefault();
    var isActive = searchContainer.classList.toggle(CLASS_ACTIVE);
    searchToggle.setAttribute('aria-expanded', isActive);
    if (isActive) {
      searchInput.focus();
    } else {
      searchInput.value = '';
    }
  }
  searchToggle === null || searchToggle === void 0 || searchToggle.addEventListener('click', toggleSearch);
  searchClose === null || searchClose === void 0 || searchClose.addEventListener('click', toggleSearch);
  document.addEventListener('click', function (e) {
    if (searchContainer.classList.contains(CLASS_ACTIVE) && window.innerWidth > 991) {
      if (!searchContainer.contains(e.target) && e.target !== searchToggle) {
        searchContainer.classList.remove(CLASS_ACTIVE);
        searchToggle.setAttribute('aria-expanded', 'false');
      }
    }
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && searchContainer.classList.contains(CLASS_ACTIVE)) {
      toggleSearch(e);
    }
  });
});
/******/ })()
;