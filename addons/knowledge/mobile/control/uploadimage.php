<?php

	
	if (!is_dir(WEB_ROOT.'/attachment/')) {
			mkdirs(WEB_ROOT.'/attachment/');
		}
				$file = file_upload($_FILES['img_file'], 'images');

	echo(ATTACHMENT_WEBROOT. $file['path']);
	exit;

