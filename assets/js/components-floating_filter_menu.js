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
 * panel.  The panel's level-navigation logic mirrors menu_controller.js:
 *
 *  – Desktop (> 992 px): hover opens sub-columns displayed side-by-side,
 *    matching the desktop mega-menu behaviour (no sliding, no back button).
 *  – Mobile  (≤ 992 px): tap navigates into a sub-column with a slide
 *    animation and a back button, matching the mobile menu behaviour.
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
  if (!panel || !triggerBtn) return;

  // ── Helpers ─────────────────────────────────────────────────────────────────

  var CLASS_OPEN = "is-open";
  var CLASS_ACTIVE_LEVEL = "active-level";
  var CLASS_ACTIVE = "active";

  /** Mirrors the isMobile() helper in menu_controller.js. */
  var isMobile = function isMobile() {
    return window.innerWidth <= 992;
  };
  var allCols = panel.querySelectorAll(".filter-menu__col");

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
    // On desktop both are visible side-by-side; on mobile the CSS slide
    // hides the root column via the data-current-level transform.
    allCols.forEach(function (col) {
      var colId = col.getAttribute("id");
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
  }
  function closePanel() {
    panel.classList.remove(CLASS_OPEN);
    triggerBtn.classList.remove("is-active");
    triggerBtn.setAttribute("aria-expanded", "false");
    document.body.style.overflow = "";
    // Reset to root level so the panel is ready on next open
    goToLevel("filter-level-0", null, false);
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
  // mouseenter behaviour of .nav-item in menu_controller.js).
  panel.querySelectorAll(".filter-nav-item[data-target]").forEach(function (navItem) {
    navItem.addEventListener("mouseenter", function () {
      if (!isMobile()) {
        var targetId = navItem.getAttribute("data-target");
        goToLevel(targetId, navItem, true);
      }
    });
  });

  // Click handler:
  //  – Mobile: tap on a filter group navigates into its sub-column.
  //  – Desktop: click also navigates (mirrors accessible click on desktop menu).
  //  – Back button: always restores the parent level (button is hidden on
  //    desktop via CSS so it only appears on mobile).
  panel.addEventListener("click", function (e) {
    var navItem = e.target.closest(".filter-nav-item[data-target]");
    if (navItem) {
      if (isMobile()) {
        // Mobile: tap navigates forward into the sub-column
        var targetId = navItem.getAttribute("data-target");
        goToLevel(targetId, navItem, true);
      }
      return;
    }

    // Backward: clicking the back button returns to the parent level
    var subHeader = e.target.closest(".filter-submenu-header[data-prev-target]");
    if (subHeader) {
      var prevId = subHeader.getAttribute("data-prev-target");
      goToLevel(prevId, null, false);
      return;
    }
  });

  // ── Active filter badge counter ───────────────────────────────────────────────

  function updateBadges() {
    // Per-group badges (shown in level-0 list)
    allCols.forEach(function (col) {
      var colId = col.getAttribute("id");
      if (!colId || colId === "filter-level-0") return;
      var checkboxes = col.querySelectorAll(".filter-option-item__checkbox:checked");
      var count = checkboxes.length;

      // Find the nav-item in level-0 that points to this column
      var navItem = panel.querySelector(".filter-nav-item[data-target=\"".concat(colId, "\"]"));
      if (!navItem) return;
      var badge = navItem.querySelector(".filter-nav-item__count");
      if (badge) {
        badge.textContent = count;
        badge.classList.toggle("is-visible", count > 0);
      }
    });

    // Global badge on the trigger button
    var totalChecked = panel.querySelectorAll(".filter-option-item__checkbox:checked").length;
    var globalBadge = triggerBtn.querySelector(".floating-filter-btn__badge");
    if (globalBadge) {
      globalBadge.textContent = totalChecked;
      globalBadge.classList.toggle("is-visible", totalChecked > 0);
    }
  }
  panel.addEventListener("change", function (e) {
    if (e.target.classList.contains("filter-option-item__checkbox")) {
      updateBadges();
      dispatchFilterChange();
    }
  });

  // ── Clear all ────────────────────────────────────────────────────────────────

  if (clearBtn) {
    clearBtn.addEventListener("click", function () {
      panel.querySelectorAll(".filter-option-item__checkbox:checked").forEach(function (cb) {
        cb.checked = false;
      });
      updateBadges();
      dispatchFilterChange();
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
      var checked = Array.from(col.querySelectorAll(".filter-option-item__checkbox:checked")).map(function (cb) {
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

  // Initialise badges
  updateBadges();
});
/******/ })()
;