<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if(!$_SESSION['rut']){
    session_destroy();
    header("refresh:0; url=index.php");
    die();
}
require_once('DB/db_personas.php');
require_once('DB/db_vehiculos.php');
require_once('DB/db_imagenes.php');
require_once('DB/db_tipo-vehiculo.php');

$cliente = Persona::listarPorTipo(1);
$vehiculo = Vehiculo::listarTodo();

$tipo = Tipo::listarTodo();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vehiculos | Vehiculos</title>
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
    <link type="text/css" rel="stylesheet" href="styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="styles/pace.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
    <link type="text/css" rel="stylesheet" href="styles/jplist-custom.css">
    <link href="script/bootstrapValidator.min.css" rel="stylesheet"></link>
    <link href="styles/fileinput.min.css" media="all" rel="stylesheet" type="text/css">
        <script src="script/fileinput.min.js" type="text/javascript"></script>
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
                    </i><span class="menu-title">Taller</span></a></li>
                    <li class="active"><a href="vehiculo.php"><i class="fa fa-desktop fa-fw">
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
                    <li><a href="cotizacion.php"><i class="fa fa-th-list fa-fw">
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
                            Vehiculos</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="taller.php">Taller</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Vehiculos</li>
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
                                
                <div class="row">
                    <!-- boton para abrir el modal -->
                    <div class="col-lg-12">
                    <button type="button" class="btn btn-red btn-block" data-toggle="modal" data-target="#myModal">Nuevo Vehiculo</button>
                    </div>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Nuevo Vehiculo</h4>
                          </div>
                          <!-- Modal Body -->
                          <div class="modal-body">
                            <form method="post" id="nuevo-vehiculoForm" action="PHP/Formularios/nuevo-vehiculo.php" name="nuevo-vehiculoForm" enctype="multipart/form-data">
                                <div class="row">			
                                    <div class="col-md-12">
                                        <label for="sel1">Seleccione Cliente</label>
                                        <select class="form-control" id="selCliente" name="selCliente">
                                            <option value="0">Seleccione Cliente</option>
                                            <?php
                                            foreach($cliente as $prs){ ?>
                                            <option value="<?php echo $prs[0];?>"><?php echo $prs[0];?> || <?php echo $prs[1];?> <?php echo $prs[2];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row"> <!-- COL Patente Año-->
                                    <!--COL Patente-->
                                    <div class="col-md-6"><div class="form-group">
                                        <label for="inputPatente" class="control-label">Patente</label>
                                        <div class="input-icon right">
                                            <input type="text" id="inputPatente" maxlength="6" name="inputPatente" class="form-control" placeholder="Ingrese N° de Patente"/>
                                        </div>
                                    </div>
                                    </div>
                                    <!--COL Patente-->
                                    <!--COL Año-->
                                    <div class="col-md-6"><div class="form-group">
                                        <label for="inputAño" class="control-label">Año</label>
                                        <div class="input-icon right">
                                            <input type="number" id="inputAno" name="inputAno" placeholder="Ingrese Año" class="form-control" min="1800" maxlength="2017" />
                                        </div>
                                    </div>
                                    </div>
                                    <!--COL Año-->
                                    </div><!-- FIN COL Patente Año-->
                                    <!-- COL Marca Modelo-->
                                    <div class="row">
                                        <!--COL Marca-->
                                        <div class="col-md-6"><div class="form-group">
                                            <label for="inputMarca" class="control-label">Marca</label>
                                            <div class="input-icon right">
                                                <input id="inputMarca" type="text" name="inputMarca" placeholder="Ingrese la Marca" class="form-control" />
                                            </div>
                                        </div>
                                        </div>
                                        <!--FIN COL Marca-->
                                        <!--COL Modelo-->
                                        <div class="col-md-6"><div class="form-group">
                                            <label for="inputModelo" class="control-label">Modelo</label>
                                            <div class="input-icon right">
                                                <input id="inputModelo" name="inputModelo" type="text" placeholder="Ingrese el Modelo" class="form-control" />
                                            </div>
                                        </div>
                                        </div>
                                        <!--FIN COL Modelo-->
                                    </div><!--FIN COL Marca-Modelo-->
                                    <!--INICIO COL COLOR-KILOMETRO-->
                                    <div class="row">
                                        <!--COL Color-->
                                        <div class="col-md-6"><div class="form-group">
                                            <label for="inputColor" class="control-label">Color</label>
                                            <div class="input-icon right">
                                                <input id="inputColor" name="inputColor" onkeypress="return onlyAlphabets(event,this);" type="text" placeholder="Ingrese el Color" class="form-control"/>
                                            </div>
                                        </div>
                                        </div>
                                        <!--FIN COL Color-->
                                        <!--COL Kilometros-->
                                        <div class="col-md-6"><div class="form-group">
                                            <label for="inputKilometros" class="control-label">Kilometros</label>
                                            <div class="input-icon right">
                                                <input id="inputKilometros" name="inputKilometros" type="number" placeholder="Ingrese los Kilometros" class="form-control" />
                                            </div>
                                        </div>
                                        </div>
                                        <!--FIN COL Kilometros-->
                                    </div>
                                    <!--FIN COL Color-Kilometros-->
                                    <div class="row">
                                        <!--COL Tipo Vehiculo -->
                                        <div class="col-lg-6"><div class="form-group">
                                            <label for="sel_tipo">Tipo de Vehiculo</label>
                                            <select class="form-control" id="sel_tipo" name="sel_tipo">
                                                <?php foreach($tipo as $row){ ?>
                                                <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        </div>
                                        <!--FIN COL Tipo Vehiculo -->
                                    </div>
                                    <!--FIN Tipo-Rubro -->
                                    <div class="row">
                                        <div class="col-lg-12"><div class="form-group">
                                            <label for="Imagenes">Imagenes</label>
                                            <!--Boton de cargo imagenes, aplicar video para seguir y darle funcionalidad-->
                                            <input id="fotos" name="fotos[]" type="file" multiple >
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-actions text-right pal">
                                        <span id="resultado"></span>
										<button type="submit" class="btn btn-default" id="bntAgregarVehiculo">Agregar Vehiculo</button> 
                                    </div>
                                </div>
                            </form>
                          </div>
                          <!-- Modal Body -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                        <!-- Modal content-->
                      </div>
                    </div>
                    <!-- Modal -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div id="grid-layout-table-2" class="box jplist">
                                    <div class="jplist-ios-button"><i class="fa fa-sort"></i>jPList Actions</div>
                                    <div class="jplist-panel box panel-top">
                                        <button type="button" data-control-type="reset" data-control-name="reset" data-control-action="reset" class="jplist-reset-btn btn btn-default">Reset<i class="fa fa-share mls"></i></button>
                                        
                                        <div data-control-type="drop-down" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true" class="jplist-drop-down form-control">
                                            <ul class="dropdown-menu">
                                                <li><span data-number="3"> 3 per page</span></li>
                                                <li><span data-number="5"> 5 per page</span></li>
                                                <li><span data-number="10" data-default="true"> 10 per page</span></li>
                                                <li><span data-number="all"> view all</span></li>
                                            </ul>
                                        </div>
                                        <div class="text-filter-box">
                                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input data-path=".patente" type="text" value="" placeholder="Filtro Patente" data-control-type="textbox" data-control-name="patente-filter" data-control-action="filter" class="form-control"/></div>
                                        </div>
                                        <div class="text-filter-box">
                                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input data-path=".marca" type="text" value="" placeholder="Filtro Marca" data-control-type="textbox" data-control-name="marca-filter" data-control-action="filter" class="form-control"/></div>
                                        </div>
                                        <div data-type="Page {current} of {pages}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging" class="jplist-label btn btn-default"></div>
                                        <div data-control-type="pagination" data-control-name="paging" data-control-action="paging" class="jplist-pagination"></div>
                                    </div>
                                    <div class="box text-shadow">
                                        <table class="demo-tbl">
                                            <tr>
                                                <th>Patente</th>
                                                <th>Año</th>
                                                <th>Marca</th>
                                                <th>Modelo</th>
                                                <th>Color</th>
                                                <th>Kilometros</th>
                                                <th>Tipo</th>
                                            </tr>
                                            <?php foreach($vehiculo as $vhc){?>
                                            <tr class="tbl-item">
                                                <td class="patente"><?php echo $vhc[1];?></td>
                                                <td class="año"><?php echo $vhc[2];?></td>
                                                <td class="marca"><?php echo $vhc[3];?></td>
                                                <td class="modelo"><?php echo $vhc[4];?></td>
                                                <td class="color"><?php echo $vhc[5];?></td>
                                                <td class="kilometro"><?php echo $vhc[6];?></td>
                                                <td class="tipo"><?php foreach($tipo as $tp){ if($tp[0]==$vhc[7]){ echo $tp[1];} }?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                        
                                        
                                        
                                    </div>
                                    <div class="box jplist-no-results text-shadow align-center"><p>No results found</p></div>
                                    <div class="jplist-ios-button"><i class="fa fa-sort"></i>jPList Actions</div>
                                    <div class="jplist-panel box panel-bottom">
                                        <div data-control-type="drop-down" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true" class="jplist-drop-down form-control">
                                            <ul class="dropdown-menu">
                                                <li><span data-number="3"> 3 por pagina</span></li>
                                                <li><span data-number="5"> 5 por pagina</span></li>
                                                <li><span data-number="10" data-default="true"> 10 por pagina</span></li>
                                                <li><span data-number="all"> Ver todos</span></li>
                                            </ul>
                                        </div>
                                        <div data-type="{start} - {end} of {all}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging" class="jplist-label btn btn-default"></div>
                                        <div data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true" class="jplist-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="script/jquery-1.10.2.min.js"></script>
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
    <script src="script/jplist.min.js"></script>
    <script src="script/jplist.js"></script>
    <!--LOADING SCRIPTS FOR CHARTS-->
    <script src="script/highcharts.js"></script>
    <script src="script/data.js"></script>
    <script src="script/drilldown.js"></script>
    <script src="script/exporting.js"></script>
    <script src="script/highcharts-more.js"></script>
    <script src="script/charts-highchart-pie.js"></script>
    <script src="script/charts-highchart-more.js"></script>
    <script src="script/bootstrapValidator.min.js"></script>
    <script src="JS/Validadores/nuevo_vehiculo.js"></script> 
    <script src="JS/cargar_contenido.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="script/main.js"></script>
    <script>
        function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
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
