<?php
    $heading_level = $heading_level ?? 4;
    include_once(__DIR__ . '/../helpers/heading.php');
?>
<link rel="stylesheet" href="../assets/css/components-vacancy_card.css" />

<div class="vacancy-card">
  <div class="vacancy-card__content">
    <?php render_heading($vacancy_card_title, $heading_level, 'title title--h3 vacancy-card__title'); ?>
    <p class="vacancy-card__description"><?php echo htmlspecialchars($vacancy_card_description, ENT_QUOTES, 'UTF-8'); ?></p>
    <button class="btn btn--gradient"><?php echo htmlspecialchars($vacancy_card_button ?? 'Apply Now', ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
</div>