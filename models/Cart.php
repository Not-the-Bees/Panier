<?php 

require_once __DIR__.'/Model.php';


class Cart extends Model {

	public static function browse() {
		$pdo_statement = self::createStatement('SELECT * FROM cart WHERE deleted_at IS NULL');
		$products = array();
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
		 	echo "Article ajouté !";
	  } else {
	  	echo "Ajout non effectué ;(";
	  }
		return $pdo_statement;
	}
	







	
	
	public static function edit($id_product, $quantity) {
		$product = null;
		$pdo_statement = self::createStatement('UPDATE cart SET quantity=:quantity WHERE id_product=:id_product');

		if (
		  $pdo_statement &&
		  $pdo_statement->bindParam(':id_product', $id_product, PDO::PARAM_INT) &&
		  $pdo_statement->bindParam(':title', $title) &&
		  $pdo_statement->bindParam(':description', $description) &&
		  $pdo_statement->bindParam(':price', $price) &&
		  $pdo_statement->bindParam(':quantity', $quantity) &&
		  $pdo_statement->execute()
		) {
		  $product = $pdo_statement->fetch(PDO::FETCH_ASSOC);
		  return $product;
		}

	}

	public static function delete($id) {
		$pdo_statement = self::createStatement('UPDATE cart SET deleted_at = CURRENT_TIMESTAMP() WHERE id=:id');
	
		if (
	    !$pdo_statement ||
	    !$pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) ||
	    !$pdo_statement->execute()
	  ) {
	    return $pdo_statement;
	  }
	}
}