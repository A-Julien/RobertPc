<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="accueil.css"/>
    <title>Accueil RobertPC</title>
  </head>

  <body>
    <header>
      <h1>Robert PC.net</h1>
      <form id="recherche" method="post">
        <input name="saisie" type="text" placeholder="Mots-Clefs..." required />
        <input class="loupe" type="submit" value="" />
      </form>
    </header>

    <div id="containerListeCat">
      <ul id="listeCat">
          <?php
            require_once('../controleur/controleur.php');

            $tabCat = getCat();
            foreach ($tabCat as $key => $value) {
              echo '<li>
                <form action="liste.php" method="post">
                  <p>
                    <input type="hidden" name="categorie" value="'.$key.'">
                    <input class="bouton" type="submit" value="'.$value.'">
                  </p>
                </form>
              </li>';
            }
          ?>
      </ul>
    </div>

    <div id="whiteBox">
      <h3>Bienvenue sur RobertPC.net</h3>
      <article id="articleTop">
       <img src="">
      </article>
      <article class="article">
        
      </article>
      <article class="article">
        
      </article>
      <article class="article">
        
      </article>
      <article class="article">
        
      </article>
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