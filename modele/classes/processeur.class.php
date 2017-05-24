<?php

	require_once('Generique.class.php');

	class Processeur extends Generique{
		private $frequence;
		private $nbCoeur;

        /**
         * Processeur constructor.
         * @param $frequence
         * @param $nbCoeur
         */
        public function __construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format,$frequence, $nbCoeur)
        {
            parent::__construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format);
            $this->frequence = $frequence;
            $this->nbCoeur = $nbCoeur;
        }


    }

?>