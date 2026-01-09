<link href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../assets/css/components-main_menu.css" />

<?php 
 $menu_data = [
    [
        "id" => "level-0-1",
        "title" => "services",
        "url" => "/services",
        "submenu" => [
            ["title" => "service 1", "url" => "/services/1"]
        ]
    ],
    [
        "id" => "level-0-2",
        "title" => "applications",
        "url" => "/applications",
        "submenu" => [
            ["title" => "application 1", "url" => "/applications/1"]
        ]
    ],
    [
        "id" => "level-0-3",
        "title" => "equipment",
        "url" => "/equipment",
    ],
    [
        "id" => "level-0-4",
        "title" => "industries",
        "url" => "/industries",
				"additional_class" => "top-margin",
        "submenu" => [
            ["title" => "agri-foods", "url" => "/industries/agri-foods", "id" => "level-0-4-1",],
            ["title" => "battery & EV metals", "url" => "/industries/battery-ev-metals", "id" => "level-0-4-2",],
            ["title" => "chemicals & metals processing", "url" => "/industries/chemicals-metals", "id" => "level-0-4-3",],
            ["title" => "data-infrastructure", "url" => "/industries/data-infrastructure", "id" => "level-0-4-4",],
            ["title" => "electronics manufacturing", "url" => "/industries/electronics", "id" => "level-0-4-5",],
            ["title" => "food & beverage", "url" => "/industries/food-beverage", "id" => "level-0-4-6",],
            ["title" => "hydrogen production", "url" => "/industries/hydrogen", "id" => "level-0-4-7",],
            [
							"title" => "medical technologies", 
							"url" => "/industries/medical", 
							"id" => "level-0-4-8",
							"submenu" => [
                    [
                        "title" => "lifecycle services", 
                        "url" => "#",
                        "id" => "level-0-4-8-1",
                    ],
										["title" => "define", "url" => "/services/define", "id" => "level-0-4-8-2", 
											"submenu" => [
													["title" => "project development", "url" => "/services/define/project-dev"],
													["title" => "water resources", "url" => "/services/define/water"],
													["title" => "laboratory testing and modelling", "url" => "/services/define/testing"],
													["title" => "permitting", "url" => "/services/define/permitting"],
													["title" => "commercial support", "url" => "/services/define/commercial"]
											]
										],
										["title" => "design", "url" => "/services/design"],
										["title" => "applications", "url" => "/services/applications"],
										["title" => "deliver", "url" => "/services/deliver"],
										["title" => "operate", "url" => "/services/operate"],
										["title" => "maintain", "url" => "/services/maintain"],
										["title" => "upgrade", "url" => "/services/upgrade"],
										["title" => "report", "url" => "/services/report"],
                    ["title" => "applications", "url" => "/industries/mining/applications"]
                ]],
            [
                "title" => "mining, metals and minerals",
                "url" => "/industries/mining",
                "id" => "level-0-4-9",  
            ],
            ["title" => "municipal", "url" => "/industries/municipal", "id" => "level-0-4-10",],
            ["title" => "oil and gas", "url" => "/industries/oil-gas", "id" => "level-0-4-11",],
            ["title" => "ports & transportation", "url" => "/industries/ports", "id" => "level-0-4-12",],
            ["title" => "power generation", "url" => "/industries/power", "id" => "level-0-4-13",],
            ["title" => "pulp and paper", "url" => "/industries/pulp-paper", "id" => "level-0-4-14",],
            ["title" => "resorts and hospitality", "url" => "/industries/resorts", "id" => "level-0-4-15",]
        ]
    ],
    [
        "id" => "level-0-5",
        "title" => "projects",
        "url" => "/projects"
    ],
    [
      "id" => "level-0-6",
      "title" => "insights",
      "url" => "/insights"
    ],
    [
      "id" => "level-0-7",
      "title" => "about",
      "url" => "/about",
			"additional_class" => "top-margin",
    ],
    [
      "id" => "level-0-8",
      "title" => "contact",
      "url" => "/contact"
    ],
 ];
?>

<script type="text/javascript">
window.phpMenuData = <?php echo json_encode($menu_data); ?>;
</script>

<header class="header">
  <?php include('../assets/svg/svg.php'); ?>
  <div class="header-wrapper">
    <div class="header-top">
      <div class="content-wrapper">
        <button class="menu-toggle" aria-controls="main-menu" aria-expanded="false">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="language-select laptop-up">
          <select name="language" id="lang-select" class="regular-select">
            <option value="en" class="language-select_option">English</option>
            <option value="fr" class="language-select_option">Franch</option>
            <option value="fr" class="language-select_option">Spanish</option>
          </select>
        </div>
      </div>

      <a href="/" class="logo" aria-label="Go to Integrated Sustainability home page">
        <img class='logo--main' src="../assets/img/logo.png" alt="Integrated Sustainability" />
        <img class='logo--secondary' src="../assets/img/integratedsustainability.svg" alt="Integrated Sustainability" />
      </a>

      <div class="header__actions header__actions--desktop">
        <div class="search-container" id="header-search-container">
          <button class="search-toggle" aria-label="Toggle Search" aria-controls="header-search-input"
            aria-expanded="false">
            <svg viewBox="0 0 28 24" fill="none">
              <path fill="currentColor"
                d="m27.707 26.292-8.259-8.259A10.939 10.939 0 0 0 22.001 11c0-6.066-4.934-11-11-11S0 4.934 0 11s4.934 11 11 11c2.673 0 5.125-.96 7.033-2.553l8.259 8.259a.997.997 0 0 0 1.414 0 .998.998 0 0 0 0-1.414h.001ZM2 11c0-4.963 4.037-9 9-9s9 4.037 9 9-4.037 9-9 9-9-4.037-9-9Z" />
            </svg>
          </button>
          <form action="/search" method="get" class="search-form">
            <input type="search" name="q" id="header-search-input" placeholder="Search..." class="search-input"
              aria-label="Search site content">
          </form>
        </div>
        <button class="btn btn--gradient">Contact Us</button>
      </div>
    </div>
    <nav id="main-menu" class="main-menu" aria-label="Main Navigation">
      <div class="main-menu__close-btn">
        <button class="menu-close-toggle" aria-label="Close Menu">...</button>
      </div>

      <div class="main-menu__content">
      </div>
    </nav>
  </div>

  <template id="mobile-bottom-template">
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
  </template>

  <?php if (isset($subheader) && is_array($subheader)) : ?>
  <div class="header-subheader">
    <div class="subheader-wrapper">
      <?php foreach ($subheader as $index => $item) : ?>

      <a href="<?php echo $item['url']; ?>" class="subheader-item">
        <?php echo $item['title']; ?>
      </a>

      <?php if ($index < count($subheader) - 1) : ?>
      <span class="subheader-separator">/</span>
      <?php endif; ?>

      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>
</header>

<script type=' text/javascript' src="../assets/js/components-header_controller.js"></script>
<script type='text/javascript' src="../assets/js/components-menu_controller.js"></script>
<script type='text/javascript' src="../assets/js/components-search.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {

  const regularSelects = document.querySelectorAll('.regular-select');
  regularSelects.forEach(function(selectElement) {
    new Choices(selectElement, {
      removeItemButton: false,
      placeholder: true,
      maxItemCount: 5,
      itemSelectText: '',
      searchEnabled: false,
    });
  });
});
</script>