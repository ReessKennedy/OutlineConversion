<?php
/*
h1 removal - 
Backslash removeal - 
Admonishments conversion - 
Wikilinks conversion - 
*/

// Define the base directory
define('BASE_DIR', '/Users/Reess/Code/ToolsNew/OutlineConversion/Actions');

// Include files using the base directory constant
require_once(BASE_DIR . '/DeleteLineRange.php');
require_once(BASE_DIR . '/DeleteBackslashes.php');
require_once(BASE_DIR . '/ConvertAdmonishments.php');

// Example usage:


// Example usage:
$filePath = __DIR__ . '/Obsidian.md';

/*
try {
    
    echo "Lines successfully removed.\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
*/    

removeLinesFromFile($filePath, 1, 2);
removeBackslashLines($filePath);
convertAdmonitionBlocks($filePath);