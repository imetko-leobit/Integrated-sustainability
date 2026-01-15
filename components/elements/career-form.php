<?php
/**
 * FormAssembly Embedded Form Component
 * 
 * This component embeds a FormAssembly form using the recommended iframe method.
 * The form URL and dimensions can be configured via variables passed to this component.
 * 
 * Configuration variables:
 * - $formassembly_form_url: The full URL to your FormAssembly form (required)
 * - $formassembly_form_height: Initial iframe height in pixels (default: 800)
 * - $formassembly_form_width: Iframe width, can be pixels or percentage (default: 100%)
 */

// Default configuration
if (!isset($formassembly_form_url)) {
    // TODO: Replace with your actual FormAssembly form URL
    // Example: $formassembly_form_url = "https://YOUR_DOMAIN.tfaforms.net/FORM_ID";
    $formassembly_form_url = "https://example.tfaforms.net/12345";
}

if (!isset($formassembly_form_height)) {
    $formassembly_form_height = "800";
}

if (!isset($formassembly_form_width)) {
    $formassembly_form_width = "100%";
}

// Extract domain from form URL for the resize helper script
$parsed_url = parse_url($formassembly_form_url);
$formassembly_domain = isset($parsed_url['scheme']) && isset($parsed_url['host']) 
    ? $parsed_url['scheme'] . '://' . $parsed_url['host'] 
    : '';
?>

<link rel="stylesheet" href="../assets/css/components-career_form.css" />

<!-- FormAssembly Form Container -->
<div class="career-form career-form--formassembly" id="formassemblyFormContainer">
  <iframe 
    src="<?php echo htmlspecialchars($formassembly_form_url, ENT_QUOTES, 'UTF-8'); ?>" 
    height="<?php echo htmlspecialchars($formassembly_form_height, ENT_QUOTES, 'UTF-8'); ?>" 
    width="<?php echo htmlspecialchars($formassembly_form_width, ENT_QUOTES, 'UTF-8'); ?>" 
    frameborder="0"
    style="width: <?php echo htmlspecialchars($formassembly_form_width, ENT_QUOTES, 'UTF-8'); ?>; border: none;"
    title="Career Application Form">
  </iframe>
</div>

<?php if ($formassembly_domain): ?>
<!-- FormAssembly Resize Helper Script - loads only once per page -->
<script>
  // Only load the FormAssembly resize helper if not already loaded
  if (!window.formAssemblyResizeHelperLoaded) {
    window.formAssemblyResizeHelperLoaded = true;
    
    var script = document.createElement('script');
    script.src = '<?php echo htmlspecialchars($formassembly_domain, ENT_QUOTES, 'UTF-8'); ?>/js/iframe_resize_helper.js';
    script.async = true;
    document.body.appendChild(script);
  }
</script>
<?php endif; ?>