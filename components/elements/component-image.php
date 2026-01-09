<?php
/**
 * Reusable Image Component
 * 
 * Accepts the following parameters:
 * - $image_src: Image source path (required)
 * - $image_alt: Alt text for the image (required)
 * - $image_class: Additional CSS classes (optional)
 */

$image_class = isset($image_class) ? $image_class : '';
?>

<img src="<?php echo $image_src; ?>" alt="<?php echo $image_alt; ?>" <?php if ($image_class): ?>class="<?php echo $image_class; ?>"<?php endif; ?> />
