<?php
session_start();

// ���O�C����ԃ`�F�b�N
if (!isset($_SESSION["NAME"])) {
    header("Location: mission_3-logout.php");
    exit;
}
?>

<html>
    <head>
        <title>���C��</title>
    </head>
    <body>
        <h1>���C�����</h1>
        <!-- ���[�U�[ID��HTML�^�O���܂܂�Ă��ǂ��悤�ɃG�X�P�[�v���� -->
        <p>�悤����<u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>����</p>  <!-- ���[�U�[����echo�ŕ\�� -->
        <ul>
            <li><a href="mission_3-logout.php">���O�A�E�g</a></li>
        </ul>
    </body>
</html>