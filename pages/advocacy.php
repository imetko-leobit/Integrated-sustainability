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

    <div style="display: flex;">
      <?php
        $text_below = true;
        include('../components/sections/block-projects.php');
      ?>
      <?php
        $text_below = true;
        include('../components/sections/block-projects.php');
      ?>
    </div>

    <?php
        $section_title = "translate research into operational insight";
        $link_url = null;
        $link_direction = null;
        $link_text = null;
        $custom_icon = null;
        include('../components/sections/block-section-heading.php');
    ?>

    <?php
      $tagline = 'academic Partnerships';
      $title = 'Bridging research with execution to advance infrastructure intelligence';
      $paragraphs = [
        'We actively collaborate with universities, research councils, and innovation networks to transform applied research into operational results. These partnerships create opportunities for students, researchers, and faculty to test ideas where theory meets the field, while giving our clients access to emerging science, feasibility-grade analysis, and data-driven insights that inform project design and investment decisions.',
      ];
      $button = [
        'url' => '/services',
        'label' => 'Become a Partner'
      ];
      $center_item = [
        'type' => 'image',
        'content' => '../assets/img/directions.svg'
      ];
      $layout = 'image-right';
      $checkbox_list = [
        ['icon' => 'mark.svg', 'label' => 'Partner with academic institutions and research bodies to align emerging studies with real-world environmental and infrastructure challenges.'],
        ['icon' => 'mark.svg', 'label' => 'Support graduate and PhD-level research connected to live projects - providing clients with feasibility-grade analysis, system optimization, and early-stage innovation scouting.'],
        ['icon' => 'mark.svg', 'label' => 'Our experts actively contribute to academic committees, evaluate theses, and mentor student competition teams advancing applied sustainability innovation.'],
        ['icon' => 'mark.svg', 'label' => 'We are often sought to help translate field performance into data that supports academic publication and informs regulatory and policy frameworks.'],
      ];

      include('../components/sections/block-feature.php')
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
      $tagline = 'academic Partnerships';
      $title = 'Bridging research with execution to advance infrastructure intelligence';
      $paragraphs = [
        'We actively collaborate with universities, research councils, and innovation networks to transform applied research into operational results. These partnerships create opportunities for students, researchers, and faculty to test ideas where theory meets the field, while giving our clients access to emerging science, feasibility-grade analysis, and data-driven insights that inform project design and investment decisions.',
      ];
      $button = [
        'url' => '/services',
        'label' => 'Become a Partner'
      ];
      $center_item = [
        'type' => 'image',
        'content' => '../assets/img/directions.svg'
      ];
      $layout = 'image-right';
      $checkbox_list = [
        ['icon' => 'mark.svg', 'label' => 'Partner with academic institutions and research bodies to align emerging studies with real-world environmental and infrastructure challenges.'],
        ['icon' => 'mark.svg', 'label' => 'Support graduate and PhD-level research connected to live projects - providing clients with feasibility-grade analysis, system optimization, and early-stage innovation scouting.'],
        ['icon' => 'mark.svg', 'label' => 'Our experts actively contribute to academic committees, evaluate theses, and mentor student competition teams advancing applied sustainability innovation.'],
        ['icon' => 'mark.svg', 'label' => 'We are often sought to help translate field performance into data that supports academic publication and informs regulatory and policy frameworks.'],
      ];

      include('../components/sections/block-feature.php')
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