<?php
header('Content-Type: application/json');

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

// Retrieve POST data

$postData = json_decode(file_get_contents('php://input'), true);
$sql = "SELECT id, question, option1, option2, option3, option4, category FROM questions WHERE ";
if($postData){
    $allBooks = $postData['allBooks'];
    $newTestament = $postData['newTestament'];
    $oldTestament = $postData['oldTestament'];
    $books = $postData['books'];
    //print_r($allBooks);

    $oldTestamentBooks = ["GENESIS", "EXODUS", "LEVITICUS", "NUMBERS", "DEUTERONOMY", "JOSHUA", "JUDGES", "RUTH", "1SAMUEL", "2SAMUEL", "1KINGS", "2KINGS", "1CHRONICLES", "2CHRONICLES", "EZRA", "NEHEMIAH", "ESTHER", "JOB", "PSALMS", "PROVERBS", "ECCLESIASTES", "SONG OF SOLOMON", "ISAIAH", "JEREMIAH", "LAMENTATIONS", "EZEKIEL", "DANIEL", "HOSEA", "JOEL", "AMOS", "OBADIAH", "JONAH", "MICAH", "NAHUM", "HABAKKUK", "ZEPHANIAH", "HAGGAI", "ZECHARIAH", "MALACHI"];
    $newTestamentBooks = ["MATTHEW", "MARK", "LUKE", "JOHN", "ACTS", "ROMANS", "1CORINTHIANS", "2CORINTHIANS", "GALATIANS", "EPHESIANS", "PHILIPPIANS", "COLOSSIANS", "1THESSALONIANS", "2THESSALONIANS", "1TIMOTHY", "2TIMOTHY", "TITUS", "PHILEMON", "HEBREWS", "JAMES", "1PETER", "2PETER", "1JOHN", "2JOHN", "3JOHN", "JUDE", "REVELATION"];


    // SQL Query
    
    if ($allBooks == "trues") {
        $sql .= "1"; // Fetch all questions
    } elseif ($newTestament == "trues") {
        $bookPlaceholders = array_rand($newTestamentBooks);
        $sql .= "category = '$newTestamentBooks[$bookPlaceholders]'";
    } elseif ($oldTestament == "trues") {
        $bookPlaceholders = array_rand($oldTestamentBooks);
        $sql .= "category = '$oldTestamentBooks[$bookPlaceholders]'";
    } elseif (!empty($books)) {
        $bookPlaceholders = array_rand($books);
        $sql .= "category = '$books[$bookPlaceholders]'";
    } else {
        $sql .= "1"; // Default to fetching all questions if no option is selected
    }

}else{
    $sql .= "1";
}

// Adding randomization
$sql .= " ORDER BY RAND() LIMIT 1";

// Prepare statement
$stmt = $conn->prepare($sql);

// // Bind parameters if necessary
// if (!empty($books) && !$allBooks && !$newTestament && !$oldTestament) {
//     $stmt->bind_param(str_repeat('s', count($books)), ...$books);
// }

// Execute query
$stmt->execute();
$result = $stmt->get_result();

// Fetch result
$question = $result->fetch_assoc();

//print_r($question);

// Close connection
$stmt->close();
$conn->close();

// Return question as JSON
echo json_encode($question);
?>
