<?php
/**
 * FormInput Component
 *
 * Reusable input component for text, email, phone, number, url, tel fields
 *
 * Props:
 * @param string $id - Input ID attribute (required)
 * @param string $name - Input name attribute (required)
 * @param string $label - Label text (required)
 * @param string $type - Input type (text, email, tel, number, url) - default: text
 * @param string $value - Input value - default: ''
 * @param string $placeholder - Placeholder text - default: ''
 * @param bool $required - Is field required - default: false
 * @param string $hint - Hint text - default: ''
 * @param string $errorMessage - Error message - default: ''
 * @param bool $error - Has error state - default: false
 * @param string $fieldWrapperClass - Additional CSS classes for the field wrapper - default: ''
 */

// Set defaults
$id = $id ?? '';
$name = $name ?? '';
$label = $label ?? '';
$type = $type ?? 'text';
$value = $value ?? '';
$placeholder = $placeholder ?? '';
$required = $required ?? false;
$hint = $hint ?? '';
$errorMessage = $errorMessage ?? '';
$error = $error ?? false;
$fieldWrapperClass = $fieldWrapperClass ?? '';

// Build class names
$fieldClass = 'form-field';
if ($error) {
    $fieldClass .= ' is-error';
}
if ($fieldWrapperClass) {
    $fieldClass .= ' ' . $fieldWrapperClass;
}
?>

<div class="<?php echo htmlspecialchars($fieldClass, ENT_QUOTES, 'UTF-8'); ?>">
  <label for="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>" class="form-label">
    <?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
    <span class="form-required"><?php echo $required ? '*' : ''; ?></span>
  </label>

  <input
    class="form-input"
    id="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
    name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>"
    type="<?php echo htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?>"
    value="<?php echo htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); ?>"
    placeholder="<?php echo htmlspecialchars($placeholder, ENT_QUOTES, 'UTF-8'); ?>"
    <?php echo $required ? 'required' : ''; ?>
  />

  <?php if ($hint): ?>
  <p class="form-hint"><?php echo htmlspecialchars($hint, ENT_QUOTES, 'UTF-8'); ?></p>
  <?php endif; ?>

  <?php if ($errorMessage): ?>
  <p class="form-error"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?></p>
  <?php endif; ?>
</div>