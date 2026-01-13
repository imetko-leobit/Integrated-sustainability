<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CTA Block Layout Tests</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    .test-section {
      margin: 40px 0;
      padding: 20px;
      background: #f5f5f5;
    }
    .test-label {
      background: #333;
      color: white;
      padding: 10px 20px;
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 20px;
    }
  </style>
</head>

<body class="test-page">
  <?php include('../components/header/_header.php'); ?>

  <main class="main">
    
    <div class="test-section">
      <div class="test-label">Test 1: Center Layout (using $card_position = 'center')</div>
      <?php 
          $card_position = 'center';
          $title = 'Centered Card <br> Layout Example';
          $description = 'This card is positioned in the center of the CTA block, taking approximately 60% width and 70% height with centered text alignment.';
          $button_text = 'Learn More';
          include('../components/sections/block-cta.php');
          unset($card_position, $title, $description, $button_text);
      ?>
    </div>

    <div class="test-section">
      <div class="test-label">Test 2: Right Layout (using $card_position = 'right')</div>
      <?php 
          $card_position = 'right';
          $title = 'Right Aligned <br> Card Layout';
          $description = 'This card is positioned on the right side of the CTA block using a 12-column grid system with left-aligned text.';
          $button_text = 'Book a Call';
          include('../components/sections/block-cta.php');
          unset($card_position, $title, $description, $button_text);
      ?>
    </div>

    <div class="test-section">
      <div class="test-label">Test 3: Default Layout (no $card_position specified, should default to 'right')</div>
      <?php 
          $title = 'Default Behavior <br> Test';
          $description = 'When no card_position is specified, the block should default to the right layout, maintaining backward compatibility.';
          $button_text = 'Get Started';
          include('../components/sections/block-cta.php');
          unset($title, $description, $button_text);
      ?>
    </div>

    <div class="test-section">
      <div class="test-label">Test 4: Backward Compatibility (using $layout = 'center')</div>
      <?php 
          $layout = 'center';
          $title = 'Backward Compatible <br> Layout Variable';
          $description = 'Testing backward compatibility: using $layout variable instead of $card_position should still work correctly.';
          $button_text = 'Contact Us';
          include('../components/sections/block-cta.php');
          unset($layout, $title, $description, $button_text);
      ?>
    </div>

  </main>

  <?php include('../components/footer/_footer.php'); ?>

</body>

</html>
