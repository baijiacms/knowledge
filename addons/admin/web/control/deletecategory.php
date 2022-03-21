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
    pdo_delete('category', array(
        'id' => $result['id']
    ));
	 



				message('分类删除成功！',create_curl('web','admin','indexcategory'),'success');
					exit;
