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
			$res=$db->query($req);
			$result=$res->fetchAll(PDO::FETCH_OBJ);
			return $result[0];
		}

		function getListe($categorie)
		{
			$req='select * from '.$categorie;
			$res=$db->query($req);
			$result=$res->fetchAll(PDO::FETCH_OBJ);
			return $result;
		}
	}

?>