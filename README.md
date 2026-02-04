# Integrated-sustainability

## Dynamic Heading Levels

This project implements dynamic heading levels to ensure proper semantic HTML structure and accessibility.

### Overview

Components no longer have hardcoded heading tags (h1-h6). Instead, the heading level is configurable via a `$heading_level` parameter, allowing pages to control the semantic hierarchy while maintaining consistent visual styling through CSS classes.

### Usage

#### In Components

All refactored components accept an optional `$heading_level` parameter:

```php
<?php
// Example: Using a component with a custom heading level
$heading_level = 2;  // Will render as <h2>
include('../components/elements/team-member-card.php');
?>
```

#### Default Heading Levels

If no `$heading_level` is specified, components use sensible defaults:
- Hero sections: h1
- Section headings: h2
- Card components: h3
- Nested elements: h3

#### The Heading Helper

The `render_heading()` function in `components/helpers/heading.php` handles dynamic heading rendering:

```php
<?php
// Basic usage
render_heading($content, $level, $class);

// Example
render_heading('Page Title', 1, 'title title--h1');
// Outputs: <h1 class="title title--h1">Page Title</h1>
?>
```

### Best Practices

1. **Set heading levels on pages**: Define `$heading_level` before including components to control semantic hierarchy
2. **Maintain visual consistency**: CSS classes (like `title--h1`) control styling independently of the heading tag
3. **Avoid heading jumps**: Don't skip heading levels (e.g., h2 → h4)
4. **One h1 per page**: Typically the hero or main page title should be h1

### Example Page Structure

```php
<?php
// Hero section - h1
$heading_level = 1;
include('../components/sections/block-hero.php');

// Main sections - h2
$heading_level = 2;
include('../components/sections/block-section-heading.php');

// Cards within sections - h3
$heading_level = 3;
include('../components/elements/team-member-card.php');
?>
```

This approach ensures:
- ✅ Proper semantic HTML for accessibility and SEO
- ✅ Reusable components across different page contexts
- ✅ Visual styling controlled via CSS, not HTML tags
- ✅ Logical heading hierarchy on each page

