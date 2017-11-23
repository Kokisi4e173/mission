<?php
if (preg_match('/^[0-9]+$/', $_GET['key'])) {
$id = $_GET['key'];
} else {
throw new Exception('ƒGƒ‰[');
}

$pdo = new PDO('mysql:host=localhost;dbname=co_932_it_99sv_coco_com','co-932.it.99sv-c','8By6cYds');
$stmt = $pdo->prepare('SELECT ext, contents FROM images WHERE id=:id');
$stmt->bindParam(':id', $id);
$stmt->execute();

$contents_type = array(
'jpg' => 'image/jpeg',
'jpeg' => 'image/jpeg',
'png' => 'image/png',
'gif' => 'image/gif',
'bmp' => 'image/bmp',
'mp4' => 'video/mp4',
'flv' => 'video/flv',
);

$img = $stmt->fetchObject();
header('Content-type: ' . $contents_type[$img->ext]);
echo $img->contents;
?>