-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 02 Août 2017 à 08:49
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cpus`
--

-- --------------------------------------------------------

--
-- Structure de la table `core`
--

CREATE TABLE IF NOT EXISTS `core` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `model` varchar(30) DEFAULT NULL,
  `manufacturer` varchar(20) DEFAULT NULL,
  `core_number` varchar(5) DEFAULT NULL,
  `l1_cache` varchar(10) DEFAULT NULL,
  `l2_cache` varchar(10) DEFAULT NULL,
  `l3_cache` varchar(10) DEFAULT NULL,
  `transistors` int(11) DEFAULT NULL,
  `datasheet` varchar(255) DEFAULT NULL,
  `microarchitecture_id` smallint(6) DEFAULT NULL,
  `family_id` smallint(6) DEFAULT NULL,
  `position` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `family_id` (`family_id`),
  KEY `microarchitecture_id` (`microarchitecture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Contenu de la table `core`
--

INSERT INTO `core` (`id`, `model`, `manufacturer`, `core_number`, `l1_cache`, `l2_cache`, `l3_cache`, `transistors`, `datasheet`, `microarchitecture_id`, `family_id`, `position`) VALUES
(10, 'P54C', 'Intel', '1', '16Ko', '', '', 3100000, '24199710-20151207141550.pdf', 5, 64, 4),
(11, 'P55C', 'Intel', '1', '32Ko', '', '', 4500000, '24318504-20151207141617.pdf', 5, 68, 8),
(12, 'M1', 'Cyrix/IBM/ST', '1', '16Ko', '', '', 3000000, '6xtbengl-20151207142644.pdf', 19, 64, 5),
(13, 'K5', 'AMD', '1', '24Ko', '', '', 4300000, 'AMD-K5 Processor Data Sheet (January 1997)-20151207142805.pdf', 18, 64, 7),
(14, 'M2 6x86MX', 'Cyrix/IBM/ST', '1', '64Ko', '', '', 6500000, 'document_fusionne-20151207152616.pdf', 19, 68, 9),
(15, 'K6 Model 6', 'AMD', '1', '64Ko', '', '', 8800000, 'datasheet-20151207143148.pdf', 20, 68, 10),
(16, 'K6 "Little Foot"', 'AMD', '1', '64Ko', '', '', 8800000, 'datasheet-20151207143326.pdf', 20, 68, 11),
(17, 'Chomper', 'AMD', '1', '64Ko', '', '', 9300000, 'AMD-K6-2-20151207144818.pdf', 24, 69, 16),
(18, 'Chomper Extended', 'AMD', '1', '64Ko', '', '', 9300000, 'AMD-K6-2-20151207144825.pdf', 24, 69, 17),
(19, 'Sharptooth', 'AMD', '1', '64Ko', '256Ko', '', 21400000, 'AMD-K6-III-20151207145034.pdf', 25, 69, 18),
(20, 'Klamath', 'Intel', '1', '32Ko', '512Ko', '', 7500000, '24333503-20151207141205.pdf', 6, 66, 19),
(21, 'Deschutes', 'Intel', '1', '32Ko', '512Ko', '', 7500000, '24333503-20151207141214.pdf', 6, 66, 20),
(22, 'Katmai', 'Intel', '1', '32Ko', '512Ko', '', 9500000, 'document_fusionne-20151207142424.pdf', 6, 67, 23),
(23, 'Pentium III Coppermine', 'Intel', '1', '32Ko', '256Ko', '', 28100000, 'document_fusionne-20151207142431.pdf', 6, 67, 24),
(24, 'Celeron Coppermine', 'Intel', '1', '32Ko', '128Ko', '', 28100000, '24365820-20151208140547.pdf', 6, 67, 25),
(25, 'Pentium III Tualatin', 'Intel', '1', '32Ko', '256Ko', '', 44000000, '24976503-20151208142533.pdf', 6, 67, 26),
(26, 'Pentium III-S Tualatin', 'Intel', '1', '32Ko', '512Ko', '', 44000000, '24965705-20151208143620.pdf', 6, 67, 27),
(27, 'Celeron Tualatin', 'Intel', '1', '32Ko', '256Ko', '', 44000000, '29859604-20151208143950.pdf', 6, 67, 28),
(28, 'Celeron Mendocino', 'Intel', '1', '32Ko', '128Ko', '', 7500000, '24365820-20151208144906.pdf', 6, 66, 22),
(29, 'Celeron Convington', 'Intel', '1', '32Ko', '', '', 7500000, '24365820-20151208145419.pdf', 6, 66, 21),
(30, 'P5', 'Intel', '1', '16Ko', '', '', 3100000, '243326-20151208150405.pdf', 5, 64, 3),
(31, 'Pentium Pro 256K', 'Intel', '1', '16Ko', '256Ko', '', 5500000, '24268935-20151208152547.pdf', 6, 65, 12),
(32, 'Pentium Pro 512K', 'Intel', '1', '16Ko', '512Ko', '', 5500000, '24268935-20151208152644.pdf', 6, 65, 13),
(33, 'Pentium Pro 1M', 'Intel', '1', '16Ko', '1Mo', '', 5500000, '24268935-20151208152757.pdf', 6, 65, 14),
(35, 'M1L', 'Cyrix/IBM/ST', '1', '16Ko', '', '', 3000000, '', 19, 64, 6),
(36, 'M II', 'Cyrix/IBM/ST', '1', '64Ko', '', '', 6500000, 'MII-20160107155521.pdf', 19, 69, 15),
(37, 'P24 "i486DX2"', 'Intel', '1', '8Ko', '', '', 1200000, '486DX2_Data_Sheet_Feb92-20160805112628.pdf', 4, 63, 1),
(38, 'P4T "i486DX4"', 'Intel', '1', '16Ko', '', '', 1600000, 'DSAIH00058144-20160921143911.pdf', 4, 63, 2),
(39, 'P23', 'Intel', '1', '8Ko', '', '', 1185000, '', 4, 63, 0);

-- --------------------------------------------------------

--
-- Structure de la table `core_instructionset`
--

CREATE TABLE IF NOT EXISTS `core_instructionset` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `core_id` smallint(6) DEFAULT NULL,
  `instructionset_id` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_id` (`core_id`),
  KEY `instructionset_id` (`instructionset_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Contenu de la table `core_instructionset`
--

INSERT INTO `core_instructionset` (`id`, `core_id`, `instructionset_id`) VALUES
(106, 20, 11),
(107, 21, 11),
(108, 11, 11),
(109, 22, 11),
(110, 22, 12),
(113, 15, 11),
(114, 16, 11),
(123, 17, 11),
(124, 17, 13),
(125, 18, 11),
(126, 18, 13),
(127, 19, 11),
(128, 19, 13),
(138, 23, 11),
(139, 23, 12),
(140, 24, 11),
(141, 24, 12),
(142, 25, 11),
(143, 25, 12),
(144, 26, 11),
(145, 26, 12),
(148, 28, 11),
(151, 27, 11),
(152, 27, 12),
(153, 29, 11),
(159, 14, 11),
(162, 36, 11);

-- --------------------------------------------------------

--
-- Structure de la table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `position` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Contenu de la table `family`
--

INSERT INTO `family` (`id`, `name`, `position`) VALUES
(62, '386', 0),
(63, '486', 1),
(64, 'Pentium/6x86/K5', 2),
(65, 'Pentium Pro', 4),
(66, 'Pentium II', 6),
(67, 'Pentium III', 7),
(68, 'Pentium MMX/6x86MX/K6', 3),
(69, 'M II/K6-2/K6-III', 5);

-- --------------------------------------------------------

--
-- Structure de la table `instructionset`
--

CREATE TABLE IF NOT EXISTS `instructionset` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  `note` varchar(255) NOT NULL,
  `position` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `instructionset`
--

INSERT INTO `instructionset` (`id`, `name`, `note`, `position`) VALUES
(11, 'MMX', 'MultiMedia eXtensions', 0),
(12, 'SSE', 'Streaming SIMD Extensions', 2),
(13, '3DNow!', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `microarchitecture`
--

CREATE TABLE IF NOT EXISTS `microarchitecture` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  `architecture` varchar(10) DEFAULT NULL,
  `position` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `microarchitecture`
--

INSERT INTO `microarchitecture` (`id`, `name`, `architecture`, `position`) VALUES
(1, 'i386', 'IA-32', 0),
(4, 'i486', 'IA-32', 1),
(5, 'P5', 'IA-32', 2),
(6, 'P6', 'IA-32', 6),
(18, 'K5', 'IA-32', 4),
(19, '6x86', 'IA-32', 3),
(20, 'K6', 'IA-32', 5),
(24, 'K6-2', 'IA-32', 7),
(25, 'K6-III', 'IA-32', 8),
(26, 'NetBurst', 'IA-32', 9),
(27, 'Core', 'IA-64', 10);

-- --------------------------------------------------------

--
-- Structure de la table `microprocessor`
--

CREATE TABLE IF NOT EXISTS `microprocessor` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `model` varchar(30) DEFAULT NULL,
  `intro_date` date DEFAULT NULL,
  `smp_process` smallint(6) DEFAULT NULL,
  `core_speed` int(11) DEFAULT NULL,
  `bus_speed` int(11) DEFAULT NULL,
  `clock_multiplier` float DEFAULT NULL,
  `core_voltage` varchar(10) DEFAULT NULL,
  `io_voltage` varchar(10) DEFAULT NULL,
  `tdp` float DEFAULT NULL,
  `speedsys_benchmark` float DEFAULT NULL,
  `doom_benchmark` float DEFAULT NULL,
  `core_id` smallint(6) DEFAULT NULL,
  `position` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `core_id` (`core_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=193 ;

--
-- Contenu de la table `microprocessor`
--

INSERT INTO `microprocessor` (`id`, `model`, `intro_date`, `smp_process`, `core_speed`, `bus_speed`, `clock_multiplier`, `core_voltage`, `io_voltage`, `tdp`, `speedsys_benchmark`, `doom_benchmark`, `core_id`, `position`) VALUES
(6, 'Pentium 60', '1993-03-22', 800, 60, 60, 1, '5', '5', 14.6, 0, 0, 30, 4),
(7, 'Pentium 66', '1993-03-22', 800, 66, 60, 1, '5', '5', 16, 0, 0, 30, 5),
(12, 'Pentium 75', '1994-10-10', 600, 75, 50, 1.5, '3.3', '3.3', 8, 0, 0, 10, 6),
(15, 'Pentium 90', '1994-03-07', 600, 90, 60, 1.5, '3.3', '3.3', 9, 67.2, 45.9, 10, 7),
(16, 'Pentium 100', '1994-03-07', 600, 100, 66, 1.5, '3.3', '3.3', 10.1, 0, 0, 10, 8),
(17, 'Pentium 120', '1995-03-27', 600, 120, 60, 2, '3.3', '3.3', 11.9, 89.59, 54, 10, 9),
(18, 'Pentium 133', '1995-06-12', 350, 133, 66, 2, '3.3', '3.3', 11.2, 0, 0, 10, 10),
(19, 'Pentium 150', '1996-01-04', 350, 150, 60, 2.5, '3.3', '3.3', 11.6, 0, 0, 10, 11),
(20, 'Pentium 166', '1996-01-04', 350, 166, 66, 2.5, '3.3', '3.3', 14.5, 0, 0, 10, 12),
(21, 'Pentium 200', '1996-06-10', 350, 200, 66, 2.5, '3.3', '3.3', 15.5, 149.24, 71.82, 10, 13),
(22, 'Pentium MMX 166', '1997-01-08', 350, 166, 66, 2.5, '2.8', '3.3', 13.1, 126.21, 76.8, 11, 36),
(23, 'Pentium MMX 200', '1997-01-08', 350, 200, 66, 2.5, '2.8', '3.3', 15.7, 151.45, 83.3, 11, 37),
(24, 'Pentium MMX 233', '1997-01-08', 350, 233, 66, 3, '2.8', '3.3', 17.9, 0, 0, 11, 38),
(25, 'AMD-K5-PR75', '1996-03-27', 500, 75, 50, 1.5, '3.525', '3.525', 11.8, 0, 0, 13, 25),
(26, 'AMD-K5-PR90', '1996-03-27', 500, 90, 60, 1.5, '3.525', '3.525', 14.3, 0, 0, 13, 26),
(27, 'AMD-K5-PR100', '1996-06-17', 350, 100, 66, 1.5, '3.525', '3.525', 15.8, 0, 0, 13, 27),
(28, 'AMD-K5-PR120', '1996-09-07', 350, 90, 60, 1.5, '3.525', '3.525', 12.6, 0, 0, 13, 28),
(29, 'AMD-K5-PR133', '1996-09-07', 350, 100, 66, 1.5, '3.525', '3.525', 14, 0, 0, 13, 29),
(30, 'AMD-K5-PR150', '1997-01-01', 350, 105, 60, 1.75, '3.525', '3.525', 0, 0, 0, 13, 30),
(31, 'AMD-K5-PR166', '1997-01-13', 350, 116, 66, 1.75, '3.525', '3.525', 16.4, 0, 0, 13, 31),
(35, 'AMD-K5-PR200', '0000-00-00', 350, 133, 66, 2, '5.252', '5.252', 0, 0, 0, 13, 32),
(36, 'AMD5k86-P75', '1996-03-27', 500, 75, 50, 1.5, '3.525', '3.525', 0, 0, 0, 13, 33),
(37, 'AMD5k86-P90', '1996-03-27', 500, 90, 60, 1.5, '3.525', '3.525', 0, 0, 0, 13, 34),
(38, 'AMD5k86-P100', '1996-06-17', 350, 100, 66, 1.5, '3.525', '3.525', 0, 0, 0, 13, 35),
(39, '6x86-P120+GP/6x86-100GP', '1996-02-05', 650, 100, 50, 2, '3.3/3.52', '3.3/3.52', 19.44, 0, 0, 12, 15),
(40, '6x86-P90+GP/6x86-80GP', '1996-02-05', 650, 80, 40, 2, '3.3/3.52', '3.3/3.52', 16.92, 0, 0, 12, 14),
(41, '6x86-P133+GP', '1996-02-05', 650, 110, 55, 2, '3.3/3.52', '3.3/3.52', 20.88, 0, 0, 12, 16),
(43, '6x86-P150+GP', '1996-02-05', 650, 120, 60, 2, '3.3/3.52', '3.3/3.52', 21.96, 0, 0, 12, 17),
(44, '6x86-P166+GP', '1996-02-05', 650, 133, 66, 2, '3.3/3.52', '3.3/3.52', 23.76, 0, 0, 12, 18),
(45, '6x86-P200+GP', '1996-06-03', 650, 150, 75, 2, '3.52', '3.52', 25.2, 0, 0, 12, 19),
(46, '6x86L-PR120+', '1996-02-05', 500, 100, 50, 2, '2.8', '3.3', 14.2, 0, 0, 35, 21),
(47, '6x86L-PR133+', '1996-02-05', 500, 110, 55, 2, '2.8', '3.3', 15.1, 0, 0, 35, 22),
(48, '6x86L-PR150+', '1996-02-05', 500, 120, 60, 2, '2.8', '3.3', 16, 0, 0, 35, 23),
(49, '6x86L-PR166+', '1996-02-05', 500, 133, 66, 2, '2.8', '3.3', 16.6, 88.4, 65.7, 35, 20),
(50, '6x86L-PR200+', '1996-06-03', 440, 150, 75, 2, '2.8', '3.3', 18.2, 0, 0, 35, 24),
(51, '6x86MX-PR166', '1997-05-30', 350, 133, 66, 2, '2.9', '3.3', 17.6, 0, 0, 14, 39),
(52, '6x86MX-PR200, 75 MHz Bus', '1997-05-30', 350, 150, 75, 2, '2.9', '3.3', 19.1, 0, 71.8, 14, 40),
(53, '6x86MX-PR200, 66 MHz Bus', '1997-05-30', 350, 166, 66, 2.5, '2.9', '3.3', 20.2, 0, 0, 14, 41),
(54, '6x86MX-PR233', '1997-05-30', 350, 188, 75, 2.5, '2.9', '3.3', 21.8, 0, 0, 14, 42),
(55, '6x86MX-PR266', '1998-03-19', 350, 208, 83, 2.5, '2.9', '3.3', 23, 0, 0, 14, 43),
(56, 'M II-233GP, 66 MHz Bus', '1998-01-01', 350, 200, 66, 3, '2.9', '3.3', 0, 0, 0, 36, 58),
(57, 'M II-200GP', '1998-01-01', 350, 166, 66, 2.5, '2.9', '3.3', 0, 0, 0, 36, 57),
(58, 'M II-266GP, 66 MHz Bus', '1998-01-01', 350, 200, 66, 3, '2.9', '3.3', 0, 0, 0, 36, 60),
(59, 'M II-233GP, 75 MHz Bus', '1998-01-01', 350, 188, 75, 2.5, '2.9', '3.3', 0, 0, 0, 36, 59),
(60, 'M II-266GP, 83 MHz Bus', '1998-01-01', 350, 207, 83, 2.5, '2.9', '3.3', 0, 0, 0, 36, 61),
(61, 'M II-300GP, 66 MHz Bus', '1998-01-01', 350, 233, 66, 3.5, '2.9', '3.3', 0, 0, 86.2, 36, 62),
(62, 'M II-300GP, 75 MHz Bus', '1998-01-01', 350, 225, 75, 3, '2.9', '3.3', 0, 0, 0, 36, 63),
(63, 'M II-333GP, 66 MHz Bus', '1999-01-01', 350, 264, 66, 4, '2.9', '3.3', 0, 0, 0, 36, 64),
(64, 'M II-333GP, 75 MHz Bus', '1999-01-01', 350, 265, 75, 3.5, '2.9', '3.3', 0, 0, 0, 36, 65),
(65, 'M II-366GP, 100 MHz Bus', '1999-01-01', 350, 250, 100, 2.5, '2.9', '3.3', 0, 0, 0, 36, 67),
(66, 'M II-350GP', '1999-01-01', 350, 250, 83, 3, '2.9', '3.3', 0, 0, 0, 36, 66),
(67, 'M II-400GP', '1999-01-01', 350, 385, 95, 3, '2.2', '3.3', 0, 0, 0, 36, 68),
(68, 'AMD-K6-166', '1997-04-02', 350, 166, 66, 2.5, '2.9', '3.3', 17.2, 0, 0, 15, 44),
(69, 'AMD-K6-200', '1997-04-02', 350, 200, 66, 2.5, '2.9', '3.3', 20, 0, 0, 15, 45),
(70, 'AMD-K6-233', '1997-04-02', 350, 233, 66, 3, '3.2', '3.3', 28.3, 0, 0, 15, 46),
(71, 'AMD-K6-200 Model 7', '1998-01-06', 250, 200, 66, 3, '2.2', '3.3', 12.45, 0, 0, 16, 47),
(72, 'AMD-K6-233 Model 7', '1998-01-06', 250, 233, 66, 3.5, '2.2', '3.3', 13.5, 0, 0, 16, 48),
(73, 'AMD-K6-266 Model 7', '1998-01-06', 250, 266, 66, 4, '2.2', '3.3', 14.55, 0, 0, 16, 49),
(74, 'AMD-K6-300 Model 7', '1998-04-07', 250, 300, 66, 4.5, '2.2', '3.3', 15.4, 0, 0, 16, 50),
(75, 'AMD-K6-2/266', '1998-05-28', 250, 266, 66, 4, '2.2', '3.3', 14.7, 0, 0, 17, 69),
(76, 'AMD-K6-2/300, 100MHz Bus', '1998-05-28', 250, 300, 100, 3, '2.2', '3.3', 17.2, 344.18, 97.5, 17, 71),
(77, 'AMD-K6-2/300, 66MHz Bus', '1998-05-28', 250, 300, 66, 4.5, '2.2', '3.3', 17.2, 0, 0, 17, 70),
(78, 'AMD-K6-2/333, 66MHz Bus', '1998-05-28', 250, 333, 66, 5, '2.2', '3.3', 19, 0, 0, 17, 72),
(79, 'AMD-K6-2/333, 95MHz Bus', '1998-11-16', 250, 333, 95, 3.5, '2.2', '3.3', 19, 0, 0, 18, 74),
(80, 'AMD-K6-2/350', '1998-08-27', 0, 350, 100, 3.5, '2.2', '3.3', 19.95, 0, 0, 17, 73),
(81, 'AMD-K6-2/366', '1998-11-16', 250, 366, 66, 5.5, '2.2', '3.3', 20.8, 0, 0, 18, 75),
(82, 'AMD-K6-2/380', '1998-11-16', 250, 380, 95, 4, '2.2', '3.3', 21.6, 435.97, 99.3, 18, 76),
(83, 'AMD-K6-2/400', '1998-11-16', 250, 400, 100, 4, '2.2', '3.3', 22.7, 0, 0, 18, 77),
(84, 'AMD-K6-2/450', '1999-02-26', 250, 450, 100, 4.5, '2.2/2.4', '3.3', 28.4, 516.31, 0, 18, 78),
(86, 'AMD-K6-2/475', '1999-04-05', 250, 475, 95, 5, '2.2/2.4', '3.3', 29.6, 0, 0, 18, 79),
(88, 'AMD-K6-2/500', '1999-08-30', 250, 500, 100, 5, '2.2', '3.3', 20.75, 0, 0, 18, 80),
(89, 'AMD-K6-2/533', '1999-11-29', 250, 533, 97, 5.5, '2.2', '3.3', 0, 0, 0, 18, 81),
(90, 'AMD-K6-2/550', '2000-02-22', 250, 550, 100, 5.5, '2.3', '3.3', 25, 631.03, 0, 18, 82),
(91, 'AMD-K6-III/400', '1999-02-26', 250, 400, 100, 4.5, '2.4', '3.3', 26.8, 458.98, 0, 19, 83),
(92, 'AMD-K6-III/450', '1999-05-13', 250, 450, 100, 4.5, '2.4', '3.3', 29.5, 0, 0, 19, 84),
(93, 'Pentium Pro 150', '1995-11-01', 350, 150, 60, 2.5, '3.1', '3.1', 29.2, 0, 0, 31, 51),
(94, 'Pentium Pro 166', '1995-11-01', 350, 166, 66, 2.5, '3.3', '3.3', 35, 0, 0, 32, 54),
(95, 'Pentium Pro 180', '1995-11-01', 350, 180, 60, 3, '3.3', '3.3', 31.7, 0, 0, 31, 52),
(96, 'Pentium Pro 200', '1995-11-01', 350, 200, 66, 3, '3.3', '3.3', 35, 0, 0, 31, 53),
(97, 'Pentium Pro 200', '1995-11-01', 350, 200, 66, 3, '3.3', '3.3', 37.9, 0, 0, 32, 55),
(98, 'Pentium Pro 200', '1995-11-01', 350, 200, 66, 3, '3.3', '3.3', 44, 0, 0, 33, 56),
(99, 'Pentium II 233', '1997-05-07', 350, 233, 66, 3.5, '2.8', '3.3', 34.8, 0, 0, 20, 85),
(100, 'Pentium II 266', '1997-05-07', 350, 266, 66, 4, '2.8', '3.3', 38.2, 0, 0, 20, 86),
(101, 'Pentium II 300', '1997-05-07', 350, 300, 66, 4.5, '2.8', '3.3', 43, 0, 0, 20, 87),
(102, 'Pentium II 333', '1998-01-26', 250, 333, 66, 5, '2', '3.3', 20.6, 0, 0, 21, 88),
(103, 'Pentium II 350', '1998-04-15', 250, 350, 100, 3.5, '2', '3.3', 21.5, 0, 0, 21, 89),
(104, 'Pentium II 400', '1998-04-15', 250, 400, 100, 4, '2', '3.3', 24.3, 0, 0, 21, 90),
(105, 'Pentium II 450', '1998-08-24', 250, 450, 100, 4.5, '2', '3.3', 27.1, 0, 0, 21, 91),
(106, 'Celeron 266 cacheless', '1998-04-15', 250, 266, 66, 4, '2', '3.3', 16.59, 0, 0, 29, 92),
(107, 'Celeron 300 cacheless', '1998-06-08', 250, 300, 66, 4.5, '2', '3.3', 18.48, 0, 0, 29, 93),
(108, 'Celeron 300A', '1998-08-24', 250, 300, 66, 4.5, '2', '3.3', 19.05, 0, 0, 28, 94),
(109, 'Celeron 333', '1998-08-24', 250, 333, 66, 5, '2', '3.3', 19.7, 386.89, 78.79, 28, 96),
(110, 'Celeron 366', '1999-01-04', 250, 366, 66, 5.5, '2', '3.3', 21.7, 0, 0, 28, 97),
(111, 'Celeron 400', '1999-01-04', 250, 400, 66, 6, '2', '3.3', 23.7, 0, 0, 28, 98),
(112, 'Celeron 433', '1999-03-22', 250, 433, 66, 6.5, '2', '3.3', 24.1, 0, 0, 28, 99),
(113, 'Celeron 300', '1998-08-24', 250, 300, 66, 4.5, '2', '3.3', 19.05, 0, 0, 28, 95),
(114, 'Celeron 466', '1999-08-02', 250, 466, 66, 7, '2', '3.3', 25.7, 0, 0, 28, 100),
(115, 'Celeron 500', '1999-08-02', 250, 500, 66, 7.5, '2', '3.3', 27.2, 0, 0, 28, 101),
(116, 'Celeron 533', '2000-01-04', 250, 533, 66, 8, '2', '3.3', 28.3, 0, 0, 28, 102),
(117, 'Pentium III 450', '1999-02-26', 250, 450, 100, 4.5, '2', '3.3', 25.3, 0, 0, 22, 103),
(118, 'Pentium III 500', '1999-02-26', 250, 500, 100, 5, '2', '3.3', 28, 577.51, 123.66, 22, 104),
(119, 'Pentium III 533B', '1999-09-27', 250, 533, 133, 4, '2', '3.3', 29.7, 0, 0, 22, 105),
(120, 'Pentium III 550', '1999-05-17', 250, 550, 100, 5.5, '2', '3.3', 30.8, 0, 0, 22, 106),
(121, 'Pentium III 600', '1999-08-02', 250, 600, 100, 6, '2.05', '3.3', 34.5, 0, 0, 22, 107),
(122, 'Pentium III 600B', '1999-09-27', 250, 600, 133, 4.5, '2.05', '3.3', 34.5, 0, 0, 22, 108),
(123, 'Pentium III 500E', '1999-10-25', 180, 500, 100, 5, '1.6', '3.3', 13.2, 0, 0, 23, 109),
(124, 'Pentium III 533EB', '1999-10-25', 180, 533, 133, 4, '1.65', '3.3', 14, 0, 0, 23, 110),
(125, 'Pentium III 550E', '1999-10-25', 180, 550, 100, 5.5, '1.65', '3.3', 14.5, 0, 0, 23, 111),
(126, 'Pentium III 600E', '1999-10-25', 180, 600, 100, 6, '1.65', '3.3', 15.8, 0, 0, 23, 112),
(127, 'Pentium III 600EB', '1999-10-25', 180, 600, 133, 4.5, '1.65', '3.3', 15.8, 0, 0, 23, 113),
(128, 'Pentium III 650', '1999-10-25', 180, 650, 100, 6.5, '1.65', '3.3', 17, 0, 0, 23, 114),
(129, 'Pentium III 667', '1999-10-25', 180, 667, 133, 5, '1.65', '3.3', 17.5, 0, 0, 23, 115),
(130, 'Pentium III 700', '1999-10-25', 180, 700, 100, 7, '1.65', '3.3', 18.3, 0, 0, 23, 116),
(131, 'Pentium III 733', '1999-10-25', 180, 733, 133, 5.5, '1.65/1.7', '3.3', 19.1, 0, 0, 23, 117),
(132, 'Pentium III 750', '1999-12-20', 180, 750, 100, 7.5, '1.65', '3.3', 19.5, 0, 0, 23, 118),
(133, 'Pentium III 800', '1999-12-20', 180, 800, 100, 8, '1.65/1.7', '3.3', 20.8, 0, 0, 23, 119),
(145, 'Pentium III 800EB', '1999-12-20', 180, 800, 133, 6, '1.65', '3.3', 20.8, 0, 0, 23, 120),
(146, 'Pentium III 850', '2000-03-20', 180, 800, 100, 8.5, '1.65', '3.3', 25.7, 0, 0, 23, 121),
(147, 'Pentium III 866', '2000-03-20', 180, 866, 133, 6.5, '1.65', '3.3', 22.5, 0, 0, 23, 122),
(148, 'Pentium III 900', '2000-10-01', 180, 900, 100, 9, '1.7', '3.3', 28.9, 0, 0, 23, 123),
(149, 'Pentium III 933', '2000-05-24', 180, 933, 133, 7, '1.7', '3.3', 24.5, 0, 0, 23, 124),
(150, 'Pentium III 1000', '2000-03-08', 180, 1000, 100, 10, '1.75', '3.3', 29, 0, 0, 23, 125),
(151, 'Pentium III 1000EB', '2000-03-08', 180, 1000, 133, 7.5, '1.7', '3.3', 26.1, 0, 0, 23, 126),
(152, 'Pentium III 1100', '2000-06-01', 180, 1100, 100, 11, '1.75', '3.3', 33, 0, 0, 23, 127),
(153, 'Pentium III 1133', '2000-07-31', 180, 1133, 133, 8.5, '1.75', '3.3', 29.1, 0, 0, 23, 128),
(154, 'Celeron 533A', '2000-03-29', 180, 533, 66, 8, '1.5/1.7', '3.3', 11.2, 0, 0, 24, 129),
(155, 'Celeron 566', '2000-03-29', 180, 566, 66, 8.5, '1.5/1.75', '3.3', 11.9, 0, 0, 24, 130),
(157, 'Celeron 600', '2000-03-29', 180, 600, 66, 9, '1.5/1.75', '3.3', 12.6, 0, 0, 24, 131),
(158, 'Celeron 633', '2000-06-26', 180, 633, 66, 9.5, '1.65/1.75', '3.3', 16.5, 0, 0, 24, 132),
(159, 'Celeron 667', '2000-06-26', 180, 667, 66, 10, '1.65/1.75', '3.3', 17.5, 0, 0, 24, 133),
(160, 'Celeron 700', '2000-06-26', 180, 700, 66, 10.5, '1.65/1.75', '3.3', 18.3, 0, 0, 24, 134),
(161, 'Celeron 733', '2000-11-13', 180, 733, 66, 11, '1.65/1.75', '3.3', 19.1, 0, 0, 24, 135),
(162, 'Celeron 766', '2000-11-13', 180, 766, 66, 11.5, '1.65/1.75', '3.3', 20, 0, 0, 24, 136),
(163, 'Celeron 800', '2001-01-01', 180, 800, 100, 8, '1.65/1.75', '3.3', 24.5, 0, 0, 24, 137),
(164, 'Celeron 850', '2001-04-09', 180, 850, 100, 8.5, '1.7/1.75', '3.3', 25.7, 0, 0, 24, 138),
(165, 'Celeron 900', '2001-07-01', 180, 900, 100, 9, '1.75', '3.3', 26.7, 0, 0, 24, 139),
(166, 'Celeron 950', '2001-08-31', 180, 950, 100, 9.5, '1.75', '3.3', 28, 0, 0, 24, 140),
(167, 'Celeron 1000', '2001-08-31', 180, 1000, 100, 10, '1.75', '3.3', 29, 0, 0, 24, 141),
(168, 'Celeron 1100', '2001-08-31', 180, 1100, 100, 11, '1.75', '3.3', 33, 0, 0, 24, 142),
(169, '486 DX2 66', '1992-08-10', 800, 66, 33, 2, '5', '5', 5, 24.88, 21, 37, 2),
(190, '486 DX4ODPR100', '1995-07-01', 600, 100, 33, 3, '5', '5', 0, 38.7, 26.4, 38, 3),
(191, '486 DX2 50', '1992-03-03', 800, 50, 25, 2, '5', '5', 4, 0, 0, 37, 1),
(192, '486 SX 33', '1992-09-21', 1000, 33, 33, 1, '5', '5', 2, 0, 0, 39, 0);

-- --------------------------------------------------------

--
-- Structure de la table `serialnumber`
--

CREATE TABLE IF NOT EXISTS `serialnumber` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `fpo_number` varchar(20) DEFAULT NULL,
  `part_number` varchar(25) NOT NULL,
  `top_picture` varchar(255) DEFAULT NULL,
  `other_picture` varchar(255) DEFAULT NULL,
  `package` varchar(30) DEFAULT NULL,
  `microprocessor_id` smallint(6) DEFAULT NULL,
  `tested` varchar(7) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `position` smallint(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `microprocessor_id` (`microprocessor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Contenu de la table `serialnumber`
--

INSERT INTO `serialnumber` (`id`, `fpo_number`, `part_number`, `top_picture`, `other_picture`, `package`, `microprocessor_id`, `tested`, `note`, `position`) VALUES
(68, '86030089-0770', 'A8050275-SX969', 'IMG_0896r-20160211140118.JPG', 'IMG_0898r-20160224111741.JPG', 'Ceramic PGA', 12, 'Yes/OK', '', 2),
(69, 'L6010047-1898', 'A80502100-SX963', 'IMG_0900r-20160211140439.JPG', 'IMG_0902r-20160224111816.JPG', 'Ceramic PGA', 16, 'Yes/OK', '', 4),
(70, 'L6411244-1064', 'A80502120-SY062', 'IMG_0904r-20160211140550.JPG', 'IMG_0906r-20160224111902.JPG', 'Ceramic PGA', 17, 'Yes/OK', '', 6),
(71, 'L6373466-3729', 'A80502133-SY022', 'IMG_0908r-20160211140726.JPG', 'IMG_0910r-20160224112054.JPG', 'Ceramic PGA', 18, 'Yes/OK', '', 7),
(72, 'C6480967-1775', 'A80502133-SY022', 'IMG_0912r-20160211140822.JPG', 'IMG_0914r-20160224112113.JPG', 'Ceramic PGA', 18, 'Yes/OK', '', 8),
(73, 'C6500790-1078', 'FV80502166-SY037', 'IMG_0916r-20160211141025.JPG', 'IMG_0918r-20160224112127.JPG', 'Plastic PGA', 20, 'Yes/OK', '', 9),
(74, 'L6335696', 'BP80502120-SU100', 'IMG_0920r-20160211141433.JPG', 'IMG_0922r-20160224111824.JPG', 'Ceramic PGA', 17, 'Yes/OK', '', 5),
(75, 'E4404784AB', 'A80502-90-SX957', 'IMG_0928r-20160211141607.JPG', 'IMG_0930r-20160224111750.JPG', 'Ceramic PGA Gold heatspreader', 15, 'Yes/OK', '', 3),
(76, 'L8031733-0605', 'BP80503200-SL23W', 'IMG_0932r-20160211141812.JPG', 'IMG_0934r-20160224112813.JPG', 'Plastic PGA', 23, 'Yes/OK', 'Heatsink removed', 16),
(80, 'F 9636CPA', 'AMD-K5 PR100', 'IMG_0936r-20160212102406.JPG', 'IMG_0938r-20160224112306.JPG', 'Ceramic PGA', 27, 'No', '', 13),
(81, 'A 9839MPM', 'AMD-K6-2/300AFR', 'IMG_0940r-20160212102845.JPG', 'IMG_0942r-20160224112852.JPG', 'Ceramic PGA', 76, 'Yes/OK', '', 19),
(82, 'A 9901MPM', 'AMD-K6-2/380AFR', 'IMG_0944r-20160212103013.JPG', 'IMG_0946r-20160224112903.JPG', 'Ceramic PGA', 82, 'Yes/OK', '', 20),
(83, 'A 0040MPMW', 'AMD-K6-2/550AGR', 'IMG_1539r-20170730235910.JPG', 'IMG_1540r-20170730235910.JPG', 'Ceramic PGA', 90, 'Yes/OK', '', 21),
(84, '88020095-0631', 'A80503166-SL27K', 'IMG_0964r-20160220221056.JPG', 'IMG_0966r-20160224112449.JPG', 'Ceramic PGA', 22, 'Yes/OK', '', 14),
(85, '87320090-13396', 'A80503166-SL27K', 'IMG_0972r-20160220221809.JPG', 'IMG_0974r-20160224112506.JPG', 'Ceramic PGA', 22, 'Yes/OK', '', 15),
(86, '01L3186 PQ', 'IBM26x86MX-AVAPR200G', 'IMG_0960r-20160220233905.JPG', 'IMG_0962r-20160224112828.JPG', 'Ceramic PGA Gold heatspreader', 52, 'Yes/OK', 'Speedsys failed', 17),
(87, '88H3468 PQ', 'IBM266x86L-2VAP166GB', 'IMG_0956r-20160221000402.JPG', 'IMG_0958r-20160224112248.JPG', 'Ceramic PGA Gold heatspreader', 49, 'Yes/OK', '', 12),
(88, 'V7SH7851AV', 'M II-300GP', 'IMG_0968r-20160221002308.JPG', 'IMG_0970r-20160224112836.JPG', 'Ceramic PGA Gold heatspreader', 61, 'Yes/OK', 'Speedsys failed', 18),
(89, 'L7332218-0341', 'FV80502200-SY045', 'IMG_1071r-20160221221248.JPG', 'IMG_1072r-20160224112151.JPG', 'Plastic PGA', 21, 'Yes/OK', '', 10),
(90, '88H1547 PQ', 'IBM266X86-2V2P150GE', 'IMG_0952r-20160221222140.JPG', 'IMG_0954r-20160224112235.JPG', 'Ceramic PGA Gold heatspreader', 43, 'No', '', 11),
(91, '09370559-0360', '500/512/100/2.0V S1 SL35E', 'IMG_1077r-20160317224344.JPG', '', 'SECC 2', 118, 'Yes/OK', '', 22),
(92, '19470276-0134', '500/512/100/2.0V S1 SL35E', 'IMG_1082r-20161003142804.JPG', '', 'SECC 2', 118, 'Yes/OK', '', 23),
(93, 'C4420577', 'A80486DX2-66', 'IMG_0888r-20160920153416.JPG', 'IMG_0890r-20160920153416.JPG', 'Ceramic PGA', 169, 'Yes/OK', '', 0),
(94, 'C6160644', 'DX4ODPR100', 'IMG_1217r-20160920164751.jpg', 'IMG_1219r-20160920164751.jpg', 'Ceramic PGA', 190, 'Yes/OK', '', 1),
(95, '94432936AA', 'A80501-66-SX950', 'IMG_1528r-20170730233841.JPG', 'IMG_1531r-20170730233841.JPG', 'Ceramic PGA Gold heatspreader', 7, 'Yes/OK', '', 24),
(96, 'A 9950MPM', 'AMD-K6-2/450AFX', 'IMG_1536r-20170730234815.JPG', 'IMG_1537r-20170730234815.JPG', 'Ceramic PGA', 84, 'Yes/OK', '', 25),
(97, 'B 9930CPDW', 'AMD-K6-III/400/AHX', 'IMG_1542r-20170731000627.JPG', 'IMG_1543r-20170731000627.JPG', 'Ceramic PGA', 91, 'Yes/OK', '', 26),
(98, 'N/C', 'A80486DX2-66', 'IMG_1545r-20170731001142.JPG', 'IMG_1546r-20170731001142.JPG', 'Ceramic PGA', 169, 'Yes/OK', '', 27),
(99, 'N/C', 'N/C', 'IMG_1551r-20170731002824.JPG', '', 'SECC', 109, 'Yes/OK', '', 28),
(100, 'L4220442', 'A80486SX-33', 'IMG_0924r-20170731003415.JPG', 'IMG_0926r-20170731003415.JPG', 'Ceramic PGA', 192, 'Yes/OK', '', 29),
(101, 'N/C', 'A80486DX2-50', 'IMG_0892r-20170731003527.JPG', 'IMG_0894r-20170731003527.JPG', 'Ceramic PGA', 191, 'Yes/OK', '', 30);

-- --------------------------------------------------------

--
-- Structure de la table `serialnumber_socket`
--

CREATE TABLE IF NOT EXISTS `serialnumber_socket` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `serialnumber_id` smallint(6) DEFAULT NULL,
  `socket_id` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `socket_id` (`socket_id`),
  KEY `serialnumber_id` (`serialnumber_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=604 ;

--
-- Contenu de la table `serialnumber_socket`
--

INSERT INTO `serialnumber_socket` (`id`, `serialnumber_id`, `socket_id`) VALUES
(521, 68, 1),
(522, 68, 5),
(523, 75, 1),
(524, 75, 5),
(525, 69, 1),
(526, 69, 5),
(527, 74, 1),
(528, 74, 5),
(529, 70, 1),
(530, 70, 5),
(531, 71, 1),
(532, 71, 5),
(533, 71, 18),
(534, 72, 1),
(535, 72, 5),
(536, 72, 18),
(537, 73, 5),
(538, 73, 18),
(539, 89, 5),
(540, 89, 18),
(544, 90, 1),
(545, 90, 5),
(546, 87, 1),
(547, 87, 5),
(548, 87, 18),
(549, 80, 1),
(550, 84, 5),
(551, 84, 18),
(552, 85, 5),
(553, 85, 18),
(554, 76, 5),
(555, 76, 18),
(556, 86, 5),
(557, 86, 18),
(558, 88, 18),
(559, 81, 18),
(560, 82, 18),
(566, 91, 15),
(570, 93, 20),
(571, 93, 21),
(572, 93, 22),
(573, 94, 20),
(574, 94, 21),
(575, 94, 22),
(576, 92, 15),
(578, 95, 16),
(582, 96, 18),
(583, 83, 18),
(584, 97, 18),
(588, 98, 20),
(589, 98, 21),
(590, 98, 22),
(591, 99, 15),
(595, 100, 20),
(596, 100, 21),
(597, 100, 22),
(601, 101, 20),
(602, 101, 21),
(603, 101, 22);

-- --------------------------------------------------------

--
-- Structure de la table `socket`
--

CREATE TABLE IF NOT EXISTS `socket` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `intro_date` date DEFAULT NULL,
  `package` varchar(10) DEFAULT NULL,
  `pin_count` int(11) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `position` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `socket`
--

INSERT INTO `socket` (`id`, `name`, `intro_date`, `package`, `pin_count`, `size`, `note`, `position`) VALUES
(1, 'Socket 5', '1994-03-01', 'PGA', 320, '4.95 x 4.95cm', '', 4),
(5, 'Socket 7', '1995-06-01', 'PGA', 321, '4.95 x 4.95cm', '', 5),
(15, 'Slot 1', '1997-05-01', 'SLOT', 242, '13.29cm', '', 8),
(16, 'Socket 4', '1993-03-01', 'PGA', 273, '5.49 x 5.49cm', '', 3),
(17, 'Socket 8', '1995-11-01', 'PGA/IPGA', 387, '6.76 x 6.25cm', '', 7),
(18, 'SuperSocket 7', '1998-05-01', 'PGA', 321, '4.95 x 4.95cm', '', 6),
(19, 'Socket 370', '1998-08-01', 'PGA', 370, '4.95 x 4.95cm', '', 9),
(20, 'Socket 1', '0000-00-01', 'PGA', 169, '4.45 x 4.45cm', 'First standard Intel 486 socket', 0),
(21, 'Socket 2', '0000-00-01', 'PGA', 238, '4.45 x 4.45cm', 'Added support for Pentium OverDrive', 1),
(22, 'Socket 3', '0000-00-01', 'PGA', 237, '4.45 x 4.45cm', 'Added support for 3.3V processors', 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `core`
--
ALTER TABLE `core`
  ADD CONSTRAINT `core_ibfk_1` FOREIGN KEY (`family_id`) REFERENCES `family` (`id`),
  ADD CONSTRAINT `core_ibfk_2` FOREIGN KEY (`microarchitecture_id`) REFERENCES `microarchitecture` (`id`);

--
-- Contraintes pour la table `core_instructionset`
--
ALTER TABLE `core_instructionset`
  ADD CONSTRAINT `core_instructionset_ibfk_1` FOREIGN KEY (`core_id`) REFERENCES `core` (`id`),
  ADD CONSTRAINT `core_instructionset_ibfk_2` FOREIGN KEY (`instructionset_id`) REFERENCES `instructionset` (`id`);

--
-- Contraintes pour la table `microprocessor`
--
ALTER TABLE `microprocessor`
  ADD CONSTRAINT `microprocessor_ibfk_1` FOREIGN KEY (`core_id`) REFERENCES `core` (`id`);

--
-- Contraintes pour la table `serialnumber`
--
ALTER TABLE `serialnumber`
  ADD CONSTRAINT `serialnumber_ibfk_1` FOREIGN KEY (`microprocessor_id`) REFERENCES `microprocessor` (`id`);

--
-- Contraintes pour la table `serialnumber_socket`
--
ALTER TABLE `serialnumber_socket`
  ADD CONSTRAINT `serialnumber_socket_ibfk_1` FOREIGN KEY (`serialnumber_id`) REFERENCES `serialnumber` (`id`),
  ADD CONSTRAINT `serialnumber_socket_ibfk_2` FOREIGN KEY (`socket_id`) REFERENCES `socket` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
