<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Career Vacancy</title>
  <?php include('../components/head/_head.php') ?>
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="home">
  <?php
  include('../components/header/_header.php');
  ?>

  <main class="main">
    <?php
      $hero_title = "Senior Environmental<br>Scientist";
      $hero_img = "../assets/img/bg-careers.png";
      include('../components/sections/block-hero.php')
    ?>

    <?php include('../components/elements/divider.php'); ?>

    <?php
        // Left column: Vacancy Card
        $vacancy_card_title = "Join Our Team";
        $vacancy_card_description = "Be part of a mission-driven organization making real impact";
        $vacancy_card_button = "Apply Now";

        // Right column: Vacancy Details Blocks
        $vacancy_details_blocks = [
            [
                'title' => 'About the Role',
                'paragraphs' => [
                    'We are seeking an experienced Senior Environmental Scientist to join our dynamic team. This role offers the opportunity to work on high-impact sustainability projects across various industries, contributing to environmental protection and sustainable development.',
                    'As a key member of our team, you will lead environmental assessments, develop mitigation strategies, and collaborate with multidisciplinary teams to deliver innovative solutions for our clients.'
                ],
                'list_title' => 'Key Responsibilities',
                'list_items' => [
                    'Lead environmental impact assessments and site investigations',
                    'Develop and implement environmental management plans',
                    'Ensure compliance with environmental regulations and standards',
                    'Coordinate with clients, regulatory agencies, and project teams',
                    'Mentor junior staff and contribute to team development'
                ]
            ],
            [
                'title' => 'Requirements',
                'paragraphs' => [
                    'The ideal candidate will bring a combination of technical expertise, leadership skills, and a passion for environmental sustainability.'
                ],
                'list_title' => 'Qualifications',
                'list_items' => [
                    'Master\'s degree in Environmental Science, Ecology, or related field',
                    '5+ years of experience in environmental consulting',
                    'Professional designation (P.Geo, P.Eng, or equivalent) is an asset',
                    'Strong knowledge of environmental regulations and assessment methodologies',
                    'Excellent written and verbal communication skills',
                    'Proven project management and leadership abilities'
                ]
            ],
            [
                'title' => 'What We Offer',
                'paragraphs' => [
                    'Join a team recognized as one of Canada\'s Top 100 Small & Medium Employers. We offer a supportive work environment that values innovation, professional growth, and work-life balance.'
                ],
                'list_title' => 'Benefits',
                'list_items' => [
                    'Competitive salary and comprehensive benefits package',
                    'Professional development and training opportunities',
                    'Flexible work arrangements and remote work options',
                    'Collaborative and inclusive team culture',
                    'Opportunity to work on meaningful, high-impact projects',
                    'Career advancement pathways'
                ]
            ]
        ];

        include('../components/sections/block-vacancy-details.php');
    ?>

    <?php
        $layout = 'center';
        $title = 'Ready to make<br>an impact?';
        $description = 'Join our team of passionate professionals dedicated to creating sustainable solutions for a better future.';
        $button_text = 'Apply Now';
        include('../components/sections/block-cta.php')
    ?>

  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>
