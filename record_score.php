<?php
$input = json_decode(file_get_contents('php://input'), true);
$score = $input['score'];

// 假設已有連接資料庫的代碼
include('db_connection.php');

$sql = "INSERT INTO scores (student_id, score) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $_SESSION['student_id'], $score);

$response = array();
if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['message'] = $stmt->error;
}

echo json_encode($response);
?>
