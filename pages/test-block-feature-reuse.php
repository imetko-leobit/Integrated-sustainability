<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Test Block Feature Reuse</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="home">
  <?php
  include('../components/header/_header.php');
  ?>

  <main class="main">
    <h1 style="text-align: center; padding: 2rem;">Test: Block Feature Multiple Instances</h1>
    <p style="text-align: center; padding: 0 2rem 2rem;">This page demonstrates that block-feature.php can be included multiple times without function redeclaration errors.</p>

    <!-- First Instance -->
    <?php
      $tagline = 'First Instance';
      $title = 'First Feature Block';
      $paragraphs = [
        'This is the first instance of the feature block. It demonstrates that the refactored code allows multiple includes on the same page.',
      ];
      $button = [
        'url' => '/services',
        'label' => 'Learn More'
      ];
      $grid_items = [
        ['icon' => 'regulatory.svg', 'label' => 'Item 1'],
        ['icon' => 'carbon.svg', 'label' => 'Item 2'],
        ['icon' => 'equipment.svg', 'label' => 'Item 3'],
        ['icon' => 'compliance.svg', 'label' => 'Item 4'],
        ['icon' => 'regulatory.svg', 'label' => 'Item 5'],
        ['icon' => 'carbon.svg', 'label' => 'Item 6'],
        ['icon' => 'equipment.svg', 'label' => 'Item 7'],
      ];
      $center_item = [
        'type' => 'text',
        'content' => 'First'
      ];
      $layout = 'image-left';
      $checkbox_list = [];
      
      include('../components/sections/block-feature.php');
    ?>

    <!-- Second Instance -->
    <?php
      $tagline = 'Second Instance';
      $title = 'Second Feature Block';
      $paragraphs = [
        'This is the second instance of the feature block. The anonymous function approach prevents function redeclaration errors.',
      ];
      $button = [
        'url' => '/services',
        'label' => 'Discover More'
      ];
      $grid_items = [
        ['icon' => 'compliance.svg', 'label' => 'Feature A'],
        ['icon' => 'equipment.svg', 'label' => 'Feature B'],
        ['icon' => 'carbon.svg', 'label' => 'Feature C'],
        ['icon' => 'regulatory.svg', 'label' => 'Feature D'],
        ['icon' => 'compliance.svg', 'label' => 'Feature E'],
        ['icon' => 'equipment.svg', 'label' => 'Feature F'],
        ['icon' => 'carbon.svg', 'label' => 'Feature G'],
      ];
      $center_item = [
        'type' => 'image',
        'content' => '../assets/img/directions.svg'
      ];
      $layout = 'image-right';
      $checkbox_list = [
        ['icon' => 'mark.svg', 'label' => 'Checkbox item 1'],
        ['icon' => 'mark.svg', 'label' => 'Checkbox item 2'],
      ];
      
      include('../components/sections/block-feature.php');
    ?>

    <!-- Third Instance -->
    <?php
      $tagline = 'Third Instance';
      $title = 'Third Feature Block';
      $paragraphs = [
        'This is the third instance demonstrating complete flexibility in reusing the block component.',
        'Each instance maintains its own styling and functionality.',
      ];
      $button = [
        'url' => '/services',
        'label' => 'Get Started'
      ];
      $grid_items = [
        ['icon' => 'regulatory.svg', 'label' => 'Service 1'],
        ['icon' => 'carbon.svg', 'label' => 'Service 2'],
        ['icon' => 'equipment.svg', 'label' => 'Service 3'],
        ['icon' => 'compliance.svg', 'label' => 'Service 4'],
        ['icon' => 'regulatory.svg', 'label' => 'Service 5'],
        ['icon' => 'carbon.svg', 'label' => 'Service 6'],
        ['icon' => 'equipment.svg', 'label' => 'Service 7'],
      ];
      $center_item = [
        'type' => 'text',
        'content' => 'Third'
      ];
      $layout = 'image-left';
      $checkbox_list = [
        ['icon' => 'mark.svg', 'label' => 'Key benefit 1'],
        ['icon' => 'mark.svg', 'label' => 'Key benefit 2'],
        ['icon' => 'mark.svg', 'label' => 'Key benefit 3'],
      ];
      
      include('../components/sections/block-feature.php');
    ?>

  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>
