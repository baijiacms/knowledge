<?php include page('header','knowledge');?>
<div class="wrap">
    <div class="container">
        <div class="row">
            <!--左侧菜单-->

            <div id="main" class="settings col-md-10 form-horizontal">
                <h2 class="h3 post-title">修改密码</h2>
                <div class="row mt-30">
                    <div class="col-md-8">
                        <form name="baseForm" id="base_form" action="" method="POST">
                            <div class="form-group ">
                                <label for="old_password" class="required control-label col-sm-3">当前密码</label>
                                <div class="col-sm-9">
                                    <input name="old_password" id="old_password" type="password" maxlength="32" placeholder="当前密码" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="required control-label col-sm-3">新密码</label>
                                <div class="col-sm-9">
                                    <input name="password" id="password" type="password" maxlength="32" placeholder="新密码" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password_confirmation" class="required control-label col-sm-3">确认新密码</label>
                                <div class="col-sm-9">
                                    <input name="password_confirmation" id="password_confirmation" type="password" maxlength="32" placeholder="再次输入新密码" class="form-control" value="">
                                </div>
                            </div>
                            <?php if(false){?>
                            <div class="form-group ">
                                <label for="password_confirmation" class="required control-label col-sm-3">验证码</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="captcha" name="captcha" required="" placeholder="请输入下方的验证码">
                                    <div class="mt-10"><a href="javascript:void(0);" id="reloadCaptcha"><img src="<?php echo create_curl('mobile','users','verifycode');?>"></a></div>
                                </div>
                            </div>
                            <?php }?>

                            <div class="form-action row">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button class="btn btn-xl btn-primary" type="submit" name="submit" value="提交">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include page('footer','knowledge');?>