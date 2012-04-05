CREATE DATABASE Rocksmith_test;
USE Rocksmith_test;
DROP TABLE IF EXISTS `email_list`;


CREATE TABLE `email_list` (
  `CUST_NUM` INT AUTO_INCREMENT,
  `first_name` VARCHAR(20),
  `last_name` VARCHAR(20),
  `email` VARCHAR(60),
  PRIMARY KEY (`CUST_NUM`)
);
