<?php 

session_start();

require __DIR__.'/models/Cart.php';

$products = Cart::browse();

require __DIR__.'/views/cart/browse_view.php';