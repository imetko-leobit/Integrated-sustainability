document.addEventListener('DOMContentLoaded', () => {
    // --- MENU DATA STRUCTURE ---
    const menuData = window.phpMenuData || [];

    const megaMenuContent = document.querySelector('.main-menu__content');
    const menuToggle = document.querySelector('.menu-toggle');
    const menuCloseToggle = document.querySelector('.menu-close-toggle');
    const megaMenu = document.getElementById('main-menu');
    const body = document.body;
  
    const CLASS_OPEN = 'menu-is-open';
    const CLASS_ACTIVE = 'active'; 
    const CLASS_ACTIVE_LEVEL = 'active-level'; 
    const CLASS_HAS_SUBMENU = 'has-submenu';
    const ATTR_TARGET = 'data-target';
    const ATTR_PREV_TARGET = 'data-prev-target';
    const ATTR_LEVEL = 'data-level';
  
    const isMobile = () => window.innerWidth <= 992;
    
    let clickTimer = null;
    let clickCount = 0;
  
    /**
     * Generates HTML columns from menuData synchronously
     */
    function createColumn(items, level, parentId = 'level-0', parentTitle = '') {
      const col = document.createElement('div');
      col.id = parentId;
      col.className = `main-menu__col main-menu__col--level-${level} ${level > 0 ? 'submenu' : 'active-level'}`;
      col.setAttribute('data-level', level);
  
      let html = '';
      
      if (level > 0) {
        const prevTarget = parentId.split('-').slice(0, -1).join('-') || 'level-0';
        html += `
          <button class="submenu-header" data-prev-target="${prevTarget}" aria-label="Go back">
            <span class="back-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><mask id="m${parentId}" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha"><path fill="#D9D9D9" d="M0 0h24v24H0z"/></mask><g mask="url(#m${parentId})"><path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/></g></svg>
            </span>
            <h3 class="submenu-title">${parentTitle}</h3>
          </button>`;
      }
  
      html += '<ul class="navbar-nav">';
      items.forEach((item, index) => {
        const hasSub = item.submenu && item.submenu.length > 0;
        const targetId = item.id || `${parentId}-${index + 1}`;
        const extraClass = item.additional_class ? ` ${item.additional_class}` : '';
        
        html += `
          <li class="nav-item ${hasSub ? 'has-submenu' : ''}${extraClass}" data-target="${targetId}">
            <a href="${item.url}" class="nav-link">${item.title}</a>
            ${hasSub ? `
            <button class="submenu-button">
              <span class="arrow-icon">
                <svg id="arrow-top-right-gradient" viewBox="0 0 24 24"><path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/></svg>
              </span>
            </button>` : ''}
          </li>`;
  
        if (hasSub) {
          renderMenuLevel(item.submenu, level + 1, targetId, item.title);
        }
      });
      html += '</ul>';
  
      if (level === 0) {
        const template = document.getElementById('mobile-bottom-template');
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
    const allLevels = document.querySelectorAll('.main-menu__col');
  
    /**
     * Level navigation logic
     */
    function goToLevel(targetLevelNum, clickedItem, targetId, isGoingForward) {
      const currentColumn = clickedItem?.closest('.main-menu__col');
      
      if (currentColumn) {
        currentColumn.querySelectorAll(`.${CLASS_ACTIVE}`).forEach(el => el.classList.remove(CLASS_ACTIVE));
      }
  
      allLevels.forEach(col => {
        const colLevel = parseInt(col.getAttribute(ATTR_LEVEL));
        if (colLevel >= targetLevelNum) {
          col.querySelectorAll(`.${CLASS_ACTIVE}`).forEach(el => el.classList.remove(CLASS_ACTIVE));
        }
      });
  
      if (clickedItem && isGoingForward) {
        clickedItem.classList.add(CLASS_ACTIVE);
      }
  
      allLevels.forEach(levelCol => {
        const levelId = levelCol.getAttribute('id');
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
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('mouseenter', () => {
          if (!isMobile()) {
            const hasSubmenu = item.classList.contains(CLASS_HAS_SUBMENU);
            const currentLevelNum = parseInt(item.closest('.main-menu__col').getAttribute(ATTR_LEVEL));
            
            if (hasSubmenu) {
              // If item has submenu, open it
              const targetId = item.getAttribute(ATTR_TARGET);
              goToLevel(currentLevelNum + 1, item, targetId, true);
            } else {
              // If item DOES NOT have submenu, clear deeper levels but keep current level active
              // We pass the parent ID of the current column to keep it and its ancestors visible
              const currentColId = item.closest('.main-menu__col').getAttribute('id');
              goToLevel(currentLevelNum + 1, item, currentColId, false);
            }
          }
        });
      });
  
    // --- CLICK LOGIC ---
    document.addEventListener('click', (e) => {
      const item = e.target.closest('.nav-item');
      const link = e.target.closest('a');
      const backButton = e.target.closest('.submenu-header');
  
      // 1. Back button (Mobile)
      if (backButton) {
        e.preventDefault();
        const prevTargetId = backButton.getAttribute(ATTR_PREV_TARGET);
        const prevCol = document.getElementById(prevTargetId);
        goToLevel(parseInt(prevCol.getAttribute(ATTR_LEVEL)), null, prevTargetId, false);
        return;
      }
  
      // 2. Menu Item interaction
      if (item) {
        const hasSubmenu = item.classList.contains(CLASS_HAS_SUBMENU);
        const targetId = item.getAttribute(ATTR_TARGET);
        const href = link?.getAttribute('href') || '';
  
        if (isMobile() && hasSubmenu) {
          e.preventDefault();
          clickCount++;
  
          if (clickCount === 1) {
            // Double tap timer
            clickTimer = setTimeout(() => {
              const levelNum = parseInt(item.closest('.main-menu__col').getAttribute(ATTR_LEVEL));
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
            setTimeout(() => resetNavigation(), 150);
          }
        }
      } 
      // 3. Global closing (click outside active columns)
      else if (body.classList.contains(CLASS_OPEN)) {
        const isClickOnToggle = menuToggle?.contains(e.target) || menuCloseToggle?.contains(e.target);
        if (!isClickOnToggle && (e.target === megaMenuContent || !e.target.closest('.main-menu__col'))) {
          resetNavigation();
        }
      }
    });
  
    function toggleMenu() {
      const isOpen = body.classList.toggle(CLASS_OPEN);
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