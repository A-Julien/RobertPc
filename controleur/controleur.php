<?php
	require_once('../modele/classes/RobertDAO.class.php');
	require_once('../modele/classes/generique.class.php');
	//require_once('../modele/classes/RobertGenerate.php');

	$robert = new RobertDAO('../modele/data');
	$data;
	$tabListe;
	$categorie;
	$id;
	$produit;
	$tabCreaCat;
	$newCategorie;
	$gen;
	$search;
	$tabListeSearch;
	$dataSearch;
	$dispo;
	$marque;

	if (isset($_POST['action'])) {
		$action = $_POST['action'];
	}
	else {
		$action="getCat";
	}

	$action();

	function getCat() { //ouvre la page d'accueil
		global $robert;
		global $data;
		$data = $robert->getCategories();
		include("../vue/accueil.php");
	}

	function getListe() { //ouvre la page web "liste des produits par catégorie"
		global $categorie;
		global $robert;
		global $tabListe;
		global $data;
		$data = $robert->getCategories();
		$categorie = $_POST['categorie'];
		$tabListe = $robert->getListe($categorie);
		include("../vue/liste.php");
	}

	

	function getObj() { //ouvre la page web "produit"
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

	//ouvre la page de résultats de recherche
	function getSearch() {
		global $data;
		global $robert;
		global $search;
		global $tabListeSearch;
		$data=$robert->getCategories();
		$search=$_POST['saisie'];
		$tabListeSearch=$robert->getSearch($search);
		include("../vue/recherche.php");
	}

	//ouvre la page de formulaire 
	/*function formSearch() {
		global $data;
		global $robert;
		$data=$robert->getCategories();
		include("../vue/formSearch.php");
	}

	function getSearchComplete() {
		global $data;
		global $robert;
		global $search;
		global $dispo;
		global $marque;
		global $tabListeSearch;
		$data=$robert->getCategories();
		$search=$_POST['nom'];
		if (isset($_POST['dispo']) && ($_POST['dispo']=="true" || $_POST['dispo']=="false")) {$dispo=$_POST['dispo'];}
		else{$dispo="undefined";}
		if (isset($_POST['marque'])) {$dispo=$_POST['marque'];}
		else{$marque="undefined";}
		$tabListeSearch=$robert->getSearchComplete($search, $dispo, $marque);
		include("../vue/rechercheAvance.php");
	}*/

	function ajouterCat() { //ouvre le formulaire permettant de déterminer les noms et types des attributs de la nouvelle catégorie
		include("../vue/ajoutCat.php");
	}

	function supprimerCat() {
		global $data;
		global $robert;
		$data = $robert->getCategories();
		include("../vue/supprCat.php");
	}

	function choixSupprCat() {
		global $categorie;
		global $robert;
		$categorie = $_POST['categorie'];
		$robert->deleteCategorie($categorie);
		include("../vue/supprCatConfirm.php");
	}

	function creerCat() {
		global $newCategorie;
		global $robert;
		$newCategorie = $_POST['cat'];
		$robert->addCategorie($newCategorie);
		include("../vue/ajoutCatConfirm.php");
	}

	function choixProduit() { //ouvre le formulaire permettant de choisir le type de produit à ajouter
		global $data;
		global $robert;
		$data = $robert->getCategories();
		include("../vue/formulaireAdd.php");
	}

	function admin() {
		include ("../vue/modeAdmin.php");
	}

	function add() { //ouvre le formulaire "add.php" pour renseigner les valeurs des attributs du nouveau produit
		global $categorie;
		global $gen;
		$gen = new Generique('','','','','','','','','');
		$categorie = $_POST['categorie'];
		include("../vue/add.php");
	}

	function ajouterProduit() { //effectue l'ajout dans la base de données
		global $gen;
		global $categorie;
		global $robert;
		$categorie = $_POST['categorie'];
		$gen = new Generique('','','','','','','','','');
		foreach ($gen as $attribute => $value) {
			$gen->$attribute = $_POST[$attribute];
		}
		$robert->addProduct($gen,$categorie);

		include("../vue/ajoutPdtConfirm.php");

	}

	function supprimerProduit() { //ouvre le formulaire permettant de choisir le type de produit à ajouter
		global $robert;
		global $data;
		$data = $robert->getCategories();
		include("../vue/formulaireSuppr.php");
	}

	function suppr() { //ouvre le formulaire permettant de choisir le produit à supprimer dans la liste des produits de sa catégorie
		global $categorie;
		global $robert;
		global $tabListe;
		$categorie = $_POST['categorie'];
		$tabListe = $robert->getListe($categorie);
		include("../vue/suppr.php");
	}

	function supprObj() { //effectue la suppression de l'objet sélectionné dans la base de données
		global $robert;
		global $categorie;
		global $id;
		global $gen;
		$categorie = $_POST['categorie'];
		$id = $_POST['id'];
		$gen = $robert -> getObjet($id);
		$robert -> deleteProduct($id);
		include("../vue/supprPdtConfirm.php");
	}

?>
