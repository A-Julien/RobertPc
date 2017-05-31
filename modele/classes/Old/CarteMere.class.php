<?php

	require_once('Generique.class.php');
	// faire require_once() du DAO

	class carteMere extends Generique{
		public $nbProcesseur;
        public $nbMemoire;


        /**
         * CarteGraphique constructor.
         * @param $nbMemoire
         * @param $frequence
         */
        public function __construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format,$nbProcesseur, $nbMemoire)
        {
            parent::__construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format);
            $this->nbMemoire = $nbMemoire;
            $this->nbProcesseur = $nbProcesseur;

        }

    }

?>