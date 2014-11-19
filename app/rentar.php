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
<?php
$idUsuario = checkInput($_GET['idUsuario']);
$idContenido = checkInput($_GET['idContenido']);
?>
<body>
	
	<?php require('_/inc/header.php'); ?>
	<div id="PageBody" class = "text-center">
		<?php
			
			$queryCopiasDisponibles = $db->query("SELECT idCopia
				FROM Copia
				WHERE Contenido_idContenido = '$idContenido'
					AND idCopia NOT IN( 
						SELECT DISTINCT Copia_idCopia
						FROM Prestamos_has_Copia
							JOIN Prestamos ON Prestamos_has_Copia.Prestamos_idPrestamo = Prestamos.idPrestamo
						WHERE Prestamos_has_Copia.Copia_Contenido_idContenido = '$idContenido'
							AND Prestamos.FechaDevuelto IS NULL
					)");
			if($queryCopiasDisponibles->num_rows==0){
				echo 'No hay copias disponibles';
			}else{
				$idCopia = $queryCopiasDisponibles->fetch_object()->idCopia;
				$queryPrestamo = $db->query("INSERT INTO Prestamos SET Usuarios_idUsuario = '$idUsuario'");
				$idPrestamo = $db->insert_id;
				$queryRELPrestamoCopia = $db->query("INSERT INTO Prestamos_has_Copia SET
				Prestamos_idPrestamo = '$idPrestamo',
				Copia_idCopia = '$idCopia',
				Copia_Contenido_idContenido = '$idContenido'");
				echo 'Rentado exitosamente';
			}
		?>
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
