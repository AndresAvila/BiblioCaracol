<?php

$autores = explode(", ",checkInput($_POST['autores']));
$autoresId = array();

foreach($autores as $nombreAutor){
	$queryAutorExistente = $db->query("SELECT idAutor FROM Autores WHERE Nombre = '$nombreAutor'");
	if($queryAutorExistente->num_rows == 1)
		$autoresId[] = $queryAutorExistente->fetch_object()->idAutor;
	else{
		$queryAutor = $db->query("INSERT INTO Autores (Nombre) VALUES ('$nombreAutor')");
		$autoresId[] = $db->insert_id;
	}
}

$query = $db->query('INSERT INTO Contenido (Nombre, Tipo, UPC, Editorial, Idioma, FechaPublicacion, PublicoMeta, URLPortada, Grande) VALUES('
	.'\''.checkInput($_POST['titulo']).'\','
	.'\''.checkInput($_POST['tipo']).'\','
	.'\''.checkInput($_POST['upc']).'\','
	.'\''.checkInput($_POST['editorial']).'\','
	.'\''.checkInput($_POST['idioma']).'\','
	.'\''.checkInput($_POST['fechaPublicacion']).'\','
	.'\''.checkInput($_POST['edad']).'\','
	.'\''.checkInput($_POST['portada']).'\','
	.'\''.(isset($_POST['grande'])?1:0).'\')');

if($query){
	$idContenido = $db->insert_id;
	foreach($autoresId as $idAutor)
		$query = $db->query("INSERT INTO Autores_has_Contenido (Autores_idAutor, Contenido_idContenido) VALUES ('$idAutor', '$idContenido')");
	
	echo 'Contenido agregado correctamente';
}else if($db->errno == 1062){
	$queryLibroExistente = $db->query("SELECT idContenido, Nombre FROM Contenido WHERE UPC = '".checkInput($_POST['upc'])."'");
	$res = $queryLibroExistente->fetch_object();

	echo $res->Nombre.' ya existe, ¿deseas <a href="/admin/editarContenido?idContenido='.$res->idContenido.'">editarlo</a>?';
}
