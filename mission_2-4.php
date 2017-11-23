<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Tokyo');

$err_msg1 = "";
$err_msg2 = "";
$message  = "";
$name     = (isset($_POST["name"]) === true) ? $_POST["name"] : "";
$comment  = (isset($_POST["comment"]) === true) ? trim($_POST["comment"]) : "";

if (isset($_POST["toukou"]) === true) {
    if ($name === "")
        $err_msg1 = "���O����͂��Ă�������";

    if ($comment === "")
        $err_msg2 = "�R�����g����͂��Ă�������";

    if ($err_msg1 === "" && $err_msg2 === "") {
        $message = "�������݂ɐ������܂����B";
    }

}



if (null != filter_input_array(INPUT_POST)) {
    $name    = filter_input(INPUT_POST, 'name');
    $comment = filter_input(INPUT_POST, 'comment');

    if (!empty($name) && !empty($comment)) {
        $number  = (int)file_get_contents("counter.txt");
        $name    = $_POST["name"];
        $comment = $_POST["comment"];
        $date    = date('Y-m-d-G-i');
        $number++;
        $fp = fopen("kadai_2-3.txt", "a");
        fwrite($fp, "$number'<>'$name'<>'$comment'<>'$date\n");
        fclose($fp);
        file_put_contents("counter.txt", $number);
    }


}
if (isset($_POST["delete"])) {

    $delete = $_POST["delete"];
    $delCon = file("kadai_2-3.txt");
    $a      = fopen("kadai_2-3.txt", "w");
    @fwrite($a, "");
    fclose($a);
    for ($j = 0; $j < count($delCon); $j++) {
        $delDate = explode("'<>'", $delCon[$j]);
        array_splice($delDate,1);
        if ($delDate[0] != $delete) {
            $b = fopen("kadai_2-3.txt", "a");
            @fwrite($b, $delCon[$j]);
            fclose($b);
        } elseif ($delDate[0] == $delete) {
            $c = fopen("kadai_2-3.txt", "a");
            @fwrite($c, "�������܂����B\n");
            fclose($c);
        }
    }
}
?>



<?php
echo $message;
?>
<form action="kadai_2-4.php" method="post" >
���O����͂��Ă��������B<br/>
<input type="text" name="name" value="<?php
echo $name;
echo $err_msg1;
?>" /><br/>
�R�����g<br/>
<textarea name ="comment"cols="50" rows="5"><?php
echo $comment;
echo $err_msg2;
?></textarea>
<br>
<input type="submit" name="toukou" value="���e" />

</form>

<form action="" method="POST">
�폜�Ώ۔ԍ�<input type="text" name="delete">
<input type="submit" name="deleteNo" value="�폜">
</form>
<h2>���e�ꗗ</h2>


<?php

$file_name = "kadai_2-3.txt";

$ret_array = file($file_name);


for ($i = 0; $i < count($ret_array); ++$i) {
    $line = explode('<>', $ret_array[$i]);
    echo ($ret_array[$i] . "<br />\n");
}


?>