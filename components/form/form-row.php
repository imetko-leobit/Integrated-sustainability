<?php
/**
 * FormRow Component
 * 
 * Layout component for form fields in a responsive grid
 * Displays 2 columns on desktop, 1 column on mobile
 * 
 * Props:
 * @param string $slot - Content to be rendered inside the row (child components)
 */

// This component wraps child elements in a responsive grid layout
// Use it to group form fields that should appear side-by-side on larger screens
?>

<div class="form-row">
  <?php echo $slot ?? ''; ?>
</div>
