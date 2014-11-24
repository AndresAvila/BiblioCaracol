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
	<style>
.typeahead,
.tt-query,
.tt-hint {
  width: 396px;
  height: 30px;
  padding: 8px 12px;
  font-size: 24px;
  line-height: 30px;
  border: 2px solid #ccc;
  -webkit-border-radius: 8px;
     -moz-border-radius: 8px;
          border-radius: 8px;
  outline: none;
}

.typeahead {
  background-color: #fff;
}

.typeahead:focus {
  border: 2px solid #0097cf;
}

.tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-dropdown-menu {
  width: 422px;
  margin-top: 12px;
  padding: 8px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 8px;
     -moz-border-radius: 8px;
          border-radius: 8px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
          box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
  padding: 3px 20px;
  font-size: 18px;
  line-height: 24px;
}

.tt-suggestion.tt-cursor {
  color: #fff;
  background-color: #0097cf;

}

.tt-suggestion p {
  margin: 0;
}
</style>
</head>
<body>
	<?php require('_/inc/header.php'); ?>
	<div id="PageBody" class = "text-center">
		<form name="persona" id="form" method="get" action="<?=$_GET['siguiente'];?>">
			<input type="text" size="30" value="" id="busqueda" class="typeahead" placeholder="Nombre" />
			<input type="hidden" id="idUsuario" name="idUsuario" readonly /><br />

			<?php //Enviar las variables GET a la siguiente página
			foreach($_GET as $key => $value){
				if($key!='siguiente'&&$key!='accion'){
					echo "<input type='hidden' name='$key' value='$value' />";
				}
			}?>

			<input type="submit" value="<?=$_GET['accion']?>" id="submit" disabled />
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
	<script>
		$( document ).ready(function(){
			var usuarios = new Bloodhound({
				datumTokenizer: Bloodhound.tokenizers.obj.whitespace('Nombre'),
				queryTokenizer: Bloodhound.tokenizers.whitespace,
				limit: 10,
				prefetch: {
					url: '/jsons/encuentraUsuarioDBA.json.php'
				}
			});

			usuarios.initialize();

			$('#busqueda').typeahead(null, {
				name: "usuarios",
				displayKey: "Nombre",
				source: usuarios.ttAdapter()
			}).on('typeahead:selected', function (obj, datum) {
				$('#idUsuario').val(datum.idUsuario);
				$("#submit").removeAttr("disabled");
			}).on('typeahead:opened',function (obj, datum) {
				$("#submit").attr("disabled", true);
				$("#busqueda").val("");
			});
			$("#form").submit(function (){
				localStorage.clear();
			});
		});
		</script>
</body>
</html>


