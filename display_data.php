<?php
$servername = "localhost";
$username = "root";
$password = ""; // 请替换为您的数据库密码
$dbname = "contact_db"; // 请替换为您的数据库名称

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 从数据库中检索数据
$sql = "SELECT * FROM contacts"; // 请替换为您的数据表名称
$result = $conn->query($sql);

// 输出数据
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td><a href='" . $row["video"] . "'>網址</a></td>";
        echo "<td><div class='scrollable-cell'>" . $row["text"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["sender"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>没有数据</td></tr>";
}
$conn->close();
?>
