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

  <main class="main">
    <?php 
        $section_title = "contact us";
        $custom_icon = null;
        include('../components/sections/block-section-heading.php'); 
    ?>
    
    <?php 
        // Contact form section configuration
        $contact_info_description = "Have a question or need assistance? We're here to help. Fill out the form and our team will get back to you as soon as possible.";
        $contact_info_phone = "+1 (888)-338-5162";
        $contact_info_country = "Canada & USA";
        $contact_info_image = "../assets/img/strengthen.png";
        
        // Form configuration
        $form_title = "Get in Touch";
        $form_description = "We'd love to hear from you";
        
        include('../components/sections/block-contact-form.php');
    ?>
  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>
