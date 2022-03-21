<?php
defined('SYSTEM_IN') or exit('Access Denied');
$t_setting=globaPriveteSystemSetting();
if(empty($t_setting)||$t_setting['is_register']!=1)
{
 message('系统关闭了注册，请联系管理员在后台开启！');	
			exit;
}
    if (checksubmit('submit')) {
    if($_GP['password']!=$_GP['password_confirmation'])
    {
 	  message('两次密码不相同！');	
			exit;

    }
	 if(empty($_GP['password']))
    {
 	  message('请输入密码');	
			exit;

    }
	$account = mysqld_select('SELECT * FROM '.table('user')." WHERE  email = :email" , array(':email' => $_GP['email']));
	
		if(!empty($account['id']))
			{
				message('邮箱地址已存在！');	
								exit;
				
			}


	mysqld_insert('user', array('id'=>uuid(),'username'=>$_GPC['name'],'email'=>$_GPC['email'],'is_admin'=>0,'password'=>md5($_GP['password']),'createtime'=>time()));
				message('用户创建成功！',create_curl('mobile','knowledge','index'),'success');
					exit;
	    }
include_once page('user_register');