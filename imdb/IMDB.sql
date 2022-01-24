-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-12-2021 a las 00:15:57
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
-- Base de datos: `IMDB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `multimedia` (
  `id` int(11) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `yt` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `multimedia` (`id`, `url`, `yt`) VALUES
(1, './img/alerta%20roja.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/UUZ_DITqers\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(2, 'img/sangchi.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/MQRF_YezCgA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(3, 'img/la_rueda.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/oPABHsgT_4w\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(4, 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/arcane-league-of-legends-1636541499.jpg?crop=1.00xw:1.00xh;0,0&resize=640:*', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/0qSarZpylxs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(5, 'https://www.lacasadeel.net/wp-content/uploads/2021/03/Eternals-1.jpg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/f7aFqw3eYSs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(6, 'img/Yellowstone.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/opYyuupyWmA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(7, 'https://as01.epimg.net/meristation/imagenes/2021/09/14/reportajes/1631639806_688253_1631698265_noticia_normal.jpg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/1looWByWgW0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(8, 'img/sin_tiempo.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/90HtfG6dZAM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(9, 'img/Cazafantasmas_.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/1I1JrPgoM8U\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(10, 'https://www.lavanguardia.com/files/og_thumbnail/uploads/2021/08/23/6123ae3dbea01.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/I9PRSk53f5o\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(11, 'https://i2.wp.com/www.gamerfocus.co/wp-content/uploads/2021/10/cowboy-bepop-netflix-2021-poster-819x1024-1.jpg?resize=740%2C925&ssl=1', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/SHezHCSDiDk\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(12, 'https://media.news9live.com/h-upload/2021/10/01/30927-the-poster-for-jai-bhim-image-via-twittersuriyaoffl.jpg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/pVOd8HAQQZM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(13, 'img/soho.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/qwpVk8-JGvw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(14, 'img/Jungle_Cruise.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/hIJUnZnvAzA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(15, 'https://media.revistagq.com/photos/616d3352115cec0315ba5edf/master/pass/you.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/_oBO0GxMtac\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(16, 'img/mas_dura.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/qj9QUyZXsLI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(17, 'img/casa_de.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/DTdxse1MP90\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(18, 'img/mayor.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/9LEXBRazrzY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(19, 'img/Dexter_New_Blood_.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/t779a6O_Me0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(20, 'img/Finch1.jpeg', '<iframe width=\"875\" height=\"492\" src=\"https://www.youtube.com/embed/HjNpvOFqb54\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `idMultimedia` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `puntuacion` int(11) DEFAULT NULL,
  `idStaff` int(11) DEFAULT NULL,
  `descripcion` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `idMultimedia`, `titulo`, `genero`, `puntuacion`, `idStaff`, `descripcion`) VALUES
(1, 1, 'Alerta roja', 'Acción', 5, 1, 'En el mundo del crimen internacional, un agente de la Interpol intenta capturar al ladrón de arte más buscado del mundo.'),
(2, 2, 'Shang-Chi', 'Acción', 7, 2, 'Shang-Chi, el maestro del Kung Fu basado en armas, se ve obligado a confrontar su pasado después de ser atraído a la organización de los Diez Anillos.'),
(3, 3, 'La rueda del tiempo', 'Fantasia', 7, 3, 'Las vidas de cuatro jóvenes cambian para siempre cuando una desconocida llega a su aldea afirmando que uno de ellos es la encarnación de una antigua profecía y tiene el poder de inclinar la balanza entre la Luz y la Oscuridad. Deberán decidir si deja'),
(4, 4, 'Arcane', 'Animación', 8, 4, 'Arcane da vida a las relaciones que moldean a algunos de los famosos campeones de ‘League of Legends’, como Vi, Jinx, Caitlyn, Jayce y Viktor.'),
(5, 5, 'Eternals', 'Aventura', 6, 5, 'Los Eternos son una raza de seres inmortales con poderes sobrehumanos que han vivido en secreto en la Tierra durante miles de años. Aunque nunca han intervenido, ahora una amenaza se cierne sobre la humanidad.'),
(6, 6, 'Yellowstone', 'Drama', 9, 6, 'Una familia de rancheros en Montana se enfrenta a los invasores de su tierra.'),
(7, 7, 'Dune', 'Drama', 8, 7, 'Arrakis, también denominado \"Dune\", se ha convertido en el planeta más importante del universo. A su alrededor comienza una gigantesca lucha por el poder que culmina en una guerra interestelar.'),
(8, 8, 'Sin tiempo para morir', 'Acción', 6, 8, '\nEL legendario espía James Bond ha dejado el servicio activo. Su paz dura poco ya que su viejo amigo Felix Leiter de la CIA aparece pidiendo ayuda, lo que lleva a Bond al rastro de un misterioso villano armado con nueva tecnología peligrosa.'),
(9, 9, 'Ghostbusters: Afterlife', 'Fantasía', 6, 9, 'Cuando una madre soltera y sus dos hijos se mudan a una nueva ciudad, pronto descubren que tienen una conexión con los Cazafantasmas originales y el legado secreto de su abuelo.'),
(10, 10, 'Sucession', 'Fantasía', 7, 10, 'Succession es una serie de televisión de drama estadounidense sobre una familia disfuncional, dueña de un imperio de medios audiovisuales y de empresas de entretenimiento. Se estrenó el 3 de junio de 2018 en HBO.'),
(11, 11, 'cowboy bebop', 'Acción', 7, 11, 'Wéstern espacial rebosante de acción sobre tres cazarrecompensas —los «vaqueros»— que quieren olvidar su pasado.'),
(12, 12, 'Jaim Bhim', 'Crimen', 10, 12, 'Un abogado lucha por los derechos territoriales de los pueblos tribales.'),
(13, 13, 'Última noche en el Soho', 'Misterio', 7, 13, 'Una niña se remonta en el tiempo a la década de 1960 en Londres.'),
(14, 14, 'Jungle Cuise', 'Aventura', 7, 14, 'Basada en la atracción del parque temático Disneyland, en la que una pequeña embarcación fluvial lleva a un grupo de viajeros a través de una selva llena de animales y reptiles peligrosos, pero con un elemento sobrenatural.'),
(15, 15, 'You', 'Drama', 7, 15, 'Un ingenioso administrador de librerías confía en su conocimiento de Internet para hacer que la mujer de sus sueños se enamore de él.'),
(16, 16, 'Más dura será la caída', 'Del oeste', 7, 16, 'Cuando un forajido descubre que su enemigo va a salir de la cárcel, reúne a su banda para buscar venganza.'),
(17, 17, 'La casa de gucci', 'Drama', 7, 17, 'Cuando Patrizia Reggiani, una forastera de origen humilde, se casa con un miembro de la familia Gucci, su ambición comienza a desentrañar su legado y desencadena una temeraria espiral de traición, decadencia, venganza y asesinato.'),
(18, 18, 'Mayor of Kingstown', 'Suspense', 8, 18, 'The McLusky family are power brokers tackling themes of systemic racism, corruption and inequality in Kingstown, Michigan--where the business of incarceration is the only thriving industry.'),
(19, 19, 'Dexter New Blood', 'Crimen', 9, 19, 'Diez años después del final de la serie, Dexter Morgan vive con un nombre falso en la pequeña ciudad de Iron Lake, Nueva York. A raíz de eventos inesperados resurge su necesidad de dar rienda suelta a sus oscuros instintos.'),
(20, 20, 'Finch', 'Drama', 7, 20, 'En una Tierra postapocalíptica, un robot, construido para proteger la vida del querido perro de su creador, aprende sobre la vida, el amor, la amistad y lo que significa ser humano.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `director` varchar(70) DEFAULT NULL,
  `protagonista` varchar(40) DEFAULT NULL,
  `guion` varchar(300) DEFAULT NULL,
  `reparto_principal` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `staff`
--

INSERT INTO `staff` (`id`, `director`, `protagonista`, `guion`, `reparto_principal`) VALUES
(1, 'Rawson Marshall Thurber', 'The rock', 'Rawson Marshall Thurber', 'Dwayne_Johnson_ to_John Hartley,\n'),
(2, 'Destin Daniel Cretton', 'Simu Liu', 'Dave Callaham_to_ (screenplay by) & Destin Daniel Cretton	_to_(screenplay by) and Andrew Lanham_to_ (screenplay by)\n \nDave Callaham_to_screen story by) & Destin Daniel Cretton	_to_ (screen story by)\n \nSteve Englehart_to_ (Shang-Chi created by)  and Jim Starlin_to_ (Shang-Chi created by)\n', 'Simu Liu_to_Shaun / Shang-Chi\nTony Chiu-Wai Leung	_to_Xu Wenwu (as Tony Leung)\nAwkwafina_to_Katy\nBen Kingsley_to_Slattery\nMeng\'er Zhang_to_Xialing\nFala Chen_to_Li\nMichelle Yeoh_to_Ying Nan\n\n'),
(3, 'Rafe Judkins', 'Daniel Henney', 'Rafe Judkins, Michael Clarkson, Amanda Kate Shuman, Paul Clarkson', 'Rosamund Pike como Moiraine, miembro del grupo Aes Sedai3\nJosha Stradowski como Rand al\'Thor4\nMarcus Rutherford como Perrin Aybara4\n\n\n'),
(4, 'Arcane', 'Jinx', 'Christian Linke, Alex Yee. Historia: Christian Linke, Alex Yee, Conor Sheehy, Ash Brannon. Videojuego: Riot Games', 'Hailee Steinfeld como Vi, Ella Purnell como Jinx (Powder), Kevin Alejandro como Jayce, Katie Leung como Caitlyn, Jason Spisak como Silco, Toks Olagundoye como Mel, Brett Tucker como Singed, Miles Brown como Ekko, J. B. Blanc como Vander, Harry Lloyd como Viktor, Remy Hii como Marcus, Mick Wingert como Heimerdinger'),
(5, 'Chloé Zaho', 'Gemma Chann', 'Chloé Zhao, Matthew K. Firpo, Ryan Firpo, Patrick Burleigh. Cómic: Jack Kirby', ' Gemma Chan, Richard Madden, Kumail Nanjiani, Lia McHugh, Brian Tyree Henry, Lauren Ridloff, Barry Keoghan, Don Lee, Harish Patel, Kit Harington, Salma Hayek y Angelina Jolie'),
(6, 'John Linson', 'Kevin Costner', 'John Linson, Taylor Sheridan, Brett Conrad, John Coveny, Eric Jay Beck, Ian McCulloch', 'Kevin Costner, Kelly Reilly, Kelsey Chow, Wes Bentley, Danny Huston, Gil Birmingham, Cole Hauser, Ian Bohen, Luke Grimes, Michael Nouri, Wendy Moniz, Dave Annable, Geno Segers'),
(7, 'Dennis Villenueve', 'Timothée Chalamet', 'Eric Roth, Denis Villeneuve, Jon Spaihts. Novelas: Frank Herbert', 'Timothée Chalamet, Rebecca Ferguson, Oscar Isaac, Josh Brolin, Jason Momoa, Stellan Skarsgård, Zendaya, Javier Bardem, Sharon Duncan-Brewster, Charlotte Rampling, Chang Chen, Stephen Henderson, Dave Bautista'),
(8, 'Cary Joji', 'Daniel Craig', 'Neal Purvis, Robert Wade, Cary Joji Fukunaga, Phoebe Waller-Bridge', 'Daniel Craig, Léa Seydoux, Rami Malek, Lashana Lynch, Ralph Fiennes, Naomie Harris, Christoph Waltz, Ben Whishaw, Ana de Armas, Jeffrey Wright, Rory Kinnear, Dali Benssalah, Billy Magnussen'),
(9, 'Jason Reitman', 'Carrie Conn', 'Jason Reitman, Gil Kenan. Personaje: Dan Aykroyd, Harold Ramis', 'Carrie Coon, Paul Rudd, Finn Wolfhard, Mckenna Grace, Logan Kim, Celeste O\'Connor, Bill Murray, Dan Aykroyd, Ernie Hudson, Annie Potts, Sigourney Weaver, Bob Gunton, J.K. Simmons'),
(10, 'Jesse Armstrong', 'Nicholas Braun', 'Jeff Pinkner, Hajime Yatate, Keiko Nobumoto, Liz Sagal, Christopher Yost. Personajes: Shin\'ichirō Watanabe', 'John Cho, Mustafa Shakir, Daniella Pineda, Alex Hassell, Elena Satine, Geoff Stults, Tamara Tunie, Mason Alexander Park, Rachel House, Ann Truong, Lucy Currey, Blessing Mokgohloa, Cali Nelle'),
(11, 'Christopher L. Yost', 'John Cho', 'Jesse Armstrong, Susan Soon He Stanton, Georgia Pritchett, Jon Brown, Tony Roche, Jonathan Glatzer, Lucy Prebble', 'Brian Cox, Jeremy Strong, Sarah Snook, Kieran Culkin, Hiam Abbass, Alan Ruck, Nicholas Braun, Matthew Macfadyen, Peter Friedman, Katie Lee Hill, Peggy J. Scott, Christine Spang, James Cromwell'),
(12, 'Gananvel', 'Suriya', 'T.J. Gnanavel', 'Surya Sivakumar, Lijo Mol Jose, Rajesh Balachandiran, Sivalingam Babu, M.S. Bhaskar, Anbaana Arun'),
(13, 'Edgar Wright', 'Thomasin McKenzie', 'Krysty Wilson-Cairns, Edgar Wright', '\nThomasin McKenzie, Anya Taylor-Joy, Matt Smith, Terence Stamp, Diana Rigg, Rita Tushingham, Synnove Karlsen, Joakim Skarli, Andrew Bicknell, Colin Mace, Michael Ajao, Will Rogers, Will Rowlands'),
(14, 'Jaume Collet-Serra', 'The rock', '\nGlenn Ficarra, John Requa, Michael Green. Historia: John Norville, Josh Goldstein, Glenn Ficarra, John Requa', 'Dwayne Johnson, Emily Blunt, Jesse Plemons, Edgar Ramirez, Jack Whitehall, Paul Giamatti, Dani Rovira, Quim Gutiérrez, Veronica Falcón, Raphael Alejandro, Andy Nyman, Annika Pampel, Sulem Calderon'),
(15, 'Sera Ganle', 'Penn Bad', 'Greg Berlanti, Sera Gamble, Caroline Kepnes, April Blair', 'Penn Badgley, Elizabeth Lail, Shay Mitchell, Luca Padovan, Victoria Pedretti, Nicole Kang, Kathryn Gallagher, Victoria Cartagena, Daniel Cosgrove, Ambyr Childers, Jenna Ortega, Zach Cherry, James Scully'),
(16, 'Jeymes Samuel', 'Jonathan Majors', 'Jeymes Samuel, Boaz Yakin. Historia: Jeymes Samuel', 'Jonathan Majors, Idris Elba, Zazie Beetz, Regina King, Delroy Lindo, Lakeith Stanfield, RJ Cyler, Danielle Deadwyler, Edi Gathegi, Deon Cole, Damon Wayans Jr., Woody McClain, Julio Cedillo'),
(17, 'Ridley Scott', 'Lady Gaga', 'Roberto Bentivegna, Becky Johnson. Libro: Sara Gay Forden. Historia: Becky Johnston', 'Lady Gaga, Adam Driver, Al Pacino, Jeremy Irons, Jared Leto, Salma Hayek, Jack Huston, Alexia Murray, Vincent Riotta, Reeve Carney, Gaetano Bruno, Camille Cottin, Youssef Kerkour'),
(18, 'Hugh Dillon', 'Dianne Wiest', 'Hugh Dillon, Taylor Sheridan', 'Jeremy Renner, Kyle Chandler, Feaven Abera, Tobi Bamtefa, Amanda Barker, Darlene Cooke, Hugh Dillon, Elizabeth Erhart, Taylor Handley, Dorly Jean-Louis, James Jordan, Emma Laird Craig, Pha\'rez Lass'),
(19, 'James Manos', 'Dexter', 'Clyde Phillips. Novela: Jeff Lindsay\nMúsica\n', 'aMichael C. Hall, Julia Jones, Alano Miller, Johnny Sequoyah, Jack Alcott, Clancy Brown, Jamie Chung, Michael Cyril Creighton, Oscar Wahlberg, Madison LaPlante, David Magidoff, Steve M. Robertson, Armen Garo, Jennifer Carpenter'),
(20, 'Miguel Sapochnik', 'Tom Hanks', 'Craig Luck, Ivor Powell', 'Tom Hanks, Marie Wagenman. Voz: Caleb Landry Jones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre`, `password`) VALUES
(1, 'mix2@gmail.com', 'cachopoasfa', 'asdfghj'),
(5, 'mix21@gmail.com', 'cachopoasfa', 'asdfgh'),
(8, 'mix213@gmail.com', 'cachopoasfa', 'dfghbnm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMultimedia` (`idMultimedia`),
  ADD KEY `idStaff` (`idStaff`);

--
-- Indices de la tabla `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `multimedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`idMultimedia`) REFERENCES `multimedia` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pelicula_ibfk_2` FOREIGN KEY (`idStaff`) REFERENCES `staff` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
