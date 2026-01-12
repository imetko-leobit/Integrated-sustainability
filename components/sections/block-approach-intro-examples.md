# Block Approach Intro - Usage Guide

## Overview
The `block-approach-intro` component is now fully configurable and reusable. All content is controlled via variables set before including the component.

## Configuration Variables

### Required Variables (with defaults)
- `$approach_heading_title` - Main heading text (string)
- `$approach_text_1` - First paragraph of description (string)

### Optional Variables
- `$approach_tagline` - Top tagline text (string, default: null)
- `$approach_text_2` - Second paragraph of description (string, default: auto-set)
- `$approach_button` - Button text (string, default: null)
- `$approach_button_url` - Button URL (string, default: "#")
- `$show_button` - Show/hide button section (boolean, default: true)
- `$approach_link_label` - Scroll link label (string, default: auto-set)
- `$approach_scroll_id` - Scroll link target ID (string, default: "pillar1")
- `$image_src` - Image path (string, default: "../assets/img/strengthen.png")
- `$image_alt` - Image alt text (string, default: auto-set)
- `$reverse` - Swap image/text columns (boolean, default: false)
- `$accordion_items` - Array of accordion items (array, default: null)

## Usage Examples

### Example 1: Basic Usage (Default)
```php
<?php include('../components/sections/block-approach-intro.php') ?>
```

### Example 2: With Custom Button
```php
<?php 
$approach_heading_title = "Custom Title Here";
$approach_text_1 = "First paragraph of content.";
$approach_text_2 = "Second paragraph of content.";
$approach_button = 'Learn More';
$approach_button_url = '/about-us';
include('../components/sections/block-approach-intro.php') 
?>
```

### Example 3: With Top Tagline
```php
<?php 
$approach_tagline = "Our Approach";
$approach_heading_title = "Building Sustainable Solutions";
$approach_text_1 = "Description goes here.";
include('../components/sections/block-approach-intro.php') 
?>
```

### Example 4: Hide Button Section
```php
<?php 
$approach_heading_title = "Information Section";
$approach_text_1 = "This section has no call-to-action.";
$show_button = false;
include('../components/sections/block-approach-intro.php') 
?>
```

### Example 5: Reverse Layout (Image First)
```php
<?php 
$approach_heading_title = "Reversed Layout Example";
$approach_text_1 = "The image appears on the left side now.";
$reverse = true;
include('../components/sections/block-approach-intro.php') 
?>
```

### Example 6: Custom Image
```php
<?php 
$approach_heading_title = "Custom Image Example";
$approach_text_1 = "Using a different image.";
$image_src = "../assets/img/custom-image.png";
$image_alt = "Description of custom image";
include('../components/sections/block-approach-intro.php') 
?>
```

### Example 7: No Image
```php
<?php 
$approach_heading_title = "Text Only";
$approach_text_1 = "This section has no image.";
$image_src = null;
include('../components/sections/block-approach-intro.php') 
?>
```

### Example 8: With Accordion
```php
<?php 
$approach_heading_title = "With Accordion Items";
$approach_text_1 = "Main content here.";
$accordion_items = [
  [
    'title' => 'First Item',
    'desc' => 'Description for first item',
    'initial_open' => true,
  ],
  [
    'title' => 'Second Item', 
    'desc' => 'Description for second item',
    'initial_open' => false,
  ],
];
include('../components/sections/block-approach-intro.php') 
?>
```

### Example 9: Complete Custom Configuration
```php
<?php 
$approach_tagline = "Performance Solutions";
$approach_heading_title = "Comprehensive Approach";
$approach_text_1 = "First paragraph with detailed information.";
$approach_text_2 = "Second paragraph with more context.";
$approach_button = 'Contact Us';
$approach_button_url = '/contact';
$image_src = "../assets/img/custom.png";
$image_alt = "Custom image description";
$reverse = true;
include('../components/sections/block-approach-intro.php') 
?>
```

## Backward Compatibility

All existing usages continue to work without modification:
- `home.php` - Uses default values
- `about-us.php` - Sets `$approach_button = 'Meet The Team'`
- `careers-home.php` - Sets `$accordion_items` and `$approach_link_label = null`
- `services-category.php` - Uses `$approach_button` and `$accordion_items`

## Important Notes

1. **No Breaking Changes**: All variables have sensible defaults, so existing includes work unchanged
2. **CSS Included**: The component includes its own stylesheet automatically
3. **Responsive**: Mobile layout always displays text first, regardless of `$reverse` setting
4. **Clean HTML**: When elements are hidden (button, image, tagline), no empty containers are rendered
5. **Assets Unchanged**: Uses existing image folder structure as-is
