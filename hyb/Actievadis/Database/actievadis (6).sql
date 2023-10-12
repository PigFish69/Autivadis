-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 okt 2023 om 09:46
-- Serverversie: 10.4.20-MariaDB
-- PHP-versie: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `actievadis`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `location` varchar(255) NOT NULL,
  `food` tinyint(1) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(30) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `activity`
--

INSERT INTO `activity` (`id`, `name`, `location`, `food`, `price`, `description`, `image`, `startTime`, `endTime`) VALUES
(1, 'Bowlen', 'Eibergen', 0, 12.5, 'Gezellig bowlen (kind en voedsel niet inbegrepen)', 'bowlingKid.jpeg', '2023-09-11 15:43:22', '2023-09-13 16:43:22'),
(2, 'Golfen', 'Neede', 0, 26.99, 'Dagje golf met zijn allen', 'golfFace.jpeg', '2023-09-16 15:43:22', '2023-09-20 15:43:22'),
(4, 'Karper vissen', 'Vochtig meer', 1, 24.95, 'Ochtendje vissen op karper. \r\nAperatuur word gehuurd dus hoeft zelf niks mee te nemen. Ook worden we voorzien van genoeg aas zoals boilies. \r\n\r\nVoedsel en drinken inbegrepen.', 'carpSetup.png', '2023-09-29 05:30:00', '2023-09-29 14:00:00'),
(5, 'skeeleren', 'doetinchem', 0, 15, 'We gaan met een coach skeeleren ', 'skeeleren.jpg', '2023-10-06 12:48:00', '2023-10-06 14:48:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `activityId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `signup`
--

INSERT INTO `signup` (`id`, `activityId`, `userId`) VALUES
(21, 5, 7),
(22, 1, 7),
(23, 4, 7),
(26, 2, 10),
(27, 4, 14),
(30, 1, 2),
(31, 2, 2),
(32, 5, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(25) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `admin`, `email`) VALUES
(1, 'admin', 'test123', 1, 'admin@admin.com'),
(2, 'admin', '123', 1, 'admin@admin.nl'),
(3, 'klant', '123', 0, 'klant@klant.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
