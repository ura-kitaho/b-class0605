<html>

<head>
    <link rel="stylesheet" href="../common/style.css">
    <title>gacha</title>
</head>

<body>
    <h2>ガチャガチャ</h2>
    <header>
    <ul class=nav>
        <li><a href="http://localhost/b-class0605/portfolio/form/form.html">form</a></li>
        <li><a href="http://localhost/b-class0605/portfolio/gacha/gacha.php">gacha</a></li>
        <li><a href="http://localhost/b-class0605/portfolio/game/game.php">game</a></li>
        <li><a href="http://localhost/b-class0605/portfolio/calc/calc.php">calc</a></li>
        <li><a href="http://localhost/b-class0605/portfolio/index.html">index</a></li>
    </ul>
</header>
    <form action="gacha.php">
        <input type="submit" value="ガチャ">
    </form>


</body>

</html>

<?php

error_reporting(E_ALL & ~E_NOTICE);

$testuser = "testuser";
$testpass = "testpass";
$host = "localhost";
$datebase = "booksample";



try {
    $db = new PDO("mysql:host={$host}; dbname={$datebase}; charset=utf8", $testuser, $testpass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($db == null) {
        # エラーが起きたとき、ここは実行されずにcatch内が実行
    } else {
        $rand = rand(0, 5);
        $animal = array("ライオン", "ゾウ", "シマウマ", "ウサギ", "イヌ", "ネコ");
        $rarity = array("★★★", "★★", "★★", "★", "★", "★");
        $member = $animal[$rand];
        $rare = $rarity[$rand];

        echo $member;
        echo $rare;

        $SQL = <<<_SQL_
INSERT INTO gacha(
	name,
	rarity
)
VALUES (
    '$member',
    '$rare'
)

_SQL_;
        $db->query($SQL);
    }
} catch (PDOException $e) {
    echo "エラー内容：" . $e->getMessage();
    die();
}
$db = null;
?>