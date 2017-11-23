<html>
<head>
<title>簡易掲示板2017</title>
</head>
<body>
パスワードを入力してください。
<form name="form" action="./mission_2-6.php" method="POST">
<input name="pass" type="text">
<input type="submit" value="ログイン">
</form>
</body>
</html>

>
<?php
// パスワードを設定する。
$pass = 1234;
// form.htmlからのパスワードを受け取る
$form_pass = $_REQUEST["pass"];
?>

<?php
// form.htmlからの値が$form_passと等しいか評価する
if($form_pass == $pass){

echo "ログイン成功!!<br>",
"<a href=\"./mission_2-61.php\">WELCOME</a>";

}else{

echo "ログイン失敗<br>",
"<a href=\"./mission_2-6.php\">戻る</a>";}
?>
</body>
</html>

