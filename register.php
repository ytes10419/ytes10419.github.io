<?php
header('Content-Type: application/json');
session_start();

$data = json_decode(file_get_contents('php://input'), true);

$role = $data['role'];
$username = $data['username'];
$password = $data['password'];
$name = $data['name'];
$email = $data['email'];

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "school_db";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

// 检查用户名是否已存在
if ($role == 'teacher') {
    $checkSql = "SELECT * FROM teachers WHERE username=?";
} else {
    $checkSql = "SELECT * FROM students WHERE username=?";
}

$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("s", $username);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Username already exists']);
    $checkStmt->close();
    $conn->close();
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

if ($role == 'teacher') {
    $insertSql = "INSERT INTO teachers (username, password, name, email) VALUES (?, ?, ?, ?)";
    $redirectUrl = 'teacher_dashboard.php';
} else {
    $insertSql = "INSERT INTO students (username, password, name, email) VALUES (?, ?, ?, ?)";
    $redirectUrl = 'student_dashboard.php';
}

$insertStmt = $conn->prepare($insertSql);
$insertStmt->bind_param("ssss", $username, $hashedPassword, $name, $email);

if ($insertStmt->execute()) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
    echo json_encode(['success' => true, 'redirect' => $redirectUrl]);
} else {
    echo json_encode(['success' => false, 'message' => 'Registration failed']);
}

$insertStmt->close();
$conn->close();
?>
