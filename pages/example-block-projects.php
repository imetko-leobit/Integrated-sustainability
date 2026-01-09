<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Block Projects - Layout Examples</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .example-section {
            margin-bottom: 60px;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }
        .example-header {
            background: #333;
            color: white;
            padding: 15px 20px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        .example-header h2 {
            margin: 0;
            font-size: 24px;
        }
        .example-header p {
            margin: 5px 0 0 0;
            font-size: 14px;
            opacity: 0.9;
        }
        code {
            background: #f0f0f0;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <h1>Block Projects - Dynamic Text Positioning Examples</h1>
    <p>This page demonstrates the two layout options for the block-projects component.</p>

    <div class="example-section">
        <div class="example-header">
            <h2>Example 1: Default Layout (Image Left, Text Right)</h2>
            <p>No parameter needed - this is the default behavior</p>
            <code>&lt;?php include('../components/sections/block-projects.php') ?&gt;</code>
        </div>
        <?php include('../components/sections/block-projects.php'); ?>
    </div>

    <div class="example-section">
        <div class="example-header">
            <h2>Example 2: Text Below Layout (Image Top, Text Bottom)</h2>
            <p>Set <code>$text_below = true;</code> before including the component</p>
            <code>&lt;?php $text_below = true; include('../components/sections/block-projects.php') ?&gt;</code>
        </div>
        <?php 
            $text_below = true; 
            include('../components/sections/block-projects.php'); 
        ?>
    </div>
</body>
</html>
