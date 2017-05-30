<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mode Administrateur</title>
  </head>
  <body>
    <h1>Bienvenue dans le mode administrateur</h1>
    <p>
      <form action="../controleur/controleur.php" method="post">
        <p>
          <input type="hidden" name="action" value="supprimerProduit">
          <input type="submit" value="Supprimer un produit">
        </p>
      </form>
      <form action="../controleur/controleur.php" method="post">
        <p>
          <input type="hidden" name="action" value="choixProduit">
          <input type="submit" value="Ajouter un produit">
        </p>
      </form>
      <form action="../controleur/controleur.php" method="post">
        <p>
          <input type="hidden" name="action" value="supprimerCat">
          <input type="submit" value="Supprimer une catégorie de produit">
        </p>
      </form>
      <form action="../controleur/controleur.php" method="post">
        <p>
          <input type="hidden" name="action" value="ajouterCat">
          <input type="submit" value="Ajouter une catégorie de produit">
        </p>
      </form>
    </p>

  </body>
</html>
