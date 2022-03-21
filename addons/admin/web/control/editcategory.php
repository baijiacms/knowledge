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
$result = mysqld_select('select * from  ' . tablename('category')." where id=:id" , array(':id' => $_GPC['id']));
if(empty( $result))
	    {
	    	message('未找到分类');
	    }
     if (checksubmit('submit')) {
	mysqld_update('category', array('category_name'=>$_GPC['category_name']), array('id' => $result ['id']));
					message('分类修改成功！','refresh','succes');	
					exit;
	
	    }

include_once page('category_edit');