<form action="calc.php" method="get">

    <input type="text" name="num1" id="">

    <input type="radio" name="keisan" id="" value="wa">+
    <input type="radio" name="keisan" id="" value="sa">-
    <input type="radio" name="keisan" id="" value="saki">×
    <input type="radio" name="keisan" id="" value="syou">÷

    <input type="text" name="num2">
    <input type="submit" value="計算">

</form>

<?php
if ($_GET) {

    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];

    if (isset($_GET["keisan"])) {

        $value = $_GET["keisan"];
        if ($value == "wa") {
            echo  $num1 + $num2;
        } elseif ($value == "sa") {
            echo $num1 - $num2;
        } elseif ($value == "seki") {
            echo $num1 * $num2;
        } elseif ($value == "syou") {
            echo $num1 / $num2;
        }
    } else {
        echo "計算の値を入れてね";
    }
}
