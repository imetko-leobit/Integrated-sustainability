<?php
/**
 * Reusable Filtered Grid Block
 *
 * A two-column layout with filters on the left and a grid of items on the right.
 * Can be reused across different pages with different data sets.
 *
 * Expected parameters:
 * - $grid_items: Array of items to display (required)
 * - $filter_config: Array of filter configurations (optional)
 * - $sort_options: Array of sort options (optional)
 *
 * Each item in $grid_items should have:
 * - 'title': Item title
 * - 'image': Image path
 * - 'url': Link URL (optional)
 */

// Default configuration
if (!isset($grid_items)) {
    $grid_items = [];
}

if (!isset($filter_config)) {
    $filter_config = [
        ['name' => 'category', 'label' => 'Category', 'options' => []],
        ['name' => 'type', 'label' => 'Type', 'options' => []],
        ['name' => 'application', 'label' => 'Application', 'options' => []],
        ['name' => 'capacity', 'label' => 'Capacity', 'options' => []],
    ];
}

if (!isset($sort_options)) {
    $sort_options = [
        ['value' => 'name-asc', 'label' => 'Name: A → Z'],
        ['value' => 'name-desc', 'label' => 'Name: Z → A'],
        ['value' => 'date-new', 'label' => 'Newest First'],
        ['value' => 'date-old', 'label' => 'Oldest First'],
    ];
}
// Default heading level for filter section titles
$filter_heading_level = $filter_heading_level ?? 5;
include_once(__DIR__ . '/../helpers/heading.php');
?>

<link rel="stylesheet" href="../assets/css/section-block_filtered_grid.css" />
<link rel="stylesheet" href="../assets/css/components-form_components.css" />
<link rel="stylesheet" href="../assets/css/section-block_form.css" />

<section class="block-filtered-grid">
  <div class="block-filtered-grid__container">

    <!-- Left Column: Filters -->
    <aside class="block-filtered-grid__filters">

      <!-- Filter By Section -->
      <div class="block-filtered-grid__filter-section">
        <?php render_heading('Filter By:', $filter_heading_level, 'block-filtered-grid__section-title'); ?>

        <div class="block-filtered-grid__filter-inputs">
          <?php foreach ($filter_config as $filter) : ?>
          <div class="block-filtered-grid__filter-item">
            <?php
              // Prepare props for custom select component
              $id = 'filter-' . $filter['name'];
              $name = $filter['name'];
              $label = $filter['label'];
              $options = isset($filter['options']) && is_array($filter['options']) ? $filter['options'] : [];
              $placeholder = $filter['label'];
              $value = '';
              $required = false;
              $hint = '';
              $errorMessage = '';
              $error = false;
              $fieldWrapperClass = '';
              $selectClass = 'js-filter-select';
              $dataAttributes = ['filter-name' => $filter['name']];

              // Include the custom select component
              include(__DIR__ . '/../form/select.php');
            ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Sort By Section -->
      <div class="block-filtered-grid__filter-section">
        <?php render_heading('Sort By:', $filter_heading_level, 'block-filtered-grid__section-title'); ?>

        <div class="block-filtered-grid__filter-item">
          <?php
            // Prepare props for custom select component
            $id = 'sort-select';
            $name = 'sort';
            $label = 'Sort Order';
            $options = $sort_options;
            $placeholder = 'Default';
            $value = '';
            $required = false;
            $hint = '';
            $errorMessage = '';
            $error = false;
            $fieldWrapperClass = '';
            $selectClass = 'js-sort-select';
            $dataAttributes = [];

            // Include the custom select component
            include(__DIR__ . '/../form/select.php');
          ?>
        </div>
      </div>

      <!-- Filters Applied Section -->
      <div class="block-filtered-grid__filter-section">
        <?php render_heading('Filters Applied', $filter_heading_level, 'block-filtered-grid__section-title'); ?>

        <div class="block-filtered-grid__chips js-filter-chips">
          <!-- Filter chips will be dynamically added here -->
          <div class="block-filtered-grid__chip btn--gradient">
            <span class="block-filtered-grid__chip-label">Biological Treatment</span>
            <button class="block-filtered-grid__chip-remove" aria-label="Remove Biological Treatment filter">×</button>
          </div>
        </div>
      </div>

    </aside>

    <!-- Right Column: Results Grid -->
    <div class="block-filtered-grid__results">
      <div class="block-filtered-grid__grid js-filtered-grid">
        <?php foreach ($grid_items as $index => $item) : ?>
        <div class="block-filtered-grid__grid-item"
             data-index="<?php echo (int)$index; ?>"
             data-category="<?php echo htmlspecialchars($item['category'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
             data-type="<?php echo htmlspecialchars($item['type'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
             data-application="<?php echo htmlspecialchars($item['application'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
             data-capacity="<?php echo htmlspecialchars($item['capacity'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
             data-title="<?php echo htmlspecialchars($item['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
             data-date="<?php echo htmlspecialchars($item['date'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
        >
          <?php
            $item_title = $item['title'];
            $item_image = $item['image'];
            $item_url = $item['url'] ?? '#';
            include(__DIR__ . '/../elements/equipment-card.php');
          ?>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- No results message -->
      <div class="block-filtered-grid__no-results js-no-results" style="display: none;">
        <p>No items match your filter criteria. Please adjust your filters and try again.</p>
      </div>
    </div>

  </div>
</section>

<script src="../assets/js/section-block_filtered_grid.js"></script>