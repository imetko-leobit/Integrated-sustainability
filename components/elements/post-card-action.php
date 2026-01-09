<link rel="stylesheet" href="../assets/css/components-post_card.css" />

<article class="post-card--action">
  <a href="<?php echo $card['link']; ?>" class="post-card__link">
    <div class="post-card__content">
      <h3 class="post-card__title">
        <?php echo $card['title']; ?>
      </h3>
      <p class="post-card__desc">
        <?php echo $card['desc']; ?>
      </p>
    </div>
    <div class="post-card__action">
      <p class="post-card__card__action-text"><?php echo $card['action']; ?></p>
      <span class="arrow-icon">
        <svg id="arrow-top-right-gradient" viewBox="0 0 24 24">
          <path class="icon-arrow" fill="currentColor"
            d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z" />
        </svg>
      </span>
    </div>
  </a>
</article>