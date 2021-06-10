-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 jun 2020 om 10:35
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project07`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aandoening`
--

CREATE TABLE `aandoening` (
  `aandoening_id` int(11) NOT NULL,
  `aandoening` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `aandoening`
--

INSERT INTO `aandoening` (`aandoening_id`, `aandoening`) VALUES
(1, 'Astma');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aandoening_cliënt`
--

CREATE TABLE `aandoening_cliënt` (
  `id` int(11) NOT NULL,
  `aandoening_id` int(11) NOT NULL,
  `cliënt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `aandoening_cliënt`
--

INSERT INTO `aandoening_cliënt` (`id`, `aandoening_id`, `cliënt_id`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aanvraag`
--

CREATE TABLE `aanvraag` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `straatnaam` varchar(255) NOT NULL,
  `huisnummer` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `aanvraag`
--

INSERT INTO `aanvraag` (`id`, `voornaam`, `achternaam`, `woonplaats`, `straatnaam`, `huisnummer`, `postcode`) VALUES
(1, 'Gerben', 'Zwemer', 'Moerkapelle', 'Hollevoeterlaan', '31', '2751DV'),
(2, 'Pietje', 'Puk', 'Moerkapelle', 'Hollevoeterlaan', '31', '2751DV'),
(3, 'Test', 'Test', 'Test', 'Test', 'Test', 'Test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afdeling`
--

CREATE TABLE `afdeling` (
  `id` int(11) NOT NULL,
  `afdeling` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `afdeling`
--

INSERT INTO `afdeling` (`id`, `afdeling`) VALUES
(1, 'Intensive care'),
(2, 'Chirurgie'),
(3, 'Dermatologie'),
(4, 'Gynaecologie');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afspraken`
--

CREATE TABLE `afspraken` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `afspraken`
--

INSERT INTO `afspraken` (`id`, `title`, `start_event`, `end_event`, `user_id`) VALUES
(30, 'Test', '2020-06-23 00:00:00', '2020-06-24 00:00:00', 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `apotheek`
--

CREATE TABLE `apotheek` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `straatnaam` varchar(255) NOT NULL,
  `huisnummer` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `telefoonnummer` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gebruikersnaam_gebruiker` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `apotheek`
--

INSERT INTO `apotheek` (`id`, `naam`, `woonplaats`, `straatnaam`, `huisnummer`, `postcode`, `telefoonnummer`, `email`, `gebruikersnaam_gebruiker`) VALUES
(1, 'Uitdeelpost Moerkapelle', 'Moerkapelle', 'Weideplantsoen', '20', '2751 CB', 'uitdeelpost@gmail.com', 'uitdeelpost@gmail.com', ''),
(2, 'Apotheek Zevenhuizen-Moerkapelle B.V.', 'Moerkapelle', 'Weideplantsoen', '20', '2751 CB', '1234567890', 'Apotheek@gmail.com', ''),
(3, 'Test', 'Moerkapelle', 'Hollevoeterlaan', '31', '2751Dv', '837498', 'test@gmail.com', ''),
(4, 'Gerben', 'Moerkapelle', 'Hollevoeterlaan', '31', '2751jh', '9836', 'test@gmail.com', 'Apotheek1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `archiefbedbezetting`
--

CREATE TABLE `archiefbedbezetting` (
  `id` int(11) NOT NULL,
  `bed` varchar(45) NOT NULL,
  `afdeling` varchar(45) DEFAULT NULL,
  `kamer` varchar(45) NOT NULL,
  `begindatum` date NOT NULL,
  `begintijd` time NOT NULL,
  `einddatum` date NOT NULL,
  `eindtijd` time NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `archiefbedbezetting`
--

INSERT INTO `archiefbedbezetting` (`id`, `bed`, `afdeling`, `kamer`, `begindatum`, `begintijd`, `einddatum`, `eindtijd`, `createdate`) VALUES
(4, 'bed2', 'Intensive care', '1.01', '2020-04-20', '17:03:00', '2020-04-21', '17:03:00', '2020-04-20 15:03:24'),
(5, 'bed1', 'Intensive care', '1.01', '2020-04-22', '00:18:00', '2020-04-22', '00:23:00', '2020-04-21 22:18:56'),
(6, 'bed1', 'Intensive care', '1.01', '2020-04-22', '09:18:00', '2020-04-23', '09:18:00', '2020-04-22 07:18:35');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bed`
--

CREATE TABLE `bed` (
  `id` int(11) NOT NULL,
  `omschrijving` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bed`
--

INSERT INTO `bed` (`id`, `omschrijving`) VALUES
(1, 'bed1'),
(2, 'bed2'),
(3, 'bed3'),
(4, 'bed4');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bedbezetting`
--

CREATE TABLE `bedbezetting` (
  `id` int(11) NOT NULL,
  `bed_id` int(11) NOT NULL,
  `kamer_id` int(11) NOT NULL,
  `begindatum` date NOT NULL,
  `begintijd` time NOT NULL,
  `einddatum` date DEFAULT NULL,
  `eindtijd` time DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `changedate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bedbezetting`
--

INSERT INTO `bedbezetting` (`id`, `bed_id`, `kamer_id`, `begindatum`, `begintijd`, `einddatum`, `eindtijd`, `createdate`, `changedate`) VALUES
(4, 2, 5, '2020-04-20', '17:03:00', '2020-04-21', '17:03:00', '2020-04-20 15:03:24', '2020-04-20 15:03:24'),
(5, 1, 5, '2020-04-22', '00:18:00', '2020-04-22', '00:23:00', '2020-04-21 22:18:56', '2020-04-21 22:18:56'),
(6, 1, 5, '2020-04-22', '09:18:00', '2020-04-23', '09:18:00', '2020-04-22 07:18:35', '2020-04-22 07:18:35');

--
-- Triggers `bedbezetting`
--
DELIMITER $$
CREATE TRIGGER `trArhiverenbedbezetting_AU` AFTER INSERT ON `bedbezetting` FOR EACH ROW BEGIN 

DECLARE vBed varchar(45); 

DECLARE vAfdeling varchar(45); 

DECLARE vKamer varchar(45); 

-- alleen als zowel einddatum + einddatum zijn ingevuld, de gegevens opslaan in archiefbedbezetting... 

IF (new.einddatum IS NOT NULL AND new.eindtijd IS NOT NULL) THEN 

SELECT omschrijving INTO vBed FROM bed WHERE id=new.bed_id; 

SELECT a.afdeling, k.kamer INTO vAfdeling, vKamer FROM kamer k 

INNER JOIN afdeling a ON k.afdeling_id=a.id 

WHERE k.id=new.kamer_id; 

-- NULL waarden afvangen... 

SET vBed = COALESCE(vBed,''); 

SET vKamer = COALESCE(vKamer,''); 

SET vAfdeling = COALESCE(vAfdeling,''); 

SELECT kamer INTO vKamer FROM kamer WHERE id=new.kamer_id; 

INSERT INTO archiefbedbezetting 

(bed, afdeling, kamer,begindatum,begintijd,einddatum,eindtijd) 

values(vBed,vAfdeling, vKamer, new.begindatum, new.begintijd,new.einddatum,new.eindtijd); 

END IF; 

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bedden_kamer`
--

CREATE TABLE `bedden_kamer` (
  `beddenKamer_id` int(11) NOT NULL,
  `kamer_id` int(11) NOT NULL,
  `bed_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bedden_kamer`
--

INSERT INTO `bedden_kamer` (`beddenKamer_id`, `kamer_id`, `bed_id`) VALUES
(26, 9, 1),
(27, 9, 2),
(33, 5, 1),
(34, 5, 2),
(35, 5, 4),
(36, 8, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `chat`
--

CREATE TABLE `chat` (
  `bericht_id` int(11) NOT NULL,
  `bericht` varchar(255) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `cliënt_id` int(255) NOT NULL,
  `aan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `chat`
--

INSERT INTO `chat` (`bericht_id`, `bericht`, `time`, `cliënt_id`, `aan`) VALUES
(111, 'Ik heb een vraag', '0000-00-00 00:00:00.000000', 8, ''),
(131, 'Hoi', '2020-06-24 08:03:24.944081', 0, 'Gerben'),
(132, 'Jo', '2020-06-24 08:05:48.212015', 0, 'Gerben'),
(133, 'JOJO', '2020-06-24 08:06:14.888883', 0, 'Gerben');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cliënten`
--

CREATE TABLE `cliënten` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `straatnaam` varchar(255) NOT NULL,
  `huisnummer` int(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `bloedgroep` varchar(255) NOT NULL,
  `polisnummer` varchar(255) NOT NULL,
  `telefoonnummer` varchar(255) NOT NULL,
  `gebruikersnaam_gebruiker` varchar(255) NOT NULL,
  `huisarts` varchar(255) NOT NULL,
  `verzekering` varchar(255) NOT NULL,
  `beddenbezetting_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `cliënten`
--

INSERT INTO `cliënten` (`id`, `voornaam`, `tussenvoegsel`, `achternaam`, `woonplaats`, `straatnaam`, `huisnummer`, `postcode`, `bloedgroep`, `polisnummer`, `telefoonnummer`, `gebruikersnaam_gebruiker`, `huisarts`, `verzekering`, `beddenbezetting_id`) VALUES
(3, 'Gerben', 'Zwemer', 'Zwemer', 'Moerkapelle', 'Hollevoeterlaan', 31, '2751DV', 'a-', '349083', '0611652056', 'Gerben', '2', '1', 5),
(4, 'Gerrie', 'Test', 'Test', 'Test', 'Test', 0, 'Test', 'a-', 'Test', 'Test', 'Test', '3', '1', 5),
(6, 'Sjonnie', '', 'Steen', 'Ergens', 'Iets', 489, '7883FG', 'o-', '0934890', '1234567890', 'Sjonnie', '2', '1', 2),
(11, 'f', 'f', 'f', 'f', 'f', 0, 'f', 'a-', 'f', 'f', 'f', '', '', 0),
(12, 'Pietje', '', 'Puk', 'Moerkapelle', 'Hollevoeterlaan', 54, '7889JK', 'a-', '098098', '4544545', 'Pietje', '', '', 0),
(13, 'v', 'fv', 'v', 'v', 'v', 0, 'v', 'a+', 'v', 'v', 'v', '', '', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `consulten`
--

CREATE TABLE `consulten` (
  `id` int(11) NOT NULL,
  `Titel` varchar(255) NOT NULL,
  `consult` varchar(255) NOT NULL,
  `datum` varchar(255) NOT NULL,
  `cliënt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `consulten`
--

INSERT INTO `consulten` (`id`, `Titel`, `consult`, `datum`, `cliënt_id`) VALUES
(1, 'Ziek', 'Je bent ziek', '2020-04-21', 3),
(2, 'Heel erg ziek', 'Je bent heel erg ziek', '2020-04-21', 3),
(3, 'Super ziek', 'Je bent super ziek', '2020-04-21', 3),
(4, 'Beter', 'Je bent weer beter', '2020-04-21', 3),
(5, 'Toch niet beter', 'Je bent toch niet beter', '2020-04-21', 3),
(6, 'Beter', 'Je bent weer beter', '2020-04-21', 3),
(7, 'Test', 'Test', '2020-04-21', 3),
(8, 'lij', '.knlin', '2020-06-04', 3),
(9, 'fdsfs', 'fwfw', '2020-06-17', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers_rechten`
--

CREATE TABLE `gebruikers_rechten` (
  `id` int(255) NOT NULL,
  `rol` int(255) NOT NULL,
  `recht_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers_rechten`
--

INSERT INTO `gebruikers_rechten` (`id`, `rol`, `recht_id`) VALUES
(113, 34, 1),
(114, 34, 2),
(115, 34, 3),
(173, 2, 17),
(177, 6, 8),
(247, 31, 1),
(248, 31, 2),
(249, 31, 3),
(250, 31, 17),
(251, 31, 25),
(252, 39, 1),
(256, 4, 4),
(257, 4, 26),
(258, 4, 27),
(259, 1, 1),
(260, 1, 2),
(261, 1, 9),
(262, 1, 11),
(263, 1, 20),
(264, 1, 21),
(265, 1, 22),
(266, 1, 23),
(267, 1, 24),
(268, 1, 28),
(269, 40, 1),
(270, 40, 3),
(271, 40, 16),
(277, 3, 18),
(278, 3, 29),
(279, 41, 29);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `huisartsen`
--

CREATE TABLE `huisartsen` (
  `id` int(10) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `telefoonnummer` varchar(255) NOT NULL,
  `gebruikersnaam_gebruiker` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `huisartsen`
--

INSERT INTO `huisartsen` (`id`, `voornaam`, `tussenvoegsel`, `achternaam`, `telefoonnummer`, `gebruikersnaam_gebruiker`) VALUES
(2, 'Gerben', '', 'Zwemer', '0611652056', 'huisarts'),
(3, 'Pietje', 'ter', 'Puk', '09380948', 'Pietje'),
(4, 'test', '', 'eet', 'et', 'et'),
(5, 'efef', '', 'fefef', 'fefefe', 'fefee'),
(7, 'f', 'f', 'ff', 'f', 'f');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kamer`
--

CREATE TABLE `kamer` (
  `id` int(11) NOT NULL,
  `kamer` varchar(45) DEFAULT NULL,
  `afdeling_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `kamer`
--

INSERT INTO `kamer` (`id`, `kamer`, `afdeling_id`) VALUES
(5, '1.01', 1),
(6, '1.03', 1),
(7, '1.04', 1),
(8, '1.05', 1),
(9, '1.06', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medicijnen`
--

CREATE TABLE `medicijnen` (
  `medicijn_id` int(11) NOT NULL,
  `medicijn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medicijnen`
--

INSERT INTO `medicijnen` (`medicijn_id`, `medicijn`) VALUES
(1, 'alfacalcidol'),
(2, 'f'),
(3, 't'),
(4, 'algeldraat'),
(5, 'Apotel'),
(6, 'Aromasin'),
(7, 'Asasantin Retard');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medicijn_cliënt`
--

CREATE TABLE `medicijn_cliënt` (
  `id` int(11) NOT NULL,
  `medicijn_id` int(11) NOT NULL,
  `cliënt_id` int(11) NOT NULL,
  `opgehaald` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medicijn_cliënt`
--

INSERT INTO `medicijn_cliënt` (`id`, `medicijn_id`, `cliënt_id`, `opgehaald`) VALUES
(1, 1, 3, 'ja'),
(3, 4, 3, 'ja'),
(5, 7, 3, 'ja'),
(7, 6, 3, 'ja'),
(15, 4, 3, 'ja');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rechten`
--

CREATE TABLE `rechten` (
  `recht_id` int(11) NOT NULL,
  `omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `rechten`
--

INSERT INTO `rechten` (`recht_id`, `omschrijving`) VALUES
(1, 'cliënt aanmaken'),
(2, 'huisarts aanmaken'),
(3, 'aandoening toevoegen'),
(4, 'behandelingen toevoegen patiënt'),
(8, 'medicatie per patiënt'),
(9, 'rechten aanpassen'),
(11, 'alle gebruikers toevoegen'),
(12, 'huisarts koppelen'),
(13, 'verzekering koppelen'),
(14, 'medicatie toevoegen'),
(15, 'apotheek toevoegen'),
(16, 'ziekenhuis toevoegen'),
(17, 'Cliënten'),
(18, 'webapp'),
(19, 'Voorgeschreven medicatie\r\n'),
(20, 'Cliënten aanpassen'),
(21, 'Huisartsen aanpassen'),
(22, 'Medisch specialisten aanpassen'),
(23, 'Apotheek aanpassen'),
(24, 'Ziekenhuis aanpassen'),
(25, 'gebruikersgroep aanmaken'),
(26, 'Info beddenbezetting'),
(27, 'bedden bezetten'),
(28, 'Gebruikers aanpassen'),
(29, 'hapchat');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rollen`
--

CREATE TABLE `rollen` (
  `rol_id` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `rollen`
--

INSERT INTO `rollen` (`rol_id`, `rol`) VALUES
(1, 'Admin'),
(2, 'Huisarts'),
(3, 'cliënt'),
(4, 'medisch specialist'),
(5, 'ziekenhuis'),
(6, 'apotheek'),
(31, 'verzekering'),
(32, '0'),
(33, '0'),
(34, '123'),
(35, '0'),
(36, '0'),
(37, '0'),
(38, '0'),
(39, '0'),
(40, 'Nieuwe gebruikersgroep'),
(41, 'hap');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `specialisten`
--

CREATE TABLE `specialisten` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `telefoonnummer` varchar(255) NOT NULL,
  `gebruikersnaam_gebruiker` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `specialisten`
--

INSERT INTO `specialisten` (`id`, `voornaam`, `tussenvoegsel`, `achternaam`, `telefoonnummer`, `gebruikersnaam_gebruiker`) VALUES
(2, 'Gerben', '', 'Zwemer', '9083903', 'Medischspecialist');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `gebruiker_id` int(255) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rol_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`gebruiker_id`, `gebruikersnaam`, `wachtwoord`, `email`, `rol_id`) VALUES
(8, 'Gerben', '$2y$10$/9rF//epYhVPPKP4SXAKYO6uTTvE40ZuTvFPYoSu8zcHxFVmSZB2C', 'gerbenzwemer@gmail.com', 3),
(10, 'huisarts', '$2y$10$A9vZdwAGx52Tk0qac5T4MOQ6LAGKh5al8efqa38cNBRZavrCtcTpG', 'huisarts@gmail.com', 2),
(11, 'Gerbenzwemer', '$2y$10$.f1d7QnFUGpWaeZjsKOl0OlxbC8neyFU9QbQFvkxDu92wnYtL1R36', 'gerbenzwemer@gmail.com', 1),
(12, 'Pietje', '$2y$10$aovNEpPyDsD4NXVlH0J6huiMFiBNAsqM9rk6iQdoz2zyiqi6GM8QG', 'pietje@gmail.com', 2),
(13, 'Sjonnie', '$2y$10$oA8VCtTg0W.sAYYOu6qbredZ7E7A88.hnv1jRCgweFAU6DTPdAnea', 'Sjonnie@gmail.com', 3),
(14, 'Apotheek', '$2y$10$XDYLhB/hMMh7c12ZtmXecu6rjwTH/1D/.LNMBbDKfxfy1XKJHqP/2', 'test@gmail.com', 6),
(15, 'Apotheek1', '$2y$10$7uc1.c8.UU4L0rWTG2q6Euo3n3FYYsffd0foHOELUX1aXPuxtvjwK', 'test@gmail.com', 6),
(17, 'Verzekering', '$2y$10$dsienYLcpE0oiUJ7CLt6keBURdUeJLKvGPqg7kR/hn4PXD8MgLutO', 'gerbenzwemer@gmail.com', 31),
(18, 'Medischspecialist', '$2y$10$w38ozrHZYwepgt3w6u9mCexX/SOqZMNs5UmMmMfVeMYsKJGL2bkF.', 'gerbenzwemer@gmail.com', 4),
(21, 'et', '$2y$10$HaFhp8k8oFIZDK5UmuCWc.PDMHEL86W/JWgilekh/Zl2/Su31Jxdm', 'tee', 2),
(22, 'fefee', '$2y$10$6UXsAqkEr4/Ly7Bs7iw.I.akEK0FeGVzG9c56i9chn1HprlwUxbVC', 'efef', 2),
(23, '4', '$2y$10$8g6h42bkSHyrqBe1Eo./O.FDXDFKwOCkbSlUR7Y.jlBoLUoV92d5O', '54', 3),
(24, 'c', '$2y$10$QozcXhKU4Ed7xG1YBWT6NODpy2tsEG3uWMWE7DyM2x3XoJxSFHGZG', 'c', 2),
(25, 'Admin', '$2y$10$n6LNp1Yib3h4KkwInxTvTO/F10sZu41Dtfkkajn1JXG5vrzT5GVM.', 'test@gmail.com', 1),
(28, 'v', '$2y$10$7wop0Bj2wyvvjPhMlKeAbuLjc173wmH9FAXrd0TjAwHgKXUAZlDtS', 'v', 3),
(91, 'f', 'f', '', 0),
(100, 'Hap', '$2y$10$jf1H4zdOnQ6Ur5v0HYIg.ezaGOUN7PM80jf8cVqKF/QlEz8BrlHei', 'gerbenzwemer@gmail.com', 41),
(101, 'Test', 'Test', 'Test', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `verzekering`
--

CREATE TABLE `verzekering` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `straatnaam` varchar(255) NOT NULL,
  `huisnummer` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `telefoonnummer` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gebruikersnaam_gebruiker` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `verzekering`
--

INSERT INTO `verzekering` (`id`, `naam`, `woonplaats`, `straatnaam`, `huisnummer`, `postcode`, `telefoonnummer`, `email`, `gebruikersnaam_gebruiker`) VALUES
(1, 'Gerben', 'Moerkapelle', 'Hollevoeterlaan', '31', '2751DV', '93083498', 'gerbenzwemer@gmail.com', 'Verzekering');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ziekenhuizen`
--

CREATE TABLE `ziekenhuizen` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `straatnaam` varchar(255) NOT NULL,
  `huisnummer` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `telefoonnummer` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `ziekenhuizen`
--

INSERT INTO `ziekenhuizen` (`id`, `naam`, `woonplaats`, `straatnaam`, `huisnummer`, `postcode`, `telefoonnummer`, `email`) VALUES
(1, 'Groene hart', 'Gouda', 'Bleulandweg', '10', '2803 HH', 'groenehart@gmail.com', 'groenehart@gmail.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aandoening`
--
ALTER TABLE `aandoening`
  ADD PRIMARY KEY (`aandoening_id`);

--
-- Indexen voor tabel `aandoening_cliënt`
--
ALTER TABLE `aandoening_cliënt`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `aanvraag`
--
ALTER TABLE `aanvraag`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `afdeling`
--
ALTER TABLE `afdeling`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `afspraken`
--
ALTER TABLE `afspraken`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `apotheek`
--
ALTER TABLE `apotheek`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `archiefbedbezetting`
--
ALTER TABLE `archiefbedbezetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `bedbezetting`
--
ALTER TABLE `bedbezetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `bedden_kamer`
--
ALTER TABLE `bedden_kamer`
  ADD PRIMARY KEY (`beddenKamer_id`);

--
-- Indexen voor tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`bericht_id`);

--
-- Indexen voor tabel `cliënten`
--
ALTER TABLE `cliënten`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gebruikersnaam_gebruiker` (`gebruikersnaam_gebruiker`);

--
-- Indexen voor tabel `consulten`
--
ALTER TABLE `consulten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gebruikers_rechten`
--
ALTER TABLE `gebruikers_rechten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `huisartsen`
--
ALTER TABLE `huisartsen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gebruikersnaam_gebruiker` (`gebruikersnaam_gebruiker`);

--
-- Indexen voor tabel `kamer`
--
ALTER TABLE `kamer`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  ADD PRIMARY KEY (`medicijn_id`);

--
-- Indexen voor tabel `medicijn_cliënt`
--
ALTER TABLE `medicijn_cliënt`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `rechten`
--
ALTER TABLE `rechten`
  ADD PRIMARY KEY (`recht_id`);

--
-- Indexen voor tabel `rollen`
--
ALTER TABLE `rollen`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indexen voor tabel `specialisten`
--
ALTER TABLE `specialisten`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gebruikersnaam_gebruiker` (`gebruikersnaam_gebruiker`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`gebruiker_id`);

--
-- Indexen voor tabel `verzekering`
--
ALTER TABLE `verzekering`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `ziekenhuizen`
--
ALTER TABLE `ziekenhuizen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `aandoening`
--
ALTER TABLE `aandoening`
  MODIFY `aandoening_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `aandoening_cliënt`
--
ALTER TABLE `aandoening_cliënt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `aanvraag`
--
ALTER TABLE `aanvraag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `afdeling`
--
ALTER TABLE `afdeling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `afspraken`
--
ALTER TABLE `afspraken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT voor een tabel `apotheek`
--
ALTER TABLE `apotheek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `archiefbedbezetting`
--
ALTER TABLE `archiefbedbezetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `bed`
--
ALTER TABLE `bed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `bedbezetting`
--
ALTER TABLE `bedbezetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `bedden_kamer`
--
ALTER TABLE `bedden_kamer`
  MODIFY `beddenKamer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT voor een tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `bericht_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT voor een tabel `cliënten`
--
ALTER TABLE `cliënten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `consulten`
--
ALTER TABLE `consulten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `gebruikers_rechten`
--
ALTER TABLE `gebruikers_rechten`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT voor een tabel `huisartsen`
--
ALTER TABLE `huisartsen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `kamer`
--
ALTER TABLE `kamer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  MODIFY `medicijn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `medicijn_cliënt`
--
ALTER TABLE `medicijn_cliënt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `rechten`
--
ALTER TABLE `rechten`
  MODIFY `recht_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT voor een tabel `rollen`
--
ALTER TABLE `rollen`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT voor een tabel `specialisten`
--
ALTER TABLE `specialisten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `gebruiker_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT voor een tabel `verzekering`
--
ALTER TABLE `verzekering`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `ziekenhuizen`
--
ALTER TABLE `ziekenhuizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
