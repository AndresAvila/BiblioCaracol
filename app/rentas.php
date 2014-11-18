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
    <div id="PageBody">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h1>Tus Rentas</h1>
                </div>
            </div>
            <table>
            <tr>
                <th>Título</th>
                <th>Fecha Préstamo</th>
                <th>Fecha Devuelto</th>
            </tr>
                <?php $query = $db->query("SELECT Prestamos.*, Contenido.Nombre 
                    FROM Contenido, Prestamos_has_Copia, Usuarios, Prestamos
                    WHERE Usuarios.idUsuario = '".$_SESSION["uid"]."'
                    AND Prestamos.idPrestamo = Prestamos_has_Copia.Prestamos_idPrestamo
                    AND Prestamos_has_Copia.Copia_Contenido_idContenido = Contenido.idContenido");
                while($res = $query->fetch_object()){ ?>
            <tr>
                <td><?=$res->Nombre;?></td>
                <td><?=$res->FechaPrestamo;?></td>    
                <td><?=$res->FechaDevuelto;?></td>
            </tr>
        <?php }
        ?>
        </table>
        </div>
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