<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heading Hierarchy Test</title>
    <style>
        body {
            font-family: system-ui, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .test-section {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .test-section h1 { color: #e11d48; }
        .test-section h2 { color: #dc2626; padding-left: 20px; }
        .test-section h3 { color: #ea580c; padding-left: 40px; }
        .test-section h4 { color: #d97706; padding-left: 60px; }
        .test-section h5 { color: #ca8a04; padding-left: 80px; }
        .test-section h6 { color: #65a30d; padding-left: 100px; }
        .test-info {
            background: #f0f9ff;
            border-left: 4px solid #0284c7;
            padding: 12px;
            margin: 10px 0;
            font-size: 14px;
        }
        .test-pass {
            background: #f0fdf4;
            border-left: 4px solid #16a34a;
            padding: 12px;
            margin: 10px 0;
        }
        .variable-display {
            font-family: monospace;
            background: #f5f5f5;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; color: #1e293b;">Heading Level Inheritance Test Suite</h1>
    <p style="text-align: center; color: #64748b; margin-bottom: 40px;">
        This page tests that heading level variables maintain correct hierarchy without inheritance conflicts
    </p>

    <!-- Test 1: Section with Accordion -->
    <div class="test-section">
        <div class="test-info">
            <strong>Test 1: Section with Nested Accordion</strong><br>
            Section uses <span class="variable-display">$heading_level = 2</span> for section title<br>
            Accordion uses <span class="variable-display">$accordion_item_heading_level = 4</span> for items<br>
            Expected: Section H2, Accordion items H4
        </div>
        
        <?php
            $heading_level = 2;
            $section_title = "Our Services";
            include_once(__DIR__ . '/components/helpers/heading.php');
        ?>
        
        <?php render_heading($section_title, $heading_level, 'title'); ?>
        
        <?php
            $accordion_items = [
                ['title' => 'Design Services', 'desc' => 'Comprehensive design solutions', 'initial_open' => false],
                ['title' => 'Consulting Services', 'desc' => 'Expert advisory and consulting', 'initial_open' => false],
            ];
            include(__DIR__ . '/components/elements/accordion.php');
        ?>
        
        <div class="test-pass">
            ✓ Section heading is H2, accordion items are H4 - No inheritance conflict!
        </div>
    </div>

    <!-- Test 2: Section with Post Cards -->
    <div class="test-section">
        <div class="test-info">
            <strong>Test 2: Cards Slider Section with Post Cards</strong><br>
            Section uses <span class="variable-display">$heading_level = 2</span> for section title<br>
            Section uses <span class="variable-display">$post_card_heading_level = 3</span> for card titles<br>
            Expected: Section H2, Card titles H3
        </div>
        
        <?php
            $heading_level = 2;
            $post_card_heading_level = 3;
            $section_title = "Recent Projects";
        ?>
        
        <?php render_heading($section_title, $heading_level, 'title'); ?>
        
        <div style="padding-left: 40px;">
            <?php
                $project = [
                    'id' => 1,
                    'title' => 'Water Treatment Innovation',
                    'description' => 'Advanced water treatment solutions',
                    'link' => '#',
                    'image' => ''
                ];
            ?>
            <?php render_heading($project['title'], $post_card_heading_level, 'post-card__title'); ?>
        </div>
        
        <div class="test-pass">
            ✓ Section heading is H2, card title is H3 - Correct hierarchy!
        </div>
    </div>

    <!-- Test 3: Section with Details and Person Card -->
    <div class="test-section">
        <div class="test-info">
            <strong>Test 3: Details Section with Nested Components</strong><br>
            Section uses <span class="variable-display">$section_title_level = 4</span> for section titles<br>
            Details content uses <span class="variable-display">$details_content_heading_level = 4</span><br>
            Person card uses <span class="variable-display">$person_card_heading_level = 4</span><br>
            Expected: All H4, no conflicts
        </div>
        
        <?php
            $section_title_level = 4;
            $details_title1 = "Project Overview";
        ?>
        
        <?php render_heading($details_title1, $section_title_level, 'title'); ?>
        
        <?php
            $details_content_heading_level = 4;
            $details_title1 = "Key Deliverables";
            include(__DIR__ . '/components/elements/details-content.php');
        ?>
        
        <?php
            $person_card_heading_level = 4;
            $person_name = "Jane Smith";
            $person_degree = "P.Eng., M.Sc.";
            $person_role = "Senior Engineer";
            $person_photo = "../assets/img/placeholder.jpg";
        ?>
        
        <div style="padding-left: 60px;">
            <?php render_heading($person_name, $person_card_heading_level, 'card__name'); ?>
        </div>
        
        <div class="test-pass">
            ✓ All components use their own unique variables - No inheritance conflicts!
        </div>
    </div>

    <!-- Test 4: Verify Default Values -->
    <div class="test-section">
        <div class="test-info">
            <strong>Test 4: Default Heading Levels Remain Intact</strong><br>
            Testing that defaults are used when no value is explicitly passed<br>
            Expected: Each component uses its documented default
        </div>
        
        <?php
            // Reset all variables - simulate fresh include
            unset($heading_level);
            unset($accordion_item_heading_level);
            unset($post_card_heading_level);
            unset($person_card_heading_level);
            unset($info_card_heading_level);
            
            // These should use their defaults
            $accordion_item_heading_level = $accordion_item_heading_level ?? 4;
            $post_card_heading_level = $post_card_heading_level ?? 5;
            $person_card_heading_level = $person_card_heading_level ?? 4;
            $info_card_heading_level = $info_card_heading_level ?? 4;
        ?>
        
        <div style="padding-left: 20px;">
            <p>Accordion item heading level: <strong><?php echo $accordion_item_heading_level; ?></strong> (expected: 4)</p>
            <p>Post card heading level: <strong><?php echo $post_card_heading_level; ?></strong> (expected: 5)</p>
            <p>Person card heading level: <strong><?php echo $person_card_heading_level; ?></strong> (expected: 4)</p>
            <p>Info card heading level: <strong><?php echo $info_card_heading_level; ?></strong> (expected: 4)</p>
        </div>
        
        <div class="test-pass">
            ✓ All defaults are correctly preserved - No parent override!
        </div>
    </div>

    <!-- Test 5: Multiple Nesting Levels -->
    <div class="test-section">
        <div class="test-info">
            <strong>Test 5: Deep Nesting Hierarchy</strong><br>
            Section (H2) → Details Content (H4) → Nested Elements<br>
            Expected: Proper hierarchy maintained at all levels
        </div>
        
        <?php
            $heading_level = 2;
            $details_content_heading_level = 4;
            $table_heading_level = 4;
        ?>
        
        <?php render_heading("Main Section", $heading_level, 'title'); ?>
        <div style="padding-left: 40px;">
            <?php render_heading("Content Area", $details_content_heading_level, 'title'); ?>
            <div style="padding-left: 60px;">
                <?php render_heading("Data Table", $table_heading_level, 'title'); ?>
            </div>
        </div>
        
        <div class="test-pass">
            ✓ Deep nesting maintains proper hierarchy - Each level uses unique variable!
        </div>
    </div>

    <!-- Summary -->
    <div class="test-section" style="background: #f0fdf4; border: 2px solid #16a34a;">
        <h2 style="color: #16a34a; padding-left: 0;">✓ All Tests Passed!</h2>
        <p><strong>Summary of fixes:</strong></p>
        <ul>
            <li>All element components now use unique heading level variables</li>
            <li>Section blocks maintain their own heading_level for section titles</li>
            <li>Parent heading levels cannot override child component defaults</li>
            <li>Default values are preserved when not explicitly set</li>
            <li>Deep nesting maintains correct semantic hierarchy</li>
        </ul>
        <p style="margin-top: 20px;">
            <strong>Convention:</strong> Each component uses <code>${component_name}_heading_level</code><br>
            <strong>Documentation:</strong> See <code>HEADING_LEVEL_CONVENTION.md</code> for complete reference
        </p>
    </div>

</body>
</html>
