-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.26-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for library
CREATE DATABASE IF NOT EXISTS `library` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `library`;

-- Dumping structure for table library.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table library.admin: ~8 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `password`) VALUES
	(1, 'lucival', '$2y$10$SHUv932TusyJhwUypn5iReuZsPwDWHCSeAsBugtWRo4'),
	(2, 'thiago', '$2y$10$xlDesBUGq6UBjggwp9BZH.Z5UV9Z.IuyWj5r44fInax'),
	(3, 'kleyton', '$2y$10$LWtPjWK6OFfN1cgdMX34NO0gUKXsTRZx0REiolDRIygYw0bBo51s6'),
	(4, 'fabi', '$2y$10$yfGCNCrXerncZz6QsV7ddu6c6aIjvcPdqFv9.3EKVCQWGfy0g/Ngi'),
	(5, 'sean', '$2y$10$Nm7/36T4CdmoqoHm752oS.eAkb6CfYuwkIXDqGUza8dsJp7xToOxG'),
	(6, 'jack', '$2y$10$C4FfdhBtTt02TVquqZ9zRO4VSiTOVNdjWv6snB6dWYNoEprh60sbe'),
	(7, 'paul', '$2y$10$NPATitKEMWocq4gsa7uTkOk3U055YkOZaN1P/wSrWqv6tHstK43gy'),
	(8, 'jason', '$2y$10$JtH1.3f52KPMFhViekxEKu/OqT1u814COTZ3Ku8e7uzyNzj1aeCiW');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table library.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `isbn` char(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `isbn` (`isbn`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table library.books: ~10 rows (approximately)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `title`, `author`, `isbn`, `status`) VALUES
	(1, 'Generation X', 'Douglas Coupland', '0349108390', 'OUT'),
	(2, 'Introducing HTML5', 'Remy Sharp', '0321687299', 'OUT'),
	(3, 'Handcrafted CSS', 'Dan Cederholm', '0321643380', 'IN'),
	(4, 'Bulletproof Web Design', 'Dan Cederholm', '0321509021', 'IN'),
	(5, 'The Tipping Point', 'Malcolm Gladwell', '0349113467', 'IN'),
	(6, 'Stylish-PHP', 'Clayton Crispim', '3576459200', 'OUT'),
	(7, 'Who ate my cheese?', 'Pitagoras', '3468972169', 'OUT'),
	(8, 'Super Java', 'Kleyton Soares', '1986040131', 'IN'),
	(9, 'Java Design', 'Kleyton Soares', '0789004475', 'IN'),
	(10, 'Deep DBMS', 'Joao Haddad', '5678223490', 'IN');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

-- Dumping structure for table library.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` char(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table library.students: ~9 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `username`, `password`) VALUES
	('1234567', 'Alex Sandro', '$2y$10$.pILtPw2a1fXV1pSa4QdLu84G65225DQm7gYf3El9CmVmcdhPGGze'),
	('2016004', 'peter', '$2y$10$yIDFX94IKLxSms7uk.jJY.hrJTUJuNI0dSRfUwyqTek9VUMlJYMne'),
	('2016007', 'sam', '$2y$10$CoIFu78lXedKpaz0GYzTkutZcfkN1OV15LRJXtTeoZAUhOvlO8sTO'),
	('2016144', 'kleyton', '$2y$10$Vzb2ep1zllphL3Ba1RjnWuaT7j5S6IEF3./VW2H6x0VbXBQdVMy.q'),
	('2016153', 'fabi', '$2y$10$3nLtENkmJxktp6JDZM/gJOUJhn0sAQMGvNb0HyT5LCFdPjg74Eg/K'),
	('2016198', 'joao', '$2y$10$2TeusTLdRcADE.tcOqHzBue8G/REAp2fhzZXqia.d5ylphob.wqTy'),
	('2016234', 'clayton', '$2y$10$9IEcQ/WMkGZXyEcD/gFGQeZEbAVPDkV6BDhwPatlLHUvbSoBy5dw6'),
	('2016357', 'carl', '$2y$10$3Yp8.L61dThJzVaujdl.Z..ujtSpp9imTPqboRxDscgdfXtLk4KQW'),
	('2016456', 'jacklyn', '$2y$10$BH77ZgZ3Q2P.8iaIqprviOLShk76EMNGWtWTwbNH7lPDSYkvl2mJ.'),
	('2016578', 'giliane', '$2y$10$1g27H5Vo5Ft1ZSqlK0SpH.iSndMSL/ggpcw1U31qqrn0znTkMNFJS'),
	('2016897', 'thiago', '$2y$10$7DLWOzm7Tv2Q/EHjtQ6rnewTCyOL8onU.W9R44zFqC65F/x86H1U.'),
	('2016987', 'orlando', '$2y$10$bQwx2qUI1Pk1UTQ6lc4UfO8ba/2nm2rjl3uGu7utdY1m/BEHDDkuK');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table library.transaction
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `sid` char(50) NOT NULL,
  `bid` int(50) NOT NULL DEFAULT '0',
  `out` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `duedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `backin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `s_id` (`sid`),
  KEY `bid` (`bid`),
  CONSTRAINT `bid` FOREIGN KEY (`bid`) REFERENCES `books` (`id`),
  CONSTRAINT `sid` FOREIGN KEY (`sid`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Dumping data for table library.transaction: ~43 rows (approximately)
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` (`id`, `sid`, `bid`, `out`, `duedate`, `backin`) VALUES
	(1, '2016144', 5, '2017-12-16 22:08:33', '2017-11-28 00:00:00', 'IN'),
	(2, '2016153', 3, '2017-12-16 22:08:38', '2017-12-06 00:00:00', 'IN'),
	(3, '2016153', 3, '2017-12-16 22:08:42', '2017-12-06 00:00:00', 'IN'),
	(4, '2016144', 2, '2017-11-30 21:34:17', '2017-12-06 00:00:00', 'IN'),
	(5, '2016144', 3, '2017-11-30 21:34:22', '2017-12-06 00:00:00', 'IN'),
	(6, '2016153', 6, '2017-11-30 21:34:25', '2017-12-06 00:00:00', 'IN'),
	(7, '2016198', 7, '2017-11-30 21:34:28', '2017-12-06 00:00:00', 'IN'),
	(8, '2016144', 1, '2017-11-30 21:34:30', '2017-12-06 00:00:00', 'IN'),
	(9, '2016144', 2, '2017-11-30 21:34:32', '2017-12-06 00:00:00', 'IN'),
	(10, '2016144', 3, '2017-11-30 21:34:33', '2017-12-06 00:00:00', 'IN'),
	(11, '2016198', 7, '2017-11-30 21:34:35', '2017-11-06 00:00:00', 'IN'),
	(12, '2016144', 1, '2017-11-30 21:34:37', '2017-12-06 00:00:00', 'IN'),
	(13, '2016144', 2, '2017-11-30 21:34:41', '2017-12-06 00:00:00', 'IN'),
	(14, '2016153', 6, '2017-11-30 21:34:43', '2017-11-06 00:00:00', 'IN'),
	(15, '2016456', 1, '2017-11-30 21:34:46', '2017-12-07 00:00:00', 'IN'),
	(16, '2016456', 5, '2017-11-30 21:34:48', '2017-12-07 00:00:00', 'IN'),
	(17, '2016144', 2, '2017-11-30 21:34:50', '2017-12-07 00:00:00', 'IN'),
	(18, '2016144', 8, '2017-11-30 21:34:51', '2017-12-07 00:00:00', 'IN'),
	(19, '2016456', 1, '2017-11-30 21:34:53', '2017-12-07 00:00:00', 'IN'),
	(20, '2016153', 6, '2017-11-30 21:34:57', '2017-12-07 00:00:00', 'IN'),
	(21, '2016004', 3, '2017-12-16 22:23:07', '2017-12-07 00:00:00', 'IN'),
	(22, '2016004', 4, '2017-12-16 22:32:04', '2017-12-07 00:00:00', 'IN'),
	(23, '2016004', 8, '2017-12-16 22:31:40', '2017-12-07 00:00:00', 'IN'),
	(24, '2016234', 9, '2017-12-16 22:32:10', '2017-12-07 00:00:00', 'IN'),
	(25, '2016198', 1, '2017-11-30 21:35:15', '2017-12-07 00:00:00', 'IN'),
	(26, '2016198', 2, '2017-11-30 21:35:24', '2017-12-07 00:00:00', 'IN'),
	(27, '2016198', 10, '2017-12-16 22:31:46', '2017-12-07 00:00:00', 'IN'),
	(28, '2016144', 5, '2017-12-16 22:31:06', '2017-12-07 00:00:00', 'IN'),
	(29, '2016987', 6, '2017-12-16 22:00:12', '2017-12-07 00:00:00', 'IN'),
	(30, '2016987', 6, '2017-12-16 22:01:40', '2017-12-07 00:00:00', 'IN'),
	(31, '2016144', 2, '2017-12-16 22:21:35', '2017-12-07 00:00:00', 'IN'),
	(32, '2016144', 2, '2017-12-16 22:22:32', '2017-12-07 00:00:00', 'IN'),
	(33, '2016357', 1, '2017-12-16 22:08:24', '2017-12-08 00:00:00', 'IN'),
	(35, '2016153', 10, '2017-12-16 22:31:46', '0000-00-00 00:00:00', 'IN'),
	(36, '2016153', 6, '2017-12-16 22:31:20', '2017-12-23 00:00:00', 'IN'),
	(37, '2016153', 2, '2017-12-16 22:22:43', '2017-12-23 00:00:00', 'IN'),
	(38, '2016234', 7, '2017-12-16 22:31:27', '2017-12-23 00:00:00', 'IN'),
	(39, '2016144', 2, '2017-12-16 22:29:11', '2017-12-23 00:00:00', 'IN'),
	(40, '2016144', 2, '2017-12-16 22:30:26', '2017-12-23 00:00:00', 'IN'),
	(41, '2016144', 2, '2017-12-16 22:36:37', '2017-12-12 00:00:00', 'OUT'),
	(42, '2016144', 1, '2017-12-17 11:35:59', '2017-12-11 00:00:00', 'OUT'),
	(43, '2016144', 6, '2017-12-17 00:03:02', '2017-12-14 00:00:00', 'OUT'),
	(44, '2016153', 7, '2017-12-17 00:00:00', '2017-12-24 00:00:00', 'OUT');
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
