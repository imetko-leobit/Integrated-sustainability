<?php
/**
 * FormSection Component
 * 
 * Layout component for grouping related form fields with a title and divider
 * 
 * Props:
 * @param string $title - Section title text (required)
 * @param string $slot - Content to be rendered inside the section (child components)
 */

// Set defaults
$title = $title ?? '';
?>

<section class="form-section">
  <h3 class="form-section-title"><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h3>
  <div class="form-section-divider"></div>

  <div class="form-section-content">
    <?php echo $slot ?? ''; ?>
  </div>
</section>
