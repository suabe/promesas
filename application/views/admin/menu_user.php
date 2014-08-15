<div id="cuenta_submenu">
	<?php  if ($this->session->userdata('perfil') == 1) { ?>
		<!--<a href="/agregaDesarrollador" id="menu_agregaDesarrollador"></a>
		<a href="/listaGerentes" id="menu_modificaDT"></a>-->
		<a href="/dircEnvio" id="menu_envio"></a>
		<a href="/oficinas" id="menu_direcciones"></a>
		<!--<a href="/domicilio" id="menu_envio"></a>-->
	<?php } elseif($this->session->userdata('perfil') == 2) { ?>
		<a href="/agregaDesarrollador" id="menu_agregaDesarrollador"></a>
		<!--<a href="/listaGerentes" id="menu_modificaPromoror"></a>-->
		<a href="/listaGerentes" id="menu_modificaDT"></a>
		<!--<a href="/agregaAsesor" id="menu_agregaAgente"></a>-->
		<a href="/oficinas" id="menu_direcciones"></a>
	<?php } elseif ($this->session->userdata('perfil') == 5) { ?>
		<a href="/agregaPromotor" id="menu_agregaPromotoria"></a>
		<a href="/modificaPromotor" id="menu_modificaPromoror"></a>
		<a href="/usuarioBloqueado" id="usuarioBloqueado"></a>
	<?php } ?>
</div>