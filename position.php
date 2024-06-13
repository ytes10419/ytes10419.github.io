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
    <title>愛棋藝</title>
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
    height: 100%;
    align-items: center;
    justify-content: center;
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
        <iframe name="dive" src="https://dive.nutn.edu.tw/Experiment/kaleTestExperiment5.jsp?eid=30864&record=false" width="100%" height="100%">
        </iframe>
    </main>
</body>
</html>
