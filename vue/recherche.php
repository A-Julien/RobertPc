<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="../vue/recherche.css"/>
    <title>Accueil RobertPC</title>
  </head>

  <body>
    <header>
      
    <a href="../controleur/controleur.php"><h1>Robert PC.net</h1></a>
      <form id="recherche" action="../controleur/controleur.php" method="post">
      	<input type="hidden" name="action" value="getSearch">
        <input id="barre" name="saisie" type="text" placeholder="Recherche par Mots-Clefs" required />
        <input id="loupe" type="submit" value="Go!" />
      </form>
    </header>

    <div id="containerListeCat">
      <ul id="listeCat">
          <?php
          global $data;
            foreach ($data as $key => $value) {
              echo '<li>
                <form action="../controleur/controleur.php" method="post">
                  <p>
                    <input type="hidden" name="categorie" value="'.$value['nomMenu'].'">
                    <input type="hidden" name="action" value="getListe">
                    <input class="bouton" type="submit" value="'.$value['nomMenu'].'">
                  </p>
                </form>
              </li>';
            }
          ?>
      </ul>
    </div>

    <div id="whiteBox">
    <ul>
    	<?php
    		global $tabListeSearch;
        global $categorie;
    		for ($i=0; $i < sizeof($tabListeSearch); $i++) {
          printf("<li id=\"article\"><form action=\"../controleur/controleur.php\" method=\"post\"><img src=\"../modele/images/".$tabListeSearch[$i]->id.".png\" alt=\"Error\" width=\"250\" height=\"200\" id=\"photo\" />");
          printf("<div id=\"titre\">".$tabListeSearch[$i]->marque." ".$tabListeSearch[$i]->nom." ".$tabListeSearch[$i]->modele."</div>");
          printf("<input type=\"hidden\" name=\"action\" value=\"getObj\">");
          printf("<input type=\"hidden\" name=\"id\" value=".$tabListeSearch[$i]->id.">");
          printf("<input type=\"hidden\" name=\"categorie\" value=".$categorie.">");
          printf("<input class=\"boutons\" type=\"submit\" value=\"En savoir plus\">");
          printf("</form></li>");
        }
		?>
	</ul>
    </div>

    
  </body>

  <footer>
        <article id="info">
          <p>Robert Blop</p>
          <p>38000 Grenoble</p>
        </article>
        <p id="mentions">Mentions légales</p>
        <article id="copyright">
          <p>RobertPC</p>
          <p>Tous droits réservés</p>
        </article>

    </footer>
</html>