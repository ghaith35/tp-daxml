<?php
// Ensure the 'file' parameter is provided
if (!isset($_GET['file'])) {
    echo "Error: No city file specified.";
    exit;
}

// Sanitize the 'file' parameter to prevent directory traversal attacks
$cityFile = basename($_GET['file']);
$xmlFilePath = "xml/$cityFile";
$xslFilePath = "xsl/Ville.xsl";

// Check if the XML file exists
if (!file_exists($xmlFilePath)) {
    echo "Error: The specified city file does not exist.";
    exit;
}

// Load the XML file
$xml = new DOMDocument();
if (!$xml->load($xmlFilePath)) {
    echo "Error: Unable to load the XML file.";
    exit;
}

// Load the XSL file
$xsl = new DOMDocument();
if (!$xsl->load($xslFilePath)) {
    echo "Error: Unable to load the XSL file.";
    exit;
}

// Perform the XSL transformation
$proc = new XSLTProcessor();
$proc->importStylesheet($xsl);
echo $proc->transformToXML($xml);
?>
