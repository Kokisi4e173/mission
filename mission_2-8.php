<?php
// �ϐ��̏�����
$res = null;
$pdo_conn = null;
$sql = null;

try {
	// �f�[�^�x�[�X�Ɛڑ�
	$pdo_conn = new PDO('mysql:host=localhost;dbname=co_932_it_99sv_coco_com','co-932.it.99sv-c','8By6cYds');	

	// �e�[�u���쐬�̂��߂�SQL
	$sql = "CREATE TABLE menu (
	id int PRIMARY KEY,
	name varchar(50),
	price int,
	modify_datetime date,
	create_datetime date
)";
	// SQL�N�G�����s
	$res = $pdo_conn->query( $sql);
	var_dump($res);

} catch(PDOException $e) {

	var_dump($e->getMessage());
}

// �f�[�^�x�[�X�̐ڑ���ؒf
$pdo_conn = null;
?>