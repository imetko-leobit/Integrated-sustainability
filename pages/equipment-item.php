<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Equipment Item</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="home">
  <?php 
    $subheader = [
      ['title' => 'Equipment', 'url' => '/equipment'],
      ['title' => 'Water Treatment Systems', 'url' => '/equipment/water-treatment']
    ];
    include('../components/header/_header.php'); 
  ?>

  <main class="main">
    <?php 
        $hero_title = "Advanced Water Treatment <br> Equipment System";
        $hero_button_name = "Request Quote";
        $hero_link_name = "View All Equipment";
        $hero_img = "../assets/img/bg-industry.png";
        include('../components/sections/block-hero.php') 
    ?>

    <?php 
        $slider_imgs = [
          '../assets/img/strengthen.png',
          '../assets/img/sidebar.jpg',
          '../assets/img/image1.jpg',
          '../assets/img/image2.jpg',
          '../assets/img/image3.jpg',
        ];

        $sidebar_tags = [
          [
            'title' => 'equipment type',
            'id' => 1,
            'links' => [
              ['name' => 'Water Treatment', 'link' => '#'],
              ['name' => 'Filtration System', 'link' => '#'],
            ]
          ],
          [
            'title' => 'specifications',
            'id' => 2,
            'links' => [
              ['name' => 'Capacity: 1000L/hr', 'link' => '#'],
              ['name' => 'Power: 5kW', 'link' => '#'],
              ['name' => 'Dimensions: 2m x 1.5m', 'link' => '#'],
            ]
          ],
          [
            'title' => 'applications',
            'id' => 3,
            'links' => [
              ['name' => 'Industrial Wastewater', 'link' => '#'],
              ['name' => 'Mining Operations', 'link' => '#'],
              ['name' => 'Municipal Treatment', 'link' => '#'],
            ]
          ],
        ];

        $sidebar_img = '../assets/img/cta-bg.png';
        $sidebar_title = 'request equipment quote';
        $sidebar_description = 'Get detailed specifications and pricing for this equipment. Our team will respond within 1 business day.';
        $sidebar_button_name = 'Request Quote';

        include('../components/sections/block-equipment-content.php') 
    ?>

    <?php 
        $layout = 'default';
        $title = 'need technical <br> specifications?';
        $description = 'Download detailed technical documentation and performance data for this equipment.';
        $button_text = 'Download Specs';
        include('../components/sections/block-cta.php') 
    ?>

  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>
