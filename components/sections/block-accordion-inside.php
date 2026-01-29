<?php
$title = "What sample volumes and conditions are required for significant testing results?";
$description = "Sample volumes vary based on the type of analysis, but most chemistry and treatability tests require 1–4 litres to complete a full suite of parameters. We provide guidance on collection, preservation, and shipping to ensure samples arrive in a condition suitable for defensible laboratory results.";

$bg_image = '../assets/img/grass.png';

$accordion_items = [
    [
        'title' => 'Can multiple treatment scenarios be evaluated in a single testing program?',
        'desc' => 'Coordinating design, sizing, and equipment supply through a single partner results ties each decision to performance and results in greater cost and schedule certainty.',
        'initial_open' => false,
    ],
    [
        'title' => 'Do you offer on-site or remote laboratory support?',
        'desc' => 'Develop integrated water management plans to ensure compliance and operational reliability.',
        'initial_open' => false,
    ],
    [
        'title' => 'How quickly can results be delivered for time-critical projects?',
        'list' => ['Uncertain discharge quality requirements or reporting thresholds', 'New permitting expectations tied to production changes or site expansions', 'Need for clearer monitoring strategies to support compliance confidence', 'Limited alignment between operational behaviour and regulatory commitments', 'Preparing systems and reporting structures for audits, reviews, or regulatory updates'],
        'initial_open' => false,
    ],
    [
      'title' => 'Can laboratory and modelling support systems not designed or built by Integrated Sustainability?',
      'desc' => "We're all stakeholders of our future resources. Employing an owner-mindset enables us to look beyond our own role to what the project, client, and community needs to succeed. We challenge convention where necessary, harness the next generation of environmental technologies and build constructive relationships to drive growth for our clients. ",
      'initial_open' => false,
      'button' => ['button_name' => 'Explore Advocacy', 'button_link' => '#']
  ],

];
?>

<link rel="stylesheet" href="../assets/css/section-block_accordion_inside.css" />
<link rel="stylesheet" href="../assets/css/components-gradient_link.css" />

<section class="block-accordion-inside">
  <div class="block-accordion__wrapper">
    <div class="block-accordion__image">
      <img src="<?php echo $bg_image; ?>" alt="picture representing <?php echo $title; ?>" />
    </div>

    <div class="block-accordion__content">
      <div class="block-accordion__content-inner">
        <h4 class="title"><?php echo $title; ?></h4>
        <p class="description"><?php echo $description; ?></p>

        <div class="gradient-link gradient-link--large">
          <a href="/wp-content/themes/integrate/frontend/pages/insights.php" aria-label="Discuss with our team">
            <p class="gradient-link__text">Discuss with our team </p>
            <span class="arrow-icon">
              <svg id="arrow-top-right-gradient" viewBox="0 0 24 24">
                <path class="icon-arrow" fill="currentColor"
                  d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z" />
              </svg>
            </span>
          </a>
        </div>

        <?php
          include('../components/elements/accordion.php')
        ?>
      </div>
    </div>
  </div>
</section>