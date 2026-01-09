<link rel="stylesheet" href="../assets/css/components-author.css" />

<?php
$autor_title = $autor_title ?? null;
$social_icon = $social_icon ?? null;
?>

<section class="block-author">
  <?php if ($autor_title): ?>
  <h3 class="title"><?php echo $autor_title; ?></h3>
  <?php endif; ?>
  <div class="block-author__wrapper">
    <div class='author__person'>
      <?php 
          include('../components/elements/person-card.php') 
      ?> <?php if ($social_icon): ?> <div class=' author__actions'>
        <a href='#' class='social-link'><img src='<?php echo $social_icon; ?>' alt='social link icon' /></a>
        <button class='mail-button'><img src='../assets/img/mail.svg' alt='mail icon' /></button>
      </div>
      <?php endif; ?>
    </div>
    <p class='author__description'><?php echo $autor_description; ?></p>
    <div class="link link--large">
      <a href="/wp-content/themes/integrate/frontend/pages/insights.php" aria-label="Insights & Whitepapers ">
        <p class="link__text">Insights & Whitepapers </p>
        <span class="arrow-icon">
          <svg id="arrow-top-right" viewBox="0 0 24 24">
            <path class="icon-arrow" fill="currentColor"
              d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z" />
          </svg>
        </span>
      </a>
    </div>
  </div>

</section>