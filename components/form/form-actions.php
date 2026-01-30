<?php
/**
 * FormActions Component
 * 
 * Reusable form action buttons (Cancel & Submit)
 * 
 * Props:
 * @param string $cancelLabel - Cancel button text - default: 'Cancel'
 * @param string $submitLabel - Submit button text - default: 'Submit'
 */

// Set defaults
$cancelLabel = $cancelLabel ?? 'Cancel';
$submitLabel = $submitLabel ?? 'Submit';
?>

<div class="form-actions">
  <button type="button" class="btn btn-secondary">
    <?php echo htmlspecialchars($cancelLabel, ENT_QUOTES, 'UTF-8'); ?>
  </button>

  <button type="submit" class="btn btn-primary">
    <?php echo htmlspecialchars($submitLabel, ENT_QUOTES, 'UTF-8'); ?>
  </button>
</div>
