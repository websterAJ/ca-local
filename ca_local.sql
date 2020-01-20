
--
-- Base de datos: `ca_local`
--

CREATE DATABASE IF NOT EXISTS `ca_local`;

USE `ca_local`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  `statud` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `statud`) VALUES
(NULL, 'VISITANTE', 1),
(NULL, 'CONTRATISTA', 1),
(NULL, 'EMPLEADO', 1),
(NULL, 'EMPLEADO TEMPORAL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_user`
--

CREATE TABLE IF NOT EXISTS `data_user` (
  `id_data_user` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `sexo` tinyint(1) NOT NULL COMMENT '1 MASCULINO 0 FEMENINO',
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `data_user`
--

INSERT INTO `data_user` (`id_data_user`, `nombre`, `apellido`, `correo`, `telefono`, `sexo`, `direccion`) VALUES
(NULL, 'admin', 'admin', 'admin@admin.com', '0000-0000000', 1, 'caracas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id_dep` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `departamento` varchar(100) NOT NULL,
  `statud` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE IF NOT EXISTS `destino` (
  `id_destino` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `destino` varchar(50) NOT NULL,
  `statud_destino` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id_destino`, `destino`, `statud_destino`) VALUES
(NULL, 'MOVISTAR', 1),
(NULL, 'SEGUROS CARACAS', 1),
(NULL, 'MITSUBISHI', 1),
(NULL, 'CONDOMINIO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `id_per` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `id_dep` int(11) NOT NULL,
  `id_tip_per` int(11) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_personal`
--

CREATE TABLE IF NOT EXISTS `tipo_personal` (
  `id_tip_per` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `tipo_empleado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_user`
--

CREATE TABLE IF NOT EXISTS `tipo_user` (
  `id_tipo_user` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name_tipo_user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_user`
--

INSERT INTO `tipo_user` (`id_tipo_user`, `name_tipo_user`) VALUES
(NULL, 'administrador'),
(NULL, 'gerente'),
(NULL, 'supervisor'),
(NULL, 'empleado'),
(NULL, 'ADMINISTRADOR'),
(NULL, 'SUPERVISOR'),
(NULL, 'GERENTE'),
(NULL, 'EMPLEADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name_user` varchar(25) NOT NULL,
  `pass_user` varchar(60) NOT NULL,
  `forgot_pass` varchar(25) NOT NULL,
  `statud_user` tinyint(1) NOT NULL COMMENT '1 ACTIVO 2 INACTIVO',
  `id_data_user` int(11) NOT NULL,
  `id_tipo_user` int(11) NOT NULL,
  FOREIGN KEY (`id_data_user`) REFERENCES `data_user` (`id_data_user`),
  FOREIGN KEY (`id_tipo_user`) REFERENCES `tipo_user` (`id_tipo_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `name_user`, `pass_user`, `forgot_pass`, `statud_user`, `id_data_user`, `id_tipo_user`) VALUES
(NULL, 'admin', '$2y$10$ZoxnisPXH3o0ZpgF36WmweXvCKCkPw4v8P.yOaw5sb/cqw8fojkG2', 'admin', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitantes`
--

CREATE TABLE IF NOT EXISTS `visitantes` (
  `id_visitante` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cedula` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `origen` varchar(150) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE IF NOT EXISTS `visitas` (
  `id_visitas` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_visitante` int(11) NOT NULL,
  `id_per` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `pro_visita` text NOT NULL,
  `valides` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
