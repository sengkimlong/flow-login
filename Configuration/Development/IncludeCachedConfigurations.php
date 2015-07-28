<?php
if (FLOW_PATH_ROOT !== '/var/www/html/flow-login/' || !file_exists('/var/www/html/flow-login/Data/Temporary/Development/Configuration/DevelopmentConfigurations.php')) {
	unlink(__FILE__);
	return array();
}
return require '/var/www/html/flow-login/Data/Temporary/Development/Configuration/DevelopmentConfigurations.php';