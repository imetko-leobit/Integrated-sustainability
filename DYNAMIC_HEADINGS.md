# Dynamic Heading Levels - Implementation Guide

## Overview

This project implements dynamic heading levels for all reusable components, allowing pages to maintain proper semantic HTML structure while keeping components visually consistent.

## How It Works

### The `render_heading()` Helper Function

All heading rendering is now centralized in the `components/helpers/heading.php` helper file, which provides the `render_heading()` function:

```php
function render_heading($content, $level = 2, $class = '', $attributes = [], $allow_html = false)
```

**Parameters:**
- `$content` - The heading text (automatically sanitized unless `$allow_html` is true)
- `$level` - Heading level (1-6). Default: 2
- `$class` - CSS classes to apply
- `$attributes` - Additional HTML attributes as key-value pairs
- `$allow_html` - Whether to allow HTML in content (default: false for security)

**Security:**
- By default, all content is sanitized using `htmlspecialchars()` to prevent XSS attacks
- HTML can be allowed using the `$allow_html` parameter (use with caution)

## Updated Components

The following components have been updated to support dynamic heading levels:

| Component | Default Level | Previous Implementation |
|-----------|---------------|------------------------|
| `block-hero.php` | h1 | Hardcoded `<h1>` |
| `block-careers-intro.php` | h2 | Hardcoded `<h4>` |
| `block-search-results.php` | h1 | Hardcoded `<h1>` |
| `filter_form.php` | h2 | Hardcoded `<h1>` |
| `block-approach-intro.php` | h3 | Already dynamic |
| `block-insights.php` | h2 | Already dynamic |

## Usage

### Basic Usage (Default Level)

Simply include the component without setting `$heading_level`:

```php
<?php
$hero_title = "Welcome to Our Site";
include('components/sections/block-hero.php');
?>
```

This will use the component's default heading level (h1 for hero blocks).

### Custom Heading Level

Set the `$heading_level` variable before including the component:

```php
<?php
$hero_title = "Section Title";
$heading_level = 2;  // Use h2 instead of default h1
include('components/sections/block-hero.php');
?>
```

### Best Practices for Heading Hierarchy

1. **Start with h1**: Each page should have exactly one h1 element (usually the hero section)
2. **Don't skip levels**: Follow h1 → h2 → h3 progression, never jump from h2 to h4
3. **Use semantic structure**: Headings should reflect content hierarchy, not visual design
4. **Clean up after use**: Always `unset()` variables after including components if you'll reuse them

```php
<?php
// Hero section - main page title
$hero_title = "Our Products";
$heading_level = 1;
include('components/sections/block-hero.php');
unset($hero_title, $heading_level);

// Section heading
$section_title = "Featured Products";
$heading_level = 2;
include('components/sections/block-section-heading.php');
unset($section_title, $heading_level);

// Subsection
$approach_heading_title = "Our Approach";
$heading_level = 3;
include('components/sections/block-approach-intro.php');
unset($approach_heading_title, $heading_level);
?>
```

## Example: Proper Page Structure

```php
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Products Page</title>
</head>
<body>
  <?php include('components/header/_header.php'); ?>
  
  <main>
    <!-- h1: Main page heading -->
    <?php
      $hero_title = "Our Product Catalog";
      $heading_level = 1;  // Explicitly set to h1
      include('components/sections/block-hero.php');
      unset($hero_title, $heading_level);
    ?>
    
    <!-- h2: Major section -->
    <?php
      $section_title = "Featured Products";
      $heading_level = 2;
      include('components/sections/block-section-heading.php');
      unset($section_title, $heading_level);
    ?>
    
    <!-- h3: Subsection under Featured Products -->
    <?php
      $approach_heading_title = "Why Choose Our Products";
      $heading_level = 3;
      include('components/sections/block-approach-intro.php');
      unset($approach_heading_title, $heading_level);
    ?>
    
    <!-- h2: Another major section -->
    <?php
      $section_title = "New Arrivals";
      $heading_level = 2;
      include('components/sections/block-section-heading.php');
      unset($section_title, $heading_level);
    ?>
  </main>
  
  <?php include('components/footer/_footer.php'); ?>
</body>
</html>
```

## Benefits

### 1. **Accessibility**
- Screen readers use heading structure to navigate pages
- Proper hierarchy helps users understand content organization
- WCAG 2.1 compliance for heading structure

### 2. **SEO**
- Search engines use headings to understand page structure
- Proper hierarchy improves content indexing
- Better semantic HTML leads to better search rankings

### 3. **Maintainability**
- Centralized heading rendering logic
- Easy to update heading behavior across all components
- Consistent sanitization and security

### 4. **Visual Consistency**
- CSS classes remain unchanged
- Components look the same regardless of heading level
- Separation of semantic structure from visual design

## Testing

A test page is available at `pages/test-heading-levels.php` that demonstrates:
- Default heading levels for all components
- Custom heading level configuration
- Various component configurations
- Visual consistency across different heading levels

## Migration Guide

If you have existing pages that include these components:

1. **No changes required for basic usage** - components will use their default levels
2. **For custom hierarchy** - add `$heading_level = N;` before component includes
3. **Verify heading structure** - use browser DevTools or accessibility tools to check hierarchy
4. **Clean up variables** - use `unset()` to prevent variable bleeding between includes

## Common Pitfalls to Avoid

1. ❌ **Skipping heading levels**
   ```php
   <h1>Page Title</h1>
   <h3>Subsection</h3>  <!-- Bad: skipped h2 -->
   ```

2. ❌ **Multiple h1 elements**
   ```php
   <h1>Page Title</h1>
   <!-- ... -->
   <h1>Another Title</h1>  <!-- Bad: multiple h1s -->
   ```

3. ❌ **Using headings for styling**
   ```php
   <h4 class="small-text">Note</h4>  <!-- Bad: use CSS for styling -->
   ```

4. ✅ **Correct approach**
   ```php
   <h1>Page Title</h1>
   <h2>Section</h2>
   <h3>Subsection</h3>
   <!-- Use CSS classes for visual styling -->
   ```

## Tools for Verification

1. **Browser DevTools**: Inspect heading structure
2. **WAVE Extension**: Check accessibility and heading hierarchy
3. **HeadingsMap Extension**: Visualize heading structure
4. **Lighthouse**: Audit accessibility compliance

## Support

For questions or issues related to dynamic heading levels:
1. Check this documentation
2. Review the test page at `pages/test-heading-levels.php`
3. Examine the helper function at `components/helpers/heading.php`
