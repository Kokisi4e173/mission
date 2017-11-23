<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: mission_3-logout.php");
    exit;
}
?>

<html>
    <head>
        <title>メイン</title>
    </head>
    <body>
        <h1>メイン画面</h1>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
        <p>ようこそ<u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さん</p>  <!-- ユーザー名をechoで表示 -->
        <ul>
            <li><a href="mission_3-logout.php">ログアウト</a></li>
        </ul>
    </body>
</html>