<?php
defined('SYSTEM_IN') or exit('Access Denied');

if(empty($_SESSION['user']))
{
	header("Location:".create_curl('mobile','users','login'));
exit;
}
if(empty($_SESSION['user']['is_admin'])) {
     message('不是管理员无权操作！',create_curl('mobile','knowledge','index'),'error');
 	}
			include_once page('index');