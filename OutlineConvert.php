<?php
/*
h1 removal - 
Backslash removeal - 
Admonishments conversion - 
Wikilinks conversion - 
*/

// Define the base directory
define('BASE_DIR', '/Users/Reess/Code/ToolsNew/OutlineConvert/Actions');

// Include files using the base directory constant
include(BASE_DIR . '/DeleteLineRange.php');
include(BASE_DIR . '/DeleteBackslashes.php');
include(BASE_DIR . '/ConvertAdmonishments.php');



// Example usage:

/*
try {
    removeLinesFromFile(__DIR__ . "/Obsidian.md", 1, 2);
    echo "Lines successfully removed.\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
*/    



// Example usage:
$filePath = __DIR__ . '/Obsidian.md';
removeBackslashLines($filePath);


// Usage example
// $filePath = __DIR__ . '/OutlineFormat.md';
// convertAdmonitionBlocks($filePath);