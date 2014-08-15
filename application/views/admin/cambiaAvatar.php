<div id="banner_interior">
	<img src="/img/micuenta_banner.png" alt="">
</div>
<div id="cuenta_contenido">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="divider"></div>
	<?php $this->load->view('menu_cuenta'); ?>
	<div id="cuenta_text">
		<h2>Cambiar Logo</h2>
		<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos.</p>
		<form method="post" action="/cambiaAvatar" id="avatar_form">
			<input type="hidden" name="usuario" value="<?php echo $this->session->userdata('card') ?>">
			<p>
				<div id="imagen_avatar"></div>
				<span id="imgr"></span>
				<input id="img-input" type="hidden" name="logo" value="">	
				
			</p>
			<p>
				<button type="submit" class="button button-block button-rounded button-flat-action button-tiny">Guardar</button>
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
</style>
<script src='/css/uploadify/jquery.uploadify.js'></script>
<link rel="stylesheet" href="/css/uploadify/uploadify.css">
<script type="text/javascript">
	$(document).ready(function() {
		var texto = '';
		$("#imagen_avatar").uploadify({
			'multi'    : false,
			'uploadLimit' : 1,
			'fileSizeLimit' : '100KB',
			'fileTypeDesc' : 'Archivos de imagen',
      'fileTypeExts' : '*.gif; *.jpg; *.png',
			'swf'    : '/uploadify/uploadify.swf',
			'uploader'      : '/admin_user/upload',
			'buttonText': 'Subir foto de perfil',
			'onUploadSuccess' : function(file, data, response) {
					var imgr = '<img width="128" height="128" src="/uploads/'+ file.name +'">';
					$("#imgr").append(imgr);
					$("#img-input").val(file.name);
					$("#imagen_avatar").css('display', 'none');
      }
		});
	});
</script>