<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="home">
  <?php 
      $subheader = [
        ['title' => 'Services', 'url' => '/services'],
        ['title' => 'Laboratory Services', 'url' => '/services/laboratory-services']
    ];
  include('../components/header/_header.php'); 
  ?>

  <main class="main">
    <?php 
      $hero_title = "laboratory testing & <br> modelling services";
      $hero_button_name = "Select a Service";
      $hero_link_name = "Explore our Approach";
      $hero_img = "../assets/img/bg-sevices.png";
      include('../components/sections/block-hero.php') 
    ?>
    <?php 
			$section_title = "a defensible performance path from concept testing to commercial deployment";
			$custom_icon = null;
			$link_url = null;
			$person_name = 'Kevin Clarke';
			$person_degree = 'P.Eng., C.Eng. MIEI, M.Sc., BE ';
			$person_date = 'August 10th, 2025';
			$person_photo = "../assets/img/approach-intro-image.avif";
			include('../components/sections/block-section-heading.php'); 
	?>
    <?php 
    $approach_button = 'Meet The Team';
    $accordion_items = [
      [
          'title' => 'challenges we help technical teams solve',
          'desc' => 'Coordinating design, sizing, and equipment supply through a single partner results ties each decision to performance and results in greater cost and schedule certainty.',
          'initial_open' => false,
      ],
      [
          'title' => 'WATER TREATMENT applications {FOR THE {INDUSTRY} SECTOR}',
          'desc' => 'Develop integrated water management plans to ensure compliance and operational reliability.',
          'initial_open' => false,
      ],
    ];
    include('../components/sections/block-approach-intro.php') 
    ?>

    <?php
        include('../components/sections/block-cards-simple-slider.php'); 
    ?>


    <?php 
			$section_title = "similar lifecycle services you may be interested in";
      $link_url = "#";
      $link_direction = "down";
      $link_text = "";
      $custom_icon = "../assets/img/linkIconArrowDown.svg";
			include('../components/sections/block-section-heading.php'); 
	?>
    <?php include('../components/sections/block-slider.php') ?>

    <?php 
        $section_title = "Expert commentary on the future<br>of sustainable infrastructure planning";
        $link_url = "#";
        $link_direction = "down";
        $link_text = "";
        $custom_icon = "../assets/img/linkIconArrowDown.svg";
        include('../components/sections/block-section-heading.php'); 
    ?>
    <?php


  $cards_data = [
    [
        'type' => 'half-simple',
        'title' => 'mine water selenium treatment moving bed bioreactor design & equipment supply',
        'text' => 'Western Canada is experiencing severe, and on-going drought conditions in 2024. Water availability across several basins will be limited, and diversion restrictions for new allocations will likely be established. Integrated Sustainability explores the options available to maintaining operational integrity.',
        'image' => 'https://e0.pxfuel.com/wallpapers/252/868/desktop-wallpaper-cargo-ship-iphone-6.jpg',
        'link' => '#',
        'author' => ['name' => 'Ian Grant', 'degree' => '', 'role' => 'Manager, Water Resources', 'photo' => "../assets/img/approach-intro-image.avif"],
        'id' => 2,
    ],
    [
        'type' => 'small-left',
        'title' => 'Greenhouse Gas Emissions Inventory & Sustainability Statement',
        'text' => 'Western Canada is experiencing severe, and on-going drought conditions in 2024. Water availability across several basins will be limited, and diversion restrictions for new allocations will likely be established. Integrated Sustainability explores the options available to maintaining operational integrity.',
        'image' => 'https://i.pinimg.com/736x/c8/fd/e4/c8fde4c75a8dfe529d1b5fbe0365048e.jpg',
        'link' => '#',
        'author' => ['name' => 'Ted Grant', 'degree' => 'M.A.Sc., P.Eng.', 'role' => 'Manager, Water Resources', 'photo' => "../assets/img/approach-intro-image.avif"],
        'id' => 3,
    ],
    [
        'type' => 'small-rigth',
        'title' => 'Hydroponic Farm Water Recycling System Design & Supply',
        'text' => 'Western Canada is experiencing severe, and on-going drought conditions in 2024. Water availability across several basins will be limited, and diversion restrictions for new allocations will likely be established. Integrated Sustainability explores the options available to maintaining operational integrity.',
        'image' => 'https://t3.ftcdn.net/jpg/00/88/56/06/360_F_88560614_jLxW5ZnB48ygLeR5kc5YIz4UCyJLfdtE.jpg',
        'link' => '#',
        'author' => ['name' => 'Mark Grant', 'degree' => '', 'role' => 'Manager, Water Resources', 'photo' => "../assets/img/approach-intro-image.avif"],
        'is_visible' => false,
        'id' => 4,
    ],
    [
      'type' => 'half',
      'title' => 'Grantley Adams International Airport Sustainability Management Plan',
      'text' => 'With tourism exceeding pre-pandemic levels, there is no indication that the sector’s water use trend will reverse. As Barbados confronts critical water challenges, the concept of water reuse emerges as a promising solution.',
      'image' => 'https://img.freepik.com/premium-photo/waste-water-treatment-ponds-from-industrial-plants_281691-294.jpg',
      'link' => '#',
      'author' => ['name' => 'Nick St-Georges M.A.Sc., P.Eng. ', 'degree' => 'M.A.Sc., P.Eng.', 'role' => 'Vice President - International Development', 'photo' => "../assets/img/approach-intro-image.avif"],
      'id' => 5,
    ],
];
        include('../components/sections/block-project-cards.php'); 
    ?>

    <?php 
        $section_title = "explore our latest projects";
        $link_url = "/portfolio";
        $link_text = "Explore our <br> Profile Portfolio";
        $link_direction = "right";
        $custom_icon = "../assets/img/linkIconArrowRight.svg";
        include('../components/sections/block-section-heading.php'); 
    ?>
    <?php include('../components/sections/block-projects.php') ?>
    <?php include('../components/sections/block-logo-slider.php') ?>

    <?php 
        $section_title = "frequently asked questions";
        $link_url = "/contact-us";
        $custom_icon = "../assets/img/iconQuestion.svg";
        $link_text = "Ready to go deeper?<br>Discuss with our specialists";
        include('../components/sections/block-section-heading.php'); 
    ?>

    <?php include('../components/sections/block-accordion-inside.php') ?>

    <?php 
        $section_title = "How we deliver reliable water performance <br>across your asset lifecycle";
        $custom_icon = "../assets/img/linkIconCircles.svg";
        include('../components/sections/block-section-heading.php'); 
    ?>
    <?php include('../components/sections/block-reduce-fragmentation.php') ?>

    <?php 
        $layout = 'right';
        $title = 'partner with <br> a unified team';
        $description = 'Achieve greater cost control and schedule certainty with accountable infrastructure designed for high-consequence operations.';
        $button_text = 'Book a Call';
        include('../components/sections/block-cta.php') 
    ?>

  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>