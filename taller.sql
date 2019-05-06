-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 12:58 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taller`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_login` (IN `_user` VARCHAR(30), IN `_password` VARCHAR(75), IN `_persona` VARCHAR(10))  NO SQL
BEGIN
INSERT INTO tbl_login(user, password, persona) 
			VALUES ( _user, _password, _persona);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `extract_vehiculo_repa` ()  NO SQL
BEGIN

SELECT tv.patente,tv.ano,tv.marca,tv.modelo,tv.kilometros,tv.tipo,tft.fecha
FROM tbl_vehiculos tv
INNER JOIN tbl_flujotrabajo tft ON tft.vehiculo=tv.patente;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_cotizacion` (IN `_vehiculo` VARCHAR(6), IN `_cliente` VARCHAR(10), IN `_fecha` DATE, OUT `_id` INT(11))  NO SQL
BEGIN

INSERT INTO tbl_cotizaciones(vehiculo,cliente,fecha,estado) 
VALUES (_vehiculo, _cliente,_fecha,0);

SET _id = LAST_INSERT_ID();

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_danoMecanica` (IN `_parteVehiculo` INT, IN `_cotizacion` INT, IN `_cantidad` INT, OUT `_id` INT(11))  NO SQL
BEGIN

INSERT INTO tbl_danosmecanica (partevehiculo, cotizacion, cantidad, categoria)
VALUES (_parteVehiculo,_cotizacion,_cantidad,3);

SET _id = LAST_INSERT_ID();

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_danosCarroceria` (IN `_partevehiculo` INT(2), IN `_cotizacion` INT(11), IN `_precio` INT(6), IN `_catego` INT(1))  NO SQL
BEGIN

INSERT INTO tbl_danoscarroceria(partevehiculo, cotizacion, precio, categoria) 
VALUES (_partevehiculo, _cotizacion, _precio,_catego);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_flujoTrabajo` (IN `_vehiculo` VARCHAR(6), IN `_cotizacion` INT(11), IN `_fecha` DATE, IN `_estado` INT(1))  NO SQL
BEGIN

INSERT INTO tbl_flujotrabajo(vehiculo, cotizacion, fecha, estado)
VALUES(_vehiculo, _cotizacion, _fecha, _estado);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_gasto_insumo` (IN `_insumo` INT(11), IN `_fecha` DATE, IN `_cantidad` DECIMAL(6,2))  NO SQL
BEGIN

INSERT INTO tbl_gastos_insumos(insumo,fecha,cantidad) VALUES (_insumo, _fecha, _cantidad);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_imagenes` (IN `_ruta` VARCHAR(200), IN `_nombre` VARCHAR(200), IN `_vehiculo` VARCHAR(6))  NO SQL
BEGIN

INSERT INTO tbl_imagenes(ruta, nombre, vehiculo) 
VALUES (_ruta, _nombre, _vehiculo);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_insumo` (IN `_nombre` VARCHAR(30), IN `_descrip` VARCHAR(255), IN `_precio` INT(11), IN `_cantidad` DECIMAL(6,2))  NO SQL
BEGIN

INSERT INTO tbl_insumos(nombre,descripcion,precio,cantidad)
VALUES ( _nombre, _descrip, _precio, _cantidad);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_ordenRepara` (IN `_cotizacion` INT(11), IN `_fecha_ingreso` DATETIME)  NO SQL
BEGIN

INSERT INTO tbl_orden_reparacion(cotizacion,fecha_ingreso)
VALUES (_cotizacion, _fecha_ingreso);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_persona` (IN `_rut` VARCHAR(10), IN `_nombre` VARCHAR(25), IN `_apellido` VARCHAR(25), IN `_fecha` DATE, IN `_direccion` VARCHAR(50), IN `_tel1` INT(9), IN `_tel2` INT(9), IN `_email` VARCHAR(100), IN `_tipo` INT(1))  BEGIN

INSERT INTO tbl_persona(rut, nombre, apellido, fecha_nacimiento, direccion, telefono_1, telefono_2, email, tipo) 
VALUES (_rut,_nombre,_apellido,_fecha,_direccion,_tel1,_tel2,_email,_tipo);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_repuesto` (IN `_nombre` VARCHAR(50), IN `_danoMeca` INT(11))  NO SQL
BEGIN

INSERT INTO tbl_repuestos(nombre, danoMeca)
VALUES(_nombre, _danoMeca);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_rubro` (IN `_nombre` VARCHAR(30))  NO SQL
BEGIN

INSERT INTO tbl_rubro(nombre) VALUES (_nombre);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_tareaCarro` (IN `_dano` INT(11), IN `_categoria` INT(1))  NO SQL
BEGIN

INSERT INTO tbl_tareas (estado, danoCarroceria, categoria) 
VALUES(0, _dano, _categoria);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_tareaMeca` (IN `_dano` INT(11))  NO SQL
BEGIN

INSERT into tbl_tareas(estado, danosMecanica, categoria) 
VALUES(0, _dano, 3);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_tipoVehiculo` (IN `_nombre` VARCHAR(30))  NO SQL
BEGIN

INSERT INTO tbl_tipo_auto(nombre) VALUES (_nombre);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_vehiculo` (IN `_patente` VARCHAR(6), IN `_ano` INT(4), IN `_marca` VARCHAR(15), IN `_modelo` VARCHAR(15), IN `_color` VARCHAR(20), IN `_kilometros` INT(11), IN `_tipo` INT(11))  NO SQL
BEGIN

INSERT INTO tbl_vehiculos(patente, ano, marca, modelo, color, kilometros, tipo, estado) 
VALUES (_patente, _ano, _marca, _modelo, _color, _kilometros, _tipo, 0);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insumo_dia` (IN `_insumo` INT(11), IN `_dia` INT(1))  NO SQL
BEGIN

SELECT ti.codigo AS InsCOD, ti.nombre AS InsNOM, tgi.fecha AS CodGastIns, tgi.cantidad AS GastIns, ti.cantidad AS InsCant
FROM tbl_gastos_insumos tgi
INNER JOIN tbl_insumos ti ON tgi.insumo = ti.codigo

WHERE ti.codigo = _insumo AND  DAY(tgi.fecha) = _dia;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insumo_mes` (IN `_insumo` INT(11), IN `_mes` INT(1))  NO SQL
BEGIN

SELECT ti.codigo,ti.nombre,tgi.fecha,tgi.cantidad 
FROM tbl_gastos_insumos tgi
INNER JOIN tbl_insumos ti ON tgi.insumo = ti.codigo

WHERE ti.codigo = _insumo AND  MONTH(tgi.fecha) = _mes;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login_user` (IN `_mail` VARCHAR(40), IN `_pass` VARCHAR(75))  NO SQL
BEGIN
	SELECT tp.rut 
    from tbl_persona tp 
    INNER JOIN tbl_login tl on tl.user = tp.email
	WHERE tl.user = _mail AND tl.password = _pass;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pregPASS` (IN `user` VARCHAR(30))  NO SQL
SELECT tl.password FROM tbl_login AS tl WHERE tl.user=user$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registro_user` (IN `_rut` VARCHAR(10), IN `_nombre` VARCHAR(25), IN `_apellido` VARCHAR(25), IN `_direccion` VARCHAR(50), IN `_tel1` INT(9), IN `_email` VARCHAR(100), IN `_tipo` INT(1))  NO SQL
BEGIN
INSERT INTO tbl_persona(rut, 
	nombre,
    apellido,
	direccion, 
	telefono_1, 
	email, 
	tipo) 
			VALUES ( 
			_rut,
            _nombre,
            _apellido,
            _direccion, 
			_tel1,
			_email,
			_tipo);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_comprobarTareaDesa` (IN `_cotizacion` INT(11))  NO SQL
BEGIN

SELECT tt.cod, tt.estado
FROM tbl_tareas tt
INNER JOIN tbl_danoscarroceria tdc ON tt.danoCarroceria=tdc.cod
WHERE tdc.cotizacion=_cotizacion AND tdc.categoria=1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_comprobarTareaMeca` (IN `_cotizacion` INT(11))  NO SQL
BEGIN

SELECT tt.cod, tt.estado
FROM tbl_tareas tt
INNER JOIN tbl_danosmecanica tdm ON tt.danosMecanica=tdm.codigo
WHERE tdm.cotizacion=_cotizacion AND tdm.categoria=3;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_comprobarTareaPint` (IN `_cotizacion` INT(11))  NO SQL
BEGIN

SELECT tt.cod, tt.estado
FROM tbl_tareas tt
INNER JOIN tbl_danoscarroceria tdc ON tt.danoCarroceria=tdc.cod
WHERE tdc.cotizacion=_cotizacion AND tdc.categoria=2;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_cotizacion_cod` (IN `_codigo` INT(11))  NO SQL
BEGIN

SELECT * FROM tbl_cotizaciones tc WHERE tc.codigo = _codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_cotizacion_patente` (IN `_patente` VARCHAR(6))  NO SQL
BEGIN

SELECT * FROM tbl_cotizaciones tc WHERE tc.vehiculo = _patente;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_coti_Pendiente` ()  NO SQL
BEGIN

SELECT DISTINCT(tc.codigo),tc.vehiculo,tc.cliente,tc.fecha
FROM tbl_cotizaciones tc
INNER JOIN tbl_danosmecanica tdm ON tc.codigo=tdm.cotizacion
INNER JOIN tbl_repuestos tr ON tdm.codigo=tr.danoMeca
WHERE tr.url IS null OR tr.precio is null;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_danosCA_cotizacion` (IN `_cotizacion` INT(11))  NO SQL
BEGIN

SELECT td.cod, td.partevehiculo,td.precio, td.categoria
FROM tbl_danoscarroceria td 
WHERE td.cotizacion = _cotizacion;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_danosME_cotizacion` (IN `_cotizacion` INT(11))  NO SQL
BEGIN

SELECT tdm.codigo, tdm.partevehiculo, tdm.cantidad, tdm.categoria
FROM tbl_danosmecanica tdm
WHERE tdm.cotizacion = _cotizacion;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_danos_CotiDetalle` (IN `_cotizacion` INT(11))  NO SQL
BEGIN

SELECT td.cod AS codigo, tpv.nombre AS nombre, td.precio AS precio
FROM tbl_danoscarroceria td 
INNER JOIN tbl_partes_vehiculo tpv ON td.partevehiculo = tpv.codigo
WHERE td.cotizacion = _cotizacion;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_espacios_all` ()  NO SQL
BEGIN

SELECT * FROM tbl_espacios;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_espacioVehiculo` (IN `_codigo` INT(3))  NO SQL
BEGIN

SELECT te.vehiculo, tv.ano, tv.marca, tv.modelo, tv.color,tv.kilometros,tv.tipo
FROM tbl_espacios te 
INNER JOIN tbl_vehiculos tv on te.vehiculo = tv.patente
WHERE te.codigo = _codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_espacio_categoria` (IN `_categoria` INT(1))  NO SQL
BEGIN

SELECT * FROM tbl_espacios te 
WHERE te.categoria=_categoria;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_espacio_disponible` (IN `_categoria` INT)  NO SQL
BEGIN

SELECT * FROM tbl_espacios te 
WHERE te.categoria=_categoria AND te.estado=1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_espacio_patente` (IN `_patente` VARCHAR(6))  NO SQL
BEGIN

SELECT te.codigo
FROM tbl_espacios te 
WHERE te.vehiculo=_patente;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_espacio_trabajando` ()  NO SQL
BEGIN

SELECT te.codigo AS CodESP, te.vehiculo AS PaVehi,tc.codigo as CotiCod
FROM tbl_espacios te
INNER JOIN tbl_vehiculos tv ON te.vehiculo=tv.patente
INNER JOIN tbl_cotizaciones tc ON te.vehiculo=tc.vehiculo
WHERE te.estado=2 AND tc.estado=1 AND te.categoria=1 OR te.categoria=2 
ORDER BY te.codigo ASC;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_flujoEstado` (IN `_estado` INT(1))  NO SQL
SELECT tft.vehiculo, tv.marca, tv.modelo, tv.color, tv.estado, tft.cotizacion
FROM tbl_flujotrabajo tft
INNER JOIN tbl_vehiculos tv ON tft.vehiculo=tv.patente
WHERE tft.estado=_estado$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_flujo_trabajo_vehiculo` ()  NO SQL
BEGIN

SELECT te.codigo,te.vehiculo,tv.marca,tv.modelo, tc.codigo
FROM tbl_espacios te
INNER JOIN tbl_vehiculos tv ON te.vehiculo = tv.patente 
INNER JOIN tbl_cotizaciones tc ON te.vehiculo=tc.vehiculo 
INNER JOIN tbl_danoscarroceria td ON tc.codigo=td.cotizacion
WHERE te.estado=2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_imagenes_buscarPatente` (IN `_patente` VARCHAR(6))  NO SQL
BEGIN

SELECT * FROM tbl_imagenes WHERE vehiculo=_patente;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_insumos_all` ()  NO SQL
BEGIN

SELECT * FROM tbl_insumos;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_mail_cotizacion` (IN `_coti` INT(11))  NO SQL
SELECT tp.email,tp.nombre,tp.apellido
FROM tbl_persona tp
INNER JOIN tbl_cotizaciones tc ON tc.cliente=tp.rut
WHERE tc.codigo = _coti$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_orden_Coti` (IN `_cotizacion` INT(11))  NO SQL
BEGIN

SELECT *
FROM tbl_orden_reparacion tor
WHERE tor.cotizacion=_cotizacion;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_parteVehiculo_all` ()  NO SQL
BEGIN

SELECT * FROM tbl_partes_vehiculo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_parteVehiculo_codigo` (IN `_cod` INT(3))  NO SQL
BEGIN

SELECT * FROM tbl_partes_vehiculo tpv
WHERE tpv.codigo=_cod;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_persona_all` ()  NO SQL
BEGIN
SELECT * FROM tbl_persona;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_persona_rut` (IN `_rut` VARCHAR(10))  NO SQL
BEGIN

SELECT * FROM tbl_persona where rut=_rut;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_persona_tipo` (IN `_tipo` INT(1))  NO SQL
BEGIN

SELECT * FROM tbl_persona where tipo=_tipo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_repuesto_coti` (IN `_coti` INT(11))  NO SQL
BEGIN

SELECT tr.codigo,tr.nombre,tr.url,tr.precio
FROM tbl_repuestos tr
INNER JOIN tbl_danosmecanica tdm ON tdm.codigo = tr.danoMeca
WHERE tdm.cotizacion=_coti;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_rubro_all` ()  NO SQL
BEGIN

SELECT codigo,nombre FROM tbl_rubro;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_rubro_codigo` (IN `_codigo` INT(11))  NO SQL
BEGIN

SELECT * FROM tbl_rubro WHERE codigo=_codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_tareas_all` ()  NO SQL
BEGIN

SELECT tt.cod,tpv.nombre,tt.mecanico,tc.vehiculo,tt.estado,tt.categoria
FROM tbl_tareas tt 
INNER JOIN tbl_danoscarroceria td on td.cod = tt.danos 
INNER JOIN tbl_partes_vehiculo tpv on tpv.codigo = td.partevehiculo 
INNER JOIN tbl_cotizaciones tc on tc.codigo = td.cotizacion;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_tareas_CarroDesa` (IN `_cotizacion` INT(11))  NO SQL
BEGIN

SELECT tt.cod,tpv.nombre,tdc.categoria,tt.mecanico,tt.estado
FROM tbl_tareas tt
INNER JOIN tbl_danoscarroceria tdc ON tt.danoCarroceria=tdc.cod
INNER JOIN tbl_partes_vehiculo tpv ON tpv.codigo=tdc.partevehiculo
WHERE tdc.cotizacion= _cotizacion AND tdc.categoria=1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_tareas_CarroPint` (IN `_cotizacion` INT(11))  NO SQL
BEGIN

SELECT tt.cod,tpv.nombre,tdc.categoria,tt.mecanico,tt.estado
FROM tbl_tareas tt
INNER JOIN tbl_danoscarroceria tdc ON tt.danoCarroceria=tdc.cod
INNER JOIN tbl_partes_vehiculo tpv ON tpv.codigo=tdc.partevehiculo
WHERE tdc.cotizacion= _cotizacion AND tdc.categoria=2;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_tareas_Mecanica` (IN `_cotizacion` INT(11))  NO SQL
BEGIN

SELECT tt.cod,tpv.nombre,tr.nombre,tdm.cantidad,tt.mecanico,tt.estado
FROM tbl_tareas tt
INNER JOIN tbl_danosmecanica tdm ON tt.danosMecanica=tdm.codigo
INNER JOIN tbl_partes_vehiculo tpv ON tpv.codigo=tdm.partevehiculo
INNER JOIN tbl_repuestos tr ON tr.danoMeca=tdm.codigo
WHERE tdm.cotizacion= _cotizacion AND tdm.categoria=3;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_tarea_buscar` (IN `_cotizacion` INT(10))  NO SQL
BEGIN

SELECT tt.cod as CodTarea, tt.danos AS CodDano, tpv.nombre AS parteVehi, tt.mecanico, tt.estado,tt.categoria
FROM tbl_tareas tt 
INNER JOIN tbl_danoscarroceria td on tt.danos=td.cod
INNER JOIN tbl_cotizaciones tc ON tc.codigo=td.cotizacion
INNER JOIN tbl_partes_vehiculo tpv ON tpv.codigo=td.partevehiculo
WHERE tc.codigo = _cotizacion;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_tarea_mecanico` (IN `_mecanico` VARCHAR(10))  NO SQL
BEGIN

SELECT tta.codigo AS CodTarActi, tt.cod AS CodTar, tpv.nombre AS PartNom,  tta.duracion AS TarActDura, tta.inicio AS FechaInicio, tt.categoria AS CateTarea
FROM tbl_tareas_activas tta
INNER JOIN tbl_tareas tt ON tta.tarea=tt.cod
INNER JOIN tbl_danoscarroceria td ON tt.danos=td.cod
INNER JOIN tbl_partes_vehiculo tpv ON td.partevehiculo=tpv.codigo
WHERE tt.mecanico=_mecanico AND tta.estado=1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_tarea_patente` (IN `_patente` VARCHAR(6))  NO SQL
BEGIN

SELECT tt.cod,tt.estado,tt.categoria
FROM tbl_tareas tt
INNER JOIN tbl_danoscarroceria td ON tt.danos=td.cod
INNER JOIN tbl_cotizaciones tc ON td.cotizacion = tc.codigo
INNER JOIN tbl_vehiculos tv ON tc.vehiculo = tv.patente
WHERE tv.patente = _patente;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_tipoVehiculo_all` ()  NO SQL
BEGIN

SELECT codigo,nombre FROM tbl_tipo_auto;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_tipoVehiculo_codigo` (IN `_codigo` INT(11))  NO SQL
BEGIN

SELECT * FROM tbl_tipo_auto WHERE codigo=_codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_vehiculo_all` ()  NO SQL
BEGIN

SELECT * FROM tbl_vehiculos;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_vehiculo_coti` (IN `_coti` INT(11))  NO SQL
BEGIN

SELECT tv.patente,tv.ano,tv.marca,tv.modelo,tv.color
FROM tbl_vehiculos tv
INNER JOIN tbl_cotizaciones tc ON tc.vehiculo=tv.patente
WHERE tc.codigo = _coti;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_vehiculo_estado` (IN `_estado` INT(1))  NO SQL
BEGIN

SELECT * FROM tbl_vehiculos WHERE estado=_estado;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_vehiculo_patente` (IN `_patente` VARCHAR(6))  NO SQL
BEGIN

SELECT * FROM tbl_vehiculos WHERE patente=_patente;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_vehiculo_rut` (IN `_persona` VARCHAR(10))  NO SQL
BEGIN

SELECT tv.patente,tv.marca,tv.modelo 
FROM tbl_vehiculos tv 
INNER JOIN tbl_persona_auto tpa on tv.patente = tpa.patente_auto 
WHERE tpa.cod_persona = _persona;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_vehiparaReparar` ()  NO SQL
BEGIN

SELECT * 
FROM tbl_vehiculos tv
WHERE tv.estado=0 OR tv.estado=3;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_cotizacion_estado` (IN `_estado` INT(1), IN `_codigo` INT(11))  NO SQL
BEGIN

UPDATE tbl_cotizaciones tc SET tc.estado = _estado
WHERE tc.codigo = _codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_finalizarTarea` (IN `_codigo` INT(11))  NO SQL
BEGIN

UPDATE tbl_tareas SET estado=2
WHERE cod=_codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_moverFlujo` (IN `_estado` INT(1), IN `_cotizacion` INT(11))  NO SQL
BEGIN

UPDATE tbl_flujotrabajo SET estado=_estado
WHERE cotizacion=_cotizacion;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_persona` (IN `_nombre` VARCHAR(25), IN `_apellido` VARCHAR(25), IN `_fecha` DATE, IN `_direccion` VARCHAR(50), IN `_tel1` INT(9), IN `_tel2` VARCHAR(9), IN `_email` VARCHAR(100), IN `_rut` INT(9))  NO SQL
BEGIN

UPDATE tbl_persona SET nombre=_nombre, fecha_nacimiento=_fecha, direccion=_direccion, telefono_1=_tel1, telefono_2=_tel2, email=_email where rut=_rut;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_repuesto` (IN `_cod` INT(11), IN `_url` TEXT, IN `_precio` INT(7))  NO SQL
BEGIN

UPDATE tbl_repuestos tr SET tr.url = _url, tr.precio = _precio
WHERE tr.codigo=_cod;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_tareas_asignarMecanico` (IN `_codigo` INT(11), IN `_mecanico` VARCHAR(10))  NO SQL
BEGIN

UPDATE tbl_tareas SET mecanico=_mecanico, estado=1
WHERE cod=_codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_vehiculo` (IN `_codigo` INT(11), IN `_patente` VARCHAR(6), IN `_ano` INT(4), IN `_marca` VARCHAR(15), IN `_modelo` VARCHAR(15), IN `_color` VARCHAR(20), IN `_kilometros` INT(11), IN `_tipo` INT(11))  NO SQL
BEGIN

UPDATE tbl_vehiculos 
SET patente=_patente, ano=_ano, marca=_marca, modelo=_modelo, color=_color, kilometros=_kilometros , tipo=_tipo where codigo=_cod;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_vehiculo_estado` (IN `_patente` VARCHAR(6), IN `_estado` INT(1))  NO SQL
BEGIN

UPDATE tbl_vehiculos SET estado = _estado 
WHERE patente = _patente;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cotizaciones`
--

CREATE TABLE `tbl_cotizaciones` (
  `codigo` int(11) NOT NULL,
  `vehiculo` varchar(6) DEFAULT NULL,
  `cliente` varchar(10) DEFAULT NULL,
  `fecha` date NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cotizaciones`
--

INSERT INTO `tbl_cotizaciones` (`codigo`, `vehiculo`, `cliente`, `fecha`, `estado`) VALUES
(28, 'xyls20', '19817730-k', '2017-09-15', 2),
(29, 'arst23', '23958463-2', '2017-09-16', 2),
(30, 'tynn20', '20587092-k', '2017-09-16', 2),
(31, 'kldr56', '5680685-7', '2017-09-16', 2),
(32, 'obdm12', '12579619-2', '2017-09-20', 2),
(33, 'fran02', '20808624-3', '2017-10-20', 2),
(34, 'brwn14', '14688018-5', '2017-10-20', 2),
(35, 'hhgg55', '18341526-3', '2017-10-21', 0),
(36, 'arvd94', '9432974-4', '2017-10-30', 1),
(37, 'mrln10', '10778214-1', '2017-11-02', 2),
(38, 'snst22', '22879058-3', '2017-11-02', 0),
(39, 'crrs63', '6318308-3', '2017-11-02', 2),
(40, 'fprt89', '11888992-4', '2017-11-02', 0),
(41, 'arvd94', '9432974-4', '2017-11-11', 0),
(42, 'pprj11', '11888992-4', '2017-11-11', 2),
(43, 'bgrt23', '19651192-k', '2017-11-11', 1),
(44, 'mtfd14', '17471231-k', '2017-11-11', 2),
(45, 'madc10', '10569802-k', '2017-11-11', 2),
(46, 'ntdg77', '13749921-5', '2017-11-11', 2),
(47, 'brwn14', '14688018-5', '2017-11-11', 0),
(48, 'pbec22', '22474954-6', '2017-11-11', 2),
(49, 'crrs63', '6318308-3', '2017-11-11', 0),
(50, 'rsep10', '10658670-5', '2017-11-11', 2),
(51, 'rsep10', '10658670-5', '2017-11-11', 0),
(52, 'arst23', '23958463-2', '2017-11-11', 0),
(53, 'arst23', '23958463-2', '2017-11-11', 0),
(54, 'ctln17', '17636039-9', '2017-11-11', 0),
(55, 'jnsn14', '14738023-2', '2017-11-11', 0),
(56, 'lyna71', '7247004-4', '2017-11-11', 0),
(57, 'rmra54', '24066692-8', '2017-11-11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danoscarroceria`
--

CREATE TABLE `tbl_danoscarroceria` (
  `cod` int(11) NOT NULL,
  `partevehiculo` int(2) NOT NULL,
  `cotizacion` int(11) NOT NULL,
  `precio` int(6) NOT NULL,
  `categoria` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_danoscarroceria`
--

INSERT INTO `tbl_danoscarroceria` (`cod`, `partevehiculo`, `cotizacion`, `precio`, `categoria`) VALUES
(81, 1, 28, 3434, 1),
(82, 1, 28, 45454, 2),
(83, 3, 28, 1212, 1),
(84, 3, 28, 2323, 2),
(85, 1, 29, 30054, 1),
(86, 1, 29, 30045, 2),
(87, 3, 29, 3000, 1),
(88, 3, 29, 25000, 2),
(89, 12, 30, 27000, 1),
(90, 12, 30, 35566, 2),
(91, 10, 30, 24000, 1),
(92, 10, 30, 15000, 2),
(93, 2, 31, 10000, 2),
(94, 12, 32, 1222, 1),
(95, 12, 32, 12332, 2),
(96, 10, 32, 4553, 1),
(97, 10, 32, 3223, 2),
(98, 3, 34, 12221, 1),
(99, 3, 34, 12312, 2),
(100, 12, 34, 2332, 1),
(101, 12, 34, 2332, 2),
(102, 2, 35, 200, 1),
(103, 8, 36, 20000, 1),
(104, 8, 36, 20000, 2),
(105, 3, 37, 15000, 1),
(106, 3, 37, 20000, 2),
(107, 2, 38, 10001, 1),
(108, 2, 38, 10002, 2),
(109, 2, 39, 2000, 1),
(110, 2, 39, 1000, 2),
(111, 3, 40, 123123, 1),
(112, 3, 40, 12312, 2),
(113, 2, 42, 2200, 1),
(114, 2, 42, 30, 2),
(115, 13, 42, 200, 1),
(116, 13, 42, 600, 2),
(117, 2, 43, 200, 1),
(118, 2, 43, 5, 2),
(119, 3, 45, 200, 1),
(120, 3, 45, 1000, 2),
(121, 11, 45, 100, 1),
(122, 11, 45, 200, 2),
(123, 1, 48, 200, 1),
(124, 1, 48, 100, 2),
(125, 11, 48, 400, 1),
(126, 11, 48, 200, 2),
(127, 3, 49, 200, 1),
(128, 3, 49, 200, 2),
(129, 6, 49, 200, 1),
(130, 6, 49, 200, 2),
(131, 1, 50, 200, 1),
(132, 1, 50, 200, 2),
(133, 13, 50, 2, 1),
(134, 13, 50, 2, 2),
(135, 2, 53, 522, 1),
(136, 2, 53, 255, 2),
(137, 8, 53, 311, 1),
(138, 8, 53, 322, 2),
(139, 14, 53, 200, 1),
(140, 14, 53, 500, 2),
(141, 3, 55, 200, 1),
(142, 3, 55, 200, 2),
(143, 8, 57, 299, 1),
(144, 8, 57, 300, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danosmecanica`
--

CREATE TABLE `tbl_danosmecanica` (
  `codigo` int(11) NOT NULL,
  `partevehiculo` int(11) NOT NULL,
  `cotizacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `categoria` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_danosmecanica`
--

INSERT INTO `tbl_danosmecanica` (`codigo`, `partevehiculo`, `cotizacion`, `cantidad`, `categoria`) VALUES
(35, 17, 33, 1, 3),
(34, 17, 33, 1, 3),
(33, 17, 33, 2, 3),
(32, 18, 32, 1, 3),
(31, 18, 32, 1, 3),
(30, 18, 32, 1, 3),
(29, 15, 31, 1, 3),
(28, 15, 30, 2, 3),
(27, 15, 30, 1, 3),
(26, 16, 28, 4, 3),
(25, 15, 28, 2, 3),
(24, 15, 28, 1, 3),
(36, 15, 34, 1, 3),
(37, 15, 34, 1, 3),
(38, 15, 35, 3, 3),
(39, 18, 35, 2, 3),
(40, 19, 35, 4, 3),
(41, 15, 36, 2, 3),
(42, 16, 39, 1, 3),
(43, 16, 39, 1, 3),
(44, 15, 41, 4, 3),
(45, 17, 41, 4, 3),
(46, 18, 41, 2, 3),
(47, 20, 41, 2, 3),
(48, 15, 42, 4, 3),
(49, 15, 42, 2, 3),
(50, 15, 42, 2, 3),
(51, 18, 42, 4, 3),
(52, 17, 43, 4, 3),
(53, 17, 43, 3, 3),
(54, 17, 43, 7, 3),
(55, 15, 44, 5, 3),
(56, 18, 44, 2, 3),
(57, 19, 44, 4, 3),
(58, 16, 45, 4, 3),
(59, 17, 46, 4, 3),
(60, 20, 46, 3, 3),
(61, 15, 47, 4, 3),
(62, 18, 47, 2, 3),
(63, 20, 47, 1, 3),
(64, 20, 47, 2, 3),
(65, 16, 49, 5, 3),
(66, 18, 49, 4, 3),
(67, 18, 49, 5, 3),
(68, 20, 49, 2, 3),
(69, 20, 49, 3, 3),
(70, 16, 50, 5, 3),
(71, 16, 50, 5, 3),
(72, 15, 51, 200, 3),
(73, 15, 54, 200, 3),
(74, 17, 54, 300, 3),
(75, 18, 54, 200, 3),
(76, 20, 54, 100, 3),
(77, 16, 55, 200, 3),
(78, 17, 55, 200, 3),
(79, 18, 55, 200, 3),
(80, 16, 56, 1, 3),
(81, 17, 56, 2, 3),
(82, 18, 56, 5, 3),
(83, 19, 56, 3, 3),
(84, 15, 57, 5, 3),
(85, 19, 57, 13, 3),
(86, 20, 57, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_espacios`
--

CREATE TABLE `tbl_espacios` (
  `codigo` int(3) NOT NULL,
  `vehiculo` varchar(6) DEFAULT NULL,
  `estado` int(1) NOT NULL,
  `categoria` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_espacios`
--

INSERT INTO `tbl_espacios` (`codigo`, `vehiculo`, `estado`, `categoria`) VALUES
(1, 'arvd94', 2, 1),
(2, 'bgrt23', 2, 1),
(3, NULL, 1, 1),
(4, NULL, 1, 1),
(5, 'mtfd14', 2, 1),
(6, NULL, 1, 1),
(8, NULL, 1, 0),
(9, NULL, 1, 0),
(10, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flujotrabajo`
--

CREATE TABLE `tbl_flujotrabajo` (
  `codigo` int(11) NOT NULL,
  `vehiculo` varchar(6) NOT NULL,
  `cotizacion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_flujotrabajo`
--

INSERT INTO `tbl_flujotrabajo` (`codigo`, `vehiculo`, `cotizacion`, `fecha`, `estado`) VALUES
(1, 'kldr56', 31, '2017-09-16', 6),
(2, 'tynn20', 30, '2017-09-16', 6),
(3, 'arst23', 29, '2017-09-16', 6),
(4, 'xyls20', 28, '2017-09-16', 6),
(5, 'obdm12', 32, '2017-09-20', 6),
(7, 'fran02', 33, '2017-09-20', 6),
(10, 'xyls20', 28, '2017-10-30', 6),
(11, 'mrln10', 37, '2017-11-02', 6),
(12, 'xyls20', 28, '2017-11-11', 6),
(13, 'pprj11', 42, '2017-11-11', 6),
(14, 'bgrt23', 43, '2017-11-11', 2),
(15, 'mtfd14', 44, '2017-11-11', 6),
(16, 'mtfd14', 44, '2017-11-11', 6),
(17, 'madc10', 45, '2017-11-11', 6),
(18, 'brwn14', 34, '2017-10-11', 6),
(19, 'ntdg77', 46, '2017-10-11', 6),
(20, 'pbec22', 48, '2017-10-11', 6),
(21, 'crrs63', 39, '2017-08-11', 6),
(22, 'rsep10', 50, '2017-11-11', 6),
(23, 'rmra54', 57, '2017-11-11', 6),
(24, 'arvd94', 36, '2017-11-30', 2),
(25, 'bgrt23', 43, '2017-11-30', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gastos_insumos`
--

CREATE TABLE `tbl_gastos_insumos` (
  `codigo` int(10) NOT NULL,
  `insumo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` decimal(6,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gastos_insumos`
--

INSERT INTO `tbl_gastos_insumos` (`codigo`, `insumo`, `fecha`, `cantidad`) VALUES
(1, 1, '2017-07-18', '-1.00'),
(2, 2, '2017-03-02', '-1.00'),
(3, 3, '2017-03-02', '-1.00'),
(4, 1, '2017-03-05', '-0.50'),
(5, 2, '2017-03-05', '-0.25'),
(6, 3, '2017-03-05', '-0.75'),
(7, 1, '2017-03-07', '-2.00'),
(8, 2, '2017-03-08', '-2.00'),
(9, 3, '2017-03-09', '-2.00'),
(10, 1, '2017-03-15', '-1.25'),
(11, 2, '2017-03-16', '-1.25'),
(12, 3, '2017-03-16', '-1.50'),
(13, 1, '2017-03-22', '-2.00'),
(14, 2, '2017-03-24', '-1.75'),
(15, 3, '2017-03-25', '-1.50'),
(16, 1, '2017-03-15', '-1.25'),
(17, 2, '2017-03-16', '-0.25'),
(18, 3, '2017-03-16', '-0.75'),
(19, 1, '2017-04-02', '-1.00'),
(20, 2, '2017-04-02', '-1.00'),
(21, 3, '2017-04-02', '-1.00'),
(22, 1, '2017-04-05', '-0.50'),
(23, 2, '2017-04-05', '-0.25'),
(24, 3, '2017-04-05', '-0.75'),
(25, 1, '2017-04-07', '-2.00'),
(26, 2, '2017-04-08', '-2.00'),
(27, 3, '2017-04-09', '-2.00'),
(28, 1, '2017-04-15', '-1.25'),
(29, 2, '2017-04-16', '-1.25'),
(30, 3, '2017-04-16', '-1.50'),
(31, 1, '2017-04-22', '-2.00'),
(32, 2, '2017-04-24', '-1.75'),
(33, 3, '2017-04-25', '-1.50'),
(34, 1, '2017-04-15', '-1.25'),
(35, 2, '2017-04-16', '-0.25'),
(36, 3, '2017-04-16', '-0.75'),
(38, 3, '2017-06-02', '1.00'),
(39, 3, '2017-06-02', '1.00'),
(40, 1, '2017-06-02', '5.00'),
(41, 2, '2017-06-16', '1.00'),
(42, 2, '2017-06-16', '-3.00'),
(43, 2, '2017-06-16', '-1.00'),
(44, 1, '2017-06-07', '1.00'),
(45, 1, '2017-06-07', '1.00'),
(46, 1, '2017-06-08', '1.00'),
(47, 1, '2017-06-07', '1.00'),
(48, 1, '2017-06-06', '-1.00'),
(49, 1, '2017-06-05', '-1.00'),
(50, 1, '2017-06-04', '-1.00'),
(51, 1, '2017-06-03', '2.00'),
(52, 1, '2017-06-02', '-1.00'),
(53, 1, '2017-06-01', '-0.50'),
(54, 2, '2017-06-07', '1.00'),
(55, 2, '2017-06-06', '1.00'),
(56, 2, '2017-06-05', '1.00'),
(57, 2, '2017-06-04', '1.00'),
(58, 2, '2017-06-03', '-1.00'),
(59, 2, '2017-06-02', '-1.00'),
(60, 2, '2017-06-02', '-1.00'),
(61, 3, '2017-06-08', '1.00'),
(62, 3, '2017-06-07', '1.00'),
(63, 3, '2017-06-06', '1.00'),
(64, 3, '2017-06-05', '-1.00'),
(65, 3, '2017-06-04', '1.00'),
(66, 3, '2017-06-03', '-1.00'),
(67, 3, '2017-06-02', '-1.00'),
(68, 3, '2017-06-01', '1.00'),
(69, 1, '2017-06-16', '4.00'),
(70, 1, '2017-06-16', '-1.00'),
(71, 1, '2017-06-15', '-0.50'),
(72, 1, '2017-06-15', '-0.25'),
(73, 1, '2017-06-14', '-1.00'),
(74, 1, '2017-06-14', '-0.25'),
(75, 1, '2017-06-13', '6.00'),
(76, 1, '2017-06-13', '-1.00'),
(77, 1, '2017-06-12', '-1.00'),
(78, 1, '2017-06-11', '-1.00'),
(79, 1, '2017-06-10', '-1.00'),
(80, 1, '2017-06-10', '-1.00'),
(81, 1, '2017-06-11', '-0.75'),
(82, 1, '2017-06-12', '-1.00'),
(83, 2, '2017-06-16', '6.00'),
(84, 2, '2017-06-16', '-0.25'),
(85, 2, '2017-06-15', '-0.75'),
(86, 2, '2017-06-15', '-0.25'),
(87, 2, '2017-06-14', '-1.00'),
(88, 2, '2017-06-14', '-0.25'),
(89, 2, '2017-06-13', '5.00'),
(90, 2, '2017-06-13', '-1.00'),
(91, 2, '2017-06-12', '-2.00'),
(92, 2, '2017-06-11', '-0.50'),
(93, 2, '2017-06-10', '-0.50'),
(94, 2, '2017-06-10', '-1.00'),
(95, 2, '2017-06-11', '-0.75'),
(96, 2, '2017-06-12', '-1.00'),
(97, 3, '2017-06-16', '4.00'),
(98, 3, '2017-06-16', '-1.00'),
(99, 3, '2017-06-15', '-0.50'),
(100, 3, '2017-06-15', '-0.25'),
(101, 3, '2017-06-14', '-1.00'),
(102, 3, '2017-06-14', '-0.25'),
(103, 3, '2017-06-13', '6.00'),
(104, 3, '2017-06-13', '-1.00'),
(105, 3, '2017-06-12', '-1.00'),
(106, 3, '2017-06-11', '-1.00'),
(107, 3, '2017-06-10', '-1.00'),
(108, 3, '2017-06-10', '-1.00'),
(109, 3, '2017-06-11', '-0.75'),
(110, 3, '2017-06-12', '-1.00'),
(111, 2, '2017-06-16', '-2.00'),
(112, 2, '2017-06-16', '-1.00'),
(113, 2, '2017-07-18', '4.00'),
(114, 1, '2017-06-05', '-2.00'),
(115, 1, '2017-06-12', '3.00'),
(116, 1, '2017-06-21', '-1.00'),
(117, 1, '2017-06-23', '2.00'),
(118, 1, '2017-06-02', '-4.00'),
(119, 1, '2017-06-03', '-1.00'),
(120, 1, '2017-06-09', '6.00'),
(121, 1, '2017-06-12', '-2.00'),
(122, 1, '2017-06-21', '-2.00'),
(123, 1, '2017-06-30', '-2.00'),
(124, 1, '2017-06-28', '2.00'),
(125, 1, '2017-06-21', '-2.00'),
(126, 1, '2017-06-12', '1.00'),
(127, 1, '2017-06-25', '-1.00'),
(128, 1, '2017-06-07', '1.00'),
(129, 1, '2017-06-05', '-1.00'),
(130, 1, '2017-06-03', '-2.00'),
(131, 1, '2017-06-01', '2.00'),
(132, 1, '2017-06-11', '3.00'),
(133, 1, '2017-06-13', '-2.00'),
(134, 1, '2017-06-18', '2.00'),
(135, 1, '2017-06-19', '-2.00'),
(136, 1, '2017-06-23', '1.00'),
(137, 1, '2017-06-21', '-2.00'),
(138, 1, '2017-06-12', '1.00'),
(139, 1, '2017-06-16', '-2.00'),
(140, 1, '2017-06-18', '2.00'),
(141, 1, '2017-06-15', '1.00'),
(142, 2, '2017-06-21', '1.00'),
(143, 2, '2017-06-28', '1.00'),
(144, 2, '2017-06-02', '1.00'),
(145, 2, '2017-06-01', '2.00'),
(146, 2, '2017-06-05', '-2.00'),
(147, 2, '2017-06-12', '-2.00'),
(148, 2, '2017-06-16', '-2.00'),
(149, 2, '2017-06-26', '-5.00'),
(150, 2, '2017-06-15', '-2.00'),
(151, 2, '2017-06-17', '-2.00'),
(152, 2, '2017-06-11', '-4.00'),
(153, 2, '2017-06-22', '-3.00'),
(154, 2, '2017-06-21', '-2.00'),
(155, 2, '2017-06-27', '-2.00'),
(156, 2, '2017-06-29', '-2.00'),
(157, 2, '2017-06-13', '-1.00'),
(158, 2, '2017-06-01', '-2.00'),
(159, 2, '2017-06-05', '-2.00'),
(160, 2, '2017-06-04', '-1.00'),
(161, 2, '2017-06-27', '-2.00'),
(162, 2, '2017-06-12', '1.00'),
(163, 2, '2017-06-13', '2.00'),
(164, 3, '2017-06-14', '2.00'),
(165, 3, '2017-06-02', '1.00'),
(166, 3, '2017-06-05', '2.00'),
(167, 3, '2017-06-09', '3.00'),
(168, 3, '2017-06-10', '2.00'),
(169, 3, '2017-06-20', '2.00'),
(170, 3, '2017-06-19', '5.00'),
(171, 3, '2017-06-17', '2.00'),
(172, 3, '2017-06-26', '2.00'),
(173, 3, '2017-06-13', '2.00'),
(174, 3, '2017-06-16', '-2.00'),
(175, 3, '2017-06-01', '-2.00'),
(176, 3, '2017-06-03', '4.00'),
(177, 3, '2017-06-08', '2.00'),
(178, 3, '2017-06-09', '-2.00'),
(179, 3, '2017-06-16', '-3.00'),
(180, 3, '2017-06-22', '-2.00'),
(181, 3, '2017-06-27', '-2.00'),
(182, 3, '2017-06-15', '-2.00'),
(183, 3, '2017-06-05', '-1.00'),
(184, 4, '2017-06-16', '2.00'),
(185, 4, '2017-06-26', '5.00'),
(186, 4, '2017-06-15', '-2.00'),
(187, 4, '2017-06-17', '2.00'),
(188, 4, '2017-06-11', '4.00'),
(189, 4, '2017-06-22', '3.00'),
(190, 4, '2017-06-21', '-2.00'),
(191, 4, '2017-06-27', '-2.00'),
(192, 4, '2017-06-29', '2.00'),
(193, 4, '2017-06-13', '1.00'),
(194, 4, '2017-06-01', '2.00'),
(195, 4, '2017-06-05', '2.00'),
(196, 4, '2017-06-04', '-1.00'),
(197, 4, '2017-06-27', '-2.00'),
(198, 4, '2017-06-12', '1.00'),
(199, 4, '2017-06-13', '2.00'),
(200, 4, '2017-06-14', '2.00'),
(201, 4, '2017-06-02', '-1.00'),
(202, 4, '2017-06-05', '2.00'),
(203, 5, '2017-06-09', '3.00'),
(204, 5, '2017-06-10', '-2.00'),
(205, 5, '2017-06-20', '-2.00'),
(206, 5, '2017-06-19', '5.00'),
(207, 5, '2017-06-17', '-2.00'),
(208, 5, '2017-06-26', '-2.00'),
(209, 5, '2017-06-13', '-2.00'),
(210, 5, '2017-06-16', '2.00'),
(211, 5, '2017-06-01', '-2.00'),
(212, 5, '2017-06-03', '4.00'),
(213, 5, '2017-06-08', '2.00'),
(214, 5, '2017-06-09', '2.00'),
(215, 5, '2017-06-16', '-3.00'),
(216, 5, '2017-06-22', '2.00'),
(217, 5, '2017-06-27', '2.00'),
(218, 5, '2017-06-15', '-2.00'),
(219, 5, '2017-06-05', '-1.00'),
(220, 1, '2017-07-05', '2.00'),
(221, 1, '2017-07-12', '-3.00'),
(222, 1, '2017-07-21', '-1.00'),
(223, 1, '2017-07-23', '-2.00'),
(224, 1, '2017-07-02', '4.00'),
(225, 1, '2017-07-03', '-1.00'),
(226, 1, '2017-07-09', '6.00'),
(227, 1, '2017-07-12', '-2.00'),
(228, 1, '2017-07-21', '-2.00'),
(229, 1, '2017-07-30', '2.00'),
(230, 1, '2017-07-28', '2.00'),
(231, 1, '2017-07-21', '2.00'),
(232, 1, '2017-07-12', '1.00'),
(233, 1, '2017-07-25', '1.00'),
(234, 1, '2017-07-07', '1.00'),
(235, 1, '2017-07-05', '-1.00'),
(236, 1, '2017-07-03', '-2.00'),
(237, 1, '2017-07-01', '-2.00'),
(238, 1, '2017-07-11', '-3.00'),
(239, 1, '2017-07-13', '-2.00'),
(240, 1, '2017-07-18', '-2.00'),
(241, 1, '2017-07-19', '2.00'),
(242, 1, '2017-07-23', '-1.00'),
(243, 1, '2017-07-21', '2.00'),
(244, 1, '2017-07-12', '1.00'),
(245, 1, '2017-07-16', '2.00'),
(246, 1, '2017-07-18', '2.00'),
(247, 1, '2017-07-15', '1.00'),
(248, 2, '2017-07-21', '1.00'),
(249, 2, '2017-07-28', '-1.00'),
(250, 2, '2017-07-02', '-1.00'),
(251, 2, '2017-07-01', '-2.00'),
(252, 2, '2017-07-05', '2.00'),
(253, 2, '2017-07-12', '2.00'),
(254, 2, '2017-07-16', '-2.00'),
(255, 2, '2017-07-26', '5.00'),
(256, 2, '2017-07-15', '2.00'),
(257, 2, '2017-07-17', '2.00'),
(258, 2, '2017-07-11', '-4.00'),
(259, 2, '2017-07-22', '-3.00'),
(260, 2, '2017-07-21', '2.00'),
(261, 2, '2017-07-27', '2.00'),
(262, 2, '2017-07-29', '2.00'),
(263, 2, '2017-07-13', '1.00'),
(264, 2, '2017-07-01', '2.00'),
(265, 2, '2017-07-05', '2.00'),
(266, 2, '2017-07-04', '1.00'),
(267, 2, '2017-07-27', '-2.00'),
(268, 2, '2017-07-12', '-1.00'),
(269, 2, '2017-07-13', '-2.00'),
(270, 3, '2017-07-14', '-2.00'),
(271, 3, '2017-07-02', '1.00'),
(272, 3, '2017-07-05', '-2.00'),
(273, 3, '2017-07-09', '3.00'),
(274, 3, '2017-07-10', '2.00'),
(275, 3, '2017-07-20', '2.00'),
(276, 3, '2017-07-19', '5.00'),
(277, 3, '2017-07-17', '3.00'),
(278, 3, '2017-07-26', '-2.00'),
(279, 3, '2017-07-13', '2.00'),
(280, 3, '2017-07-16', '2.00'),
(281, 3, '2017-07-01', '2.00'),
(282, 3, '2017-07-03', '4.00'),
(283, 3, '2017-07-08', '2.00'),
(284, 3, '2017-07-09', '-2.00'),
(285, 3, '2017-07-16', '3.00'),
(286, 3, '2017-07-22', '2.00'),
(287, 3, '2017-07-27', '2.00'),
(288, 3, '2017-07-15', '-2.00'),
(289, 3, '2017-07-05', '-1.00'),
(290, 4, '2017-07-16', '2.00'),
(291, 4, '2017-07-26', '5.00'),
(292, 4, '2017-07-15', '-2.00'),
(293, 4, '2017-07-17', '2.00'),
(294, 4, '2017-07-11', '4.00'),
(295, 4, '2017-07-22', '3.00'),
(296, 4, '2017-07-21', '-2.00'),
(297, 4, '2017-07-27', '-2.00'),
(298, 4, '2017-07-29', '2.00'),
(299, 4, '2017-07-13', '1.00'),
(300, 4, '2017-07-01', '2.00'),
(301, 4, '2017-07-05', '2.00'),
(302, 4, '2017-07-04', '-1.00'),
(303, 4, '2017-07-27', '-2.00'),
(304, 4, '2017-07-12', '1.00'),
(305, 4, '2017-07-13', '2.00'),
(306, 4, '2017-07-14', '2.00'),
(307, 4, '2017-07-02', '-1.00'),
(308, 4, '2017-07-05', '2.00'),
(309, 5, '2017-07-09', '3.00'),
(310, 5, '2017-07-10', '-2.00'),
(311, 5, '2017-07-20', '-2.00'),
(312, 5, '2017-07-19', '5.00'),
(313, 5, '2017-07-17', '-2.00'),
(314, 5, '2017-07-26', '-2.00'),
(315, 5, '2017-07-13', '-2.00'),
(316, 5, '2017-07-16', '2.00'),
(317, 5, '2017-07-01', '-2.00'),
(318, 5, '2017-07-03', '4.00'),
(319, 5, '2017-07-08', '2.00'),
(320, 5, '2017-07-09', '2.00'),
(321, 5, '2017-07-16', '-3.00'),
(322, 5, '2017-07-22', '2.00'),
(323, 5, '2017-07-27', '2.00'),
(324, 5, '2017-07-15', '-2.00'),
(325, 5, '2017-07-05', '-1.00'),
(326, 1, '2017-08-05', '-2.00'),
(327, 1, '2017-08-12', '3.00'),
(328, 1, '2017-08-21', '-1.00'),
(329, 1, '2017-08-23', '-2.00'),
(330, 1, '2017-08-02', '-4.00'),
(331, 1, '2017-08-03', '-1.00'),
(332, 1, '2017-08-09', '-6.00'),
(333, 1, '2017-08-12', '2.00'),
(334, 1, '2017-08-21', '2.00'),
(335, 1, '2017-08-30', '-2.00'),
(336, 1, '2017-08-28', '2.00'),
(337, 1, '2017-08-21', '2.00'),
(338, 1, '2017-08-12', '-1.00'),
(339, 1, '2017-08-25', '1.00'),
(340, 1, '2017-08-07', '1.00'),
(341, 1, '2017-08-05', '-1.00'),
(342, 1, '2017-08-03', '2.00'),
(343, 1, '2017-08-01', '-2.00'),
(344, 1, '2017-08-11', '3.00'),
(345, 1, '2017-08-13', '2.00'),
(346, 1, '2017-08-18', '2.00'),
(347, 1, '2017-08-19', '2.00'),
(348, 1, '2017-08-23', '1.00'),
(349, 1, '2017-08-21', '2.00'),
(350, 1, '2017-08-12', '-1.00'),
(351, 1, '2017-08-16', '-2.00'),
(352, 1, '2017-08-18', '-2.00'),
(353, 1, '2017-08-15', '-1.00'),
(354, 2, '2017-08-21', '-1.00'),
(355, 2, '2017-08-28', '-1.00'),
(356, 2, '2017-08-02', '-1.00'),
(357, 2, '2017-08-01', '2.00'),
(358, 2, '2017-08-05', '2.00'),
(359, 2, '2017-08-12', '2.00'),
(360, 2, '2017-08-16', '2.00'),
(361, 2, '2017-08-26', '-5.00'),
(362, 2, '2017-08-15', '-2.00'),
(363, 2, '2017-08-17', '-2.00'),
(364, 2, '2017-08-11', '4.00'),
(365, 2, '2017-08-22', '3.00'),
(366, 2, '2017-08-21', '2.00'),
(367, 2, '2017-08-27', '-2.00'),
(368, 2, '2017-08-29', '2.00'),
(369, 2, '2017-08-13', '1.00'),
(370, 2, '2017-08-01', '-2.00'),
(371, 2, '2017-08-05', '2.00'),
(372, 2, '2017-08-04', '-1.00'),
(373, 2, '2017-08-27', '2.00'),
(374, 2, '2017-08-12', '1.00'),
(375, 2, '2017-08-13', '2.00'),
(376, 3, '2017-08-14', '2.00'),
(377, 3, '2017-08-02', '-1.00'),
(378, 3, '2017-08-05', '-2.00'),
(379, 3, '2017-08-09', '3.00'),
(380, 3, '2017-08-10', '2.00'),
(381, 3, '2017-08-20', '2.00'),
(382, 3, '2017-08-19', '5.00'),
(383, 3, '2017-08-17', '-2.00'),
(384, 3, '2017-08-26', '2.00'),
(385, 3, '2017-08-13', '2.00'),
(386, 3, '2017-08-16', '2.00'),
(387, 3, '2017-08-01', '2.00'),
(388, 3, '2017-08-03', '4.00'),
(389, 3, '2017-08-08', '-2.00'),
(390, 3, '2017-08-09', '2.00'),
(391, 3, '2017-08-16', '3.00'),
(392, 3, '2017-08-22', '2.00'),
(393, 3, '2017-08-27', '-2.00'),
(394, 3, '2017-08-15', '-2.00'),
(395, 3, '2017-08-05', '-1.00'),
(396, 4, '2017-08-16', '2.00'),
(397, 4, '2017-08-26', '5.00'),
(398, 4, '2017-08-15', '-2.00'),
(399, 4, '2017-08-17', '2.00'),
(400, 4, '2017-08-11', '4.00'),
(401, 4, '2017-08-22', '3.00'),
(402, 4, '2017-08-21', '-2.00'),
(403, 4, '2017-08-27', '-2.00'),
(404, 4, '2017-08-29', '2.00'),
(405, 4, '2017-08-13', '1.00'),
(406, 4, '2017-08-01', '2.00'),
(407, 4, '2017-08-05', '2.00'),
(408, 4, '2017-08-04', '-1.00'),
(409, 4, '2017-08-27', '-2.00'),
(410, 4, '2017-08-12', '1.00'),
(411, 4, '2017-08-13', '2.00'),
(412, 4, '2017-08-14', '2.00'),
(413, 4, '2017-08-02', '-1.00'),
(414, 4, '2017-08-05', '2.00'),
(415, 5, '2017-08-09', '3.00'),
(416, 5, '2017-08-10', '-2.00'),
(417, 5, '2017-08-20', '-2.00'),
(418, 5, '2017-08-19', '5.00'),
(419, 5, '2017-08-17', '-2.00'),
(420, 5, '2017-08-26', '-2.00'),
(421, 5, '2017-08-13', '-2.00'),
(422, 5, '2017-08-16', '2.00'),
(423, 5, '2017-08-01', '-2.00'),
(424, 5, '2017-08-03', '4.00'),
(425, 5, '2017-08-08', '2.00'),
(426, 5, '2017-08-09', '2.00'),
(427, 5, '2017-08-16', '-3.00'),
(428, 5, '2017-08-22', '2.00'),
(429, 5, '2017-08-27', '2.00'),
(430, 5, '2017-08-15', '-2.00'),
(431, 5, '2017-08-05', '-1.00'),
(432, 1, '2017-09-05', '2.00'),
(433, 1, '2017-09-12', '3.00'),
(434, 1, '2017-09-21', '-1.00'),
(435, 1, '2017-09-23', '-2.00'),
(436, 1, '2017-09-02', '4.00'),
(437, 1, '2017-09-03', '-1.00'),
(438, 1, '2017-09-09', '6.00'),
(439, 1, '2017-09-12', '2.00'),
(440, 1, '2017-09-21', '-2.00'),
(441, 1, '2017-09-30', '-2.00'),
(442, 1, '2017-09-28', '2.00'),
(443, 1, '2017-09-21', '2.00'),
(444, 1, '2017-09-12', '-1.00'),
(445, 1, '2017-09-25', '1.00'),
(446, 1, '2017-09-07', '-1.00'),
(447, 1, '2017-09-05', '-1.00'),
(448, 1, '2017-09-03', '-2.00'),
(449, 1, '2017-09-01', '2.00'),
(450, 1, '2017-09-11', '3.00'),
(451, 1, '2017-09-13', '-2.00'),
(452, 1, '2017-09-18', '-2.00'),
(453, 1, '2017-09-19', '2.00'),
(454, 1, '2017-09-23', '-1.00'),
(455, 1, '2017-09-21', '2.00'),
(456, 1, '2017-09-12', '-1.00'),
(457, 1, '2017-09-16', '-2.00'),
(458, 1, '2017-09-18', '2.00'),
(459, 1, '2017-09-15', '-1.00'),
(460, 2, '2017-09-21', '1.00'),
(461, 2, '2017-09-28', '-1.00'),
(462, 2, '2017-09-02', '-1.00'),
(463, 2, '2017-09-01', '2.00'),
(464, 2, '2017-09-05', '2.00'),
(465, 2, '2017-09-12', '-2.00'),
(466, 2, '2017-09-16', '2.00'),
(467, 2, '2017-09-26', '5.00'),
(468, 2, '2017-09-15', '-2.00'),
(469, 2, '2017-09-17', '2.00'),
(470, 2, '2017-09-11', '-4.00'),
(471, 2, '2017-09-22', '-3.00'),
(472, 2, '2017-09-21', '2.00'),
(473, 2, '2017-09-27', '2.00'),
(474, 2, '2017-09-29', '-2.00'),
(475, 2, '2017-09-13', '1.00'),
(476, 2, '2017-09-01', '-2.00'),
(477, 2, '2017-09-05', '2.00'),
(478, 2, '2017-09-04', '1.00'),
(479, 2, '2017-09-27', '-2.00'),
(480, 2, '2017-09-12', '1.00'),
(481, 2, '2017-09-13', '-2.00'),
(482, 3, '2017-09-14', '2.00'),
(483, 3, '2017-09-02', '1.00'),
(484, 3, '2017-09-05', '-2.00'),
(485, 3, '2017-09-09', '-3.00'),
(486, 3, '2017-09-10', '-2.00'),
(487, 3, '2017-09-20', '-2.00'),
(488, 3, '2017-09-19', '5.00'),
(489, 3, '2017-09-17', '2.00'),
(490, 3, '2017-09-26', '2.00'),
(491, 3, '2017-09-13', '-2.00'),
(492, 3, '2017-09-16', '2.00'),
(493, 3, '2017-09-01', '2.00'),
(494, 3, '2017-09-03', '4.00'),
(495, 3, '2017-09-08', '2.00'),
(496, 3, '2017-09-09', '-2.00'),
(497, 3, '2017-09-16', '-3.00'),
(498, 3, '2017-09-22', '-2.00'),
(499, 3, '2017-09-27', '-2.00'),
(500, 3, '2017-09-15', '2.00'),
(501, 3, '2017-09-05', '1.00'),
(502, 4, '2017-09-01', '-2.00'),
(503, 4, '2017-09-05', '2.00'),
(504, 4, '2017-09-04', '1.00'),
(505, 4, '2017-09-27', '-2.00'),
(506, 4, '2017-09-12', '1.00'),
(507, 4, '2017-09-13', '-2.00'),
(508, 4, '2017-09-14', '2.00'),
(509, 4, '2017-09-02', '1.00'),
(510, 4, '2017-09-05', '-2.00'),
(511, 4, '2017-09-09', '-3.00'),
(512, 4, '2017-09-10', '-2.00'),
(513, 4, '2017-09-20', '-2.00'),
(514, 4, '2017-09-19', '5.00'),
(515, 4, '2017-09-17', '2.00'),
(516, 4, '2017-09-26', '2.00'),
(517, 4, '2017-09-13', '-2.00'),
(518, 4, '2017-09-16', '2.00'),
(519, 4, '2017-09-01', '2.00'),
(520, 4, '2017-09-03', '4.00'),
(521, 4, '2017-09-08', '2.00'),
(522, 4, '2017-09-09', '-2.00'),
(523, 4, '2017-09-16', '-3.00'),
(524, 4, '2017-09-22', '-2.00'),
(525, 4, '2017-09-27', '-2.00'),
(526, 4, '2017-09-15', '2.00'),
(527, 4, '2017-09-05', '1.00'),
(528, 5, '2017-09-05', '2.00'),
(529, 5, '2017-09-12', '3.00'),
(530, 5, '2017-09-21', '-1.00'),
(531, 5, '2017-09-23', '-2.00'),
(532, 5, '2017-09-02', '4.00'),
(533, 5, '2017-09-03', '-1.00'),
(534, 5, '2017-09-09', '6.00'),
(535, 5, '2017-09-12', '2.00'),
(536, 5, '2017-09-21', '-2.00'),
(537, 5, '2017-09-30', '-2.00'),
(538, 5, '2017-09-28', '2.00'),
(539, 5, '2017-09-21', '2.00'),
(540, 5, '2017-09-12', '-1.00'),
(541, 5, '2017-09-25', '1.00'),
(542, 5, '2017-09-07', '-1.00'),
(543, 5, '2017-09-05', '-1.00'),
(544, 5, '2017-09-03', '-2.00'),
(545, 1, '2017-10-05', '2.00'),
(546, 1, '2017-10-12', '-3.00'),
(547, 1, '2017-10-21', '-1.00'),
(548, 1, '2017-10-23', '2.00'),
(549, 1, '2017-10-02', '4.00'),
(550, 1, '2017-10-03', '1.00'),
(551, 1, '2017-10-09', '6.00'),
(552, 1, '2017-10-12', '-2.00'),
(553, 1, '2017-10-21', '-2.00'),
(554, 1, '2017-10-30', '2.00'),
(555, 1, '2017-10-28', '-2.00'),
(556, 1, '2017-10-21', '-2.00'),
(557, 1, '2017-10-12', '-1.00'),
(558, 1, '2017-10-25', '-1.00'),
(559, 1, '2017-10-07', '1.00'),
(560, 1, '2017-10-05', '1.00'),
(561, 1, '2017-10-03', '2.00'),
(562, 1, '2017-10-01', '-2.00'),
(563, 1, '2017-10-11', '3.00'),
(564, 1, '2017-10-13', '-2.00'),
(565, 1, '2017-10-18', '-2.00'),
(566, 1, '2017-10-19', '2.00'),
(567, 1, '2017-10-23', '1.00'),
(568, 1, '2017-10-21', '2.00'),
(569, 1, '2017-10-12', '-1.00'),
(570, 1, '2017-10-16', '2.00'),
(571, 1, '2017-10-18', '2.00'),
(572, 1, '2017-10-15', '-1.00'),
(573, 2, '2017-10-21', '-1.00'),
(574, 2, '2017-10-28', '1.00'),
(575, 2, '2017-10-02', '1.00'),
(576, 2, '2017-10-01', '-2.00'),
(577, 2, '2017-10-05', '2.00'),
(578, 2, '2017-10-12', '-2.00'),
(579, 2, '2017-10-16', '2.00'),
(580, 2, '2017-10-26', '5.00'),
(581, 2, '2017-10-15', '-2.00'),
(582, 2, '2017-10-17', '2.00'),
(583, 2, '2017-10-11', '4.00'),
(584, 2, '2017-10-22', '3.00'),
(585, 2, '2017-10-21', '-2.00'),
(586, 2, '2017-10-27', '-2.00'),
(587, 2, '2017-10-29', '2.00'),
(588, 2, '2017-10-13', '1.00'),
(589, 2, '2017-10-01', '2.00'),
(590, 2, '2017-10-05', '2.00'),
(591, 2, '2017-10-04', '-1.00'),
(592, 2, '2017-10-27', '-2.00'),
(593, 2, '2017-10-12', '1.00'),
(594, 2, '2017-10-13', '2.00'),
(595, 3, '2017-10-14', '2.00'),
(596, 3, '2017-10-02', '-1.00'),
(597, 3, '2017-10-05', '2.00'),
(598, 3, '2017-10-09', '3.00'),
(599, 3, '2017-10-10', '-2.00'),
(600, 3, '2017-10-20', '-2.00'),
(601, 3, '2017-10-19', '5.00'),
(602, 3, '2017-10-17', '-2.00'),
(603, 3, '2017-10-26', '-2.00'),
(604, 3, '2017-10-13', '-2.00'),
(605, 3, '2017-10-16', '2.00'),
(606, 3, '2017-10-01', '-2.00'),
(607, 3, '2017-10-03', '4.00'),
(608, 3, '2017-10-08', '2.00'),
(609, 3, '2017-10-09', '2.00'),
(610, 3, '2017-10-16', '-3.00'),
(611, 3, '2017-10-22', '2.00'),
(612, 3, '2017-10-27', '2.00'),
(613, 3, '2017-10-15', '-2.00'),
(614, 3, '2017-10-05', '-1.00'),
(615, 4, '2017-10-16', '2.00'),
(616, 4, '2017-10-26', '5.00'),
(617, 4, '2017-10-15', '-2.00'),
(618, 4, '2017-10-17', '2.00'),
(619, 4, '2017-10-11', '4.00'),
(620, 4, '2017-10-22', '3.00'),
(621, 4, '2017-10-21', '-2.00'),
(622, 4, '2017-10-27', '-2.00'),
(623, 4, '2017-10-29', '2.00'),
(624, 4, '2017-10-13', '1.00'),
(625, 4, '2017-10-01', '2.00'),
(626, 4, '2017-10-05', '2.00'),
(627, 4, '2017-10-04', '-1.00'),
(628, 4, '2017-10-27', '-2.00'),
(629, 4, '2017-10-12', '1.00'),
(630, 4, '2017-10-13', '2.00'),
(631, 4, '2017-10-14', '2.00'),
(632, 4, '2017-10-02', '-1.00'),
(633, 4, '2017-10-05', '2.00'),
(634, 5, '2017-10-09', '3.00'),
(635, 5, '2017-10-10', '-2.00'),
(636, 5, '2017-10-20', '-2.00'),
(637, 5, '2017-10-19', '5.00'),
(638, 5, '2017-10-17', '-2.00'),
(639, 5, '2017-10-26', '-2.00'),
(640, 5, '2017-10-13', '-2.00'),
(641, 5, '2017-10-16', '2.00'),
(642, 5, '2017-10-01', '-2.00'),
(643, 5, '2017-10-03', '4.00'),
(644, 5, '2017-10-08', '2.00'),
(645, 5, '2017-10-09', '2.00'),
(646, 5, '2017-10-16', '-3.00'),
(647, 5, '2017-10-22', '2.00'),
(648, 5, '2017-10-27', '2.00'),
(649, 5, '2017-10-15', '-2.00'),
(650, 5, '2017-10-05', '-1.00'),
(651, 3, '2017-11-30', '-10.00'),
(652, 4, '2017-11-30', '-20.00'),
(653, 3, '2017-11-30', '-2.00'),
(654, 3, '2017-11-30', '-2.00'),
(655, 4, '2017-11-30', '-2.00'),
(656, 4, '2017-11-30', '-2.00'),
(657, 1, '2017-12-02', '-8.00');

--
-- Triggers `tbl_gastos_insumos`
--
DELIMITER $$
CREATE TRIGGER `cambio_insumo` AFTER INSERT ON `tbl_gastos_insumos` FOR EACH ROW BEGIN

    UPDATE tbl_insumos ti SET ti.cantidad = ti.cantidad + NEW.cantidad  where NEW.insumo = ti.codigo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_imagenes`
--

CREATE TABLE `tbl_imagenes` (
  `codigo` int(11) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `vehiculo` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_imagenes`
--

INSERT INTO `tbl_imagenes` (`codigo`, `ruta`, `nombre`, `vehiculo`) VALUES
(1, 'Fotos_Vehiculo/xyls20/', 'nissan-skyline-r34-2.jpg', 'xyls20'),
(2, 'Fotos_Vehiculo/xyls20/', 'VA_e4bb4a31ffdd46bfa6e7628611d9fc0a.jpg', 'xyls20'),
(3, 'Fotos_Vehiculo/xyls20/', 'nissan-skyline-r34-2.jpg', 'xyls20'),
(4, 'Fotos_Vehiculo/xyls20/1', 'VA_e4bb4a31ffdd46bfa6e7628611d9fc0a.jpg', 'xyls20'),
(5, 'Fotos_Vehiculo/xyls20/1', 'VA_e4bb4a31ffdd46bfa6e7628611d9fc0a.jpg', 'xyls20'),
(6, 'Fotos_Vehiculo/arst23', 'VA_e4bb4a31ffdd46bfa6e7628611d9fc0a.jpg', 'arst23'),
(7, 'Fotos_Vehiculo/arvd94', 'VA_e4bb4a31ffdd46bfa6e7628611d9fc0a.jpg', 'arvd94'),
(8, 'Fotos_Vehiculo/ctln17', 'descarga.jpg', 'ctln17'),
(9, 'Fotos_Vehiculo/madc10', 'maxresdefault.jpg', 'madc10'),
(10, 'Fotos_Vehiculo/lyna71', 'descarga (1).jpg', 'lyna71'),
(11, 'Fotos_Vehiculo/tynn20', 'descarga (2).jpg', 'tynn20'),
(12, 'Fotos_Vehiculo/dans88', 'descarga (3).jpg', 'dans88'),
(13, 'Fotos_Vehiculo/crln52', 'USC70HOC012E021001.png', 'crln52'),
(14, 'Fotos_Vehiculo/brwn14', 'descarga (4).jpg', 'brwn14'),
(15, 'Fotos_Vehiculo/kldr56', 'images.jpg', 'kldr56'),
(16, 'Fotos_Vehiculo/pprj11', 'descarga (5).jpg', 'pprj11'),
(17, 'Fotos_Vehiculo/mtfd14', 'descarga (6).jpg', 'mtfd14'),
(18, 'Fotos_Vehiculo/ntdg77', 'GAZ_162f2e6b984d43e788222262ee447132.jpg', 'ntdg77'),
(19, 'Fotos_Vehiculo/pbec22', 'hw089063.png', 'pbec22'),
(20, 'Fotos_Vehiculo/crrs63', 'hyundai-i30-side-profile.jpg', 'crrs63'),
(21, 'Fotos_Vehiculo/rsep10', 'hyundai-sonata-730x350.jpg', 'rsep10'),
(22, 'Fotos_Vehiculo/jnsn14', '2017-elantra-ltd-electric-blue-007.jpg', 'jnsn14'),
(23, 'Fotos_Vehiculo/jfln70', 'x08-1488970751-new-maruti-suzuki-alto-800-launching-in-2018-3.jpg.pagespeed.ic.NxAn1PNAwU.jpg', 'jfln70'),
(24, 'Fotos_Vehiculo/snst22', 'descarga (7).jpg', 'snst22'),
(25, 'Fotos_Vehiculo/mrln10', 'images (1).jpg', 'mrln10'),
(26, 'Fotos_Vehiculo/obdm12', 'nissan-sentra-2-plateado-barato_cac0891ca6_3.jpg', 'obdm12'),
(27, 'Fotos_Vehiculo/snst22/2', 'descarga (1).jpg', 'snst22'),
(28, 'Fotos_Vehiculo/snst22/2', 'descarga.jpg', 'snst22'),
(29, 'Fotos_Vehiculo/madc10/3', 'descarga (6).jpg', 'madc10'),
(30, 'Fotos_Vehiculo/madc10/3', 'descarga (7).jpg', 'madc10'),
(31, 'Fotos_Vehiculo/jnsn14/4', 'descarga (1).jpg', 'jnsn14'),
(32, 'Fotos_Vehiculo/jnsn14/4', 'descarga (5).jpg', 'jnsn14'),
(33, 'Fotos_Vehiculo/jnsn14/4', 'images.jpg', 'jnsn14'),
(34, 'Fotos_Vehiculo/pbec22/5', 'descarga (2).jpg', 'pbec22'),
(35, 'Fotos_Vehiculo/dans88/6', 'descarga (6).jpg', 'dans88'),
(36, 'Fotos_Vehiculo/dans88/6', 'descarga (2).jpg', 'dans88'),
(37, 'Fotos_Vehiculo/brwn14/7', 'descarga (1).jpg', 'brwn14'),
(38, 'Fotos_Vehiculo/arvd94/8', 'descarga (7).jpg', 'arvd94'),
(39, 'Fotos_Vehiculo/xyls20/9', 'GAZ_162f2e6b984d43e788222262ee447132.jpg', 'xyls20'),
(40, 'Fotos_Vehiculo/arvd94/11', 'descarga (1).jpg', 'arvd94'),
(41, 'Fotos_Vehiculo/xyls20/12', 'hw089063.png', 'xyls20'),
(42, 'Fotos_Vehiculo/xyls20/12', 'maxresdefault.jpg', 'xyls20'),
(43, 'Fotos_Vehiculo/xyls20/13', 'hw089063.png', 'xyls20'),
(44, 'Fotos_Vehiculo/xyls20/13', 'maxresdefault.jpg', 'xyls20'),
(45, 'Fotos_Vehiculo/brwn14/15', 'descarga.jpg', 'brwn14'),
(46, 'Fotos_Vehiculo/xyls20/16', 'hyundai-i30-side-profile.jpg', 'xyls20'),
(47, 'Fotos_Vehiculo/xyls20/16', 'nissan-skyline-r34-2.jpg', 'xyls20'),
(48, 'Fotos_Vehiculo/xyls20/16', 'images.jpg', 'xyls20'),
(49, 'Fotos_Vehiculo/arvd94/17', 'x08-1488970751-new-maruti-suzuki-alto-800-launching-in-2018-3.jpg.pagespeed.ic.NxAn1PNAwU.jpg', 'arvd94'),
(50, 'Fotos_Vehiculo/arvd94/17', 'x08-1488970751-new-maruti-suzuki-alto-800-launching-in-2018-3.jpg.pagespeed.ic.NxAn1PNAwU.jpg', 'arvd94'),
(51, 'Fotos_Vehiculo/xyls20/19', 'VA_e4bb4a31ffdd46bfa6e7628611d9fc0a.jpg', 'xyls20'),
(52, 'Fotos_Vehiculo/xyls20/19', 'images.jpg', 'xyls20'),
(53, 'Fotos_Vehiculo/xyls20/19', 'VA_e4bb4a31ffdd46bfa6e7628611d9fc0a.jpg', 'xyls20'),
(54, 'Fotos_Vehiculo/mtfd14/22', 'descarga.jpg', 'mtfd14'),
(55, 'Fotos_Vehiculo/madc10/23', 'images.jpg', 'madc10'),
(56, 'Fotos_Vehiculo/ntdg77/24', 'descarga.jpg', 'ntdg77'),
(57, 'Fotos_Vehiculo/xyls20/28', 'descarga (1).jpg', 'xyls20'),
(58, 'Fotos_Vehiculo/xyls20/28', 'descarga (1).jpg', 'xyls20'),
(59, 'Fotos_Vehiculo/arst23/29', 'images.jpg', 'arst23'),
(60, 'Fotos_Vehiculo/arst23/29', 'hyundai-i30-side-profile.jpg', 'arst23'),
(61, 'Fotos_Vehiculo/tynn20/30', 'descarga (3).jpg', 'tynn20'),
(62, 'Fotos_Vehiculo/tynn20/30', 'images (1).jpg', 'tynn20'),
(63, 'Fotos_Vehiculo/kldr56/31', 'USC70HOC012E021001.png', 'kldr56'),
(64, 'Fotos_Vehiculo/obdm12/32', 'descarga (1).jpg', 'obdm12'),
(65, 'Fotos_Vehiculo/obdm12/32', 'hw089063.png', 'obdm12'),
(66, 'Fotos_Vehiculo/brwn14/34', 'descarga (4).jpg', 'brwn14'),
(67, 'Fotos_Vehiculo/brwn14/34', 'maxresdefault.jpg', 'brwn14'),
(68, 'Fotos_Vehiculo/hhgg55', 'descarga (3).jpg', 'hhgg55'),
(69, 'Fotos_Vehiculo/hhgg55/35', 'descarga.jpg', 'hhgg55'),
(70, 'Fotos_Vehiculo/fcbv22', 'images.jpg', 'fcbv22'),
(71, 'Fotos_Vehiculo/dfgt45', 'images.jpg', 'dfgt45'),
(72, 'Fotos_Vehiculo/dgcl22', 'images.jpg', 'dgcl22'),
(73, 'Fotos_Vehiculo/cgty64', 'descarga (7).jpg', 'cgty64'),
(74, 'Fotos_Vehiculo/arvd94/36', 'descarga.jpg', 'arvd94'),
(75, 'Fotos_Vehiculo/fprt89', 'descarga.jpg', 'fprt89'),
(76, 'Fotos_Vehiculo/mrln10/37', 'descarga (1).jpg', 'mrln10'),
(77, 'Fotos_Vehiculo/snst22/38', 'images (1).jpg', 'snst22'),
(78, 'Fotos_Vehiculo/crrs63/39', 'descarga (3).jpg', 'crrs63'),
(79, 'Fotos_Vehiculo/fprt89/40', 'descarga.jpg', 'fprt89'),
(80, 'Fotos_Vehiculo/pprj11/42', 'Desert.jpg', 'pprj11'),
(81, 'Fotos_Vehiculo/pprj11/42', 'Desert.jpg', 'pprj11'),
(82, 'Fotos_Vehiculo/bgrt23/43', 'Penguins.jpg', 'bgrt23'),
(83, 'Fotos_Vehiculo/madc10/45', 'Hydrangeas.jpg', 'madc10'),
(84, 'Fotos_Vehiculo/pbec22/48', 'Koala.jpg', 'pbec22'),
(85, 'Fotos_Vehiculo/pbec22/48', 'Jellyfish.jpg', 'pbec22'),
(86, 'Fotos_Vehiculo/crrs63/49', 'Tulips.jpg', 'crrs63'),
(87, 'Fotos_Vehiculo/crrs63/49', 'Jellyfish.jpg', 'crrs63'),
(88, 'Fotos_Vehiculo/rsep10/50', 'Hydrangeas.jpg', 'rsep10'),
(89, 'Fotos_Vehiculo/rsep10/50', 'Lighthouse.jpg', 'rsep10'),
(90, 'Fotos_Vehiculo/arst23/53', 'Jellyfish.jpg', 'arst23'),
(91, 'Fotos_Vehiculo/arst23/53', 'Koala.jpg', 'arst23'),
(92, 'Fotos_Vehiculo/arst23/53', 'Hydrangeas.jpg', 'arst23'),
(93, 'Fotos_Vehiculo/jnsn14/55', 'Tulips.jpg', 'jnsn14'),
(94, 'Fotos_Vehiculo/rmra54', 'maxresdefault.jpg', 'rmra54'),
(95, 'Fotos_Vehiculo/rmra54/57', 'descarga (3).jpg', 'rmra54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_insumos`
--

CREATE TABLE `tbl_insumos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` decimal(6,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_insumos`
--

INSERT INTO `tbl_insumos` (`codigo`, `nombre`, `descripcion`, `precio`, `cantidad`) VALUES
(1, 'lija al agua', '10 mts', 10000, '24.75'),
(2, 'diluyente', '1 lt', 1000, '10.75'),
(3, 'huaipe blanco', 'bolsa 500 gr', 6000, '60.25'),
(4, 'soldadura', 'envase de 10 unidades', 10000, '74.00'),
(5, 'oxigeno', 'envase de 1m3', 22100, '40.00'),
(6, 'aceite', '1 litro', 10000, '2.00'),
(8, 'Liquido Refrigerante', 'AutoStyle 1 litro', 2990, '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `codigo` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(72) NOT NULL,
  `persona` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`codigo`, `user`, `password`, `persona`) VALUES
(1, 'sp_alvaro@motorware.cl', '$2y$10$gEVdFZtdAVbdvQr0arOn4O.5GYr7.Mjrrl5MQmbuXWs7p6iCBRWL6', '18406924-5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orden_reparacion`
--

CREATE TABLE `tbl_orden_reparacion` (
  `codigo` int(11) NOT NULL,
  `cotizacion` int(11) NOT NULL,
  `fecha_ingreso` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orden_reparacion`
--

INSERT INTO `tbl_orden_reparacion` (`codigo`, `cotizacion`, `fecha_ingreso`) VALUES
(17, 31, '2017-09-16 07:12:26'),
(16, 31, '2017-09-16 06:39:51'),
(15, 30, '2017-09-16 06:17:04'),
(14, 29, '2017-09-16 06:15:57'),
(13, 29, '2017-09-16 06:14:13'),
(12, 28, '2017-09-15 11:09:26'),
(11, 28, '2017-09-15 10:54:28'),
(18, 31, '2017-09-16 07:12:59'),
(19, 30, '2017-09-16 07:15:35'),
(20, 29, '2017-09-16 07:15:46'),
(21, 28, '2017-09-16 07:16:00'),
(22, 32, '2017-09-20 06:11:32'),
(23, 33, '2017-09-20 06:12:30'),
(24, 33, '2017-09-20 06:14:41'),
(25, 28, '2017-10-30 06:29:29'),
(26, 37, '2017-11-02 03:51:04'),
(27, 28, '2017-11-11 12:41:17'),
(28, 42, '2017-11-11 01:07:17'),
(29, 43, '2017-11-11 01:09:02'),
(30, 44, '2017-11-11 01:11:12'),
(31, 44, '2017-11-11 01:13:07'),
(32, 45, '2017-11-11 01:13:50'),
(33, 34, '2017-11-11 01:33:16'),
(34, 46, '2017-11-11 01:35:21'),
(35, 48, '2017-11-11 01:35:38'),
(36, 39, '2017-11-11 01:37:54'),
(37, 50, '2017-11-11 01:38:11'),
(38, 57, '2017-11-11 04:42:04'),
(39, 36, '2017-11-30 06:12:51'),
(40, 43, '2017-11-30 06:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partes_vehiculo`
--

CREATE TABLE `tbl_partes_vehiculo` (
  `codigo` int(2) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_partes_vehiculo`
--

INSERT INTO `tbl_partes_vehiculo` (`codigo`, `nombre`) VALUES
(1, 'Parte Delantera - Parachoque'),
(2, 'Parte Delantera - Mascara'),
(3, 'Parte Delantera - Capo'),
(4, 'Parte Trasera - Parachoque'),
(5, 'Parte Trasera - Maleta'),
(6, 'Lado Derecho - Puerta 1'),
(7, 'Lado Derecho- Puerta 2'),
(8, 'Lado Derecho - Costado Trasero'),
(10, 'Lado Izquierdo - Puerta 1'),
(11, 'Lado Izquierdo - Puerta 2'),
(12, 'Lado Izquierdo - Costado Delan'),
(13, 'Lado Izquierdo - Costado Trase'),
(14, 'Techo'),
(9, 'Lado Derecho- Costado Delanter'),
(15, 'Sistema Frenos'),
(16, 'Combustion y Escape'),
(17, 'Suspensión y dirección'),
(18, 'Rodamientos y retenes'),
(19, 'Calefacción y ventilación'),
(20, 'Espejos y cristales');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_persona`
--

CREATE TABLE `tbl_persona` (
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono_1` int(9) DEFAULT NULL,
  `telefono_2` int(9) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_persona`
--

INSERT INTO `tbl_persona` (`rut`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `telefono_1`, `telefono_2`, `email`, `tipo`) VALUES
('19817730-k', 'Alexis', 'Sanchez', '1980-03-18', 'tocopilla', 87653421, 76341365, 'alexis@chile.cl', 1),
('9432974-4', 'Arturo', 'Vidal', '1973-01-06', 'pasaje rio claro', 59273485, 838742365, 'arturo@chile.cl', 1),
('11888992-4', 'Pepe', 'Rojas', '1960-04-21', 'pasaje antares', 745235756, 53458623, 'pepe@chile.cl', 1),
('19651192-k', 'Gary', 'Medel', '1980-02-27', 'vicuÃ±a maquena', 84952432, 76459023, 'gary@chile.cl', 1),
('17471231-k', 'Matias', 'Fernandez', '1985-09-09', 'calle mexico', 85436523, 85422300, 'mati@chile.cl', 1),
('10569802-k', 'Maximo Decimo ', 'Meridio', '1992-03-05', 'roma', 80023403, 70072342, 'maximo@roma.cl', 1),
('13749921-5', 'Natsu', 'dragneel', '1920-07-18', 'fiore', 74859284, 89934532, 'natsu@fairy.cl', 1),
('14688018-5', 'Bruce', 'Wayne', '1960-12-09', 'gotham', 904324534, 88432353, 'bruce@batman.cl', 1),
('22474954-6', 'Pablo', 'Escobar', '1970-05-04', 'Medellin', 88445023, 90073012, 'patron@pablo.cl', 1),
('6318308-3', 'Carlos', 'Rosas', '1990-08-09', 'parque del este', 90842356, 90604020, 'carlos@chile.cl', 1),
('10658670-5', 'Rosa', 'Espinoza', '1994-11-22', 'puente alto', 84356700, 77018034, 'rosa@espino.cl', 1),
('23958463-2', 'Arya', 'Stark', '1970-12-29', 'Winterfell', 90436533, 77435550, 'arya@stark.cl', 1),
('17636039-9', 'Catelyn', 'Tully', '1930-11-30', 'pasaje polix', 80807734, 84330009, 'catelyn@tully.cl', 1),
('14738023-2', 'Jon', 'Snow', '1940-02-02', 'Castle Black', 60097782, 56789023, 'jon@snow.cl', 1),
('7247004-4', 'Lyanna', 'Mormont', '1950-09-19', 'Winterfell', 405923343, 56709980, 'lyanna@north.cl', 1),
('7077547-6', 'Joffrey', 'Baratheon', '1978-03-15', 'King\'s Landing', 90543657, 889552234, 'joffrey@king.cl', 1),
('20587092-k', 'Tywin', 'Lannister', '1958-09-30', 'Red Castle', 70592849, 660793946, 'tywin@lann.cl', 1),
('20808624-3', 'Frank', 'Castle', '1974-10-30', 'Hell\'s Kitchen', 90806101, 84332145, 'frank@punisher.cl', 1),
('8888647-k', 'Daenerys', 'Targaryen', '2016-10-30', 'Meereen', 602838543, 74348790, 'dragon@mother.cl', 1),
('5285777-5', 'Cersei', 'Lannister', '1980-09-28', 'King\'s Landing', 94598385, 99980943, 'cersi@lann.cl', 1),
('22879058-3', 'Sansa', 'Stark', '1986-10-30', 'Winterfell', 60493465, 90498586, 'sansa@stark.cl', 1),
('10778214-1', 'Margaery', 'Tyrell', '1983-06-27', 'House Tyrell', 85456230, 91109342, 'marga@tyrell.cl', 1),
('5680685-7', 'Khal', 'Drogo', '1939-04-26', 'en algun lugar del este', 88450293, 99000865, 'khal@drogo.cl', 1),
('12579619-2', 'Oberyn', 'Martell', '1983-10-30', 'Dorne', 66540090, 77340054, 'oberyn@dorne.cl', 1),
('10802162-4', 'Marcelo', 'Orellana', '2005-09-30', 'el virrey', 9245500, 90080722, 'chelo@chile.cl', 2),
('19668258-9', 'Felipe', 'Flores', '2000-01-30', 'la florida', 90806101, 84330852, 'ff17@felipe.cl', 2),
('18406924-5', 'Alvaro', 'Orellana', '1993-04-18', NULL, NULL, NULL, 'sp_alvaro@motorware.cl', 3),
('18341526-3', 'rodrigo', 'abello', '2017-01-01', 'alfa123', 98764532, 89453564, 'rorro@rorro.cl', 1),
('8288410-6', 'Veronica', 'Rojas', '1962-01-31', 'el virrey', 8288234, 84330834, 'vero@gmail.com', 1),
('24066692-8', 'Richard', 'Miranda', '1993-04-05', 'alfa123', 234324242, 234234234, 'r.miranda@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_persona_auto`
--

CREATE TABLE `tbl_persona_auto` (
  `codigo` int(11) NOT NULL,
  `cod_persona` varchar(10) NOT NULL,
  `patente_auto` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_persona_auto`
--

INSERT INTO `tbl_persona_auto` (`codigo`, `cod_persona`, `patente_auto`) VALUES
(1, '19817730-k', 'xyls20'),
(2, '19651192-k', 'bgrt23'),
(3, '23958463-2', 'frtr'),
(4, '20808624-3', 'fran02'),
(5, '23958463-2', 'arst23'),
(6, '9432974-4', 'arvd94'),
(7, '17636039-9', 'ctln17'),
(8, '10569802-k', 'madc10'),
(9, '7247004-4', 'lyna71'),
(10, '20587092-k', 'tynn20'),
(11, '8888647-k', 'dans88'),
(12, '5285777-5', 'crln52'),
(13, '14688018-5', 'brwn14'),
(14, '5680685-7', 'kldr56'),
(15, '11888992-4', 'pprj11'),
(16, '17471231-k', 'mtfd14'),
(17, '13749921-5', 'ntdg77'),
(18, '22474954-6', 'pbec22'),
(19, '6318308-3', 'crrs63'),
(20, '10658670-5', 'rsep10'),
(21, '14738023-2', 'jnsn14'),
(22, '7077547-6', 'jfln70'),
(23, '22879058-3', 'snst22'),
(24, '10778214-1', 'mrln10'),
(25, '12579619-2', 'obdm12'),
(26, '18406924-5', 'alor93'),
(29, '13749916', 'dfgt45'),
(28, '5680685-7', 'fcbv22'),
(30, '14738023-2', 'jjrt55'),
(31, '8288410-6', 'cgty64'),
(32, '11888992-4', 'fprt89'),
(33, '24066692-8', 'rmra54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repuestos`
--

CREATE TABLE `tbl_repuestos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `danoMeca` int(11) NOT NULL,
  `url` text,
  `precio` int(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_repuestos`
--

INSERT INTO `tbl_repuestos` (`codigo`, `nombre`, `danoMeca`, `url`, `precio`) VALUES
(5, 'Pastillas de freno', 25, 'asd', 123),
(4, 'Disco Freno', 24, 'asd', 123),
(6, 'Inyectores', 26, 'sasd', 4343),
(7, 'Disco Freno', 27, 'url', 20000),
(8, 'Pastillas de freno', 28, 'url2', 15000),
(9, 'Disco Freno', 29, 'url1', 180000),
(10, 'Kit de rodamiento de rueda', 30, 'url1', 68000),
(11, 'RetÃ©n caja cambios', 31, 'url2', 67888),
(12, 'RetÃ©n de cigÃ¼eÃ±al', 32, 'url3', 45000),
(13, 'Amortiguadores', 33, 'amorti.cl', 15000),
(14, 'Bandejas', 34, 'bande.cl', 8000),
(15, 'Bomba direcciÃ³n hidrÃ¡ulica', 35, 'direccion', 15000),
(16, 'Disco Freno', 36, 'url1', 20000),
(17, 'Pastillas de freno', 37, 'url3', 5780),
(18, 'Bomba freno', 38, 'url1', 12345),
(19, 'RetÃ©n caja cambios', 39, 'url2', 87600),
(20, 'Bomba de agua', 40, 'url3', 67800),
(21, 'Pastillas de freno', 41, 'url1', 8000),
(22, 'Bomba de bencina', 42, 'url', 120000),
(23, 'Bomba inyectora', 43, 'url3', 170500),
(24, 'Pastillas de freno', 44, NULL, NULL),
(25, 'Terminales de direcciÃ³n', 45, NULL, NULL),
(26, 'Kit de rodamiento de rueda', 46, NULL, NULL),
(27, 'Ventanas', 47, NULL, NULL),
(28, 'Disco Freno', 48, NULL, NULL),
(29, 'Pastillas de freno', 49, NULL, NULL),
(30, 'Calipers de freno', 50, NULL, NULL),
(31, 'RetÃ©n de rueda', 51, NULL, NULL),
(32, 'Amortiguadores', 52, NULL, NULL),
(33, 'Bomba direcciÃ³n hidrÃ¡ulica', 53, NULL, NULL),
(34, 'Fuelles cremalleras de direcciÃ³n', 54, NULL, NULL),
(35, 'Bomba freno', 55, NULL, NULL),
(36, 'RetÃ©n de cigÃ¼eÃ±al', 56, NULL, NULL),
(37, 'Radiador calefacciÃ³n', 57, NULL, NULL),
(38, 'Carburador', 58, NULL, NULL),
(39, 'Amortiguadores', 59, NULL, NULL),
(40, 'Espejo retrovisor exterior', 60, NULL, NULL),
(41, 'Pastillas de freno', 61, NULL, NULL),
(42, 'Rodamiento de embrague', 62, NULL, NULL),
(43, 'Foco Delantero', 63, NULL, NULL),
(44, 'Foco Trasero', 64, NULL, NULL),
(45, 'Inyectores', 65, NULL, NULL),
(46, 'Kit de rodamiento de rueda', 66, NULL, NULL),
(47, 'RetÃ©n caja cambios', 67, NULL, NULL),
(48, 'Espejo retrovisor exterior', 68, NULL, NULL),
(49, 'Parabrisas', 69, NULL, NULL),
(50, 'Bomba inyectora', 70, NULL, NULL),
(51, 'Inyectores', 71, NULL, NULL),
(52, 'Bomba freno', 72, NULL, NULL),
(53, 'Calipers de freno', 73, NULL, NULL),
(54, 'Cremalleras de direcciÃ³n', 74, NULL, NULL),
(55, 'RetÃ©n de cigÃ¼eÃ±al', 75, NULL, NULL),
(56, 'Espejo retrovisor exterior', 76, NULL, NULL),
(57, 'Inyectores', 77, NULL, NULL),
(58, 'Terminales de direcciÃ³n', 78, NULL, NULL),
(59, 'Kit de rodamiento de rueda', 79, NULL, NULL),
(60, 'Inyectores', 80, NULL, NULL),
(61, 'Bandejas', 81, NULL, NULL),
(62, 'Rodamiento caja de cambio', 82, NULL, NULL),
(63, 'Radiador calefacciÃ³n', 83, NULL, NULL),
(64, 'Pastillas de freno', 84, 'url1', 6000),
(65, 'Bomba de agua', 85, 'url2', 70900),
(66, 'Espejo retrovisor exterior', 86, 'url3', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tareas`
--

CREATE TABLE `tbl_tareas` (
  `cod` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `mecanico` varchar(10) DEFAULT NULL,
  `danoCarroceria` int(11) DEFAULT NULL,
  `danosMecanica` int(11) DEFAULT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tareas`
--

INSERT INTO `tbl_tareas` (`cod`, `estado`, `mecanico`, `danoCarroceria`, `danosMecanica`, `categoria`) VALUES
(96, 2, 'Marcelo', 93, NULL, 2),
(76, 2, 'Marcelo', 84, NULL, 1),
(77, 2, 'Marcelo', NULL, 26, 3),
(78, 2, 'Marcelo', NULL, 26, 3),
(79, 2, 'Marcelo', NULL, 25, 3),
(80, 2, 'Marcelo', NULL, 24, 3),
(81, 2, '10802162-4', 83, NULL, 1),
(82, 2, '10802162-4', 85, NULL, 1),
(83, 2, 'Marcelo', 86, NULL, 2),
(84, 2, '10802162-4', 87, NULL, 1),
(85, 2, 'Marcelo', 88, NULL, 2),
(86, 2, '10802162-4', 89, NULL, 1),
(87, 2, 'Marcelo', 90, NULL, 2),
(88, 2, 'Felipe', 91, NULL, 1),
(89, 2, 'Marcelo', 92, NULL, 2),
(90, 2, 'Marcelo', NULL, 28, 3),
(91, 2, 'Felipe', NULL, 27, 3),
(92, 2, 'Felipe', 93, NULL, 2),
(93, 0, NULL, NULL, 29, 3),
(94, 2, 'Marcelo', 93, NULL, 2),
(95, 0, NULL, NULL, 29, 3),
(97, 0, NULL, NULL, 29, 3),
(98, 2, '10802162-4', 89, NULL, 1),
(99, 2, 'Felipe', 90, NULL, 2),
(100, 2, '19668258-9', 91, NULL, 1),
(101, 2, 'Felipe', 92, NULL, 2),
(102, 2, 'Marcelo', NULL, 28, 3),
(103, 2, 'Felipe', NULL, 27, 3),
(104, 2, '10802162-4', 85, NULL, 1),
(105, 2, 'Marcelo', 86, NULL, 2),
(106, 2, '19668258-9', 87, NULL, 1),
(107, 2, 'Felipe', 88, NULL, 2),
(108, 2, '10802162-4', 81, NULL, 1),
(109, 2, 'Marcelo', 82, NULL, 2),
(110, 2, '10802162-4', 83, NULL, 1),
(111, 2, 'Marcelo', 84, NULL, 2),
(112, 2, 'Marcelo', NULL, 26, 3),
(113, 2, 'Marcelo', NULL, 25, 3),
(114, 2, 'Marcelo', NULL, 24, 3),
(115, 2, '10802162-4', 94, NULL, 1),
(116, 2, 'Felipe', 95, NULL, 2),
(117, 2, '19668258-9', 96, NULL, 1),
(118, 2, 'Marcelo', 97, NULL, 2),
(119, 2, 'Marcelo', NULL, 32, 3),
(120, 2, 'Marcelo', NULL, 31, 3),
(121, 2, 'Marcelo', NULL, 30, 3),
(122, 2, 'Marcelo', NULL, 35, 3),
(123, 2, 'Marcelo', NULL, 34, 3),
(124, 2, 'Marcelo', NULL, 33, 3),
(125, 2, 'Marcelo', NULL, 35, 3),
(126, 2, 'Marcelo', NULL, 34, 3),
(127, 2, 'Marcelo', NULL, 33, 3),
(128, 2, '10802162-4', 81, NULL, 1),
(129, 2, 'Marcelo', 82, NULL, 2),
(130, 2, '10802162-4', 83, NULL, 1),
(131, 2, 'Marcelo', 84, NULL, 2),
(132, 2, 'Marcelo', NULL, 26, 3),
(133, 2, 'Marcelo', NULL, 25, 3),
(134, 2, 'Marcelo', NULL, 24, 3),
(135, 2, '10802162-4', 105, NULL, 1),
(136, 2, 'Marcelo', 106, NULL, 2),
(137, 2, '10802162-4', 81, NULL, 1),
(138, 2, 'Marcelo', 82, NULL, 2),
(139, 2, '10802162-4', 83, NULL, 1),
(140, 2, 'Marcelo', 84, NULL, 2),
(141, 2, 'Marcelo', NULL, 26, 3),
(142, 2, 'Marcelo', NULL, 25, 3),
(143, 2, 'Marcelo', NULL, 24, 3),
(144, 2, '10802162-4', 113, NULL, 1),
(145, 2, 'Marcelo', 114, NULL, 2),
(146, 2, '10802162-4', 115, NULL, 1),
(147, 2, 'Marcelo', 116, NULL, 2),
(148, 2, 'Marcelo', NULL, 48, 3),
(149, 2, 'Marcelo', NULL, 49, 3),
(150, 2, 'Marcelo', NULL, 50, 3),
(151, 2, 'Marcelo', NULL, 51, 3),
(152, 2, '10802162-4', 117, NULL, 1),
(153, 2, 'Marcelo', 118, NULL, 2),
(154, 2, 'Marcelo', NULL, 52, 3),
(155, 2, 'Marcelo', NULL, 53, 3),
(156, 2, 'Marcelo', NULL, 54, 3),
(157, 2, 'Marcelo', NULL, 55, 3),
(158, 2, 'Marcelo', NULL, 56, 3),
(159, 2, 'Marcelo', NULL, 57, 3),
(160, 2, 'Marcelo', NULL, 55, 3),
(161, 2, 'Marcelo', NULL, 56, 3),
(162, 2, 'Marcelo', NULL, 57, 3),
(163, 2, '10802162-4', 119, NULL, 1),
(164, 2, 'Marcelo', 120, NULL, 2),
(165, 2, '10802162-4', 121, NULL, 1),
(166, 2, 'Marcelo', 122, NULL, 2),
(167, 2, 'Marcelo', NULL, 58, 3),
(168, 2, '10802162-4', 98, NULL, 1),
(169, 2, 'Marcelo', 99, NULL, 2),
(170, 2, '10802162-4', 100, NULL, 1),
(171, 2, 'Marcelo', 101, NULL, 2),
(172, 2, 'Marcelo', NULL, 36, 3),
(173, 2, 'Marcelo', NULL, 37, 3),
(174, 2, 'Marcelo', NULL, 59, 3),
(175, 2, 'Marcelo', NULL, 60, 3),
(176, 2, '10802162-4', 123, NULL, 1),
(177, 2, 'Marcelo', 124, NULL, 2),
(178, 2, '10802162-4', 125, NULL, 1),
(179, 2, 'Marcelo', 126, NULL, 2),
(180, 2, '10802162-4', 109, NULL, 1),
(181, 2, 'Marcelo', 110, NULL, 2),
(182, 2, 'Marcelo', NULL, 42, 3),
(183, 2, 'Marcelo', NULL, 43, 3),
(184, 2, '10802162-4', 131, NULL, 1),
(185, 2, 'Marcelo', 132, NULL, 2),
(186, 2, '10802162-4', 133, NULL, 1),
(187, 2, 'Marcelo', 134, NULL, 2),
(188, 2, 'Marcelo', NULL, 70, 3),
(189, 2, 'Marcelo', NULL, 71, 3),
(190, 2, '10802162-4', 143, NULL, 1),
(191, 2, 'Felipe', 144, NULL, 2),
(192, 2, 'Marcelo', NULL, 84, 3),
(193, 2, 'Marcelo', NULL, 85, 3),
(194, 2, 'Marcelo', NULL, 86, 3),
(195, 2, '10802162-4', 103, NULL, 1),
(196, 0, NULL, 104, NULL, 2),
(197, 2, 'Marcelo', NULL, 41, 3),
(198, 2, '10802162-4', 117, NULL, 1),
(199, 0, NULL, 118, NULL, 2),
(200, 2, 'Marcelo', NULL, 52, 3),
(201, 2, 'Marcelo', NULL, 53, 3),
(202, 2, 'Felipe', NULL, 54, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipo_auto`
--

CREATE TABLE `tbl_tipo_auto` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tipo_auto`
--

INSERT INTO `tbl_tipo_auto` (`codigo`, `nombre`) VALUES
(1, 'Automovil'),
(2, 'Motocicleta'),
(3, 'Camion');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehiculos`
--

CREATE TABLE `tbl_vehiculos` (
  `codigo` int(11) NOT NULL,
  `patente` varchar(6) NOT NULL,
  `ano` int(4) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `modelo` varchar(15) NOT NULL,
  `color` varchar(20) NOT NULL,
  `kilometros` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vehiculos`
--

INSERT INTO `tbl_vehiculos` (`codigo`, `patente`, `ano`, `marca`, `modelo`, `color`, `kilometros`, `tipo`, `estado`) VALUES
(1, 'xyls20', 2006, 'mazda', '3', 'rojo', 25000, 1, 3),
(2, 'bgrt23', 2015, 'nisan', 'skyline', 'azul', 80235, 1, 2),
(3, 'frtr', 2016, 'toyota', 'yaris', 'verde', 10934, 1, 0),
(4, 'fran02', 2009, 'kia', 'rio 5', 'plateado', 9743, 1, 3),
(5, 'arst23', 1998, 'subaru', 'impreza', 'azul', 98700, 1, 3),
(6, 'arvd94', 2017, 'honda', 'civic', 'blanco', 1000, 1, 2),
(7, 'ctln17', 1980, 'Chevrolet', 'C10 Silverado', 'cafe', 140980, 1, 0),
(8, 'madc10', 1899, 'Mitsubishi', 'Evo Lancer', 'naranjo', 5890, 1, 3),
(9, 'lyna71', 2009, 'Mitsubishi', 'Eclipse', 'amarillo', 10098, 1, 0),
(10, 'tynn20', 2004, 'Mitsubishi', 'Mirage', 'naranjoplateado', 25098, 1, 3),
(11, 'dans88', 2012, 'mercedes benz', 'slk', 'rojo', 20987, 1, 0),
(12, 'crln52', 2005, 'honda', 'accord', 'plomo', 11008, 1, 0),
(13, 'brwn14', 2014, 'volvo', 'v40', 'azul', 24000, 1, 3),
(14, 'kldr56', 2002, 'volvo', 'xc60', 'blanco', 90832, 1, 3),
(15, 'pprj11', 2010, 'susuki', 'vitara', 'blanco', 50923, 1, 3),
(16, 'mtfd14', 2007, 'susuki', 'swift', 'plomo', 11023, 1, 3),
(17, 'ntdg77', 2004, 'susuki', 'baleno', 'plateado', 5423, 1, 3),
(18, 'pbec22', 2015, 'Hyundai', 'i20', 'cafe', 1000, 1, 3),
(19, 'crrs63', 2013, 'Hyundai', 'i30', 'blanco', 5890, 1, 3),
(20, 'rsep10', 2009, 'Hyundai', 'sonata', 'blanco', 9807, 1, 3),
(21, 'jnsn14', 2004, 'Hyundai', 'elantra', 'azul', 50492, 1, 0),
(22, 'jfln70', 2014, 'susuki', 'alto', 'verde', 11054, 1, 0),
(23, 'snst22', 1990, 'nissan', 'silvia', 'blanco', 198073, 1, 0),
(24, 'mrln10', 2000, 'nissan', '350 z', 'naranjo', 11009, 1, 3),
(25, 'obdm12', 1995, 'nissan', 'sentra 2', 'rojo', 54609, 1, 3),
(26, 'alor93', 2000, 'subaru', 'impreza', 'azul', 1000, 1, 0),
(27, 'hhgg55', 2009, 'toyota', 'skyline', 'rojo', 90000, 1, 2),
(28, 'fcbv22', 2017, 'Volvo', 'm1', 'amarillo', 2000, 3, 0),
(38, 'jjrt55', 2017, 'BMW', 'c1', 'amarillo', 203400, 3, 0),
(34, 'dfgt45', 2016, 'Chevrolet', 'c1', 'amarillo', 200000, 3, 0),
(39, 'cgty64', 2015, 'hyundai', 'cerato', 'plateado', 45879, 1, 0),
(40, 'fprt89', 2016, 'honda', 'invicta', 'negro', 89000, 2, 0),
(41, 'rmra54', 1992, 'Fiat', '600', 'Rojo', 2500, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_persona`
--

INSERT INTO `tipo_persona` (`id`, `nombre`) VALUES
(1, 'cliente'),
(2, 'mecanico'),
(3, 'supervisor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cotizaciones`
--
ALTER TABLE `tbl_cotizaciones`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tbl_danoscarroceria`
--
ALTER TABLE `tbl_danoscarroceria`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `tbl_danosmecanica`
--
ALTER TABLE `tbl_danosmecanica`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tbl_espacios`
--
ALTER TABLE `tbl_espacios`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tbl_flujotrabajo`
--
ALTER TABLE `tbl_flujotrabajo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tbl_gastos_insumos`
--
ALTER TABLE `tbl_gastos_insumos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tbl_imagenes`
--
ALTER TABLE `tbl_imagenes`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tbl_insumos`
--
ALTER TABLE `tbl_insumos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `persona` (`persona`,`user`);

--
-- Indexes for table `tbl_orden_reparacion`
--
ALTER TABLE `tbl_orden_reparacion`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tbl_partes_vehiculo`
--
ALTER TABLE `tbl_partes_vehiculo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD PRIMARY KEY (`rut`),
  ADD UNIQUE KEY `rut` (`rut`);

--
-- Indexes for table `tbl_persona_auto`
--
ALTER TABLE `tbl_persona_auto`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tbl_repuestos`
--
ALTER TABLE `tbl_repuestos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tbl_tareas`
--
ALTER TABLE `tbl_tareas`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `tbl_tipo_auto`
--
ALTER TABLE `tbl_tipo_auto`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tbl_vehiculos`
--
ALTER TABLE `tbl_vehiculos`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `patente` (`patente`);

--
-- Indexes for table `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cotizaciones`
--
ALTER TABLE `tbl_cotizaciones`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `tbl_danoscarroceria`
--
ALTER TABLE `tbl_danoscarroceria`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `tbl_danosmecanica`
--
ALTER TABLE `tbl_danosmecanica`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `tbl_espacios`
--
ALTER TABLE `tbl_espacios`
  MODIFY `codigo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_flujotrabajo`
--
ALTER TABLE `tbl_flujotrabajo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_gastos_insumos`
--
ALTER TABLE `tbl_gastos_insumos`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=658;
--
-- AUTO_INCREMENT for table `tbl_imagenes`
--
ALTER TABLE `tbl_imagenes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `tbl_insumos`
--
ALTER TABLE `tbl_insumos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_orden_reparacion`
--
ALTER TABLE `tbl_orden_reparacion`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_partes_vehiculo`
--
ALTER TABLE `tbl_partes_vehiculo`
  MODIFY `codigo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_persona_auto`
--
ALTER TABLE `tbl_persona_auto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbl_repuestos`
--
ALTER TABLE `tbl_repuestos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `tbl_tareas`
--
ALTER TABLE `tbl_tareas`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
--
-- AUTO_INCREMENT for table `tbl_tipo_auto`
--
ALTER TABLE `tbl_tipo_auto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_vehiculos`
--
ALTER TABLE `tbl_vehiculos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tipo_persona`
--
ALTER TABLE `tipo_persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
