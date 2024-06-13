<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$role = $data['role'];
$name = $data['name'];
$password = $data['password'];

$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "school_db";

$conn = new mysqli($servername, $username, $password_db, $dbname);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

if ($role == 'teacher') {
    $sql = "SELECT * FROM teachers WHERE username='$name'";
} else {
    $sql = "SELECT * FROM students WHERE username='$name'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $name;
        $_SESSION['role'] = $role;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid password']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No user found']);
}

$conn->close();
?>
