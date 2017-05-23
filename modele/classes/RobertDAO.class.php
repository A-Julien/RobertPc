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
			foreach($tab as $key=>$value) {
				$_key = $tab[$key]["name"];
 				$array_key[] =  $_key;
 				$array_value[] = $this->splitAtUpperCase($_key);
			}
			return array_combine($array_key,$array_value);
		}

		function upperFirstCase($string){
			return ucfirst($string);
		}

		function splitAtUpperCase($string){
    		return $this->upperFirstCase(preg_replace('/([a-z0-9])?([A-Z])/','$1 $2',$string));
		}
	}
?>
