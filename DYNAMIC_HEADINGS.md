# Dynamic Heading Levels Documentation

## Overview

All reusable components in this project now support dynamic heading levels. This allows you to control the semantic HTML structure of your pages while maintaining consistent visual styling.

## Why Dynamic Headings?

- **Semantic HTML**: Proper heading hierarchy improves accessibility and SEO
- **Flexibility**: Same component can be used in different contexts with appropriate heading levels
- **Maintainability**: Visual styling is controlled by CSS classes, not HTML tags
- **Accessibility**: Screen readers rely on proper heading structure for navigation

## How It Works

### The `render_heading()` Helper Function

Location: `components/helpers/heading.php`

```php
render_heading($content, $level = 2, $class = '', $attributes = [], $allow_html = false)
```

**Parameters:**
- `$content` (string): The heading text content (automatically escaped unless `$allow_html` is true)
- `$level` (int): The heading level (1-6). Default: 2
- `$class` (string): CSS classes to apply
- `$attributes` (array): Additional HTML attributes as key-value pairs
- `$allow_html` (bool): If true, content will not be escaped. Default: false

**Example:**
```php
<?php render_heading('My Heading', 3, 'title title--h3'); ?>
// Outputs: <h3 class="title title--h3">My Heading</h3>
```

## Using Dynamic Headings in Components

### In Section Components

Every section component now accepts a `$heading_level` parameter (and sometimes additional parameters for nested headings):

```php
<?php
// In your page file
$heading_level = 2;  // Optional - defaults to a sensible level
include('../components/sections/block-hero.php');
?>
```

### Default Heading Levels

Each component has sensible defaults:

| Component Type | Default Level | Reasoning |
|---------------|---------------|-----------|
| Hero sections | h1 | Usually the main page heading |
| Section headings | h2 | Main section titles |
| Card titles | h3 | Subsection content |
| Metadata/labels | h4-h5 | Supporting information |
| Footer headings | h4 | Navigation labels |

### Example: Using a Component with Custom Levels

```php
<?php
// Page with specific heading structure
$heading_level = 2;  // Main section heading
$card_title_level = 3;  // Card titles within the section
include('../components/sections/block-project-cards.php');
?>
```

## Best Practices

### 1. Maintain Proper Hierarchy

✅ **Good:**
```
h1 → h2 → h3 → h4
```

❌ **Bad:**
```
h1 → h3 → h2  (skipped h2, then went back)
h1 → h4       (skipped h2 and h3)
```

### 2. One h1 Per Page

Each page should have exactly one h1 element, typically in the hero section or page title.

### 3. Don't Skip Levels

Always increment by one level at a time. If you're at h2, the next heading should be h2 (sibling) or h3 (child), not h4.

### 4. Use CSS for Visual Styling

Don't choose heading levels based on how they look. Use the appropriate semantic level and apply CSS classes for styling:

```php
<?php 
// Correct: h3 level with h2 styling
render_heading($title, 3, 'title title--h2'); 
?>
```

## Component-Specific Parameters

### Sections with Multiple Heading Levels

Some sections have multiple heading parameters for nested content:

**block-project-cards.php:**
```php
$card_title_level = 3;      // For project card titles
$author_name_level = 4;     // For author names within cards
```

**block-section-heading.php:**
```php
$heading_level = 2;              // Main section heading
$person_card_heading_level = 4;  // Person card name (if shown)
```

**block-filtered-grid.php:**
```php
$filter_heading_level = 5;  // For filter section titles
```

## Common Scenarios

### Scenario 1: Hero Section
```php
<?php
// This is the main page heading
$heading_level = 1;
$hero_title = "Water Asset Performance Specialists";
include('../components/sections/block-hero.php');
?>
```

### Scenario 2: Multiple Sections on a Page
```php
<?php
// First major section
$heading_level = 2;
$section_title = "Our Services";
include('../components/sections/block-section-heading.php');

// Cards within this section
$card_title_level = 3;
include('../components/sections/block-cards-slider.php');

// Second major section
$heading_level = 2;
$section_title = "Our Projects";
include('../components/sections/block-section-heading.php');
?>
```

### Scenario 3: Nested Content
```php
<?php
// Main section (h2)
$heading_level = 2;
$section_title = "Team Members";
include('../components/sections/block-section-heading.php');

// Team cards (h3 for names)
$row_title_level = 3;
include('../components/sections/block-team-cards.php');
?>
```

## Migration Guide

### For Existing Pages

Most components have sensible defaults, so existing pages will continue to work. However, you should review your pages to ensure proper heading hierarchy:

1. Identify the h1 on your page (usually the hero section)
2. Ensure section headings are h2
3. Ensure subsection/card headings are h3 or h4 as appropriate
4. Pass explicit level parameters where needed

### For New Components

When creating new reusable components with headings:

1. Include the heading helper at the top of your component
2. Define a default heading level variable with sensible default
3. Use `render_heading()` instead of hardcoded heading tags
4. Document any heading level parameters in comments

**Template:**
```php
<?php
// Default heading level
$heading_level = $heading_level ?? 2;
include_once(__DIR__ . '/../helpers/heading.php');
?>

<div class="my-component">
  <?php render_heading($title, $heading_level, 'component__title'); ?>
  <!-- Rest of component -->
</div>
```

## Checking Your Page Structure

Use browser developer tools or accessibility checkers to verify heading structure:

1. **Chrome DevTools**: Elements panel, search for `h1`, `h2`, etc.
2. **WAVE Extension**: Shows heading structure visually
3. **HeadingsMap Extension**: Displays page outline based on headings
4. **Screen Readers**: Test with NVDA or VoiceOver

## Questions?

- Check the `components/helpers/heading.php` file for implementation details
- Look at existing component files for usage examples
- Ensure you understand semantic HTML and accessibility basics
