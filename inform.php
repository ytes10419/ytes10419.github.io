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
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        body::before {
            content: "";
            position: fixed;
            top: 66px;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('big.webp');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            opacity: 0.5; /* 调整透明度 */
            z-index: -1; /* 确保伪元素在其他内容后面 */
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
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
        #logo {
            height: 50px;
            width: auto;
        }        
        nav .contact {
            flex: 2;
            text-align: center;
        }
        nav .contact ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }
        nav .contact ul li {
            margin: 0 10px;
        }
        nav .contact ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }
        nav .contact ul li a:hover {
            color: #ddd;
        }
        .hero-container {
            position: relative;
            text-align: center;
            color: white;
        }
        .hero-image {
            width: 100%;
            height: auto;
            filter: blur(8px);
            -webkit-filter: blur(8px);
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }
        .hero-content img {
            width: 80%;
            height: auto;
            margin-top: 20px;
            z-index: 1;
            position: relative;
        }
        main {
            padding: 20px;
            background-color: white;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1, h2 {
            color: #333;
        }
        .patch-notes {
            margin-bottom: 20px;
        }
        .patch-notes h2 {
            background-color: #444;
            color: white;
            padding: 10px;
            margin: 0 -20px 10px;
            border-radius: 8px 8px 0 0;
        }
        .patch-notes ul {
            list-style: none;
            padding: 0;
        }
        .patch-notes ul li {
            background-color: #f9f9f9;
            margin: 5px 0;
            padding: 10px;
            border-left: 5px solid #444;
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
    <div class="hero-container">
        <img src="big.webp" alt="大圖" class="hero-image">
        <div class="hero-content">
            <img src="big.webp" alt="大圖">
        </div>
    </div>
    <main>
        <h1>Teamfight Tactics Patch 14.11 更新資訊</h1>
        <section class="patch-notes">
        <section class="patch-notes">
            <h2>排位賽</h2>
            <ul>
                <li>達到大師以上級別的玩家現在可以與另一位積分在400LP以內的玩家組隊排位。</li>
            </ul>

            <h2>中東伺服器</h2>
            <ul>
                <li>中東伺服器將於2024年6月25日晚上8點（PT）開放。符合條件的賬號可以在伺服器開放後至2024年9月2日期間，以1個藍色精華轉移到中東伺服器。之後，轉移費用將增加到2600 RP。請注意，TFT Mobile將在今年晚些時候上線。</li>
            </ul>

            <h2>隊伍規劃器</h2>
            <ul>
                <li>現在可以在TFT Mobile大廳中使用隊伍規劃器！在排隊時計劃你的戰略。</li>
            </ul>

            <h2>大改動</h2>
            <h3>特質</h3>
            <ul>
                <li>射擊特技反彈傷害：40/55% ⇒ 40/60%</li>
            </ul>
            <h3>單位：一費</h3>
            <ul>
                <li>達瑞斯技能傷害：200/300/450% AP ⇒ 190/285/450% AP</li>
                <li>蓋倫法力值削弱：30/70 ⇒ 30/80</li>
                <li>亞索被動技能在有護盾時的傷害：40/40/45% 护甲/魔抗 ⇒ 30/45/70% 护甲/魔抗</li>
            </ul>
            <h3>單位：二費</h3>
            <ul>
                <li>納爾被動技能最大疊加層數：40 ⇒ 45</li>
                <li>琪亞娜攻擊力：55 ⇒ 50</li>
            </ul>
            <h3>單位：四費</h3>
            <ul>
                <li>納帝魯斯法力值：60/160 ⇒ 60/170</li>
                <li>星朵拉技能初始蝴蝶數量：7/7/10 ⇒ 6/6/10</li>
                <li>星朵拉技能傷害：40/60/180% AP ⇒ 45/70/180% AP</li>
            </ul>
            <h3>單位：五費</h3>
            <ul>
                <li>麗珊卓技能傷害：640/960/8888% AP ⇒ 660/990/8888% AP</li>
            </ul>
            <h3>強化符文</h3>
            <ul>
                <li>賽博增幅和賽博聯結（所有等級）不再於2-1階段提供</li>
                <li>天生不同II額外生命值：220/280/340/400 ⇒ 220/300/380/480</li>
                <li>天生不同II額外攻擊速度：35/40/45/50% ⇒ 40/45/50/55%</li>
                <li>死神收割：獲得燼和犽宿 ⇒ 獲得犽宿和悠米</li>
                <li>死神收割：每層全能吸血：4% ⇒ 5%</li>
                <li>幸運爪（小狍子）傷害：250% ⇒ 225%</li>
                <li>兩個健康的額外生命值：99 ⇒ 90</li>
                <li>龍王冠冕：獲得迦娜和黛安娜</li>
                <li>終極升級不再於2-1階段提供</li>
                <li>瓷器王冠：獲得拉克絲 ⇒ 獲得阿木木</li>
            </ul>
            <h3>神器</h3>
            <ul>
                <li>詛咒之刃已加入！</li>
                <li>詛咒之刃攻擊速度：15%</li>
                <li>詛咒之刃魔法抗性：20</li>
                <li>詛咒之刃：攻擊降低目標最大生命值3%。對同一目標攻擊13次將使其星級降低1。</li>
                <li>鑽石之手生命值：400 ⇒ 300</li>
            </ul>
            <h3>支援物品</h3>
            <ul>
                <li>月石再生者護盾值：100 + 每階段50 ⇒ 60 + 每階段50</li>
                <li>月石再生者最大護盾值：400 ⇒ 360</li>
                <li>無用大寶石生命值：250 ⇒ 300</li>
            </ul>
        </section>

        <section class="patch-notes">
            <h2>小改動</h2>
            <h3>強化符文</h3>
            <ul>
                <li>幽靈傷害每個幽靈：5/10/16/32% ⇒ 5/10/16/36%</li>
            </ul>
            <h3>單位</h3>
            <ul>
                <li>卡茲克技能AD加成：340% ⇒ 340/340/350%</li>
                <li>希維爾技能AD提升：95/95/100% ⇒ 95/95/110%</li>
                <li>希維爾技能攻擊速度提升：15/20/25%⇒ 95/95/110%</li>
            </ul>
        </section>
    </main>
</body>
</html>                    

