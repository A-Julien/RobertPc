<?php
	require_once('../modele/classes/RobertDAO.class.php');
	require_once('../modele/classes/generique.class.php');

	$gen = new Generique('15','','','','','','','','');

	$robert = new RobertDAO('../modele/data');

	$robert->addProduct($gen, 'Carte Graphique');

	//$m = $robert->getObjet(1);

	//$l = $robert->getListe("carteGraphique");
	//$robert->deleteCategorie("Carte Graphique");

	//var_dump($l);

?>
