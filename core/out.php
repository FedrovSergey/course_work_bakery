<?php

	if (isset($_COOKIE['name'])){
		unset($_COOKIE['name']);
		unset($_COOKIE['surname']);
		unset($_COOKIE['telephone']);
		unset($_COOKIE['admin']);
		unset($_COOKIE['email']);
		unset($_COOKIE['pass']);
		setcookie('name', '', time() - 3600, '/');
		setcookie('surname', '', time() - 3600, '/');
		setcookie('telephone', '', time() - 3600, '/');
		setcookie('admin', '', time() - 3600, '/');
		setcookie('email', '', time() - 3600, '/');
		setcookie('pass', '', time() - 3600, '/'); // empty value and old timestamp
		header('Location: /main.php');
	}

?>