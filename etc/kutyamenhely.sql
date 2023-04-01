-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 08:29 PM
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
  `email` varchar(255) NOT NULL COMMENT 'User e-mail címe',
  `fhnev` varchar(255) NOT NULL COMMENT 'Felhasználónév',
  `jelszo` varchar(255) NOT NULL COMMENT 'Hashelt jelszó',
  `veznev` varchar(255) NOT NULL COMMENT 'Vezetéknév',
  `kernev` varchar(255) NOT NULL COMMENT 'Keresztnév',
  `szuldatum` date NOT NULL COMMENT 'Születési dátum',
  `nem` varchar(255) NOT NULL COMMENT 'Nem'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Regisztrált felhasználók';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fhnev`, `jelszo`, `veznev`, `kernev`, `szuldatum`, `nem`) VALUES
(1, 'teszt@teszt.hu', 'tesztUsername', 'asd', 'A', 'Sd', '2000-01-01', 'ferfi');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary kulcs', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
