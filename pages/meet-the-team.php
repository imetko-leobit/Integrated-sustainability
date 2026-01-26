<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet the Team - Integrated Sustainability</title>
    <?php include('../components/head/_head.php') ?>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>
    <?php include('../components/header/_header.php'); ?>

    <main class="main">
      <?php
        $hero_title = "attitude: <br>built on purpose";
        $hero_button_name = "Our Missioin";
        $hero_link_name = "Performance Values";
        $hero_img = "../assets/img/bg-mission.png";
        include('../components/sections/block-hero.php')
      ?>

      <?php
          $section_title = "Meet the Team";
          $section_description = "Our team of experts is dedicated to delivering innovative and sustainable solutions for water management, environmental consulting, and infrastructure development.";
          include('../components/sections/block-section-heading.php');
      ?>

      <?php include('../components/sections/block-team-cards.php'); ?>
    </main>

    <?php include('../components/footer/_footer.php'); ?>
    <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>
