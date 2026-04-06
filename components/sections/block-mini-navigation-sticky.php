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
        ['label' => 'Overview',     'url' => '#overview'],
        ['label' => 'Services',     'url' => '#services'],
        ['label' => 'Projects',     'url' => '#projects'],
        ['label' => 'Team',         'url' => '#team'],
        ['label' => 'Contact',      'url' => '#contact'],
    ];

    $left_icon_label  = $left_icon_label  ?? 'Downloads';
    $right_icon_label = $right_icon_label ?? 'Share';

    // Note: This component uses SVG sprite icons (#arrow-down, #arrow-top-right).
    // Ensure the SVG sprite is included in the page layout (e.g. via _header.php).
?>
<link rel="stylesheet" href="../assets/css/components-mini_navigation_sticky.css" />

<div class="mini-nav-sticky" role="navigation" aria-label="Section Navigation">
    <div class="mini-nav-sticky__inner">

        <!-- Left Column: icon + label -->
        <div class="mini-nav-sticky__col mini-nav-sticky__col--left">
            <span class="mini-nav-sticky__icon" aria-hidden="true">
                <svg viewBox="0 0 27 15">
                    <use xlink:href="#arrow-down"></use>
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
            <span class="mini-nav-sticky__label"><?php echo htmlspecialchars($right_icon_label); ?></span>
            <span class="mini-nav-sticky__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24">
                    <use xlink:href="#arrow-top-right"></use>
                </svg>
            </span>
        </div>

    </div>
</div>
