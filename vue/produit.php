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
          $id = htmlentities($_GET['id']);
          $categorie = htmlentities($_GET['categorie']);
          $produit = getObj($id, $categorie);

          printf("<article class=\"\">");
          printf("<img src=\"\" alt=\"\" />");
          printf("<h3>".$produit->marque." ".$produit->nom." ".$produit->modele."</h3>");
          printf("<p>".$produit->description."</p>");
          if ($produit->disponibilite == true) {
            printf("<h4>Disponible !</h4>");
          }
          else {
            printf("<h4>Indisponible !</h4>");
          }
          printf("<p>Prix : ".$produit->prix." euros</p>");
          printf("</article>");
         ?>




      </ul>
    </div>

    <footer>
      Coucou
    </footer>

  </body>
</html>
