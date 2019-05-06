
<?php
require_once('../../DB/db_flujoTrabajo.php');
require_once('../../DB/db_espacios.php');
require_once('../../DB/db_danosMecanica.php');
require_once('../../DB/db_danosCarroceria.php');
require_once('../../DB/db_espacios.php');
require_once('../../DB/db_tareas.php');
require_once('../../DB/db_vehiculos.php');
require_once('../../DB/db_personas.php');

$vehiculos = Espacios::buscarEspacioTrabajando();
$mecanicos = Persona::listarPorTipo(2);
/*
foreach($vehiculos as $vl){
	echo $vl[0].' '.$vl[1].' '.$vl[2].'</br>';
}
*/
$espera = Espacios::listarXCategoria(0);
?>

<div class="panel panel-grey">
    <div class="panel-heading">Espera</div>
    <div class="panel-body">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Patente</th>
                <th>Marca</th>
				<th>Modelo</th>
				<th>Color</th>
                <th>Estado</th>
                <th>Detalle</th>
            </tr>
            </thead>
            <tbody>
				<?php $fluEspe = FlujoTrabajo::listarEstado(0);
				if($fluEspe){
				foreach($fluEspe as $fes){?>
					<tr>
                <td class="active"><?php echo $fes[0];?></td>
                <td class="success"><?php echo $fes[1];?></td>
                <td class="warning"><?php echo $fes[2];?></td>
				<td class="warning"><?php echo $fes[3];?></td>
				<td class="warning"><?php echo $fes[4];?></td>
                <td class="danger"><a href="#" data-toggle="modal" data-target="#De<?php echo $fes[0];?>">Detalle</a></td>
			</tr>
				<div class="modal fade" id="De<?php echo $fes[0];?>" role="dialog">
				 <div class="modal-dialog modal-lg">
				   <div class="modal-content">
					 <div class="modal-header">
					   <button type="button" class="close" data-dismiss="modal">&times;</button>
					   <h4 class="modal-title"><?php echo $fes[0];?></h4>
					 </div>
					 <div class="modal-body">
					   <p>This is a large modal.</p>
					 </div>
					 <div class="modal-footer">
					   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 </div>
				   </div>
				 </div>
			   </div>
				<?php } }else{ echo '<tr><td>Sin vehiculos en reparacion de Mecanica</td></tr>';} ?>
            </tbody>
        </table>
    </div>
</div>

<div class="panel panel-grey">
    <div class="panel-heading">Desabolladura</div>
    <div class="panel-body">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Patente</th>
                <th>Marca</th>
				<th>Modelo</th>
				<th>Color</th>
                <th>Estado</th>
                <th>Detalle</th>
            </tr>
            </thead>
            <tbody>
				<?php
				$fluDesa = FlujoTrabajo::listarEstado(1);
				if($fluDesa){
				foreach($fluDesa as $fd){
				?>
            <tr>
                <td class="active"><?php echo $fd[0];?></td>
                <td class="success"><?php echo $fd[1];?></td>
                <td class="warning"><?php echo $fd[2];?></td>
				<td class="warning"><?php echo $fd[3];?></td>
				<td class="warning"><?php echo $fd[4];?></td>
                <td class="danger"><a href="#" data-toggle="modal" data-target="#De<?php echo $fd[0];?>">Detalle</a></td>
			</tr>
				<?php } }else{ echo 'Sin vehiculos en reparacion de Desabolladura';} ?>
            </tbody>
        </table>
    </div>
</div>

 <div class="panel panel-grey">
    <div class="panel-heading">Mecanica</div>
    <div class="panel-body">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Patente</th>
                <th>Marca</th>
				<th>Modelo</th>
				<th>Color</th>
                <th>Estado</th>
                <th>Detalle</th>
            </tr>
            </thead>
            <tbody>
				<?php $fluMeca = FlujoTrabajo::listarEstado(3);
				if($fluMeca){
				foreach($fluMeca as $fm){?>
					<tr>
                <td class="active"><?php echo $fm[0];?></td>
                <td class="success"><?php echo $fm[1];?></td>
                <td class="warning"><?php echo $fm[2];?></td>
				<td class="warning"><?php echo $fm[3];?></td>
				<td class="warning"><?php echo $fm[4];?></td>
                <td class="danger"><a href="#" data-toggle="modal" data-target="#Me<?php echo $fm[0];?>">Detalle</a></td>
			</tr>
				<?php } }else{ echo '<tr><td>Sin vehiculos en reparacion de Mecanica</td></tr>';} ?>
            </tbody>
        </table>
    </div>
</div>

 <div class="panel panel-grey">
    <div class="panel-heading">Pintura</div>
    <div class="panel-body">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Patente</th>
                <th>Marca</th>
				<th>Modelo</th>
				<th>Color</th>
                <th>Estado</th>
                <th>Detalle</th>
            </tr>
            </thead>
            <tbody>
				<?php $fluPint = FlujoTrabajo::listarEstado(2);
				if($fluPint){
				foreach($fluPint as $fm){?>
					<tr>
                <td class="active"><?php echo $fm[0];?></td>
                <td class="success"><?php echo $fm[1];?></td>
                <td class="warning"><?php echo $fm[2];?></td>
				<td class="warning"><?php echo $fm[3];?></td>
				<td class="warning"><?php echo $fm[4];?></td>
                <td class="danger"><a href="#" data-toggle="modal" data-target="#Pi<?php echo $fm[0];?>">Detalle</a></td>
			</tr>
				<?php } }else{ echo '<tr><td>Sin vehiculos en reparacion de Pintura</td></tr>';} ?>
            </tbody>
        </table>
    </div>
</div>

 <div class="panel panel-grey">
    <div class="panel-heading">Limpieza</div>
    <div class="panel-body">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Patente</th>
                <th>Marca</th>
				<th>Modelo</th>
				<th>Color</th>
                <th>Estado</th>
                <th>Detalle</th>
            </tr>
            </thead>
            <tbody>
				<?php $fluLimpieza = FlujoTrabajo::listarEstado(4);
				if($fluLimpieza){
				foreach($fluLimpieza as $fl){?>
					<tr>
                <td class="active"><?php echo $fl[0];?></td>
                <td class="success"><?php echo $fl[1];?></td>
                <td class="warning"><?php echo $fl[2];?></td>
				<td class="warning"><?php echo $fl[3];?></td>
				<td class="warning"><?php echo $fl[4];?></td>
                <td><a class="btn btn-warning" href="PHP/Formularios/finalizar-tarea.php?coti=<?php echo $fl[5];?>&tipo=4">Finalizar Limpieza</a></td>
			</tr>
				<?php } }else{ echo '<tr><td>Sin vehiculos esperando Limpieza</td></tr>';} ?>
            </tbody>
        </table>
    </div>
</div>

 <div class="panel panel-grey">
    <div class="panel-heading">Espera de Entrega</div>
    <div class="panel-body">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Patente</th>
                <th>Marca</th>
				<th>Modelo</th>
				<th>Color</th>
                <th>Estado</th>
                <th>Detalle</th>
            </tr>
            </thead>
            <tbody>
				<?php $fluEntrega = FlujoTrabajo::listarEstado(5);
				if($fluEntrega){
				foreach($fluEntrega as $fe){?>
					<tr>
                <td class="active"><?php echo $fe[0];?></td>
                <td class="success"><?php echo $fe[1];?></td>
                <td class="warning"><?php echo $fe[2];?></td>
				<td class="warning"><?php echo $fe[3];?></td>
				<td class="warning"><?php echo $fe[4];?></td>
                <td><a class="btn btn-warning" href="PHP/Formularios/finalizar-tarea.php?coti=<?php echo $fe[5];?>&tipo=5&vehi=<?php echo $fe[0];?>">Entregar Vehiculo</a></td>
			</tr>
				<?php } }else{ echo '<tr><td>Sin vehiculos Para entregar</td></tr>';} ?>
            </tbody>
        </table>
    </div>
</div>

 <!-- SE CREAN LOS MODALS DE LA DESABOLLADURA -->
 <?php if($fluDesa){
 foreach($fluDesa as $fd){ ?>
 <div class="modal fade" id="De<?php echo $fd[0];?>" role="dialog">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title"><?php echo 'Vehiculo: '.$fd[0];?></h4>
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
					  <?php
					  $vheiDesa= Vehiculo::listarVehiculoPatente($fd[0]);
					  foreach($vheiDesa as $vhd){?>
					  <tr>
						  <td><?php echo $vhd[1];?></td>
						  <td><?php echo $vhd[2];?></td>
						  <td><?php echo $vhd[3];?></td>
						  <td><?php echo $vhd[4];?></td>
						  <td><?php echo $vhd[5];?></td>
					  </tr>
					  <?php }?>
				  </tbody>
				</table>
		  </div>
		  <div class="panel">
			<div class="panel-heading">Tareas</div>
			<form name="asignaMecaDesa" method="post" action="PHP/Formularios/asignar-mecanico.php">
			<table class="table table-reponsive">
				<tr>
					<th>#</th>
					<th>Parte</th>
					<th>Mecanico</th>
					<th>Estado</th>
					<th>Accion</th>
				</tr>
				<?php
				$tareas2 = Tareas::buscarTareaCADesa($fd[5]);//busca las tareas del vehiculo
				if($tareas2){
				foreach($tareas2 as $trs){?>
				<tr>
					<td><?php echo $trs[0];?></td>
					<td><?php echo $trs[1];?></td>
					<td><?php if($trs[3]){echo $trs[3];}else{?>
					<div class="row-fluid">
						<select class="form-control selectpicker" data-show-subtext="true" name="mecanico[]" data-live-search="true" >
							<option value="">Seleccione Mecanico</option>
							<?php foreach($mecanicos as $meca){ ?>
								<option data-subtext="<?php echo $meca[1]?>" value="<?php echo $meca[0]?>"><?php echo $meca[1]?></option>
							<?php } ?>
						</select>
					</div>
					<?php }?></td>
					<td><?php if($trs[4]==0){ echo 'Esperando';}elseif($trs[4]==1){ echo 'Realizandose';}else{echo 'Terminada';}?></td>
					<?php if($trs[4]==0){ ?>
					<input hidden="hidden" name="tarea[]" value="<?php echo $trs[0];?>">
					<?php }?>
					<td>
						<?php
						if(!$trs[4]){?><button type="submit" name="enviar<?php echo $trs[0];?>">Asignar Mecanico</button><?php }
						elseif($trs[3]&&$trs[4]==1){?><a class="btn btn-warning" href="PHP/Formularios/finalizar-tarea.php?cod=<?php echo $trs[0];?>&coti=<?php echo $fd[5];?>&tipo=1">Terminar Tarea</a><?php }
						else{?> <label> Tarea Finalizada</label> <?php }?>
						
					</td>
				</tr>
				<?php } }?>
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
<?php } }?>

<!-- SE CREAN LOS MODALS DE LA MECANICA -->
 <?php if($fluMeca){
 foreach($fluMeca as $fm){ ?>
 <div class="modal fade" id="Me<?php echo $fm[0];?>" role="dialog">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title"><?php echo 'Vehiculo: '.$fm[0];?></h4>
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
					  <?php
					  $vheiMeca= Vehiculo::listarVehiculoPatente($fm[0]);
					  foreach($vheiMeca as $vhd){?>
					  <tr>
						  <td><?php echo $vhd[1];?></td>
						  <td><?php echo $vhd[2];?></td>
						  <td><?php echo $vhd[3];?></td>
						  <td><?php echo $vhd[4];?></td>
						  <td><?php echo $vhd[5];?></td>
					  </tr>
					  <?php }?>
				  </tbody>
				</table>
		  </div>
		  <div class="panel">
			<div class="panel-heading">Tareas</div>
			<form name="asignaMecaMe" method="post" action="PHP/Formularios/asignar-mecanico.php">
			<table class="table table-reponsive">
				<tr>
					<th>#</th>
					<th>Parte</th>
					<th>Repuesto</th>
					<th>Cantidad</th>
					<th>Mecanico</th>
					<th>Estado</th>
					<th>Accion</th>
				</tr>
				<?php
				$tareas2 = Tareas::buscarTareaME($fm[5]);//busca las tareas del vehiculo
				if($tareas2){
				foreach($tareas2 as $trs){?>
				<tr>
					<td><?php echo $trs[0];?></td>
					<td><?php echo $trs[1];?></td>
					<td><?php echo $trs[2];?></td>
					<td><?php echo $trs[3];?></td>
					<td><?php if($trs[4]){echo $trs[4];}else{?>
					<div class="row-fluid">
						<select class="form-control selectpicker" data-show-subtext="true" name="mecanico[]" data-live-search="true" >
							<option value="">Seleccione Mecanico</option>
							<?php foreach($mecanicos as $meca){ ?>
								<option data-subtext="<?php echo $meca[1]?>" value="<?php echo $meca[1]?>"><?php echo $meca[1]?></option>
							<?php } ?>
						</select>
					</div>
					<?php }?></td>
					<td><?php if($trs[5]==0){ echo 'Esperando';}elseif($trs[5]==1){ echo 'Realizandose';}else{echo 'Terminada';}?></td>
					<?php if($trs[5]==0){ ?>
					<input hidden="hidden" name="tarea[]" value="<?php echo $trs[0];?>">
					<?php }?>
					<td>
						<?php
						if(!$trs[4]){?><button type="submit" name="enviar<?php echo $trs[0];?>">Asignar Mecanico</button><?php }
						elseif($trs[4]&&$trs[5]==1){?><a class="btn btn-warning" href="PHP/Formularios/finalizar-tarea.php?cod=<?php echo $trs[0];?>&coti=<?php echo $fm[5];?>&tipo=3">Terminar Tarea</a><?php }
						else{?> <label> Tarea Finalizada</label> <?php }?>
						
					</td>
				</tr>
				<?php } }?>
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
<?php } }?>

<!-- SE CREAN LOS MODALS DE LA PINTURA -->
 <?php if($fluPint){
 foreach($fluPint as $fp){ ?>
 <div class="modal fade" id="Pi<?php echo $fp[0];?>" role="dialog">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title"><?php echo 'Vehiculo: '.$fp[0];?></h4>
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
					  <?php
					  $vheiMeca= Vehiculo::listarVehiculoPatente($fp[0]);
					  foreach($vheiMeca as $vhd){?>
					  <tr>
						  <td><?php echo $vhd[1];?></td>
						  <td><?php echo $vhd[2];?></td>
						  <td><?php echo $vhd[3];?></td>
						  <td><?php echo $vhd[4];?></td>
						  <td><?php echo $vhd[5];?></td>
					  </tr>
					  <?php }?>
				  </tbody>
				</table>
		  </div>
		  <div class="panel">
			<div class="panel-heading">Tareas</div>
			<form name="asignaMecaPI" method="post" action="PHP/Formularios/asignar-mecanico.php">
			<table class="table table-reponsive">
				<tr>
					<th>#</th>
					<th>Parte</th>
					<th>Mecanico</th>
					<th>Estado</th>
					<th>Accion</th>
				</tr>
				<?php
				$tareas2 = Tareas::buscarTareaCAPint($fp[5]);//busca las tareas del vehiculo
				if($tareas2){
				foreach($tareas2 as $trs){?>
				<tr>
					<td><?php echo $trs[0];?></td>
					<td><?php echo $trs[1];?></td>
					<td><?php if($trs[3]){echo $trs[3];}else{?>
					<div class="row-fluid">
						<select class="form-control selectpicker" data-show-subtext="true" name="mecanico[]" data-live-search="true" >
							<option value="">Seleccione Mecanico</option>
							<?php foreach($mecanicos as $meca){ ?>
								<option data-subtext="<?php echo $meca[1]?>" value="<?php echo $meca[1]?>"><?php echo $meca[1]?></option>
							<?php } ?>
						</select>
					</div>
					<?php }?></td>
					<td><?php if($trs[4]==0){ echo 'Esperando';}elseif($trs[4]==1){ echo 'Realizandose';}else{echo 'Terminada';}?></td>
					<?php if($trs[4]==0){ ?>
					<input hidden="hidden" name="tarea[]" value="<?php echo $trs[0];?>">
					<?php }?>
					<td>
						<?php
						if(!$trs[4]){?><button type="submit" name="enviar<?php echo $trs[0];?>">Asignar Mecanico</button><?php }
						elseif($trs[3]&&$trs[4]==1){?><a class="btn btn-warning" href="PHP/Formularios/finalizar-tarea.php?cod=<?php echo $trs[0];?>&coti=<?php echo $fp[5];?>&tipo=2">Terminar Tarea</a><?php }
						else{?> <label> Tarea Finalizada</label> <?php }?>
						
					</td>
				</tr>
				<?php } }?>
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
<?php } }?>
