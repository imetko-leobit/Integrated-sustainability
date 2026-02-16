<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="home">
  <?php include('../components/header/_header.php'); ?>

  <main class="main home-page__main">
    <?php
        $hero_title = "water asset <br> performance specialists";
        $hero_description = "performance accountability throughout your asset lifecycle";
        $hero_button_name = "Accountable Asset Delivery";
        $hero_link_name = "Find Your Industry";
        $hero_img = "../assets/img/bg-home.png";
        $hero_video_url = 'https://www.pexels.com/uk-ua/download/video/19227266/';
        include('../components/sections/block-hero.php')
    ?>
    <?php
        $section_title = "drive performance accountability <br> across your asset life-cycle";
        $custom_icon = "../assets/img/linkIconCircles.svg";
        include('../components/sections/block-section-heading.php');
    ?>
    <?php include('../components/sections/block-reduce-fragmentation.php') ?>
    <?php
        $section_title = "industries we work with";
        $link_url = "/industry";
        $link_text = "Explore our <br> Industry Sectors";
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
        $section_title = "strengthen capital planning and execution certainty";
        $link_url = "#pillar1";
        $link_direction = "down";
        $link_text = "";
        $custom_icon = "../assets/img/linkIconArrowDown.svg";
        include('../components/sections/block-section-heading.php');
    ?>
    <?php include('../components/sections/block-approach-intro.php') ?>
    <?php
    $pillar_number = "PERFORMANCE PILLAR #1";
    include('../components/sections/block-slider.php')
    ?>
    <?php
    $pillar_number = "PERFORMANCE PILLAR #2";
    include('../components/sections/block-accordion.php')
    ?>
    <?php
    $pillar_number = "PERFORMANCE PILLAR #3";
    include('../components/sections/block-insights.php')
    ?>

    <?php
        $layout = 'default'; // 'center' or 'right'
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