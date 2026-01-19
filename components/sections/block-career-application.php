<?php
// Configuration variables
if (!isset($application_card_title)) {
    $application_card_title = "Apply for this Position";
}
if (!isset($application_card_description)) {
    $application_card_description = "Fill out the application form to join our team and make a difference in sustainability.";
}
if (!isset($application_card_button)) {
    $application_card_button = null; // Optional button
}

// Form configuration variables are passed through to the career-form component
?>

<link rel="stylesheet" href="../assets/css/section-block_career_application.css" />

<section class="block-career-application">
  <div class="block-career-application__wrapper">

    <!-- Left Column: Application Card -->
    <div class="block-career-application__col block-career-application__col--sidebar">
      <?php
        $vacancy_card_title = $application_card_title;
        $vacancy_card_description = $application_card_description;
        $vacancy_card_button = $application_card_button;
        include('../components/elements/vacancy-card.php');
      ?>
    </div>

    <!-- Right Column: Full Width Form -->
    <div class="block-career-application__col block-career-application__col--form">
      <?php
        $bottom_spacing = '0';
        include('../components/elements/divider.php');
      ?>

      <?php
        // Configure career application form using the new reusable block-form component
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
          // Section 2: Professional Background
          [
            'type' => 'select',
            'label' => $form_section2_select1_label,
            'name' => 'experience_level',
            'placeholder' => $form_section2_select1_label,
            'options' => $form_section2_select1_options,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'select',
            'label' => $form_section2_select2_label,
            'name' => 'expertise',
            'placeholder' => $form_section2_select2_label,
            'options' => $form_section2_select2_options,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'textarea',
            'label' => $form_section2_textarea_label,
            'name' => 'experience',
            'placeholder' => $form_section2_textarea_label,
            'rows' => 4,
            'required' => true,
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
            'placeholder' => $form_section2_select3_label,
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
          ],
          // Section 3: Additional Information
          [
            'type' => 'select',
            'label' => $form_section3_select1_label,
            'name' => 'start_date',
            'placeholder' => $form_section3_select1_label,
            'options' => $form_section3_select1_options,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'select',
            'label' => $form_section3_select2_label,
            'name' => 'work_authorization',
            'placeholder' => $form_section3_select2_label,
            'options' => $form_section3_select2_options,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'select',
            'label' => $form_section3_select3_label,
            'name' => 'salary_expectation',
            'placeholder' => $form_section3_select3_label,
            'options' => $form_section3_select3_options,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'select',
            'label' => $form_section3_select4_label,
            'name' => 'location_preference',
            'placeholder' => $form_section3_select4_label,
            'options' => $form_section3_select4_options,
            'required' => true,
            'size' => 'half'
          ],
          [
            'type' => 'select',
            'label' => $form_section3_select5_label,
            'name' => 'availability',
            'placeholder' => $form_section3_select5_label,
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
        include('../components/blocks/block-form.php');
      ?>
    </div>

  </div>
</section>