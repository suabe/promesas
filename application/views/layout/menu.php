<div id="main_menu">
	<nav class="nav">
		<?php if ( $this->session->userdata('perfil') == 1 ) { ?>
			<a id="inicio_menu" href="/"></a>
			<a id="promesas_menu" href="/terminos"></a>
			<a id="cat_menu" href="/catalogo"></a>
			<a id="catesp_menu" href="/catalogoEspecial"></a>
			<a id="preguntas_menu" href="/preguntas"></a>
			<a id="contacto_menu" href="/contacto"></a>
			<a id="cuenta_menu" href="/mi_cuenta/cambia_pass"></a>
		<?php } elseif ($this->session->userdata('perfil') == 6) { ?>
			<a id="cat_menu" href="/agente"></a>
			<a id="catesp_menu" href="/catalogoEspecial"></a>
		<?php } elseif ($this->session->userdata('perfil') == 2) { ?>
			<a id="inicio_menu" href="/"></a>
			<a id="promesas_menu" href="/terminos"></a>
			<a id="cat_menu" href="/catalogo"></a>
			<a id="catesp_menu" href="/catalogoEspecial"></a>
			<a id="preguntas_menu" href="/preguntas"></a>
			<a id="contacto_menu" href="/contacto"></a>
			<a id="cuenta_menu" href="/mi_cuenta/cambia_pass"></a>
		<?php } else { ?>
			<a id="inicio_menu" href="/"></a>
			<a id="promesas_menu" href="/terminos"></a>
			<a id="cat_menu" href="/catalogo"></a>
			<a id="catesp_menu" href="/catalogoEspecial"></a>
			<a id="preguntas_menu" href="/preguntas"></a>
			<a id="contacto_menu" href="/contacto"></a>
			<a id="cuenta_menu" href="/mi_cuenta/cambia_pass"></a>
		<?php } ?>
	</nav>
</div>