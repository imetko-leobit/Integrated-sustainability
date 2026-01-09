<?php
/**
 * Feature Block Component
 *
 * This component renders a flexible content block with text and media (image/grid) sections.
 * Supports dynamic layout configurations and checkbox-style lists with automatic checkmark icons.
 *
 * Replaces: block_reusable.php with enhanced functionality
 *
 * Expected variables:
 * - $tagline (string, optional): Top tagline text
 * - $title (string): Main heading text
 * - $paragraphs (array): Array of paragraph text strings
 * - $button (array): Button configuration with 'url' and 'label' keys
 * - $grid_items (array): Array of grid items with 'icon' and 'label' keys
 * - $center_item (array, optional): Center grid item with 'type' ('image' or 'text'), and 'content' (image path or text)
 * - $checkbox_list (array, optional): Array of items with 'label' key. Note: 'icon' key is ignored; checkmarks are added via CSS using the item-marked mixin.
 * - $layout (string, optional): Layout configuration
 *     - 'image-left': Image/grid left, text right
 *     - 'image-right' (default): Text left, image/grid right
 *     - 'image-top': Image/grid top, text bottom
 *     - 'image-bottom': Text top, image/grid bottom
 *
 * Example usage:
 * <?php
 *   $tagline = 'Academic Partnerships';
 *   $title = 'Bridging research with execution';
 *   $paragraphs = ['We actively collaborate with universities...'];
 *   $button = ['url' => '/services', 'label' => 'Become a Partner'];
 *   $layout = 'image-right';
 *   $checkbox_list = [
 *     ['label' => 'Partner with academic institutions'],
 *     ['label' => 'Support graduate research'],
 *   ];
 *   $grid_items = [
 *     ['icon' => 'feasibility.svg', 'label' => 'feasibility'],
 *     ['icon' => 'laboratory.svg', 'label' => 'laboratory'],
 *   ];
 *   $center_item = ['type' => 'image', 'content' => '../assets/img/logo.svg'];
 *   include('../components/sections/block-feature.php');
 * ?>
 */

// Set defaults for optional variables
$tagline = $tagline ?? '';
$checkbox_list = $checkbox_list ?? [];
$layout = $layout ?? 'image-right';

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
        <?php if (!empty($item['label'])): ?>
        <a href="/services#<?php echo urlencode($item['label']); ?>"
          class="performance-grid__link"
          aria-label="Learn more about <?php echo htmlspecialchars($item['label']); ?> services">
          <div class="performance-grid__item <?php echo !empty($center_item) && $center_item['type'] === 'image' ? 'performance-grid__item--square' : ''; ?>">
            <?php if (!empty($item['icon'])): ?>
            <div class="performance-grid__icon">
              <img src="../assets/img/<?php echo htmlspecialchars($item['icon']); ?>" alt="<?php echo htmlspecialchars($item['label']); ?>">
            </div>
            <?php endif; ?>
            <span class="performance-grid__label"><?php echo htmlspecialchars($item['label']); ?></span>
          </div>
        </a>
        <?php endif; ?>
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
      <a href="<?php echo htmlspecialchars($button['url']); ?>" class="btn btn--gradient" aria-label="<?php echo htmlspecialchars($button['label']); ?>">
        <?php echo htmlspecialchars($button['label']); ?>
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
