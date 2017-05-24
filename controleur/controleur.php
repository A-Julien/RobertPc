<?php
	require_once('../modele/classes/RobertDAO.class.php');
	//require_once('../modele/classes/RobertGenerate.php');

	$robert = new RobertDAO('../modele/data');
	$data;
	$tabListe;
	$categorie;
	$id;
	$produit;
	$tabCreaCat;
	$newCategorie;

	if (isset($_POST['action'])) {
		$action = $_POST['action'];
	}
	else {
		$action="getCat";
	}

	$action();

	function getCat() {
		global $robert;
		global $data;
		$data = $robert->getCategories();
		include("../vue/accueil.php");
	}

	function getListe() {
		global $categorie;
		global $robert;
		global $tabListe;
		global $data;
		$data = $robert->getCategories();
		$categorie = $_POST['categorie'];
		$tabListe = $robert->getListe($categorie);
		include("../vue/liste.php");
	}

	function getObj() {
		global $categorie;
		global $robert;
		global $data;
		global $id;
		global $produit;
		$data = $robert->getCategories();
		$categorie = $_POST['categorie'];
		$id = $_POST['id'];
		$produit = $robert->getObjet($id, $categorie);
		include("../vue/produit.php");
	}

	function creerCat() {
		global $tabCreaCat;
		global $newCategorie;
		$newCategorie = $_POST['cat'];
		$tabCreaCat = array();
		for ($i=1; isset($_POST['nomAttr'.$i]) ; $i++) {
			if(isset($_POST['nomAttr'.$i])){
				$tabCreaCat[$_POST['nomAttr'.$i]] = $_POST['typeAttr'.$i];
			}
		}
		include("../vue/ajoutCatConfirm.php");
	}

?>
