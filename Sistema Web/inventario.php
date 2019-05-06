<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if(!$_SESSION['rut']){
    session_destroy();
    header("refresh:0; url=index.php");
    die();
}


$active = 0;
if($_POST){
    if($_POST['datos']){
        $datos = unserialize($_POST['datos']);
        $active=1;
    }
    if($_POST['datosAno']){
        $datosAno = unserialize($_POST['datosAno']);
        $active=2;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inventario | Inventario</title>
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
    <script src="Chart.js-2.5.0/dist/Chart.bundle.js"></script>
    <script src="Chart.js-2.5.0/samples/utils.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
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
                    </i><span class="menu-title">Taller</span></a></li>
                    <li><a href="vehiculo.php"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Vehiculos</span></a>
                       
                    </li>
                    <li><a href="clientes.php"><i class="fa fa-send-o fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Clientes</span></a>
                       
                    </li>
                    <li class="active"><a href="inventario.php"><i class="fa fa-edit fa-fw">
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
                            Inventario</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="taller.php">Taller</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Inventario</li>
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
                    
                    
                    <!-- <img src="images/en-construccion.jpg" width="900px" height="500"> -->
                    
                    <div class="col-lg-12">    
                        <ul id="generalTab" class="nav nav-tabs responsive">
                            <li <?php if($active==0){echo 'class="active"';}?>><a href="#inventario" data-toggle="tab">Inventario</a></li>
                            <li <?php if($active==1){echo 'class="active"';}?>><a href="#estadisticasMensual" data-toggle="tab">Estadisticas Mensuales</a></li>
                            <li <?php if($active==2){echo 'class="active"';}?>><a href="#estadisticasAnuales" data-toggle="tab">Estadisticas Anuales</a></li>
                        </ul>
                        <div id="generalTabContent" class="tab-content responsive">
                            <div id="inventario" class="<?php if($active==0){echo 'tab-pane fade in active';}else{echo 'tab-pane fade';}?>">
                                
                               <div id="listarinventario"><!-- div que sirve para cargar la tabla con js --></div>
                                    
                            </div>
                            <div id="estadisticasMensual" class="<?php if($active==1){echo 'tab-pane fade in active';}else{echo 'tab-pane fade';}?>">
                                <form action="PHP/Estadisticas/mes.php" method="get">
                                    <div>
                                        <label>Seleccione el Mes</label>
                                        <select class="form-control" id="selMes" name="selMes">
                                            <option value="0">Seleccione Mes</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                        <button type="submit" class="btn btn-success btn-block">Aceptar</button>
                                    </div>
                                </form>
                                <div id="container" style="width: 75%;">
                                     <img src="images/en-construccion.jpg" width="900px" height="500"> 
                                    <canvas id="canvas"></canvas>
                                </div>
                            </div>
                            
                            <div id="estadisticasAnuales" class="<?php if($active==2){echo 'tab-pane fade in active';}else{echo 'tab-pane fade';}?>">
                                <form action="PHP/Estadisticas/anual.php" method="get">
                                    <div>
                                        <label>Seleccione el Año</label>
                                        <select class="form-control" id="selAno" name="selAno">
                                            <option value="0">Seleccione Año</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                        </select>
                                        <button type="submit" class="btn btn-success btn-block">Aceptar</button>
                                    </div>
                                </form>
                                <div id="container" style="width: 75%;">
                                     <img src="images/en-construccion.jpg" width="900px" height="500"> 
                                    <canvas id="canvas2"></canvas>
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
    
    <script src="script/bootstrapValidator.min.js"></script>
    <script src="JS/Validadores/nuevo_vehiculo.js"></script>
    <script src="JS/Botones/btnNuevoVehiculo.js"></script>
    <script src="JS/cargar_contenido.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="script/main.js"></script>
    
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover(); 
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
