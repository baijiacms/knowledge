<?php include page('header');?>
<link href="<?php  echo RESOURCE_ROOT;?>static/js/summernote/summernote.css" rel="stylesheet">
<link href="<?php  echo RESOURCE_ROOT;?>static/js/select2/css/select2.min.css" rel="stylesheet">
<link href="<?php  echo RESOURCE_ROOT;?>static/js/select2/css/select2-bootstrap.min.css" rel="stylesheet">
<div class="wrap">
    <div class="container">

        <div class="row mt-10">
            <ol class="breadcrumb">
                <li><a href="/knowledge">知识点</a></li>
                <li class="active">撰写知识点</li>
            </ol>
            <form id="article_form" method="POST" role="form" enctype="multipart/form-data" action="">
                  <input type="hidden" id="tags" name="tags" value="" />

                <div class="form-group  ">
                    <label for="title">文章标题:</label>
                    <input id="title" type="text" name="title"  class="form-control input-lg" placeholder="我想起那天下午在夕阳下的奔跑,那是我逝去的青春" value="" />
                </div>
                <div class="form-group  ">
                    <label for="title">作者:</label>
                    <input id="title" type="text" name="author"  class="form-control" placeholder="作者" value="<% if(session.user!=null) { %><%= session.user.username %><% } %>" />
                </div>
                <div class="form-group  ">
                    <label for="article_editor">文章正文：</label>
                    <div id="article_editor"></div>
                </div>


                <div class="row">
                    <div class="col-xs-4">
                        <select name="category_name" id="category_id" class="form-control">
                            <option value="">请选择分类</option>
                                 <?php  if(is_array($category)) { foreach($category as $item) {  ?>
                            <option value="<?php echo $item['category_name'] ?>" <?php  if($result['category_name']==$item['category_name']){?>selected<?php } ?>>   <?php echo $item['category_name'] ?></option>
                            <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-xs-8">

                    </div>
                </div>

                <div class="row mt-20">
                    <div class="col-xs-12 col-md-11">
                        <ul class="list-inline">
                        </ul>
                    </div>

                    <div class="col-xs-12 col-md-1">
                        <input type="hidden" id="article_editor_content"  name="content" value=""  />
                        <button type="submit" name="submit" value='发布文章'  class="btn btn-primary pull-right editor-submit">发布文章</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>

<?php  include page('footer');?>
<script src="<?php  echo RESOURCE_ROOT;?>static/js/summernote/summernote.min.js"></script>
<script src="<?php  echo RESOURCE_ROOT;?>static/js/summernote/lang/summernote-zh-CN.min.js"></script>
<script src="<?php  echo RESOURCE_ROOT;?>static/js/select2/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#article_editor').summernote({
            lang: 'zh-CN',
            height: 350,
            placeholder:'撰写文章',
            toolbar: [ ['common', ['style','bold','color','ol', 'paragraph','table','link','picture','clear','fullscreen']] ],
            callbacks: {
                onChange:function (contents, $editable) {
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