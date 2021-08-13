-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 01 mai 2021 à 14:42
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `solaris`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `msg` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_heure` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID` int NOT NULL,
  `id_salon` int NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `MESSAGE_UTILISATEUR_FK` (`ID`),
  KEY `MESSAGE_SALON0_FK` (`id_salon`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_message`, `msg`, `date_heure`, `ID`, `id_salon`) VALUES
(1, 'Nam nulla.', '2021-04-15 00:00:00', 1, 1),
(2, 'Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', '2021-04-15 00:00:00', 2, 1),
(3, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', '2021-04-15 00:00:00', 3, 1),
(4, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', '2021-04-15 00:00:00', 1, 1),
(5, 'Vestibulum sed magna at nunc commodo placerat.', '2021-04-15 00:00:00', 1, 2),
(6, 'Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo.', '2021-04-15 00:00:00', 3, 2),
(7, 'Vivamus in felis eu sapien cursus vestibulum.', '2021-04-15 00:00:00', 2, 2),
(8, 'Duis at velit eu est congue elementum.', '2021-04-15 00:00:00', 8, 8),
(13, 'Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum.', '2021-04-15 00:00:00', 1, 4),
(14, 'Ut at dolor quis odio consequat varius. Integer ac leo.', '2021-04-15 00:00:00', 1, 4),
(15, 'Sed accumsan felis.', '2021-04-15 00:00:00', 2, 4),
(16, 'Proin interdum mauris non ligula pellentesque ultrices.', '2021-04-15 00:00:00', 3, 4),
(17, 'Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', '2021-04-15 00:00:00', 2, 4),
(18, 'Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '2021-04-15 00:00:00', 18, 5),
(19, 'Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', '2021-04-15 00:00:00', 19, 5),
(20, 'Aliquam non mauris. Morbi non lectus.', '2021-04-15 00:00:00', 20, 5),
(21, 'mayday', '2021-04-18 18:03:40', 1, 4),
(24, 'Essai encore mad !', '2021-04-23 09:54:22', 1, 4),
(28, 'Mad, tu es là ?', '2021-04-23 16:48:17', 3, 1),
(29, 'Je te reçois, Maud', '2021-04-23 22:50:49', 1, 1),
(30, 'pourquoi double public ?', '2021-04-23 22:59:37', 1, 1),
(31, 'Mode mobile activé', '2021-04-24 22:44:18', 3, 9),
(32, 'Ad astra', '2021-04-25 13:22:29', 1, 2),
(33, 'Vers l\'infini et au-delà !', '2021-04-26 13:31:14', 3, 30),
(34, 'ça c\'est Toy Story....', '2021-04-26 13:32:03', 1, 30),
(36, 'Mais vous êtes ! ... Le Docteur !', '2021-04-26 13:38:42', 1, 9),
(38, 'check systems', '2021-04-28 09:25:27', 2, 8),
(39, 'check tchat manager', '2021-04-28 09:26:50', 2, 8),
(44, 'Mayday ! mayday ! Blackhole in the area !', '2021-04-28 18:05:44', 115, 4),
(49, 'Et voici venir les........barbapapas !', '2021-04-28 21:39:06', 115, 5),
(50, 'Cette zone est inexplorée', '2021-04-29 10:53:56', 4, 31),
(51, 'Tant mieux, pas de Daleks sur notre route', '2021-04-29 11:40:41', 3, 31),
(52, 'Hello Doc', '2021-05-01 12:09:03', 1, 30);

-- --------------------------------------------------------

--
-- Structure de la table `salon`
--

DROP TABLE IF EXISTS `salon`;
CREATE TABLE IF NOT EXISTS `salon` (
  `id_salon` int NOT NULL AUTO_INCREMENT,
  `nom_salon` varchar(50) NOT NULL,
  `ID` int DEFAULT NULL,
  PRIMARY KEY (`id_salon`),
  KEY `SALON_UTILISATEUR_FK` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salon`
--

INSERT INTO `salon` (`id_salon`, `nom_salon`, `ID`) VALUES
(1, 'Sirius', 1),
(2, 'Helix Nebula', 1),
(4, 'Altaïr', 2),
(5, 'Alpha centauri', 2),
(6, 'Procyon', 2),
(7, 'Sigma Draconis', 3),
(8, 'Delta Trianguli', 3),
(9, 'Gamma Serpentis', 3),
(30, 'Vega', 1),
(31, 'Orion', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url_avatar` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `nom`, `prenom`, `email`, `mot_de_passe`, `url_avatar`) VALUES
(1, 'Mad', 'USS Enterprise', 'mad@me.com', '$2y$10$VsgVdydC/Zgajue1.iUAweIS0N4jFfM8G.rsYQZcy/cnMWqbh94eq', 'uss_enterprise.jpg'),
(2, 'Sady', 'Discovery One', 'mady@me.com', '$2y$10$Ih7HGry4ITucr1dcyZgMb.AB71Ihqn7Q7Npm62NDoLErpTDjZqOqK', 'discovery_one.jpg\r\n'),
(3, 'Dr Who', 'Tardis', 'who@ami.com', '$2y$10$0f3YN11hsPIsIs0sbF.r3.C36JqDN1EPzXjDfZuAcP4nC66mrDQci', 'tardis.jpg\r\n'),
(4, 'The Mandalorian', 'Razor Crest', 'razor@crest.com', '$2y$10$8X8/tsjY7PHI2O7mJ9WJ5ur7napjfyPHCl0TOU.QDnDSPGG/NRaxG', 'razor_crest.jpeg'),
(5, 'Mel', 'Brands', 'mbrands4@globo.com', '$2y$10$HMtHggYZqK0pJyO7KqCbp.cuPT.mmVt4gCthszOFF5ijiqACf2lcG', 'http://dummyimage.com/109x100.png/5fa2dd/ffffff'),
(6, 'Daryle', 'Muckleston', 'dmuckleston5@psu.edu', '$2y$10$TGoPSfq0tJT3qY3dMpWoGujTHCcauwr8yhBolGYyR5WPrJonF4bFO', 'http://dummyimage.com/244x100.png/dddddd/000000'),
(7, 'Vevay', 'Bernadzki', 'vbernadzki6@microsoft.com', '$2y$10$nL3C3/lo8r1Cbl.UpAhbNeS0C6o7z.D46HT7iyoutbndSCOf3DLtS', 'http://dummyimage.com/143x100.png/cc0000/ffffff'),
(8, 'Ulrick', 'Yeldham', 'uyeldham7@i2i.jp', '$2y$10$GGnga1mQyalWZaDi25N0u.Pjs4sCJ.wViAJ9qtJO6YGdD8Syb/WfO', 'http://dummyimage.com/243x100.png/cc0000/ffffff'),
(9, 'Miquela', 'Fink', 'mfink8@unicef.org', '$2y$10$v0xDRQzLK0e.gB6leS3Bc.z82lejkL/tpYfoWx1CUwkwK2OjJEOhK', 'http://dummyimage.com/159x100.png/cc0000/ffffff'),
(10, 'Ruby', 'Bonsale', 'rbonsale9@cyberchimps.com', '$2y$10$mBszJy/yMJAi2.ZsieGxy.6qvp7XFVAduV4v3t2Ky8oDxrjB6ChyS', 'http://dummyimage.com/242x100.png/cc0000/ffffff'),
(11, 'Helsa', 'Heaphy', 'hheaphya@networkadvertising.org', '$2y$10$/za7hfiNJohpj6sjzKRawuKrooTsGg35wy0dtvt2H7zfy8gwTLHNG', 'http://dummyimage.com/133x100.png/ff4444/ffffff'),
(12, 'Laney', 'Rouzet', 'lrouzetb@toplist.cz', '$2y$10$gCzvOQK6VIOkyHbYVuZ7ju0Bpx1kdA04LPzN3zYHQ0KGnVZYPoSKa', 'http://dummyimage.com/166x100.png/cc0000/ffffff'),
(13, 'Marya', 'Almeida', 'malmeidac@blinklist.com', '$2y$10$VA1uNfH.A7PJQA8V/KZkj.0H.fefl3GxuaB3Q.a2p.EAX4r9Mf9d.', 'http://dummyimage.com/129x100.png/5fa2dd/ffffff'),
(14, 'Mack', 'Farrow', 'mfarrowd@wikimedia.org', '$2y$10$.EkzClaeUMLxDovukdFhRemqHeESH6teIjGKGaG6P0A6x8eKiNkp2', 'http://dummyimage.com/182x100.png/5fa2dd/ffffff'),
(15, 'Davie', 'Gillaspy', 'dgillaspye@ow.ly', '$2y$10$lgJRyTJNVWXmejIuJUiCpODJvywmI/2Zlk0IZIfxaoyjOeK0OuIwq', 'http://dummyimage.com/155x100.png/5fa2dd/ffffff'),
(16, 'Bobinette', 'Well', 'bwellf@live.com', '$2y$10$kPLxqfUNZaqn8yM98xy5VufhSmWRjixwEdGN6UGdj6vWMMJnPz1HC', 'http://dummyimage.com/170x100.png/5fa2dd/ffffff'),
(17, 'Vivianne', 'Canadas', 'vcanadasg@earthlink.net', '$2y$10$Z99I0lTLfHV0o5Va2KNOLeLEXwaIFWFlcKXDb6461aYIJRzW3y3Ey', 'http://dummyimage.com/121x100.png/dddddd/000000'),
(18, 'Angeline', 'Tyne', 'atyneh@archive.org', '$2y$10$U2mc2/5MtTC9HF3YUCMoPurJj.jPWbTqsezLpvekCaqL8ZWTagDY2', 'http://dummyimage.com/176x100.png/cc0000/ffffff'),
(19, 'Matt', 'Heaviside', 'mheavisidei@reverbnation.com', '$2y$10$TI1kN7zA5v3huEmtRBWouOChVjVHqHk1h2ml0.XPEj.6TVJnhEXEW', 'http://dummyimage.com/228x100.png/cc0000/ffffff'),
(20, 'Ameline', 'Bancroft', 'abancroftj@who.int', '$2y$10$qO9V5RHU7fEZymDeGiKxgOg0SlbR6hA4DHTZQR9/fhFgduOCym/W6', 'http://dummyimage.com/118x100.png/dddddd/000000'),
(104, 'dgdgg', 'dgdg', 'andreo@gmail.com', '$2y$10$Fq9egMXyQGR/Luh00tDMq.yH.dZyOhEQGOQUDtG4rEBwcffySQIL2', 'Abstrait NB .jpg'),
(105, 'mad', 'max', 'mad@max.com', '$2y$10$8.4a54h8KYmespzoxt02C.1ny/JmGyLFYeiEwFuZOar4rmx5QaJAG', 'aie 2.jpg'),
(106, 'lou', 'max', 'lou@max.com', '$2y$10$4eak1Fvv8nLvBVW7Jh2owuJTwJBzexMTjyViR.zRtZ46ZtzPyUPNW', 'aie 3.jpg'),
(108, 'mum', 'max', 'fanny.andreo@gmail.com', '$2y$10$j0rqfvs7ht5PzPe1mnpof.UtxPT7VQk1c3k4JjttqGwAc24H/wPGO', '2015 12 06 15-00.jpg'),
(113, 'ANDREO', 'Fanny', 'fay.andreo@gmail.com', '$2y$10$1Byca17T6U3Rf4hqkC2cbeo0GHSPqdGX.xpoiXKkLRqVFeX3oA8HS', 'aie 4.jpg'),
(115, 'lilly', 'vers l\'infini', 'lillysister@gmail.com', '$2y$10$MoXFkzX034j/Rrqau7aEpOPAfHq111a6LMGLKa4a4p3dfRu0E4AWu', '2015 12 06 15-00.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `MESSAGE_SALON0_FK` FOREIGN KEY (`id_salon`) REFERENCES `salon` (`id_salon`),
  ADD CONSTRAINT `MESSAGE_UTILISATEUR_FK` FOREIGN KEY (`ID`) REFERENCES `utilisateur` (`ID`);

--
-- Contraintes pour la table `salon`
--
ALTER TABLE `salon`
  ADD CONSTRAINT `SALON_UTILISATEUR_FK` FOREIGN KEY (`ID`) REFERENCES `utilisateur` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
