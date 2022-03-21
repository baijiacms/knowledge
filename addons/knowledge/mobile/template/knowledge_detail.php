<?php include page('header');?>

<link href="<?php  echo RESOURCE_ROOT;?>/static/js/fancybox/jquery.fancybox.min.css" rel="stylesheet">

<div class="wrap">
    <div class="container">
        <div class="row mt-10">
            <div class="col-xs-12 col-md-12 main">
               <div class="widget-category clearfix">
                    <div class="col-sm-12">   <ul class="list">
                    	   <li <?php if(empty($result['category_name'])){ ?> class="active"  <?php } ?>>  <a href="<?php echo create_curl('mobile','knowledge','index');?>">所有知识</a></li>
                            <?php if(is_array($category)) { foreach($category as $item) {  ?>
                            <li  <?php $qcid=($result['category_name']);  if(!empty($qcid)){ ?><?php if($item['category_name']==$qcid){ ?> class="active"  <?php } ?><?php } ?> >  <a href="<?php echo create_curl('mobile','knowledge','category');?>&category_name=<?php echo base64_encode($item['category_name']); ?>"><?php echo $item['category_name']; ?></a></li>
                            <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            
                <div class="widget-question widget-article">
                    <h3 class="title"><?php echo $result['knowledge_title'];?></h3>
                    <ul class="taglist-inline">
                    </ul>
                    <div class="content mt-12">
                      <?php if(false){ ?>  <ul class="taglist-inline">
                            <li class="tagPopup"><a class="tag" href="<?php echo create_curl('mobile','knowledge','category');?>&category_name=<?php echo base64_encode($result['category_name']); ?>"><?php echo $result['category_name'];?></a></li>
                        </ul><?php } ?>
                        <div class="text-fmt">
                          <?php echo ($result['knowledge_content']);?>
                        </div>
                        <div class="post-opt mt-30">
                            <ul class="list-inline text-muted">
                                <li>
                                    <i class="fa fa-clock-o"></i>
                                   更新于 <?php echo date('Y-m-d H:i',$result['updatetime'])  ?>
                                </li>
                                <li>阅读 ( <?php echo $result['readcount'];?>  )</li>
                                <li>作者：<?php echo $result['author'];?></li> 
                                <li>阅读权限：<?php  if(empty($result['is_private'])){?>公共<?php }else{ ?>私有<?php } ?></li> <?php if(!empty($_SESSION['user'])){ ?>
                                <li>
                                <a href="<?php echo create_curl('mobile','knowledge','edit');?>&id=<?php echo $result['id'];?>" class="edit" data-toggle="tooltip" data-placement="right" title="" data-original-title="补充细节"><i class="fa fa-edit"></i> 编辑</a>
                                </li>
                                <li>
                                    <a onclick="return confirm('确认删除此知识文章？');"  href="<?php echo create_curl('mobile','knowledge','delete');?>&id=<?php echo $result['id'];?>" class="edit" data-toggle="tooltip" data-placement="right" title="" data-original-title="补充细节"><i class="fa fa-edit"></i> 删除</a>

                                </li>  <?php } ?></ul>
                        </div>
                    </div>

                </div>



            </div>


        </div>
    </div>
</div>

<?php  include page('footer');?>