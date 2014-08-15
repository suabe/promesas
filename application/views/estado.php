<div id="banner_interior">
	<img src="/img/banners_micuenta_edoCta.png" alt="">
</div>
<div id="cuenta_contenido">
	<div class="divider"></div>
	<?php $this->load->view('menu_cuenta'); ?>
	<div id="cuenta_text">
		<h2>Estado de Cuenta</h2>
		<?php  if ($this->session->userdata('perfil') == 1) { ?>
			<p>Este registro permite conocer el saldo disponible, así como el detalle del uso de los puntos acreditados del periodo y la Promotoría que se desee consultar.</p>
		<?php } elseif($this->session->userdata('perfil') == 2) { ?>
			<p>Este registro permite conocer el saldo disponible, así como el detalle del uso de los puntos acreditados del periodo que se desee consultar.</p>
		<?php } elseif ($this->session->userdata('perfil') == 5) { ?>
			
		<?php } ?>
		<p>Para generarlo, elige el período del cual necesitas la consulta de movimientos y da clic en el botón <strong>Consultar</strong>.</p>
		<form method="post" action="/estadoCta" id="estadoCta_form">
			<input class="fecha" type="text" name="del" placeholder="Del" style=" width: 106px; ">
			<input class="fecha" type="text" name="al" placeholder="Al" style=" width: 106px; ">			
			<?php  if ($this->session->userdata('perfil') == 1) { ?>
				<select name="usuario" style=" width: 218px; ">
					<?php foreach ($promotores->Valor as $p):?>
						<option value="<?php echo $p->valor ?>"><?php echo $p->descripcion ?></option>
					<?php endforeach; ?>
				</select>
			<?php } if ($this->session->userdata('perfil') == 2) { ?>
				<select name="usuario" style=" width: 218px; ">
					<option value="">Promotoria</option>
					<?php foreach ($Spromotores->Valor as $p):?>
						<option value="<?php echo $p->usuario ?>"><?php echo $p->descripcion ?></option>
					<?php endforeach; ?>
				</select>
			<?php } ?>
			<p id="estado_btn">
				<button type="submit" class="button button-block button-rounded button-flat-action button-tiny">Consultar</button>
			</p>
		</form>
		<p style=" margin: 10px 0px; ">Para facilitar tu búsqueda indica la cantidad de registros que deseas ver por página y/o el criterio de acuerdo a los conceptos referidos a continuación.</p>
		<h2>
			<?php 
				if ($this->session->userdata('perfil') == 1) {
					echo $promotor;
				}  
				if ($this->session->userdata('perfil') == 2) {
					echo $promotor;
				}
			?>
		</h2>
		 <div class="widget-content table-container">
			<table id="example" class="estado_table">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Concepto</th>
						<th>Detalle</th>
						<th>Importe (menos)</th>
						<th>Importe (más)</th>
						<th>Saldo</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($estado->Valor as $e): ?>
						<tr>
							<td><?php echo $e->fecha ?></td>
							<td><?php echo $e->tipo ?></td>
							<td><?php echo $e->descripcion ?></td>
							<td><?php echo $e->menospuntos ?> pts</td>
							<td><?php echo $e->puntos ?> pts</td>
							<td><?php echo $e->saldo ?> pts</td>
							<?php $saldo = $e->saldo; ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<h2 style=" width: 100%; float: left; ">Guarda tu historial de movimientos</h2>
		<p style=" width: 100%; float: right; ">Para ello lleva el registro puntual de movimientos, elige el formato al que necesitas exportar tu información indica el período y finalmente da clic en el botón <strong>PDF</strong> o <strong>Excel</strong>.</p>
		<form method="post" target="_blank" id="export_form" action="http://www.link2loyalty.com/metlifepruebas/pdf">
			<input class="fecha" type="text" name="del" placeholder="Del" style=" width: 106px; ">
			<input class="fecha" type="text" name="al" placeholder="Al" style=" width: 106px; ">
			<?php  if ($this->session->userdata('perfil') == 1) { ?>
				<select name="usuario" style=" width: 169px; " required>
					<option value="">Elegir</option>
					<?php foreach ($promotores->Valor as $p):?>
						<option value="<?php echo $p->valor ?>"><?php echo $p->descripcion ?></option>
					<?php endforeach; ?>
				</select>
			<?php } if ($this->session->userdata('perfil') == 2) { ?>
				<select name="usuario" style=" width: 218px; ">
					<option value="<?php echo $this->session->userdata('card') ?>">Promotoria</option>
					<?php foreach ($Spromotores->Valor as $p):?>
						<option value="<?php echo $p->usuario ?>"><?php echo $p->descripcion ?></option>
					<?php endforeach; ?>
				</select>
			<?php } if ($this->session->userdata('perfil') == 3) { ?>
				<input type="hidden" name="usuario" value="<?php echo $this->session->userdata('card') ?>">
			<?php } ?>
			<button type="submit" class="button button-rounded button-flat-action button-tiny"><i class="fa fa-file-pdf-o"></i> PDF</button>
		</form>
		<form method="post" target="_blank" id="export_form" action="http://www.link2loyalty.com/metlifepruebas/Excel">
			<input class="fecha" type="text" name="del" placeholder="Del" style=" width: 106px; ">
			<input class="fecha" type="text" name="al" placeholder="Al" style=" width: 106px; ">
			<?php  if ($this->session->userdata('perfil') == 1) { ?>
				<select name="usuario" style=" width: 169px; " required>
					<option value="">Elegir</option>
					<?php foreach ($promotores->Valor as $p):?>
						<option value="<?php echo $p->valor ?>"><?php echo $p->descripcion ?></option>
					<?php endforeach; ?>
				</select>
			<?php } if ($this->session->userdata('perfil') == 2) { ?>
				<select name="usuario" style=" width: 218px; ">
					<option value="<?php echo $this->session->userdata('card') ?>">Promotoria</option>
					<?php foreach ($Spromotores->Valor as $p):?>
						<option value="<?php echo $p->usuario ?>"><?php echo $p->descripcion ?></option>
					<?php endforeach; ?>
				</select>
			<?php } if ($this->session->userdata('perfil') == 3) { ?>
				<input type="hidden" name="usuario" value="<?php echo $this->session->userdata('card') ?>">
			<?php } ?>
			<button type="submit" class="button button-rounded button-flat-action button-tiny"><i class="fa fa-file-excel-o"></i> Excel</button>
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
	#estado_menu{
    background-position: 0px 61px !important;
  }
  #estado_menu:hover{
    background-position: 0px 0px !important;
  }
  #cuenta_contenido {
  	height: 890px !important;
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