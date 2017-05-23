<?php
	require_once('../modele/classes/RobertDAO.class.php');
	require_once('../modele/classes/RobertGenerate.php');

	$robert = new RobertDAO('../modele/data');

	function getCat() {
		$tabCat = global $robert->getCategories();
		return $tabCat;
	}

	function getListe($categorie) {
		$tabListe = global $robert->getListe($categorie);
		return $tabListe;
	}

	function getObj($id, $categorie) {
		$produit = global $robert->getObjet($id, $categorie);
		return $produit;
	}

?>
