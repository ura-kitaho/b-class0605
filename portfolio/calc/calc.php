<head>
    <link rel="stylesheet" href="../common/style.css">
</head>

<form action="calc.php" method="" get>

    <input type="text" name="num1" id="">

    <input type="radio" name="calc" id="" value="wa">+
    <input type="radio" name="calc" id="" value="sa">-
    <input type="radio" name="calc" id="" value="seki">×
    <input type="radio" name="calc" id="" value="syou">÷

    <input type="text" name="num2" id="">

    <input type="submit" value="keisan">

    <body>
        <ul>
            <li><a href="http://localhost/b-class0605/portfolio/form/form.html">form</a></li>
            <li><a href="http://localhost/b-class0605/portfolio/gacha/gacha.php">gacha</a></li>
            <li><a href="http://localhost/b-class0605/portfolio/game/game.php">game</a></li>
            <li><a href="http://localhost/b-class0605/portfolio/calc/calc.php">calc</a></li>
            <li><a href="http://localhost/b-class0605/portfolio/index.html">index</a></li>
        </ul>

</form>

<?php
if ($_GET) {
    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];

    if (isset($_GET["calc"])) {

        $value = $_GET["calc"];

        if ($value == "wa") {
            echo $num1 + $num2;
        } elseif ($value == "sa") {
            echo $num1 - $num2;
        } elseif ($value == "seki") {
            echo $num1 * $num2;
        } elseif ($value == "syou") {
            echo $num1 / $num2;
        } else {
            echo "記号を選んでください";
        }
    }
}
