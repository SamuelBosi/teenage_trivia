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
$email = $postData['username'];
$questionId = $postData['questionId'];
$userOption = $postData['option'];
$allBooks = $postData['allBooks'];
$newTestament = $postData['newTestament'];
$oldTestament = $postData['oldTestament'];

// Default score
$score = 0;

// Get the correct answer
$stmt = $conn->prepare("SELECT option1, option2, option3, option4, answer FROM questions WHERE id = ?");
$stmt->bind_param("i", $questionId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$isCorrect = false;
$answer = "";

if($row['answer'] ==  1){
    $answer = $row['option1'];
}elseif($row['answer'] ==  2){
    $answer = $row['option2'];
}elseif($row['answer'] ==  3){
    $answer = $row['option3'];
}else{
    $answer = $row['option4'];
}

if ($userOption == $row['answer']) {

    $isCorrect = true; 
    // Calculate score
    if ($allBooks == "trues") {
        $score = 10;
    } elseif (($newTestament  == "trues") || ($oldTestament  == "trues")) {
        $score = 5;
    } else {
        $score = 2;
    }
}

// Update leaderboard
$stmt = $conn->prepare("INSERT INTO leaderboard (email, score) VALUES (?, ?) ON DUPLICATE KEY UPDATE score=score+?");
$stmt->bind_param("sii", $email, $score, $score);
$stmt->execute();

echo json_encode(['success' => true, 'score' => $score, 'isCorrect' => $isCorrect, 'score' => $score, 'answer' => $answer]);

$conn->close();
?>
