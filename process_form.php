<?php
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $video = $_POST['video'];
    $text = $_POST['text'];
    $email = $_POST['email'];
    $sender = $_SESSION['username'];

    // 連接到資料庫
    $servername = "localhost";
    $username = "root"; // 根據 XAMPP 默認設置
    $password = ""; // 根據 XAMPP 默認設置
    $dbname = "contact_db";

    // 創建連接
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 檢查連接
    if ($conn->connect_error) {
        die("連接失敗: " . $conn->connect_error);
    }

    // 插入數據
    $sql = "INSERT INTO contacts (title, video, text, email, sender)
            VALUES ('$title', '$video', '$text', '$email', '$sender')";

    if ($conn->query($sql) === TRUE) {
        echo "資料已成功保存";
    } else {
        echo "錯誤: " . $sql . "<br>" . $conn->error;
    }

    // 關閉連接
    $conn->close();
} else {
    echo "非法訪問";
}
?>