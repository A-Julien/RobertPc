<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Suppression produit</title>
  </head>
  <body>
    <?php global $categorie;
    echo '<h1>Produits de la catégorie '.$categorie.'</h1>';
    ?>
    <ul>
      <?php
        global $tabListe;
        for ($i=0; $i < sizeof($tabListe) ; $i++) {
          printf("<li class=\"article\"><form action=\"../controleur/controleur.php\" method=\"post\">");
          printf("<input type=\"hidden\" name=\"action\" value=\"supprObj\">");
          printf("<input type=\"hidden\" name=\"id\" value=".$tabListe[$i]->id.">");
          printf("<input type=\"hidden\" name=\"categorie\" value=".$categorie.">");
          printf("<div id=\"titre\">".$tabListe[$i]->marque." ".$tabListe[$i]->nom." ".$tabListe[$i]->modele."</div>");
          printf("<input class=\"boutons\" type=\"submit\" value=\"Supprimer\">");
          printf("</form></li>");
        }
       ?>
    </ul>
  </body>
</html>
