<?php
$pdo=new PDO('データベース名’’ユーザー名’’パスワード’);
$sql='SHOW TABLES';
$result=$pdo->query($sql);
foreach($result as $row){
echo $row[0];
echo'<br>';
}


?>
