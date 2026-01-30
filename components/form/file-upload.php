<?php
/**
 * FormFileUpload Component
 *
 * Reusable file upload component
 *
 * Props:
 * @param string $id - Input ID attribute (required)
 * @param string $name - Input name attribute (required)
 * @param string $label - Label text (required)
 * @param bool $required - Is field required - default: false
 * @param string $filename - Displayed filename - default: 'No file chosen'
 * @param string $errorMessage - Error message - default: ''
 * @param bool $error - Has error state - default: false
 * @param string $fieldWrapperClass - Additional CSS classes for the field wrapper - default: ''
 */

// Set defaults
$id = $id ?? '';
$name = $name ?? '';
$label = $label ?? '';
$required = $required ?? false;
$filename = $filename ?? 'No file chosen';
$errorMessage = $errorMessage ?? '';
$error = $error ?? false;
$fieldWrapperClass = $fieldWrapperClass ?? '';

// Build class names
$fieldClass = 'form-field form-file';
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

  <input id="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>" name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" type="file" hidden />

  <button type="button" class="file-upload-btn">
    Upload file
  </button>

  <span class="file-name"><?php echo htmlspecialchars($filename, ENT_QUOTES, 'UTF-8'); ?></span>

  <?php if ($errorMessage): ?>
  <p class="form-error"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?></p>
  <?php endif; ?>
</div>