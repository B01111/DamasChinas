-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2013 at 12:54 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `damaschinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `Usuario` varchar(16) NOT NULL,
  `Nivel` int(11) NOT NULL,
  PRIMARY KEY (`Usuario`),
  KEY `Alias_idx` (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agrupadoen`
--

CREATE TABLE IF NOT EXISTS `agrupadoen` (
  `Jugador` varchar(16) NOT NULL,
  `Torneo` bigint(20) NOT NULL,
  `Grupo` tinyint(4) NOT NULL DEFAULT '0',
  `Puntos` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Jugador`,`Torneo`),
  KEY `Torneo` (`Torneo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ayuda`
--

CREATE TABLE IF NOT EXISTS `ayuda` (
  `Version` varchar(16) NOT NULL,
  `Juego` varchar(16) NOT NULL,
  `Autores` varchar(45) NOT NULL,
  PRIMARY KEY (`Version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calendario`
--

CREATE TABLE IF NOT EXISTS `calendario` (
  `IdPartida` bigint(20) NOT NULL,
  `IdTorneo` bigint(20) DEFAULT NULL,
  `Fecha` datetime NOT NULL,
  `Grupo` tinyint(4) NOT NULL DEFAULT '0',
  `DependeDeGrupo` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdPartida`),
  KEY `ID_idx` (`IdTorneo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estadísticas`
--

CREATE TABLE IF NOT EXISTS `estadísticas` (
  `Jugador` varchar(16) NOT NULL,
  `Modo` tinyint(1) NOT NULL,
  `PartidasJugadas` int(11) NOT NULL DEFAULT '0',
  `PartidasGanadas` int(11) NOT NULL DEFAULT '0',
  `PartidasPerdidas` int(11) NOT NULL DEFAULT '0',
  `MaxMovimientos` int(11) NOT NULL DEFAULT '9999',
  `MinMovimientos` int(11) NOT NULL DEFAULT '0',
  `PromedioPuntos` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`Jugador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partida`
--

CREATE TABLE IF NOT EXISTS `partida` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `TiempoMaxPartida` int(11) NOT NULL,
  `TiempoMaxTurno` int(11) NOT NULL,
  `Capture` tinyint(1) NOT NULL,
  `Estado` varbinary(128) NOT NULL,
  `Turno` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=244 ;

-- --------------------------------------------------------

--
-- Table structure for table `partida/jugador`
--

CREATE TABLE IF NOT EXISTS `partida/jugador` (
  `Jugador` varchar(16) NOT NULL,
  `IdPartida` bigint(20) NOT NULL,
  `Equipo` tinyint(4) NOT NULL,
  `NumJugador` tinyint(4) NOT NULL,
  PRIMARY KEY (`IdPartida`,`Jugador`),
  KEY `ID_idx` (`IdPartida`),
  KEY `IdJugador` (`Jugador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regla`
--

CREATE TABLE IF NOT EXISTS `regla` (
  `Version` varchar(16) NOT NULL,
  `Titulo` varchar(32) NOT NULL,
  `Contenido` text NOT NULL,
  PRIMARY KEY (`Version`,`Titulo`),
  UNIQUE KEY `Titulo_UNIQUE` (`Titulo`),
  KEY `Version_idx` (`Version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subfasede`
--

CREATE TABLE IF NOT EXISTS `subfasede` (
  `dependiente` bigint(20) NOT NULL,
  `dependencia1` bigint(20) NOT NULL,
  `dependencia2` bigint(20) NOT NULL,
  KEY `Dependiente` (`dependiente`),
  KEY `Dependencia1` (`dependencia1`),
  KEY `Dependencia2` (`dependencia2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `torneo`
--

CREATE TABLE IF NOT EXISTS `torneo` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Creador` varchar(16) NOT NULL,
  `Participantes` tinyint(4) NOT NULL,
  `JugadoresXEquipo` tinyint(4) NOT NULL,
  `FaseGrupos` tinyint(1) NOT NULL,
  `IdaEliminatoria` tinyint(1) NOT NULL,
  `Estado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`),
  UNIQUE KEY `Nombre_UNIQUE` (`Nombre`),
  KEY `Alias_idx` (`Creador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `torneo`
--

INSERT INTO `torneo` (`ID`, `Nombre`, `Creador`, `Participantes`, `JugadoresXEquipo`, `FaseGrupos`, `IdaEliminatoria`, `Estado`) VALUES
(13, 'Torneo de Prueba', 'Gilgamesh', 4, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `Alias` varchar(16) NOT NULL,
  `Contrasena` varchar(16) NOT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `FechaNacimiento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Alias`),
  UNIQUE KEY `Alias_UNIQUE` (`Alias`),
  UNIQUE KEY `Correo_UNIQUE` (`Correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`Alias`, `Contrasena`, `Correo`, `Nombre`, `Apellido`, `FechaNacimiento`) VALUES
('Gilgamesh', '111111', 'jbriceno11@hotmail.com', 'Joshua', 'Briceño', NULL),
('Keanj', '222222', 'keanjapesan@hotmail.com', 'Kevin', 'Sandí', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `Usuario` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Alias`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `agrupadoen`
--
ALTER TABLE `agrupadoen`
  ADD CONSTRAINT `agrupadoen_ibfk_1` FOREIGN KEY (`Jugador`) REFERENCES `usuario` (`Alias`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agrupadoen_ibfk_2` FOREIGN KEY (`Torneo`) REFERENCES `torneo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `calendario`
--
ALTER TABLE `calendario`
  ADD CONSTRAINT `calendario_ibfk_1` FOREIGN KEY (`IdTorneo`) REFERENCES `torneo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdPartida` FOREIGN KEY (`IdPartida`) REFERENCES `partida` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `estadísticas`
--
ALTER TABLE `estadísticas`
  ADD CONSTRAINT `Jugador` FOREIGN KEY (`Jugador`) REFERENCES `usuario` (`Alias`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partida/jugador`
--
ALTER TABLE `partida/jugador`
  ADD CONSTRAINT `IdJugador` FOREIGN KEY (`Jugador`) REFERENCES `usuario` (`Alias`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Partida` FOREIGN KEY (`IdPartida`) REFERENCES `partida` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `regla`
--
ALTER TABLE `regla`
  ADD CONSTRAINT `Ayuda` FOREIGN KEY (`Version`) REFERENCES `ayuda` (`Version`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subfasede`
--
ALTER TABLE `subfasede`
  ADD CONSTRAINT `subfasede_ibfk_3` FOREIGN KEY (`dependencia2`) REFERENCES `partida` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subfasede_ibfk_1` FOREIGN KEY (`dependiente`) REFERENCES `partida` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subfasede_ibfk_2` FOREIGN KEY (`dependencia1`) REFERENCES `partida` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `torneo`
--
ALTER TABLE `torneo`
  ADD CONSTRAINT `Creador` FOREIGN KEY (`Creador`) REFERENCES `usuario` (`Alias`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
