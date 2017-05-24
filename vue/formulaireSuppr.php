<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire Ajout Produit</title>
  </head>
  <body>
    <header>
      <h1>Ajout d'un Produit :</h1>
    </header>

    <form action="../controleur/controleur.php" method="post">
      <fieldset id="categorie">
      <legend>Choisissez la catégorie du produit à supprimer :</legend>
        <select name="categorie">
          <option value="carteMere">Carte Mère</option>
          <option value="carteGraphique">Carte Graphique</option>
          <option value="alimentation">Alimentation</option>
          <option value="processeur">Processeur</option>
          <option value="memoire">Mémoire</option>
        </select>
    </fieldset>
    <p>
      <input type="hidden" name="action" value="suppr">
      <input type="submit" id="confirmation" value="Valider">
    </p>
    </form>
  </body>
</html>
