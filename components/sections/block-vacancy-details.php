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
?>

<link rel="stylesheet" href="../assets/css/section-block_vacancy_details.css" />

<section class="block-vacancy-details">
  <div class="block-vacancy-details__wrapper">
    
    <!-- Left Column: Vacancy Card -->
    <div class="block-vacancy-details__col block-vacancy-details__col--sidebar">
      <?php include('../components/elements/vacancy-card.php'); ?>
    </div>

    <!-- Right Column: Vacancy Details -->
    <div class="block-vacancy-details__col block-vacancy-details__col--content">
      <?php if (!empty($vacancy_details_blocks)): ?>
        <?php foreach ($vacancy_details_blocks as $block): ?>
          <div class="vacancy-details-block">
            <?php if (!empty($block['title'])): ?>
              <h3 class="vacancy-details-block__title"><?php echo htmlspecialchars($block['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
            <?php endif; ?>
            
            <?php if (!empty($block['paragraphs'])): ?>
              <div class="vacancy-details-block__text">
                <?php foreach ($block['paragraphs'] as $paragraph): ?>
                  <p><?php echo htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            
            <?php if (!empty($block['list_title'])): ?>
              <h4 class="vacancy-details-block__list-title"><?php echo htmlspecialchars($block['list_title'], ENT_QUOTES, 'UTF-8'); ?></h4>
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
