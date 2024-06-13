<?php
include 'db.php';

session_start();

if (!isset($_SESSION['questions'])) {
    // 隨機抽取五個題目
    $sql = "SELECT id, question_text, option_a, option_b, option_c, option_d FROM questions ORDER BY RAND() LIMIT 5";
    $result = $conn->query($sql);
    $questions = array();
    while($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
    $_SESSION['questions'] = $questions;
    $_SESSION['current_question'] = 0;
    $_SESSION['score'] = 0;
}

$current_question_index = $_SESSION['current_question'];
$questions = $_SESSION['questions'];
if ($current_question_index < count($questions)) {
    echo json_encode($questions[$current_question_index]);
} else {
    echo json_encode(['end' => true, 'score' => $_SESSION['score']]);
}

$conn->close();
?>
