<div id="banner_interior">
	<img src="/img/banners_micuenta_adminUser.png" alt="">
</div>
<div id="cuenta_contenido">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="divider"></div>
	<?php $this->load->view('/admin/menu_user'); ?>
	<div id="cuenta_text">
		<?php  if ($this->session->userdata('perfil') == 1) { ?>
			<h2>Administrador de Usuarios</h2>
			<p>Agrega direcciones de envío y actualiza los datos de las oficinas para cada Promotoría.</p>
		<?php } elseif($this->session->userdata('perfil') == 2) { ?>
			<h2>Administrador de Usuarios</h2>
			<p>Consulta y actualiza la información de los usuarios dados de alta bajo la cuenta de tu Promotoría.</p>
		<?php } elseif ($this->session->userdata('perfil') == 5) { ?>
			
		<?php } ?>		
		<p style=" text-align: right; "><a href="/mi_cuenta/cambia_pass"><img src="/img/bt_regresar.png"></a></p>
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
