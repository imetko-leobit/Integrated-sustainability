<link href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../assets/css/components-main_menu.css" />


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
        <button class="btn btn--small btn--gradient">Contact Us</button>
      </div>
    </div>
    <nav id="main-menu" class="main-menu" aria-label="Main Navigation">
      <div class="main-menu__close-btn">
        <button class="menu-close-toggle" aria-label="Close Menu">...</button>
      </div>

      <?php include('_main-menu.php'); ?>
    </nav>
  </div>

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
<script type='text/javascript' src="../assets/js/components-breadcrumb_observer.js" defer></script>
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