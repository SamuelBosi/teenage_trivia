<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teenage_trivia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to import data from CSV
function importCsvData($file, $category, $conn) {
    $file = fopen($file, 'r');
    while (($line = fgetcsv($file)) !== FALSE) {
        $question = $line[1];
        $option1 = $line[2];
        $option2 = $line[3];
        $option3 = $line[4];
        $option4 = $line[5];
        $answer = $line[6];

        $stmt = $conn->prepare("INSERT INTO questions (question, option1, option2, option3, option4, answer, category) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $question, $option1, $option2, $option3, $option4, $answer, $category);
        $stmt->execute();
    }
    fclose($file);
}

// Directory where CSV files are stored
$directory = 'questions/';

// Iterate through all CSV files in the directory
foreach (new DirectoryIterator($directory) as $fileInfo) {
    if ($fileInfo->isDot() || $fileInfo->getExtension() !== 'csv') {
        continue;
    }
    $filePath = $fileInfo->getPathname();
    $category = $fileInfo->getBasename('.csv');
    importCsvData($filePath, $category, $conn);
}

$conn->close();
?>
