<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajout d'un Produit</title>
    <link rel="stylesheet" type="text/css" href="add.css" media="screen"/>
  </head>
  <body>
    <?php
    global $categorie;
    ?>
    <header>
      <h1><?php echo "Ajout d'un(e) $categorie :"; ?></h1>
    </header>
    <?php
      global $gen;
    ?>
    <form action="../controleur/controleur.php" method="post">
      <fieldset>
      <?php
        foreach ($gen as $attribute=>$value) {
          echo '<label for='.$attribute.'>'.$attribute.' :</label>';
          echo '<input type="text" name="'.$attribute.'" id ="'.$attribute.'" required>';
          echo '<br>';
        }

        ?>
       <p>
         <?php
            echo '<input type="hidden" name="categorie" value="'.$categorie.'">';
          ?>
         <input type="hidden" name="action" value="ajouterProduit">
         <input type="submit" id="confirmation" value="Valider">
       </p>
    </form>
  </body>
</html>
