<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire Suppression Produit</title>
  </head>
  <body>
    <header>
      <h1>Suppression d'un Produit :</h1>
    </header>

    <form action="../controleur/controleur.php" method="post">
      <fieldset id="categorie">
      <legend>Choisissez la catégorie du produit à supprimer :</legend>
        <select name="categorie">
          <?php
            global $data;
            foreach ($data as $key => $value) {
              echo '<option value="'.$value['nomMenu'].'">'.$value['nomMenu'].'</option>';
            }
           ?>
        </select>
    </fieldset>
    <p>
      <input type="hidden" name="action" value="suppr">
      <input type="submit" id="confirmation" value="Valider">
    </p>
    </form>
  </body>
</html>
