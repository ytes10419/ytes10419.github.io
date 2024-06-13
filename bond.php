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
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
            overflow-y: scroll;
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
            font-size: 1.2em;
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
        }

        nav ul li a:hover {
            color: rgb(0, 0, 0);
        }

        main {
            padding: 2em;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 2em;
            font-size: 2em;
            color: #fff;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 2em;
        }

        .card {
            background-color: #2c2c2c;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 30%;
            padding: 1em;
            box-sizing: border-box;
            position: relative;
        }

        .card .bond-icon {
            position: absolute;
            top: 1em;
            left: 1em;
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .card .hero-images {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.5em;
            margin-top: 3em;
        }

        .card .hero-images img {
            width: 60px;
            height: auto;
            border-radius: 5px;
        }

        .card .hero-icon  {
            width: 325px;
            height: auto;
            border-radius: 5px;
        }


        .card h3 {
            margin-top: 1em;
            color: #00bfff;
            text-align: center;
        }

        .card p {
            color: #ccc;
            text-align: center;
        }

        .switch-buttons {
            position: fixed;
            right: 2em;
            top: 50%;
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        .switch-buttons button {
            background-color: #00bfff;
            border: none;
            color: white;
            padding: 1em;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .switch-buttons button:hover {
            background-color: #007acc;
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
        <h1 class="section-title" id="synergy">第11季 新種族羈絆</h1>
        <div class="card-container">
            <div class="card">
                <img src="img/1.png" alt="羈絆圖片" class="bond-icon">
                <div class="hero-images">
                    <img src="img/1-1.png" alt="英雄圖片">
                    <img src="img/1-2.png" alt="英雄圖片">
                    <img src="img/1-3.png" alt="英雄圖片">
                    <img src="img/1-4.png" alt="英雄圖片">
                    <img src="img/1-5.png" alt="英雄圖片">
                    <img src="img/1-6.png" alt="英雄圖片">
                </div>
                <h3>冥影</h3>
                <p>月光賜予多個槽格，專門開始時，在這些槽格上的單位可獲得靈盾。<br>
                在亮起的槽格上的羈絆單位可獲得生命加成。
                <br>(2)200護盾；10%生命值
                <br>(4)450護盾；18%生命值
                <br>(6)900護盾；25%生命值
                <br>(9)被處決的敵軍有100%機率掉落戰利品；60%生命處決
            </p>
            </div>
            <div class="card">
                <img src="img/2.png" alt="羈絆圖片" class="bond-icon">
                <div class="hero-images">
                    <img src="img/2-1.png" alt="英雄圖片">
                    <img src="img/2-2.png" alt="英雄圖片">
                    <img src="img/2-3.png" alt="英雄圖片">
                    <img src="img/2-4.png" alt="英雄圖片">
                    <img src="img/2-5.png" alt="英雄圖片">
                    <img src="img/2-6.png" alt="英雄圖片">
                    <img src="img/1-6.png" alt="英雄圖片">
                </div>
                <h3>命定</h3>
                <p>拖曳1個命定單位到另一個命定單位上，他們便會配對並解鎖命定加成。我方配對增加20%生命。
                <br>(3)配對獲得命定加成。
                <br>(5)所有命定英雄獲得200%命定加成
                <br>(7)所有命定英雄獲得300%命定加成
                <br>(10)所有命定英雄獲得所有命定加成的300%
            </p>
            </div>
            <div class="card">
                <img src="img/3.png" alt="羈絆圖片" class="bond-icon">
                <div class="hero-images">
                    <img src="img/3-1.png" alt="英雄圖片">
                    <img src="img/3-2.png" alt="英雄圖片">
                    <img src="img/3-3.png" alt="英雄圖片">
                    <img src="img/3-4.png" alt="英雄圖片">
                    <img src="img/3-5.png" alt="英雄圖片">
                    <img src="img/3-6.png" alt="英雄圖片">
                </div>
                <h3>墨影戰士</h3>
                <p>獲得唯一墨影戰士道具。墨影戰士英雄增加5%額外傷害和傷害減免。
                    <br>(3)守護紋身
                    <br>(5)劇毒紋身以及10%額外傷害和傷害減免
                    <br>(7)轟擊紋身，力量紋身，以及15%額外傷害和傷害減免。
                    </p>
            </div>
            <div class="card">
                <img src="img/4.png" alt="羈絆圖片" class="bond-icon">
                <div class="hero-images">
                    <img src="img/4-1.png" alt="英雄圖片">
                    <img src="img/4-2.png" alt="英雄圖片">
                    <img src="img/4-3.png" alt="英雄圖片">
                    <img src="img/4-4.png" alt="英雄圖片">
                    <img src="img/4-5.png" alt="英雄圖片">
                    <img src="img/4-6.png" alt="英雄圖片">
                </div>
                <h3>天界聖徒</h3>
                <p>天界聖使單位可賦予我方隊伍獨特的能力值加成，效果會隨場上的天界聖使單位數增加。天界聖使單位額外獲得70%加成。
                    <br>(2)100%加成。
                    <br>(3)110%加成。
                    <br>(4)125%加成。
                    <br>(5)145%加成。
                    <br>(6)170%加成。
                    <br>(7)200%加成。
                </p>
            </div>
            <div class="card">
                <img src="img/5.png" alt="羈絆圖片" class="bond-icon">
                <div class="hero-images">
                    <img src="img/5-1.png" alt="英雄圖片">
                    <img src="img/5-2.png" alt="英雄圖片">
                    <img src="img/5-3.png" alt="英雄圖片">
                    <img src="img/5-4.png" alt="英雄圖片">
                    <img src="img/5-5.png" alt="英雄圖片">
                    <img src="img/5-6.png" alt="英雄圖片">
                    <img src="img/5-7.png" alt="英雄圖片">
                </div>    
                <h3>撰史仙靈</h3>
                <p>撰史仙靈單位召喚名為凱爾的勇士，並使她進化。撰史仙靈單位增加最大生命。
                    <br>(3)選擇一項輔助效果。60生命
                    <br>(5)選擇一項戰鬥效果。100生命
                    <br>(7)選擇一項戰鬥效果。150生命
                    <br>(10)飛昇。250生命
                 </p>
            </div>
            <div class="card">
                <img src="img/6.png" alt="羈絆圖片" class="bond-icon">
                <div class="hero-images">
                    <img src="img/6-1.png" alt="英雄圖片">
                    <img src="img/6-2.png" alt="英雄圖片">
                    <img src="img/6-3.png" alt="英雄圖片">
                    <img src="img/6-4.png" alt="英雄圖片">
                    <img src="img/6-5.png" alt="英雄圖片">
                </div>
                <h3>木靈</h3>
                <p>木靈增加魔法攻擊與150生命，每當敵軍陣亡時額外增加永久生命。
                    <br>(2)15；每有1位敵軍陣亡3
                    <br>(4)30；每有1位敵軍陣亡7
                    <br>(6)55；每有1位敵軍陣亡10
                </p>
            </div>
            <div class="card">
                <img src="img/7.png" alt="羈絆圖片" class="bond-icon">
                <div class="hero-images">
                    <img src="img/7-1.png" alt="英雄圖片">
                    <img src="img/7-2.png" alt="英雄圖片">
                    <img src="img/7-3.png" alt="英雄圖片">
                    <img src="img/7-4.png" alt="英雄圖片">
                    <img src="img/7-5.png" alt="英雄圖片">
                    <img src="img/7-6.png" alt="英雄圖片">
                    <img src="img/7-7.png" alt="英雄圖片">
                    <img src="img/7-8.png" alt="英雄圖片">
                </div>
                <h3>神話</h3>
                <p>神話英雄增加生命、魔法攻擊及物理攻擊。4場玩家戰鬥後，變為史詩英雄，加成增加50%。
                    <br>(3)+8% 、11% 
                    <br>(5)+18% 、22% 
                    <br>(7)+25% 、35% 
                    <br>(10)立即變為史詩英雄。加成改為增加250%。</p>
            </div>
            <div class="card">
                <img src="img/8.png" alt="羈絆圖片" class="bond-icon">
                <div class="hero-images">
                    <img src="img/8-1.png" alt="英雄圖片">
                    <img src="img/8-2.png" alt="英雄圖片">
                    <img src="img/8-3.png" alt="英雄圖片">
                    <img src="img/8-4.png" alt="英雄圖片">
                    <img src="img/8-5.png" alt="英雄圖片">                   
                </div>
                <h3>財神戰隊</h3>
                <p>落敗時，增加運氣；連敗越多，獲得的運氣越多。勝利時，降低運氣。
                    <br>(3)擲1顆骰子，根據擲出的點數，在相同場數的玩家戰鬥舉辦慶典，將運氣轉化為獎勵。
                    <br>(5)每場玩家戰鬥開始時，回復2玩家生命。
                </p>
            </div>
            <div class="card">
                <img src="img/9.png" alt="羈絆圖片" class="bond-icon">
                <div class="hero-images">
                    <img src="img/9-1.png" alt="英雄圖片">
                    <img src="img/9-2.png" alt="英雄圖片">
                    <img src="img/9-3.png" alt="英雄圖片">
                    <img src="img/9-4.png" alt="英雄圖片">
                <h3>青花瓷</h3>
                <p>施放技能後，青花瓷英雄會進入沸騰狀態，增加攻速並減少承受的傷害，持續4秒。
                    <br>(2)提升30%物功 ；20%減少傷害
                    <br>(4)提升55%物功 ；33%減少傷害
                    <br>(6)提升100%物功 ；50%減少傷害
                </p>
                </div>
            </div>

            <h1 class="section-title" id="heroes">新的英雄</h1>
            <div class="card-container">
                <div class="card">
                    <img src="img/hero1.jpg" alt="凱特琳" class="hero-icon">
                    <h3>凱特琳</h3>
                    <div class="hero-skill">
                        <div class="hero-skill-title">王牌射手</div>
                        <div class="hero-skill-description">對最遠的敵人發射一發子彈，對命中的第一個敵軍造成 450 / 675 / 1013 物理傷害。</div>
                    </div>
                </div>
                <div class="card">
                    <img src="img/hero2.jpg" alt="卡力斯" class="hero-icon">
                    <h3>卡力斯</h3>
                    <div class="img/hero-skill">
                        <div class="hero-skill-title">掠翅飛躍</div>
                        <div class="hero-skill-description">跳至3格內生命最低的敵軍並猛擊造成 190 / 285 / 439 增強傷害。</div>
                    </div>
                </div>
                <div class="card">
                    <img src="img/hero3.jpg" alt="墨菲特" class="hero-icon">
                    <h3>賽菲特</h3>
                    <div class="hero-skill">
                        <div class="hero-skill-title">黃寶石之肌</div>
                        <div class="hero-skill-description">在8秒內獲得 75 / 90 / 110 护甲防御，并且每秒對周圍敵軍造成魔法傷害 36 / 48 / 64。</div>
                    </div>
                </div>
                <div class="card">
                    <img src="img/hero4.jpg" alt="寇格魔" class="hero-icon">
                    <h3>茂凱</h3>
                    <div class="hero-skill">
                        <div class="hero-skill-title">槍林彈雨</div>
                        <div class="hero-skill-description">對範圍內生命值最低的敵軍造成 160 / 240 / 335 魔法傷害，每施放3次獲得1技能層數。</div>
                    </div>
                </div>
    </main>
    <div class="switch-buttons">
        <button id="synergyButton">羈絆</button>
        <button id="heroesButton">英雄</button>
    </div>

    <script>
        var synergyButton = document.getElementById('synergyButton');
        synergyButton.addEventListener('click', function() {
            location.href = "#synergy";
        }, false);

        var heroesButton = document.getElementById('heroesButton');
        heroesButton.addEventListener('click', function() {
            location.href = "#heroes";
        }, false);
    </script>
</body>
</html>


