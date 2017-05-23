<?php
	function Generate ($className,$tabAttribut,$com){
		$endl = "\n";
		$tab = "\t";
		$phpStart = "<?php".$endl;
		$phpEnd = "?>";
		$droit = "public ";
		$include = $tab."require_once('Generique.class.php');".$endl.$endl;
		$classHeader = $tab."class ".$className." extends Generique {".$endl;
		$classFooter = $tab."}".$endl;
		$attributs = "";
		$Comment = "/*".$endl.$com.$endl."*/".$endl;

		$className = parseToConformSemantics($className);
		for ($i=0; $i < sizeof($tabAttribut); $i++) { 
			$attributs = $attributs.$tab.$tab.$droit.$tabAttribut[$i].$endl;
		}
		//Création du texte formaté
		$texte = $phpStart.$Comment.$include.$classHeader.$attributs.$classFooter.$phpEnd;
		//Création du fichier de la classe
		$manip = fopen($className.".class.php", "w+");
		if($manip==false)
			die("Can not creat file");
		fputs($manip, $texte);
		fclose($manip);

		$initFile = fopen("../txt/".$className, "w+");
		if($initFile==false)
			die("Can not creat init file");
		fclose($initFile);

		if (!mkdir('../images/'.$className, 0777, true)) {
    		die('Echec lors de la création du répertoires...');
		}
	}

	function parseToConformSemantics($string){
			$string = lcfirst($string);
			$string = explode(" ", $string);
			$className = "";
			for ($i=0; $i < sizeof($string); $i++) { 
				if($i != 0 && !ctype_upper($string[$i - 1]))
					$string[$i] = ucfirst($string[$i]);
				$className = $className.$string[$i];
			}
			//var_dump($className);
		return $className;
	}

	//parseToConformSemantics($_GET['name']);
	
	//Generate($_GET['className'],$_GET['tabAttribut'],$_GET['com']);
	/*
http://www-etu-info.iut2.upmf-grenoble.fr/~alaimoj/RobertPc/modele/classes/RobertGenerate.php?fileName=dfds&className=qsd&nbAttribut=2&tabAttribut[0]=ezf&tabAttribut[1]=fdsf&com=cette%20classe%20est%20la%20clasee%20des%20disques%20dures
	*/
?>
