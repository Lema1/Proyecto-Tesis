var x = $(document);
x.ready(iniciar);

function iniciar()
{
	x= $("#listarCliente");
	x.load('PHP/Listas/lista_clientes.php');
	
	x= $("#listarVehiculo");
	x.load('PHP/Listas/lista_vehiculos.php');
	
	x= $("#listarinventario");
	x.load('PHP/Listas/lista_inventario.php');
	
	x= $("#lista_menu");
	x.load('PHP/Listas/lista_menu.php');
	
	x= $("#lista_tareas");
	x.load('PHP/Listas/lista_tareas.php');
	
	x= $("#lista_dano_cotizacion");
	x.load('PHP/Listas/lista_danos_cotizacion.php');
	
	x= $("#lista_tareas_mecanico");
	x.load('PHP/Listas/lista_mecanicos.php');
	
	x= $("#alertCotiz");
	x.load('PHP/Listas/lista_alerta_coti.php');
	
	x= $("#lista_flujo");
	x.load('PHP/Listas/lista_flujo.php');
	
	x= $("#cotiAuto");
	x.load('PHP/Formularios/Cotizaciones/coti_auto.php');
	
	x= $("#cotiMoto");
	x.load('PHP/Formularios/Cotizaciones/coti_moto.php');
	
	x= $("#cotiCamion");
	x.load('PHP/Formularios/Cotizaciones/coti_camion.php');
}
