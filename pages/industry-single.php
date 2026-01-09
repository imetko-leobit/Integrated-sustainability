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
      ['title' => 'Industry', 'url' => '/industries'],
      ['title' => 'Oil & Gas', 'url' => '/industries/oil-gas']
  ];
    include('../components/header/_header.php'); 
  ?>

  <main class="main">
    <?php 
        $hero_title = "oil & gas infrastructure <br> assets that perform";
        $hero_button_name = "Urgent Support";
        $hero_link_name = "Key Challenges We Solve ";
        $hero_img = "../assets/img/bg-industry.png";
        include('../components/sections/block-hero.php') 
    ?>

    <?php 
        include('../components/sections/block-details-links.php')
    ?>

    <?php 
        $section_title = "explore the latest thinking in applied sustainability";
        $link_url = "/insights";
        $link_text = "";
        $link_direction = "down";
        $custom_icon = "../assets/img/linkIconArrowDown.svg";
        include('../components/sections/block-section-heading.php'); 
    ?>
    <?php
        include('../components/sections/block-publications-simple.php'); 
    ?>
    <?php
        include('../components/sections/block-media.php'); 
    ?>

    <?php 
        $section_title = "oil and gas infrastructure services";
        $link_url = "/industry";
        $link_text = "Explore Our <br> Lifecycle Services";
        $link_direction = "right";
        $custom_icon = "../assets/img/linkIconArrowRight.svg";
        include('../components/sections/block-section-heading.php'); 
    ?>
    <?php include('../components/sections/block-category-navigation.php') ?>

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
        $section_title = "drive performance accountability <br> across your asset life-cycle";
        $custom_icon = "../assets/img/linkIconCircles.svg";
        $link_text = "";
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