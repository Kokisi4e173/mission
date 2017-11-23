<?php

$pdo=new PDO('データベース名’’ユーザー名’’パスワード’);

// INSERT文を変数に格納
$sql = "INSERT INTO menu (name, population, created) VALUES (:name, :population, now())";

$result=$pdo->query($sql);
 
 
// 登録完了のメッセージ
echo '登録完了しました';






?>
