<?php
require_once('con-SV-BI.php');
require_once('con-SV-WEB.php');


//     

$conWEB = new ConexionWEB();

if($conWEB){
    echo 'conexion al servidor web correcta';
}

$conBI = new ConexionBI();
if($conBI){
    echo 'conexion al servidor bi correcta</br>';
}


function vehiRepar(){
    $conWEB = new ConexionWEB();
    $sql = $conWEB->prepare("CALL extract_vehiculo_repa()");
    
    $sql->execute();
    $respuesta = $sql->fetchAll();
    
    if ($respuesta){
        return $respuesta;
    }
    else { 
        return false;
    }
}
    
    
?>



<h3>Datos de todos los vehiculos para cargar a servidor bi</h3>
<table>
    <thead>
        <tr>
            <th>patente</th>
            <th>ano</th>
            <th>marca</th>
            <th>modelo</th>
            <th>kilmotros</th>
            <th>tipo</th>
			<th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php $vehiculosWEB = vehiRepar();
        foreach($vehiculosWEB as $vhwb){
        ?>
        <tr>
            <td><?php echo $vhwb[0];?></td>
            <td><?php echo $vhwb[1];?></td>
            <td><?php echo $vhwb[2];?></td>
            <td><?php echo $vhwb[3];?></td>
            <td><?php echo $vhwb[4];?></td>
            <td><?php echo $vhwb[5];?></td>
            <td><?php echo $vhwb[6];?></td>
            
        </tr>
        <?php }?>
    </tbody>
</table>

</br></br>

<?php

function agregarVehiculo($patente,$año,$marca,$modelo,$kilometros,$tipo,$fecha){
		$conBI = new ConexionBI();
		$sql = $conBI->prepare("CALL insert_vehi_repa(?,?,?,?,?,?,?)");
		
        $sql->bindParam('1', $patente);
		$sql->bindParam('2', $año); 
		$sql->bindParam('3', $marca);
		$sql->bindParam('4', $modelo); 
		$sql->bindParam('5', $kilometros);
		$sql->bindParam('6', $tipo);
		$sql->bindParam('7', $fecha);
		
		if($sql->execute()){
			return 1;
		}
		else{
			return 2;
		}
	}


?>


<h3>Cargar datos al servidor bi</h3>

<?php $p=0;$tp='';
foreach($vehiculosWEB as $vhInst){
	if($vhInst[5]==1){
		$tp='Automovil';
	}
	if($vhInst[5]==2){
		$tp='Motocicleta';
	}
	if($vhInst[5]==3){
		$tp='Camion';
	}
    $insertVehi = agregarVehiculo($vhInst[0],$vhInst[1],$vhInst[2],$vhInst[3],$vhInst[4],$tp,$vhInst[6]);
    
    if($insertVehi == 1){
        $p++;
        echo $p.'</br>';
    }
}

?>
