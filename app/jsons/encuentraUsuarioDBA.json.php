<?php
	require($_SERVER['DOCUMENT_ROOT'] . '/_/inc/init.php');

	header('Content-Type: application/javascript; charset=utf-8');

	$query = $db->query("SELECT * FROM Usuarios");
	if($query) {
		$usuarios=array();
		while($res = $query->fetch_object()) {
			$usuarios[]=(object)array(
				'Nombre'=>$res->Nombre,
				'idUsuario'=>$res->idUsuario
			);
		}
		echo json_encode($usuarios);
	}
?>
