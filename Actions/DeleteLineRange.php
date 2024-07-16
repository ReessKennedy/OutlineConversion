<?php

/**
 * Removes a specified range of lines from a file.
 *
 * @param string $filePath The path to the file.
 * @param int $startLine The starting line number (1-based).
 * @param int $endLine The ending line number (1-based).
 * @return void
 */
function removeLinesFromFile(string $filePath, int $startLine, int $endLine): void
{
    // Validate the line range
    if ($startLine < 1 || $endLine < $startLine) {
        throw new InvalidArgumentException('Invalid line range provided.');
    }

    // Read the file into an array
    $fileContents = file($filePath, FILE_IGNORE_NEW_LINES);

    // Check if the end line is within the bounds of the file
    if ($endLine > count($fileContents)) {
        $endLine = count($fileContents);
    }

    // Remove the specified range of lines
    array_splice($fileContents, $startLine - 1, $endLine - $startLine + 1);

    // Write the modified contents back to the file
    file_put_contents($filePath, implode(PHP_EOL, $fileContents) . PHP_EOL);
}
