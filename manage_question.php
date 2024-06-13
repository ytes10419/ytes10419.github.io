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
    <title>管理考試題目</title>
    <style>
        body, html {
    height: 1000px;
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
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('tft.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    opacity: 0.5;
    z-index: -1;
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
    height: auto;
}

.logo-container {
    display: flex;
    align-items: center;
}

.logo-container2 {
    display: flex;
    align-items: center;
}

.contact {
    display: flex;
    font-size: 32px;
}

#logo {
    height: 50px;
    width: auto;
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
}


main {
    display: flex;
    height: 100%;
    align-items: center;
    justify-content: center;
}

h2, h3 {
    color: #333;
}

#manage-questions {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: auto;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    position: sticky; /* 保持表头位置不变 */
    top: 0;
    z-index: 1;
}

.scrollable-cell {
    max-height: 50px; /* 设置单元格的最大高度 */
    overflow-y: auto; /* 垂直方向的溢出自动添加滚动条 */
    padding: 8px 12px;
    box-sizing: border-box;
}

#questions-table {
    max-height: 400px;
    overflow-y: auto;
    display: block;
}

tbody {
    display: block;
    width: 100%;
}

tbody tr {
    display: table;
    table-layout: fixed;
    width: 100%;
}

thead, tbody tr {
    display: table;
    width: 100%;
    table-layout: fixed;
}

    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo-container">
                <a href="home.html">
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
        <section id="manage-questions">
            <h2>管理考試題目</h2>
            <form id="question-form">
                <input type="hidden" id="question-id">
                <div class="form-group">
                    <label for="question-text">題目：</label>
                    <input type="text" id="question-text" required>
                </div>
                <div class="form-group">
                    <label for="option-a">選項A：</label>
                    <input type="text" id="option-a" required>
                </div>
                <div class="form-group">
                    <label for="option-b">選項B：</label>
                    <input type="text" id="option-b" required>
                </div>
                <div class="form-group">
                    <label for="option-c">選項C：</label>
                    <input type="text" id="option-c" required>
                </div>
                <div class="form-group">
                    <label for="option-d">選項D：</label>
                    <input type="text" id="option-d" required>
                </div>
                <div class="form-group">
                    <label for="correct-answer">正確答案：</label>
                    <input type="text" id="correct-answer" required>
                </div>
                <button id="save-question">保存</button>
            </form>
            <h3>題目列表</h3>
            <table id="questions-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>題目</th>
                        <th>選項A</th>
                        <th>選項B</th>
                        <th>選項C</th>
                        <th>選項D</th>
                        <th>正確答案</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 動態加載題目 -->
                </tbody>
            </table>
        </section>
    </main>
    <script src="manage_question.js"></script>
</body>
</html>
