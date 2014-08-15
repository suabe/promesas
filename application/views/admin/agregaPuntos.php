<div id="banner_interior">
	<img src="/img/micuenta_banner.png" alt="">
</div>
<div id="cuenta_contenido">
	<div class="divider"></div>
	<?php $this->load->view('/menu_cuenta'); ?>
	<div id="cuenta_text">
		<h2>Transferencia de Puntos</h2>
		<p>¡Reconoce el esfuerzo de tu Desarrollador de Talento transfiriendo puntos a su cuenta!  Esta acción sólo la puedes ejecutar tú como Promotor y es necesario que confirmes tu usuario y contraseña antes de aceptar la transferencia.</p>
		<p>El monto que le asignes, se reflejará automáticamente en el saldo de la cuenta beneficiada y con esos puntos podrá realizar canje de artículos en los dos Catálogos que tenemos disponibles.</p>
		<p style=" margin-bottom: 10px; "><strong>Paso 1.</strong> Busca el nombre del Desarrollador de Talento a quien deseas transferir puntos y da clic en <strong>Seleccionar</strong>. El sistema, te mostrará los resultados obtenidos del criterio de búsqueda.</p>
		<p style=" margin-bottom: 5px; ">Para facilitar tu búsqueda, indica la cantidad de registros que deseas ver por página y/o el nombre del usuario.</p>
		<?php $saldo = saldo();  ?>
		<p style=" text-align: right; font-weight: bold; ">Saldo: <?php echo number_format($saldo->valor->saldo);?> pts.</p>
		<table id="example" class="estado_table">
			<thead>
				<tr>
					<th>Desarrollador de Talento</th>
					<th>Puntos</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($promotores->Valor as $p): ?>
					<tr>
						<td><?php echo $p->descripcion ?></td>
						<td><?php echo number_format($p->saldo) ?></td>
						<td>
							<form method="get" action="/importar/abono">
								<input type="hidden" name="clv_subpromotor" value="<?php echo $p->valor ?>">
								<input type="hidden" name="nombre" value="<?php echo $p->descripcion ?>">
								<input type="hidden" name="puntos" value="<?php echo $p->saldo ?>">
								<button type="submit" class="button button-block button-rounded button-flat-action button-tiny" style=" position: relative; left: 45px; ">Seleccionar</button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php echo $this->session->flashdata('message'); ?>
	</div>
</div>
<style type="text/css">
	#cuenta_menu {
		background-position: 0px 39px !important;
	}
	#cuenta_menu:hover {
		background-position: 0px 0px !important;	
	}
	#cuenta_contenido {
		height: 700px;
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
</script>