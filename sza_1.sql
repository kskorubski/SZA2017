-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 02 Wrz 2014, 13:53
-- Wersja serwera: 5.5.27
-- Wersja PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `sza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ankieta_analogowa`
--

CREATE TABLE IF NOT EXISTS `ankieta_analogowa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `x1_1a` int(10) NOT NULL,
  `x1_1b` int(10) NOT NULL,
  `x1_1c` int(10) NOT NULL,
  `x1_1d` int(10) NOT NULL,
  `x1_2a` int(10) NOT NULL,
  `x1_2b` int(10) NOT NULL,
  `x1_2c` int(10) NOT NULL,
  `x1_2d` int(10) NOT NULL,
  `x1_3a` int(10) NOT NULL,
  `x1_3b` int(10) NOT NULL,
  `x1_3c` int(10) NOT NULL,
  `x1_3d` int(10) NOT NULL,
  `x1_4a` int(10) NOT NULL,
  `x1_4b` int(10) NOT NULL,
  `x1_4c` int(10) NOT NULL,
  `x1_4d` int(10) NOT NULL,
  `x1_5a` int(10) NOT NULL,
  `x1_5b` int(10) NOT NULL,
  `x1_6a` int(10) NOT NULL,
  `x1_6b` int(10) NOT NULL,
  `x1_6c` int(10) NOT NULL,
  `x1_6d` int(10) NOT NULL,
  `x1_7a` int(10) NOT NULL,
  `x1_7b` int(10) NOT NULL,
  `x1_7c` int(10) NOT NULL,
  `x1_7d` int(10) NOT NULL,
  `x1_8a` int(10) NOT NULL,
  `x1_8b` int(10) NOT NULL,
  `x1_8c` int(10) NOT NULL,
  `x1_8d` int(10) NOT NULL,
  `x1_9a` int(10) NOT NULL,
  `x1_9b` int(10) NOT NULL,
  `x1_9c` int(10) NOT NULL,
  `x1_9d` int(10) NOT NULL,
  `x1_10a` int(10) NOT NULL,
  `x1_10b` int(10) NOT NULL,
  `x2_1a` int(10) NOT NULL,
  `x2_1b` int(10) NOT NULL,
  `x2_2a` int(10) NOT NULL,
  `x2_2b` int(10) NOT NULL,
  `x2_3a` int(10) NOT NULL,
  `x2_3b` int(10) NOT NULL,
  `x2_4a` int(10) NOT NULL,
  `x2_4b` int(10) NOT NULL,
  `x2_5a` int(10) NOT NULL,
  `x2_5b` int(10) NOT NULL,
  `x2_6a` int(10) NOT NULL,
  `x2_6b` int(10) NOT NULL,
  `x2_7a` int(10) NOT NULL,
  `x2_7b` int(10) NOT NULL,
  `x2_8a` int(10) NOT NULL,
  `x2_8b` int(10) NOT NULL,
  `x2_9a` int(10) NOT NULL,
  `x2_9b` int(10) NOT NULL,
  `x3_1a` int(10) NOT NULL,
  `x3_1b` int(10) NOT NULL,
  `x3_2a` int(10) NOT NULL,
  `x3_2b` int(10) NOT NULL,
  `x3_3a` int(10) NOT NULL,
  `x3_3b` int(10) NOT NULL,
  `x1_1_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_2_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_3_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_4_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_5_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_6_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_7_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_8_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_9_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_10_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x2_1_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x2_2_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x2_3_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x2_4_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x2_5_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x2_6_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x2_7_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x2_8_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x2_9_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x3_1_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x3_2_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x3_3_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `AudytyID` int(10) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `FKankieta_an613537` (`AudytyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=15 ;

--
-- Zrzut danych tabeli `ankieta_analogowa`
--

INSERT INTO `ankieta_analogowa` (`id`, `x1_1a`, `x1_1b`, `x1_1c`, `x1_1d`, `x1_2a`, `x1_2b`, `x1_2c`, `x1_2d`, `x1_3a`, `x1_3b`, `x1_3c`, `x1_3d`, `x1_4a`, `x1_4b`, `x1_4c`, `x1_4d`, `x1_5a`, `x1_5b`, `x1_6a`, `x1_6b`, `x1_6c`, `x1_6d`, `x1_7a`, `x1_7b`, `x1_7c`, `x1_7d`, `x1_8a`, `x1_8b`, `x1_8c`, `x1_8d`, `x1_9a`, `x1_9b`, `x1_9c`, `x1_9d`, `x1_10a`, `x1_10b`, `x2_1a`, `x2_1b`, `x2_2a`, `x2_2b`, `x2_3a`, `x2_3b`, `x2_4a`, `x2_4b`, `x2_5a`, `x2_5b`, `x2_6a`, `x2_6b`, `x2_7a`, `x2_7b`, `x2_8a`, `x2_8b`, `x2_9a`, `x2_9b`, `x3_1a`, `x3_1b`, `x3_2a`, `x3_2b`, `x3_3a`, `x3_3b`, `x1_1_podpowiedz`, `x1_2_podpowiedz`, `x1_3_podpowiedz`, `x1_4_podpowiedz`, `x1_5_podpowiedz`, `x1_6_podpowiedz`, `x1_7_podpowiedz`, `x1_8_podpowiedz`, `x1_9_podpowiedz`, `x1_10_podpowiedz`, `x2_1_podpowiedz`, `x2_2_podpowiedz`, `x2_3_podpowiedz`, `x2_4_podpowiedz`, `x2_5_podpowiedz`, `x2_6_podpowiedz`, `x2_7_podpowiedz`, `x2_8_podpowiedz`, `x2_9_podpowiedz`, `x3_1_podpowiedz`, `x3_2_podpowiedz`, `x3_3_podpowiedz`, `AudytyID`) VALUES
(2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3, 1, 1, 1, 2, 1, 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'testtesttest ', 261),
(3, 3, 1, 1, 1, 2, 2, 2, 2, 1, 2, 2, 1, 2, 1, 2, 2, 1, 1, 1, 1, 1, 1, 2, 2, 1, 2, 2, 1, 2, 1, 1, 2, 2, 1, 1, 2, 1, 1, 2, 1, 2, 1, 1, 1, 1, 1, 2, 1, 2, 1, 1, 1, 2, 2, 1, 1, 1, 1, 2, 1, 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 258),
(4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 1, 1, 1, 1, 1, 1, 2, 2, 1, 1, 1, 1, 2, 2, 1, 1, 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 249),
(5, 3, 2, 4, 3, 1, 2, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 1, 1, 1, 1, 3, 3, 2, 2, 1, 1, 1, 1, 2, 2, 1, 1, 2, 2, 2, 2, 1, 1, 1, 1, 4, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 261),
(6, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 0, 3, 4, 4, '', '', '', '', '', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 260),
(7, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 3, 0, 3, 0, 3, 0, 3, 0, 3, 0, 3, 0, 3, 1, 3, 1, 3, 0, 0, 5, 1, 5, 0, 5, '', '', 'Moja uwga  nr1', '', '', '', '', '', '', '', '', '', '', '', '', '', 'uwaga nr2', '', '', '', '', '', 243),
(8, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 2, 3, 2, 1, 1, 2, 3, 1, 2, 1, 2, 3, 1, 1, 0, 1, 1, 2, 1, 1, 1, 2, 2, 1, 1, 2, 1, 1, 2, 2, 1, 1, 1, 1, 1, 2, 2, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', 264),
(11, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 234),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '0', '', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 298),
(14, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 268);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ankieta_cyfrowa`
--

CREATE TABLE IF NOT EXISTS `ankieta_cyfrowa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `x1_1a` int(10) NOT NULL,
  `x1_1b` int(10) NOT NULL,
  `x1_1c` int(10) NOT NULL,
  `x1_1d` int(10) NOT NULL,
  `x1_2a` int(10) NOT NULL,
  `x1_2b` int(10) NOT NULL,
  `x1_2c` int(10) NOT NULL,
  `x1_2d` int(10) NOT NULL,
  `x1_3a` int(10) NOT NULL,
  `x1_3b` int(10) NOT NULL,
  `x1_3c` int(10) NOT NULL,
  `x1_3d` int(10) NOT NULL,
  `x1_4a` int(10) NOT NULL,
  `x1_4b` int(10) NOT NULL,
  `x1_4c` int(10) NOT NULL,
  `x1_4d` int(10) NOT NULL,
  `x1_5a` int(10) NOT NULL,
  `x1_5b` int(10) NOT NULL,
  `x1_6a` int(10) NOT NULL,
  `x1_6b` int(10) NOT NULL,
  `x1_6c` int(10) NOT NULL,
  `x1_6d` int(10) NOT NULL,
  `x1_7a` int(10) NOT NULL,
  `x1_7b` int(10) NOT NULL,
  `x1_7c` int(10) NOT NULL,
  `x1_7d` int(10) NOT NULL,
  `x1_8a` int(10) NOT NULL,
  `x1_8b` int(10) NOT NULL,
  `x1_8c` int(10) NOT NULL,
  `x1_8d` int(10) NOT NULL,
  `x1_9a` int(10) NOT NULL,
  `x1_9b` int(10) NOT NULL,
  `x1_9c` int(10) NOT NULL,
  `x1_9d` int(10) NOT NULL,
  `x1_10a` int(10) NOT NULL,
  `x1_10b` int(10) NOT NULL,
  `x2_1a` int(10) NOT NULL,
  `x2_1b` int(10) NOT NULL,
  `x3_1a` int(10) NOT NULL,
  `x3_1b` int(10) NOT NULL,
  `x3_2a` int(10) NOT NULL,
  `x3_2b` int(10) NOT NULL,
  `x3_3a` int(10) NOT NULL,
  `x3_3b` int(10) NOT NULL,
  `x1_1_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_2_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_3_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_4_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_5_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_6_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_7_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_8_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_9_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x1_10_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x2_1_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x3_1_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x3_2_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x3_3_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `AudytyID` int(10) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `FKankieta_cy912534` (`AudytyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=14 ;

--
-- Zrzut danych tabeli `ankieta_cyfrowa`
--

INSERT INTO `ankieta_cyfrowa` (`id`, `x1_1a`, `x1_1b`, `x1_1c`, `x1_1d`, `x1_2a`, `x1_2b`, `x1_2c`, `x1_2d`, `x1_3a`, `x1_3b`, `x1_3c`, `x1_3d`, `x1_4a`, `x1_4b`, `x1_4c`, `x1_4d`, `x1_5a`, `x1_5b`, `x1_6a`, `x1_6b`, `x1_6c`, `x1_6d`, `x1_7a`, `x1_7b`, `x1_7c`, `x1_7d`, `x1_8a`, `x1_8b`, `x1_8c`, `x1_8d`, `x1_9a`, `x1_9b`, `x1_9c`, `x1_9d`, `x1_10a`, `x1_10b`, `x2_1a`, `x2_1b`, `x3_1a`, `x3_1b`, `x3_2a`, `x3_2b`, `x3_3a`, `x3_3b`, `x1_1_podpowiedz`, `x1_2_podpowiedz`, `x1_3_podpowiedz`, `x1_4_podpowiedz`, `x1_5_podpowiedz`, `x1_6_podpowiedz`, `x1_7_podpowiedz`, `x1_8_podpowiedz`, `x1_9_podpowiedz`, `x1_10_podpowiedz`, `x2_1_podpowiedz`, `x3_1_podpowiedz`, `x3_2_podpowiedz`, `x3_3_podpowiedz`, `AudytyID`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 2, 1, 2, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, 1, 1, 2, 1, 1, 1, 1, 2, 1, 1, 2, 1, 1, 1, 2, 1, 1, 1, 2, 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 235),
(2, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 2, 1, 2, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, 1, 1, 2, 1, 1, 1, 1, 2, 1, 1, 2, 1, 1, 1, 2, 1, 1, 1, 2, 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 235),
(3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisany domyślny opis informujący dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 259),
(4, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 257),
(5, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 1, 2, 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', 231),
(7, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 262),
(9, 1, 2, 1, 2, 1, 2, 1, 2, 2, 1, 2, 1, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 2, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 300),
(10, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 304),
(11, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 304),
(12, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 309),
(13, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 262);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `audyty`
--

CREATE TABLE IF NOT EXISTS `audyty` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rok_audytu` int(4) NOT NULL,
  `osrodek_id` int(10) NOT NULL,
  `identyfikator_zestawu` varchar(10) COLLATE utf8_polish_ci NOT NULL COMMENT 'identyfikator_osrodka to numer ktory zostanie nadany recznie na dany rok - bedzie sluzyl do wygenerowania kody zestawu skladajacy sie z numeru wojewodztwa i wlasnie z tego numeru',
  `status_ankiety` int(1) NOT NULL DEFAULT '0',
  `status_etykiety` int(1) NOT NULL DEFAULT '0',
  `status_odwolania` int(1) NOT NULL DEFAULT '0',
  `zaliczenie` int(1) NOT NULL DEFAULT '0',
  `Zespoly_audytorowID` int(10) DEFAULT NULL,
  `metodaID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `FKaudyty558593` (`metodaID`),
  KEY `FKaudyty31726` (`osrodek_id`),
  KEY `FKaudyty396685` (`Zespoly_audytorowID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=318 ;

--
-- Zrzut danych tabeli `audyty`
--

INSERT INTO `audyty` (`id`, `rok_audytu`, `osrodek_id`, `identyfikator_zestawu`, `status_ankiety`, `status_etykiety`, `status_odwolania`, `zaliczenie`, `Zespoly_audytorowID`, `metodaID`) VALUES
(214, 2014, 62, '16/3', 0, 0, 0, 0, 66, 2),
(215, 2014, 113, '9/12', 0, 1, 0, 0, 65, 2),
(219, 2014, 124, '9/23', 0, 0, 0, 0, NULL, 2),
(220, 2014, 119, '9/14', 0, 0, 0, 0, NULL, 2),
(223, 2014, 116, '9/15', 0, 0, 0, 0, 65, 2),
(226, 2014, 118, '9/123', 0, 0, 0, 0, 64, 3),
(227, 2014, 63, '16/12', 0, 0, 0, 0, 71, 2),
(228, 2014, 344, '9/33', 0, 0, 0, 0, 66, 2),
(229, 2014, 120, '9/4', 0, 0, 0, 0, 49, 3),
(230, 2014, 9, '15/11', 0, 0, 0, 0, 66, 2),
(231, 2014, 10, '15/2', 1, 0, 0, 0, 71, 3),
(232, 2014, 280, '5/54', 0, 0, 0, 0, 49, 2),
(233, 2014, 125, '9/12', 0, 0, 0, 0, 5, 2),
(234, 2014, 123, '9/13', 1, 1, 1, 0, 71, 2),
(235, 2014, 126, '9/16', 1, 0, 0, 0, 41, 3),
(236, 2014, 128, '9/123', 0, 0, 0, 0, 49, 3),
(241, 2014, 127, '9/16', 0, 0, 0, 0, 68, 2),
(242, 2014, 326, '9/17', 0, 0, 0, 0, 68, 2),
(243, 2014, 98, '10/12', 1, 0, 0, 0, 41, 2),
(244, 2014, 99, '10/14', 0, 0, 0, 0, 65, 2),
(246, 2014, 345, '9/5', 0, 0, 0, 0, 67, 3),
(248, 2014, 346, '9/87', 0, 0, 0, 0, 49, 3),
(249, 2014, 348, '9/1', 1, 0, 0, 0, 71, 2),
(251, 2014, 97, '10/2', 0, 0, 0, 0, 67, 3),
(252, 2014, 112, '9/47', 0, 0, 0, 0, 67, 3),
(253, 2014, 121, '9/898', 0, 0, 0, 0, 71, 3),
(254, 2014, 105, '10/13', 0, 0, 0, 0, 67, 3),
(255, 2014, 106, '10/135', 1, 0, 0, 0, 71, 2),
(256, 2014, 59, '11/45', 0, 0, 0, 0, 67, 2),
(257, 2014, 96, '10/25', 1, 0, 1, 0, 71, 3),
(258, 2014, 122, '9/85', 1, 0, 1, 0, 71, 2),
(259, 2014, 100, '10/11', 1, 0, 1, 0, 71, 3),
(260, 2014, 101, '10/144', 1, 0, 0, 0, 12, 2),
(261, 2014, 102, '10/123', 1, 1, 0, 0, 12, 2),
(262, 2014, 103, '10/321', 1, 1, 0, 0, 12, 3),
(263, 2014, 104, '10/1', 0, 1, 0, 0, 49, 2),
(264, 2014, 236, '13/1', 0, 1, 1, 0, 71, 2),
(268, 2014, 341, '10/1000', 0, 1, 0, 0, 41, 2),
(273, 2014, 15, '15/1', 0, 1, 0, 0, 66, 2),
(283, 2014, 115, '9/56756', 0, 1, 0, 0, 70, 2),
(287, 2014, 122, '9/85', 0, 0, 2, 0, NULL, 2),
(290, 2014, 100, '10/11', 0, 0, 2, 0, 68, 3),
(298, 2014, 123, '9/13', 0, 0, 2, 0, 70, 2),
(300, 2014, 96, '10/25', 0, 0, 2, 0, 64, 3),
(304, 2014, 109, '9/100', 1, 1, 1, 0, 70, 3),
(309, 2014, 109, '9/100', 1, 0, 2, 0, 41, 3),
(310, 2014, 110, '9/112', 0, 1, 0, 0, 71, 2),
(311, 2014, 111, '9/121', 0, 0, 0, 0, NULL, 2),
(312, 2014, 114, '9/131', 0, 0, 0, 0, NULL, 3),
(313, 2014, 117, '9/343', 0, 0, 0, 0, NULL, 3),
(314, 2014, 107, '10/3', 0, 0, 0, 0, NULL, 2),
(315, 2014, 108, '10/4', 0, 0, 0, 0, NULL, 2),
(316, 2014, 310, '10/44', 0, 0, 0, 0, NULL, 3),
(317, 2014, 342, '10/34', 0, 0, 0, 0, NULL, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `etykieta_analogowa`
--

CREATE TABLE IF NOT EXISTS `etykieta_analogowa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `x4_1` int(10) NOT NULL,
  `x4_2` int(10) NOT NULL,
  `x4_3` int(10) NOT NULL,
  `x4_4` int(10) NOT NULL,
  `x4_5` int(10) NOT NULL,
  `x4_6` int(10) NOT NULL,
  `x4_7` int(10) NOT NULL,
  `x4_8` int(10) NOT NULL,
  `x4_9` int(10) NOT NULL,
  `x4_10` int(10) NOT NULL,
  `x4_11` int(10) NOT NULL,
  `x4_12` int(10) NOT NULL,
  `x4_13` int(10) NOT NULL,
  `x4_14` int(10) NOT NULL,
  `x4_15` int(10) NOT NULL,
  `x4_16` int(10) NOT NULL,
  `x4_17` int(10) NOT NULL,
  `x4_18` int(10) NOT NULL,
  `x4_19` int(10) NOT NULL,
  `x4_20` int(10) NOT NULL,
  `x4_1_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_2_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_3_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_4_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_5_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_6_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_7_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_8_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_9_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_10_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_11_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_12_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_13_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_14_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_15_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_16_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_17_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_18_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_19_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `x4_20_podpowiedz` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `AudytyID` int(10) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `FKetykieta_a466726` (`AudytyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `etykieta_analogowa`
--

INSERT INTO `etykieta_analogowa` (`id`, `x4_1`, `x4_2`, `x4_3`, `x4_4`, `x4_5`, `x4_6`, `x4_7`, `x4_8`, `x4_9`, `x4_10`, `x4_11`, `x4_12`, `x4_13`, `x4_14`, `x4_15`, `x4_16`, `x4_17`, `x4_18`, `x4_19`, `x4_20`, `x4_1_podpowiedz`, `x4_2_podpowiedz`, `x4_3_podpowiedz`, `x4_4_podpowiedz`, `x4_5_podpowiedz`, `x4_6_podpowiedz`, `x4_7_podpowiedz`, `x4_8_podpowiedz`, `x4_9_podpowiedz`, `x4_10_podpowiedz`, `x4_11_podpowiedz`, `x4_12_podpowiedz`, `x4_13_podpowiedz`, `x4_14_podpowiedz`, `x4_15_podpowiedz`, `x4_16_podpowiedz`, `x4_17_podpowiedz`, `x4_18_podpowiedz`, `x4_19_podpowiedz`, `x4_20_podpowiedz`, `AudytyID`) VALUES
(5, 3, 3, 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 283),
(6, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 263),
(7, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 273),
(8, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 268),
(9, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 215),
(10, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 261),
(11, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 310);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `etykieta_cyfrowa`
--

CREATE TABLE IF NOT EXISTS `etykieta_cyfrowa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `x4_1` int(10) NOT NULL,
  `x4_2` int(10) NOT NULL,
  `x4_3` int(10) NOT NULL,
  `x4_4` int(10) NOT NULL,
  `x4_5` int(10) NOT NULL,
  `x4_6` int(10) NOT NULL,
  `x4_7` int(10) NOT NULL,
  `x4_8` int(10) NOT NULL,
  `x4_9` int(10) NOT NULL,
  `x4_10` int(10) NOT NULL,
  `x4_11` int(10) NOT NULL,
  `x4_12` int(10) NOT NULL,
  `x4_13` int(10) NOT NULL,
  `x4_14` int(10) NOT NULL,
  `x4_15` int(10) NOT NULL,
  `x4_1_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_2_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_3_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_4_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_5_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_6_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_7_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_8_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_9_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_10_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_11_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_12_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_13_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_14_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `x4_15_podpowiedz` varchar(150) COLLATE utf8_polish_ci NOT NULL DEFAULT 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie',
  `AudytyID` int(10) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `FKetykieta_c898781` (`AudytyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `etykieta_cyfrowa`
--

INSERT INTO `etykieta_cyfrowa` (`id`, `x4_1`, `x4_2`, `x4_3`, `x4_4`, `x4_5`, `x4_6`, `x4_7`, `x4_8`, `x4_9`, `x4_10`, `x4_11`, `x4_12`, `x4_13`, `x4_14`, `x4_15`, `x4_1_podpowiedz`, `x4_2_podpowiedz`, `x4_3_podpowiedz`, `x4_4_podpowiedz`, `x4_5_podpowiedz`, `x4_6_podpowiedz`, `x4_7_podpowiedz`, `x4_8_podpowiedz`, `x4_9_podpowiedz`, `x4_10_podpowiedz`, `x4_11_podpowiedz`, `x4_12_podpowiedz`, `x4_13_podpowiedz`, `x4_14_podpowiedz`, `x4_15_podpowiedz`, `AudytyID`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 304),
(2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 'Tutaj będzie wpisana domyślny opis informujacy dlaczego nie jest maksymalna ilość punktów w ocenie', 262);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `identyfikatory_wojewodztw`
--

CREATE TABLE IF NOT EXISTS `identyfikatory_wojewodztw` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'constrain nie moze byc identyfikatora i roku 2 razy tego samego razem sam identyfikator moze wystepowac lub rok',
  `rok_audytu` int(4) NOT NULL,
  `identyfikator_wojewodztwa` int(10) NOT NULL,
  `WojewodztwaID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKIdentyfika74319` (`WojewodztwaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci ROW_FORMAT=FIXED AUTO_INCREMENT=33 ;

--
-- Zrzut danych tabeli `identyfikatory_wojewodztw`
--

INSERT INTO `identyfikatory_wojewodztw` (`id`, `rok_audytu`, `identyfikator_wojewodztwa`, `WojewodztwaID`) VALUES
(1, 2013, 6, 1),
(2, 2013, 9, 2),
(3, 2013, 10, 5),
(4, 2013, 12, 6),
(5, 2013, 11, 7),
(6, 2013, 8, 8),
(7, 2013, 13, 9),
(8, 2013, 15, 10),
(9, 2013, 14, 11),
(10, 2013, 16, 12),
(11, 2013, 1, 13),
(12, 2013, 2, 14),
(13, 2013, 3, 15),
(14, 2013, 7, 16),
(15, 2013, 5, 17),
(16, 2013, 4, 18),
(17, 2014, 9, 1),
(18, 2014, 10, 2),
(19, 2014, 12, 5),
(20, 2014, 11, 6),
(21, 2014, 8, 7),
(22, 2014, 13, 8),
(23, 2014, 15, 9),
(24, 2014, 14, 10),
(25, 2014, 16, 11),
(26, 2014, 1, 12),
(27, 2014, 2, 13),
(28, 2014, 3, 14),
(29, 2014, 7, 15),
(30, 2014, 5, 16),
(31, 2014, 4, 17),
(32, 2014, 0, 18);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `metoda`
--

CREATE TABLE IF NOT EXISTS `metoda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa_metody` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `metoda`
--

INSERT INTO `metoda` (`id`, `nazwa_metody`) VALUES
(1, 'Wybierz'),
(2, 'Analogowa'),
(3, 'Cyfrowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osrodki`
--

CREATE TABLE IF NOT EXISTS `osrodki` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `adres` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `kod` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  `miasto` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `WojewodztwaID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKosrodki619647` (`WojewodztwaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=349 ;

--
-- Zrzut danych tabeli `osrodki`
--

INSERT INTO `osrodki` (`id`, `nazwa`, `adres`, `kod`, `miasto`, `WojewodztwaID`) VALUES
(1, 'Białostockie Centrum Onkologii', 'ul. Ogrodowa 12', '15-027', 'Białystok', 12),
(2, 'Spółdzielczy Zespół ZOZ ESKULAP', 'ul. Nowy Świat 11C', '15-453', 'Białystok', 12),
(3, 'Przychodnia Profilaktyki i Diagnostyki Obrazowej T.N.N. Białystok', 'ul. Siewna 2', '15-183', 'Białystok', 12),
(4, 'Wojewódzki Szpital Zespolony im. J. Śniadeckiego ', 'ul. Warszawska 15 ', '15-052', 'Białystok', 12),
(5, 'Szpital Wojewodzki im. Kard. S. Wyszyńskiego', 'Al. Piłsudskiego 11', '18-404', 'Łomża', 12),
(6, 'Centrum Onkologii - Instytut ', 'ul. Roentgena 5', '02-781', 'Warszawa', 9),
(7, 'SP ZOZ w Mińsku Mazowieckim', 'ul. Szpitalna 37', '05-300', 'Mińsk Mazowiecki', 9),
(8, 'SP ZOZ ŁOSICE', 'ul. Słoneczna 1', '', 'Łosice', 9),
(9, 'Centrum Medyczno-Diagnostyczne Sp. z o.o.', 'ul. Kleeberga 2', '08-110', 'Siedlce', 9),
(10, 'NZOZ Zespół Lekarzy Specjalistów MEDICA', 'ul. 3-ego Maja 3', '08-110', 'Siedlce', 9),
(11, 'Radomski Szpital Specjalistyczny dr T.Chałubińskiego', 'ul. Lekarska 4', '26-610', 'Radom', 9),
(12, 'SP ZZOZ im.J.Piłsudskiego', 'ul. Sienkiewicza 7', '09-100', 'Płońsk', 9),
(13, 'SPZ ZOZ w Przysusze', 'Al. Jana Pawła II 4/5', '26-400', 'Przysucha', 9),
(14, 'Krajowe Centrum Osteoporozy', 'ul. Syrokomli 32', '03-335', 'Warszawa', 9),
(15, 'Centrum Medyczne DAMIANA', 'ul. Wałbrzyska 46', '02-739', 'Warszawa', 9),
(16, 'Centrum Medyczne LIM LUX MED.', 'Al. Jerozolimskie 65/79', '00-697', 'Warszawa', 9),
(17, 'MEDICOVER Opieka Szpitalna', 'ul. Rzeczypospolitej 5', '02-972', 'Warszawa', 9),
(18, 'Centrum Zdrowia NZOZ', 'ul. Pomorska 1', '05-500', 'Piaseczno', 9),
(19, 'SENSOR CLINIQ', 'ul. Szlenkierów 1', '01-181', 'Warszawa', 9),
(20, 'SPZ ZOZ w Pruszkowie', 'ul. Armii Krajowej 2/4', '05-800', 'Pruszków ', 9),
(21, 'Mazowiecki Szpital Onkologiczny', 'ul. Kościelna 61', '05-135', 'Wieliszew', 9),
(22, 'SP ZOZ Warszawa - Wola', 'ul. Płocka 49', '01-152', 'Warszawa', 9),
(23, 'ZOZ Warszawa Bemowo', 'ul. Czumy 1', '01-355', 'Warszawa', 9),
(24, 'Powiatowe Centrum Zdrowia Sp. z o.o.', 'ul. Batorego 44', '05-400', 'Otwock', 9),
(25, 'SP ZOZ w Garwolinie', 'ul. Lubelska 50', '08-400', 'Garwolin', 9),
(26, 'SP ZOZ w Węgrowie', 'ul. Kosciuszki 201', '07-100', 'Węgrów', 9),
(27, 'NZOZ Centrum Medyczne OMEGA  ', 'ul. Królewiecka 24 a', '09-400', 'Płock', 9),
(28, 'ZLA Żoliborza, Bielan i Łomianek', 'ul. Szajnochy 8', '01-637', 'Warszawa', 9),
(29, 'CePeLek SP ZOZ', 'ul. Koszykowa 78', '00-911', 'Warszawa', 9),
(30, 'C.M. SASKA KĘPA', 'ul. Marokańska 16', '', 'Warszawa', 9),
(31, 'SPZ ZOZ w Żurominie', 'ul. Szpitalna 56', '09-300', 'Żuromin', 9),
(32, 'NZOZ Europejskie Centrum Zdrowia', 'ul. Borowa 14/18', '05-400', 'Otwock', 9),
(33, 'SP ZOZ w Sokołowie Podlaskim', 'ul. Ks. Jana Bosko 5', '', 'Sokołów Podlaski', 9),
(34, 'Nowodworskie Centrum Medyczne', 'ul. Paderewskiego 7', '05-100', 'Nowy Dwór Maz.', 9),
(35, 'Wojskowy Instytut Medyczny', 'ul. Szaserów 128', '00-909', 'Warszawa', 9),
(36, 'SPL dla Pracowników Wojska SPZOZ', 'ul. Nowowiejska 31', '00-911', 'Warszawa', 9),
(37, 'Centrum Leczniczo-Rehabilitacyjne i Medycyny Pracy ATTIS', 'ul. Górczewska 89', '01-401', 'Warszawa', 9),
(38, 'NZOZ MAGODENT', 'ul. Fieldorfa 40', '04-125', 'Warszawa', 9),
(39, 'SP ZZOZ', 'Al. Sikorskiego 10', '', 'Kozienice', 9),
(40, 'Szpital Grochowski SP ZOZ', 'ul. Grenadierów 51/59', '04-073', 'Warszawa', 9),
(41, 'Centrum Medyczne ENEL -MED   ', 'ul.  Cegłowska 80', '01-809', 'Warszawa', 9),
(42, 'NZOZ Medicus', 'ul. Wojska Polskiego 35', '', 'Gostynin', 9),
(43, 'SZPZLO W-wa Wawer', 'ul. Strusia 4/8 ', '', 'Warszawa', 9),
(44, 'SP ZZOZ w Lipsku', 'ul. Śniadeckiego 2', '27-300', 'Lipsko', 9),
(45, 'Szpital Specjalistyczny im. św. Rodziny', 'ul. Madalińskiego 25', '02-544', 'Warszawa', 9),
(46, 'Wojewodzki Szpital Secjalistyczny', 'ul. Aleksandrowicza 5', '26-617', 'Radom', 9),
(47, 'SP ZOZ Warszawa-Ursynów', 'ul. Na Uboczu 5', '02-786', 'Warszawa', 9),
(48, 'Centralny Szpital Kliniczny MSWiA', 'ul. Wołoska 137', '02-507', 'Warszawa', 9),
(49, 'Klinika Medyczna IBIS', 'ul. Kacza 1', '01-013', 'Warszawa', 9),
(50, 'Jerzy Petz MEDIQ NZOZ', 'ul. Piłsudskiego 20', '05-120', 'Legionowo', 9),
(51, 'SPZ ZOZ w Przasnyszu', 'ul. Sadowa 9', '06-300', 'Przasnysz', 9),
(52, 'NZOZ Nowy Szpital w Świebodzinie', 'ul. Matejki 1', '66-200', 'Świebodzin', 6),
(53, 'NZOZ ARTMA', 'ul. Piłsudskiego 1a/207', '', 'Zielona Góra', 6),
(54, 'DIAGNOSTYK', 'ul. Wazów 42', '', 'Zielona Góra', 6),
(55, 'SP ZOZ Sulęcin', 'ul. W. Witosa 7', '69-200', 'Sulęcin ', 6),
(56, 'Powiat. Centr. Usług.NZOZ Szpital Na Wyspie', 'ul. Skarbowa 2 ', '68-200', 'Żary', 6),
(57, 'Wielospecjalistyczny Szpital SPZOZ', 'ul. Chałubińskiego 7', '67-100', 'Nowa Sól', 6),
(58, 'NZOZ Panoramix', 'ul. Piłsudskiego 47', '', 'Gorzów Wielkopolski', 6),
(59, '105 Szpital Wojskowy SP ZOZ', 'ul. Domańskiego 2', '68-200', 'Żary', 6),
(60, 'NZOZ ARS MEDICA BIS', 'ul. Muzealna 42', '67-100', 'Nowa Sól', 6),
(61, 'ALDEMED Centrum Medyczne', 'Al. Niepodległości 1', '65-048', 'Zielona Góra', 6),
(62, 'SPZOZ w Lesku', 'ul. Kochanowskiego 2', '38-600', 'Lesko', 11),
(63, 'NZOZ MAZ-MED.', 'ul. Orzeszkowej 16', '35-006', 'Rzeszów', 11),
(64, 'SP ZZOZ Powiatowy Szpital Specjalistyczny', 'ul. Staszica 4', '37-450', 'Stalowa Wola', 11),
(65, 'ALMED Sp. Z o.o.  Przychodnia Specjalistyczno-Diagnostyczna ', 'ul. Grunwaldzka 1', '37-500', 'Jarosław', 11),
(66, 'SP ZOZ ', 'ul. Kwiatkowskiego 2', '37-450', 'Stalowa Wola', 11),
(67, 'NZOZ ESS-MED', 'ul. Tyszkiewiczów 5', '36-100', 'Kolbuszowa Dolna', 11),
(68, 'Szpital Specjalistyczny w Brzozowie ', 'ul. Bielawskiego 18', '36-200', 'Brzozów', 11),
(69, 'NZOZ MMG w Rzeszowie', 'ul. Jana Pawła II 31', '35-317', 'Rzeszów', 11),
(70, 'Szpital Specjalistyczny', 'ul. Lwowska 22', '38-200', 'Jasło', 11),
(71, 'Szpital Wojewodzki im. Zofii z Zamoyskich Tarnowskiej', 'ul. Szpitalna 1', '39-400', 'Tarnobrzeg', 11),
(72, 'NZOZ Centrum w Dębicy', 'ul. Batorego 18', '39-200', 'Dębica', 11),
(73, 'SP ZOZ w Sanoku', 'ul. 800-lecia 26', '38-500', 'Sanok', 11),
(74, 'Woj. Szpital Specjalist.im.F.Chopina', 'ul. Chopina 2', '35-055', 'Rzeszów', 11),
(75, 'Centrum Medyczne w Łańcucie', 'ul. Paderewskiego 5', '37-100', 'Łańcut', 11),
(76, 'ZOZ Nr 2', 'ul. Fredry 9 ', '35-005', 'Rzeszów', 11),
(77, 'NZOZ Mrukmed 3 Sp.p.', 'ul. Langiewicza 61', '35-021', 'Rzeszów', 11),
(78, 'NZOZ Ośrodek Diagnostyczny Chorób Nowotworowych Fundacji SOS Życie', 'ul. Tańskiego 2', '39-300', 'Mielec', 11),
(79, ' Centrum Medyczne MEDYK', 'ul. Szopena 1', '35-055', 'Rzeszów', 11),
(80, 'SP ZOZ Nr 1 w Rzeszowie', 'ul. Hetmańska 21', '35-045', 'Rzeszów', 11),
(81, 'SP ZOZ w Przeworsku', 'ul. Szpitalna 16', '', 'Przeworsk', 11),
(82, 'Zachodniopomorskie Centrum Onkologii', 'ul. Strzałowska 22', '71-730', 'Szczecin', 18),
(83, 'NZOZ MEDICAL CARE', 'ul. Batalionów Chłopskich 86', '70-764', 'Szczecin', 18),
(84, ' SZOZ  w Koszalinie', 'ul. Szpitalna 2', '75-720', 'Koszalin', 18),
(85, 'NZOZ Ambulatorium', 'ul. Mickiewicza 6b', '78-200', 'Białogard', 18),
(86, 'Szpital w Szczecinku ', 'ul. Kościuszki 38', '78-400', 'Szczecinek', 18),
(87, 'SPS ZOZ Zdroje', 'ul. Mączna 4', '', 'Szczecin', 18),
(88, 'SP Szpital Kliniczny PUM Nr 2', 'Al. Powstańców Wielkopolskich 72', '70-111', 'Szczecin', 18),
(89, 'NZOZ Profilaktyka ', 'ul. Staszica 8A', '75-449', 'Koszalin', 18),
(90, 'SP ZZOZ ', 'ul. Niechorska 27', '72-300', 'Gryfice', 18),
(91, 'NZOZ PEOZET Sp. z o.o.', 'ul. 28 Lutego 3', '78-400', 'Szczecinek', 18),
(92, 'Wojewodzki Ośrodek Medycyny Pracy - ZCLiP', 'ul. Bolesława Śmiałego 33', '70-347', 'Szczecin', 18),
(93, 'Szpital Wojewódzki im. M.Kopernika', 'ul. Orla 2', '75-727', 'Koszalin', 18),
(94, 'NZOZ Intermed', 'ul. Niepodległości 28', '', 'Gryfino', 18),
(95, 'SPZOZ', 'ul. Niedziałkowskiego 4a', '73-200', 'Choszczno', 18),
(96, 'Szpital Powiatowy ZOZ', 'ul. Szewska 23', '87-140', 'Chełmża', 2),
(97, 'Regionalny Szpital Specjalistyczny', 'ul. Sikorskiego 32', '86-300', 'Grudziądz', 2),
(98, 'ZOZ Brodnica', 'ul. Wiejska 9', '87-300', 'Brodnica', 2),
(99, 'SP ZOZ Radziejów', 'ul. Szpitalna 3', '88-200', 'Radziejów', 2),
(100, 'Centrum Onkologii Szpital w Bydgoszczy', 'ul. Romanowskiej 2', '85-796', 'Bydgoszcz', 2),
(101, '10 Wojskowy Szpital Kliniczny SPZOZ', 'ul. Powst. Warszawy 5', '85-090', 'Bydgoszcz', 2),
(102, 'Specjalistyczny Szpital Miejski ', 'ul. Batorego 17/19', '87-100', 'Toruń', 2),
(103, 'Szpital Wielospecjalistyczny im.dr L.Błażka', 'ul.Poznańska 97', '88-100', 'Inowrocław', 2),
(104, 'Wojewódzki Szpital Zespolony', 'ul. Św. Józefa 53/59', '87-100', 'Toruń', 2),
(105, 'NZOZ Lecznice CITOMED', 'ul. M.Skłodowskiej-Curie 73', '87-100', 'Toruń', 2),
(106, 'SP ZOZ Rypin', 'ul. 3-ego Maja 2', '87-500', 'Rypin ', 2),
(107, 'NZOZ Miejski ZOZ', 'ul. Kilińskiego 16', '87-800', 'Włocławek', 2),
(108, 'SP ZPS', 'ul. Wyszyńskiego 21a', '87-800', 'Włocławek', 2),
(109, 'Dolnośląskie Centrum Onkologii we Wrocławiu', 'pl. Hirszfelda 12', '53-413', 'Wrocław', 1),
(110, 'Zespół Poradnii dla Kobiet Ginekomed ', 'ul. Kiepury 77', '58-506', 'Jelenia Góra', 1),
(111, 'Centrum Diagnostyki Medycznej MEDIX', 'ul. Grabiszyńska 37/39', '53-501', 'Wrocław', 1),
(112, 'Centrum Medyczne Practimed', 'ul. Pabianicka 25', '53-339', 'Wrocław', 1),
(113, 'Dolnosląskie Centrum Medyczne DOLMED S.A.', 'ul. Legnicka 40', '53-674', 'Wrocław', 1),
(114, 'ZOZ w Głogowie', 'ul. Kościuszki 15', '67-200', 'Głogów', 1),
(115, 'Specjalistyczny Szpit. im.dr Sokołowskiego', 'ul. Sokołowskiego 4', '58-309', 'Wałbrzych', 1),
(116, 'Miedziowe Centrum Zdrowia', 'ul. M.Skłodowskiej-Curie 54', '59-300', 'Lubin', 1),
(117, 'SCM w Polanicy Zdrój SP ZOZ', 'ul. Jana Pawła II 2', '57-320', 'Polanica Zdrój', 1),
(118, 'NZOZ NOVA MED.', 'ul. Struga 28', '59-220', 'Legnica', 1),
(119, 'NZOZ Medi-Lab ', 'ul. Wałbrzyska  8-4a', '58-100', 'Świdnica', 1),
(120, 'Centrum Usług Medycznych ESKULAP Sp. z o.o.', 'ul. Zamenhofa 47', '58-105', 'Świdnica', 1),
(121, 'Wojewózkie Centrum Szpitalne Kotliny Jeleniogórskiej  ', 'ul. Ogińskiego 6', '58-506', 'Jelenia Góra', 1),
(122, 'SP ZOZ w Oleśnicy', 'ul. Reja 10', '56-400', 'Oleśnica', 1),
(123, 'Spółka Cywilna Raczyńscy', 'ul. Miernicza 5', '58-200', 'Dzierżoniów', 1),
(124, 'Centrum Medyczne STOMADENT', 'ul. Dolne Młyny 21', '59-700', 'Bolesławiec', 1),
(125, 'Ośrodek Diagnostyki Onkologicznej', 'ul. W. Andersa 4', '59-200', 'Legnica', 1),
(126, 'SP ZOZ', 'ul. Szpitalna 1a', '57-300', 'Kłodzko', 1),
(127, 'Polskie Centrum Zdrowia Instytut Medyczny Sp. z o.o.', 'ul. Legnicka 61', '54-203', 'Wrocław', 1),
(128, 'ZOZ w Oławie ', 'ul. K. Baczyńskiego 1', '55-200', 'Oława', 1),
(129, 'NZOZ Prudnickie Centrum Medyczne', 'ul. Szpitalna 14', '48-200', 'Prudnik', 10),
(130, 'SP ZOZ Centrum ', 'ul. Budowlanych 4', '45-202', 'Opole', 10),
(131, 'SP ZOZ w Kędzierzynie Koźlu', 'ul. 24 kwietnia 7', '47-200', 'Kędzierzyn Koźle', 10),
(132, 'NZOZ Nyski Ośrodek Onkologii Onkovit', 'ul. Rodziewiczówny 34', '48-300', 'Nysa', 10),
(133, 'ZOZ Strzelce Opolskie', 'ul. Opolska 36A', '47-100', 'Strzelce Opolskie', 10),
(134, 'SP ZOZ Głubczyce', 'ul. Skłodowskiej-Curie 26', '48-100', 'Głubczyce', 10),
(135, 'NZOZ Diagnostyka Obrazowa', 'ul. M. Skłodowskiej-Curie 23', '46-200', 'Kluczbork', 10),
(136, 'NZOZ Pro-Sana BSPZ', 'ul. Chocimska 7', '46-300', 'Brzeg', 10),
(137, 'Opolskie Centrum Onkologii', 'ul. Katowicka 66 a', '45-060', 'Opole', 10),
(138, 'Szpital Specjalistyczny im. J.K. Łukowicza', 'ul. Leśna 10', '89-600', 'Chojnice', 13),
(139, 'Szpital Morski im. PCK', 'ul. Powstania Styczniowego 1', '81-519', 'Gdynia', 13),
(140, 'Specjalist.Przychodnia Lekarska Śródmieście', 'ul. Armii Krajowej 44', '81-366', 'Gdynia', 13),
(141, 'NZOZ Przychodnia Dąbrowa - Dąbrówka', 'ul. Sojowa 22', '81-589', 'Gdynia', 13),
(142, 'Wojskowa Specjalist. Przychodnia Lek. SPZOZ', 'ul. Pułaskiego 4', '81-912', 'Gdynia', 13),
(143, 'Szpital Specjalistyczny w Kościerzynie', 'ul. Piechowskiego 36', '83-400', 'Kościerzyna', 13),
(144, 'SPS ZOZ w Lęborku', 'ul. Węgrzynowicza 13', '84-300', 'Lębork', 13),
(145, 'Ośrodek Medyczny Mederi Sp.J.', 'ul. Kotarbińskiego 10', '82-200', 'Malbork', 13),
(146, 'NZOZ Nad Zatoką', 'Al. Wolności 40A', '84-300', 'Lębork', 13),
(147, 'Wojewódzki Szpital Specjalistyczny im. J.Korczaka', 'ul. Prof. Lotha 26', '76-200', 'Słupsk', 13),
(148, 'SPM ZOZ w Słupsku', 'ul. Tuwima 37', '76-200', 'Słupsk', 13),
(149, '7 Szpital Marynarki Wojennej SP ZOZ', 'ul. Polanki 117', '80-305', 'Gdańsk', 13),
(150, 'NZOZ Centrum Zdrowia Salus', 'ul. Zielona 8', '76-200', 'Słupsk', 13),
(151, 'NZOZ Goris - Med', 'ul. Chrobrego 6/8', '81-756', 'Sopot', 13),
(152, 'NZOZ STOMEDSTAR', 'ul. Hallera 21', '83-200', 'Starogard Gdański', 13),
(153, 'Szpitale Tczewskie SA', 'ul. 30 stycznia 57/58', '83-110', 'Tczew', 13),
(154, 'Geneva Trust Polska NZOZ', 'ul. Schuberta 104', '80-172', 'Gdańsk', 13),
(155, 'Uniwersyteckie Centrum Kliniczne ', 'ul. Dębinki 7', '80-952', 'Gdańsk', 13),
(156, 'Wojewódzkie Centrum Onkologii', 'ul. M. Skłodowskiej - Curie 2', '80-210', 'Gdańsk', 13),
(157, 'Poliklinika Onkologiczna Zielińska i Wsp.', 'Aleja Zwycięstwa 31/32', '80-219', 'Gdańsk', 13),
(158, 'Nadmorskie Centrum Medyczne', 'ul. Majewskich 26', '80-457', 'Gdańsk', 13),
(159, 'NZOZ INVICTA', 'ul. Trzy Lipy 3', '80-172', 'Gdańsk ', 13),
(160, 'LUX MED. Diagnostyka Sp.z o.o.', 'ul. Postępu 21C', '02-676', 'Warszawa', 13),
(161, 'Szpit. Spec. św. Wojciecha Adalberta SP ZOZ', 'al. Jana Pawła II 50', '80-462', 'Gdańsk', 13),
(162, 'NZOZ Mammo-Med.', 'ul. Schuberta 104', '80-172', 'Gdańsk', 13),
(163, 'NZOZ DIAGNOMED', 'ul. Komorowicka 23', '43-300', 'Bielsko-Biała', 14),
(164, 'NZOZ GENOM', 'ul. 1-ego Maja 339', '41-710', 'Ruda Śląska', 14),
(165, 'Szpital Miejski pod wezw.św. Łukasza', 'ul. Szpitalna 11', '41-940', 'Piekary Ślaskie', 14),
(166, 'Powiatowy ZZOZ', 'ul. Małachowskiego 12', '42-500', 'Będzin', 14),
(167, 'Szpital Specjalistyczny im. Starkiewicza', 'ul. Szpitalna 13', '41-300', 'Dąbrowa Górnicza', 14),
(168, 'Szpital im. Stanisława Leszczyńskiego', 'ul. Raciborska 26', '40-074', 'Katowice', 14),
(169, 'NZOZ G-Med', 'ul. Sikorskiego 71', '42-300', 'Myszków', 14),
(170, 'Centrum Onkologii-Instytut O. w Gliwicach', 'ul. Wybrzeże Armii Krajowej 15', '44-101', 'Gliwice', 14),
(171, 'ZOZ EPIONE', 'ul. Piotrowicka 68', '40-723', 'Katowice', 14),
(172, 'SP CSK im. Prof.. Kornela gibińskiego', 'ul. Medyków 14', '40-752', 'Katowice', 14),
(173, 'Szpital Specjalistyczny Nr 2', 'ul. Stefana Batorego 15', '41-902', 'Bytom ', 14),
(174, 'Przychodnia Specjalistyczna SPZOZ', 'ul. Niedurnego 50d', '41-703', 'Ruda Śląska', 14),
(175, 'ARTMED sp. Z o.o. NZOZ Przychodnia Lekarska SPECJAL-MED', 'ul. Sienkiewicza 28', '41-800', 'Zabrze', 14),
(176, 'NWZOZ MEDICUS 99', 'ul. Dworcowa 1D', '44-330', 'Jastrzębie Zdrój', 14),
(177, 'NZOZ Poliklinika Dąbrowska', 'al. J.Piłsudskiego 92', '41-308', 'Dąbrowa Górnicza', 14),
(178, 'Beskidzkie Centrum Medyczne', 'ul. Młodzieżowa 21', '43-300', 'Bielsko-Biała', 14),
(179, 'NZOZ Przychodnia Akademicka', 'ul. Bielska 66', '43-400', 'Cieszyn', 14),
(180, 'Zakład Lecznictwa Ambulatoryjnego', 'ul. Wawel 15', '41-200', 'Sosnowiec', 14),
(181, 'Szpital Powiatowy', 'ul. Miodowa 14', '42-400', 'Zawiercie', 14),
(182, 'SPDO TOMOGRAF', 'Aleja Bielska 105', '43-100', 'Tychy', 14),
(183, 'NZOZ Zdrowie Kobiety i Dziecka', 'Al. Piłsudskiego 50', '34-300', 'Żywiec', 14),
(184, 'NZOZ ADO - MED 2', 'ul. Stefana Batorego 19', '41-506', 'Chorzów', 14),
(185, 'Wojewódzki Szpital Specjalistyczny ', 'ul. Bialska 104/118', '42-200', 'Częstochowa', 14),
(186, 'ZZOZ', 'ul. Bielska 4', '43-400', 'Cieszyn', 14),
(187, 'Zakład Poradnictwa Leczenia i Specjalistycznej Diagnostyki Medycznej RYWAL', 'ul. Warszawska 40', '40-008', 'Katowice', 14),
(188, 'SP ZOZ w Lublińcu', 'ul. Grundawldzka 9', '42-700', 'Lubliniec', 14),
(189, 'Śląskie Centrum Osteoporozy', 'ul. Opolska 11/3', '40-084', 'Katowice', 14),
(190, 'NZOZ Sanivitas', 'pl. Akademicki 15/6', '41-902', 'Bytom', 14),
(191, 'NZOZ Centrum Medyczne Femina ', 'ul. Kłodnicka 23', '', 'Katowice', 14),
(192, 'NZOZ Poradnia Chorób Piersi, Pracownia USG', 'ul. Pszczyńska 12', '43-190', 'Mikołów', 14),
(193, 'SPZLA  Moja Przychodnia', 'ul. Mickiewicza 9', '40-859', 'Katowice', 14),
(194, 'Centrum Medyczne MAŁGORZATA', 'ul. Warszawska 30', '42-202', 'Częstochowa', 14),
(195, 'Centrum Radiologii i Diagnost. Obrazowej', 'ul. Księcia Ziemowita 1', '44-100', 'Gliwice', 14),
(196, 'Prywatne Centrum Medyczne MEDYK - Centrum', 'Al. Wolności 34', '42-200', 'Częstochowa', 14),
(197, 'SP ZOZ Szpital Wielospecjalistyczny', 'ul. Chełmońskiego 28', '43-600', 'Jaworzno', 14),
(198, 'NZOZ AWO Usługi Radiologiczne', 'ul. Dąbrowskiego 20', '44-240', 'Żory', 14),
(199, 'NZ Diagnost.yka Schorzeń Sutka i Osteoporozy  ABE', 'ul. Leszka 10 ', '44-313', 'Wodzisław Śląski', 14),
(200, 'Centrum profilaktyki, Leczenia i Opieki MEDICO', 'ul. Odrodzenia 9', '41-209', 'Sosnowiec', 14),
(201, 'Samodzielny Publiczny Szpital Miejski w Sosnowcu ', 'ul. Zegadłowicza 3', '41-200', 'Sosnowiec', 14),
(202, 'Zabrzańskie Centrum opieki Medycznej Salubris', 'ul. Wolności 338B', '41-800', 'Zabrze', 14),
(203, 'Ośrodek Diagnostyki i Leczenia Chorób Kobiecych oraz Schorzeń Sutka  TOMMED', 'ul. Żelazna 1', '40-952', 'Katowice', 14),
(204, 'Szpital im. dr B. Hagera', 'ul. Pyskowicka 47-51', '42-612', 'Tarnowskie Góry', 14),
(205, 'NZOZ BI-MED', 'ul. Mickiewicza 8', '42-600', 'Tarnowskie Góry', 14),
(206, 'Szpital Twoje Zdrowie w Opatowie', 'ul. Szpitalna 4', '27-500', 'Opatów', 14),
(207, 'Beskidzkie Centrum Onkologii - Szpital Miejski im. Jana Pawła II', 'ul. Wyzwolenia 18', '43-300', 'Bielsko-Biała', 14),
(208, 'NZOZ MED-JOLAN', 'ul. Wileńska 19', '41-216', 'Sosnowiec', 14),
(209, 'Miejski Zespół Opieki Zdrowotnej', 'ul. Pokoju 17', '43-143', 'Lędziny', 14),
(210, 'SP ZOZ w Szamotułach ', 'ul. Sukiennicza 13', '64-500', 'Szamotuły ', 17),
(211, 'ZOZ', 'ul. Św. Jana 9', '62-200', 'Gniezno', 17),
(212, 'NZ ZOZ Pleszewskie Centrum Medyczne Sp.z o.o. ', 'ul. Poznańska 125a', '63-300', 'Pleszew', 17),
(213, 'SP Zakład Opieki Zdrowotnej', 'ul. Szpitalna 10', '', 'Międzychód', 17),
(214, 'NZOZ Ars Medical Sp z o.o.', 'Al.. Wojska Polskiego 43', '64-920', 'Piła', 17),
(215, 'NZOZ Centrum Ochrony Zdrowia', 'ul. Orcholska 66', '62-200', 'Gniezno', 17),
(216, 'POSUM', 'Al. Solidarności 36', '61-696', 'Poznań', 17),
(217, 'Wojskowa Specjalistyczna Przychodnia Lekarska', 'ul. Szylinga 1', '', 'Poznań', 17),
(218, 'AMIKA Konsorcjum Medyczne', 'ul. Piastów 16', '62-300', 'Września', 17),
(219, 'Ośrodek Profilaktyki I Epidemiologii Nowotworów ', 'ul. Kazimierza Wielkiego 24/26', '61-863', 'Poznań', 17),
(220, 'Wielkopolskie Centrum Onkologii', 'ul. Garbary 15', '61-866', 'Poznań', 17),
(221, 'ZZOZ ', 'ul. Kościuszki 96', '64-700', 'Czarnków', 17),
(222, 'Wielkopolskie Centra Medyczne Remedium', 'os. Stefana Batorego 80D', '', 'Poznań', 17),
(223, 'Wielkopolskie Centra Medyczne Panaceum', 'os. Stefana Batorego 80D', '', 'Poznań', 17),
(224, 'NZOZ Centrum Medyczne HCP Sp z o.o.', 'ul. 28 Czerwca 1956 nr 194', '61-485', 'Poznań', 17),
(225, 'Szpital Specjalistyczny im. Staniasława Staszica', 'ul. Rydygiera 1', '64-920', 'Piła', 17),
(226, 'NZOZ Diagnostyka- LARGO', 'ul. Nad Groblą 3/4', '', 'Poznań', 17),
(227, 'Szpital Kliniczny Przemienienia Pańskiego', 'ul. Szamarzewskiego 82/84', '61-848', 'Poznań', 17),
(228, 'SP ZOZ', 'ul. Poduchowne 1', '62-700', 'Turek', 17),
(229, 'SPZOZ w Gostyniu', 'Pl.K. Marcinkowskiego 8/9', '63-800', 'Gostyń', 17),
(230, 'Wojewódzki Szpital Zespolony', 'ul. Szpitalana 45', '62-504', 'Konin', 17),
(231, 'SP ZOZ', 'ul. Szpitalna 7', '64-000', 'Kościan', 17),
(232, 'Leszczyńskie Centrum Medyczne Ventriculus', 'ul. Słowiańska 41', '64-100', 'Leszno', 17),
(233, 'Wojewódzki Szpital Zespolony', 'ul. Kiepury 45', '64-100', 'Leszno', 17),
(234, 'SP ZOZ', 'ul. Floriańska 10', '63-700', 'Krotoszyn', 17),
(235, 'SP ZOZ', 'ul. Szpitalna 7', '63-600', 'Kępno', 17),
(236, 'Podhalański Szpital Spec. Im. JPII', 'ul. Szpitalna 14', '34-400', 'Nowy Targ', 8),
(237, 'Szpital Uniwersytecki w Krakowie', 'ul. Kopernika 19', '31-501', 'Kraków', 8),
(238, 'ZZOZ', 'ul. Karmelicka 5', '34-100', 'Wadowice', 8),
(239, 'Szpital Specj.im. Rydygiera', 'os. Złotej Jesieni 1', '31-826', 'Kraków ', 8),
(240, 'NZOZ Centrum Medycyny Profilaktycznej', 'ul. Komorowskiego 12', '30-106', 'Kraków', 8),
(241, 'NZOZ Tarnowskie Centrum Diagn.Obrazowej', 'ul. Mościckiego 14', '33-100', 'Tarnów', 8),
(242, 'NZOZ Polikmed', 'ul. Garncarska 1/7', '31-115', 'Kraków', 8),
(243, 'NZOZ CENTER MED. Sp. z o.o.', 'ul. Kazimierza Wielkiego 13', '32-700', 'Bochnia', 8),
(244, 'NZOZ Serce-Sercu', 'ul. Św. Bartłomieja Apostoła 21', '32031', 'Mogilany', 8),
(245, 'NZOZ Spectra Medical', 'ul. Bochenka 12', '30-693', 'Kraków ', 8),
(246, 'Zakład Rentgena i USG Wyrobek Sp.j.', 'ul. Smoleńsk 25a/2', '31-501', 'Kraków', 8),
(247, 'NZOZ CERTUS - CERTUS Sp. z o.o. ', 'ul. Drogowców 5', '32-400', 'Myślenice', 8),
(248, 'NZOZ OPTI-MED H. Kaczmarek', 'ul. Długosza 34', '33-300', 'Nowy Sącz', 8),
(249, 'Krakowski Szpital Specjalistyczny im. Jana Pawła II', 'ul. Prądnicka 80', '31-202', 'Kraków', 8),
(250, 'Miejsko-Gminne Centrum Medyczne  Wol-Med.Sp. z o.o.', 'ul. Skalska 22', '32-340', 'Wolbrom', 8),
(251, 'SP ZOZ w Brzesku', 'ul. Kościuszki 68', '32-800', 'Brzesko', 8),
(252, 'Szpital Wojewódzki im. św. Łukasza SP ZOZ', 'ul. Lwowska 178a', '33-100', 'Tarnów', 8),
(253, 'SCD-Z Medicina Sp. z o.o.', 'ul. Rogozińskiego 12', '31-559', 'Kraków', 8),
(254, 'ZOZ', 'ul. Szpitalna 1', '33-200', 'Dąbrowa Tarnowska', 8),
(255, 'Szpital Powiatowy', 'ul. Topolowa 16', '32-500', 'Chrzanów', 8),
(256, 'Centrum Medyczne Maszachaba', 'ul. Prądnicka 50a', '31-202', 'Kraków', 8),
(257, 'Mościckie Centrum Medyczne', 'ul. Kwiatkowskiego 15', '33-101', 'Tarnów', 8),
(258, 'ZZOZ Oświęcim', 'ul. Wysokie Brzegi 4', '32-600', 'Oświęcim', 8),
(259, 'Miejskie Centrum Medyczne', 'ul. 9-ego Maja 2', '32-590', 'Libiąż', 8),
(260, 'NZOZ Kraków-Południe', 'ul. Szwedzka 27', '30-315', 'Kraków', 8),
(261, 'NZOZ Szpit. na Siemiradzkiego', 'ul. Siemiradzkiego 1', '31-137', 'Kraków', 8),
(262, 'NZOZ Złota Jesień', 'os. Złota Jesień 3', '31-826', 'Kraków', 8),
(263, 'DIAGAMMED', 'ul. Wiślna 9/2', '31-007', 'Kraków', 8),
(264, 'NZOZ lek. med. S. Korpacki', 'ul. Piekarska 1', '38-300', 'Gorlice', 8),
(265, 'Samodzielny Szpital Wojewódzki im. M.Kopernika', 'ul. Rakowska 15', '97-300', 'Piotrków Trybunalski', 7),
(266, 'LUX-MED', 'ul. Milionowa 2G', '93-034', 'Łódź', 7),
(267, 'Wojewódzki Szpital Zespolony', 'ul. Sobieskiego 4', '96-100', 'Skierniewice', 7),
(268, 'WSS im. M. Kopernika', 'ul. Pabianicka 62', '93-513', 'Łódź', 7),
(269, 'CM MEDYCEUSZ ', 'ul. Bazarowa 9', '91-053', 'Łódź', 7),
(270, 'NZOZ Diagnostyka', 'ul. Kościuszki 52', '99-300', 'Kutno', 7),
(271, 'SP ZOZ Centralny Szpital Kliniczny UM w Łodzi', 'ul. Pomorska 251', '92-213', 'Łódź', 7),
(272, 'NZOZ Centrum Diagnostyki i Terapii Laserowej Politechniki Łódzkiej', 'ul. Wólczańska 215', '90-924', 'Łódź', 7),
(273, 'SALVE ZOZ Sp. z o.o.', 'ul. Andrzeja Struga 3', '90-420', 'Łódź', 7),
(274, 'ZOZ MSW', 'ul. Północna 42', '91-425', 'Łódź', 7),
(275, 'NZOZ MEDICA E. Sobkiewicz', 'ul. Szparagowa 10', '91-211', 'Łódź', 7),
(276, 'SALVE MEDICA S. Sobkiewicz', 'ul. Szparagowa 10', '91-211', 'Łódź', 7),
(277, 'Szpital Powiatowy w Radomsku', 'ul. Jagiellońska 36', '97-500', 'Radomsko', 7),
(278, 'SP ZOZ MSW', 'al. Wojska Polskiego 37', '10-228', 'Olsztyn', 16),
(279, 'Centrum Profilaktyki i Diagnostyki Piersi', 'ul. Żeromskiego 8A/2', '10-351', 'Olsztyn', 16),
(280, 'Wojewódzki Szpital Specjalistyczny', 'ul. Żołnierska 18', '10-561', 'Olsztyn', 16),
(281, 'Mazurskie Centrum Zdrowia ZOZ Pro-Medica', 'ul.Baranki 24', '19-300', 'Ełk', 16),
(282, 'Wojewódzki Szpital Zespolony', 'ul. Królewiecka 146', '82-300', 'Elbląg', 16),
(283, 'SPS ZOZ Szpital Miejski im.JPII', 'ul. Żeromskiego 22', '82-300', 'Elbląg ', 16),
(284, 'Usługi Medyczne Pracownia Mammografii  Konrad Zagórski', 'ul. Kosynierów Gdyńskich 51-53', '82-300', 'Elbląg', 16),
(285, 'Świętokrzyskie Centrum Onkologii', 'ul. Artwińskiego 3', '25-734', 'Kielce', 15),
(286, 'Świetokrzyskie Centrum Matki i Noworodka', 'ul. Prosta 30', '25-371', 'Kielce', 15),
(287, 'NZOZ Centrum Usług Medycznych PROMONT-MED.', 'ul. Chęcińska 40A', '25-020', 'Kielce', 15),
(288, 'NZOZ Diamed', 'ul. Paderewskiego 48/15a', '25-502', 'Kielce', 15),
(289, 'Centrum Onkologii Ziemi Lubelskiej', 'ul. Jaczewskiego 7', '20-090', 'Lublin', 5),
(290, 'Centrum Medyczne SANITAS', 'ul. Hampla 5', '20-008', 'Lublin', 5),
(291, '1 Szpital Wojskowy SP ZOZ', 'Al. Racławickie 23', '20-904', 'Lublin', 5),
(292, 'NZOZ ODR i USG', 'ul. Wróblewskiego 18', '24-100', 'Puławy', 5),
(293, '6 Szpital Wojskowy w Dęblinie', 'ul. Szpitalna 2', '08-530', 'Dęblin', 5),
(294, 'Centrum Medyczne Luxmed', 'ul. Radziwiłłowska 5', '20-080', 'Lublin', 5),
(295, 'NZOZ TOP-MED.', 'ul. Słowackiego 33', '22-100', 'Chełm', 5),
(296, 'TOP MEDICAL', 'ul. T. Zana 29/XIX', '20-601', 'Lublin', 5),
(297, 'Wojewódzki Ośrodek Med. Pracy', 'ul. Nałęczowska 27', '', 'Lublin', 5),
(298, 'Instytut Medycyny Wsi', 'ul. Jaczewskiego 2', '20-950', 'Lublin', 5),
(299, 'SP ZOZ Łuków', 'ul. Dr A. Rogalińskiego 3', '21-400', 'Łuków', 5),
(300, 'SP ZOZ w Puławach', 'ul. Bema 1', '24-100', 'Puławy', 5),
(301, 'SP ZOZ w Kraśniku', 'ul. Chopina 13', '', 'Kraśnik', 5),
(302, 'NZOZ MARMED', 'ul. Jarzębinowa 4', '21-040', 'Świdnik', 5),
(303, 'Wojewódzki Szpital Specjalist.', 'Al. Kraśnicka 100', '20-718', 'Lublin', 5),
(304, 'SP Szpital Wojewódzki im. Jana Pawła II', 'Al. Jana Pawła II 10', '22-400', 'Zamość', 5),
(305, 'Wojewódzki Szpital Specjalistyczny', 'ul. Terebelska 57/65', '21-500', 'Biała Podlaska', 5),
(306, 'CM INTERNUS Sp. z o.o.', 'ul. Gen.Fieldorfa NILA 10', '24-100', 'Puławy', 5),
(307, 'NZOZ MegaMed', 'ul. Czapliniecka 93/95', '97-400', 'Bełchatów', 7),
(308, 'Uniwersytecki Szpital Kliniczny', 'ul. M.Skłodowskiej - Curie 24a', '15-276', 'Białystok', 12),
(309, 'Szpital w Blachowni Prywatna Przychodnia Lekarska', 'ul. Sosnowa 16', '42-290', 'Blachownia', 14),
(310, 'ELMED', 'ul. Karłowicza 3/5', '85-092', 'Bydgoszcz', 2),
(311, 'Specjalistyczny Szpital Wojewódzki ', 'ul. Powstańców Wielkopolskich 2', '06-400', 'Ciechanów', 9),
(312, 'Centrum Medyczne Małgorzata', 'ul. Mirowska 15', '42-200', 'Częstochowa', 14),
(313, 'Wojewódzki Szpital Specjalistyczny im.NMP', 'ul. PCK 1', '42-200', 'Częstochowa', 14),
(314, 'SPZOZ w Człuchowie', 'ul. Szczecińska 31', '77-300', 'Człuchów', 13),
(315, 'FADO NZOZ', 'Al. Zwycięstwa 49', '80-207', 'Gdańsk', 13),
(316, 'NZOZ Poliklinika Onkologiczna', 'Al. Zwycięstwa 31/32', '80-219', 'Gdańsk', 13),
(317, 'NZOZ GOMED', 'ul. Uzdrowiskowa 54', '43-230', 'Goczałkowice Zdrój', 14),
(318, 'NZOZ ARTMA', 'ul. Piłsudskiego 1a/207', '66-400', 'Gorzów Wielkopolski', 6),
(319, 'SP ZOZ ', 'ul. Piłsudskiego 11', '22-500', 'Hrubieszów ', 5),
(320, 'NZOZ Centrum Medyczne FEMINA', 'ul. Graniczna 45', '40-045', 'Katowice', 14),
(321, 'NZOZ Luks Med.', 'ul. Ligocka 3a', '40-570', 'Katowice', 14),
(322, 'ZOZ w Ostrowcu Świętokrzyskim', 'ul. Szymanowskiego 11', '25-371', 'Kielce', 15),
(323, 'CM Nowa Huta Ujastek', 'ul. Ujastek 3', '30-969', 'Kraków', 8),
(324, 'SCDZ MEDICINA Sp. z o.o.', 'ul. Barska 12', '31-560', 'Kraków ', 8),
(325, 'Wojewódzki Szpital Podkarpacki im. J P II', 'ul. Korczyńska 57', '38-400', 'Krosno', 11),
(326, 'NZOZ NOVA-MED. M. Maćków', 'ul. Struga 28', '59-220', 'Legnica', 1),
(327, 'SP ZOZ', 'ul. Leśna 22', '37-300', 'Leżajsk', 11),
(328, 'SP Szpital Kliniczny', 'ul. Staszica 16', '20-080', 'Lublin', 5),
(329, 'SP ZZOZ ', 'ul. Kościuszki 1', '37-400', 'Nisko', 11),
(330, 'SZP ZOZ', 'ul. Miodowa 2', '05-100', 'Nowy Dwór Maz.', 9),
(331, 'SZP ZOZ im. J. Psarskiego', 'Al. Jana Pawła II 120 A', '07-410', 'Ostrołęka', 9),
(332, '111 Szpital Wojskowy SPZOZ', 'ul. Grunwaldzka 16/18', '60-780', 'Poznań', 17),
(333, 'Centrum Św. Jerzego', 'ul. Jasielska 14', '', 'Poznań', 17),
(334, 'Szpital Regionalny im. J. Rostka', 'ul. Gamowska 3', '47-400', 'Racibórz', 14),
(335, 'Centrum Medyczne Medicor', 'ul. Jabłońskiego 24', '35-068', 'Rzeszów', 11),
(336, 'NZOZ Pro-Sana', 'ul. Topolowa 16', '', 'Skarbimierz-Osiedle', 10),
(337, 'NZOZ Serce Sercu', 'ul. Tyniecka 15', '32-050', 'Skawina', 8),
(338, 'NSZOZ ALFA s.c.', 'ul. Sikorskiego 1', '62-400', 'Słupca', 17),
(339, 'MEDPHARMA ZOZ', 'Al. Jana Pawła II 4/5', '83-200', 'Starogard Gdański', 13),
(340, 'ZOZ', 'ul. Szpitalna 22', '34-200', 'Sucha Beskidzka', 8),
(341, 'NZOZ Prywatna Specjalistyczna Przychodnia', 'ul. Koniuchy 15/5', '87-100', 'Toruń', 2),
(342, 'NZOZ Szpital Powiatowy', 'ul. Nowodworskiego 14/18', '89-500', 'Tuchola', 2),
(343, 'Szpital Specjalistyczny im. F. Ceynowy', 'ul. Dr A. Jagalskiego 10', '84-200', 'Wejherowo', 13),
(344, 'NZOZ  Stacja Opieki, Centrum Pielęgniarstwa Rodzinnego, Rehabilitacji, Opieki Paliatywnej Caritas Archidiecezji Wrocławskiej', 'ul. Katedralna 7', '50-328', 'Wrocław', 1),
(345, 'ONKOMED Specjalistyczna Przychodnia Lekarska Marek Bębenek', 'ul. Ślężna 169', '53-110', 'Wrocław', 1),
(346, 'Wojewódzki Szpital Specjalistyczny', 'ul. Kamińskiego 73a', '51-124', 'Wrocław', 1),
(347, 'Centrum Usług Medycznych SONOLOGISTIC', 'ul. Kilińskiego 75', '22-400', 'Zamość', 5),
(348, 'Wielospecjalistyczny Szpital SP ZOZ', 'ul. Lubańska 11-12', '59-900', 'Zgorzelec', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nazwa_roli` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `role`
--

INSERT INTO `role` (`id`, `nazwa_roli`) VALUES
(1, 'Administrator'),
(2, 'Audytor');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_konta`
--

CREATE TABLE IF NOT EXISTS `status_konta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nazwa_statusu` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `status_konta`
--

INSERT INTO `status_konta` (`id`, `nazwa_statusu`) VALUES
(1, 'Aktywne'),
(2, 'Zablokowane');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `imie` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `RoleID` int(10) NOT NULL,
  `data_logowania` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_kontaID` int(1) NOT NULL DEFAULT '1',
  `WojewodztwaID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKuzytkownic197616` (`WojewodztwaID`),
  KEY `FKuzytkownic845278` (`RoleID`),
  KEY `FKuzytkownic348025` (`status_kontaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=27 ;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `username`, `password`, `email`, `telefon`, `RoleID`, `data_logowania`, `status_kontaID`, `WojewodztwaID`) VALUES
(1, 'Mirek', 'Grabowski', 'mgrabowski', 'c2c0b7a912125d46edd153cf7c6d005c', 'seka44@gmail.com', '', 1, '2014-05-24 00:58:50', 1, 1),
(2, 'Krzysztof', 'Skorubski', 'kskorubski', 'c2c0b7a912125d46edd153cf7c6d005c', 'krzysztof.skorubski@gmail.com', '696063761', 1, '2014-06-12 16:37:59', 1, 1),
(3, 'Adam', 'Kowalskia', 'akowalski', '202cb962ac59075b964b07152d234b70', 'adam.kowalskai@www.pl', '123123123', 2, '2014-06-12 16:20:17', 1, 18),
(4, 'Ewa', 'Kowalska', 'ekowalska', 'c2c0b7a912125d46edd153cf7c6d005c', 'ewa.kowalska@www.pl', '234123456', 2, '2014-07-24 19:37:49', 1, 16),
(5, 'Ewa', 'Dziewulska', 'edzia', 'c2c0b7a912125d46edd153cf7c6d005c', 'popraw@email.pl', NULL, 2, '2014-07-29 17:01:46', 1, 19),
(6, 'Piotr', 'Ksprzak', 'pkasprzak', '242324531998ae728d724409568cc213', 'popraw@email.pl', NULL, 2, '2014-05-23 17:45:49', 1, 19),
(7, 'Elżbieta', 'Łuczyńska', 'eluczynska', '80e899f45b8805944598470288214eac', 'popraw@email.pl', NULL, 2, '2014-05-23 17:46:01', 1, 19),
(9, 'Małgorzata', 'Stusińska', 'mstusinska', '1a5c1b3fb3d510eabd6c10cb5f9a6d4c', 'popraw@email.com', NULL, 2, '2014-05-23 17:49:57', 1, 19),
(10, 'Katarzyna', 'Wardzyńska', 'kwardzynska', '26c628f75b4cd591eeb05a091273d497', 'popraw@email.pl', NULL, 2, '2014-05-23 17:50:18', 1, 19),
(11, 'Ewa', 'Wesołowska', 'ewesolowska', 'a60a2650d6c58815b362794ba00cf557', 'popraw@email.pl', NULL, 2, '2014-05-23 17:50:33', 1, 19),
(12, 'Iwona', 'Żelazowska - Cieślińska', 'icieslinska', '24acd71178c3414c29cdc79e197613ab', 'iwona.z.c@gmail.com', '510123456', 2, '2014-06-19 21:52:26', 1, 17),
(13, 'Elżbieta', 'Kopacz', 'ekopacz', '80e899f45b8805944598470288214eac', 'popraw@email.pl', NULL, 2, '2014-07-25 07:50:56', 1, 19),
(14, 'Marek', 'Warcz', 'mwarcz', '26c628f75b4cd591eeb05a091273d497', 'popraw@email.pl', NULL, 2, '2014-05-23 17:50:18', 1, 19),
(15, 'Katarzyna', 'Wesołowska', 'Kwesolowska', 'a60a2650d6c58815b362794ba00cf557', 'popraw@email.pl', NULL, 2, '2014-05-23 17:50:33', 1, 19),
(16, 'Piotr', 'Sawczak', 'psawczak', 'a8f5f167f44f4964e6c998dee827110c', 'popraw@email.pl', NULL, 2, '2014-05-23 17:45:49', 1, 19),
(17, 'Marta', 'Toczyłowska', 'mtoczylowska', 'a4eaf4e4814d8270c136ba9222bb2bb7', 'marta.toczylowska@coi.pl', NULL, 1, '2014-07-25 11:13:49', 1, 19),
(18, 'Kinga', 'Miłosz', 'kmilosz', '3be10dc6f3566b5abff064f226676148', 'kinga.milosz@coi.pl', NULL, 1, '2014-07-25 11:58:18', 1, 19),
(19, 'asd1', 'asd1', 'asd1', '040b7cf4a55014e185813e0644502ea9', 'asd', '1234', 1, '2014-08-07 21:53:48', 1, 10),
(20, 'Agata', 'Drał', 'adural', 'c4d9c32fe9e467ebaa1461c53d73eb96', 'asd@wp.pl', '123123123', 1, '2014-08-07 21:55:52', 2, 1),
(21, 'Asd', 'Assff', 'asdfg', '7cbb3252ba6b7e9c422fac5334d22054', '12', '789123123', 1, '2014-08-07 21:57:49', 1, 1),
(22, 'Henryk', 'Kawa', 'heniek', 'e9e1406aeb5e3ad4546e23572b98712f', 'h@dd.pl', '123123123', 2, '2014-08-10 21:41:15', 1, 18),
(23, 'Adam', 'Zieliński', 'adam', '7815696ecbf1c96e6894b779456d330e', 'asd@asd.pl', '123123123', 2, '2014-08-13 15:02:50', 1, 1),
(24, 'Barbara', 'Butt', 'basia', '7815696ecbf1c96e6894b779456d330e', 'a@wsp.pl', '123123123', 1, '2014-08-14 02:03:18', 1, 14),
(25, 'Arkadiusz', 'Orlikas2', 'arek3', '912ec803b2ce49e4a541068d495ab570', 'a@wp.pl', '123123123', 1, '2014-08-14 02:10:01', 1, 1),
(26, 'Adwarl', 'Rutkowski2', 'adrkia', '7815696ecbf1c96e6894b779456d330e', '123a@wp.pl', '889217659', 2, '2014-08-26 05:19:24', 1, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy_zespoly_audytorow`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy_zespoly_audytorow` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `UzytkownicyID` int(10) NOT NULL,
  `Zespoly_audytorowID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `FKuzytkownic93903` (`UzytkownicyID`),
  KEY `FKuzytkownic198106` (`Zespoly_audytorowID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=322 ;

--
-- Zrzut danych tabeli `uzytkownicy_zespoly_audytorow`
--

INSERT INTO `uzytkownicy_zespoly_audytorow` (`id`, `UzytkownicyID`, `Zespoly_audytorowID`) VALUES
(178, 10, 66),
(179, 9, 66),
(200, 6, 12),
(211, 14, 68),
(212, 15, 68),
(213, 16, 68),
(215, 4, 67),
(217, 3, 66),
(218, 4, 65),
(219, 5, 65),
(220, 6, 65),
(228, 3, 68),
(235, 4, 68),
(236, 5, 68),
(237, 6, 68),
(238, 7, 68),
(246, 14, 67),
(252, 5, 64),
(255, 9, 64),
(259, 3, 65),
(260, 7, 65),
(262, 9, 65),
(263, 10, 65),
(264, 11, 65),
(265, 12, 65),
(266, 13, 65),
(270, 7, 12),
(271, 3, 67),
(272, 15, 67),
(273, 3, 63),
(274, 4, 63),
(275, 5, 63),
(276, 6, 63),
(277, 7, 63),
(278, 9, 63),
(279, 10, 63),
(280, 11, 63),
(284, 7, 64),
(285, 14, 5),
(286, 15, 5),
(287, 16, 5),
(288, 3, 5),
(289, 4, 5),
(290, 3, 49),
(291, 5, 49),
(292, 6, 49),
(293, 7, 49),
(294, 9, 49),
(295, 10, 49),
(296, 4, 66),
(297, 6, 66),
(298, 11, 66),
(299, 13, 66),
(300, 5, 66),
(301, 12, 66),
(304, 3, 71),
(307, 22, 12),
(308, 22, 71),
(310, 22, 41),
(312, 9, 70),
(313, 12, 70),
(314, 4, 70),
(315, 23, 71),
(316, 22, 70),
(318, 23, 68),
(319, 26, 68),
(320, 23, 74),
(321, 12, 74);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wojewodztwa`
--

CREATE TABLE IF NOT EXISTS `wojewodztwa` (
  `id_wojewodztwa` int(10) NOT NULL AUTO_INCREMENT,
  `nazwa_wojewodztwa` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_wojewodztwa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=20 ;

--
-- Zrzut danych tabeli `wojewodztwa`
--

INSERT INTO `wojewodztwa` (`id_wojewodztwa`, `nazwa_wojewodztwa`) VALUES
(1, 'dolnośląskie'),
(2, 'kujawsko-pomorskie'),
(5, 'lubelskie'),
(6, 'lubuskie'),
(7, 'łódzkie'),
(8, 'małopolskie'),
(9, 'mazowieckie'),
(10, 'opolskie'),
(11, 'podkarpackie'),
(12, 'podlaskie'),
(13, 'pomorskie'),
(14, 'śląskie'),
(15, 'świętokrzyskie'),
(16, 'warmińsko-mazurskie'),
(17, 'wielkopolskie'),
(18, 'zachodniopomorskie'),
(19, 'domyślne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zespoly_audytorow`
--

CREATE TABLE IF NOT EXISTS `zespoly_audytorow` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nazwa_zespolu` varchar(50) COLLATE utf8_polish_ci NOT NULL COMMENT 'dobrze by bylo zrobic constraina uniemozliwiajacego wpisanie dwoch takich samych rekordow tzn rok ten sam i nazwa zespolu ta sama - nazwa zespolu moze byc ta sama w innym roku',
  `rok_audytu` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=75 ;

--
-- Zrzut danych tabeli `zespoly_audytorow`
--

INSERT INTO `zespoly_audytorow` (`id`, `nazwa_zespolu`, `rok_audytu`) VALUES
(2, 'Zespol nr_1', 2014),
(5, 'nr5', 2014),
(12, 'Grupanr4', 2014),
(41, 'ABCD', 2014),
(49, 'TacyMali', 2014),
(63, 'Z_czerwony', 2014),
(64, 'OniSami', 2014),
(65, 'HelloKitty', 2014),
(66, 'ZwZesp', 2014),
(67, 'PGrupa', 2014),
(68, 'Grupa_123A', 2014),
(70, 'zespół nr 1', 2014),
(71, 'zes02', 2014),
(74, 'bzzz987', 2014);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ankieta_analogowa`
--
ALTER TABLE `ankieta_analogowa`
  ADD CONSTRAINT `FKankieta_an613537` FOREIGN KEY (`AudytyID`) REFERENCES `audyty` (`id`);

--
-- Ograniczenia dla tabeli `ankieta_cyfrowa`
--
ALTER TABLE `ankieta_cyfrowa`
  ADD CONSTRAINT `FKankieta_cy912534` FOREIGN KEY (`AudytyID`) REFERENCES `audyty` (`id`);

--
-- Ograniczenia dla tabeli `audyty`
--
ALTER TABLE `audyty`
  ADD CONSTRAINT `FKaudyty31726` FOREIGN KEY (`osrodek_id`) REFERENCES `osrodki` (`id`),
  ADD CONSTRAINT `FKaudyty396685` FOREIGN KEY (`Zespoly_audytorowID`) REFERENCES `zespoly_audytorow` (`id`),
  ADD CONSTRAINT `FKaudyty558593` FOREIGN KEY (`metodaID`) REFERENCES `metoda` (`id`);

--
-- Ograniczenia dla tabeli `etykieta_analogowa`
--
ALTER TABLE `etykieta_analogowa`
  ADD CONSTRAINT `FKetykieta_a466726` FOREIGN KEY (`AudytyID`) REFERENCES `audyty` (`id`);

--
-- Ograniczenia dla tabeli `etykieta_cyfrowa`
--
ALTER TABLE `etykieta_cyfrowa`
  ADD CONSTRAINT `FKetykieta_c898781` FOREIGN KEY (`AudytyID`) REFERENCES `audyty` (`id`);

--
-- Ograniczenia dla tabeli `identyfikatory_wojewodztw`
--
ALTER TABLE `identyfikatory_wojewodztw`
  ADD CONSTRAINT `FKIdentyfika74319` FOREIGN KEY (`WojewodztwaID`) REFERENCES `wojewodztwa` (`id_wojewodztwa`);

--
-- Ograniczenia dla tabeli `osrodki`
--
ALTER TABLE `osrodki`
  ADD CONSTRAINT `FKosrodki619647` FOREIGN KEY (`WojewodztwaID`) REFERENCES `wojewodztwa` (`id_wojewodztwa`);

--
-- Ograniczenia dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD CONSTRAINT `FKuzytkownic197616` FOREIGN KEY (`WojewodztwaID`) REFERENCES `wojewodztwa` (`id_wojewodztwa`),
  ADD CONSTRAINT `FKuzytkownic348025` FOREIGN KEY (`status_kontaID`) REFERENCES `status_konta` (`id`),
  ADD CONSTRAINT `FKuzytkownic845278` FOREIGN KEY (`RoleID`) REFERENCES `role` (`id`);

--
-- Ograniczenia dla tabeli `uzytkownicy_zespoly_audytorow`
--
ALTER TABLE `uzytkownicy_zespoly_audytorow`
  ADD CONSTRAINT `FKuzytkownic198106` FOREIGN KEY (`Zespoly_audytorowID`) REFERENCES `zespoly_audytorow` (`id`),
  ADD CONSTRAINT `FKuzytkownic93903` FOREIGN KEY (`UzytkownicyID`) REFERENCES `uzytkownicy` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
