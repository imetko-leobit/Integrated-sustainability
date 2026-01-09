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

$image_class = $image_class ?? '';
?>

<img src="<?php echo htmlspecialchars($image_src, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($image_alt, ENT_QUOTES, 'UTF-8'); ?>" <?php if ($image_class): ?>class="<?php echo htmlspecialchars($image_class, ENT_QUOTES, 'UTF-8'); ?>"<?php endif; ?> />
