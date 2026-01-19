<?php
// Configuration variables for the career application form
if (!isset($form_section1_header)) {
    $form_section1_header = "Personal Information";
}
if (!isset($form_section1_description)) {
    $form_section1_description = "Please provide your contact information";
}
if (!isset($form_section1_field1_label)) {
    $form_section1_field1_label = "First Name";
}
if (!isset($form_section1_field2_label)) {
    $form_section1_field2_label = "Last Name";
}
if (!isset($form_section1_field3_label)) {
    $form_section1_field3_label = "Email";
}

if (!isset($form_section2_header)) {
    $form_section2_header = "Professional Background";
}
if (!isset($form_section2_select1_label)) {
    $form_section2_select1_label = "Experience Level";
}
if (!isset($form_section2_select1_options)) {
    $form_section2_select1_options = [
        '0-2' => '0-2 years',
        '3-5' => '3-5 years',
        '5+' => '5+ years'
    ];
}
if (!isset($form_section2_select2_label)) {
    $form_section2_select2_label = "Area of Expertise";
}
if (!isset($form_section2_select2_options)) {
    $form_section2_select2_options = [
        'environmental' => 'Environmental Science',
        'engineering' => 'Engineering',
        'management' => 'Project Management'
    ];
}
if (!isset($form_section2_textarea_label)) {
    $form_section2_textarea_label = "Tell us about your experience";
}
if (!isset($form_section2_input_label)) {
    $form_section2_input_label = "LinkedIn Profile";
}
if (!isset($form_section2_select3_label)) {
    $form_section2_select3_label = "How did you hear about us?";
}
if (!isset($form_section2_select3_options)) {
    $form_section2_select3_options = [
        'linkedin' => 'LinkedIn',
        'referral' => 'Referral',
        'website' => 'Website'
    ];
}

if (!isset($form_section3_header)) {
    $form_section3_header = "Additional Information";
}
if (!isset($form_section3_description)) {
    $form_section3_description = "Please provide any additional information";
}
if (!isset($form_section3_select1_label)) {
    $form_section3_select1_label = "Preferred Start Date";
}
if (!isset($form_section3_select1_options)) {
    $form_section3_select1_options = [
        'immediate' => 'Immediate',
        '2-weeks' => '2 Weeks Notice',
        '1-month' => '1 Month Notice'
    ];
}
if (!isset($form_section3_select2_label)) {
    $form_section3_select2_label = "Work Authorization";
}
if (!isset($form_section3_select2_options)) {
    $form_section3_select2_options = [
        'citizen' => 'Citizen',
        'work-permit' => 'Work Permit',
        'require-sponsorship' => 'Require Sponsorship'
    ];
}
if (!isset($form_section3_select3_label)) {
    $form_section3_select3_label = "Salary Expectation";
}
if (!isset($form_section3_select3_options)) {
    $form_section3_select3_options = [
        'range1' => '$50k-$70k',
        'range2' => '$70k-$90k',
        'range3' => '$90k+'
    ];
}
if (!isset($form_section3_select4_label)) {
    $form_section3_select4_label = "Location Preference";
}
if (!isset($form_section3_select4_options)) {
    $form_section3_select4_options = [
        'remote' => 'Remote',
        'on-site' => 'On-site',
        'hybrid' => 'Hybrid'
    ];
}
if (!isset($form_section3_select5_label)) {
    $form_section3_select5_label = "Availability";
}
if (!isset($form_section3_select5_options)) {
    $form_section3_select5_options = [
        'full-time' => 'Full-time',
        'part-time' => 'Part-time',
        'contract' => 'Contract'
    ];
}
if (!isset($form_file_upload_label)) {
    $form_file_upload_label = "Upload Resume / CV";
}
if (!isset($form_cancel_button)) {
    $form_cancel_button = "Cancel";
}
if (!isset($form_submit_button)) {
    $form_submit_button = "Submit Application";
}
?>

<link href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../assets/css/components-custom_select.css" />
<link rel="stylesheet" href="../assets/css/components-career_form.css" />

<form class="career-form" id="careerApplicationForm">

  <!-- Section 1: Personal Information -->
  <div class="career-form__section">
    <div class="career-form__section-header">
      <h3 class="career-form__section-title career-form__section-main-title"><?php echo htmlspecialchars($form_section1_header, ENT_QUOTES, 'UTF-8'); ?></h3>
      <p class="career-form__section-description"><?php echo htmlspecialchars($form_section1_description, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>

    <div class="career-form__row career-form__row--two">
      <?php
        $form_config = [
          // Section 1: Personal Information
          [
            'type' => 'text',
            'label' => $form_section1_field1_label,
            'name' => 'first_name',
            'placeholder' => $form_section1_field1_label,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'text',
            'label' => $form_section1_field2_label,
            'name' => 'last_name',
            'placeholder' => $form_section1_field2_label,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'email',
            'label' => $form_section1_field3_label,
            'name' => 'email',
            'placeholder' => $form_section1_field3_label,
            'required' => true,
            'size' => 'half'
          ],
        ];

        $form_id = 'careerApplicationForm';
        $form_class = 'career-application-form';
        $submit_text = $form_submit_button;
        $cancel_text = $form_cancel_button;
        $enable_choices = true;
        include('../components/sections/block-form.php');
      ?>
    </div>

    <?php
      $bottom_spacing = '0';
      include('../components/elements/divider.php');
    ?>

  <!-- Section 2: Professional Background -->
  <div class="career-form__section">
    <div class="career-form__section-header">
      <h3 class="career-form__section-title"><?php echo htmlspecialchars($form_section2_header, ENT_QUOTES, 'UTF-8'); ?></h3>
    </div>

    <div class="career-form__row">
      <?php
        $form_config = [
          [
            'type' => 'select',
            'label' => $form_section2_select1_label,
            'name' => 'experience_level',
            'options' => $form_section2_select1_options,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'select',
            'label' => $form_section2_select2_label,
            'name' => 'expertise',
            'options' => $form_section2_select2_options,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'textarea',
            'label' => $form_section2_textarea_label,
            'name' => 'experience',
            'placeholder' => $form_section2_textarea_label,
            'required' => true,
            'rows' => 4,
            'size' => 'full'
          ],
          [
            'type' => 'url',
            'label' => $form_section2_input_label,
            'name' => 'linkedin',
            'placeholder' => $form_section2_input_label,
            'required' => false,
            'size' => 'half'
          ],
          [
            'type' => 'select',
            'label' => $form_section2_select3_label,
            'name' => 'hear_about_us',
            'options' => $form_section2_select3_options,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'file',
            'label' => $form_file_upload_label,
            'name' => 'resume',
            'accept' => '.pdf,.doc,.docx',
            'required' => true,
            'size' => 'full'
          ]
        ];

        $form_id = 'careerApplicationForm';
        $form_class = 'career-application-form';
        $submit_text = $form_submit_button;
        $cancel_text = $form_cancel_button;
        $enable_choices = true;
        include('../components/sections/block-form.php');
      ?>
    </div>
  </div>

  <?php
    $bottom_spacing = '0';
    include('../components/elements/divider.php');
  ?>

  <!-- Section 3: Additional Information -->
  <div class="career-form__section">
    <div class="career-form__section-header">
      <h3 class="career-form__section-title"><?php echo htmlspecialchars($form_section3_header, ENT_QUOTES, 'UTF-8'); ?></h3>
      <p class="career-form__section-description"><?php echo htmlspecialchars($form_section3_description, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>

    <div class="career-form__row">
      <?php
        $form_config = [
          [
            'type' => 'select',
            'label' => $form_section3_select1_label,
            'name' => 'start_date',
            'options' => $form_section3_select1_options,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'select',
            'label' => $form_section3_select2_label,
            'name' => 'work_authorization',
            'options' => $form_section3_select2_options,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'select',
            'label' => $form_section3_select3_label,
            'name' => 'salary_expectation',
            'options' => $form_section3_select3_options,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'select',
            'label' => $form_section3_select4_label,
            'name' => 'location_preference',
            'options' => $form_section3_select4_options,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'select',
            'label' => $form_section3_select5_label,
            'name' => 'availability',
            'options' => $form_section3_select5_options,
            'required' => true,
            'size' => 'full'
          ]
        ];

        $form_id = 'careerApplicationForm';
        $form_class = 'career-application-form';
        $submit_text = $form_submit_button;
        $cancel_text = $form_cancel_button;
        $enable_choices = true;
        include('../components/sections/block-form.php');
      ?>
    </div>
  </div>

  <div class="career-form__buttons">
    <button type="button" class="btn btn--text career-form__cancel"><?php echo htmlspecialchars($form_cancel_button, ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="submit" class="btn btn--gradient career-form__submit"><?php echo htmlspecialchars($form_submit_button, ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Initialize Choices.js for all select elements
  const regularSelects = document.querySelectorAll('.career-form__select');
  regularSelects.forEach(function(selectElement) {
    new Choices(selectElement, {
      removeItemButton: false,
      placeholder: true,
      itemSelectText: '',
      searchEnabled: false,
    });
  });

  // File upload functionality
  const fileInput = document.getElementById('resumeUpload');
  const fileNameDisplay = document.querySelector('.career-form__file-name');

  if (fileInput && fileNameDisplay) {
    fileInput.addEventListener('change', function(e) {
      if (e.target.files.length > 0) {
        fileNameDisplay.textContent = e.target.files[0].name;
      } else {
        fileNameDisplay.textContent = 'No file chosen';
      }
    });
  }

  // Form submission
  const form = document.getElementById('careerApplicationForm');
  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      // Form submission logic should be implemented here
      // For now, just prevent default submission
      alert('Form submitted successfully! (This is a placeholder - implement actual submission logic)');
    });
  }

  // Cancel button
  const cancelBtn = document.querySelector('.career-form__cancel');
  if (cancelBtn) {
    cancelBtn.addEventListener('click', function() {
      form.reset();
      fileNameDisplay.textContent = 'No file chosen';
      // Re-initialize Choices.js selects after reset
      regularSelects.forEach(function(selectElement) {
        const choicesInstance = selectElement.choices;
        if (choicesInstance) {
          choicesInstance.setChoiceByValue('');
        }
      });
    });
  }
});
</script>