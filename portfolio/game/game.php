<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/style.css">
    <title>じゃんけんゲーム</title> 
</head>
<body>

<p>ここからいろんなところに飛べるよ！！！</p>
    <ul>
            <li><a href="http://localhost/b-class0605/portfolio/form/form.html">form</a></li>
            <li><a href="http://localhost/b-class0605/portfolio/gacha/gacha.php">gacha</a></li>
            <li><a href="http://localhost/b-class0605/portfolio/game/game.php">game</a></li>
            <li><a href="http://localhost/b-class0605/portfolio/calc/calc.php">calc</a></li>
    
        </ul>

    <form action="game.php">
        <input type="radio" name="janken" value="グー">グー<br>
        <input type="radio" name="janken" value="チョキ">チョキ<br>
        <input type="radio" name="janken" value="パー">パー<br>
        <input type="submit" name="submit" value="じゃんけんホイ">
</form>

<?php
if(isset($_GET["janken"])){
    $jibun = $_GET["janken"];

    $aitenote = ["グー", "チョキ", "パー"];
    $dasute = rand(0,2);
    $aite = $aitenote[$dasute];

    echo "自分:{$jibun}" . "<br>";
    echo "相手:{$aite}". "<br>";

    if($jibun == $aite){
        echo "あいこ";
    }

    if($jibun == "グー"){
        if($aite == "チョキ"){
            echo "あなたの勝ち";
        }elseif($aite == "パー"){
            echo "あなたの負け";
        }
    }

    if($jibun == "チョキ"){
        if($aite == "パー"){
            echo "あなたの勝ち";
        }elseif($aite == "グー"){
            echo "あなたの負け";
        }
    }

    if($jibun == "パー"){
        if($aite == "グー"){
            echo "あなたの勝ち";
        }elseif($aite == "チョキ"){
            echo "あなたの負け";
        }
    }
}else{
    echo "出す手を選んでね！";
}
        
?>
</body>
</html>