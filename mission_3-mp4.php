<?
/**
 * mp4.php
 */
/**
 * 共通関数読み込み
 */
require 'mission_3-common.php';

/**
 * file_upload
 */
function file_upload()
{
    // POSTではないとき何もしない
    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') !== 'POST') {
        return;
    }

    // タイトル
    $title = filter_input(INPUT_POST, 'title');
    if ('' === $title) {
        throw new Exception('タイトルは入力必須です。');
    }

    // アップロードファイル
    $upfile = $_FILES['upfile'];

    /**
     * @see http://php.net/manual/ja/features.file-upload.post-method.php
     */
    if ($upfile['error'] > 0) {
        throw new Exception('ファイルアップロードに失敗しました。');
    }

    $tmp_name = $upfile['tmp_name'];

    // ファイル名（ハッシュ値でファイル名を決定するため、同一ファイルは同盟で上書きされる）
    $filename = sha1_file($tmp_name);

    // 拡張子
    $ext = array_search($mimetype, $allowed_types);

    // 保存作ファイルパス
    $destination = sprintf('%s/%s.%s'
        , 'upfiles'
        , $filename
        , $ext
    );

    // アップロードディレクトリに移動
    if (!move_uploaded_file($tmp_name, $destination)) {
        throw new Exception('ファイルの保存に失敗しました。');
    }

    // Exif 情報の削除
    $imagick = new Imagick($destination);
    $imagick->stripimage();
    $imagick->writeimage($destination);

    // データベースに登録
$stmt = $pdo -> prepare("INSERT INTO menu (name, value) VALUES (:name, :value)");
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':value', 1, PDO::PARAM_INT);

$name = 'one';
$stmt->execute();

    // 成功時にページを移動する
    header(sprintf('Location: mission_video.php?id=%d', $lastInsertId));
}

try {
    // ファイルアップロード
    file_upload();
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>

<html lang="ja">
    <head>
   
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
            <form action="" method="post" enctype="multipart/form-data">
                <p>
                    <label for="title">タイトル</label>
                    <input type="text" name="title" id="title" />
                </p>
                <p>
                    <label for="upfile">動画ファイル</label>
                    <input type="file" name="upfile" id="upfile" />
                </p>
                <p>
                    <button type="submit">送信</button>
                </p>
            </form>
        </div>
    </body>
</html>