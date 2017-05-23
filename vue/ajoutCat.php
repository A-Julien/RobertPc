<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajouter une catégorie</title>
  </head>
  <body>
    <?php
      require_once("../controleur/controleur.php");
      require_once("../modele/classes/Generique.class.php");
    ?>
    <form action="../controleur/ajoutCat.php" method="post">
        <p>
          <label for="newCategorie">Nom de la catégorie à créer :</label>
          <input type="text" name="cat" id ="newCategorie" required>
          </br>
          <?php
            $classeACreer = new Generique();
            foreach ($classeACreer as $key => $value) {
              printf("<fieldset id=".$key.">
                <label for=\"attribute\">".$key." : </label>
                <legend>Attribut de la catégorie :</legend>
                <input type=\"radio\" name=".$key." value=\"oui\" id=\"option1\" checked >
                <label for=\"option1\">oui</label>
                <input type=\"radio\" name=".$key." value=\"non\" id=\"option2\" >
                <label for=\"option2\">non</label>
              </fieldset>");
            }
           ?>
        </p>
    </form>
  </body>
</html>
