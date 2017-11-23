<?php

$pdo=new PDO('mysql:host=localhost;dbname=co_932_it_99sv_coco_com','co-932.it.99sv-c','8By6cYds');




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