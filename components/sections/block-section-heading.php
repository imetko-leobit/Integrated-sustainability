<?php
    // Default heading level to 2 if not provided
    $heading_level = $heading_level ?? 2;
    $person_card_heading_level = $person_card_heading_level ?? 4;
    include_once(__DIR__ . '/../helpers/heading.php');
?>
<link rel="stylesheet" href="../assets/css/section-block_section_heading.css" />

<?php
    $link_url = $link_url ?? null;
    $link_text = $link_text ?? null;
    $link_direction = $link_direction ?? 'down'; // 'down' or 'right'
    $custom_icon = $custom_icon ?? null;
    $is_title_h1 = $is_title_h1 ?? false;
    $section_title = $section_title ?? '';

    $person_name = $person_name ?? null;
    $person_degree = $person_degree ?? null;
    $person_date = $person_date ?? null;
    $person_photo = $person_photo ?? null;
?>

<section class="block-section-heading">
    <div class="heading heading-navigation">
        <?php render_heading($section_title, $heading_level, 'title title--h1', [], true); ?>

        <?php if ($link_url || $custom_icon || $person_photo): ?>
            <div class="heading-action <?php echo $link_direction === 'right' ? "heading-action--right" : ($link_direction === 'down' ? "heading-action--down" : ''); ?>">
                <?php if ($link_text): ?>
                    <span class="action-text">
                        <?php echo $link_text; ?>
                    </span>
                <?php endif; ?>

                <?php if ($link_url): ?>
                    <a href="<?php echo $link_url; ?>" class="link-icon" aria-label="<?php echo $link_text ? $link_text : 'View Section'; ?>">
                        <span class="icon icon--active">
                            <img class="icon-img" src="<?php echo $custom_icon; ?>" alt="Heading Icon">
                        </span>
                    </a>
                <?php elseif ($custom_icon): ?>
                    <span class="icon icon--simple">
                        <img class="icon-img" src="<?php echo $custom_icon; ?>" alt="Heading Icon">
                    </span>
                <?php elseif ($person_photo): ?>
                    <div class='person-card'>
                        <div class="person-card__info">
                            <?php render_heading($person_name, $person_card_heading_level, 'card__name'); ?>
                            <p class="card__credentials"><?php echo $person_degree; ?></p>
                            <p class="card__date"><?php echo $person_date; ?></p>
                        </div>
                        <div class="person-card__image-container">
                            <img src="<?php echo $person_photo; ?>" alt="person photo" class="person-card__image"/>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>
    </div>

    <div class="divider"></div>
</section>