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
            <option value="sp" class="language-select_option">Spanish</option>
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
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M27.707 26.292L19.4482 18.0333C21.041 16.126 22.001 13.673 22.001 11C22.001 4.9345 17.0665 0 11.001 0C4.9345 0 0 4.9345 0 11C0 17.0655 4.9345 22 11 22C13.6727 22 16.125 21.0391 18.0332 19.4473L26.292 27.706C26.4873 27.9013 26.7432 27.999 26.999 27.999C27.2549 27.999 27.5117 27.9013 27.706 27.706C28.0976 27.3144 28.0976 26.6836 27.706 26.292L27.707 26.292ZM1.9995 11C1.9995 6.037 6.0365 2 10.9995 2C15.9625 2 19.9995 6.037 19.9995 11C19.9995 15.963 15.9625 20 10.9995 20C6.0365 20 1.9995 15.963 1.9995 11Z" fill="#B3B3B3"/>
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