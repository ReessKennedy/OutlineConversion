<?php

/**
 * Recursively scans through directories and subdirectories for .md files.
 *
 * @param string $directory The starting directory to scan.
 * @param array $results Array to store the paths of .md files.
 * @return array List of .md file paths.
 */
function scanForMarkdownFiles($directory, &$results = []) {
    $files = scandir($directory);

    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $filePath = $directory . DIRECTORY_SEPARATOR . $file;
        if (is_dir($filePath)) {
            scanForMarkdownFiles($filePath, $results);
        } elseif (pathinfo($file, PATHINFO_EXTENSION) === 'md') {
            $results[] = $filePath;
        }
    }

    return $results;
}