<div id="banner_interior">
	<img src="/img/banner_oficinas.png" alt="">
</div>
<div id="cuenta_contenido">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="divider"></div>
	<?php $this->load->view('/admin/menu_user'); ?>
	<div id="cuenta_text">
		<h2>Oficinas</h2>
		<?php  if ($this->session->userdata('perfil') == 1) { ?>
			<p style=" margin-bottom: 10px; ">En este espacio puedes activar o desactivar las direcciones dadas de alta, así como identificar los domicilios registrados como oficinas de cada Promotoría.</p>			
		<?php } elseif($this->session->userdata('perfil') == 2) { ?>
			<p style=" margin-bottom: 10px; ">Consulta el directorio de las oficinas que tenemos registradas de tu Promotoría.</p>
		<?php } elseif ($this->session->userdata('perfil') == 5) { ?>
			
		<?php } ?>	
		<?php if ($this->session->userdata('perfil') == 1) { ?>
			<p style=" margin-bottom: 5px; "><a href="/agregaOfic" class="button button-rounded button-flat-action button-tiny">Agregar oficina</a></p>
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
		<p style=" margin-bottom: 5px; ">Para facilitar tu búsqueda indica la cantidad de registros que deseas ver por página y/o la dirección.</p>
		<table id="example" class="estado_table">
			<thead>
				<tr>
					<th>Dirección</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($oficinas->Valor as $o): ?>
					<tr>
						<td><?php echo $o->domicilio ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
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
				url: "/admin_user/tablaOficinas",
				type: "POST",
				data: {
					clavePromotor: clavePromotor
				},
				success:function(results){
					$('#example').dataTable().fnClearTable();
					$("tbody","#example").append(results);
					$('#example').dataTable().fnDestroy();
					$('#example').dataTable();
					//table.fnClearTable()();
				}
			});
		});
	}) ;
</script>