<?php
    // Default heading level to 3 if not provided
    $heading_level = $heading_level ?? 3;
    include_once(__DIR__ . '/../helpers/heading.php');
?>
<link rel="stylesheet" href="../assets/css/components-person_card.css" />

<div class="person-card">
    <div class="person-card__image-container">
        <img src="<?php echo $person_photo; ?>" alt="person photo" class="person-card__image">
    </div>
    <div class="person-card__info">
        <?php render_heading($person_name, $heading_level, 'card__name'); ?>
        <p class="card__credentials"><?php echo $person_degree; ?></p>
        <p class="card__title"><?php echo $person_role; ?></p>
    </div>
</div>