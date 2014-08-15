<div id="cuenta_submenu">
	<?php  if ($this->session->userdata('perfil') == 1) { ?>
		<a href="/calendario" id="menu_calendario"></a>
		<a href="/estadoCta" id="menu_estado"></a>
		<a href="/admin_user" id="menu_admUs"></a>
		<!--<a href="/importar" id="menu_abono"></a>-->
		<a href="/reportes" id="menu_reportes"></a>
	<?php } elseif ($this->session->userdata('perfil') == 2) { ?>
		<a href="/calendario" id="menu_calendario"></a>
		<a href="/estadoCta" id="menu_estado"></a>
		<a href="/admin_user" id="menu_admUs"></a>
		<a href="/agregaPuntos" id="menu_abono"></a>
	<?php } elseif ($this->session->userdata('perfil') == 3) { ?>
		<a href="/calendario" id="menu_calendario"></a>
		<a href="/estadoCta" id="menu_estado"></a>
	<?php } ?>
</div>