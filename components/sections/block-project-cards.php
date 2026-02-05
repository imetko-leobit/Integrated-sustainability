<?php

  $initial_positions = [
    1 => 'P1',
    2 => 'P2',
    3 => 'P3',
    4 => 'P4',
    5 => 'P5',
];

$position_to_class = [
  'P1' => 'card__container--full',
  'P2' => 'card__container--half-simple',
  'P3' => 'card__container--small-left',
  'P4' => 'card__container--small-right',
  'P5' => 'card__container--half',
];

$has_full_card = in_array('full', array_column($cards_data, 'type'));

$grid_class = $has_full_card ? 'block-project-cards__grid' : 'block-project-cards__grid block-project-cards__grid--small';

// Default heading levels
$project_card_heading_level = $project_card_heading_level ?? 4;
$author_name_level = $author_name_level ?? 4;
include_once(__DIR__ . '/../helpers/heading.php');

?>

<link rel="stylesheet" href="../assets/css/section-block_project_cards.css" />
<link rel="stylesheet" href="../assets/css/components-person_card.css" />

<section class="block-project-cards js-project-card-rotator" data-rotation-interval="7000">
  <div class="<?php echo $grid_class; ?>">
    <?php foreach ($cards_data as $card):
            $card_id = $card['id'];
            $current_position = $initial_positions[$card_id];
            $current_class = $position_to_class[$current_position];
            $has_image = !empty($card['image']);
        ?>
    <a href="<?php echo $card['link']; ?>" class="card__container <?php echo $current_class; ?>"
      data-id="<?php echo $card_id; ?>" data-position="<?php echo $current_position; ?>">
      <div class="card__image-wrapper">
        <img src="<?php echo $card['image']; ?>" alt="<?php echo $card['title']; ?>" class="card__image">
      </div>
      <div class="card__content">
        <div class="card__text-block">
          <?php render_heading($card['title'], $project_card_heading_level, 'title title--h3 card__title js-ellipsis-title'); ?>
          <p class="card__description text-content js-ellipsis-text">
            <?php echo $card['text']; ?>
          </p>
          <span class="arrow-icon">
            <svg id="arrow-top-right" viewBox="0 0 24 24">
              <path class="icon-arrow" fill="currentColor"
                d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z" />
            </svg>
          </span>
        </div>
        <div class="person-card">
          <div class="person-card__content">
            <div class="person-card__image-container">
              <img src="<?php echo $card['author']['photo']; ?>" alt="person photo" class="person-card__image">
            </div>
            <div class="person-card__info">
              <?php render_heading($card['author']['name'], $author_name_level, 'card__name'); ?>
              <p class="card__credentials"><?php echo $card['author']['degree']; ?></p>
              <p class="card__title"><?php echo $card['author']['role']; ?></p>
            </div>
          </div>
        </div>
      </div>
    </a>
    <?php endforeach; ?>

  </div>
</section>

<!-- <script type='text/javascript' src="../assets/js/section-block_project_cards.js"></script> -->