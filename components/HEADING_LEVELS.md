# Heading Level Inheritance Pattern

## Overview

This document explains the heading level variable naming convention used throughout the component system to prevent inheritance conflicts and maintain proper semantic HTML structure.

## The Problem

In PHP, when you use `include()` to include a file, all variables from the parent scope are accessible to the child file. This can cause unintended inheritance:

```php
// ❌ PROBLEMATIC PATTERN
// parent-block.php
$heading_level = 2;  // For section title
include('child-element.php');

// child-element.php
$heading_level = $heading_level ?? 5;  // Gets 2 instead of 5!
render_heading($title, $heading_level);  // Renders h2 instead of h5
```

## The Solution

Use **unique, descriptive variable names** for each component:

```php
// ✅ CORRECT PATTERN
// parent-block.php
$heading_level = 2;  // For section title
$post_card_heading_level = 3;  // For cards in this section
include('post-card.php');

// post-card.php
$post_card_heading_level = $post_card_heading_level ?? 5;  // Gets 3 if set, else 5
render_heading($title, $post_card_heading_level);  // Renders h3 or h5 as intended
```

## Naming Conventions

### Section Blocks (`components/sections/`)
- Use `$heading_level` for the **section's main heading**
- Use unique, descriptive names for nested components:
  - `${section_name}_card_heading_level`
  - `${section_name}_section_heading_level`
  - Example: `$cards_slider_card_heading_level`, `$category_nav_section_heading_level`

### Element Components (`components/elements/`)
- **ALWAYS** use unique, component-specific variable names
- **NEVER** use generic `$heading_level`
- Pattern: `${component_name}_heading_level`
- Examples:
  - `$post_card_heading_level`
  - `$person_card_heading_level`
  - `$accordion_item_heading_level`
  - `$vacancy_card_heading_level`

## Examples

### Example 1: Section with Inline Cards

```php
// block-cards-slider.php
$heading_level = 2;  // Main section heading
$cards_slider_card_heading_level = 3;  // Cards within this slider

render_heading($section_title, $heading_level, 'title title--h1');  // h2

// Inline card rendering
foreach ($projects as $project) {
    render_heading($project['title'], $cards_slider_card_heading_level, 'card__title');  // h3
}
```

### Example 2: Section Including Element

```php
// block-team-cards.php
$heading_level = 2;  // Main section heading

render_heading($section_title, $heading_level, 'title title--h1');  // h2

foreach ($team_members as $member) {
    include('elements/team-member-card.php');  // Uses $team_member_card_heading_level
}

// elements/team-member-card.php
$team_member_card_heading_level = $team_member_card_heading_level ?? 5;  // Default h5
render_heading($member_name, $team_member_card_heading_level, 'card__name');  // h5
```

### Example 3: Explicit Heading Level Override

```php
// parent-block.php
$heading_level = 2;
$person_card_heading_level = 3;  // Explicitly set to h3 for this context

include('elements/person-card.php');

// elements/person-card.php
$person_card_heading_level = $person_card_heading_level ?? 4;  // Gets 3 from parent
render_heading($person_name, $person_card_heading_level);  // h3
```

## Current Variable Registry

### Section Blocks Only
- `$heading_level` - Used by 18 section blocks for their main heading
- `$cards_slider_card_heading_level` - block-cards-slider.php
- `$category_nav_section_heading_level` - block-category-navigation.php
- `$category_navigation_card_heading_level` - block-category-navigation.php
- `$metadata_heading_level` - block-details-sidebar.php, block-equipment-content.php
- `$filter_heading_level` - block-filtered-grid.php
- `$project_card_heading_level` - block-project-cards.php
- `$pillar_carousel_card_heading_level` - block-slider.php

### Element Components Only
- `$post_card_heading_level` - post-card.php (h5)
- `$post_card_simple_heading_level` - post-card-simple.php (h5)
- `$post_card_action_heading_level` - post-card-action.php (h5)
- `$person_card_heading_level` - person-card.php (h4)
- `$accordion_item_heading_level` - accordion.php (h4)
- `$author_heading_level` - author.php (h4)
- `$card_external_heading_level` - card-external.php (h4)
- `$contact_card_heading_level` - contact-card.php (h4)
- `$details_content_heading_level` - details-content.php (h4)
- `$details_general_heading_level` - details-general.php (h4)
- `$filter_form_heading_level` - filter_form.php (h2)
- `$info_card_heading_level` - info-card.php (h4)
- `$info_card_slider_heading_level` - info-card-slider.php (h4)
- `$pillar_card_heading_level` - pillar-card.php (h4)
- `$table_heading_level` - table.php (h4)
- `$team_member_card_heading_level` - team-member-card.php (h5)
- `$vacancy_card_heading_level` - vacancy-card.php (h4)

### Special Cases
- `$main_heading_level`, `$sub_heading_level` - Used together in details-content-informational.php and details-content-links.php
- `$section1_heading_level`, `$section_heading_level` - Used together in career-form.php

## Best Practices

1. **Always use the null coalescing operator** (`??`) to set defaults:
   ```php
   $post_card_heading_level = $post_card_heading_level ?? 5;
   ```

2. **Document heading level purposes** with inline comments:
   ```php
   $heading_level = $heading_level ?? 2;  // Main section title
   $cards_slider_card_heading_level = $cards_slider_card_heading_level ?? 3;  // Individual card titles
   ```

3. **Maintain semantic hierarchy**:
   - Section headings: h1-h3
   - Primary cards/elements: h3-h4
   - Nested elements: h4-h6

4. **When creating new components**:
   - Choose a unique, descriptive variable name
   - Add it to the registry in this document
   - Follow the naming pattern: `${component_name}_heading_level`

## Verification

To verify no naming conflicts exist, run:

```bash
php /tmp/comprehensive_review.php
```

This script analyzes all heading level variables and reports any conflicts between sections and elements.

## Related Files

- `components/helpers/heading.php` - The render_heading() helper function with full documentation
- This pattern is used across 73+ component files (30+ sections, 43+ elements)
