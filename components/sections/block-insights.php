<?php
$pillar_title = "build operational capability and performance assurance";
$pillar_text_1 = "Project and operating teams need confidence in how systems will behave as facilities progress through start-up, early operation, and periods of performance drift. ";
$pillar_text_2 = "We help build accountable systems by translating technical expertise into commissioning practices, operating approaches, and remote oversight models that support predictable, repeatable, and manageable system performance.";
$person_img = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-Emm-WZJFsctCWVqUFfEdtxlePFH7hZKNFQ&s";
$card_description = "Integrated Sustainability Highlighted in Propeller Case Study: Part One ";
$card_link = "/wp-content/themes/integrate/frontend/pages/insights.php";

$link_text = "Explore our Operations and <br> Maintenance Services";
$link_url = "/operations";
$custom_icon = "../assets/img/linkIconArrowRight.svg";

?>

<link rel="stylesheet" href="../assets/css/section-block_insights.css" />
<link rel="stylesheet" href="../assets/css/components-gradient_link.css" />
<link rel="stylesheet" href="../assets/css/components-person_card.css" />

<section class="block-insights" id="pilar3">
  <div class="block-insights__wrapper">

    <div class="block-insights__description block-insights__col--text">
      <?php if (!empty($pillar_number)): ?>
      <p class="tagline"><?php echo $pillar_number; ?></p>
      <?php endif; ?>

      <div class="heading">
        <h1 class="title title--h1"><?php echo $pillar_title; ?></h1>
      </div>

      <div class="text-content text-content--grey">
        <p><?php echo $pillar_text_1; ?></p>
        <p><?php echo $pillar_text_2; ?></p>
      </div>

      <!-- <div class="link_wrapper">
              <div class="gradient-link gradient-link--large">
                <a href="/wp-content/themes/integrate/frontend/pages/insights.php" aria-label="Insights & Whitepapers ">
                  <p class="gradient-link__text">Insights & Whitepapers </p>
                  <span class="arrow-icon">
                    <svg id="arrow-top-right-gradient" viewBox="0 0 24 24">
                        <path class="icon-arrow" fill="currentColor" d="M22.32 21.729 22.5 0C17.059.053 6.212.128.771.18L.725 2.901c4.897-.049 11.394-.088 17.111-.14L0 20.595 1.903 22.5 19.74 4.664l-.154 17.098 2.734-.03v-.003Z"/>
                    </svg>
                  </span>
                </a>
              </div>
            </div> -->

      <div class="block-insights__action">
        <?php if ($link_url): ?>
        <a href="<?php echo $link_url; ?>" class="link-icon"
          aria-label="<?php echo $link_text ? $link_text : 'View Section'; ?>">
          <span class="icon icon--active">
            <img class="icon-img" src="<?php echo $custom_icon; ?>" alt="Link Icon">
          </span>
        </a>
        <?php if ($link_text): ?>
        <span class="action-text">
          <?php echo $link_text; ?>
        </span>
        <?php endif; ?>
        <?php endif; ?>
      </div>

    </div>

    <div class="block-insights__media">
      <div class="insights-card__image-wrapper">
        <img class="insights-card__image" src="../assets/img/insights.png"
          alt="picture representing <?php echo $pillar_title; ?>" />
        <!-- <div class="insights-person-card__wrapper">
                <div class="person-card">
                  <a href="<?php echo $card_link; ?>" class="person-card__link" aria-label="Learn more">
                    <div class="person-card__image-container">
                        <img src="<?php echo $person_img; ?>" alt="person photo" class="person-card__image">
                    </div>
                    <div class="person-card__info">
                        <h4 class="card__name"><?php echo $person_name; ?></h4>
                        <p class="card__credentials"><?php echo $person_credentials; ?></p>
                        <p class="card__title"><?php echo $person_title; ?></p>
                    </div>
                   </a>
                </div>
              </div> -->
      </div>
    </div>
  </div>
</section>