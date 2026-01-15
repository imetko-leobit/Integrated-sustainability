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
?>

<link rel="stylesheet" href="../assets/css/components-contact_info.css" />

<div class="contact-info">
  <div class="contact-info__text">
    <p class="contact-info__description"><?php echo htmlspecialchars($contact_info_description, ENT_QUOTES, 'UTF-8'); ?></p>
  </div>
  
  <div class="contact-info__phone-wrapper">
    <span class="contact-info__phone"><?php echo htmlspecialchars($contact_info_phone, ENT_QUOTES, 'UTF-8'); ?></span>
    <div class="contact-info__chip">
      <span class="contact-info__badge"><?php echo htmlspecialchars($contact_info_country, ENT_QUOTES, 'UTF-8'); ?></span>
    </div>
  </div>
  
  <div class="contact-info__image-wrapper">
    <img src="<?php echo htmlspecialchars($contact_info_image, ENT_QUOTES, 'UTF-8'); ?>" alt="Contact decoration" class="contact-info__image" />
  </div>
</div>
