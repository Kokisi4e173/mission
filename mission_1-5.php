<form method="post" action="mission_1-5.php">
<textarea name="contents" cols="50"></textarea>
<input type="submit" value="送信">
</form>

<?php
$contents = $_POST['contents'];
if ($contents) {
  $fp = fopen('kadai5.txt', 'w');
  fputs($fp, $contents);
  fclose($fp);
  print "書き込み完了しました。";
}
?>

</body>
</html>