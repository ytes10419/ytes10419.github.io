<?php
include 'db.php';

// 獲取更新題目的資料
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$question_text = $data['question_text'];
$option_a = $data['option_a'];
$option_b = $data['option_b'];
$option_c = $data['option_c'];
$option_d = $data['option_d'];
$correct_answer = $data['correct_answer'];

// 更新題目資料庫
$sql = "UPDATE questions SET question_text='$question_text', option_a='$option_a', option_b='$option_b', option_c='$option_c', option_d='$option_d', correct_answer='$correct_answer' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false, "message" => "Error: " . $conn->error));
}

$conn->close();
?>
