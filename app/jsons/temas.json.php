<?php
	require($_SERVER['DOCUMENT_ROOT'] . '/_/inc/init.php');

	$query = $db->query("SELECT * FROM Temas");
	$rows = $query->num_rows;

	header('Content-Type: application/json');

	$tipos = array();

	while($res = $query->fetch_object())
		$tipos[] = $res;

	echo json_encode($tipos);
