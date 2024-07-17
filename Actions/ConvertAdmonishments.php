<?php

/**
 * Function to convert ::: admonition blocks to ```ad- code blocks in a given file using a mapping array.
 *
 * @param string $filePath The path to the file to be processed.
 * @return void
 */
function convertAdmonitionBlocks($filePath) {
    // Define the mapping array
    $admonitionMap = [
        'info' => 'ad-info',
        'success' => 'ad-success',
        'warning' => 'ad-warning',
        'tip' => 'ad-tip'
    ];
    
    // Read the contents of the file
    $contents = file_get_contents($filePath);
    
    // Iterate through the mapping array and perform replacements
    foreach ($admonitionMap as $admonition => $replacement) {
        // Regular expression to find specific ::: admonition blocks
        $pattern = '/:::' . $admonition . '(.*?):::/s';
        
        // Replacement pattern with corresponding ```ad- blocks
        $replacementPattern = "```" . $replacement . "$1\n```";
        
        // Perform the replacement
        $contents = preg_replace($pattern, $replacementPattern, $contents);
    }
    
    // Save the new contents back to the file
    file_put_contents($filePath, $contents);
    
    echo "Admonition blocks converted successfully.\n";
}
