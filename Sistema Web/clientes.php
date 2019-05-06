<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if(!$_SESSION['rut']){
    session_destroy();
    header("refresh:0; url=index.php");
    die();
}
require_once('DB/db_personas.php');

$persona = Persona::listarTodo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clientes | Clientes</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <li><a href="vehiculo.php"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Vehiculos</span></a>
                       
                    </li>
                    <li class="active"><a href="clientes.php"><i class="fa fa-send-o fa-fw">
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
                            Clientes</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="taller.php">Taller</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Cliente</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Cliente</li>
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
                    <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">Nuevo Cliente</button>
                    </div>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Nuevo Cliente</h4>
                         </div>
                          <!-- Modal Body -->
                        <div class="modal-body">
                            <form method="post" id="nuevoCliente" name="nuevoCliente" action="PHP/Formularios/nuevocliente.php">
                                <!--INICIO COL RUT-Fecha-->
                                <div class="row">
                                   <!--RUT-->
                                   <div class="col-md-6"><div class="form-group">
                                        <label for="inputRut" class="control-label">Rut</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-address-card"></i>
                                            <input id="inputRut" name="inputRut" maxlength="10" type="text" placeholder="Ingrese Rut" class="form-control" />
                                            <p class="text-info" id="msgerror"></p>
                                        </div>
                                        </div>
                                   </div>
                                   <!--FECHA-->
                                    <div class="col-md-6"><div class="form-group">
                                        <label for="inputFecha" class="control-label">Fecha</label>
                                        <div class='input-group right'>
                                            <!--<i class="fa fa-calendar"></i>-->
                                            <input type="date" name="inputFecha" id="inputFecha" class="form-control" />
                                        </div>
                                        </div>
                                    </div>
                                    <!--FIN FECHA-->
                               </div>
                               <!--FIN COL rut-fecha-->
                                <!--INICIO COL nombre-apellido-->
                                <div class="row">
                                    <!--NOMBRE-->
                                   <div class="col-md-6"><div class="form-group">
                                        <label for="inputNombre" class="control-label">Nombre</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-user"></i>
                                            <input id="inputNombre" name="inputNombre" onkeypress="return onlyAlphabets(event,this);" type="text" placeholder="Ingrese el Nombre" class="form-control" />
                                        </div>
                                        </div>
                                   </div>
                                    <!--Apelido-->
                                   <div class="col-md-6"><div class="form-group">
                                        <label for="inputNombre" class="control-label">Apellido</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-user"></i>
                                            <input id="inputApellido" name="inputApellido" onkeypress="return onlyAlphabets(event,this);" type="text" placeholder="Ingrese el Apellido" class="form-control" />
                                        </div>
                                        </div>
                                   </div>
                                </div>
                                <!--FIN COL nombre-apellido-->
                                <!--INICIO COL direccion-email-->
                                <div class="row">
                                    <!--DIRECCION-->
                                    <div class="col-md-6"><div class="form-group">
                                        <label for="inputDireccion" class="control-label">Direccion</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-home"></i>
                                            <input id="inputDireccion" name="inputDireccion" type="text" placeholder="Ingrese la Direccion" class="form-control" />
                                        </div>
                                        </div>
                                    </div>
                                    <!--FIN DIRECCION-->
                                    <!--EMAIL-->
                                    <div class="col-md-6"><div class="form-group">
                                        <label for="inputEmail" class="control-label">E-Mail</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-envelope"></i>
                                            <input id="inputEmail" name="inputEmail" type="email" placeholder="Ingrese el Email" class="form-control" />
                                        </div>
                                        </div>
                                    </div>
                                    <!--FIN EMAIL-->
                                </div>
                                <!--FIN COL EMAIL-TELEFONO--><!-- -->
                                <div class="row">
                                    <!--TELEFONO1-->
                                    <div class="col-md-6"><div class="form-group">
                                        <label for="inputTelefono" class="control-label">Telefono 1</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-phone"></i>
                                            <input id="inputTelefono1" name="inputTelefono1" type="number" min="0" placeholder="Ingrese n° de Telefono" class="form-control" />
                                        </div>
                                        </div>
                                    </div>
                                    <!--FIN TELEFONO1-->
                                    <!--TELEFONO2-->
                                    <div class="col-md-6"><div class="form-group">
                                        <label for="inputTelefono" class="control-label">Telefono 2</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-phone"></i>
                                            <input id="inputTelefono2" name="inputTelefono2" type="number" min="0" placeholder="Ingrese n° de Telefono" class="form-control" />
                                        </div>
                                        </div>
                                    </div>
                                    <!--FIN TELEFONO2-->
                                </div>
                            
                                <div class="row">
                                    <div class="form-actions text-right pal">
                                        <span id="resultado"></span>
                                        <input type="number" hidden="true" value="1" name="inputTipo"/>
                                        <button type="submit" class="btn btn" id="bntAgregarCliente">Agregar Cliente</button>
                                        <button type="reset" class="btn btn" id="rstfrm">Limpiar</button>
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
                                <div id="grid-layout-table-1" class="box jplist">
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
                                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input data-path=".rut" type="text" value="" placeholder="Filtro rut" data-control-type="textbox" data-control-name="rut-filter" data-control-action="filter" class="form-control"/></div>
                                        </div>
                                        <div class="text-filter-box">
                                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input data-path=".nombre" type="text" value="" placeholder="Filtro nombre" data-control-type="textbox" data-control-name="nombre-filter" data-control-action="filter" class="form-control"/></div>
                                        </div>
                                        <div data-type="Page {current} of {pages}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging" class="jplist-label btn btn-default"></div>
                                        <div data-control-type="pagination" data-control-name="paging" data-control-action="paging" class="jplist-pagination"></div>
                                    </div>
                                    <div class="box text-shadow"><!-- div en el cual van los datos para jplist -->
                                        <table class="demo-tbl">
                                            <tr>
                                                <th>Rut</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>Direccion</th>
                                                <th>Telefono1</th>
                                                <th>Telefono2</th>
                                                <th>Email</th>
                                            </tr>
                                            <?php foreach($persona as $prs){ ?>
                                            <tr class="tbl-item">
                                                <td class="rut"><p><?php echo $prs[0];?></p></td>
                                                <td class="nombre"><?php echo $prs[1];?></td>
                                                <td class="apellido"><?php echo $prs[2];?></td>
                                                <td class="fecha"><?php echo $prs[3];?></td>
                                                <td class="direccion"><?php echo $prs[4];?></td>
                                                <td class="telefono1"><?php echo $prs[5];?></td>
                                                <td class="telefono2"><?php echo $prs[6];?></td>
                                                <td class="email"><?php echo $prs[7];?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    
                                    </div>
                                    <div class="jplist-ios-button"><i class="fa fa-sort"></i>jPList Actions</div>
                                    <div class="jplist-panel box panel-bottom">
                                        <div data-control-type="drop-down" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true" class="jplist-drop-down form-control">
                                            <ul class="dropdown-menu">
                                                <li><span data-number="3"> 3 per page</span></li>
                                                <li><span data-number="5"> 5 per page</span></li>
                                                <li><span data-number="10" data-default="true"> 10 per page</span></li>
                                                <li><span data-number="all"> view all</span></li>
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
    <script src="JS/Validadores/nuevo_cliente.js"></script>
    <!--<script src="JS/Botones/btnnuevo_cliente.js"></script>-->
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

<script>
    
    
   var Fn = {
    // Valida el rut con su cadena completa "XXXXXXXX-X"
    validaRut : function (rutCompleto) {
        rutCompleto = rutCompleto.replace("‐","-");
        if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
            return false;
        var tmp     = rutCompleto.split('-');
        var digv    = tmp[1]; 
        var rut     = tmp[0];
        if ( digv == 'K' ) digv = 'k' ;
        
        return (Fn.dv(rut) == digv );
    },
    dv : function(T){
        var M=0,S=1;
        for(;T;T=Math.floor(T/10))
            S=(S+T%10*(9-M++%6))%11;
        return S?S-1:'k';
    }
}


$("#inputRut").blur(function(){
    if (Fn.validaRut( $("#inputRut").val() )){
        $("#msgerror").html("El rut ingresado es válido");
        
    } else {
        $("#msgerror").html("El Rut no es válido");
        
    }
});
</script>

</body>
</html>
