<?php

$pillar_cards = [
    [
        'title' => 'aptitude',
        'desc' => 'lead with technical excellence, precision, and disciplined execution',
        'link' => '/services#feasibility',
        'action' => 'meet out team',
        'caption' => 'pillar #1',
    ],
    [
        'title' => 'advocacy',
        'desc' => 'build commercial and environmental consensus through innovation and collaboration',
        'link' => '/services#water-resources',
        'action' => 'meet us',
        'caption' => 'pillar #2',
    ],
    [
        'title' => 'attitude',
        'desc' => 'drive performance accountability through an invested cultural mindset',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_SwmZu1t5AW2DxK0oL1Qg0GaNeFrCOrFjEA&s',
        'link' => '/services#permitting',
        'action' => 'go to attitude',
        'caption' => 'pillar #3',
    ],
];

?>

<link rel="stylesheet" href="../assets/css/section-block_pillars.css" />

<section class='block-pillars'>
  <?php foreach ($pillar_cards as $card): ?>

  <?php 
        include('../components/elements/pillar-card.php'); 
    ?>
  <?php endforeach; ?>

</section>