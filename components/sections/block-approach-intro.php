<?php
// Configuration variables - can be set before including this component
// All have sensible defaults for backward compatibility

// Top tagline (optional)
if (!isset($approach_tagline)) {
    $approach_tagline = null;
}

// Main title
if (!isset($approach_heading_title)) {
    $approach_heading_title = "adopt a design-to-operations pathway that anticipates flexibility and generates predictable system behaviour";
}

// Description text (supports single string or array of paragraphs)
if (!isset($approach_text_1)) {
    $approach_text_1 = "Project owners need clarity on how performance, capital expenditure, and execution pathways develop over the lifecycle. Our approach establishes this early by validating the treatment concept, defining scopes that align with budget and permit conditions, and preparing modular, well-interfaced systems for execution.";
}
if (!isset($approach_text_2)) {
    $approach_text_2 = "As projects progress towards commissioning and operation, this structure reinforces performance accountability by keeping the process, packaged system, and operating envelope aligned as the facility transitions into steady-state use.";
}

// Button configuration (optional)
if (!isset($approach_button)) {
    $approach_button = null;
}
if (!isset($approach_button_url)) {
    $approach_button_url = "#";
}

// Show button wrapper (controls button visibility)
if (!isset($show_button)) {
    $show_button = true;
}

// Scroll link configuration (fallback when no button)
if (!isset($approach_link)) {
    $approach_link = "/explore-bio";
}
if (!isset($approach_link_label)) {
    $approach_link_label = "Explore our Performance Pillars";
}
if (!isset($approach_scroll_id)) {
    $approach_scroll_id = "pillar1";
}

// Image configuration (optional)
if (!isset($image_src)) {
    $image_src = "../assets/img/strengthen.png";
}
if (!isset($image_alt)) {
    $image_alt = "picture representing strengthen capital planning";
}

// Layout reversal flag
if (!isset($reverse)) {
    $reverse = false;
}

// Accordion items (optional)
if (!isset($accordion_items)) {
    $accordion_items = null;
}

// Default heading level to 2 if not provided
$heading_level = $heading_level ?? 2;
include_once(__DIR__ . '/../helpers/heading.php');

// Build modifier class for reverse layout
$modifier_class = $reverse ? ' block-approach-intro--reverse' : '';
?>

<link rel="stylesheet" href="../assets/css/section-block_approach_intro.css" />

<section class="block-approach-intro<?php echo $modifier_class; ?>">
  <div class="block-approach-intro__wrapper">

    <div class="block-approach-intro__col block-approach-intro__col--text">

      <?php if ($approach_tagline): ?>
      <div class="block-approach-intro__tagline">
        <span><?php echo $approach_tagline; ?></span>
      </div>
      <?php endif; ?>

      <div class="heading">
        <?php render_heading($approach_heading_title, $heading_level, 'title title--h2', [], true); ?>
      </div>

      <div class="text-content text-content--grey">
        <p><?php echo $approach_text_1; ?></p>
        <?php if ($approach_text_2): ?>
        <p><?php echo $approach_text_2; ?></p>
        <?php endif; ?>
      </div>

      <?php if ($accordion_items): ?>
      <?php
        include('../components/elements/accordion.php')
      ?>
      <?php endif; ?>

      <?php if ($show_button): ?>
      <div class="block-approach-intro__actions">
        <?php if (!empty($approach_button)): ?>
        <a href="<?php echo $approach_button_url; ?>" aria-label="<?php echo $approach_button; ?>">
          <button class="btn btn--gradient"><?php echo $approach_button; ?></button>
        </a>
        <?php elseif ($approach_link_label): ?>
        <span><?php echo $approach_link_label; ?></span>
        <a href="#<?php echo $approach_scroll_id; ?>" class="link-with-arrow"
          aria-label="<?php echo $approach_link_label; ?>">
          <span class="icon-arrow-down">
            <svg viewBox="0 0 27 15">
              <use xlink:href="#arrow-down"></use>
            </svg>
          </span>
        </a>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>

    <?php if ($image_src): ?>
    <div class="block-approach-intro__col block-approach-intro__col--media">
      <?php include('../components/elements/image-card.php')?>
      <!-- <img src="<?php echo $image_src; ?>" alt="<?php echo $image_alt; ?>" /> -->
      <!-- Person card template - can be enabled by setting appropriate variables
      <a href="<?php echo $approach_link; ?>" class="approach-media-link" aria-label="Learn more from <?php echo $person_name; ?>">
                <div class="approach-person-card">
                    <div class="approach-person-card__image-container">
                        <img src="<?php echo $image_src; ?>" alt="<?php echo $image_alt; ?>" class="approach-person-card__image">
                    </div>
                    <div class="approach-person-card__info">
                        <h4 class="approach-person-card__name"><?php echo $person_name; ?></h4>
                        <p class="approach-person-card__credentials"><?php echo $person_credentials; ?></p>
                        <p class="approach-person-card__title"><?php echo $person_title; ?></p>
                    </div>
                </div>
            </a> -->
    </div>
    <?php endif; ?>
  </div>
</section>