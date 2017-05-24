<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="../vue/accueil.css"/>
    <title>Accueil RobertPC</title>
  </head>

  <body>
    <header>
      
    <a href="../controleur/controleur.php"><h1>Robert PC.net</h1></a>
      <form id="recherche" action="/search" method="post">
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
                    <input type="hidden" name="categorie" value="'.$key.'">
                    <input type="hidden" name="action" value="getListe">
                    <input class="bouton" type="submit" value="'.$value.'">
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
    		global $dataSearch;
    		foreach ($dataSearch as $key => $value) { 
    			printf("<li class=\"article\">
    				<div id=\"titre\">".$dataSearch[$i]->marque." ".$dataSearch[$i]->nom." ".$dataSearch[$i]->modele."</div>");
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