<?php

$projects_data = [
    [
        'id' => 1812,
        'title' => 'Site-Wide Water Treatment Strategy and Best Achievable Technology Assessment',
        'description' => 'A comprehensive assessment of water treatment needs across the site, focusing on implementing the best available technologies to meet regulatory compliance and sustainability goals.',
        'link' => '#',
        'image' => 'https://img.freepik.com/premium-photo/waste-water-treatment-ponds-from-industrial-plants_281691-294.jpg',
        'tags' => ['water treatment'],
    ],
    [
        'id' => 1811,
        'title' => 'Rare Earth Element Biological Water Treatment Bench-Scale Trials',
        'description' => 'Pilot trials conducted to evaluate the efficacy of biological methods for removing rare earth elements from process wastewater, optimizing microbial cultures for targeted removal.',
        'link' => '#',
        'image' => 'https://e0.pxfuel.com/wallpapers/252/868/desktop-wallpaper-cargo-ship-iphone-6.jpg',
        'tags' => ['oil & gas'],
    ],
    [
        'id' => 1810,
        'title' => 'Biochar Adsorption Testing and Ammonia and Selenium Removal Trials',
        'description' => 'Testing the use of biochar as an adsorbent for complex water contaminants, specifically focusing on its effectiveness for ammonia and selenium removal in mine effluent.',
        'link' => '#',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_SwmZu1t5AW2DxK0oL1Qg0GaNeFrCOrFjEA&s',
        'tags' => ['oil & gas', 'water treatment'],

    ],
    [
        'id' => 1809,
        'title' => 'Gravel Bed Bioreactor Pilot and Technical Advisory Committee Support',
        'description' => 'Providing technical guidance and pilot study results for a Gravel Bed Bioreactor implementation, supporting the project’s advisory committee with expert data analysis.',
        'link' => '#',
        'image' => 'https://i.pinimg.com/736x/c8/fd/e4/c8fde4c75a8dfe529d1b5fbe0365048e.jpg',
        'tags' => ['oil & gas', 'water treatment'],
    ],
    [
        'id' => 1808,
        'title' => 'JAIR-MA Permit Application Support and Water Treatment Advisory',
        'description' => 'Assisting the client with regulatory permit applications (JAIR-MA) and providing ongoing expert advisory on water treatment strategies and compliance.',
        'link' => '#',
        'image' => 'https://t3.ftcdn.net/jpg/00/88/56/06/360_F_88560614_jLxW5ZnB48ygLeR5kc5YIz4UCyJLfdtE.jpg',
        'tags' => ['oil & gas', 'water treatment', 'other'],
    ],
    [
        'id' => 1807,
        'title' => 'Site-Wide Water Treatment Strategy and Best Achievable Technology Assessment',
        'description' => 'A comprehensive assessment of water treatment needs across the site, focusing on implementing the best available technologies to meet regulatory compliance and sustainability goals.',
        'link' => '#',
        'image' => 'https://img.freepik.com/premium-photo/waste-water-treatment-ponds-from-industrial-plants_281691-294.jpg',
        'tags' => ['oil & gas'],
    ],
    [
        'id' => 1806,
        'title' => 'Rare Earth Element Biological Water Treatment Bench-Scale Trials',
        'description' => 'Pilot trials conducted to evaluate the efficacy of biological methods for removing rare earth elements from process wastewater, optimizing microbial cultures for targeted removal.',
        'link' => '#',
        'image' => 'https://t3.ftcdn.net/jpg/00/88/56/06/360_F_88560614_jLxW5ZnB48ygLeR5kc5YIz4UCyJLfdtE.jpg',
        'tags' => ['oil & gas', 'water treatment'],
    ]
];
// Default heading level to 1 if not provided
$heading_level = $heading_level ?? 2;
include_once(__DIR__ . '/../helpers/heading.php');

?>


<link rel="stylesheet" href="../assets/css/section-block_search_results.css" />

<section class="block-search-results">
  <?php render_heading('41 search results for "water"', $heading_level, 'heading'); ?>
  <?php include('../components/elements/search_form.php'); ?>
  <div class="publications" id="publications">
    <?php foreach ($projects_data as $project) : ?>
    <?php include('../components/elements/post-card.php'); ?>
    <?php endforeach; ?>
  </div>

  <div class="posts__actions">
    <button class="btn">Load more</button>
  </div>
  <div class="background-svg">
    <svg width="912" height="507" viewBox="0 0 912 507" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path opacity="0.4"
        d="M912.512 369.062C936.972 369.062 957 389.082 957 413.531C957 437.98 936.972 458 912.512 458C888.052 458 868.023 437.98 868.023 413.531C868.023 389.082 888.052 369.062 912.512 369.062ZM745.169 413.531C745.169 437.98 765.198 458 789.658 458C814.118 458 834.147 437.98 834.147 413.531C834.147 389.082 814.118 369.062 789.658 369.062C765.198 369.062 745.169 389.082 745.169 413.531ZM622.205 413.531C622.205 437.98 642.234 458 666.694 458C691.154 458 711.182 437.98 711.182 413.531C711.182 389.082 691.154 369.062 666.694 369.062C642.234 369.062 622.205 389.082 622.205 413.531ZM499.351 413.531C499.351 437.98 519.38 458 543.84 458C568.3 458 588.329 437.98 588.329 413.531C588.329 389.082 568.3 369.062 543.84 369.062C519.38 369.062 499.351 389.082 499.351 413.531ZM370.76 413.531C370.76 437.98 390.766 458 415.248 458C439.73 458 459.737 437.98 459.737 413.531C459.737 389.082 439.708 369.062 415.248 369.062C390.789 369.062 370.76 389.082 370.76 413.531ZM124.964 413.531C124.964 437.98 144.993 458 169.453 458C193.913 458 213.942 437.98 213.942 413.531C213.942 389.082 193.913 369.062 169.453 369.062C144.993 369.062 124.964 389.082 124.964 413.531ZM2.11089 413.531C2.11089 437.98 22.1398 458 46.5997 458C71.0596 458 91.0886 437.98 91.0886 413.531C91.0886 389.082 71.0596 369.062 46.5997 369.062C22.1398 369.062 2.11089 389.082 2.11089 413.531ZM867.978 290.51C867.978 314.959 888.007 334.979 912.467 334.979C936.927 334.979 956.956 314.959 956.956 290.51C956.956 266.061 936.927 246.041 912.467 246.041C888.007 246.041 867.978 266.061 867.978 290.51ZM622.183 290.51C622.183 314.959 642.211 334.979 666.671 334.979C691.131 334.979 711.16 314.959 711.16 290.51C711.16 266.061 691.131 246.041 666.671 246.041C642.211 246.041 622.183 266.061 622.183 290.51ZM499.329 290.51C499.329 314.959 519.358 334.979 543.818 334.979C568.278 334.979 588.307 314.959 588.307 290.51C588.307 266.061 568.278 246.041 543.818 246.041C519.358 246.041 499.329 266.061 499.329 290.51ZM370.738 290.51C370.738 314.959 390.744 334.979 415.226 334.979C439.708 334.979 459.715 314.959 459.715 290.51C459.715 266.061 439.686 246.041 415.226 246.041C390.766 246.041 370.738 266.061 370.738 290.51ZM247.884 290.51C247.884 314.959 267.913 334.979 292.373 334.979C316.833 334.979 336.862 314.959 336.862 290.51C336.862 266.061 316.833 246.041 292.373 246.041C267.913 246.041 247.884 266.061 247.884 290.51ZM124.92 290.51C124.92 314.959 144.949 334.979 169.409 334.979C193.869 334.979 213.898 314.959 213.898 290.51C213.898 266.061 193.869 246.041 169.409 246.041C144.949 246.041 124.92 266.061 124.92 290.51ZM867.956 167.49C867.956 191.939 887.985 211.959 912.445 211.959C936.905 211.959 956.933 191.939 956.933 167.49C956.933 143.041 936.905 123.021 912.445 123.021C887.985 123.021 867.956 143.041 867.956 167.49ZM745.103 167.49C745.103 191.939 765.131 211.959 789.591 211.959C814.051 211.959 834.08 191.939 834.08 167.49C834.08 143.041 814.051 123.021 789.591 123.021C765.131 123.021 745.103 143.041 745.103 167.49ZM622.139 167.49C622.139 191.939 642.167 211.959 666.627 211.959C691.087 211.959 711.116 191.939 711.116 167.49C711.116 143.041 691.087 123.021 666.627 123.021C642.167 123.021 622.139 143.041 622.139 167.49ZM499.285 167.49C499.285 191.939 519.314 211.959 543.774 211.959C568.234 211.959 588.263 191.939 588.263 167.49C588.263 143.041 568.234 123.021 543.774 123.021C519.314 123.021 499.285 143.041 499.285 167.49ZM370.694 167.49C370.694 191.939 390.7 211.959 415.182 211.959C439.664 211.959 459.671 191.939 459.671 167.49C459.671 143.041 439.642 123.021 415.182 123.021C390.722 123.021 370.694 143.041 370.694 167.49ZM124.898 167.49C124.898 191.939 144.927 211.959 169.387 211.959C193.846 211.959 213.875 191.939 213.875 167.49C213.875 143.041 193.846 123.021 169.387 123.021C144.927 123.021 124.898 143.041 124.898 167.49ZM2.04435 167.49C2.04435 191.939 22.0733 211.959 46.5332 211.959C70.9931 211.959 91.022 191.939 91.022 167.49C91.022 143.041 70.9931 123.021 46.5332 123.021C22.0733 123.021 2.04435 143.041 2.04435 167.49ZM867.912 44.4692C867.912 68.9183 887.941 88.9381 912.401 88.9381C936.861 88.9381 956.889 68.9183 956.889 44.4692C956.889 20.0201 936.861 0 912.401 0C887.941 0 867.912 20.0201 867.912 44.4692ZM622.117 44.4692C622.117 68.9183 642.145 88.9381 666.605 88.9381C691.065 88.9381 711.094 68.9183 711.094 44.4692C711.094 20.0201 691.065 0 666.605 0C642.145 0 622.117 20.0201 622.117 44.4692ZM499.263 44.4692C499.263 68.9183 519.292 88.9381 543.752 88.9381C568.211 88.9381 588.24 68.9183 588.24 44.4692C588.24 20.0201 568.211 0 543.752 0C519.292 0 499.263 20.0201 499.263 44.4692ZM370.671 44.4692C370.671 68.9183 390.678 88.9381 415.16 88.9381C439.642 88.9381 459.649 68.9183 459.649 44.4692C459.649 20.0201 439.62 0 415.16 0C390.7 0 370.671 20.0201 370.671 44.4692ZM247.818 44.4692C247.818 68.9183 267.846 88.9381 292.306 88.9381C316.766 88.9381 336.795 68.9183 336.795 44.4692C336.795 20.0201 316.766 0 292.306 0C267.846 0 247.818 20.0201 247.818 44.4692ZM124.854 44.4692C124.854 68.9183 144.882 88.9381 169.342 88.9381C193.802 88.9381 213.831 68.9404 213.831 44.4692C213.831 19.9979 193.802 0 169.342 0C144.882 0 124.854 20.0201 124.854 44.4692ZM2 44.4692C2 68.9183 22.0289 88.9381 46.4888 88.9381C70.9488 88.9381 90.9777 68.9404 90.9777 44.4692C90.9777 19.9979 70.9488 0 46.4888 0C22.0289 0 2 20.0201 2 44.4692Z"
        fill="white" />
      <rect width="912" height="507" transform="matrix(-1 0 0 1 912 0)" fill="url(#paint0_linear_1254_103610)" />
      <defs>
        <linearGradient id="paint0_linear_1254_103610" x1="819.56" y1="274.5" x2="0.070368" y2="289.396"
          gradientUnits="userSpaceOnUse">
          <stop offset="0.168078" stop-color="#0D0D0D" />
          <stop offset="1" stop-color="#0D0D0D" stop-opacity="0.9" />
        </linearGradient>
      </defs>
    </svg>
  </div>
</section>