<?php
    /**
     * Block: Mini Navigation Sticky
     *
     * Variables:
     *   $nav_items         (array)  - Array of nav items: [['label' => '', 'url' => ''], ...]
     *   $left_icon_label   (string) - Label for the left action column
     *   $right_icon_label  (string) - Label for the right action column
     */

    $nav_items = $nav_items ?? [
        ['label' => 'Critical Challenges',     'url' => '#overview'],
        ['label' => 'Our Approach',     'url' => '#services'],
        ['label' => 'Latest Experience',     'url' => '#projects'],
        ['label' => 'FAQ',         'url' => '#team'],
        ['label' => 'Unified Project Delivery',      'url' => '#contact'],
    ];

    $left_icon_label  = $left_icon_label  ?? 'Download Article';
    $right_icon_label = $right_icon_label ?? 'Request Credentials';

    // Note: This component uses SVG sprite icons (#arrow-down, #arrow-top-right).
    // Ensure the SVG sprite is included in the page layout (e.g. via _header.php).
?>
<link rel="stylesheet" href="../assets/css/section-block_mini_navigation_sticky.css" />

<div class="mini-nav-sticky" role="navigation" aria-label="Section Navigation">
    <div class="mini-nav-sticky__inner">

        <!-- Left Column: icon + label -->
        <div class="mini-nav-sticky__col mini-nav-sticky__col--left">
            <span class="mini-nav-sticky__icon" aria-hidden="true">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="22" height="22" rx="11" fill="white"/>
                  <mask id="mask0_11537_18214" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="7" y="5" width="8" height="12">
                  <path d="M8.08594 16.0391L8.08594 5.52246L13.9141 5.52246L13.9141 16.0391L8.08594 16.0391Z" fill="white" stroke="white" stroke-width="0.25"/>
                  </mask>
                  <g mask="url(#mask0_11537_18214)">
                  <path d="M10.9116 15.9951L8.17725 13.2598L8.08936 13.1709L8.17725 13.083L8.57471 12.6846L8.66357 12.5957L10.5933 14.5254L10.5933 5.52246L11.4067 5.52246L11.4067 14.5264L13.2476 12.6846L13.3364 12.5957L13.9116 13.1709L13.8237 13.2598L11.0005 16.083L10.9116 15.9951Z" fill="black" stroke="black" stroke-width="0.25"/>
                  </g>
                </svg>
            </span>
            <span class="mini-nav-sticky__label"><?php echo htmlspecialchars($left_icon_label); ?></span>
        </div>

        <!-- Center Column: navigation menu with 5 items separated by | -->
        <nav class="mini-nav-sticky__col mini-nav-sticky__col--center" aria-label="Page sections">
            <ul class="mini-nav-sticky__menu">
                <?php foreach ($nav_items as $index => $item) : ?>
                <li class="mini-nav-sticky__menu-item">
                    <a href="<?php echo htmlspecialchars($item['url']); ?>"
                       class="mini-nav-sticky__menu-link">
                        <?php echo htmlspecialchars($item['label']); ?>
                    </a>
                    <?php if ($index < count($nav_items) - 1) : ?>
                    <span class="mini-nav-sticky__divider" aria-hidden="true">|</span>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <!-- Right Column: label + icon -->
        <div class="mini-nav-sticky__col mini-nav-sticky__col--right">
            <span class="mini-nav-sticky__icon" aria-hidden="true">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="22" height="22" rx="11" fill="white"/>
                  <g clip-path="url(#clip0_11537_18226)">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.12578 15.863L6.0356 11.2038C5.90498 10.9298 6.16621 10.7928 6.29683 10.9298L8.51797 13.2592L15.7032 5.0373C15.8338 4.9003 16.095 5.17467 15.9644 5.31167L8.38701 16C8.2564 16 8.12578 16 8.12578 15.863Z" fill="black"/>
                  </g>
                  <defs>
                  <clipPath id="clip0_11537_18226">
                  <rect width="16" height="16" fill="white" transform="translate(3 3)"/>
                  </clipPath>
                  </defs>
                </svg>
            </span>

            <span class="mini-nav-sticky__label"><?php echo htmlspecialchars($right_icon_label); ?></span>
        </div>

    </div>
</div>