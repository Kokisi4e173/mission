<?php 

$pdo=new PDO('mysql:host=localhost;dbname=co_932_it_99sv_coco_com','co-932.it.99sv-c','8By6cYds');
$sql= 'SHOW CREATE TABLE menu';
$result=$pdo->query($sql);
foreach($result as $row){

echo $row[0]; 

echo '</tr>'; 
} 
echo '</table>'; 
?>