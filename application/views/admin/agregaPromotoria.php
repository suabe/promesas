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
						Bienvenido(a)<a id="usuario" href="#"> <?php echo $user ?></a> | <a id="" href="/acceso/logout">Cerrar sesión</a><br><a href="#"><?php echo $this->session->userdata('nivel') ?></a><br>
					</div>
				</div>
				<div id="cuenta_contenido">
					<?php echo $this->session->flashdata('message'); ?>
					<div class="divider"></div>
					<?php $this->load->view('/admin/menu_user'); ?>
					<div id="cuenta_text">
						<h2>Agregar Promotoría</h2>
						<p style=" margin-bottom: 10px; ">Para dar de alta por primera vez una cuenta, es necesario ingresar todos los datos del formulario que se presenta a continuación.<br>Te recomendamos verificar que los datos sean correctos antes de presionar el botón agregar porque en automático se emitirá una notificación al nuevo usuario que se ha dado de alta como Promotor y tendrá acceso a la administración de la cuenta principal de su Promotoría.</p>
						<form method="post" action="/agregaPromotor" id="promot_form">
							<p class="doble_input">
								<label for="usuario"><span class="ovliga">*</span>Clave</label><br>
								<input type="text" name="usuario" required>
							</p>
							<p class="doble_input_l">
								<label for="comercio"><span class="ovliga">*</span>Nombre comercial</label><br>
								<input type="text" name="comercio" required>
							</p>
							<p>
								<label for="nombre"><span class="ovliga">*</span>Nombre (s)</label><br>
								<input type="text" name="nombre" required>
							</p>
							<p class="doble_input">
								<label for="paterno"><span class="ovliga">*</span>A. Paterno</label><br>
								<input type="text" name="paterno" required>
							</p>
							<p class="doble_input_l">
								<label for="materno"><span class="ovliga">*</span>A. Materno</label><br>
								<input type="text" name="materno" required>
							</p>
							<p>
								<label for="email"><span class="ovliga">*</span>Correo electrónico</label><br>
								<input type="email" name="email" required>
							</p>
							<p class="doble_input">
								<label for="telefono1"><span class="ovliga">*</span>Teléfono 1</label><br>
								<input type="text" name="telefono1" maxlength="10" required>
							</p>
							<p class="doble_input_l">
								<label for="ext1"><span class="ovliga">*</span>Extensión 1</label><br>
								<input type="text" name="ext1" required>
							</p>
							<p class="doble_input">
								<label for="telefono2">Teléfono 2</label><br>
								<input type="text" name="telefono2" maxlength="10">
							</p>
							<p class="doble_input_l">
								<label for="ext2">Extensión 2</label><br>
								<input type="text" name="ext2">
							</p>
							<p id="reg_btn" style=" margin-top: 10px; width: 100%; float: left; ">
								<span class="ovliga">*Campo Obligatorio</span>
								<button type="submit" class="button button-block button-rounded button-flat-action button-tiny">Agregar</button>
							</p>
						</form>
					</div>
				</div>
				<style type="text/css">
					#cuenta_menu {
						background-position: 0px 39px !important;
					}
					#cuenta_menu:hover {
						background-position: 0px 0px !important;	
					}
					#cuenta_contenido {
				  	height: 1051px !important;
				  }
				  #imagen_avatar {
				  	float: left;
				  	margin-top: 15px;
				  }
				  .ovliga {
				  	color: #f00;
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
