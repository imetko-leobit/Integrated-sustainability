<link rel="stylesheet" href="../assets/css/section-block_reduce_fragmentation.css" />
<link rel="stylesheet" href="../assets/css/components-performance_grid.css" />

<section class="block-reduce-fragmentation">
  <div class="block-reduce-fragmentation__col block-reduce-fragmentation__col--text">
    <?php if (!empty($top_tagline)): ?>
    <p class="tagline"><?php echo $top_tagline; ?></p>
    <?php endif; ?>
    <div class="heading">
      <h3 class="title title--h3">
        creating the optimum conditions for high-performance infrastructure
      </h3>
    </div>
    <div class="text-content text-content--large text-content--grey">
      <p>To us, advocacy is a structured process of collaboration built on evidence and a shared purpose. It aligns
        technical innovation, academic insight, and local expertise to establish the consensus that turns ambition into
        responsible assets - for all stakeholders.</p>
      <p>Through this model, we strengthen the three fundamentals of project success—feasibility, acceptability, and
        viability—and create a continuous feedback system that drives performance from concept through operation. </p>
      <p>Advocacy connects performance with responsibility and is key to unlocking better environmental, social, and
        commercial outcomes.</p>
    </div>
    <div class="block-reduce-fragmentation_actions">
      <a href="/services" aria-label="Explore our services">
        <button class="btn btn--gradient">Read More</button>
      </a>
    </div>
  </div>

  <div class="block-reduce-fragmentation__col block-reduce-fragmentation__col--media">
    <div class="performance-grid performance-grid--right js-overlay-container">
      <?php
                $grid_items = [
                    ['icon' => '', 'label' => ''],
                    ['icon' => 'regulatory.svg',  'label' => 'academic partnerships'],
                    ['icon' => '',  'label' => ''],
                    ['icon' => 'carbon.svg',   'label' => 'technology advocacy'],
                    ['icon' => 'equipment.svg',  'label' => 'community empowerment '],
                    ['icon' => '',  'label' => ''],
                    ['icon' => 'compliance.svg',      'label' => 'project success'],
                ];

                $center_text = "";

                function render_grid_items($items, $center_text) {
                    foreach ($items as $index => $item):
                        if ($index === 4): ?>
      <div class="performance-grid__item performance-grid__item--center-img">
        <img src="../assets/img/directions.svg" />
      </div>
      <?php endif; ?>
      <a href="/services#<?php echo $item['label']; ?>"
        class="performance-grid__link <?php echo empty($item['label']) ? 'hidden' : ''; ?>"
        aria-hidden="<?php echo empty($item['label']) ? 'true' : 'false'; ?>"
        aria-label="Learn more about <?php echo $item['label']; ?> services">
        <div class="performance-grid__item performance-grid__item--square">
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

<script type=' text/javascript' src="../assets/js/components-performance_grid.js"></script>