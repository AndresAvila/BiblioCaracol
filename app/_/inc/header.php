<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" method="post" name="loginForm">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Acceder</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="username">Usuario:</label>
						<input type="text" class="form-control" name="username" placeholder="Escribe tu nombre de usuario">
					</div>
					<div class="form-group">
						<label for="password">Contraseña</label>
						<input type="password" class="form-control" name="password" placeholder="Contraseña">
						<?=(($loginError)?'<p class="help-block">Usuario o contraseña equivocada</p>':'');?>
					</div>
					<input type="hidden" name="loginAction">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Acceder</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" method="post" name="newUserForm">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Nuevo usuario</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="username">Usuario:</label>
						<input type="text" class="form-control" name="username" placeholder="Escribe tu nombre de usuario">
					</div>
					<div class="form-group">
						<label for="username">E-mail:</label>
						<input type="mail" class="form-control" name="mail" placeholder="Escribe tu e-mail">
					</div>
					<div class="form-group">
						<label for="password">Contraseña</label>
						<input type="password" class="form-control" name="password" placeholder="Contraseña">
						<?=(($loginError)?'<p class="help-block">Usuario o contraseña equivocada</p>':'');?>
					</div>
					<input type="hidden" name="newUserAction">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Crear</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<header id="SiteHeader">
	<div class="caracol-logo hidden-xs" ></div>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs " href="/"><div class="caracol-logo"></div></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/index"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda</a></li>
					<?php if(isset($_SESSION['uid'])) {?>
						<li><a href="/rentas"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Rentas</a></li>
						<li><a href="/realizapedido"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Pedidos</a></li>
					<?php  if($_SESSION['admin']) {?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Administración <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="/admin/nuevoContenido">Nuevo Contenido</a></li>
									<li><a href="/admin/editarContenido">Editar Contenido</a></li>
									<li class="divider"></li>
									<li><a href="/admin/rentas">Rentas</a></li>
									<li><a href="/admin/pedidos">Pedidos</a></li>
									<li class="divider"></li>
									<li><a href="/admin">Cambiar contraseña a usuario</a></li>
									<li><a href="/admin">Modificar usuario</a></li>
								</ul>
							</li>
						<?php }
					}?>
				</ul>
				<form class="navbar-form navbar-right">
					<div class="btn-group">
						<?php if(isset($_SESSION['uid'])) {?>
							<button  class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?=$_SESSION['username'];?></button>
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/logout.php">Salir</a></li>
							</ul>
						<?php }else{ ?>
						<button data-toggle="modal" data-target="#loginModal" class="btn btn-success"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Acceder</button>
							<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#" data-toggle="modal" data-target="#accountModal">Nuevo usuario</a></li>
							</ul>
						<?php } ?>
					</div>
				</form>

			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</header>


