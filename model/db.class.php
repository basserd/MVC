<?php
	
	Class db {

		// First we need to declare the instance.
		private static $instance = null;

		// Were using a private __construct because we dont want
		// anybody to call it.
		private function __construct() {
			// Db details.
		}

		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new PDO("mysql:host=localhost; dbname=MVCtable", 'username', 'password');
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}

			return self::$instance;
		}

		// We dont want anyone to clone the Instance, So private It is.
		private function __clone() {

		}
	}