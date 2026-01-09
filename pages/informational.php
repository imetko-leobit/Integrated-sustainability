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
        $hero_title = "Designing for Adaptive Mine Water Reuse in Zero-Discharge Jurisdictions";
        $hero_button_name = "Download now";
        $hero_link_name = null;
        $hero_link_text = null;
        $hero_info = "Reading Time: 6 minutes";
        $hero_img = "../assets/img/bg-lead-generated.png";
        include('../components/sections/block-hero.php')
    ?>
    <?php 
        include('../components/sections/block-details-mega.php')
    ?>

    <?php 
        $section_title = "explore the latest thinking in applied sustainability";
        $link_url = "/insights";
        $link_text = "Explore our <br> Insights Library";
        $link_direction = "right";
        $custom_icon = "../assets/img/linkIconArrowRight.svg";
        include('../components/sections/block-section-heading.php'); 
    ?>
    <?php
        include('../components/sections/block-publications.php'); 
    ?>
  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>