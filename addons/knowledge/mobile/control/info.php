<?php
defined('SYSTEM_IN') or exit('Access Denied');

$category = mysqld_selectall('select * from  ' . tablename('category') , array());

		
	    $result = pdo_fetch("select * from " . tablename('knowledge') . " where id=:id", array(
        ":id" =>$_GPC['id']
    ));
	    if(empty( $result))
	    {
	    	message('未找到知识');
	    }
	    if(!empty( $result['is_private']))
	    {
	        if($result['userid']!=$_SESSION['user']['id']&&empty($_SESSION['user']['is_admin']))
    	    {
    	        message('这篇知识是作者私有的，你无法阅读。');
    	        exit;
    	    }
	    }
	    $result['knowledge_content']= preg_replace('/__RESOURCE__/',ATTACHMENT_WEBROOT, $result['knowledge_content']);
		    pdo_update('knowledge', array(
                'readcount' => $result['readcount']+1
            ), array(
                'id' => $_GPC['id']
            ));
			include_once page('knowledge_detail');