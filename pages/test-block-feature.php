<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Block Feature Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .test-section {
            margin: 40px 0;
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
        }
        .test-title {
            color: #333;
            margin-bottom: 20px;
        }
        hr {
            margin: 60px 0;
            border: none;
            border-top: 3px solid #333;
        }
    </style>
</head>
<body>
    <h1>Block Feature Component - Test Page</h1>
    <p>This page tests the refactored block-feature.php component with different right-side content types.</p>

    <hr>

    <div class="test-section">
        <h2 class="test-title">Test 1: Legacy Mode - Performance Grid (Backward Compatibility)</h2>
        <p>This test ensures backward compatibility with existing code using $grid_items.</p>
        
        <?php
        // Reset all variables
        unset($tagline, $title, $paragraphs, $button, $grid_items, $center_item, $layout, $checkbox_list, $right_content);
        
        $tagline = 'Legacy Test';
        $title = 'Backward Compatible Performance Grid';
        $paragraphs = [
            'This uses the legacy $grid_items approach, which should be automatically converted to $right_content internally.',
        ];
        $button = [
            'url' => '#test1',
            'label' => 'Test Legacy Mode'
        ];
        $grid_items = [
            ['icon' => 'icon1.svg', 'label' => 'Service 1'],
            ['icon' => 'icon2.svg', 'label' => 'Service 2'],
            ['icon' => 'icon3.svg', 'label' => 'Service 3'],
            ['icon' => 'icon4.svg', 'label' => 'Service 4'],
            ['icon' => 'icon5.svg', 'label' => 'Service 5'],
            ['icon' => 'icon6.svg', 'label' => 'Service 6'],
            ['icon' => 'icon7.svg', 'label' => 'Service 7'],
            ['icon' => 'icon8.svg', 'label' => 'Service 8'],
        ];
        $center_item = [
            'type' => 'text',
            'content' => '99%'
        ];
        $layout = 'image-right';
        
        include('../components/sections/block-feature.php');
        ?>
    </div>

    <hr>

    <div class="test-section">
        <h2 class="test-title">Test 2: New Mode - Simple Image</h2>
        <p>This test uses the new $right_content variable with a simple image.</p>
        
        <?php
        // Reset all variables
        unset($tagline, $title, $paragraphs, $button, $grid_items, $center_item, $layout, $checkbox_list, $right_content);
        
        $tagline = 'Image Test';
        $title = 'Feature Block with Simple Image';
        $paragraphs = [
            'This demonstrates the new dynamic content approach using $right_content with a simple image.',
        ];
        $button = [
            'url' => '#test2',
            'label' => 'View Image Example'
        ];
        $layout = 'image-right';
        
        $right_content = '
        <div style="width: 100%; height: 400px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; border-radius: 8px;">
            <div style="text-align: center; color: white;">
                <h3>Image Placeholder</h3>
                <p>Your image would go here</p>
            </div>
        </div>
        ';
        
        include('../components/sections/block-feature.php');
        ?>
    </div>

    <hr>

    <div class="test-section">
        <h2 class="test-title">Test 3: New Mode - Custom HTML Content</h2>
        <p>This test uses custom HTML in the right-side section.</p>
        
        <?php
        // Reset all variables
        unset($tagline, $title, $paragraphs, $button, $grid_items, $center_item, $layout, $checkbox_list, $right_content);
        
        $tagline = 'Custom HTML Test';
        $title = 'Feature Block with Custom Content';
        $paragraphs = [
            'This demonstrates using any custom HTML content on the right side.',
        ];
        $button = [
            'url' => '#test3',
            'label' => 'See Custom Content'
        ];
        $layout = 'image-right';
        $checkbox_list = [
            ['label' => 'Fully customizable right-side content'],
            ['label' => 'Supports any HTML structure'],
            ['label' => 'Maintains original styling'],
        ];
        
        $right_content = '
        <div style="padding: 40px; background: #f5f5f5; border-radius: 8px;">
            <h3 style="color: #333; margin-bottom: 20px;">Custom Content Block</h3>
            <ul style="list-style: none; padding: 0;">
                <li style="padding: 10px; margin-bottom: 10px; background: white; border-radius: 4px;">✓ Any HTML content</li>
                <li style="padding: 10px; margin-bottom: 10px; background: white; border-radius: 4px;">✓ Complete flexibility</li>
                <li style="padding: 10px; margin-bottom: 10px; background: white; border-radius: 4px;">✓ Easy to customize</li>
            </ul>
        </div>
        ';
        
        include('../components/sections/block-feature.php');
        ?>
    </div>

    <hr>

    <div class="test-section">
        <h2 class="test-title">Test 4: Verify Existing Usage (From advocacy.php)</h2>
        <p>This replicates the exact usage from advocacy.php to ensure nothing broke.</p>
        
        <?php
        // Reset all variables
        unset($tagline, $title, $paragraphs, $button, $grid_items, $center_item, $layout, $checkbox_list, $right_content);
        
        // Exact copy from advocacy.php lines 70-91
        $tagline = 'academic Partnerships';
        $title = 'Bridging research with execution to advance infrastructure intelligence';
        $paragraphs = [
            'We actively collaborate with universities, research councils, and innovation networks to transform applied research into operational results. These partnerships create opportunities for students, researchers, and faculty to test ideas where theory meets the field, while giving our clients access to emerging science, feasibility-grade analysis, and data-driven insights that inform project design and investment decisions.',
        ];
        $button = [
            'url' => '/services',
            'label' => 'Become a Partner'
        ];
        $center_item = [
            'type' => 'image',
            'content' => '../assets/img/directions.svg'
        ];
        $layout = 'image-right';
        $checkbox_list = [
            ['icon' => 'mark.svg', 'label' => 'Partner with academic institutions and research bodies to align emerging studies with real-world environmental and infrastructure challenges.'],
            ['icon' => 'mark.svg', 'label' => 'Support graduate and PhD-level research connected to live projects - providing clients with feasibility-grade analysis, system optimization, and early-stage innovation scouting.'],
            ['icon' => 'mark.svg', 'label' => 'Our experts actively contribute to academic committees, evaluate theses, and mentor student competition teams advancing applied sustainability innovation.'],
            ['icon' => 'mark.svg', 'label' => 'We are often sought to help translate field performance into data that supports academic publication and informs regulatory and policy frameworks.'],
        ];
        
        include('../components/sections/block-feature.php');
        ?>
    </div>

    <hr>
    
    <p style="text-align: center; color: #666; margin-top: 60px;">
        End of tests. All variations should render correctly.
    </p>
</body>
</html>
