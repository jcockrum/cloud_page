-- -------------------------------------------------------
-- data for table `Identities`
INSERT INTO `Identities` ( `Role`, `FName`, `LName`, `PhNumber`, `Email`, `PassWd`) VALUES
('A', 'John', 'Cockrum', '916-367-1296', 'JohnCockrum1@Yahoo.com', '1q2w3e4r'),
('A', 'Jennifer ', 'rene', '951555555', 'jrene02@hotmail.com', 'lakers'),
('A', 'Bob', 'Curry', '9897089999', 'bob@yahoo.com', 'bob'),
('C', 'Tyrone', 'Slothrop', '555-1212', 'sloth@hotmail.com', 'sloth');
-- data for table `Dates`
INSERT INTO `Dates`  VALUES( NULL, '26-APR-2012', '1 pm', 0, 000007);
INSERT INTO `Dates`  VALUES( NULL, '25-APR-2012', '2 pm', 0, 000006);
INSERT INTO `Dates`  VALUES( NULL, '26-APR-2012', '3 pm', 0, 000008);
INSERT INTO `Dates`  VALUES( NULL, '27-APR-2012', '4 pm', 0, 000008);

-- data for table `Appointments`
INSERT INTO `Appointments` (`Created_by`, `Cal_Date`, `Job_description`, `Car_make`, `Car_model`, `Car_powertrain`, `Car_year`, `Car_miles`) VALUES
( 000007, 000000000000022, 'Oil change', 'Kia', 'Spectra', '3.6', '2008', '190000');
-- --------------------------------------------------------
-- Script End
