<?php
// Default heading levels
// Note: Use unique variable names to prevent inheritance conflicts with nested components
$category_nav_section_heading_level = $category_nav_section_heading_level ?? 4;  // For the "Select an industry" heading
$category_navigation_card_heading_level = $category_navigation_card_heading_level ?? 5;  // For individual category card titles
include_once(__DIR__ . '/../helpers/heading.php');

$industries = [
    [
        'name' => 'Agri-Foods',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/4f/20170917-RD-PJK-0043_TONED_%2837154688676%29.jpg',
        'desc' => 'Early phase project development services helping you build a compelling final investment decision in high-consequence environments.',
        'slug' => 'define',
        'subitems' =>[
            [
                'name' => 'Project Development',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/4f/20170917-RD-PJK-0043_TONED_%2837154688676%29.jpg',
                'desc' => 'Early phase project development services helping you build a compelling final investment decision in high-consequence environments.',
                'slug' => 'project-development'
            ],
            [
                'name' => 'Laboratory Services ',
                'image' => 'https://straydoginstitute.org/wp-content/uploads/2021/07/shutterstock_1282334635.jpg',
                'desc' => 'Providing scalable solutions for the rapidly growing electric vehicle and battery material supply chain sectors.',
                'slug' => 'laboratory-services'
            ],
            [
                'name' => 'Permitting & Regulatory Engagement',
                'image' => 'https://d6fiz9tmzg8gn.cloudfront.net/wp-content/uploads/2023/07/Blog2-5.jpg',
                'desc' => 'Optimizing processing plants for higher efficiency and lower environmental impact through advanced engineering.',
                'slug' => 'regulatory-engagement'
            ],
            [
                'name' => 'Sustainability Planning',
                'image' => 'https://images.stockcake.com/public/8/c/7/8c7936bc-2068-4f27-8387-6b7e617c6b8c_large/agriculture-meets-industry-stockcake.jpg',
                'desc' => 'Building resilient infrastructure for data centers to ensure uptime and sustainability.',
                'slug' => 'planning'
            ],
            [
                'name' => 'Commercial Models',
                'image' => 'https://images.stockcake.com/public/8/c/7/8c7936bc-2068-4f27-8387-6b7e617c6b8c_large/agriculture-meets-industry-stockcake.jpg',
                'desc' => 'Building resilient infrastructure for data centers to ensure uptime and sustainability.',
                'slug' => 'planning'
            ],
        ],
    ],
    [
        'name' => 'Agri-Foods',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/4f/20170917-RD-PJK-0043_TONED_%2837154688676%29.jpg',
        'desc' => 'Early phase project development services helping you build a compelling final investment decision in high-consequence environments.',
        'slug' => 'agri-foods'
    ],
    [
        'name' => 'Battery & EV Materials',
        'image' => 'https://straydoginstitute.org/wp-content/uploads/2021/07/shutterstock_1282334635.jpg',
        'desc' => 'Providing scalable solutions for the rapidly growing electric vehicle and battery material supply chain sectors.',
        'slug' => 'battery-ev'
    ],
    [
        'name' => 'Chemicals and Metals Processing',
        'image' => 'https://d6fiz9tmzg8gn.cloudfront.net/wp-content/uploads/2023/07/Blog2-5.jpg',
        'desc' => 'Optimizing processing plants for higher efficiency and lower environmental impact through advanced engineering.',
        'slug' => 'chemicals-metals'
    ],
    [
        'name' => 'Data Infrastructure',
        'image' => 'https://images.stockcake.com/public/8/c/7/8c7936bc-2068-4f27-8387-6b7e617c6b8c_large/agriculture-meets-industry-stockcake.jpg',
        'desc' => 'Building resilient infrastructure for data centers to ensure uptime and sustainability.',
        'slug' => 'data-infrastructure'
    ],
    [
        'name' => 'Food and Beverage Manufacturing',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMiR_wQ0cWyibxDyjCRMMjdrXHOoYGgYxphA&s',
        'desc' => 'Streamlining manufacturing lines to meet global food safety standards and production targets.',
        'slug' => 'food-beverage'
    ],
    [
        'name' => 'Resorts and Hospitality',
        'image' => 'https://res.cloudinary.com/zenbusiness/image/upload/q_auto,w_960/v1/zbremote/articles/farmer-on-tractor-working.jpg',
        'desc' => 'Engineering experiences that blend luxury with operational efficiency for world-class resorts.',
        'slug' => 'resorts'
    ],
    [
        'name' => 'Hydrogen Production',
        'image' => 'https://sageuniversity.edu.in/assets/images/blog/role-of-agro-based-industries-in-sustainable-development.webp',
        'desc' => 'Pioneering green hydrogen production facilities for a sustainable energy future.',
        'slug' => 'hydrogen'
    ],
    [
        'name' => 'Healthcare and Medical Technology',
        'image' => 'https://www.tstar.com/hubfs/images/Blog_2020-Ag-2.jpg',
        'desc' => 'Supporting the healthcare sector with precise engineering for medical facilities and technology hubs.',
        'slug' => 'healthcare'
    ],
    [
        'name' => 'Mining Metals and Minerals',
        'image' => 'https://eos.com/wp-content/uploads/2024/10/industrial-agriculture-crop-storage.jpg.webp',
        'desc' => 'Sustainable extraction and processing solutions for the modern mining industry.',
        'slug' => 'mining'
    ],
     [
        'name' => 'Oil and Gas',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSPIBvgHbYQZuE_Q9rYEIxJQbvgiCtDM6JgQ&s',
        'desc' => 'Innovative approaches to traditional energy sectors focusing on efficiency and safety.',
        'slug' => 'oil-gas'
    ],
];
?>

<link rel="stylesheet" href="../assets/css/section-block_category_navigation.css" />

<section class="block-category-navigation" id="industries">
  <div class="category-navigation__wrapper">

    <div class="category-navigation__nav-container">
      <div class="heading">
        <?php render_heading('Select an industry', $category_nav_section_heading_level, 'title title--h3'); ?>
      </div>
      <ul class="category-navigation__nav" id="industryList">
        <?php foreach ($industries as $index => $item):
        $has_subitems = isset($item['subitems']) && !empty($item['subitems']);
    ?>
        <li
          class="category-navigation__nav-item <?php echo ($index === 0) ? 'active' : ''; ?> <?php echo $has_subitems ? 'has-subitems' : ''; ?>"
          data-image="<?php echo htmlspecialchars($item['image']); ?>"
          data-title="<?php echo htmlspecialchars($item['name']); ?>"
          data-desc="<?php echo htmlspecialchars($item['desc']); ?>"
          data-link="/industry#<?php echo htmlspecialchars($item['slug']); ?>">

          <div class="category-navigation__item-header">
            <span><?php echo $item['name']; ?></span>
          </div>

          <?php if ($has_subitems): ?>
          <ul class="category-navigation__sublist">
            <?php foreach ($item['subitems'] as $sub): ?>
            <li class="category-navigation__subitem" data-image="<?php echo htmlspecialchars($sub['image']); ?>"
              data-title="<?php echo htmlspecialchars($sub['name']); ?>"
              data-desc="<?php echo htmlspecialchars($sub['desc']); ?>"
              data-link="/industry#<?php echo htmlspecialchars($sub['slug']); ?>">
              <div class="category-navigation__item-header">
                <span><?php echo $sub['name']; ?></span>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="category-navigation__content">
      <a class="block-card-category-navigation" id="industryCard" href="/industry#<?php echo $industries[0]['slug']; ?>"
        id="cardLink" aria-label="Explore <?php echo $industries[0]['name']; ?> industry">
        <div class="card-category-navigation__image-wrapper">
          <img src="<?php echo $industries[0]['image']; ?>" alt="<?php echo $industries[0]['name']; ?>" id="cardImage">
        </div>

        <div class="card-category-navigation__overlay">
          <div class="card-category-navigation__info">
            <?php
              // This heading will be updated dynamically via JavaScript
              // Note: The arrow icon must remain inside the heading for JS updates
              $heading_content = $industries[0]['name'] . '
              <span class="arrow-icon card-category-navigation__arrow-icon">
                <svg id="arrow-top-right" viewBox="0 0 24 24">
                  <path class="icon-arrow" fill="currentColor"
                    d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z" />
                </svg>
              </span>';
              render_heading($heading_content, $category_navigation_card_heading_level, 'card-category-navigation__title card-category-navigation__title--h4', ['id' => 'cardTitle'], true);
            ?>
            <p class="card-category-navigation__desc" id="cardDesc">
              <?php echo $industries[0]['desc']; ?>
            </p>
          </div>
        </div>
      </a>

      <p class="category-navigation__note">
        Can't find your sector represented? Please contact us for a <a href="/contact" aria-label="Contact us">
          customized credentials package</a> .
        <!-- Can't find your sector represented? Please <a href="/contact">contact</a> us for a customized credentials package. -->
      </p>
    </div>
  </div>
</section>

<script type='text/javascript' src="../assets/js/section-block_category_navigation.js"></script>