<html>
<head>
<title>�ȈՌf����2017</title>
</head>
<body>
�p�X���[�h����͂��Ă��������B
<form name="form" action="./mission_2-6.php" method="POST">
<input name="pass" type="text">
<input type="submit" value="���O�C��">
</form>
</body>
</html>

>
<?php
// �p�X���[�h��ݒ肷��B
$pass = 1234;
// form.html����̃p�X���[�h���󂯎��
$form_pass = $_REQUEST["pass"];
?>

<?php
// form.html����̒l��$form_pass�Ɠ��������]������
if($form_pass == $pass){

echo "���O�C������!!<br>",
"<a href=\"./mission_2-61.php\">WELCOME</a>";

}else{

echo "���O�C�����s<br>",
"<a href=\"./mission_2-6.php\">�߂�</a>";}
?>
</body>
</html>

