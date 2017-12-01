<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MAGASIN</title>
  </head>
  <body>
    <h1>Liste des produits</h1>
    <ul>
      <?php foreach ($products as $product): ?>
        <li>
          <a href="read_product.php?id=<?php echo $product['id']; ?>">
            <?php echo $product['title']; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
    <ul>
      <a href="browse_cart.php">Voir mon panier</a>
      <a href="index.html">Retour à l'accueil</a>
    </ul>
  </body>
</html>
