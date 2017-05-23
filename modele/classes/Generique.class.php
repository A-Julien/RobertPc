<?php

	class Generique {
		public $id;
		public $nom;
		public $modele;
		public $marque;
		public $description;
		public $photo;
		public $disponibilite;
		public $prix;
		public $format;

		public function __construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format){
			$this->id = $id;
			$this->nom = $nom;
			$this->modele = $modele;
			$this->marque = $marque;
			$this->description = $description;
			$this->photo = $photo;
			$this->disponibilite = $disponibilite;
			$this->prix = $prix;
			$this->format = $format;
		}

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @return mixed
         */
        public function getNom()
        {
            return $this->nom;
        }

        /**
         * @return mixed
         */
        public function getModele()
        {
            return $this->modele;
        }

        /**
         * @return mixed
         */
        public function getMarque()
        {
            return $this->marque;
        }

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @return mixed
         */
        public function getPhoto()
        {
            return $this->photo;
        }

        /**
         * @return mixed
         */
        public function getDisponibilite()
        {
            return $this->disponibilite;
        }

        /**
         * @return mixed
         */
        public function getPrix()
        {
            return $this->prix;
        }

        /**
         * @return mixed
         */
        public function getFormat()
        {
            return $this->format;
        }

	}

?>