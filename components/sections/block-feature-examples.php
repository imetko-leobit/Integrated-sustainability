<?php
/**
 * Example Usage of the Refactored block-feature.php Component
 * 
 * This file demonstrates different ways to use the block-feature.php component
 * with various types of right-side content.
 */

// ============================================================================
// Example 1: Using the new $right_content with a simple image
// ============================================================================

// Set left-side content variables
$tagline = 'Simple Image Example';
$title = 'Feature Block with Image on Right';
$paragraphs = [
    'This example demonstrates how to use the refactored block-feature component with a simple image on the right side.',
    'You can pass any HTML content via the $right_content variable.'
];
$button = [
    'url' => '/learn-more',
    'label' => 'Learn More'
];
$layout = 'image-right';

// Define the right-side content as a simple image
$right_content = '
<div class="block-feature__image-wrapper">
    <img src="../assets/img/example-image.jpg" alt="Example feature image" />
</div>
';

// Uncomment to render:
// include('../components/sections/block-feature.php');

// ============================================================================
// Example 2: Using $right_content with custom HTML content
// ============================================================================

$tagline = 'Custom HTML Example';
$title = 'Feature Block with Custom HTML';
$paragraphs = [
    'This example shows how to use custom HTML content on the right side.',
];
$button = [
    'url' => '/contact',
    'label' => 'Get Started'
];
$layout = 'image-right';

// Define custom HTML for the right side
$right_content = '
<div class="custom-content">
    <h4>Custom Content Block</h4>
    <p>You can include any HTML elements here:</p>
    <ul>
        <li>Lists</li>
        <li>Images</li>
        <li>Forms</li>
        <li>Other components</li>
    </ul>
</div>
';

// Uncomment to render:
// include('../components/sections/block-feature.php');

// ============================================================================
// Example 3: Backward compatibility - Using legacy $grid_items (Performance Grid)
// ============================================================================

$tagline = 'Performance Grid Example';
$title = 'Feature Block with Performance Grid (Legacy)';
$paragraphs = [
    'This example demonstrates backward compatibility with the original grid-based implementation.',
];
$button = [
    'url' => '/services',
    'label' => 'View Services'
];
$layout = 'image-right';

// Legacy approach - using $grid_items
// This will be automatically converted to $right_content internally
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
    'type' => 'image',
    'content' => '../assets/img/directions.svg'
];

// DO NOT set $right_content when using legacy mode
// The component will detect $grid_items and auto-generate $right_content

// Uncomment to render:
// include('../components/sections/block-feature.php');

// ============================================================================
// Example 4: Using $right_content with another component/block
// ============================================================================

$tagline = 'Nested Component Example';
$title = 'Feature Block with Embedded Component';
$paragraphs = [
    'This example shows how to embed another component as the right-side content.',
];
$button = [
    'url' => '/discover',
    'label' => 'Discover More'
];
$layout = 'image-right';

// Capture output from another component
ob_start();
?>
<div class="embedded-component">
    <!-- You can include any other component here -->
    <div class="card">
        <h4>Embedded Card Component</h4>
        <p>This could be any other block or component from your system.</p>
        <button class="btn">Action Button</button>
    </div>
</div>
<?php
$right_content = ob_get_clean();

// Uncomment to render:
// include('../components/sections/block-feature.php');

// ============================================================================
// Example 5: Using $right_content with a video embed
// ============================================================================

$tagline = 'Video Example';
$title = 'Feature Block with Video Content';
$paragraphs = [
    'This example demonstrates embedding video content on the right side.',
];
$button = [
    'url' => '/watch',
    'label' => 'Watch More'
];
$layout = 'image-right';

$right_content = '
<div class="video-wrapper">
    <video controls width="100%">
        <source src="../assets/video/example.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
';

// Uncomment to render:
// include('../components/sections/block-feature.php');

// ============================================================================
// Example 6: Building $right_content dynamically with Performance Grid
// ============================================================================

$tagline = 'Dynamic Grid Example';
$title = 'Programmatically Build Right Content';
$paragraphs = [
    'This example shows how to programmatically build the right-side content, including the performance grid.',
];
$button = [
    'url' => '/services',
    'label' => 'Explore Services'
];
$layout = 'image-right';

// Build the performance grid manually with full control
$my_grid_items = [
    ['icon' => 'icon1.svg', 'label' => 'Custom Service 1'],
    ['icon' => 'icon2.svg', 'label' => 'Custom Service 2'],
    ['icon' => 'icon3.svg', 'label' => 'Custom Service 3'],
    ['icon' => 'icon4.svg', 'label' => 'Custom Service 4'],
    ['icon' => 'icon5.svg', 'label' => 'Custom Service 5'],
    ['icon' => 'icon6.svg', 'label' => 'Custom Service 6'],
    ['icon' => 'icon7.svg', 'label' => 'Custom Service 7'],
    ['icon' => 'icon8.svg', 'label' => 'Custom Service 8'],
];

ob_start();
?>
<div class="performance-grid performance-grid--right js-overlay-container">
    <div class="performance-grid__container">
        <div class="performance-grid__bg">
            <img src="../assets/img/bgGrid.svg" alt="Ellipses" aria-hidden="true">
        </div>
        
        <?php foreach ($my_grid_items as $item): ?>
        <a href="/services#<?php echo urlencode($item['label']); ?>" class="performance-grid__link">
            <div class="performance-grid__item">
                <?php if (!empty($item['icon'])): ?>
                <div class="performance-grid__icon">
                    <img src="../assets/img/<?php echo $item['icon']; ?>" alt="<?php echo htmlspecialchars($item['label']); ?>">
                </div>
                <?php endif; ?>
                <span class="performance-grid__label"><?php echo htmlspecialchars($item['label']); ?></span>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<?php
$right_content = ob_get_clean();

// Uncomment to render:
// include('../components/sections/block-feature.php');

?>
