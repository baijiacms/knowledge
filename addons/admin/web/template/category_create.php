<?php include page('header');?>

<section class="content-header">
    <h1>分类编辑</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <form role="form" name="editForm" method="POST" action="">

                    <div class="box-body">
                        <div class="form-group ">
                            <label>分类名称</label>
                            <input type="text" name="category_name" class="form-control " placeholder="分类名称" value="">
                        </div>


                    </div>
                    <div class="box-footer">
                        <button type="submit" name="submit" value="保存" class="btn btn-primary">保存</button>
                        <button type="reset" class="btn btn-success">重置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php  include page('footer');?>