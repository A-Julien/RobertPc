<?php
		

		function($fileName,$className,$nbAttribut,$tabAttribut){
			$phpStart = "<?php\n";
			$phpEnd = "?>";
			$droit = "public";
			$include = "\trequire_once('Generique.class.php')";
			$classHeader = "\tclass ".$className."extends Generique {\n";
			$classFooter = "\t}\n";
			$attributs = "";
			
			for ($i=0; $i < nbAttribut; $i++) { 
				$attributs = $attributs."\t\t".$droit.$tabAttribut[i]."\n"
			}
			//Création du texte formaté
			$texte = $phpStart.$include.$classHeader.$attributs.$classFooter.$phpEnd;
			//Création du fichier de la classe
			$manip = fopen($className.".class.php", "w+");
			if($manip==false)
				die("fuck");
			fputs($manip, $texte);
		}
	}
?>