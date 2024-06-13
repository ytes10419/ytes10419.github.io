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
    <title>課程頁面</title>
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
            overflow-y: auto; /* 確保主內容區域也允許滾動 */
            background: rgba(255, 255, 255, 0.8); /* 添加半透明背景 */
            border-radius: 10px; /* 添加圓角 */
            margin: 2em auto; /* 使main居中 */
            max-width: 800px; /* 限制寬度 */
        }

        section {
            margin-bottom: 2em;
        }

        section h2 {
            color: #333;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 0.5em;
            margin-bottom: 1em;
        }

        section p {
            line-height: 1.6;
            margin-bottom: 1em;
            color: #555;
        }

        section img {
            width: 100%;
            height: auto;
            margin-top: 1em;
            border-radius: 10px; /* 添加圓角 */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* 添加陰影 */
        }

        #contact {
            width: 400px;
            margin: auto;
            position: absolute;
            top: 35%;
            left: 70%;
            transform: translate(-50%, -50%);
        }

        #gameplay img,
        #intro img {
            width: 80%; /* 縮小圖片 */
            max-width: 400px; /* 設置最大寬度 */
            margin: 0 auto; /* 居中 */
            display: block;
        }

        iframe {
            width: 100%;
            height: 315px;
            border: none;
            border-radius: 10px; /* 添加圓角 */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* 添加陰影 */
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
        <h1>聯盟戰旗基礎介紹</h1>
        <section id="intro">
            <h2>什麼是聯盟戰旗？</h2>
            <p>聯盟戰旗（Teamfight Tactics，簡稱TFT）是一款由Riot Games開發的自動戰鬥遊戲。玩家需要收集和升級英雄，並在戰鬥中配置最佳陣容來擊敗對手。</p>
            <img src="tft_overview.jpg" alt="聯盟戰旗概述">
        </section>
        
        <section id="gameplay">
            <h2>遊戲玩法</h2>
            <p>在聯盟戰旗中，玩家通過獲取金幣購買英雄，並將這些英雄放置在棋盤上。每個英雄都有不同的屬性和技能，玩家需要策略性地安排英雄的位置和組合來獲得勝利。</p>
            <img src="tft_gameplay.gif" alt="聯盟戰旗遊戲畫面">
        </section>
        
        <section id="strategy">
            <h2>策略與組合</h2>
            <p>策略和組合是聯盟戰旗的核心。玩家需要根據英雄的屬性和技能來組建強大的陣容，並根據對手的陣容調整策略。理解和掌握各種陣容和組合是取得勝利的關鍵。
                <br>下列是近期版本中的一些陣容，針對新手可以從模仿開始做起，看到s級的陣容角色，就去抓取，在黃金以下的分段相當實用。
            </p>
            <img src="tft_strategy.png" alt="聯盟戰旗策略和組合">
        </section>
        
        <section id="resources">
            <h2>資源管理</h2>
            <p>金幣和經驗值是遊戲中的兩個主要資源。玩家需要合理管理這些資源，平衡英雄的購買和升級，以及經驗值的提升來增加棋盤上的英雄數量。</p>
            <h3>利息</h3>
            <p>金錢每10的倍數皆會有額外的金錢獎勵，最大值為利息50元，則每回合會多5元的利息。
                <br>連勝連敗：只要贏(輸)兩場以上都可以吃到額外利息、最大值為贏(輸)5場
                <strong><br>下面的影片有詳細的解說，想要上分的千萬要觀看完這部影片</strong>
            </p>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/hAlWJozalQk?si=qtzdRQoE8HxVRTSb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </section>
        
        <section id="updates">
            <h2>版本更新與平衡</h2>
            <p>聯盟戰旗會定期進行版本更新和平衡調整。每個版本會引入新的英雄、羈絆和玩法，保持遊戲的新鮮感和挑戰性。
                <br>下圖是近期版本的更新資訊，每一個的版本小改動，都有可能導致陣容上的大改變，<strong>原本強勢陣容可能會跌落神壇，看似糟糕的陣容卻難以啟齒的強</strong>因此要時常注意版本更新的資訊喔!
            </p>
            <img src="tft_updates.jpg" alt="聯盟戰旗版本更新">
        </section>
    </main>

    <script src="ustd.js"></script>
</body>

</html>

