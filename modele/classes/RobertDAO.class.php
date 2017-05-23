<?php
	class RobertDAO{
		private $db;

		function __construct($path){
			$database = 'sqlite:'.$path.'/robertPc.db';
			try{
				$this->db = new PDO($database);
			}
			catch(PDOException $e){
				die("erreur de connexion".$e->getMessage());
			}
		}

		function getObjet($id, $categorie) {
			$req='select * from '.$categorie.' where id = '.$id;
			$res=$this->db->query($req);
			$result=$res->fetchAll(PDO::FETCH_OBJ);
			return $result[0];
		}

		function getListe($categorie)
		{
			$req='select * from '.$categorie;
			$res=$this->db->query($req);
			$result=$res->fetchAll(PDO::FETCH_OBJ);
			return $result;
		}

		//retourne un tableau contenant les categories
		function getCategories(){
			$req = "select name from sqlite_master where type='table'";
			$res=$this->db->query($req);
			$tab = $res->fetchAll(PDO::FETCH_ASSOC);

			for ($i=0; $i < sizeof($tab) ; $i++) {
				//$categorie[$i]=$tab[$i]["name"];
				$catName = $tab[$i]["name"]
				$categorie[$catName] ;
				$parseName = parse_str($catName);
				var_dump($parseName);
				/*
				for ($j=0; $j < ; $j++) { 
					# code...
				}*/
			}
			return $categorie;
		}
	}
?>
