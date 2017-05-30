<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Confirmation suppression produit</title>
  </head>
  <body>
    <?php global $gen;
    echo 'Suppression du produit '.$gen->nom;
    echo '</br>';
    echo '<form action="../controleur/controleur.php" method="post">
      <p>
        <input type="hidden" name="action" value="admin">
        <input class="bouton" type="submit" value="Retour au menu admin">
      </p>' ?>

  </body>
</html>
