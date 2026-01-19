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
<link rel="stylesheet" href="../assets/css/section-block_form.css" />

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
        <form class="block-form" id="contactForm">
          <?php
            // Configure the contact form using the reusable block-form component
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
            $enable_choices = false;
            include('../components/sections/block-form.php');
          ?>
          
          <div class="form-buttons">
            <button type="submit" class="btn btn--gradient form-submit">Submit</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('contactForm');

  if (form) {
    // Form submission
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      // TODO: Implement actual form submission logic here (e.g., AJAX call to backend)
      // For now, showing a simple alert as placeholder
      alert('Thank you for your submission! We will get back to you soon.');
      form.reset();
    });
  }
});
</script>