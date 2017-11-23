<form method="post" action="mission_1-6.php">
<textarea name="contents" cols="50"></textarea>
<input type="submit" value="‘—M">
</form>

<?php
$contents = $_POST['contents'];
if ($contents) {
  $fp = fopen('kadai6.txt', 'a');
  fputs($fp, $contents);
  fclose($fp);
  print "‘‚«ž‚ÝŠ®—¹‚µ‚Ü‚µ‚½B";
}
?>

</body>
</html>