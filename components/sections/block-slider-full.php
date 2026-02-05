<?php
$pillar_title = "de-risk capital project delivery";
$pillar_text_1 = "Permitting, environmental, and stakeholder impacts are often major risks to a project's schedule and long-term success.";
$pillar_text_2 = "We account for environmental compliance, technology readiness, life-cycle growth, and stakeholder engagement to reduce permit timelines and de-risk your project.";
// Default heading level
$heading_level = $heading_level ?? 4;
include_once(__DIR__ . '/../helpers/heading.php');

$pillar_items = [
    [
        'title' => 'Feasibility',
        'desc' => 'Optimize cost, performance, and constructability in support of confident project decisions.',
        'image' => 'https://img.freepik.com/premium-photo/waste-water-treatment-ponds-from-industrial-plants_281691-294.jpg',
        'link' => '/services#feasibility',
        'active' => true,
    ],
    [
        'title' => 'Water resources',
        'desc' => 'Develop integrated water management plans to ensure compliance and operational reliability.',
        'image' => 'https://e0.pxfuel.com/wallpapers/252/868/desktop-wallpaper-cargo-ship-iphone-6.jpg',
        'link' => '/services#water-resources',
        'active' => false,
    ],
    [
        'title' => 'Permitting',
        'desc' => 'Accelerate permit acquisition through proactive engagement and robust environmental planning.',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_SwmZu1t5AW2DxK0oL1Qg0GaNeFrCOrFjEA&s',
        'link' => '/services#permitting',
        'active' => false,
    ],
    [
        'title' => 'Compliance',
        'desc' => 'Maintain operational integrity with continuous compliance monitoring and reporting.',
        'image' => 'https://i.pinimg.com/736x/c8/fd/e4/c8fde4c75a8dfe529d1b5fbe0365048e.jpg',
        'link' => '/services#compliance',
        'active' => false,
    ],
    [
        'title' => 'Other one',
        'desc' => 'Description.',
        'image' => 'https://t3.ftcdn.net/jpg/00/88/56/06/360_F_88560614_jLxW5ZnB48ygLeR5kc5YIz4UCyJLfdtE.jpg',
        'link' => '/services#other-one',
        'active' => false,
    ],
];

$total_slides = count($pillar_items);
?>

<link rel="stylesheet" href="../assets/css/section-block_slider.css" />

<section class="block-slider block-slider--full" id="pillar1">
  <div class="block-slider__wrapper">

    <div class="block-slider__description block-slider__col--text" style="display: none;">
      <div class="pillar-navigation">
        <button class="btn btn--arrow btn-prev js-pillar-prev" aria-label="Previous Slide">
          <svg viewBox="0 0 27 15">
            <use xlink:href="#arrow-left"></use>
          </svg>
        </button>
        <button class="btn btn--arrow btn-next js-pillar-next" aria-label="Next Slide">
          <svg viewBox="0 0 27 15">
            <use xlink:href="#arrow-right"></use>
          </svg>
        </button>
      </div>
    </div>

    <div class="block-slider__media block-slider__col--carousel block-slider__col--carousel--full">
      <div class="pillar-carousel js-pillar-carousel" data-total-slides="<?php echo $total_slides; ?>">

        <?php foreach ($pillar_items as $index => $item): ?>
        <div class="pillar-carousel-card <?php echo $item['active'] ? 'is-active' : ''; ?>"
          data-index="<?php echo $index; ?>">

          <div class="pillar-carousel-card__image-container">
            <div class="pillar-carousel-card__image-bg" style="background-image: url('<?php echo $item['image']; ?>');">
            </div>
          </div>

          <a class="pillar-carousel-card__content-wrapper" href="<?php echo $item['link']; ?>"
            aria-label="Advance to <?php echo $item['title']; ?>">

            <?php render_heading($item['title'], $heading_level, 'pillar-carousel-card__title pillar-carousel-card__title--h4'); ?>
            <p class="pillar-carousel-card__desc"><?php echo $item['desc']; ?></p>

            <div class="pillar-carousel-card__link">
              <div class='pillar-carousel-card__link-text__wrapper'>
                <p class="pillar-carousel-card__link-text">Advanced <?php echo $item['title']; ?></p>
                <span class="arrow-icon">
                  <svg id="arrow-top-right-gradient" viewBox="0 0 24 24">
                    <path class="icon-arrow" fill="currentColor"
                      d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z" />
                  </svg>
                </span>
              </div>
            </div>

          </a>

          <div class="pillar-carousel-card__timebar-container">
            <div class="pillar-carousel-card__timebar js-timebar"></div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</section>

<script type='text/javascript' src="../assets/js/section-block_slider.js"></script>