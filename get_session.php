<?php
session_start();
include 'db.php';

$response = array();

if (isset($_SESSION['student_id']) && isset($_SESSION['username'])) {
    $response['success'] = true;
    $response['username'] = $_SESSION['username'];
} else {
    $response['success'] = false;
}

echo json_encode($response);
?>
