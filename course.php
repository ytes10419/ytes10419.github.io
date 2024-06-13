<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: home.html");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];

?>

<?php
// index.php

// 如果會話未啟動，則啟動會話
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 如果檢測到登出請求，執行登出邏輯
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 清空會話數據
    $_SESSION = array();

    // 如果存在會話 cookie，則刪除它
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // 最後，銷毀會話
    session_destroy();

    // 重定向到登錄頁面或其他頁面
    header("Location: hom.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>愛棋藝</title>
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
    height: 676px;
    padding: 32px;
    margin: 0;
}

main div {
    width: 100%;
    height: 100%;
    text-align: center;
    display: flex;
    margin: 0;
    padding: 0;
}
main ul {
    list-style: none;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    list-style-type: none;
}

/* 设置 li 元素样式 */
main li {
    width: calc(50% - 20px); /* 计算宽度，减去 margin */
    margin: 10px; /* 间距 */
    text-align: center; /* 居中文本 */
    border: 3px solid #000000; /* 边框 */
    padding: 20px; /* 内边距 */
    box-sizing: border-box; /* 边框内盒模型 */
    background-color: #faad44; /* 背景颜色 */
    border-radius: 40px;
    font-size: 32px;
}

main ul li {
    display: inline;
}

main li a {
    color: rgb(0, 0, 0);
    text-decoration: none;
    font-size: 1em;
}

main li a:hover{
    color: aliceblue;
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
        <div>
            <ul>
                <?php if ($role == 'teacher'): ?>
                    <li><a href="ustd.php">遊戲基礎理解</a></li>
                    <li><a href="bond.php">英雄和羈絆</a></li>
                    <li><a href="position.php">佈局和擺位</a></li>
                    <li><a href="item.php">裝備和物品</a></li>
                    <li><a href="advd.php">進階技巧</a></li>
                    <li><a href="inform.php">版本更新資訊</a></li>
                <?php else: ?>
                    <li><a href="ustd.php">遊戲基礎理解</a></li>
                    <li><a href="bond.php">英雄和羈絆</a></li>
                    <li><a href="position.php">佈局和擺位</a></li>
                    <li><a href="item.php">裝備和物品</a></li>
                    <li><a href="advd_student.php">進階技巧</a></li>
                    <li><a href="inform.php">版本更新資訊</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </main>
</body>
</html>
