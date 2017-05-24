<?php
	require_once('../modele/classes/RobertDAO.class.php');

	$robert = new RobertDAO('../modele/data');

	//$m = $robert->getObjet(1);

	//$l = $robert->getListe("carteGraphique");
$robert->deleteCategorie("Carte Graphique");

	//var_dump($l);

?>
