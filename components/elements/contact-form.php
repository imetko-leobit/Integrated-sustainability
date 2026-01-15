<?php
// Configuration variables for the contact form
if (!isset($form_title)) {
    $form_title = "Get in Touch";
}
if (!isset($form_description)) {
    $form_description = "We'd love to hear from you";
}
?>

<link rel="stylesheet" href="../assets/css/components-contact_form.css" />

<form class="contact-form" id="contactForm">
  <div class="contact-form__header">
    <h3 class="contact-form__title"><?php echo htmlspecialchars($form_title, ENT_QUOTES, 'UTF-8'); ?></h3>
    <p class="contact-form__description"><?php echo htmlspecialchars($form_description, ENT_QUOTES, 'UTF-8'); ?></p>
  </div>
  
  <div class="contact-form__fields">
    <div class="contact-form__field">
      <label class="contact-form__label">Name</label>
      <input type="text" name="name" class="contact-form__input" placeholder="Your name" required>
    </div>
    
    <div class="contact-form__field">
      <label class="contact-form__label">Email</label>
      <input type="email" name="email" class="contact-form__input" placeholder="your.email@example.com" required>
    </div>
    
    <div class="contact-form__field contact-form__field--textarea">
      <label class="contact-form__label">Message</label>
      <textarea name="message" class="contact-form__textarea" rows="6" placeholder="Tell us how we can help..." required></textarea>
    </div>
  </div>
  
  <div class="contact-form__buttons">
    <button type="submit" class="btn btn--gradient contact-form__submit">Submit</button>
  </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('contactForm');
  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      // Form submission logic should be implemented here
      alert('Thank you for contacting us! We will get back to you soon.');
      form.reset();
    });
  }
});
</script>
