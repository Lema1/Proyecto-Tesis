-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 11:53 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taller_bi`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`supervisor`@`localhost` PROCEDURE `extract_vehi_repara` (IN `_mes` INT(1))  NO SQL
BEGIN

SELECT count(vr.vehiculo)
FROM vehicu_reparado vr
where month(vr.fecha)= _mes;

END$$

CREATE DEFINER=`supervisor`@`localhost` PROCEDURE `insert_vehi_repa` (IN `_patente` VARCHAR(6), IN `_ano` INT(4), IN `_marca` VARCHAR(15), IN `_modelo` VARCHAR(15), IN `_kilomentros` INT(11), IN `_tipo` VARCHAR(15), IN `_fecha` DATE)  NO SQL
BEGIN

INSERT INTO vehiculo (patente, ano, marca, modelo, kilometro, tipo) 
VALUES (_patente, _ano, _marca, _modelo, _kilomentros, _tipo);


INSERT INTO vehicu_reparado (vehiculo,fecha)
VALUES (_patente,_fecha);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_reporte1` (IN `_tipo` INT(1))  NO SQL
BEGIN

SELECT *
FROM reportes rt
WHERE rt.tipo= _tipo;

END$$

CREATE DEFINER=`supervisor`@`localhost` PROCEDURE `login_user` (IN `_mail` VARCHAR(40), IN `_pass` VARCHAR(75))  NO SQL
BEGIN
	SELECT tl.user
    from tbl_login tl
	WHERE tl.user = _mail AND tl.password = _pass;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nuevo_reporte` (IN `_nombre` VARCHAR(50), IN `_fecha` DATE, IN `_tipo` INT(1))  NO SQL
BEGIN

INSERT INTO reportes (nombre,fecha,tipo)
VALUES (_nombre,_fecha,_tipo);

END$$

CREATE DEFINER=`supervisor`@`localhost` PROCEDURE `pregPASS` (IN `user` VARCHAR(30))  NO SQL
SELECT tl.password FROM tbl_login AS tl WHERE tl.user=user$$

CREATE DEFINER=`supervisor`@`localhost` PROCEDURE `testing` (IN `_test` TEXT)  NO SQL
begin

insert into test(testing) values(_test);

end$$

CREATE DEFINER=`supervisor`@`localhost` PROCEDURE `vhi_repara_marca` (IN `_desde` INT(1), IN `_hasta` INT(2))  NO SQL
select vh.marca,count(vh.patente)
from vehiculo vh
INNER JOIN vehicu_reparado vr ON vr.vehiculo=vh.patente
WHERE month(vr.fecha) BETWEEN _desde AND _hasta
group by vh.marca$$

CREATE DEFINER=`supervisor`@`localhost` PROCEDURE `vhi_repara_modelo` (IN `_desde` INT(1), IN `_hasta` INT(2))  NO SQL
SELECT vh.marca, vh.modelo, COUNT(vh.patente)
FROM vehiculo vh
INNER JOIN vehicu_reparado vr ON vr.vehiculo = vh.patente
WHERE MONTH(vr.fecha) BETWEEN _desde AND _hasta
GROUP BY vh.marca,vh.modelo$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reportes`
--

CREATE TABLE `reportes` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportes`
--

INSERT INTO `reportes` (`codigo`, `nombre`, `fecha`, `tipo`) VALUES
(2, 'VehRepa-01-11-17-30-11-17', '2017-11-12', 1);

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
-- Table structure for table `vehiculo`
--

CREATE TABLE `vehiculo` (
  `patente` varchar(6) NOT NULL,
  `ano` int(4) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `modelo` varchar(15) NOT NULL,
  `kilometro` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehiculo`
--

INSERT INTO `vehiculo` (`patente`, `ano`, `marca`, `modelo`, `kilometro`, `tipo`) VALUES
('arst23', 1998, 'subaru', 'impreza', 98700, 'Automovil'),
('bgrt23', 2015, 'nissan', 'skyline', 80235, 'Automovil'),
('brwn14', 2014, 'volvo', 'v40', 24000, 'Automovil'),
('crrs63', 2013, 'Hyundai', 'i30', 5890, 'Automovil'),
('fran02', 2009, 'kia', 'rio 5', 9743, 'Automovil'),
('kldr56', 2002, 'volvo', 'xc60', 90832, 'Automovil'),
('madc10', 1899, 'Mitsubishi', 'Evo Lancer', 5890, 'Automovil'),
('mrln10', 2000, 'nissan', '350 z', 11009, 'Automovil'),
('mtfd14', 2007, 'susuki', 'swift', 11023, 'Automovil'),
('ntdg77', 2004, 'susuki', 'baleno', 5423, 'Automovil'),
('obdm12', 1995, 'nissan', 'sentra 2', 54609, 'Automovil'),
('pbec22', 2015, 'Hyundai', 'i20', 1000, 'Automovil'),
('pprj11', 2010, 'susuki', 'vitara', 50923, 'Automovil'),
('rsep10', 2009, 'Hyundai', 'sonata', 9807, 'Automovil'),
('tynn20', 2004, 'Mitsubishi', 'Mirage', 25098, 'Automovil'),
('xyls20', 2006, 'mazda', '3', 25000, 'Automovil');

-- --------------------------------------------------------

--
-- Table structure for table `vehicu_reparado`
--

CREATE TABLE `vehicu_reparado` (
  `codigo` int(11) NOT NULL,
  `vehiculo` varchar(6) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicu_reparado`
--

INSERT INTO `vehicu_reparado` (`codigo`, `vehiculo`, `fecha`) VALUES
(1, 'kldr56', '2017-09-16'),
(2, 'tynn20', '2017-09-16'),
(3, 'arst23', '2017-09-16'),
(4, 'xyls20', '2017-09-16'),
(5, 'obdm12', '2017-09-20'),
(6, 'fran02', '2017-09-20'),
(7, 'mrln10', '2017-11-02'),
(8, 'arvd94', '2017-11-09'),
(9, 'fprt89', '2017-11-09'),
(10, 'pprj11', '2017-11-11'),
(11, 'bgrt23', '2017-11-11'),
(12, 'mtfd14', '2017-11-11'),
(13, 'madc10', '2017-11-11'),
(14, 'brwn14', '2017-11-11'),
(15, 'ntdg77', '2017-11-11'),
(16, 'pbec22', '2017-11-11'),
(17, 'crrs63', '2017-11-11'),
(18, 'rsep10', '2017-11-11'),
(19, 'kldr56', '2017-09-16'),
(20, 'tynn20', '2017-09-16'),
(21, 'arst23', '2017-09-16'),
(22, 'xyls20', '2017-09-16'),
(23, 'obdm12', '2017-09-20'),
(24, 'fran02', '2017-09-20'),
(25, 'mrln10', '2017-11-02'),
(26, 'pprj11', '2017-11-11'),
(27, 'bgrt23', '2017-11-11'),
(28, 'mtfd14', '2017-11-11'),
(29, 'madc10', '2017-11-11'),
(30, 'brwn14', '2017-10-11'),
(31, 'ntdg77', '2017-10-11'),
(32, 'pbec22', '2017-10-11'),
(33, 'crrs63', '2017-08-11'),
(34, 'rsep10', '2017-11-11'),
(35, 'bgrt23', '2017-11-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `persona` (`persona`,`user`);

--
-- Indexes for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`patente`);

--
-- Indexes for table `vehicu_reparado`
--
ALTER TABLE `vehicu_reparado`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reportes`
--
ALTER TABLE `reportes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vehicu_reparado`
--
ALTER TABLE `vehicu_reparado`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
