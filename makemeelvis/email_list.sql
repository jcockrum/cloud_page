CREATE DATABASE mm_elvis;
USE mm_elvis;
DROP TABLE IF EXISTS `email_list`;

CREATE TABLE `email_list` (
  `id` INT AUTO_INCREMENT,
  `first_name` VARCHAR(20),
  `last_name` VARCHAR(20),
  `email` VARCHAR(60),
  PRIMARY KEY (`id`)
);
