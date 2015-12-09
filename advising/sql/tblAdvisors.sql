-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Host: webdb.uvm.edu
-- Generation Time: Sep 01, 2015 at 01:50 PM
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
-- Table structure for table 'tblTeachers'
--

DROP TABLE IF EXISTS tblAdvisors;
CREATE TABLE IF NOT EXISTS tblAdvisors (
  fldLastName varchar(100) NOT NULL,
  fldFirstName varchar(100) NOT NULL,
  pmkNetId varchar(12) NOT NULL,
  fldPhone varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table 'tblTeachers'
--

INSERT INTO tblAdvisors (fldLastName, fldFirstName, pmkNetId, fldPhone) VALUES
('Seidl', 'Amy L', '01aseidl', '6566033'),
('Prescott', 'Jody Mailand', '01jpresc', '6565935');

