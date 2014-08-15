<div id="banner_interior">
	<img src="/img/banners_micuenta_abonoPts.png" alt="">
</div>
<div id="cuenta_contenido">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="divider"></div>
	<?php $this->load->view('menu_cuenta'); ?>
	<div id="cuenta_text">
		<h2>Otorgamiento de puntos</h2>
		<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur accumsan euripidis in, eum.</p>
		<form method="post" action="/importar/to_file" id="archivo_form" accept-charset="utf-8" enctype="multipart/form-data" id="archivo_form">
			<p>
				<label for="excel">Archivo:</label>
				<input type="file" name="excel" required>
			</p>
			<p>
				<?php $user = current_user();?>
				<input type="hidden" name="usuario" value="<?php echo $user ?>" required>
				<input type="hidden" name="password1" id="password1" value="<?php echo $this->session->userdata('password') ?>" required>
				<label for="password">Contraseña:</label>
				<input type="password" name="password" required>
			</p>
			<p id="excel_btn">
				<button type="submit" class="button button-block button-rounded button-flat-action">Abonar</button>
			</p>
		</form>
	</div>
</div>