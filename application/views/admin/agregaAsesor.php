<div id="banner_interior">
	<img src="/img/banners_micuenta_datosAgente.png" alt="">
</div>
<div id="cuenta_contenido">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="divider"></div>
	<?php $this->load->view('/admin/menu_user'); ?>
	<div id="cuenta_text">
		<h2>Agregar Agente</h2>
		<p style=" margin-bottom: 10px; ">Para dar de alta una Sub-Cuenta, proporciona la información requerida acontinuación. Como procedimiento de seguridad, te recomendamos asegurarte que los datos sean correctos.</p>
		<form method="post" action="/agregaAsesor" id="agent_form">
			<p class="doble_input">
				<?php  if ($this->session->userdata('perfil') == 1) { ?>
					<label for="clavePromotor"><span class="ovliga">*</span>Promotoria</label><br>
					<select name="clavePromotor"  id="clavePromotor">
						<?php foreach ($promotores->Valor as $p):?>
							<option value="<?php echo $p->valor ?>"><?php echo $p->descripcion ?></option>
						<?php endforeach; ?>
					</select>
				<?php } else { ?>
					<label for="clavePromotor">Promotoria</label><br>
					<input type="text" name="clavePromotor" value="<?php echo $this->session->userdata('username') ?>" disabled>
				<?php } ?>
			</p>
			<p class="doble_input_l">
				<label for="usuario"><span class="ovliga">*</span>Usuario Metbook</label><br>
				<input type="text" name="usuario" required>
			</p>
			<p class="doble_input">
				<label for="nAgente"><span class="ovliga">*</span>Número de agente</label><br>
				<input type="text" name="nAgente" required>
			</p>
			<p class="doble_input_l">
				<label for="nombre"><span class="ovliga">*</span>Nombre</label><br>
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
			<p>
				<label for="oficina"><span class="ovliga">*</span>Oficina</label><br>
				<select name="oficina"  id="oficina" style=" width: 100%; ">
					<option value="">Elegir</option>
					<?php foreach ($oficinas->Valor as $o): ?>
						<option value="<?php echo $o->idOficina ?>"><?php echo $o->domicilio ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p id="regD_btn">
				<span class="ovliga">*Campo Obligatorio</span>
				<button type="submit" class="button button-block button-rounded button-flat-action  button-tiny">Guardar</button>
			</p>
		</form>
		<p style=" text-align: right; width: 100%; float: left;"><a href="/admin_user"><img src="/img/bt_regresar.png"></a></p>
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
  	height: 590px !important;
  }
  .ovliga {
  	color: #f00;
  }
</style>
