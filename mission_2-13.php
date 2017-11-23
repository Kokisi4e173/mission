<?php


// UPDATE文を変数に格納
$sql = "UPDATE menu SET name = :name WHERE id = :id";

 
// 更新する値と該当のIDを配列に格納する
$params = array(':name' => '綾瀬', ':id' => '5');
 

// 更新完了のメッセージ
echo '更新完了しました';


?>