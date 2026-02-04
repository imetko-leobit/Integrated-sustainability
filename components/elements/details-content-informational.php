<link rel="stylesheet" href="../assets/css/components-details_content_informational.css" />

<?php
    $details_title2 = $details_title2 ?? null;
    $details_title3 = $details_title3 ?? null;
    $details_title4 = $details_title4 ?? null;
    $details_title5 = $details_title5 ?? null;
    $details_title6 = $details_title5 ?? null;
    $details_description = $details_description ?? null;
    $details_description2 = $details_description2 ?? null;
    $details_description3 = $details_description3 ?? null;

    $details_deliverables = $details_deliverables ?? null;
    $details_quote = $details_quote ?? null;
    $slider_imgs = $slider_imgs ?? null;
    $details_links = $details_links ?? null;
?>

<div class="details-content-informational">
  <?php if ($details_title1): ?>
  <h2 class="title title--h2"><?php echo $details_title1; ?></h2>
    <?php endif; ?>
    <?php if ($details_description): ?>
    <p><?php echo $details_description; ?></p>
    <?php endif; ?>
    <?php if ($details_description2): ?>
    <p><?php echo $details_description2; ?></p>
    <?php endif; ?>
    <?php if ($details_description3): ?>
    <p><?php echo $details_description3; ?></p>
    <?php endif; ?>
    <?php if ($details_title2): ?>
    <h3 class="title title--h3"><?php echo $details_title2; ?></h3>
    <?php if ($details_description): ?>
    <p><?php echo $details_description; ?></p>
    <?php endif; ?>
    <?php endif; ?>
    <?php if ($details_deliverables): ?>
    <ul>
      <?php foreach ($details_deliverables as $item) : ?>
      <li><?php echo $item; ?></li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <?php if ($slider_imgs): ?>
    <?php
					include('../components/elements/slider-preview.php')
	  ?>
    <?php endif; ?>
    <?php if ($details_title3): ?>
    <h3 class="title title--h3"><?php echo $details_title3; ?></h3>
    <?php endif; ?>
    <?php if ($details_description): ?>
    <p><?php echo $details_description; ?></p>
    <?php endif; ?>
    <?php if ($details_description): ?>
    <p><?php echo $details_description; ?></p>
    <?php endif; ?>
    <?php if ($details_title4): ?>
    <h3 class="title title--h3"><?php echo $details_title4; ?></h3>
    <?php endif; ?>
    <?php if ($details_description): ?>
    <p><?php echo $details_description; ?></p>
    <?php endif; ?>
    <?php if ($details_description): ?>
    <p><?php echo $details_description; ?></p>
    <?php endif; ?>
    <?php if ($details_quote): ?>
    <?php
					include('../components/elements/quote.php')
	  ?>
    <?php endif; ?>
    <?php if ($details_description): ?>
    <p><?php echo $details_description; ?></p>
    <?php endif; ?>
    <?php if ($details_title5): ?>
    <h3 class="title title--h3"><?php echo $details_title5; ?></h3>
    <?php endif; ?>
    <?php if ($details_description): ?>
    <p><?php echo $details_description; ?></p>
    <?php endif; ?>
    <?php if ($details_description): ?>
    <p><?php echo $details_description; ?></p>
    <?php endif; ?>

    <?php if ($person_photo): ?>
    <?php
					include('../components/elements/author.php')
				?>
    <?php endif; ?>

    <?php if ($details_title6): ?>
    <h3 class="title title--h3"><?php echo $details_title6; ?></h3>
    <?php endif; ?>

    <?php if ($details_links): ?>
    <ol>
      <?php foreach ($details_links as $link) : ?>
      <li>
        <a href="<?php echo $link; ?>" target="" aria-label="Reference"><?php echo $link; ?></a>
      </li>
      <?php endforeach; ?>
    </ol>
    <?php endif; ?>


</div>