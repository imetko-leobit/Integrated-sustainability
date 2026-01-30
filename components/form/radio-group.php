<?php
/**
 * FormRadioGroup Component
 *
 * Reusable radio button group component
 *
 * Props:
 * @param string $name - Radio group name attribute (required)
 * @param string $label - Group label text (required)
 * @param array $options - Array of options [['value' => 'val', 'label' => 'Label'], ...] (required)
 * @param bool $required - Is field required - default: false
 * @param string $errorMessage - Error message - default: ''
 * @param bool $error - Has error state - default: false
 * @param string $fieldWrapperClass - Additional CSS classes for the field wrapper - default: ''
 */

// Set defaults
$name = $name ?? '';
$label = $label ?? '';
$options = $options ?? [];
$required = $required ?? false;
$errorMessage = $errorMessage ?? '';
$error = $error ?? false;
$fieldWrapperClass = $fieldWrapperClass ?? '';

// Build class names
$fieldClass = 'form-field form-radio-group';
if ($error) {
    $fieldClass .= ' is-error';
}
if ($fieldWrapperClass) {
    $fieldClass .= ' ' . $fieldWrapperClass;
}
?>

<div class="<?php echo htmlspecialchars($fieldClass, ENT_QUOTES, 'UTF-8'); ?>">
  <p class="form-label"><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?><?php echo $required ? '*' : ''; ?></p>

  <div class="form-radio-list">
    <?php foreach ($options as $option): ?>
    <label class="form-radio-item">
      <input type="radio" name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" value="<?php echo htmlspecialchars($option['value'], ENT_QUOTES, 'UTF-8'); ?>" />
      <span><?php echo htmlspecialchars($option['label'], ENT_QUOTES, 'UTF-8'); ?></span>
    </label>
    <?php endforeach; ?>
  </div>

  <?php if ($errorMessage): ?>
  <p class="form-error"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?></p>
  <?php endif; ?>
</div>