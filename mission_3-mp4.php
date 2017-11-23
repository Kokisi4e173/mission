<?
/**
 * mp4.php
 */
/**
 * ���ʊ֐��ǂݍ���
 */
require 'mission_3-common.php';

/**
 * file_upload
 */
function file_upload()
{
    // POST�ł͂Ȃ��Ƃ��������Ȃ�
    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') !== 'POST') {
        return;
    }

    // �^�C�g��
    $title = filter_input(INPUT_POST, 'title');
    if ('' === $title) {
        throw new Exception('�^�C�g���͓��͕K�{�ł��B');
    }

    // �A�b�v���[�h�t�@�C��
    $upfile = $_FILES['upfile'];

    /**
     * @see http://php.net/manual/ja/features.file-upload.post-method.php
     */
    if ($upfile['error'] > 0) {
        throw new Exception('�t�@�C���A�b�v���[�h�Ɏ��s���܂����B');
    }

    $tmp_name = $upfile['tmp_name'];

    // �t�@�C�����i�n�b�V���l�Ńt�@�C���������肷�邽�߁A����t�@�C���͓����ŏ㏑�������j
    $filename = sha1_file($tmp_name);

    // �g���q
    $ext = array_search($mimetype, $allowed_types);

    // �ۑ���t�@�C���p�X
    $destination = sprintf('%s/%s.%s'
        , 'upfiles'
        , $filename
        , $ext
    );

    // �A�b�v���[�h�f�B���N�g���Ɉړ�
    if (!move_uploaded_file($tmp_name, $destination)) {
        throw new Exception('�t�@�C���̕ۑ��Ɏ��s���܂����B');
    }

    // Exif ���̍폜
    $imagick = new Imagick($destination);
    $imagick->stripimage();
    $imagick->writeimage($destination);

    // �f�[�^�x�[�X�ɓo�^
$stmt = $pdo -> prepare("INSERT INTO menu (name, value) VALUES (:name, :value)");
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':value', 1, PDO::PARAM_INT);

$name = 'one';
$stmt->execute();

    // �������Ƀy�[�W���ړ�����
    header(sprintf('Location: mission_video.php?id=%d', $lastInsertId));
}

try {
    // �t�@�C���A�b�v���[�h
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
                    <label for="title">�^�C�g��</label>
                    <input type="text" name="title" id="title" />
                </p>
                <p>
                    <label for="upfile">����t�@�C��</label>
                    <input type="file" name="upfile" id="upfile" />
                </p>
                <p>
                    <button type="submit">���M</button>
                </p>
            </form>
        </div>
    </body>
</html>