-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Dic 01, 2018 alle 01:28
-- Versione del server: 10.1.37-MariaDB-0+deb9u1
-- Versione PHP: 7.0.30-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blueh_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cabin`
--

CREATE TABLE `cabin` (
  `id` int(6) NOT NULL,
  `seats` int(2) NOT NULL,
  `class` enum('Standard','Deluxe','SpaceClub') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `images`
--

CREATE TABLE `images` (
  `path` varchar(30) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `id` int(6) NOT NULL,
  `id_user` int(6) UNSIGNED NOT NULL,
  `id_travel` int(6) UNSIGNED NOT NULL,
  `id_rc` int(6) NOT NULL,
  `number_of_seat` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `rockets`
--

CREATE TABLE `rockets` (
  `id` int(6) UNSIGNED NOT NULL,
  `model` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `rocket_cabin`
--

CREATE TABLE `rocket_cabin` (
  `id` int(6) NOT NULL,
  `id_rocket` int(6) UNSIGNED NOT NULL,
  `id_cabin` int(6) NOT NULL,
  `number_of_cabin` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `rocket_travel`
--

CREATE TABLE `rocket_travel` (
  `id_travel` int(6) UNSIGNED NOT NULL,
  `id_rocket` int(6) UNSIGNED NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `rocket_travel`
--

INSERT INTO `rocket_travel` (`id_travel`, `id_rocket`, `date`) VALUES
(1, 1, '1975-01-21'),
(2, 2, '1977-08-16'),
(3, 3, '1978-08-09'),
(4, 1, '1983-06-07'),
(5, 2, '1984-04-27'),
(6, 3, '1990-03-18'),
(7, 1, '1994-04-14'),
(8, 2, '2004-01-27'),
(9, 3, '2004-12-31'),
(10, 1, '2008-12-05');

-- --------------------------------------------------------

--
-- Struttura della tabella `travels`
--

CREATE TABLE `travels` (
  `id` int(6) UNSIGNED NOT NULL,
  `departure` varchar(30) NOT NULL,
  `arrival` varchar(30) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `travels`
--

INSERT INTO `travels` (`id`, `departure`, `arrival`, `date`) VALUES
(1, ' Pluto', ' Mars', '1983-06-07'),
(2, 'Cape Canaveral', ' Moon', '2004-12-31'),
(3, 'Cape Canaveral', ' Pluto', '1994-04-14'),
(4, ' Mars', ' Mars', '2004-01-27'),
(5, 'Cape Canaveral', ' Pluto', '1975-01-21'),
(6, ' Pluto', ' Mars', '1978-08-09'),
(7, ' Moon', ' Moon', '1977-08-16'),
(8, 'Cape Canaveral', ' Mars', '1990-03-18'),
(9, ' Moon', ' Mars', '1984-04-27'),
(10, 'Cape Canaveral', ' Pluto', '2008-12-05');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `sex` enum('M','F','N.D.') NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` char(64) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `sex`, `email`, `password`, `username`) VALUES
(11, 'admin', 'admin', 'N.D.', 'admin@bluehorizon.com', '879f17afda4a4620870ddd4cb9d665255b46054e4a4297f577d193da17cb7520', 'admin');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cabin`
--
ALTER TABLE `cabin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seats` (`seats`,`class`);

--
-- Indici per le tabelle `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`path`,`name`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rc` (`id_rc`),
  ADD KEY `id_travel` (`id_travel`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `rockets`
--
ALTER TABLE `rockets`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `rocket_cabin`
--
ALTER TABLE `rocket_cabin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_rocket` (`id_rocket`,`id_cabin`),
  ADD KEY `id_cabin` (`id_cabin`);

--
-- Indici per le tabelle `rocket_travel`
--
ALTER TABLE `rocket_travel`
  ADD PRIMARY KEY (`id_travel`,`id_rocket`,`date`),
  ADD KEY `id_rocket` (`id_rocket`);

--
-- Indici per le tabelle `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`email`,`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cabin`
--
ALTER TABLE `cabin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `rockets`
--
ALTER TABLE `rockets`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `rocket_cabin`
--
ALTER TABLE `rocket_cabin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `travels`
--
ALTER TABLE `travels`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_rc`) REFERENCES `rocket_cabin` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_travel`) REFERENCES `travels` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `rocket_cabin`
--
ALTER TABLE `rocket_cabin`
  ADD CONSTRAINT `rocket_cabin_ibfk_1` FOREIGN KEY (`id_rocket`) REFERENCES `rockets` (`id`),
  ADD CONSTRAINT `rocket_cabin_ibfk_2` FOREIGN KEY (`id_cabin`) REFERENCES `cabin` (`id`);

--
-- Limiti per la tabella `rocket_travel`
--
ALTER TABLE `rocket_travel`
  ADD CONSTRAINT `rocket_travel_ibfk_1` FOREIGN KEY (`id_travel`) REFERENCES `travels` (`id`),
  ADD CONSTRAINT `rocket_travel_ibfk_2` FOREIGN KEY (`id_rocket`) REFERENCES `rockets` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
