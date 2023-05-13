-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 13 maj 2023 kl 10:33
-- Serverversion: 10.4.27-MariaDB
-- PHP-version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `myprojeckt`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `user_password` varchar(1000) NOT NULL,
  `acces_level` varchar(1000) NOT NULL,
  `account_activit_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `account`
--

INSERT INTO `account` (`id`, `username`, `user_password`, `acces_level`, `account_activit_status`) VALUES
(2, 'adminviggo', '$2y$10$5myDTmypBnmhdIZoa9ExVOy.s/S/qFXz1x/bHD60mXwcAf0m1KnjC', 'administrat', 'true'),
(5, 'adminlukas', '$2y$10$xzGW7puLP109uOxmuqQ.qeiGofnXrGDu9cCZYxeYUR5ksiZFiNIF6', 'moderator', 'true'),
(6, 'low', '$2y$10$M.CjMrTB9omXyTg.l8uE8eNe022y.1maWESR55mGVcCbHAEQPF5E6', 'standard', 'false'),
(10, 'test', '$2y$10$wwfOIRHTiLZJraWisAXSquu8tG.r7YK81/2e7WYu.pBrpZd5HXBgS', 'moderator', 'false'),
(11, 'Linus', '$2y$10$9n38LAJof7hGsDVNY7w/.OVD9X2XD2PH1ATk1cL3Lg8/Fy1Ptdc7q', 'standard', 'true'),
(12, 'neo', '$2y$10$NBMUE0KiwtAC17PfxOzW3.heflw2LXNO9HJVvuXjyai7K3dhlkPwO', 'administrat', 'true');

-- --------------------------------------------------------

--
-- Tabellstruktur `heroimg`
--

CREATE TABLE `heroimg` (
  `id` int(11) NOT NULL,
  `hero_img_url` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `upload`
--

INSERT INTO `upload` (`id`, `user_id`, `file_name`, `description`, `title`, `price`, `status`) VALUES
(15, 5, 'ryan-plomp-jvoZ-Aux9aw-unsplash.jpg', 'air force one rainbow', 'Air force one', 129, 'Active'),
(18, 0, 'blank_tradingcard.jpg', 'ye', 'mycket bra bild', 1000000, 'Active');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `heroimg`
--
ALTER TABLE `heroimg`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT för tabell `heroimg`
--
ALTER TABLE `heroimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
