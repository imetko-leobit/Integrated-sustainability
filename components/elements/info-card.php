<?php
    // Default heading level to 3 if not provided
    $heading_level = $heading_level ?? 3;
    include_once(__DIR__ . '/../helpers/heading.php');
?>
<link rel="stylesheet" href="../assets/css/components-info_card.css" />

<div class="info-card">
  <img src="<?php echo $sidebar_img; ?>" alt="Request Package" class="info-card__image">
  <div class="info-card__content">
    <div class="info-card__content-top"></div>
    <div class="info-card__content-bottom">
      <?php render_heading($sidebar_title, $heading_level, 'title title--h3'); ?>
      <p class="text-content"><?php echo $sidebar_description; ?></p>
      <button class="btn btn--gradient"><?php echo $sidebar_button_name; ?></button>
    </div>
  </div>
</div>