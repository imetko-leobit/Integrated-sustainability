<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Equipment Categories - Secondary Water Treatment Equipment</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="equipment-categories">
  <?php include('../components/header/_header.php'); ?>

  <main class="main">
    <?php 
      // Hero Block Configuration
      $hero_title = "Secondary Water Treatment Equipment";
      $hero_description = "";
      $hero_img = "../assets/img/bg-industry.png";
      $hero_button_name = "";
      include('../components/sections/block-hero.php');
    ?>

    <?php
      // Sample equipment data - in production this would come from a database
      $grid_items = [
        [
          'title' => 'Activated Sludge System',
          'image' => '../assets/img/projects.png',
          'url' => '#equipment-1',
          'category' => 'biological',
          'type' => 'aerobic',
          'application' => 'municipal',
          'capacity' => 'large',
          'date' => '2024-01-01'
        ],
        [
          'title' => 'Membrane Bioreactor',
          'image' => '../assets/img/delivery.jpg',
          'url' => '#equipment-2',
          'category' => 'biological',
          'type' => 'aerobic',
          'application' => 'industrial',
          'capacity' => 'medium',
          'date' => '2024-02-01'
        ],
        [
          'title' => 'Trickling Filter',
          'image' => '../assets/img/image3.jpg',
          'url' => '#equipment-3',
          'category' => 'biological',
          'type' => 'aerobic',
          'application' => 'municipal',
          'capacity' => 'medium',
          'date' => '2024-03-01'
        ],
        [
          'title' => 'Rotating Biological Contactor',
          'image' => '../assets/img/sidebar.jpg',
          'url' => '#equipment-4',
          'category' => 'biological',
          'type' => 'aerobic',
          'application' => 'municipal',
          'capacity' => 'small',
          'date' => '2024-04-01'
        ],
        [
          'title' => 'Sequencing Batch Reactor',
          'image' => '../assets/img/projects.png',
          'url' => '#equipment-5',
          'category' => 'biological',
          'type' => 'aerobic',
          'application' => 'industrial',
          'capacity' => 'large',
          'date' => '2024-05-01'
        ],
        [
          'title' => 'Anaerobic Digester',
          'image' => '../assets/img/delivery.jpg',
          'url' => '#equipment-6',
          'category' => 'biological',
          'type' => 'anaerobic',
          'application' => 'industrial',
          'capacity' => 'large',
          'date' => '2024-06-01'
        ],
        [
          'title' => 'Moving Bed Biofilm Reactor',
          'image' => '../assets/img/image3.jpg',
          'url' => '#equipment-7',
          'category' => 'biological',
          'type' => 'aerobic',
          'application' => 'municipal',
          'capacity' => 'medium',
          'date' => '2024-07-01'
        ],
        [
          'title' => 'Oxidation Ditch',
          'image' => '../assets/img/sidebar.jpg',
          'url' => '#equipment-8',
          'category' => 'biological',
          'type' => 'aerobic',
          'application' => 'municipal',
          'capacity' => 'large',
          'date' => '2024-08-01'
        ],
        [
          'title' => 'Extended Aeration System',
          'image' => '../assets/img/projects.png',
          'url' => '#equipment-9',
          'category' => 'biological',
          'type' => 'aerobic',
          'application' => 'municipal',
          'capacity' => 'small',
          'date' => '2024-09-01'
        ],
        [
          'title' => 'Contact Stabilization',
          'image' => '../assets/img/delivery.jpg',
          'url' => '#equipment-10',
          'category' => 'biological',
          'type' => 'aerobic',
          'application' => 'industrial',
          'capacity' => 'medium',
          'date' => '2024-10-01'
        ],
        [
          'title' => 'Biofilm Reactor',
          'image' => '../assets/img/image3.jpg',
          'url' => '#equipment-11',
          'category' => 'biological',
          'type' => 'aerobic',
          'application' => 'municipal',
          'capacity' => 'small',
          'date' => '2024-11-01'
        ],
        [
          'title' => 'Upflow Anaerobic Sludge Blanket',
          'image' => '../assets/img/sidebar.jpg',
          'url' => '#equipment-12',
          'category' => 'biological',
          'type' => 'anaerobic',
          'application' => 'industrial',
          'capacity' => 'large',
          'date' => '2024-12-01'
        ],
      ];

      // Filter configuration
      $filter_config = [
        [
          'name' => 'category',
          'label' => 'Category',
          'options' => [
            ['value' => 'biological', 'label' => 'Biological Treatment'],
            ['value' => 'chemical', 'label' => 'Chemical Treatment'],
            ['value' => 'physical', 'label' => 'Physical Treatment'],
          ]
        ],
        [
          'name' => 'type',
          'label' => 'Type',
          'options' => [
            ['value' => 'aerobic', 'label' => 'Aerobic'],
            ['value' => 'anaerobic', 'label' => 'Anaerobic'],
            ['value' => 'hybrid', 'label' => 'Hybrid'],
          ]
        ],
        [
          'name' => 'application',
          'label' => 'Application',
          'options' => [
            ['value' => 'municipal', 'label' => 'Municipal'],
            ['value' => 'industrial', 'label' => 'Industrial'],
            ['value' => 'commercial', 'label' => 'Commercial'],
          ]
        ],
        [
          'name' => 'capacity',
          'label' => 'Capacity',
          'options' => [
            ['value' => 'small', 'label' => 'Small (< 1 MGD)'],
            ['value' => 'medium', 'label' => 'Medium (1-10 MGD)'],
            ['value' => 'large', 'label' => 'Large (> 10 MGD)'],
          ]
        ],
      ];

      // Sort options
      $sort_options = [
        ['value' => 'name-asc', 'label' => 'Name: A → Z'],
        ['value' => 'name-desc', 'label' => 'Name: Z → A'],
        ['value' => 'date-new', 'label' => 'Newest First'],
        ['value' => 'date-old', 'label' => 'Oldest First'],
      ];

      include('../components/sections/block-filtered-grid.php');
    ?>

  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>
