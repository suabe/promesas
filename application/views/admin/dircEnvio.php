<div id="banner_interior">
	<img src="/img/banners_micuenta_direcciones.png" alt="">
</div>
<div id="cuenta_contenido">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="divider"></div>
	<?php $this->load->view('/admin/menu_user'); ?>
	<div id="cuenta_text">
		<h2>Envío para Eventos</h2>
		<p>Esta función permite agregar una dirección en caso de que así lo solicite un Promotor vía correo electrónico,  para un evento de premiación, donde los artículos canjeados deben entregarse en otro domicilio distinto a los dados de alta en el catálogo de oficinas de cada Promotoría.</p>
		<p style=" margin-bottom: 10px; margin-top: 10px;"><a href="/domicilio" class="button button-rounded button-flat-action button-tiny">Agregar dirección</a></p>	
		<p style=" margin-bottom: 5px; ">Para cambiar el estatus de una dirección con destino especial.<br>Paso 1. Elige el domicilio que deseas modificar del directorio<br>Paso 2.  Selecciona el <strong>Estatus</strong> (Activa/Inactiva)<br>Paso 3. Da clic en <strong>Aplicar</strong></p>
		<p style=" margin-bottom: 5px; ">Para facilitar tu búsqueda indica la cantidad de registros que deseas ver por página y/o el criterio de acuerdo a los conceptos referidos a continuación.</p>
		<table id="example" class="estado_table">
			<thead>
				<tr>
					<th>Promotoría</th>
					<th>Dirección</th>
					<th>Municipio</th>
					<th>Estado</th>
					<th>Estatus</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($direcciones->Valor as $d): ?>
					<tr>
						<td><?php echo $d->usuaio ?></td>
						<td><?php echo $d->ciudad ?></td>
						<td><?php echo $d->municipio ?></td>
						<td><?php echo $d->estado ?></td>
						<td>
							<form method="post" action="/dircEnvio" id="dirEnvio_form">
								<input type="hidden" name="clvDireccion" value="<?php echo $d->clvDomicilio ?>">
								<select name="idEstatus">
									<option value="">Elige</option>
									<option value="2" <?php echo ( $d->estatus == 2)? 'selected':'';?>>Activa</option>
									<option value="3" <?php echo ( $d->estatus == 3)? 'selected':'';?>>Inactiva</option>
								</select>
								<button type="submit" class="button button-block button-rounded button-flat-action button-tiny">Aplicar</button>
							</form>
						</td>
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
	#cuenta_contenido {
		height: 1000px;
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
