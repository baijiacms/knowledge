<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>知识库</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />

  <!-- Bootstrap -->
  <link href="<?php  echo RESOURCE_ROOT;?>static/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php  echo RESOURCE_ROOT;?>static/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="<?php  echo RESOURCE_ROOT;?>stylesheets/global.css?v=20170412" rel="stylesheet" />
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

<div class="top-common-nav  mb-50">
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#global-navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="logo"></div>
      </div>

      <div class="collapse navbar-collapse" id="global-navbar">
        <form class="navbar-form navbar-left" role="search" id="top-search-form" action="" method="GET">
          <div class="input-group">
            <input type="hidden" name="category_name"  value="<?php echo $_GPC['category_name'] ?>" />
            <input type="hidden" name="act"  value="mobile_knowledge_index" />
            <input type="text" name="word" id="searchBox" class="form-control" placeholder="" value="<?php echo $_GPC['word'] ?>" />
            <span class="input-group-addon btn" ><span id="search-button" class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
          </div>
        </form>
        <ul class="nav navbar-nav">
          <li <?php if($_GET['act']=='mobile_knowledge_index'){ ?>class="active"<?php } ?>><a href="<?php echo create_curl('mobile','knowledge','index');?>" >知识库</a></li>
            <?php if($_SESSION['user']!=null) { ?>     <li <?php if($_GET['act']==='mobile_knowledge_create'){?>class="active"<?php } ?>><a href="<?php echo create_curl('mobile','knowledge','create');?>" >创建知识</a></li><?php }?>
        </ul>
          <?php if($_SESSION['user']!=null) { ?> 
        <ul class="nav navbar-nav user-menu navbar-right">
          <li class="dropdown user-avatar">
            <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              <img class="avatar-32 mr-5" alt="admin" src="<?php  echo RESOURCE_ROOT;?>stylesheets/admin/img/avatar.png" >
              <span>  <?php echo $_SESSION['user']['username']; ?> </span>
            </a> 
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo create_curl('mobile','users','changepwd');?>">修改密码</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo create_curl('web','admin','index');?>">系统设置</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo create_curl('mobile','users','logout');?>">退出</a></li>
            </ul>
          </li>
        </ul>  <?php } else {  ?>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo create_curl('mobile','users','login');?>">登录</a></li>
          <li><a href="<?php echo create_curl('mobile','users','register');?>">注册</a></li>
        </ul>
          <?php }  ?>
      </div>
    </div>
  </nav>
</div>
<div class="top-alert mt-60 clearfix text-center">
  <!--[if lt IE 9]>
  <div class="alert alert-danger topframe" role="alert">你的浏览器实在<strong>太太太太太太旧了</strong>，放学别走，升级完浏览器再说
    <a target="_blank" class="alert-link" href="http://browsehappy.com">立即升级</a>
  </div>
  <![endif]-->



</div>
