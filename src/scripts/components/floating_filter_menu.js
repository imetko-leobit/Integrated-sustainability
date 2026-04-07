/**
 * FloatingFilterMenu
 *
 * Implements the floating filter trigger button and the side-drawer filter
 * panel.  The panel's level-navigation logic mirrors menu_controller.js so
 * the two interactions feel identical to the user.
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

  const allCols = panel.querySelectorAll(".filter-menu__col");

  /**
   * Show the correct column by level id.
   * Mirrors goToLevel() in menu_controller.js.
   */
  function goToLevel(targetId, activeItem, isForward) {
    // Remove active from previous item in the current column
    if (activeItem) {
      const currentCol = activeItem.closest(".filter-menu__col");
      if (currentCol) {
        currentCol
          .querySelectorAll(`.${CLASS_ACTIVE}`)
          .forEach((el) => el.classList.remove(CLASS_ACTIVE));
      }
    }

    // Mark active nav item
    if (activeItem && isForward) {
      activeItem.classList.add(CLASS_ACTIVE);
    }

    // Toggle column visibility
    allCols.forEach((col) => {
      const colId = col.getAttribute("id");
      if (colId === targetId) {
        col.classList.add(CLASS_ACTIVE_LEVEL);
      } else {
        col.classList.remove(CLASS_ACTIVE_LEVEL);
      }
    });

    // Slide the content wrapper to reveal the target level
    const targetCol = panel.querySelector(`#${CSS.escape(targetId)}`);
    if (targetCol && content) {
      const level = parseInt(targetCol.getAttribute("data-level") || "0", 10);
      content.setAttribute("data-current-level", level);
    }
  }

  // ── Open / Close ─────────────────────────────────────────────────────────────

  function openPanel() {
    panel.classList.add(CLASS_OPEN);
    triggerBtn.classList.add("is-active");
    triggerBtn.setAttribute("aria-expanded", "true");
    document.body.style.overflow = "hidden";
    // Always start at level-0
    goToLevel("filter-level-0", null, false);
  }

  function closePanel() {
    panel.classList.remove(CLASS_OPEN);
    triggerBtn.classList.remove("is-active");
    triggerBtn.setAttribute("aria-expanded", "false");
    document.body.style.overflow = "";
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

  // Forward: clicking a filter group navigates into its submenu
  panel.addEventListener("click", (e) => {
    const navItem = e.target.closest(".filter-nav-item[data-target]");
    if (navItem) {
      const targetId = navItem.getAttribute("data-target");
      goToLevel(targetId, navItem, true);
      return;
    }

    // Backward: clicking the submenu header (back button) returns to parent
    const subHeader = e.target.closest(".filter-submenu-header[data-prev-target]");
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
