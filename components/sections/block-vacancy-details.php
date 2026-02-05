<?php
// Configuration variables
if (!isset($vacancy_card_title)) {
    $vacancy_card_title = "Apply for this Position";
}
if (!isset($vacancy_card_description)) {
    $vacancy_card_description = "Join our team and make a difference in sustainability";
}
if (!isset($vacancy_card_button)) {
    $vacancy_card_button = "Apply Now";
}

// Vacancy details content blocks
if (!isset($vacancy_details_blocks)) {
    $vacancy_details_blocks = [];
}
// Default heading levels
$block_title_level = $block_title_level ?? 4;
$list_title_level = $list_title_level ?? 4;
include_once(__DIR__ . '/../helpers/heading.php');
?>

<link rel="stylesheet" href="../assets/css/section-block_vacancy_details.css" />

<section class="block-vacancy-details">
  <div class="block-vacancy-details__wrapper">

    <!-- Left Column: Vacancy Card -->
    <div class="block-vacancy-details__col block-vacancy-details__col--sidebar">
      <?php
        $vacancy_card_title=$vacancy_card_title;
        $vacancy_card_description=$vacancy_card_description;
        $vacancy_card_button=$vacancy_card_button;
        include('../components/elements/vacancy-card.php');
      ?>
    </div>

    <!-- Right Column: Vacancy Details -->
    <div class="block-vacancy-details__col block-vacancy-details__col--content">
      <?php if (!empty($vacancy_details_blocks)): ?>
        <?php foreach ($vacancy_details_blocks as $block): ?>
          <div class="vacancy-details-block">
            <?php if (!empty($block['title'])): ?>
              <?php render_heading($block['title'], $block_title_level, 'title title--h3 vacancy-details-block__title'); ?>
            <?php endif; ?>

            <?php if (!empty($block['paragraphs'])): ?>
              <div class="vacancy-details-block__text">
                <?php foreach ($block['paragraphs'] as $paragraph): ?>
                  <p><?php echo htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <?php if (!empty($block['list_title'])): ?>
              <?php render_heading($block['list_title'], $list_title_level, 'title title--h3 vacancy-details-block__list-title'); ?>
            <?php endif; ?>

            <?php if (!empty($block['list_items'])): ?>
              <ul class="vacancy-details-block__list">
                <?php foreach ($block['list_items'] as $item): ?>
                  <li class="vacancy-details-block__list-item">
                    <img src="../assets/img/mark.svg" alt="" class="vacancy-details-block__icon" />
                    <span><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

  </div>
</section>