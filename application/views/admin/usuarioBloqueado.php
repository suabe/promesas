<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="es"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="es"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="es"> <!--<![endif]-->
<html lang="es">
	<head>
		<title>Promesas Cumplidas - <?php echo $title ?></title>
		<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="title" content="Promesas Cumplidas - <?php echo $title ?>">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="Ernesto Suárez">
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="/img/favicon.ico"/>
		<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="/css/normalize.css">
		<link rel="stylesheet" href="/css/base.css">
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/fancybox/jquery.fancybox.css">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/css/metlife/jquery-ui-1.10.4.custom.min.css">
		<link rel="stylesheet" href="/css/buttons.css">
		<link rel="stylesheet" href="/css/style.css">
		<script src='/js/jquery-1.9.1.min.js'></script>
		<script src="/js/modernizr-2.6.2.min.js"></script>
		<script src="/js/jquery-ui-1.10.4.custom.min.js"></script>
	</head>
	<body>
		<div class="contenido">
			<div class="contenedor">
				<div id="cabeza">
					<div id="logo">
						<a href="/admin_promo">
							<img src="/img/logo.png" alt="Promesas Cumplidas">
						</a>
					</div>
					<div id="catalogo">
						<?php $user = current_user();?>
						Bienvenido<a id="usuario" href="#"> <?php echo $user ?></a> | <a id="" href="/acceso/logout">Cerrar sesión</a><br><a href="#"><?php echo $this->session->userdata('nivel') ?></a><br>
					</div>
				</div>
				<div id="cuenta_contenido">
					<?php echo $this->session->flashdata('message'); ?>
					<div class="divider"></div>
					<?php $this->load->view('/admin/menu_user'); ?>
					<div id="cuenta_text">
						<h2>Usuarios Bloqueados</h2>
						<p style=" margin-bottom: 10px; ">Los usuarios de esta lista, están incapacitados para visualizar el Portal y para realizar movimientos en el Programa Promesas Cumplidas. Si estás seguro de bloquear al usuario, identifícalo y continúa como se muestra en el formulario.</p>
						<p style=" margin-bottom: 5px; ">Para facilitar tu búsqueda indica la cantidad de registros que deseas ver por página y/o criterio de búsqueda.</p>
						<table id="example" class="estado_table">
							<thead>
								<tr>
									<th>Usuarios Bloqueados</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($usuarios->Valor as $u): ?>
									<tr>
										<td>
											<p><?php echo $u->Usuario ?></p>
										</td>
										<td>
											<form method="post" action="/usuarioBloqueado">
												<input type="hidden" name="clvUsuario" value="<?php echo $u->ClvUsuario ?>">
												<button type="submit" class="button button-block button-rounded button-flat-action button-tiny">Desbloquear</button>
											</form>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<script src="/js/plugins/datatables/jquery.dataTables.min.js"></script>
				<script src="/js/plugins/datatables/TableTools/js/TableTools.min.js"></script>
				<script src="/js/plugins/datatables/dataTables.bootstrap.js"></script>
				<script src="/js/plugins/datatables/jquery.dataTables.columnFilter.js"></script>
				<script type="text/javascript">
					$(document).ready(function() {
				    $('#example').dataTable( {
				        "paging":   false,
				        "ordering": true,
				        "info":     false
				    } );
				} );
				</script>
				<style type="text/css">
					#cuenta_menu {
						background-position: 0px 39px !important;
					}
					#cuenta_menu:hover {
						background-position: 0px 0px !important;	
					}
					#cuenta_contenido {
				  	height: 650px !important;
				  }
				  #imagen_avatar {
				  	float: left;
				  	margin-top: 15px;
				  }
				</style>
			</div>
		</div>
		<div id="footer">
		</div>
		<script type="text/javascript" src="/js/jquery.carouFredSel-6.0.4-packed.js"></script>
		<script type="text/javascript" src="/js/jquery.validate.js"></script>
		<script type="text/javascript" src="/js/jquery.fancybox.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/js/buttons.js"></script>
		<script type="text/javascript" src="/js/jquery.accordion.js"></script>
		<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="/js/scripts.js"></script>
	</body>
</html>
