<?php

	require_once('Generique.class.php');

	class Alimentation extends Generique{
		public $puissance;

        /**
         * Alimentation constructor.
         * @param $puissance
         */
        public function __construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format,$puissance)
        {
            parent::__construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format);
            $this->puissance = $puissance;
        }


    }

?>