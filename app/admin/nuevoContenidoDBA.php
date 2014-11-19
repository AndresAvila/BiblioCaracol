<?php

$queryAutorExistente = $db->query("SELECT idAutor FROM Autores WHERE Nombre = '".checkInput($_POST['autores'])."'");
if($queryAutorExistente->num_rows == 1)
	$autor = $queryAutorExistente->fetch_object()->idAutor;
else{
	$queryAutor = $db->query("INSERT INTO Autores (Nombre) VALUES ('".checkInput($_POST['autores'])."')");
	$autor = $db->insert_id;
}

$query = $db->query('INSERT INTO Contenido (Nombre, Autores_idAutor, Tipo, UPC, Editorial, Idioma, FechaPublicacion, PublicoMeta, URLPortada, Grande) VALUES('
	.'\''.checkInput($_POST['titulo']).'\','
	.'\''.$autor.'\','
	.'\''.checkInput($_POST['tipo']).'\','
	.'\''.checkInput($_POST['upc']).'\','
	.'\''.checkInput($_POST['editorial']).'\','
	.'\''.checkInput($_POST['idioma']).'\','
	.'\''.checkInput($_POST['fechaPublicacion']).'\','
	.'\''.checkInput($_POST['edad']).'\','
	.'\''.checkInput($_POST['portada']).'\','
	.'\''.(isset($_POST['grande'])?1:0).'\')');

if($query)
	echo 'Contenido agregado correctamente';
