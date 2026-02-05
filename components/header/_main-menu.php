<div class="main-menu__content">
  <!-- Level 0 - Main Menu -->
  <div id="level-0" class="main-menu__col main-menu__col--level-0 active-level" data-level="0">
    <ul class="navbar-nav">
      <!-- Services -->
      <li class="nav-item has-submenu" data-target="level-0-1">
        <a href="/services" class="nav-link">services</a>
        <button class="submenu-button">
          <span class="arrow-icon">
            <svg id="arrow-top-right-gradient" viewBox="0 0 24 24"><path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/></svg>
          </span>
        </button>
      </li>
      
      <!-- Applications -->
      <li class="nav-item has-submenu" data-target="level-0-2">
        <a href="/applications" class="nav-link">applications</a>
        <button class="submenu-button">
          <span class="arrow-icon">
            <svg id="arrow-top-right-gradient" viewBox="0 0 24 24"><path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/></svg>
          </span>
        </button>
      </li>
      
      <!-- Equipment -->
      <li class="nav-item" data-target="level-0-3">
        <a href="/equipment" class="nav-link">equipment</a>
      </li>
      
      <!-- Industries -->
      <li class="nav-item has-submenu top-margin" data-target="level-0-4">
        <a href="/industries" class="nav-link">industries</a>
        <button class="submenu-button">
          <span class="arrow-icon">
            <svg id="arrow-top-right-gradient" viewBox="0 0 24 24"><path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/></svg>
          </span>
        </button>
      </li>
      
      <!-- Projects -->
      <li class="nav-item" data-target="level-0-5">
        <a href="/projects" class="nav-link">projects</a>
      </li>
      
      <!-- Insights -->
      <li class="nav-item" data-target="level-0-6">
        <a href="/insights" class="nav-link">insights</a>
      </li>
      
      <!-- About -->
      <li class="nav-item top-margin" data-target="level-0-7">
        <a href="/about" class="nav-link">about</a>
      </li>
      
      <!-- Contact -->
      <li class="nav-item" data-target="level-0-8">
        <a href="/contact" class="nav-link">contact</a>
      </li>
    </ul>
    
    <div class="main-menu__bottom--mobile">
      <div class="search-container" id="header-search-container-mobile">
        <button class="search-toggle" aria-label="Toggle Search">
          <svg viewBox="0 0 28 24" fill="none">
            <path fill="currentColor"
              d="m27.707 26.292-8.259-8.259A10.939 10.939 0 0 0 22.001 11c0-6.066-4.934-11-11-11S0 4.934 0 11s4.934 11 11 11c2.673 0 5.125-.96 7.033-2.553l8.259 8.259a.997.997 0 0 0 1.414 0 .998.998 0 0 0 0-1.414h.001ZM2 11c0-4.963 4.037-9 9-9s9 4.037 9 9-4.037 9-9 9-9-4.037-9-9Z" />
          </svg>
        </button>
        <form action="/search" method="get" class="search-form">
          <input type="search" name="q" placeholder="Search..." class="search-input" aria-label="Search site content">
        </form>
      </div>

      <div class="language-select">
        <select name="language" class="regular-select">
          <option value="en">English</option>
          <option value="fr">French</option>
          <option value="es">Spanish</option>
        </select>
      </div>
    </div>
  </div>
  
  <!-- Level 1 - Services Submenu -->
  <div id="level-0-1" class="main-menu__col main-menu__col--level-1 submenu" data-level="1">
    <button class="submenu-header" data-prev-target="level-0" aria-label="Go back">
      <span class="back-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><mask id="mlevel-0-1" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha"><path fill="#D9D9D9" d="M0 0h24v24H0z"/></mask><g mask="url(#mlevel-0-1)"><path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/></g></svg>
      </span>
      <h3 class="submenu-title">services</h3>
    </button>
    <ul class="navbar-nav">
      <li class="nav-item" data-target="level-0-1-1">
        <a href="/services/1" class="nav-link">service 1</a>
      </li>
    </ul>
  </div>
  
  <!-- Level 1 - Applications Submenu -->
  <div id="level-0-2" class="main-menu__col main-menu__col--level-1 submenu" data-level="1">
    <button class="submenu-header" data-prev-target="level-0" aria-label="Go back">
      <span class="back-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><mask id="mlevel-0-2" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha"><path fill="#D9D9D9" d="M0 0h24v24H0z"/></mask><g mask="url(#mlevel-0-2)"><path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/></g></svg>
      </span>
      <h3 class="submenu-title">applications</h3>
    </button>
    <ul class="navbar-nav">
      <li class="nav-item" data-target="level-0-2-1">
        <a href="/applications/1" class="nav-link">application 1</a>
      </li>
    </ul>
  </div>
  
  <!-- Level 1 - Industries Submenu -->
  <div id="level-0-4" class="main-menu__col main-menu__col--level-1 submenu" data-level="1">
    <button class="submenu-header" data-prev-target="level-0" aria-label="Go back">
      <span class="back-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><mask id="mlevel-0-4" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha"><path fill="#D9D9D9" d="M0 0h24v24H0z"/></mask><g mask="url(#mlevel-0-4)"><path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/></g></svg>
      </span>
      <h3 class="submenu-title">industries</h3>
    </button>
    <ul class="navbar-nav">
      <li class="nav-item" data-target="level-0-4-1">
        <a href="/industries/agri-foods" class="nav-link">agri-foods</a>
      </li>
      <li class="nav-item" data-target="level-0-4-2">
        <a href="/industries/battery-ev-metals" class="nav-link">battery & EV metals</a>
      </li>
      <li class="nav-item" data-target="level-0-4-3">
        <a href="/industries/chemicals-metals" class="nav-link">chemicals & metals processing</a>
      </li>
      <li class="nav-item" data-target="level-0-4-4">
        <a href="/industries/data-infrastructure" class="nav-link">data-infrastructure</a>
      </li>
      <li class="nav-item" data-target="level-0-4-5">
        <a href="/industries/electronics" class="nav-link">electronics manufacturing</a>
      </li>
      <li class="nav-item" data-target="level-0-4-6">
        <a href="/industries/food-beverage" class="nav-link">food & beverage</a>
      </li>
      <li class="nav-item" data-target="level-0-4-7">
        <a href="/industries/hydrogen" class="nav-link">hydrogen production</a>
      </li>
      <li class="nav-item has-submenu" data-target="level-0-4-8">
        <a href="/industries/medical" class="nav-link">medical technologies</a>
        <button class="submenu-button">
          <span class="arrow-icon">
            <svg id="arrow-top-right-gradient" viewBox="0 0 24 24"><path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/></svg>
          </span>
        </button>
      </li>
      <li class="nav-item" data-target="level-0-4-9">
        <a href="/industries/mining" class="nav-link">mining, metals and minerals</a>
      </li>
      <li class="nav-item" data-target="level-0-4-10">
        <a href="/industries/municipal" class="nav-link">municipal</a>
      </li>
      <li class="nav-item" data-target="level-0-4-11">
        <a href="/industries/oil-gas" class="nav-link">oil and gas</a>
      </li>
      <li class="nav-item" data-target="level-0-4-12">
        <a href="/industries/ports" class="nav-link">ports & transportation</a>
      </li>
      <li class="nav-item" data-target="level-0-4-13">
        <a href="/industries/power" class="nav-link">power generation</a>
      </li>
      <li class="nav-item" data-target="level-0-4-14">
        <a href="/industries/pulp-paper" class="nav-link">pulp and paper</a>
      </li>
      <li class="nav-item" data-target="level-0-4-15">
        <a href="/industries/resorts" class="nav-link">resorts and hospitality</a>
      </li>
    </ul>
  </div>
  
  <!-- Level 2 - Medical Technologies Submenu -->
  <div id="level-0-4-8" class="main-menu__col main-menu__col--level-2 submenu" data-level="2">
    <button class="submenu-header" data-prev-target="level-0-4" aria-label="Go back">
      <span class="back-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><mask id="mlevel-0-4-8" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha"><path fill="#D9D9D9" d="M0 0h24v24H0z"/></mask><g mask="url(#mlevel-0-4-8)"><path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/></g></svg>
      </span>
      <h3 class="submenu-title">medical technologies</h3>
    </button>
    <ul class="navbar-nav">
      <li class="nav-item" data-target="level-0-4-8-1">
        <a href="#" class="nav-link">lifecycle services</a>
      </li>
      <li class="nav-item has-submenu" data-target="level-0-4-8-2">
        <a href="/services/define" class="nav-link">define</a>
        <button class="submenu-button">
          <span class="arrow-icon">
            <svg id="arrow-top-right-gradient" viewBox="0 0 24 24"><path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/></svg>
          </span>
        </button>
      </li>
      <li class="nav-item" data-target="level-0-4-8-3">
        <a href="/services/design" class="nav-link">design</a>
      </li>
      <li class="nav-item" data-target="level-0-4-8-4">
        <a href="/services/applications" class="nav-link">applications</a>
      </li>
      <li class="nav-item" data-target="level-0-4-8-5">
        <a href="/services/deliver" class="nav-link">deliver</a>
      </li>
      <li class="nav-item" data-target="level-0-4-8-6">
        <a href="/services/operate" class="nav-link">operate</a>
      </li>
      <li class="nav-item" data-target="level-0-4-8-7">
        <a href="/services/maintain" class="nav-link">maintain</a>
      </li>
      <li class="nav-item" data-target="level-0-4-8-8">
        <a href="/services/upgrade" class="nav-link">upgrade</a>
      </li>
      <li class="nav-item" data-target="level-0-4-8-9">
        <a href="/services/report" class="nav-link">report</a>
      </li>
      <li class="nav-item" data-target="level-0-4-8-10">
        <a href="/industries/mining/applications" class="nav-link">applications</a>
      </li>
    </ul>
  </div>
  
  <!-- Level 3 - Define Submenu -->
  <div id="level-0-4-8-2" class="main-menu__col main-menu__col--level-3 submenu" data-level="3">
    <button class="submenu-header" data-prev-target="level-0-4-8" aria-label="Go back">
      <span class="back-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><mask id="mlevel-0-4-8-2" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha"><path fill="#D9D9D9" d="M0 0h24v24H0z"/></mask><g mask="url(#mlevel-0-4-8-2)"><path fill="#80F7E6" d="M10 22 0 12 10 2l1.775 1.775L3.55 12l8.225 8.225L10 22Z"/></g></svg>
      </span>
      <h3 class="submenu-title">define</h3>
    </button>
    <ul class="navbar-nav">
      <li class="nav-item" data-target="level-0-4-8-2-1">
        <a href="/services/define/project-dev" class="nav-link">project development</a>
      </li>
      <li class="nav-item" data-target="level-0-4-8-2-2">
        <a href="/services/define/water" class="nav-link">water resources</a>
      </li>
      <li class="nav-item" data-target="level-0-4-8-2-3">
        <a href="/services/define/testing" class="nav-link">laboratory testing and modelling</a>
      </li>
      <li class="nav-item" data-target="level-0-4-8-2-4">
        <a href="/services/define/permitting" class="nav-link">permitting</a>
      </li>
      <li class="nav-item" data-target="level-0-4-8-2-5">
        <a href="/services/define/commercial" class="nav-link">commercial support</a>
      </li>
    </ul>
  </div>
</div>
