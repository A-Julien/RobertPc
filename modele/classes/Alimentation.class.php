<?php

	require_once('Generique.class.php');

	class Alimentation extends Generique{
		public $puissance;

		public function __construct($puissance){
        	$this->puissance = $puissance;
        	parent::__construct($nom);
    	}
	}

?>