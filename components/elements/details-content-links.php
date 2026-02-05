<link rel="stylesheet" href="../assets/css/components-details_content_links.css" />

<?php
    $details_title2 = $details_title2 ?? null;
    $details_title3 = $details_title3 ?? null;
    $details_title4 = $details_title4 ?? null;
    $details_title5 = $details_title5 ?? null;
    $details_title6 = $details_title5 ?? null;
    $details_description = $details_description ?? null;
    $details_description2 = $details_description2 ?? null;
    $details_description3 = $details_description3 ?? null;

    $details_deliverables = $details_deliverables ?? null;
    $details_links = $details_links ?? null;
    
    // Default heading levels
    $main_heading_level = $main_heading_level ?? 2;
    $sub_heading_level = $sub_heading_level ?? 3;
    include_once(__DIR__ . '/../helpers/heading.php');

  $links = [
    ['title' => 'proceed to water treatment use cases', 'url' => '/industries', 'class' => 'single'],  // single or double
    ['title' => 'skip to oil and gas support services', 'url' => '/industries/oil-gas', 'class' => 'double'],
    ['title' => 'other', 'url' => '/industries/other', 'class' => 'single']
];
?>

<div class="details-content-links">
  <?php if ($details_title1): ?>
  <?php render_heading($details_title1, $main_heading_level, 'title title--h2'); ?>
    <?php endif; ?>
    <?php if ($details_description): ?>
    <p><?php echo $details_description; ?></p>
    <?php endif; ?>
    <?php if ($details_title2): ?>
    <?php render_heading($details_title2, $sub_heading_level, 'title title--h3'); ?>
    <?php endif; ?>
    <?php if ($details_description2): ?>
    <p><?php echo $details_description2; ?></p>
    <?php endif; ?>
    <ul>
      <li>
        Conventional oil production

      </li>
      <li>
        Midstream gathering and terminals
      </li>

      <li>
        Natural gas processing and compression
      </li>
      <li>
        Refining and downstream facilities

      </li>
      <li>
        Steam-assisted gravity drainage (SAGD)
      </li>
      <li>
        Unconventional shale and tight oil
      </li>
    </ul>
    <?php if ($details_title3): ?>
    <?php render_heading($details_title3, $sub_heading_level, 'title title--h3'); ?>
    <?php endif; ?>
    <?php if ($details_description3): ?>
    <p><?php echo $details_description3; ?></p>
    <?php endif; ?>
    <?php

        $accordion_items = [
          [
              'title' => 'design-equipment pathway',
              'desc' => 'Coordinating design, sizing, and equipment supply through a single partner results ties each decision to performance and results in greater cost and schedule certainty.',
              'initial_open' => false,
          ],
          [
              'title' => 'water-as-a-service',
              'desc' => 'Develop integrated water management plans to ensure compliance and operational reliability.',
              'initial_open' => false,
          ],
          [
              'title' => 'fixed price delivery',
              'list' => ['Uncertain discharge quality requirements or reporting thresholds', 'New permitting expectations tied to production changes or site expansions', 'Need for clearer monitoring strategies to support compliance confidence', 'Limited alignment between operational behaviour and regulatory commitments', 'Preparing systems and reporting structures for audits, reviews, or regulatory updates'],
              'initial_open' => false,
          ],

        ];
        @include('../components/elements/accordion.php')
      ?>
    <?php

    @include ('../components/elements/contact-card.php')

    ?>
    <?php if ($details_title4): ?> 
    <?php render_heading($details_title4, $sub_heading_level, 'title title--h3'); ?>
    <?php endif; ?>


    <?php
    @include('../components/elements/link-card.php')
    ?>
</div>