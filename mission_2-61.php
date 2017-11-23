<form method="post action="mission_2-61.php">
<textarea name="contents"cols="40"rows="20"></texarea>
<input type="submit"value="送信">
</form>
<a href="kadai2_61.txt">kadai2_61.txt</a><br>
<?php
session_start();

if(!isset($_SESSION["visited"])){
$_SESSION["visited"]=1;
}else{
$_SESSION["visited"]++;
}


$contents=$_POST['cotents'];
if ($contents){
    $fp=fopen('kadai2_61.txt','a+');
    file_put_contents("kadai2-61.txt", "{番号}<>{名前}<>{コメント}<>{投稿された時間}");
    fclose($fp);
    print"書き込み完了しました";
}
?>
