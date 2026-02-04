<?php
    // Default heading level to 3 if not provided
    $heading_level = $heading_level ?? 3;
    include_once(__DIR__ . '/../helpers/heading.php');
?>
<link rel="stylesheet" href="../assets/css/components-post_card.css" />

<article class="post-card" data-post-id="<?php echo $project['id']; ?>">
  <a href="<?php echo $project['link']; ?>" class="post-card__link">
    <?php if (!empty($project['image'])) : ?>
    <div class="post-card__image-wrapper">
      <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>" class="post-card__image" />

      <?php if (!empty($project['tags'])) : ?>
      <div class="post-card__tags">
        <?php foreach ($project['tags'] as $tag) : ?>
        <div class="post-card__tag">
          <p><?php echo $tag; ?></p>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    <div class="post-card__content">
      <?php render_heading($project['title'], $heading_level, 'post-card__title'); ?>
      <p class="post-card__description">
        <?php echo $project['description']; ?>
      </p>
    </div>
    <div class="post-card__arrow">
      <p class="arrow-text">Learn more</p>
      <span class="arrow-icon">
        <svg id="arrow-top-right-gradient" viewBox="0 0 24 24">
          <path class="icon-arrow" fill="currentColor"
            d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z" />
        </svg>
      </span>
    </div>
  </a>
</article>