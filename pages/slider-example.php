<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Slider Example - Full Width Mode</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="home">
  <?php include('../components/header/_header.php'); ?>

  <main class="main">
    <?php 
        $hero_title = "Reusable Slider<br>Component Example";
        $hero_description = "Demonstrating the reusable slider with custom configuration";
        $hero_button_name = "Scroll to Examples";
        $hero_link_name = "View Documentation";
        $hero_img = "../assets/img/bg-home.png";
        include('../components/sections/block-hero.php') 
    ?>

    <?php 
        $section_title = "Example 1: Full Width Slider (3 items per row)";
        $custom_icon = "../assets/img/linkIconCircles.svg";
        include('../components/sections/block-section-heading.php'); 
    ?>

    <?php
    // Example 1: Full-width slider with 3 items per row
    // Note: External image URLs are used for demonstration purposes only
    // In production, use local image assets
    $slider_items = [
        [
            'title' => 'Water Treatment',
            'desc' => 'Advanced water treatment solutions for industrial and municipal applications.',
            'image' => 'https://img.freepik.com/premium-photo/waste-water-treatment-ponds-from-industrial-plants_281691-294.jpg',
            'link' => '#water-treatment',
            'active' => true,
        ],
        [
            'title' => 'Environmental Compliance',
            'desc' => 'Ensure regulatory compliance with comprehensive environmental services.',
            'image' => 'https://e0.pxfuel.com/wallpapers/252/868/desktop-wallpaper-cargo-ship-iphone-6.jpg',
            'link' => '#environmental',
            'active' => false,
        ],
        [
            'title' => 'Sustainability Planning',
            'desc' => 'Strategic sustainability planning and implementation services.',
            'image' => 'https://i.pinimg.com/736x/c8/fd/e4/c8fde4c75a8dfe529d1b5fbe0365048e.jpg',
            'link' => '#sustainability',
            'active' => false,
        ],
        [
            'title' => 'Resource Management',
            'desc' => 'Optimize resource utilization and management practices.',
            'image' => 'https://t3.ftcdn.net/jpg/00/88/56/06/360_F_88560614_jLxW5ZnB48ygLeR5kc5YIz4UCyJLfdtE.jpg',
            'link' => '#resources',
            'active' => false,
        ],
        [
            'title' => 'Carbon Reduction',
            'desc' => 'Implement carbon reduction strategies and technologies.',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_SwmZu1t5AW2DxK0oL1Qg0GaNeFrCOrFjEA&s',
            'link' => '#carbon',
            'active' => false,
        ],
        [
            'title' => 'Green Infrastructure',
            'desc' => 'Design and implement sustainable infrastructure solutions.',
            'image' => 'https://img.freepik.com/premium-photo/waste-water-treatment-ponds-from-industrial-plants_281691-294.jpg',
            'link' => '#infrastructure',
            'active' => false,
        ],
    ];
    $hide_description = true;
    include('../components/sections/block-slider.php');
    ?>

    <?php 
        $section_title = "Example 2: Slider with Description Panel";
        $custom_icon = "../assets/img/linkIconCircles.svg";
        include('../components/sections/block-section-heading.php'); 
    ?>

    <?php
    // Example 2: Slider with description panel (default behavior)
    // Note: External image URLs are used for demonstration purposes only
    // In production, use local image assets
    $pillar_number = "PERFORMANCE PILLAR #1";
    $pillar_title = "Sustainable Infrastructure Solutions";
    $pillar_text_1 = "We deliver comprehensive sustainability solutions across your project lifecycle.";
    $pillar_text_2 = "Our integrated approach ensures environmental compliance, cost optimization, and stakeholder engagement.";
    
    $slider_items = [
        [
            'title' => 'Project Planning',
            'desc' => 'Comprehensive planning services for sustainable infrastructure projects.',
            'image' => 'https://img.freepik.com/premium-photo/waste-water-treatment-ponds-from-industrial-plants_281691-294.jpg',
            'link' => '#planning',
            'active' => true,
        ],
        [
            'title' => 'Implementation',
            'desc' => 'Expert implementation and project management services.',
            'image' => 'https://e0.pxfuel.com/wallpapers/252/868/desktop-wallpaper-cargo-ship-iphone-6.jpg',
            'link' => '#implementation',
            'active' => false,
        ],
        [
            'title' => 'Monitoring & Reporting',
            'desc' => 'Continuous monitoring and comprehensive reporting solutions.',
            'image' => 'https://i.pinimg.com/736x/c8/fd/e4/c8fde4c75a8dfe529d1b5fbe0365048e.jpg',
            'link' => '#monitoring',
            'active' => false,
        ],
    ];
    $hide_description = false; // Show description panel
    include('../components/sections/block-slider.php');
    ?>

    <?php 
        $layout = 'center';
        $title = 'Ready to Implement<br>Reusable Components?';
        $description = 'The slider component is now fully reusable with configurable options for any page.';
        $button_text = 'Get Started';
        include('../components/sections/block-cta.php') 
    ?>

  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>
