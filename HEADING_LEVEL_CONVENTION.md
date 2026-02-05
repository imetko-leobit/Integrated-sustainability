# Heading Level Variable Naming Convention

## Overview

This document describes the standardized naming convention for dynamic heading level variables across reusable components. This convention prevents inheritance conflicts where parent component heading levels inadvertently override child component defaults.

## The Problem

Previously, many components used the generic variable name `$heading_level`, which caused inheritance issues:

```php
// Section (Parent)
$heading_level = 2;  // For section title
include('elements/card.php');

// Element (Child) 
$heading_level = $heading_level ?? 5;  // ❌ Receives 2 instead of defaulting to 5!
```

This resulted in incorrect semantic HTML hierarchy and accessibility issues.

## The Solution

Each component now uses a **unique, descriptive heading level variable** based on its purpose:

### Naming Pattern

```
${component_name}_heading_level
```

## Element Components

All reusable element components use unique variables:

| Component | Variable Name | Default |
|-----------|--------------|---------|
| accordion.php | `$accordion_item_heading_level` | 4 |
| author.php | `$author_heading_level` | 4 |
| card-external.php | `$card_external_heading_level` | 4 |
| contact-card.php | `$contact_card_heading_level` | 4 |
| details-content.php | `$details_content_heading_level` | 4 |
| details-general.php | `$details_general_heading_level` | 4 |
| filter_form.php | `$filter_form_heading_level` | 2 |
| info-card.php | `$info_card_heading_level` | 4 |
| info-card-slider.php | `$info_card_slider_heading_level` | 4 |
| person-card.php | `$person_card_heading_level` | 4 |
| pillar-card.php | `$pillar_card_heading_level` | 4 |
| post-card.php | `$post_card_heading_level` | 5 |
| post-card-action.php | `$post_card_action_heading_level` | 5 |
| post-card-simple.php | `$post_card_simple_heading_level` | 5 |
| table.php | `$table_heading_level` | 4 |
| team-member-card.php | `$team_member_card_heading_level` | 5 |
| vacancy-card.php | `$vacancy_card_heading_level` | 4 |

### Elements with Multiple Heading Levels

Some elements manage multiple heading levels internally:

| Component | Variables | Defaults |
|-----------|-----------|----------|
| details-content-informational.php | `$main_heading_level`<br>`$sub_heading_level` | 3<br>4 |
| details-content-links.php | `$main_heading_level`<br>`$sub_heading_level` | 3<br>4 |
| career-form.php | `$section1_heading_level`<br>`$section_heading_level` | 3<br>4 |

## Section Blocks

Section blocks use different heading level variables for different purposes:

### Primary Section Headings
All sections use `$heading_level` for their main section title:

```php
// block-insights.php
$heading_level = $heading_level ?? 2;  // For section title
render_heading($pillar_title, $heading_level, 'title title--h1');
```

### Inline Card Headings
When sections render cards inline (not via include), they use descriptive variables:

| Section | Variable | Default | Purpose |
|---------|----------|---------|---------|
| block-cards-slider.php | `$post_card_heading_level` | 3 | Post card titles |
| block-category-navigation.php | `$category_navigation_card_heading_level` | 5 | Navigation card titles |
| block-project-cards.php | `$project_card_heading_level` | 4 | Project card titles |
| block-slider.php | `$pillar_carousel_card_heading_level` | 4 | Carousel card titles |

### Multiple Heading Levels in Sections
Some sections manage multiple heading levels:

| Section | Variables | Purpose |
|---------|-----------|---------|
| block-section-heading.php | `$heading_level`<br>`$person_card_heading_level` | Section title<br>Person name |
| block-details-sidebar.php | `$section_title_level`<br>`$metadata_heading_level` | Detail titles<br>Metadata titles |
| block-equipment-content.php | `$metadata_heading_level` | Metadata group titles |
| block-filtered-grid.php | `$filter_heading_level` | Filter section titles |

## Usage Examples

### ✅ Correct: Element with Unique Variable

```php
// components/elements/post-card.php
<?php
    $post_card_heading_level = $post_card_heading_level ?? 5;
    include_once(__DIR__ . '/../helpers/heading.php');
?>

<article class="post-card">
    <?php render_heading($project['title'], $post_card_heading_level, 'post-card__title'); ?>
</article>
```

### ✅ Correct: Section Including Element

```php
// components/sections/block-cards-simple-slider.php
<?php
    $heading_level = $heading_level ?? 2;  // Section title
    include_once(__DIR__ . '/../helpers/heading.php');
?>

<section class="cards-slider">
    <?php render_heading($section_title, $heading_level, 'title title--h1'); ?>
    
    <?php include('../components/elements/post-card-simple.php'); ?>
    <!-- post-card-simple.php uses $post_card_simple_heading_level - no conflict! -->
</section>
```

### ✅ Correct: Passing Custom Heading Level

```php
// Override default heading level when needed
$post_card_heading_level = 3;  // Override default of 5
include('../components/elements/post-card.php');
```

### ❌ Incorrect: Reusing Generic Variable

```php
// DON'T DO THIS - causes inheritance conflicts
$heading_level = $heading_level ?? 4;  // Too generic!
render_heading($card_title, $heading_level, 'card-title');
```

## Best Practices

1. **Always use unique variable names** - Never use generic `$heading_level` in element components
2. **Be descriptive** - Variable names should indicate the component/purpose
3. **Document defaults** - Add comments explaining the semantic purpose of the heading level
4. **Test nesting** - Always verify heading hierarchy when including components
5. **Maintain accessibility** - Ensure heading levels create a logical document outline

## Semantic Heading Hierarchy

Typical hierarchy in a page:

```
H1 - Page title (usually one per page)
  H2 - Section titles
    H3 - Subsection titles
      H4 - Card/component titles
        H5 - Nested card titles
          H6 - Deep nested elements (rare)
```

## Migration Guide

When adding a new component that uses headings:

1. **Choose a unique variable name** following the pattern `${component_name}_heading_level`
2. **Set an appropriate default** based on where the component appears in the hierarchy
3. **Document the variable** in this file
4. **Test nesting scenarios** to verify no inheritance conflicts

## Validation

To check for potential inheritance issues, search for:

```bash
# Find components still using generic heading_level
grep -r "\$heading_level = \$heading_level" components/elements/

# Should return empty - all elements should use unique variables
```

## References

- See `components/helpers/heading.php` for the `render_heading()` function
- See GitHub issue for original problem statement
- See commit history for migration examples

---

**Last Updated:** 2026-02-05
**Maintained By:** Development Team
