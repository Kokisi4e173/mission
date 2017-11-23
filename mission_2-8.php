<?php
// 変数の初期化
$res = null;
$pdo_conn = null;
$sql = null;

try {
	// データベースと接続
	$pdo_conn = new PDO('mysql:host=localhost;dbname=co_932_it_99sv_coco_com','co-932.it.99sv-c','8By6cYds');	

	// テーブル作成のためのSQL
	$sql = "CREATE TABLE menu (
	id int PRIMARY KEY,
	name varchar(50),
	price int,
	modify_datetime date,
	create_datetime date
)";
	// SQLクエリ実行
	$res = $pdo_conn->query( $sql);
	var_dump($res);

} catch(PDOException $e) {

	var_dump($e->getMessage());
}

// データベースの接続を切断
$pdo_conn = null;
?>