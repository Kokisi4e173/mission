<?php

$pdo=new PDO('mysql:host=localhost;dbname=co_932_it_99sv_coco_com','co-932.it.99sv-c','8By6cYds');




// SELECT����ϐ��Ɋi�[
$sql = "SELECT * FROM menu";
 
$result = $pdo->query($sql);
 
// foreach���Ŕz��̒��g����s���o��
foreach ($result as $row) {
 
  // �f�[�^�x�[�X�̃t�B�[���h���ŏo��
echo $row['name'].'�F';
echo $row['text'].'<br>';
 
}

?>