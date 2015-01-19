<?php 
	/* Turning error reporting On */
	error_reporting(E_All);

	$site_path = realpath(dirname(__FILE__));
	define ('__SITE_PATH', $site_path);

	/* Init file */
	include 'includes/init.php';

	$registry->router = new router($registry);
	$registry->router->setPath (__SITE_PATH . '/controller');
	$registry->template = new template($registry);
	
	$registry->router->loader();
