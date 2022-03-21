<?php
defined('SYSTEM_IN') or exit('Access Denied');
		$category = mysqld_selectall('select * from  ' . tablename('category') , array());

		$page = (empty($_GPC['page']) ? '' : $_GPC['page']);
		$pindex = max(1, intval($page));
		$psize = 20;
		
		$whereStr=' where 1=1';
		$where=array();
		$category_name='';
		if(!empty($_GPC['category_name']))
		{
			$category_name=base64_decode(urldecode($_GPC['category_name']));
			$qcid=$category_name;
		}
	if(!empty($_GPC['word']))
	{
		if(!empty($category_name))
		{

		$whereStr=$whereStr.' and ( `knowledge_content` LIKE :knowledge_title1 or `knowledge_title` LIKE :knowledge_title2) and `category_name`=:category_name';
		$where=array(':knowledge_title1' => '%'.$_GPC['word'].'%',':knowledge_title2' => '%'.$_GPC['word'].'%',':category_name' => $category_name);
		
		}else
		{
					$whereStr=$whereStr.' and  `knowledge_content` LIKE :knowledge_title1 or `knowledge_title` LIKE :knowledge_title2';
		$where=array(':knowledge_title1' => '%'.$_GPC['word'].'%',':knowledge_title2' => '%'.$_GPC['word'].'%');
		}
	}else
	{
		if(!empty($category_name))
		{
			$whereStr=$whereStr.' and ( `category_name`=:category_name)';
		$where=array(':category_name' =>$category_name);
		}
		
	}
			$result = mysqld_selectall('select `is_private`,`id`,`knowledge_title`,`category_name`,`readcount`,`author`,`createtime`,`updatetime` from   ' . tablename('knowledge') . $whereStr  . ' order by `updatetime` desc LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize, $where);

		$allcount = mysqld_selectcolumn('select COUNT(`id`) from   ' . tablename('knowledge') . $whereStr . ' order by `updatetime` desc  ' ,$where);
	$page_count = intval($allcount/$psize)+1;
			include_once page('knowledge');