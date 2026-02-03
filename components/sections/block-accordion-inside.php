<?php
$bg_image = '../assets/img/grass.png';

$accordion_items = [
    [
        'title' => 'What sample volumes and conditions are required for significant testing results?',
        'desc' => 'Sample volumes vary based on the type of analysis, but most chemistry and treatability tests require 1–4 litres to complete a full suite of parameters. We provide guidance on collection, preservation, and shipping to ensure samples arrive in a condition suitable for defensible laboratory results.',
        'initial_open' => true,
        'button' => ['button_name' => 'Discuss with our team', 'button_link' => '/wp-content/themes/integrate/frontend/pages/insights.php']
    ],
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
<link rel="stylesheet" href="../assets/css/components-accordion.css" />

<section class="block-accordion-inside">
  <div class="block-accordion__wrapper">
    <div class="block-accordion__image">
      <img src="<?php echo $bg_image; ?>" alt="FAQ Background" />
    </div>

    <div class="block-accordion__content">
      <div class="block-accordion__content-inner">
        <?php include('../components/elements/accordion.php'); ?>
      </div>
    </div>
  </div>
</section>