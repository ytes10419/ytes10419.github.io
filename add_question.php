<?php
include 'db.php';

// 獲取新增題目的資料
$data = json_decode(file_get_contents("php://input"), true);
$question_text = $data['question_text'];
$option_a = $data['option_a'];
$option_b = $data['option_b'];
$option_c = $data['option_c'];
$option_d = $data['option_d'];
$correct_answer = $data['correct_answer'];

// 新增題目到資料庫
$sql = "INSERT INTO questions (question_text, option_a, option_b, option_c, option_d, correct_answer)
 VALUES ('$question_text', '$option_a', '$option_b', '$option_c', '$option_d', '$correct_answer')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false, "message" => "題目新增失敗 " . $conn->error));
}

$conn->close();
?>
