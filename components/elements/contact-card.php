<?php
// Текстові змінні
$title = "looking for quick support? contact us for fast diagnostics and assessment turnarounds";
$description = "If you're facing unexpected changes and tight deadlines, fast clarity matters. We can help you understand what's happening, what's viable, and what to prioritize next - at pace.";
$call_action_text = "Call our team today to get the ball rolling, or message us via our";
$contact_link_text = "contact us page";
$contact_link_url = "#";

// Контакти
$phone_na = "+1 (888)-338-5162";
$label_na = "Canada & USA";

$phone_caribbean = "+1 (246)-622-2311";
$label_caribbean = "Caribbean";
?>

<link rel="stylesheet" href="../assets/css/components-contact_card.css" />

<div class="support-card">
  <h2 class="support-card__title">
    <?php echo $title; ?>
  </h2>

  <p class="support-card__description">
    <?php echo $description; ?>
  </p>

  <p class="support-card__cta">
    <?php echo $call_action_text; ?> <a href="<?php echo $contact_link_url; ?>"><?php echo $contact_link_text; ?></a>.
  </p>

  <div class="support-card__contacts">
    <div class="contact-item">
      <span class="phone"><?php echo $phone_na; ?></span>
      <div class="contact-tag">
        <span class="badge"><?php echo $label_na; ?></span>
      </div>
    </div>

    <div class="contact-item">
      <span class="phone"><?php echo $phone_caribbean; ?></span>
      <div class="contact-tag">
        <span class="badge"><?php echo $label_caribbean; ?></span>
      </div>
    </div>
  </div>
</div>