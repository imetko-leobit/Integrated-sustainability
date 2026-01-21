<?php
  // Default data if not provided
  if (!isset($slider_imgs)) {
    $slider_imgs = [
      '../assets/img/strengthen.png',
      '../assets/img/sidebar.jpg',
      '../assets/img/image1.jpg',
      '../assets/img/image2.jpg',
      '../assets/img/image3.jpg',
    ];
  }

  if (!isset($sidebar_tags)) {
    $sidebar_tags = [
      [
        'title' => 'equipment type',
        'id' => 1,
        'links' => [
          ['name' => 'Water Treatment', 'link' => '#'],
          ['name' => 'Filtration System', 'link' => '#'],
        ]
      ],
      [
        'title' => 'specifications',
        'id' => 2,
        'links' => [
          ['name' => 'Capacity: 1000L/hr', 'link' => '#'],
          ['name' => 'Power: 5kW', 'link' => '#'],
        ]
      ],
    ];
  }

  if (!isset($sidebar_img)) {
    $sidebar_img = '../assets/img/cta-bg.png';
  }

  if (!isset($sidebar_title)) {
    $sidebar_title = 'request equipment quote';
  }

  if (!isset($sidebar_description)) {
    $sidebar_description = 'Get detailed specifications and pricing for this equipment.';
  }

  if (!isset($sidebar_button_name)) {
    $sidebar_button_name = 'Request Quote';
  }
?>

<link rel="stylesheet" href="../assets/css/section-block_equipment_content.css" />
<link rel="stylesheet" href="../assets/css/components-info_card.css" />
<link rel="stylesheet" href="../assets/css/components-metadata_group.css" />

<section class="block-equipment-content">
  <div class="block-equipment-content__wrapper">
    <div class="equipment-content__left">
      <?php include('../components/elements/equipment-image-slider.php') ?>
    </div>

    <aside class="equipment-content__right">
      <div class="equipment-content__metadata">
        <?php foreach ($sidebar_tags as $group) : ?>
        <div class="metadata-group">
          <h4 class="metadata-group__title"><?php echo $group['title']; ?></h4>
          <div class="metadata-group__links">
            <?php foreach ($group['links'] as $link) : ?>
            <a href="<?php echo $link['link']; ?>" class="metadata-tag"><span><?php echo $link['name']; ?></span></a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="equipment-content__card">
        <?php include('../components/elements/info-card.php') ?>
      </div>
    </aside>
  </div>
</section>
