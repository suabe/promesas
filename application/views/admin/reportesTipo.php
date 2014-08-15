<div id="cuenta_contenido">
	<iframe src="http://www.link2loyalty.com/metlifepruebas/GraficaGeneral" width="718" height="500" style=" border: none; " scrolling="no"></iframe>
	<div>
		<form method="post" id="export_form" action="/reportes/tipo">
			<input class="fecha" type="text" name="del" placeholder="Del" style=" width: 106px; ">
			<input class="fecha" type="text" name="al" placeholder="Al" style=" width: 106px; ">
				<select name="tipo" style=" width: 169px; " required>
					<option value="">Elegir</option>
					<option value="1">Abono</option>
					<option value="2">Transferencia</option>
					<option value="3">Recuperación</option>
					<option value="5">Canje</option>
				</select>
			<button type="submit" class="button button-rounded button-flat-action button-tiny">Consultar</button>
		</form>
	</div>
	<iframe src="http://www.link2loyalty.com/metlifepruebas/GraficaTipo?tipo=<?php echo $datos['tipo'] ?>&del=<?php echo $datos['del'] ?>&al=<?php echo $datos['al'] ?>" width="718" height="500" style=" border: none; " scrolling="no"></iframe>
	<p style=" text-align: right; "><a href="/mi_cuenta/cambia_pass"><img src="/img/bt_regresar.png"></a></p>
</div>
<style type="text/css">
	#cuenta_menu {
		background-position: 0px 39px !important;
	}
	#cuenta_menu:hover {
		background-position: 0px 0px !important;	
	}
	#cuenta_contenido {
		height: 1080px;
	}
</style>
