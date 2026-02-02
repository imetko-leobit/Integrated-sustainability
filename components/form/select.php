<?php
/**
 * FormSelect Component
 *
 * Reusable select dropdown component
 *
 * Props:
 * @param string $id - Select ID attribute (required)
 * @param string $name - Select name attribute (required)
 * @param string $label - Label text (required)
 * @param array $options - Array of options [['value' => 'val', 'label' => 'Label'], ...] (required)
 * @param string $value - Selected value - default: ''
 * @param string $placeholder - Placeholder text - default: 'Select an option'
 * @param bool $required - Is field required - default: false
 * @param string $hint - Hint text - default: ''
 * @param string $errorMessage - Error message - default: ''
 * @param bool $error - Has error state - default: false
 * @param string $fieldWrapperClass - Additional CSS classes for the field wrapper - default: ''
 * @param string $selectClass - Additional CSS classes for the select element - default: ''
 * @param array $dataAttributes - Additional data attributes for the select element - default: []
 */

// Set defaults
$id = $id ?? '';
$name = $name ?? '';
$label = $label ?? '';
$options = $options ?? [];
$value = $value ?? '';
$placeholder = $placeholder ?? 'Select an option';
$required = $required ?? false;
$hint = $hint ?? '';
$errorMessage = $errorMessage ?? '';
$error = $error ?? false;
$fieldWrapperClass = $fieldWrapperClass ?? '';
$selectClass = $selectClass ?? '';
$dataAttributes = $dataAttributes ?? [];

// Build class names
$fieldClass = 'form-field';
if ($error) {
    $fieldClass .= ' is-error';
}
if ($fieldWrapperClass) {
    $fieldClass .= ' ' . $fieldWrapperClass;
}

$selectClassFinal = 'form-select';
if ($selectClass) {
    $selectClassFinal .= ' ' . $selectClass;
}
?>

<div class="<?php echo htmlspecialchars($fieldClass, ENT_QUOTES, 'UTF-8'); ?>">
  <label for="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>" class="form-label">
    <?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
    <span class="form-required"><?php echo $required ? '*' : ''; ?></span>
  </label>

  <select
    class="<?php echo htmlspecialchars($selectClassFinal, ENT_QUOTES, 'UTF-8'); ?>"
    id="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>"
    <?php echo $required ? 'required' : ''; ?>
    <?php foreach ($dataAttributes as $attrName => $attrValue): ?>
      data-<?php echo htmlspecialchars($attrName, ENT_QUOTES, 'UTF-8'); ?>="<?php echo htmlspecialchars($attrValue, ENT_QUOTES, 'UTF-8'); ?>"
    <?php endforeach; ?>
  >
    <option value="" disabled selected><?php echo htmlspecialchars($placeholder, ENT_QUOTES, 'UTF-8'); ?></option>

    <?php foreach ($options as $option): ?>
      <option value="<?php echo htmlspecialchars($option['value'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($option['label'], ENT_QUOTES, 'UTF-8'); ?></option>
    <?php endforeach; ?>
  </select>

  <?php if ($hint): ?>
  <p class="form-hint"><?php echo htmlspecialchars($hint, ENT_QUOTES, 'UTF-8'); ?></p>
  <?php endif; ?>

  <?php if ($errorMessage): ?>
  <p class="form-error"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?></p>
  <?php endif; ?>
</div>