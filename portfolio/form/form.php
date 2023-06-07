<?php
//入力確認
if ($_GET["mode"] == "post") {
    if ($_GET["name"] == "") {
        echo "名前を入力してください";
        echo "<a href = 'form.html'>お問い合わせフォームに戻る</a>";
    } elseif ($_GET["mail"] == "") {
        echo "メールアドレスを入力してください";
    } elseif ($_GET["comment"] == "") {
        echo "お問い合わせ内容を入力してください";
    } elseif ((!$_GET["name"] == "") &&  (!$_GET["mail"] == "") && (!$_GET["comment"] == "")) {
        conf_form();
    }
}

if ($_GET["mode"] == "send") {
    send_form();
}

//入力情報の受け取り
$name = $_GET["name"];
$mail = $_GET["mail"];
$comment = $_GET["comment"];

//無効化
$name = htmlentities($name, ENT_QUOTES, "UTF-8");
$mail = htmlentities($mail, ENT_QUOTES, "UTF-8");
$comment = htmlentities($comment, ENT_QUOTES, "UTF-8");

//改行処理
$name = str_replace("\r\n", "", $name);
$mail = str_replace("\r\n", "", $mail);
$comment = str_replace("\r\n", "", $comment);
$comment = str_replace("\r", "", $comment); //これの意味の確認する！
$comment = str_replace("\n", "", $comment); //これの意味の確認する！



function conf_form()
{
    global $name;
    global $mail;
    global $comment;

    echo <<< _FORM_
    <title>確認フォーム</title>
    <p>
    お名前<br>$name
    </p>
    <p>
    メールアドレス<br>$mail
    </p>
    <p>
    お問い合わせ内容<br>$comment
    </p>
    
    <form action="form.php" method="get">
    <input type="hidden" name="name" value="$name">
    <input type="hidden" name="mail" value="$mail">
    <input type="hidden" name="comment" value="$comment">
    <input type="button"  value="前に戻る" onclick="history.back()"> //なにこれ
    <input type="submit"  value="送信する">
    <input type="hidden" name="mode" value="send">
    </form>

    _FORM_;
}

function send_form()
{
    global $name;
    global $mail;
    global $comment;

    $user_input = array($name, $mail, $comment);
    // mb_convert_variables("SJIS", "UTF-8", $user_input);  必要ないと思う。。。どうなの？
    $fh = fopen("user.csv", "a");
    flock($fh, LOCK_EX);
    fputcsv($fh, $user_input);
    flock($fh, LOCK_UN);
    fclose($fh);
}
