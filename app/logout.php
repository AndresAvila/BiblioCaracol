<?php
	session_start();
	$_SESSION = array();

	header('Location: /', true, 302);
