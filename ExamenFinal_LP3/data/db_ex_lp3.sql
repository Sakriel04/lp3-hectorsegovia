-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-11-2023 a las 22:15:11
-- Versión del servidor: 8.0.35-0ubuntu0.20.04.1
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
-- Base de datos: `db_ex_lp3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int NOT NULL,
  `nombre_cliente` varchar(45) NOT NULL,
  `apellido_cliente` varchar(45) NOT NULL,
  `ruc_ci` varchar(45) NOT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `otros_datos` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_compra_det`
--

CREATE TABLE `factura_compra_det` (
  `id_factura_compra_det` int NOT NULL,
  `cantidad` double UNSIGNED NOT NULL,
  `precio_compra` double UNSIGNED NOT NULL,
  `porcentaje_iva` double UNSIGNED NOT NULL,
  `nro_factura` varchar(25) NOT NULL,
  `id_proveedor` int NOT NULL,
  `id_item` int NOT NULL,
  `lote_nro` varchar(15) DEFAULT NULL,
  `fecha_mes` varchar(2) DEFAULT NULL,
  `fecha_ano` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_compra_enc`
--

CREATE TABLE `factura_compra_enc` (
  `nro_factura` varchar(25) NOT NULL,
  `id_proveedor` int NOT NULL,
  `fecha_factura` date NOT NULL,
  `id_tipo_factura` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_ventas_det`
--

CREATE TABLE `factura_ventas_det` (
  `id_factura` int NOT NULL,
  `id_item` int NOT NULL,
  `NomProd` varchar(45) NOT NULL,
  `cod_bar` varchar(45) DEFAULT NULL,
  `p_costo` double NOT NULL,
  `p_venta` double NOT NULL,
  `porc_iva` double NOT NULL,
  `cantidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_ventas_enc`
--

CREATE TABLE `factura_ventas_enc` (
  `id_factura` int NOT NULL,
  `timbrado` varchar(10) NOT NULL,
  `nro_factura` int UNSIGNED NOT NULL,
  `fecha_factura` timestamp NOT NULL,
  `anulado` tinyint NOT NULL,
  `id_clientes` int NOT NULL,
  `id_tipo_factura` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id_item` int NOT NULL,
  `codigobarras` varchar(45) DEFAULT NULL,
  `nombre_item` varchar(50) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `precio_costo` double UNSIGNED NOT NULL,
  `precio_venta` double UNSIGNED NOT NULL,
  `id_categoria` int NOT NULL,
  `id_marca` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_categorias`
--

CREATE TABLE `item_categorias` (
  `id_categoria` int NOT NULL,
  `descripcion_categoria` varchar(45) NOT NULL,
  `porcentaje_iva` double UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_marcas`
--

CREATE TABLE `item_marcas` (
  `id_marca` int NOT NULL,
  `nombre_marca` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int NOT NULL,
  `nombre_proveedor` varchar(45) NOT NULL,
  `ruc` varchar(45) NOT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `otros_datos` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int NOT NULL,
  `nombre_rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_permisos`
--

CREATE TABLE `roles_permisos` (
  `id_permiso` int NOT NULL,
  `id_rol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_factura`
--

CREATE TABLE `tipo_factura` (
  `id_tipo_factura` int NOT NULL,
  `descripcion_tipo_factura` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `alias` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_vehiculo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nombre`, `apellido`, `alias`, `password`, `id_vehiculo`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$qCl4bLtuAAo15v5lhk7ulu4JsT5Wp0McS9YoGJ9TeBGPx7.XwuTp2', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_roles`
--

CREATE TABLE `usuarios_roles` (
  `id_user` int NOT NULL,
  `id_rol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int NOT NULL,
  `descripcion_vehiculo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `descripcion_vehiculo`) VALUES
(2, 'Furgoneta'),
(1, 'Moto'),
(0, 'Sin Vehículo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`),
  ADD UNIQUE KEY `ruc_ci_UNIQUE` (`ruc_ci`);

--
-- Indices de la tabla `factura_compra_det`
--
ALTER TABLE `factura_compra_det`
  ADD PRIMARY KEY (`id_factura_compra_det`),
  ADD KEY `fk_factura_compra_det_factura_compra_enc1_idx` (`nro_factura`,`id_proveedor`),
  ADD KEY `fk_factura_compra_det_items1_idx` (`id_item`);

--
-- Indices de la tabla `factura_compra_enc`
--
ALTER TABLE `factura_compra_enc`
  ADD PRIMARY KEY (`nro_factura`,`id_proveedor`),
  ADD KEY `fk_factura_compra_enc_proveedores1_idx` (`id_proveedor`),
  ADD KEY `fk_factura_compra_enc_tipo_factura1_idx` (`id_tipo_factura`);

--
-- Indices de la tabla `factura_ventas_det`
--
ALTER TABLE `factura_ventas_det`
  ADD PRIMARY KEY (`id_factura`,`id_item`),
  ADD KEY `fk_factura_ventas_det_items1_idx` (`id_item`);

--
-- Indices de la tabla `factura_ventas_enc`
--
ALTER TABLE `factura_ventas_enc`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `fk_factura_ventas_encab_clientes1_idx` (`id_clientes`),
  ADD KEY `fk_factura_ventas_encab_tipo_factura1_idx` (`id_tipo_factura`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_items_item_categorias1_idx` (`id_categoria`),
  ADD KEY `fk_items_item_marcas1_idx` (`id_marca`);

--
-- Indices de la tabla `item_categorias`
--
ALTER TABLE `item_categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `descripcion_categoria_UNIQUE` (`descripcion_categoria`);

--
-- Indices de la tabla `item_marcas`
--
ALTER TABLE `item_marcas`
  ADD PRIMARY KEY (`id_marca`),
  ADD UNIQUE KEY `nombre_marca_UNIQUE` (`nombre_marca`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD UNIQUE KEY `descripcion_UNIQUE` (`descripcion`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `ruc_ci_UNIQUE` (`ruc`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `nombre_rol_UNIQUE` (`nombre_rol`);

--
-- Indices de la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  ADD PRIMARY KEY (`id_permiso`,`id_rol`),
  ADD KEY `fk_roles_permisos_roles1_idx` (`id_rol`);

--
-- Indices de la tabla `tipo_factura`
--
ALTER TABLE `tipo_factura`
  ADD PRIMARY KEY (`id_tipo_factura`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_usuarios_vehiculos1_idx` (`id_vehiculo`);

--
-- Indices de la tabla `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
  ADD PRIMARY KEY (`id_user`,`id_rol`),
  ADD KEY `fk_usuarios_roles_roles1_idx` (`id_rol`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD UNIQUE KEY `descripcion_vehiculo_UNIQUE` (`descripcion_vehiculo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura_compra_det`
--
ALTER TABLE `factura_compra_det`
  ADD CONSTRAINT `fk_factura_compra_det_factura_compra_enc1` FOREIGN KEY (`nro_factura`,`id_proveedor`) REFERENCES `factura_compra_enc` (`nro_factura`, `id_proveedor`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_factura_compra_det_items1` FOREIGN KEY (`id_item`) REFERENCES `items` (`id_item`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura_compra_enc`
--
ALTER TABLE `factura_compra_enc`
  ADD CONSTRAINT `fk_factura_compra_enc_proveedores1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_factura_compra_enc_tipo_factura1` FOREIGN KEY (`id_tipo_factura`) REFERENCES `tipo_factura` (`id_tipo_factura`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura_ventas_det`
--
ALTER TABLE `factura_ventas_det`
  ADD CONSTRAINT `fk_factura_ventas_det_factura_ventas_enc1` FOREIGN KEY (`id_factura`) REFERENCES `factura_ventas_enc` (`id_factura`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_factura_ventas_det_items1` FOREIGN KEY (`id_item`) REFERENCES `items` (`id_item`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura_ventas_enc`
--
ALTER TABLE `factura_ventas_enc`
  ADD CONSTRAINT `fk_factura_ventas_encab_clientes1` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_clientes`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_factura_ventas_encab_tipo_factura1` FOREIGN KEY (`id_tipo_factura`) REFERENCES `tipo_factura` (`id_tipo_factura`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_items_item_categorias1` FOREIGN KEY (`id_categoria`) REFERENCES `item_categorias` (`id_categoria`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_items_item_marcas1` FOREIGN KEY (`id_marca`) REFERENCES `item_marcas` (`id_marca`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  ADD CONSTRAINT `fk_roles_permisos_permisos` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_roles_permisos_roles1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_vehiculos1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
  ADD CONSTRAINT `fk_usuarios_roles_roles1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuarios_roles_usuarios1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
