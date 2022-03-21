<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <title> 管理后台</title>
  <!-- Bootstrap 3.3.2 -->
  <link href="<?php  echo RESOURCE_ROOT;?>static/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php  echo RESOURCE_ROOT;?>static/css/icheck/all.css" rel="stylesheet" type="text/css" />
  <link href="<?php  echo RESOURCE_ROOT;?>static/js/scojs/sco.message.css" rel="stylesheet" type="text/css" />
  <link href="<?php  echo RESOURCE_ROOT;?>static/js/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="<?php  echo RESOURCE_ROOT;?>static/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

  <!-- Theme style -->
  <link href="<?php  echo RESOURCE_ROOT;?>stylesheets/admin/admin.css" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link href="<?php  echo RESOURCE_ROOT;?>stylesheets/admin/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="skin-blue sidebar-mini ">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->

    <div class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg text-center">
              知识库管理
            </span>

    </div>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" id="sliderbar_control"  data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <span class="hidden-xs"><?php  echo $_SESSION['user']['username'] ?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <!--   <li class="user-header">
                 <img src="g" class="img-circle" alt="User Image" />
                 <p>
                   admin
                   <small></small>
                 </p>
               </li> -->
               <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo create_curl('mobile','users','logout');?>" class="btn btn-default btn-flat">退出登录</a>
                </div>
              </li> 
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu" id="root_menu">

        <li class="header">常用菜单</li>
        <li <?php if($_GET['act']=='web_admin_category'){ ?>class="active"<?php } ?>><a href="<?php echo create_curl('web','admin','indexcategory');?>" ><i class="fa fa-circle-o text-success"></i> <span>分类管理</span></a></li>
           <li <?php if($_GET['act']=='web_admin_mailconfig'){ ?>class="active"<?php } ?>><a href="<?php echo create_curl('web','admin','mailconfig');?>" ><i class="fa fa-circle-o text-success"></i> <span>系统配置</span></a></li>
        <li><a href="<?php echo create_curl('web','admin','index');?>"><i class="fa fa-circle-o text-info"></i> <span>后台首页</span></a></li>
        <li><a href="<?php echo create_curl('mobile','knowledge','index');?>"><i class="fa fa-circle-o text-yellow"></i> <span>前台首页</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->

  </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

