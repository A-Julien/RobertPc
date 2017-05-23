<?php

	require_once('../modele/classes/RobertDAO.class.php');

	$robert = new RobertDAO('../modele/data');

	$m = $robert->getObjet('1', 'memoire');

	$l = $robert->getListe('carteGraphique');

	$c = $robert->getCategories();

	var_dump($c) ;

?>
