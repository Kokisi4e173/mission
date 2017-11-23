<?
// ログインセッション
session_cache_limiter("public");
session_start();
if(@$_SESSION["id"]!="loginid" and @$_SESSION["pw"]!="password"){
	header("HTTP/1.0 403 Forbidden");
	exit;
}

// 動画ファイルへのパス
$file = "{$_SERVER['DOCUMENT_ROOT']}/video/01.mp4";
$size = filesize($file);
$fp = fopen($file,"rb");

// コンテンツの識別子
$etag = md5($_SERVER["REQUEST_URI"]).$size;

// ブラウザがHTTP_RANGEを要求してきた場合
if(@$_SERVER["HTTP_RANGE"]){

	// 要求された開始位置と終了位置を取得
	list($start,$end) = sscanf($_SERVER["HTTP_RANGE"],"bytes=%d-%d");

	// 終了位置が指定されていない場合(適当に1000000bytesづつ出す)
	if(empty($end)) $end = $start + 1000000 - 1;

	// 終了位置がファイルサイズを超えた場合
	if($end>=($size-1)) $end = $size - 1;

	// 部分コンテンツであることを伝える
	header("HTTP/1.1 206 Partial Content");

	// コンテンツ範囲を伝える
	header("Content-Range: bytes {$start}-{$end}/{$size}");

	// 実際に送信するコンテンツ長: 終了位置 - 開始位置 + 1
	$size = $end - $start + 1;

	// ファイルポインタを開始位置まで移動
	fseek($fp,$start);

}

// HTTP_RANGE(部分リクエスト)に対応していることを伝える
header("Accept-Ranges: bytes");
header("Content-Type: video/mp4");
header("Content-Length: {$size}");
header("Etag: \"{$etag}\"");

// ファイルポインタの開始位置からコンテンツ長だけ出力
if($size) echo fread($fp,$size);

fclose($fp);

exit;
?>