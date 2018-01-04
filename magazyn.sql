-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: 192.168.101.134
-- Czas wygenerowania: 04 Sty 2018, 22:42
-- Wersja serwera: 5.6.36-82.1-log
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `kazik123_magazyn`
--
CREATE DATABASE IF NOT EXISTS `kazik123_magazyn` DEFAULT CHARACTER SET latin2 COLLATE latin2_general_ci;
USE `kazik123_magazyn`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `belt`
--

DROP TABLE IF EXISTS `belt`;
CREATE TABLE IF NOT EXISTS `belt` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `length` int(20) NOT NULL,
  `width` int(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `belt`
--

INSERT INTO `belt` (`id`, `length`, `width`, `type`) VALUES
(1, 444, 300, 'gg50'),
(2, 658, 900, 'cp56');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `adres` varchar(30) NOT NULL,
  `note` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `client`
--

INSERT INTO `client` (`id`, `name`, `adres`, `note`) VALUES
(1, 'tomek44777', 'kazik', '123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `user` int(7) NOT NULL,
  `belt` int(7) NOT NULL,
  `client` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `transaction`
--

INSERT INTO `transaction` (`id`, `user`, `belt`, `client`) VALUES
(1, 2, 3, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `access` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `pass`, `access`) VALUES
(2, 'tomek', 'pass2', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
