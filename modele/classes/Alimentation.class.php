<?php

	require_once('Generique.class.php');

	class Alimentation extends Generique{
		public $puissance;

        /**
         * Alimentation constructor.
         * @param $puissance
         */
        public function __construct($puissance)
        {
            parent::__construct()
            $this->puissance = $puissance;
        }


    }

?>