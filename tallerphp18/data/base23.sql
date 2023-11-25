-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-11-2023 a las 23:00:17
-- Versión del servidor: 8.0.34-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3-4ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base23`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `idCiudad` int NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`idCiudad`, `nombre`) VALUES
(1, 'CAAGUAZU'),
(2, 'CAMPO 9'),
(3, 'REPATRIACION'),
(4, 'VILLARRICA'),
(5, 'PASTOREO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idCurso` int NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idCurso`, `nombre`) VALUES
(1, 'PHP'),
(2, 'JSP'),
(3, 'ANGULAR'),
(4, 'REACT'),
(5, 'VUE'),
(6, 'FLUTTER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `idEstudiante` int NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `idCiudad` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`idEstudiante`, `nombre`, `apellido`, `idCiudad`) VALUES
(1, 'Tasha', 'Santos', 3),
(2, 'Gil', 'Martinez', 2),
(3, 'Holly', 'Lima', 3),
(4, 'Sawyer', 'Barbara', 4),
(5, 'Jelani', 'Torres', 1),
(6, 'Penelope', 'Medina', 4),
(7, 'Clayton', 'Pascal', 3),
(8, 'Nola', 'Ferraz', 3),
(9, 'Hannah', 'Castro', 2),
(10, 'Deirdre', 'Rocio', 3),
(11, 'Isabella', 'Montero', 3),
(12, 'Maggy', 'Domingos', 1),
(13, 'Uta', 'Aguilar', 1),
(14, 'Neil', 'Mariano', 4),
(15, 'Porter', 'Suarez', 2),
(16, 'Bell', 'Castillo', 3),
(17, 'Skyler', 'Sebastian', 3),
(18, 'Armand', 'Zuniga', 3),
(19, 'Marah', 'Chichi', 4),
(20, 'Salvador', 'Messias', 4),
(21, 'Azalia', 'de Campos', 4),
(22, 'Edward', 'Fuentes', 3),
(23, 'Lysandra', 'Alexandra', 4),
(24, 'Abraham', 'Garcia', 2),
(25, 'Clare', 'Herrero', 3),
(26, 'Keaton', 'Barros', 4),
(27, 'Tasha', 'Rocha', 3),
(28, 'Shannon', 'Ferraz', 2),
(29, 'Karen', 'Lemos', 3),
(30, 'Timon', 'da Costa', 2),
(31, 'Igor', 'Nonato', 2),
(32, 'Tyrone', 'Teodoro', 3),
(33, 'Xandra', 'Vergara', 4),
(34, 'Katelyn', 'Vega', 2),
(35, 'Walker', 'Maia', 2),
(36, 'Kamal', 'Jimenez', 1),
(37, 'Seth', 'Vega', 3),
(38, 'Virginia', 'Gonzaga', 4),
(39, 'Shelly', 'Garrido', 2),
(40, 'Dana', 'Aguilar', 1),
(41, 'Miriam', 'Vieira', 1),
(42, 'Brittany', 'ﾑez', 3),
(43, 'Ulric', 'Lozano', 3),
(44, 'Brenda', 'Alexandra', 2),
(45, 'Theodore', 'Flores', 4),
(46, 'Rhona', 'Carrasco', 1),
(47, 'Jerry', 'Laura', 1),
(48, 'Jorden', 'Barreto', 3),
(49, 'Murphy', 'Santiago', 3),
(50, 'Pamela', 'da Rocha', 2),
(51, 'Emery', 'Gonzalez', 2),
(52, 'Desirae', 'Ortiz', 2),
(53, 'Gareth', 'Borges', 5),
(54, 'Morgan', 'Ruiz', 3),
(55, 'Rina', 'Santana', 3),
(56, 'Steel', 'Ortiz', 1),
(57, 'Miranda', 'Cano', 3),
(58, 'Emi', 'da Silveira', 4),
(59, 'Kitra', 'Vicente', 3),
(60, 'Drake', 'Morales', 4),
(61, 'Ruth', 'Maximiliano', 4),
(62, 'Tamekah', 'Leite', 1),
(63, 'Britanney', 'Monteiro', 1),
(64, 'Chaim', 'Domingos', 5),
(65, 'Otto', 'Cabrera', 2),
(66, 'Erin', 'Guedes', 5),
(67, 'Marah', 'Fagundes', 2),
(68, 'Boris', 'Sanchez', 4),
(69, 'Dennis', 'Carmona', 5),
(70, 'Andrew', 'Ramos', 4),
(71, 'Alden', 'Pia', 2),
(72, 'Sharon', 'Hernandez', 2),
(73, 'Lance', 'Cordeiro', 4),
(74, 'Brandon', 'Soto', 2),
(75, 'Candice', 'Mariano', 3),
(76, 'Hall', 'Costa', 5),
(77, 'Aaron', 'Montero', 5),
(78, 'Sacha', 'Vazquez', 4),
(79, 'Whoopi', 'Pinheiro', 3),
(80, 'Oliver', 'Soares', 2),
(81, 'Riley', 'Iglesias', 3),
(82, 'Constance', 'Gabriel', 2),
(83, 'Ivy', 'Lima', 5),
(84, 'Olympia', 'Flores', 3),
(85, 'Adara', 'Marin', 4),
(86, 'Azalia', 'Reyes', 4),
(87, 'Kenyon', 'Nascimento', 5),
(88, 'Emery', 'Azizi', 4),
(89, 'Xaviera', 'Siqueira', 4),
(90, 'Kevyn', 'Ignacio', 2),
(91, 'Faith', 'Cavalcante', 5),
(92, 'Kuame', 'Camila', 4),
(93, 'Ivory', 'Mota', 1),
(94, 'Finn', 'Peña', 5),
(95, 'Erasmus', 'Florencia', 2),
(96, 'Rama', 'de Araujo', 1),
(97, 'Kasimir', 'Aguiar', 2),
(98, 'Jeremy', 'Sebastian', 2),
(99, 'Guinevere', 'Sanchez', 2),
(100, 'Arthur', 'Miguel', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `idMatricula` int NOT NULL,
  `fecha` date NOT NULL,
  `idEstudiante` int NOT NULL,
  `idCurso` int NOT NULL,
  `idUsuario` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `nombre`) VALUES
(1, 'Super Usuario'),
(2, 'Administrador'),
(3, 'Usuario Estandar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `alias` varchar(65) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `idRol` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `alias`, `clave`, `idRol`) VALUES
(1, 'admin', '$2y$10$sDxYGkMjJU4Iz7kT7nqyqOhto.Wn/MO018vrd9cAyxUUeaUE2YewG', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`idCiudad`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idCurso`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD KEY `idCiudad` (`idCiudad`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`idMatricula`),
  ADD KEY `idEstudiante` (`idEstudiante`),
  ADD KEY `idCurso` (`idCurso`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `alias` (`alias`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `idCiudad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idCurso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `idEstudiante` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `idMatricula` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
