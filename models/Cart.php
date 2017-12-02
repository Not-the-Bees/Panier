<?php 

require_once __DIR__.'/Model.php';


class Cart extends Model {

	public static function browse() {
		$pdo_statement = self::createStatement('SELECT * FROM cart');
		if (
			$pdo_statement && 
			$pdo_statement->execute()
			) {
				$products = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
			}
			return $products;
	}

	public static function read($id_product) {
		$product = null;
		$pdo_statement = self::createStatement('SELECT * FROM cart WHERE id_product=:id_product');
		if (
  	$pdo_statement &&
  	$pdo_statement->bindParam(':id_product', $id_product, PDO::PARAM_INT) &&
  	$pdo_statement->execute()
		) {
  		$product = $pdo_statement->fetch(PDO::FETCH_ASSOC);
		}
  	return $product;
	}


	public static function add($id_product) {
		$pdo_statement = self::createStatement('INSERT INTO cart (id_product) VALUES (:id_product)');
		if (
		  $pdo_statement &&
		  $pdo_statement->bindParam(':id_product', $id_product, PDO::PARAM_INT) &&
		  $pdo_statement->execute()
		) {
		 	echo "Article ajouté !" . "<br/>";
		 	echo "<a href='browse_cart.php'>Mon panier</a>";
	  } else {
	  	echo "Ajout non effectué ;(";
	  }
		return $pdo_statement;

	}

	public static function delete($id) {
		$pdo_statement = self::createStatement("DELETE FROM cart WHERE id_product = '$id'");
		if (
			$pdo_statement &&
			$pdo_statement->execute()
		) {
			echo "Produit supprimé du panier";
		} else {
			echo "Suppression échouée ;(";
		}
		return $pdo_statement;
	}
}