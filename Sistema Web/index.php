<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if($_SESSION['rut']){
    header("refresh:0; url=taller.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link href="script/bootstrapValidator.min.css" rel="stylesheet"></link>
</head>
<body style="background: url('images/bg/12107952-1.jpg') center center fixed;">

    <div class="page-form">
        <div class="panel panel-blue">
            <div class="panel-body pan" id="formulario">
                <form class="form-horizontal" method="post" id="loginForm">
                <div class="form-body pal">
                    <div class="col-md-12 text-center">
                        <h1 style="margin-top: -90px; font-size: 48px; color:#FFF">
                           MotorWare</h1>
                        <br />
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <img src="images/bg/Logo_Motorware.jpg" class="img-responsive" style="margin-top: -10px;" />
                        </div>
                        <div class="col-md-8 text-center">
                            <h1>
                                Inicio Sesion</h1>
                            <br />
                            <p>
                                Sólo tienes que iniciar y te enviaremos en su camino</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-md-3 control-label">
                            Usuario:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputUsuario" name="inputUsuario" type="text" placeholder="Nombre de usuario" class="form-control" maxlength="30" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-3 control-label">
                            Contraseña:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-lock"></i>
                                <input id="inputPassword" name="inputPassword" type="password" placeholder="Ingrese su contraseña" class="form-control" maxlength="15" /></div>
                        </div>
                    </div>
                    <div class="form-group mbn">
                        <div class="col-lg-12" align="right">
                            <div class="form-group mbn">
                                <div class="col-lg-3">
                                    &nbsp;
                                </div>
                                <div class="col-lg-9">
                                    <a href="index.php" class="btn btn-default">Volver</a>&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-default" id="btnIniciar">
                                        Iniciar</button>
                                </div>
                                <span id="resultado"></span>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12 text-center" >
            <a href="#" title="" style="color:#FFF">Forgot Something ?</a>
           
        </div>
    </div>
</body>

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
<!--LOADING SCRIPTS FOR CHARTS-->
<script src="script/highcharts.js"></script>
<script src="script/data.js"></script>
<script src="script/drilldown.js"></script>
<script src="script/exporting.js"></script>
<script src="script/highcharts-more.js"></script>
<script src="script/charts-highchart-pie.js"></script>
<script src="script/charts-highchart-more.js"></script>
<script src="script/bootstrapValidator.min.js"></script>
<script src="JS/Validadores/login.js"></script>
<script src="JS/Botones/btnLogin.js"></script>


</html>
