<?php include page('header');?>
<section class="content-header">
    <h1>注册配置</h1>
</section>
                <form role="form" name="settingForm" method="POST" action="">

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                    <div class="box-body">


                        <div class="form-group">
                            <label for="website_url">开启注册功能</label>
                            <span class="text-muted">注册功能</span>
                            <div class="radio">
                                <label><input type="radio" name="is_register" value="1" <?php if($result['is_register']==1){ ?>checked=""<?php } ?>> 开启 </label>
                                <label class="ml-20"><input type="radio" name="is_register" value="0" <?php if(empty($result['is_register'])||$result['is_register']==0){ ?>checked=""<?php } ?>> 关闭 </label>
                            </div>
                        </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="submit" value="保存">保存</button>
                        
                    </div>
        

            </div>
        </div>
    </div>
</section>        </form>
<?php  include page('footer');?>