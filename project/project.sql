-- phpMyAdmin SQL Dump::version 3.4.10.1
-- Host: http://184.169.130.102/phpmyadmin
-- Generation Time: Mar 01, 2012 at 08:22 PM
-- Server version: 5.1.61
-- John Cockrum & Jennifer Rene

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- `J&J_Project`
--

CREATE DATABASE IF NOT EXISTS project;
USE project;

DROP TABLE IF EXISTS `Appointments`;
DROP TABLE IF EXISTS `Cars`;
DROP TABLE IF EXISTS `Jobs`;
DROP TABLE IF EXISTS `Date`;
DROP TABLE IF EXISTS `Address`;
DROP TABLE IF EXISTS `Identities`;

-- --------------------------------------------------------
--
-- Table structure for table `Identities`
--
CREATE TABLE IF NOT EXISTS `Identities` (
 `IID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
 `Role` varchar(30) NOT NULL DEFAULT 'Customer',
 `FName` varchar(20) NOT NULL,
 `LName` varchar(30) NOT NULL,
 `PhNumber` varchar(12) DEFAULT '555-555-5555',
 `Email` varchar(60) NOT NULL DEFAULT 'Name@address.com',
 `PassWd` varchar(16) NOT NULL,       
 PRIMARY KEY (`IID`)
)AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
--
-- Table structure for table `Address`
--
CREATE TABLE IF NOT EXISTS `Address` (
 `AID` int(255) NOT NULL AUTO_INCREMENT,
 `Add_1` varchar(60) NOT NULL DEFAULT '123 Main',
 `Add_2` varchar(60) DEFAULT 'Appt 321',
 `City` varchar(60) NOT NULL DEFAULT 'Chico',
 `State` varchar(2) NOT NULL DEFAULT 'CA',
 `Zip` int(5) NOT NULL DEFAULT '99999',
 `IID` int(255) unsigned zerofill NOT NULL,
 PRIMARY KEY (`AID`),
 KEY `Who` (`IID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
--
-- Table structure for table `Appointments`
--
CREATE TABLE IF NOT EXISTS `Appointments` (
 `InvoiceID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
 `Created_by` int(255) unsigned zerofill NOT NULL,
 `Car` int(255) unsigned zerofill NOT NULL,
 `Job` int(255) unsigned zerofill NOT NULL,
 `Date` int(255) unsigned zerofill NOT NULL,
 PRIMARY KEY (`InvoiceID`),
 KEY `Created_by` (`Created_by`),
 KEY `Car` (`Car`),
 KEY `Job` (`Job`),
 KEY `Date` (`Date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
--
-- Table structure for table `Cars`
--
CREATE TABLE IF NOT EXISTS `Cars` (
 `CID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
 `Make` varchar(50) NOT NULL,
 `Model` varchar(50) NOT NULL,
 `Year` int(4) NOT NULL,
 `Powertrain` varchar(255) NOT NULL,
 `Miles` int(7) NOT NULL,
 PRIMARY KEY (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
--
-- Table structure for table `Date`
--
CREATE TABLE IF NOT EXISTS `Date` (
 `DID` int(225) unsigned zerofill NOT NULL AUTO_INCREMENT,
 `C_Date` date NOT NULL,
 `Hours` int(2) NOT NULL DEFAULT '4',
 `Created_by` int(255) unsigned zerofill NOT NULL,
 PRIMARY KEY (`DID`),
 KEY `Created_by` (`Created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
--
-- Table structure for table `Jobs`
--
CREATE TABLE IF NOT EXISTS `Jobs` (
 `JID` int(255) unsigned zerofill NOT NULL AUTO_INCREMENT,
 `Description` text NOT NULL,
 `Assessment` text NOT NULL,
 `Solution` text NOT NULL,
 `Hours_Used` int(2) NOT NULL,
 PRIMARY KEY (`JID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
-- Constraints
-- --------------------------------------------------------
--
-- Constraints for table `Address`
--
ALTER TABLE `Address`
 ADD CONSTRAINT `Address_ibfk_1` FOREIGN KEY (`IID`) REFERENCES `Identities` (`IID`) ON DELETE CASCADE ON UPDATE NO ACTION;
--
-- Constraints for table `Date`
--
ALTER TABLE `Date`
 ADD CONSTRAINT `Date_ibfk_1` FOREIGN KEY (`Created_by`) REFERENCES `Identities` (`IID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Constraints for table `Appointments`
--
ALTER TABLE `Appointments`
 ADD CONSTRAINT `Appointments_ibfk_1` FOREIGN KEY (`Created_by`) REFERENCES `Identities` (`IID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
 ADD CONSTRAINT `Appointments_ibfk_4` FOREIGN KEY (`Date`) REFERENCES `Date` (`DID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
 ADD CONSTRAINT `Appointments_ibfk_2` FOREIGN KEY (`Car`) REFERENCES `Cars` (`CID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
 ADD CONSTRAINT `Appointments_ibfk_3` FOREIGN KEY (`Job`) REFERENCES `Jobs` (`JID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

