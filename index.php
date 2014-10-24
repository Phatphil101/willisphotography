<?php
/*
	Sitemap Creator 0.1, a php script that creates Sitemap 0.90 aka google,yahoo and msn sitemaps for your site
	It can be downloaded from http://walid.kurtubba.com/
	License: GPL

	Walid GadElKarim, kurtubba@gmail.com
*/

/*
	script index
*/

error_reporting(E_ALL & ~E_NOTICE);
require_once('.config.php');
require_once('.st_func.php');
//showing header
_echo($header);

//show login form
if($settings['disabledirect'] && !isset($_POST['pass'])) _echo('<div align=center><h1>Login</h1> <form action=index.php method=POST><input type=password name=pass size=15><br><input type=submit name=submit value=Login></form></div>','error');
if(isset($_POST['pass']) && $_POST['pass']!=$settings['pass']) _echo('Wrong Password','error');
$start_time = time();
get_static_urls();
create_sitemap();
ping_em();
if($settings['sendemails']) send_email($settings['email']);
_echo($footer);
?>
