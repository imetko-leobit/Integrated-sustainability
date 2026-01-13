<link rel="stylesheet" href="../assets/css/components-vacancy_card.css" />

<div class="vacancy-card">
  <div class="vacancy-card__content">
    <h3 class="vacancy-card__title"><?php echo htmlspecialchars($vacancy_card_title, ENT_QUOTES, 'UTF-8'); ?></h3>
    <p class="vacancy-card__description"><?php echo htmlspecialchars($vacancy_card_description, ENT_QUOTES, 'UTF-8'); ?></p>
    <button class="btn btn--gradient"><?php echo htmlspecialchars($vacancy_card_button ?? 'Apply Now', ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
</div>