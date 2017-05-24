<?php

	require_once('Generique.class.php');

	class Memoire extends Generique{
		private $frequence;
		private $capacite;

        /**
         * Memoire constructor.
         * @param $frequence
         * @param $capacite
         */
        public function __construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format,$frequence, $capacite)
        {
            parent::__construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format);
            $this->frequence = $frequence;
            $this->capacite = $capacite;
        }


    }

?>