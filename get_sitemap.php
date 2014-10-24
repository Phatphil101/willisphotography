<?php
/*
	Sitemap Creator 0.1, a php script that creates Sitemap 0.90 aka google,yahoo and msn sitemaps for your site
	It can be downloaded from http://walid.kurtubba.com/
	License: GPL

	Walid GadElKarim, kurtubba@gmail.com
*/

/*
	Opens gzipped sitemap with the right headers
	also sends email to webmaster 
*/
error_reporting(0);
require_once('.config.php');
$smap = $_GET['sitemap'];
$smap = preg_replace('#^.*/([^/]*)$#', '$1', $smap);
$smap = 'files/'.$smap;
if($settings['sendemails'] && preg_match("#(msnbot|Lycos_Spider|eMiragorobot|Slurp|Ask Jeeves|WebCrawler|Scooter|Google)#si", $_SERVER['HTTP_USER_AGENT']))
	mail($settings['email'], 'Sitemap crawled on '.date(" h:i:s a ( l d  of  F Y )"), $_SERVER['HTTP_USER_AGENT'].' has viewed your '.$smap.' on '.date(" h:i:s a ( l d  of  F Y )")."\nUsing ip http://whois.domaintools.com/".$_SERVER['REMOTE_ADDR'], 'From:'.$settings['email']);
if(file_exists($smap))
{
	@header('Content-Length: '.filesize($smap));
	@header('Content-type: text/xml; charset=UTF-8');
	@header("Expires: " . gmdate("D, d M Y H:i:s",time()+(60*60*24)) . " GMT");
	@header('Content-Encoding: gzip' );
	$pf = @fopen( $smap, 'rb' );
	if($pf)
	while (!@feof($pf)) {
	   $buffer = @fread($pf, 1000000);
	   echo $buffer;
	}
	@fclose($pf); 
	exit;

}else
{
	@Header ("HTTP/1.1 404 Not Found");
	@header("Status: 404 Not Found");
	echo 'Sitemap file not found';
	if($settings['sendemails']) mail($settings['email'], 'Sitemap not found', $_SERVER['HTTP_USER_AGENT'].' could not find '.$smap.' on '.date(" h:i:s a ( l d  of  F Y )")."\nUsing with ip http://whois.domaintools.com/".$_SERVER['REMOTE_ADDR'], 'From:'.$settings['email']);
}
?>