<?php


// DELETE文を変数に格納
$sql = "DELETE FROM menu WHERE id = :id";

// 削除するレコードのIDを配列に格納する
$params = array(':id'=>5);

// 削除完了のメッセージ
echo '削除完了しました';

?>