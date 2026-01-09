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

  <main class="main">
    <?php 
        $hero_title = "Who we are";
        $hero_description = "Integrated sustainability is an employee-owned company of scientists, engineers and environmental experts sharing an enduring appreciation for the natural places where we seek joy, rejuvenate, and challenge ourselves; ";
        $hero_description2 = "a shared purpose that defines how we build, perform, and belong.";
        $hero_img = "../assets/img/bg-about-us.png";
        include('../components/sections/block-hero.php') 
    ?>
    <?php 
        $section_title = "our performance philosophy pillars";
        $custom_icon = "../assets/img/linesCircle.svg";
        include('../components/sections/block-section-heading.php'); 
    ?>
    <?php 
        include('../components/sections/block-pillars.php'); 
    ?>
    <?php
    $section_title = "strengthen capital planning and execution certainty";
    $link_url = "#pillar1";
    $link_direction = "down";
    $link_text = "";
    $custom_icon = "../assets/img/linkIconArrowDown.svg";
    include('../components/sections/block-section-heading.php');
    ?>
    <?php 
    $approach_button = 'Meet The Team';
    include('../components/sections/block-approach-intro.php') 
    ?>

    <?php
    $section_title = "advocacy: stronger, more resilient systems ";
    $link_url = null;
    $link_text = null;
    $custom_icon = null;
    include('../components/sections/block-section-heading.php');
    ?>
    <?php include('../components/sections/block-accordion.php') ?>

    <?php
    $section_title = "attitude: a mindset built for execution";
    $link_url = null;
    $link_text = null;
    $custom_icon = null;
    include('../components/sections/block-section-heading.php');
    ?>
    <?php include('../components/sections/block-publications-pillar.php') ?>

    <?php
    $section_title = "our impact: shared successes and milestones";
    $link_url = null;
    $link_text = null;
    $custom_icon = null;
    include('../components/sections/block-section-heading.php');
    ?>

    <?php include('../components/sections/block-accordion-scroll.php') ?>

  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>