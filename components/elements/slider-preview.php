<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="../assets/css/components-slider_preview.css" />

<section class="slider-preview">
  <div class="swiper js-main-slider-preview">
    <div class="swiper-wrapper">
      <?php foreach ($slider_imgs as $img) : ?>
      <div class="swiper-slide">
        <img src="<?php echo $img; ?>" alt="">
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="thumbs-wrapper">
    <div class="swiper js-thumbs-slider-preview">
      <div class="swiper-wrapper">
        <?php foreach ($slider_imgs as $img) : ?>
        <div class="swiper-slide">
          <img src="<?php echo $img; ?>" alt="">
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="cards-navigation">
      <button class="btn btn--arrow js-projects-prev" aria-label="Previous Project">
        <svg viewBox="0 0 27 15">
          <use xlink:href="#arrow-right"></use>
        </svg>
      </button>
      <button class="btn btn--arrow btn-next js-projects-next" aria-label="Next Project">
        <svg viewBox="0 0 27 15">
          <use xlink:href="#arrow-left"></use>
        </svg>
      </button>
    </div>
  </div>
</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type='text/javascript' src="../assets/js/components-slider_preview.js"></script>