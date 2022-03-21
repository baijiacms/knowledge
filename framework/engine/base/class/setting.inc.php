<?php
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Comments: mysql数据库操作
// +----------------------------------------------------------------------
// | Author: 百家cms <QQ:1987884799> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');
function globaPriveteSystemSetting()
{
	
		$config=array();
		$system_config_cache = mysqld_select('SELECT * FROM '.table('settings')." where `name`='system_config_cache'");
		if(empty($system_config_cache['value']))
		{
		$configdata = mysqld_selectall('SELECT * FROM '.table('settings'));
		foreach ($configdata as $item) {
			$config[$item['name']]=$item['value'];
		}
			if(!empty($system_config_cache['name']))
			{
				mysqld_update('settings', array('value'=>serialize($config)), array('name'=>'system_config_cache'));
			}else
			{
	      mysqld_insert('settings', array('name'=>'system_config_cache','value'=>serialize($config)));
	    }
			return $config;
		}else
		{
			return unserialize($system_config_cache['value']);
		}
}
function refreshSystemSetting($arrays)
{
		global $_CMS;
	if(is_array($arrays)) {
		   foreach ($arrays as $cid => $cate) {
		 
		   	$config_data = mysqld_selectcolumn('SELECT `name` FROM '.table('settings')." where `name`=:name",array(":name"=>$cid));
					if(empty($config_data))
					{
 					  mysqld_delete('settings', array('name'=>$cid));
          	$data=array('name'=>$cid,'value'=>$cate);
          	 mysqld_insert('settings', $data);
          }else
          {
 						 mysqld_update('settings', array('value'=>$cate), array('name'=>$cid));
          }
       }
 			 mysqld_update('settings', array('value'=>''), array('name'=>'system_config_cache'));
 			 $_CMS['system_globa_setting']=globaPriveteSystemSetting();
	}
}
function globalSystemSetting()
{
	global $_CMS;
	if(empty($_CMS['system_global_setting']))
	{
	$_CMS['system_global_setting']=globaPriveteSystemSetting();

	}
	return $_CMS['system_global_setting'];
}


