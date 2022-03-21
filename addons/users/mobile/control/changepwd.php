<?php
defined('SYSTEM_IN') or exit('Access Denied');
if(empty($_SESSION['user']))
{
	header("Location:".create_curl('mobile','users','login'));
exit;
}
    if (checksubmit('submit')) {
   	$verify=strtolower($_GP['captcha']);

			if(false&&$_SESSION["VerifyCode"]!=md5($verify))
			{
					message('验证码输入错误！','refresh','error');	
			}
 if(empty($_GP['password']))
    {
 	  message('请输入新密码');	
			exit;

    }
if(empty($_GP['old_password']))
    {
 	  message('请输入密码');	
			exit;

    }
	$account = mysqld_select('SELECT * FROM '.table('user')." WHERE  id = :id" , array(':id' => $_SESSION["user"]['id']));
	
		if(empty($account['id']))
			{
				message('邮箱地址不存在！');	
								exit;
				
			}

if($account['password']!=md5($_GP['old_password']))
			{
				message('密码错误！');	
								exit;
				
			}
	mysqld_update('user', array('password'=>md5($_GP['password'])),array('id'=>$account['id']));
				message('密码修改成功！',create_curl('mobile','knowledge','index'),'success');
					exit;
	    }
include_once page('changepwd');