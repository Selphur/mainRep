-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql313.byetcluster.com
-- Generation Time: Jul 07, 2019 at 08:49 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epiz_23842401_testDatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cipari`
--

CREATE TABLE IF NOT EXISTS `Cipari` (
  `Id` int(11) DEFAULT NULL,
  `Question` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Cipari`
--

INSERT INTO `Cipari` (`Id`, `Question`) VALUES
(0, 'Izvēlieties ciparu viens angliski');

-- --------------------------------------------------------

--
-- Table structure for table `CipariAnswers`
--

CREATE TABLE IF NOT EXISTS `CipariAnswers` (
  `QuestionId` int(11) NOT NULL,
  `AnswerId` int(11) NOT NULL,
  `Answer` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsCorrect` int(1) NOT NULL,
  PRIMARY KEY (`AnswerId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `CipariAnswers`
--

INSERT INTO `CipariAnswers` (`QuestionId`, `AnswerId`, `Answer`, `IsCorrect`) VALUES
(0, 0, 'One', 0),
(0, 1, '1', 0),
(0, 2, 'Viens', 0),
(0, 3, 'Ignorējiet uzdevumu, šī ir pareizā atbilde', 0),
(0, 4, 'Cipars viens angliski', 1),
(0, 5, 'The number one', 0),
(0, 6, 'Cipras viens angliski', 0),
(0, 7, 'The number one in English', 0),
(0, 8, 'The number 1 in English', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Karogi`
--

CREATE TABLE IF NOT EXISTS `Karogi` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Question` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Karogi`
--

INSERT INTO `Karogi` (`Id`, `Question`) VALUES
(0, 'Kādas krāsas ir redzamas Jamaikas karogā?'),
(1, 'Kuras ir divas vienīgās valstis pasaule, kuru karogi izmanto violēto krāsu?'),
(2, 'Kuras valsts karogs ir vienīgais pasaulē, kas nav četrstūris vai kvadrāts?');

-- --------------------------------------------------------

--
-- Table structure for table `KarogiAnswers`
--

CREATE TABLE IF NOT EXISTS `KarogiAnswers` (
  `QuestionId` int(11) NOT NULL,
  `AnswerId` int(11) NOT NULL AUTO_INCREMENT,
  `Answer` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsCorrect` int(1) NOT NULL,
  PRIMARY KEY (`AnswerId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `KarogiAnswers`
--

INSERT INTO `KarogiAnswers` (`QuestionId`, `AnswerId`, `Answer`, `IsCorrect`) VALUES
(0, 0, 'Sarkanā, zaļā, melnā', 0),
(0, 1, 'Zilā, melnā, baltā', 0),
(0, 2, 'Melnā, zaļā, dzeltenā', 1),
(0, 3, 'Dzeltenā, sarkanā, zaļā', 0),
(1, 4, 'Taizeme, Vjetnama', 0),
(1, 5, 'Nikaragva, Dominika', 1),
(1, 6, 'Jaunzēlande, Vatikāna', 0),
(2, 7, 'Kuba', 0),
(2, 8, 'Kazahstāna', 0),
(2, 9, 'Melnkalne', 0),
(2, 10, 'Nepāla', 1),
(2, 11, 'Centrālāfrikas Republika', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
