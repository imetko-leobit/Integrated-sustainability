# Reusable Slider Component Documentation

## Overview

The slider block (`block-slider.php`) has been updated to be fully reusable across multiple pages with configurable options.

## Features

- ✅ Display 3 items per row in full-width mode
- ✅ Fully responsive (3/2/1 items per row based on screen size)
- ✅ Maintains all existing JavaScript slider functionality
- ✅ Optional description panel that can be hidden
- ✅ Backward compatible with existing implementations
- ✅ Configuration via PHP arrays

## Usage

### Basic Usage (Full-Width Mode)

```php
<?php
// Define your slider items
$slider_items = [
    [
        'title' => 'Item Title',
        'desc' => 'Item description text',
        'image' => 'path/to/image.jpg',
        'link' => '/item-link',
        'active' => true, // First item is active by default
    ],
    [
        'title' => 'Second Item',
        'desc' => 'Second item description',
        'image' => 'path/to/image2.jpg',
        'link' => '/item-link-2',
        'active' => false,
    ],
    // Add more items as needed
];

// Hide the description panel for full-width mode
$hide_description = true;

// Include the slider block
include('../components/sections/block-slider.php');
?>
```

### With Description Panel

```php
<?php
// Define slider items
$slider_items = [
    [
        'title' => 'Item Title',
        'desc' => 'Item description',
        'image' => 'path/to/image.jpg',
        'link' => '/item-link',
        'active' => true,
    ],
    // More items...
];

// Configure description panel content
$pillar_number = "PERFORMANCE PILLAR #1";
$pillar_title = "Your Section Title";
$pillar_text_1 = "First paragraph of description.";
$pillar_text_2 = "Second paragraph of description.";

// Show description panel
$hide_description = false;

// Include the slider block
include('../components/sections/block-slider.php');
?>
```

## Configuration Options

### Required Variables

- **$slider_items** (array): Array of slide items with the following structure:
  - `title` (string): The title of the slide
  - `desc` (string): Description text for the slide
  - `image` (string): URL or path to the slide image
  - `link` (string): URL for the slide link
  - `active` (boolean): Whether this slide is initially active (usually first item)

### Optional Variables

- **$hide_description** (boolean): Default `false`
  - `true`: Hides the description panel, slider takes full width
  - `false`: Shows the description panel on the left side

- **$pillar_number** (string): Optional tagline/label (e.g., "PERFORMANCE PILLAR #1")
- **$pillar_title** (string): Main heading for the description panel
- **$pillar_text_1** (string): First paragraph of description text
- **$pillar_text_2** (string): Second paragraph of description text

## Responsive Behavior

### Full-Width Mode (`$hide_description = true`)
- **Desktop (>1200px)**: 3 items per row
- **Tablet (768px - 1199px)**: 2 items per row
- **Mobile (<768px)**: 1 item per row

### With Description Panel (`$hide_description = false`)
- **Desktop (>1200px)**: Description on left, slider on right (overlapping layout)
- **Tablet & Mobile (<1200px)**: Stacked layout, description above slider

## JavaScript Classes

The following CSS classes are used by the JavaScript and must not be changed:

- `.js-pillar-carousel` - Main carousel container
- `.js-pillar-prev` - Previous slide button
- `.js-pillar-next` - Next slide button
- `.js-timebar` - Slide progress timebar

## Example Page

See `pages/slider-example.php` for working examples of both modes.

## Styles

The component styles are in `src/styles/section/block_slider.scss` and automatically compiled to `assets/css/section-block_slider.css`.

## Backward Compatibility

Existing implementations without `$slider_items` will continue to work using the default fallback data.
