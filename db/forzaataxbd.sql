-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2020 a las 18:32:07
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `forzaataxbd`
--
CREATE DATABASE IF NOT EXISTS `forzaataxbd` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `forzaataxbd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id` int(11) NOT NULL,
  `marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `anyo` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `clase` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `valor_inicial` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `valor_total` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `marca`, `modelo`, `anyo`, `clase`, `valor_inicial`, `valor_total`) VALUES
(1, 'Abarth', '124 Spider', '2017', 'C 577', '2000', '43500'),
(2, 'Abarth', '695 Biposto', '2016', 'B 607', '2000', '48000'),
(3, 'Acura', 'NSX', '2017', 'S1 850', '50000', '170000'),
(4, 'Alfa Romeo', '8C Competizione', '2007', 'A 777', '2000', '74000'),
(5, 'Alfa Romeo', 'Giulia Quadrifoglio', '2017', 'A 795', '50000', '120000'),
(6, 'Ariel', 'Atom 500 V8', '2013', 'S2 970', '50000', '108000'),
(7, 'Aston Martin', 'DB5', '1964', 'C 534', '100000', '800000'),
(8, 'Aston Martin', 'DB11', '2017', 'S1 810', '50000', '300000'),
(9, 'Aston Martin', 'One-77', '2010', 'S1 863', '500000', '1400000'),
(10, 'Aston Martin', 'Vantage', '2018', 'S1 822', '50000', '400000'),
(11, 'Aston Martin', 'Vulcan', '2016', 'S2 954', '500000', '1500000'),
(12, 'Audi', 'R8 V10 plus', '2016', 'S1 856', '50000', '242000'),
(13, 'Audi', 'RS 6 Avant', '2015', 'A 778', '50000', '150000'),
(14, 'Audi', 'RS 7 Sportback', '2013', 'A 761', '50000', '225000'),
(15, 'Audi', 'S1', '2015', 'B 679', '2000', '35000'),
(16, 'Audi', 'TTS Coupe', '2015', 'A 740', '2000', '52000'),
(17, 'Auto Union', 'Type D', '1939', 'B 692', '2000000', '10000000'),
(18, 'BAC', 'Mono', '2014', 'S1 900', '50000', '160000'),
(19, 'Bentley', 'Continental GT Speed', '2013', 'A 774', '50000', '492000'),
(20, 'Bentley', 'Continental Supersports', '2017', 'A 798', '50000', '200000'),
(24, 'BMW', '2002 Turbo', '1973', 'D 500', '2000', '26000'),
(25, 'BMW', 'M3', '2005', 'B 700', '2000', '33000'),
(26, 'BMW', 'M3-GTR', '2002', 'A 765', '50000', '120000'),
(27, 'BMW', 'M4 Coupe', '2014', 'A 800', '2000', '92000'),
(28, 'BMW', 'M4 GTS', '2016', 'S1 841', '50000', '135000'),
(29, 'BMW', 'M5-2009', '2009', 'A 758', '2000', '90000'),
(30, 'BMW', 'M5-2018', '2018', 'S1 806', '50000', '105000'),
(31, 'BMW', 'Z4 Roadster', '2019', 'A 722', '2000', '35000'),
(32, 'Bowler', 'EXR S', '2012', 'A 760', '50000', '200000'),
(33, 'Bugatti', 'Chiron', '2018', 'S2 938', '1000000', '2400000'),
(34, 'Bugatti', 'Veyron Super Sport', '2011', 'S2 922', '1000000', '2200000'),
(35, 'Chevrolet', 'Camaro ZL1 1LE', '2018', 'S1 849', '50000', '105000'),
(36, 'Chevrolet', 'Camaro ZL1', '2017', 'S1 848', '2000', '60000'),
(37, 'Chevrolet', 'Corvette ZR1', '2019', 'S1 895', '50000', '225000'),
(38, 'Dodge', 'Challenger SRT Demon', '2018', 'S1 823', '50000', '150000'),
(39, 'Dodge', 'SRT Viper GTS', '2013', 'S1 831', '2000', '95000'),
(40, 'Dodge', 'Viper ACR', '2016', 'S1 893', '50000', '150000'),
(41, 'Ferrari', '512 Testarossa', '1992', 'A 754', '50000', '270000'),
(42, 'Ferrari', '430 Scuderia', '2007', 'S1 834', '50000', '300000'),
(43, 'Ferrari', '458 Italia', '2009', 'S1 846', '50000', '225000'),
(44, 'Ferrari', '458 Speciale', '2013', 'S1 885', '50000', '340000'),
(45, 'Ferrari', '488 GTB', '2015', 'S1 883', '50000', '290000'),
(46, 'Ferrari', '599XX Evolution', '2012', 'S2 979', '50000', '250000'),
(47, 'Ferrari', '812 Superfast', '2017', 'S1 897', '500000', '1400000'),
(48, 'Ferrari', 'California T', '2014', 'S1 804', '50000', '240000'),
(49, 'Ferrari', 'Enzo Ferrari', '2002', 'S1 874', '1000000', '2800000'),
(50, 'Ferrari', 'F40 Competizione', '1989', 'S2 961', '2000000', '3000000'),
(51, 'Ferrari', 'FXX K', '2014', 'S2 989', '1000000', '2700000'),
(52, 'Ferrari', 'LaFerrari', '2013', 'S2 966', '1000000', '1500000'),
(53, 'Ford', 'Focus RS', '2017', 'A 718', '2000', '59000'),
(54, 'Ford', 'GT', '2017', 'S1 900', '50000', '400000'),
(55, 'Ford', 'Mustang', '2018', 'A 778', '2000', '40000'),
(56, 'Ford', 'RS200', '1985', 'S1 839', '50000', '260000'),
(57, 'Honda', 'Civic Type-R', '1997', 'C 551', '2000', '25000'),
(58, 'Honda', 'NSX-R', '1992', 'A 707', '2000', '90000'),
(59, 'Honda', 'S2000 CR', '2009', 'B 647', '2000', '25000'),
(60, 'Hoonigan', 'Ford Hoonicorn Mustang', '1965', 'S2 985', '100000', '500000'),
(61, 'Hoonigan', 'Ford Focus RS RX', '2016', 'S1 886', '100000', '500000'),
(62, 'Hoonigan', 'Ford Escort Cosworth', '1991', 'S1 880', '100000', '500000'),
(63, 'Hoonigan', 'Porsche 911 Turbo', '1991', 'S1 850', '50000', '160000'),
(64, 'Infiniti', 'Q50 Eau Rouge', '2014', 'A 783', '50000', '100000'),
(65, 'Infiniti', 'Q60 Concept', '2015', 'A 757', '2000', '50000'),
(66, 'Jaguar', 'D-Type', '1956', 'C 513', '7500000', '10000000'),
(67, 'Jaguar', 'F-Type R Coupe', '2015', 'A 795', '50000', '110000'),
(68, 'Jaguar', 'XE-S', '2015', 'B 660', '2000', '57000'),
(69, 'Jaguar', 'XJ220', '1993', 'S1 811', '100000', '350000'),
(70, 'Jaguar', 'XKR-S GT', '2015', 'A 798', '50000', '190000'),
(71, 'Jeep', 'Trailcat', '2016', 'A 790', '2000', '75000'),
(72, 'Jeep', 'Grand Cherokee Trackhawk', '2018', 'A 780', '2000', '73000'),
(73, 'Kia', 'Stinger', '2018', 'A 715', '2000', '46000'),
(74, 'Koenigsegg', 'Agera', '2011', 'S2 920', '1000000', '1500000'),
(75, 'Koenigsegg', 'Agera RS', '2017', 'S2 996', '1000000', '2000000'),
(76, 'Koenigsegg', 'One:1', '2015', 'S2 993', '1000000', '2850000'),
(77, 'Koenigsegg', 'Regera', '2016', 'S2 972', '1000000', '1900000'),
(78, 'Lamborghini', 'Aventador LP750-4 SV', '2016', 'S2 906', '100000', '480000'),
(79, 'Lamborghini', 'Centenario LP 770-4', '2016', 'S2 918', '1000000', '2300000'),
(80, 'Lamborghini', 'Diablo SV', '1997', 'A 787', '50000', '174000'),
(81, 'Lamborghini', 'Gallardo LP 570-4 ', '2011', 'S1 833', '50000', '180000'),
(82, 'Lamborghini', 'Huracán LP 610-4', '2014', 'S1 866', '100000', '240000'),
(83, 'Lamborghini', 'Murciélago LP 670-4 SV', '2010', 'S1 840', '100000', '500000'),
(84, 'Lamborghini', 'Reventon', '2008', 'S1 847', '1000000', '1375000'),
(85, 'Lamborghini', 'Sesto Elemento', '2011', 'S2 948', '1000000', '2500000'),
(86, 'Lamborghini', 'Urus', '2019', 'A 795', '50000', '150000'),
(87, 'Lamborghini', 'Veneno', '2013', 'S2 943', '3000000', '4500000'),
(88, 'Land Rover', 'Range Rover Sport SVR', '2015', 'A 752', '50000', '133000'),
(89, 'Land Rover', 'Series III', '1972', 'D 100', '2000', '20000'),
(90, 'Lotus', '2-Eleven', '2009', 'S1 813', '50000', '130000'),
(91, 'Lotus', '3-Eleven', '2016', 'S1 870', '50000', '150000'),
(92, 'Lotus', 'Exige S', '2012', 'A 772', '2000', '85000'),
(93, 'Maserati', 'Gran Turismo S', '2010', 'A 727', '50000', '156000'),
(94, 'Maserati', 'MC12', '2004', 'S1 861', '500000', '1000000'),
(95, 'Maserati', 'MC12 Versione Corsa', '2008', 'S2 993', '1000000', '2500000'),
(96, 'Mazda', 'MX-5', '2013', 'C 525', '2000', '26000'),
(97, 'Mazda', 'MX-5 Miata', '1994', 'D 428', '2000', '25000'),
(98, 'Mazda', 'RX-7', '1997', 'B 681', '2000', '35000'),
(99, 'Mazda', 'RX-7 Spirit R Type-A', '2002', 'A 711', '2000', '30000'),
(100, 'Mazda', 'RX-8', '2011', 'B 638', '2000', '27000'),
(101, 'McLaren', '570S Coupe', '2015', 'S1 848', '100000', '224000'),
(102, 'McLaren', '650S Coupe', '2015', 'S1 877', '100000', '420000'),
(103, 'McLaren', '720S Coupe', '2018', 'S2 929', '100000', '340000'),
(104, 'McLaren', 'F1', '1993', 'S1 826', '1000000', '2000000'),
(105, 'McLaren', 'P1', '2013', 'S2 962', '1000000', '1350000'),
(106, 'McLaren', 'Senna', '2018', 'S2 977', '500000', '1000000'),
(107, 'Mercedes-AMG', 'C 63 S Coupe', '2016', 'A 777', '2000', '90000'),
(108, 'Mercedes-AMG', 'GT 4-Door Coupe', '2018', 'A 797', '50000', '105000'),
(109, 'Mercedes-AMG', 'GT R', '2017', 'S1 858', '100000', '295000'),
(110, 'Mercedes-AMG', 'GT S', '2015', 'S1 820', '50000', '157000'),
(111, 'Mercedes-Benz', 'A 45 AMG', '2013', 'A 722', '2000', '65000'),
(112, 'Mercedes-Benz', 'E 63 AMG', '2013', 'A 777', '50000', '105000'),
(113, 'Mercedes-Benz', 'G 65 AMG', '2013', 'A 712', '100000', '261000'),
(114, 'Mercedes-Benz', 'SLK 55 AMG', '2011', 'S1 822', '2000', '78000'),
(115, 'Mercedes-Benz', 'SLS AMG', '2011', 'S1 822', '100000', '200000'),
(116, 'Mercedes-Benz', 'X-Class', '2018', 'D 417', '2000', '65000'),
(117, 'MINI', 'Cooper S', '1965', 'D 205', '2000', '30000'),
(118, 'MINI', 'John Cooper Works', '2009', 'B 639', '2000', '25000'),
(119, 'MINI', 'John Cooper Works GP', '2012', 'B 642', '2000', '38000'),
(120, 'Mitsubishi', 'Eclipse GSX', '1995', 'C 543', '2000', '25000'),
(121, 'Mitsubishi', 'Lancer Evo VI GSR', '1999', 'B 675', '2000', '28000'),
(122, 'Mitsubishi', 'Lancer Evo VIII MR', '2004', 'B 686', '2000', '31000'),
(123, 'Mitsubishi', 'Lancer Evo IX MR', '2006', 'B 649', '2000', '27000'),
(124, 'Mitsubishi', 'Lancer Evo X GSR', '2008', 'B 678', '2000', '43000'),
(125, 'Nissan', '370Z', '2010', 'A 716', '2000', '40000'),
(126, 'Nissan', 'Fairlady Z', '2003', 'B 671', '2000', '35000'),
(127, 'Nissan', 'GT-R', '2017', 'S1 836', '50000', '132000'),
(128, 'Nissan', 'Nismo GT-R LM', '1995', 'B 685', '500000', '1100000'),
(129, 'Nissan', 'Silvia Spec-R', '2000', 'B 643', '2000', '35000'),
(130, 'Nissan', 'Skyline GT-R V-Spec', '1997', 'B 633', '2000', '37000'),
(131, 'Nissan', 'Skyline GT-R V-Spec II', '2002', 'B 691', '2000', '63000'),
(132, 'Pagani', 'Huayra BC', '2016', 'S2 961', '1000000', '1500000'),
(133, 'Pagani', 'Zonda Cinque Roadster', '2009', 'S2 908', '1000000', '2100000'),
(134, 'Pagani', 'Zonda R', '2010', 'S2 966', '1000000', '1700000'),
(135, 'Peugeot', '205 T16', '1984', '50000', '200000', ''),
(136, 'Pontiac', 'GTO', '1965', 'C 514', '2000', '48000'),
(137, 'Porsche', '911 Carrera RS', '1973', 'B 631', '50000', '200000'),
(138, 'Porsche', 'Carrera S', '2019', 'S1 840', '50000', '105000'),
(139, 'Porsche', '911 GT2 RS', '2018', 'S2 910', '100000', '315000'),
(140, 'Porsche', '911 GT3 RS', '2016', 'S2 904', '50000', '235000'),
(141, 'Porsche', '911 Turbo S', '2014', 'S1 847', '50000', '200000'),
(142, 'Porsche', 'Carrera GT', '2003', 'S1 866', '100000', '400000'),
(143, 'Porsche', 'Cayman GT4', '2016', 'S1 840', '2000', '85000'),
(144, 'Radical', 'RXC Turbo', '2015', 'S2 958', '100000', '330000'),
(145, 'Renault', 'Clio RS', '2010', 'C 598', '2000', '25000'),
(146, 'Renault', 'Clio RS 200 EDC', '2013', 'B 606', '2000', '29000'),
(147, 'Renault', 'Megane RS 250', '2010', 'B 666', '2000', '30000'),
(148, 'Saleen', 'S5S Raptor', '2010', 'S1 873', '50000', '180000'),
(149, 'Saleen', 'S7', '2004', 'S1 879', '100000', '388000'),
(150, 'Shelby', 'Cobra 427 S/C', '1965', 'B 700', '1000000', '2100000'),
(151, 'Shelby', 'Monaco King Cobra', '1963', 'S1 837', '100000', '550000'),
(152, 'Spania GTA', 'Spano', '2016', 'S2 931', '100000', '800000'),
(153, 'Subaru', 'BRZ', '2013', 'C 562', '2000', '32000'),
(154, 'Subaru', 'Impreza WRX STI', '2005', 'B 694', '2000', '51000'),
(155, 'Subaru', 'WRX STI', '2015', 'B 693', '2000', '42000'),
(156, 'TVR', 'Cerbera Speed 12', '1998', 'S1 874', '100000', '500000'),
(157, 'TVR', 'Griffith', '2018', 'S1 844', '50000', '105000'),
(158, 'TVR', 'Sagaris', '2005', 'A 797', '2000', '86000'),
(159, 'Ultima', 'Evolution Coupe 1020', '2015', 'S2 998', '50000', '130000'),
(160, 'Vauxhall', 'Astra VXR', '2012', 'B 684', '2000', '25000'),
(161, 'Vauxhall', 'Corsa VXR', '2016', 'B 610', '2000', '28000'),
(162, 'Vauxhall', 'Insignia VXR', '2010', 'B 676', '2000', '42000'),
(163, 'Vauxhall', 'VX220', '2004', 'A 717', '2000', '20000'),
(164, 'Volkswagen', 'Beetle', '1963', 'D 100', '2000', '20000'),
(165, 'Volkswagen', 'Corrado VR6', '1995', 'C 535', '2000', '20000'),
(166, 'Volkswagen', 'Global RallyCross Beetle', '2014', 'S1 846', '100000', '500000'),
(167, 'Volkswagen', 'Golf GTI 16v Mk2', '1992', 'D 454', '2000', '20000'),
(168, 'Volkswagen', 'Golf R', '2014', 'B 672', '2000', '50000'),
(169, 'Volkswagen', 'Golf R32', '2003', 'B 630', '2000', '20000'),
(170, 'Volkswagen', 'Scirocco R', '2011', 'B 678', '2000', '45000'),
(171, 'Volkswagen', 'Type 2 De Luxe', '1963', 'D 100', '2000', '40000'),
(172, 'Volvo', 'Iron Knight', '2016', 'A 797', '100000', '800000'),
(173, 'Volvo', 'V60 Polestar', '2015', 'B 652', '2000', '62000'),
(174, 'W Motors', 'Lykan Hypersport', '2016', 'S2 907', '2000000', '3400000'),
(175, 'Zenvo', 'ST1', '2016', 'S1 900', '500000', '1000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE `propiedades` (
  `id` int(10) NOT NULL,
  `p_id_usuario` int(5) NOT NULL,
  `p_id_coche` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`id`, `p_id_usuario`, `p_id_coche`) VALUES
(8, 10, 15),
(11, 10, 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastas`
--

CREATE TABLE `subastas` (
  `id` int(10) NOT NULL,
  `s_id_coche` int(11) NOT NULL,
  `s_valor_inicial` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `s_valor_total` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `s_id_usuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(5) NOT NULL,
  `nombreusuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido2` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol` int(1) NOT NULL,
  `creditos` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombreusuario`, `pass`, `nombre`, `email`, `apellido1`, `apellido2`, `rol`, `creditos`) VALUES
(7, 'admindavid', '1e1dc6002f0870f623142775fe303567', 'David', 'forzaatax@mail.com', 'Ruiz', 'Hurtado', 1, 150000),
(9, 'prueba2', '22d42239093b0af5ed4f2efa91646cf2', 'Prueba', 'prueba2@mail.com', 'pppp', 'uuuu', 0, 0),
(10, 'prueba3', '6a46ba184da735036783b7fee0dfb9ca', 'Prueba', 'prueba@mail.com', 'pppp', '', 0, 150000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_usuario` (`p_id_usuario`),
  ADD KEY `p_coche` (`p_id_coche`);

--
-- Indices de la tabla `subastas`
--
ALTER TABLE `subastas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_usuario` (`s_id_usuario`),
  ADD KEY `s_id_coche` (`s_id_coche`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coches`
--
ALTER TABLE `coches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `subastas`
--
ALTER TABLE `subastas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD CONSTRAINT `p_coche` FOREIGN KEY (`p_id_coche`) REFERENCES `coches` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p_usuario` FOREIGN KEY (`p_id_usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `subastas`
--
ALTER TABLE `subastas`
  ADD CONSTRAINT `Coche` FOREIGN KEY (`s_id_coche`) REFERENCES `propiedades` (`p_id_coche`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Usuario` FOREIGN KEY (`s_id_usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
