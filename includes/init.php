<?php
	/* in this file were going to include alot */

	/* Controller */
	include __SITE_PATH . '/application/' . 'controller_base.class.php';

	/* Registry */
	include __SITE_PATH . '/application/' . 'registry.class.php';

	/* Router */
	include __SITE_PATH . '/application/' . 'router.class.php';

	/* Template */
	include __SITE_PATH . '/application/' . 'template.class.php';

	/* auto load model classes */
	function __autoload($class_name) {
		$filename = strtolower($class_name) . '.class.php';
		$file = __SITE_PATH . '/model/' . $filename;

		if (file_exists($file) == false) {
			return false;
		} 
		include ($file);
	}

	$registry = new registry;

	$registry->db = db::getInstance();