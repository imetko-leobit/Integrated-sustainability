<?php
/**
 * Feature Block Component
 *
 * This component renders a flexible content block with text and media (image/grid) sections.
 * Supports dynamic layout configurations and checkbox-style lists.
 *
 * Expected variables:
 * - $tagline (string, optional): Top tagline text
 * - $title (string): Main heading text
 * - $paragraphs (array): Array of paragraph text strings
 * - $button (array): Button configuration with 'url' and 'label' keys
 * - $grid_items (array): Array of grid items with 'icon' and 'label' keys
 * - $center_item (array, optional): Center grid item with 'type' ('image' or 'text'), and 'content' (image path or text)
 * - $checkbox_list (array, optional): Array of checkbox items with 'icon' and 'label' keys
 * - $layout (string, optional): Layout configuration - 'image-left' (default), 'image-right', 'image-top', 'image-bottom'
 */

// Set defaults for optional variables
$tagline = $tagline ?? '';
$checkbox_list = $checkbox_list ?? [];
$layout = $layout ?? 'image-left';

/**
 * Helper function to render grid items with proper encoding
 */
function render_grid_items_feature($items, $center_item) {
    foreach ($items as $index => $item):
        if ($index === 4 && !empty($center_item)): ?>
          <?php if ($center_item['type'] === 'image'): ?>
          <div class="performance-grid__item performance-grid__item--center-img">
            <img src="<?php echo htmlspecialchars($center_item['content']); ?>" />
          </div>
          <?php else: ?>
          <div class="performance-grid__item performance-grid__item--center">
            <span class="text-gradient"><?php echo htmlspecialchars($center_item['content']); ?></span>
          </div>
          <?php endif; ?>
        <?php endif; ?>
        <a href="/services#<?php echo urlencode($item['label']); ?>"
          class="performance-grid__link <?php echo empty($item['label']) ? 'hidden' : ''; ?>"
          aria-hidden="<?php echo empty($item['label']) ? 'true' : 'false'; ?>"
          aria-label="Learn more about <?php echo htmlspecialchars($item['label']); ?> services">
          <div class="performance-grid__item <?php echo !empty($center_item) && $center_item['type'] === 'image' ? 'performance-grid__item--square' : ''; ?>">
            <?php if (!empty($item['icon'])): ?>
            <div class="performance-grid__icon">
              <img src="../assets/img/<?php echo $item['icon']; ?>" alt="<?php echo htmlspecialchars($item['label']); ?>">
            </div>
            <?php endif; ?>
            <?php if (!empty($item['label'])): ?>
            <span class="performance-grid__label"><?php echo htmlspecialchars($item['label']); ?></span>
            <?php endif; ?>
          </div>
        </a>
    <?php endforeach;
}
?>

<link rel="stylesheet" href="../assets/css/section-block_feature.css" />
<link rel="stylesheet" href="../assets/css/components-performance_grid.css" />

<section class="block-feature block-feature--<?php echo htmlspecialchars($layout); ?>">
  <div class="block-feature__col block-feature__col--text">
    <?php if (!empty($tagline)): ?>
    <p class="tagline"><?php echo htmlspecialchars($tagline); ?></p>
    <?php endif; ?>
    <div class="heading">
      <h3 class="title title--h3">
        <?php echo htmlspecialchars($title); ?>
      </h3>
    </div>
    <div class="text-content text-content--large text-content--grey">
      <?php foreach ($paragraphs as $paragraph): ?>
      <p><?php echo htmlspecialchars($paragraph); ?></p>
      <?php endforeach; ?>
    </div>

    <?php if (!empty($checkbox_list)): ?>
    <ul class="block-feature__list">
      <?php foreach ($checkbox_list as $item): ?>
      <li><?php echo htmlspecialchars($item['label']); ?></li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <div class="block-feature__actions">
      <a href="<?php echo htmlspecialchars($button['url']); ?>" aria-label="<?php echo htmlspecialchars($button['label']); ?>">
        <button class="btn btn--gradient"><?php echo htmlspecialchars($button['label']); ?></button>
      </a>
    </div>
  </div>

  <div class="block-feature__col block-feature__col--media">
    <div class="performance-grid performance-grid--right js-overlay-container">
      <div class="performance-grid__container">
        <div class="performance-grid__bg">
          <img src="../assets/img/bgGrid.svg" alt="Ellipses" aria-hidden="true">
        </div>

        <?php render_grid_items_feature($grid_items, $center_item); ?>
      </div>

      <div class="performance-grid__overlay" aria-hidden="true">
        <div class="performance-grid__container">
          <?php render_grid_items_feature($grid_items, $center_item); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<script type='text/javascript' src="../assets/js/components-performance_grid.js"></script>