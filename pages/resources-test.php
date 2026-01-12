<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Resources Grid - Test Page</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="resources-test">
  <?php include('../components/header/_header.php'); ?>

  <main class="main">
    <?php 
        $section_title = "explore our resources & insights";
        include('../components/sections/block-resources-grid.php') 
    ?>
  </main>

  <?php include('../components/footer/_footer.php'); ?>
</body>

</html>
