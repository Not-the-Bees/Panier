<?php 

require_once __DIR__.'/Model.php';

class User extends Model {
	
	public static function connect($login, $password) {
	
		$pdo_statement = Model::createStatement('SELECT * FROM user WHERE login=:login AND password=:password');
		$pdo_statement->execute(array('login' => $login,
			'password' => $password));

		$result = $pdo_statement->fetch();

		return $result;
	}


	public static function create($login, $password, $email) {

		$pdo_statement = Model::createStatement('INSERT INTO user (login, password, email) VALUES (:login, :password, :email)');

		if (
		  $pdo_statement &&
		  $pdo_statement->bindParam(':login', $login) &&
		  $pdo_statement->bindParam(':password', $password) &&
		  $pdo_statement->bindParam(':email', $email) &&
		  $pdo_statement->execute()
	 	) {
		 	return $pdo_statement;
		 }
	}


	public static function delete($user_id) {

		$pdo_statement = Model::createStatement('DELETE FROM user WHERE user_id=:user_id');
		
		if (
	    $pdo_statement &&
	    $pdo_statement->bindParam(':user_id', $user_id, PDO::PARAM_INT) &&
	    $pdo_statement->execute()
	  ) {
	    return $pdo_statement;
  	}
	}
}

