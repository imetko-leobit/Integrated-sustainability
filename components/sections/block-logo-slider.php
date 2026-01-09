<?php

$logos = [
    '../assets/img/logoGoldcorp.png',
    '../assets/img/logoCunuma.png',
    '../assets/img/logoSkeena.png',
    '../assets/img/logoOsisko.png',
    '../assets/img/logoTeck.png',
    '../assets/img/logoGoldcorp.png',
    '../assets/img/logoCunuma.png',
    '../assets/img/logoSkeena.png',
    '../assets/img/logoOsisko.png',
    '../assets/img/logoTeck.png',
    '../assets/img/logoGoldcorp.png',
    '../assets/img/logoCunuma.png',
    '../assets/img/logoSkeena.png',
    '../assets/img/logoOsisko.png',
    '../assets/img/logoTeck.png',
    '../assets/img/logoGoldcorp.png',
    '../assets/img/logoCunuma.png',
    '../assets/img/logoSkeena.png',
    '../assets/img/logoOsisko.png',
    '../assets/img/logoTeck.png',
];

?>

<link rel="stylesheet" href="../assets/css/section-block_logo_slider.css" />

<section class="block-logo-slider">
    <div class="block-logo-slider__wrapper">

        <div class="swiper-container js-logo-swiper-container">
            <div class="swiper-wrapper">
            
                <?php foreach ($logos as $logo_url): ?>
                    <div class="swiper-slide logo-carousel__item">
                        <img src="<?php echo $logo_url; ?>" alt="Partner logo" class="logo-carousel__img" />
                    </div>
                <?php endforeach; ?>
            
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type='text/javascript' src="../assets/js/section-block_logo_slider.js"></script>