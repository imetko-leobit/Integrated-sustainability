/******/ (() => { // webpackBootstrap
/*!********************************************************!*\
  !*** ./src/scripts/components/floating_filter_menu.js ***!
  \********************************************************/
function _slicedToArray(r, e) { return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(r) { if (Array.isArray(r)) return r; }
/**
 * FloatingFilterMenu
 *
 * Implements the floating filter trigger button and the side-drawer filter
 * panel. The panel's level-navigation logic is identical to menu_controller.js:
 *
 *  – Desktop (> 992 px): hover opens sub-columns displayed side-by-side,
 *    matching the desktop mega-menu behaviour (no sliding, no back button).
 *  – Mobile  (≤ 992 px): tap navigates into a sub-column with a slide
 *    animation and a back button, matching the mobile menu behaviour.
 *
 * Uses the same HTML class names as the main menu (nav-item, navbar-nav,
 * submenu-header, main-menu__col, etc.) so the visual output is identical.
 * All queries are scoped to the filter panel to avoid interfering with the
 * main menu controller.
 */
document.addEventListener("DOMContentLoaded", function () {
  var panel = document.querySelector(".floating-filter-panel");
  var drawer = document.querySelector(".floating-filter-panel__drawer");
  var triggerBtn = document.querySelector(".floating-filter-btn");
  var closeBtn = document.querySelector(".floating-filter-panel__close");
  var backdrop = document.querySelector(".floating-filter-panel__backdrop");
  var content = document.querySelector(".floating-filter-panel__content");
  var clearBtn = document.querySelector(".filter-clear-btn");
  var applyBtn = document.querySelector(".filter-apply-btn");
  var summaryBar = document.querySelector(".filter-summary-bar");
  var summaryChips = document.querySelector(".filter-summary-bar__chips");
  if (!panel || !triggerBtn) return;

  // ── Helpers ─────────────────────────────────────────────────────────────────

  var CLASS_OPEN = "is-open";
  var CLASS_ACTIVE_LEVEL = "active-level";
  var CLASS_ACTIVE = "active";
  var CLASS_HAS_SUBMENU = "has-submenu";

  /** Mirrors the isMobile() helper in menu_controller.js. */
  var isMobile = function isMobile() {
    return window.innerWidth <= 992;
  };

  // All columns are scoped to the filter panel (same class as main menu).
  var allCols = panel.querySelectorAll(".main-menu__col");

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
    allCols.forEach(function (col) {
      col.querySelectorAll(".".concat(CLASS_ACTIVE)).forEach(function (el) {
        return el.classList.remove(CLASS_ACTIVE);
      });
    });

    // Mark the clicked nav item as active
    if (activeItem && isForward) {
      activeItem.classList.add(CLASS_ACTIVE);
    }

    // Show the root column (filter-level-0) alongside the target column.
    allCols.forEach(function (col) {
      var colId = col.getAttribute("id");
      if (colId === targetId || colId === "filter-level-0") {
        col.classList.add(CLASS_ACTIVE_LEVEL);
      } else {
        col.classList.remove(CLASS_ACTIVE_LEVEL);
      }
    });

    // Desktop: expand the drawer when a sub-column is shown.
    if (drawer) {
      drawer.classList.toggle("has-sub-panel", targetId !== "filter-level-0");
    }

    // Mobile only: update the slide animation via data-current-level.
    if (isMobile() && content) {
      var targetCol = panel.querySelector("#".concat(CSS.escape(targetId)));
      if (targetCol) {
        var level = parseInt(targetCol.getAttribute("data-level") || "0", 10);
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
    // Hide the summary bar while the filter panel is open
    if (summaryBar) summaryBar.classList.remove("is-visible");
  }
  function closePanel() {
    panel.classList.remove(CLASS_OPEN);
    triggerBtn.classList.remove("is-active");
    triggerBtn.setAttribute("aria-expanded", "false");
    document.body.style.overflow = "";
    // Reset to root level so the panel is ready on next open
    goToLevel("filter-level-0", null, false);
    // Show the summary bar if there are active filters
    updateSummaryBar();
  }
  triggerBtn.addEventListener("click", function () {
    var isOpen = panel.classList.contains(CLASS_OPEN);
    isOpen ? closePanel() : openPanel();
  });
  if (closeBtn) closeBtn.addEventListener("click", closePanel);
  if (backdrop) backdrop.addEventListener("click", closePanel);

  // Keyboard: Escape closes the panel
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && panel.classList.contains(CLASS_OPEN)) {
      closePanel();
    }
  });

  // ── Level navigation ─────────────────────────────────────────────────────────

  // Desktop: hover over a filter group opens its sub-column (mirrors the
  // mouseenter behaviour of .nav-item in menu_controller.js, but scoped to
  // the filter panel).
  panel.querySelectorAll(".nav-item.".concat(CLASS_HAS_SUBMENU)).forEach(function (navItem) {
    navItem.addEventListener("mouseenter", function () {
      if (!isMobile()) {
        var targetId = navItem.getAttribute("data-target");
        if (targetId) goToLevel(targetId, navItem, true);
      }
    });
  });

  // Click handler (scoped to the filter panel – mirrors menu_controller.js):
  //  – Mobile: tap on a filter group navigates into its sub-column.
  //  – Desktop: click also navigates.
  //  – Back button: always restores the parent level (button is hidden on
  //    desktop via CSS so it only appears on mobile).
  panel.addEventListener("click", function (e) {
    // Forward: clicking a group item (has-submenu) opens its sub-column
    var navItem = e.target.closest(".nav-item.".concat(CLASS_HAS_SUBMENU));
    if (navItem && panel.contains(navItem)) {
      if (isMobile()) {
        e.preventDefault();
        var targetId = navItem.getAttribute("data-target");
        if (targetId) goToLevel(targetId, navItem, true);
      }
      return;
    }

    // Backward: clicking the back button returns to the parent level
    var subHeader = e.target.closest(".submenu-header[data-prev-target]");
    if (subHeader && panel.contains(subHeader)) {
      var prevId = subHeader.getAttribute("data-prev-target");
      goToLevel(prevId, null, false);
      return;
    }
  });

  // ── Active filter badge counter ───────────────────────────────────────────────

  function updateBadges() {
    // Per-group badges (shown in level-0 list, inside the nav-link span)
    allCols.forEach(function (col) {
      var colId = col.getAttribute("id");
      if (!colId || colId === "filter-level-0") return;
      var checkboxes = col.querySelectorAll(".filter-checkbox:checked");
      var count = checkboxes.length;

      // Find the nav-item in level-0 that points to this column
      var navItem = panel.querySelector(".nav-item[data-target=\"".concat(colId, "\"]"));
      if (!navItem) return;
      var badge = navItem.querySelector(".filter-count");
      if (badge) {
        badge.textContent = count;
        badge.classList.toggle("is-visible", count > 0);
      }
    });

    // Global badge on the trigger button
    var totalChecked = panel.querySelectorAll(".filter-checkbox:checked").length;
    var globalBadge = triggerBtn.querySelector(".floating-filter-btn__badge");
    if (globalBadge) {
      globalBadge.textContent = totalChecked;
      globalBadge.classList.toggle("is-visible", totalChecked > 0);
    }
  }
  panel.addEventListener("change", function (e) {
    if (e.target.classList.contains("filter-checkbox")) {
      updateBadges();
      dispatchFilterChange();
    }
  });

  // ── Filter summary bar ───────────────────────────────────────────────────────

  /**
   * Build chips for all currently checked filter checkboxes and toggle the
   * visibility of the summary bar.  The bar is only shown when:
   *   – the filter panel is closed, AND
   *   – at least one filter is checked.
   */
  function updateSummaryBar() {
    if (!summaryBar || !summaryChips) return;
    var checkedBoxes = Array.from(panel.querySelectorAll(".filter-checkbox:checked"));

    // Rebuild chip list
    summaryChips.innerHTML = "";
    checkedBoxes.forEach(function (cb) {
      var chip = buildChip(cb);
      summaryChips.appendChild(chip);
    });

    // Show bar only when panel is closed and there are active filters
    var panelIsOpen = panel.classList.contains(CLASS_OPEN);
    summaryBar.classList.toggle("is-visible", !panelIsOpen && checkedBoxes.length > 0);
  }

  /**
   * Create a single chip element for a given checkbox input.
   * Clicking the close button unchecks the box, updates badges and
   * dispatches a filter change.
   */
  function buildChip(cb) {
    // Derive a human-readable label from the associated <label> element or
    // fall back to the checkbox value.
    var labelEl = cb.closest("label") || (cb.id ? panel.querySelector("label[for=\"".concat(cb.id, "\"]")) : null);
    var labelText = labelEl ? labelEl.textContent.trim() : cb.value.replace(/[-_]/g, " ");
    var chip = document.createElement("span");
    chip.className = "filter-summary-bar__chip";
    chip.setAttribute("role", "listitem");
    var text = document.createElement("span");
    text.textContent = labelText;
    var closeBtn = document.createElement("button");
    closeBtn.className = "filter-summary-bar__chip-close";
    closeBtn.setAttribute("aria-label", "Remove filter: ".concat(labelText));
    closeBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" aria-hidden="true"><path d="M1 1l8 8M9 1l-8 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>';
    closeBtn.addEventListener("click", function () {
      cb.checked = false;
      updateBadges();
      dispatchFilterChange();
      updateSummaryBar();
    });
    chip.appendChild(text);
    chip.appendChild(closeBtn);
    return chip;
  }

  // ── Clear all ────────────────────────────────────────────────────────────────

  if (clearBtn) {
    clearBtn.addEventListener("click", function () {
      panel.querySelectorAll(".filter-checkbox:checked").forEach(function (cb) {
        cb.checked = false;
      });
      updateBadges();
      dispatchFilterChange();
      updateSummaryBar();
    });
  }

  // ── Apply ────────────────────────────────────────────────────────────────────

  if (applyBtn) {
    applyBtn.addEventListener("click", function () {
      dispatchFilterChange();
      closePanel();
    });
  }

  // ── Dispatch filter change event ─────────────────────────────────────────────

  function getFilterData() {
    var data = {};
    allCols.forEach(function (col) {
      var colId = col.getAttribute("id");
      if (!colId || colId === "filter-level-0") return;
      var filterKey = col.getAttribute("data-filter-key");
      if (!filterKey) return;
      var checked = Array.from(col.querySelectorAll(".filter-checkbox:checked")).map(function (cb) {
        return cb.value;
      });
      if (checked.length > 0) {
        data[filterKey] = checked;
      }
    });
    return data;
  }
  function dispatchFilterChange() {
    var event = new CustomEvent("floatingFilterChange", {
      bubbles: true,
      detail: {
        filters: getFilterData()
      }
    });
    document.dispatchEvent(event);
  }

  // ── Sync with hidden filter form (if present) ────────────────────────────────
  // Keep backward-compat: when a .filter-form exists, mirror checkbox values
  // into the corresponding <select> elements so existing FilterHandler.js
  // continues to work without modification.

  document.addEventListener("floatingFilterChange", function (e) {
    var filterForm = document.querySelector(".filter-form");
    if (!filterForm) return;
    var filters = e.detail.filters;

    // Reset all multiselects in the form
    filterForm.querySelectorAll("select[multiple]").forEach(function (sel) {
      Array.from(sel.options).forEach(function (opt) {
        opt.selected = false;
      });
    });
    Object.entries(filters).forEach(function (_ref) {
      var _ref2 = _slicedToArray(_ref, 2),
        key = _ref2[0],
        values = _ref2[1];
      var sel = filterForm.querySelector("select[name=\"".concat(key, "[]\"]"));
      if (!sel) return;
      values.forEach(function (val) {
        var opt = sel.querySelector("option[value=\"".concat(val, "\"]"));
        if (opt) opt.selected = true;
      });
    });

    // Trigger a change event on the form so FilterHandler picks it up
    filterForm.dispatchEvent(new Event("change", {
      bubbles: true
    }));
  });

  // Initialise badges and summary bar
  updateBadges();
  updateSummaryBar();
});
/******/ })()
;