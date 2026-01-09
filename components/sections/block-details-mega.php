<?php
  $sticky_block_button = [ 'title' => 'Download now'];

	$sticky_block_image= ['url' => '../assets/img/transparent.png', 'alt' => 'Designing for Adaptive Mine Water Reuse in Zero-Discharge Jurisdictions', 'description' => 'Designing for Adaptive Mine Water Reuse in Zero-Discharge Jurisdictions'];
	$references_list = [
		['title' => 'some reference 1'],
		['title' => 'some reference 2'],
		['title' => 'some reference 3'],
	];
	$text1 = 'Zero-discharge regulations redefine how mine water is managed. Decisions on routing, containment, and treatment must stand up to regulatory scrutiny while remaining flexible enough to adapt to variable site conditions. When reuse is left to the end of planning, projects often face oversized systems, higher operating costs, and limited options for adjustment.';
	$text2 = 'Integrating adaptive reuse from the outset improves predictability of flows and chemistry, reducing the scale and cost of treatment infrastructure. A containment-first approach gives developers the ability to phase deployment, defer capital, and maintain compliance confidence — provided monitoring and system logic are built into the original plan.';
	$text3 = 'This article highlights how mine developers are responding to zero-discharge jurisdictions with strategies that align regulatory requirements, operational performance, and financial sustainability.';

	$autor_description = 'Kevin is a senior project manager with a Bachelor of Chemical Engineering and a Master of Management Science from University College Dublin, Ireland. He has over 17 years experience executing capital investment projects in the water, energy, mining, pharmaceutical, and chemical industries.';
	$autor_link ='Explore Biography';

	$person_link = '#';
  $person_name = 'Ted Grant';
  $person_degree = 'M.A.Sc., P.Eng.';
  $person_role = 'Manager, Water Resources';
  $person_photo = "../assets/img/approach-intro-image.avif";


  $details_img = '../assets/img/strengthen.png';
  $details_title1 = 'executive summary';
  $details_title2 = 'bullet point section header';
  $details_title3 = 'simple paragraph section title';
  $details_title4 = 'simple paragraph with quote';
  $details_title5 = 'conclusion header';
  $details_title6 = 'references and citations';
  $details_description = 'Zero-discharge regulations redefine how mine water is managed. Decisions on routing, containment, and treatment must stand up to regulatory scrutiny while remaining flexible enough to adapt to variable site conditions. When reuse is left to the end of planning, projects often face oversized systems, higher operating costs, and limited options for adjustment.';
  $details_description2 = 'Integrating adaptive reuse from the outset improves predictability of flows and chemistry, reducing the scale and cost of treatment infrastructure. A containment-first approach gives developers the ability to phase deployment, defer capital, and maintain compliance confidence — provided monitoring and system logic are built into the original plan.';
  $details_description3 = 'This article highlights how mine developers are responding to zero-discharge jurisdictions with strategies that align regulatory requirements, operational performance, and financial sustainability.';
  $details_links = [
    'https://natural-resources.canada.ca/sites/nrcan/files/environment/hydrogen/NRCan_Hydrogen-Strategy-Canada-na-en-v3.pdf',
    'https://agriculture.canada.ca/en/agricultural-production/weather/canadian-drought-monitor/',
    'http://watersmartsolutions.ca/wp-content/uploads/2023/06/WaterSMART_Hydrogen-Study_Report_2023.07.21_V1_ Public.pdf',
    'https://natural-resources.canada.ca/climate-change/impacts-adaptations/climate-change-impacts-forests/forest-change-indicators/drought/17772',
    'https://natural-resources.canada.ca/sites/nrcan/files/environment/hydrogen/NRCan_Hydrogen-Strategy-Canada-na-en-v3.pdf',
    'https://agriculture.canada.ca/en/agricultural-production/weather/canadian-drought-monitor/current-drought-conditions',
    'http://watersmartsolutions.ca/wp-content/uploads/2023/06/WaterSMART_Hydrogen-Study_Report_2023.07.21_V1_ Public.pdf',
  ];

  $slider_imgs = [
    '../assets/img/image1.jpg',
    '../assets/img/image2.jpg',
    '../assets/img/image3.jpg',
    '../assets/img/image4.jpg',
  ];

  $details_quote = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
  $details_quote_author = 'Jeff Coombes, M.Sc., B.Sc. Manager - Strategic Development';
  $slider_imgs = $slider_imgs ?? null;
  $details_deliverables = [
    'Breakpoint Chlorination (BPC) was designed to take place within the underground mine workings prior to metals removal.',
    'Completed a detailed investigation into published research in the area of BPC.',
    'Developed the basis for the process, which was advanced through design, procurement, and commissioning.',
    'Generated a control narrative and operations summary to inform automated dosing, chlorination breakpoint control, and effluent monitoring.',
    'Identified and addressed potential interferences from iron and manganese oxidation within the underground circuit prior to chlorination, to optimize chlorine demand.'
  ];

  $person_link = '#';
  $person_name = 'Ted Grant';
  $person_degree = 'M.A.Sc., P.Eng.';
  $person_role = 'Manager, Water Resources';
  $person_photo = "../assets/img/approach-intro-image.avif";
  $social_icon = "../assets/img/linkedInLink.svg";

  $sidebar_img='../assets/img/sidebar.jpg'; 
  $sidebar_title = 'Access the technical expertise driving sustainable business performance';
  $sidebar_description= 'Our experts are on hand to help you evaluate your system and focus on the factors that strengthen long-term asset value.';
  $sidebar_button_name= 'Schedule a Discovery Call';
?>

<link rel="stylesheet" href="../assets/css/section-block_details_mega.css" />

<section class="block-details-mega">
  <?php 
			$section_title = "Embedding Mine Water Reuse Planning for Compliance and Cost Control";
			$custom_icon = null;
			$link_url = null;
			$person_name = 'Kevin Clarke';
			$person_degree = 'P.Eng., C.Eng. MIEI, M.Sc., BE ';
			$person_date = 'August 10th, 2025';
			$person_photo = "../assets/img/approach-intro-image.avif";
			include('../components/sections/block-section-heading.php'); 
	?>
  <div class="block-details-mega__wrapper">
    <div class='details-content__wrapper'>

      <?php 
              include('../components/elements/details-content-informational.php') 
      ?>

    </div>

    <div class="asside-card">
      <?php 
					include('../components/elements/info-card.php') 
				?>
    </div>
  </div>
  <section>