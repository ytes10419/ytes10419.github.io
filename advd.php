<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: home.html");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>進階技巧</title>
    <link rel="stylesheet" href="positionStyle.css">
    <style>
         body, html {
    height: 100%;
    margin: 0px;
    padding: 0px;
    font-family: Arial, sans-serif;
    padding: 0;
    justify-content: center;
    display: flex;
    flex-direction: column;
}
body::before {
    content: "";
    position: fixed;
    top: 66px;
    left: 0;
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    background-image: url('tft.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    opacity: 0.5; /* 调整透明度 */
    z-index: -1; /* 确保伪元素在其他内容后面 */
    justify-content: center;
}

header {
    background-color: #333;
    color: white;
    padding: 1em 0;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 2em;
}

.logo-container, .logo-container2 {
    display: flex;
    align-items: center;
}

.contact {
    display: flex;
    gap: 2em;
}

nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 1em;
}

nav ul li {
    display: inline;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 1em;
    transition: color 0.3s ease;
}

nav ul li a:hover {
    color: rgb(0, 0, 0);
}

#logo {
    height: 50px;
    width: auto;
}


main {
    display: flex;
    align-items: center;
    justify-content: center;
}

.contactForm {
    width: 60%;
    height: auto;
    padding: 20px;
    background-color: #54c7f8;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    
}

.form-group {
    margin-bottom: 20px;
    display: flex;
    align-items: center; /* 让表单元素和标签在同一水平线上 */
}

label {
    display: block;
    margin-bottom: 5px;
    margin-right:20px ;
    white-space: nowrap; /* 避免文字换行 */
}
input[type="text"],
textarea[type="text"],
input[type="email"],
input[type="url"] {
    width: 1000px;
    height: 100px; /* 设置高度，使得有内容溢出时出现滚动条 */
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: none; /* 禁止调整大小 */
    box-sizing: border-box;
    overflow: auto; /* 自动滚动条 */
    word-wrap: break-word; /* 自动换行 */
}

button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #013c7ab8;
}

/* 可选样式：调整表单在小屏幕上的布局 */
@media (max-width: 768px) {
    .contactForm {
        width: 80%;
    }
}

    </style>
</head>
<body>
    <header>
        <nav>
        <div class="logo-container">
                <a href="dashboard.php">
                    <img id="logo" src="logo.png" alt="Logo">
                </a>
            </div>
            <div class="contact">
                <ul>
                    <?php if ($role == 'teacher'): ?>
                        <li><a href="itd.php">關於網站</a></li>
                        <li><a href="course.php">教學課程</a></li>
                        <li><a href="manage_question.php">測驗區</a></li>
                    <?php else: ?>
                        <li><a href="itd.php">關於網站</a></li>
                        <li><a href="course.php">課程資訊</a></li>
                        <li><a href="quiz.php">測驗區</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <form method="post" action="home.html" style="display:inline;">
                <button type="submit" style="background:none; border:none; padding:0; cursor: pointer;">
                    <img src="logout.png" alt="登出" style="width:50px; height:50px;">
                </button>
            </form>
        </nav>
    </header>
    <main>
        <form class="contactForm">
            <div class="form-group">
                <label for="title">標題</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="video">網址</label>
                <input type="url" id="video" name="video" required>
            </div>
            <div class="form-group">
                <label for="text">內文</label>
                <textarea type="text" id="text" name="text" required></textarea>
            </div>
            <div class="form-group">
                <label for="email">聯絡</label>
                <input type="email" id="email" name="email" required>
            </div>
            <!-- 添加隐藏字段，存储发送者的信息 -->
            <input type="hidden" id="sender" name="sender" value="username">
            <button type="submit">發送</button>
        </form>
    </main>
    
    <script src="contact.js">
    </script>
</body>
</html>
