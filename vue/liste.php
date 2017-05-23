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
      Coucou
    </nav>

    <div id="containerListeCat">
      <ul id="listeCat">
        <?php  ?>
      </ul>
    </div>

    <div id="whiteBox">
      <ul>
        <?php
          $categorie = htmlentities($_GET['categorie']);
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
      Coucou
    </footer>

  </body>
</html>
