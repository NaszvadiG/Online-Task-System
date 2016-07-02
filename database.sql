/*
SQLyog Community v12.09 (64 bit)
MySQL - 10.1.9-MariaDB : Database - tugas_online
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tugas_online` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tugas_online`;

/*Table structure for table `gelar` */

DROP TABLE IF EXISTS `gelar`;

CREATE TABLE `gelar` (
  `nama_gelar` varchar(20) NOT NULL,
  `logo` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL,
  `poin` int(50) NOT NULL,
  `jenis` enum('guru','siswa') NOT NULL,
  KEY `nama_gelar` (`nama_gelar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gelar` */

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values (1,'admin','Administrator'),(2,'members','General User'),(3,'guru','Member Guru'),(4,'siswa','Member Siswa');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) unsigned NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `fk1` (`id`),
  CONSTRAINT `fk1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

/*Table structure for table `kelas_siswa` */

DROP TABLE IF EXISTS `kelas_siswa`;

CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `id` int(11) unsigned NOT NULL,
  `status` enum('diterima','belum diterima','ditolak') NOT NULL,
  PRIMARY KEY (`id_kelas_siswa`),
  KEY `id_akun` (`id`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `kelas_siswa_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kelas_siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelas_siswa` */

/*Table structure for table `kelas_soal` */

DROP TABLE IF EXISTS `kelas_soal`;

CREATE TABLE `kelas_soal` (
  `id_kelas_soal` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kelas_soal`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_soal` (`id_soal`),
  CONSTRAINT `kelas_soal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kelas_soal_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelas_soal` */

/*Table structure for table `komentar` */

DROP TABLE IF EXISTS `komentar`;

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `id_soal` int(11) DEFAULT NULL,
  `id` int(11) unsigned NOT NULL,
  `komentar` text,
  PRIMARY KEY (`id_komentar`),
  KEY `id_akun` (`id`),
  KEY `id_soal` (`id_soal`),
  CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `komentar` */

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

/*Table structure for table `nilai` */

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_soal` int(11) DEFAULT NULL,
  `id` int(11) unsigned NOT NULL COMMENT 'id akun siswa yang mengerjakan soal',
  `salah` int(11) DEFAULT NULL,
  `benar` int(11) DEFAULT NULL,
  `tgl_dikerjakan` datetime DEFAULT NULL COMMENT 'tangal siswa mengerjakan soal',
  PRIMARY KEY (`id_nilai`),
  KEY `id_akun` (`id`),
  KEY `id_soal` (`id_soal`),
  CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nilai` */

/*Table structure for table `paket` */

DROP TABLE IF EXISTS `paket`;

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(20) DEFAULT NULL,
  `harga_paket` int(20) NOT NULL,
  `tipe_paket` enum('guru','siswa') DEFAULT NULL,
  `template_soal` enum('yes','no') DEFAULT NULL,
  `jumlah_kelas` int(50) DEFAULT NULL,
  `jumlah_siswa` int(50) DEFAULT NULL,
  `jumlah_soal` int(50) DEFAULT NULL,
  `iklan` enum('yes','no') DEFAULT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `paket` */

insert  into `paket`(`id_paket`,`nama_paket`,`harga_paket`,`tipe_paket`,`template_soal`,`jumlah_kelas`,`jumlah_siswa`,`jumlah_soal`,`iklan`) values (1,'PAKET 0',5000,'guru','yes',20,40,45,'yes'),(2,'PAKET 1',5000,'guru','yes',0,40,45,'yes'),(3,'PAKET Siswa',10000,'siswa',NULL,NULL,NULL,NULL,'no');

/*Table structure for table `pesan` */

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) unsigned NOT NULL COMMENT 'akun yang dituju',
  `pesan` text NOT NULL COMMENT 'isi pesan',
  `dari` int(11) unsigned NOT NULL COMMENT 'akun sumber',
  `waktu_pesan` datetime NOT NULL COMMENT 'waktu pesan diterima',
  `judul_pesan` varchar(100) NOT NULL COMMENT 'judul dari pesan',
  PRIMARY KEY (`id_pesan`),
  KEY `id_akun` (`id`),
  KEY `dari` (`dari`),
  CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`dari`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pesan` */

/*Table structure for table `pil_ganda` */

DROP TABLE IF EXISTS `pil_ganda`;

CREATE TABLE `pil_ganda` (
  `id_pil_ganda` int(11) NOT NULL AUTO_INCREMENT,
  `id_soal` int(11) NOT NULL,
  `soal` text NOT NULL,
  `pilihan_a` varchar(200) DEFAULT NULL,
  `pilihan_b` varchar(200) DEFAULT NULL,
  `pilihan_c` varchar(200) DEFAULT NULL,
  `pilihan_d` varchar(200) DEFAULT NULL,
  `kunci` enum('a','b','c','d') DEFAULT NULL,
  PRIMARY KEY (`id_pil_ganda`),
  KEY `id_soal` (`id_soal`),
  CONSTRAINT `pil_ganda_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pil_ganda` */

/*Table structure for table `pil_siswa` */

DROP TABLE IF EXISTS `pil_siswa`;

CREATE TABLE `pil_siswa` (
  `id_pil_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) unsigned NOT NULL,
  `id_pil_ganda` int(11) DEFAULT NULL,
  `jawaban` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_pil_siswa`),
  KEY `id_akun` (`id`),
  KEY `id_pil_ganda` (`id_pil_ganda`),
  CONSTRAINT `pil_siswa_ibfk_3` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pil_siswa_ibfk_4` FOREIGN KEY (`id_pil_ganda`) REFERENCES `pil_ganda` (`id_pil_ganda`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pil_siswa` */

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `nama_web` varchar(50) DEFAULT NULL,
  `warna_dasar` varchar(7) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `footer_credit` varchar(500) DEFAULT NULL,
  `tentang` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `setting` */

insert  into `setting`(`nama_web`,`warna_dasar`,`favicon`,`footer_credit`,`tentang`) values ('aaaaaaaaaaaaaaaaaaa','','favicon.jpg','','');

/*Table structure for table `soal` */

DROP TABLE IF EXISTS `soal`;

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) unsigned NOT NULL,
  `judul` varchar(30) DEFAULT NULL,
  `mulai` datetime DEFAULT NULL,
  `berhenti` datetime DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `pesan` varchar(50) DEFAULT NULL,
  `status` enum('published','unpublished') DEFAULT 'unpublished',
  PRIMARY KEY (`id_soal`),
  KEY `id_akun` (`id`),
  CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `soal` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(13) DEFAULT NULL,
  `foto` varchar(20) DEFAULT NULL,
  `deposit` int(20) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `mulai_paket` datetime DEFAULT NULL,
  `batas_paket` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`ip_address`,`username`,`password`,`salt`,`email`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`nama`,`jenis_kelamin`,`alamat`,`no_hp`,`foto`,`deposit`,`id_paket`,`mulai_paket`,`batas_paket`) values (5,'::1','anan','$2y$08$x2JbglYel2.sg2TMNIR4auA51cZtY48qdwDRHGYK.z.7cTkkP0.v2',NULL,'anandiamy@gmail.com','0838ce66fc1ef3ca36e09ecbf5dc7f607ea9b49a',NULL,NULL,NULL,1461391182,NULL,1,NULL,NULL,'anandia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'::1','TEST','$2y$08$81R4TKGU1nFJuFdE7xJYZu0ewrDcZs3FmvPbTo5U9Tc63H.FV53IG',NULL,'anandiamy@localhost','2111f7c24708c4f1efbca1dc7b97dfd19ce19852',NULL,NULL,NULL,1461402852,NULL,0,NULL,NULL,'TEST',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'::1','siswa','$2y$08$SB8ocj3f1xYxL8mBjFTkAekQatbfY8d8H/8FnWBqesgrqQ0XwbaJG',NULL,'anandiamy@gmail.com','8429d6b5854a616964f3d444a75df721cbd2334f',NULL,NULL,'385wfYksPK0mG5PsUAz2ue',1461414678,1461468509,1,NULL,NULL,'siswa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'::1','siswa2','$2y$08$idKVvzcX2ilB6oairVGTVuyl0BO0y/E./vUBQgvubgi3QyYh0CuCK',NULL,'siswa@gmail.com',NULL,NULL,NULL,NULL,1461467535,NULL,1,NULL,NULL,'siswa2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'::1','guru','$2y$08$OR2uBJSlO7Js6c0hCvewNOpc.nnTzPdnqm.XfY1PFuGYhGpurro0m',NULL,'guru@gmail.com',NULL,NULL,NULL,NULL,1461467600,NULL,1,NULL,NULL,'guru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values (1,5,4),(2,6,3),(3,7,4),(4,8,4),(5,9,3);

/*Table structure for table `visitor` */

DROP TABLE IF EXISTS `visitor`;

CREATE TABLE `visitor` (
  `no` int(7) NOT NULL AUTO_INCREMENT,
  `ip` varchar(40) DEFAULT NULL,
  `os` varchar(40) DEFAULT NULL,
  `browser` varchar(40) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=latin1;

/*Data for the table `visitor` */

insert  into `visitor`(`no`,`ip`,`os`,`browser`,`tanggal`) values (20,'::1','Windows 10','Firefox','0000-00-00 00:00:00'),(21,'::1','Windows 10','Firefox','2016-03-31 04:53:36'),(22,'::1','Windows 10','Firefox','2016-03-31 04:53:41'),(23,'::1','Windows 10','Firefox','2016-03-31 04:53:56'),(24,'::1','Windows 10','Firefox','2016-03-31 04:55:06'),(25,'::1','Windows 10','Firefox','2016-03-31 08:31:25'),(26,'::1','Windows 10','Firefox','2016-03-31 08:31:38'),(27,'::1','Windows 10','Firefox','2016-03-31 08:35:04'),(28,'::1','Windows 10','Chrome','2016-03-31 08:56:24'),(29,'::1','Windows 10','Firefox','2016-04-01 05:53:51'),(30,'::1','Windows 10','Firefox','2016-04-01 10:37:44'),(31,'::1','Windows 10','Firefox','2016-04-01 10:37:48'),(32,'::1','Windows 10','Firefox','2016-04-01 10:37:58'),(33,'::1','Windows 10','Firefox','2016-04-01 03:46:00'),(34,'::1','Windows 10','Firefox','2016-04-01 03:46:09'),(35,'::1','Windows 10','Firefox','2016-04-01 03:46:10'),(36,'::1','Windows 10','Firefox','2016-04-01 05:30:08'),(37,'::1','Windows 10','Firefox','2016-04-03 04:05:55'),(38,'::1','Windows 10','Firefox','2016-04-03 04:58:57'),(39,'::1','Windows 10','Firefox','2016-04-03 04:59:04'),(40,'::1','Windows 10','Firefox','2016-04-03 03:53:55'),(41,'::1','Windows 10','Firefox','2016-04-04 01:59:01'),(42,'::1','Windows 10','Firefox','2016-04-04 06:30:41'),(43,'::1','Windows 10','Firefox','2016-04-05 01:57:58'),(44,'::1','Windows 10','Chrome','2016-04-05 02:17:17'),(45,'::1','Windows 10','Spartan','2016-04-05 02:18:35'),(46,'::1','Windows 10','Firefox','2016-04-05 01:11:57'),(47,'::1','Windows 10','Firefox','2016-04-05 01:12:10'),(48,'::1','Windows 10','Firefox','2016-04-05 01:16:06'),(49,'::1','Windows 10','Firefox','2016-04-05 05:42:01'),(50,'::1','Windows 10','Firefox','2016-04-06 01:45:58'),(51,'::1','Windows 10','Firefox','2016-04-06 06:52:14'),(52,'::1','Windows 10','Firefox','2016-04-06 06:52:45'),(53,'::1','Windows 10','Firefox','2016-04-06 06:53:09'),(54,'::1','Windows 10','Firefox','2016-04-06 01:25:37'),(55,'::1','Windows 10','Firefox','2016-04-06 01:28:59'),(56,'::1','Windows 10','Firefox','2016-04-07 05:09:11'),(57,'::1','Windows 10','Firefox','2016-04-09 02:20:51'),(58,'::1','Windows 10','Firefox','2016-04-11 06:25:58'),(59,'::1','Windows 10','Firefox','2016-04-11 06:57:22'),(60,'::1','Windows 10','Firefox','2016-04-14 04:50:31'),(61,'::1','Windows 10','Firefox','2016-04-14 04:54:52'),(62,'::1','Windows 10','Firefox','2016-04-14 06:02:55'),(63,'::1','Windows 10','Firefox','2016-04-15 01:49:03'),(64,'::1','Windows 10','Firefox','2016-04-15 07:42:16'),(65,'::1','Windows 10','Firefox','2016-04-16 04:49:51'),(66,'::1','Windows 10','Firefox','2016-04-16 09:37:50'),(67,'::1','Windows 10','Firefox','2016-04-16 09:53:21'),(68,'::1','Windows 10','Firefox','2016-04-16 05:34:39'),(69,'::1','Windows 10','Chrome','2016-04-16 05:49:07'),(70,'::1','Windows 10','Firefox','2016-04-16 05:50:37'),(71,'::1','Windows 10','Firefox','2016-04-17 01:52:26'),(72,'::1','Windows 10','Firefox','2016-04-17 01:54:00'),(73,'::1','Windows 10','Firefox','2016-04-17 06:08:52'),(74,'::1','Windows 10','Firefox','2016-04-17 10:01:54'),(75,'::1','Windows 10','Firefox','2016-04-18 04:53:48'),(76,'::1','Windows 10','Firefox','2016-04-19 07:24:41'),(77,'::1','Windows 10','Firefox','2016-04-20 09:22:02'),(78,'::1','Windows 10','Firefox','2016-04-20 09:50:14'),(79,'::1','Windows 10','Firefox','2016-04-20 10:09:03'),(80,'::1','Windows 10','Firefox','2016-04-20 10:19:51'),(81,'::1','Windows 10','Firefox','2016-04-20 10:24:32'),(82,'::1','Windows 10','Firefox','2016-04-20 10:32:10'),(83,'::1','Windows 10','Firefox','2016-04-20 10:36:18'),(84,'::1','Windows 10','Firefox','2016-04-20 10:56:38'),(85,'::1','Windows 10','Firefox','2016-04-20 10:57:36'),(86,'::1','Windows 10','Firefox','2016-04-20 10:58:57'),(87,'::1','Windows 10','Firefox','2016-04-20 10:59:55'),(88,'::1','Windows 10','Firefox','2016-04-20 11:00:00'),(89,'::1','Windows 10','Firefox','2016-04-20 11:00:35'),(90,'::1','Windows 10','Firefox','2016-04-20 11:01:18'),(91,'::1','Windows 10','Firefox','2016-04-20 11:01:21'),(92,'::1','Windows 10','Firefox','2016-04-20 11:01:39'),(93,'::1','Windows 10','Firefox','2016-04-20 11:03:30'),(94,'::1','Windows 10','Firefox','2016-04-20 11:12:58'),(95,'::1','Windows 10','Firefox','2016-04-21 08:53:47'),(96,'::1','Windows 10','Firefox','2016-04-21 08:56:12'),(97,'::1','Windows 10','Firefox','2016-04-21 08:56:58'),(98,'::1','Windows 10','Firefox','2016-04-23 01:31:10'),(99,'::1','Windows 10','Firefox','2016-04-23 01:51:35'),(100,'::1','Windows 10','Firefox','2016-04-23 01:52:17'),(101,'::1','Windows 10','Firefox','2016-04-23 01:52:43'),(102,'::1','Windows 10','Firefox','2016-04-23 01:53:07'),(103,'::1','Windows 10','Firefox','2016-04-23 01:53:22'),(104,'::1','Windows 10','Firefox','2016-04-23 01:55:31'),(105,'::1','Windows 10','Firefox','2016-04-23 01:56:00'),(106,'::1','Windows 10','Firefox','2016-04-23 01:58:04'),(107,'::1','Windows 10','Firefox','2016-04-23 01:58:36'),(108,'::1','Windows 10','Firefox','2016-04-23 02:01:57'),(109,'::1','Windows 10','Firefox','2016-04-23 02:02:22'),(110,'::1','Windows 10','Firefox','2016-04-23 02:03:05'),(111,'::1','Windows 10','Firefox','2016-04-23 02:06:37'),(112,'::1','Windows 10','Firefox','2016-04-23 02:12:27'),(113,'::1','Windows 10','Firefox','2016-04-23 02:13:28'),(114,'::1','Windows 10','Firefox','2016-04-23 02:14:32'),(115,'::1','Windows 10','Firefox','2016-04-23 05:51:19'),(116,'::1','Windows 10','Firefox','2016-04-23 05:58:32'),(117,'::1','Windows 10','Firefox','2016-04-23 05:59:16'),(118,'::1','Windows 10','Firefox','2016-04-23 07:55:51'),(119,'::1','Windows 10','Firefox','2016-04-23 07:56:30'),(120,'::1','Windows 10','Firefox','2016-04-23 07:59:11'),(121,'::1','Windows 10','Firefox','2016-04-23 07:59:43'),(122,'::1','Windows 10','Firefox','2016-04-23 11:12:18'),(123,'::1','Windows 10','Firefox','2016-04-23 11:13:10'),(124,'::1','Windows 10','Firefox','2016-04-23 11:13:46'),(125,'::1','Windows 10','Firefox','2016-04-23 11:14:14'),(126,'::1','Windows 10','Firefox','2016-04-23 01:22:17'),(127,'::1','Windows 10','Firefox','2016-04-23 02:29:48'),(128,'::1','Windows 10','Firefox','2016-04-23 02:30:31'),(129,'::1','Windows 10','Firefox','2016-04-23 02:31:19'),(130,'::1','Windows 10','Firefox','2016-04-23 02:31:45'),(131,'::1','Windows 10','Firefox','2016-04-23 02:33:41'),(132,'::1','Windows 10','Firefox','2016-04-23 02:33:49'),(133,'::1','Windows 10','Firefox','2016-04-23 02:34:43'),(134,'::1','Windows 10','Firefox','2016-04-23 02:35:59'),(135,'::1','Windows 10','Firefox','2016-04-23 02:36:14'),(136,'::1','Windows 10','Firefox','2016-04-23 02:38:58'),(137,'::1','Windows 10','Firefox','2016-04-24 05:01:52'),(138,'::1','Windows 10','Firefox','2016-04-24 05:02:06'),(139,'::1','Windows 10','Firefox','2016-04-24 05:03:01'),(140,'::1','Windows 10','Firefox','2016-04-24 05:03:10'),(141,'::1','Windows 10','Opera','2016-04-24 05:06:22'),(142,'::1','Windows 10','Opera','2016-04-24 05:08:43'),(143,'::1','Windows 10','Opera','2016-04-24 05:08:53'),(144,'::1','Windows 10','Opera','2016-04-24 05:09:48'),(145,'::1','Windows 10','Opera','2016-04-24 05:10:01'),(146,'::1','Windows 10','Opera','2016-04-24 05:10:55'),(147,'::1','Windows 10','Opera','2016-04-24 05:11:04'),(148,'::1','Windows 10','Opera','2016-04-24 05:11:14'),(149,'::1','Windows 10','Opera','2016-04-24 05:11:24'),(150,'::1','Windows 10','Opera','2016-04-24 05:11:33'),(151,'::1','Windows 10','Opera','2016-04-24 05:11:46'),(152,'::1','Windows 10','Opera','2016-04-24 05:12:15'),(153,'::1','Windows 10','Opera','2016-04-24 05:12:28'),(154,'::1','Windows 10','Opera','2016-04-24 05:13:21'),(155,'::1','Windows 10','Opera','2016-04-24 05:13:32'),(156,'::1','Windows 10','Opera','2016-04-24 05:14:09'),(157,'::1','Windows 10','Opera','2016-04-24 05:14:18'),(158,'::1','Windows 10','Opera','2016-04-24 05:14:26'),(159,'::1','Windows 10','Opera','2016-04-24 05:15:49'),(160,'::1','Windows 10','Opera','2016-04-24 05:17:08'),(161,'::1','Windows 10','Opera','2016-04-24 05:18:26'),(162,'::1','Windows 10','Opera','2016-04-24 05:18:31'),(163,'::1','Windows 10','Opera','2016-04-24 05:19:16'),(164,'::1','Windows 10','Opera','2016-04-24 05:20:13'),(165,'::1','Windows 10','Opera','2016-04-24 05:20:59'),(166,'::1','Windows 10','Opera','2016-04-24 05:21:16'),(167,'::1','Windows 10','Opera','2016-04-24 05:21:49'),(168,'::1','Windows 10','Opera','2016-04-24 05:22:01'),(169,'::1','Windows 10','Opera','2016-04-24 05:22:17'),(170,'::1','Windows 10','Opera','2016-04-24 05:22:23'),(171,'::1','Windows 10','Opera','2016-04-24 05:23:26'),(172,'::1','Windows 10','Opera','2016-04-24 05:23:31'),(173,'::1','Windows 10','Opera','2016-04-24 05:25:33'),(174,'::1','Windows 10','Opera','2016-04-24 05:25:38'),(175,'::1','Windows 10','Opera','2016-04-24 05:28:26');

/* Function  structure for function  `jumlah_siswa2` */

/*!50003 DROP FUNCTION IF EXISTS `jumlah_siswa2` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `jumlah_siswa2`(X INT, Y INT) RETURNS int(11)
BEGIN
	RETURN X*Y;
    END */$$
DELIMITER ;

/* Function  structure for function  `kali` */

/*!50003 DROP FUNCTION IF EXISTS `kali` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `kali`(X INT, Y INT) RETURNS int(11)
BEGIN
RETURN X*Y;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
