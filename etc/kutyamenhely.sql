-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 11:52 AM
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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL COMMENT 'Primary kulcs',
  `cim` varchar(255) NOT NULL COMMENT 'Cikk címe',
  `szoveg` text NOT NULL COMMENT 'Cikk szövege',
  `datum` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Dátum, amikor a cikk íródott'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Hírek';

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `cim`, `szoveg`, `datum`) VALUES
(1, 'asdawdawd', 'jahwdlkjawhdlkjAhwlkdjhaWdkhaw.a\r\nw\r\nda\r\nwd\r\naw\r\nd\r\nawd\r\neg\r\nrsgsr\r\ngk\r\nrgsr\r\ngksr\r\ngsr\r\ngks\r\nrgk\r\nsrkg\r\nsrkg\r\nkdr\r\ngkd\r\nkd\r\nrkg\r\ndrkg\r\nrkg', '2023-04-16 11:23:05'),
(2, 'awjhdl', 'lkjhalkwjdhawd', '2023-04-16 11:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `private_messages`
--

CREATE TABLE `private_messages` (
  `id` int(11) NOT NULL COMMENT 'Primary kulcs',
  `sentTo` varchar(255) NOT NULL COMMENT 'Kinek küldték az üzenetet',
  `sentFrom` varchar(255) NOT NULL COMMENT 'Ki küldte az üzenetet',
  `message` text NOT NULL COMMENT 'Üzenet',
  `datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Idő, amikor el lett küldve az üzenet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Felhasználók privát üzenetei';

--
-- Dumping data for table `private_messages`
--

INSERT INTO `private_messages` (`id`, `sentTo`, `sentFrom`, `message`, `datetime`) VALUES
(1, 'jeno1', 'DavidxHUN', 'cs', '2023-04-03 15:41:08'),
(2, 'jeno1', 'DavidxHUN', 'cs', '2023-04-03 15:41:26'),
(3, 'jeno1', 'DavidxHUN', 'cs', '2023-04-03 15:41:27'),
(4, 'DavidxHUN', 'jeno1', 'helo', '2023-04-03 15:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `id` int(11) NOT NULL COMMENT 'Primary kulcs',
  `userId` int(11) NOT NULL COMMENT 'user tábla primary kulcs',
  `profilkep` varchar(255) DEFAULT NULL COMMENT 'Profilkép útvonala a szerveren',
  `bio` text DEFAULT NULL COMMENT 'Bemutatkozás',
  `kernev_publikus` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Keresztnév publikussága (true/false)',
  `veznev_publikus` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Vezetéknév publikussága (true/false)',
  `szuldatum_publikus` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Születési dátum publikussága (true/false)',
  `email_publikus` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'E-mail publikussága (true/false)',
  `nem_publikus` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Nem publikussága (true/false)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Felhasználók saját adatlapja';

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
(3, 'admin', NULL, 'admin', '$2y$10$uZTeV.HBOkj7xvKD2.tzZOnVqNQTyO/tSMZcydTFkMuqqiEJKPl1.', NULL, NULL, NULL, NULL),
(4, 'user', 'jeno@asd.hu', 'jeno1', '$2y$10$nBkBQ8BY59DT0oo/ltALBeBPpQI5Ea6jSExjispKVr6ORArMjPfaG', 'Kovács', 'Jenő', '1980-01-23', 'ferfi'),
(5, 'user', 'david@asd.hu', 'DavidxHUN', '$2y$10$NXYY3mOVCQZul8jEtPbZeujku9jGdnuyNwqYjnmntzFfx59WREDTa', 'Boros', 'Dávid', '2010-08-03', 'ferfi'),
(6, 'user', 'kerkriszta@mlm.hu', 'KerekesKrisztaMLM', '$2y$10$pnIn4ZFjsQMdVhNDG1BU7OkFkgQJTakbiXIUMz1dtJkKgw0WtRS1i', 'Kerekes', 'Kriszta', '2000-07-29', 'no'),
(7, 'user', 'forgoeszti@asd.hu', 'eszti1997', '$2y$10$S8D82sQoLswUN6.edqnqmu4OBLouQHSUc9Va7PEvsLFdtTlQqNx2e', 'Forgó', 'Eszter', '1997-12-30', 'no'),
(8, 'user', 'vargagabi@asd.hu', 'gabi123', '$2y$10$J43eCWI4r5JyCw.jL5qY.O1QtEPBj8LR1a84r0mpuZWzjIPNDaYwm', 'Varga', 'Gabi', '1999-06-21', 'egyeb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `private_messages`
--
ALTER TABLE `private_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

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
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary kulcs', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `private_messages`
--
ALTER TABLE `private_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary kulcs', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary kulcs';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary kulcs', AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `userprofile_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
