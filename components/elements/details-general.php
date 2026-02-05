<link rel="stylesheet" href="../assets/css/components-details_general.css" />

<?php
    $details_title2 = $details_title2 ?? null;
    $details_description2 = $details_description2 ?? null;
    $details_description3 = $details_description3 ?? null;
    $details_deliverables = $details_deliverables ?? null;
    $details_button = $details_button ?? null;
    // Default heading level
    $heading_level = $heading_level ?? 4;
    include_once(__DIR__ . '/../helpers/heading.php');
?>

<div class="details-general">
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
            <?php foreach ($details_deliverables as $item) : ?>
                <li><?php echo $item; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php if ($details_button): ?>
        <a href="#" target=""><?php echo $details_button; ?></a>
    <?php endif; ?>
</div>