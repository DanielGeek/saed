-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-06-2018 a las 05:49:46
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aire`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `comentarios` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` enum('Activo','Inactivo') COLLATE utf8_spanish_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `nombre`, `telefono`, `email`, `comentarios`, `estatus`, `ip`) VALUES
(1, 'luis', '04241231231', 'luis@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora saepe ea consequatur nobis asperiores, totam nemo magnam eos ab possimus dolor voluptate veniam, dolorem vitae quia! Consequatur corporis hic veritatis?', 'Inactivo', ''),
(2, 'Juan', '04161233212', 'juan@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora saepe ea consequatur nobis asperiores, totam nemo magnam eos ab possimus dolor voluptate veniam, dolorem vitae quia! Consequatur corporis hic veritatis?', 'Activo', ''),
(3, 'Admin', '04121231233', 'admin@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora saepe ea consequatur nobis asperiores, totam nemo magnam eos ab possimus dolor voluptate veniam, dolorem vitae quia! Consequatur corporis hic veritatis?', 'Inactivo', ''),
(4, 'Daniel', '04246504181', 'daniel@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora saepe ea consequatur nobis asperiores, totam nemo magnam eos ab possimus dolor voluptate veniam, dolorem vitae quia! Consequatur corporis hic veritatis?', 'Activo', ''),
(5, 'Flor', '04246504181', 'flor@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora saepe ea consequatur nobis asperiores, totam nemo magnam eos ab possimus dolor voluptate veniam, dolorem vitae quia! Consequatur corporis hic veritatis?', 'Activo', ''),
(6, 'Rebeca', '04246504181', 'rebeca@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora saepe ea consequatur nobis asperiores, totam nemo magnam eos ab possimus dolor voluptate veniam, dolorem vitae quia! Consequatur corporis hic veritatis?', 'Activo', ''),
(8, 'Ezequiel', '04121231233', 'ezequiel@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora saepe ea consequatur nobis asperiores, totam nemo magnam eos ab possimus dolor voluptate veniam, dolorem vitae quia! Consequatur corporis hic veritatis?', 'Activo', ''),
(9, 'Maria', '04121231233', 'maria@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora saepe ea consequatur nobis asperiores, totam nemo magnam eos ab possimus dolor voluptate veniam, dolorem vitae quia! Consequatur corporis hic veritatis?', 'Activo', ''),
(10, 'Jessica', '04121231233', 'jessica@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora saepe ea consequatur nobis asperiores, totam nemo magnam eos ab possimus dolor voluptate veniam, dolorem vitae quia! Consequatur corporis hic veritatis?', 'Activo', ''),
(11, 'Juana', '04241231231', 'juana@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora saepe ea consequatur nobis asperiores, totam nemo magnam eos ab possimus dolor voluptate veniam, dolorem vitae quia! Consequatur corporis hic veritatis?', 'Inactivo', ''),
(12, 'Ruth', '04241231231', 'ruth@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora saepe ea consequatur nobis asperiores, totam nemo magnam eos ab possimus dolor voluptate veniam, dolorem vitae quia! Consequatur corporis hic veritatis?', 'Inactivo', ''),
(13, 'Jhoana', '1231231', 'jo@gmail.com', 'Comentario Johana', 'Inactivo', ''),
(16, 'Luz', '', 'Luz@gmail.com', 'Coment Luz', 'Activo', ''),
(17, 'Tito', '', 'Tito@gmail.com', 'Coment Tito', 'Activo', ''),
(19, 'john_smith', '', 'john_smith@gmail.com', 'Coment john_smith', 'Inactivo', ''),
(20, 'Don Jose', '', 'Jose@gmail.com', 'Coment Jose', 'Inactivo', ''),
(21, 'Jhon', '', 'john_smith@gmail.com', 'Coment Jhon\r\n', 'Activo', ''),
(23, 'dona_huber', '', 'dona_huber@gmail.com', 'Comentario de Dona', 'Inactivo', ''),
(25, 'danielo', '', 'danielo@gmail.com', 'coment...', 'Activo', ''),
(26, 'dangel', '', 'dona_huber@gmail.com', 'comentario...', 'Inactivo', ''),
(28, 'Esther', '', 'Esther@hotmail.com', 'coment esther...', 'Activo', ''),
(38, 'amarok', '1231231', 'pruebaamarok@gmail.com', '123', 'Inactivo', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `comentarios` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `email`, `comentarios`, `ip`) VALUES
(1, 'Daniel', 'daniel30081990@gmail.com', 'hola', '::1'),
(2, 'Daniel', 'daniel30081990@gmail.com', 'hola 2', '::1'),
(3, 'Daniel', 'daniel30081990@gmail.com', 'hola 3', '::1'),
(4, 'Elias', 'daniel30081990@gmail.com', 'Hola Excelente pagina!', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id` int(11) NOT NULL,
  `tel` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ws` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` enum('Activo','Inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`id`, `tel`, `ws`, `nombre`, `email`, `comentario`, `estatus`) VALUES
(16, '+50 04246504181', '+50 04246504181', 'Juan Editado', 'juaneditado@gmail.com', 'coment Juan editado', 'Activo'),
(26, '+50 04246504181', '+50 04246504181', 'Juan Barrios', 'juaneditado@gmail.com', 'Nuevo contacto de ventas', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `correo_name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_type` enum('master','user') COLLATE utf8_spanish_ci NOT NULL,
  `estatus` enum('Activo','Inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `correo_name`, `user_password`, `user_name`, `user_type`, `estatus`) VALUES
(1, 'daniel@gmail.com', '$2y$10$72Z8JxI90EQ7L0Hu1BUU1.u2RlSgDQfYhmn9X0/iKXCS9JXL6wpEe', 'Daniel Angel', 'user', 'Activo'),
(3, 'luis@gmail.com', '$2y$10$zQROamMvReZ0YrY4xR7AIu39weL8JDK0Mf3nQx9jo52C.2YJI82gG', 'Luis Ponce', 'master', 'Activo'),
(4, 'juan@gmail.com', '$2y$10$72Z8JxI90EQ7L0Hu1BUU1.u2RlSgDQfYhmn9X0/iKXCS9JXL6wpEe', 'Juan Martinez', 'user', 'Activo'),
(11, 'admin@gmail.com', '$2y$10$72Z8JxI90EQ7L0Hu1BUU1.u2RlSgDQfYhmn9X0/iKXCS9JXL6wpEe', 'Administrador', 'master', 'Activo'),
(14, 'user@gmail.com', '$2y$10$.BG0RzO4.z5Yyr3/Eyj4xu8y/F6Ub4aFFbqpAUUyJXRqPND5bwR0a', 'User Normal 1', 'user', 'Activo'),
(15, 'prueba2@gmail.com', '$2y$10$72Z8JxI90EQ7L0Hu1BUU1.u2RlSgDQfYhmn9X0/iKXCS9JXL6wpEe', 'Prueba 2', 'master', 'Activo'),
(16, 'marco@hotmail.com', '$2y$10$72Z8JxI90EQ7L0Hu1BUU1.u2RlSgDQfYhmn9X0/iKXCS9JXL6wpEe', 'Marco', 'master', 'Activo'),
(20, 'daniel@gmail.com', '$2y$10$OyevQOh.6h30pke942eY8.YAaFqEsSh6rNTX5ULZpJT.EOQ0wKCtS', 'Daniel Elias', 'master', 'Inactivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
