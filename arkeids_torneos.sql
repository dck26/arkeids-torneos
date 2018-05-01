-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2018 at 05:48 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arkeids_torneos`
--

-- --------------------------------------------------------

--
-- Table structure for table `01_PERSONA`
--

CREATE TABLE `01_PERSONA` (
  `nIdPersona01` int(11) UNSIGNED NOT NULL,
  `sNombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `sEmail` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `sApodo` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `sFoto` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sPassword` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `02_JUEGO`
--

CREATE TABLE `02_JUEGO` (
  `nIdJuego02` int(11) UNSIGNED NOT NULL,
  `sNombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `nIdConsola03` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `03_CONSOLA`
--

CREATE TABLE `03_CONSOLA` (
  `nIdConsola03` int(11) UNSIGNED NOT NULL,
  `sNombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `04_LUGAR`
--

CREATE TABLE `04_LUGAR` (
  `nIdLugar04` int(11) UNSIGNED NOT NULL,
  `sNombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sCalle` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sCP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `05_TORNEO`
--

CREATE TABLE `05_TORNEO` (
  `nIdTorneo05` int(11) UNSIGNED NOT NULL,
  `nIdLugar04` int(200) DEFAULT NULL,
  `nIdJuego02` int(11) DEFAULT NULL,
  `dHoraInicio` time DEFAULT NULL,
  `dHoraFin` time DEFAULT NULL,
  `dFecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `06_PARTIDA`
--

CREATE TABLE `06_PARTIDA` (
  `nIdPartida06` int(11) UNSIGNED NOT NULL,
  `nIdTorneo05` int(11) DEFAULT NULL,
  `nIdPersonaUno01` int(11) DEFAULT NULL,
  `nIdPersonaDos01` int(11) DEFAULT NULL,
  `nIdGanador01` int(11) DEFAULT NULL,
  `bCompletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `07_RANKING`
--

CREATE TABLE `07_RANKING` (
  `nIdPersona01` int(11) UNSIGNED NOT NULL,
  `nIdJuego02` int(11) NOT NULL,
  `nVictorias` int(11) DEFAULT NULL,
  `nDerrotas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `01_PERSONA`
--
ALTER TABLE `01_PERSONA`
  ADD PRIMARY KEY (`nIdPersona01`);

--
-- Indexes for table `02_JUEGO`
--
ALTER TABLE `02_JUEGO`
  ADD PRIMARY KEY (`nIdJuego02`);

--
-- Indexes for table `03_CONSOLA`
--
ALTER TABLE `03_CONSOLA`
  ADD PRIMARY KEY (`nIdConsola03`);

--
-- Indexes for table `04_LUGAR`
--
ALTER TABLE `04_LUGAR`
  ADD PRIMARY KEY (`nIdLugar04`);

--
-- Indexes for table `05_TORNEO`
--
ALTER TABLE `05_TORNEO`
  ADD PRIMARY KEY (`nIdTorneo05`);

--
-- Indexes for table `06_PARTIDA`
--
ALTER TABLE `06_PARTIDA`
  ADD PRIMARY KEY (`nIdPartida06`);

--
-- Indexes for table `07_RANKING`
--
ALTER TABLE `07_RANKING`
  ADD PRIMARY KEY (`nIdPersona01`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `01_PERSONA`
--
ALTER TABLE `01_PERSONA`
  MODIFY `nIdPersona01` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `02_JUEGO`
--
ALTER TABLE `02_JUEGO`
  MODIFY `nIdJuego02` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `03_CONSOLA`
--
ALTER TABLE `03_CONSOLA`
  MODIFY `nIdConsola03` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `04_LUGAR`
--
ALTER TABLE `04_LUGAR`
  MODIFY `nIdLugar04` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `05_TORNEO`
--
ALTER TABLE `05_TORNEO`
  MODIFY `nIdTorneo05` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `06_PARTIDA`
--
ALTER TABLE `06_PARTIDA`
  MODIFY `nIdPartida06` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
