<div id="banner_interior">
	<img src="/img/micuenta_banner.png" alt="">
</div>
<div id="cuenta_contenido">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="divider"></div>
	<?php $this->load->view('/admin/menu_user'); ?>
	<div id="cuenta_text">
		<h2>Envío para Eventos</h2>
		<p>Domicilio de envío.</p>
		<form method="post" action="/domicilio" id="addres_form">
			<p>
				<label for="clavePromotor">Promotoria</label><br>
				<select name="clavePromotor" id="clavePromotor" required>
					<?php foreach ($promotores->Valor as $p):?>
						<option value="<?php echo $p->valor ?>"><?php echo $p->descripcion ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				<label for="calle"><span class="ovliga">*</span>Calle</label>
				<input type="text" name="calle" value="<?php echo $domicilio->Valor->calle ?>" required>
			</p>
			<p class="doble_input">
				<label for="numExt"><span class="ovliga">*</span>No. Exterior</label>
				<input type="text" name="numExt" value="<?php echo $domicilio->Valor->no_ext ?>">
			</p>
			<p class="doble_input_l">
				<label for="numInt"><span class="ovliga">*</span>No. Interior</label>
				<input type="text" name="numInt" value="<?php echo $domicilio->Valor->no_int ?>">
			</p>
			<p class="doble_input">
				<label for="colonia"text><span class="ovliga">*</span>Colonia</label>
				<input type="text" name="colonia" value="<?php echo $domicilio->Valor->colonia ?>">
			</p>
			<p class="doble_input_l">
				<label for="cp"><span class="ovliga">*</span>C.P</label>
				<input type="text" name="cp" value="<?php echo $domicilio->Valor->cp ?>">
			</p>
			<p class="doble_input">
				<label for="estado"><span class="ovliga">*</span>Estado</label>
				<input type="text" name="estado" value="<?php echo $domicilio->Valor->estado ?>">
			</p>
			<p class="doble_input_l">
				<label for="municipio"><span class="ovliga">*</span>Municipio</label>
				<input type="text" name="municipio" value="<?php echo $domicilio->Valor->municipio ?>">
			</p>
			<p class="doble_input">
				<label for="telefono1"><span class="ovliga">*</span>Teléfono 1</label><br>
				<input type="text" name="telefono1" maxlength="10" required>
			</p>
			<p class="doble_input_l">
				<label for="ext1"><span class="ovliga">*</span>Extensión 1</label><br>
				<input type="text" name="ext1" maxlength="5" required>
			</p>
			<p class="doble_input">
				<label for="telefono2"><span class="ovliga">*</span>Celular</label><br>
				<input type="text" name="telefono2" maxlength="10" required>
			</p>
			<p class="doble_input_l">
				<label for="ext2"><span class="ovliga">*</span>Atención</label><br>
				<input type="text" name="ext2" required>
			</p>
			<p id="change_btn" style=" width: 100%; float: left; margin-top: 10px; ">
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
	.ovliga {
  	color: #f00;
  }
</style>
