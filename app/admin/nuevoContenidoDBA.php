<?php

$autores = array_map('trim', explode(",", checkInput($_POST['autores'])));
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

$generos = array_map('trim', explode(",", checkInput($_POST['generos'])));
$generosId = array();
foreach($generos as $nombreGenero){
	$queryGeneroExistente = $db->query("SELECT idGenero FROM Generos WHERE Nombre = '$nombreGenero'");
	if($queryGeneroExistente->num_rows == 1)
		$generosId[] = $queryGeneroExistente->fetch_object()->idGenero;
	else{
		$queryGenero = $db->query("INSERT INTO Generos (Nombre) VALUES ('$nombreGenero')");
		$generosId[] = $db->insert_id;
	}
}

$temas = array_map('trim', explode(",", checkInput($_POST['temas'])));
$temasId = array();
foreach($temas as $nombreTema){
	$queryTemaExistente = $db->query("SELECT idTema FROM Temas WHERE Nombre = '$nombreTema'");
	if($queryTemaExistente->num_rows == 1)
		$temasId[] = $queryTemaExistente->fetch_object()->idTema;
	else{
		$queryTema = $db->query("INSERT INTO Temas (Nombre) VALUES ('$nombreTema')");
		$temasId[] = $db->insert_id;
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
	foreach($generosId as $idGenero)
		$query = $db->query("INSERT INTO Contenido_has_Generos (Generos_idGenero, Contenido_idContenido) VALUES ('$idGenero', '$idContenido')");
	foreach($temasId as $idTema)
		$query = $db->query("INSERT INTO Contenido_has_Temas (Temas_idTema, Contenido_idContenido) VALUES ('$idTema', '$idContenido')");
	$query = $db->query("INSERT INTO Copia SET Contenido_idContenido = '$idContenido'");

	echo 'Contenido agregado correctamente';
}else if($db->errno == 1062){
	$queryLibroExistente = $db->query("SELECT idContenido, Nombre FROM Contenido WHERE UPC = '".checkInput($_POST['upc'])."'");
	$res = $queryLibroExistente->fetch_object();

	echo $res->Nombre.' ya existe, ¿deseas <a href="/admin/editarContenido?idContenido='.$res->idContenido.'">editarlo</a>?';
}
