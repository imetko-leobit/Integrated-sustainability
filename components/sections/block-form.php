<?php
/**
 * Universal Reusable Form Content Component
 *
 * A config-driven form component that dynamically renders form fields
 * based on the provided configuration array.
 *
 * NOTE: This component only renders form content elements (inputs, selects, textareas, etc.)
 * The parent component is responsible for providing:
 * - The <form> wrapper tag with appropriate class and id
 * - Submit/Cancel buttons
 * - CSS stylesheets
 * - JavaScript functionality (Choices.js, file uploads, form submission, etc.)
 *
 * @param array $form_config - Array of field configurations
 * @param string $form_id - Unique form identifier (optional, used for generating unique IDs)
 * @param bool $enable_choices - Enable Choices.js class for select elements (default: false)
 */

// Set defaults
if (!isset($form_config) || !is_array($form_config)) {
    $form_config = [];
}
if (!isset($form_id)) {
    $form_id = 'form-' . uniqid();
}
if (!isset($enable_choices)) {
    $enable_choices = false;
}
?>

<link rel="stylesheet" href="../assets/css/section-block_form.css" />
<link rel="stylesheet" href="../assets/css/components-form_common.css" />
<link rel="stylesheet" href="../assets/css/components-input.css" />
<link rel="stylesheet" href="../assets/css/components-select.css" />
<link rel="stylesheet" href="../assets/css/components-textarea.css" />
<link rel="stylesheet" href="../assets/css/components-radio.css" />
<link rel="stylesheet" href="../assets/css/components-checkbox.css" />
<link rel="stylesheet" href="../assets/css/components-file_upload.css" />
<link rel="stylesheet" href="../assets/css/components-form_layout.css" />

<div class="form-row">
  <?php foreach ($form_config as $field): ?>
    <?php
      // Extract field configuration
      $type = $field['type'] ?? 'text';
      $label = $field['label'] ?? '';
      $name = $field['name'] ?? strtolower(str_replace(' ', '_', $label));
      $placeholder = $field['placeholder'] ?? $label;
      $required = $field['required'] ?? false;
      $size = $field['size'] ?? 'full';
      $options = $field['options'] ?? [];
      $rows = $field['rows'] ?? 4;
      $accept = $field['accept'] ?? '.pdf,.doc,.docx';
      $value = $field['value'] ?? '';

      // Determine field wrapper class based on size
      $field_wrapper_class = '';
      if ($size === 'half') {
          $field_wrapper_class = 'form-field--half';
      } elseif ($size === 'third') {
          $field_wrapper_class = 'form-field--third';
      } else {
          $field_wrapper_class = 'form-field--full';
      }

      // Add additional classes if specified
      if (isset($field['class'])) {
          $field_wrapper_class .= ' ' . $field['class'];
      }

      // Generate unique field ID
      $field_id = $name . '_' . $form_id;
    ?>

    <?php if ($type === 'text' || $type === 'email' || $type === 'url' || $type === 'tel' || $type === 'number'): ?>
      <?php
        $id = $field_id;
        $fieldWrapperClass = $field_wrapper_class;
        include(__DIR__ . '/../form/input.php');
      ?>

    <?php elseif ($type === 'textarea'): ?>
      <?php
        $id = $field_id;
        $fieldWrapperClass = $field_wrapper_class;
        include(__DIR__ . '/../form/textarea.php');
      ?>

    <?php elseif ($type === 'select'): ?>
      <?php
        $id = $field_id;
        // Convert associative array to expected format for component
        $component_options = [];
        foreach ($options as $opt_value => $opt_label) {
            $component_options[] = [
                'value' => $opt_value,
                'label' => $opt_label
            ];
        }
        $options = $component_options;
        $fieldWrapperClass = $field_wrapper_class;
        include(__DIR__ . '/../form/select.php');
      ?>

    <?php elseif ($type === 'radio'): ?>
      <?php
        // Convert associative array to expected format for component
        $component_options = [];
        foreach ($options as $opt_value => $opt_label) {
            $component_options[] = [
                'value' => $opt_value,
                'label' => $opt_label
            ];
        }
        $options = $component_options;
        $fieldWrapperClass = $field_wrapper_class;
        include(__DIR__ . '/../form/radio-group.php');
      ?>

    <?php elseif ($type === 'file' || $type === 'upload'): ?>
      <?php
        $id = $field_id;
        $filename = 'No file chosen';
        $fieldWrapperClass = $field_wrapper_class;
        include(__DIR__ . '/../form/file-upload.php');
      ?>

    <?php elseif ($type === 'checkbox'): ?>
      <div class="form-field form-checkbox <?php echo htmlspecialchars($field_wrapper_class, ENT_QUOTES, 'UTF-8'); ?>">
        <div class="form-checkbox-wrapper">
          <input
            type="checkbox"
            name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>"
            id="<?php echo htmlspecialchars($field_id, ENT_QUOTES, 'UTF-8'); ?>"
            class="form-checkbox-input"
            value="1"
            <?php echo $required ? 'required' : ''; ?>
          >
          <label for="<?php echo htmlspecialchars($field_id, ENT_QUOTES, 'UTF-8'); ?>" class="form-checkbox-label">
            <?php echo htmlspecialchars($placeholder, ENT_QUOTES, 'UTF-8'); ?>
          </label>
        </div>
      </div>

    <?php endif; ?>
  <?php endforeach; ?>
</div>