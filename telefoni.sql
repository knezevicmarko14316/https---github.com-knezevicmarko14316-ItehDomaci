-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 01:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telefoni`
--

-- --------------------------------------------------------

--
-- Table structure for table `marka`
--

CREATE TABLE `marka` (
  `id` int(11) NOT NULL,
  `naziv` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marka`
--

INSERT INTO `marka` (`id`, `naziv`) VALUES
(1, 'samsung'),
(2, 'huawei');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbine`
--

CREATE TABLE `narudzbine` (
  `id` int(11) NOT NULL,
  `ime` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `narudzbine`
--

INSERT INTO `narudzbine` (`id`, `ime`, `prezime`, `adresa`, `telefon`) VALUES
(1, 'Nikola', 'Nikic', 'Beograd', '065/2382139'),
(2, 'Milos', 'Arsenijevic', 'Novi Sad', '064/8912301'),
(3, 'Marko', 'Matic', 'Nis', '062/8910223');

-- --------------------------------------------------------

--
-- Table structure for table `telefon`
--

CREATE TABLE `telefon` (
  `id` int(11) NOT NULL,
  `model` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procesor` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baterija` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kamera` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` decimal(10,0) NOT NULL,
  `slika` varchar(9999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marka_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telefon`
--

INSERT INTO `telefon` (`id`, `model`, `ram`, `procesor`, `baterija`, `kamera`, `cena`, `slika`, `marka_id`) VALUES
(1, 's2122', '8GB RAMa', 'Octa-core (1x2.9 GHz Cortex-X1 & 3x2.80 GHz Cortex-A78 & 4x2.2 GHz Cortex-A55) - International', 'Li-Ion 4000 mAh, non-removable', '12 MP, f/1.8, 26mm (wide), 1/1.76\", 1.8ï¿½m, Dual Pixel PDAF, OIS', '8001231', 'https://fdn2.gsmarena.com/vv/bigpic/samsung-galaxy-s21-5g-r.jpg', 1),
(2, 'p40', '6GB RAM', 'Octa-core (2x2.86 GHz Cortex-A76 & 2x2.36 GHz Cortex-A76 & 4x1.95 GHz Cortex-A55)', 'Li-Po 3800 mAh', '50 MP, f/1.9, 23mm (wide), 1/1.28\", 1.22µm, omnidirectional PDAF, OIS', '480', 'https://fdn2.gsmarena.com/vv/bigpic/huawei-p40.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `telefon_narudzbina`
--

CREATE TABLE `telefon_narudzbina` (
  `telefon_id` int(11) NOT NULL,
  `narudzbina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telefon_narudzbina`
--

INSERT INTO `telefon_narudzbina` (`telefon_id`, `narudzbina_id`) VALUES
(1, 2),
(2, 2),
(1, 3),
(2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzbine`
--
ALTER TABLE `narudzbine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telefon`
--
ALTER TABLE `telefon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_marka` (`marka_id`);

--
-- Indexes for table `telefon_narudzbina`
--
ALTER TABLE `telefon_narudzbina`
  ADD KEY `fk_telefon` (`telefon_id`),
  ADD KEY `fk_narudzbina` (`narudzbina_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marka`
--
ALTER TABLE `marka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `narudzbine`
--
ALTER TABLE `narudzbine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `telefon`
--
ALTER TABLE `telefon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `telefon`
--
ALTER TABLE `telefon`
  ADD CONSTRAINT `fk_marka` FOREIGN KEY (`marka_id`) REFERENCES `marka` (`id`);

--
-- Constraints for table `telefon_narudzbina`
--
ALTER TABLE `telefon_narudzbina`
  ADD CONSTRAINT `fk_narudzbina` FOREIGN KEY (`narudzbina_id`) REFERENCES `narudzbine` (`id`),
  ADD CONSTRAINT `fk_telefon` FOREIGN KEY (`telefon_id`) REFERENCES `telefon` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
