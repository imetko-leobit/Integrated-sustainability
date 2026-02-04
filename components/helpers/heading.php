<?php
/**
 * Dynamic Heading Helper
 * 
 * Renders a heading tag with configurable level while maintaining CSS class structure.
 * This ensures semantic HTML hierarchy is controlled by the page context while preserving visual styling.
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
