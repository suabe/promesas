<div id="banner_interior">
	<img src="/img/micuenta_banner.png" alt="">
</div>
<div id="cuenta_contenido">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="divider"></div>
	<?php $this->load->view('menu_cuenta'); ?>
	<div id="cuenta_text">
		<div id="avatar">
			<img src="/uploads/<?php echo $this->session->userdata('logo') ?>" alt="<?php echo $this->session->userdata('card') ?>">
		</div>
		<div id="descrip">
			
		</div>
		<p style=" margin-bottom: 10px; ">Por procedimiento de seguridad, cambia tu contraseña. Al realizarlo, el sistema cerrará sesión y te solicitará ingresar nuevamente.</p>
		<form method="post" action="/mi_cuenta/cambia_pass" id="canghe_form">
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
					<p>En caso de duda escríbenos a <a href="mailto:promesasdxn@metlife.com.mx">promesasdxn@metlife.com.mx</a> o bien llama a nuestro Centro de Atención                        1167 3452 (local) y 01 800 681 7779 de lunes a viernes entre 9:00 y 21:00 horas, o bien los sábados de 9:00 a 15:00 horas (hora local de la Ciudad de México).</p>
				</div>
				<input type="password" name="passNuevo2" required>
			</p>
			<p id="change_btn">
			<button type="submit" class="button button-block button-rounded button-flat-action button-tiny">Guardar</button>
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
	#ayuda_cont {
		font-size: 12px;
	}
	#ayuda_cont ul {
		font-size: 12px;
	}
	#cuenta_contenido {
		height: 520px;
	}
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