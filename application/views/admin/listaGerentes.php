<div id="banner_interior">
	<img src="/img/banners_micuenta_modifdatosPromotor.png" alt="">
</div>
<div id="cuenta_contenido">
	<div class="divider"></div>
	<?php $this->load->view('/admin/menu_user'); ?>
	<div id="cuenta_text">
		<h2>Modificar datos de Desarrolladores de Talento</h2>
		<?php  if ($this->session->userdata('perfil') == 1) { ?>
			<p style=" margin-bottom: 10px; ">Para proceder a modificar datos de las subcuentas, captura la información del campo que requieres actualizar.</p>
		<?php } elseif($this->session->userdata('perfil') == 2) { ?>
			<p style=" margin-bottom: 10px; ">Para proceder a modificar datos de las subcuentas, captura la información del campo que requieres actualizar.</p>
		<?php } elseif ($this->session->userdata('perfil') == 5) { ?>
			
		<?php } ?>	
		<?php  if ($this->session->userdata('perfil') == 1) { ?>
			<form id="estadoCta_form" style=" margin-bottom: 10px; ">
				<p>
					<select name="clavePromotor"  id="clavePromotor" style=" width: 106px; ">
						<option value="">Elegir</option>
						<?php foreach ($Spromotores->Valor as $p):?>
							<option value="<?php echo $p->valor ?>"><?php echo $p->descripcion ?></option>
						<?php endforeach; ?>
					</select>
				</p>
				<p>
					<button type="submit" class="button button-block button-rounded button-flat-action button-tiny">Consultar</button>
				</p>
			</form>
		<?php } ?>
		<p style=" margin-bottom: 5px; ">Para facilitar tu búsqueda indica la cantidad de registros que deseas ver por página y/o el nombre del usuario.<br>Busca al Desarrollador de Talento que necesitas modificar y da clic en <strong>Editar</strong>.</p>
		<table id="example" class="estado_table">
			<thead>
				<tr>
					<th>Desarrollador de Talento</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($promotores->Valor as $p): ?>
					<tr>
						<td><?php echo $p->descripcion ?></td>
						<td>
							<form method="get" action="/listaGerentes/actializaDatos">
								<input type="hidden" name="clv_subpromotor" value="<?php echo $p->valor ?>">
								<input type="hidden" name="nombre" value="<?php echo $p->descripcion ?>">
								<button type="submit" class="button button-block button-rounded button-flat-action button-tiny" style=" position: relative; left: 69px; ">Editar</button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php echo $this->session->flashdata('message'); ?>
		<p style=" text-align: right; width: 100%; float: left;"><a href="/admin_user"><img src="/img/bt_regresar.png"></a></p>
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
<script src="/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/js/plugins/datatables/TableTools/js/TableTools.min.js"></script>
<script src="/js/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="/js/plugins/datatables/jquery.dataTables.columnFilter.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').dataTable( {
        "paging":   false,
        "ordering": true,
        "info":     false
    } );
} );
	$(function(){
		$("#estadoCta_form").submit(function(event){
			event.preventDefault();
			$("tbody","#example").empty();
			var clavePromotor = $("#clavePromotor").val();
			$.ajax({
				url: "/admin_user/listaAsesores",
				type: "POST",
				data: {
					clavePromotor: clavePromotor
				},
				success:function(results){
					$("tbody","#example").append(results);
				}
			});
		});
	}) ;
</script>