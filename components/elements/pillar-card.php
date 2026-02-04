<?php
    // Default heading level to 3 if not provided
    $heading_level = $heading_level ?? 3;
    include_once(__DIR__ . '/../helpers/heading.php');
?>
<link rel="stylesheet" href="../assets/css/components-pillar_card.css" />

<article class='pillar-card'>
  <?php if (!empty($card['link'])): ?>
  <a class="pillar-card__content" href="<?php echo $card['link']; ?>"
    aria-label="Advance to <?php echo $card['title']; ?>">
    <?php else: ?>
    <div class="pillar-card__content">
      <?php endif; ?>

      <div class='pillar-card__text'>
        <p class="pillar-card__caption"><?php echo $card['caption']; ?></p>

        <?php render_heading($card['title'], $heading_level, 'pillar-card__title'); ?>
        <p class="pillar-card__desc"><?php echo $card['desc']; ?></p>
      </div>
      <?php if (!empty($card['action'])): ?>
      <div class="pillar-card__action">
        <p class="pillar-card__card__action-text"><?php echo $card['action']; ?></p>
        <span class="arrow-icon">
          <svg id="arrow-top-right-gradient" viewBox="0 0 24 24">
            <path class="icon-arrow" fill="currentColor"
              d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z" />
          </svg>
        </span>
      </div>
      <?php endif; ?>

      <?php if (!empty($card['link'])): ?>
  </a>
  <?php else: ?>
  </div>
  <?php endif; ?>
</article>