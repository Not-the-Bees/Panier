<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Parcourir mon panier</title>
  </head>

  <body>
    <h1>Mon Panier</h1>
      <ul>
        <?php
          foreach ($products as $article):
        ?>
        <li>
          <a href="read_product.php?id=<?php echo $article['id']; ?>">
            <?php echo $article['title']; ?>
          </a>
        </li>
      <?php endforeach; ?>
      </ul>
      <a href="browse_product.php">Retour au magasin</a>
  </body>
</html>