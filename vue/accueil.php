<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="../vue/accueil.css"/>
    <title>Accueil RobertPC</title>
  </head>

  <body>
    <header>

    <a href="../controleur/controleur.php"><h1>Robert PC.net</h1></a>
      <form id="recherche" action="../controleur/controleur.php" method="post">
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
      <h3>Bienvenue sur RobertPC.net</h3>
      <p>Découvrez nos produits : carte mère, alimentation... Un grand choix disponible !</p>
      <article id="articleTop">
       <img src="../vue/cartemere.png" alt="Carte Mère">
      </article>
      <section id="reste">
        <article class="article">
          <img src="../vue/cartegraphique.png" alt="Carte Graphique">
        </article>
        <article class="article">
          <img src="../vue/alimentaion.png" alt="Alimentation">
        </article>
        <article class="article">
          <img src="../vue/memoire.png" alt="Memoire">
        </article>
        <article class="article">
          <img src="../vue/processeur.png" alt="Processeur">
        </article>
      </section>

    </div>

    <div id="admin">
      <form action="../controleur/controleur.php" method="post">
        <input type="hidden" name="action" value="admin">
        <input type="submit" value="Admin">
      </form>
    </div>


  </body>

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
</html>
