<form method="post" action="mission_1-5.php">
<textarea name="contents" cols="50"></textarea>
<input type="submit" value="‘—M">
</form>

<?php
$contents = $_POST['contents'];
if ($contents) {
  $fp = fopen('kadai5.txt', 'w');
  fputs($fp, $contents);
  fclose($fp);
  print "‘‚«ž‚ÝŠ®—¹‚µ‚Ü‚µ‚½B";
}
?>

</body>
</html>