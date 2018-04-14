<?php
echo doctype('html5');
echo "<head>";
echo "<title>AdCivil, seu escritório online.</title>";
	echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
	$meta = array(
		array('name' => 'robots', 'content'=>'NOINDEX, NOFOLLOW'),
		array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8',
		  'type' => 'equiv')
	);
	echo meta($meta);
	//echo link_tag(array('href' => 'assets/css/admin.css'));
	//echo link_tag('Assets/css/admin/global.css');
	//echo link_tag('../Assets/css/admin/bootstrap.css');
	//echo link_tag('../Assets/css/style.css');
//echo "</head>";
//echo "<body>";
