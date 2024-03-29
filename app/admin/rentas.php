<?php require($_SERVER['DOCUMENT_ROOT'] . '/_/inc/init.php'); ?>
<!doctype html>
<!--[if lt IE 7]>     <html class="no-js ie ie6 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>       <html class="no-js ie ie7 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>       <html class="no-js ie ie8 lt-ie9"> <![endif]-->
<!--[if IE 9]>       <html class="no-js ie ie9 lt-ie10"> <![endif]-->
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
        <div class="container text-center">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2>Rentas actuales</h2>
                </div>
            </div>
            <div class="row">
                <table>
                    <tr>
                        <th>Título</th>
                        <th>Fecha Préstamo</th>
                        <th>Fecha Devolución</th>
                        <th>Nombre</th>
                        <th>Devolver</th>
                    </tr>
                        <?php $query = $db->query("SELECT Prestamos.*, Contenido.Nombre, Usuarios.Nombre AS nombreUsuario
                            FROM 
                                Prestamos 
                                JOIN Usuarios ON Usuarios_idUsuario = Usuarios.idUsuario
                                JOIN Prestamos_has_Copia ON Prestamos.idPrestamo = Prestamos_has_Copia.Prestamos_idPrestamo
                                JOIN Contenido ON Prestamos_has_Copia.Copia_Contenido_idContenido = Contenido.idContenido
                            WHERE FechaDevuelto IS NULL");
                        while($res = $query->fetch_object()){ ?>
                    <tr>
                        <td><?=$res->Nombre;?></td>
                        <td><?=(new DateTime($res->FechaPrestamo))->format('d/m/y');?></td>
                        <?php $devolucion = new DateTime($res->FechaPrestamo);
                            $devolucion->add($tiempoRenta);
                        echo '<td>'.$devolucion->format('d/m/y').'</td>'; ?>
                        <td><?=$res->nombreUsuario;?></td>
                        <td><a href = "/devolver?idPrestamo=<?=$res->idPrestamo;?>">Devolver</a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
           
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
