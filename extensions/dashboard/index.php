<?php
if ($handle = opendir(dirname(__FILE__))) {
	while (false !== ($filex = readdir($handle))) {
		if (!strstr($filex,"index.php") && strstr($filex,".php")) {
			require_once(dirname(__FILE__).'/'.$filex);
		}
	}
	closedir($handle);
}
?>