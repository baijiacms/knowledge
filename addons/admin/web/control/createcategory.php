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
 if (checksubmit('submit')) {
 	$category = mysqld_select('select * from  ' . tablename('category')." where category_name= :category_name limit 1" , array(":category_name"=>$_GPC['category_name']));
 		if(!empty($category))
 		{
 			message('分类已存在！');
 			exit;
 		}
    		 mysqld_insert('category', array('id'=>uuid(),'category_name'=>$_GPC['category_name']));


				message('分类新建成功！',create_curl('web','admin','indexcategory'),'success');
					exit;
	    }
include_once page('category_create');