-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2018 a las 20:24:22
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arkeids-torneos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `01_persona`
--

CREATE TABLE `01_persona` (
  `nIdPersona01` int(11) UNSIGNED NOT NULL,
  `sNombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `sEmail` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `sApodo` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `sFoto` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sPassword` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `01_persona`
--

INSERT INTO `01_persona` (`nIdPersona01`, `sNombre`, `sEmail`, `sApodo`, `sFoto`, `sPassword`) VALUES
(6, 'Daniel', 'daniel.cuadra@gmail.com', 'dck', '', '$2a$07$usesomesillystringforeN7/2NBfGxbAuv02IPrTFBImFJd5PJ1m');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `02_juego`
--

CREATE TABLE `02_juego` (
  `nIdJuego02` int(11) UNSIGNED NOT NULL,
  `sNombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `nIdConsola03` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `03_consola`
--

CREATE TABLE `03_consola` (
  `nIdConsola03` int(11) UNSIGNED NOT NULL,
  `sNombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_lugar`
--

CREATE TABLE `04_lugar` (
  `nIdLugar04` int(11) UNSIGNED NOT NULL,
  `sNombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sCalle` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sCP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `05_torneo`
--

CREATE TABLE `05_torneo` (
  `nIdTorneo05` int(11) UNSIGNED NOT NULL,
  `nIdLugar04` int(200) DEFAULT NULL,
  `nIdJuego02` int(11) DEFAULT NULL,
  `dHoraInicio` time DEFAULT NULL,
  `dHoraFin` time DEFAULT NULL,
  `dFecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_partida`
--

CREATE TABLE `06_partida` (
  `nIdPartida06` int(11) UNSIGNED NOT NULL,
  `nIdTorneo05` int(11) DEFAULT NULL,
  `nIdPersonaUno01` int(11) DEFAULT NULL,
  `nIdPersonaDos01` int(11) DEFAULT NULL,
  `nIdGanador01` int(11) DEFAULT NULL,
  `bCompletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_ranking`
--

CREATE TABLE `07_ranking` (
  `nIdPersona01` int(11) UNSIGNED NOT NULL,
  `nIdJuego02` int(11) NOT NULL,
  `nVictorias` int(11) DEFAULT NULL,
  `nDerrotas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `01_persona`
--
ALTER TABLE `01_persona`
  ADD PRIMARY KEY (`nIdPersona01`),
  ADD UNIQUE KEY `UK_persona` (`sApodo`) USING BTREE,
  ADD UNIQUE KEY `UK_EMAIL` (`sEmail`);

--
-- Indices de la tabla `02_juego`
--
ALTER TABLE `02_juego`
  ADD PRIMARY KEY (`nIdJuego02`);

--
-- Indices de la tabla `03_consola`
--
ALTER TABLE `03_consola`
  ADD PRIMARY KEY (`nIdConsola03`);

--
-- Indices de la tabla `04_lugar`
--
ALTER TABLE `04_lugar`
  ADD PRIMARY KEY (`nIdLugar04`);

--
-- Indices de la tabla `05_torneo`
--
ALTER TABLE `05_torneo`
  ADD PRIMARY KEY (`nIdTorneo05`);

--
-- Indices de la tabla `06_partida`
--
ALTER TABLE `06_partida`
  ADD PRIMARY KEY (`nIdPartida06`);

--
-- Indices de la tabla `07_ranking`
--
ALTER TABLE `07_ranking`
  ADD PRIMARY KEY (`nIdPersona01`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `01_persona`
--
ALTER TABLE `01_persona`
  MODIFY `nIdPersona01` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `02_juego`
--
ALTER TABLE `02_juego`
  MODIFY `nIdJuego02` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `03_consola`
--
ALTER TABLE `03_consola`
  MODIFY `nIdConsola03` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `04_lugar`
--
ALTER TABLE `04_lugar`
  MODIFY `nIdLugar04` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `05_torneo`
--
ALTER TABLE `05_torneo`
  MODIFY `nIdTorneo05` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `06_partida`
--
ALTER TABLE `06_partida`
  MODIFY `nIdPartida06` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
