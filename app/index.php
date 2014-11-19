<?php require($_SERVER['DOCUMENT_ROOT'] . '/_/inc/init.php'); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js ie ie6 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js ie ie7 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js ie ie8 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie ie9 lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title>Centro Cultural Caracol</title>
    <meta name="description" content="">
    <?php require("_/inc/head.php"); ?>
</head>
<body>
	<?php require('_/inc/header.php'); ?>
	<div id="PageBody">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<h1>Búsqueda</h1>
				</div>
			</div>
			<form action="/busqueda" method="post">
				<div id="searchParams">
					<div class="row">
						<div class="col-md-2 col-md-offset-2">
							<select class="form-control" name="tipo1">
								<option>Todo</option>
								<option value="Nombre">Titulo</option>
								<option>Autores</option>
								<option>Temas</option>
								<option>Generos</option>
								<option>Idioma</option>
								<option>Edades</option>
							</select>
						</div>
						<div class="col-md-5">
								<input type="text" class="form-control searchParamText" name="texto1">
						</div><!-- /.col-lg-6 -->
						<div class="col-md-1">
							<button type="button" class="addParam btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
						</div>
					</div>
					<div class="row">&nbsp;</div>
				</div>
				<div class="row text-center">
					<input type="hidden" id="entradas" name="entradas" value="1">
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
				</div>
			</form>
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
	<!-- build:js /_/js/index.js -->
		<script src="/_/js/busqueda.js"></script>
	<!-- endbuild -->
</body>
</html>
