<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="../vue/liste.css"/>
    <title>Liste RobertPC</title>
  </head>
  <body>
    <header>
      <a href="../controleur/controleur.php"><h1>Robert PC.net</h1></a>
      <form id="recherche" method="post">
        <input name="saisie" type="text" placeholder="Mots-Clefs..." required />
        <input class="loupe" type="submit" value="" />
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
          //$categorie = htmlentities($_POST['categorie']);
          global $tabListe;
          global $categorie;
          for ($i=0; $i < sizeof($tabListe) ; $i++) {
            printf("<li class=\"article\"><form action=\"../controleur/controleur.php\" method=\"post\"><img src=\"../modele/images/".$tabListe[$i]->id.".png\" alt=\"Salut\" width=\"250\" height=\"200\" />");
            printf("<input type=\"hidden\" name=\"action\" value=\"getObj\">");
            printf("<input type=\"hidden\" name=\"id\" value=".$tabListe[$i]->id.">");
            printf("<input type=\"hidden\" name=\"categorie\" value=".$categorie.">");
            printf("<div id=\"titre\">".$tabListe[$i]->marque." ".$tabListe[$i]->nom." ".$tabListe[$i]->modele."</div>");
            printf("<input class=\"boutons\" type=\"submit\" value=\"En savoir plus\">");
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
        <p id="mentions">Mentions légales</p>
        <article id="copyright">
          <p>RobertPC</p>
          <p>Tous droits réservés</p>
        </article>

    </footer>

  </body>
</html>
