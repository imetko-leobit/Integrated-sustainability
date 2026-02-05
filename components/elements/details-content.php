<link rel="stylesheet" href="../assets/css/components-details_content.css" />

<?php
    $details_title2 = $details_title2 ?? null;
    $details_description2 = $details_description2 ?? null;
    $details_description3 = $details_description3 ?? null;
    $details_deliverables = $details_deliverables ?? null;
    $details_button = $details_button ?? null;
    // Default heading level
    $heading_level = $heading_level ?? 3;
    include_once(__DIR__ . '/../helpers/heading.php');
?>

<div class="details-content">
  <?php if ($details_title1): ?>
  <?php render_heading($details_title1, $heading_level, 'title title--h3'); ?>
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
  <?php render_heading($details_title2, $heading_level, 'title title--h3'); ?>
  <?php endif; ?>
  <?php if ($details_deliverables): ?>
  <ul>
    <li>
      Breakpoint Chlorination (BPC) was designed to take place within the underground mine workings prior to metals
      removal.

    </li>
    <li>
      Completed a detailed investigation into published research in the area of BPC.

    </li>

    <li>
      Developed the basis for the process, which was advanced through design, procurement, and commissioning.

    </li>
    <li>
      Generated a control narrative and operations summary to inform automated dosing, chlorination breakpoint control,
      and effluent monitoring.

    </li>
  </ul>
  <?php endif; ?>
  <?php if ($details_button): ?>
  <a href="#" target=""><?php echo $details_button; ?></a>
  <?php endif; ?>
</div>