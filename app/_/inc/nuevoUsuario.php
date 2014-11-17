<?php
	$username = checkInput($_POST['username']);
	$mail = checkInput($_POST['mail']);
	$pass = password_hash(checkInput($_POST['password']),PASSWORD_DEFAULT);
	//echo "INSERT INTO Usuarios (NULL, '$username', '$mail', '$pass')";
	$query = $db->query("INSERT INTO Usuarios (NULL, '$username', '$mail', '$pass')");
