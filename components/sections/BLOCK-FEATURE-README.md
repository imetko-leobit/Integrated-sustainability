# Block Feature Component - Usage Guide

## Overview

The `block-feature.php` component has been refactored to accept dynamic right-side content while maintaining full backward compatibility with the legacy grid-based implementation.

## What Changed?

### Before (Legacy)
The component had a hardcoded Performance Grid on the right side, requiring `$grid_items` and `$center_item` parameters.

### After (Refactored)
The component now accepts any content via the `$right_content` parameter, while still supporting the legacy approach for backward compatibility.

## Usage

### Method 1: New Dynamic Content (Recommended)

Pass any HTML content via the `$right_content` variable:

```php
<?php
$tagline = 'Innovation';
$title = 'Feature Block with Custom Content';
$paragraphs = [
    'This is the main description text.',
];
$button = [
    'url' => '/learn-more',
    'label' => 'Learn More'
];
$layout = 'image-right';

// Define custom right-side content
$right_content = '
<div class="my-custom-content">
    <img src="../assets/img/my-image.jpg" alt="Feature image" />
    <p>Any HTML content can go here!</p>
</div>
';

include('../components/sections/block-feature.php');
?>
```

### Method 2: Legacy Approach (Backward Compatible)

Continue using `$grid_items` - it will be automatically converted to `$right_content`:

```php
<?php
$title = 'Feature Block with Performance Grid';
$paragraphs = ['Description text'];
$button = ['url' => '/services', 'label' => 'View Services'];
$layout = 'image-right';

// Legacy approach - still works!
$grid_items = [
    ['icon' => 'icon1.svg', 'label' => 'Service 1'],
    ['icon' => 'icon2.svg', 'label' => 'Service 2'],
    // ... more items
];
$center_item = [
    'type' => 'image',
    'content' => '../assets/img/center-icon.svg'
];

include('../components/sections/block-feature.php');
?>
```

## Parameters

### Required Parameters
- `$title` (string): Main heading text
- `$paragraphs` (array): Array of paragraph text strings
- `$button` (array): Button configuration with 'url' and 'label' keys

### Optional Parameters
- `$tagline` (string): Top tagline text
- `$checkbox_list` (array): Array of checkbox items with 'label' keys
- `$layout` (string): Layout configuration - 'image-left', 'image-right', 'image-top', 'image-bottom' (default: 'image-left')
- `$right_content` (string): Dynamic HTML content for the right-side section

### Legacy Parameters (Auto-converted to $right_content)
- `$grid_items` (array): Array of grid items with 'icon' and 'label' keys
- `$center_item` (array): Center grid item with 'type' ('image' or 'text') and 'content'

## Examples

### Example 1: Simple Image
```php
$right_content = '<img src="../assets/img/feature.jpg" alt="Feature" style="width: 100%; border-radius: 8px;" />';
```

### Example 2: Video Embed
```php
$right_content = '
<video controls style="width: 100%;">
    <source src="../assets/video/demo.mp4" type="video/mp4">
</video>
';
```

### Example 3: Custom Component
```php
ob_start();
?>
<div class="custom-stats">
    <div class="stat-item">
        <h3>99%</h3>
        <p>Success Rate</p>
    </div>
    <div class="stat-item">
        <h3>500+</h3>
        <p>Projects</p>
    </div>
</div>
<?php
$right_content = ob_get_clean();
```

### Example 4: Performance Grid (Legacy)
```php
$grid_items = [
    ['icon' => 'service1.svg', 'label' => 'Service 1'],
    ['icon' => 'service2.svg', 'label' => 'Service 2'],
    ['icon' => 'service3.svg', 'label' => 'Service 3'],
    ['icon' => 'service4.svg', 'label' => 'Service 4'],
    ['icon' => 'service5.svg', 'label' => 'Service 5'],
    ['icon' => 'service6.svg', 'label' => 'Service 6'],
    ['icon' => 'service7.svg', 'label' => 'Service 7'],
    ['icon' => 'service8.svg', 'label' => 'Service 8'],
];
$center_item = [
    'type' => 'text',
    'content' => '100%'
];
// Component will auto-generate $right_content from these
```

## Complete Examples

See `components/sections/block-feature-examples.php` for comprehensive examples of all usage patterns.

## Testing

A test page is available at `pages/test-block-feature.php` that demonstrates:
1. Backward compatibility with legacy grid items
2. New dynamic content with simple images
3. Custom HTML content
4. Exact replication of existing usage

## Migration Guide

### If you're using the legacy approach:
**No changes needed!** Your existing code will continue to work exactly as before.

### If you want to use the new approach:
1. Remove `$grid_items` and `$center_item` variables
2. Add `$right_content` with your custom HTML
3. Include the component as usual

## Notes

- **Backward Compatibility**: All existing usages of this component will continue to work without modification
- **Flexibility**: The right side can now display images, videos, forms, other components, or any HTML content
- **Layout Preservation**: The left text section and all styling remain unchanged
- **Asset Safety**: No CSS, JavaScript, or image files were modified during this refactor

## Questions?

For more examples, see:
- `components/sections/block-feature-examples.php` - Detailed usage examples
- `pages/test-block-feature.php` - Live test page
- `pages/advocacy.php` - Production usage example
