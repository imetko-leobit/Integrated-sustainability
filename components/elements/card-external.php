<link rel="stylesheet" href="../assets/css/components-card_external.css" />

<a href="<?php echo $url; ?>" class="card-external" target="_blank" rel="noopener noreferrer">
  <div class="card-external__content">
    <h3 class="card-external__title title title--h4">
      <?php echo $title; ?>
    </h3>
    <p class="card-external__description text-content">
      <?php echo $description; ?>
    </p>
  </div>
  <div class="card-external__arrow">
    <span class="arrow-icon">
      <svg id="arrow-top-right" viewBox="0 0 24 24">
        <path class="icon-arrow" fill="currentColor"
          d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z" />
      </svg>
    </span>
  </div>
</a>
