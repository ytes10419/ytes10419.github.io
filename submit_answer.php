<?php
include 'db.php';

session_start();

$data = json_decode(file_get_contents("php://input"), true);
$selected_answer = $data['selected_answer'];
$question_id = $data['question_id'];

$sql = "SELECT correct_answer FROM questions WHERE id='$question_id'";
$result = $conn->query($sql);
$question = $result->fetch_assoc();

if ($question['correct_answer'] == $selected_answer) {
    $_SESSION['score'] += 1;
}

$_SESSION['current_question'] += 1;

if ($_SESSION['current_question'] >= count($_SESSION['questions'])) {
    $student_id = $_SESSION['student_id']; // 確保學生ID已經在session中
    $score = $_SESSION['score'];
    $sql = "INSERT INTO scores (student_id, score) VALUES ('$student_id', '$score')";
    $conn->query($sql);
}

$conn->close();
?>
