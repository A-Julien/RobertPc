<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="../vue/produit.css"/>
    <title>Liste RobertPC</title>
  </head>
  <body>
    <header>
      <a href="../controleur/controleur.php"><h1>Robert PC.net</h1></a>
      <form id="recherche" action="/search" method="post">
        <input type="hidden" name="action" value="getSearch">
        <input id="barre" name="saisie" type="text" placeholder="Recherche par Mots-Clefs" required />
        <input id="loupe" type="submit" value="Go!" />
      </form>
    </header>

    <div id="containerListeCat">
      <ul id="listeCat">
          <?php
          global $data;
            foreach ($data as $key => $value) {
              echo '<li>
                <form action="../controleur/controleur.php" method="post">
                  <p>
                    <input type="hidden" name="categorie" value="'.$value['nomMenu'].'">
                    <input type="hidden" name="action" value="getListe">
                    <input class="bouton" type="submit" value="'.$value['nomMenu'].'">
                  </p>
                </form>
              </li>';
            }
          ?>
      </ul>
    </div>

    <div id="whiteBox">
      <ul>
        <?php
          global $id;
          global $categorie;
          global $produit;

          printf("<article id=\"article\">");
          printf("<img src=\"../modele/images/".$produit->id.".png\" alt=\"photo produit\" id=\"photo\"/>");
          printf("<h3>".$produit->marque." ".$produit->nom." ".$produit->modele."</h3>");
          printf("<p>".$produit->description."</p>");
          if ($produit->disponibilite == true) {
            printf("<h4>Disponible !</h4>");
          }
          else {
            printf("<h4>Indisponible !</h4>");
          }
          printf("<p>Prix : ".$produit->prix." euros</p>");
          printf("</article>");
         ?>
      </ul>
    </div>

    <footer>
        <article id="info">
          <p>Robert Blop</p>
          <p>38000 Grenoble</p>
        </article>
        <p id="mentions">Mentions légales</p>
        <article id="copyright">
          <p>RobertPC</p>
          <p>Tous droits réservés</p>
        </article>

    </footer>

  </body>
</html>
