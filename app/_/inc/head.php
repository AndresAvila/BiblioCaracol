        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width">
        <!-- Custom Favicon -->
        <link rel="shortcut icon" href="http://<?php echo($ServerName); ?>/favicon.ico">


        <!-- build:css({.tmp,app}) /_/css/bootstrap.css -->
        <link rel="stylesheet" href="/_/bower_components/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="/_/bower_components/bootstrap/dist/css/bootstrap-theme.css">
        <!-- endbuild -->

        <!-- build:css({.tmp,app}) /_/css/site-styles.css -->
        <link rel="stylesheet" href="/_/css/main.css">
        <link rel="stylesheet" href="/_/css/layout.css">
        <!-- endbuild -->

        <!-- build:js /_/js/lib/modernizr/modernizr.js -->
        <script src="/_/bower_components/modernizr/modernizr.js"></script>
        <!-- endbuild -->

<!-- build:js /_/js/respond.js -->
<!--[if lt IE 9]>
<script src="/_/bower_components/respond/respond.min.js"></script>
<![endif]-->
<!-- endbuild -->

<?php
	$loginError = false;
	if(isset($_POST['loginAction'])){
		$query = $db->query("SELECT * FROM Usuarios WHERE Nombre = '".$_POST['username']."'");
		if($query){
			$res=$query->fetch_object();
			if(!$res==null){
//				if(!function_exists('password_verify'))
//					require_once $_SERVER['DOCUMENT_ROOT'].'/lib/password.php';
				$pass = $_POST['password'];
				if(password_verify($pass,$res->Contrasena)){
					$_SESSION['uid'] = $res->idUsuario;
					$_SESSION['username'] = $res->Nombre;
				}else
					$loginError = true;

			}else{
				$loginError = true;
			}

		}else
			$loginError = true;
	}
	if(isset($_POST['newUserAction'])){
		require_once("_/inc/nuevoUsuario.php");
	}
?>
