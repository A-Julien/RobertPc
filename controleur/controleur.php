<?php
	require_once('../modele/classes/RobertDAO.class.php');
	//require_once('../modele/classes/RobertGenerate.php');

	$robert = new RobertDAO('../modele/data');

	function getCat() {
		global $robert;
		return $robert->getCategories();
		//return $tabCat;
	}

	function getListe($categorie) {
		global $robert;
		$tabListe = $robert->getListe($categorie);
		return $tabListe;
	}

	function getObj($id, $categorie) {
		global $robert;
		$produit = $robert->getObjet($id, $categorie);
		return $produit;
	}

?>
