-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Dez 2016 um 10:30
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `zubi`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `attribute`
--

CREATE TABLE `attribute` (
  `attributname` varchar(255) NOT NULL,
  `wert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Attribute sind Einstellungen';

--
-- Daten für Tabelle `attribute`
--

INSERT INTO `attribute` (`attributname`, `wert`) VALUES
('BilderEintraegeFreigabepflicht', 1),
('BilderEintraegeMail', 1),
('GaestebuchEintraegeFreigabepflicht', 1),
('GaestebuchEintraegeMail', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilder`
--

CREATE TABLE `bilder` (
  `ID` int(11) NOT NULL,
  `AlbumID` int(11) NOT NULL DEFAULT '1' COMMENT 'Forest Key BilderAlbum',
  `UserID` int(11) NOT NULL COMMENT 'Forest Key CMSMembers',
  `BildName` varchar(255) NOT NULL,
  `BildKommentar` text NOT NULL,
  `BildDatum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BildPfad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bilder`
--

INSERT INTO `bilder` (`ID`, `AlbumID`, `UserID`, `BildName`, `BildKommentar`, `BildDatum`, `BildPfad`) VALUES
(6, 1, 1, 'Simpson 1', '', '2016-10-07 10:35:27', 'bilder_upload/1_2016-10-07-10-35-27.jpg'),
(7, 1, 1, 'Homer', 'Homers Gehirn', '2016-10-07 10:36:18', 'bilder_upload/1_2016-10-07-10-36-18.jpg'),
(8, 1, 1, 'Windows', 'Windows xp Homer Edition', '2016-10-07 10:36:39', 'bilder_upload/1_2016-10-07-10-36-39.jpg'),
(9, 1, 1, 'El Barto', '', '2016-10-07 10:36:49', 'bilder_upload/1_2016-10-07-10-36-49.jpg'),
(10, 1, 1, 'Simpsons', '', '2016-10-07 10:37:32', 'bilder_upload/1_2016-10-07-10-37-32.png'),
(11, 1, 1, 'Simpsons', 'Viele Simpsons', '2016-10-07 10:37:49', 'bilder_upload/1_2016-10-07-10-37-49.gif'),
(12, 1, 1, 'Homer und Marge', '', '2016-10-07 10:38:07', 'bilder_upload/1_2016-10-07-10-38-07.jpg'),
(13, 1, 1, 'Familie Simpson', '', '2016-10-07 10:38:28', 'bilder_upload/1_2016-10-07-10-38-29.jpg'),
(14, 1, 1, 'Homer', 'mit Revolver', '2016-10-07 10:38:45', 'bilder_upload/1_2016-10-07-10-38-45.jpg'),
(15, 1, 1, 'Sperma', '', '2016-10-07 10:38:58', 'bilder_upload/1_2016-10-07-10-38-58.jpg'),
(16, 1, 1, 'Homer und Bart is on Fire', '', '2016-10-07 10:39:35', 'bilder_upload/1_2016-10-07-10-39-35.jpg'),
(17, 6, 1, 'Chilbi 1', '', '2016-10-07 10:40:28', 'bilder_upload/1_2016-10-07-10-40-28.jpg'),
(18, 6, 1, 'Chilbi 2', '', '2016-10-07 10:40:46', 'bilder_upload/1_2016-10-07-10-40-46.jpg'),
(19, 6, 1, 'Chilbi 3', '', '2016-10-07 10:41:00', 'bilder_upload/1_2016-10-07-10-41-00.jpg'),
(20, 7, 1, 'fsjakd jsdf', 'sjd fasjdfjskd fjksd fjsa dkfsdjk', '2016-10-07 10:45:12', 'bilder_upload/1_2016-10-07-10-45-12.jpg'),
(21, 7, 1, 'jksd jfioja osidjf io', 'sdfi jsoadifj siod ', '2016-10-07 10:45:51', 'bilder_upload/1_2016-10-07-10-45-51.jpg'),
(22, 7, 1, 'yfasdfasd', '', '2016-10-07 10:46:03', 'bilder_upload/1_2016-10-07-10-46-03.jpg'),
(23, 7, 1, 'dfsdfsd', '', '2016-10-07 10:46:22', 'bilder_upload/1_2016-10-07-10-46-22.jpg'),
(24, 7, 1, 'sdfasdfasd', '', '2016-10-07 10:49:06', 'bilder_upload/1_2016-10-07-10-49-06.jpg'),
(25, 7, 1, 'sdfsda', '', '2016-10-07 10:49:17', 'bilder_upload/1_2016-10-07-10-49-17.jpg'),
(26, 7, 1, 'asdfsdfasd', 'dfhisud hfuias hduifh uiasd ', '2016-10-07 10:49:34', 'bilder_upload/1_2016-10-07-10-49-34.jpg'),
(27, 7, 1, 'iujhuisdfksdjn', '', '2016-10-07 10:49:42', 'bilder_upload/1_2016-10-07-10-49-42.jpg'),
(28, 7, 1, 'dskfnsdiu', '', '2016-10-07 10:49:48', 'bilder_upload/1_2016-10-07-10-49-48.jpg'),
(29, 7, 1, 'Big Ben', '', '2016-10-07 10:50:02', 'bilder_upload/1_2016-10-07-10-50-02.jpg'),
(30, 7, 1, 'London Train Station', '', '2016-10-07 10:50:29', 'bilder_upload/1_2016-10-07-10-50-29.jpg'),
(31, 7, 1, 'dsafkjskdu fjskd', '', '2016-10-07 10:50:40', 'bilder_upload/1_2016-10-07-10-50-40.jpg'),
(32, 7, 1, 'dfkajsdn fj osd', 'nksdufn sdnfak sd', '2016-10-07 10:50:56', 'bilder_upload/1_2016-10-07-10-50-56.jpg'),
(33, 7, 1, 'kjdfk asdjf skadjfsd', '', '2016-10-07 10:51:06', 'bilder_upload/1_2016-10-07-10-51-06.jpg'),
(34, 7, 1, 'dfkajsd kfjs kd', '', '2016-10-07 10:51:15', 'bilder_upload/1_2016-10-07-10-51-15.jpg'),
(35, 7, 1, 'London Harbor', '', '2016-10-07 10:51:27', 'bilder_upload/1_2016-10-07-10-51-27.jpg'),
(36, 7, 1, 'fkasdjn kfjsakd jfio jsdiofsd', '', '2016-10-07 10:51:39', 'bilder_upload/1_2016-10-07-10-51-39.jpg'),
(37, 7, 1, 'fsdjfi jsdoijf osd', '', '2016-10-07 10:51:52', 'bilder_upload/1_2016-10-07-10-51-52.jpg'),
(38, 7, 1, 'dskfajsd kjf', '', '2016-10-07 10:52:00', 'bilder_upload/1_2016-10-07-10-52-00.jpg'),
(39, 7, 1, 'sdakfjn ksdjiofasd', '', '2016-10-07 10:52:10', 'bilder_upload/1_2016-10-07-10-52-10.jpg'),
(40, 7, 1, 'dsfiasud iojf osidj ', 'sdlijf oisjd fioiosd', '2016-10-07 10:52:22', 'bilder_upload/1_2016-10-07-10-52-22.jpg'),
(41, 7, 1, 'Tower Bridge', '', '2016-10-07 10:52:36', 'bilder_upload/1_2016-10-07-10-52-36.jpg'),
(42, 7, 1, 'London Eye', '', '2016-10-07 10:52:44', 'bilder_upload/1_2016-10-07-10-52-44.jpg'),
(43, 8, 1, 'dfsij faisdj o', '', '2016-10-07 10:54:59', 'bilder_upload/1_2016-10-07-10-54-59.jpg'),
(44, 8, 1, 'dfajsd iojofia sd', '', '2016-10-07 10:55:09', 'bilder_upload/1_2016-10-07-10-55-09.jpg'),
(45, 8, 1, 'sdfj iosdjiof sd', '', '2016-10-07 10:55:22', 'bilder_upload/1_2016-10-07-10-55-22.jpg'),
(46, 8, 1, 'sdfj aiosdjf oi', '', '2016-10-07 10:55:31', 'bilder_upload/1_2016-10-07-10-55-31.jpg'),
(47, 8, 1, 'joi jfosid jfiosd j', '', '2016-10-07 10:55:40', 'bilder_upload/1_2016-10-07-10-55-40.jpg'),
(48, 8, 1, 'dfakjd iofjosd j', '', '2016-10-07 10:55:52', 'bilder_upload/1_2016-10-07-10-55-52.jpg'),
(49, 8, 1, 'jdoifj asodijf os', '', '2016-10-07 10:56:00', 'bilder_upload/1_2016-10-07-10-56-00.jpg'),
(50, 8, 1, 'dfaoijsd foij osda', 'sdfjoisd joifa sjdo', '2016-10-07 10:56:12', 'bilder_upload/1_2016-10-07-10-56-12.jpg'),
(51, 8, 1, 'sdafkj sdja fiojsd oif', 'sdfjo asidj foiasd', '2016-10-07 10:56:23', 'bilder_upload/1_2016-10-07-10-56-23.jpg'),
(52, 8, 1, 'dsfasdifj oisdj f', '', '2016-10-07 10:58:09', 'bilder_upload/1_2016-10-07-10-58-09.jpg'),
(53, 8, 1, 'dfiajsd iofjsio df', '', '2016-10-07 10:58:21', 'bilder_upload/1_2016-10-07-10-58-21.jpg'),
(54, 8, 1, 'dfaijsd oifjsiod', '', '2016-10-07 10:58:31', 'bilder_upload/1_2016-10-07-10-58-31.jpg'),
(55, 8, 1, 'sdkafjos idjfio o', '', '2016-10-07 10:58:40', 'bilder_upload/1_2016-10-07-10-58-40.jpg'),
(56, 8, 1, 'dskflajisd fjoisjd oifsd', '', '2016-10-07 10:58:52', 'bilder_upload/1_2016-10-07-10-58-52.jpg'),
(57, 8, 1, 'ijfiosd jfiojs dio', '', '2016-10-07 10:59:03', 'bilder_upload/1_2016-10-07-10-59-03.jpg'),
(58, 8, 1, 'dfajosid jofijasdio fjioasd ', '', '2016-10-07 10:59:14', 'bilder_upload/1_2016-10-07-10-59-14.jpg'),
(59, 8, 1, 'sdfjosiadj foisdjo f', '', '2016-10-07 10:59:22', 'bilder_upload/1_2016-10-07-10-59-22.jpg'),
(60, 8, 1, 'dfajosidj foiasdj', '', '2016-10-07 10:59:36', 'bilder_upload/1_2016-10-07-10-59-36.jpg'),
(61, 8, 1, 'jiodsfja iosdj fio', '', '2016-10-07 10:59:44', 'bilder_upload/1_2016-10-07-10-59-44.jpg'),
(62, 8, 1, 'dfiausdj fosdio ', '', '2016-10-07 10:59:52', 'bilder_upload/1_2016-10-07-10-59-52.jpg'),
(63, 8, 1, 'dfsaijfios djiof ', '', '2016-10-07 11:00:18', 'bilder_upload/1_2016-10-07-11-00-18.jpg'),
(64, 8, 1, 'asdfj osdijf ojiasdo', '', '2016-10-07 11:00:27', 'bilder_upload/1_2016-10-07-11-00-27.jpg'),
(65, 8, 1, 'sdfajsdio fjsiod ', '', '2016-10-07 11:00:39', 'bilder_upload/1_2016-10-07-11-00-39.jpg'),
(66, 8, 1, 'Telefonzelle', '', '2016-10-07 11:00:51', 'bilder_upload/1_2016-10-07-11-00-51.jpg'),
(67, 8, 1, 'Status', '', '2016-10-07 11:01:07', 'bilder_upload/1_2016-10-07-11-01-07.jpg'),
(68, 8, 1, 'joidfja osdij', '', '2016-10-07 11:01:20', 'bilder_upload/1_2016-10-07-11-01-20.jpg'),
(69, 8, 1, 'LÃ¶we', 'dsfjaio jdiof ', '2016-10-07 11:01:33', 'bilder_upload/1_2016-10-07-11-01-33.jpg'),
(70, 8, 1, 'kljdiof jsdÃ¶io f', '', '2016-10-07 11:16:42', 'bilder_upload/1_2016-10-07-11-16-42.jpg'),
(71, 8, 1, 'dfnlaisdnfioasnd', '', '2016-10-07 11:16:50', 'bilder_upload/1_2016-10-07-11-16-50.jpg'),
(72, 8, 1, 'dsafsjkdnfa', '', '2016-10-07 11:16:58', 'bilder_upload/1_2016-10-07-11-16-58.jpg'),
(73, 8, 1, 'sdafiojsdio j', '', '2016-10-07 11:17:09', 'bilder_upload/1_2016-10-07-11-17-09.jpg'),
(74, 8, 1, 'kjsdi fjasdio j', '', '2016-10-07 11:17:20', 'bilder_upload/1_2016-10-07-11-17-20.jpg'),
(75, 8, 1, 'iofsjdiojaf osidj fasd', '', '2016-10-07 11:17:30', 'bilder_upload/1_2016-10-07-11-17-30.jpg'),
(76, 8, 1, 'klfjifois dfjio', '', '2016-10-07 11:17:39', 'bilder_upload/1_2016-10-07-11-17-39.jpg'),
(78, 8, 1, 'fdsglkdf giodfjo ', '', '2016-10-07 11:17:58', 'bilder_upload/1_2016-10-07-11-17-58.jpg'),
(79, 8, 1, 'digjio dfjo', '', '2016-10-07 11:18:06', 'bilder_upload/1_2016-10-07-11-18-06.jpg'),
(80, 8, 1, 'Themse', '', '2016-10-07 11:18:17', 'bilder_upload/1_2016-10-07-11-18-17.jpg'),
(81, 8, 1, 'fsidj fioasjdio jf', '', '2016-10-07 11:18:26', 'bilder_upload/1_2016-10-07-11-18-26.jpg'),
(82, 8, 1, 'London Eye', '', '2016-10-07 11:18:37', 'bilder_upload/1_2016-10-07-11-18-37.jpg'),
(83, 8, 1, 'lkjdfios jasdiof jio', '', '2016-10-07 11:18:46', 'bilder_upload/1_2016-10-07-11-18-46.jpg'),
(84, 8, 1, 'jfasiodj foisdjo', '', '2016-10-07 11:18:57', 'bilder_upload/1_2016-10-07-11-18-57.jpg'),
(85, 8, 1, 'fsiudhfiusdj', '', '2016-10-07 11:19:22', 'bilder_upload/1_2016-10-07-11-19-22.jpg'),
(86, 8, 1, 'dfajisdoi jfio', '', '2016-10-07 11:19:35', 'bilder_upload/1_2016-10-07-11-19-35.jpg'),
(87, 8, 1, 'sdfhiausdh ifhui ', '', '2016-10-07 11:19:57', 'bilder_upload/1_2016-10-07-11-19-57.jpg'),
(88, 8, 1, 'kihuiogjfsdio fjosd', '', '2016-10-07 11:20:15', 'bilder_upload/1_2016-10-07-11-20-15.jpg'),
(89, 8, 1, 'dfasoidjf iosad', '', '2016-10-07 11:20:30', 'bilder_upload/1_2016-10-07-11-20-30.jpg'),
(90, 8, 1, 'dfajdi jfoasdijo', '', '2016-10-07 11:20:43', 'bilder_upload/1_2016-10-07-11-20-43.jpg'),
(91, 8, 1, 'sdfasidjfio s', '', '2016-10-07 11:20:54', 'bilder_upload/1_2016-10-07-11-20-54.jpg'),
(92, 9, 1, 'iljsd icjios fios', '', '2016-10-09 13:08:18', 'bilder_upload/1_2016-10-09-13-08-18.jpg'),
(93, 9, 1, 'huifhsdui hfuisd hfuis', '', '2016-10-09 13:08:27', 'bilder_upload/1_2016-10-09-13-08-27.jpg'),
(94, 9, 1, 'hduifh suidh fi', 'jhdhfs duifh sduifh ui', '2016-10-09 13:08:40', 'bilder_upload/1_2016-10-09-13-08-40.jpg'),
(95, 9, 1, 'udhfuiosdhfuio hsdui ', '', '2016-10-09 13:09:01', 'bilder_upload/1_2016-10-09-13-09-01.jpg'),
(96, 9, 1, 'jdufihs iudh ', 'uhfi usdh fiusdhi ', '2016-10-09 13:09:14', 'bilder_upload/1_2016-10-09-13-09-14.jpg'),
(97, 9, 1, 'Stoppt TierquÃ¤lerei', 'Stoppt TierquÃ¤lerei', '2016-10-09 13:09:36', 'bilder_upload/1_2016-10-09-13-09-36.jpg'),
(98, 9, 1, 'niojiodjfoi sdifj ', '', '2016-10-09 13:09:47', 'bilder_upload/1_2016-10-09-13-09-47.jpg'),
(99, 9, 1, 'iojfiosjd iof jsdio', '', '2016-10-09 13:09:57', 'bilder_upload/1_2016-10-09-13-09-57.jpg'),
(100, 9, 1, 'jkhiudfhsiud hfiusd hi', '', '2016-10-09 13:10:08', 'bilder_upload/1_2016-10-09-13-10-08.jpg'),
(101, 9, 1, 'ijosfpsdi jfposid p', 'Richtiger Pfad?', '2016-10-09 14:27:12', 'bilder_upload/1_2016-10-09-14-27-12.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilderalbum`
--

CREATE TABLE `bilderalbum` (
  `ID` int(11) NOT NULL,
  `AlbumName` varchar(255) NOT NULL,
  `AlbumKommentar` text NOT NULL,
  `AlbumDatum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AlbumStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bilderalbum`
--

INSERT INTO `bilderalbum` (`ID`, `AlbumName`, `AlbumKommentar`, `AlbumDatum`, `AlbumStatus`) VALUES
(1, 'Hauptalbum', '', '2016-10-05 19:32:44', 1),
(6, 'Chilbi', 'Chilbi Bilder', '2016-10-07 10:31:36', 1),
(7, 'London 1', 'Erste Teil vo London', '2016-10-07 10:32:00', 1),
(8, 'London 2', 'Zweite Teil vo London', '2016-10-07 10:32:13', 1),
(9, 'TierquÃ¤lerei', 'Bilder Ã¼ber TierquÃ¤lerei', '2016-10-07 10:33:35', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilderemail`
--

CREATE TABLE `bilderemail` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilderkommentare`
--

CREATE TABLE `bilderkommentare` (
  `id` int(11) NOT NULL COMMENT 'ID Zahl aufsteigend',
  `BildID` int(11) NOT NULL COMMENT 'Forest Key bilder',
  `sendername` varchar(255) NOT NULL,
  `sendermail` varchar(255) DEFAULT NULL,
  `senderhomepage` varchar(255) DEFAULT NULL,
  `kommentar` text NOT NULL,
  `datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL COMMENT '1 = öffentlich; 2 = zum freigeben; 3 = gesperrt'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bilderkommentare`
--

INSERT INTO `bilderkommentare` (`id`, `BildID`, `sendername`, `sendermail`, `senderhomepage`, `kommentar`, `datum`, `status`) VALUES
(1, 26, 'Marius', 'maeru_1991@hotmail.com', NULL, 'Dies ist ein erster Test', '2016-12-27 02:22:35', 1),
(2, 26, 'Marius', NULL, NULL, 'Dies ist ein zweiter Test', '2016-12-27 02:27:01', 1),
(3, 31, 'Marius', '', '', 'Dies ist ein Test', '2016-12-27 22:50:24', 2),
(4, 31, 'Marius', '', '', 'Dies ist ein Test', '2016-12-27 22:54:14', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cmslogin_attempts`
--

CREATE TABLE `cmslogin_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `cmslogin_attempts`
--

INSERT INTO `cmslogin_attempts` (`user_id`, `time`) VALUES
(1, '1475506182'),
(1, '1475506440');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cmsmembers`
--

CREATE TABLE `cmsmembers` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `cmsmembers`
--

INSERT INTO `cmsmembers` (`id`, `username`, `email`, `password`, `salt`) VALUES
(1, 'Zubi', 'maeru_1991@hotmail.com', '7d2b709b5ef2ad8845647f1ff91fe6ede0b72eb7fbdf821142f1448bf414bf7c7f414ae9e26c9ea291947533bc186d73ee1de3ceb51c7de08f679fce78f55de0', '4c54370746df3c1e8ed730777515070dc78739cca993adda37222812fedeac832a7f776ce286756c748550c128d99b68eb2642a985a9c628317488fa6976d24d');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gaestebuch`
--

CREATE TABLE `gaestebuch` (
  `id` int(11) NOT NULL COMMENT 'ID Zahl aufsteigend',
  `sendername` varchar(255) NOT NULL,
  `sendermail` varchar(255) DEFAULT NULL,
  `senderhomepage` varchar(255) DEFAULT NULL,
  `nachricht` text NOT NULL,
  `datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL COMMENT '1 = öffentlich; 2 = zum freigeben; 3 = gesperrt'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Gästebuchtabelle';

--
-- Daten für Tabelle `gaestebuch`
--

INSERT INTO `gaestebuch` (`id`, `sendername`, `sendermail`, `senderhomepage`, `nachricht`, `datum`, `status`) VALUES
(1, 'test', 'test', 'test', 'sdfjosidjfiosadjfoisdjfioasjd jio sdfjls ldjc sdjlc sldjc isdmc lasjdc lsd', '2016-09-24 22:29:38', 1),
(2, '', '', '', '', '2016-09-25 00:15:31', 0),
(3, '', '', '', '', '2016-09-25 00:16:24', 0),
(4, '', '', '', '', '2016-09-25 00:31:37', 0),
(5, '"_?()/*6487[]Ã©Ã¨Ã $Ã¶Ã¼Ã¤', '', '', '', '2016-09-25 00:32:31', 0),
(6, '"_?()/*6487[]Ã©Ã¨Ã $Ã¶Ã¼Ã¤', '', '', '', '2016-09-25 00:41:49', 0),
(7, '"_?()/*6487[]Ã©Ã¨Ã $Ã¶Ã¼Ã¤', '', '', '', '2016-09-25 00:44:07', 0),
(8, '"_?()/*6487[]Ã©Ã¨Ã $Ã¶Ã¼Ã¤', '', '', '', '2016-09-25 00:48:43', 0),
(9, 'marius', '', 'http://', 'asdhfkasjdhfkjasdhfjka sdjkfhaskjd f""""___???', '2016-09-25 13:29:20', 1),
(10, 'marius', '', 'http://', 'asdhfkasjdhfkjasdhfjka sdjkfhaskjd f""""___???', '2016-09-25 13:30:00', 3),
(11, 'marius', '', 'http://', 'asdhfkasjdhfkjasdhfjka sdjkfhaskjd f""""___???', '2016-09-25 13:30:40', 3),
(12, 'marius', '', 'http://', 'asdhfkasjdhfkjasdhfjka sdjkfhaskjd f""""___???', '2016-09-25 13:31:40', 3),
(13, 'marius', '', 'http://', 'werissss nid ?!=";:', '2016-09-25 13:34:44', 1),
(14, 'marius', '', '', 'werissss nid ?!=";:', '2016-09-25 13:35:13', 1),
(15, 'Marius', 'maeru_1991@hotmail.com', 'http://www.google.ch', 'Das ist ein Test mit vollstÃ¤ndigen Variabeln', '2016-09-25 13:50:54', 3),
(16, 'Marius', 'maeru_1991@hotmail.com', 'http://www.google.ch', 'Das ist ein Test mit vollstÃ¤ndigen Variabeln', '2016-09-25 13:53:38', 3),
(17, 'Marius', 'maeru_1991@hotmail.com', 'http://www.google.ch', 'Das ist ein Test mit vollstÃ¤ndigen Variabeln', '2016-09-25 13:54:07', 3),
(18, 'Marius', 'maeru_1991@hotmail.com', 'http://www.google.ch', 'Das ist ein Test mit vollstÃ¤ndigen Variabeln', '2016-09-25 13:54:18', 3),
(19, 'Marius', 'maeru_1991@hotmail.com', 'http://www.google.ch', 'Das ist ein Test mit vollstÃ¤ndigen Variabeln', '2016-09-25 13:54:26', 3),
(20, 'Marius', 'maeru_1991@hotmail.com', 'http://www.google.ch', 'Das ist ein Test mit vollstÃ¤ndigen Variabeln', '2016-09-25 13:54:48', 1),
(21, 'Marius', '', '', 'Ich will, dass dieser Eintrag verÃ¶ffentlicht wird!', '2016-10-04 13:43:29', 1),
(22, 'Marius', '', '', 'Wird sie verÃ¶ffentlicht?', '2016-10-05 11:06:57', 1),
(23, 'Marius', '', '', 'Der auch?', '2016-10-05 11:07:31', 1),
(24, 'Marius', '', '', 'Dudhsfiudh ufh suidfhisud fsd', '2016-10-05 14:47:59', 2),
(25, 'Marius', '', '', 'sfduhifuashdo ifhasio dhious d', '2016-10-05 15:13:06', 1),
(26, 'Marius', 'maeru_1991@hotmail.com', 'http://www.google.ch', 'dfkojasd iofjiosdjviod j opvijsdpiov jsdio jvpoisdjvios jdiov jaspodvasd', '2016-10-05 15:15:17', 2),
(27, 'Marius', 'maeru_1991@hotmail.com', 'http://www.google.ch', 'dfkojasd iofjiosdjviod j opvijsdpiov jsdio jvpoisdjvios jdiov jaspodvasd', '2016-10-05 15:23:30', 1),
(28, 'Marius', 'maeru_1991@hotmail.com', 'http://www.google.ch', 'dfkojasd iofjiosdjviod j opvijsdpiov jsdio jvpoisdjvios jdiov jaspodvasd', '2016-10-05 15:23:39', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gaestebuchemail`
--

CREATE TABLE `gaestebuchemail` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `gaestebuchemail`
--

INSERT INTO `gaestebuchemail` (`id`, `email`) VALUES
(1, 'maeru_1991@hotmail.com');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `attribute`
--
ALTER TABLE `attribute`
  ADD UNIQUE KEY `attributname` (`attributname`);

--
-- Indizes für die Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `bilderalbum`
--
ALTER TABLE `bilderalbum`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `bilderemail`
--
ALTER TABLE `bilderemail`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `bilderkommentare`
--
ALTER TABLE `bilderkommentare`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `cmsmembers`
--
ALTER TABLE `cmsmembers`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `gaestebuch`
--
ALTER TABLE `gaestebuch`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `gaestebuchemail`
--
ALTER TABLE `gaestebuchemail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bilder`
--
ALTER TABLE `bilder`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT für Tabelle `bilderalbum`
--
ALTER TABLE `bilderalbum`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT für Tabelle `bilderemail`
--
ALTER TABLE `bilderemail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `bilderkommentare`
--
ALTER TABLE `bilderkommentare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Zahl aufsteigend', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `cmsmembers`
--
ALTER TABLE `cmsmembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `gaestebuch`
--
ALTER TABLE `gaestebuch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Zahl aufsteigend', AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT für Tabelle `gaestebuchemail`
--
ALTER TABLE `gaestebuchemail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
