<?php
// Sample team data - in production this would come from a database or API
$team_members = [
    // Row 1
    [
        'name' => 'John Smith',
        'additional_info' => 'Ph.D., P.Eng.',
        'position' => 'Senior Water Engineer',
        'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop',
        'row' => 1
    ],
    [
        'name' => 'Sarah Johnson',
        'additional_info' => 'M.Sc., Environmental Sciences',
        'position' => 'Environmental Consultant',
        'photo' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=500&fit=crop',
        'row' => 1
    ],
    [
        'name' => 'Michael Chen',
        'additional_info' => 'B.Eng., Civil Engineering',
        'position' => 'Project Manager',
        'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=500&fit=crop',
        'row' => 1
    ],
    [
        'name' => 'Emily Davis',
        'additional_info' => 'Ph.D., Hydrogeology',
        'position' => 'Lead Hydrogeologist',
        'photo' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&h=500&fit=crop',
        'row' => 1
    ],
    [
        'name' => 'David Wilson',
        'additional_info' => 'M.Eng., Water Resources',
        'position' => 'Water Resources Specialist',
        'photo' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=500&fit=crop',
        'row' => 1
    ],
    [
        'name' => 'Lisa Anderson',
        'additional_info' => 'B.Sc., Chemistry',
        'position' => 'Water Quality Analyst',
        'photo' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=400&h=500&fit=crop',
        'row' => 1
    ],
    // Row 2
    [
        'name' => 'Robert Taylor',
        'additional_info' => 'P.Eng., Mechanical',
        'position' => 'Infrastructure Engineer',
        'photo' => 'https://images.unsplash.com/photo-1519345182560-3f2917c472ef?w=400&h=500&fit=crop',
        'row' => 2
    ],
    [
        'name' => 'Jennifer Martinez',
        'additional_info' => 'M.Sc., Environmental Management',
        'position' => 'Sustainability Coordinator',
        'photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400&h=500&fit=crop',
        'row' => 2
    ],
    [
        'name' => 'James Brown',
        'additional_info' => 'B.Eng., Process Engineering',
        'position' => 'Process Engineer',
        'photo' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=400&h=500&fit=crop',
        'row' => 2
    ],
    [
        'name' => 'Amanda White',
        'additional_info' => 'Ph.D., Environmental Engineering',
        'position' => 'Research Director',
        'photo' => 'https://images.unsplash.com/photo-1489424731084-a5d8b219a5bb?w=400&h=500&fit=crop',
        'row' => 2
    ],
    [
        'name' => 'Daniel Garcia',
        'additional_info' => 'M.Eng., Geotechnical',
        'position' => 'Geotechnical Engineer',
        'photo' => 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=400&h=500&fit=crop',
        'row' => 2
    ],
    [
        'name' => 'Sophia Lee',
        'additional_info' => 'B.Sc., Data Science',
        'position' => 'Data Analyst',
        'photo' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=400&h=500&fit=crop',
        'row' => 2
    ],
    // Row 3
    [
        'name' => 'Christopher Moore',
        'additional_info' => 'P.Eng., Electrical',
        'position' => 'Controls Engineer',
        'photo' => 'https://images.unsplash.com/photo-1507591064344-4c6ce005b128?w=400&h=500&fit=crop',
        'row' => 3
    ],
    [
        'name' => 'Rachel Thompson',
        'additional_info' => 'M.Sc., Ecology',
        'position' => 'Environmental Scientist',
        'photo' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=400&h=500&fit=crop',
        'row' => 3
    ],
    [
        'name' => 'Kevin Jackson',
        'additional_info' => 'B.Eng., Mining',
        'position' => 'Mining Engineer',
        'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=500&fit=crop',
        'row' => 3
    ],
    [
        'name' => 'Nicole Harris',
        'additional_info' => 'Ph.D., Biotechnology',
        'position' => 'Biotech Specialist',
        'photo' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=500&fit=crop',
        'row' => 3
    ],
    [
        'name' => 'Matthew Clark',
        'additional_info' => 'M.Eng., Structural',
        'position' => 'Structural Engineer',
        'photo' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&h=500&fit=crop',
        'row' => 3
    ],
    [
        'name' => 'Olivia Lewis',
        'additional_info' => 'B.Sc., Environmental Policy',
        'position' => 'Policy Advisor',
        'photo' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=400&h=500&fit=crop',
        'row' => 3
    ],
];

// Configuration
$initial_visible_rows = 1; // Show only first row initially on desktop
$cards_per_row_desktop = 6;

// Group members by row
$rows = [];
foreach ($team_members as $member) {
    $row_num = $member['row'];
    if (!isset($rows[$row_num])) {
        $rows[$row_num] = [];
    }
    $rows[$row_num][] = $member;
}

// Row titles for mobile
$row_titles = [
    1 => 'Leadership Team',
    2 => 'Technical Specialists',
    3 => 'Support Staff',
];
?>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="../assets/css/components-team_member_card.css" />
<link rel="stylesheet" href="../assets/css/section-block_team_cards.css" />

<section class="block-team-cards">
    <?php foreach ($rows as $row_num => $row_members): 
        $is_hidden = $row_num > $initial_visible_rows ? 'is-hidden' : '';
    ?>
    <div class="block-team-cards__row <?php echo $is_hidden; ?>" data-row="<?php echo $row_num; ?>">
        <!-- Mobile: Row title and navigation -->
        <div class="block-team-cards__mobile-header">
            <h3 class="block-team-cards__row-title"><?php echo $row_titles[$row_num]; ?></h3>
            <div class="block-team-cards__mobile-nav">
                <button class="btn btn--arrow js-team-prev-<?php echo $row_num; ?>" aria-label="Previous team member">
                    <svg viewBox="0 0 27 15">
                        <use xlink:href="#arrow-left"></use>
                    </svg>
                </button>
                <button class="btn btn--arrow js-team-next-<?php echo $row_num; ?>" aria-label="Next team member">
                    <svg viewBox="0 0 27 15">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Desktop: Grid layout -->
        <div class="block-team-cards__grid">
            <?php foreach ($row_members as $member): 
                $member_name = $member['name'];
                $member_additional_info = $member['additional_info'];
                $member_position = $member['position'];
                $member_photo = $member['photo'];
            ?>
            <div class="block-team-cards__card">
                <?php include('../components/elements/team-member-card.php'); ?>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Mobile: Swiper slider -->
        <div class="block-team-cards__slider swiper js-team-slider-<?php echo $row_num; ?>">
            <div class="swiper-wrapper">
                <?php foreach ($row_members as $member): 
                    $member_name = $member['name'];
                    $member_additional_info = $member['additional_info'];
                    $member_position = $member['position'];
                    $member_photo = $member['photo'];
                ?>
                <div class="swiper-slide">
                    <?php include('../components/elements/team-member-card.php'); ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- Load More Button (Desktop only) -->
    <div class="block-team-cards__actions">
        <button class="btn btn--gradient js-load-more-team">
            Load More
        </button>
    </div>
</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type='text/javascript' src="../assets/js/section-block_team_cards.js"></script>
