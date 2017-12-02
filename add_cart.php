<?php 

session_start();

require __DIR__ . '/models/Cart.php';
require __DIR__ . '/models/Product.php';

if (isset($_GET['id'])) {
	$id_product = $_GET['id'];
	$product = Cart::add($id_product);
}

