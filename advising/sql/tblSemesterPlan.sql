-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Host: webdb.uvm.edu
-- Generation Time: Sep 01, 2015 at 01:49 PM
-- Server version: 5.5.44-37.3-log
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: 'TWHITAKE_DATABASE_TESTER'
--

-- --------------------------------------------------------

--
-- Table structure for table 'tblSections'
--

DROP TABLE IF EXISTS tblSemesterPlan;
CREATE TABLE IF NOT EXISTS tblSemesterPlan (
fnkPlanId mediumint(8) NOT NULL PRIMARY KEY,
fldYear tinyint(4) DEFAULT NULL,
fldTerm tinyint(4) DEFAULT NULL,
fldCredits tinyint(3) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table 'tblSections'
--

INSERT INTO tblSemesterPlan (pmkSemesterPlanId, fnkPlanId, fldYear, fldTerm, fldCredits) VALUES
(123, 456, 2014, 1, 9),
(456, 789, 2015, 2, 12);
