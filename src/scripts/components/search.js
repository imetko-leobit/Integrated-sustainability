/** @module search */

const CLASS_ACTIVE   = 'is-active';
const DROPDOWN_CLASS = 'search-dropdown';
const MIN_QUERY_LEN  = 3;
const DEBOUNCE_MS    = 350;

/** Display labels for each searchable post type. */
const POST_TYPE_LABELS = {
  services:     'services',
  applications: 'applications',
  industries:   'industries',
  equipment:    'equipment',
  projects:     'projects',
  insight:      'insights',
};

/**
 * Returns a debounced version of fn that delays execution by `wait` ms.
 * @param {Function} fn
 * @param {number}   wait
 * @returns {Function}
 */
function debounce(fn, wait) {
  let timer;
  return function (...args) {
    clearTimeout(timer);
    timer = setTimeout(() => fn.apply(this, args), wait);
  };
}

/**
 * Build HTML markup for one search result row.
 * @param {{ title: string, url: string, thumbnail: string, breadcrumbs: string }} item
 * @returns {string}
 */
function buildResultItem(item) {
  const thumb = item.thumbnail
    ? `<div class="search-result__thumb">${item.thumbnail}</div>`
    : `<div class="search-result__thumb search-result__thumb--empty"></div>`;

  return `<a href="${item.url}" class="search-result">
    ${thumb}
    <div class="search-result__body">
      ${item.breadcrumbs}
      <span class="search-result__title">${item.title}</span>
    </div>
  </a>`;
}

/**
 * Render or replace the search dropdown inside the given container.
 * @param {HTMLElement} container         .search-container element
 * @param {Object}      results           Grouped results: { post_type: [items] }
 * @param {string}      noResultsMessage
 */
function renderDropdown(container, results, noResultsMessage) {
  removeDropdown(container);

  const postTypes  = Object.keys(results);
  const hasResults = postTypes.length > 0;
  const label = container.dataset.allTabLabel ?? 'All';

  // Tabs: always include "All", then only post types with results.
  const tabsHtml = [
    `<button class="search-dropdown__tab is-active" data-tab="all" type="button">${label}</button>`,
    ...postTypes.map((pt) => {
      const label = POST_TYPE_LABELS[pt] ?? pt;
      return `<button class="search-dropdown__tab" data-tab="${pt}" type="button">${label}</button>`;
    }),
  ].join('');

  // Panels.
  let panelsHtml = '';
  if (hasResults) {
    const allItems = postTypes.flatMap((pt) => results[pt]);

    const buildPanel = (items, tabKey, isActive) =>
      `<div class="search-dropdown__panel${isActive ? ' is-active' : ''}" data-panel="${tabKey}">
        <div class="search-dropdown__list">${items.map(buildResultItem).join('')}</div>
      </div>`;

    panelsHtml += buildPanel(allItems, 'all', true);
    postTypes.forEach((pt) => {
      panelsHtml += buildPanel(results[pt], pt, false);
    });
  } else {
    panelsHtml = `<div class="search-dropdown__panel is-active" data-panel="all">
      <p class="search-dropdown__no-results">${noResultsMessage}</p>
    </div>`;
  }

  const dropdown = document.createElement('div');
  dropdown.className = DROPDOWN_CLASS;
  dropdown.setAttribute('role', 'listbox');
  dropdown.innerHTML =
    `<div class="search-dropdown__tabs" role="tablist">${tabsHtml}</div>` +
    `<div class="search-dropdown__content">${panelsHtml}</div>`;

  container.appendChild(dropdown);

  // Tab switching.
  dropdown.querySelectorAll('.search-dropdown__tab').forEach((btn) => {
    btn.addEventListener('click', () => {
      dropdown.querySelectorAll('.search-dropdown__tab').forEach((b) => b.classList.remove('is-active'));
      dropdown.querySelectorAll('.search-dropdown__panel').forEach((p) => p.classList.remove('is-active'));
      btn.classList.add('is-active');
      dropdown.querySelector(`[data-panel="${btn.dataset.tab}"]`)?.classList.add('is-active');
    });
  });
}

/**
 * Remove the dropdown from the given container if present.
 * @param {HTMLElement} container
 */
function removeDropdown(container) {
  container.querySelector(`.${DROPDOWN_CLASS}`)?.remove();
}

document.addEventListener('DOMContentLoaded', () => {
  const searchContainer = document.getElementById('header-search-container');
  const searchToggle    = searchContainer?.querySelector('.search-toggle');
  const searchClose     = searchContainer?.querySelector('.search-close');
  const searchInput     = document.getElementById('header-search-input');

  if (!searchContainer || !searchInput) {
    return;
  }

  const noResultsMessage = searchContainer.dataset.noResults ?? 'No posts found';

  // ── Toggle open / close ────────────────────────────────────────────────────

  function toggleSearch(e) {
    e.preventDefault();
    const isActive = searchContainer.classList.toggle(CLASS_ACTIVE);
    searchToggle?.setAttribute('aria-expanded', String(isActive));

    if (isActive) {
      searchInput.focus();
    } else {
      searchInput.value = '';
      removeDropdown(searchContainer);
    }
  }

  searchToggle?.addEventListener('click', toggleSearch);
  searchClose?.addEventListener('click', toggleSearch);

  document.addEventListener('click', (e) => {
    if (
      searchContainer.classList.contains(CLASS_ACTIVE) &&
      window.innerWidth > 991 &&
      !searchContainer.contains(e.target)
    ) {
      searchContainer.classList.remove(CLASS_ACTIVE);
      searchToggle?.setAttribute('aria-expanded', 'false');
      searchInput.value = '';
      removeDropdown(searchContainer);
    }
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && searchContainer.classList.contains(CLASS_ACTIVE)) {
      toggleSearch(e);
    }
  });

  // ── AJAX live search ───────────────────────────────────────────────────────

  /** @type {AbortController|null} */
  let currentRequest = null;

  const doSearch = debounce(async (query) => {
    // Cancel the previous in-flight request.
    currentRequest?.abort();
    const controller  = new AbortController();
    currentRequest    = controller;

    const body = new URLSearchParams({
      action: 'mat_header_search',
      query,
      _nonce: window.app_vars?.nonce ?? '',
    });

    try {
      const response = await fetch(
        window.app_vars?.ajaxurl ?? '/wp-admin/admin-ajax.php',
        {
          method:  'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
          body:    body.toString(),
          signal:  controller.signal,
        },
      );

      currentRequest = null;

      if (!response.ok) {
        return;
      }

      const data = await response.json();

      if (data.success) {
        renderDropdown(searchContainer, data.data.results, noResultsMessage);
      }
    } catch (err) {
      if (err.name !== 'AbortError') {
        console.warn('[search] AJAX error:', err);
      }
    }
  }, DEBOUNCE_MS);

  searchInput.addEventListener('input', (e) => {
    const query = e.target.value.trim();

    if (query.length < MIN_QUERY_LEN) {
      removeDropdown(searchContainer);
      return;
    }

    doSearch(query);
  });
});
