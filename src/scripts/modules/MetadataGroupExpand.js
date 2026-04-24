export default function initMetadataGroupExpand() {
  const MOBILE_BREAKPOINT = '(max-width: 991px)';
  const VISIBLE_COUNT = 3;

  function isMobile() {
    return window.matchMedia(MOBILE_BREAKPOINT).matches;
  }

  // One-time setup per group: marks overflow items and injects the expand button.
  // Returns true if the group was initialised (has more than VISIBLE_COUNT items).
  function setupGroup(group) {
    const linksWrapper = group.querySelector('.metadata-group__links');
    if (!linksWrapper) return false;

    const items = Array.from(linksWrapper.children);
    if (items.length <= VISIBLE_COUNT) return false;

    // Mark items beyond the first VISIBLE_COUNT for mobile hiding
    items.forEach((item, index) => {
      if (index >= VISIBLE_COUNT) {
        item.classList.add('metadata-group__link--hidden');
      }
    });

    // Inject the expand button once
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'btn metadata-group__expand-btn';
    btn.innerHTML =
      '<span>Show more</span>' +
      '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">' +
        '<mask id="mask0_metadata_expand" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">' +
          '<rect width="24" height="24" fill="#D9D9D9"/>' +
        '</mask>' +
        '<g mask="url(#mask0_metadata_expand)">' +
          '<path d="M12.0008 14.9504C11.8674 14.9504 11.7424 14.9296 11.6258 14.8879C11.5091 14.8462 11.4008 14.7754 11.3008 14.6754L6.70078 10.0754C6.51745 9.89206 6.42578 9.65872 6.42578 9.37539C6.42578 9.09206 6.51745 8.85872 6.70078 8.67539C6.88411 8.49206 7.11745 8.40039 7.40078 8.40039C7.68411 8.40039 7.91745 8.49206 8.10078 8.67539L12.0008 12.5754L15.9008 8.67539C16.0841 8.49206 16.3174 8.40039 16.6008 8.40039C16.8841 8.40039 17.1174 8.49206 17.3008 8.67539C17.4841 8.85872 17.5758 9.09206 17.5758 9.37539C17.5758 9.65872 17.4841 9.89206 17.3008 10.0754L12.7008 14.6754C12.6008 14.7754 12.4924 14.8462 12.3758 14.8879C12.2591 14.9296 12.1341 14.9504 12.0008 14.9504Z" fill="#7A7A7A"/>' +
        '</g>' +
      '</svg>';

    btn.addEventListener('click', () => {
      items.forEach((item) => {
        item.classList.remove('metadata-group__link--hidden');
      });
      btn.style.display = 'none';
    });

    group.appendChild(btn);
    return true;
  }

  // Sync button/item visibility based on current viewport, without re-initialising.
  function syncVisibility(group) {
    const btn = group.querySelector('.metadata-group__expand-btn');
    if (!btn) return;

    if (isMobile()) {
      // Restore collapsed state only if not already expanded by user
      const isExpanded = btn.style.display === 'none';
      if (!isExpanded) {
        // Button is still visible – keep items collapsed (CSS handles this)
        btn.style.display = '';
      }
    } else {
      // Desktop: reveal all items (CSS handles `.metadata-group__link--hidden` on ≥992px)
      btn.style.display = 'none';
    }
  }

  // Initialise all groups on first load
  const groups = Array.from(document.querySelectorAll('.metadata-group'));
  groups.forEach((group) => setupGroup(group));

  // On resize, only sync visibility – no re-setup needed
  let resizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      groups.forEach((group) => syncVisibility(group));
    }, 150);
  });
}
