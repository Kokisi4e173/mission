<?php
//var_dump($_POST);
//�ŏ��ɕϐ����`���Ă����Ȃ��ƃG���[�ɂȂ�
$err_msg1 = "";
$err_msg2 = "";
$message ="";
$name = ( isset( $_POST["name"] ) === true ) ?$_POST["name"]: "";
$comment  = ( isset( $_POST["comment"] )  === true ) ?  trim($_POST["comment"])  : "";
 
//���e������ꍇ�̂ݏ������s��
if (  isset($_POST["send"] ) ===  true ) {
    if ( $name   === "" ) $err_msg1 = "���O����͂��Ă�������"; 
 
    if ( $comment  === "" )  $err_msg2 = "�R�����g����͂��Ă�������";
 
    if( $err_msg1 === "" && $err_msg2 ==="" ){
        $fp = fopen( "kadai_2-3.txt" ,"a" );
        fwrite( $fp ,  $name."\t".$comment."\n");
        $message ="�������݂ɐ������܂����B";
    }
 
}
 
$fp = fopen("kadai_2-3.txt","r");
 
$dataArr= array();
while( $res = fgets( $fp)){
    $tmp = explode("�_t",$res);
    $arr = array(
        "name"=>$tmp[0],
        "comment"=>$tmp[1]
    );
    $dataArr[]= $arr;
}
 
 
?>
<head>
<title>�f����</title>
</head>
    <body>
        <?php echo $message; ?>
        <form method="post" action="">
        ���O�F<input type="text" name="name" value="<?php echo $name; ?>" >
            <?php echo $err_msg1; ?><br>
            �R�����g�F<textarea  name="comment" rows="5" cols="60"><?php echo $comment; ?></textarea>
            <?php echo $err_msg2; ?><br>
<br>
          <input type="submit" name="send" value="��������" >
        </form>
        <dl>
         �@�@<?php foreach( $dataArr as $data ):?>
         �@�@�@�@<p><span><?php echo $data["name"]; ?></span>:<span><?php echo $data["comment"]; ?></span></p>
        �@�@ <?php endforeach;?>
�@�@�@�@�@</dl>
    </body>