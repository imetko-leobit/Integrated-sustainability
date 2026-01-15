<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Contact Us</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="home">
  <?php include('../components/header/_header.php'); ?>


  /**
   * Main content container for the contact page
   *
   * Note: The margin-top: 115px is required to prevent content from being hidden
   * behind the fixed/absolute positioned header. This ensures proper content visibility
   * and layout spacing.
   */
  <main class="main" style="margin-top: 115px;">
    <?php
        $section_title = "connect with our specialists";
        $custom_icon = null;
        include('../components/sections/block-section-heading.php');
    ?>

    <?php
        // Contact form section configuration
        $contact_info_description = "Chat to our team today and get the ball rolling on your next project. If you know your party’s extension, please press 9, followed by their number. ";
        $contact_info_image = "../assets/img/strengthen.png";
        include('../components/sections/block-contact-form.php');
    ?>
  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>