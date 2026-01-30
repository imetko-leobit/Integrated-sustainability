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

// Build class names
$fieldClass = 'form-field form-select';
if ($error) {
    $fieldClass .= ' is-error';
}
?>

<div class="<?php echo htmlspecialchars($fieldClass, ENT_QUOTES, 'UTF-8'); ?>">
  <label for="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>" class="form-label">
    <?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?><?php echo $required ? '*' : ''; ?>
  </label>

  <select id="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>" name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $required ? 'required' : ''; ?>>
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
