<div id="banner_interior">
	<img src="/img/banners_micuenta_abonoPts.png" alt="">
</div>
<div id="cuenta_contenido">
	
	<div class="divider"></div>
	<?php $this->load->view('/menu_cuenta'); ?>
	<div id="cuenta_text">
		<h2>Abono de Puntos</h2>
		<p><strong>Paso 2.</strong> Indica el monto y tipo de movimiento que deseas ejecutar (transferir /recuperar). No olvides asegurarte que los datos que ingresaste son correctos.</p>
		<p style=" text-align: right; font-weight: bold; ">Saldo: <?php echo number_format($this->session->userdata('saldo'));?> pts.</p>
		<form method="post" name="abono_form" action="/importar/abono" id="abono_form">
			<input type="hidden" name="clv_subpromotor" value="<?php echo $this->input->get('clv_subpromotor') ?>">
			<input type="hidden" name="nombre" id="nombre" value="<?php echo $this->input->get('nombre') ?>">
			<?php $saldo = saldo();  ?>
			<h2><?php echo $this->input->get('nombre') ?> puntos: <?php echo number_format($this->input->get('puntos')); ?></h2>
			<p class="doble_input">
				<label for="valor">Puntos</label><br>
				<input type="text" name="valor" id="valor" required>
			</p>
			<p class="doble_input_l">
				<label for="tipo">Tipo</label><br>
				<select name="tipo" id="tipo"required>
					<option value="">Elegir</option>
					<option value="1">Transferir</option>
					<option value="2">Recuperar</option>
				</select>
			</p>
			<p><strong>Paso 3.</strong> Confirma tu contraseña a manera de validación de seguridad.</p>
			<p>
				<label for="password" required>Contraseña</label><br>
				<input type="password" name="password" >
			</p>
			<p><strong>Paso 4.</strong> Finalmente da clic en <strong>Aplicar</strong>.</p>
			<p id="abono_btn">
				<a href="#" id="confirma" class="button button-rounded button-flat-action button-tiny" style=" position: relative; left: 464px; ">Aplicar</a>
				<!--<button type="submit" class="button button-block button-rounded button-flat-action button-tiny">Guardar</button>-->
			</p>
		</form>
		<?php echo $this->session->flashdata('message'); ?>
	</div>
</div>
<style type="text/css">
	#cuenta_menu {
		background-position: 0px 39px !important;
	}
	#cuenta_menu:hover {
		background-position: 0px 0px !important;	
	}
</style>
<script type="text/javascript">
	$(function() {
		$("#confirma").click(function(){
			var nombre = $("#nombre").val();
			var val = $("#valor").val();
			var tipo = $("#tipo").val();
			if (tipo == 1) {var t = "Transferir "}
			else {var t = "Recuperar "}
			var confirmo = confirm('Estas seguro de ' + t + val + 'pts a ' + nombre);
			console.log(nombre);
    	if (confirmo) {
    		$("#abono_form").submit();		
    	}
    	else {
    		console.log('nego');
    	}
		});
	});
</script>
