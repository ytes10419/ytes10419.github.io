<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: home.html");
    exit();
}

$user_id = $_SESSION['username']; // Assign the session variable to $student_id
$role = $_SESSION['role'];

?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>測驗</title>
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

#quiz-section {
    border:2px solid red;
    display: flex;
    width: 600px;
    background-color:white;
    text-align: center;
    flex-direction: column;
    padding: 20px;
}

#question-container {
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    margin-bottom: 20px;
}

#submit-answer {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#submit-answer:hover {
    background-color: #45a049;
}

#score-display {
    display: none;
}

#score-display h3 {
    margin-bottom: 10px;
}

#score {
    font-weight: bold;
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
                        <li><a href="exam.html">測驗區</a></li>
                    <?php else: ?>
                        <li><a href="itd.php">關於網站</a></li>
                        <li><a href="course.php">課程資訊</a></li>
                        <li><a href="exam.html">測驗區</a></li>
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
        <section id="quiz-section">
            <h2>測驗</h2>
            <form id="quiz-form">
                <div id="question-container">
                    <!-- 動態加載題目 -->
                </div>
                <button id="submit-answer">提交答案</button>
            </form>
            <div id="score-display" style="display:none;">
                <h3>您的分數：<span id="score"></span></h3>
            </div>
        </section>
    </main>
    <script src="app.js"></script>
</body>
</html>

