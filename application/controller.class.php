<?php

	public function loader() {
		$this->getController();

		if (is_readable($this->file) == false) {
			echo $this->file;
			die ('404 Not found');
		}

		include $this->file;

		$class = $this->controller . 'Controller_';
		$controller = new $class($this->registry);

		if (is_callable(array($controller, $this->action)) == false) {
			$action = 'index';
		} else {
			$action = $this->action;
		}

		$controller->$action();
	}