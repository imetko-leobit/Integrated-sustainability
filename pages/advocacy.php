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
      // Define data for the reusable block component
      $tagline = 'mission statement';
      $title = 'creating the optimum conditions for high-performance infrastructure';
      $paragraphs = [
        'To us, advocacy is a structured process of collaboration built on evidence and a shared purpose. It aligns technical innovation, academic insight, and local expertise to establish the consensus that turns ambition into responsible assets - for all stakeholders.',
        'Through this model, we strengthen the three fundamentals of project success—feasibility, acceptability, and viability—and create a continuous feedback system that drives performance from concept through operation.',
        'Advocacy connects performance with responsibility and is key to unlocking better environmental, social, and commercial outcomes.'
      ];
      $button = [
        'url' => '/services',
        'label' => 'Read More'
      ];
      $grid_items = [
        ['icon' => '', 'label' => ''],
        ['icon' => 'regulatory.svg', 'label' => 'academic partnerships'],
        ['icon' => '', 'label' => ''],
        ['icon' => 'carbon.svg', 'label' => 'technology advocacy'],
        ['icon' => 'equipment.svg', 'label' => 'community empowerment'],
        ['icon' => '', 'label' => ''],
        ['icon' => 'compliance.svg', 'label' => 'project success'],
      ];
      $center_item = [
        'type' => 'image',
        'content' => '../assets/img/directions.svg'
      ];
      // Optional checkbox list (not used in this instance)
      // $checkbox_list = [
      //   ['icon' => 'check.svg', 'label' => 'Item 1'],
      //   ['icon' => 'check.svg', 'label' => 'Item 2']
      // ];
      
      include('../components/sections/block_reusable.php')
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