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
?>

<link rel="stylesheet" href="../assets/css/section-block_filtered_grid.css" />

<section class="block-filtered-grid">
  <div class="block-filtered-grid__container">
    
    <!-- Left Column: Filters -->
    <aside class="block-filtered-grid__filters">
      
      <!-- Filter By Section -->
      <div class="block-filtered-grid__filter-section">
        <h3 class="block-filtered-grid__section-title">Filter By</h3>
        
        <div class="block-filtered-grid__filter-inputs">
          <?php foreach ($filter_config as $filter) : ?>
          <div class="block-filtered-grid__filter-item">
            <select 
              name="<?php echo htmlspecialchars($filter['name'], ENT_QUOTES, 'UTF-8'); ?>" 
              class="block-filtered-grid__select js-filter-select"
              data-filter-name="<?php echo htmlspecialchars($filter['name'], ENT_QUOTES, 'UTF-8'); ?>"
            >
              <option value=""><?php echo htmlspecialchars($filter['label'], ENT_QUOTES, 'UTF-8'); ?></option>
              <?php if (isset($filter['options']) && is_array($filter['options'])) : ?>
                <?php foreach ($filter['options'] as $option) : ?>
                <option value="<?php echo htmlspecialchars($option['value'], ENT_QUOTES, 'UTF-8'); ?>">
                  <?php echo htmlspecialchars($option['label'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
                <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Sort By Section -->
      <div class="block-filtered-grid__filter-section">
        <h3 class="block-filtered-grid__section-title">Sort By</h3>
        
        <div class="block-filtered-grid__filter-item">
          <select 
            name="sort" 
            class="block-filtered-grid__select js-sort-select"
          >
            <option value="">Default</option>
            <?php foreach ($sort_options as $option) : ?>
            <option value="<?php echo htmlspecialchars($option['value'], ENT_QUOTES, 'UTF-8'); ?>">
              <?php echo htmlspecialchars($option['label'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <!-- Filters Applied Section -->
      <div class="block-filtered-grid__filter-section">
        <h3 class="block-filtered-grid__section-title">Filters Applied</h3>
        
        <div class="block-filtered-grid__chips js-filter-chips">
          <!-- Filter chips will be dynamically added here -->
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
