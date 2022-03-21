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
    <h1 class="h4 text-center text-muted login-title">用户登录</h1>
    <form role="form" name="loginForm" action=""  method="POST" >
      <div class="form-group ">
        <label class="required">邮箱&frasl;用户名</label>
        <input type="text" class="form-control" name="email" required placeholder="注册邮箱" value="">
      </div>

      <div class="form-group ">
        <label for="" class="required">密码</label>
        <input type="password" class="form-control" name="password" required placeholder="不少于 6 位">
      </div>
<?php if(false){?>
      <div class="form-group ">
        <label for="captcha" class="required">验证码</label>
        <input type="text" class="form-control" id="captcha" name="captcha" required="" placeholder="请输入下方的验证码">
        <div class="mt-10"><a href="javascript:void(0);" id="reloadCaptcha"><img src="<?php echo create_curl('mobile','users','verifycode');?>"></a></div>
      </div>
<?php }?>
      <div class="form-group clearfix">
      <!--  <div class="checkbox pull-left">
          <label><input name="remember" type="checkbox" value="1" checked> 记住登录状态</label>
        </div>-->
        <button type="submit" name='submit' value='登录' class="btn btn-primary pull-right pl20 pr20">登录</button>
      </div>
    </form>
  </div>

  <div class="text-center col-md-12 login-link">
    <a href="<?php echo create_curl('mobile','users','register');?>">注册新账号</a>
    |
    <a href="<?php echo create_curl('mobile','knowledge','index');?>">首页</a>
    |
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php  echo RESOURCE_ROOT;?>static/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php  echo RESOURCE_ROOT;?>static/css/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php  echo RESOURCE_ROOT;?>javascripts/global.js"></script>
</body>
</html>