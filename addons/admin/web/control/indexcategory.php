<?php
defined('SYSTEM_IN') or exit('Access Denied');
if(empty($_SESSION['user']))
{
	header("Location:".create_curl('mobile','users','login'));
exit;
}
$category = mysqld_selectall('select * from  ' . tablename('category') );

include_once page('category');