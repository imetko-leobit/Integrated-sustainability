/******/ (() => { // webpackBootstrap
/*!***************************************************!*\
  !*** ./src/scripts/components/menu_controller.js ***!
  \***************************************************/
document.addEventListener("DOMContentLoaded", function () {
  var megaMenuContent = document.querySelector(".main-menu__content");
  var menuToggle = document.querySelector(".menu-toggle");
  var menuCloseToggle = document.querySelector(".menu-close-toggle");
  var megaMenu = document.getElementById("main-menu");
  var body = document.body;
  var CLASS_OPEN = "menu-is-open";
  var CLASS_ACTIVE = "active";
  var CLASS_ACTIVE_LEVEL = "active-level";
  var CLASS_HAS_SUBMENU = "has-submenu";
  var ATTR_TARGET = "data-target";
  var ATTR_PREV_TARGET = "data-prev-target";
  var ATTR_LEVEL = "data-level";
  var isMobile = function isMobile() {
    return window.innerWidth <= 992;
  };

  // Double-tap logic: delay submenu open so the nav-item doesn't slide away
  // before the second tap registers on the same element.
  var singleTapTimer = null;
  var lastTappedItem = null;

  // Select all menu columns scoped to the main menu element so that filter
  // panel columns (which also use .main-menu__col) are not affected.
  var allLevels = megaMenuContent ? megaMenuContent.querySelectorAll(".main-menu__col") : document.querySelectorAll(".main-menu__col");

  /**
   * Level navigation logic
   */
  function goToLevel(targetLevelNum, clickedItem, targetId, isGoingForward) {
    var currentColumn = clickedItem === null || clickedItem === void 0 ? void 0 : clickedItem.closest(".main-menu__col");
    if (currentColumn) {
      currentColumn.querySelectorAll(".".concat(CLASS_ACTIVE)).forEach(function (el) {
        return el.classList.remove(CLASS_ACTIVE);
      });
    }
    allLevels.forEach(function (col) {
      var colLevel = parseInt(col.getAttribute(ATTR_LEVEL));
      if (colLevel >= targetLevelNum) {
        col.querySelectorAll(".".concat(CLASS_ACTIVE)).forEach(function (el) {
          return el.classList.remove(CLASS_ACTIVE);
        });
      }
    });
    if (clickedItem && isGoingForward) {
      clickedItem.classList.add(CLASS_ACTIVE);
    }
    allLevels.forEach(function (levelCol) {
      var levelId = levelCol.getAttribute("id");
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
  var menuNavItems = megaMenuContent ? megaMenuContent.querySelectorAll(".nav-item") : document.querySelectorAll(".nav-item");
  menuNavItems.forEach(function (item) {
    item.addEventListener("mouseenter", function () {
      if (!isMobile()) {
        var hasSubmenu = item.classList.contains(CLASS_HAS_SUBMENU);
        var currentLevelNum = parseInt(item.closest(".main-menu__col").getAttribute(ATTR_LEVEL));
        if (hasSubmenu) {
          // If item has submenu, open it
          var targetId = item.getAttribute(ATTR_TARGET);
          goToLevel(currentLevelNum + 1, item, targetId, true);
        } else {
          // If item DOES NOT have submenu, clear deeper levels but keep current level active
          // We pass the parent ID of the current column to keep it and its ancestors visible
          var currentColId = item.closest(".main-menu__col").getAttribute("id");
          goToLevel(currentLevelNum + 1, item, currentColId, false);
        }
      }
    });
  });

  // --- CLICK LOGIC ---
  document.addEventListener("click", function (e) {
    // Ignore clicks that originate inside the floating filter panel —
    // those are handled by floating_filter_menu.js.
    var floatingPanel = document.querySelector(".floating-filter-panel");
    if (floatingPanel && floatingPanel.contains(e.target)) return;
    var item = e.target.closest(".nav-item");
    var link = e.target.closest("a");
    var backButton = e.target.closest(".submenu-header");

    // 1. Back button (Mobile)
    if (backButton) {
      e.preventDefault();
      var prevTargetId = backButton.getAttribute(ATTR_PREV_TARGET);
      var prevCol = document.getElementById(prevTargetId);
      goToLevel(parseInt(prevCol.getAttribute(ATTR_LEVEL)), null, prevTargetId, false);
      return;
    }

    // 2. Menu Item interaction
    if (item) {
      var hasSubmenu = item.classList.contains(CLASS_HAS_SUBMENU);
      var targetId = item.getAttribute(ATTR_TARGET);
      var href = (link === null || link === void 0 ? void 0 : link.getAttribute("href")) || "";
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
        var levelNum = parseInt(item.closest(".main-menu__col").getAttribute(ATTR_LEVEL));
        singleTapTimer = setTimeout(function () {
          singleTapTimer = null;
          lastTappedItem = null;
          goToLevel(levelNum + 1, item, targetId, true);
        }, 300);
        return;
      }

      // Close menu for links/anchors
      if (link && href !== "#") {
        if (href.startsWith("#") || !hasSubmenu) {
          setTimeout(function () {
            return resetNavigation();
          }, 150);
        }
      }
    }
    // 3. Global closing (click outside active columns)
    else if (body.classList.contains(CLASS_OPEN)) {
      var isClickOnToggle = (menuToggle === null || menuToggle === void 0 ? void 0 : menuToggle.contains(e.target)) || (menuCloseToggle === null || menuCloseToggle === void 0 ? void 0 : menuCloseToggle.contains(e.target));
      if (!isClickOnToggle && (e.target === megaMenuContent || !e.target.closest(".main-menu__col"))) {
        resetNavigation();
      }
    }
  });
  function toggleMenu() {
    // If the floating filter panel is open, close it instead of toggling the
    // main menu. This lets the header X button dismiss the filter panel on
    // mobile, consistent with how it dismisses the navigation menu.
    var floatingPanel = document.querySelector(".floating-filter-panel");
    if (floatingPanel && floatingPanel.classList.contains("is-open")) {
      document.dispatchEvent(new CustomEvent("requestFilterClose"));
      return;
    }
    var isOpen = body.classList.toggle(CLASS_OPEN);
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
/******/ })()
;