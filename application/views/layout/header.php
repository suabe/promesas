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
		<link href='//fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
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
					<a href="/">
						<img src="/img/logo.png" alt="Promesas Cumplidas">
					</a>
				</div>
				<div id="catalogo">
					<?php $user = current_user();?>
					Bienvenido(a)<a id="usuario" href="#"> <?php echo $user ?></a> | <a id="" href="/acceso/logout">Cerrar sesión</a><br><a href="#"><?php echo $this->session->userdata('nivel') ?></a><br>
					<a id="emerge" href="https://preview.marke.com.mx/metlife/panel/Login.aspx" target="_blank">
						<img src="/img/catalogo.png" alt="Catalogo">
					</a>
				</div>
			</div>
			<?php $this->load->view('/layout/menu') ?>
