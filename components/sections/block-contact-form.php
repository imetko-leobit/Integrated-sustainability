<?php
// Configuration variables
if (!isset($contact_info_description)) {
    $contact_info_description = "Have a question or need assistance? We're here to help.";
}

if (!isset($contact_info_image)) {
    $contact_info_image = "../assets/img/strengthen.png";
}
?>

<link rel="stylesheet" href="../assets/css/section-block_contact_form.css" />

<section class="block-contact-form">
  <div class="block-contact-form__wrapper">

    <!-- Left Column: Contact Info -->
    <div class="block-contact-form__col block-contact-form__col--info">
      <?php
        include('../components/elements/contact-info.php');
      ?>
    </div>

    <!-- Right Column: Contact Form Card -->
    <div class="block-contact-form__col block-contact-form__col--form">
      <div class="block-contact-form__card">
        <?php
          // Configure the contact form using the new reusable block-form component
          $form_config = [
            [
              'type' => 'text',
              'label' => 'First Name',
              'name' => 'first_name',
              'placeholder' => 'Your first name',
              'required' => true,
              'size' => 'half'
            ],
            [
              'type' => 'text',
              'label' => 'Last Name',
              'name' => 'last_name',
              'placeholder' => 'Your last name',
              'required' => true,
              'size' => 'half'
            ],
            [
              'type' => 'email',
              'label' => 'Email',
              'name' => 'email',
              'placeholder' => 'your.email@example.com',
              'required' => true,
              'size' => 'half'
            ],
            [
              'type' => 'text',
              'label' => 'Phone Number',
              'name' => 'phone_number',
              'placeholder' => 'Your phone number',
              'required' => true,
              'size' => 'half'
            ],
            [
              'type' => 'text',
              'label' => 'Company Name',
              'name' => 'company_name',
              'placeholder' => 'Your company name',
              'required' => true,
              'size' => 'full'
            ],
            [
              'type' => 'textarea',
              'label' => 'Message',
              'name' => 'message',
              'placeholder' => 'Tell us how we can help...',
              'rows' => 6,
              'required' => true,
              'size' => 'full'
            ]
          ];
          $form_id = 'contactForm';
          $submit_text = 'Submit';
          $enable_choices = false;
          include('../components/sections/block-form.php');
        ?>
      </div>
    </div>

  </div>
</section>