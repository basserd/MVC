<?php 

	Class router {
		private $registry;

		private $path;
		private $args = array();
		
		public $file;
		public $controller;
		public $action;

		function __construct($registry) {
			$this->registry = $registry;
		}

		function setPath($path) {
			if (is_dir($path) == false) {
				throw new Exception ('Invalid controller path : `' . $path . '`');
			}

			$this->path = $path;
		}

		public function loader() {
			$this->getController();

			if (is_readable($this->file) == false) {
				$this->file = $this->path.'/error404.php';
						$this->controller = 'error404';
			}

			// Including the controller.
			include $this->file;

			// A new controller instance.
			$class = $this->controller . 'Controller';
			$controller = new $class($this->registry);

			// Checking if the action is callable, else it will be index.
			if (is_callable(array($controller, $this->action)) == false) {
				$action = 'index';
			} else {
				$action = $this->action;
			}

			// The action must be run, This happens here.
			$controller->$action();
		}

		/// Get the route from the URL.
		private function getController() {
			$route = (empty($_GET['rt'])) ? '' : $_GET['rt'];
		
			if (empty($route)) {
				$route = 'index';
			} else {
				//  Getting the parts of the route
				$parts = explode('/', $route);
				$this->controller = $parts[0];

				if (isset($parts[1])) {
					$this->action = $parts[1];
				}
			}

			if (empty($this->controller)) {
				$this->controller = 'index';
			}

			// Get action.
			if (empty($this->action)) {
				$this->action = 'index';
			}

			// Set the file path. 
			$this->file = $this->path .'/'. $this->controller . 'Controller.php';
		}
	}