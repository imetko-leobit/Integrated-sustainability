<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Block Approach Intro - Test Page</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    .test-section {
      margin-bottom: 100px;
      border-top: 3px solid #333;
      padding-top: 40px;
    }
    .test-label {
      background: #333;
      color: #fff;
      padding: 10px 20px;
      margin-bottom: 40px;
      font-weight: bold;
    }
  </style>
</head>

<body class="home">
  <?php include('../components/header/_header.php'); ?>

  <main class="main">
    <div style="padding: 40px; background: #f5f5f5;">
      <h1>Block Approach Intro - Component Test Page</h1>
      <p>This page demonstrates all the new configurable features of the block-approach-intro component.</p>
    </div>

    <!-- Test 1: Default Configuration -->
    <div class="test-section">
      <div class="test-label">Test 1: Default Configuration (Backward Compatible)</div>
      <?php 
        // Reset all variables to ensure clean state
        unset($approach_tagline, $approach_heading_title, $approach_text_1, $approach_text_2);
        unset($approach_button, $approach_button_url, $show_button, $reverse);
        unset($image_src, $image_alt, $accordion_items, $approach_link_label);
        
        include('../components/sections/block-approach-intro.php') 
      ?>
    </div>

    <!-- Test 2: With Tagline -->
    <div class="test-section">
      <div class="test-label">Test 2: With Optional Tagline</div>
      <?php 
        unset($approach_tagline, $approach_heading_title, $approach_text_1, $approach_text_2);
        unset($approach_button, $approach_button_url, $show_button, $reverse);
        unset($image_src, $image_alt, $accordion_items, $approach_link_label);
        
        $approach_tagline = "Our Performance Philosophy";
        $approach_heading_title = "Sustainable Infrastructure Solutions";
        $approach_text_1 = "We deliver integrated water treatment solutions that ensure long-term performance and reliability.";
        $approach_text_2 = "Our approach combines technical expertise with sustainable practices.";
        include('../components/sections/block-approach-intro.php') 
      ?>
    </div>

    <!-- Test 3: With Custom Button -->
    <div class="test-section">
      <div class="test-label">Test 3: With Custom Button</div>
      <?php 
        unset($approach_tagline, $approach_heading_title, $approach_text_1, $approach_text_2);
        unset($approach_button, $approach_button_url, $show_button, $reverse);
        unset($image_src, $image_alt, $accordion_items, $approach_link_label);
        
        $approach_heading_title = "Partner with Our Expert Team";
        $approach_text_1 = "Connect with our specialists to discuss your project requirements.";
        $approach_button = 'Schedule a Consultation';
        $approach_button_url = '/contact';
        include('../components/sections/block-approach-intro.php') 
      ?>
    </div>

    <!-- Test 4: Reverse Layout -->
    <div class="test-section">
      <div class="test-label">Test 4: Reverse Layout (Image First)</div>
      <?php 
        unset($approach_tagline, $approach_heading_title, $approach_text_1, $approach_text_2);
        unset($approach_button, $approach_button_url, $show_button, $reverse);
        unset($image_src, $image_alt, $accordion_items, $approach_link_label);
        
        $approach_tagline = "Reversed Layout";
        $approach_heading_title = "Image on the Left Side";
        $approach_text_1 = "This demonstrates the reverse layout feature where the image column appears first on desktop.";
        $approach_text_2 = "The mobile layout remains logical with text appearing first.";
        $reverse = true;
        include('../components/sections/block-approach-intro.php') 
      ?>
    </div>

    <!-- Test 5: Hidden Button -->
    <div class="test-section">
      <div class="test-label">Test 5: Hidden Button Section</div>
      <?php 
        unset($approach_tagline, $approach_heading_title, $approach_text_1, $approach_text_2);
        unset($approach_button, $approach_button_url, $show_button, $reverse);
        unset($image_src, $image_alt, $accordion_items, $approach_link_label);
        
        $approach_heading_title = "Information Only Section";
        $approach_text_1 = "This section demonstrates hiding the button wrapper entirely.";
        $approach_text_2 = "No call-to-action is rendered, providing a cleaner layout.";
        $show_button = false;
        include('../components/sections/block-approach-intro.php') 
      ?>
    </div>

    <!-- Test 6: No Image -->
    <div class="test-section">
      <div class="test-label">Test 6: Text Only (No Image)</div>
      <?php 
        unset($approach_tagline, $approach_heading_title, $approach_text_1, $approach_text_2);
        unset($approach_button, $approach_button_url, $show_button, $reverse);
        unset($image_src, $image_alt, $accordion_items, $approach_link_label);
        
        $approach_heading_title = "Text-Focused Content";
        $approach_text_1 = "When no image is needed, the component gracefully handles a text-only layout.";
        $approach_text_2 = "The image container is not rendered at all.";
        $image_src = null;
        include('../components/sections/block-approach-intro.php') 
      ?>
    </div>

    <!-- Test 7: Single Paragraph -->
    <div class="test-section">
      <div class="test-label">Test 7: Single Paragraph (No Second Text)</div>
      <?php 
        unset($approach_tagline, $approach_heading_title, $approach_text_1, $approach_text_2);
        unset($approach_button, $approach_button_url, $show_button, $reverse);
        unset($image_src, $image_alt, $accordion_items, $approach_link_label);
        
        $approach_heading_title = "Concise Messaging";
        $approach_text_1 = "Sometimes a single paragraph is all you need to convey your message effectively.";
        $approach_text_2 = null;
        include('../components/sections/block-approach-intro.php') 
      ?>
    </div>

    <!-- Test 8: All Features Combined -->
    <div class="test-section">
      <div class="test-label">Test 8: All Features Combined</div>
      <?php 
        unset($approach_tagline, $approach_heading_title, $approach_text_1, $approach_text_2);
        unset($approach_button, $approach_button_url, $show_button, $reverse);
        unset($image_src, $image_alt, $accordion_items, $approach_link_label);
        
        $approach_tagline = "Complete Example";
        $approach_heading_title = "Comprehensive Feature Demonstration";
        $approach_text_1 = "This example combines all available features: tagline, custom title, custom text, custom button, and reversed layout.";
        $approach_text_2 = "Every configuration option is utilized to show the component's full flexibility.";
        $approach_button = 'Explore All Features';
        $approach_button_url = '/features';
        $reverse = true;
        include('../components/sections/block-approach-intro.php') 
      ?>
    </div>

  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>
