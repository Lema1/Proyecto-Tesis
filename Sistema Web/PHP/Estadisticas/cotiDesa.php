<?php
session_start();
require_once('../../DB/db_danosCarroceria.php');
error_reporting(E_ALL ^ E_NOTICE);
$categoDano = DanosCarroceria::listarCategoria();

// se debe buscar los precios en la db
$cate1 =20000;
$cate2 =35000;
$cate3 =50000;

echo $_SESSION['ttlDesa'];

$catego = $_POST['q'];;
$cod = $_POST['c'];


echo '</br>'.$catego.'</br>';
if($catego==1){
    $precio = $cate1;
}
if($catego==2){
    $precio = $cate2;
}
if($catego==3){
    $precio = $cate3;
}

if($_SESSION['ttlDesa']==0){
    if(!$_SESSION[$cod]){
        if($catego!=0){// si se selecciono una opcion
            $_SESSION[$cod] = $precio;
            $_SESSION['ttlDesa'] = $_SESSION['ttlDesa'] + $precio;
        }
    }
    else{
        if($catego!=0){// si se selecciono una opcion
            $_SESSION[$cod] = $precio;
            $_SESSION['ttlDesa'] = $_SESSION['ttlDesa'] + $precio;
        }
    }
}else{
    if(!$_SESSION[$cod]){
        $_SESSION[$cod] = $precio;
        if($catego!=0){// si se selecciono una opcion
            $_SESSION['ttlDesa'] = $_SESSION['ttlDesa'] + $precio;
        }
    }else{
        if($catego!=0){// si se selecciono una opcion
            $_SESSION['ttlDesa'] = $_SESSION['ttlDesa'] + $precio - $_SESSION[$cod];
            $_SESSION[$cod] = $precio;
        }
        else{
            $_SESSION['ttlDesa'] = $_SESSION['ttlDesa'] - $_SESSION[$cod];
            $_SESSION[$cod]=0;
        }
    }
}
echo $_SESSION['ttlDesa'];
?>