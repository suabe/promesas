<div id="banner_interior">
	<img src="/img/micuenta_banner.png" alt="">
</div>
<div id="cuenta_contenido">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="divider"></div>
	<?php $this->load->view('menu_cuenta'); ?>
	<div id="cuenta_text">
		
	</div>
</div>
<style type="text/css">
	#cuenta_menu {
		background-position: 0px 35px !important;
	}
	#cuenta_menu:hover {
		background-position: 0px 0px !important;	
	}
</style>
