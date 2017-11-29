<?php

require __DIR__.'/models/User.php';


// Login
if (isset($_POST['connect'])) {

	if (isset($_POST['login'], $_POST['pwd'])) {
		$login_entered    = htmlspecialchars($_POST['login']);
		$password_entered = htmlspecialchars($_POST['pwd']);
		$user             = User::connect($login_entered, $password_entered);


		if ($user) {

			session_start ();

			$_SESSION['user_id'] = $user['user_id'];
			$_SESSION['login']   = $user['login'];
			$_SESSION['pwd']     = $user['password'];

			header ('location: browse_product.php');

		} else {
			echo '<body onLoad="alert(\'Membre non reconnu...\')">';
			header ('location: index.html');
		}

	} else {
		echo 'Veuillez entrer un nom d\'utilisateur et un mot de passe.';
	}
}


// Register 
if (isset($_POST['register'])) {

	if (isset($_POST['login'], $_POST['pwd'], $_POST['email'], $_POST['confirm_pwd'])) {
		$login_register        = htmlspecialchars($_POST['login']);
		$password_register     = htmlspecialchars($_POST['pwd']);
		$email_register        = htmlspecialchars($_POST['email']);
		$password_confirmation = htmlspecialchars($_POST['confirm_pwd']);
		
		if ($password_register === $password_confirmation) {
			$newUser = User::create($login_register, $password_register, $email_register);

			if ($newUser) {
				header('location: index.html');
			}
		} else {
			header('location: index.html');
		}
	} else {
		echo "Veuillez entrer un login/password/email valide";
	}
}