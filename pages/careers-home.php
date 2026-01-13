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
        // Careers intro block with awards/logos
        $careers_intro_title = "Working at Integrated Sustainability";
        $careers_intro_description = "Recognized as one of Canada’s Top 100 Small & Medium Employers for 5 years in a row, we believe that the people who work here matter. Every opportunity we have to be a better employer is an opportunity to succeed. Having attracted a dynamic, multi-disciplined team of specialists, we believe that to be innovative, we must also be courageous – finding solutions and challenging conventional wisdom.";
        $careers_intro_logos = [
            ['src' => '../assets/img/careers-home-award.png', 'alt' => 'Goldcorp'],
            ['src' => '../assets/img/careers-home-award.png', 'alt' => 'Cunuma'],
            ['src' => '../assets/img/careers-home-award.png', 'alt' => 'Skeena'],
            ['src' => '../assets/img/careers-home-award.png', 'alt' => 'Osisko'],
            ['src' => '../assets/img/careers-home-award.png', 'alt' => 'Teck'],
            ['src' => '../assets/img/careers-home-award.png', 'alt' => 'Goldcorp'],
            ['src' => '../assets/img/careers-home-award.png', 'alt' => 'Cunuma'],
            ['src' => '../assets/img/careers-home-award.png', 'alt' => 'Skeena'],
        ];
        include('../components/sections/block-careers-intro.php');
    ?>

    <?php
        $section_title = "Open Vacancies";
        include('../components/sections/block-resources-grid.php')
    ?>

    <?php
        $section_title = "purpose without pretence";
        include('../components/sections/block-section-heading.php');
    ?>



    <?php
      unset($approach_tagline, $approach_heading_title, $approach_text_1, $approach_text_2);
      unset($approach_button, $approach_button_url, $show_button, $reverse);
      unset($image_src, $image_alt, $accordion_items, $approach_link_label);

      $approach_heading_title = "discover a culture of connection, contribution and continuous growth";
      $approach_text_1 = "";
      $approach_text_2 = "";
      $show_button = false;
      $accordion_items = [
        [
            'title' => 'Benefits & Programs at Integrated Sustainability',
            'desc' => 'As an employee at Integrated Sustainability, you’ll have access to benefits and programs that support your health and well-being, encourage your professional growth and help you plan for the future, including:',
            'initial_open' => true,
        ],
        [
            'title' => 'A Culture of Connection, Contribution, and Continuous Growth',
            'desc' => 'Coordinating design, sizing, and equipment supply through a single partner results ties each decision to performance and results in greater cost and schedule certainty.',
            'initial_open' => false,
        ],
        [
            'title' => 'dei statement of commitment',
            'desc' => 'Develop integrated water management plans to ensure compliance and operational reliability.',
            'initial_open' => false,
        ],
      ];
      $reverse = true;
      include('../components/sections/block-approach-intro.php')
    ?>

    <?php
        $layout = 'center';
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