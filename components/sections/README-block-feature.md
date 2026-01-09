# Block Feature Component - Usage Guide

## Overview
The `block-feature.php` component is a reusable PHP block that displays a flexible content block with text and media (image/grid) sections.

## Safe Reuse Pattern

### Problem Solved
Previously, the component contained a global function `render_grid_items_feature()` that would cause a "Cannot redeclare function" error when the block was included multiple times on the same page.

### Solution
The function has been refactored to use an **anonymous function (closure)** approach, which is scoped locally to each include and prevents redeclaration errors.

## How to Use

### Basic Usage

```php
<?php
  // Set required variables
  $title = 'Your Feature Title';
  $paragraphs = [
    'First paragraph text.',
    'Second paragraph text.'
  ];
  $button = [
    'url' => '/your-url',
    'label' => 'Button Text'
  ];
  $grid_items = [
    ['icon' => 'icon1.svg', 'label' => 'Item 1'],
    ['icon' => 'icon2.svg', 'label' => 'Item 2'],
    // ... more items
  ];
  
  // Optional variables
  $tagline = 'Optional Tagline';
  $center_item = [
    'type' => 'image',  // or 'text'
    'content' => '../assets/img/your-image.svg'  // or text content
  ];
  $layout = 'image-left';  // or 'image-right', 'image-top', 'image-bottom'
  $checkbox_list = [
    ['icon' => 'mark.svg', 'label' => 'Checkbox item 1'],
    ['icon' => 'mark.svg', 'label' => 'Checkbox item 2']
  ];
  
  // Include the block
  include('../components/sections/block-feature.php');
?>
```

### Reusing Multiple Times on Same Page

You can now safely include the block multiple times on the same page:

```php
<!-- First Instance -->
<?php
  $title = 'First Block';
  $paragraphs = ['Content for first block.'];
  $button = ['url' => '/page1', 'label' => 'Learn More'];
  $grid_items = [/* your items */];
  
  include('../components/sections/block-feature.php');
?>

<!-- Second Instance -->
<?php
  $title = 'Second Block';
  $paragraphs = ['Content for second block.'];
  $button = ['url' => '/page2', 'label' => 'Discover More'];
  $grid_items = [/* your items */];
  
  include('../components/sections/block-feature.php');
?>

<!-- And so on... -->
```

### Example Page
See `pages/test-block-feature-reuse.php` for a complete working example that demonstrates three instances of the block on the same page.

## Required Variables
- `$title` (string): Main heading text
- `$paragraphs` (array): Array of paragraph text strings
- `$button` (array): Button configuration with 'url' and 'label' keys
- `$grid_items` (array): Array of grid items with 'icon' and 'label' keys

## Optional Variables
- `$tagline` (string): Top tagline text
- `$center_item` (array): Center grid item with 'type' ('image' or 'text') and 'content'
- `$checkbox_list` (array): Array of checkbox items with 'icon' and 'label' keys
- `$layout` (string): Layout configuration - 'image-left' (default), 'image-right', 'image-top', 'image-bottom'

## Technical Details

The refactoring changed the helper function from:
```php
function render_grid_items_feature($items, $center_item) {
    // function body
}
```

To an anonymous function:
```php
$render_grid_items_feature = function($items, $center_item) {
    // function body
};
```

This ensures each inclusion of the block has its own scoped function reference, preventing redeclaration errors.
