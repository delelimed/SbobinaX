-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 03:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbobinax`
--

-- --------------------------------------------------------

--
-- Table structure for table `insegnamenti`
--

CREATE TABLE `insegnamenti` (
  `id` int(11) NOT NULL,
  `materia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partecipazione_sbobine`
--

CREATE TABLE `partecipazione_sbobine` (
  `id` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_insegnamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revisori_sbobine`
--

CREATE TABLE `revisori_sbobine` (
  `id` int(255) NOT NULL,
  `id_sbobina` int(255) NOT NULL,
  `id_revisore` int(255) NOT NULL,
  `esito` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sbobinatori_sbobine`
--

CREATE TABLE `sbobinatori_sbobine` (
  `id` int(255) NOT NULL,
  `id_sbobina` int(255) NOT NULL,
  `id_sbobinatore` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sbobine_calendarizzate`
--

CREATE TABLE `sbobine_calendarizzate` (
  `id` int(255) NOT NULL,
  `progressivo_insegnamento` int(255) NOT NULL,
  `insegnamento` varchar(255) NOT NULL,
  `argomento` varchar(255) NOT NULL,
  `posizione_server` varchar(255) NOT NULL,
  `data_lezione` varchar(255) NOT NULL,
  `data_caricamento` varchar(255) NOT NULL,
  `caricata` tinyint(1) NOT NULL,
  `revisione` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `matricola` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(9999) NOT NULL,
  `malus` varchar(255) NOT NULL DEFAULT '0',
  `locked` tinyint(1) NOT NULL DEFAULT 0,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insegnamenti`
--
ALTER TABLE `insegnamenti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partecipazione_sbobine`
--
ALTER TABLE `partecipazione_sbobine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revisori_sbobine`
--
ALTER TABLE `revisori_sbobine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sbobinatori_sbobine`
--
ALTER TABLE `sbobinatori_sbobine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sbobine_calendarizzate`
--
ALTER TABLE `sbobine_calendarizzate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insegnamenti`
--
ALTER TABLE `insegnamenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partecipazione_sbobine`
--
ALTER TABLE `partecipazione_sbobine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revisori_sbobine`
--
ALTER TABLE `revisori_sbobine`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sbobinatori_sbobine`
--
ALTER TABLE `sbobinatori_sbobine`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sbobine_calendarizzate`
--
ALTER TABLE `sbobine_calendarizzate`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
