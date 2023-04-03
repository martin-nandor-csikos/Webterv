-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 10:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kutyamenhely`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Primary kulcs',
  `jogosultsag` varchar(30) NOT NULL DEFAULT 'user' COMMENT 'Felhasználó jogosultsága (admin/user)',
  `email` varchar(255) DEFAULT NULL COMMENT 'User e-mail címe',
  `fhnev` varchar(255) NOT NULL COMMENT 'Felhasználónév',
  `jelszo` varchar(255) NOT NULL COMMENT 'Hashelt jelszó',
  `veznev` varchar(255) DEFAULT NULL COMMENT 'Vezetéknév',
  `kernev` varchar(255) DEFAULT NULL COMMENT 'Keresztnév',
  `szuldatum` date DEFAULT NULL COMMENT 'Születési dátum',
  `nem` varchar(255) DEFAULT NULL COMMENT 'Nem'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Regisztrált felhasználók';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `jogosultsag`, `email`, `fhnev`, `jelszo`, `veznev`, `kernev`, `szuldatum`, `nem`) VALUES
(3, 'admin', NULL, 'admin', '$2y$10$BwGVNMgJAcpBQis6JuCjjOlEqR5zkvQaygPu3nf.fAXCNyvsrliiy', NULL, NULL, NULL, NULL),
(4, 'user', 'jeno@asd.hu', 'jeno1', '$2y$10$nBkBQ8BY59DT0oo/ltALBeBPpQI5Ea6jSExjispKVr6ORArMjPfaG', 'Kovács', 'Jenő', '1980-01-23', 'ferfi'),
(5, 'user', 'david@asd.hu', 'DavidxHUN', '$2y$10$NXYY3mOVCQZul8jEtPbZeujku9jGdnuyNwqYjnmntzFfx59WREDTa', 'Boros', 'Dávid', '2010-08-03', 'ferfi'),
(6, 'user', 'kerkriszta@mlm.hu', 'KerekesKrisztaMLM', '$2y$10$pnIn4ZFjsQMdVhNDG1BU7OkFkgQJTakbiXIUMz1dtJkKgw0WtRS1i', 'Kerekes', 'Kriszta', '2000-07-29', 'no'),
(7, 'user', 'forgoeszti@asd.hu', 'eszti1997', '$2y$10$S8D82sQoLswUN6.edqnqmu4OBLouQHSUc9Va7PEvsLFdtTlQqNx2e', 'Forgó', 'Eszter', '1997-12-30', 'no'),
(8, 'user', 'vargagabi@asd.hu', 'gabi123', '$2y$10$J43eCWI4r5JyCw.jL5qY.O1QtEPBj8LR1a84r0mpuZWzjIPNDaYwm', 'Varga', 'Gabi', '1999-06-21', 'egyeb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fhnev` (`fhnev`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary kulcs', AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
