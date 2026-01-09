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
?>

<link rel="stylesheet" href="../assets/css/section-block_details_author.css" />

<section class="block-details-author">
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
  <div class="block-details-author__wrapper">
    <div class='details-content__wrapper'>

      <?php 
					$details_title1 = 'executive summary';
					$details_description = $text1;
					$details_description2 = $text2;
					$details_description3 = $text3;
					$details_button = 'Download now';

					include('../components/elements/details-general.php') 
				?>
      <?php 
					$autor_title  = 'about the author';
					include('../components/elements/author.php') 
				?>

    </div>

    <?php 
						include('../components/elements/asside.php') 
				?>
  </div>
</section>