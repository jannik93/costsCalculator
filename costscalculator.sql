-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Jan 2017 um 17:59
-- Server-Version: 10.1.19-MariaDB
-- PHP-Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `costscalculator`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `history`
--

CREATE TABLE `history` (
  `HistoryId` int(11) NOT NULL,
  `Credit` decimal(10,2) NOT NULL,
  `IsAdded` tinyint(1) NOT NULL,
  `LastChange` datetime NOT NULL,
  `UserId` int(11) NOT NULL,
  `Comment` varchar(500) DEFAULT NULL,
  `CreatedTimeStamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `history`
--

INSERT INTO `history` (`HistoryId`, `Credit`, `IsAdded`, `LastChange`, `UserId`, `Comment`, `CreatedTimeStamp`) VALUES
(14, '150.00', 1, '2016-12-30 16:42:39', 1, NULL, '2016-12-30 16:42:39'),
(15, '150.00', 1, '2016-12-30 16:42:42', 1, NULL, '2016-12-30 16:42:42'),
(16, '12.00', 0, '2016-12-30 16:47:44', 1, 'Einkaufen', '2016-12-30 16:47:44'),
(17, '12.00', 0, '2016-12-30 16:49:14', 1, 'Einkaufen', '2016-12-30 16:49:14');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `totalcredit`
--

CREATE TABLE `totalcredit` (
  `TotalCreditID` int(11) NOT NULL,
  `Credit` decimal(11,2) NOT NULL,
  `CreatetTimestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `totalcredit`
--

INSERT INTO `totalcredit` (`TotalCreditID`, `Credit`, `CreatetTimestamp`) VALUES
(3, '276.00', '2016-12-30 16:42:39');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `UserPassword` varchar(250) NOT NULL,
  `Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`UserId`, `Username`, `UserPassword`, `Created`) VALUES
(1, 'jannik', 'jannikx3y', '2016-12-19 17:11:09');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`HistoryId`);

--
-- Indizes für die Tabelle `totalcredit`
--
ALTER TABLE `totalcredit`
  ADD PRIMARY KEY (`TotalCreditID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `history`
--
ALTER TABLE `history`
  MODIFY `HistoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT für Tabelle `totalcredit`
--
ALTER TABLE `totalcredit`
  MODIFY `TotalCreditID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
