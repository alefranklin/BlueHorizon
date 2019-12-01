-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 14, 2019 alle 17:05
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_blueh_db`
--

DELIMITER $$
--
-- Funzioni
--
CREATE DEFINER=`root`@`localhost` FUNCTION `priceCalc` (`adults` INT, `kids` INT, `cabin` INT, `duration` INT) RETURNS INT(11) BEGIN
DECLARE day_adult INT;
DECLARE day_kid INT;
DECLARE total INT;
SELECT adult_price INTO day_adult FROM cabins WHERE id = cabin;
SELECT kid_price INTO day_kid FROM cabins WHERE id = cabin;
SET total = ((day_adult*adults)+(day_kid*kids))*duration;
RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `cabins`
--

CREATE TABLE `cabins` (
  `id` int(11) NOT NULL,
  `class` set('standard','deluxe','space_club','') NOT NULL,
  `adult_price` int(11) NOT NULL,
  `kid_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cabins`
--

INSERT INTO `cabins` (`id`, `class`, `adult_price`, `kid_price`) VALUES
(1, 'standard', 50, 25),
(2, 'deluxe', 70, 35),
(3, 'space_club', 100, 50);

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_travel` int(11) NOT NULL,
  `id_cabin` int(11) NOT NULL,
  `adults_number` int(11) NOT NULL,
  `kids_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `id_travel`, `id_cabin`, `adults_number`, `kids_number`) VALUES
(1, 1, 2, 1, 1, 2),
(2, 1, 2, 1, 1, 2);

--
-- Trigger `orders`
--
DELIMITER $$
CREATE TRIGGER `after_order_insert` AFTER INSERT ON `orders` FOR EACH ROW BEGIN
DECLARE cabins_left_number INT;
select cabins_left into cabins_left_number from travel_cabin where id_travel = new.id_travel and id_cabin = new.id_cabin;
set cabins_left_number = cabins_left_number - 1;
UPDATE travel_cabin set cabins_left = cabins_left_number where id_travel = new.id_travel and id_cabin = new.id_cabin;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `planets`
--

CREATE TABLE `planets` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `planets`
--

INSERT INTO `planets` (`id`, `name`) VALUES
(2, 'Giove'),
(1, 'Marte'),
(3, 'Mercurio');

-- --------------------------------------------------------

--
-- Struttura della tabella `rockets`
--

CREATE TABLE `rockets` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `rockets`
--

INSERT INTO `rockets` (`id`, `name`) VALUES
(1, 'Razzottoo');

-- --------------------------------------------------------

--
-- Struttura della tabella `rocket_cabin`
--

CREATE TABLE `rocket_cabin` (
  `id_cabin` int(11) NOT NULL,
  `id_rocket` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `rocket_cabin`
--

INSERT INTO `rocket_cabin` (`id_cabin`, `id_rocket`, `number`) VALUES
(1, 1, 5),
(2, 1, 10),
(3, 1, 15),
(1, 1, 5),
(2, 1, 10),
(3, 1, 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `travels`
--

CREATE TABLE `travels` (
  `id` int(11) NOT NULL,
  `id_rocket` int(11) NOT NULL,
  `id_planet` int(11) NOT NULL,
  `departure_date` date NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `travels`
--

INSERT INTO `travels` (`id`, `id_rocket`, `id_planet`, `departure_date`, `duration`) VALUES
(2, 1, 1, '2019-05-24', 7),
(3, 1, 2, '2019-06-05', 7),
(4, 1, 1, '2019-06-07', 7),
(5, 1, 2, '2019-07-24', 7),
(6, 1, 1, '2019-08-01', 4),
(7, 1, 3, '2019-09-21', 7),
(8, 1, 3, '2019-09-30', 7);

-- --------------------------------------------------------

--
-- Struttura della tabella `travel_cabin`
--

CREATE TABLE `travel_cabin` (
  `id_travel` int(11) NOT NULL,
  `id_cabin` int(11) NOT NULL,
  `cabins_left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `travel_cabin`
--

INSERT INTO `travel_cabin` (`id_travel`, `id_cabin`, `cabins_left`) VALUES
(2, 1, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `sex` set('M','F','N.D.','') NOT NULL,
  `email` varchar(32) NOT NULL,
  `pwhash` char(64) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `lastname`, `sex`, `email`, `pwhash`, `isAdmin`) VALUES
(1, 'admin', 'admin', 'admin', 'N.D.', 'admin@bluehorizon.com', 'F9A81477552594C79F2ABC3FC099DAA896A6E3A3590A55FFA392B6000412E80B', 1),
(2, 'alefranklin', 'alessandro', 'franchin', 'M', 'alessandro.franchin@hotmail.it', 'a2288eba763cccbde7b593f8063be77d99c77f6eb76996d84451c047a14a51ef', 0),
(3, 'user', 'user', 'user', 'N.D.', 'user@bluehorizon.com', 'A5DD24B2F08A686FD386C22C3FF8EE281EF2FBFF1FDE7008668CDA3DECFA4669', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cabins`
--
ALTER TABLE `cabins`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cabin` (`id_cabin`),
  ADD KEY `id_travel` (`id_travel`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `planets`
--
ALTER TABLE `planets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indici per le tabelle `rockets`
--
ALTER TABLE `rockets`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `rocket_cabin`
--
ALTER TABLE `rocket_cabin`
  ADD KEY `id_cabin` (`id_cabin`),
  ADD KEY `id_rocket` (`id_rocket`);

--
-- Indici per le tabelle `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_planet` (`id_planet`),
  ADD KEY `id_rocket` (`id_rocket`);

--
-- Indici per le tabelle `travel_cabin`
--
ALTER TABLE `travel_cabin`
  ADD KEY `id_travel` (`id_travel`),
  ADD KEY `travel_cabin_ibfk_1` (`id_cabin`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cabins`
--
ALTER TABLE `cabins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `planets`
--
ALTER TABLE `planets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `rockets`
--
ALTER TABLE `rockets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `travels`
--
ALTER TABLE `travels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_cabin`) REFERENCES `cabins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_travel`) REFERENCES `travels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `rocket_cabin`
--
ALTER TABLE `rocket_cabin`
  ADD CONSTRAINT `rocket_cabin_ibfk_1` FOREIGN KEY (`id_cabin`) REFERENCES `cabins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rocket_cabin_ibfk_2` FOREIGN KEY (`id_rocket`) REFERENCES `rockets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `travels`
--
ALTER TABLE `travels`
  ADD CONSTRAINT `travels_ibfk_1` FOREIGN KEY (`id_planet`) REFERENCES `planets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travels_ibfk_2` FOREIGN KEY (`id_rocket`) REFERENCES `rockets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `travel_cabin`
--
ALTER TABLE `travel_cabin`
  ADD CONSTRAINT `travel_cabin_ibfk_1` FOREIGN KEY (`id_cabin`) REFERENCES `cabins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travel_cabin_ibfk_2` FOREIGN KEY (`id_travel`) REFERENCES `travels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
