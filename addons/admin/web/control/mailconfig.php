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
$result=globalSystemSetting();
 if (checksubmit('submit')) {
 	refreshSystemSetting(array('is_register'=>intval($_GPC['is_register'])));
 		message('配置修改成功！','refresh','success');
					exit;
	    }
include_once page('mailconfig');