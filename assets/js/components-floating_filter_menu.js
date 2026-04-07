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
 * panel.  The panel's level-navigation logic mirrors menu_controller.js so
 * the two interactions feel identical to the user.
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
  var allCols = panel.querySelectorAll(".filter-menu__col");

  /**
   * Show the correct column by level id.
   * Mirrors goToLevel() in menu_controller.js.
   */
  function goToLevel(targetId, activeItem, isForward) {
    // Remove active from previous item in the current column
    if (activeItem) {
      var currentCol = activeItem.closest(".filter-menu__col");
      if (currentCol) {
        currentCol.querySelectorAll(".".concat(CLASS_ACTIVE)).forEach(function (el) {
          return el.classList.remove(CLASS_ACTIVE);
        });
      }
    }

    // Mark active nav item
    if (activeItem && isForward) {
      activeItem.classList.add(CLASS_ACTIVE);
    }

    // Toggle column visibility
    allCols.forEach(function (col) {
      var colId = col.getAttribute("id");
      if (colId === targetId) {
        col.classList.add(CLASS_ACTIVE_LEVEL);
      } else {
        col.classList.remove(CLASS_ACTIVE_LEVEL);
      }
    });

    // Slide the content wrapper to reveal the target level
    var targetCol = panel.querySelector("#".concat(CSS.escape(targetId)));
    if (targetCol && content) {
      var level = parseInt(targetCol.getAttribute("data-level") || "0", 10);
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

  // Forward: clicking a filter group navigates into its submenu
  panel.addEventListener("click", function (e) {
    var navItem = e.target.closest(".filter-nav-item[data-target]");
    if (navItem) {
      var targetId = navItem.getAttribute("data-target");
      goToLevel(targetId, navItem, true);
      return;
    }

    // Backward: clicking the submenu header (back button) returns to parent
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