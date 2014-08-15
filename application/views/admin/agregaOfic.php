<div id="banner_interior">
	<img src="/img/banner_oficinas.png" alt="">
</div>
<div id="cuenta_contenido">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="divider"></div>
	<?php $this->load->view('/admin/menu_user'); ?>
	<div id="cuenta_text">
		<h2>Agregar Oficina</h2>
		<p>Datos de la oficina.</p>
		<form method="post" action="/agregaOfic" id="addres_form">
			<p>
				<label><span class="ovliga">*</span>Promotor</label><br>
				<select name="clavePromotor"  id="clavePromotor">
					<option value="">Elegir</option>
					<?php foreach ($Spromotores->Valor as $p):?>
						<option value="<?php echo $p->valor ?>"><?php echo $p->descripcion ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
				<label for="calle"><span class="ovliga">*</span>Calle</label>
				<input type="text" name="calle" value="" required>
			</p>
			<p class="doble_input">
				<label for="numExt"><span class="ovliga">*</span>No. Exterior</label>
				<input type="text" name="numExt" value="" required>
			</p>
			<p class="doble_input_l">
				<label for="numInt"><span class="ovliga">*</span>No. Interior</label>
				<input type="text" name="numInt" value="" required>
			</p>
			<p class="doble_input">
				<label for="colonia"text><span class="ovliga">*</span>Colonia</label>
				<input type="text" name="colonia" value="" required>
			</p>
			<p class="doble_input_l">
				<label for="cp"><span class="ovliga">*</span>C.P</label>
				<input type="text" name="cp" value="" required>
			</p>
			<p class="doble_input">
				<label for="estado"><span class="ovliga">*</span>Estado</label><br>
				<select name="idestado" required>
					<?php foreach ($estados->Valor as $t): ?>
						<option value="<?php echo $t->valor ?>"><?php echo $t->descripcion ?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p class="doble_input_l">
				<label for="municipio"><span class="ovliga">*</span>Delegación/Municipio</label>
				<input type="text" name="municipio" value="" required>
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
