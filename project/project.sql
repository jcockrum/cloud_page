-- phpMyAdmin SQL Dump::version 3.4.10.1
-- Host: http://184.169.130.102/phpmyadmin
-- Generation Time: Mar 01, 2012 at 08:22 PM
-- Server version: 5.1.61
-- John Cockrum & Jennifer Rene
-- --------------------------------------------------------
DROP DATABASE IF EXISTS project;
CREATE DATABASE IF NOT EXISTS project;
USE project;
--
DROP TABLE IF EXISTS `Appointments`;
DROP TABLE IF EXISTS `Date`;
DROP TABLE IF EXISTS `Identities`;
-- --------------------------------------------------------
-- Table structure for table `Identities`
CREATE TABLE IF NOT EXISTS `Identities` (
  `IID` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Role` varchar(1) NOT NULL DEFAULT 'C',
  `FName` varchar(20) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `PhNumber` varchar(12) DEFAULT '555-555-5555',
  `Email` varchar(60) NOT NULL DEFAULT 'Name@address.com',
  `PassWd` varchar(16) NOT NULL,
  PRIMARY KEY (`IID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;
-- --------------------------------------------------------
-- Table structure for table `Dates`
CREATE TABLE IF NOT EXISTS `Dates` (
  `DID` int(15) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Cal_Date` varchar(10) NOT NULL DEFAULT 'MM/DD/YYYY',
  `At_time` varchar(5) NOT NULL DEFAULT '7 AM',
  `Created_by` int(6) unsigned zerofill NOT NULL,
  PRIMARY KEY (`DID`),
  UNIQUE KEY `Created_by` (`Created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;
-- --------------------------------------------------------
-- Table structure for table `Appointments`
CREATE TABLE IF NOT EXISTS `Appointments` (
  `InvoiceID` int(15) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Created_by` int(6) unsigned zerofill NOT NULL,
  `Cal_Date` int(15) unsigned zerofill NOT NULL,
  `Job_description` text NOT NULL,
  `Car_make` varchar(30) NOT NULL,
  `Car_model` varchar(30) NOT NULL,
  `Car_powertrain` varchar(20) NOT NULL,
  `Car_year` varchar(4) NOT NULL,
  `Car_miles` varchar(7) NOT NULL,
  PRIMARY KEY (`InvoiceID`),
  UNIQUE KEY `Created_by` (`Created_by`),
  UNIQUE KEY `appt_time` (`Cal_Date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;
-- --------------------------------------------------------
-- Constraints for table `Dates`
--
ALTER TABLE `Dates`
  ADD CONSTRAINT `Dates_ibfk_1` FOREIGN KEY (`Created_by`) REFERENCES `Identities` (`IID`);
-- Constraints for table `Appointments`
ALTER TABLE `Appointments`
  ADD CONSTRAINT `Appointments_ibfk_2` FOREIGN KEY (`Cal_Date`) REFERENCES `Dates` (`DID`);
ALTER TABLE `Appointments`
  ADD CONSTRAINT `Appointments_ibfk_1` FOREIGN KEY (`Created_by`) REFERENCES `Identities` (`IID`);

-- -------------------------------------------------------
-- data for table `Identities`
INSERT INTO `Identities` ( `Role`, `FName`, `LName`, `PhNumber`, `Email`, `PassWd`) VALUES
('A', 'John', 'Cockrum', '916-367-1296', 'JohnCockrum1@Yahoo.com', '1q2w3e4r'),
('A', 'Jennifer ', 'rene', '951555555', 'jrene02@hotmail.com', 'lakers'),
('A', 'Bob', 'Curry', '9897089999', 'bob@yahoo.com', 'bob'),
('C', 'Tyrone', 'Slothrop', '555-1212', 'sloth@hotmail.com', 'sloth');
-- data for table `Dates`
INSERT INTO `Dates` ( `Cal_Date`, `At_time`, `Created_by`) VALUES
( '0.00010463', '8', 000003);
-- data for table `Appointments`
INSERT INTO `Appointments` (`Created_by`, `Cal_Date`, `Job_description`, `Car_make`, `Car_model`, `Car_powertrain`, `Car_year`, `Car_miles`) VALUES
( 000003, 000000000000001, 'Oil change', 'Kia', 'Spectra', '3.6', '2008', '190000');
-- --------------------------------------------------------
-- Script End
