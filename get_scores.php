<?php
// 假設已有連接資料庫的代碼
include('db.php');

$sql = "SELECT student_id, score FROM scores";
$result = $conn->query($sql);

$scores = array();
while ($row = $result->fetch_assoc()) {
    $scores[] = $row;
}

echo json_encode($scores);
?>
