<?php require($_SERVER['DOCUMENT_ROOT'] . '/_/inc/init.php'); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js ie ie6 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js ie ie7 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js ie ie8 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie ie9 lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title></title>
    <meta name="description" content="">
    <?php require("_/inc/head.php"); ?>
	<!-- build:css({.tmp,app}) /_/css/table.css -->
		<link rel="stylesheet" href="/_/css/table.css">
	<!-- endbuild -->
</head>
<body>
	<?php require('_/inc/header.php'); ?>
	<div id="PageBody" class = "text-center">
		<table>
			<tr>
				<th>Nombre</th>
				<th>Autores</th>
				<th>Tipo</th>
				<th>Editorial</th>
				<th>ISBN</th>
				<th>Idioma</th>
				<th>Fecha de Publicación</th>
				<th>Generos</th>
				<th>Temas</th>
			</tr>
		<?php
			$string = 'select * from (SELECT Contenido.*, GROUP_CONCAT(DISTINCT Autores.Nombre) AS Autores, GROUP_CONCAT(DISTINCT Generos.Nombre) AS Generos, GROUP_CONCAT(DISTINCT Temas.Nombre) AS Temas  FROM Contenido
JOIN Autores_has_Contenido ON Contenido.idContenido = Autores_has_Contenido.Contenido_idContenido
JOIN Autores ON Autores_has_Contenido.Autores_idAutor = Autores.idAutor
JOIN Contenido_has_Generos ON Contenido.idContenido = Contenido_has_Generos.Contenido_idContenido
JOIN Generos ON Contenido_has_Generos.Generos_idGenero = Generos.idGenero
JOIN Contenido_has_Temas ON Contenido.idContenido = Contenido_has_Temas.Contenido_idContenido
JOIN Temas ON Contenido_has_Temas.Temas_idTema = Temas.idTema)';
			$query = $db->query( $string.'o where o.'.checkInput($_POST['tipo1']).' like "%'.checkInput($_POST['texto1']).'%"');
			while($res = $query->fetch_object()){ ?>
				<tr>
					<td><?=$res->Nombre;?></td>
					<td><?=$res->Autores?></td>
					<td><?=$res->Tipo;?></td>
					<td><?=$res->Editorial;?></td>
					<td><?=$res->UPC;?></td>
					<td><?=$res->Idioma;?></td>
					<td><?=$res->FechaPublicacion;?></td>
					<td><?=$res->Generos;?></td>
					<td><?=$res->Temas;?></td>
				</tr>
			<?php }
		?>
		</table>
	</div>
    <!--[if lt IE 9]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. 
        Please <a href="http://browsehappy.com/">upgrade your browser</a> 
        or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <?php require('_/inc/footer.php'); ?>

    <!-- JAVASCRIPT -->
    <?php require('_/inc/analytics.php'); ?>

    <?php require('_/inc/tail.php'); ?>
</body>
</html>
