<?php
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Comments: mysql数据库操作
// +----------------------------------------------------------------------
// | Author: 百家cms <QQ:1987884799> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');
function  uuid()
{
    $chars = md5(uniqid(mt_rand(), true));
    $uuid = substr ( $chars, 0, 8 ) . '-'
        . substr ( $chars, 8, 4 ) . '-'
            . substr ( $chars, 12, 4 ) . '-'
                . substr ( $chars, 16, 4 ) . '-'
                    . substr ( $chars, 20, 12 );
                    return $uuid ;
}

function create_curl($site_type,$module="index", $control="index", $params = array()) {
    $params['act']=$site_type.'_'.$module.'_'. $control;
    $queryString = http_build_query($params, '', '&');
    return 'index.php?'.(!empty($queryString)?($queryString):(""));
}

function message($msg, $redirect = '', $type = '',$successAutoNext=true,$sec=2) {
	global $_CMS,$_GP;
	$sec=intval($sec);
	if($redirect == 'refresh') {
		$redirect = refresh();
	}
	if($redirect == '') {
		$type = in_array($type, array('success', 'error', 'info', 'warning', 'ajax', 'sql')) ? $type : 'info';
	} else {
		$type = in_array($type, array('success', 'error', 'info', 'warning', 'ajax', 'sql')) ? $type : 'success';
	}
	
	if (empty($msg) && !empty($redirect)) {
		header('location: '.$redirect);
	}
	$label = $type;
	if($type == 'error') {
		$label = 'danger';
	}
	if($type == 'ajax' || $type == 'sql') {
		$label = 'warning';
	}
	include page('message','common');
	exit();
}
function page($filename, $module = '') {
			global $_CMS,$_GP;
		
		if(empty($module))
		{
			if($_CMS['site']=='mobile') {
					
			
				$source=ADDONS_ROOT . $_CMS['module'].'/'.$_CMS['site']."/template/"."{$filename}.php";
					
			}else
			{
			
					$source=ADDONS_ROOT . $_CMS['module'].'/'.$_CMS['site']."/template/"."{$filename}.php";
				
			}
		}else
		{
		if($_CMS['site']=='mobile') {
					
			
				$source=ADDONS_ROOT . $module.'/'.$_CMS['site']."/template/"."{$filename}.php";
					
			}else
			{
			
					$source=ADDONS_ROOT . $module.'/'.$_CMS['site']."/template/"."{$filename}.php";
				
			}

		}
		
		return $source;
}
function checksubmit($action="submit", $allowget = false) {
	global $_CMS, $_GP;
	if (!empty($action)&&empty($_GP[$action])) {
		return FALSE;
	}
	if ($allowget)
	{
		return true;
	}

	if ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')|| (($_SERVER['REQUEST_METHOD'] == 'POST') && (empty($_SERVER['HTTP_REFERER']) || preg_replace("/https?:\/\/([^\:\/]+).*/i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("/([^\:]+).*/", "\\1", $_SERVER['HTTP_HOST'])))) {
		return TRUE;
	}
	return FALSE;
}

function refresh() {
	global $_GP, $_CMS;
	$_CMS['refresh'] =   $_SERVER['HTTP_REFERER'];
	$_CMS['refresh'] = substr($_CMS['refresh'], -1) == '?' ? substr($_CMS['refresh'], 0, -1) : $_CMS['refresh'];
	$_CMS['refresh'] = str_replace('&amp;', '&', $_CMS['refresh']);
	$reurl = parse_url($_CMS['refresh']);

	if(!empty($reurl['host']) && !in_array($reurl['host'], array($_SERVER['HTTP_HOST'], 'www.'.$_SERVER['HTTP_HOST'])) && !in_array($_SERVER['HTTP_HOST'], array($reurl['host'], 'www.'.$reurl['host']))) {
		$_CMS['refresh'] = WEBSITE_ROOT;
	} elseif(empty($reurl['host'])) {
		$_CMS['refresh'] = WEBSITE_ROOT.'./'.$_CMS['referer'];
	}
	return strip_tags($_CMS['refresh']);
}


function getClientIP() {
	static $ip = '';
	$ip = $_SERVER['REMOTE_ADDR'];
	if(isset($_SERVER['HTTP_CDN_SRC_IP'])) {
		$ip = $_SERVER['HTTP_CDN_SRC_IP'];
	} elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
		foreach ($matches[0] AS $xip) {
			if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
				$ip = $xip;
				break;
			}
		}
	}
	return $ip;
}

function is_mobile()   
{
  $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';   
  $mobile_browser = '0';   
  if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))   
    $mobile_browser++;   
  if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))   
    $mobile_browser++;   
  if(isset($_SERVER['HTTP_X_WAP_PROFILE']))   
    $mobile_browser++;   
  if(isset($_SERVER['HTTP_PROFILE']))   
    $mobile_browser++;   
  $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));   
  $mobile_agents = array(   
        'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',   
        'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',   
        'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',   
        'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',   
        'newt','noki','oper','palm','pana','pant','phil','play','port','prox',   
        'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',   
        'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',   
        'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',   
        'wapr','webc','winw','winw','xda','xda-'  
        );   
  if(in_array($mobile_ua, $mobile_agents))   
    $mobile_browser++;   
  if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)   
    $mobile_browser++;   
  // Pre-final check to reset everything if the user is on Windows   
  if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)   
    $mobile_browser=0;   
  // But WP7 is also Windows, with a slightly different characteristic   
  if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)   
    $mobile_browser++;   
  if($mobile_browser>0)   
    return true;   
 
 	if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
			return true;
		}
				if (isset($_SERVER['HTTP_VIA'])) {
					if(stristr($_SERVER['HTTP_VIA'], "wap"))
					{
						return  true;
					}
			}
 		if (isset ($_SERVER['HTTP_USER_AGENT'])) {
			$clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp',
				'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 
				'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 
				'nexusone', 'cldc', 'midp', 'wap', 'mobile');
						if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
				return true;
			}
		}
				if (isset($_SERVER['HTTP_ACCEPT'])) {
						if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
				return true;
			}
		}
		return false;
}



function random($length, $numeric = FALSE) {
   	$seed = base_convert(md5(microtime() . $_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
	$seed = $numeric ? (str_replace('0', '', $seed) . '012340567890') : ($seed . 'zZ' . strtoupper($seed));
	if ($numeric) {
		$hash = '';
	} else {
		$hash = chr(rand(1, 26) + rand(0, 1) * 32 + 64);
		$length--;
	}
	$max = strlen($seed) - 1;
	for ($i = 0; $i < $length; $i++) {
		$hash .= $seed[mt_rand(0, $max)];
	}
	return $hash;
}
function web_url($control,$params=array())
{
	global $_CMS;
	return create_curl($_CMS['site'],$_CMS['module'],$control,$params);
}
function pagination($total, $pageIndex, $pageSize = 15, $url = '', $context = array('before' => 5, 'after' => 4, 'ajaxcallback' => '')) {

	$pdata = array(
		'tcount' => 0,
		'tpage' => 0,
		'cindex' => 0,
		'findex' => 0,
		'pindex' => 0,
		'nindex' => 0,
		'lindex' => 0,
		'options' => ''
	);
	if ($context['ajaxcallback']) {
		$context['isajax'] = true;
	}

	$pdata['tcount'] = $total;
	$pdata['tpage'] = (empty($pageSize) || $pageSize < 0) ? 1 : ceil($total / $pageSize);
	if ($pdata['tpage'] <= 1) {
		return '';
	}
	$cindex = $pageIndex;
	$cindex = min($cindex, $pdata['tpage']);
	$cindex = max($cindex, 1);
	$pdata['cindex'] = $cindex;
	$pdata['findex'] = 1;
	$pdata['pindex'] = $cindex > 1 ? $cindex - 1 : 1;
	$pdata['nindex'] = $cindex < $pdata['tpage'] ? $cindex + 1 : $pdata['tpage'];
	$pdata['lindex'] = $pdata['tpage'];

	if ($context['isajax']) {
		if (!$url) {
			$url = 'index.php?' . '?' . http_build_query($_GET);
		}
		$pdata['faa'] = 'href="javascript:;" page="' . $pdata['findex'] . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . 'index.php?' . $url . '\', \'' . $pdata['findex'] . '\', this);return false;"' : '');
		$pdata['paa'] = 'href="javascript:;" page="' . $pdata['pindex'] . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . 'index.php?' . $url . '\', \'' . $pdata['pindex'] . '\', this);return false;"' : '');
		$pdata['naa'] = 'href="javascript:;" page="' . $pdata['nindex'] . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . 'index.php?' . $url . '\', \'' . $pdata['nindex'] . '\', this);return false;"' : '');
		$pdata['laa'] = 'href="javascript:;" page="' . $pdata['lindex'] . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . 'index.php?' . $url . '\', \'' . $pdata['lindex'] . '\', this);return false;"' : '');
	} else {
		if ($url) {
			$pdata['faa'] = 'href="?' . str_replace('*', $pdata['findex'], $url) . '"';
			$pdata['paa'] = 'href="?' . str_replace('*', $pdata['pindex'], $url) . '"';
			$pdata['naa'] = 'href="?' . str_replace('*', $pdata['nindex'], $url) . '"';
			$pdata['laa'] = 'href="?' . str_replace('*', $pdata['lindex'], $url) . '"';
		} else {
			$_GET['page'] = $pdata['findex'];
			$pdata['faa'] = 'href="' . 'index.php' . '?' . http_build_query($_GET) . '"';
			$_GET['page'] = $pdata['pindex'];
			$pdata['paa'] = 'href="' . 'index.php' . '?' . http_build_query($_GET) . '"';
			$_GET['page'] = $pdata['nindex'];
			$pdata['naa'] = 'href="' . 'index.php' . '?' . http_build_query($_GET) . '"';
			$_GET['page'] = $pdata['lindex'];
			$pdata['laa'] = 'href="' . 'index.php' . '?' . http_build_query($_GET) . '"';
		}
	}

	$html = '<div><ul class="pagination pagination-centered">';
	if ($pdata['cindex'] > 1) {
		$html .= "<li><a {$pdata['faa']} class=\"pager-nav\">首页</a></li>";
		$html .= "<li><a {$pdata['paa']} class=\"pager-nav\">&laquo;上一页</a></li>";
	}
		if (!$context['before'] && $context['before'] != 0) {
		$context['before'] = 5;
	}
	if (!$context['after'] && $context['after'] != 0) {
		$context['after'] = 4;
	}

	if ($context['after'] != 0 && $context['before'] != 0) {
		$range = array();
		$range['start'] = max(1, $pdata['cindex'] - $context['before']);
		$range['end'] = min($pdata['tpage'], $pdata['cindex'] + $context['after']);
		if ($range['end'] - $range['start'] < $context['before'] + $context['after']) {
			$range['end'] = min($pdata['tpage'], $range['start'] + $context['before'] + $context['after']);
			$range['start'] = max(1, $range['end'] - $context['before'] - $context['after']);
		}
		for ($i = $range['start']; $i <= $range['end']; $i++) {
			if ($context['isajax']) {
				$aa = 'href="javascript:;" page="' . $i . '" '. ($callbackfunc ? 'onclick="'.$callbackfunc.'(\'' . 'index.php?' . $url . '\', \'' . $i . '\', this);return false;"' : '');
			} else {
				if ($url) {
					$aa = 'href="?' . str_replace('*', $i, $url) . '"';
				} else {
					$_GET['page'] = $i;
					$aa = 'href="?' . http_build_query($_GET) . '"';
				}
			}
			$html .= ($i == $pdata['cindex'] ? '<li class="active"><a href="javascript:;">' . $i . '</a></li>' : "<li><a {$aa}>" . $i . '</a></li>');
		}
	}

	if ($pdata['cindex'] < $pdata['tpage']) {
		$html .= "<li><a {$pdata['naa']} class=\"pager-nav\">下一页&raquo;</a></li>";
		$html .= "<li><a {$pdata['laa']} class=\"pager-nav\">尾页</a></li>";
	}
	$html .= '</ul></div>';
	return $html;
}

function file_move($filename, $dest) {
	mkdirs(dirname($dest));
	if(is_uploaded_file($filename)) {
		move_uploaded_file($filename, $dest);
	} else {
		rename($filename, $dest);
	}
	return is_file($dest);
}

function mkdirs($path) {
	if(!is_dir($path)) {
		mkdirs(dirname($path));
		if(!empty($path))
		{
		mkdir($path);
	}
	}
	return is_dir($path);
}

function error($code, $msg = '') {
	return array(
		'errno' => $code,
		'message' => $msg,
	);
}
function is_error($data) {
	if (empty($data) || !is_array($data) || !array_key_exists('errno', $data) || (array_key_exists('errno', $data) && $data['errno'] == 0)) {
		return false;
	} else {
		return true;
	}
}

function file_upload($file, $type = 'images') {
	if(empty($file)) {
		return error(-1, '没有上传内容');
	}
	$limit=5000;
	$extention = pathinfo($file['name'], PATHINFO_EXTENSION);
	$extention=strtolower($extention);
	if(empty($type)||$type=='images')
	{
	$extentions=array('gif', 'jpg', 'jpeg', 'png');
	}
	if($type=='music')
	{
	$extentions=array('mp3','wma','wav','amr','mp4');
	}
		if($type=='other')
	{
	    $extentions=array('gif', 'jpg', 'jpeg', 'png','mp3','zip','rar','pdf','docx','mp4','doc');
	}
	if(!in_array(strtolower($extention), $extentions)) {
		return error(-1, '不允许上传此类文件');
	}
	if($limit * 1024 < filesize($file['tmp_name'])) {
		return error(-1, "上传的文件超过大小限制，请上传小于 ".$limit."k 的文件");
	}

	$path = '/attachment/';
	$extpath="{$type}/" . date('Y/m/');

		mkdirs(WEB_ROOT . $path . $extpath);
		do {
			$filename = random(15) . ".{$extention}";
		} while(is_file(SYSTEM_WEBROOT . $path . $extpath. $filename));

	$file_full_path = WEB_ROOT . $path . $extpath. $filename;
	$file_relative_path=$extpath. $filename;
	return file_save($file['tmp_name'],$filename,$extention,$file_full_path,$file_relative_path);
}
function file_upload_base64($post) {
	 $base64=base64_decode($post);

	$extention = "jpg";
	$path = '/attachment/';
	$extpath="{$extention}/" . date('Y/m/');

		mkdirs(WEB_ROOT . $path . $extpath);
		do {
			$filename = random(15) . ".{$extention}";
		} while(is_file(SYSTEM_WEBROOT . $path . $extpath. $filename));
	
	
	
	$file_tmp_name = SYSTEM_WEBROOT . $path . $extpath. $filename;
		$file_relative_path = $extpath. $filename;
	if (file_put_contents($file_tmp_name, $base64) == false) {
		$result['message'] = '提取失败.';
		return $result;
	}
		$file_full_path = WEB_ROOT .$path . $extpath. $filename;
	return file_save($file_tmp_name,$filename,$extention,$file_full_path,$file_relative_path);

}

function fetch_net_file_upload($url) {
	$url = trim($url);
	

	$extention = pathinfo($url,PATHINFO_EXTENSION );
	$path = '/attachment/';
	$extpath="{$extention}/" . date('Y/m/');

		mkdirs(WEB_ROOT . $path . $extpath);
		do {
			$filename = random(15) . ".{$extention}";
		} while(is_file(SYSTEM_WEBROOT . $path . $extpath. $filename));
	
	
	
	$file_tmp_name = SYSTEM_WEBROOT . $path . $extpath. $filename;
		$file_relative_path = $extpath. $filename;
	if (file_put_contents($file_tmp_name, file_get_contents($url)) == false) {
		$result['message'] = '提取失败.';
		return $result;
	}
		$file_full_path = WEB_ROOT .$path . $extpath. $filename;
	return file_save($file_tmp_name,$filename,$extention,$file_full_path,$file_relative_path);
}
function file_save($file_tmp_name,$filename,$extention,$file_full_path,$file_relative_path,$allownet=true)
{
	
	$settings=globalSystemSetting();
	
		if(!file_move($file_tmp_name, $file_full_path)) {
			return error(-1, '保存上传文件失败');
		}
		if(!empty($settings['image_compress_openscale']))
		{
			
			$scal=$settings['image_compress_scale'];
			$quality_command='';
			if(intval($scal)>0)
			{
				$quality_command=' -quality '.intval($scal);
			}
				system('convert'.$quality_command.' '.$file_full_path.' '.$file_full_path);
		}
	
	if($allownet&&!empty($settings['system_isnetattach']))
		{
			
			
				$filesource=$file_full_path;
		if($settings['system_isnetattach']==1)
		{
			require_once(WEB_ROOT.'/framework/engine/base/class/lib/lib_ftp.php');
			$ftp=new baijiacms_ftp();
			$ftp->connect();
				$ftp->upload($filesource,$settings['system_ftp_ftproot']. $file_relative_path);
			if($ftp->error()) {
			return error(-1,'文件上传失败，错误号:'.$ftp->error());
			}
		}

			if($settings['system_isnetattach']==2)
		{
			require_once(WEB_ROOT.'/framework/engine/base/class/lib/lib_oss.php');
			$oss=new baijiacms_oss();

					$oss->upload($filesource,$realfilename,$file_relative_path);
								if($oss->error()) {
			return error(-1,'文件上传失败，错误号:'.$oss->error());
			}
		}	
			
			
		}
	$result = array();
	$result['path'] =$file_relative_path;
	$result['filename'] =$filename;
	$result['extention'] =$extention;
	$result['success'] = true;
	return $result; 
	
}

function file_delete($file_relative_path) {

	if(empty($file_relative_path)) {
		return true;
	}
	
	$settings=globalSystemSetting();
	if(!empty($settings['system_isnetattach']))
		{
				if($settings['system_isnetattach']==1)
		{
		require_once(WEB_ROOT.'/framework/engine/base/class/lib/lib_ftp.php');
			$ftp=new baijiacms_ftp();
		if (true === $ftp->connect()) {
			if ($ftp->ftp_delete($settings['system_ftp_ftproot']. $file_relative_path)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	} 
		if($settings['system_isnetattach']==1)
		{
		require_once(WEB_ROOT.'/framework/engine/base/class/lib/lib_oss.php');
		$oss=new baijiacms_oss();
		$oss->deletefile($file_relative_path);
		return true;
	}
}else
{
		if (is_file(SYSTEM_WEBROOT . '/attachment/' . $file_relative_path)) {
		unlink(SYSTEM_WEBROOT . '/attachment/' . $file_relative_path);
		return true;
	}
	
	}
	return true;
}
function http_get($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0.1) Gecko/20100101 Firefox/9.0.1');
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
}
function http_post($url,$post_data){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0.1) Gecko/20100101 Firefox/9.0.1');
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}


function common_qrcode($homeurl)
{
  	include WEB_ROOT.'/framework/engine/base/class/lib/phpqrcode/phpqrcode/phpqrcode.php';//引入PHP QR库文件
		$value=$homeurl;
		$errorCorrectionLevel = "L";
		$matrixPointSize = "4";
		$rand_file = date("YmdH",time()).rand(100,999).rand(100,999).rand(100,999).rand(0,9)  . '.png';
		$att_target_file = 'qr-' .$rand_file;
		$qrcode_dir='/data/qrcode/face/';
		if (!is_dir(WEB_ROOT.$qrcode_dir))
		{
			mkdirs(WEB_ROOT.$qrcode_dir);
		}
		$target_file = WEB_ROOT.$qrcode_dir. $att_target_file;
		
		QRcode::png($value, $target_file, $errorCorrectionLevel, $matrixPointSize);
  	return WEBSITE_ROOT.$qrcode_dir. $att_target_file;
}
function attachment_url($url)
{
	global $_CMS;
	$system_global_setting=globalSystemSetting();
	$attchmenturl=WEBSITE_ROOT.'attachment/';
	if(!empty($system_global_setting)&&!empty($system_global_setting['system_isnetattach']))
	{
		if($system_global_setting['system_isnetattach']==1)
		{
				$attchmenturl= $system_global_setting['system_ftp_attachurl'];
		}
		if($system_global_setting['system_isnetattach']==2)
		{
				$attchmenturl=$system_global_setting['system_oss_attachurl'];
		}	
	}else
	{
		if(!empty($system_global_setting['system_base_attachurl']))
		{
			
				$attchmenturl=$system_global_setting['system_base_attachurl'].'attachment/';
		}
	}
	return $attchmenturl.$url;

}