<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Test Dynamic Heading Levels</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
    .test-section {
      border: 2px solid #e0e0e0;
      margin: 20px;
      padding: 20px;
      background: #f9f9f9;
    }
    .test-section h2 {
      color: #0066cc;
      margin-bottom: 10px;
    }
    .test-section p {
      color: #666;
      font-style: italic;
      margin-bottom: 15px;
    }
  </style>
</head>

<body class="test-page">
  <?php include('../components/header/_header.php'); ?>

  <main class="main test-page__main">
    <div style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
      <h1 style="text-align: center; margin-bottom: 40px;">Dynamic Heading Levels Test Page</h1>
      
      <div class="test-section">
        <h2>Hero Block with Default Heading (H1)</h2>
        <p>This hero block uses the default heading level (h1) since no $heading_level is set.</p>
        <?php
          $hero_title = "Default Hero Heading";
          $hero_description = "This uses the default h1 heading level";
          $hero_img = "../assets/img/bg-home.png";
          // $heading_level not set - will default to 1
          include('../components/sections/block-hero.php');
          unset($hero_title, $hero_description, $hero_img, $heading_level);
        ?>
      </div>

      <div class="test-section">
        <h2>Hero Block with Custom Heading Level (H2)</h2>
        <p>This hero block explicitly sets $heading_level to 2, demonstrating dynamic heading control.</p>
        <?php
          $hero_title = "Custom H2 Hero Heading";
          $hero_description = "This uses a custom h2 heading level";
          $hero_img = "../assets/img/bg-home.png";
          $heading_level = 2; // Custom heading level
          include('../components/sections/block-hero.php');
          unset($hero_title, $hero_description, $hero_img, $heading_level);
        ?>
      </div>

      <div class="test-section">
        <h2>Careers Intro with Default Heading (H2)</h2>
        <p>This component uses the default h2 heading level.</p>
        <?php
          $careers_intro_title = "Join Our Amazing Team";
          $careers_intro_description = "Default h2 heading level for careers intro";
          // $heading_level not set - will default to 2
          include('../components/sections/block-careers-intro.php');
          unset($careers_intro_title, $careers_intro_description, $heading_level);
        ?>
      </div>

      <div class="test-section">
        <h2>Careers Intro with Custom Heading Level (H3)</h2>
        <p>This component explicitly sets $heading_level to 3.</p>
        <?php
          $careers_intro_title = "Custom H3 Careers Heading";
          $careers_intro_description = "Custom h3 heading level for careers intro";
          $heading_level = 3; // Custom heading level
          include('../components/sections/block-careers-intro.php');
          unset($careers_intro_title, $careers_intro_description, $heading_level);
        ?>
      </div>

      <div class="test-section">
        <h2>Approach Intro with Default Heading (H3)</h2>
        <p>This component uses the default h3 heading level.</p>
        <?php
          $approach_heading_title = "Default H3 Approach Heading";
          $approach_text_1 = "This demonstrates the default heading level of h3 for the approach intro component.";
          $image_src = "../assets/img/strengthen.png";
          // $heading_level not set - will default to 3
          include('../components/sections/block-approach-intro.php');
          unset($approach_heading_title, $approach_text_1, $image_src, $heading_level);
        ?>
      </div>

      <div class="test-section">
        <h2>Approach Intro with Custom Heading Level (H2)</h2>
        <p>This component explicitly sets $heading_level to 2.</p>
        <?php
          $approach_heading_title = "Custom H2 Approach Heading";
          $approach_text_1 = "This demonstrates a custom heading level of h2 for the approach intro component.";
          $image_src = "../assets/img/strengthen.png";
          $heading_level = 2; // Custom heading level
          include('../components/sections/block-approach-intro.php');
          unset($approach_heading_title, $approach_text_1, $image_src, $heading_level);
        ?>
      </div>

      <div class="test-section">
        <h2>Insights Block with Custom Heading Level (H3)</h2>
        <p>This component explicitly sets $heading_level to 3.</p>
        <?php
          $pillar_title = "Custom H3 Insights Heading";
          $pillar_text_1 = "This demonstrates a custom heading level of h3 for the insights component.";
          $heading_level = 3; // Custom heading level
          include('../components/sections/block-insights.php');
          unset($pillar_title, $pillar_text_1, $heading_level);
        ?>
      </div>

      <div style="margin: 40px 20px; padding: 20px; background: #e8f4f8; border-left: 4px solid #0066cc;">
        <h2 style="margin-top: 0;">Summary</h2>
        <p style="margin-bottom: 10px;"><strong>Components updated in this PR to support dynamic heading levels:</strong></p>
        <ul style="line-height: 1.8;">
          <li><code>block-hero.php</code> - Default: h1 (changed from hardcoded h1)</li>
          <li><code>block-careers-intro.php</code> - Default: h2 (changed from hardcoded h4)</li>
          <li><code>block-search-results.php</code> - Default: h1 (changed from hardcoded h1)</li>
          <li><code>filter_form.php</code> - Default: h2 (changed from hardcoded h1)</li>
        </ul>
        <p style="margin-top: 15px;"><strong>Components that already supported dynamic heading levels:</strong></p>
        <ul style="line-height: 1.8;">
          <li><code>block-approach-intro.php</code> - Default: h3</li>
          <li><code>block-insights.php</code> - Default: h2</li>
        </ul>
        <p style="margin-top: 20px;"><strong>Usage:</strong> Simply set <code>$heading_level = N;</code> (where N is 1-6) before including the component to override the default.</p>
        <p><strong>Visual Styling:</strong> CSS classes remain unchanged, ensuring consistent visual appearance regardless of semantic heading level.</p>
        <p><strong>Security:</strong> The <code>render_heading()</code> helper automatically escapes content using <code>htmlspecialchars()</code> to prevent XSS attacks.</p>
      </div>
    </div>
  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>
