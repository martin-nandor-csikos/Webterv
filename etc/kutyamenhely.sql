-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 08:40 PM
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
(3, 'Megnyílt a megújult fórumunk!', 'Ma este befejeződtek a munkálatok, megnyílt a megújult fórumunk!\r\n\r\nRengeteg új funkcióval ruháztuk fel a fórumot, mint például az üzenetküldés, ahol egymásnak tudtok üzeneteket küldeni.\r\n\r\nReméljük tetszik nektek az új oldal!', '2023-04-16 20:36:04'),
(4, 'Új pozíció betöltése: recepciós', 'Szeretnél recepciósként dolgozni a menhelyünkön? Töltsd ki a jelentkezési lapot az oldalunkon az \"Önkéntesség\" fülön.', '2023-04-16 20:38:29');

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
(7, 'admin', 'KerekesKrisztinaMLM', 'Nekem nagyon tetszik ez az oldal, ha rajtam múlna, én fizetnék is érte. Megvehetem az oldalukat?', '2023-04-16 20:28:14'),
(8, 'jeno1', 'DavidxHUN', 'Szép napot Jenő bácsi! Holnap meglocsolom a virágukat, ahogy kérték! Mennyi víz kell nekik?', '2023-04-16 20:29:50'),
(9, 'DavidxHUN', 'jeno1', 'szia dávid, ne locsold túl őket, mert abból probléma lesz a virágoknak. 1-2 bögrényi víz teljesen elég. köszönjük szépen hogy gondoskodsz a virágokról, míg elutaztunk szegedre klárival', '2023-04-16 20:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `id` int(11) NOT NULL COMMENT 'Primary kulcs',
  `userId` int(11) NOT NULL COMMENT 'user tábla primary kulcs',
  `bio` text DEFAULT NULL COMMENT 'Bemutatkozás',
  `kernev_publikus` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Keresztnév publikussága (true/false)',
  `veznev_publikus` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Vezetéknév publikussága (true/false)',
  `szuldatum_publikus` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Születési dátum publikussága (true/false)',
  `email_publikus` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'E-mail publikussága (true/false)',
  `nem_publikus` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Nem publikussága (true/false)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Felhasználók saját adatlapja';

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`id`, `userId`, `bio`, `kernev_publikus`, `veznev_publikus`, `szuldatum_publikus`, `email_publikus`, `nem_publikus`) VALUES
(4, 12, 'Szeretek kertészkedni!', 1, 1, 1, 1, 1),
(5, 13, 'CSGO rank: kereszt kala\r\n1v1 me bro', 1, 1, 0, 0, 1),
(6, 14, 'Új állást keresnél, ahol te magad vagy a főnök? Ne habozz, én segítek neked!\r\nCsupán annyi a teendőd, hogy beszervezel magad alá még 20 embert, és pár hónap elteltével milliomos leszel!', 1, 1, 0, 0, 0),
(7, 15, NULL, 1, 1, 0, 0, 0),
(8, 16, NULL, 0, 0, 0, 0, 0);

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
(12, 'user', 'kovacs.jeno@asd.asd', 'jeno1', '$2y$10$WnaHPDG3z2phsACG3eUKleDC0ZMhjAyb1ZMuaa2.m9SkFv1G4a5yy', 'Kovács', 'Jenő', '1970-10-01', 'ferfi'),
(13, 'user', 'davidxhun@asd.asd', 'DavidxHUN', '$2y$10$I3EuIgeIJ5RyGCEfffwAEOXgcVOQ76Qx0pMmd54AhwTBFGFNMcPOu', 'Kanalas', 'Dávid', '2010-05-10', 'ferfi'),
(14, 'user', 'kriszta@asd.asd', 'KerekesKrisztinaMLM', '$2y$10$/3bhd.t75GkqMNmlJhWt7uSow0qjL93BenEv3oNOaGT9GwOI3g3Vi', 'Kerekes', 'Kriszta', '1990-10-01', 'no'),
(15, 'user', 'eszter@asd.asd', 'eszti1997', '$2y$10$yjFukgdjUN3.bOBp3C4IoOShbXX02lvPCx0SvbZVtB5sak9oQfUT6', 'Eszter', 'Eszter', '1997-05-05', 'no'),
(16, 'user', 'gabi@asd.asd', 'gabi123', '$2y$10$chxVESIBxlXXjcUYx9/ceebc343GqnIoLCSNEqoYjO4RnAIYjOhxq', 'Álmos', 'Gabi', '1980-04-04', 'egyeb');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary kulcs', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `private_messages`
--
ALTER TABLE `private_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary kulcs', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary kulcs', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary kulcs', AUTO_INCREMENT=17;

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
