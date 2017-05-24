<?php
require_once('../modele/classes/generique.class.php');

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



		public function deleteProduct($id){
			$req = 'delete from produits P, appartient A where id = '.$id;
			$this->db->query($req);
		}

		public function getObjet($id) {
			$req='select * from produits P where id = '.$id;
			$res=$this->db->query($req);
			$result=$res->fetchAll(PDO::FETCH_OBJ);
			return $result[0];
		}

		public function getListe($categorie)
		{
			$req ='select * from appartient A, produits P, categories C where P.id = A.id AND C.nom = A.nom AND C.nomMenu = \''.$categorie.'\'';
			$res=$this->db->query($req);
			$result=$res->fetchAll(PDO::FETCH_OBJ);
			return $result;
		}

		//retourne un tableau contenant les categories
		public function getCategories(){
			$req = "select nomMenu from categories";
			$res=$this->db->query($req);
			$tab = $res->fetchAll(PDO::FETCH_ASSOC);
			return $tab;
		}

		public function deleteCategorie($categorieName){
			$req3 = 'delete from categories where nomMenu = \''.$categorieName.'\'';
			$req2 = 'delete from appartient where nom = \''.$categorieName.'\'';
			$req1 = 'delete from produits where id in (select id from appartient A group by id having A.nom = \''.$categorieName.'\')';
			$this->db->query($req1);
			$this->db->query($req2);
			$this->db->query($req3);
			// $categorieName =  $this->parseToConformSemantics($categorieName);
			// $req = 'DROP TABLE [ IF EXISTS ] '.$categorieName;
			// $this->db->query($req);
			// if(!is_dir($categorieName))
			// 	unlink($categorieName.".class.php");
			//
			// if(!is_dir("../txt/".$categorieName))
			// 	unlink("../txt/".$categorieName);
			// $this->rmDir("../images/".$categorieName);
		}
		public function addCategorie($categorieName){
			$req = 'INSERT into categories values (\''.$categorieName.'\')';
			$this->db->query($req);
		}

		public function addProduct($Product, $categorieName){
			$id = $Product->getId();
			$nom = $Product->getNom();
			$modele = $Product->getModele();
			$marque = $Product->getMarque();
			$description =$Product->getDescription();
			$photo = $Product->getPhoto();
			$disponibilite = $Product->getDisponibilite();
			$prix = $Product->getPrix();
			$format = $Product->getFormat();
			$req = 'insert into produits values (\''.$id.'\',\''.$nom.'\',\''.$modele.'\',\''.$marque.'\',\''.$description.'\',\''.$photo.'\'
			,\''.$prix.'\',\''.$format.'\')';
			$req2 = 'insert into appartient values (\''.$categorieName.'\',\''.$id.'\')';
			$this->db->query($req);
			$this->db->query($req2);

		}

		//************************************************************//
		//						ADD CATEGORIES 						  //
		//************************************************************//
		// public function addCategorie($categorieName,$tabAttribut,$com){
		// 	$categorieName = $this->parseToConformSemantics($categorieName);
		// 	$categorieName = $this->removeAccents($categorieName);
		// 	$classFile = fopen("../modele/classes/".$categorieName.".class.php", "w+");
		// 	if($classFile==false)
		// 		die("Can not creat file");
		// 	fputs($classFile, $this->HowRobertGenerateClassCode($categorieName,$tabAttribut,$com));
		// 	fclose($classFile);
		// 	//********* Add Init File********//
		// 	$initFile = fopen("../modele/txt/".$categorieName, "w+");
		// 	if($initFile==false)
		// 		die("Can not creat einit file");
		// 	fclose($initFile);
		//
		// 	//********* Inculde generation********//
		// 	$includeFile = fopen("../modele/classes/include.php", "r+");
		// 	if($includeFile==false)
		// 		die("Can not creat einit file");
		// 	fseek($includeFile,-2,SEEK_END);
		// 	fputs($includeFile, $this->addIncludeToDAO($categorieName));
		// 	fclose($includeFile);
		// 	//********* Image Folder********//
		// 	if (!mkdir('../modele/images/'.$categorieName, 0777, true)) {
	  //   		die('Echec lors de la création du répertoires...');
		// 	}
		// 	//********* Add Table ********//
		// 	$this->creatTable($categorieName,$tabAttribut);
		// 	return 0;
		//
		// }

		private function creatTable($categorieName,$tabAttribut){
			$startReq = 'CREATE TABLE ';
			$corpReq = "(";
			for ($i=0; $i < sizeof($tabAtribut) ; $i++) {
				$tabAtribut[$i] = $this->parseToConformSemantics($tabAtribut[$i]);
				$corpReq = $corpReq.$tabAtribut[$i]." STRING, ";
			}
			$corpReq = substr($corpReq, 0, -1);
			$req = $startReq.$categorieName." ".$corpReq.")";
			var_dump($req);
			$this->db->query($startReq.$categorieName.$corpReq.")");
		}

		private function addIncludeToDAO($categorieName){
			$endl = "\n";
			$tab = "\t";
			$include = $tab."include '".$categorieName.".class.php';".$endl."?>";
			return $include;
		}

		/*private function HowRobertGenerateClassCode ($categorieName,$tabAttribut,$com){
            $categorieName = $this->parseToConformSemantics($categorieName);
            $endl = "\n";
			$tab = "\t";
			$phpStart = "<?php".$endl;
			$phpEnd = "?>";
			$droit = "public ";
			$include = $tab."require_once('../modele/classes/generique.class.php');".$endl.$endl;
			$classHeader = $tab."class ".$categorieName." extends Generique {".$endl;
			$classFooter = $tab."}".$endl;
			$attributs = "";
			$Comment = "/*".$endl.$com.$endl."*//*".$endl;
			$__constructAtributs = '$id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format,';
			$__constructInitAt = $tab.'parent::__construct($id,$nom,$modele,$marque,$description,$photo,$disponibilite,$prix,$format);'.$endl;
            $__construct = "public function __construct(";
            $getter ="";
            $gettAll = "public function getAll(){".$endl;

            for ($i=0; $i < sizeof($tabAtribut) ; $i++) {
					$tabAtribut[$i] = $this->parseToConformSemantics($tabAtribut[$i]);
					$attributs = $attributs.$tab.$tab.$tab.$droit."$".$tabAtribut[$i].";".$endl;
					$__constructInitAt = $__constructInitAt.$tab.$tab.'$this->'.$tabAtribut[$i]." = $".$tabAtribut[$i].";".$endl;
	                $__constructAtributs = $__constructAtributs."$".$tabAtribut[$i].",";
	                $getter = $getter.$endl.$tab.$droit."function "."get".$this->upperFirstCase($tabAtribut[$i])."(){".$endl.$tab.$tab."return "
	                .'$this->'.$tabAtribut[$i].";".$endl.$tab."}";
	            }
            }
			$__constructAtributs = substr($__constructAtributs, 0, -1);
			$__construct = $tab.$__construct.$__constructAtributs."){".$endl.$tab.$__constructInitAt;



			$classCode = $phpStart.$Comment.$include.$classHeader.$attributs.$__construct.$classFooter.$getter.$endl.$classFooter.$phpEnd;

			return $classCode;
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
 		}*/


		private function parseToConformSemantics($string){//magic
			$string = lcfirst($string);
			$string = explode(" ", $string);
			$categorieName = "";
			for ($i=0; $i < sizeof($string); $i++) {
				if($i != 0 && !ctype_upper($string[$i - 1]))
					$string[$i] = ucfirst($string[$i]);
				$categorieName = $categorieName.$string[$i];
			}
			//var_dump($categorieName);
			return $this->removeAccents($categorieName);
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

	// public function addProduct($className,$Product){
	// 	$className = $this->parseTConformSemantics($className);
	//
	// 	$id = $Product->getId();
	// 	$nom = $Product->getNom();
	// 	$model = $Product->getModele();
	// 	$marque = $Product->getMarque();
	// 	$description =$Product->getDescription();
	// 	$photo = $Product->getPhoto();
	// 	$disponibilite = $Product->getDisponibilite
	// 	$prix = $Product->getPrix();
	// 	$format = $Product->getFormat();
	//
	//
	// 	//Incrementation de l'id
	// 	$reqid = "SELECT MAX(id) AS id FROM ".$className;
	// 	$resid = $this->db->query($reqid);
	// 	$resutlt = $res->fetch(PDO::FETCH_ASSOC)["id"];
	// 	$id = (int)$resutlt+1;
	//
	// 	//requête d'ajout
	// 	$req = 'INSERT INTO '.$className."(";
	// 	$req = $req."'".$id."'".",";
	//         //construire requete bdd
	//         for ($i=0; $i < sizeof($tabAtribut); $i++) {
	//
	//         	$getter = $this->parseToConformSemantics("get ".$tabAtribut[$i]);
	//            	$req = $req."'".$Object->$getter."',";
	//         }
	//
	//         $req = substr($req, 0, -1);
	// 	$req = $req.")";
	//         $this->db->query($req);
		/*
			$serialize="";

	//	var_dump($tabAtribut);
					for ($i=0; $i < sizeof($tabAtribut); $i++){
					$serialize = $serialize."'".$tabAtribut[$i]."'".',';
					}

					$serialize = substr($serialize, 0, -1);

					var_dump($serialize);

			eval('$Object->__construct('. $serialize.')');
			//$Object->__construct(eval($serialize));

			var_dump($Object);

					//Récupere le dernier id de la table et l'incrementer
					//$req = 'SELECT * FROM '.$className.' ORDER BY id RAND() LIMIT 0 1';

		$reqid = "SELECT MAX(id) AS id FROM ".$className;
		$resid = $this->db->query($reqid);
		$resutlt = $res->fetch(PDO::FETCH_ASSOC)["id"];
		$id = (int)$resutlt+1;

		$req = 'INSERT INTO '.$className."(";
		$req = $req."'".$id."'".",";
					//construire requete bdd
					for ($i=0; $i < sizeof($tabAtribut); $i++) {

						$getter = $this->parseToConformSemantics("get ".$tabAtribut[$i]);
							var_dump($getter);
							$req = $req."'".$Object->$getter."',";
					}

					$req = substr($req, 0, -1);
		$req = $req.")";
					$this->db->query($req);
					*/
	//}

?>
