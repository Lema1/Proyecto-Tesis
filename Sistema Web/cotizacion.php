<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if(!$_SESSION['rut']){
    session_destroy();
    header("refresh:0; url=index.php");
	die();
}

$_SESSION['ttlDesa']=0;
$_SESSION['ttlPint']=0;
require_once('DB/db_personas.php');
$persona = Persona::listarPorTipo(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cotizacion | Cotizacion</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/pace.css">
    <link href="script/bootstrapValidator.min.css" rel="stylesheet"></link>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <link href="kartik-v-bootstrap-fileinput-9e39f4f/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="kartik-v-bootstrap-fileinput-9e39f4f/themes/explorer/theme.css" media="all" rel="stylesheet" type="text/css"/>
	
	<style type="text/css">
<style type="text/css"> 
#capa1{  z-index:1; background-color:#FFFFFF; }
#capa2{ position:absolute; z-index:0; }
</style>
 
</head>
<body>
    <div>
        
        <!--BEGIN BACK TO TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <!--END BACK TO TOP-->
        <!--BEGIN TOPBAR-->
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="taller.php" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">Motorware</span><span style="display: none" class="logo-text-icon">µ</span></a></div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                
                <form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
                    <div class="input-icon right text-white"><a href="#"><i class="fa fa-search"></i></a><input type="text" placeholder="Search here..." class="form-control text-white"/></div>
                </form>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <!-- nombre y foto del usuario --> 
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="images/avatar/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs"><?php echo $_SESSION['nombre'].' '.$_SESSION['apellido'];?></span>&nbsp;<span class="caret"></span></a> <!-- nombre y foto del usuario --> 
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="#"><i class="fa fa-user"></i>My Profile</a></li>
                            <li><a href="#"><i class="fa fa-calendar"></i>My Calendar</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>My Inbox<span class="badge badge-danger">3</span></a></li>
                            <li><a href="#"><i class="fa fa-tasks"></i>My Tasks<span class="badge badge-success">7</span></a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-lock"></i>Lock Screen</a></li>
                            <li><a href="PHP/Formularios/logout.php"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
        <!--END TOPBAR-->
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    
                    <div class="clearfix"></div>
					<li><a href="dashboard.php"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Dashboard</span></a>
                       
                    </li>
                    <li><a href="taller.php"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Taller</span></a>
					
					</li>
                    <li><a href="vehiculo.php"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Vehiculos</span></a>
                       
                    </li>
                    <li><a href="clientes.php"><i class="fa fa-send-o fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Clientes</span></a>
                       
                    </li>
                    <li><a href="inventario.php"><i class="fa fa-edit fa-fw">
                        <div class="icon-bg bg-violet"></div>
                    </i><span class="menu-title">Inventario</span></a>
                      
                    </li>
                    <li class="active"><a href="cotizacion.php"><i class="fa fa-th-list fa-fw">
                        <div class="icon-bg bg-blue"></div>
                    </i><span class="menu-title">Cotizacion</span></a>
                          
                    </li>
					<li><a href="FlujoProcesos.php"><i class="fa fa-th-list fa-fw">
                        <div class="icon-bg bg-blue"></div>
                    </i><span class="menu-title">Flujo de Trabajo</span></a>
                      
                    </li>
                </ul>
            </div>
        </nav>
            <!--END SIDEBAR MENU-->
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Cotizacion</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="taller.php">Taller</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Inicio</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">
                                <div class="col-md-12">
                                    <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                            
		<div class="panel panel-grey">
        <div class="panel-heading">
            
			<ul class="nav nav-pills">
					<li class="active"><a data-toggle="pill" href="#auto">Automovil</a></li>
					<li><a data-toggle="pill" href="#moto">Motocicleta</a></li>
					<li><a data-toggle="pill" href="#camion">Camion</a></li>
				</ul>
        </div>
        <div class="panel-body pan">                                                   
            <div class="panel-body pal">
				

				<div class="tab-content">
					<div id="auto" class="tab-pane fade in active">
						<div class="row-fluid">
							<form action="PHP/Formularios/Cotizaciones/n-coti-auto.php" method="post" id="frm_coti-auto" name="frm_coti-auto" enctype="multipart/form-data">
								<div class="form-group">
									<label for="sel1">Seleccione Cliente</label>
									<!-- LLAMA A LA FUNCION JS AL SELECCIONAR UN CLIENTE DE LA LISTA -->
									<div class="row-fluid">
										<select class="form-control selectpicker" name="cliente" id="cliente" data-show-subtext="true" data-live-search="true" onchange="cargarClienteAU(this.value)">
											<?php
											foreach($persona as $prs){ ?>
											<option data-subtext="<?php echo $prs[0];?>"  value="<?php echo $prs[0];?>"><?php echo $prs[1];?> <?php echo $prs[2];?></option>
											<?php }?>
										</select>
									  </div>
								</div>
								<div class="form-group">
									<div id="cargarAU"><!-- CARGA LOS DATOS DEL CLIENTE Y UN DROPDOWN PARA EL VEHICULO --></div>
								</div>
								<div id="cotiAuto"></div>
								<div class="form-group col-offset"><!-- DIV CONTENEDOR DEL BOTON ACEPTAR -->
									<button class="btn btn-grey btn-block" type="button" name="enviar" onclick="activePost1()" id="enviar" >Aceptar</button>
								</div>
							</form>
						</div>
					</div>
					<div id="moto" class="tab-pane fade">
						<div class="row-fluid">
							<form action="PHP/Formularios/Cotizacion/n-coti-moto.php" method="post" id="frm_coti-moto" name="frm_coti-moto" enctype="multipart/form-data">
								<div class="form-group">
									<label for="sel1">Seleccione Cliente</label>
									<!-- LLAMA A LA FUNCION JS AL SELECCIONAR UN CLIENTE DE LA LISTA -->
									<div class="row-fluid">
										<select class="form-control selectpicker" name="cliente" id="cliente" data-show-subtext="true" data-live-search="true" onchange="cargarClienteMO(this.value)">
											<?php
											foreach($persona as $prs){ ?>
											<option data-subtext="<?php echo $prs[0];?>"  value="<?php echo $prs[0];?>"><?php echo $prs[1];?> <?php echo $prs[2];?></option>
											<?php }?>
										</select>
									  </div>
								</div>
								<div class="form-group">
									<div id="cargarMO"><!-- CARGA LOS DATOS DEL CLIENTE Y UN DROPDOWN PARA EL VEHICULO --></div>
								</div>
								<div id="cotiMoto"></div>
								<div class="form-group col-offset"><!-- DIV CONTENEDOR DEL BOTON ACEPTAR -->
									<button class="btn btn-grey btn-block" type="button" name="enviar" onclick="activePost2()" id="enviar" >Aceptar</button>
								</div>
							</form>
						</div>
					</div>
					<div id="camion" class="tab-pane fade">
						<div class="row-fluid">
							<form action="PHP/Formularios/Cotizacion/n-coti-camion.php" method="post" id="frm_coti-camion" name="frm_coti-camion" enctype="multipart/form-data">
								<div class="form-group">
									<label for="sel1">Seleccione Cliente</label>
									<!-- LLAMA A LA FUNCION JS AL SELECCIONAR UN CLIENTE DE LA LISTA -->
									<div class="row-fluid">
										<select class="form-control selectpicker" name="cliente" id="cliente" data-show-subtext="true" data-live-search="true" onchange="cargarClienteCA(this.value)">
											<?php
											foreach($persona as $prs){ ?>
											<option data-subtext="<?php echo $prs[0];?>"  value="<?php echo $prs[0];?>"><?php echo $prs[1];?> <?php echo $prs[2];?></option>
											<?php }?>
										</select>
									  </div>
								</div>
								<div class="form-group">
									<div id="cargarCA"><!-- CARGA LOS DATOS DEL CLIENTE Y UN DROPDOWN PARA EL VEHICULO --></div>
								</div>
								<div id="cotiCamion"></div>
								<div class="form-group col-offset"><!-- DIV CONTENEDOR DEL BOTON ACEPTAR -->
									<button class="btn btn-grey btn-block" type="button" name="enviar" onclick="activePost3()" id="enviar" >Aceptar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
            </div>
			
            </form>
        </div>
    </div>
							
							
							
                            </div>
                        
                    </div>
                </div>
                <!--END CONTENT-->
                <!--BEGIN FOOTER-->
                <div id="footer">
                    <div class="copyright">
                        <a href="http://themifycloud.com">2014 © KAdmin Responsive Multi-Purpose Template</a></div>
                </div>
                <!--END FOOTER-->
            </div>
            <!--END PAGE WRAPPER-->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="script/jquery-migrate-1.2.1.min.js"></script>
    <script src="script/jquery-ui.js"></script>
    <script src="script/bootstrap.min.js"></script>
    <script src="script/bootstrap-hover-dropdown.js"></script>
    <script src="script/html5shiv.js"></script>
    <script src="script/respond.min.js"></script>
    <script src="script/jquery.metisMenu.js"></script>
    <script src="script/jquery.slimscroll.js"></script>
    <script src="script/jquery.cookie.js"></script>
    <script src="script/icheck.min.js"></script>
    <script src="script/custom.min.js"></script>
    <script src="script/jquery.news-ticker.js"></script>
    <script src="script/jquery.menu.js"></script>
    <script src="script/pace.min.js"></script>
    <script src="script/holder.js"></script>
    <script src="script/responsive-tabs.js"></script>
    <script src="script/jquery.flot.js"></script>
    <script src="script/jquery.flot.categories.js"></script>
    <script src="script/jquery.flot.pie.js"></script>
    <script src="script/jquery.flot.tooltip.js"></script>
    <script src="script/jquery.flot.resize.js"></script>
    <script src="script/jquery.flot.fillbetween.js"></script>
    <script src="script/jquery.flot.stack.js"></script>
    <script src="script/jquery.flot.spline.js"></script>
    <script src="script/zabuto_calendar.min.js"></script>
    <script src="script/index.js"></script>
	
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src="script/bootstrapValidator.min.js"></script>
    
	<script src="script/jquery.min.js"></script>
	<script src="kartik-v-bootstrap-fileinput-9e39f4f/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="kartik-v-bootstrap-fileinput-9e39f4f/js/fileinput.js" type="text/javascript"></script>
    <script src="kartik-v-bootstrap-fileinput-9e39f4f/js/locales/es.js" type="text/javascript"></script>
    <script src="kartik-v-bootstrap-fileinput-9e39f4f/themes/explorer/theme.js" type="text/javascript"></script>
	
	<script src="JS/cargar_contenido.js"></script>
	<script src="JS/Paginas/cotizacion.js"></script>
	
    <!--CORE JAVASCRIPT-->
    <script src="script/main.js"></script>
	<script src="JS/inputFileJS.js"></script>
	<script type="text/javascript">
		function activePost1() {
			$('#frm_coti-auto').submit();
		}
		function activePost2() {
			$('#frm_coti-moto').submit();
		}
		function activePost3() {
			$('#frm_coti-camion').submit();
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			var country = [<?php foreach($vehiculo as $vhl){ ?> '<?php echo $vhl[1];?>',<?php } ?>];
			$("#country").select2({
			  data: country
			});
		});
	</script>
    <script>        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-145464-12', 'auto');
        ga('send', 'pageview');


</script>
</body>
</html>