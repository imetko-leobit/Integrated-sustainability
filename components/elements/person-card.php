<link rel="stylesheet" href="../assets/css/components-person_card.css" />

<div class="person-card">
    <div class="person-card__image-container">
        <img src="<?php echo $person_photo; ?>" alt="person photo" class="person-card__image">
    </div>
    <div class="person-card__info">
        <h4 class="card__name"><?php echo $person_name; ?></h4>
        <p class="card__credentials"><?php echo $person_degree; ?></p>
        <p class="card__title"><?php echo $person_role; ?></p>
    </div>
</div>