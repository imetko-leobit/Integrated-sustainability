<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Projects</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="home">
  <?php include('../components/header/_header.php'); ?>

  <main class="main">
    <?php 
        $hero_title = "Sustainable infrastructure built <br> for long-term performance";
        $hero_button_name = "Latest Milestone Projects";
        $hero_link_name = "project Library";
        $hero_img = "../assets/img/hero-bg-projects.png";
        include('../components/sections/block-hero.php')
    ?>
    <?php 
        $section_title = "translating environmental data into <br> engineered performance";
        $link_url = "#pillar1";
        $link_direction = "down";
        $link_text = "";
        $custom_icon = "../assets/img/linkIconArrowDown.svg";
        include('../components/sections/block-section-heading.php'); 
    ?>
    <?php


  $cards_data = [
    [
        'type' => 'full',
        'title' => 'pre-feasibility & conceptual design for waste heat & CO2 reuse facility',
        'text' => 'Advances in genomics and microbiology are transforming how we recover non-metal, energy and economically perform water reuse. By understanding the microbial ecosystems within tailings, water circuits, and ore bodies, operators can now optimize treatment processes, enhance metal recovery, and reduce reagent use.',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_SwmZu1t5AW2DxK0oL1Qg0GaNeFrCOrFjEA&s',
        'link' => '#',
        'author' => ['name' => 'Monique Simair', 'degree' => '', 'role' => 'VP, Science and Innovation', 'photo' => "../assets/img/approach-intro-image.avif"],
        'id' => 1,
    ],
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
        $section_title = "project library";
        $custom_icon = null;
        $link_url = null;
        include('../components/sections/block-section-heading.php'); 
    ?>
    <?php
        include('../components/sections/block-post-cards.php'); 
    ?>
    <?php 
        $layout = 'center'; // 'center' or 'right'
        $title = 'request a tailored <br> credentials package';
        $description = 'Achieve cost control and on-time delivery with accountable infrastructure designed for high-consequence operations.';
        $button_text = 'Book a Call';
        include('../components/sections/block-cta.php') 
    ?>
  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>