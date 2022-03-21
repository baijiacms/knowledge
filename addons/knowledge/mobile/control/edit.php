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
        exit;
    }
    
    if($result['userid']!=$_SESSION['user']['id']&&empty($_SESSION['user']['is_admin']))
    {
        message('你不是这篇知识的作者，不能对它进行修改。');
        exit;
    }

    if (checksubmit('submit')) {
	$content=$_POST['content'];
	$content=str_replace(ATTACHMENT_WEBROOT,'__RESOURCE__',$content);
	mysqld_update('knowledge', array('knowledge_title'=>$_GPC['title'],'is_private'=>intval($_GPC['is_private']),'knowledge_content'=>$content,'category_name'=>$_GPC['category_name'],'updatetime'=>time()), array('id' => $_GPC['id']));
					message('知识点修改成功！',create_curl('mobile','knowledge','index'),'succes');	
					exit;
	    }

	    
	    $category = mysqld_selectall('select * from  ' . tablename('category') , array());
	    
	    $result['knowledge_content']= preg_replace('/__RESOURCE__/',ATTACHMENT_WEBROOT, $result['knowledge_content']);
			include_once page('knowledge_edit');