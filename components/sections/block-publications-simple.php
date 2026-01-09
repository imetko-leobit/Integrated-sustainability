<?php

$projects_data = [
    [
        'id' => 1812,
        'title' => 'Site-Wide Water Treatment Strategy and Best Achievable Technology Assessment',
        'description' => 'A comprehensive assessment of water treatment needs across the site, focusing on implementing the best available technologies to meet regulatory compliance and sustainability goals.',
        'link' => '#',
        'image' => 'https://img.freepik.com/premium-photo/waste-water-treatment-ponds-from-industrial-plants_281691-294.jpg',
    ],
    [
        'id' => 1811,
        'title' => 'Rare Earth Element Biological Water Treatment Bench-Scale Trials',
        'description' => 'Pilot trials conducted to evaluate the efficacy of biological methods for removing rare earth elements from process wastewater, optimizing microbial cultures for targeted removal.',
        'link' => '#',
        'image' => 'https://e0.pxfuel.com/wallpapers/252/868/desktop-wallpaper-cargo-ship-iphone-6.jpg',
    ],
    [
        'id' => 1810,
        'title' => 'Biochar Adsorption Testing and Ammonia and Selenium Removal Trials',
        'description' => 'Testing the use of biochar as an adsorbent for complex water contaminants, specifically focusing on its effectiveness for ammonia and selenium removal in mine effluent.',
        'link' => '#',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_SwmZu1t5AW2DxK0oL1Qg0GaNeFrCOrFjEA&s',
    ],
    [
        'id' => 1809,
        'title' => 'Gravel Bed Bioreactor Pilot and Technical Advisory Committee Support',
        'description' => 'Providing technical guidance and pilot study results for a Gravel Bed Bioreactor implementation, supporting the project’s advisory committee with expert data analysis.',
        'link' => '#',
        'image' => 'https://i.pinimg.com/736x/c8/fd/e4/c8fde4c75a8dfe529d1b5fbe0365048e.jpg',
    ],
    [
        'id' => 1808,
        'title' => 'JAIR-MA Permit Application Support and Water Treatment Advisory',
        'description' => 'Assisting the client with regulatory permit applications (JAIR-MA) and providing ongoing expert advisory on water treatment strategies and compliance.',
        'link' => '#',
        'image' => 'https://t3.ftcdn.net/jpg/00/88/56/06/360_F_88560614_jLxW5ZnB48ygLeR5kc5YIz4UCyJLfdtE.jpg',
    ],
    [
        'id' => 1807,
        'title' => 'Site-Wide Water Treatment Strategy and Best Achievable Technology Assessment',
        'description' => 'A comprehensive assessment of water treatment needs across the site, focusing on implementing the best available technologies to meet regulatory compliance and sustainability goals.',
        'link' => '#',
        'image' => 'https://img.freepik.com/premium-photo/waste-water-treatment-ponds-from-industrial-plants_281691-294.jpg',
    ],
    [
        'id' => 1806,
        'title' => 'Rare Earth Element Biological Water Treatment Bench-Scale Trials',
        'description' => 'Pilot trials conducted to evaluate the efficacy of biological methods for removing rare earth elements from process wastewater, optimizing microbial cultures for targeted removal.',
        'link' => '#',
        'image' => 'https://t3.ftcdn.net/jpg/00/88/56/06/360_F_88560614_jLxW5ZnB48ygLeR5kc5YIz4UCyJLfdtE.jpg',
    ]
];

?>


<link rel="stylesheet" href="../assets/css/section-block_post_cards.css" />
<link rel="stylesheet" href="../assets/css/section-block_publications_simple.css" />

<section class="block-publications-simple">
  <div class="publications" id="publications">
    <?php foreach ($projects_data as $project) : ?>
    <?php include('../components/elements/post-card-simple.php'); ?>
    <?php endforeach; ?>
  </div>
</section>