<?php
$tempHtmlPath = __DIR__ . "/tmp/test.html";
$content = "<html><body><h1>Test HTML</h1></body></html>";
if (file_put_contents($tempHtmlPath, $content) === false) {
    die("Error: Unable to save test HTML file.");
}
echo "Test HTML file saved successfully.";
?>

