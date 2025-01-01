<?php
// Print the file parameter for debugging
if (!isset($_GET['file'])) {
    die("Error: No city file specified.");
}

$cityFile = $_GET['file'];

// Set the correct path to the XML file based on your folder structure
$xmlPath = __DIR__ . "/xml/" . basename($cityFile); // Relative path
$xslPath = __DIR__ . "/xsl/city_to_pdf.xsl"; // Path to your XSL file

// Debugging: Print the file paths
echo "City file: " . $xmlPath . "<br>";
echo "XSL file: " . $xslPath . "<br>";

// Check if the XML file exists
if (!file_exists($xmlPath)) {
    die("Error: City XML file not found.");
}

// Load the XML and XSL files
$xml = new DOMDocument();
$xsl = new DOMDocument();

if (!$xml->load($xmlPath)) {
    die("Error: Unable to load XML file.");
}

if (!$xsl->load($xslPath)) {
    die("Error: Unable to load XSL file.");
}

// Set up the XSLT processor
$proc = new XSLTProcessor();
$proc->importStyleSheet($xsl);

// Instead of HTML output, we work with XSL-FO directly (for FOP to process)
$foContent = $proc->transformToXML($xml);

// Ensure temp directory exists
$tempDir = __DIR__ . "/tmp";
if (!is_dir($tempDir)) {
    mkdir($tempDir, 0777, true); // Create the directory if it doesn't exist
}

// Save the XSL-FO to a temporary file
$tempFoPath = $tempDir . "/" . uniqid() . ".fo";
if (!file_put_contents($tempFoPath, $foContent)) {
    die("Error: Unable to save the XSL-FO content.");
}

// Call Apache FOP (assuming it's installed and properly configured)
$command = "fop -xml " . escapeshellarg($xmlPath) . " -xsl " . escapeshellarg($xslPath) . " -pdf " . escapeshellarg($tempFoPath . ".pdf");

// Execute the command and check for errors
// Execute the command and check for errors
exec($command, $output, $status);

// Capture and display the output of the command
if ($status !== 0) {
    echo "Error: FOP execution failed. Output: " . implode("\n", $output);
    die();
}


// Send the PDF file to the browser
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="city_pdf.pdf"');
readfile($tempFoPath . ".pdf");

// Clean up the temporary files
unlink($tempFoPath);
unlink($tempFoPath . ".pdf");

exit;
?>
