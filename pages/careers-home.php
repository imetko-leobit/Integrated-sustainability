<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Careers</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="home">
  <?php
  include('../components/header/_header.php');
  ?>

  <main class="main">
    <?php
      $hero_title = "Careers in <br>Sustainability";
      $hero_img = "../assets/img/bg-careers.png";
      include('../components/sections/block-hero.php')
    ?>

    <?php include('../components/elements/divider.php'); ?>

    <?php
        $section_title = "purpose without pretence";
        include('../components/sections/block-section-heading.php');
    ?>

    <?php
      $approach_link_label = null;
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