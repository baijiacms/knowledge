<?php
defined('SYSTEM_IN') or exit('Access Denied');
if(empty($_SESSION['user']))
{
	header("Location:".create_curl('mobile','users','login'));
exit;
}
$category = mysqld_selectall('select * from  ' . tablename('category') , array());
 
    if (checksubmit('submit')) {
	//$content=htmlspecialchars_decode($_GPC['content']);
    $content=$_POST['content'];
	$content=str_replace(ATTACHMENT_WEBROOT,'__RESOURCE__',$content);
		
	mysqld_insert('knowledge', array('id'=>uuid(),'is_private'=>intval($_GPC['is_private']),'knowledge_title'=>$_GPC['title'],'knowledge_content'=>$content,'category_name'=>$_GPC['category_name'],'readcount'=>0,'author'=>$_SESSION['user']['username'],'userid'=>$_SESSION['user']['id'],'createtime'=>time(),'updatetime'=>time()));
				message('知识点新建成功！',create_curl('mobile','knowledge','index'),'success');
					exit;
	    }
include_once page('knowledge_edit');