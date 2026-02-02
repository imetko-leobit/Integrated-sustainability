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

// Include component styles
if (!defined('FORM_COMMON_CSS_LOADED')) {
  echo '<link rel="stylesheet" href="../assets/css/components-form_common.css" />';
  define('FORM_COMMON_CSS_LOADED', true);
}
if (!defined('FILE_UPLOAD_CSS_LOADED')) {
  echo '<link rel="stylesheet" href="../assets/css/components-file_upload.css" />';
  define('FILE_UPLOAD_CSS_LOADED', true);
}

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

  <button type="button" class="file-upload">
    <div class="file-upload-info">
      <div class="file-upload-dot"></div>
      File size: 10KB - 10MB
    </div>

    <div class="file-upload-info">
      <div class="file-upload-dot"></div>
      File type: PDF, DOC, DOCX, JPG, or PNG
    </div>

    <div class="file-upload-info">
      <span class="file-upload-drag">Drag and drop or</span>

      <span class="file-upload-browse">
        Browse CV
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M2 15.575C1.45 15.575 0.979167 15.3792 0.5875 14.9875C0.195833 14.5958 0 14.125 0 13.575V11.575C0 11.2917 0.0958333 11.0542 0.2875 10.8625C0.479167 10.6708 0.716667 10.575 1 10.575C1.28333 10.575 1.52083 10.6708 1.7125 10.8625C1.90417 11.0542 2 11.2917 2 11.575V13.575H14V11.575C14 11.2917 14.0958 11.0542 14.2875 10.8625C14.4792 10.6708 14.7167 10.575 15 10.575C15.2833 10.575 15.5208 10.6708 15.7125 10.8625C15.9042 11.0542 16 11.2917 16 11.575V13.575C16 14.125 15.8042 14.5958 15.4125 14.9875C15.0208 15.3792 14.55 15.575 14 15.575H2ZM7 3.425L5.125 5.3C4.925 5.5 4.6875 5.59583 4.4125 5.5875C4.1375 5.57917 3.9 5.475 3.7 5.275C3.51667 5.075 3.42083 4.84167 3.4125 4.575C3.40417 4.30833 3.5 4.075 3.7 3.875L7.3 0.275C7.4 0.175 7.50833 0.104167 7.625 0.0625C7.74167 0.0208333 7.86667 0 8 0C8.13333 0 8.25833 0.0208333 8.375 0.0625C8.49167 0.104167 8.6 0.175 8.7 0.275L12.3 3.875C12.5 4.075 12.5958 4.30833 12.5875 4.575C12.5792 4.84167 12.4833 5.075 12.3 5.275C12.1 5.475 11.8625 5.57917 11.5875 5.5875C11.3125 5.59583 11.075 5.5 10.875 5.3L9 3.425V10.575C9 10.8583 8.90417 11.0958 8.7125 11.2875C8.52083 11.4792 8.28333 11.575 8 11.575C7.71667 11.575 7.47917 11.4792 7.2875 11.2875C7.09583 11.0958 7 10.8583 7 10.575V3.425Z" fill="#818FFE"/>
        </svg>
      </span>
    </div>
  </button>

  <span class="file-name"><?php echo htmlspecialchars($filename, ENT_QUOTES, 'UTF-8'); ?></span>

  <?php if ($errorMessage): ?>
  <p class="form-error"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?></p>
  <?php endif; ?>
</div>