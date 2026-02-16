<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages Index</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            background: #f5f5f5;
        }
        h1 {
            color: #333;
            border-bottom: 3px solid #0073aa;
            padding-bottom: 10px;
        }
        .page-list {
            list-style: none;
            padding: 0;
        }
        .page-list li {
            background: white;
            margin: 10px 0;
            padding: 15px 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .page-list li:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        .page-list a {
            color: #0073aa;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
        }
        .page-list a:hover {
            text-decoration: underline;
        }
        .count {
            color: #666;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Pages Directory</h1>

    <?php
    // Get current directory
    $current_dir = __DIR__;

    // Scan directory for PHP files
    $files = glob($current_dir . '/*.php');

    // Filter out index.php itself
    $files = array_filter($files, function ($file) {
        return basename($file) !== 'index.php';
    });

    // Sort files alphabetically
    sort($files);

    if (!empty($files)):
    ?>
        <ul class="page-list">
            <?php foreach ($files as $file):
                $filename  = basename($file);
                $page_name = str_replace(['-', '_', '.php'], [' ', ' ', ''], $filename);
                $page_name = ucwords($page_name);

                // Create absolute URL using current protocol and host
                $protocol     = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
                $host         = $_SERVER['HTTP_HOST'] ?? 'localhost';
                $absolute_url = $protocol . $host . '/wp-content/themes/integrate/frontend/pages/' . $filename;
            ?>
                <li>
                    <a href="<?php echo htmlspecialchars($absolute_url, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer">
                        <?php echo htmlspecialchars($page_name, ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                    <small style="color: #999; margin-left: 10px;">(<?php echo htmlspecialchars($filename, ENT_QUOTES, 'UTF-8'); ?>)</small>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="count">Total pages: <strong><?php echo count($files); ?></strong></p>
    <?php else: ?>
        <p>No PHP files found in this directory.</p>
    <?php endif; ?>
</body>
</html>
