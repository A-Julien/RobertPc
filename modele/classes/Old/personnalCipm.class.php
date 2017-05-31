<?php
/*
c'est un fammeux trois mats
*/
	require_once('../modele/classes/generique.class.php');

	class personnalCipm extends Generique {
			public $frequence;
			public $unTribu;
	public function __construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format,$frequence,$unTribu){
		parent::__construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format);
		$this->frequence = $frequence;
		$this->unTribu = $unTribu;
	}

	public function getFrequence(){
		return $this->frequence;
	}
	public function getUnTribu(){
		return $this->unTribu;
	}
	}
?>