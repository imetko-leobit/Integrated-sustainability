<?php
// Configuration variables
if (!isset($application_card_title)) {
    $application_card_title = "Apply for this Position";
}
if (!isset($application_card_description)) {
    $application_card_description = "Fill out the application form to join our team and make a difference in sustainability.";
}
if (!isset($application_card_button)) {
    $application_card_button = null; // Optional button
}

// Form configuration variables are passed through to the career-form component
?>

<link rel="stylesheet" href="../assets/css/section-block_career_application.css" />

<section class="block-career-application">
  <div class="block-career-application__wrapper">

    <!-- Left Column: Application Card -->
    <div class="block-career-application__col block-career-application__col--sidebar">
      <?php
        $vacancy_card_title = $application_card_title;
        $vacancy_card_description = $application_card_description;
        $vacancy_card_button = $application_card_button;
        include('../components/elements/vacancy-card.php');
      ?>
    </div>

    <!-- Right Column: Full Width Form -->
    <div class="block-career-application__col block-career-application__col--form">
      <?php
        $bottom_spacing = '0';
        include('../components/elements/divider.php');
      ?>

      <?php include('../components/elements/career-form.php'); ?>
    </div>

  </div>
</section>