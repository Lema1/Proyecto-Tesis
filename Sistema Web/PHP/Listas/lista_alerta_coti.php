<?php
require_once('../../DB/db_cotizacion.php');
require_once('../../DB/db_vehiculos.php');
require_once('../../DB/db_repuestos.php');
$cotizacion = Cotizacion::select_coti_pendiente();

if($cotizacion){
	// PONER FECHA ALADO DEL CLIENTE Y CAMBIAR EL COLOR DE LA LINEA DEPENDIENDO DE LA FECHA DE CREACION
	?>

    <table class="table table-reponsive">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Vehiculo</th>
                <th>Cliente</th>
				<th>Fecha Creacion</th>
                <th>Detalle</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($cotizacion as $coti){?>
            <tr>
                <td><?php echo $coti[0];?></td>
                <td><?php echo $coti[1];?></td>
                <td><?php echo $coti[2];?></td>
				<td><?php echo $coti[3];?></td>
                <td><a href="#" data-toggle="modal" data-target="#cot<?php echo $coti[0];?>">Detalle</a></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    
<?php
foreach($cotizacion as $c){?>
    
    <div class="modal fade" id="cot<?php echo $c[0];?>" role="dialog">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title"><?php echo 'Cotizacion n°: '.$c[0];?></h4>
		</div>
		<div class="modal-body">
		  <div class="panel">
			<div class="panel-heading">Datos Vehiculo</div>
				<table class="table table-reponsive">
				  <thead>
					  <th>Patente</th>
					  <th>Año</th>
					  <th>Marca</th>
					  <th>Modelo</th>
					  <th>Color</th>
				  </thead>
				  <tbody>
					<?php $dtVeh = Vehiculo::listarVehiculoCotiza($c[0]);
					foreach($dtVeh as $dv){
					?>
					  <tr>
						  <td><?php echo $dv[0];?></td>
						  <td><?php echo $dv[1];?></td>
						  <td><?php echo $dv[2];?></td>
						  <td><?php echo $dv[3];?></td>
						  <td><?php echo $dv[4];?></td>
					  </tr>
					  <?php }?>
				  </tbody>
				</table>
		  </div>
		  <div class="panel">
			<div class="panel-heading">Repuestos Pendientes</div>
			<form name="asignaMecaMe" method="post" action="PHP/Formularios/agregarUrlPrecio.php">
			<table class="table table-reponsive">
				<thead>
					  <th>Codigo</th>
					  <th>Nombre</th>
					  <th>URL</th>
					  <th>Precio</th>
					  <th>#</th>
				  </thead>
				<tbody>
				<?php
				$repuestos = Repuestos::buscarRepuestos($c[0]);
				foreach($repuestos as $rp){
				?>
				<tr>
					<td><?php echo $rp[0];?></td>
					<td><?php echo $rp[1];?></td>
					<td><?php
						if(!$rp[2]){?>
							<input type='text' name='url[]'>
						<?php }
						else{
							echo $rp[2];
						}
						?>
					</td>
					<td><?php
						if(!$rp[2]){?>
							<input type='text' name='precio[]'>
						<?php }
						else{
							echo $rp[3];
						}
						?>
					</td>
					<td>
						
						<?php  if(!$rp[2] && !$rp[3]){ ?><input type="text" name="cod[]" value="<?php echo $rp[0];?>" hidden="hidden"><button type="submit" name="enviar<?php echo $rp[0];?>">Asignar Mecanico</button><?php }
						elseif($rp[2] && $rp[3]){ echo ' Repuesto Cotizado';}
						?>
						
					</td>
				</tr>
				<?php }?>
				</tbody>
			</table>
			</form>
		  </div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	  </div>
	</div>
</div>    
<?php
}

}
?>