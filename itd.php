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
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    
}

body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('bkgd.jpg');
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
    padding: 2em;
    background-color: rgba(255, 255, 255, 0.8);
    margin: 2em auto;
    width: 80%;
    max-width: 1200px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    animation: fadeIn 2s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

#intro, #about #teachers{
    margin-bottom: 2em;
}

#intro h2, #about h2, #teachers h2 {
    font-size: 2em;
    margin-bottom: 0.5em;
}

#intro p, #about p {
    font-size: 1em;
    line-height: 1.6;
    margin-bottom: 1em;
}

.teacher {
    display: flex;
    align-items: center;
    margin-bottom: 2em;
    animation: slideIn 2s ease-in-out;
}

@keyframes slideIn {
    from {
        transform: translateX(-100%);
    }
    to {
        transform: translateX(0);
    }
}

.teacher img {
    border-radius: 50%;
    margin-right: 20px;
    width: 150px;
    height: 150px;
    object-fit: cover;
}

.teacher-info {
    text-align: left;
}

.teacher-info h3 {
    margin: 0;
    font-size: 1.5em;
}

.teacher-info p {
    margin: 0.5em 0 0 0;
    font-size: 1em;
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
        <section id="intro">
            <h2>愛棋藝介紹</h2>
            <p>歡迎來到愛棋藝，我們致力於提供最全面、最專業的《聯盟戰旗》學習資源。無論你是剛接觸這款遊戲的新手，還是已經在遊戲中打拼多年的老玩家，這裡都能找到適合你的教學內容和最新資訊。</p>
            <p>愛棋藝是一個專注於《聯盟戰旗》（Teamfight Tactics，簡稱TFT）的學習平台。我們匯聚了多位資深玩家和策略專家，通過視頻、圖文教程、實戰分析等多種形式，為玩家們提供深入淺出的遊戲講解和策略指導。</p>
        </section>
        <section id="about">
            <h2>網站介紹</h2>
            <p>我們的教學課程涵蓋了《聯盟戰旗》中的方方面面，從基礎知識到高級技巧，幫助玩家逐步提升遊戲水平。課程內容包括：</p>
            <ul>
                <li><strong>遊戲基礎理解：</strong>從零開始，全面解析遊戲機制、界面和基本玩法。</li>
                <li><strong>英雄和羈絆：</strong>詳細介紹每個英雄的特點及其羈絆效果，幫助你構建最強陣容。</li>
                <li><strong>佈局和擺位：</strong>分享最佳的陣型佈局和擺位策略，讓你的隊伍在戰鬥中佔據優勢。</li>
                <li><strong>裝備和物品：</strong>解析各類裝備的作用和最佳搭配方式，提高你的隊伍戰鬥力。</li>
                <li><strong>進階技巧：</strong>深入探討遊戲中的高階玩法和策略，幫助你在高端局中脫穎而出。</li>
                <li><strong>版本更新資訊：</strong>及時發布遊戲更新內容和改動解析，確保你始終走在版本前沿。</li>
            </ul>
        </section>
        <section class="teachers">
            <h2>教師團隊</h2>
            <div class="teacher">
                <img src="teacher1.JPG" alt="教師一">
                <div class="teacher-info">
                    <h3>名牌導師-江義翔</h3>
                    <p>義翔是我們聯盟戰旗學習系統的主要指導教師，擁有豐富的遊戲經驗和策略指導能力。不管是甚麼陣容，我們的一號名牌導師-義翔都能完整的詮釋玩法，而且號稱南大彭于晏，顏值與實力兼具，為愛棋藝旗下的王牌。</p>
                    <p>聯絡方式：<a href="mailto:S11055045@gm2.nutn.edu.tw">S11055045@gm2.nutn.edu.tw</a></p>
                </div>
            </div>
            <div class="teacher">
                <img src="teacher2.JPG" alt="教師二">
                <div class="teacher-info">
                    <h3>名牌導師-許鎮宇</h3>
                    <p>鎮宇專注於遊戲進階技巧的教學，幫助學生掌握更高級的遊戲策略和操作技巧。嚴格說就是義翔的附屬品遊戲理解和顏值完全比不上義翔。</p>
                    <p>聯絡方式：<a href="mailto:S11055037@gm2.nutn.edu.tw">S11055037@gm2.nutn.edu.tw</a></p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>


