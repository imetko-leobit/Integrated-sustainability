<?php
// Optional parameter to control text positioning
// Set $text_below = true to position text below the image
if (!isset($text_below)) {
    $text_below = false;
}
// Ensure $text_below is a boolean
$text_below = (bool) $text_below;
// Default heading level
$block_projects_heading_level = $block_projects_heading_level ?? 4;
include_once __DIR__ . '/../helpers/heading.php';

$projects = [
    [
        'title'             => '600m³/day mine water treatment plant design & commissioning',
        'desc'              => 'Our client was planning to use breakpoint chlorination (BPC) to manage the ammonia concentrations within the underground water at a Mine in the Yukon. The work included detailed research, design, and commissioning of the plant.',
        'image_url'         => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_SwmZu1t5AW2DxK0oL1Qg0GaNeFrCOrFjEA&s',
        'project_portfolio' => '/portfolio/1',
    ],
    [
        'title'             => 'Industrial Wastewater Treatment Facility Upgrade',
        'desc'              => 'We executed a major upgrade to an existing industrial wastewater facility to meet stringent new environmental compliance standards. The project focused on modular expansion and operational efficiency.',
        'image_url'         => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSPIBvgHbYQZuE_Q9rYEIxJQbvgiCtDM6JgQ&s',
        'project_portfolio' => '/portfolio/2',
    ],
    [
        'title'             => 'Hydroelectric Dam Decommissioning',
        'desc'              => 'A comprehensive, multi-year project involving environmental impact assessment, public consultation, and safe removal of a decommissioned hydroelectric dam structure and restoration of the natural river flow.',
        'image_url'         => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMiR_wQ0cWyibxDyjCRMMjdrXHOoYGgYxphA&s',
        'project_portfolio' => '/portfolio/3',
    ],
];

$portfolio_links      = array_column($projects, 'project_portfolio');
$portfolio_links_json = json_encode($portfolio_links);

$projects_page_link = '/insights';

// Build CSS class with modifier if text_below is enabled
$wrapper_class = 'block-projects__wrapper' . ($text_below ? ' block-projects__wrapper--text-below' : '');
?>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="../assets/css/section-block_projects.css" />
<link rel="stylesheet" href="../assets/css/components-gradient_link.css" />
<section class="block-projects">
  <div class="<?php echo htmlspecialchars($wrapper_class, ENT_QUOTES, 'UTF-8'); ?>">

    <div class="block-projects__media block-projects__col--image">
      <div class="swiper-container js-projects-image-slider">
        <div class="swiper-wrapper">
          <?php foreach ($projects as $project): ?>
          <div class="swiper-slide block-projects__slide-image">
            <img src="<?php echo $project['image_url']; ?>" alt="<?php echo $project['title']; ?>" />
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="block-projects__description block-projects__col--text">

      <div class="swiper-container js-projects-text-slider">
        <div class="swiper-wrapper">
          <?php foreach ($projects as $project): ?>
          <div class="swiper-slide block-projects__slide-text">

            <div class="projects-navigation">
              <button class="btn btn--arrow js-projects-prev" aria-label="Previous Project">
                <svg viewBox="0 0 27 15">
                  <use xlink:href="#arrow-left"></use>
                </svg>
              </button>
              <button class="btn btn--arrow btn-next js-projects-next" aria-label="Next Project">
                <svg viewBox="0 0 27 15">
                  <use xlink:href="#arrow-right"></use>
                </svg>
              </button>
            </div>
            <div class="heading">
              <?php render_heading($project['title'], $block_projects_heading_level, 'title title--h4'); ?>
            </div>
            <div class="text-content text-content--grey">
              <p><?php echo $project['desc']; ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="block-projects__links">
        <div class="gradient-link gradient-link--large">
          <a href="/wp-content/themes/integrate/frontend/pages/insights.php" aria-label="Insights & Whitepapers ">
            <p class="gradient-link__text">Insights & Whitepapers </p>
            <span class="arrow-icon">
              <svg id="arrow-top-right-gradient" viewBox="0 0 24 24">
                <path class="icon-arrow" fill="currentColor"
                  d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z" />
              </svg>
            </span>
          </a>
        </div>
        <a href="<?php echo $projects[0]['project_portfolio']; ?>" class="link link--text js-project-portfolio-link"
          data-portfolio-links='<?php echo htmlspecialchars($portfolio_links_json, ENT_QUOTES, 'UTF-8'); ?>'>
          View Project Portfolio
        </a>
      </div>
    </div>
  </div>
</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type='text/javascript' src="../assets/js/section-block_projects.js"></script>
