<link rel="stylesheet" href="../assets/css/components-vacancy_card.css" />

<div class="vacancy-card">
  <div class="vacancy-card__content">
    <h3 class="vacancy-card__title"><?php echo $vacancy_card_title; ?></h3>
    <p class="vacancy-card__description"><?php echo $vacancy_card_description; ?></p>
    <button class="btn btn--gradient"><?php echo $vacancy_card_button ?? 'Apply Now'; ?></button>
  </div>
</div>
