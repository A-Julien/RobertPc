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
	}

?>