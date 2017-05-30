<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      </title>
  </head>
  <body>
    <h1>Choisir la catégorie à supprimer :</h1> <?php
  global $data;
    foreach ($data as $key => $value) {
      echo '<li>
        <form action="../controleur/controleur.php" method="post">
          <p>
            <input type="hidden" name="categorie" value="'.$value['nomMenu'].'">
            <input type="hidden" name="action" value="choixSupprCat">
            <input class="bouton" type="submit" value="'.$value['nomMenu'].'">
          </p>
        </form>
      </li>';
    }
  ?>

  </body>
</html>
