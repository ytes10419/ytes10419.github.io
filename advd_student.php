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
    display: flex;
    justify-content: center;
    align-items: flex-start;
}

.table-container {
            width: 100%;
            max-height: 643.6px; /* 设定容器的最大高度 */
            overflow-y: auto; /* 垂直方向的溢出自动添加滚动条 */
            border: 1px solid #ddd;
}

table{
  font-family: 'Oswald', sans-serif;
  border-collapse:collapse;

}

th{
  background-color:#009879;
  color:#ffffff;
  width:25vw;
  height:75px;
  border: 1px solid black;
}

td{
  background-color:#ffffff;
  width:25vw;
  height:50px;
  text-align:center;
  border: 1px solid black;
}

tr{
  border-bottom: 1px solid #dddddd;
}

tr:last-of-type{
  border-bottom: 2px solid #009879;
}

tr:nth-of-type(even) td{
  background-color:#f3f3f3;
}

.scrollable-cell {
            max-height: 200px; /* 设置单元格的最大高度 */
            overflow-y: auto; /* 垂直方向的溢出自动添加滚动条 */
            padding: 8px 12px;
            box-sizing: border-box;
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
    <div class="table-container">
        <table>
            <tr>
                <th>標题</th>
                <th>網址</th>
                <th>內文</th>
                <th>信箱</th>
                <th>上傳者</th>
            </tr>
            <?php include 'display_data.php' ?>
        </table>
    </div>
    </main>
</body>
</html>
