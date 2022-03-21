<?php
defined('SYSTEM_IN') or exit('Access Denied');

    if (checksubmit('submit')) {
    	$verify=strtolower($_GP['captcha']);

			if(false&&$_SESSION["VerifyCode"]!=md5($verify))
			{
					message('验证码输入错误！','refresh','error');	
			}
 if(empty($_GP['password']))
    {
 	  message('请输入密码');	
			exit;

    }
				if(!empty($_GP['email'])&&!empty($_GP['password']))
			{
			$account = mysqld_select('SELECT * FROM '.table('user')." WHERE  email = :email and password=:password" , array(':email' => $_GP['email'],':password'=> md5($_GP['password'])));
			}
					if(!empty($account['id']))
			{
				unset($account['password']);
			
						$_SESSION['user']=$account;
					
								header("location:".create_curl("mobile","knowledge","index"));
								exit;
				
		}else
		{
			
					message('用户名密码错误！','refresh','error');	
			
			}
	    }
include_once page('user_login');