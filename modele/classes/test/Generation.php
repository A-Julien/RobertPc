<?php
	$className= "uneClasse";

	$str = <<<EOD

	require_once('../modele/classes/generique.class.php');

	class $className extends Generique {
			$attributs
	public function __construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format,$attributsDidier){
		parent::__construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format);
		$AttributsConstruscteur
	}
		$getter
	}
EOD;
	echo($str);
?>