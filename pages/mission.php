<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="home">
  <?php 
  include('../components/header/_header.php'); 
  ?>

  <main class="main">
    <?php 
      $hero_title = "attitude: <br>built on purpose";
      $hero_button_name = "Our Missioin";
      $hero_link_name = "Performance Values";
      $hero_img = "../assets/img/bg-mission.png";
      include('../components/sections/block-hero.php') 
    ?>

    <?php 
        $section_title = "how we think, work, and lead";
        $link_url = "#";
        $link_direction = "down";
        $link_text = "";
        $custom_icon = "../assets/img/linkIconArrowDown.svg";
        include('../components/sections/block-section-heading.php'); 
    ?>
    <?php 
      $top_tagline = 'mission statement';
    
    include('../components/sections/block-reduce-fragmentation.php') 
    ?>

    <?php 
        $section_title = "organizational values grounded in performance reality";
        $link_url = null;
        $link_direction = null;
        $link_text = null;
        $custom_icon = null;
        include('../components/sections/block-section-heading.php'); 
    ?>
    <?php 
        $cards_data = [
            [
              'tagline' => 'Value #1',
              'title' => 'entrepreneurial',
              'description' => 'Regulatory shifts, market forces, and supply chain vulnerabilities are shaping a new industrial landscape. Developing resource efficiency is a resilience strategy securing operational up-time, reducing costs and mitigating risk for the clients and communities we serve. ',
              'description_second' => 'We are all empowered to think like owners. To calculate risk, realize opportunity, and help our clients achieve success in the future economy. ',
              'quote' => 'act LIKE ITS YOURS',
              'image' => '../assets/img/image1.png',
            ],
            [
              'tagline' => 'Value #2',
              'title' => 'entrepreneurial',
              'description' => 'Regulatory shifts, market forces, and supply chain vulnerabilities are shaping a new industrial landscape. Developing resource efficiency is a resilience strategy securing operational up-time, reducing costs and mitigating risk for the clients and communities we serve. ',
              'description_second' => 'We are all empowered to think like owners. To calculate risk, realize opportunity, and help our clients achieve success in the future economy. ',
              'quote' => 'act LIKE ITS YOURS',
              'image' => '../assets/img/image2.jpg',
            ],
            [
              'tagline' => 'Value #3',
              'title' => 'entrepreneurial',
              'description' => 'Regulatory shifts, market forces, and supply chain vulnerabilities are shaping a new industrial landscape. Developing resource efficiency is a resilience strategy securing operational up-time, reducing costs and mitigating risk for the clients and communities we serve. ',
              'description_second' => 'We are all empowered to think like owners. To calculate risk, realize opportunity, and help our clients achieve success in the future economy. ',
              'quote' => 'act LIKE ITS YOURS',
              'image' => '../assets/img/image3.jpg',
            ],
            [
              'tagline' => 'Value #4',
              'title' => 'entrepreneurial',
              'description' => 'Regulatory shifts, market forces, and supply chain vulnerabilities are shaping a new industrial landscape. Developing resource efficiency is a resilience strategy securing operational up-time, reducing costs and mitigating risk for the clients and communities we serve. ',
              'description_second' => 'We are all empowered to think like owners. To calculate risk, realize opportunity, and help our clients achieve success in the future economy. ',
              'quote' => 'act LIKE ITS YOURS',
              'image' => '../assets/img/image4.jpg',
            ],
            [
              'tagline' => 'Value #5',
              'title' => 'entrepreneurial',
              'description' => 'Regulatory shifts, market forces, and supply chain vulnerabilities are shaping a new industrial landscape. Developing resource efficiency is a resilience strategy securing operational up-time, reducing costs and mitigating risk for the clients and communities we serve. ',
              'description_second' => 'We are all empowered to think like owners. To calculate risk, realize opportunity, and help our clients achieve success in the future economy. ',
              'quote' => 'act LIKE ITS YOURS',
              'image' => '../assets/img/image2.webp',
            ],
        ];

        $card =     [
          'title' => 'earth',
          'desc' => 'entrepreneurial <br> accountable <br> resourceful <br> teamwork <br> hunger',
          'caption' => 'OUR VALUES',
      ];
        
        include('../components/sections/block-media-grid.php'); 
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