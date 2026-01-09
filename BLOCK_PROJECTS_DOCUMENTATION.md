# Block Projects Component - Dynamic Text Positioning

## Overview
The `block-projects.php` component now supports dynamic text positioning, allowing the text section to be positioned either to the right of the image (default) or below the image.

## Features
- **Default Layout**: Image on the left (8 columns), text on the right (4 columns)
- **Text-Below Layout**: Image on top (full width), text below (full width)
- Maintains responsive behavior on all screen sizes
- Preserves all existing styling and animations
- Image position and size remain consistent

## Usage

### Default Layout (Image Left, Text Right)
Simply include the component without any parameters:

```php
<?php include('../components/sections/block-projects.php'); ?>
```

### Text-Below Layout (Image Top, Text Bottom)
Set the `$text_below` variable to `true` before including the component:

```php
<?php 
    $text_below = true; 
    include('../components/sections/block-projects.php'); 
?>
```

## Implementation Details

### PHP Changes
- Added optional `$text_below` parameter (defaults to `false`)
- Conditionally applies the `block-projects__wrapper--text-below` modifier class

### CSS Changes
- Added `.block-projects__wrapper--text-below` modifier class
- When active:
  - Image spans full width (12 columns)
  - Text spans full width (12 columns)
  - Text is positioned in grid row 2
  - Adjusted padding for better spacing
- Responsive behavior maintained on mobile devices

## Example Page
See `pages/example-block-projects.php` for live examples of both layouts.

## Technical Notes
- The component uses CSS Grid for desktop layouts
- Mobile layouts (max-width: 991px) use flexbox and already display text below image
- The Swiper slider functionality remains unchanged
- No JavaScript changes were required
