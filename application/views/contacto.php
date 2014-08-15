<div id="banner_interior">
	<img src="/img/banner_contacto.png" alt="">
</div>
<div id="contacto_contenido">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="divider"></div>
	<form method="post" action="/contacto" id="contacto_form">
		<p>
			<label for="nombre">*Nombre completo</label><br>
			<input type="text" name="nombre" required>
		</p>
		<p>
			<label for="email">*Correo eléctronico</label><br>
			<input type="email" name="email" required>
		</p>
		<p>
			<label for="asunto">*Asunto</label><br>
			<select name="asunto" required>
				<option value="">Selecciona</option>
				<option value="1">Información del portal Promesas Cumplidas</option>
				<option value="2">Dudas de saldo</option>				
				<option value="4">Información del catálogo especial</option>
				<option value="5">Comentarios y sugerencias del catálogo</option>
			</select>
		</p>
		<p>
			<label for="mensaje">*Mensaje</label><br>
			<textarea name="mensaje" rows="4" required></textarea>
		</p>
		<p id="contacto_btn">
			<button type="submit" class="button button-block button-rounded button-flat-action button-tiny">Enviar</button>
		</p>
	</form>
	<p style=" margin-top: 20px; ">Para mayor información sobre el adecuado uso del sistema, ponemos a tu disposición el Manual de Usuario al final de esta pantalla, pero -si lo prefieres-  también puedes enviar tus dudas a <a href="mailto:promesasdxn@metlife.com.mx">promesasdxn@metlife.com.mx</a> o bien llamar a nuestro centro de atención 1167 3452 (local) y 01 800 681 7779 de lunes a viernes entre 9:00 y 21:00 horas, o bien los sábados de 9:00 a 15:00 horas (tiempo local de la Ciudad de México).</p>
</div>
<style type="text/css">
	#contacto_menu {
		background-position: 0px 39px !important;
	}
	#contacto_menu:hover {
		background-position: 0px 0px !important;	
	}
</style>