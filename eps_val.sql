-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2019 a las 01:07:25
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eps_val`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `paciente` varchar(255) NOT NULL,
  `medico` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hora` time NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `pkid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formula`
--

CREATE TABLE `formula` (
  `pikd` bigint(20) NOT NULL,
  `paciente` varchar(255) NOT NULL,
  `medico` varchar(255) NOT NULL,
  `fechaFormula` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `referencia1` varchar(255) NOT NULL,
  `cantidad1` int(11) NOT NULL,
  `referencia2` varchar(255) NOT NULL,
  `cantidad2` int(11) NOT NULL,
  `referencia3` varchar(255) NOT NULL,
  `cantidad3` int(11) NOT NULL,
  `observaciones` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiaclinica`
--

CREATE TABLE `historiaclinica` (
  `pkid` bigint(20) NOT NULL,
  `paciente` varchar(255) NOT NULL,
  `medico` varchar(255) NOT NULL,
  `lugarNacimiento` varchar(255) NOT NULL,
  `estatura` varchar(255) NOT NULL,
  `peso` varchar(255) NOT NULL,
  `profesion` varchar(255) NOT NULL,
  `motivoConsulta` varchar(255) NOT NULL,
  `antecedentes` varchar(255) NOT NULL,
  `diagnostico` varchar(255) NOT NULL,
  `tratamiento` varchar(255) NOT NULL,
  `fechaIngreso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `pkid` bigint(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `identificacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `identificacion` varchar(255) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `pkid` bigint(20) NOT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`nombre`, `apellidos`, `telefono`, `email`, `direccion`, `ciudad`, `identificacion`, `observaciones`, `pkid`, `clave`) VALUES
('valentina', 'Rua Carrillo', '3007865', 'valentina@gmail.com', 'calle 23e 34-12', 'Medellín', '123456', '', 1, 'e10adc3949ba59abbe56e057f20f883e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`pkid`);

--
-- Indices de la tabla `formula`
--
ALTER TABLE `formula`
  ADD PRIMARY KEY (`pikd`);

--
-- Indices de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  ADD PRIMARY KEY (`pkid`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`pkid`),
  ADD UNIQUE KEY `identificacion` (`identificacion`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`pkid`),
  ADD UNIQUE KEY `identificacion` (`identificacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `pkid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formula`
--
ALTER TABLE `formula`
  MODIFY `pikd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  MODIFY `pkid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `pkid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `pkid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
