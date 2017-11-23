<?php

$pdo=new PDO('データベース名’’ユーザー名’’パスワード’);




// SELECT文を変数に格納
$sql = "SELECT * FROM menu";
 
$result = $pdo->query($sql);
 
// foreach文で配列の中身を一行ずつ出力
foreach ($result as $row) {
 
  // データベースのフィールド名で出力
echo $row['name'].'：';
echo $row['text'].'<br>';
 
}

?>
