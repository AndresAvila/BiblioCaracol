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
<?php
	$idUsuario = checkInput($_GET['idUsuario']);
	$queryUsuario = $db->query("SELECT * FROM Usuarios WHERE idUsuario = '$idUsuario'");
	$res = $queryUsuario->fetch_object();
?>
<body>
	<?php require('_/inc/header.php'); ?>
	<div id="PageBody">
		<div class="container">
			<?php 
			if(isset($_POST['contrasena'])){
				$nuevaCont=password_hash(checkInput($_POST['contrasena']), PASSWORD_DEFAULT);
				$query=$db->query("UPDATE Usuarios SET Contrasena='$nuevaCont' WHERE idUsuario='$idUsuario'");
				if($query)
					echo '<p>La contraseña se configuró exitosamente.</p>';
			}else{?>
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<h1>Cambiar contraseña a <?=$res->Nombre;?></h1>
				</div>
			</div>
			<form role="form" method="post" >
				<div class="form-group">
					<label for="contrasena">Contraseña</label>
					<input type="password" class="form-control" name="contrasena" id = "contrasena">
				</div>
				<div class="form-group">
					<label for="contrasena">Confirmación de contraseña</label>
					<input type="password" class="form-control" name="confirmacion" id = "confirmacion">
				</div>
				<div class="row text-center">
					<input type="hidden" id="entradas" name="entradas" value="1">
					<button type="submit" class="btn btn-primary" disabled id = "submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cambiar</button>
				</div>
			</form>
			<?php } ?>
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
	
	<script type = "text/javascript">
		function confirmar(){
			if(($('#contrasena').val()==$('#confirmacion').val())&&($('#confirmacion').value!=''))
				document.getElementById('submit').disabled=false;
			else
				document.getElementById('submit').disabled=true;
		}
		$(document).ready(function(){
			$('#contrasena').keyup(confirmar);
			$('#confirmacion').keyup(confirmar);
		});
	</script>
</body>
</html>
