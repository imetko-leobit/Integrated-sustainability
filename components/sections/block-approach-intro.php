<?php
$approach_heading_title = "adopt a design-to-operations pathway that anticipates flexibility and generates predictable system behaviour"; //
$approach_text_1 = "Project owners need clarity on how performance, capital expenditure, and execution pathways develop over the lifecycle. Our approach establishes this early by validating the treatment concept, defining scopes that align with budget and permit conditions, and preparing modular, well-interfaced systems for execution."; //
$approach_text_2 = "As projects progress towards commissioning and operation, this structure reinforces performance accountability by keeping the process, packaged system, and operating envelope aligned as the facility transitions into steady-state use."; //
$approach_link = "/explore-bio";
$approach_link_label = "Explore our Performance Pillars";
$approach_scroll_id = "pillar1";

// $person_name = "Monique Simair"; 
// $person_credentials = "M.A.Sc., P.Eng.";
// $person_title = "Vice President, Engineering";
// $image_src = "../assets/img/approach-intro-image.avif";
// $image_alt = $person_name;
?>

<link rel="stylesheet" href="../assets/css/section-block_approach_intro.css" />

<section class="block-approach-intro">
  <div class="block-approach-intro__wrapper">

    <div class="block-approach-intro__col block-approach-intro__col--text">

      <div class="heading">
        <h3 class="title title--h3">
          <?php echo $approach_heading_title; ?>
        </h3>
      </div>

      <div class="text-content text-content--large text-content--grey">
        <p><?php echo $approach_text_1; ?></p>
        <p><?php echo $approach_text_2; ?></p>
      </div>
      <?php if ($accordion_items): ?>
      <?php 
        include('../components/elements/accordion.php')
      ?>
      <?php endif; ?>

      <div class="block-approach-intro__actions">
        <?php if (!empty($approach_button)): ?>
        <a href="#" aria-label="<?php echo $approach_button; ?>">
          <button class="btn btn--gradient"><?php echo $approach_button; ?></button>
        </a>
        <?php else: ?>
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
    </div>

    <div class="block-approach-intro__col block-approach-intro__col--media">
      <?php 
        $image_src = "../assets/img/strengthen.png";
        $image_alt = "picture representing strengthen capital planning";
        include('../components/elements/component-image.php');
      ?>
      <!-- <a href="<?php echo $approach_link; ?>" class="approach-media-link" aria-label="Learn more from <?php echo $person_name; ?>">
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
  </div>
</section>