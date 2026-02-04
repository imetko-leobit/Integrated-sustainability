<?php

  $details_img = '../assets/img/strengthen.png';
  $details_title1 = 'project overview';
  $details_title2 = 'project deliverables';
  $details_title3 = 'industry sector lead';
  $details_description = 'Our client was planning to use breakpoint chlorination (BPC) to manage the ammonia concentrations within the underground water at a Mine in the Yukon. The work included detailed research, design, and commissioning of the plant.';

  $details_deliverables = [
    'Breakpoint Chlorination (BPC) was designed to take place within the underground mine workings prior to metals removal.',
    'Completed a detailed investigation into published research in the area of BPC.',
    'Developed the basis for the process, which was advanced through design, procurement, and commissioning.',
    'Generated a control narrative and operations summary to inform automated dosing, chlorination breakpoint control, and effluent monitoring.',
    'Identified and addressed potential interferences from iron and manganese oxidation within the underground circuit prior to chlorination, to optimize chlorine demand.',
  ];

  $person_link = '#';
  $person_name = 'Ted Grant';
  $person_degree = 'M.A.Sc., P.Eng.';
  $person_role = 'Manager, Water Resources';
  $person_photo = "../assets/img/approach-intro-image.avif";

  $sidebar_tags = [
      [
          'title' => 'industry',
          'id' => 1,
          'links' => [
            ['name' => 'Miniing & Methods', 'link' => '#'],
          ]
      ],
      [
          'title' => 'services',
          'id' => 2,
          'links' => [
            ['name' => 'Assessment and Evaluations', 'link' => '#'],
            ['name' => 'Water Resources', 'link' => '#'],
            ['name' => 'Water Treatment', 'link' => '#'],
          ]
      ],
      [
          'title' => 'project tags',
          'id' => 3,
          'links' => [
            ['name' => 'Ammonia Removal', 'link' => '#'],
            ['name' => 'Breakpoint Chlorination', 'link' => '#'],
            ['name' => 'Detailed Design', 'link' => '#'],
            ['name' => 'Discharge Wastewater', 'link' => '#'],
            ['name' => 'Facility Design', 'link' => '#'],
            ['name' => 'Industrial Process Optimization', 'link' => '#'],
          ]
      ],
      [
          'title' => 'location',
          'id' => 4,
          'links' => [
            ['name' => 'Canada', 'link' => '#'],
            ['name' => 'Yukon', 'link' => '#'],
          ]
      ],

  ];

  $sidebar_img='../assets/img/sidebar.jpg';
  $sidebar_title='request a tailored credentials package' ;
  $sidebar_description='Provide a brief explanation of your project requirements and we will get back to you within 1 business week.';
  $sidebar_button_name='Submit Request' ;
?>

<link rel="stylesheet" href="../assets/css/section-block_details_sidebar.css" />
<link rel="stylesheet" href="../assets/css/components-info_card.css" />
<link rel="stylesheet" href="../assets/css/components-metadata_group.css" />

<section class="block-details-sidebar">
  <div class="block-details-sidebar__wrapper">
    <div class="details-content__wrapper">
      <div class="details-content__image">
        <img src="<?php echo $details_img; ?>" alt="Project Visual">
      </div>

      <div class="details__wrapper">
        <?php
              include('../components/elements/details-content.php')
          ?>
        <h3 class="title title--top-divider desktop"><?php echo $details_title3; ?></h3>
          <a href="<?php echo $person_link; ?>" class="person-card__link" aria-label="Learn more">
            <?php
                include('../components/elements/person-card.php')
            ?>
          </a>
      </div>
    </div>

    <asside class="asside">
      <div class="asside__metadata">
        <?php foreach ($sidebar_tags as $group) : ?>
        <div class="metadata-group">
          <h4 class="metadata-group__title"><?php echo $group['title']; ?></h4>
          <div class="metadata-group__links">
            <?php foreach ($group['links'] as $link) : ?>
            <a href="<?php echo $link['link']; ?>" class="metadata-tag"><span><?php echo $link['name']; ?></a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </asside>
    <div class="asside__sticky-card">
      <?php
          include('../components/elements/info-card.php')
      ?>
    </div>
  </div>
</section>