<?php

function removeBackslashLines($filePath) {
    // Open the original file for reading
    $fileHandle = fopen($filePath, 'r');
    if (!$fileHandle) {
        die('Error reading the file');
    }

    // Generate the new filename by adding "cleaned" before the file extension
    $pathInfo = pathinfo($filePath);
    $cleanedFilename = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '_cleaned.' . $pathInfo['extension'];

    // Create a new file for writing the cleaned content in the same directory
    $cleanedFileHandle = fopen($cleanedFilename, 'w');
    if (!$cleanedFileHandle) {
        fclose($fileHandle);
        die('Error creating the cleaned file');
    }

    // Read and filter lines one by one
    while (($line = fgets($fileHandle)) !== false) {
        if (strpos($line, '\\') === false) {
            fwrite($cleanedFileHandle, $line);
        }
    }

    // Close file handles
    fclose($fileHandle);
    fclose($cleanedFileHandle);

    echo "Backslashes and their lines have been removed. Cleaned file: $cleanedFilename\n";
}



