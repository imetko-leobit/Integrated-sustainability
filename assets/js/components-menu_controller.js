/******/ (() => { // webpackBootstrap
/*!***************************************************!*\
  !*** ./src/scripts/components/menu_controller.js ***!
  \***************************************************/
document.addEventListener('DOMContentLoaded', function () {
  // --- MENU DATA STRUCTURE ---
  var menuData = window.phpMenuData || [];
  var megaMenuContent = document.querySelector('.main-menu__content');
  var menuToggle = document.querySelector('.menu-toggle');
  var menuCloseToggle = document.querySelector('.menu-close-toggle');
  var megaMenu = document.getElementById('main-menu');
  var body = document.body;
  var CLASS_OPEN = 'menu-is-open';
  var CLASS_ACTIVE = 'active';
  var CLASS_ACTIVE_LEVEL = 'active-level';
  var CLASS_HAS_SUBMENU = 'has-submenu';
  var ATTR_TARGET = 'data-target';
  var ATTR_PREV_TARGET = 'data-prev-target';
  var ATTR_LEVEL = 'data-level';
  var isMobile = function isMobile() {
    return window.innerWidth <= 992;
  };
  var clickTimer = null;
  var clickCount = 0;

  /**
   * Generates HTML columns from menuData synchronously
   */
  function createColumn(items, level) {
    var parentId = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'level-0';
    var parentTitle = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : '';
    var col = document.createElement('div');
    col.id = parentId;
    col.className = "main-menu__col main-menu__col--level-".concat(level, " ").concat(level > 0 ? 'submenu' : 'active-level');
    col.setAttribute('data-level', level);
    var html = '';
    if (level > 0) {
      var prevTarget = parentId.split('-').slice(0, -1).join('-') || 'level-0';
      html += "\n          <button class=\"submenu-header\" data-prev-target=\"".concat(prevTarget, "\" aria-label=\"Go back\">\n            <span class=\"back-arrow\">\n              <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\"><mask id=\"m").concat(parentId, "\" width=\"24\" height=\"24\" x=\"0\" y=\"0\" maskUnits=\"userSpaceOnUse\" style=\"mask-type:alpha\"><path fill=\"#D9D9D9\" d=\"M0 0h24v24H0z\"/></mask><g mask=\"url(#m").concat(parentId, ")\"><path fill=\"#80F7E6\" d=\"M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z\"/></g></svg>\n            </span>\n            <h3 class=\"submenu-title\">").concat(parentTitle, "</h3>\n          </button>");
    }
    html += '<ul class="navbar-nav">';
    items.forEach(function (item, index) {
      var hasSub = item.submenu && item.submenu.length > 0;
      var targetId = item.id || "".concat(parentId, "-").concat(index + 1);
      var extraClass = item.additional_class ? " ".concat(item.additional_class) : '';
      html += "\n          <li class=\"nav-item ".concat(hasSub ? 'has-submenu' : '').concat(extraClass, "\" data-target=\"").concat(targetId, "\">\n            <a href=\"").concat(item.url, "\" class=\"nav-link\">").concat(item.title, "</a>\n            ").concat(hasSub ? "\n            <button class=\"submenu-button\">\n              <span class=\"arrow-icon\">\n                <svg id=\"arrow-top-right-gradient\" viewBox=\"0 0 24 24\"><path class=\"icon-arrow\" fill=\"currentColor\" d=\"M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z\"/></svg>\n              </span>\n            </button>" : '', "\n          </li>");
      if (hasSub) {
        renderMenuLevel(item.submenu, level + 1, targetId, item.title);
      }
    });
    html += '</ul>';
    if (level === 0) {
      var template = document.getElementById('mobile-bottom-template');
      if (template) html += template.innerHTML;
    }
    col.innerHTML = html;
    megaMenuContent.appendChild(col);
  }
  function renderMenuLevel(items, level, parentId, parentTitle) {
    createColumn(items, level, parentId, parentTitle);
  }

  // Initial rendering
  if (megaMenuContent) {
    megaMenuContent.innerHTML = '';
    renderMenuLevel(menuData, 0, 'level-0', '');
  }

  // Important: select all columns AFTER rendering is complete
  var allLevels = document.querySelectorAll('.main-menu__col');

  /**
   * Level navigation logic
   */
  function goToLevel(targetLevelNum, clickedItem, targetId, isGoingForward) {
    var currentColumn = clickedItem === null || clickedItem === void 0 ? void 0 : clickedItem.closest('.main-menu__col');
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
      var levelId = levelCol.getAttribute('id');
      // Keep parent columns visible on Desktop
      if (targetId === levelId || targetId.startsWith(levelId + '-')) {
        levelCol.classList.add(CLASS_ACTIVE_LEVEL);
      } else {
        levelCol.classList.remove(CLASS_ACTIVE_LEVEL);
      }
    });
    if (isMobile()) {
      megaMenuContent.setAttribute('data-current-level', targetLevelNum);
    }
  }

  // --- DESKTOP HOVER ---
  document.querySelectorAll('.nav-item').forEach(function (item) {
    item.addEventListener('mouseenter', function () {
      if (!isMobile()) {
        var hasSubmenu = item.classList.contains(CLASS_HAS_SUBMENU);
        var currentLevelNum = parseInt(item.closest('.main-menu__col').getAttribute(ATTR_LEVEL));
        if (hasSubmenu) {
          // If item has submenu, open it
          var targetId = item.getAttribute(ATTR_TARGET);
          goToLevel(currentLevelNum + 1, item, targetId, true);
        } else {
          // If item DOES NOT have submenu, clear deeper levels but keep current level active
          // We pass the parent ID of the current column to keep it and its ancestors visible
          var currentColId = item.closest('.main-menu__col').getAttribute('id');
          goToLevel(currentLevelNum + 1, item, currentColId, false);
        }
      }
    });
  });

  // --- CLICK LOGIC ---
  document.addEventListener('click', function (e) {
    var item = e.target.closest('.nav-item');
    var link = e.target.closest('a');
    var backButton = e.target.closest('.submenu-header');

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
      var href = (link === null || link === void 0 ? void 0 : link.getAttribute('href')) || '';
      if (isMobile() && hasSubmenu) {
        e.preventDefault();
        clickCount++;
        if (clickCount === 1) {
          // Double tap timer
          clickTimer = setTimeout(function () {
            var levelNum = parseInt(item.closest('.main-menu__col').getAttribute(ATTR_LEVEL));
            goToLevel(levelNum + 1, item, targetId, true);
            clickCount = 0;
          }, 400);
        } else if (clickCount === 2) {
          clearTimeout(clickTimer);
          clickCount = 0;
          if (href && href !== '#') window.location.href = href;
        }
        return;
      }

      // Close menu for links/anchors
      if (link && href !== '#') {
        if (href.startsWith('#') || !hasSubmenu) {
          setTimeout(function () {
            return resetNavigation();
          }, 150);
        }
      }
    }
    // 3. Global closing (click outside active columns)
    else if (body.classList.contains(CLASS_OPEN)) {
      var isClickOnToggle = (menuToggle === null || menuToggle === void 0 ? void 0 : menuToggle.contains(e.target)) || (menuCloseToggle === null || menuCloseToggle === void 0 ? void 0 : menuCloseToggle.contains(e.target));
      if (!isClickOnToggle && (e.target === megaMenuContent || !e.target.closest('.main-menu__col'))) {
        resetNavigation();
      }
    }
  });
  function toggleMenu() {
    var isOpen = body.classList.toggle(CLASS_OPEN);
    if (menuToggle) menuToggle.classList.toggle('open', isOpen);
    if (megaMenu) megaMenu.style.display = isOpen ? 'block' : 'none';
    if (!isOpen) {
      resetNavigation();
    } else {
      goToLevel(0, null, 'level-0', 'forward');
    }
  }
  if (menuToggle) menuToggle.addEventListener('click', toggleMenu);
  if (menuCloseToggle) menuCloseToggle.addEventListener('click', toggleMenu);
  function resetNavigation() {
    body.classList.remove(CLASS_OPEN);
    clickCount = 0;
    if (clickTimer) clearTimeout(clickTimer);
    if (menuToggle) {
      menuToggle.classList.remove('open');
      menuToggle.setAttribute('aria-expanded', 'false');
    }
    goToLevel(0, null, 'level-0', 'backward');
    if (megaMenuContent) megaMenuContent.setAttribute('data-current-level', 0);
    if (megaMenu) megaMenu.style.display = 'none';
  }
});
/******/ })()
;