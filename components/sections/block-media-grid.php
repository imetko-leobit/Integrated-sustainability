<?php
// Default heading level
$heading_level = $heading_level ?? 3;
include_once(__DIR__ . '/../helpers/heading.php');
?>
<link rel="stylesheet" href="../assets/css/section-block_media_grid.css" />
<section class='block-media-grid'>
  <?php if ($card): ?>
  <div class="additional-card laptop-down">
    <?php
    include('../components/elements/pillar-card.php');
    ?>
  </div>
  <?php endif; ?>

  <?php foreach ($cards_data as $item) : ?>
  <article class='media-card'>
    <div class='media-card__content'>
      <div class='media-card__tagline-trigger js-accordion-trigger'>
        <p class='tagline'><?php echo $item['tagline']; ?></p>
        <span class="accordion-item__icon">
          <span class="icon-plus">
            <svg>
              <use xlink:href="#plus"></use>
            </svg>
          </span>
          <span class="icon-minus">
            <svg>
              <use xlink:href="#minus"></use>
            </svg>
          </span>
        </span>
      </div>
      <div class='media-card__tagline'>
        <p class='tagline'><?php echo $item['tagline']; ?></p>
      </div>
      <?php render_heading($item['title'], $heading_level, 'title title--h3'); ?>
      <p><?php echo $item['description']; ?></p>
      <p><?php echo $item['description_second']; ?></p>
      <q><?php echo $item['quote']; ?></q>
    </div>
    <div class='media-card__image-wrapper'>
      <img class='media-card__image' src='<?php echo $item['image']; ?>' alt='<?php echo $item['title']; ?>' />
    </div>
  </article>
  <?php endforeach; ?>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const accordionTriggers = document.querySelectorAll('.js-accordion-trigger');

  accordionTriggers.forEach(trigger => {
    trigger.addEventListener('click', function() {
      const currentCard = this.closest('.media-card');
      const isOpen = currentCard.classList.contains('is-open');

      document.querySelectorAll('.media-card.is-open').forEach(card => {
        card.classList.remove('is-open');
      });

      if (!isOpen) {
        currentCard.classList.add('is-open');

        setTimeout(() => {
          currentCard.scrollIntoView({
            behavior: 'smooth',
            block: 'nearest'
          });
        }, 300);
      }
    });
  });
});
</script>