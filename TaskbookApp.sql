-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2020 at 07:41 PM
-- Server version: 10.3.13-MariaDB
-- PHP Version: 7.1.22
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `taskbookapp`
--
-- --------------------------------------------------------------------
--
-- Table structure for table `TaskbookUsers`
--
CREATE TABLE `TaskbookUsers`(
  `id` int NOT NULL PRIMARY KEY,
  `username` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `text` TEXT NOT NULL,
  `status` VARCHAR(50),
  `isChange` VARCHAR(10)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- ---------------------------------------------------------------------
--
-- AUTO_INCREMENT for table `TaskbookUsers`
--
ALTER TABLE `TaskbookUsers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;