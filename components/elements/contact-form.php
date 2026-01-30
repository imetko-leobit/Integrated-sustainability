<link rel="stylesheet" href="../assets/css/section-block_form.css" />

<form class="block-form" id="contactForm">
  <?php
    // Configure the contact form using the reusable block-form component
    $form_config = [
      [
        'type' => 'text',
        'label' => 'Name',
        'name' => 'name',
        'placeholder' => 'Your name',
        'required' => true,
        'size' => 'full'
      ],
      [
        'type' => 'email',
        'label' => 'Email',
        'name' => 'email',
        'placeholder' => 'your.email@example.com',
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