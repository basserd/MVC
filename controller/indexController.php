<?php 
	
	Class indexController Extends baseController {
		
		public function index() {
			// Settings a Template Variable which will be loaded later.
			$this->registry->template->welcome = 'Welcome to this Mvc build.';
			// Loading the index template.
			$this->registry->template->show('index');
		}
	}