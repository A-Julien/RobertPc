<!DOCTYPE html>
<html>
<?php require_once('../controleur/controleur.php'); ?>
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
          require_once('../controleur/controleur.php');

          $tabCat = getCat();
          foreach ($tabCat as $key => $value) {
            echo '<li>
              <form action="liste.php" method="post">
                <p>
                  <input type="hidden" name="categorie" value="'.$key.'">
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
          $categorie = htmlentities($_POST['categorie']);
          $listeCat = getListe($categorie);
          for ($i=0; $i < sizeof($listeCat) ; $i++) {
            printf("<li><a href=\"produit.php?id=".$listeCat[$i]->id."&categorie=".$categorie."\"><img src=\"\" alt=\"\" />");
            printf($listeCat[$i]->marque." ".$listeCat[$i]->nom." ".$listeCat[$i]->modele);
            printf("</a></li>");
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
