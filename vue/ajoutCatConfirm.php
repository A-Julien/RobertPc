<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Confirmation Ajout Catégorie</title>
  </head>
  <body>
    <?php global $tabCreaCat;
    global $newCategorie;
    echo '<h1>'.$newCategorie.'</h1>';
    foreach ($tabCreaCat as $key => $value) {
      echo $key.':'.$value.'</br>';
    }?>
  </body>
</html>
