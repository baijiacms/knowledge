<?php include page('header');?>
<section class="content-header">
    <h1>版本信息</h1>
</section>
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">系统信息</h3>
            </div>
            <div class="box-body table-responsive">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <td>软件版本：2018.02.27.001</td>
                            </tr>
                            <tr>
                                <td>操作系统：<?php echo  php_uname();?></td>
                            </tr>

                            <tr>
                                <td>php版本：<?php echo  phpversion();?></td>
                            </tr>
                            <tr>
                                <td>服务器版本：<?php echo   $_SERVER['SERVER_SOFTWARE'];?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php  include page('footer');?>