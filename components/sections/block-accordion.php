<?php
$pillar_title = "align delivery expectations and execution accountability";
$pillar_text_1 = "Project owners need a partner who can validate the treatment concept, align scopes with the budget and permit conditions, and prepare modular, well-integrated systems that support a controlled transition to operation.";
$pillar_text_2 = "Our asset lifecycle capabilities include:";

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
    [
      'title' => 'project success',
      'desc' => "We're all stakeholders of our future resources. Employing an owner-mindset enables us to look beyond our own role to what the project, client, and community needs to succeed. We challenge convention where necessary, harness the next generation of environmental technologies and build constructive relationships to drive growth for our clients. ",
      'initial_open' => false,
      'button' => ['button_name' => 'Explore Advocacy', 'button_link' => '#']
  ],

];
// Default heading level to 2 if not provided
$heading_level = $heading_level ?? 2;
include_once(__DIR__ . '/../helpers/heading.php');
?>

<link rel="stylesheet" href="../assets/css/section-block_accordion.css" />
<section class="block-accordion" id="pilar2">
  <div class="block-accordion__wrapper">
    <div class="block-accordion__media">
      <div class="accordion-card__image-wrapper">
        <img src="../assets/img/delivery.jpg" alt="picture representing <?php echo $pillar_title; ?>" />
      </div>
    </div>

    <div class="block-accordion__description block-accordion__col--text">
      <?php if (!empty($pillar_number)): ?>
      <p class="tagline"><?php echo $pillar_number; ?></p>
      <?php endif ?>

      <div class="heading">
        <?php render_heading($pillar_title, $heading_level, 'title title--h1'); ?>
      </div>
      <?php if ( $pillar_text_1) : ?>
      <div class="text-content text-content--grey">
        <p><?php echo $pillar_text_1; ?></p>
      </div>
      <?php endif ?>

      <div class="block-accordion__media--mobile">
        <div class="accordion-card__image-wrapper">
          <img src="../assets/img/delivery.jpg" alt="picture representing <?php echo $pillar_title; ?>" />
        </div>
      </div>
      <?php if ( $pillar_text_2) : ?>
      <div class="text-content text-content--grey text-content--additional">
        <p><?php echo $pillar_text_2; ?></p>
      </div>
      <?php endif ?>

      <?php
        include('../components/elements/accordion.php')
      ?>
    </div>
  </div>
</section>