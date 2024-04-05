-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2022 a las 13:54:45
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aeropuertomaya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aeronave`
--

CREATE TABLE `aeronave` (
  `Id_Aeronave` int(11) NOT NULL,
  `Matricula` varchar(50) NOT NULL,
  `Modelo` varchar(50) NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `Tamaño` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aeronave`
--

INSERT INTO `aeronave` (`Id_Aeronave`, `Matricula`, `Modelo`, `Capacidad`, `Tamaño`, `Tipo`, `Area`) VALUES
(18, '   7868FAS', '   Boeing', 680, 850, '   Comercial', '   Personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aeropuerto`
--

CREATE TABLE `aeropuerto` (
  `Id_Aeropuerto` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Hangar` int(11) NOT NULL,
  `Id_Ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aeropuerto`
--

INSERT INTO `aeropuerto` (`Id_Aeropuerto`, `Nombre`, `Hangar`, `Id_Ciudad`) VALUES
(1, '    Toncontin IA', 25, 1),
(2, 'Goloson IA', 13, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

CREATE TABLE `boleto` (
  `Id_Boleto` int(10) NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `Id_Asiento` varchar(100) NOT NULL,
  `Id_Pasajero` int(10) NOT NULL,
  `Id_Vuelo` int(10) NOT NULL,
  `Id_Equipaje` int(11) NOT NULL,
  `Id_Clase` int(11) NOT NULL,
  `Precio` varchar(100) NOT NULL,
  `Estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `boleto`
--

INSERT INTO `boleto` (`Id_Boleto`, `Codigo`, `Id_Asiento`, `Id_Pasajero`, `Id_Vuelo`, `Id_Equipaje`, `Id_Clase`, `Precio`, `Estado`) VALUES
(4, 'KSU13', ' 12', 4, 1, 1, 1, '168.75', 0),
(5, '   JSLO289', '4', 1, 1, 2, 1, '225', 1),
(6, 'KSU13', ' 6', 4, 1, 1, 1, '168.75', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checkin`
--

CREATE TABLE `checkin` (
  `Id_Checkin` int(11) NOT NULL,
  `Id_Reserva` int(11) NOT NULL,
  `Id_Pasajero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `Id_Ciudad` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Terminal` int(11) NOT NULL,
  `Id_Pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`Id_Ciudad`, `Nombre`, `Codigo`, `Terminal`, `Id_Pais`) VALUES
(1, 'Tegucigalpa', 11101, 1, 1),
(2, '  La Ceiba', 31101, 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `Id_Clase` int(11) NOT NULL,
  `Tipo_Clase` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `MultiplicadorPrecio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`Id_Clase`, `Tipo_Clase`, `Descripcion`, `MultiplicadorPrecio`) VALUES
(1, 'Primera Clase', '  Todos los alimentos y bebidas incluidas', 1),
(2, 'Economico', '  Sin comida ni bebida', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `Id_Detalle` int(11) NOT NULL,
  `Id_Boleto` int(11) NOT NULL,
  `Cantidad` int(10) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Subtotal` varchar(100) NOT NULL,
  `Total_Descuento` varchar(100) NOT NULL,
  `Total_Impuesto` varchar(100) NOT NULL,
  `Total` varchar(100) NOT NULL,
  `Estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`Id_Detalle`, `Id_Boleto`, `Cantidad`, `Descripcion`, `Subtotal`, `Total_Descuento`, `Total_Impuesto`, `Total`, `Estado`) VALUES
(13, 4, 2, 'Detalle de boletos con codigo: KSU13', '337.5', '27', '60.75', '371.25', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipaje`
--

CREATE TABLE `equipaje` (
  `Id_Equipaje` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `MultiplicadorPrecio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipaje`
--

INSERT INTO `equipaje` (`Id_Equipaje`, `Peso`, `Cantidad`, `MultiplicadorPrecio`) VALUES
(1, 40, 2, 0.25),
(2, 40, 5, 1),
(4, 40, 7, 1.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `Id_Factura` int(11) NOT NULL,
  `Id_Parametro` int(11) NOT NULL,
  `Codigo` varchar(100) NOT NULL,
  `RTN` int(100) NOT NULL,
  `CAI` varchar(100) NOT NULL,
  `Id_Detalle` int(11) NOT NULL,
  `Fecha` varchar(100) NOT NULL,
  `Id_Moneda` int(11) NOT NULL,
  `Monto` varchar(100) NOT NULL,
  `Metodo_Pago` varchar(100) NOT NULL,
  `Cantidad_Efectivo` varchar(100) DEFAULT NULL,
  `Numero_Tarjeta` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`Id_Factura`, `Id_Parametro`, `Codigo`, `RTN`, `CAI`, `Id_Detalle`, `Fecha`, `Id_Moneda`, `Monto`, `Metodo_Pago`, `Cantidad_Efectivo`, `Numero_Tarjeta`) VALUES
(19, 7, '  001-001-01-00000100', 788812, '  2147483647', 13, '   16/12/2022, 05:54:16', 1, '371.25', 'Tarjeta', '', '9448752');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hangar`
--

CREATE TABLE `hangar` (
  `Id_hangar` int(11) NOT NULL,
  `Codigo` varchar(100) NOT NULL,
  `Capacidad` varchar(100) NOT NULL,
  `Id_Aeronave` int(11) NOT NULL,
  `Id_Aeropuerto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listaasientos`
--

CREATE TABLE `listaasientos` (
  `Id_Lista` int(11) NOT NULL,
  `Numero_Asiento` varchar(100) NOT NULL,
  `Estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `listaasientos`
--

INSERT INTO `listaasientos` (`Id_Lista`, `Numero_Asiento`, `Estado`) VALUES
(1, 'A10', 1),
(3, 'A12', 1),
(4, 'A13', 0),
(5, 'A14', 1),
(6, 'A15', 0),
(7, 'A16', 1),
(8, 'A17', 1),
(9, 'A18', 1),
(10, 'A19', 1),
(11, 'A20', 1),
(12, 'B21', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `Id_Lugar` int(10) NOT NULL,
  `Lugar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

CREATE TABLE `moneda` (
  `Id_Moneda` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `ConversionADolar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `moneda`
--

INSERT INTO `moneda` (`Id_Moneda`, `Nombre`, `ConversionADolar`) VALUES
(1, 'Dolar', '1'),
(2, 'Euro', '0.94'),
(3, 'Lempira', '24.65');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `Id_Pais` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`Id_Pais`, `Nombre`, `Region`) VALUES
(1, 'Honduras', 'America'),
(2, 'Brasil', ' America');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE `parametro` (
  `Id_Parametro` int(11) NOT NULL,
  `Cai` varchar(100) NOT NULL,
  `Fecha_Ven` date NOT NULL,
  `Fecha_Emi` date NOT NULL,
  `Rango_Ini` varchar(100) NOT NULL,
  `Rango_Fin` varchar(100) NOT NULL,
  `Consecutivo` varchar(100) NOT NULL,
  `Estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`Id_Parametro`, `Cai`, `Fecha_Ven`, `Fecha_Emi`, `Rango_Ini`, `Rango_Fin`, `Consecutivo`, `Estado`) VALUES
(6, '2147483647', '2022-12-24', '2022-12-14', '001-001-01-00000100', '001-001-01-00000110', '99', 1),
(7, '2147483647', '2022-12-24', '2022-12-14', '001-001-01-00000100', '001-001-01-00000110', '101', 1),
(8, '11T15A-YIEH45-SISS46-URT348-63DA35-E3', '2023-01-31', '2022-12-31', '001-001-01-00000100', '001-001-01-00000110', '99', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE `pasajero` (
  `Id_Pasajero` int(10) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Tipo_Documento` varchar(50) NOT NULL,
  `Numero_Documento` varchar(50) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `Correo` varchar(15) NOT NULL,
  `Id_Pais` int(11) NOT NULL,
  `Fecha_Nacimiento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pasajero`
--

INSERT INTO `pasajero` (`Id_Pasajero`, `Nombre`, `Tipo_Documento`, `Numero_Documento`, `Telefono`, `Correo`, `Id_Pais`, `Fecha_Nacimiento`) VALUES
(1, '  Eduardo Josue', 'Pasaporte', '080804954', '87754960', '  edu@gmail.com', 1, '22-10-2001'),
(4, ' Josue Sauceda', 'DNI', ' 0801200210580', ' 94879674', ' jou@gmail.com', 1, '27-05-1960');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paseabordar`
--

CREATE TABLE `paseabordar` (
  `Id_Pase` int(10) NOT NULL,
  `Codigo` int(10) NOT NULL,
  `Fecha` date NOT NULL,
  `Puerta_Embarque` varchar(50) NOT NULL,
  `Id_Boleto` int(10) NOT NULL,
  `Id_Pasajero` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paseabordar`
--

INSERT INTO `paseabordar` (`Id_Pase`, `Codigo`, `Fecha`, `Puerta_Embarque`, `Id_Boleto`, `Id_Pasajero`) VALUES
(3, 47, '2022-11-20', 'A131', 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaltierra`
--

CREATE TABLE `personaltierra` (
  `Id_Personal` int(11) NOT NULL,
  `Carga_Academica` varchar(50) NOT NULL,
  `Cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personaltierra`
--

INSERT INTO `personaltierra` (`Id_Personal`, `Carga_Academica`, `Cargo`) VALUES
(1, 'Bachiller', 'Barrendero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamos`
--

CREATE TABLE `reclamos` (
  `Id_Reclamos` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  `Id_Pasajero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `Id_Reserva` int(11) NOT NULL,
  `Codigo` varchar(100) NOT NULL,
  `Id_Vuelo` int(11) NOT NULL,
  `Precio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`Id_Reserva`, `Codigo`, `Id_Vuelo`, `Precio`) VALUES
(1, '896531', 2, ''),
(2, '501236', 2, ''),
(3, '024563', 2, '800'),
(1, '896531', 2, ''),
(2, '501236', 2, ''),
(3, '024563', 2, '800');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tripulacion`
--

CREATE TABLE `tripulacion` (
  `Id_Tripulacion` int(11) NOT NULL,
  `Cargo` varchar(50) NOT NULL,
  `Horas_Vuelo` int(11) NOT NULL,
  `Tipo_Licencia` varchar(50) NOT NULL,
  `Academia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tripulacion`
--

INSERT INTO `tripulacion` (`Id_Tripulacion`, `Cargo`, `Horas_Vuelo`, `Tipo_Licencia`, `Academia`) VALUES
(2, 'Azafata', 600, 'Superior', 'A.C.A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUser` int(11) NOT NULL,
  `Usuario` varchar(16) NOT NULL,
  `Pass` varchar(100) NOT NULL,
  `Estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUser`, `Usuario`, `Pass`, `Estado`) VALUES
(13, 'Tefa', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1),
(16, 'David', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `Id_Vuelo` int(10) NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `Lugar_Salida` varchar(50) NOT NULL,
  `Lugar_LLegada` varchar(50) NOT NULL,
  `Hora_Salida` time NOT NULL,
  `Hora_LLegada` time NOT NULL,
  `Fecha` date NOT NULL,
  `Precio` varchar(100) NOT NULL,
  `Id_Aeronave` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`Id_Vuelo`, `Codigo`, `Lugar_Salida`, `Lugar_LLegada`, `Hora_Salida`, `Hora_LLegada`, `Fecha`, `Precio`, `Id_Aeronave`) VALUES
(1, 'NK66', 'Terminal Toncontin', 'Terminal Palmerola', '15:14:09', '06:14:09', '2022-11-06', '75', 18),
(2, 'NKY87', 'Goloson IA', 'Toncontin IA', '05:30:00', '06:05:00', '2022-11-20', '100', 18);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aeronave`
--
ALTER TABLE `aeronave`
  ADD PRIMARY KEY (`Id_Aeronave`);

--
-- Indices de la tabla `aeropuerto`
--
ALTER TABLE `aeropuerto`
  ADD PRIMARY KEY (`Id_Aeropuerto`),
  ADD KEY `ciudad_Id_Ciudad_aeropuerto` (`Id_Ciudad`);

--
-- Indices de la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`Id_Boleto`),
  ADD KEY `pasajero_Id_Pasajero_boleto` (`Id_Pasajero`),
  ADD KEY `vuelo_Id_Vuelo_boleto` (`Id_Vuelo`),
  ADD KEY `Id_Equipaje` (`Id_Equipaje`,`Id_Clase`),
  ADD KEY `Id_Clase` (`Id_Clase`);

--
-- Indices de la tabla `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`Id_Checkin`),
  ADD KEY `Id_Reserva` (`Id_Reserva`,`Id_Pasajero`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`Id_Ciudad`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`Id_Clase`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`Id_Detalle`);

--
-- Indices de la tabla `equipaje`
--
ALTER TABLE `equipaje`
  ADD PRIMARY KEY (`Id_Equipaje`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Id_Factura`),
  ADD KEY `Id_Pasajero` (`Id_Detalle`);

--
-- Indices de la tabla `listaasientos`
--
ALTER TABLE `listaasientos`
  ADD PRIMARY KEY (`Id_Lista`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`Id_Lugar`);

--
-- Indices de la tabla `moneda`
--
ALTER TABLE `moneda`
  ADD PRIMARY KEY (`Id_Moneda`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`Id_Pais`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
  ADD PRIMARY KEY (`Id_Parametro`);

--
-- Indices de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD PRIMARY KEY (`Id_Pasajero`);

--
-- Indices de la tabla `paseabordar`
--
ALTER TABLE `paseabordar`
  ADD PRIMARY KEY (`Id_Pase`),
  ADD KEY `boleto_Id_Boleto_paseabordar` (`Id_Boleto`),
  ADD KEY `pasajero_Id_Pasajero_paseabordar` (`Id_Pasajero`);

--
-- Indices de la tabla `personaltierra`
--
ALTER TABLE `personaltierra`
  ADD PRIMARY KEY (`Id_Personal`);

--
-- Indices de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  ADD PRIMARY KEY (`Id_Reclamos`),
  ADD KEY `pasajero_Id_Pasajero_reclamos` (`Id_Pasajero`);

--
-- Indices de la tabla `tripulacion`
--
ALTER TABLE `tripulacion`
  ADD PRIMARY KEY (`Id_Tripulacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`Id_Vuelo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aeronave`
--
ALTER TABLE `aeronave`
  MODIFY `Id_Aeronave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `aeropuerto`
--
ALTER TABLE `aeropuerto`
  MODIFY `Id_Aeropuerto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `boleto`
--
ALTER TABLE `boleto`
  MODIFY `Id_Boleto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `Id_Ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `Id_Clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `Id_Detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `equipaje`
--
ALTER TABLE `equipaje`
  MODIFY `Id_Equipaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `Id_Factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `listaasientos`
--
ALTER TABLE `listaasientos`
  MODIFY `Id_Lista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `Id_Lugar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `moneda`
--
ALTER TABLE `moneda`
  MODIFY `Id_Moneda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `Id_Pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `parametro`
--
ALTER TABLE `parametro`
  MODIFY `Id_Parametro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  MODIFY `Id_Pasajero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `paseabordar`
--
ALTER TABLE `paseabordar`
  MODIFY `Id_Pase` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personaltierra`
--
ALTER TABLE `personaltierra`
  MODIFY `Id_Personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  MODIFY `Id_Reclamos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tripulacion`
--
ALTER TABLE `tripulacion`
  MODIFY `Id_Tripulacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `Id_Vuelo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aeropuerto`
--
ALTER TABLE `aeropuerto`
  ADD CONSTRAINT `ciudad_Id_Ciudad_aeropuerto` FOREIGN KEY (`Id_Ciudad`) REFERENCES `ciudad` (`Id_Ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD CONSTRAINT `boleto_ibfk_1` FOREIGN KEY (`Id_Pasajero`) REFERENCES `pasajero` (`Id_Pasajero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vuelo_Id_Vuelo_boleto` FOREIGN KEY (`Id_Vuelo`) REFERENCES `vuelo` (`Id_Vuelo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paseabordar`
--
ALTER TABLE `paseabordar`
  ADD CONSTRAINT `boleto_Id_Boleto_paseabordar` FOREIGN KEY (`Id_Boleto`) REFERENCES `boleto` (`Id_Boleto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pasajero_Id_Pasajero_paseabordar` FOREIGN KEY (`Id_Pasajero`) REFERENCES `pasajero` (`Id_Pasajero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reclamos`
--
ALTER TABLE `reclamos`
  ADD CONSTRAINT `pasajero_Id_Pasajero_reclamos` FOREIGN KEY (`Id_Pasajero`) REFERENCES `pasajero` (`Id_Pasajero`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
