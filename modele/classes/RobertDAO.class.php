<?php
	class RobertDAO{
		private $db;

		public function __construct($path){
			$database = 'sqlite:'.$path.'/robertPc.db';
			try{
				$this->db = new PDO($database);
			}
			catch(PDOException $e){
				die("erreur de connexion".$e->getMessage());
			}
		}

		public function addObject($className){

		}

		public function deleteObject($id,$categorie){
			$req = 'delete from '.$categorie.'where id = '.$id;
			$res = $this->db->query($req); 
		}

		public function getObjet($id, $categorie) {
			$req='select * from '.$categorie.' where id = '.$id;
			$res=$this->db->query($req);
			$result=$res->fetchAll(PDO::FETCH_OBJ);
			return $result[0];
		}

		public function getListe($categorie)
		{
			$req='select * from '.$categorie;
			$res=$this->db->query($req);
			$result=$res->fetchAll(PDO::FETCH_OBJ);
			return $result;
		}

		//retourne un tableau contenant les categories
		public function getCategories(){
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

		public function deleteCategorie($categorieName){
			$categorieName = $this->parseToConformSemantics($categorieName);
			$req = 'DROP TABLE [ IF EXISTS ] '.$categorieName;
			$res = $this->db->query($req);
			if(!is_dir($categorieName))
				unlink($categorieName.".class.php");

			if(!is_dir("../txt/".$categorieName))
				unlink("../txt/".$categorieName);
			$this->rmDir("../images/".$categorieName);
		}

		public function addCategorie($categorieName,$tabAttribut,$com){
			$categorieName = $this->parseToConformSemantics($categorieName);
			$categorieName = $this->removeAccents($categorieName);
			$classFile = fopen($categorieName.".class.php", "w+");
			if($classFile==false)
				die("Can not creat file");
			fputs($classFile, HowRobertGenerateClassCode($categorieName,$tabAttribut,$com));
			fclose($classFile);

			$initFile = fopen("../txt/".$categorieName, "w+");
			if($initFile==false)
				die("Can not creat init file");
			fclose($initFile);

			if (!mkdir('../images/'.$categorieName, 0777, true)) {
	    		die('Echec lors de la création du répertoires...');
			}

			$this->creatTable($categorieName,$tabAttribut);
		}

		private function creatTable($categorieName,$tabAttribut){
			$startReq = 'CREATE TABLE';
			$corpReq = "(";
			foreach ($tabAttribut as $key => $value) 
				$corpReq = $corpReq.$key." ".$value.","
			$corpReq = substr($corpReq, 0, -1);
			$this->db->query($startReq.$categorieName.$corpReq.")");
		}
		
		private function HowRobertGenerateClassCode ($categorieName,$tabAttribut,$com){
			$endl = "\n";
			$tab = "\t";
			$phpStart = "<?php".$endl;
			$phpEnd = "?>";
			$droit = "public ";
			$include = $tab."require_once('Generique.class.php');".$endl.$endl;
			$classHeader = $tab."class ".$categorieName." extends Generique {".$endl;
			$classFooter = $tab."}".$endl;
			$attributs = "";
			$Comment = "/*".$endl.$com.$endl."*/".$endl;
			$__constructAtributs = "$id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format,";
			$__constructInitAt = "parent::__construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format)".$endl.$tab.$tab;
			$categorieName = $this->parseToConformSemantics($categorieName);

			foreach ($tabAttribut as $key => $value) {
				$key = $this->parseToConformSemantics($key);
				$attributs = $attributs.$tab.$tab.$droit."$ "$key.$endl;
				$__constructInitAt = $__constructInitAt.$tab.$tab.'$this->'.$key." = $".$key.$endl;
			}

			$__construct = "public function __construct(";
			foreach ($tabAttribut as $key => $value) 
				$__constructAtributs = $__constructAtributs."$".$key.","
			
			$__constructAtributs = substr($__constructAtributs, 0, -1);
			$__construct = $__construct.$__constructAtributs.")".$endl;

			$classCode = $phpStart.$Comment.$include.$classHeader.$attributs.$__construct.$classFooter.$phpEnd;
			
			return $classCode;
		}

		private function parseToConformSemantics($string){
			$string = lcfirst($string);
			$string = explode(" ", $string);
			$categorieName = "";
			for ($i=0; $i < sizeof($string); $i++) { 
				if($i != 0 && !ctype_upper($string[$i - 1]))
					$string[$i] = ucfirst($string[$i]);
				$categorieName = $categorieName.$string[$i];
			}
			//var_dump($categorieName);
			return $categorieName;
		}

		private function rmDir($dir) {
   			if (is_dir($dir)) {
	    		$allDir = scandir($dir);
	    		foreach ($allDir as $folderDir) {
	       			if ($folderDir != "." && $folderDir != "..") {
	       				//si c'est un dossier -> rmdir
	         			if (filetype($dir."/".$folderDir) == "dir") 
	         				rmdir($dir."/".$folderDir); 
	         			//si c'est un fichier -> unlink
	         			else 
	         				unlink($dir."/".$folderDir);
	       			}
	     		}
	     		reset($allDir);
	    	 	rmdir($dir);
   			}
 		}

 		private function removeAccents($str, $charset='utf-8'){
    		$str = htmlentities($str, ENT_NOQUOTES, $charset); //tarduction des caractéres et Ignore les guillemets doubles et les guillemets simples.

    		//Chaines récupérer sur internet
    		$str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    		$str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
    		$str = preg_replace('#&[^;]+;#', '', $str); 
    
    		return $str;
		}


		private function upperFirstCase($string){
			return ucfirst($string);
		}

		private function splitAtUpperCase($string){
    		return $this->upperFirstCase(preg_replace('/([a-z0-9])?([A-Z])/','$1 $2',$string));
		}
	}
?>
