-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 10:24 AM
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
-- Table structure for table `sx_cambioturno`
--

CREATE TABLE `sx_cambioturno` (
  `id` int(11) NOT NULL,
  `id_richiedente` int(11) NOT NULL,
  `id_cambio` int(11) NOT NULL,
  `id_sbob_originale` int(11) NOT NULL,
  `id_sbob_arrivo` int(11) NOT NULL,
  `cs_code` int(11) NOT NULL,
  `eseguito` binary(1) NOT NULL DEFAULT '\0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sx_esamidisponibili`
--

CREATE TABLE `sx_esamidisponibili` (
  `id` int(11) NOT NULL,
  `insegnamento` varchar(255) NOT NULL,
  `docente` varchar(255) NOT NULL,
  `data_esonero` date NOT NULL,
  `data_scadiscrizioni` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sx_insegnamenti`
--

CREATE TABLE `sx_insegnamenti` (
  `id` int(11) NOT NULL,
  `materia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sx_partecipazione_sbobine`
--

CREATE TABLE `sx_partecipazione_sbobine` (
  `id` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_insegnamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sx_prenesami`
--

CREATE TABLE `sx_prenesami` (
  `id` int(11) NOT NULL,
  `id_esame` int(11) NOT NULL,
  `matricola` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dataora_prenotazione` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sx_report`
--

CREATE TABLE `sx_report` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sbobina` int(11) NOT NULL,
  `id_motivo` int(11) NOT NULL,
  `commento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sx_revisori_sbobine`
--

CREATE TABLE `sx_revisori_sbobine` (
  `id` int(255) NOT NULL,
  `id_sbobina` int(255) NOT NULL,
  `id_revisore` int(255) NOT NULL,
  `esito` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sx_sbobinatori_sbobine`
--

CREATE TABLE `sx_sbobinatori_sbobine` (
  `id` int(255) NOT NULL,
  `id_sbobina` int(255) NOT NULL,
  `id_sbobinatore` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sx_sbobine_calendarizzate`
--

CREATE TABLE `sx_sbobine_calendarizzate` (
  `id` int(255) NOT NULL,
  `progressivo_insegnamento` int(255) NOT NULL,
  `insegnamento` varchar(255) NOT NULL,
  `argomento` varchar(255) NOT NULL,
  `posizione_server` varchar(255) NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `data_lezione` varchar(255) NOT NULL,
  `data_caricamento` datetime NOT NULL,
  `num_sbobinatori` int(11) NOT NULL,
  `num_revisori` int(11) NOT NULL,
  `caricata` tinyint(1) NOT NULL,
  `revisione` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sx_sbobine_rigettate`
--

CREATE TABLE `sx_sbobine_rigettate` (
  `id` int(11) NOT NULL,
  `id_sbobina` int(11) NOT NULL,
  `id_sbobinatore` int(11) NOT NULL,
  `id_revisore` int(11) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `visto` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sx_settings`
--

CREATE TABLE `sx_settings` (
  `id` int(11) NOT NULL,
  `nome_impostazione` varchar(255) NOT NULL,
  `attuale` varchar(255) NOT NULL,
  `predefinita` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sx_settings`
--

INSERT INTO `sx_settings` (`id`, `nome_impostazione`, `attuale`, `predefinita`) VALUES
(26, 'TOKEN', '', ''),
(27, 'ID_GRUPPO', '', ''),
(31, 'smtp_attivo', 'off', 'off'),
(50, 'ammonizioni', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `sx_users`
--

CREATE TABLE `sx_users` (
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
-- Dumping data for table `sx_users`
--

INSERT INTO `sx_users` (`id`, `matricola`, `nome`, `cognome`, `email`, `password`, `malus`, `locked`, `admin`) VALUES
(1, '123', 'ELIMINAMI', 'ELIMINAMI', 'eliminami@eliminami.eliminami', '$2y$15$V4Imm9XKnTzT4/jyBpwrEe/MteyexSNaFQjy/7Hc897squt6pKspO', '0', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sx_cambioturno`
--
ALTER TABLE `sx_cambioturno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sx_esamidisponibili`
--
ALTER TABLE `sx_esamidisponibili`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sx_insegnamenti`
--
ALTER TABLE `sx_insegnamenti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sx_partecipazione_sbobine`
--
ALTER TABLE `sx_partecipazione_sbobine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sx_prenesami`
--
ALTER TABLE `sx_prenesami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sx_report`
--
ALTER TABLE `sx_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sx_revisori_sbobine`
--
ALTER TABLE `sx_revisori_sbobine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sx_sbobinatori_sbobine`
--
ALTER TABLE `sx_sbobinatori_sbobine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sx_sbobine_calendarizzate`
--
ALTER TABLE `sx_sbobine_calendarizzate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sx_sbobine_rigettate`
--
ALTER TABLE `sx_sbobine_rigettate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sx_settings`
--
ALTER TABLE `sx_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sx_users`
--
ALTER TABLE `sx_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sx_cambioturno`
--
ALTER TABLE `sx_cambioturno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sx_esamidisponibili`
--
ALTER TABLE `sx_esamidisponibili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sx_insegnamenti`
--
ALTER TABLE `sx_insegnamenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sx_partecipazione_sbobine`
--
ALTER TABLE `sx_partecipazione_sbobine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sx_prenesami`
--
ALTER TABLE `sx_prenesami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sx_report`
--
ALTER TABLE `sx_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sx_revisori_sbobine`
--
ALTER TABLE `sx_revisori_sbobine`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sx_sbobinatori_sbobine`
--
ALTER TABLE `sx_sbobinatori_sbobine`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sx_sbobine_calendarizzate`
--
ALTER TABLE `sx_sbobine_calendarizzate`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sx_sbobine_rigettate`
--
ALTER TABLE `sx_sbobine_rigettate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sx_settings`
--
ALTER TABLE `sx_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sx_users`
--
ALTER TABLE `sx_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
