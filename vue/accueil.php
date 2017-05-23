<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="accueil.css"/>
    <title>Accueil RobertPC</title>
  </head>
  <body>
    <header>
      Coucou
    </header>

    <nav>
      <form id="recherche" method="post">
        <input type="text" name="saisie" placeholder="Recherche par Mots-Clefs" required>
        <input type="submit" value="">
      </form>
    </nav>

    <div id="containerListeCat">
      <ul id="listeCat">
          <?php
          global $data;
            foreach ($data as $key => $value) {
              echo '<li>
                <form action="../controleur/controleur.php" method="post">
                  <p>
                    <input type="hidden" name="categorie" value="'.$key.'">
                    <input type="hidden" name="action" value="getListe">
                    <input type="submit" value="'.$value.'">
                  </p>
                </form>
              </li>';
            }
          ?>
      </ul>
    </div>

    <div id="whiteBox">
      Coucou
    </div>

    <footer>
        <article id="info">
          <p>Robert Blop</p>
          <p>38000 Grenoble</p>
        </article>
        <p>Mentions légales</p>
        <article>
          <p>RobertPC</p>
          <p>Tous droits réservés</p>
        </article>

    </footer>

  </body>
</html>
