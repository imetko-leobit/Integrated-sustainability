<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="home">
  <?php include('../components/header/_header.php'); ?>

  <main class="main">
    <?php 
        $hero_title = "{first name} {last name} {accreditation}";
        $hero_description = "title";
        $hero_img = "../assets/img/bg-about-us.png";
        include('../components/sections/block-hero.php') 
    ?>
    <?php 
        $section_title = "professional overview & expertise";
        $link_url = "/";
        $link_direction = "right";
        $link_text = "Team <br> Directory";
        $custom_icon = "../assets/img/linkIconArrowRight.svg";
        include('../components/sections/block-section-heading.php'); 
    ?>

    <?php
        // Left column: Author Card
        $person_name = "Kevin Clarke";
        $person_degree = "P.Eng., C.Eng. MIEI, M.Sc., BE ";
        $person_role = "Manager, Facility Operations - Canada";
        $person_photo = "../assets/img/approach-intro-image.avif";

        // Right column: Author Details Blocks
        $author_details_blocks = [
                'pillar' => 'DISCIPLINE LEAD - OPERATIONS AND MAINTENANCE',
                'title' => 'translating innovation into operational performance',
                'paragraphs' => [
                    'Kevin is a senior project manager with a Bachelor of Chemical Engineering and a Master of Management Science from University College Dublin, Ireland. Kevin has over 17 years experience in executing capital investment projects in the water, energy, mining, pharmaceutical, and chemical industries.',
                    'Kevin has led several multi-disciplinary projects, gaining an acute understanding of the challenges and costs associated with completing infrastructure development for industrial, municipal and commercial purposes with a focus on water treatment and water management infrastructure. Projects located in proximity to major urban centres, as well as projects in remote locations. His experience of the execution model in these projects is both with design build and design build own operate delivery as wells as with the EPCM model. ',
                    'Kevin has managed projects from the perspective of the Owner, the Owners Engineer, a Consultant and as a Contractor, providing the ability to anticipate and mitigate challenges for all stakeholders involved in a project.',
                ],
                'list_title' => 'contact Kevin for:',
                'list_items' => [
                    'Operational assessments of new or existing water and wastewater treatment systems',
                    'Planning and executing commissioning and/or start-up for industrial and municipal facilities',
                    'Evaluating treatment performance, operating envelopes, and lifecycle operating costs',
                    'Integrating packaged systems into brownfield and/or greenfield projects',
                    'Advisory support on Owner, EPCM, or contractor-side execution strategies',
                    'Developing remote and hybrid operational capabilities'
                ],
                'action' => 'Book Discovery Call',
        ];

        include('../components/sections/block-author.php');
    ?>

    <?php
    $section_title = "{author first name’s} thought leadership library";
    $link_url = null;
    $link_text = null;
    $custom_icon = null;
    $person_photo = null;
    include('../components/sections/block-section-heading.php');
    ?>
    <?php
        include('../components/sections/block-publications.php'); 
    ?>

    <?php
        $layout = 'default';
        $title = 'partner with <br> a unified team';
        $description = 'Achieve greater cost control and schedule certainty with accountable infrastructure designed for high-consequence operations.';
        $button_text = 'Book a Call';
        include('../components/sections/block-cta.php')
    ?>
  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>