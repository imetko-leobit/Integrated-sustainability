<?php
    // Default heading level to 3 if not provided
    $heading_level = $heading_level ?? 3;
    include_once(__DIR__ . '/../helpers/heading.php');
?>
<link rel="stylesheet" href="../assets/css/components-team_member_card.css" />

<div class="team-member-card">
    <div class="team-member-card__image-container">
        <img src="<?php echo $member_photo; ?>" alt="<?php echo $member_name; ?>" class="team-member-card__image">
        <button class="team-member-card__action-btn" aria-label="View profile">
          <svg viewBox="0 0 27 15">
            <use xlink:href="#arrow-right"></use>
          </svg>
        </button>
    </div>
    <div class="team-member-card__info">
        <?php render_heading($member_name, $heading_level, 'title title--h5 team-member-card__name'); ?>
        <p class="team-member-card__additional-info"><?php echo $member_additional_info; ?></p>
        <p class="team-member-card__position"><?php echo $member_position; ?></p>
    </div>
</div>