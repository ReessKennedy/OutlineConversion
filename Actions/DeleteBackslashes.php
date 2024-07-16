<?php

function removeBackslashLines($filePath) {
    // Read the original file content
    $fileContent = file($filePath);

    if ($fileContent === false) {
        die('Error reading the file');
    }

    // Filter out lines containing backslashes
    $cleanedContent = array_filter($fileContent, function($line) {
        return strpos($line, '\\') === false;
    });

    // Write the cleaned content back to the same file
    $result = file_put_contents($filePath, implode("", $cleanedContent));

    if ($result === false) {
        die('Error writing the cleaned file');
    }

    echo "Backslashes and their lines have been removed. Cleaned file: $filePath\n";
}