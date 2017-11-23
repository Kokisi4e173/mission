<?php
//var_dump($_POST);
//最初に変数を定義しておかないとエラーになる
$err_msg1 = "";
$err_msg2 = "";
$message ="";
$name = ( isset( $_POST["name"] ) === true ) ?$_POST["name"]: "";
$comment  = ( isset( $_POST["comment"] )  === true ) ?  trim($_POST["comment"])  : "";
 
//投稿がある場合のみ処理を行う
if (  isset($_POST["send"] ) ===  true ) {
    if ( $name   === "" ) $err_msg1 = "名前を入力してください"; 
 
    if ( $comment  === "" )  $err_msg2 = "コメントを入力してください";
 
    if( $err_msg1 === "" && $err_msg2 ==="" ){
        $fp = fopen( "kadai_2-3.txt" ,"a" );
        fwrite( $fp ,  $name."\t".$comment."\n");
        $message ="書き込みに成功しました。";
    }
 
}
 
$fp = fopen("kadai_2-3.txt","r");
 
$dataArr= array();
while( $res = fgets( $fp)){
    $tmp = explode("＼t",$res);
    $arr = array(
        "name"=>$tmp[0],
        "comment"=>$tmp[1]
    );
    $dataArr[]= $arr;
}
 
 
?>
<head>
<title>掲示板</title>
</head>
    <body>
        <?php echo $message; ?>
        <form method="post" action="">
        名前：<input type="text" name="name" value="<?php echo $name; ?>" >
            <?php echo $err_msg1; ?><br>
            コメント：<textarea  name="comment" rows="5" cols="60"><?php echo $comment; ?></textarea>
            <?php echo $err_msg2; ?><br>
<br>
          <input type="submit" name="send" value="書き込む" >
        </form>
        <dl>
         　　<?php foreach( $dataArr as $data ):?>
         　　　　<p><span><?php echo $data["name"]; ?></span>:<span><?php echo $data["comment"]; ?></span></p>
        　　 <?php endforeach;?>
　　　　　</dl>
    </body>