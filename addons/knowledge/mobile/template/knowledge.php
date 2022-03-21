<?php include page('header');?>

<div class="wrap">
    <div class="container">
        <div class="row mt-12">
            <div class="col-xs-12 col-md-12 main">
                <div class="widget-category clearfix">
                    <div class="col-sm-12">   <ul class="list">
                    	   <li >  <a href="<?php echo create_curl('mobile','knowledge','index');?>">所有知识</a></li>
                            <?php if(is_array($category)) { foreach($category as $item) {  ?>
                            <li  <?php if(!empty($qcid)){ ?><?php if($item['category_name']==$qcid){ ?> class="active"  <?php } ?><?php } ?> >  <a href="<?php echo create_curl('mobile','knowledge','category');?>&category_name=<?php echo urlencode(base64_encode($item['category_name'])); ?>"><?php echo $item['category_name']; ?></a></li>
                            <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <div class="stream-list question-stream">
           <?php  if(is_array($result)) { foreach($result as $item) {  ?>
                    <section class="stream-list-item">
                        <div class="blog-rank">
                            <div class="votes  plus " style="<?php if($item['is_private']==1){?>background:#9a0000;<?php }?>">
                                <?php echo $item['readcount'];?><small> 阅读量 </small>
                            </div>

                        </div>
                        <div class="summary">
                            <h2 class="title">
                                <a href="<?php echo create_curl('mobile','knowledge','info');?>&id=<?php echo $item['id'];?>" target="_blank" > <?php echo $item['knowledge_title'];?></a>
                            </h2>
                            <ul class="author list-inline">
                                <li>
                                    更新日期：<span class="askDate"> <?php echo date('Y-m-d H:i',$item['updatetime'])  ?></span>
                                    <span class="split"></span>
                                    作者： <?php if($item['author']=='') { ?> 管理员<?php } ?> <?php if($item['author']!='') { ?> <?php echo $item['author'];?><?php } ?>
                                    <span class="split"></span> 分类：<?php echo $item['category_name'];?>
                                    <?php if(!empty($_SESSION['user'])){ ?>
                                    <span class="split"></span> <a href="<?php echo create_curl('mobile','knowledge','edit');?>&id=<?php echo $item['id'];?>" class="edit" data-toggle="tooltip" data-placement="right" title="" data-original-title="补充细节"><i class="fa fa-edit"></i> 编辑</a>
                                    <span class="split"></span>  <a href="<?php echo create_curl('mobile','knowledge','delete');?>&id=<?php echo $item['id'];?>" onclick="return confirm('确认删除此知识文章？');" class="edit" data-toggle="tooltip" data-placement="right" title="" data-original-title="补充细节"><i class="fa fa-edit"></i> 删除</a>
  <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </section>
                    <?php } ?>
                    <?php } ?>

                </div><!-- /.stream-list -->

                <div class="text-center">

                </div>
            </div><!-- /.main -->

        </div>
    </div>

    <?php if($page_count>1){ ?>
    <div class="text-center">
    <ul class="pagination"><li class="disabled"><span>共
                       <?php echo $allcount; ?> 条 ,共 <?php echo $page_count; ?> 页 第 <?php echo empty($page)?++$page:$page; ?> 页</span></li>
                       <li ><span><a href="<?php $_GET['page']=1;echo create_curl('mobile','knowledge','index',$_GET); ?>">首页</a></span></li> 
                      <?php  if((intval($page)-1)>0){ ?><li ><span><a href="<?php $_GET['page']=(intval($page)-1);echo create_curl('mobile','knowledge','index',$_GET) ?>">上一页</a></span></li>  <?php } ?>
                      <?php if((intval($page)+1)<=$page_count){ ?> <li><a href="<?php $_GET['page']=(intval($page)+1);echo create_curl('mobile','knowledge','index',$_GET) ?>">下一页</a></li> <?php } ?>
                      <li><a href="<?php $_GET['page']=$page_count;echo create_curl('mobile','knowledge','index',$_GET) ?>">尾页</a></li></ul>


    </div>
    <?php }else{ ?>
    <div class="text-center">
        <ul class="pagination"><li class="disabled"><span>共
                    <?php echo $allcount;?> 条</li></ul>

    </div>
   <?php } ?>
</div>

<?php  include page('footer');?>