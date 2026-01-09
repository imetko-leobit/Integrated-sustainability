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
        $hero_title = "Breakpoint Chlorination Water Treatment Plant Design & Commissioning";
        $hero_button_name = "Explore Project Profile";
        $hero_link_name = "Back To Project Library";
        $hero_img = "../assets/img/bg-project-profile.png";
        include('../components/sections/block-hero.php')
    ?>
    <?php 
        $section_title = "ammonia removal and dewatering <br> for an underground mine ";
        $link_url = "#pillar1";
        $link_direction = "down";
        $link_text = "";
        $custom_icon = "../assets/img/linkIconArrowDown.svg";
        include('../components/sections/block-section-heading.php'); 
    ?>
    <?php 
        include('../components/sections/block-details-sidebar.php') 
    ?>
    <?php 
        $section_title = "explore similar projects";
        include('../components/sections/block-cards-slider.php') 
    ?>
    <?php 
        $layout = 'default'; // 'center' or 'right'
        $title = 'request a tailored <br> credentials package';
        $description = 'Achieve cost control and on-time delivery with accountable infrastructure designed for high-consequence operations.';
        $button_text = 'Request Credentials Pack';
        include('../components/sections/block-cta.php') 
    ?>

  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>