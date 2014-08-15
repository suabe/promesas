		</div>
	</div>
	<script>
	  $(function() {
	    $( "#dialog-confirm" ).dialog({
	    	autoOpen: false,
	      resizable: false,
	      width: 400,
	      height:240,
	      modal: true,
	      buttons: {
	        "Aceptar": function() {
	          window.open("https://www.marke.com.mx/metlife");
	          $( this ).dialog( "close" );
	        },
	        Cancelar: function() {
	          $( this ).dialog( "close" );
	        }
	      }
	    });
	    $("#cat_menu, #emerge").click(function(event){
	    	event.preventDefault();
	    	$( "#dialog-confirm" ).dialog("open");
	    })
	  });
	  </script>
	  <div id="dialog-confirm" title="Aviso">
		  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>La página que intentas visitar se encuentra fuera de este sitio.</p>
		</div>
		<div id="footer">

			<p>
				<!--<a href="/terminos">Términos y Condiciones</a> | -->
				<a href="/aviso">Aviso de Privacidad</a> | 
				<?php  if ($this->session->userdata('perfil') == 1) { ?>
					<a href="#">Manual de Usuario</a>
				<?php } elseif($this->session->userdata('perfil') == 2) { ?>
					<a href="/img/pdf/ManualPerfilPromotor7ago-rev.pdf">Manual de Usuario</a>
				<?php } elseif ($this->session->userdata('perfil') == 5) { ?>
					<a href="#">Manual de Usuario</a>
				<?php } ?>
			</p>
		</div>
		<script type="text/javascript" src="/js/jquery.carouFredSel-6.0.4-packed.js"></script>
		<script type="text/javascript" src="/js/jquery.validate.js"></script>
		<script type="text/javascript" src="/js/jquery.fancybox.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/js/buttons.js"></script>
		<script type="text/javascript" src="/js/jquery.accordion.js"></script>
		<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="/js/scripts.js"></script>
	</body>
</html>