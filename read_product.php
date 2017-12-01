<?php

require __DIR__.'/models/Product.php';
require __DIR__.'/models/Cart.php';

$product = null;

if (isset($_GET['id'])) {
	$id = $_GET['id'];
  $product = Product::read($id);
}

require __DIR__.'/views/products/read.php';

