<?php

require __DIR__.'/models/Product.php';

$product = null;

if (isset($_GET['id'])) {
    $product = Product::read($_GET['id']);
}

require __DIR__.'/views/products/read.php';

