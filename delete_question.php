<?php
include 'db.php';

// 獲取刪除題目的ID
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];

// 從資料庫中刪除題目
$sql = "DELETE FROM questions WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false, "message" => "Error: " . $conn->error));
}

$conn->close();
?>
