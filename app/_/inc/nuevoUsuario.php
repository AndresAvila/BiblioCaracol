<?php
	$username = checkInput($_POST['username']);
	$mail = checkInput($_POST['mail']);
	$pass = password_hash(checkInput($_POST['password']),PASSWORD_DEFAULT);
	$query = $db->query("INSERT INTO Usuarios (Nombre, Mail, Contrasena) VALUES ('$username', '$mail', '$pass')");

	if($query){
		$_SESSION['uid'] = $db->insert_id;
		$_SESSION['username'] = $username;
	}
