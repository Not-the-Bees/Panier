<?php 

session_start();

require __DIR__.'/models/Cart.php';


if (isset($_GET['id'])) {
	$id_product = $_GET['id'];
	$product = Cart::add($id_product);
	header('location : browse_cart.php');
}

