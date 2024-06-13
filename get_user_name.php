<?php
// 假设您的数据库连接信息如下
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_db";

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 假设您有一个名为 users 的表，包含用户信息，其中有一个字段是 username
$sql = "SELECT username FROM teacher WHERE user_id = 1"; // 假设您要获取的是用户ID为1的用户名称
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row["username"];
} else {
    echo "未找到用户";
}
$conn->close();
?>
