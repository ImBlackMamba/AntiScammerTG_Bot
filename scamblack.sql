-- phpMyadmin Custom
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 20, 2020 alle 08:18
-- Versione del server: 5.5.42-dev
-- Versione PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scamblack`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `antiscammertg_bot_admin`
--

CREATE TABLE `antiscammertg_bot_admin` (
  `id` int(11) NOT NULL,
  `tgid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `antiscammertg_bot_ban`
--

CREATE TABLE `antiscammertg_bot_ban` (
  `id` int(11) NOT NULL,
  `tgid` int(11) NOT NULL,
  `prove` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `antiscammertg_bot_ban_request`
--

CREATE TABLE `antiscammertg_bot_ban_request` (
  `id` int(11) NOT NULL,
  `tgid` int(11) NOT NULL,
  `nome` text NOT NULL,
  `username` text NOT NULL,
  `from_id` int(11) NOT NULL,
  `from_username` text NOT NULL,
  `prove` text NOT NULL,
  `randomString` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `antiscammertg_bot_channel`
--

CREATE TABLE `antiscammertg_bot_channel` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `antiscammertg_bot_channel`
--

INSERT INTO `antiscammertg_bot_channel` (`id`, `post_id`) VALUES
(1, 1456);

-- --------------------------------------------------------

--
-- Struttura della tabella `antiscammertg_bot_group`
--

CREATE TABLE `antiscammertg_bot_group` (
  `id` int(11) NOT NULL,
  `tgid` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `antiscammertg_bot_membri`
--

CREATE TABLE `antiscammertg_bot_membri` (
  `id` int(11) NOT NULL,
  `tgid` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `antiscammertg_bot_users`
--

CREATE TABLE `antiscammertg_bot_users` (
  `id` int(11) NOT NULL,
  `tgid` int(11) NOT NULL,
  `step` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `antiscammertg_bot_vip`
--

CREATE TABLE `antiscammertg_bot_vip` (
  `id` int(11) NOT NULL,
  `tgid` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `antiscammertg_bot_admin`
--
ALTER TABLE `antiscammertg_bot_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `antiscammertg_bot_ban`
--
ALTER TABLE `antiscammertg_bot_ban`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `antiscammertg_bot_ban_request`
--
ALTER TABLE `antiscammertg_bot_ban_request`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `antiscammertg_bot_channel`
--
ALTER TABLE `antiscammertg_bot_channel`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `antiscammertg_bot_group`
--
ALTER TABLE `antiscammertg_bot_group`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `antiscammertg_bot_membri`
--
ALTER TABLE `antiscammertg_bot_membri`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `antiscammertg_bot_users`
--
ALTER TABLE `antiscammertg_bot_users`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `antiscammertg_bot_vip`
--
ALTER TABLE `antiscammertg_bot_vip`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `antiscammertg_bot_admin`
--
ALTER TABLE `antiscammertg_bot_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `antiscammertg_bot_ban`
--
ALTER TABLE `antiscammertg_bot_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `antiscammertg_bot_ban_request`
--
ALTER TABLE `antiscammertg_bot_ban_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `antiscammertg_bot_channel`
--
ALTER TABLE `antiscammertg_bot_channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `antiscammertg_bot_group`
--
ALTER TABLE `antiscammertg_bot_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `antiscammertg_bot_membri`
--
ALTER TABLE `antiscammertg_bot_membri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `antiscammertg_bot_users`
--
ALTER TABLE `antiscammertg_bot_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `antiscammertg_bot_vip`
--
ALTER TABLE `antiscammertg_bot_vip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
