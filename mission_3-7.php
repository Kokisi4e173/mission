<?
// ���O�C���Z�b�V����
session_cache_limiter("public");
session_start();
if(@$_SESSION["id"]!="loginid" and @$_SESSION["pw"]!="password"){
	header("HTTP/1.0 403 Forbidden");
	exit;
}

// ����t�@�C���ւ̃p�X
$file = "{$_SERVER['DOCUMENT_ROOT']}/video/01.mp4";
$size = filesize($file);
$fp = fopen($file,"rb");

// �R���e���c�̎��ʎq
$etag = md5($_SERVER["REQUEST_URI"]).$size;

// �u���E�U��HTTP_RANGE��v�����Ă����ꍇ
if(@$_SERVER["HTTP_RANGE"]){

	// �v�����ꂽ�J�n�ʒu�ƏI���ʒu���擾
	list($start,$end) = sscanf($_SERVER["HTTP_RANGE"],"bytes=%d-%d");

	// �I���ʒu���w�肳��Ă��Ȃ��ꍇ(�K����1000000bytes�Âo��)
	if(empty($end)) $end = $start + 1000000 - 1;

	// �I���ʒu���t�@�C���T�C�Y�𒴂����ꍇ
	if($end>=($size-1)) $end = $size - 1;

	// �����R���e���c�ł��邱�Ƃ�`����
	header("HTTP/1.1 206 Partial Content");

	// �R���e���c�͈͂�`����
	header("Content-Range: bytes {$start}-{$end}/{$size}");

	// ���ۂɑ��M����R���e���c��: �I���ʒu - �J�n�ʒu + 1
	$size = $end - $start + 1;

	// �t�@�C���|�C���^���J�n�ʒu�܂ňړ�
	fseek($fp,$start);

}

// HTTP_RANGE(�������N�G�X�g)�ɑΉ����Ă��邱�Ƃ�`����
header("Accept-Ranges: bytes");
header("Content-Type: video/mp4");
header("Content-Length: {$size}");
header("Etag: \"{$etag}\"");

// �t�@�C���|�C���^�̊J�n�ʒu����R���e���c�������o��
if($size) echo fread($fp,$size);

fclose($fp);

exit;
?>