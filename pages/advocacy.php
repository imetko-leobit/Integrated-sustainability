<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Advocacy</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="home">
  <?php
  include('../components/header/_header.php');
  ?>

  <main class="main">
    <?php
      $hero_title = "advocacy: <br>driving project success";
      $hero_button_name = "Explore Our Advocacy Model";
      $hero_link_name = "Join our Community";
      $hero_img = "../assets/img/bg-advocacy.png";
      include('../components/sections/block-hero.php')
    ?>

    <?php
        $section_title = "advocating for positive environmental, social<br>and commercial outcomes";
        $link_url = "#";
        $link_direction = "down";
        $link_text = "";
        $custom_icon = "../assets/img/linkIconArrowDown.svg";
        include('../components/sections/block-section-heading.php');
    ?>
    <?php
      $top_tagline = 'mission statement';

    include('../components/sections/block-fragmentation-small.php')
    ?>

    <?php
        $section_title = "utilize the best achievable technology";
        $link_url = null;
        $link_direction = null;
        $link_text = null;
        $custom_icon = null;
        include('../components/sections/block-section-heading.php');
    ?>

    <?php
      $top_tagline = 'mission statement';
      include('../components/sections/block-reduce-fragmentation.php')
    ?>

    <?php
        $section_title = "translate research into operational insight";
        $link_url = null;
        $link_direction = null;
        $link_text = null;
        $custom_icon = null;
        include('../components/sections/block-section-heading.php');
    ?>
    <?php
        $section_title = "embed local expertise into the infrastructure lifecycle";
        $link_url = null;
        $link_direction = null;
        $link_text = null;
        $custom_icon = null;
        include('../components/sections/block-section-heading.php');
    ?>


    <?php
        $layout = 'default';
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