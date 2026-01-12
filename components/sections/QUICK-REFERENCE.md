# Block Approach Intro - Quick Reference

## Basic Usage

```php
<?php include('../components/sections/block-approach-intro.php') ?>
```

## Common Patterns

### Custom Title & Text
```php
<?php 
$approach_heading_title = "Your Custom Title";
$approach_text_1 = "Your description text.";
include('../components/sections/block-approach-intro.php');
?>
```

### With Button
```php
<?php 
$approach_button = 'Contact Us';
$approach_button_url = '/contact';
include('../components/sections/block-approach-intro.php');
?>
```

### Reverse Layout (Image First)
```php
<?php 
$reverse = true;
include('../components/sections/block-approach-intro.php');
?>
```

### Hide Button Section
```php
<?php 
$show_button = false;
include('../components/sections/block-approach-intro.php');
?>
```

### Custom Image
```php
<?php 
$image_src = "../assets/img/custom.png";
$image_alt = "Custom image description";
include('../components/sections/block-approach-intro.php');
?>
```

### No Image
```php
<?php 
$image_src = null;
include('../components/sections/block-approach-intro.php');
?>
```

## All Variables

| Variable | Type | Default | Description |
|----------|------|---------|-------------|
| `$approach_tagline` | string\|null | null | Optional tagline above heading |
| `$approach_heading_title` | string | (default text) | Main heading |
| `$approach_text_1` | string | (default text) | First paragraph |
| `$approach_text_2` | string\|null | (default text) | Second paragraph (optional) |
| `$approach_button` | string\|null | null | Button text |
| `$approach_button_url` | string | "#" | Button URL |
| `$show_button` | boolean | true | Show/hide button section |
| `$approach_link_label` | string\|null | (default text) | Scroll link label |
| `$approach_scroll_id` | string | "pillar1" | Scroll link target ID |
| `$image_src` | string\|null | (default image) | Image path |
| `$image_alt` | string | (default alt) | Image alt text |
| `$reverse` | boolean | false | Swap image/text columns |
| `$accordion_items` | array\|null | null | Accordion items data |

## Tips

- **Minimal setup**: Just include the component for default behavior
- **Backward compatible**: All existing usages work unchanged
- **Responsive**: Mobile layout always shows text first
- **Clean output**: Hidden elements render no HTML
- **Flexible**: Mix and match any combination of features

## Examples

See `block-approach-intro-examples.md` for 9 detailed examples.

Test all features at: `pages/test-block-approach-intro.php`
