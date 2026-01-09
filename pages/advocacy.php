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
      $checkbox_list = [
        ['icon' => 'mark.svg', 'label' => 'Partner with academic institutions and research bodies to align emerging studies with real-world environmental and infrastructure challenges.'],
        ['icon' => 'mark.svg', 'label' => 'Support graduate and PhD-level research connected to live projects - providing clients with feasibility-grade analysis, system optimization, and early-stage innovation scouting.'],
        ['icon' => 'mark.svg', 'label' => 'Our experts actively contribute to academic committees, evaluate theses, and mentor student competition teams advancing applied sustainability innovation.'],
        ['icon' => 'mark.svg', 'label' => 'We are often sought to help translate field performance into data that supports academic publication and informs regulatory and policy frameworks.'],
      ];

      include('../components/sections/block_reusable.php')
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
      $tagline = 'COMMUNITY empowerment';
      $title = 'Integrating social, cultural, and environmental value into project delivery';
      $paragraphs = [
        'Infrastructure succeeds when it strengthens the communities and ecosystems it serves. By basing our design in environmental science and aligning local priorities, we create enduring outcomes that extend beyond the site boundary. Our performance approach helps to:',
      ];
      $button = [
        'url' => '/services',
        'label' => 'Become a Partner'
      ];
      $center_item = [
        'type' => 'image',
        'content' => '../assets/img/directions.svg'
      ];
      $checkbox_list = [
        ['icon' => 'mark.svg', 'label' => 'Engage early with municipalities, local industries, and community organizations to align infrastructure planning with regional development goals sensitive to cultural values and environmental priorities.'],
        ['icon' => 'mark.svg', 'label' => 'Incorporate natural and hybrid infrastructure systems that provide flood protection, habitat restoration, and carbon reduction while lowering lifecycle costs.'],
        ['icon' => 'mark.svg', 'label' => 'Involve local stakeholders in project monitoring and operations to strengthen technical capacity and environmental stewardship.'],
        ['icon' => 'mark.svg', 'label' => 'Maintain transparent communication and measurable reporting that demonstrate performance and accountability throughout the project lifecycle.'],
        ['icon' => 'mark.svg', 'label' => 'Build enduring indigenous partnerships focused on procurement, training, and shared economic participation.'],
      ];

      include('../components/sections/block_reusable.php')
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