-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-01-2022 a las 11:20:35
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
-- Base de datos: `hoteles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`) VALUES
(1, 'Mallorca'),
(2, 'Madrid'),
(3, 'Menorca'),
(4, 'Ibiza'),
(5, 'Barcelona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `id_multimedia` int(11) DEFAULT NULL,
  `puntuacion` int(11) DEFAULT NULL,
  `zona` varchar(150) DEFAULT NULL,
  `ciudad_id` int(11) DEFAULT NULL,
  `regimen` varchar(200) DEFAULT NULL,
  `descripcion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`id`, `nombre`, `id_multimedia`, `puntuacion`, `zona`, `ciudad_id`, `regimen`, `descripcion`) VALUES
(2, 'Nixe Palace', 1, 8, 'cala Major', 1, 'solo_alojamiento', 'El lujoso Nixe Palace se encuentra junto a la playa de Cala Major y al palacio de Marivent. Ofrece piscina al aire libre, spa gratuito y habitaciones con aire acondicionado y conexión WiFi gratuita.'),
(3, 'Hotel Riu Plaza España', 2, 4, 'Gran via', 2, 'pensión completa', 'El Hotel Riu Plaza España disfruta de una categoría cuatro estrellas. Está compuesto por un total de 585 habitaciones'),
(4, 'Hotel Chamartin The One', 3, 4, 'Chamartin', 2, 'pensión completa', 'Privilegiada situación en el corazón de Madrid, junto al Paseo de la Castellana, muy cerca del estadio Santiago Bernabéu y en el mismo nuevo centro financiero y comercial de la capital.'),
(5, 'Spa Sagitario Playa', 5, 4, 'Cala Blanca', 3, 'Pensión Completa', 'El Hotel Port Mahón destaca por su privilegiada ubicación, al estar situado en una tranquila zona residencial de Maó, con excelentes vistas sobre el Puerto.'),
(6, 'Hotel Port Mahon', 5, 4, 'Mahon', 3, 'Pensión Completa', 'Este moderno hotel de playa está situado a 3,5 km de Ciutadella, la antigua capital de Menorca, a unos 300 m de la playa de Cala Blanca.'),
(7, 'Hotel 1898', 7, 5, 'La Rambla', 5, 'Pensión completa', 'Hotel catalogado como 5* G.L. Monumento, nace de una muy cuidada rehabilitación que respeta y potencia el interiorismo del emblemático edificio de 1.908'),
(8, 'Hotel Casa Fuster', 6, 5, 'Passeig de Gracia', 5, 'Pensión completa', 'Relájate en el spa completo, que ofrece masajes, tratamientos corporales y tratamientos faciales. Si quieres divertirte aquí tienes para elegir.'),
(9, 'Ocean Drive Ibiza', 9, 4, 'Ibiza Capital', 4, 'Media pensión', 'Elige entre las numerosas instalaciones recreativas ofrecidas, que incluyen piscina al aire libre y gimnasio.'),
(10, 'Duquesa Playa', 8, 4, 'Santa Eulalia del río', 4, 'Media pensión', 'Con una terraza en la azotea donde descansar y comodidades como conexión a Internet wifi gratis y servicios de conserjería, ¡no te faltará de nada!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `id_hotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `imagen`, `id_hotel`) VALUES
(1, '../img/nixe1.jpg', 2),
(2, '../img/riuPlazamadrid2.jpeg', 3),
(3, '../img/chamartinOne4.jpeg', 4),
(4, '../img/puertoMahon2.jpeg', 6),
(5, '../img/spaSagitario1.jpeg', 5),
(6, '../img/hotelFuster1.jpeg', 8),
(7, '../img/1989.jpeg', 7),
(8, '../img/duquesaPlaya.jpeg', 10),
(9, '../img/ocenaIbiza.jpeg', 9),
(10, '../img/duquesaPlaya2.jpeg', 10),
(11, '../img/hotelDuster4.jpeg', 8),
(12, '../img/hotelFuster2.jpeg', 8),
(13, '../img/hotelDuster4.jpeg', 8),
(14, '../img/ocenaIbiza2.jpeg', 9),
(16, '../img/puertoMahon3.jpeg', 6),
(17, '../img/puertoMahon4.jpeg', 6),
(18, '../img/nixe2.jpeg', 2),
(19, '../img/nixe3.jpeg', 2),
(20, '../img/riuPlazaMadrid3.jpeg', 3),
(21, '../img/imagenhoteles.png', 3),
(22, '../img/nixe2.jpeg', 2),
(23, '../img/nixe3.jpeg', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciudad_id` (`ciudad_id`),
  ADD KEY `id_multimedia` (`id_multimedia`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hotelRel` (`id_hotel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudad` (`id`),
  ADD CONSTRAINT `hotel_ibfk_2` FOREIGN KEY (`id_multimedia`) REFERENCES `imagen` (`id`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `id_hotelRel` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
