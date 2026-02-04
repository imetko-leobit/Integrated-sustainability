<link rel="stylesheet" href="../assets/css/components-link_card.css" />


<div class="link-cards">
  <?php foreach ($links as $card): ?>
  <a href="<?php echo $card['link']; ?>" class="link-card <?php echo $card['class']; ?> ">
    <div class="card__content">
      <p class="card__title js-ellipsis-title">
        <?php echo $card['title']; ?>
      </p>

      <span class="arrow-icon">
        <svg id="arrow-top-right" transform="rotate(90)" viewBox="0 0 24 24">
          <path class="icon-arrow" fill="currentColor"
            d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z" />
        </svg>
      </span>
    </div>
  </a>
  <?php endforeach; ?>
</div>