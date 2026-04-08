/**
 * FloatingFilterMenu
 *
 * Implements the floating filter trigger button and the side-drawer filter
 * panel.  The panel's level-navigation logic mirrors menu_controller.js:
 *
 *  – Desktop (> 992 px): hover opens sub-columns displayed side-by-side,
 *    matching the desktop mega-menu behaviour (no sliding, no back button).
 *  – Mobile  (≤ 992 px): tap navigates into a sub-column with a slide
 *    animation and a back button, matching the mobile menu behaviour.
 */
document.addEventListener("DOMContentLoaded", () => {
  const panel = document.querySelector(".floating-filter-panel");
  const drawer = document.querySelector(".floating-filter-panel__drawer");
  const triggerBtn = document.querySelector(".floating-filter-btn");
  const closeBtn = document.querySelector(".floating-filter-panel__close");
  const backdrop = document.querySelector(".floating-filter-panel__backdrop");
  const content = document.querySelector(".floating-filter-panel__content");
  const clearBtn = document.querySelector(".filter-clear-btn");
  const applyBtn = document.querySelector(".filter-apply-btn");

  if (!panel || !triggerBtn) return;

  // ── Helpers ─────────────────────────────────────────────────────────────────

  const CLASS_OPEN = "is-open";
  const CLASS_ACTIVE_LEVEL = "active-level";
  const CLASS_ACTIVE = "active";

  /** Mirrors the isMobile() helper in menu_controller.js. */
  const isMobile = () => window.innerWidth <= 992;

  const allCols = panel.querySelectorAll(".filter-menu__col");

  /**
   * Navigate to a filter level column.
   *
   * Mirrors the goToLevel() logic in menu_controller.js:
   *
   *  – On desktop: both the root column (filter-level-0) and the target
   *    column are marked active-level so they sit side-by-side.  The
   *    "has-sub-panel" class is toggled on the drawer so CSS can widen it.
   *    data-current-level is NOT updated (no slide animation on desktop).
   *
   *  – On mobile: root + target column are both marked active-level (so
   *    the CSS slide works), and data-current-level is updated to trigger
   *    the translateX slide animation that reveals the target column.
   */
  function goToLevel(targetId, activeItem, isForward) {
    // Clear active state across all columns
    allCols.forEach((col) => {
      col
        .querySelectorAll(`.${CLASS_ACTIVE}`)
        .forEach((el) => el.classList.remove(CLASS_ACTIVE));
    });

    // Mark the clicked nav item as active
    if (activeItem && isForward) {
      activeItem.classList.add(CLASS_ACTIVE);
    }

    // Show the root column (filter-level-0) alongside the target column.
    // On desktop both are visible side-by-side; on mobile the CSS slide
    // hides the root column via the data-current-level transform.
    allCols.forEach((col) => {
      const colId = col.getAttribute("id");
      if (colId === targetId || colId === "filter-level-0") {
        col.classList.add(CLASS_ACTIVE_LEVEL);
      } else {
        col.classList.remove(CLASS_ACTIVE_LEVEL);
      }
    });

    // Desktop: expand the drawer when a sub-column is shown (like the
    // desktop menu revealing a second column on hover).
    if (drawer) {
      drawer.classList.toggle("has-sub-panel", targetId !== "filter-level-0");
    }

    // Mobile only: update the slide animation via data-current-level
    // (mirrors the main-menu__content[data-current-level] pattern).
    if (isMobile() && content) {
      const targetCol = panel.querySelector(`#${CSS.escape(targetId)}`);
      if (targetCol) {
        const level = parseInt(
          targetCol.getAttribute("data-level") || "0",
          10
        );
        content.setAttribute("data-current-level", level);
      }
    }
  }

  // ── Open / Close ─────────────────────────────────────────────────────────────

  function openPanel() {
    panel.classList.add(CLASS_OPEN);
    triggerBtn.classList.add("is-active");
    triggerBtn.setAttribute("aria-expanded", "true");
    document.body.style.overflow = "hidden";
    // Always start at the root level
    goToLevel("filter-level-0", null, false);
  }

  function closePanel() {
    panel.classList.remove(CLASS_OPEN);
    triggerBtn.classList.remove("is-active");
    triggerBtn.setAttribute("aria-expanded", "false");
    document.body.style.overflow = "";
    // Reset to root level so the panel is ready on next open
    goToLevel("filter-level-0", null, false);
  }

  triggerBtn.addEventListener("click", () => {
    const isOpen = panel.classList.contains(CLASS_OPEN);
    isOpen ? closePanel() : openPanel();
  });

  if (closeBtn) closeBtn.addEventListener("click", closePanel);
  if (backdrop) backdrop.addEventListener("click", closePanel);

  // Keyboard: Escape closes the panel
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && panel.classList.contains(CLASS_OPEN)) {
      closePanel();
    }
  });

  // ── Level navigation ─────────────────────────────────────────────────────────

  // Desktop: hover over a filter group opens its sub-column (mirrors the
  // mouseenter behaviour of .nav-item in menu_controller.js).
  panel.querySelectorAll(".filter-nav-item[data-target]").forEach((navItem) => {
    navItem.addEventListener("mouseenter", () => {
      if (!isMobile()) {
        const targetId = navItem.getAttribute("data-target");
        goToLevel(targetId, navItem, true);
      }
    });
  });

  // Click handler:
  //  – Mobile: tap on a filter group navigates into its sub-column.
  //  – Desktop: click also navigates (mirrors accessible click on desktop menu).
  //  – Back button: always restores the parent level (button is hidden on
  //    desktop via CSS so it only appears on mobile).
  panel.addEventListener("click", (e) => {
    const navItem = e.target.closest(".filter-nav-item[data-target]");
    if (navItem) {
      if (isMobile()) {
        // Mobile: tap navigates forward into the sub-column
        const targetId = navItem.getAttribute("data-target");
        goToLevel(targetId, navItem, true);
      }
      return;
    }

    // Backward: clicking the back button returns to the parent level
    const subHeader = e.target.closest(
      ".filter-submenu-header[data-prev-target]"
    );
    if (subHeader) {
      const prevId = subHeader.getAttribute("data-prev-target");
      goToLevel(prevId, null, false);
      return;
    }
  });

  // ── Active filter badge counter ───────────────────────────────────────────────

  function updateBadges() {
    // Per-group badges (shown in level-0 list)
    allCols.forEach((col) => {
      const colId = col.getAttribute("id");
      if (!colId || colId === "filter-level-0") return;

      const checkboxes = col.querySelectorAll(".filter-option-item__checkbox:checked");
      const count = checkboxes.length;

      // Find the nav-item in level-0 that points to this column
      const navItem = panel.querySelector(`.filter-nav-item[data-target="${colId}"]`);
      if (!navItem) return;

      const badge = navItem.querySelector(".filter-nav-item__count");
      if (badge) {
        badge.textContent = count;
        badge.classList.toggle("is-visible", count > 0);
      }
    });

    // Global badge on the trigger button
    const totalChecked = panel.querySelectorAll(
      ".filter-option-item__checkbox:checked"
    ).length;
    const globalBadge = triggerBtn.querySelector(".floating-filter-btn__badge");
    if (globalBadge) {
      globalBadge.textContent = totalChecked;
      globalBadge.classList.toggle("is-visible", totalChecked > 0);
    }
  }

  panel.addEventListener("change", (e) => {
    if (e.target.classList.contains("filter-option-item__checkbox")) {
      updateBadges();
      dispatchFilterChange();
    }
  });

  // ── Clear all ────────────────────────────────────────────────────────────────

  if (clearBtn) {
    clearBtn.addEventListener("click", () => {
      panel
        .querySelectorAll(".filter-option-item__checkbox:checked")
        .forEach((cb) => {
          cb.checked = false;
        });
      updateBadges();
      dispatchFilterChange();
    });
  }

  // ── Apply ────────────────────────────────────────────────────────────────────

  if (applyBtn) {
    applyBtn.addEventListener("click", () => {
      dispatchFilterChange();
      closePanel();
    });
  }

  // ── Dispatch filter change event ─────────────────────────────────────────────

  function getFilterData() {
    const data = {};
    allCols.forEach((col) => {
      const colId = col.getAttribute("id");
      if (!colId || colId === "filter-level-0") return;

      const filterKey = col.getAttribute("data-filter-key");
      if (!filterKey) return;

      const checked = Array.from(
        col.querySelectorAll(".filter-option-item__checkbox:checked")
      ).map((cb) => cb.value);

      if (checked.length > 0) {
        data[filterKey] = checked;
      }
    });
    return data;
  }

  function dispatchFilterChange() {
    const event = new CustomEvent("floatingFilterChange", {
      bubbles: true,
      detail: { filters: getFilterData() },
    });
    document.dispatchEvent(event);
  }

  // ── Sync with hidden filter form (if present) ────────────────────────────────
  // Keep backward-compat: when a .filter-form exists, mirror checkbox values
  // into the corresponding <select> elements so existing FilterHandler.js
  // continues to work without modification.

  document.addEventListener("floatingFilterChange", (e) => {
    const filterForm = document.querySelector(".filter-form");
    if (!filterForm) return;

    const filters = e.detail.filters;

    // Reset all multiselects in the form
    filterForm.querySelectorAll("select[multiple]").forEach((sel) => {
      Array.from(sel.options).forEach((opt) => {
        opt.selected = false;
      });
    });

    Object.entries(filters).forEach(([key, values]) => {
      const sel = filterForm.querySelector(`select[name="${key}[]"]`);
      if (!sel) return;
      values.forEach((val) => {
        const opt = sel.querySelector(`option[value="${val}"]`);
        if (opt) opt.selected = true;
      });
    });

    // Trigger a change event on the form so FilterHandler picks it up
    filterForm.dispatchEvent(new Event("change", { bubbles: true }));
  });

  // Initialise badges
  updateBadges();
});