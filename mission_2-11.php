<?php

$pdo=new PDO('mysql:host=localhost;dbname=co_932_it_99sv_coco_com','co-932.it.99sv-c','8By6cYds');

// INSERT¶ðÏÉi[
$sql = "INSERT INTO menu (name, population, created) VALUES (:name, :population, now())";

$result=$pdo->query($sql);
 
 
// o^®¹ÌbZ[W
echo 'o^®¹µÜµ½';






?>