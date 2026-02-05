<?php
/**
 * Dynamic Heading Helper
 * 
 * Renders a heading tag with configurable level while maintaining CSS class structure.
 * This ensures semantic HTML hierarchy is controlled by the page context while preserving visual styling.
 * 
 * HEADING LEVEL INHERITANCE PATTERN:
 * ==================================
 * To prevent variable inheritance conflicts between parent blocks and nested components:
 * 
 * 1. SECTIONS (Parent Blocks):
 *    - Use generic $heading_level for the section's main heading
 *    - Use unique, descriptive names for nested component headings
 *    - Example: $cards_slider_card_heading_level, $category_nav_section_heading_level
 * 
 * 2. ELEMENTS (Child Components):
 *    - ALWAYS use unique, component-specific variable names
 *    - Never use generic $heading_level in elements
 *    - Example: $post_card_heading_level, $person_card_heading_level, $accordion_item_heading_level
 * 
 * 3. WHY THIS MATTERS:
 *    - PHP's include() shares variable scope between parent and child files
 *    - If parent sets $heading_level = 2, a child using $heading_level would inherit 2, not its own default
 *    - Unique names prevent accidental overrides and maintain semantic correctness
 * 
 * EXAMPLE:
 * --------
 * // ❌ BAD - Variable name conflict
 * // parent-block.php:
 * $heading_level = 2;  // For section title
 * include('child-element.php');
 * 
 * // child-element.php:
 * $heading_level = $heading_level ?? 5;  // Gets 2, not 5! 
 * 
 * // ✅ GOOD - Unique variable names
 * // parent-block.php:
 * $heading_level = 2;  // For section title
 * $child_card_heading_level = 3;  // For cards in this section
 * include('child-element.php');
 * 
 * // child-element.php:
 * $child_card_heading_level = $child_card_heading_level ?? 5;  // Gets 3 if set, else 5
 * 
 * @param string $content The heading text content (will be escaped by default)
 * @param int $level The heading level (1-6). Default: 2
 * @param string $class Additional CSS classes to apply
 * @param array $attributes Additional HTML attributes as key-value pairs
 * @param bool $allow_html If true, content will not be escaped (use with caution). Default: false
 * @return void Echoes the heading HTML
 */
function render_heading($content, $level = 2, $class = '', $attributes = [], $allow_html = false) {
    // Validate and sanitize heading level
    $level = max(1, min(6, (int)$level));
    
    // Build the tag
    $tag = "h{$level}";
    
    // Build class attribute
    $class_attr = !empty($class) ? ' class="' . esc_attr($class) . '"' : '';
    
    // Build additional attributes
    $attrs = '';
    foreach ($attributes as $key => $value) {
        $attrs .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
    }
    
    // Escape content unless explicitly allowing HTML
    $safe_content = $allow_html ? $content : htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
    
    // Render the heading
    echo "<{$tag}{$class_attr}{$attrs}>{$safe_content}</{$tag}>";
}

/**
 * Escape HTML attributes
 * Simple implementation if WordPress esc_attr is not available
 */
if (!function_exists('esc_attr')) {
    function esc_attr($text) {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
}
