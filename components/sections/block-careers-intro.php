<?php
// Configuration variables - can be set before including this component
// All have sensible defaults for backward compatibility

// Section title (left column)
if (!isset($careers_intro_title)) {
    $careers_intro_title = "Join Our Team";
}

// Description text (right column)
if (!isset($careers_intro_description)) {
    $careers_intro_description = "We are committed to building a diverse and inclusive workplace where innovation thrives and sustainability drives everything we do.";
}

// Awards/logos array - each item should have 'src' and 'alt' properties
// Example: ['src' => '../assets/img/award1.png', 'alt' => 'Award name']
if (!isset($careers_intro_logos)) {
    $careers_intro_logos = [
        ['src' => '../assets/img/logoGoldcorp.png', 'alt' => 'Goldcorp'],
        ['src' => '../assets/img/logoCunuma.png', 'alt' => 'Cunuma'],
        ['src' => '../assets/img/logoSkeena.png', 'alt' => 'Skeena'],
        ['src' => '../assets/img/logoOsisko.png', 'alt' => 'Osisko'],
        ['src' => '../assets/img/logoTeck.png', 'alt' => 'Teck'],
        ['src' => '../assets/img/logoGoldcorp.png', 'alt' => 'Goldcorp'],
        ['src' => '../assets/img/logoCunuma.png', 'alt' => 'Cunuma'],
        ['src' => '../assets/img/logoSkeena.png', 'alt' => 'Skeena'],
    ];
}

// Default heading level to 2 if not provided
$heading_level = $heading_level ?? 4;
include_once(__DIR__ . '/../helpers/heading.php');
?>

<link rel="stylesheet" href="../assets/css/section-block_careers_intro.css" />

<section class="block-careers-intro">
  <div class="block-careers-intro__wrapper">

    <!-- Header and Description Row -->
    <div class="block-careers-intro__content">
      <div class="block-careers-intro__header">
        <?php render_heading($careers_intro_title, $heading_level, 'title title--h4'); ?>
      </div>

      <div class="block-careers-intro__description">
        <div class="text-content text-content--grey">
          <p><?php echo htmlspecialchars($careers_intro_description, ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
      </div>
    </div>

    <!-- Awards/Logos Row -->
    <?php if (!empty($careers_intro_logos)): ?>
    <div class="block-careers-intro__logos">
      <?php foreach ($careers_intro_logos as $logo): ?>
        <div class="block-careers-intro__logo-item">
          <img
            src="<?php echo htmlspecialchars($logo['src'], ENT_QUOTES, 'UTF-8'); ?>"
            alt="<?php echo htmlspecialchars($logo['alt'], ENT_QUOTES, 'UTF-8'); ?>"
            class="block-careers-intro__logo-img"
          />
        </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

  </div>
</section>
