document.addEventListener("DOMContentLoaded", () => {
  const panel = document.querySelector(".floating-filter-panel");
  const drawer = document.querySelector(".floating-filter-panel__drawer");
  const triggerBtns = document.querySelectorAll(".floating-filter-trigger-btn");
  const closeBtn = document.querySelector(".floating-filter-panel__btn-close");
  const backdrop = document.querySelector(".floating-filter-panel__backdrop");
  const content = document.querySelector(".floating-filter-panel__content");
  const clearBtn = document.querySelector(".filter-clear-btn");
  const applyBtn = document.querySelector(".filter-apply-btn");
  const summaryBar = document.querySelector(".filter-summary-bar");
  const summaryChips = document.querySelector(".filter-summary-bar__chips");
  const filterForm = document.querySelector(".filter-form");
  const postTypeToggle = panel.querySelector("#filter-cant-find-toggle");
  const postTypeToggleText = panel.querySelector(
    ".nav-item-toggle .nav-link__text"
  );
  if (!panel || !triggerBtns.length) return;
  const menuToggle = document.querySelector(".menu-toggle");
  const headerWrapper = document.querySelector(".header-wrapper");
  const CLASS_OPEN = "is-open";
  const CLASS_FILTERS_OPEN = "is-filters-open";
  const CLASS_ACTIVE_LEVEL = "active-level";
  const CLASS_ACTIVE = "active";
  const CLASS_HAS_SUBMENU = "has-submenu";
  const SEL_FILTER_COL = ".main-menu__col";
  const SEL_CLOSE_BTN = ".floating-filter-panel__btn-close";
  const SEL_CREDENTIALS_BTN = ".floating-filter-btn-request-credentials";
  const isMobile = () => window.innerWidth <= 992;
  const allCols = panel.querySelectorAll(SEL_FILTER_COL);
  function getAncestorChain(targetId) {
    const chain = [];
    let currentId = targetId;
    while (currentId) {
      chain.unshift(currentId);
      if (currentId === "filter-level-0") break;
      const col = panel.querySelector(`#${CSS.escape(currentId)}`);
      const parentId = col ? col.getAttribute("data-parent-id") : null;
      currentId = parentId || "filter-level-0";
      if (chain.includes(currentId)) break;
    }
    if (!chain.includes("filter-level-0")) chain.unshift("filter-level-0");
    return chain;
  }
  function goToLevel(targetId, activeItem, isForward) {
    allCols.forEach((col) => {
      col.querySelectorAll(`.${CLASS_ACTIVE}`).forEach((el) => el.classList.remove(CLASS_ACTIVE));
    });
    if (activeItem && isForward) {
      activeItem.classList.add(CLASS_ACTIVE);
    }
    const colsToShow = new Set(getAncestorChain(targetId));
    allCols.forEach((col) => {
      const colId = col.getAttribute("id");
      if (colsToShow.has(colId)) {
        col.classList.add(CLASS_ACTIVE_LEVEL);
      } else {
        col.classList.remove(CLASS_ACTIVE_LEVEL);
      }
    });
    if (drawer) {
      drawer.classList.toggle("has-sub-panel", targetId !== "filter-level-0");
    }
    if (isMobile() && content) {
      const targetCol = panel.querySelector(`#${CSS.escape(targetId)}`);
      if (targetCol) {
        const level = parseInt(targetCol.getAttribute("data-level") || "0", 10);
        content.setAttribute("data-current-level", level);
      }
    }
  }
  function openPanel() {
    panel.classList.add(CLASS_OPEN);
    triggerBtns.forEach((btn) => {
      btn.classList.add("is-active");
      btn.setAttribute("aria-expanded", "true");
    });
    document.body.style.overflow = "hidden";
    if (isMobile()) {
      if (menuToggle) {
        menuToggle.classList.add("open");
        menuToggle.setAttribute("aria-expanded", "true");
      }
      if (headerWrapper) headerWrapper.classList.add(CLASS_FILTERS_OPEN);
    }
    goToLevel("filter-level-0", null, false);
    updateMobileChips();
    if (summaryBar) summaryBar.classList.remove("is-visible");
  }
  function closePanel() {
    panel.classList.remove(CLASS_OPEN);
    triggerBtns.forEach((btn) => {
      btn.classList.remove("is-active");
      btn.setAttribute("aria-expanded", "false");
    });
    document.body.style.overflow = "";
    if (menuToggle) {
      menuToggle.classList.remove("open");
      menuToggle.setAttribute("aria-expanded", "false");
    }
    if (headerWrapper) headerWrapper.classList.remove(CLASS_FILTERS_OPEN);
    goToLevel("filter-level-0", null, false);
    updateSummaryBar();
  }
  function updatePostTypeToggle(activePostType) {
    if (!postTypeToggle || !postTypeToggleText) return;
    const insightPostType = (filterForm == null ? void 0 : filterForm.dataset.insightPostType) || "insight";
    const switchToInsightLabel = postTypeToggleText.dataset.switchToInsightLabel || "Switch to Insights";
    const switchToProjectsLabel = postTypeToggleText.dataset.switchToProjectsLabel || "Switch to Projects";
    postTypeToggle.checked = activePostType === insightPostType;
    postTypeToggleText.textContent = activePostType === insightPostType ? switchToProjectsLabel : switchToInsightLabel;
    postTypeToggle.setAttribute("aria-label", postTypeToggleText.textContent);
  }
  triggerBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      const isOpen = panel.classList.contains(CLASS_OPEN);
      isOpen ? closePanel() : openPanel();
    });
  });
  if (closeBtn) closeBtn.addEventListener("click", closePanel);
  if (backdrop) backdrop.addEventListener("click", closePanel);
  const libraryIcon = document.querySelector("#library .icon");
  if (libraryIcon) {
    libraryIcon.style.cursor = "pointer";
    libraryIcon.addEventListener("click", openPanel);
  }
  document.addEventListener("requestFilterClose", closePanel);
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && panel.classList.contains(CLASS_OPEN)) {
      closePanel();
    }
  });
  panel.querySelectorAll(`.nav-item.${CLASS_HAS_SUBMENU}`).forEach((navItem) => {
    navItem.addEventListener("mouseenter", () => {
      if (!isMobile()) {
        const targetId = navItem.getAttribute("data-target");
        if (targetId) goToLevel(targetId, navItem, true);
      }
    });
  });
  panel.addEventListener("click", (e) => {
    const navItem = e.target.closest(`.nav-item.${CLASS_HAS_SUBMENU}`);
    if (navItem && panel.contains(navItem)) {
      e.preventDefault();
      const targetId = navItem.getAttribute("data-target");
      if (isMobile()) {
        if (targetId) goToLevel(targetId, navItem, true);
      }
      return;
    }
    const subHeader = e.target.closest(".submenu-header[data-prev-target]");
    if (subHeader && panel.contains(subHeader)) {
      const prevId = subHeader.getAttribute("data-prev-target");
      goToLevel(prevId, null, false);
      return;
    }
    if (!isMobile()) {
      if (!e.target.closest(SEL_FILTER_COL) && !e.target.closest(SEL_CLOSE_BTN) && !e.target.closest(SEL_CREDENTIALS_BTN)) {
        closePanel();
      }
    }
  });
  function getColDescendantCheckboxes(col) {
    const colId = col.getAttribute("id");
    const childCols = Array.from(allCols).filter(
      (c) => c.getAttribute("data-parent-id") === colId
    );
    if (childCols.length > 0) {
      return childCols.flatMap(getColDescendantCheckboxes);
    }
    return Array.from(
      col.querySelectorAll(
        ".filter-checkbox:not(.subcategory-all-checkbox):not(.category-state-checkbox):not(.subcategory-desktop-all-cb)"
      )
    );
  }
  function updateBadges() {
    allCols.forEach((col) => {
      const allCb = col.querySelector(".subcategory-all-checkbox");
      if (!allCb) return;
      const childCbs = Array.from(
        col.querySelectorAll(".filter-checkbox:not(.subcategory-all-checkbox)")
      );
      if (childCbs.length === 0) return;
      const checkedCount = childCbs.filter((cb) => cb.checked).length;
      allCb.checked = checkedCount === childCbs.length;
      allCb.indeterminate = checkedCount > 0 && checkedCount < childCbs.length;
    });
    allCols.forEach((col) => {
      const colId = col.getAttribute("id");
      if (!colId || colId === "filter-level-0") return;
      const navItem = panel.querySelector(`.nav-item[data-target="${colId}"]`);
      if (!navItem) return;
      const checkboxes = getColDescendantCheckboxes(col);
      const checkedCount = checkboxes.filter((cb) => cb.checked).length;
      const totalCount = checkboxes.length;
      let state = "unchecked";
      if (totalCount > 0) {
        if (checkedCount === totalCount) {
          state = "checked";
        } else if (checkedCount > 0) {
          state = "indeterminate";
        }
      }
      navItem.setAttribute("data-filter-state", state);
      const stateCheckbox = navItem.querySelector(".category-state-checkbox");
      if (stateCheckbox) {
        stateCheckbox.checked = state === "checked";
        stateCheckbox.indeterminate = state === "indeterminate";
      }
      const desktopAllCb = navItem.querySelector(".subcategory-desktop-all-cb");
      if (desktopAllCb) {
        desktopAllCb.checked = state === "checked";
        desktopAllCb.indeterminate = state === "indeterminate";
      }
    });
    const totalChecked = panel.querySelectorAll(
      ".filter-checkbox:not(.category-state-checkbox):not(.subcategory-desktop-all-cb):checked"
    ).length;
    triggerBtns.forEach((btn) => {
      const globalBadge = btn.querySelector(".floating-filter-btn__badge");
      if (globalBadge) {
        globalBadge.textContent = totalChecked;
        globalBadge.classList.toggle("is-visible", totalChecked > 0);
      }
    });
    updateMobileChips();
  }
  panel.addEventListener("change", (e) => {
    if (e.target.classList.contains("filter-checkbox")) {
      if (e.target.name === "rank") {
        const rankCol = panel.querySelector('[data-filter-key="rank"]');
        if (rankCol && e.target.checked) {
          rankCol.querySelectorAll(
            'input[name="rank"]:not(#' + CSS.escape(e.target.id) + ")"
          ).forEach((cb) => {
            cb.checked = false;
          });
        }
      }
      if (e.target.classList.contains("subcategory-all-checkbox")) {
        const col = e.target.closest(".main-menu__col");
        if (col) {
          col.querySelectorAll(".filter-checkbox:not(.subcategory-all-checkbox)").forEach((cb) => {
            cb.checked = e.target.checked;
          });
        }
      }
      if (e.target.classList.contains("subcategory-desktop-all-cb")) {
        const navItem = e.target.closest(".nav-item.has-submenu");
        const targetId = navItem ? navItem.getAttribute("data-target") : null;
        const targetCol = targetId ? panel.querySelector(`#${CSS.escape(targetId)}`) : null;
        if (targetCol) {
          getColDescendantCheckboxes(targetCol).forEach((cb) => {
            cb.checked = e.target.checked;
          });
        }
      }
      updateBadges();
      dispatchFilterChange();
    }
  });
  function updateMobileChips() {
    const mobileChipsEl = panel.querySelector(".mobile-applied-chips");
    if (!mobileChipsEl) return;
    const checkedBoxes = Array.from(
      panel.querySelectorAll(
        ".filter-checkbox:checked:not(.category-state-checkbox):not(.subcategory-all-checkbox):not(.subcategory-desktop-all-cb)"
      )
    );
    mobileChipsEl.innerHTML = "";
    checkedBoxes.forEach((cb) => {
      const chip = buildMobileChip(cb);
      mobileChipsEl.appendChild(chip);
    });
  }
  function buildMobileChip(cb) {
    const labelEl = cb.closest("label") || (cb.id ? panel.querySelector(`label[for="${cb.id}"]`) : null);
    const labelText = labelEl ? labelEl.textContent.trim() : cb.value.replace(/[-_]/g, " ");
    const chip = document.createElement("span");
    chip.className = "mobile-applied-chips__chip filter-summary-bar__chip";
    chip.setAttribute("role", "listitem");
    const text = document.createElement("span");
    text.textContent = labelText;
    const closeBtn2 = document.createElement("button");
    closeBtn2.className = "mobile-applied-chips__chip-close";
    closeBtn2.setAttribute("aria-label", `Remove filter: ${labelText}`);
    closeBtn2.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" aria-hidden="true"><path d="M1 1l8 8M9 1l-8 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>';
    closeBtn2.addEventListener("click", () => {
      cb.checked = false;
      updateBadges();
      dispatchFilterChange();
      updateSummaryBar();
    });
    chip.appendChild(text);
    chip.appendChild(closeBtn2);
    return chip;
  }
  function updateSummaryBar() {
    if (!summaryBar || !summaryChips) return;
    const checkedBoxes = Array.from(
      panel.querySelectorAll(
        ".filter-checkbox:checked:not(.category-state-checkbox):not(.subcategory-all-checkbox):not(.subcategory-desktop-all-cb)"
      )
    );
    summaryChips.innerHTML = "";
    checkedBoxes.forEach((cb) => {
      const chip = buildChip(cb);
      summaryChips.appendChild(chip);
    });
    const panelIsOpen = panel.classList.contains(CLASS_OPEN);
    summaryBar.classList.toggle(
      "is-visible",
      !panelIsOpen && checkedBoxes.length > 0
    );
  }
  function clearFloatingSelections(shouldSync = true) {
    panel.querySelectorAll(".filter-checkbox").forEach((checkbox) => {
      checkbox.checked = false;
      checkbox.indeterminate = false;
    });
    updateBadges();
    updateSummaryBar();
    if (shouldSync) {
      dispatchFilterChange();
    }
  }
  function buildChip(cb) {
    const labelEl = cb.closest("label") || (cb.id ? panel.querySelector(`label[for="${cb.id}"]`) : null);
    const labelText = labelEl ? labelEl.textContent.trim() : cb.value.replace(/[-_]/g, " ");
    const chip = document.createElement("span");
    chip.className = "filter-summary-bar__chip";
    chip.setAttribute("role", "listitem");
    const text = document.createElement("span");
    text.textContent = labelText;
    const closeBtn2 = document.createElement("button");
    closeBtn2.className = "filter-summary-bar__chip-close";
    closeBtn2.setAttribute("aria-label", `Remove filter: ${labelText}`);
    closeBtn2.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" aria-hidden="true"><path d="M1 1l8 8M9 1l-8 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>';
    closeBtn2.addEventListener("click", () => {
      cb.checked = false;
      updateBadges();
      dispatchFilterChange();
      updateSummaryBar();
    });
    chip.appendChild(text);
    chip.appendChild(closeBtn2);
    return chip;
  }
  if (clearBtn) {
    clearBtn.addEventListener("click", () => {
      clearFloatingSelections();
    });
  }
  if (applyBtn) {
    applyBtn.addEventListener("click", () => {
      dispatchFilterChange();
      closePanel();
    });
  }
  function getFilterData() {
    const data = {};
    allCols.forEach((col) => {
      const colId = col.getAttribute("id");
      if (!colId || colId === "filter-level-0") return;
      const filterKey = col.getAttribute("data-filter-key");
      if (!filterKey) return;
      const checked = Array.from(
        col.querySelectorAll(
          ".filter-checkbox:not(.subcategory-all-checkbox):not(.category-state-checkbox):not(.subcategory-desktop-all-cb):checked"
        )
      ).map((cb) => cb.value);
      if (checked.length > 0) {
        if (filterKey === "rank") {
          data[filterKey] = checked[0] || "";
        } else {
          if (data[filterKey]) {
            data[filterKey] = [.../* @__PURE__ */ new Set([...data[filterKey], ...checked])];
          } else {
            data[filterKey] = checked;
          }
        }
      }
    });
    return data;
  }
  function dispatchFilterChange() {
    const event = new CustomEvent("floatingFilterChange", {
      bubbles: true,
      detail: { filters: getFilterData() }
    });
    document.dispatchEvent(event);
  }
  if (postTypeToggle && filterForm) {
    postTypeToggle.addEventListener("change", () => {
      const activePostType = filterForm.dataset.postType || "";
      const projectPostType = filterForm.dataset.projectPostType || "projects";
      const insightPostType = filterForm.dataset.insightPostType || "insight";
      const nextPostType = activePostType === insightPostType ? projectPostType : insightPostType;
      clearFloatingSelections(false);
      updatePostTypeToggle(nextPostType);
      document.dispatchEvent(
        new CustomEvent("filterPostTypeChange", {
          bubbles: true,
          detail: { postType: nextPostType }
        })
      );
    });
  }
  document.addEventListener("floatingFilterChange", (e) => {
    if (!filterForm) return;
    const filters = e.detail.filters;
    const changedSelects = /* @__PURE__ */ new Set();
    filterForm.querySelectorAll("select[multiple]").forEach((sel) => {
      Array.from(sel.options).forEach((opt) => {
        opt.selected = false;
      });
      changedSelects.add(sel);
    });
    const rankSelect = filterForm.querySelector('select[name="rank"]');
    if (rankSelect) {
      rankSelect.value = "";
      changedSelects.add(rankSelect);
    }
    Object.entries(filters).forEach(([key, values]) => {
      if (key === "rank") {
        if (rankSelect) {
          rankSelect.value = values || "";
        }
      } else {
        const sel = filterForm.querySelector(`select[name="${key}[]"]`);
        if (!sel) return;
        changedSelects.add(sel);
        (Array.isArray(values) ? values : []).forEach((val) => {
          const opt = sel.querySelector(`option[value="${val}"]`);
          if (opt) opt.selected = true;
        });
      }
    });
    changedSelects.forEach((selectEl) => {
      selectEl.dispatchEvent(new Event("change", { bubbles: true }));
    });
  });
  panel.querySelectorAll(".nav-item.has-submenu[data-target]").forEach((navItem) => {
    const col = navItem.closest(".main-menu__col");
    if (!col || col.getAttribute("data-level") === "0") return;
    const targetId = navItem.getAttribute("data-target");
    const targetCol = targetId ? panel.querySelector(`#${CSS.escape(targetId)}`) : null;
    if (!targetCol) return;
    if (getColDescendantCheckboxes(targetCol).length === 0) return;
    const navLink = navItem.querySelector(".nav-link");
    if (!navLink) return;
    const cb = document.createElement("input");
    cb.type = "checkbox";
    cb.className = "filter-checkbox subcategory-desktop-all-cb";
    cb.tabIndex = -1;
    cb.setAttribute(
      "aria-label",
      `Select all ${navLink.textContent.trim()}`
    );
    cb.addEventListener("click", (e) => {
      if (!isMobile()) e.stopPropagation();
    });
    navItem.insertBefore(cb, navLink);
  });
  updateBadges();
  updateSummaryBar();
  updatePostTypeToggle((filterForm == null ? void 0 : filterForm.dataset.postType) || "");
  const floatingBtnsToReveal = [
    document.querySelector(".floating-filter-btn.floating-filter-trigger-btn"),
    document.querySelector(
      ".floating-filter-btn.floating-filter-btn-request-credentials"
    )
  ].filter(Boolean);
  if (floatingBtnsToReveal.length > 0) {
    const filterIconInHeading = document.querySelector("#library .icon");
    const triggerSection = filterIconInHeading ? filterIconInHeading.closest("#library") : document.querySelector("#library");
    if (triggerSection) {
      const REVEAL_OFFSET = 0;
      const updateFloatingButtonsVisibility = () => {
        const rect = triggerSection.getBoundingClientRect();
        const shouldShow = rect.top <= REVEAL_OFFSET;
        floatingBtnsToReveal.forEach((btn) => {
          btn.classList.toggle("is-scrolled-visible", shouldShow);
        });
      };
      updateFloatingButtonsVisibility();
      window.addEventListener("scroll", updateFloatingButtonsVisibility, {
        passive: true
      });
      window.addEventListener("resize", updateFloatingButtonsVisibility);
    } else {
      floatingBtnsToReveal.forEach(
        (btn) => btn.classList.add("is-scrolled-visible")
      );
    }
  }
});
