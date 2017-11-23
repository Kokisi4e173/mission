<?php
/**
 * video.php
 */
require 'mission_3-common.php';

try {
    $id = filter_input(INPUT_GET, 'id');

    // �f�[�^�x�[�X���烌�R�[�h���擾
    $sql = 'SELECT `id`, `title`, `path` FROM `images` WHERE `id` = :id';
    $arr = 
    $arr[':id'] = $id;
    $rows = select($sql, $arr);
    $row = reset($rows);
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <div id="wrap">
            <?php if (isset($error)) : ?>
                <p class="error"><?= h($error); ?></p>
            <?php endif; ?>

            <p><?= h($row['title']); ?></p>
            <p>
                <img src="<?= h($row['path']); ?>" alt="<?= h($row['title']); ?>" />
            </p>
        </div>
    </body>
</html>