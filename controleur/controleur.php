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

	function ajouterCat() { //ouvre le formulaire permettant de déterminer les noms et types des attributs de la nouvelle catégorie
		include("../vue/ajoutCat.php");
	}

	function creerCat() {
		global $tabCreaCat;
		global $newCategorie;
		$newCategorie = $_POST['cat'];
		$tabCreaCat = array();
		for ($i=1; isset($_POST['nomAttr'.$i]) ; $i++) {
			if(isset($_POST['nomAttr'.$i])){
				$tabCreaCat[$i] = $_POST['nomAttr'.$i];
			}
		}
		include("../vue/ajoutCatConfirm.php");
	}

	function choixProduit() { //ouvre le formulaire permettant de choisir le type de produit à ajouter
		include("../vue/formulaireAdd.html");
	}

	function add() { //ouvre le formulaire pour renseigner les valeurs des attributs du nouveau produit
		global $categorie;
		$categorie = $_POST['categorie'];
		include("../vue/add.php");
	}

	function ajouterProduit() { //effectue l'ajout dans la base de données

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

	}

?>
