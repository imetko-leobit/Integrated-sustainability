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
      $hero_title = "Administrative Assistant <br>– Saskatoon";
      $hero_img = "../assets/img/bg-careers.png";
      include('../components/sections/block-hero.php')
    ?>

    <?php include('../components/elements/divider.php'); ?>

    <?php
        // Left column: Vacancy Card
        $vacancy_card_title = "Ready to Join our team?";
        $vacancy_card_description = "Submit the form at the bottom of this page and we’ll be in touch. Thank you.";
        $vacancy_card_button = "Apply Now";

        // Right column: Vacancy Details Blocks
        $vacancy_details_blocks = [
            [
                'title' => 'Description',
                'paragraphs' => [
                    'As an Administrative Assistant, you will be reporting to the Saskatoon location manager. You will play a key role in supporting the location operations and various projects across the organization. Your responsibilities will include office administration, managing documentation, supporting project coordination, and ensuring smooth communication between teams. By collaborating with different departments, you’ll help streamline operations and support the successful delivery of projects. ',
                    'Working in our Saskatoon office, you’ll be part of a growing, dynamic team with significant opportunities to contribute across various areas. Being in the office five days a week, with flexibility when needed, is a crucial part of the role. This environment offers growth potential, allowing you to expand your skills. Your organizational skills and proactive support will be essential in maintaining efficiency and fostering teamwork throughout the organization.'
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
            ],
            [
                'title' => 'Integrated Sustainability',
                'paragraphs' => [
                    'Integrated Sustainability is an award-winning provider of world-class sustainable Water, Waste and Energy solutions. Our goal is to support clients from project conception to construction and beyond by being agile, collaborative partners.',
                    'Recognized as one of Canada’s Top 100 Small & Medium Employers for 7 years in a row, we believe that the people who work here matter and every opportunity we have to be a better employer is an opportunity to succeed. Having attracted a dynamic, multi-disciplined team of specialists, we believe that to be innovative, we must also be courageous, finding solutions and challenging conventional wisdom.'
                ]
            ],
            [
                'title' => 'Additional information',
                'paragraphs' => [
                    'Free AI tools just doesn’t get us. To help you get a meaningful response that reflects who we are, and what we do, we recommend using this prompt: ',
                    '”Tell me what it would be like to work at Integrated Sustainability based on their website: https://www.integratedsustainability.com/ and LinkedIN presence: https://www.linkedin.com/company/integrated-sustainability/posts”'
                ]
            ],
        ];

        include('../components/sections/block-vacancy-details.php');
    ?>

    <?php
        // Application form section configuration
        $application_card_title = "technical issues?";
        $application_card_description = "Please reach out to us via our contact us page if you have any issues submitting your application. ";
        $application_card_button = "Contact Us";

        // FormAssembly configuration
        // IMPORTANT: Replace with your actual FormAssembly form URL
        // Get your form URL from FormAssembly: Publish > Embed in iframe
        $formassembly_form_url = "REPLACE_WITH_YOUR_FORMASSEMBLY_URL";
        $formassembly_form_height = "800";  // Initial height in pixels
        $formassembly_form_width = "100%";  // Width (pixels or percentage)

        include('../components/sections/block-career-application.php');
    ?>
  </main>

  <?php include('../components/footer/_footer.php'); ?>
  <?php include('../components/scripts/_scripts.php'); ?>
</body>

</html>