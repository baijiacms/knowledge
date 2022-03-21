<?php

	
	if (!is_dir(WEB_ROOT.'/attachment/')) {
			mkdirs(WEB_ROOT.'/attachment/');
		}
				$file = file_upload($_FILES['cfile'], 'other');

	echo(ATTACHMENT_WEBROOT. $file['path']);
	exit;

