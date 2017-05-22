<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajout d'un Produit</title>
    <link rel="stylesheet" type="text/css" href="add.css" media="screen"/>
  </head>
  <body>
    <?php
    $cat = htmlentities($_GET['categorie']);
    ?>
    <header>
      <h1><?php echo "Ajout d'un(e) $cat :"; ?></h1>
    </header>
    <form action="../controleur/ajoutBD.php" method="get">
      <fieldset>
        <legend>Infos Principales</legend>
          <label for="marque">Marque :</label>
          <input type="text" name="brand" id ="marque" required>
          <br>
          <label for="modele">Modèle :</label>
          <input type="text" name="model" id ="modele" required>
          <br>
          <label for="prix">Prix :</label>
          <input type="text" name="price" id ="prix" required>
          <br>
          <label for="format">Format :</label>
          <input type="text" name="format" id ="format" required>
          <br>
          <label for="pdv">Point de Vente :</label>
          <input type="text" name="pointDeVente" id ="pdv" required>
          <br>
      </fieldset>
      <fieldset>
        <legend>Description</legend>
        <textarea id="textdesc" name="description" rows="12"></textarea>
      </fieldset>
      <fieldset>
        <legend>Photo :</legend>
        <label for="photo">Nom photo :</label>
        <input type="text" name="tof" id ="photo" required>
        <br>
      </fieldset>
      <fieldset id="dispo">
        <legend>Disponibilité</legend>
        <input type="radio" name="OPT" value="oui" id="option1" checked >
        <label for="option1">oui</label>
        <input type="radio" name="OPT" value="non" id="option2" >
        <label for="option2">non</label>
      </fieldset>
      <?php
        printf("<fieldset>");
        switch ($cat) {
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
         <input type="submit" id="confirmation" value="Valider">
       </p>
    </form>
  </body>
</html>
