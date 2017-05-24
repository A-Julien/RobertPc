<?php

	require_once('Generique.class.php');
	// faire require_once() du DAO

	class CarteGraphique extends Generique{
		public $frequence;
		public $nbMemoire;

        /**
         * CarteGraphique constructor.
         * @param $frequence
         * @param $nbMemoire
         */
        public function __construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format,$frequence, $nbMemoire)
        {
            parent::__construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format);
            $this->frequence = $frequence;
            $this->nbMemoire = $nbMemoire;
        }

    }

?>