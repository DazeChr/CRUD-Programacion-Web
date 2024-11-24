-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 02:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumnos`
--

-- --------------------------------------------------------

--
-- Table structure for table `talumnos`
--

CREATE TABLE `talumnos` (
  `clave` mediumint(9) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `calificacion` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `talumnos`
--

INSERT INTO `talumnos` (`clave`, `nombre`, `edad`, `calificacion`) VALUES
(2, 'Alejandro Cabanillas', 19, 0),
(4, 'Carlos Ojeda', 20, 0),
(5, 'Melissa Rodriguez ', 20, 0),
(6, 'Marion Medina ', 18, 0),
(35, 'Francisco Limon', 20, 90),
(36, 'Andre Siqueiros', 20, 70);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `talumnos`
--
ALTER TABLE `talumnos`
  ADD PRIMARY KEY (`clave`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `talumnos`
--
ALTER TABLE `talumnos`
  MODIFY `clave` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
