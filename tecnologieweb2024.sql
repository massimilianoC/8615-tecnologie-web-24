-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 07, 2024 alle 18:08
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tecnologieweb2024`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `followers`
--

CREATE TABLE `followers` (
  `idFOLLOWER` int(11) NOT NULL,
  `dataFollow` datetime DEFAULT current_timestamp(),
  `dataUnfollow` datetime DEFAULT NULL,
  `dataValidazione` datetime DEFAULT NULL,
  `dataRifiuto` datetime DEFAULT NULL,
  `isAccepted` bit(1) DEFAULT b'0',
  `fkFollower` int(11) NOT NULL,
  `fkFollowed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `followers`
--

INSERT INTO `followers` (`idFOLLOWER`, `dataFollow`, `dataUnfollow`, `dataValidazione`, `dataRifiuto`, `isAccepted`, `fkFollower`, `fkFollowed`) VALUES
(1, '2024-06-07 17:35:18', NULL, NULL, NULL, b'1', 1, 2),
(2, '2024-04-23 11:58:05', NULL, NULL, NULL, b'1', 2, 1),
(3, '2024-06-07 17:35:18', NULL, NULL, NULL, b'1', 1, 3),
(4, '2024-06-07 17:35:19', NULL, NULL, NULL, b'1', 1, 4),
(5, '2024-06-07 17:35:06', NULL, NULL, NULL, b'0', 1, 6),
(6, '2024-05-06 17:26:16', NULL, NULL, NULL, b'1', 6, 1),
(10, '2024-05-06 17:08:29', NULL, NULL, NULL, b'1', 6, 3),
(11, '2024-05-06 17:16:24', NULL, NULL, NULL, b'1', 6, 2),
(12, '2024-05-06 17:16:15', NULL, NULL, NULL, b'1', 6, 4),
(13, '2024-05-06 18:00:25', NULL, NULL, NULL, b'1', 2, 6),
(14, '2024-06-07 15:22:22', NULL, NULL, NULL, b'1', 7, 1),
(15, '2024-06-07 15:22:19', NULL, NULL, NULL, b'1', 7, 2),
(16, '2024-06-07 17:35:19', NULL, NULL, NULL, b'1', 1, 7),
(17, '2024-06-07 17:35:19', NULL, NULL, NULL, b'1', 1, 11),
(18, '2024-06-07 17:19:07', NULL, NULL, NULL, b'1', 11, 1),
(19, '2024-06-07 17:19:07', NULL, NULL, NULL, b'1', 11, 2),
(20, '2024-06-07 17:19:08', NULL, NULL, NULL, b'1', 11, 3),
(21, '2024-06-07 17:19:08', NULL, NULL, NULL, b'1', 11, 4),
(22, '2024-06-07 17:19:08', NULL, NULL, NULL, b'1', 11, 6),
(23, '2024-06-07 17:19:09', NULL, NULL, NULL, b'1', 11, 7),
(24, '2024-06-07 17:19:09', NULL, NULL, NULL, b'1', 11, 12),
(25, '2024-06-07 17:35:07', NULL, NULL, NULL, b'0', 1, 12);

-- --------------------------------------------------------

--
-- Struttura della tabella `notifications`
--

CREATE TABLE `notifications` (
  `idNOTIFICATION` int(11) NOT NULL,
  `dataInserimento` datetime NOT NULL DEFAULT current_timestamp(),
  `dataVisualizzazione` datetime DEFAULT NULL,
  `dataArchiviazione` datetime DEFAULT NULL,
  `emailSent` bit(1) DEFAULT b'0',
  `read` bit(1) DEFAULT b'0',
  `fkPost` int(11) DEFAULT NULL,
  `fkFollow` int(11) DEFAULT NULL,
  `fkUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `notifications`
--

INSERT INTO `notifications` (`idNOTIFICATION`, `dataInserimento`, `dataVisualizzazione`, `dataArchiviazione`, `emailSent`, `read`, `fkPost`, `fkFollow`, `fkUser`) VALUES
(1, '2024-04-23 12:01:34', NULL, NULL, b'0', b'0', 2, NULL, 1),
(2, '2024-04-23 12:01:38', NULL, NULL, b'0', b'0', 1, NULL, 2),
(3, '2024-04-23 12:02:12', '2024-05-15 16:27:01', '2024-05-15 16:27:01', b'0', b'1', NULL, 1, 2),
(4, '2024-04-23 12:02:16', NULL, NULL, b'0', b'0', NULL, 2, 1),
(5, '2024-04-23 12:10:07', NULL, NULL, b'0', b'0', 3, NULL, 2),
(6, '2024-04-23 12:10:12', '2024-06-07 12:30:23', '2024-06-07 12:30:23', b'0', b'1', 4, NULL, 1),
(7, '2024-05-06 16:23:45', NULL, NULL, b'0', b'0', NULL, 3, 3),
(8, '2024-05-06 16:23:48', NULL, NULL, b'0', b'0', NULL, 4, 4),
(9, '2024-05-06 16:23:49', NULL, NULL, b'0', b'0', NULL, 5, 6),
(10, '2024-05-06 17:06:31', '2024-05-15 16:19:44', '2024-05-15 16:19:44', NULL, b'1', NULL, 6, 1),
(14, '2024-05-06 17:08:29', NULL, NULL, b'0', b'0', NULL, 10, 3),
(15, '2024-05-06 17:16:15', NULL, NULL, b'0', b'0', NULL, 11, 2),
(16, '2024-05-06 17:16:15', NULL, NULL, b'0', b'0', NULL, 12, 4),
(17, '2024-05-06 17:23:27', NULL, NULL, b'0', b'0', 38, NULL, 2),
(18, '2024-05-06 17:26:43', NULL, NULL, b'0', b'0', 39, NULL, 2),
(19, '2024-05-06 17:26:43', NULL, NULL, b'0', b'0', 39, NULL, 6),
(20, '2024-05-06 18:00:25', NULL, NULL, b'0', b'0', NULL, 13, 6),
(21, '2024-05-06 18:00:43', '2024-05-15 16:19:41', '2024-05-15 16:19:41', NULL, b'1', 40, NULL, 1),
(22, '2024-05-06 18:00:43', NULL, NULL, b'0', b'0', 40, NULL, 6),
(23, '2024-05-07 09:52:28', NULL, NULL, b'0', b'0', 41, NULL, 2),
(24, '2024-05-07 09:52:28', NULL, NULL, b'0', b'0', 41, NULL, 6),
(29, '2024-06-07 12:16:50', NULL, NULL, b'0', b'0', 44, NULL, 2),
(30, '2024-06-07 12:16:50', NULL, NULL, b'0', b'0', 44, NULL, 6),
(33, '2024-06-07 12:27:05', NULL, NULL, b'0', b'0', 46, NULL, 2),
(34, '2024-06-07 12:27:05', NULL, NULL, b'0', b'0', 46, NULL, 6),
(35, '2024-06-07 12:28:54', NULL, NULL, b'0', b'0', 47, NULL, 2),
(36, '2024-06-07 12:28:54', NULL, NULL, b'0', b'0', 47, NULL, 6),
(37, '2024-06-07 12:29:16', NULL, NULL, b'0', b'0', 48, NULL, 2),
(38, '2024-06-07 12:29:16', NULL, NULL, b'0', b'0', 48, NULL, 6),
(39, '2024-06-07 15:22:13', '2024-06-07 16:29:54', '2024-06-07 16:29:54', b'0', b'1', NULL, 14, 1),
(40, '2024-06-07 15:22:19', NULL, NULL, b'0', b'0', NULL, 15, 2),
(41, '2024-06-07 15:24:54', NULL, NULL, b'0', b'0', NULL, 16, 7),
(42, '2024-06-07 15:25:09', NULL, NULL, b'0', b'0', 51, NULL, 2),
(43, '2024-06-07 15:25:09', NULL, NULL, b'0', b'0', 51, NULL, 6),
(44, '2024-06-07 15:25:09', NULL, NULL, b'0', b'0', 51, NULL, 7),
(48, '2024-06-07 16:32:26', NULL, NULL, b'0', b'0', NULL, 17, 11),
(49, '2024-06-07 16:34:46', NULL, NULL, b'0', b'0', NULL, 18, 1),
(50, '2024-06-07 16:34:49', NULL, NULL, b'0', b'0', NULL, 19, 2),
(51, '2024-06-07 16:34:49', NULL, NULL, b'0', b'0', NULL, 20, 3),
(52, '2024-06-07 16:34:49', NULL, NULL, b'0', b'0', NULL, 21, 4),
(53, '2024-06-07 16:34:50', NULL, NULL, b'0', b'0', NULL, 22, 6),
(54, '2024-06-07 16:34:50', NULL, NULL, b'0', b'0', NULL, 23, 7),
(55, '2024-06-07 16:35:23', '2024-06-07 17:35:30', '2024-06-07 17:35:30', b'0', b'1', 53, NULL, 1),
(64, '2024-06-07 17:19:09', NULL, NULL, b'0', b'0', NULL, 24, 12),
(65, '2024-06-07 17:35:04', NULL, NULL, b'0', b'0', NULL, 25, 12);

-- --------------------------------------------------------

--
-- Struttura della tabella `posts`
--

CREATE TABLE `posts` (
  `idPOST` int(11) NOT NULL,
  `dataInserimento` datetime NOT NULL DEFAULT current_timestamp(),
  `dataModifica` datetime DEFAULT NULL,
  `dataCancellazione` datetime DEFAULT NULL,
  `mediaUrl` varchar(2048) DEFAULT NULL,
  `text` varchar(2048) DEFAULT NULL,
  `isComment` bit(1) NOT NULL DEFAULT b'0',
  `fkParent` int(11) DEFAULT NULL,
  `fkUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `posts`
--

INSERT INTO `posts` (`idPOST`, `dataInserimento`, `dataModifica`, `dataCancellazione`, `mediaUrl`, `text`, `isComment`, `fkParent`, `fkUser`) VALUES
(1, '2024-04-23 11:55:02', NULL, NULL, '2024/04/23/1/00001postmedia.png', 'Hello World!', b'0', NULL, 1),
(2, '2024-04-23 12:55:42', NULL, NULL, NULL, 'Hi everybody!', b'0', NULL, 2),
(3, '2024-04-23 12:04:03', NULL, NULL, NULL, 'Ciao Sofi!', b'1', 2, 1),
(4, '2024-04-23 12:04:42', NULL, NULL, NULL, 'Ciao Massi!', b'1', 2, 2),
(11, '2024-04-29 11:16:23', NULL, NULL, '2024/04/29/1/_f65ecdb7-be3f-4426-8acc-0c48ba35df87.jpg', 'Nuova immagine via AI', b'0', NULL, 1),
(12, '2024-04-29 11:16:39', NULL, NULL, '2024/04/29/1/Massimiliano Camillucci.jpg', 'Nuova foto!', b'0', NULL, 1),
(13, '2024-04-29 11:38:21', NULL, NULL, '', 'Devo implementare i commenti!', b'0', NULL, 1),
(14, '2024-04-29 11:38:46', NULL, NULL, '', 'Un post senza immagine, è come una casa senza tetto!', b'0', NULL, 1),
(15, '2024-04-29 11:50:40', NULL, NULL, '', 'Eccoli!', b'1', 13, 1),
(27, '2024-04-29 12:43:49', NULL, NULL, '2024/04/29/1/1270103c-3ed4-422d-b730-2d931f87b095.jpeg', 'Verso l\'infinito ed oltre!', b'0', NULL, 1),
(29, '2024-04-29 13:06:29', NULL, NULL, '', 'Test', b'1', 27, 1),
(30, '2024-04-29 13:17:33', NULL, NULL, '', 'Ciao di nuovo!', b'1', 2, 1),
(31, '2024-04-29 13:18:22', NULL, NULL, '', 'Devo implementare l\'aggiunta di un commento via AJAX!', b'0', NULL, 1),
(32, '2024-04-29 17:29:40', NULL, NULL, '2024/04/29/2/IMG_7753.JPG', 'Il nostro terrazzo!', b'0', NULL, 2),
(33, '2024-04-29 17:30:06', NULL, NULL, '', 'Cosa sarebbe?', b'1', 27, 2),
(34, '2024-04-29 17:30:39', NULL, NULL, '', 'Un po\' vecchia sta foto!', b'1', 12, 2),
(35, '2024-05-06 17:16:34', NULL, NULL, '', 'Caspita!', b'1', 32, 6),
(36, '2024-05-06 17:22:23', NULL, NULL, '', 'Il mio primo POST!', b'0', NULL, 6),
(37, '2024-05-06 17:22:34', NULL, NULL, '', 'Hei anche io ci sono!', b'1', 2, 6),
(38, '2024-05-06 17:23:27', NULL, NULL, '', 'Eh, e chissene! 😒', b'1', 36, 1),
(39, '2024-05-06 17:26:43', NULL, NULL, '', 'Dai scherzo!', b'1', 36, 1),
(40, '2024-05-06 18:00:43', NULL, NULL, '', 'Ma insomma! Che insolenza', b'1', 36, 2),
(41, '2024-05-07 09:52:28', NULL, NULL, '2024/05/07/1/_aeb85e69-f4c9-4eb3-ae8d-90990ccb2bd3.jpg', 'Hypercube', b'0', NULL, 1),
(43, '2024-06-07 12:16:27', NULL, NULL, '2024/06/07/1/Immagine WhatsApp 2024-05-30 ore 12.47.45_7e7dd116.jpg', 'Nuova cucina! Che ne pensate?', b'0', NULL, 1),
(44, '2024-06-07 12:16:50', NULL, NULL, '', 'Quindi? Nessun commento?', b'1', 43, 1),
(46, '2024-06-07 12:27:05', NULL, NULL, '2024/06/07/1/cobot-esempi-e-applicazioni.jpg', 'Quanto costerà un Cobot?', b'0', NULL, 1),
(47, '2024-06-07 12:28:54', NULL, NULL, '2024/06/07/1/icon.jpg', 'Eccolo!', b'0', NULL, 1),
(48, '2024-06-07 12:29:16', NULL, NULL, '', 'Ora che ci penso, costerà 10.000€ minimo!', b'1', 47, 1),
(49, '2024-06-07 15:22:53', NULL, NULL, '', 'Bellissimo! Ma costoso!!!', b'1', 47, 7),
(50, '2024-06-07 15:24:34', NULL, NULL, '', 'Il mio primo Post!!!', b'0', NULL, 7),
(51, '2024-06-07 15:25:09', NULL, NULL, '', 'Grande! 🙌', b'1', 50, 1),
(53, '2024-06-07 16:35:23', NULL, NULL, '', 'Figata!', b'1', 47, 11);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `idUSER` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `cognome` varchar(200) DEFAULT NULL,
  `email` varchar(500) NOT NULL,
  `password` char(255) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `imageUrl` varchar(2048) DEFAULT NULL,
  `enableAutofollow` bit(1) DEFAULT b'0',
  `enableReposts` bit(1) DEFAULT b'1',
  `enableComments` bit(1) DEFAULT b'1',
  `dataIscrizione` datetime DEFAULT NULL,
  `dataCancellazione` datetime DEFAULT NULL,
  `dataUltimoAccesso` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`idUSER`, `nome`, `cognome`, `email`, `password`, `nickname`, `imageUrl`, `enableAutofollow`, `enableReposts`, `enableComments`, `dataIscrizione`, `dataCancellazione`, `dataUltimoAccesso`) VALUES
(1, 'Massimiliano', 'Camillucci', 'massimiliano.camillucci@gmail.com', '$2y$10$B9GX7NNboJ3erjW7vszOg.J3QNiMv4AHF6Gaz8l8zJcXQ5HlaLTW6', 'max', '', b'1', b'1', b'1', NULL, NULL, NULL),
(2, 'Sofia', 'Balducci', 'balducci.sofia@gmail.com', '$2y$10$h1IUSBP5VJeR4Yo6B8OzD.Ooqu6NM3iQLezUECxYLtaRUmSxxL5ry', 'sofi', '', b'1', b'1', b'1', NULL, NULL, NULL),
(3, 'Mario', 'Rossi', 'rossi@camillucci.com', '$2y$10$B9GX7NNboJ3erjW7vszOg.J3QNiMv4AHF6Gaz8l8zJcXQ5HlaLTW6', 'Mario', '', b'1', b'1', b'1', NULL, NULL, NULL),
(4, 'Sonia', 'Bianchi', 'bianchi@camillucci.com', '$2y$10$B9GX7NNboJ3erjW7vszOg.J3QNiMv4AHF6Gaz8l8zJcXQ5HlaLTW6', 'Sonia', '', b'0', b'1', b'1', NULL, NULL, NULL),
(6, 'Claudio', 'Verdi', 'verdi@gmail.com', '$2y$10$B9GX7NNboJ3erjW7vszOg.J3QNiMv4AHF6Gaz8l8zJcXQ5HlaLTW6', 'Claudio', '', b'1', b'1', b'1', NULL, NULL, NULL),
(7, 'Gennaro', 'Rossetti', 'massimiliano@camillucci.com', '$2y$10$XgkhSOUowNpWntOEE8xXGunHbwGamdoHA6qkmhXNn4ZvUZeZ7Xu.O', 'Gennaro410', '', b'0', b'1', b'1', NULL, NULL, NULL),
(11, 'Terenzio', 'Tacchini', 'terenzio@camillucci.com', '$2y$10$Y3uo52fujfJvaV5ed3zjgOIXgmkr1NT8QTE.QQxqrfC2/.UF.5z5a', 'Terenzio262', '', b'0', b'1', b'1', NULL, NULL, NULL),
(12, 'Federico', 'Lepore', 'lepore@camillucci.com', '$2y$10$m7KTW.PPkOFTA4Khz6lA5e3S4vCzdQTdid8jNcQZ0ouiwn3hTq1hS', 'Federico747', '', b'0', b'1', b'1', NULL, NULL, NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`idFOLLOWER`),
  ADD KEY `fkFollowed_idx` (`fkFollowed`),
  ADD KEY `fkFollower_idx` (`fkFollower`);

--
-- Indici per le tabelle `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`idNOTIFICATION`),
  ADD KEY `fkPost_idx` (`fkPost`),
  ADD KEY `fkFollow_idx` (`fkFollow`),
  ADD KEY `fkUser_idx` (`fkUser`);

--
-- Indici per le tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idPOST`),
  ADD KEY `fkParentPost_idx` (`fkParent`),
  ADD KEY `fkParentUser_idx` (`fkUser`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUSER`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `nickname_UNIQUE` (`nickname`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `followers`
--
ALTER TABLE `followers`
  MODIFY `idFOLLOWER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT per la tabella `notifications`
--
ALTER TABLE `notifications`
  MODIFY `idNOTIFICATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT per la tabella `posts`
--
ALTER TABLE `posts`
  MODIFY `idPOST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `idUSER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `fkFollowed` FOREIGN KEY (`fkFollowed`) REFERENCES `users` (`idUSER`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkFollower` FOREIGN KEY (`fkFollower`) REFERENCES `users` (`idUSER`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fkFollow` FOREIGN KEY (`fkFollow`) REFERENCES `followers` (`idFOLLOWER`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkPost` FOREIGN KEY (`fkPost`) REFERENCES `posts` (`idPOST`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkUser` FOREIGN KEY (`fkUser`) REFERENCES `users` (`idUSER`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fkParentPost` FOREIGN KEY (`fkParent`) REFERENCES `posts` (`idPOST`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkParentUser` FOREIGN KEY (`fkUser`) REFERENCES `users` (`idUSER`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
