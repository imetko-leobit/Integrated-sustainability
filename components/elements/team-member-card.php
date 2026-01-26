<link rel="stylesheet" href="../assets/css/components-team_member_card.css" />

<div class="team-member-card">
    <div class="team-member-card__image-container">
        <img src="<?php echo $member_photo; ?>" alt="<?php echo $member_name; ?>" class="team-member-card__image">
        <button class="team-member-card__action-btn" aria-label="View profile">
            <svg viewBox="0 0 24 24" class="team-member-card__arrow">
                <path fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/>
            </svg>
        </button>
    </div>
    <div class="team-member-card__info">
        <h3 class="team-member-card__name"><?php echo $member_name; ?></h3>
        <p class="team-member-card__additional-info"><?php echo $member_additional_info; ?></p>
        <p class="team-member-card__position"><?php echo $member_position; ?></p>
    </div>
</div>
