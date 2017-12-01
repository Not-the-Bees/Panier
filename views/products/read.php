<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      Lire
      <?php if ($product): ?>
          <?php echo '- ' . $product['title']; ?>
      <?php endif; ?>
    </title>
  </head>
  <body>
    <?php if ($product): ?>
      <h1><?php echo $product['title']; ?></h1>
      <p>Description du produit : <br/><?php echo $product['description']; ?></p>
      <aside>
        <dl>
          <dt>Prix du produit:</dt>
          <dd><?php echo $product['price']; ?></dd>
          <dt>Actuellement en stock :</dt>
          <dd><?php echo $product['quantity']; ?></dd>
        </dl>
      </aside>
    <?php endif; ?>
    <ul>
      <li><a href="add_cart.php?id=<?php echo $product['id']; ?>">Ajouter au panier</a></li>
      <li><a href="browse_product.php">retour à l'index</a></li>
    </ul>
  </body>
</html>
