<?php
defined('SYSTEM_IN') or exit('Access Denied');
$_GP=$_GPC;
$bjconfigfile = WEB_ROOT."/config/config.php";
if(is_file($bjconfigfile))
{
require WEB_ROOT.'/framework/engine/base/class/mysql.inc.php';
}

require WEB_ROOT.'/framework/engine/base/class/common.inc.php';
require WEB_ROOT.'/framework/engine/base/class/setting.inc.php';

$param_act = $_GPC['act'];
if(empty($param_act))
{
    $param_act='mobile_index_index';
}



if(!empty($param_act))
{
    $split_act=explode("_",$param_act);
    if(count($split_act)<3)
    {
        $system_site="mobile";
        $system_module="index";
        $system_control="index";
    }else
    {
        $system_site=$split_act[0];
        $system_module=$split_act[1];
        $system_control=$split_act[2];
    }
    define('RESOURCE_ROOT', WEBSITE_ROOT."resource/addons/".$system_site."/".$system_module."/");
    
    $_CMS['site']=$system_site;
    $_CMS['module']=$system_module;
    $_CMS['control']=$system_control;
    
    $system_exec_file = ADDONS_ROOT . $system_module."/".$system_site."/control/".$system_control.".php";
    if(!is_file($system_exec_file)) {
        exit($system_exec_file.'control File Not Found ');
    }
    require $system_exec_file;
}
