<?php
$array = array(
    "frequence"    => "INTEGER",
    "un tribu"  => "STRING",

);

	require_once('../modele/classes/RobertDAO.class.php');

	$robert = new RobertDAO('../modele/data');
	/*
	$m = $robert->getObjet('1', 'memoire');

	$l = $robert->getListe('carteGraphique');
	*/

	//$c = $robert->addCategorie("Personnal Cipm",$array,"c'est un fammeux trois mats");
	$c = $robert->getCategories();


	var_dump($c) ;

?>
