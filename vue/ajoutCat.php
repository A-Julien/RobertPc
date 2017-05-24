<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajouter une catégorie</title>
  </head>
  <body>
    <form action="../controleur/controleur.php" method="post">
        <p>
          <label for="newCategorie">Nom de la catégorie à créer :</label>
          <input type="text" name="cat" id ="newCategorie" required>
          </br>
          <input type="button" name="ajoutAttr" value="+" onclick="ajout()">
          <p id="zoneAttr">
          </p>
        </p>
        <p>
          <input type="hidden" name="action" value="creerCat">
          <input type="submit" id="confirmation" value="Valider">
        </p>
    </form>
    <script src="../controleur/fonctionsAjoutCat.js"></script>
  </body>
</html>
