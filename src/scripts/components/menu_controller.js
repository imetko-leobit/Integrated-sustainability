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

  // Double-tap logic: delay submenu open so the nav-item doesn't slide away
  // before the second tap registers on the same element.
  let singleTapTimer = null;
  let lastTappedItem = null;

  // Select all menu columns (now statically rendered in HTML)
  const allLevels = document.querySelectorAll(".main-menu__col");

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
  document.querySelectorAll(".nav-item").forEach((item) => {
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
    const item = e.target.closest(".nav-item");
    const link = e.target.closest("a");
    const backButton = e.target.closest(".submenu-header");

    // 1. Back button (Mobile)
    if (backButton) {
      e.preventDefault();
      const prevTargetId = backButton.getAttribute(ATTR_PREV_TARGET);
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

        if (singleTapTimer !== null && lastTappedItem === item) {
          // Second tap arrived before timer fired — double-tap confirmed.
          clearTimeout(singleTapTimer);
          singleTapTimer = null;
          lastTappedItem = null;
          if (href && href !== "#") {
            // Respect target attribute (_blank etc).
            if (link && link.target === "_blank") {
              window.open(href, "_blank", "noopener");
            } else {
              window.location.href = href;
            }
          }
          return;
        }

        // First tap: wait 300 ms before opening the submenu.
        // Delaying keeps the nav-item in place so the second tap can land on it.
        lastTappedItem = item;
        const levelNum = parseInt(
          item.closest(".main-menu__col").getAttribute(ATTR_LEVEL),
        );
        singleTapTimer = setTimeout(() => {
          singleTapTimer = null;
          lastTappedItem = null;
          goToLevel(levelNum + 1, item, targetId, true);
        }, 300);
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
    if (singleTapTimer !== null) {
      clearTimeout(singleTapTimer);
      singleTapTimer = null;
    }
    lastTappedItem = null;
    if (menuToggle) {
      menuToggle.classList.remove("open");
      menuToggle.setAttribute("aria-expanded", "false");
    }
    goToLevel(0, null, "level-0", "backward");
    if (megaMenuContent) megaMenuContent.setAttribute("data-current-level", 0);
    if (megaMenu) megaMenu.style.display = "none";
  }
});
