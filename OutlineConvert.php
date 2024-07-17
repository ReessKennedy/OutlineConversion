<?php
/*
h1 removal - 
Backslash removeal - 
Admonishments conversion - 
Wikilinks conversion - 
*/

// Define the base directory
define('BASE_DIR', '/Users/Reess/Code/ToolsNew/OutlineConversion/Actions');

require_once(BASE_DIR . '/ScanDir.php');
// Include files using the base directory constant
require_once(BASE_DIR . '/DeleteLineRange.php');
require_once(BASE_DIR . '/DeleteBackslashes.php');
require_once(BASE_DIR . '/ConvertAdmonishments.php');


// Define the path to start scanning from
$startPath = '/Users/Reess/Desktop/ReessDB/zOutlineWIki';

// Get all .md files from the starting path
$markdownFiles = scanForMarkdownFiles($startPath);

// Print the result
foreach ($markdownFiles as $file) {

    // removeLinesFromFile($file, 1, 2);
    // removeBackslashLines($file);
    convertAdmonitionBlocks($file);

    echo $file . PHP_EOL;
}




