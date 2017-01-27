-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 23 Janvier 2017 à 14:09
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  7.0.13

create database domisep_new2;
use domisep_new2;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `domisep_new2`
--

-- --------------------------------------------------------

--
-- Structure de la table `actuators`
--

CREATE TABLE `actuators` (
  `actuator_id` char(4) NOT NULL,
  `room_id` int(4) DEFAULT NULL,
  `actuator_name` varchar(50) DEFAULT NULL,
  `actuator_state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `actuators`
--

INSERT INTO `actuators` (`actuator_id`, `room_id`, `actuator_name`, `actuator_state`) VALUES
('1', 13, 'fan', 0),
('2', 13, 'window', 0),
('3', 13, 'shutter', 0),
('4', 13, 'heater', 26),
('5', 13, 'door', 0),
('6', 13, 'fan', 0);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_password` char(4) DEFAULT NULL,
  `admin_email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `home`
--

CREATE TABLE `home` (
  `home_id` char(4) NOT NULL,
  `home_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `home`
--

INSERT INTO `home` (`home_id`, `home_address`) VALUES
('13', NULL),
('11', '3 avenue daniel Lesueur'),
('12', '3, avenue Daniel Lesueur');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `room_id` int(4) NOT NULL,
  `owner_index` int(11) DEFAULT NULL,
  `room_name` varchar(50) DEFAULT NULL,
  `room_nbr` int(10) DEFAULT NULL,
  `room_surname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `room`
--

INSERT INTO `room` (`room_id`, `owner_index`, `room_name`, `room_nbr`, `room_surname`) VALUES
(4, 1, 'living', 1, NULL),
(6, 1, 'bed', 1, NULL),
(7, 2, 'bed', 1, NULL),
(8, 2, 'bed', 2, NULL),
(9, 1, 'kitchen', 1, NULL),
(10, 2, 'kitchen', 1, NULL),
(11, 2, 'bed', 3, NULL),
(12, 2, 'bath', 2, NULL),
(13, 1, 'bath', 1, 'BG');

-- --------------------------------------------------------

--
-- Structure de la table `sensors`
--

CREATE TABLE `sensors` (
  `sensor_id` int(4) NOT NULL,
  `room_id` int(4) DEFAULT NULL,
  `sensor_value` decimal(10,3) DEFAULT NULL,
  `sensor_name` varchar(50) DEFAULT NULL,
  `sensor_unit` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sensors`
--

INSERT INTO `sensors` (`sensor_id`, `room_id`, `sensor_value`, `sensor_name`, `sensor_unit`) VALUES
(2, 13, '1.000', 'Thermometer', NULL),
(3, 13, '1.000', 'Accelerometer', NULL),
(4, 13, '23.000', 'Accelerometer', NULL),
(5, 13, '23.000', 'Accelerometer', NULL),
(6, 13, '23.000', 'Accelerometer', NULL),
(7, 13, '23.000', 'Accelerometer', NULL),
(8, 13, '1.000', 'Accelerometer', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` char(4) NOT NULL,
  `home_id` char(4) DEFAULT NULL,
  `owner_index` int(11) DEFAULT NULL,
  `user_login` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` int(10) DEFAULT NULL,
  `user_email` varchar(200) DEFAULT NULL,
  `user_priviledge` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `home_id`, `owner_index`, `user_login`, `user_name`, `user_password`, `user_email`, `user_priviledge`) VALUES
('1', '11', 1, 'tim', 'Houdoyer Timothee', 23, 'timothee.houdoyer@gmail.com', 1),
('2', '12', 2, 'comelgtn', 'Houdoyer Timothee', 23, 'timothee.houdoyer@gmail.com', 1),
('3', '11', 1, 'tim_enfant', 'B2O', 23, NULL, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actuators`
--
ALTER TABLE `actuators`
  ADD PRIMARY KEY (`actuator_id`),
  ADD KEY `actuators_fk1` (`room_id`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`),
  ADD UNIQUE KEY `home_address` (`home_address`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD UNIQUE KEY `room_id` (`room_id`);

--
-- Index pour la table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`sensor_id`),
  ADD KEY `sensors_fk2` (`room_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `users_fk1` (`home_id`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actuators`
--
ALTER TABLE `actuators`
  ADD CONSTRAINT `actuators_fk1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sensors`
--
ALTER TABLE `sensors`
  ADD CONSTRAINT `sensors_fk2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE NO ACTION;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk1` FOREIGN KEY (`home_id`) REFERENCES `home` (`home_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
