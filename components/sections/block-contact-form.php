<?php
// Configuration variables
if (!isset($contact_info_description)) {
    $contact_info_description = "Have a question or need assistance? We're here to help.";
}
if (!isset($contact_info_phone)) {
    $contact_info_phone = "+1 (888)-338-5162";
}
if (!isset($contact_info_country)) {
    $contact_info_country = "Canada & USA";
}
if (!isset($contact_info_image)) {
    $contact_info_image = "../assets/img/strengthen.png";
}

if (!isset($form_title)) {
    $form_title = "Get in Touch";
}
if (!isset($form_description)) {
    $form_description = "We'd love to hear from you";
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
          include('../components/elements/contact-form.php');
        ?>
      </div>
    </div>
    
  </div>
</section>
