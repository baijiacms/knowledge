<?php include page('header');?>

<section class="content-header">
    <h1>分类管理</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <form role="form" name="item_form" id="item_form" method="post">
                    <input name="_method" type="hidden" value="DELETE">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="btn-group">
                                    <a href="<?php echo create_curl('web','admin','createcategory');?>" class="btn btn-default btn-sm" data-toggle="tooltip" title="添加分类"><i class="fa fa-plus"></i></a>
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-body  no-padding">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th></th>
                                    <th>名称</th>
                                    <th>操作</th>
                                </tr>
    <?php  if(is_array($category)) { foreach($category as $item) {  ?>
                                <tr>
                                    <td></td>
                                    <td><?php  echo $item['category_name'] ?></td>
                                    <td>
                                        <div class="btn-group-xs">
                                            <a class="btn btn-primary" href="<?php echo create_curl('web','admin','editcategory');?>&id=<?php echo $item['id']; ?>" data-toggle="tooltip" title="" data-original-title="编辑分类信息"><i class="fa fa-edit" aria-hidden="true"></i> 编辑</a>

                                            <a class="btn btn-danger" href="<?php echo create_curl('web','admin','deletecategory');?>&id=<?php echo $item['id']; ?>"" onclick="return confirm('确认删除此分类？');" data-toggle="tooltip" title="" data-original-title="删除分类信息"><i class="fa fa-edit" aria-hidden="true"></i> 删除</a>

                                        </div>
                                    </td>
                                </tr>
                               <?php } ?>
                    <?php } ?>

                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php  include page('footer');?>