<?php
session_start();

error_reporting(0);
function lib_replace_end_tag($str)  
{  
if (empty($str)) return false;  
$str = htmlspecialchars($str);  
$str = str_replace('/', "", $str);  
$str = str_replace('\\',"", $str);  
$str = str_replace('>', "", $str);  
$str = str_replace('<', "", $str);  
$str = str_replace('?', "", $str);
$str = str_replace('&', "", $str);
$str = str_replace('(', "", $str);
$str = str_replace(')', "", $str);
$str = str_replace('{', "", $str);
$str = str_replace('}', "", $str);
$str = str_replace('%', "", $str);
$str = str_replace('=', "", $str);
$str = str_replace(',', "", $str);
$str = str_replace(':', "", $str);
$str = str_replace(';', "", $str);
$str = str_replace('*', "", $str);
$str = str_replace('#', "", $str);
$str = str_replace('@', "", $str);
$str = str_replace('-', "", $str);
$str = str_replace('_', "", $str);
$str = str_replace('+', "", $str);
$str = str_replace('.', "", $str);
$str = str_ireplace('if', "", $str);
$str = str_ireplace('char', "", $str);
$str = str_ireplace('script', "", $str);
return $str;
} 
$_GET = stripslashes_array($_GET);  
$_POST = stripslashes_array($_POST);  
$_COOKIE = stripslashes_array($_COOKIE);  
$_REQUEST = stripslashes_array($_REQUEST); 
$GLOBALS = stripslashes_array($GLOBALS); 
$_SERVER = stripslashes_array($_SERVER); 
$_SESSION = stripslashes_array($_SESSION); 
$_FILES = stripslashes_array($_FILES); 
$_ENV = stripslashes_array($_ENV); 
$HTTP_RAW_POST_DATA = stripslashes_array($HTTP_RAW_POST_DATA); 
$http_response_header = stripslashes_array($http_response_header);  
  
function stripslashes_array(&$array) {  
while(list($key,$var) = each($array)) {  
    if ($key != 'argc' && $key != 'argv' && (strtoupper($key) != $key || ''.intval($key) == "$key")) {  
      if (is_string($var)) {  
         $array[$key] = lib_replace_end_tag($var);  
}  
if (is_array($var))  {  
     $array[$key] = stripslashes_array($var);  
}  
}  
}  
return $array;  
} 


require_once("include/common.php");
require_once(sea_INC."/main.class.php");


if($cfg_spoints==0){showmsg('未开启签到功能', 'member.php');exit;} 

$u=addslashes($_SESSION['sea_user_id']);
if(empty($u) OR !is_numeric($u)){showmsg('无法获取目标用户ID', 'member.php');exit;}

$row = $dsql->GetOne("Select stime from sea_member where id='$u'");


$nowtime=time();

$lasttime=$row['stime'];

if($nowtime-$lasttime > 86400 )
{
	$dsql->ExecuteNoneQuery("Update sea_member set stime = $nowtime  where id='$u'");
	$sql="Update sea_member set points = points+$cfg_spoints where id=$u";
	$dsql->ExecuteNoneQuery("$sql");
	showmsg('签到成功！', 'member.php');exit;
}
else
{
	showmsg('已经签到！', 'member.php');exit;
}
?>