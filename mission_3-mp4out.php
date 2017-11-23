<?php
if (preg_match('/^[0-9]+$/', $_GET['key'])) {
$id = $_GET['key'];
} else {
throw new Exception('ƒGƒ‰[');
}

$pdo = new PDO('mysql:host=ホスト名;dbname=データベース名','ユーザー名','パスワード');
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
