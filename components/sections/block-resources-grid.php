<?php
// Configuration
if (!isset($items_per_row)) {
    $items_per_row = 3; // Default: 3 columns
}
if (!isset($initial_rows)) {
    $initial_rows = 3; // Default: 3 rows
}
if (!isset($load_more_increment)) {
    $load_more_increment = 3; // Default: load 3 more items
}
// Default heading level
$block_resources_grid_heading_level = $block_resources_grid_heading_level ?? 2;
include_once(__DIR__ . '/../helpers/heading.php');

$initial_items = $items_per_row * $initial_rows;

// Sample data - in production this would come from a database or API
$resources = [
    [
        'title' => 'Sustainable Water Management Guide',
        'description' => 'Comprehensive guidelines for implementing sustainable water management practices in industrial settings.',
        'url' => '#resource-1'
    ],
    [
        'title' => 'Environmental Compliance Framework',
        'description' => 'Essential framework for maintaining environmental compliance across water treatment facilities.',
        'url' => '#resource-2'
    ],
    [
        'title' => 'Asset Performance Optimization',
        'description' => 'Best practices for optimizing asset performance throughout the water infrastructure lifecycle.',
        'url' => '#resource-3'
    ],
    [
        'title' => 'Mine Water Treatment Solutions',
        'description' => 'Innovative solutions for addressing complex mine water treatment challenges and regulations.',
        'url' => '#resource-4'
    ],
    [
        'title' => 'Infrastructure Resilience Planning',
        'description' => 'Strategic planning approaches for building resilient water infrastructure systems.',
        'url' => '#resource-5'
    ],
    [
        'title' => 'Water Quality Monitoring Systems',
        'description' => 'Advanced monitoring systems and protocols for ensuring optimal water quality standards.',
        'url' => '#resource-6'
    ],
    [
        'title' => 'Industrial Wastewater Treatment',
        'description' => 'Modern approaches to industrial wastewater treatment and resource recovery.',
        'url' => '#resource-7'
    ],
    [
        'title' => 'Hydroelectric Asset Management',
        'description' => 'Comprehensive management strategies for hydroelectric power infrastructure and operations.',
        'url' => '#resource-8'
    ],
    [
        'title' => 'Climate Adaptation Strategies',
        'description' => 'Practical strategies for adapting water systems to climate change impacts and uncertainties.',
        'url' => '#resource-9'
    ],
    [
        'title' => 'Water Reuse Technologies',
        'description' => 'Emerging technologies and methodologies for implementing water reuse programs.',
        'url' => '#resource-10'
    ],
    [
        'title' => 'Energy Efficiency in Water Systems',
        'description' => 'Guidelines for improving energy efficiency in water and wastewater treatment systems.',
        'url' => '#resource-11'
    ],
    [
        'title' => 'Stakeholder Engagement Best Practices',
        'description' => 'Effective methods for engaging stakeholders in water infrastructure projects.',
        'url' => '#resource-12'
    ],
];
?>

<link rel="stylesheet" href="../assets/css/section-block_resources_grid.css" />

<section class="block-resources-grid">
  <!-- Header Section -->
  <div class="block-resources-grid__header">
    <?php render_heading(isset($section_title) ? $section_title : 'Resources & Insights', $block_resources_grid_heading_level, 'title title--h1'); ?>
  </div>

  <!-- Grid Section -->
  <div class="block-resources-grid__grid js-resources-grid">
    <?php foreach ($resources as $index => $resource) :
      $is_hidden = $index >= $initial_items ? 'is-hidden' : '';
    ?>
    <div class="block-resources-grid__item <?php echo htmlspecialchars($is_hidden, ENT_QUOTES, 'UTF-8'); ?>" data-index="<?php echo (int)$index; ?>">
      <?php
        $title = $resource['title'];
        $description = $resource['description'];
        $url = $resource['url'];
        include('../components/elements/card-external.php');
      ?>
    </div>
    <?php endforeach; ?>
  </div>

  <!-- Load More Button -->
  <?php if (count($resources) > $initial_items) : ?>
  <div class="block-resources-grid__actions">
    <button class="btn btn--gradient js-load-more-resources" data-initial="<?php echo (int)$initial_items; ?>" data-increment="<?php echo (int)$load_more_increment; ?>">
      Load More
    </button>
  </div>
  <?php endif; ?>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const loadMoreBtn = document.querySelector('.js-load-more-resources');

  if (loadMoreBtn) {
    const grid = document.querySelector('.js-resources-grid');
    const items = grid.querySelectorAll('.block-resources-grid__item');
    const increment = parseInt(loadMoreBtn.getAttribute('data-increment'));
    let currentlyVisible = parseInt(loadMoreBtn.getAttribute('data-initial'));

    loadMoreBtn.addEventListener('click', function() {
      let itemsToShow = 0;

      // Show next batch of items
      items.forEach((item, index) => {
        if (index >= currentlyVisible && index < currentlyVisible + increment) {
          item.classList.remove('is-hidden');
          itemsToShow++;
        }
      });

      currentlyVisible += itemsToShow;

      // Hide button if all items are visible
      if (currentlyVisible >= items.length) {
        loadMoreBtn.style.display = 'none';
      }
    });
  }
});
</script>
