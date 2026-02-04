<?php
// Передаємо параметр, наприклад $is_insight = true/false
$accordion_class = 'accordion js-accordion-container';
if (!empty($is_insight) && $is_insight) {
    $accordion_class .= ' insight-accordion';
}
// Default heading level to 3 if not provided
$heading_level = $heading_level ?? 3;
include_once(__DIR__ . '/../helpers/heading.php');
?>

<link rel="stylesheet" href="../assets/css/components-accordion.css" />
<link rel="stylesheet" href="../assets/css/components-gradient_link.css" />

<div class="<?php echo $accordion_class; ?>">
  <?php foreach ($accordion_items as $index => $item):
        $is_open = $item['initial_open'] ? 'is-open' : '';
  ?>
  <div class="accordion-item <?php echo $is_open; ?>" data-index="<?php echo $index; ?>">

    <div class="accordion-item__header js-accordion-trigger">
      <span class="accordion-item__icon">
        <span class="icon-plus">
          <svg>
            <use xlink:href="#plus"></use>
          </svg>
        </span>
        <span class="icon-minus">
          <svg>
            <use xlink:href="#minus"></use>
          </svg>
        </span>
      </span>
      <?php render_heading($item['title'], $heading_level, 'accordion-item__title accordion-item__title--h5'); ?>
    </div>

    <div class="accordion-item__content">
      <?php if (!empty($item['desc'])): ?>
        <p class="accordion-item__desc"><?php echo $item['desc']; ?></p>
      <?php endif; ?>

      <?php if (!empty($item['button'])): ?>
        <div class="gradient-link gradient-link--large">
          <a href="<?= htmlspecialchars($item['button']['button_link']) ?>"
             aria-label="<?= htmlspecialchars($item['button']['button_name']) ?>">
            <p class="gradient-link__text"><?= htmlspecialchars($item['button']['button_name']) ?></p>
            <span class="arrow-icon">
              <svg id="arrow-top-right-gradient" viewBox="0 0 24 24">
                <path class="icon-arrow" fill="currentColor"
                      d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z" />
              </svg>
            </span>
          </a>
        </div>
      <?php endif; ?>

      <?php if (!empty($item['list']) && is_array($item['list'])): ?>
        <ul class="accordion-item__list">
          <?php foreach ($item['list'] as $list_item): ?>
            <li><?php echo $list_item; ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

    <div class="accordion-item__divider"></div>

  </div>
  <?php endforeach; ?>
</div>
