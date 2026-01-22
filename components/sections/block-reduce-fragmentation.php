<link rel="stylesheet" href="../assets/css/section-block_reduce_fragmentation.css" />
<link rel="stylesheet" href="../assets/css/components-performance_grid.css" />

<section class="block-reduce-fragmentation">
  <div class="block-reduce-fragmentation__col block-reduce-fragmentation__col--text">
    <?php if (!empty($top_tagline)): ?>
    <p class="tagline"><?php echo $top_tagline; ?></p>
    <?php endif; ?>
    <div class="heading">
      <h3 class="title title--h3">
        discover how unified environmental science and operational expertise delivers sustainable business performance
      </h3>
    </div>
    <div class="text-content text-content--grey">
      <p>Asset performance drifts within fragmented service delivery. Our integrated delivery approach connects on-site
        realities to design, equipment supply, and operations to create predictable facility behaviour.</p>
      <p>This continuity strengthens accountability and stabilizes operations, helping you advance a coherent
        performance system that protects resources and supports long-term system resilience for your project
        stakeholders.</p>
    </div>
    <div class="block-reduce-fragmentation_actions">
      <a href="/services" aria-label="Explore our services">
        <button class="btn btn--gradient">Explore Services</button>
      </a>
    </div>
  </div>

  <div class="block-reduce-fragmentation__col block-reduce-fragmentation__col--media">
    <div class="performance-grid performance-grid--right js-overlay-container">
      <?php
                $grid_items = [
                    ['icon' => 'feasibility.svg', 'label' => 'feasibility'],
                    ['icon' => 'laboratory.svg',  'label' => 'laboratory'],
                    ['icon' => 'regulatory.svg',  'label' => 'regulatory'],
                    ['icon' => 'compliance.svg',  'label' => 'compliance'],
                    ['icon' => 'design.svg',      'label' => 'design'],
                    ['icon' => 'carbon.svg',      'label' => 'carbon'],
                    ['icon' => 'operations.svg',  'label' => 'operations'],
                    ['icon' => 'equipment.svg',   'label' => 'equipment'],
                ];

                $center_text = "unified project delivery and asset performance";

                function render_grid_items($items, $center_text) {
                    foreach ($items as $index => $item):
                        if ($index === 4): ?>
      <div class="performance-grid__item performance-grid__item--center">
        <span class="text-gradient"><?php echo $center_text; ?></span>
      </div>
      <?php endif; ?>
      <a href="/services#<?php echo $item['label']; ?>" class="performance-grid__link"
        aria-label="Learn more about <?php echo $item['label']; ?> services">
        <div class="performance-grid__item">
          <div class="performance-grid__icon">
            <img src="../assets/img/<?php echo $item['icon']; ?>" alt="<?php echo $item['label']; ?>">
          </div>
          <span class="performance-grid__label"><?php echo $item['label']; ?></span>
        </div>
      </a>
      <?php endforeach;
                }
            ?>

      <div class="performance-grid__container">
        <div class="performance-grid__bg">
          <img src="../assets/img/bgGrid.svg" alt="Elipses" aria-hidden="true">
        </div>

        <?php render_grid_items($grid_items, $center_text); ?>
      </div>

      <div class="performance-grid__overlay" aria-hidden="true">
        <div class="performance-grid__container">
          <?php render_grid_items($grid_items, $center_text); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<script type='text/javascript' src="../assets/js/components-performance_grid.js"></script>