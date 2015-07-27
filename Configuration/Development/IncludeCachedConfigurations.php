<?php
if (FLOW_PATH_ROOT !== '/var/www/html/internship-project-3-team-2/flow_login/' || !file_exists('/var/www/html/internship-project-3-team-2/flow_login/Data/Temporary/Development/Configuration/DevelopmentConfigurations.php')) {
	unlink(__FILE__);
	return array();
}
return require '/var/www/html/internship-project-3-team-2/flow_login/Data/Temporary/Development/Configuration/DevelopmentConfigurations.php';