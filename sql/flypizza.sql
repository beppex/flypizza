-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mag 23, 2014 alle 18:58
-- Versione del server: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flypizza`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nominativo` varchar(20) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nominativo`, `telefono`, `email`) VALUES
(1, 'sacco', '888888888', 'pasqsac@yahoo.it'),
(2, 'rossi', '55555555', 'rossi@email.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE IF NOT EXISTS `ordine` (
  `idordine` int(11) NOT NULL AUTO_INCREMENT,
  `numerocivico` smallint(6) NOT NULL,
  `citofono` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `indirizzo` varchar(20) NOT NULL,
  `orario` varchar(15) NOT NULL,
  `idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idordine`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`idordine`, `numerocivico`, `citofono`, `timestamp`, `indirizzo`, `orario`, `idcliente`) VALUES
(1, 20, 'sacco', '2014-05-23 13:51:07', 'via del levriere', '8:00 - 8:15', 1),
(2, 15, 'rossi', '2014-05-23 13:51:07', 'via dante', '8:30 - 8: 45', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordinepizza`
--

CREATE TABLE IF NOT EXISTS `ordinepizza` (
  `idordinepizza` int(11) NOT NULL AUTO_INCREMENT,
  `idordine` int(11) NOT NULL,
  `idpizza` int(11) NOT NULL,
  `prezzoordine` float NOT NULL,
  `note` varchar(30) NOT NULL,
  PRIMARY KEY (`idordinepizza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `pizza`
--

CREATE TABLE IF NOT EXISTS `pizza` (
  `idpizza` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(10) NOT NULL,
  `note` varchar(20) DEFAULT NULL,
  `ingredienti` varchar(50) NOT NULL,
  `prezzopizza` float NOT NULL,
  PRIMARY KEY (`idpizza`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `pizza`
--

INSERT INTO `pizza` (`idpizza`, `nome`, `note`, `ingredienti`, `prezzopizza`) VALUES
(1, 'margherita', '0', 'provaprovaprovaprova', 4.3),
(2, 'romana', '0', 'provaprovaprova', 5),
(3, 'margherita', NULL, 'provaprovaprovaprova', 4.3),
(4, 'romana', NULL, 'provaprovaprova', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
