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
  $details_title1 = 'Treatment performance engineered for real-world operational demands ';
  $details_title2 = 'oil & gas verticals we support';
  $details_title3 = 'key challenges we help solve';
  $details_title4 = 'explore our oil & gas capabilities';

  $details_description = 'Water systems influence every stage of oil and gas development: from early regulatory planning to modular deployment, commissioning, and steady-state operation. Our teams connect field conditions, chemistry, system design, and operating behaviour to strengthen predictability and support sustained production uptime.';
  $details_description2 = 'Water and air management asset requirements shift across upstream, midstream, and downstream operations due to production methods, water chemistry, asset life, and regulatory exposure. Our specialist team works within these conditions to support planning, execution, and ongoing operation.';
  $details_description3 = 'Whether planning new activity or responding to changing conditions, oil and gas teams contend with a wide delta of challenges influencing treatment behaviour and operational stability. The list below outlines the situations we are most frequently asked to assess.';

  $sidebar_img='../assets/img/sidebar.jpg'; 
  $sidebar_title = 'Access the technical expertise driving sustainable business performance';
  $sidebar_description= 'Our experts are on hand to help you evaluate your system and focus on the factors that strengthen long-term asset value.';
  $sidebar_button_name= 'Schedule a Discovery Call';
?>

<link rel="stylesheet" href="../assets/css/section-block_details_mega.css" />

<section class="block-details-mega">
  <?php 
			$section_title = "unify water performance accountability across your asset lifecycle";
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
              include('../components/elements/details-content-links.php') 
      ?>

    </div>

    <div class="asside-card">
      <?php 
					include('../components/elements/info-card-slider.php') 
				?>
    </div>
  </div>
  <section>