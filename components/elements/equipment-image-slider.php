<!-- Equipment Image Slider Component -->
<link rel="stylesheet" href="../assets/libs/swiper/swiper.min.css">
<link rel="stylesheet" href="../assets/css/components-equipment_image_slider.css" />

<div class="equipment-image-slider">
  <div class="equipment-image-slider__main">
    <div class="swiper js-equipment-main-slider">
      <div class="swiper-wrapper">
        <?php foreach ($slider_imgs as $img) : ?>
        <div class="swiper-slide">
          <img src="<?php echo $img; ?>" alt="Equipment Image">
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="equipment-image-slider__thumbnails">
    <div class="swiper js-equipment-thumbs-slider">
      <div class="swiper-wrapper">
        <?php foreach ($slider_imgs as $img) : ?>
        <div class="swiper-slide">
          <img src="<?php echo $img; ?>" alt="Equipment Thumbnail">
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="equipment-image-slider__navigation">
      <button class="btn btn--arrow js-equipment-prev" aria-label="Previous Image">
        <svg viewBox="0 0 27 15">
          <use xlink:href="#arrow-right"></use>
        </svg>
      </button>
      <button class="btn btn--arrow btn-next js-equipment-next" aria-label="Next Image">
        <svg viewBox="0 0 27 15">
          <use xlink:href="#arrow-left"></use>
        </svg>
      </button>
    </div>
  </div>
</div>

<script src="../assets/libs/swiper/swiper.min.js"></script>
<script type='text/javascript' src="../assets/js/components-equipment_image_slider.js"></script>
