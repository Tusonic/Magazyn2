-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: 192.168.101.134
-- Czas wygenerowania: 31 Mar 2018, 15:50
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `belt`
--

CREATE TABLE IF NOT EXISTS `belt` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `length` int(20) NOT NULL,
  `width` int(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `available` int(1) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `adres` varchar(30) NOT NULL,
  `note` varchar(50) NOT NULL,
  `flag` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `user` int(7) NOT NULL,
  `belt` int(7) NOT NULL,
  `client` int(7) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=84 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `access` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=17 ;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `pass`, `access`) VALUES
(13, '1', '1', 1),
(15, '2', '2', 2),
(16, '3', '3', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
