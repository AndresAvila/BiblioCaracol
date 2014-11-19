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

$query = $db->query('UPDATE Contenido SET
	Nombre = \''.checkInput($_POST['titulo']).'\',
	Tipo = \''.checkInput($_POST['tipo']).'\',
	UPC = \''.checkInput($_POST['upc']).'\',
	Editorial = \''.checkInput($_POST['editorial']).'\',
	Idioma = \''.checkInput($_POST['idioma']).'\',
	FechaPublicacion = \''.checkInput($_POST['fechaPublicacion']).'\',
	PublicoMeta = \''.checkInput($_POST['edad']).'\',
	URLPortada = \''.checkInput($_POST['portada']).'\',
	Grande = \''.(isset($_POST['grande'])?1:0).'\'
	WHERE idContenido = \''.checkInput($_POST['idContenido']).'\'');

if($query){
	$idContenido = checkInput($_POST['idContenido']);
	
	$db->query("DELETE FROM Autores_has_Contenido WHERE Contenido_idContenido = '$idContenido'");
	$db->query("DELETE FROM Contenido_has_Generos WHERE Contenido_idContenido = '$idContenido'");
	$db->query("DELETE FROM Contenido_has_Temas WHERE Contenido_idContenido = '$idContenido'");
	foreach($autoresId as $idAutor)
		$query = $db->query("INSERT INTO Autores_has_Contenido (Autores_idAutor, Contenido_idContenido) VALUES ('$idAutor', '$idContenido')");
	foreach($generosId as $idGenero)
		$query = $db->query("INSERT INTO Contenido_has_Generos (Generos_idGenero, Contenido_idContenido) VALUES ('$idGenero', '$idContenido')");
	foreach($temasId as $idTema)
		$query = $db->query("INSERT INTO Contenido_has_Temas (Temas_idTema, Contenido_idContenido) VALUES ('$idTema', '$idContenido')");
	
	echo 'Contenido editado correctamente';
}else if($db->errno == 1062){
	echo ':(';
}
