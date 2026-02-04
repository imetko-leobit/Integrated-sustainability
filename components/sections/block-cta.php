<?php

$title = $title ?? 'partner with <br> a unified team';
$description = $description ?? 'Achieve greater cost control and schedule certainty with accountable infrastructure designed for high-consequence operations.';
$button_text = $button_text ?? 'Book a Call';
// Default heading level to 2 if not provided
$heading_level = $heading_level ?? 2;
include_once(__DIR__ . '/../helpers/heading.php');
?>

<link rel="stylesheet" href="../assets/css/section-block_cta.css" />

<section ?
  class="block-cta <?php echo $layout == "right" ? 'block-cta--right' : ($layout == "center" ? 'block-cta--center' : 'block-cta--default'); ?>">

  <div class="block-cta__background">
    <img class="block-cta__image" src='../assets/img/cta-bg.png' alt="<?php echo $title; ?>" />
    <div class="block-cta__card-wrapper">
      <div class="block-cta__card">
        <div class="block-cta__card-content">
          <?php render_heading($title, $heading_level, 'title title--h1', [], true); ?>
          <p class="block-cta__description"><?php echo $description; ?></p>
          <button class="btn btn--gradient"><?php echo $button_text; ?></button>
        </div>
      </div>
    </div>
  </div>

</section>