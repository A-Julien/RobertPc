<?php
	require_once('../modele/classes/RobertDAO.class.php');
	//require_once('../modele/classes/RobertGenerate.php');

	$robert = new RobertDAO('../modele/data');
	$data;
	$tabListe;
	$categorie;
	$id;
	$produit;
	$recherche;
	$dataSearch;

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

	function getSearch() {
		global $recherche;
		global $dataSearch;
		global $robert;
		$recherche = $_POST['saisie'];
		$dataSearch = $robert->getSearchDAO($recherche);
		include("../vue/recherche.php");
	}
?>