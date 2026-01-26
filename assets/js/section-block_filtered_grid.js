/******/ (() => { // webpackBootstrap
/*!****************************************************!*\
  !*** ./src/scripts/section/block_filtered_grid.js ***!
  \****************************************************/
/**
 * Filtered Grid Block JavaScript
 * Handles filtering, sorting, and filter chip functionality
 */

(function () {
  'use strict';

  // Wait for DOM to be ready
  document.addEventListener('DOMContentLoaded', function () {
    // Get all filtered grid instances on the page
    var filteredGrids = document.querySelectorAll('.block-filtered-grid');
    filteredGrids.forEach(function (gridBlock) {
      initFilteredGrid(gridBlock);
    });
  });
  function initFilteredGrid(gridBlock) {
    var filterSelects = gridBlock.querySelectorAll('.js-filter-select');
    var sortSelect = gridBlock.querySelector('.js-sort-select');
    var chipsContainer = gridBlock.querySelector('.js-filter-chips');
    var gridContainer = gridBlock.querySelector('.js-filtered-grid');
    var noResultsEl = gridBlock.querySelector('.js-no-results');

    // Check if required elements exist
    if (!gridContainer) {
      console.warn('Filtered grid container not found');
      return;
    }
    var gridItems = gridContainer.querySelectorAll('.block-filtered-grid__grid-item');

    // Store active filters
    var activeFilters = {};
    var activeSortOption = '';

    // Initialize filter listeners
    filterSelects.forEach(function (select) {
      select.addEventListener('change', function () {
        handleFilterChange(select);
      });
    });

    // Initialize sort listener
    if (sortSelect) {
      sortSelect.addEventListener('change', function () {
        handleSortChange(sortSelect);
      });
    }

    /**
     * Handle filter select change
     */
    function handleFilterChange(select) {
      var filterName = select.getAttribute('data-filter-name');
      var filterValue = select.value;
      if (filterValue) {
        activeFilters[filterName] = {
          value: filterValue,
          label: select.options[select.selectedIndex].text
        };
      } else {
        delete activeFilters[filterName];
      }
      updateChips();
      applyFilters();
    }

    /**
     * Handle sort change
     */
    function handleSortChange(select) {
      activeSortOption = select.value;
      applyFilters();
    }

    /**
     * Update filter chips display
     */
    function updateChips() {
      if (!chipsContainer) return;

      // Clear existing chips
      while (chipsContainer.firstChild) {
        chipsContainer.removeChild(chipsContainer.firstChild);
      }

      // Add chip for each active filter
      Object.keys(activeFilters).forEach(function (filterName) {
        var filter = activeFilters[filterName];
        var chip = createChip(filterName, filter.label);
        chipsContainer.appendChild(chip);
      });
    }

    /**
     * Create a filter chip element
     */
    function createChip(filterName, label) {
      var chip = document.createElement('div');
      chip.className = 'block-filtered-grid__chip btn--gradient';
      var chipLabel = document.createElement('span');
      chipLabel.className = 'block-filtered-grid__chip-label';
      chipLabel.textContent = label;
      var removeBtn = document.createElement('button');
      removeBtn.className = 'block-filtered-grid__chip-remove';
      removeBtn.innerHTML = '&times;';
      removeBtn.setAttribute('aria-label', 'Remove ' + label + ' filter');
      removeBtn.addEventListener('click', function () {
        removeFilter(filterName);
      });
      chip.appendChild(chipLabel);
      chip.appendChild(removeBtn);
      return chip;
    }

    /**
     * Remove a filter
     */
    function removeFilter(filterName) {
      delete activeFilters[filterName];

      // Reset the select element
      var select = gridBlock.querySelector('[data-filter-name="' + filterName + '"]');
      if (select) {
        select.value = '';
      }
      updateChips();
      applyFilters();
    }

    /**
     * Apply filters and sorting to grid items
     */
    function applyFilters() {
      var visibleCount = 0;
      var itemsArray = Array.from(gridItems);

      // First, filter items
      itemsArray.forEach(function (item) {
        var shouldShow = checkItemMatchesFilters(item);
        if (shouldShow) {
          item.classList.remove('is-hidden');
          visibleCount++;
        } else {
          item.classList.add('is-hidden');
        }
      });

      // Then, sort visible items
      if (activeSortOption) {
        sortItems(itemsArray);
      }

      // Show/hide no results message
      if (noResultsEl) {
        if (visibleCount === 0 && Object.keys(activeFilters).length > 0) {
          noResultsEl.style.display = 'block';
        } else {
          noResultsEl.style.display = 'none';
        }
      }
    }

    /**
     * Check if item matches all active filters
     */
    function checkItemMatchesFilters(item) {
      // If no filters active, show all items
      if (Object.keys(activeFilters).length === 0) {
        return true;
      }

      // Check each active filter
      for (var filterName in activeFilters) {
        var filterValue = activeFilters[filterName].value;
        var itemValue = item.getAttribute('data-' + filterName);
        if (itemValue !== filterValue) {
          return false;
        }
      }
      return true;
    }

    /**
     * Sort items based on active sort option
     */
    function sortItems(itemsArray) {
      var visibleItems = itemsArray.filter(function (item) {
        return !item.classList.contains('is-hidden');
      });
      visibleItems.sort(function (a, b) {
        switch (activeSortOption) {
          case 'name-asc':
            return a.getAttribute('data-title').localeCompare(b.getAttribute('data-title'));
          case 'name-desc':
            return b.getAttribute('data-title').localeCompare(a.getAttribute('data-title'));
          case 'date-new':
            return new Date(b.getAttribute('data-date')) - new Date(a.getAttribute('data-date'));
          case 'date-old':
            return new Date(a.getAttribute('data-date')) - new Date(b.getAttribute('data-date'));
          default:
            return 0;
        }
      });

      // Reorder DOM elements
      visibleItems.forEach(function (item) {
        gridContainer.appendChild(item);
      });
    }
  }
})();
/******/ })()
;