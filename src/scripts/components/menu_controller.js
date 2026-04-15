document.addEventListener("DOMContentLoaded", () => {
  const megaMenuContent = document.querySelector(".main-menu__content");
  const menuToggle = document.querySelector(".menu-toggle");
  const menuCloseToggle = document.querySelector(".menu-close-toggle");
  const megaMenu = document.getElementById("main-menu");
  const body = document.body;

  const CLASS_OPEN = "menu-is-open";
  const CLASS_ACTIVE = "active";
  const CLASS_ACTIVE_LEVEL = "active-level";
  const CLASS_HAS_SUBMENU = "has-submenu";
  const ATTR_TARGET = "data-target";
  const ATTR_PREV_TARGET = "data-prev-target";
  const ATTR_LEVEL = "data-level";

  const isMobile = () => window.innerWidth <= 992;

  // Select all menu columns scoped to the main menu element so that filter
  // panel columns (which also use .main-menu__col) are not affected.
  const allLevels = megaMenuContent
    ? megaMenuContent.querySelectorAll(".main-menu__col")
    : document.querySelectorAll(".main-menu__col");

  /**
   * Level navigation logic
   */
  function goToLevel(targetLevelNum, clickedItem, targetId, isGoingForward) {
    const currentColumn = clickedItem?.closest(".main-menu__col");

    if (currentColumn) {
      currentColumn
        .querySelectorAll(`.${CLASS_ACTIVE}`)
        .forEach((el) => el.classList.remove(CLASS_ACTIVE));
    }

    allLevels.forEach((col) => {
      const colLevel = parseInt(col.getAttribute(ATTR_LEVEL));
      if (colLevel >= targetLevelNum) {
        col
          .querySelectorAll(`.${CLASS_ACTIVE}`)
          .forEach((el) => el.classList.remove(CLASS_ACTIVE));
      }
    });

    if (clickedItem && isGoingForward) {
      clickedItem.classList.add(CLASS_ACTIVE);
    }

    allLevels.forEach((levelCol) => {
      const levelId = levelCol.getAttribute("id");
      // Keep parent columns visible on Desktop
      if (targetId === levelId || targetId.startsWith(levelId + "-")) {
        levelCol.classList.add(CLASS_ACTIVE_LEVEL);
      } else {
        levelCol.classList.remove(CLASS_ACTIVE_LEVEL);
      }
    });

    if (isMobile()) {
      megaMenuContent.setAttribute("data-current-level", targetLevelNum);
    }
  }

  // --- DESKTOP HOVER ---
  // Scoped to the main menu element to avoid attaching handlers to filter
  // panel nav-items that use the same .nav-item class.
  const menuNavItems = megaMenuContent
    ? megaMenuContent.querySelectorAll(".nav-item")
    : document.querySelectorAll(".nav-item");

  menuNavItems.forEach((item) => {
    item.addEventListener("mouseenter", () => {
      if (!isMobile()) {
        const hasSubmenu = item.classList.contains(CLASS_HAS_SUBMENU);
        const currentLevelNum = parseInt(
          item.closest(".main-menu__col").getAttribute(ATTR_LEVEL),
        );

        if (hasSubmenu) {
          // If item has submenu, open it
          const targetId = item.getAttribute(ATTR_TARGET);
          goToLevel(currentLevelNum + 1, item, targetId, true);
        } else {
          // If item DOES NOT have submenu, clear deeper levels but keep current level active
          // We pass the parent ID of the current column to keep it and its ancestors visible
          const currentColId = item
            .closest(".main-menu__col")
            .getAttribute("id");
          goToLevel(currentLevelNum + 1, item, currentColId, false);
        }
      }
    });
  });

  // --- CLICK LOGIC ---
  document.addEventListener("click", (e) => {
    // Ignore clicks that originate inside the floating filter panel —
    // those are handled by floating_filter_menu.js.
    const floatingPanel = document.querySelector(".floating-filter-panel");
    if (floatingPanel && floatingPanel.contains(e.target)) return;

    const item = e.target.closest(".nav-item");
    const link = e.target.closest("a");
    const returnButton = e.target.closest(".main-menu-return");
    const backItem = e.target.closest(".submenu-back-item");

    // 1. Navigation controls (Mobile)
    if (returnButton) {
      e.preventDefault();
      goToLevel(0, null, "level-0", false);
      return;
    }

    if (backItem) {
      e.preventDefault();
      const prevTargetId = backItem.getAttribute(ATTR_PREV_TARGET);
      const prevCol = document.getElementById(prevTargetId);
      goToLevel(
        parseInt(prevCol.getAttribute(ATTR_LEVEL)),
        null,
        prevTargetId,
        false,
      );
      return;
    }

    // 2. Menu Item interaction
    if (item) {
      const hasSubmenu = item.classList.contains(CLASS_HAS_SUBMENU);
      const targetId = item.getAttribute(ATTR_TARGET);
      const href = link?.getAttribute("href") || "";

      if (isMobile() && hasSubmenu) {
        e.preventDefault();
        const levelNum = parseInt(
          item.closest(".main-menu__col").getAttribute(ATTR_LEVEL),
        );
        goToLevel(levelNum + 1, item, targetId, true);
        return;
      }

      // Close menu for links/anchors
      if (link && href !== "#") {
        if (href.startsWith("#") || !hasSubmenu) {
          setTimeout(() => resetNavigation(), 150);
        }
      }
    }
    // 3. Global closing (click outside active columns)
    else if (body.classList.contains(CLASS_OPEN)) {
      const isClickOnToggle =
        menuToggle?.contains(e.target) || menuCloseToggle?.contains(e.target);
      if (
        !isClickOnToggle &&
        (e.target === megaMenuContent || !e.target.closest(".main-menu__col"))
      ) {
        resetNavigation();
      }
    }
  });

  function toggleMenu() {
    // If the floating filter panel is open, close it instead of toggling the
    // main menu. This lets the header X button dismiss the filter panel on
    // mobile, consistent with how it dismisses the navigation menu.
    const floatingPanel = document.querySelector(".floating-filter-panel");
    if (floatingPanel && floatingPanel.classList.contains("is-open")) {
      document.dispatchEvent(new CustomEvent("requestFilterClose"));
      return;
    }

    const isOpen = body.classList.toggle(CLASS_OPEN);
    if (menuToggle) menuToggle.classList.toggle("open", isOpen);
    if (megaMenu) megaMenu.style.display = isOpen ? "block" : "none";

    if (!isOpen) {
      resetNavigation();
    } else {
      goToLevel(0, null, "level-0", "forward");
    }
  }

  if (menuToggle) menuToggle.addEventListener("click", toggleMenu);
  if (menuCloseToggle) menuCloseToggle.addEventListener("click", toggleMenu);

  function resetNavigation() {
    body.classList.remove(CLASS_OPEN);
    if (menuToggle) {
      menuToggle.classList.remove("open");
      menuToggle.setAttribute("aria-expanded", "false");
    }
    goToLevel(0, null, "level-0", "backward");
    if (megaMenuContent) megaMenuContent.setAttribute("data-current-level", 0);
    if (megaMenu) megaMenu.style.display = "none";

    // Close mobile language selector if open
    const mobileLangSelector = document.querySelector(
      ".mobile-language-selector",
    );
    const mobileLangToggle = document.querySelector(".mobile-language-toggle");
    if (mobileLangSelector) mobileLangSelector.classList.remove("is-open");
    if (mobileLangToggle)
      mobileLangToggle.setAttribute("aria-expanded", "false");
  }

  // --- MOBILE LANGUAGE SELECTOR ---
  const mobileLangSelector = document.querySelector(".mobile-language-selector");
  const mobileLangToggle = document.querySelector(".mobile-language-toggle");

  if (mobileLangToggle && mobileLangSelector) {
    mobileLangToggle.addEventListener("click", (e) => {
      e.stopPropagation();
      const isOpen = mobileLangSelector.classList.toggle("is-open");
      mobileLangToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
    });

    mobileLangSelector
      .querySelectorAll(".mobile-language-option")
      .forEach((option) => {
        option.addEventListener("click", (e) => {
          e.stopPropagation();
          mobileLangSelector.classList.remove("is-open");
          mobileLangToggle.setAttribute("aria-expanded", "false");
        });
      });
  }
});
