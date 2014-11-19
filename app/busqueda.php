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
				<th>Portada</th>
				<th>Nombre</th>
				<th>Autores</th>
				<th>Tipo</th>
				<th>Editorial</th>
				<th>ISBN</th>
				<th>Idioma</th>
				<th>Fecha de Publicación</th>
				<th>Generos</th>
				<th>Temas</th>
				<th>Edades</th>
				<?php if(isset($_SESSION['admin']) && $_SESSION['admin']){?>
					<th>Rentar</th>
					<th>Editar</th>
				<?php } ?>
			</tr>
		<?php
			$string = 'select * from (select Contenido.Nombre as Nombre, GROUP_CONCAT(DISTINCT Autores.Nombre) as Autores, Contenido.Tipo as Tipo, 
Contenido.Editorial as Editorial, Contenido.UPC as UPC, Contenido.Idioma as Idioma, 
Contenido.FechaPublicacion as FechaPublicacion, GROUP_CONCAT(DISTINCT Generos.Nombre) as Generos, 
GROUP_CONCAT(DISTINCT Temas.Nombre) as Temas, Contenido.PublicoMeta as Edades, idContenido, urlPortada as Portada from Contenido
LEFT JOIN Autores_has_Contenido ON Contenido.idContenido = Autores_has_Contenido.Contenido_idContenido
LEFT JOIN Autores ON Autores_has_Contenido.Autores_idAutor = Autores.idAutor
LEFT JOIN Contenido_has_Generos ON Contenido.idContenido = Contenido_has_Generos.Contenido_idContenido
LEFT JOIN Generos ON Contenido_has_Generos.Generos_idGenero = Generos.idGenero
LEFT JOIN Contenido_has_Temas ON Contenido.idContenido = Contenido_has_Temas.Contenido_idContenido
LEFT JOIN Temas ON Contenido_has_Temas.Temas_idTema = Temas.idTema
Group By idContenido)';
$whereString = 'o where o.'.checkInput($_POST['tipo1']).' like "%'.checkInput($_POST['texto1']).'%"';
			if(isset($_POST['tipo2'])) {
					$whereString .= ' and o.'.checkInput($_POST['tipo2']).' like "%'.checkInput($_POST['texto2']).'%"';
					}
			if(isset($_POST['tipo3'])) {
					$whereString .= ' and o.'.checkInput($_POST['tipo3']).' like "%'.checkInput($_POST['texto3']).'%"';
					}
			if(isset($_POST['tipo4'])) {
					$whereString .= ' and o.'.checkInput($_POST['tipo4']).' like "%'.checkInput($_POST['texto4']).'%"';
					}
			if(isset($_POST['tipo5'])) {
					$whereString .= ' and o.'.checkInput($_POST['tipo5']).' like "%'.checkInput($_POST['texto5']).'%"';
					}
			if(isset($_POST['tipo6'])) {
					$whereString .= ' and o.'.checkInput($_POST['tipo6']).' like "%'.checkInput($_POST['texto6']).'%"';
					}
			if($_POST['tipo1'] == 'Todo') {
					$whereString = 'o where o.Nombre like "%'.checkInput($_POST['texto1']).'%" or 
					o.Autores like "%'.checkInput($_POST['texto1']).'%" or o.Tipo like "%'.checkInput($_POST['texto1']).'%"
					or o.Editorial like "%'.checkInput($_POST['texto1']).'%" or o.UPC like "%'.checkInput($_POST['texto1']).'%"
					or o.Idioma like "%'.checkInput($_POST['texto1']).'%" or o.FechaPublicacion like "%'.checkInput($_POST['texto1']).'%"
					or o.Generos like "%'.checkInput($_POST['texto1']).'%" or o.Temas like "%'.checkInput($_POST['texto1']).'%"
					or o.Edades like "%'.checkInput($_POST['texto1']).'%"';
					}
			$query = $db->query( $string.$whereString );
			while($res = $query->fetch_object()){ ?>
				<tr>
					<td><img src = "<?=$res->Portada;?>" /></td>
					<td><?=$res->Nombre;?></td>
					<td><?=$res->Autores?></td>
					<td><?=$res->Tipo;?></td>
					<td><?=$res->Editorial;?></td>
					<td><?=$res->UPC;?></td>
					<td><?=$res->Idioma;?></td>
					<td><?=$res->FechaPublicacion;?></td>
					<td><?=$res->Generos;?></td>
					<td><?=$res->Temas;?></td>
					<td><?=$res->Edades;?></td>
					<?php if(isset($_SESSION['admin']) && $_SESSION['admin']){?>
						<td><a href = "/encuentraUsuario?accion=Rentar&siguiente=/rentar&idContenido=<?=$res->idContenido;?>">Rentar</a></td>
						<td><a href = "/admin/editarContenido?idContenido=<?=$res->idContenido;?>">Editar</a></td>
					<?php } ?>
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
