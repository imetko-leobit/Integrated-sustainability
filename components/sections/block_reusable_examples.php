<?php
/**
 * EXAMPLES: How to use the block_reusable.php component
 * 
 * This file contains various examples demonstrating how to use the reusable block component
 * with different configurations. Copy and adapt these examples for your needs.
 */

// ============================================================================
// EXAMPLE 1: Basic usage with tagline and center image (as used in advocacy.php)
// ============================================================================
/*
<?php
  $tagline = 'mission statement';
  $title = 'creating the optimum conditions for high-performance infrastructure';
  $paragraphs = [
    'To us, advocacy is a structured process of collaboration built on evidence and a shared purpose. It aligns technical innovation, academic insight, and local expertise to establish the consensus that turns ambition into responsible assets - for all stakeholders.',
    'Through this model, we strengthen the three fundamentals of project success—feasibility, acceptability, and viability—and create a continuous feedback system that drives performance from concept through operation.',
    'Advocacy connects performance with responsibility and is key to unlocking better environmental, social, and commercial outcomes.'
  ];
  $button = [
    'url' => '/services',
    'label' => 'Read More'
  ];
  $grid_items = [
    ['icon' => '', 'label' => ''],
    ['icon' => 'regulatory.svg', 'label' => 'academic partnerships'],
    ['icon' => '', 'label' => ''],
    ['icon' => 'carbon.svg', 'label' => 'technology advocacy'],
    ['icon' => 'equipment.svg', 'label' => 'community empowerment'],
    ['icon' => '', 'label' => ''],
    ['icon' => 'compliance.svg', 'label' => 'project success'],
  ];
  $center_item = [
    'type' => 'image',
    'content' => '../assets/img/directions.svg'
  ];
  
  include('../components/sections/block_reusable.php');
?>
*/

// ============================================================================
// EXAMPLE 2: Usage with center text instead of image
// ============================================================================
/*
<?php
  $tagline = 'our approach';
  $title = 'discover how unified environmental science delivers sustainable performance';
  $paragraphs = [
    'Asset performance drifts within fragmented service delivery. Our integrated delivery approach connects on-site realities to design, equipment supply, and operations to create predictable facility behaviour.',
    'This continuity strengthens accountability and stabilizes operations, helping you advance a coherent performance system that protects resources and supports long-term system resilience.'
  ];
  $button = [
    'url' => '/contact',
    'label' => 'Get Started'
  ];
  $grid_items = [
    ['icon' => 'feasibility.svg', 'label' => 'feasibility'],
    ['icon' => 'laboratory.svg', 'label' => 'laboratory'],
    ['icon' => 'regulatory.svg', 'label' => 'regulatory'],
    ['icon' => 'compliance.svg', 'label' => 'compliance'],
    ['icon' => 'design.svg', 'label' => 'design'],
    ['icon' => 'carbon.svg', 'label' => 'carbon'],
    ['icon' => 'operations.svg', 'label' => 'operations'],
    ['icon' => 'equipment.svg', 'label' => 'equipment'],
  ];
  $center_item = [
    'type' => 'text',
    'content' => 'unified project delivery and asset performance'
  ];
  
  include('../components/sections/block_reusable.php');
?>
*/

// ============================================================================
// EXAMPLE 3: Without tagline (optional)
// ============================================================================
/*
<?php
  // No tagline defined
  $title = 'innovative solutions for sustainable infrastructure';
  $paragraphs = [
    'We combine cutting-edge technology with decades of expertise to deliver infrastructure projects that stand the test of time.',
    'Our approach ensures environmental responsibility while maximizing operational efficiency and stakeholder value.'
  ];
  $button = [
    'url' => '/projects',
    'label' => 'View Our Work'
  ];
  $grid_items = [
    ['icon' => 'feasibility.svg', 'label' => 'planning'],
    ['icon' => 'design.svg', 'label' => 'engineering'],
    ['icon' => 'equipment.svg', 'label' => 'implementation'],
    ['icon' => 'operations.svg', 'label' => 'operations'],
  ];
  $center_item = [
    'type' => 'text',
    'content' => 'end-to-end solutions'
  ];
  
  include('../components/sections/block_reusable.php');
?>
*/

// ============================================================================
// EXAMPLE 4: With checkbox list (optional feature)
// ============================================================================
/*
<?php
  $tagline = 'why choose us';
  $title = 'comprehensive environmental consulting services';
  $paragraphs = [
    'We provide expert environmental consulting to help your organization achieve sustainability goals while maintaining profitability.',
    'Our team of specialists brings together diverse expertise to tackle complex environmental challenges.'
  ];
  
  // Optional checkbox list
  $checkbox_list = [
    ['icon' => 'check.svg', 'label' => 'ISO 14001 Certified'],
    ['icon' => 'check.svg', 'label' => '25+ Years Experience'],
    ['icon' => 'check.svg', 'label' => 'Global Coverage']
  ];
  
  $button = [
    'url' => '/about',
    'label' => 'Learn More'
  ];
  $grid_items = [
    ['icon' => 'regulatory.svg', 'label' => 'compliance'],
    ['icon' => 'carbon.svg', 'label' => 'sustainability'],
    ['icon' => 'laboratory.svg', 'label' => 'testing'],
    ['icon' => 'compliance.svg', 'label' => 'certification'],
  ];
  $center_item = [
    'type' => 'image',
    'content' => '../assets/img/directions.svg'
  ];
  
  include('../components/sections/block_reusable.php');
?>
*/

// ============================================================================
// EXAMPLE 5: Minimal configuration (single paragraph, few grid items)
// ============================================================================
/*
<?php
  $title = 'streamlined project delivery';
  $paragraphs = [
    'Simplify your infrastructure projects with our integrated approach that reduces complexity and accelerates timelines.'
  ];
  $button = [
    'url' => '/services',
    'label' => 'Explore Services'
  ];
  $grid_items = [
    ['icon' => 'design.svg', 'label' => 'design'],
    ['icon' => 'equipment.svg', 'label' => 'build'],
    ['icon' => 'operations.svg', 'label' => 'operate'],
  ];
  $center_item = [
    'type' => 'text',
    'content' => 'integrated delivery'
  ];
  
  include('../components/sections/block_reusable.php');
?>
*/

// ============================================================================
// NOTES:
// ============================================================================
// - $tagline is optional - omit or set to empty string if not needed
// - $checkbox_list is optional - omit or set to empty array if not needed
// - $paragraphs can contain any number of text strings
// - $grid_items can have empty 'icon' and 'label' values to create spacing
// - $center_item supports both 'image' and 'text' types
// - All icon paths are relative to ../assets/img/ directory
// - The component maintains the existing styling from block-fragmentation-small.php
// ============================================================================
?>
