/******/ (() => { // webpackBootstrap
/*!********************************************************!*\
  !*** ./src/scripts/components/floating_filter_menu.js ***!
  \********************************************************/
function _slicedToArray(r, e) { return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(r) { if (Array.isArray(r)) return r; }
function _toConsumableArray(r) { return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _iterableToArray(r) { if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r); }
function _arrayWithoutHoles(r) { if (Array.isArray(r)) return _arrayLikeToArray(r); }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
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
  var triggerBtns = document.querySelectorAll(".floating-filter-trigger-btn");
  var closeBtn = document.querySelector(".floating-filter-panel__btn-close");
  var backdrop = document.querySelector(".floating-filter-panel__backdrop");
  var content = document.querySelector(".floating-filter-panel__content");
  var clearBtn = document.querySelector(".filter-clear-btn");
  var applyBtn = document.querySelector(".filter-apply-btn");
  var summaryBar = document.querySelector(".filter-summary-bar");
  var summaryChips = document.querySelector(".filter-summary-bar__chips");
  var filterForm = document.querySelector(".filter-form");
  var postTypeToggle = panel.querySelector("#filter-cant-find-toggle");
  var postTypeToggleText = panel.querySelector(".nav-item-toggle .nav-link__text");
  if (!panel || !triggerBtns.length) return;

  // ── Helpers ─────────────────────────────────────────────────────────────────

  var menuToggle = document.querySelector(".menu-toggle");
  var headerWrapper = document.querySelector(".header-wrapper");
  var CLASS_OPEN = "is-open";
  var CLASS_FILTERS_OPEN = "is-filters-open";
  var CLASS_ACTIVE_LEVEL = "active-level";
  var CLASS_ACTIVE = "active";
  var CLASS_HAS_SUBMENU = "has-submenu";
  var SEL_FILTER_COL = ".main-menu__col";
  var SEL_CLOSE_BTN = ".floating-filter-panel__btn-close";
  var SEL_CREDENTIALS_BTN = ".floating-filter-btn-request-credentials";

  /** Mirrors the isMobile() helper in menu_controller.js. */
  var isMobile = function isMobile() {
    return window.innerWidth <= 992;
  };

  // All columns are scoped to the filter panel (same class as main menu).
  var allCols = panel.querySelectorAll(SEL_FILTER_COL);

  /**
   * Build the ordered list of column IDs that must be visible (active-level)
   * to reach a target column, walking up via data-parent-id attributes.
   *
   * Examples:
   *   "filter-level-0"                        → ["filter-level-0"]
   *   "filter-level-industries"               → ["filter-level-0", "filter-level-industries"]
   *   "filter-level-industries-metals-mining" →
   *     ["filter-level-0", "filter-level-industries", "filter-level-industries-metals-mining"]
   */
  function getAncestorChain(targetId) {
    var chain = [];
    var currentId = targetId;
    while (currentId) {
      chain.unshift(currentId);
      if (currentId === "filter-level-0") break;
      var col = panel.querySelector("#".concat(CSS.escape(currentId)));
      var parentId = col ? col.getAttribute("data-parent-id") : null;
      // Default parent is the root when no data-parent-id is set
      currentId = parentId || "filter-level-0";
      // Safety: stop if we've already added this id (prevents infinite loops)
      if (chain.includes(currentId)) break;
    }
    if (!chain.includes("filter-level-0")) chain.unshift("filter-level-0");
    return chain;
  }

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
   *  – On mobile: the full ancestor chain of columns is marked active-level
   *    (so each slide position is occupied) and data-current-level is updated
   *    to trigger the translateX slide animation that reveals the target column.
   *    Level 2 columns slide to translateX(-200%).
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

    // Determine which columns to show: the full ancestor chain from root to target.
    // On mobile this ensures each slide position (0, 1, 2…) is occupied so the
    // translateX animation reveals the correct column.
    var colsToShow = new Set(getAncestorChain(targetId));
    allCols.forEach(function (col) {
      var colId = col.getAttribute("id");
      if (colsToShow.has(colId)) {
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
    triggerBtns.forEach(function (btn) {
      btn.classList.add("is-active");
      btn.setAttribute("aria-expanded", "true");
    });
    document.body.style.overflow = "hidden";
    // On mobile: switch the header hamburger button to its X (open) state so
    // the user can close the filter panel via the same header control.
    // Also add a modifier class to the header wrapper so styles can reflect
    // that the filters are open.
    if (isMobile()) {
      if (menuToggle) {
        menuToggle.classList.add("open");
        menuToggle.setAttribute("aria-expanded", "true");
      }
      if (headerWrapper) headerWrapper.classList.add(CLASS_FILTERS_OPEN);
    }
    // Always start at the root level
    goToLevel("filter-level-0", null, false);
    // Update mobile chips and hide the summary bar while panel is open
    updateMobileChips();
    // Hide the summary bar while the filter panel is open
    if (summaryBar) summaryBar.classList.remove("is-visible");
  }
  function closePanel() {
    panel.classList.remove(CLASS_OPEN);
    triggerBtns.forEach(function (btn) {
      btn.classList.remove("is-active");
      btn.setAttribute("aria-expanded", "false");
    });
    document.body.style.overflow = "";
    // Restore the header hamburger button to its default state (in case it was
    // switched to the X state when the filter panel was opened on mobile).
    if (menuToggle) {
      menuToggle.classList.remove("open");
      menuToggle.setAttribute("aria-expanded", "false");
    }
    if (headerWrapper) headerWrapper.classList.remove(CLASS_FILTERS_OPEN);
    // Reset to root level so the panel is ready on next open
    goToLevel("filter-level-0", null, false);
    // Show the summary bar if there are active filters
    updateSummaryBar();
  }
  function updatePostTypeToggle(activePostType) {
    if (!postTypeToggle || !postTypeToggleText) return;
    var insightPostType = (filterForm === null || filterForm === void 0 ? void 0 : filterForm.dataset.insightPostType) || "insight";
    var switchToInsightLabel = postTypeToggleText.dataset.switchToInsightLabel || "Switch to Insights";
    var switchToProjectsLabel = postTypeToggleText.dataset.switchToProjectsLabel || "Switch to Projects";
    postTypeToggle.checked = activePostType === insightPostType;
    postTypeToggleText.textContent = activePostType === insightPostType ? switchToProjectsLabel : switchToInsightLabel;
    postTypeToggle.setAttribute("aria-label", postTypeToggleText.textContent);
  }
  triggerBtns.forEach(function (btn) {
    btn.addEventListener("click", function () {
      var isOpen = panel.classList.contains(CLASS_OPEN);
      isOpen ? closePanel() : openPanel();
    });
  });
  if (closeBtn) closeBtn.addEventListener("click", closePanel);
  if (backdrop) backdrop.addEventListener("click", closePanel);

  // Allow the .icon inside #library to open the filter panel
  var libraryIcon = document.querySelector("#library .icon");
  if (libraryIcon) {
    libraryIcon.style.cursor = "pointer";
    libraryIcon.addEventListener("click", openPanel);
  }

  // Allow the header menu toggle (menu_controller.js) to close this panel
  // when the user taps the X button while the filter is open on mobile.
  document.addEventListener("requestFilterClose", closePanel);

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
  //  – Desktop: click toggles the sub-column open/closed.
  //  – Back button: always restores the parent level (button is hidden on
  //    desktop via CSS so it only appears on mobile).
  panel.addEventListener("click", function (e) {
    // Forward: clicking a group item (has-submenu) opens its sub-column
    var navItem = e.target.closest(".nav-item.".concat(CLASS_HAS_SUBMENU));
    if (navItem && panel.contains(navItem)) {
      e.preventDefault();
      var targetId = navItem.getAttribute("data-target");
      if (isMobile()) {
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

    // Desktop backdrop: close the panel when clicking outside the filter columns
    if (!isMobile()) {
      if (!e.target.closest(SEL_FILTER_COL) && !e.target.closest(SEL_CLOSE_BTN) && !e.target.closest(SEL_CREDENTIALS_BTN)) {
        closePanel();
      }
    }
  });

  // ── Active filter badge counter ───────────────────────────────────────────────

  function updateBadges() {
    // Sync ALL subcategory-all-checkboxes to reflect their child state.
    // For desktop subcategory headers (inside .submenu-subcategory) the scope is
    // the nearest .submenu-subcategory; for mobile level-2 / flat category headers
    // the scope falls back to the enclosing .main-menu__col.
    panel.querySelectorAll(".subcategory-all-checkbox").forEach(function (allCb) {
      var scope = allCb.closest(".submenu-subcategory") || allCb.closest(".main-menu__col");
      if (!scope) return;
      var childCbs = Array.from(scope.querySelectorAll(".filter-checkbox:not(.subcategory-all-checkbox)"));
      if (childCbs.length === 0) return;
      var checkedCount = childCbs.filter(function (cb) {
        return cb.checked;
      }).length;
      allCb.checked = checkedCount === childCbs.length;
      allCb.indeterminate = checkedCount > 0 && checkedCount < childCbs.length;
    });

    // Per-group state indicators (shown in parent level list on mobile)
    allCols.forEach(function (col) {
      var colId = col.getAttribute("id");
      if (!colId || colId === "filter-level-0") return;

      // Find the nav-item that opens this column
      var navItem = panel.querySelector(".nav-item[data-target=\"".concat(colId, "\"]"));
      if (!navItem) return;

      // On mobile, if this column has level-2 children, aggregate their
      // checkboxes instead of this column's own desktop checkboxes.
      var childCols = Array.from(allCols).filter(function (c) {
        return c.getAttribute("data-parent-id") === colId;
      });
      var checkboxes;
      if (childCols.length > 0) {
        checkboxes = childCols.flatMap(function (c) {
          return Array.from(c.querySelectorAll(".filter-checkbox:not(.subcategory-all-checkbox)"));
        });
      } else {
        checkboxes = Array.from(col.querySelectorAll(".filter-checkbox:not(.category-state-checkbox):not(.subcategory-all-checkbox)"));
      }
      var checkedCount = checkboxes.filter(function (cb) {
        return cb.checked;
      }).length;
      var totalCount = checkboxes.length;

      // Determine state: unchecked / indeterminate / checked
      var state = "unchecked";
      if (totalCount > 0) {
        if (checkedCount === totalCount) {
          state = "checked";
        } else if (checkedCount > 0) {
          state = "indeterminate";
        }
      }
      navItem.setAttribute("data-filter-state", state);

      // Update the real checkbox input to reflect category state
      var stateCheckbox = navItem.querySelector(".category-state-checkbox");
      if (stateCheckbox) {
        stateCheckbox.checked = state === "checked";
        stateCheckbox.indeterminate = state === "indeterminate";
      }
    });

    // Global badge on the trigger button(s)
    var totalChecked = panel.querySelectorAll(".filter-checkbox:not(.category-state-checkbox):checked").length;
    triggerBtns.forEach(function (btn) {
      var globalBadge = btn.querySelector(".floating-filter-btn__badge");
      if (globalBadge) {
        globalBadge.textContent = totalChecked;
        globalBadge.classList.toggle("is-visible", totalChecked > 0);
      }
    });

    // Update the mobile chips inside the panel (level-0 main screen)
    updateMobileChips();
  }
  panel.addEventListener("change", function (e) {
    if (e.target.classList.contains("filter-checkbox")) {
      // Rank single-select enforcement: deselect other rank items when one is selected
      if (e.target.name === "rank") {
        var rankCol = panel.querySelector('[data-filter-key="rank"]');
        if (rankCol && e.target.checked) {
          rankCol.querySelectorAll('input[name="rank"]:not(#' + CSS.escape(e.target.id) + ")").forEach(function (cb) {
            cb.checked = false;
          });
        }
      }

      // Subcategory "select all" checkbox: propagate to all child checkboxes.
      // For desktop subcategory headers (inside .submenu-subcategory) scope to
      // that section; for mobile level-2 / flat category headers fall back to
      // the enclosing .main-menu__col.
      if (e.target.classList.contains("subcategory-all-checkbox")) {
        var scope = e.target.closest(".submenu-subcategory") || e.target.closest(".main-menu__col");
        if (scope) {
          scope.querySelectorAll(".filter-checkbox:not(.subcategory-all-checkbox)").forEach(function (cb) {
            cb.checked = e.target.checked;
          });
        }
      }
      updateBadges();
      dispatchFilterChange();
    }
  });

  // ── Mobile applied chips (inside the level-0 main screen) ────────────────

  /**
   * Populate the .mobile-applied-chips container inside the panel's level-0
   * screen.  Only relevant on mobile — on desktop the element is hidden via CSS.
   * Each chip mirrors the filter-summary-bar chip and lets the user remove a
   * filter without leaving the main screen.
   */
  function updateMobileChips() {
    var mobileChipsEl = panel.querySelector(".mobile-applied-chips");
    if (!mobileChipsEl) return;
    var checkedBoxes = Array.from(panel.querySelectorAll(".filter-checkbox:checked:not(.category-state-checkbox):not(.subcategory-all-checkbox)"));

    // Rebuild chip list
    mobileChipsEl.innerHTML = "";
    checkedBoxes.forEach(function (cb) {
      var chip = buildMobileChip(cb);
      mobileChipsEl.appendChild(chip);
    });
  }

  /**
   * Create a single chip element for the mobile chips container.
   * Clicking the close button unchecks the box and refreshes state.
   */
  function buildMobileChip(cb) {
    var labelEl = cb.closest("label") || (cb.id ? panel.querySelector("label[for=\"".concat(cb.id, "\"]")) : null);
    var labelText = labelEl ? labelEl.textContent.trim() : cb.value.replace(/[-_]/g, " ");
    var chip = document.createElement("span");
    chip.className = "mobile-applied-chips__chip filter-summary-bar__chip";
    chip.setAttribute("role", "listitem");
    var text = document.createElement("span");
    text.textContent = labelText;
    var closeBtn = document.createElement("button");
    closeBtn.className = "mobile-applied-chips__chip-close";
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

  // ── Filter summary bar ───────────────────────────────────────────────────────

  /**
   * Build chips for all currently checked filter checkboxes and toggle the
   * visibility of the summary bar.  The bar is only shown when:
   *   – the filter panel is closed, AND
   *   – at least one filter is checked.
   */
  function updateSummaryBar() {
    if (!summaryBar || !summaryChips) return;
    var checkedBoxes = Array.from(panel.querySelectorAll(".filter-checkbox:checked:not(.category-state-checkbox):not(.subcategory-all-checkbox)"));

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
  function clearFloatingSelections() {
    var shouldSync = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;
    panel.querySelectorAll(".filter-checkbox").forEach(function (checkbox) {
      checkbox.checked = false;
      checkbox.indeterminate = false;
    });
    updateBadges();
    updateSummaryBar();
    if (shouldSync) {
      dispatchFilterChange();
    }
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
      clearFloatingSelections();
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
      var checked = Array.from(col.querySelectorAll(".filter-checkbox:not(.subcategory-all-checkbox):not(.category-state-checkbox):checked")).map(function (cb) {
        return cb.value;
      });
      if (checked.length > 0) {
        // Rank is single-select: store as single value, not array
        if (filterKey === "rank") {
          data[filterKey] = checked[0] || "";
        } else {
          // Multi-select taxonomies: store as array, merge if multiple columns share key
          if (data[filterKey]) {
            data[filterKey] = _toConsumableArray(new Set([].concat(_toConsumableArray(data[filterKey]), _toConsumableArray(checked))));
          } else {
            data[filterKey] = checked;
          }
        }
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
  if (postTypeToggle && filterForm) {
    postTypeToggle.addEventListener("change", function () {
      var activePostType = filterForm.dataset.postType || "";
      var projectPostType = filterForm.dataset.projectPostType || "projects";
      var insightPostType = filterForm.dataset.insightPostType || "insight";
      var nextPostType = activePostType === insightPostType ? projectPostType : insightPostType;
      clearFloatingSelections(false);
      updatePostTypeToggle(nextPostType);
      document.dispatchEvent(new CustomEvent("filterPostTypeChange", {
        bubbles: true,
        detail: {
          postType: nextPostType
        }
      }));
    });
  }

  // ── Sync with hidden filter form (if present) ────────────────────────────────
  // Keep backward-compat: when a .filter-form exists, mirror checkbox values
  // into the corresponding <select> elements so existing FilterHandler.js
  // continues to work without modification.

  document.addEventListener("floatingFilterChange", function (e) {
    if (!filterForm) return;
    var filters = e.detail.filters;
    var changedSelects = new Set();

    // Reset all multiselects in the form
    filterForm.querySelectorAll("select[multiple]").forEach(function (sel) {
      Array.from(sel.options).forEach(function (opt) {
        opt.selected = false;
      });
      changedSelects.add(sel);
    });

    // Reset rank select
    var rankSelect = filterForm.querySelector('select[name="rank"]');
    if (rankSelect) {
      rankSelect.value = "";
      changedSelects.add(rankSelect);
    }
    Object.entries(filters).forEach(function (_ref) {
      var _ref2 = _slicedToArray(_ref, 2),
        key = _ref2[0],
        values = _ref2[1];
      // Handle rank separately (single value, not array)
      if (key === "rank") {
        if (rankSelect) {
          rankSelect.value = values || "";
        }
      } else {
        // Multi-select taxonomy logic
        var sel = filterForm.querySelector("select[name=\"".concat(key, "[]\"]"));
        if (!sel) return;
        changedSelects.add(sel);
        (Array.isArray(values) ? values : []).forEach(function (val) {
          var opt = sel.querySelector("option[value=\"".concat(val, "\"]"));
          if (opt) opt.selected = true;
        });
      }
    });

    // Trigger change on selects because FilterHandler listens on input/select elements.
    changedSelects.forEach(function (selectEl) {
      selectEl.dispatchEvent(new Event("change", {
        bubbles: true
      }));
    });
  });

  // Initialise badges and summary bar
  updateBadges();
  updateSummaryBar();
  updatePostTypeToggle((filterForm === null || filterForm === void 0 ? void 0 : filterForm.dataset.postType) || "");

  // ── Scroll-triggered reveal of floating buttons ──────────────────────────────
  // On desktop the two standalone floating buttons are hidden by default (via CSS)
  // and are revealed once the user scrolls past the top filter option (the
  // .block-section-heading that contains the floating-filter-trigger-btn icon).
  // The .is-scrolled-visible class triggers the CSS fade/slide-in animation.

  var floatingBtnsToReveal = [document.querySelector(".floating-filter-btn.floating-filter-trigger-btn"), document.querySelector(".floating-filter-btn.floating-filter-btn-request-credentials")].filter(Boolean);
  if (floatingBtnsToReveal.length > 0) {
    var filterIconInHeading = document.querySelector("#library .icon");
    var triggerSection = filterIconInHeading ? filterIconInHeading.closest("#library") : document.querySelector("#library");
    if (triggerSection) {
      var REVEAL_OFFSET = 0; // increase this value to show earlier

      var updateFloatingButtonsVisibility = function updateFloatingButtonsVisibility() {
        var rect = triggerSection.getBoundingClientRect();
        var shouldShow = rect.top <= REVEAL_OFFSET;
        floatingBtnsToReveal.forEach(function (btn) {
          btn.classList.toggle("is-scrolled-visible", shouldShow);
        });
      };
      updateFloatingButtonsVisibility();
      window.addEventListener("scroll", updateFloatingButtonsVisibility, {
        passive: true
      });
      window.addEventListener("resize", updateFloatingButtonsVisibility);
    } else {
      floatingBtnsToReveal.forEach(function (btn) {
        return btn.classList.add("is-scrolled-visible");
      });
    }
  }
});
/******/ })()
;