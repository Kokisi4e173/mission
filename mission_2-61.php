<form method="post action="mission_2-61.php">
<textarea name="contents"cols="40"rows="20"></texarea>
<input type="submit"value="���M">
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
    file_put_contents("kadai2-61.txt", "{�ԍ�}<>{���O}<>{�R�����g}<>{���e���ꂽ����}");
    fclose($fp);
    print"�������݊������܂���";
}
?>
