<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Confirmation Ajout Produit</title>
  </head>
  <body>
    <?php
    global $gen;
    global $categorie;
    echo "<h1> Ajout du produit ".$gen->marque." ".$gen->nom." ".$gen->modele."dans la categorie ".$categorie."</h1>";
    echo '</br>';
    echo '<form action="../controleur/controleur.php" method="post">
      <p>
        <input type="hidden" name="action" value="admin">
        <input class="bouton" type="submit" value="Retour au menu admin">
      </p>'
    ?>
  </body>
</html>
