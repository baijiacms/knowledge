<?php
defined('SYSTEM_IN') or exit('Access Denied');

    unset($_SESSION["VerifyCode"]);
		    unset($_SESSION["user"]);
		     unset($_SESSION);	
		     session_destroy(); 
					message('退出成功！',create_curl("mobile","knowledge","index"),'success');	
			
		