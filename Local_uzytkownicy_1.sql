-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 03 Wrz 2014, 07:47
-- Wersja serwera: 5.5.32
-- Wersja PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=41 ;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `username`, `password`, `email`, `telefon`, `RoleID`, `data_logowania`, `status_kontaID`, `WojewodztwaID`) VALUES
(1, 'Mirek', 'Grabowski', 'mgrabowski', 'c2c0b7a912125d46edd153cf7c6d005c', 'seka44@gmail.com', '', 1, '2014-05-24 00:58:50', 1, 1),
(2, 'Krzysztof', 'Skorubski', 'kskorubski', 'c2c0b7a912125d46edd153cf7c6d005c', 'krzysztof.skorubski@gmail.com', '696063761', 1, '2014-06-12 16:37:59', 1, 1),
(17, 'Marta', 'Toczyłowska', 'mtoczylowska', 'a4eaf4e4814d8270c136ba9222bb2bb7', 'marta.toczylowska@coi.pl', NULL, 1, '2014-07-25 11:13:49', 1, 19),
(18, 'Kinga', 'Miłosz', 'kmilosz', '3be10dc6f3566b5abff064f226676148', 'kinga.milosz@coi.pl', NULL, 1, '2014-07-25 11:58:18', 1, 19),
(22, 'Henryk', 'Kawa', 'heniek', 'e9e1406aeb5e3ad4546e23572b98712f', 'h@dd.pl', '123123123', 2, '2014-08-10 21:41:15', 1, 18),
(27, 'Beata', 'Brzęk-Pilarska', 'bpilarska', '01029017d20d2ef62a6c05730bc0b2b2', 'bpilarska@email.com', '', 2, '2014-09-02 14:22:08', 1, 19),
(28, 'Ewa', 'Dziewulska', 'edziewulska', '99b1ccba265a5c8a6e400a64dc03a825', 'edziewulska@email.co', '', 2, '2014-09-02 14:22:58', 1, 19),
(29, 'Jan', 'Hliniak', 'jhliniak', '623e976011d9b277fe0444e46635d091', 'jhliniak@email.com', '', 2, '2014-09-02 14:23:56', 1, 19),
(30, 'Piotr', 'Kasprzak', 'pkasprzak', '114380237fd9abd4894afcc7db4f41b7', 'pkasprzak@email.com', '', 2, '2014-09-02 14:27:06', 1, 19),
(31, 'Krzysztof', 'Lamh', 'klamh', '07edd374b184fea8a2422e869f19e2c0', 'klamh@email.com', '', 2, '2014-09-02 14:27:45', 1, 19),
(32, 'Elżbieta', 'Łuczyńska', 'eluczynska', '56f2f20f4754c9a7459f3dbe3293a0d9', 'eluczynska@email.com', '', 2, '2014-09-02 14:28:37', 1, 19),
(33, 'Jacek', 'Nowicki', 'jnowicki', 'c213b214cec636d6e4bf2061b5ce3030', 'jnowicki@email.com', '', 2, '2014-09-02 14:29:17', 1, 19),
(34, 'Tadeusz', 'Popiela', 'tpopiela', '16cfda6c4f0ce947ae5e2aa04bb8f1fc', 'tpopiela@email.com', '', 2, '2014-09-02 14:29:59', 1, 19),
(35, 'Tomasz', 'Schreiber', 'tshreiber', '66f8ad0197ea3c790f2be2c61dcca7ab', 'tshreiber@email.com', '', 2, '2014-09-02 14:30:41', 1, 19),
(36, 'Małgorzata', 'Stusińska', 'mstusinska', 'bf3664be0c029ce4dca53699a10d3fc9', 'mstusinska@email.com', '', 2, '2014-09-02 14:31:33', 1, 19),
(37, 'Katarzyna', 'Wardzyńska', 'kwardzynska', 'e3b4d5886fe70e0dccf20558107e2c5d', 'kwardzynska@email.ci', '', 2, '2014-09-02 14:32:24', 1, 19),
(38, 'Ewa', 'Wesołowska', 'ewesolowska', '48f324a90009210f0e3dcbd4002699f5', 'ewesolowska@email.ci', '', 2, '2014-09-02 14:33:28', 1, 19),
(39, 'Grażyna', 'Wilk', 'gwilk', '0d346610bb5b68f008f05663cffa8869', 'gwilk@email.com', '', 2, '2014-09-02 14:33:56', 1, 19),
(40, 'Iwona', 'Żelazowska-Cieślińsk', 'icieslinska', 'f11f20e65c96a5ced78b9f607bad85f6', 'icieslinska@email.ci', '', 2, '2014-09-02 14:34:47', 1, 19);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD CONSTRAINT `FKuzytkownic197616` FOREIGN KEY (`WojewodztwaID`) REFERENCES `wojewodztwa` (`id_wojewodztwa`),
  ADD CONSTRAINT `FKuzytkownic348025` FOREIGN KEY (`status_kontaID`) REFERENCES `status_konta` (`id`),
  ADD CONSTRAINT `FKuzytkownic845278` FOREIGN KEY (`RoleID`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
