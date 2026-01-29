<?php
/**
 * Reusable Image Component
 *
 * Accepts the following parameters:
 * - $image_src: Image source path (required)
 * - $image_alt: Alt text for the image (required)
 * - $image_class: Additional CSS classes (optional, defaults to empty string)
 *
 * Example usage:
 *   $image_src = "../assets/img/example.png";
 *   $image_alt = "Example image description";
 *   $image_class = "custom-class"; // optional
 *   include('components/elements/component-image.php');
 */

// Validate required parameters
if (!isset($image_src) || !isset($image_alt)) {
    trigger_error('component-image.php requires $image_src and $image_alt parameters', E_USER_WARNING);
    return;
}

$image_class = $image_class ?? '';
?>

<link rel="stylesheet" href="../assets/css/components-image_card.css" />

<div class="image-card <?php echo htmlspecialchars($image_class, ENT_QUOTES, 'UTF-8'); ?>">
  <div class="image-card-container">
    <img src="<?php echo htmlspecialchars($image_src, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($image_alt, ENT_QUOTES, 'UTF-8'); ?>" />
  </div>
</div>