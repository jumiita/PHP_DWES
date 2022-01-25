-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-01-2022 a las 15:26:45
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `booking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` int(12) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`) VALUES
(1, 'palma'),
(2, 'Gran via'),
(3, 'chamartin'),
(4, 'Cala blanca'),
(5, 'Mahon'),
(6, 'La Rambla'),
(7, 'Passeig de Gracia'),
(8, 'Ibiza Capita'),
(9, 'Santa eulalia del rio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id_habitacion` int(11) NOT NULL,
  `precio` int(11) DEFAULT NULL,
  `num_camas` int(11) DEFAULT NULL,
  `num_pers` int(11) DEFAULT NULL,
  `id_hotel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `estado` enum('Desocupada','Ocupada','Mantenimiento') NOT NULL DEFAULT 'Desocupada',
  `descripcion` varchar(800) NOT NULL,
  `id_imagen` int(11) NOT NULL,
  `zona` varchar(60) DEFAULT NULL,
  `ciudad_id` int(11) DEFAULT NULL,
  `puntuacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nombre`, `estado`, `descripcion`, `id_imagen`, `zona`, `ciudad_id`, `puntuacion`) VALUES
(12, 'Hotel Nixe Palace', 'Desocupada', 'El lujoso Nixe Palace se encuentra  junto a la playa de Cala Major y al palacio de Marivent. \r\n Ofrece piscina al aire libre, spa gratuito y habitaciones con aire acondicionado y conexión WiFi gratuita.', 1, 'Cala Major', 1, 5),
(13, 'Hotel Riu Plaza España ', 'Desocupada', 'El Hotel Riu Plaza España disfruta de una categoría cuatro estrellas. Está compuesto por un total \r\nde 585 habitaciones', 2, 'Gran via', 2, 5),
(14, 'Hotel Chamartin The One', 'Desocupada', 'El Hotel Port Mahón destaca por su privilegiada ubicación, al estar situado en una tranquila zona residencial de Maó, \r\ncon excelentes vistas sobre el Puerto.', 3, 'Gran via', 3, 5),
(15, 'Spa Sagitario Playa', 'Desocupada', 'Descripcion Habitacion 4', 4, 'Cala Blanca', 4, 4),
(16, 'Hotel Port Mahon', 'Desocupada', 'Descripcion Habitacion 5', 5, 'Mahon', 5, 4),
(17, 'Hotel 1898', 'Desocupada', 'Descripcion Habitacion 6', 6, 'La Rambla', 6, 3),
(18, 'Hotel Casa Fuster', 'Desocupada', 'Descripcion Habitacion 7', 7, 'Passeig de Gracia', 7, 4),
(19, 'Ocean Drive Ibiza', 'Desocupada', 'Descripcion Habitacion 8', 8, 'Ibiza Capital', 8, 2),
(20, 'Duquesa Playa', 'Desocupada', 'Descripcion Habitacion 9', 9, 'Santa Eulalia del rio', 9, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `id_imagen` int(11) NOT NULL,
  `url` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `id_imagen`, `url`) VALUES
(10, 1, '../img/nixe1.jpg'),
(11, 1, '../img/nixe2.jpeg'),
(12, 1, '../img/nixe3.jpeg'),
(13, 2, '../img/riuPlazamadrid2.jpeg'),
(14, 2, '../img/riuPlazaMadrid3.jpeg'),
(15, 3, '../img/chamartinOne4.jpeg'),
(16, 4, '../img/spaSagitario1.jpeg'),
(17, 5, '../img/puertoMahon3.jpeg'),
(18, 5, '../img/puertoMahon4.jpeg'),
(19, 6, '../img/1989.jpeg'),
(20, 7, '../img/hotelDuster4.jpeg'),
(21, 7, '../img/hotelFuster2.jpeg'),
(22, 8, '../img/ocenaIbiza.jpeg'),
(23, 9, '../img/duquesaPlaya.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reservas` int(11) NOT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `estado` enum('En espera','Tomada','Cancelada') NOT NULL DEFAULT 'En espera',
  `id_cliente` int(11) NOT NULL,
  `id_habitacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reservas`, `checkin`, `checkout`, `estado`, `id_cliente`, `id_habitacion`) VALUES
(1, '0000-00-00', '0000-00-00', 'Tomada', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_cliente` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_cliente`, `email`, `password`, `nombre`, `telefono`) VALUES
(1, 'darciga@msn.es', '1234', 'Dante Omar', 666333562);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id_habitacion`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `hotel_ibfk_3` (`ciudad_id`),
  ADD KEY `id_imagen` (`id_imagen`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagen_ibfk_2` (`id_imagen`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reservas`),
  ADD KEY `reservas_ibfk_1` (`id_cliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reservas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`);

--
-- Filtros para la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_3` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudad` (`id`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_2` FOREIGN KEY (`id_imagen`) REFERENCES `hotel` (`id_imagen`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
