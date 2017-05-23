<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="accueil.css"/>
    <title>Liste RobertPC</title>
  </head>
  <body>
    <header>
      Coucou
    </header>

    <nav id="recherche">
      <form id="recherche" method="post">
        <input type="text" name="saisie" placeholder="Recherche par Mots-Clefs" required>
        <input type="submit" value="">
      </form>
    </nav>

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
                <input type="submit" value="'.$value.'">
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
          //$categorie = htmlentities($_POST['categorie']);
          global $tabListe;
          global $categorie;
          for ($i=0; $i < sizeof($tabListe) ; $i++) {
            printf("<li><form action=\"../controleur/controleur.php\" method=\"post\"><img src=\"../modele/images/".$categorie."/".$tabListe[$i]->id.".png\" alt=\"Salut\" width=\"250\" />");
            printf("<input type=\"hidden\" name=\"action\" value=\"getObj\">");
            printf("<input type=\"hidden\" name=\"id\" value=".$tabListe[$i]->id.">");
            printf("<input type=\"hidden\" name=\"categorie\" value=".$categorie.">");
            printf($tabListe[$i]->marque." ".$tabListe[$i]->nom." ".$tabListe[$i]->modele);
            printf("<input type=\"submit\" value=\"En savoir plus\">");
            printf("</form></li>");
          }
         ?>
      </ul>
    </div>

    <footer>
      <article id="info">
        <p>Robert Blop</p>
        <p>38000 Grenoble</p>
      </article>
      <p>Mentions légales</p>
      <article>
        <p>RobertPC</p>
        <p>Tous droits réservés</p>
      </article>
    </footer>

  </body>
</html>
