
<?php require($_SERVER['DOCUMENT_ROOT'] . '/_/inc/init.php'); 


$query = $db->query('UPDATE Prestamos SET
	FechaDevuelto = NOW()
	Where idPrestamo = "'.checkinput($_GET["idPrestamo"]).'"');
	

if($query){
	
	echo 'Contenido devuelto correctamente';
}else {
	echo ':(';
}
