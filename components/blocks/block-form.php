<?php
/**
 * Universal Reusable Form Component
 * 
 * A config-driven form component that dynamically renders form fields
 * based on the provided configuration array.
 * 
 * @param array $form_config - Array of field configurations
 * @param string $form_id - Unique form identifier (optional)
 * @param string $form_class - Additional CSS classes (optional)
 * @param string $submit_text - Submit button text (default: 'Submit')
 * @param string $cancel_text - Cancel button text (optional, if set shows cancel button)
 * @param bool $enable_choices - Enable Choices.js for select elements (default: false)
 */

// Set defaults
if (!isset($form_config) || !is_array($form_config)) {
    $form_config = [];
}
if (!isset($form_id)) {
    $form_id = 'form-' . uniqid();
}
if (!isset($form_class)) {
    $form_class = '';
}
if (!isset($submit_text)) {
    $submit_text = 'Submit';
}
if (!isset($enable_choices)) {
    $enable_choices = false;
}

// Load Choices.js if needed
if ($enable_choices) {
    echo '<link href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" />';
    echo '<link rel="stylesheet" href="../assets/css/components-custom_select.css" />';
}
?>

<link rel="stylesheet" href="../assets/css/section-block_form.css" />

<form class="block-form <?php echo htmlspecialchars($form_class, ENT_QUOTES, 'UTF-8'); ?>" id="<?php echo htmlspecialchars($form_id, ENT_QUOTES, 'UTF-8'); ?>">
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
        
        // Determine field class based on size
        $field_class = 'form-field';
        if ($size === 'half') {
            $field_class .= ' form-field--half';
        } elseif ($size === 'third') {
            $field_class .= ' form-field--third';
        } else {
            $field_class .= ' form-field--full';
        }
        
        // Add additional classes if specified
        if (isset($field['class'])) {
            $field_class .= ' ' . $field['class'];
        }
      ?>
      
      <div class="<?php echo htmlspecialchars($field_class, ENT_QUOTES, 'UTF-8'); ?>">
        <?php if ($label): ?>
          <label class="form-label"><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></label>
        <?php endif; ?>
        
        <?php if ($type === 'text' || $type === 'email' || $type === 'url' || $type === 'tel' || $type === 'number'): ?>
          <input 
            type="<?php echo htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?>" 
            name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" 
            class="form-input" 
            placeholder="<?php echo htmlspecialchars($placeholder, ENT_QUOTES, 'UTF-8'); ?>"
            value="<?php echo htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); ?>"
            <?php echo $required ? 'required' : ''; ?>
          >
        
        <?php elseif ($type === 'textarea'): ?>
          <textarea 
            name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" 
            class="form-textarea" 
            rows="<?php echo intval($rows); ?>"
            placeholder="<?php echo htmlspecialchars($placeholder, ENT_QUOTES, 'UTF-8'); ?>"
            <?php echo $required ? 'required' : ''; ?>
          ><?php echo htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); ?></textarea>
        
        <?php elseif ($type === 'select'): ?>
          <select 
            name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" 
            class="form-select <?php echo $enable_choices ? 'choices-select' : ''; ?>"
            <?php echo $required ? 'required' : ''; ?>
          >
            <option value="" disabled selected><?php echo htmlspecialchars($placeholder, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php foreach ($options as $opt_value => $opt_label): ?>
              <option value="<?php echo htmlspecialchars($opt_value, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($opt_label, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
          </select>
        
        <?php elseif ($type === 'checkbox'): ?>
          <div class="form-checkbox-wrapper">
            <input 
              type="checkbox" 
              name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" 
              id="<?php echo htmlspecialchars($name . '_' . $form_id, ENT_QUOTES, 'UTF-8'); ?>"
              class="form-checkbox"
              value="1"
              <?php echo $required ? 'required' : ''; ?>
            >
            <label for="<?php echo htmlspecialchars($name . '_' . $form_id, ENT_QUOTES, 'UTF-8'); ?>" class="form-checkbox-label">
              <?php echo htmlspecialchars($placeholder, ENT_QUOTES, 'UTF-8'); ?>
            </label>
          </div>
        
        <?php elseif ($type === 'radio'): ?>
          <div class="form-radio-group">
            <?php foreach ($options as $opt_value => $opt_label): ?>
              <div class="form-radio-wrapper">
                <input 
                  type="radio" 
                  name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" 
                  id="<?php echo htmlspecialchars($name . '_' . $opt_value . '_' . $form_id, ENT_QUOTES, 'UTF-8'); ?>"
                  class="form-radio"
                  value="<?php echo htmlspecialchars($opt_value, ENT_QUOTES, 'UTF-8'); ?>"
                  <?php echo $required ? 'required' : ''; ?>
                >
                <label for="<?php echo htmlspecialchars($name . '_' . $opt_value . '_' . $form_id, ENT_QUOTES, 'UTF-8'); ?>" class="form-radio-label">
                  <?php echo htmlspecialchars($opt_label, ENT_QUOTES, 'UTF-8'); ?>
                </label>
              </div>
            <?php endforeach; ?>
          </div>
        
        <?php elseif ($type === 'file' || $type === 'upload'): ?>
          <div class="form-file-upload">
            <input 
              type="file" 
              name="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" 
              id="<?php echo htmlspecialchars($name . '_' . $form_id, ENT_QUOTES, 'UTF-8'); ?>"
              class="form-file-input" 
              accept="<?php echo htmlspecialchars($accept, ENT_QUOTES, 'UTF-8'); ?>"
              <?php echo $required ? 'required' : ''; ?>
            >
            <label for="<?php echo htmlspecialchars($name . '_' . $form_id, ENT_QUOTES, 'UTF-8'); ?>" class="form-file-label">
              <span class="form-file-text">Choose File</span>
              <span class="form-file-name">No file chosen</span>
            </label>
          </div>
        
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
  
  <div class="form-buttons">
    <?php if (isset($cancel_text) && $cancel_text): ?>
      <button type="button" class="btn btn--text form-cancel"><?php echo htmlspecialchars($cancel_text, ENT_QUOTES, 'UTF-8'); ?></button>
    <?php endif; ?>
    <button type="submit" class="btn btn--gradient form-submit"><?php echo htmlspecialchars($submit_text, ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
</form>

<?php if ($enable_choices): ?>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Initialize Choices.js for all select elements with the choices-select class
  const selectElements = document.querySelectorAll('#<?php echo htmlspecialchars($form_id, ENT_QUOTES, 'UTF-8'); ?> .choices-select');
  selectElements.forEach(function(selectElement) {
    new Choices(selectElement, {
      removeItemButton: false,
      placeholder: true,
      itemSelectText: '',
      searchEnabled: false,
    });
  });
});
</script>
<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('<?php echo htmlspecialchars($form_id, ENT_QUOTES, 'UTF-8'); ?>');
  
  if (form) {
    // File upload functionality
    const fileInputs = form.querySelectorAll('.form-file-input');
    fileInputs.forEach(function(fileInput) {
      const fileNameDisplay = fileInput.parentElement.querySelector('.form-file-name');
      if (fileNameDisplay) {
        fileInput.addEventListener('change', function(e) {
          if (e.target.files.length > 0) {
            fileNameDisplay.textContent = e.target.files[0].name;
          } else {
            fileNameDisplay.textContent = 'No file chosen';
          }
        });
      }
    });
    
    // Cancel button functionality
    const cancelBtn = form.querySelector('.form-cancel');
    if (cancelBtn) {
      cancelBtn.addEventListener('click', function() {
        form.reset();
        // Reset file upload displays
        fileInputs.forEach(function(fileInput) {
          const fileNameDisplay = fileInput.parentElement.querySelector('.form-file-name');
          if (fileNameDisplay) {
            fileNameDisplay.textContent = 'No file chosen';
          }
        });
      });
    }
    
    // Form submission
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      // Form submission logic should be implemented here
      alert('Thank you for your submission! We will get back to you soon.');
      form.reset();
    });
  }
});
</script>
