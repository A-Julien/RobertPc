<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Suppression d'un article</title>
  </head>
  <body>
    <?php require_once('../controleur/controleur.php'); ?>
    <h1>Supprimer un produit :</h1>
    <?php
      $tabCat = getCat();
      foreach ($tabCat as $key => $value) {
        echo '<li>
          <form action="formulaireSuppr.php" method="post">
            <p>
              <input type="hidden" name="categorie" value="'.$key.'">
              <input type="submit" value="'.$value.'">
            </p>
          </form>
        </li>';
      }
    ?>
  </body>
</html>
