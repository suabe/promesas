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
		<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="/css/normalize.css">
		<link rel="stylesheet" href="/css/base.css">
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/fancybox/jquery.fancybox.css">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/css/buttons.css">
		<link rel="stylesheet" href="/css/style.css">
		<script src='/js/jquery-1.9.1.min.js'></script>
		<script src="/js/modernizr-2.6.2.min.js"></script>
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
						Bienvenido(a)<a id="usuario" href="#"> <?php echo $user ?></a> | <a id="" href="/acceso/logout">Cerrar sesión</a><br><a href="#"><?php echo $this->session->userdata('nivel') ?></a>
					</div>
				</div>
				<div id="cuenta_contenido">
					<?php echo $this->session->flashdata('message'); ?>
					<div class="divider"></div>
					<?php $this->load->view('/admin/menu_user'); ?>
					<div id="cuenta_text">
						<div id="avatar" class="cs-style-3">
							<figure>
								<img src="/uploads/<?php echo $this->session->userdata('logo') ?>" alt="<?php echo $this->session->userdata('card') ?>">
								<figcaption>
									<a href="#">Cambiar logo</a>
								</figcaption>
							</figure>
						</div>
						<div id="descrip">
						
						</div>
						<form method="post" action="/admin_promo/cambia_pass" id="canghe_form">
							<p>
								<label for="passActual">Contraseña actual:</label>
								<input type="hidden" name="passActual1" id="passActual" value="<?php echo $this->session->userdata('password') ?>">
								<input type="password" name="passActual" required>
							</p>
							<p>
								<label for="passNuevo1">Nueva contraseña:</label>
								<input type="password" name="passNuevo1" id="passNuevo1" required>
							</p>
							<p>
								<label for="passNuevo2">Confirmar nueva contraseña:</label><a href="#" id="ayuda_btn">?</a>
								<div style="display: none;" id="ayuda_cont">
									<p style=" font-weight: bold; ">Recomendaciones, para generar tu contraseña:</p>
									<a href="#" id="ayuda_close">Cerrar</a>
									<ul>
										<li>Ingresa mínimo 8 caracteres, donde al menos uno de ellos debe ser numérico y el resto alfanumérico</li>
										<li>Se sugiere no usar  números consecutivos o fáciles de descifrar</li>
										<li>Todas tus contraseñas deben ser diferentes, en cada cambio y pueden reutilizarse hasta que superes el decimotercer cambio</li>
									</ul>
									<p>En caso de duda escríbenos a <a href="mailto:promesasdxn@metlife.com.mx">promesasdxn@metlife.com.mx</a> o bien llama a nuestro Centro de Atención 1167 3452 (local) y 01 800 681 7779 de lunes a viernes entre 9:00 y 21:00 horas, o bien los sábados de 9:00 a 15:00 horas (hora local de la Ciudad de México).</p>
								</div>
								<input type="password" name="passNuevo2" required>
							</p>
							<p id="change_btn">
							<button type="submit" class="button button-block button-rounded button-flat-action button-tiny">Guardar</button>
						</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<p><a href="/home/terminos">Términos y Condiciones</a> | <a href="/home/aviso">Aviso de Privacidad</a> | <a href="#">Manual</a></p>
		</div>
		<style type="text/css">
			#ayuda_close {
				position: relative;
				float: right;
				bottom: 17px;
				padding: 0 3px;
				background-color: #8fcf00;
				color: #fff;
			}
		</style>
		<script type="text/javascript">
			$("#ayuda_btn").click(function(event){
				event.preventDefault();
				$("#ayuda_cont").show( 2000 );
			});
			$("#ayuda_close").click(function(event){
				event.preventDefault();
				$("#ayuda_cont").hide( 2000);
			});
		</script>
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
