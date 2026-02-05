<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="../assets/css/components-post_card.css" />
<link rel="stylesheet" href="../assets/css/section-block_cards_slider.css" />

<?php
// Default heading levels
$heading_level = $heading_level ?? 2;
$card_title_level = $card_title_level ?? 3;
include_once(__DIR__ . '/../helpers/heading.php');

$projects_data = [
    [
        'id' => 1812,
        'title' => 'Site-Wide Water Treatment Strategy and Best Achievable Technology Assessment',
        'description' => 'A comprehensive assessment of water treatment needs across the site, focusing on implementing the best available technologies to meet regulatory compliance and sustainability goals.',
        'link' => '#',
        'image' => 'https://img.freepik.com/premium-photo/waste-water-treatment-ponds-from-industrial-plants_281691-294.jpg',
    ],
    [
        'id' => 1811,
        'title' => 'Rare Earth Element Biological Water Treatment Bench-Scale Trials',
        'description' => 'Pilot trials conducted to evaluate the efficacy of biological methods for removing rare earth elements from process wastewater, optimizing microbial cultures for targeted removal.',
        'link' => '#',
        'image' => 'https://e0.pxfuel.com/wallpapers/252/868/desktop-wallpaper-cargo-ship-iphone-6.jpg',
    ],
    [
        'id' => 1810,
        'title' => 'Biochar Adsorption Testing and Ammonia and Selenium Removal Trials',
        'description' => 'Testing the use of biochar as an adsorbent for complex water contaminants, specifically focusing on its effectiveness for ammonia and selenium removal in mine effluent.',
        'link' => '#',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_SwmZu1t5AW2DxK0oL1Qg0GaNeFrCOrFjEA&s',
    ],
    [
        'id' => 1809,
        'title' => 'Gravel Bed Bioreactor Pilot and Technical Advisory Committee Support',
        'description' => 'Providing technical guidance and pilot study results for a Gravel Bed Bioreactor implementation, supporting the project’s advisory committee with expert data analysis.',
        'link' => '#',
        'image' => 'https://i.pinimg.com/736x/c8/fd/e4/c8fde4c75a8dfe529d1b5fbe0365048e.jpg',
    ],
    [
        'id' => 1808,
        'title' => 'JAIR-MA Permit Application Support and Water Treatment Advisory',
        'description' => 'Assisting the client with regulatory permit applications (JAIR-MA) and providing ongoing expert advisory on water treatment strategies and compliance.',
        'link' => '#',
        'image' => 'https://t3.ftcdn.net/jpg/00/88/56/06/360_F_88560614_jLxW5ZnB48ygLeR5kc5YIz4UCyJLfdtE.jpg',
    ],
    [
        'id' => 1807,
        'title' => 'Site-Wide Water Treatment Strategy and Best Achievable Technology Assessment',
        'description' => 'A comprehensive assessment of water treatment needs across the site, focusing on implementing the best available technologies to meet regulatory compliance and sustainability goals.',
        'link' => '#',
        'image' => 'https://img.freepik.com/premium-photo/waste-water-treatment-ponds-from-industrial-plants_281691-294.jpg',
    ],
    [
        'id' => 1806,
        'title' => 'Rare Earth Element Biological Water Treatment Bench-Scale Trials',
        'description' => 'Pilot trials conducted to evaluate the efficacy of biological methods for removing rare earth elements from process wastewater, optimizing microbial cultures for targeted removal.',
        'link' => '#',
        'image' => 'https://t3.ftcdn.net/jpg/00/88/56/06/360_F_88560614_jLxW5ZnB48ygLeR5kc5YIz4UCyJLfdtE.jpg',
    ]
];

?>

<section class="cards-slider">

    <div class="swiper-container js-projects-cards-slider">
        <div class="heading">
            <?php render_heading($section_title, $heading_level, 'title title--h1', [], true); ?>

            <div class="cards-navigation">
                <button class="btn btn--arrow js-button-prev" aria-label="Previous Project">
                    <svg viewBox="0 0 27 15">
                        <use xlink:href="#arrow-left"></use>
                    </svg>
                </button>
                <button class="btn btn--arrow js-button-next" aria-label="Next Project">
                    <svg viewBox="0 0 27 15">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </button>
            </div>

            <div class="divider"></div>
        </div>

        <div class="swiper-wrapper">
            <?php foreach ($projects_data as $project) : ?>
                <div class="swiper-slide">
                    <article class="post-card" data-post-id="<?php echo $project['id']; ?>">
                        <a href="<?php echo $project['link']; ?>" class="post-card__link">
                            <?php if (!empty($project['image'])) : ?>
                                <div class="post-card__image-wrapper">
                                    <img src="<?php echo $project['image']; ?>"
                                        alt="<?php echo $project['title']; ?>"
                                        class="post-card__image"/>
                                </div>
                            <?php endif; ?>
                            <div class="post-card__content">
                                <?php render_heading($project['title'], $card_title_level, 'post-card__title'); ?>
                                <p class="post-card__description">
                                    <?php echo $project['description']; ?>
                                </p>
                            </div>
                            <div class="post-card__arrow">
                                <p class="arrow-text">Learn more</p>
                                <span class="arrow-icon">
                                    <svg id="arrow-top-right-gradient" viewBox="0 0 24 24">
                                        <path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </article>
              </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type='text/javascript' src="../assets/js/section-block_cards_slider.js"></script>