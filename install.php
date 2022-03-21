<?php
$_REQUEST['act']='mobile_install_install';
require 'framework/kernel.php';
if(!file_exists(str_replace("\\",'/', dirname(__FILE__)).'/config/config.php'))
{

		header("location:".create_curl('mobile','install','install'));
		
}else
{
header("location:".create_curl('mobile','index','index'));

}
exit;