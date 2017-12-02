<?php 

require __DIR__ . '/models/Product.php';
require __DIR__ . '/models/Cart.php';

$articles = Cart::browse();
$products = [];

foreach ($articles as $article):
	$products[] = Product::read($article['id_product']);
endforeach;


require __DIR__.'/views/cart/browse_view.php';