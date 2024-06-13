<?php
include 'db.php';

session_start();

$student_id = $_SESSION['student_id']; // 確保學生ID已經在session中

$sql = "SELECT score, timestamp FROM scores WHERE student_id='$student_id' ORDER BY timestamp DESC";
$result = $conn->query($sql);

$scores = array();
while ($row = $result->fetch_assoc()) {
    $scores[] = "分數：{$row['score']} - 時間：{$row['timestamp']}";
}

echo json_encode(['scores' => $scores]);

$conn->close();
?>
