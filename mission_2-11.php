<?php

$pdo=new PDO('mysql:host=localhost;dbname=co_932_it_99sv_coco_com','co-932.it.99sv-c','8By6cYds');

// INSERT����ϐ��Ɋi�[
$sql = "INSERT INTO menu (name, population, created) VALUES (:name, :population, now())";

$result=$pdo->query($sql);
 
 
// �o�^�����̃��b�Z�[�W
echo '�o�^�������܂���';






?>