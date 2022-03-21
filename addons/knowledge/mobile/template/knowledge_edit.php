<?php include page('header');?>

<link href="<?php  echo RESOURCE_ROOT;?>static/js/summernote/summernote.css" rel="stylesheet">
<link href="<?php  echo RESOURCE_ROOT;?>static/js/select2/css/select2.min.css" rel="stylesheet">
<link href="<?php  echo RESOURCE_ROOT;?>static/js/select2/css/select2-bootstrap.min.css" rel="stylesheet">
<div class="wrap">
    <div class="container">

        <div class="row mt-10">
            <ol class="breadcrumb">
                <li><a href="<?php echo create_curl('mobile','knowledge','index');?>">知识点</a></li>
                <li class="active">撰写知识点</li>
            </ol>
            <form id="article_form" method="POST" role="form" enctype="multipart/form-data" action="">
                  <input type="hidden" id="tags" name="tags" value="" />

                <div class="form-group  ">
                    <label for="title">文章标题:</label>
                    <input id="title" type="text" name="title"  class="form-control input-lg" placeholder="水若长流能成河,山以积石方为高" value="<?php echo $result['knowledge_title'];?>" />
                </div>
                <div class="form-group  ">
                   <select name="is_private" id="is_private" class="form-control">
                            <option value="0" <?php  if(empty($result['is_private'])){?>selected<?php } ?>> 公共</option>
                            <option value="1" <?php  if(!empty($result['is_private'])){?>selected<?php } ?>> 私有</option>
                        </select>
                </div>
                <div class="form-group  ">
                    <label for="article_editor">文章正文：</label>
				<div id="article_editor"><?php echo $result['knowledge_content'];?></div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <select name="category_name" id="category_id" class="form-control">
                            <option value="">请选择分类</option>
                            <?php  if(is_array($category)) { foreach($category as $item) {  ?>
                            <option value="<?php echo $item['category_name'] ?>" <?php  if($result['category_name']==$item['category_name']){?>selected<?php } ?>>   <?php echo $item['category_name'] ?></option>
                            <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                     <div class="col-md-8">
                     
                    </div>
                </div>

                <div class="row mt-20">
                    <div class="col-xs-12 col-md-11">
                        <ul class="list-inline">
                        </ul>
                    </div>

                    <div class="col-xs-12 col-md-1">
                        <input type="hidden" id="article_editor_content"  name="content" value=""  />
                        <button type="submit" name="submit" value='发布文章' class="btn btn-primary center-block editor-submit">发布文章</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
<div id="tempdiv" style="display:none"></div>

<?php  include page('footer');?>
<script src="<?php  echo RESOURCE_ROOT;?>static/js/summernote/summernote.min.js"></script>
<script src="<?php  echo RESOURCE_ROOT;?>static/js/summernote/lang/summernote-zh-CN.min.js"></script>
<script src="<?php  echo RESOURCE_ROOT;?>static/js/summernote/summernote-ext-attach.js?v=20170417"></script>
<script src="<?php  echo RESOURCE_ROOT;?>static/js/select2/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#article_editor').summernote({
            lang: 'zh-CN',
            height: 350,
            placeholder:'撰写文章',
            toolbar: [ ['common', ['style','bold','ol','link','picture','attachment','clear','codeview','fullscreen']] ],
            callbacks: {
                onChange:function (contents, $editable) {
                    var code = $(this).summernote("code");
                    $("#article_editor_content").val(code);
                },  onInit: function() {
                	 var code = $(this).summernote("code");
                     $("#article_editor_content").val(code);
                },
                onImageUpload: function(files) {
                    upload_editor_image(files[0],'article_editor');
                }
            }
        });

    });
</script>
