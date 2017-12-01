<?php

session_start();

require __DIR__.'/models/Product.php';

$products = Product::browse();

require __DIR__.'/views/products/browse.php';

