<?php
/**
 * Equipment Card Component
 *
 * Displays an equipment item with image and title overlay.
 *
 * Required parameters:
 * - $item_title: Equipment title (required)
 * - $item_image: Image source path (required)
 * - $item_url: Link URL (optional)
 *
 * Example usage:
 *   $item_title = "Equipment Name";
 *   $item_image = "../assets/img/equipment-1.jpg";
 *   $item_url = "#equipment-1";
 *   include('components/elements/equipment-card.php');
 */

// Validate required parameters
if (!isset($item_title) && !isset($item_image)) {
    trigger_error('equipment-card.php requires both $item_title and $item_image parameters', E_USER_WARNING);
    return;
} elseif (!isset($item_title)) {
    trigger_error('equipment-card.php requires $item_title parameter', E_USER_WARNING);
    return;
} elseif (!isset($item_image)) {
    trigger_error('equipment-card.php requires $item_image parameter', E_USER_WARNING);
    return;
}

$item_url = $item_url ?? '#';
?>

<link rel="stylesheet" href="../assets/css/components-equipment_card.css" />

<a href="<?php echo htmlspecialchars($item_url, ENT_QUOTES, 'UTF-8'); ?>" class="equipment-card">
  <div class="equipment-card__image">
    <img src="<?php echo htmlspecialchars($item_image, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($item_title, ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" />
    <div class="equipment-card__overlay">
      <div class="equipment-card__overlay-top"></div>
      <div class="equipment-card__overlay-bottom">
        <p class="equipment-card__title"><?php echo htmlspecialchars($item_title, ENT_QUOTES, 'UTF-8'); ?></p>
      </div>
    </div>
  </div>
</a>