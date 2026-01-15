<?php
// Configuration variables
if (!isset($contact_info_description)) {
    $contact_info_description = "Have a question or need assistance? We're here to help.";
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
    <div class="contact-info__phone-item">
      <span class="contact-info__phone">+1 (888)-338-5162</span>
      <div class="contact-info__chip">
        <span class="contact-info__badge">Canada & USA</span>
      </div>
    </div>

    <div class="contact-info__phone-item">
      <span class="contact-info__phone">+1 (246)-622-2311</span>
      <div class="contact-info__chip">
        <span class="contact-info__badge">Caribbean</span>
      </div>
    </div>
  </div>
</div>
