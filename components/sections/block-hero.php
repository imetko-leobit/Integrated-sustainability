<link rel="stylesheet" href="../assets/css/section-block_hero.css" />

<section class="block-hero">
  <div class="block-hero__bg">
    <img src=<?php echo $hero_img; ?> alt="Mountains Landscape" loading="eager" fetchpriority="high">
  </div>
  <div class="block-hero__content">
    <div class="heading">
      <h1 class="title title--h0">
        <?php echo $hero_title; ?>
      </h1>
    </div>

    <?php if (!empty($hero_description) || !empty($hero_description2)) {?>
      <div class="block-hero__descriptions">
        <?php if (!empty($hero_description)) {?>
          <div class="block-hero__description">
            <p><?php echo $hero_description; ?></p>
          </div>
          <?php }?>

          <?php if (!empty($hero_description2)) {?>
          <div class="block-hero__description">
            <p><?php echo $hero_description2; ?></p>
          </div>
        <?php }?>
      </div>
    <?php }?>

    <?php if (!empty($hero_button_name)) {?>
    <div class="block-hero__actions">
      <button class="btn btn--gradient"><?php echo $hero_button_name; ?></button>
      <?php if ($hero_link_name) {?>
      <a href="#" class="link link--text" aria-label="Explore our Industry section"><?php echo $hero_link_name; ?></a>
      <?php }?>
      <?php if (!empty($hero_info)) {?>
      <p class="block-hero__info"><?php echo $hero_info; ?></p>
      <?php }?>
    </div>
    <?php }?>
  </div>
</section>