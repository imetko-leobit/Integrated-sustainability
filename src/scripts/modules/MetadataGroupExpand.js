export default function initMetadataGroupExpand() {
  const MOBILE_BREAKPOINT = '(max-width: 991px)';
  const VISIBLE_COUNT = 3;

  function isMobile() {
    return window.matchMedia(MOBILE_BREAKPOINT).matches;
  }

  function setup(group) {
    const linksWrapper = group.querySelector('.metadata-group__links');
    if (!linksWrapper) return;

    const items = Array.from(linksWrapper.children);
    if (items.length <= VISIBLE_COUNT) return;

    // Mark items beyond the first VISIBLE_COUNT as hidden on mobile
    items.forEach((item, index) => {
      if (index >= VISIBLE_COUNT) {
        item.classList.add('metadata-group__link--hidden');
      }
    });

    // Create the expand button if it doesn't already exist
    if (!group.querySelector('.metadata-group__expand-btn')) {
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
    }
  }

  function applyAll() {
    const groups = document.querySelectorAll('.metadata-group');
    if (isMobile()) {
      groups.forEach((group) => setup(group));
    } else {
      // On desktop, ensure items are visible and button is hidden
      groups.forEach((group) => {
        group.querySelectorAll('.metadata-group__link--hidden').forEach((item) => {
          item.classList.remove('metadata-group__link--hidden');
        });
        const btn = group.querySelector('.metadata-group__expand-btn');
        if (btn) btn.style.display = 'none';
      });
    }
  }

  applyAll();

  // Re-evaluate on resize in case breakpoint changes
  window.addEventListener('resize', applyAll);
}
