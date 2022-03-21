
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>知识库</title>
  <!-- Bootstrap -->
  <link href="<?php  echo RESOURCE_ROOT;?>static/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php  echo RESOURCE_ROOT;?>stylesheets/account.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<div class="container">
  <div class="header text-center">

    <p class="description text-muted">欢迎加入知识库</p>
  </div>
  <div class="col-md-6 col-md-offset-3 bg-white login-wrap">
    <h1 class="h4 text-center text-muted login-title">创建新账号</h1>
    <form role="form" id="registerForm" action="" method="post">
      <div class="form-group ">
        <label class="required">姓名</label>
        <input type="text" class="form-control" name="name" value="" required  placeholder="昵称">
      </div>
      <div class="form-group ">
        <label class="required">Email</label>
        <input type="email" class="form-control" name="email" value="" required placeholder="hello@baijiacms.com">
      </div>
      <div class="form-group">
        <label for="" class="required">密码</label>
        <input type="password" class="form-control" name="password" required placeholder="不少于 6 位">
      </div>
      <div class="form-group ">
        <label for="" class="required">确认密码</label>
        <input type="password" class="form-control" name="password_confirmation" required placeholder="不少于 6 位">
      </div>
      <div class="form-group">
        同意并接受 <a href="#" target="_blank" data-toggle="modal" data-target="#register_license_modal">《服务条款》</a>
      </div>
      <div class="form-group">
        <button type="submit" name="submit" value="注册" class="btn btn-primary btn-block btn-lg">注册</button>
      </div>
    </form>
  </div>


  <div class="text-center col-md-12 login-link">
    <a href="<?php echo create_curl('mobile','users','register');?>">用户登录</a>
    |
    <a href="<?php echo create_curl('mobile','knowledge','index');?>">首页</a>
    |
  </div>
  <div class="modal fade " id="register_license_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title text-center">网服务条款</h4>
        </div>
        <div class="modal-body">
          <div style="height: 450px;overflow:scroll;">
陈星宇专用
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php  echo RESOURCE_ROOT;?>static/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php  echo RESOURCE_ROOT;?>static/css/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php  echo RESOURCE_ROOT;?>javascripts/global.js"></script>
</body>
</html>