<?php

	$path=dirname(__FILE__);
		$tree = __tree($path);
		$ds = array();
		foreach($tree as $t) {
			$t = str_replace($path, '', $t);
			$t = str_replace('\\', '/', $t);
			if(preg_match('/^.*\.php$/', $t)) {
				$fname = $path . $t;
				$fp = fopen($fname, 'r');
				if(!empty($fp)) {
					$bom = fread($fp, 3);
					fclose($fp);
					if($bom == "\xEF\xBB\xBF") {
						echo $t."<br/>";
					}
				}
			}
		}
		
		function __tree($path) {
	$files = array();
	$ds = glob($path . '/*');
	if(is_array($ds)) {
		foreach($ds as $entry) {
			if(is_file($entry)) {
				$files[] = $entry;
			}
			if(is_dir($entry)) {
				$rs = __tree($entry);
				foreach($rs as $f) {
					$files[] = $f;
				}
			}
		}
	}
	return $files;
}


		echo 'end';