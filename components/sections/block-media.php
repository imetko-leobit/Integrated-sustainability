<?php
// Default heading level
$heading_level = $heading_level ?? 2;
include_once(__DIR__ . '/../helpers/heading.php');
?>
<link rel="stylesheet" href="../assets/css/section-block_media.css" />

<section class="block-media">
  <div class="block-media__col--text">
    <div class="heading">
      <?php render_heading('Modular and configurable treatment packages available now', $heading_level, 'title title--h2'); ?>
    </div>
    <div class="text-content text-content--grey">
      <p>Many operators prefer treatment systems that can be deployed quickly, relocated as conditions change, or
        integrated into existing infrastructure without major civil works. Our treatment packages are engineered for
        mobility, predictable integration, and defined operating envelopes.</p>
      <p>Whether supporting planned shutdowns, seasonal constraints, drilling programs, or early-stage production, these
        systems can be configured as standalone units or embedded within a broader treatment train.</p>
    </div>
    <div class="block-media_actions">
      <a href="/services" aria-label="Speak with a Specialist ">
        <button class="btn btn--gradient">Speak with a Specialist </button>
      </a>
    </div>
  </div>
  <div class="block-media__col--img">
    <img src="../assets/img/delivery.jpg" alt="Modular Treatment Packages" class="block-media__img">
  </div>
</section>