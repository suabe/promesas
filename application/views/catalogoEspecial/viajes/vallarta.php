<div id="banner_interior">
	<img src="/img/catalogoesp_banner.png" alt="">
</div>
<div id="catalogo_contenido">
	<div class="divider"></div>
	<h2>Viajes</h2>
	<div id="wrapper_sli_viajes">
		<div id="slidar_viajes">
			<div id="loading">
				<img src="/img/line_loading.gif">
			</div>
			<img src="/img/catalogo/viajes/viajes_vallarta_01.png">
			<img src="/img/catalogo/viajes/viajes_vallarta_02.png">
			<img src="/img/catalogo/viajes/viajes_vallarta_03.png">
		</div>
		<div id="pag"></div>
	</div>
	<p>*Avion NO reembolsable, No transferible. No cambios en la reservacion, Sujeto a disponibilidad, Cambios de precios sin previo aviso</p>
	<p style=" text-align: right; width: 100%; float: left;"><a href="/catalogoEspecial/viajes"><img src="/img/bt_regresar.png"></a></p>
</div>
<style type="text/css">
	#catesp_menu {
		background-position: 0px 39px !important;
	}
	#catesp_menu:hover {
		background-position: 0px 0px !important;	
	}
	#catalogo_contenido {
		height: 440px;
	}
	#autos_list {
		width: 661px;
		height: 184px;
		margin: 0px auto;
		padding: 0px;
		list-style-type: none;
	}
	#autos_list li {
		float: left;
		margin-right: 87px;
	}
	#autos_list li:last-child {
		margin-right: 0px;
	}
</style>
<script type="text/javascript">
	$('#loading').fadeOut('slow', function(){
		$('#loading').remove();
		var effects = new Array('scroll', 'crossfade', 'uncover');
		var random_number = Math.floor(Math.random()*3);
		$("#slidar_viajes").carouFredSel({
			widith: 720,
			height: 212,
			scroll: {
				items: 1,
				fx: 'uncover',
				duration: 4000,
				pauseOnHover: true
			},
			pagination: {
					container: '#pag',
					anchorBuilder: function(nr) {
						return '<a href="#" class="pag-'+nr+'"><span>'+nr+'</span></a>'
					}
				},
		}); 
	});
</script>