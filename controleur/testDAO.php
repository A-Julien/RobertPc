<?php
$array = array(
    "frequence"    => "INTEGER",
    "un tribu"  => "STRING",

);
$a = array("GTX","CG","NVI","NVIDIA","un cg","2","true","300","normal","4");

	require_once('../modele/classes/RobertDAO.class.php');

	$robert = new RobertDAO('../modele/data');
	/*
	$m = $robert->getObjet('1', 'memoire');

	$l = $robert->getListe('carteGraphique');
	*/

	//$c = $robert->addCategorie("Personnal Cipm",$array,"c'est un fammeux trois mats");
	//$c = $robert->getCategories();($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format)
	$c = $robert->addObject("carte graphique",$a);

	var_dump($c);

?>
