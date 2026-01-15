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
    // IMPORTANT: Replace with your actual FormAssembly form URL
    // Example: $formassembly_form_url = "https://YOUR_DOMAIN.tfaforms.net/FORM_ID";
    $formassembly_form_url = "REPLACE_WITH_YOUR_FORMASSEMBLY_URL";
}

if (!isset($formassembly_form_height)) {
    $formassembly_form_height = "800";
}

if (!isset($formassembly_form_width)) {
    $formassembly_form_width = "100%";
}

// Extract domain from form URL for the resize helper script
$formassembly_domain = '';
if ($formassembly_form_url !== 'REPLACE_WITH_YOUR_FORMASSEMBLY_URL') {
    $parsed_url = parse_url($formassembly_form_url);
    if ($parsed_url !== false && isset($parsed_url['scheme']) && isset($parsed_url['host'])) {
        // Basic validation: Ensure it's a valid HTTPS URL from a FormAssembly domain
        // FormAssembly uses *.tfaforms.net domains
        if ($parsed_url['scheme'] === 'https' && 
            (strpos($parsed_url['host'], 'tfaforms.net') !== false || 
             strpos($parsed_url['host'], 'formassembly.com') !== false)) {
            $formassembly_domain = $parsed_url['scheme'] . '://' . $parsed_url['host'];
        }
    }
}
?>

<link rel="stylesheet" href="../assets/css/components-career_form.css" />

<!-- FormAssembly Form Container -->
<div class="career-form career-form--formassembly" id="formassemblyFormContainer">
  <?php if ($formassembly_form_url === 'REPLACE_WITH_YOUR_FORMASSEMBLY_URL'): ?>
    <!-- Placeholder message when FormAssembly URL is not configured -->
    <div style="padding: 80px 40px; text-align: center; background: rgba(255, 255, 255, 0.05); border: 2px dashed rgba(255, 255, 255, 0.3); min-height: 400px; display: flex; align-items: center; justify-content: center;">
      <div>
        <h3 style="color: #fff; margin-bottom: 16px;">FormAssembly Form Not Configured</h3>
        <p style="color: #ccc; margin-bottom: 24px;">Please update the FormAssembly form URL in <code style="background: rgba(0,0,0,0.3); padding: 4px 8px; border-radius: 4px;">pages/career-vacancy.php</code></p>
        <p style="color: #999; font-size: 14px;">See <strong>FORMASSEMBLY_INTEGRATION.md</strong> for configuration instructions.</p>
      </div>
    </div>
  <?php else: ?>
    <iframe 
      src="<?php echo htmlspecialchars($formassembly_form_url, ENT_QUOTES, 'UTF-8'); ?>" 
      height="<?php echo htmlspecialchars($formassembly_form_height, ENT_QUOTES, 'UTF-8'); ?>" 
      width="<?php echo htmlspecialchars($formassembly_form_width, ENT_QUOTES, 'UTF-8'); ?>" 
      frameborder="0"
      style="width: <?php echo htmlspecialchars($formassembly_form_width, ENT_QUOTES, 'UTF-8'); ?>; border: none;"
      title="Career Application Form">
    </iframe>
  <?php endif; ?>
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