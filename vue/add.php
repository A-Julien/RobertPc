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
        foreach ($gen as $attribute => $value) {
          echo '<label for='.$attribute.'>'.$attribute.' :</label>';
          echo '<input type="text" name="'.$attribute.'" id ="'.$attribute.'" required>';
          echo '<br>';
        }

        printf("<fieldset>");
        switch ($categorie) {
          case "Carte Mere":
            printf("<label for=\"nbProc\">Nombre de Processeurs :</label>
                    <input type=\"text\" name=\"nombreProcesseurs\" id =\"nbProc\" required>
                    <br>
                    <label for=\"ram\">RAM :</label>
                    <input type=\"text\" name=\"RAM\" id =\"ram\" required>
                    <br>");
            break;
          case "Carte Graphique":
            printf("<label for=\"freq\">Fréquence :</label>
                    <input type=\"text\" name=\"frequence\" id =\"freq\" required>
                    <br>
                    <label for=\"ram\">RAM :</label>
                    <input type=\"text\" name=\"RAM\" id =\"ram\" required>
                    <br>");
            break;
          case "Alimentation":
            printf("<label for=\"pow\">Puissance :</label>
                  <input type=\"text\" name=\"puissance\" id =\"pow\" required>
                  <br>");
            break;

          case "Processeur":
            printf("<label for=\"freq\">Fréquence :</label>
                    <input type=\"text\" name=\"frequence\" id =\"freq\" required>
                    <br>
                    <label for=\"nbCoeurs\">Nombre de Coeurs :</label>
                    <input type=\"text\" name=\"nombreCoeurs\" id =\"nbCoeurs\" required>
                    <br>");
            break;

          default:
            printf("<label for=\"freq\">Fréquence :</label>
                    <input type=\"text\" name=\"frequence\" id =\"freq\" required>
                    <br>
                    <label for=\"capa\">Capacité :</label>
                    <input type=\"text\" name=\"capacite\" id =\"capa\" required>
                    <br>");
            break;
        }
        printf("</fieldset>");
       ?>
       <p>
         <?php
            echo '<input type="hidden" name="categorie" value="'.$categorie'">';
          ?>
         <input type="hidden" name="action" value="ajouterProduit">
         <input type="submit" id="confirmation" value="Valider">
       </p>
    </form>
  </body>
</html>
