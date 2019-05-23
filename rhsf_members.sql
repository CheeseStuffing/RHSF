-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 22. 05 2019 kl. 20:04:56
-- Serverversion: 10.1.38-MariaDB
-- PHP-version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rhsf_members`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `highscore`
--

CREATE TABLE `highscore` (
  `ID` int(11) NOT NULL,
  `emails` varchar(255) COLLATE latin1_danish_ci NOT NULL,
  `highscore` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `highscore`
--

INSERT INTO `highscore` (`ID`, `emails`, `highscore`) VALUES
(1, 'charlottemahlitz@hotmail.com\r\n', 100);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `medlemmer`
--

CREATE TABLE `medlemmer` (
  `ID` int(11) NOT NULL,
  `brugernavn` varchar(40) COLLATE latin1_danish_ci NOT NULL,
  `kodeord` varchar(255) COLLATE latin1_danish_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_danish_ci NOT NULL,
  `tel` varchar(8) COLLATE latin1_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `medlemmer`
--

INSERT INTO `medlemmer` (`ID`, `brugernavn`, `kodeord`, `email`, `tel`) VALUES
(1, 'rhsf_admin', 'mormor12', 'charlottemahlitz@hotmail.com', '53349360');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `highscore`
--
ALTER TABLE `highscore`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks for tabel `medlemmer`
--
ALTER TABLE `medlemmer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `highscore`
--
ALTER TABLE `highscore`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `medlemmer`
--
ALTER TABLE `medlemmer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `highscore`
--
ALTER TABLE `highscore`
  ADD CONSTRAINT `highscore_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `medlemmer` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
