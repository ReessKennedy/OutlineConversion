<?php


/**
 * Converts Markdown links in a file to simpler wiki links format and writes the updated content back to the file.
 *
 * @param string $filePath Path to the Markdown file.
 * @return void
 * @throws Exception If the file cannot be read or written.
 */
function convertMarkdownLinksToWikiLinks($filePath) {
    // Read the file content
    $content = file_get_contents($filePath);
    if ($content === false) {
        throw new Exception("Unable to read the file: $filePath");
    }

    // Define a regular expression to match Markdown links
    $markdownLinkPattern = '/\[(.*?)\]\((.*?)\)/';

    // Callback function to replace Markdown links with wiki links
    $replaceCallback = function($matches) {
        $linkText = $matches[1];
        $url = $matches[2];
        $wikiLink = '[[' . $linkText . '|' . $url . ']]';
        return $wikiLink;
    };

    // Perform the replacement
    $updatedContent = preg_replace_callback($markdownLinkPattern, $replaceCallback, $content);

    // Write the updated content back to the file
    if (file_put_contents($filePath, $updatedContent) === false) {
        throw new Exception("Unable to write to the file: $filePath");
    }
}