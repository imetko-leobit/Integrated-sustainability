<?php
/**
 * Reusable Gradient Divider Component
 * 
 * Renders a gradient divider line with optional bottom spacing
 * 
 * @param string $bottom_spacing Optional bottom margin (default: '0')
 *                               Examples: '20px', '1rem', '60px'
 * 
 * Usage:
 *   $bottom_spacing = '60px';
 *   include('../components/elements/component-divider.php');
 */

$bottom_spacing = $bottom_spacing ?? '0';
$divider_style = $bottom_spacing !== '0' ? ' style="margin-bottom: ' . esc_attr($bottom_spacing) . ';"' : '';
?>

<div class="divider"<?php echo $divider_style; ?>></div>
