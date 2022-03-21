<?php
defined('SYSTEM_IN') or exit('Access Denied');
if(empty($_SESSION['user']))
{
	header("Location:".create_curl('mobile','users','login'));
exit;
}

$result = mysqld_select('select * from  ' . tablename('knowledge')." where id=:id" , array(':id' => $_GPC['id']));
 if(empty( $result))
	    {
	    	message('未找到知识');
	    }
	    
	    if($result['userid']!=$_SESSION['user']['id']&&empty($_SESSION['user']['is_admin']))
	    {
	        message('你不是这篇知识的作者，不能对它进行删除。');
	        exit;
	    }
	    
	    
    pdo_delete('knowledge', array(
        'id' => $result['id']
    ));
	 
	  message('删除成功',create_curl('mobile','knowledge','index'),'success');
	 
		