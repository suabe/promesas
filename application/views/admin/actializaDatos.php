<div id="banner_interior">
	<img src="/img/banners_micuenta_modifdatosPromotor.png" alt="">
</div>
<div id="cuenta_contenido">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="divider"></div>
	<?php $this->load->view('/admin/menu_user'); ?>
	<div id="cuenta_text">
		<h2>Modificar datos de Desarrolladores de Talento</h2>
		<p>Captura los datos que a continuación se detallan.</p>
		<form method="post" action="/listaGerentes/actializaDatos" id="datos_form">
			<h2><?php echo $this->input->get('nombre') ?></h2>
			<input type="hidden" name="clv_subpromotor" value="<?php echo $this->input->get('clv_subpromotor') ?>">
			<p>
				<label for="email"><span class="ovliga">*</span>Correo electrónico</label><br>
				<input type="email" name="email" value="<?php echo $promotor->Valor->email ?>" required>
			</p>
			<!--
			<p class="doble_input">
				<label for="telefono1"><span class="ovliga">*</span>Teléfono 1</label><br>
				<input type="text" name="telefono1" value="<?php echo $promotor->Valor->telefono1 ?>" required>
			</p>
			<p class="doble_input_l">
				<label for="ext1"><span class="ovliga">*</span>Extensión</label><br>
				<input type="text" name="ext1" value="<?php echo $promotor->Valor->ext1 ?>" required>
			</p>
			<p class="doble_input">
				<label for="telefono2"><span class="ovliga">*</span>Teléfono 2</label><br>
				<input type="text" name="telefono2" value="<?php echo $promotor->Valor->telefono2 ?>" required>
			</p>
			<p class="doble_input_l">
				<label for="ext2"><span class="ovliga">*</span>Extensión</label><br>
				<input type="text" name="ext2" value="<?php echo $promotor->Valor->ext2 ?>" required>
			</p>
		-->
			<p class="doble_input">
				<label for="estatus"><span class="ovliga">*</span>Estatus</label><br>
				<select name="estatus">
					<option value="">Elegir</option>
					<option value="2" <?php echo ( $promotor->Valor->estatus == 2)? 'selected':'';?>>Inactiva</option>
					<option value="1" <?php echo ( $promotor->Valor->estatus == 1)? 'selected':'';?>>Activa</option>
				</select>
			</p>
			<p class="doble_input_l">
				<label for="oficina"><span class="ovliga">*</span> Oficina</label><br>
				<select name="oficina" id="oficina" style=" width: 100%; ">
					<option value="">Elegir</option>
					<?php foreach ($oficinas->Valor as $o): ?>
						<option value="<?php echo $o->idOficina ?>" <?php echo ( $promotor->Valor->no_oficina == $o->idOficina)? 'selected':'';?>><?php echo $o->domicilio ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p id="regD_btn">
				<span class="ovliga">*Campo Obligatorio</span>
				<button type="submit" class="button button-block button-rounded button-flat-action button-tiny" style=" left: 411px; ">Guardar cambios</button>
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
	.ovliga {
  	color: #f00;
  }
</style>
