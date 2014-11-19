<?php require($_SERVER['DOCUMENT_ROOT'] . '/_/inc/init.php'); ?>
<!doctype html>
<!--[if lt IE 7]>			<html class="no-js ie ie6 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>				<html class="no-js ie ie7 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>				<html class="no-js ie ie8 lt-ie9"> <![endif]-->
<!--[if IE 9]>				<html class="no-js ie ie9 lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
<head>
		<title>Centro Cultural Caracol</title>
		<meta name="description" content="">
		<?php require("_/inc/head.php"); ?>

</head>
<body>
	<?php require('_/inc/header.php'); ?>
	<div id="PageBody">
		<?php
			if(isset($_POST['titulo']))
				require_once('nuevoContenidoDBA.php');
			else{ ?>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<h1>Nuevo contenido</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<img id="portada" src="">
				</div>
			</div>
			<form role="form" method="post" >
				<div class="form-group">
					<label for="upc">UPC / ISBN</label>
					<input type="text" class="form-control" name="upc" id="upc" >
					<p class="help-block">Esta información aparece debajo del código de barras.</p>
				</div>
				<div class="form-group">
					<label for="tipo">Tipo de contenido</label>
					<select class="form-control" name="tipo" id="tipo" >
						<option>Libro</option>
						<option>Revista</option>
						<option>Video</option>
					</select>
				</div>
				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text" class="form-control" name="titulo" id="titulo" >
				</div>
				<div class="form-group">
					<label for="autores">Autores</label>
					<input type="text" class="form-control" name="autores" id="autores" >
					<p class="help-block">Cada autor debe de ir separado por una coma.</p>
				</div>
				<div class="form-group">
					<label for="edad">Edades</label>
					<select class="form-control" name="edad" >
						<option>Niños</option>
						<option>Jóvenes</option>
						<option>Adultos</option>
					</select>
					<p class="help-block">El púlico principal para este contenido.</p>
				</div>
				<div class="form-group">
					<label for="tema">Tema</label>
					<input type="text" name="tema" class="form-control" >
				</div>
				<div class="form-group">
					<label for="editorial">Editorial</label>
					<input type="text" class="form-control" name="editorial" id="editorial" >
				</div>
				<div class="form-group">
					<label for="fechaPublicacion">Fecha de Publicación</label>
					<input type="text" class="form-control" name="fechaPublicacion" id="fechaPublicacion" >
				</div>
				<div class="form-group">
					<label for="idioma">Idioma</label>
					<input type="text" class="form-control" name="idioma" id="idioma" >
				</div>
				<div class="form-group">
					<label for="portada">Portada</label>
					<input type="text" class="form-control" name="portada" id="portadaUrl" >
					<p class="help-block">Dirección de la imagen de la portada.</p>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" name="grande"> Grande
					</label>
				</div>
				<button type="submit" class="btn btn-default">Enviar</button>
			</form>
		</div>
		<?php } ?>
		<!--[if lt IE 9]>
				<p class="chromeframe">You are using an <strong>outdated</strong> browser.
				Please <a href="http://browsehappy.com/">upgrade your browser</a>
				or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		<?php require('_/inc/footer.php'); ?>

		<!-- JAVASCRIPT -->
		<?php require('_/inc/analytics.php'); ?>

		<?php require('_/inc/tail.php'); ?>
	<!-- build:js /_/js/nuevoContenido.js -->
		<script type="text/javascript" src="/_/js/autofillISBN.js"></script>
	<!-- endbuild -->
</body>
</html>

