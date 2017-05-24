<?php
	function Generate ($fileName,$className,$nbAttribut,$tabAttribut,$com){
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

		for ($i=0; $i < $nbAttribut; $i++) { 
			$attributs = $attributs.$tab.$tab.$droit.$tabAttribut[$i].$endl;
		}
		//Création du texte formaté
		$texte = $phpStart.$Comment.$include.$classHeader.$attributs.$classFooter.$phpEnd;
		//Création du fichier de la classe
		$manip = fopen($className.".class.php", "w+");
		if($manip==false)
			die("Can not creat file");
		fputs($manip, $texte);
	}

	Generate($_GET['fileName'],$_GET['className'],$_GET['nbAttribut'],$_GET['tabAttribut'],$_GET['com']);
	/*
http://www-etu-info.iut2.upmf-grenoble.fr/~alaimoj/RobertPc/modele/classes/RobertGenerate.php?fileName=dfds&className=qsd&nbAttribut=2&tabAttribut[0]=ezf&tabAttribut[1]=fdsf&com=cette%20classe%20est%20la%20clasee%20des%20disques%20dures
	*/
?>
