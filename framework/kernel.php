<?php
// +----------------------------------------------------------------------
// | 
// +----------------------------------------------------------------------
// | Copyright (c) 2018 All rights reserved.
// +----------------------------------------------------------------------
// | Author: 陈星宇 <QQ:258514030>
// +----------------------------------------------------------------------
ob_start();
header("Access-Control-Allow-Origin: *");//https://www.google.com,https://www.baidu.com
header("Access-Control-Allow-Credentials:true");
header("Access-Control-Allow-Headers: Content-Type,Access-Token");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Expose-Headers:*");
//header("Access-Control-Allow-Methods:*");
//header("Access-Control-Allow-Headers:*");//Origin, X-Requested-With, Content-Type, Accept
//header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');
//header("Access-Control-Expose-Headers:*");
define('WEB_ROOT', str_replace("\\",'/', dirname(dirname(__FILE__))));
if(is_file(WEB_ROOT.'/config/debug.php'))
{
	require WEB_ROOT.'/config/debug.php';
}
define('SAPP_NAME', 'baijiacms');
define('SAPP_VERSION', '5.0');
define('CORE_VERSION', 20180209);
header('Content-type: text/html; charset=UTF-8');
define('SYSTEM_WEBROOT', WEB_ROOT);
define('TIMESTAMP', time());
define('IN_IA', true);
define('SYSTEM_IN', true);
define('IA_ROOT', WEB_ROOT);
define('TEMPLATE_INCLUDEPATH', false);
date_default_timezone_set('PRC');
$document_root = substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'));
$document_root =str_replace("//","/",$document_root);
if(empty($document_root)||substr($document_root, -1)!='/')
{
		$document_root=$document_root. '/';
}
defined('DEVELOPMENT') or define('DEVELOPMENT',1);
define('WEBSITE_FOOTER', $document_root);	
define('SESSION_PREFIX', $_SERVER['HTTP_HOST']);	
define('WEB_WEBSITE', $_SERVER['HTTP_HOST']);	
define('WEBSITE_ROOT', 'http://'.$_SERVER['HTTP_HOST'].$document_root);
define('ATTACHMENT_WEBROOT', WEBSITE_ROOT.'attachment/');
define('ADDONS_ROOT', WEB_ROOT.'/addons/');
define('REGULAR_EMAIL', '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/i');
define('REGULAR_MOBILE', '/1\d{10}/');
define('REGULAR_USERNAME', '/^[\x{4e00}-\x{9fa5}a-z\d_\.]{3,15}$/iu');
define('MAGIC_QUOTES_GPC', (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) || @ini_get('magic_quotes_sybase'));
define('RESOURCE_COMMON', WEBSITE_ROOT."resource/common/");
define('RESOURCE_ROOT', WEBSITE_ROOT."resource/");
defined('SQL_DEBUG') or define('SQL_DEBUG', false);
define('WEB_SESSION_ACCOUNT', WEB_WEBSITE.'ADMIN_ACCOUNT');	

if(!session_id())
{
session_start();
header("Cache-control:private");
}
if(DEVELOPMENT) {
	ini_set('display_errors','1');
error_reporting(E_ALL ^ E_NOTICE);
	//error_reporting(E_ERROR  | E_PARSE);
} else {
	error_reporting(0);
}
ob_start();
if(MAGIC_QUOTES_GPC) {
	  function stripslashes_deep($value){ 
         $value=is_array($value)?array_map('stripslashes_deep',$value):stripslashes($value); 
         return $value; 
     } 
     $_POST=array_map('stripslashes_deep',$_POST); 
     $_GET=array_map('stripslashes_deep',$_GET); 
     $_COOKIE=array_map('stripslashes_deep',$_COOKIE); 
     $_REQUEST=array_map('stripslashes_deep',$_REQUEST); 
}
$_CMS=array();
$_CMS[WEB_SESSION_ACCOUNT]=$_SESSION[WEB_SESSION_ACCOUNT];
$_GPC =  array();
$_GPC = array_merge($_GET, $_POST, $_REQUEST);
function irequestsplite($var) {
	if (is_array($var)) {
		foreach ($var as $key => $value) {
			$var[htmlspecialchars($key)] = irequestsplite($value);
		}
	} else {
		$var = str_replace('&amp;', '&', htmlspecialchars($var, ENT_QUOTES));
	}
	return $var;
}

$_GPC = irequestsplite($_GPC);

include WEB_ROOT."/framework/engine/base/framework.php";
ob_end_flush();