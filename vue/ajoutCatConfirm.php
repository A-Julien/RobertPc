<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Confirmation Ajout Catégorie</title>
  </head>
  <body>
    <?php global $newCategorie;
    echo '<h1>'.$newCategorie.'</h1>';
    echo '</br>';
    echo '<form action="../controleur/controleur.php" method="post">
      <p>
        <input type="hidden" name="action" value="admin">
        <input class="bouton" type="submit" value="Retour au menu admin">
      </p>'?>
  </body>
</html>
