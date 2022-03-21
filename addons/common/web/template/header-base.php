<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>百家CMS微商城V5</title>
	<link href="<?php  echo RESOURCE_COMMON;?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php  echo RESOURCE_COMMON;?>css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php  echo RESOURCE_COMMON;?>css/plus.css?x=<?php  echo time()?>" rel="stylesheet">
			<link href="<?php  echo RESOURCE_COMMON;?>css/main/main.css?x=<?php  echo time()?>" rel="stylesheet">
	<script src="<?php  echo RESOURCE_COMMON;?>js/lib/jquery-1.11.1.min.js"></script>

</head>
<body>
	
<div class="main_header">
	<div class="main_logo">
		<a href=""><img src="<?php  echo RESOURCE_COMMON;?>css/main/logow.png"></a>
	</div>
	<div class="main_nav_cont">

		<ul  class="main_nav">
				<?php $menuindex='sysset';?>
            	 	   
            	<li <?php  if($_CMS['module']== 'ewei_shop'&$_CMS['operation']== 'shop' ) { $menuindex='shop';  echo 'class="active"';  } ?> >
            		<a href="<?php  echo create_wurl('shop','goods')?>">商城管理</a></li>
            	<li <?php  if($_CMS['module']== 'ewei_shop'&$_CMS['operation']== 'member' ) { $menuindex='member';  echo 'class="active"';  } ?> >
            		<a href="<?php  echo create_wurl('member','list')?>">会员管理</a></li>
            <li <?php  if($_CMS['module']== 'ewei_shop'&$_CMS['operation']== 'order' ) { $menuindex='order';  echo 'class="active"';  } ?> >
            		<a href="<?php  echo create_wurl('order','display')?>">订单管理</a></li>   
<li <?php  if($_CMS['module']== 'ewei_shop'&$_CMS['operation']== 'finance' ) { $menuindex='finance';  echo 'class="active"';  } ?> >
            		<a href="<?php  echo create_wurl('finance','log')?>">财务管理 </a></li> 
<li <?php  if($_CMS['module']== 'ewei_shop'&$_CMS['operation']== 'statistics' ) { $menuindex='statistics';  echo 'class="active"';  } ?> >
            		<a href="<?php  echo create_wurl('statistics','sale')?>">数据统计 </a></li>   
            		 <li <?php  if($_CMS['module']== 'ewei_shop'&$_CMS['operation']== 'plugin' ) { $menuindex='plugin';  echo 'class="active"';  } ?> >
            		<a href="<?php  echo create_wurl('plugin','commission')?>">分销管理 </a></li>   
 <li <?php  if($_CMS['module']== 'ewei_shop'&$_CMS['operation']== 'sysset' ) { $menuindex='sysset';  echo 'class="active"';  } ?> >
            		<a href="<?php  echo create_wurl('sysset','shop')?>">商城设置 </a></li>   

            			<li <?php  if($_CMS['module']== 'admin' ) { $menuindex='admin';  echo 'class="active"';  } ?>>
            		<a href="<?php  echo create_curl('web','admin','index')?>">系统设置</a></li>    
            			 
			
			
		</ul>

		<div class="main_login">
			<span  class="main_change_link" style="color: #FFF">您好，<?php echo $GLOBALS['_CMS'][WEB_SESSION_ACCOUNT]['username'];?></span>
		
<ul  class="main_nav_right">
		<li><i class="nav-first-i"></i> <a href="http://www.baijiacms.com/" target="_blank">官方首页</a> <i></i>
			</li>	<li><i class="nav-first-i"></i> <a href="<?php  echo create_curl('web','admin','changepwd')?>">修改密码</a> <i></i>
			</li>
		<li><i class="nav-first-i"></i> <a href="<?php  echo create_curl('mobile','admin','logout')?>">退出系统</a> <i></i>
			</li>
		</ul>
	<span  class="main_change_link" >&nbsp;</span>
             
		</div>

	</div>

</div>

<!--[if lte IE 7]><div class="ietip ietipbg"></div><div  class="ietip ietiptext">您的浏览器太旧了，为了获得更好的体验，请升级您的浏览器！</div><![endif]-->
<div class="main_wrap" >
		<div class="main_wrap-bg">

			<div class="main_sidebar">
				<div class="main_subnav" >
					
					<?php include page('menu/'.$menuindex,'common');?> 
					



				</div>
			</div>
			<div id="main_tgy" class="main_tgy" >
	<a  id="main_celan" class="main_celan" title="关闭侧栏"></a>
	
	

<script>
	$("#main_celan").click(function(){
if($(this).hasClass("main_celan main_celanon")){
$('.main_sidebar').animate({marginLeft:"0px"});
$('#main_tgy').animate({marginLeft:"200px"});
$('#main_celan').removeClass('main_celanon');
$.cookie("celan",null)}else{$('.main_sidebar').animate({marginLeft:"-210px"});
$('#main_tgy').animate({marginLeft:"0px"});
$('#main_celan').addClass('main_celanon');
$.cookie("celan","1",{expires:7})}
});
	</script>