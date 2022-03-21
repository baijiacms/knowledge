<?php  defined('IN_IA') or exit('Access Denied');   ?>


<h3>
						<i class="main_i_icon1  fa fa-gears">&nbsp;</i>系统管理
					</h3>
					<ul>
                  <li <?php  if($_CMS['module']== 'admin'&&$_CMS['control']== 'netattach' ) { ?>class="current"<?php  } ?>><a href="<?php  echo create_curl('web','admin','netattach')?>">附件设置</a></li>
					   <li 	<?php  if($_CMS['module']== 'admin'&&$_CMS['control'] == 'user' ) { ?>class="current"<?php  } ?>>
                    <a href="<?php  echo create_curl('web','admin','user')?>">系统管理员</a>
                                    </li>  
              <li 	<?php  if($_CMS['module']== 'admin'&&$_CMS['control'] == 'database' ) { ?>class="current"<?php  } ?>>
                    <a href="<?php  echo create_curl('web','admin','database')?>">备份与还原</a>
                                    </li>  
                   
                       <li 	<?php  if($_CMS['module']== 'admin'&&$_CMS['control']== 'dev'  ) { ?>class="current"<?php  } ?>>
                    <a href="<?php  echo create_curl('web','admin','dev')?>">系统信息</a>
                                    </li>
                 
                                         
					</ul>