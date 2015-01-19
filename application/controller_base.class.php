<?php


	/* Explanation about Abstract classes.

	*  Classes defined as abstract may not be instantiated, 
	*  and any class that contains at least one abstract 
	*  method must also be abstract. 
	*  Methods defined as abstract simply declare the method's 
	*  signature - they cannot define the implementation.

	*/
	Abstract Class baseController {
		protected $registry;

		function __construct($registry) {
			$this->registry = $registry;
		}


		abstract function index();
	}