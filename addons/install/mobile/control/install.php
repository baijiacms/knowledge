<?php
defined('SYSTEM_IN') or exit('Access Denied');
		 $op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
		  if(is_file(WEB_ROOT.'/config/install.link'))
			 {
			 	
				header("location:".create_curl("mobile","knowledge","index"));
				exit;
		 }
		 if($op=='setp2')
		 {
		 		$checkfunction = array(
		array('method' => 'ini_get',			'name' => 'allow_url_fopen'), 
		array('method' => 'function_exists',	'name' => 'imagecreate'),
		array('method' => 'function_exists',	'name' => 'mysqli_connect'),
		array('method' => 'function_exists',	'name' => 'file_get_contents'),
		array('method' => 'function_exists',	'name' => 'xml_parser_create'),
		array('method' => 'extension_loaded',	'name' => 'pdo_mysql'),
		array('method' => 'function_exists',	'name' => 'curl_init')
	);
	
	 		$checkfolders = array(
		array('name' => 'config'), 
		array('name' => 'data'),
		array('name' => 'attachment')
	);
	$resultarray=array();
	$resultfolderarray=array();
	$allcheck=true;
		foreach ($checkfolders as $folder) {
			$checkfolder=$folder['name'];
				if(!is_dir(WEB_ROOT.'/'.$checkfolder)) {
						$allcheck=false;
						$resultfolderarray[$checkfolder]='<font color=red>不通过</font>';
				}else
				{
					if(!is_writable(WEB_ROOT.'/'.$checkfolder)) {
					$allcheck=false;
							$resultfolderarray[$checkfolder]='<font color=red>不通过</font>';
					}else
					{
						$resultfolderarray[$checkfolder]='<font color=green>检查通过</font>' ;
					}
				}
				
		}
		if(version_compare(PHP_VERSION,'5.3.0','ge'))
		{
		}else
		{
			$allcheck=false;	
		}
	
	
	foreach ($checkfunction as $function) {
			$checkresult=$function['method']($function['name']);
			if($checkresult)
			{
				$resultarray[$function['name']]='<font color=green>检查通过</font>' ;
				}else
			{
				$allcheck=false;
				$resultarray[$function['name']]='<font color=red>不通过</font>';
			}
		}
		 	}
		 if($op=='setp3')
		 {
			if ($_GPC['doact']=="install") {
					if(empty($_GPC['dbhost']))
					{
					message("请填写数据库地址！");	
					}
					
						if(empty($_GPC['dbport']))
					{
					message("请填写数据库端口！");	
					}
					if(empty($_GPC['dbuser']))
					{
					message("请填写数据库用户名！");	
					}
					
						if(empty($_GPC['dbname']))
					{
					message("请填写数据库名称！");	
					}
						if(empty($_GPC['adminname']))
					{
					message("请填写登录帐号！");	
					}
						if(empty($_GPC['adminpwd']))
					{
					message("请填写登录密码！");	
					}
				
			 $dataconfig=<<<EOF
<?php
defined('SYSTEM_IN') or exit('Access Denied');
\$BJCMS_CONFIG = array();
\$BJCMS_CONFIG['db']['host'] = '{dbhost}';
\$BJCMS_CONFIG['db']['username'] = '{dbuser}';
\$BJCMS_CONFIG['db']['password'] = '{dbpwd}';
\$BJCMS_CONFIG['db']['port'] = '{dbport}';
\$BJCMS_CONFIG['db']['database'] = '{dbname}';
EOF;

						$config = str_replace(array(
									'{dbhost}', '{dbuser}', '{dbpwd}', '{dbport}', '{dbname}','{version}'
								), array(
									$_GPC['dbhost'], $_GPC['dbuser'], $_GPC['dbpwd'], $_GPC['dbport'], $_GPC['dbname']
								), $dataconfig);
					 	error_reporting(1);

					 	$con = mysqli_connect($_GPC['dbhost'].":".$_GPC['dbport'],$_GPC['dbuser'],$_GPC['dbpwd']);
						if (!$con)
						  {
					 			echo("数据库连接失败");
						  }

						  if (!mysqli_query($con,"CREATE DATABASE IF NOT EXISTS `".$_GPC['dbname']."` DEFAULT CHARACTER SET utf8"))
						  {
										 	echo("数据库创建失败");
						  }
						 $query = mysqli_query($con,"SHOW DATABASES LIKE  '".$_GPC['dbname']."';");
						if (!mysqli_fetch_assoc($query)) {
								echo("数据库不存在且创建数据库失败");
						}
						mysqli_select_db($_GPC['dbname']);
							$query = mysqli_query("SHOW TABLES LIKE 'baijiacms%';");
					if (mysqli_fetch_assoc($query)) {
						echo('您的数据库不为空，请重新建立数据库或是清空该数据库！');
					}
					 	file_put_contents(WEB_ROOT.'/config/config.php',$config); 
								
					header("Location:". 	create_curl("mobile","install","install",array("op"=>"setp3","doact"=>"installsql", "adminname"=>urlencode(base64_encode($_GPC['adminname'])), "adminpwd"=>urlencode(base64_encode(md5($_GPC['adminpwd']))))));
	
			}
				if ($_GPC['doact']=="installsql") {
					define('SYSTEM_INSTALL_IN',true);
			
					require "installsql.php";
						
					$data= array('is_admin'=>1,'email'=> base64_decode(urldecode($_GPC['adminname'])),'username'=> base64_decode(urldecode($_GPC['adminname'])),'password'=> base64_decode(urldecode($_GPC['adminpwd'])),'createtime'=>time(),'id'=>uuid());
					mysqld_insert('user', $data);
	
					
					    $cfg = array(
				   		     'system_website' => WEB_WEBSITE,
				   		       'system_version' => CORE_VERSION
            );
						refreshSystemSetting($cfg);
			 		
			 		file_put_contents(WEB_ROOT.'/config/install.link', WEBSITE_ROOT); 
			 				
      
			 		message("安装成功",create_curl("mobile","knowledge","index"),"success");
				}
		}
			include_once page('install');