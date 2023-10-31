-- MySQL dump 10.13  Distrib 5.7.33, for Win64 (x86_64)
--
-- Host: localhost    Database: payday
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `data_absensi`
--

DROP TABLE IF EXISTS `data_absensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_absensi` (
  `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `nama_jabatan` varchar(100) DEFAULT NULL,
  `hadir` int(11) DEFAULT NULL,
  `sakit` int(11) DEFAULT NULL,
  `izin` int(11) DEFAULT NULL,
  `alpha` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kehadiran`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_absensi`
--

LOCK TABLES `data_absensi` WRITE;
/*!40000 ALTER TABLE `data_absensi` DISABLE KEYS */;
INSERT INTO `data_absensi` VALUES (74,'082023','98236492374','abeeeeeeeeee','Perempuan','Staff Marketing',0,0,1,1),(75,'082023','2837648237489','kryzystof','Laki-Laki','Staff Marketing',0,0,7,3),(76,'082023','63872528698','ssssssssss','Laki-Laki','Staff Marketing',0,0,1,9),(77,'012023','98236492374','abeeeeeeeeee','Perempuan','Staff Marketing',0,0,4,3),(78,'012023','2837648237489','kryzystof','Laki-Laki','Staff Marketing',0,0,8,23),(79,'012023','63872528698','ssssssssss','Laki-Laki','Staff Marketing',0,0,2,6),(80,'022023','98236492374','abeeeeeeeeee','Perempuan','Staff Marketing',0,0,4,7),(81,'022023','2837648237489','kryzystof','Laki-Laki','Staff Marketing',0,0,9,3),(82,'022023','63872528698','ssssssssss','Laki-Laki','Staff Marketing',0,0,1,2);
/*!40000 ALTER TABLE `data_absensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_jabatan`
--

DROP TABLE IF EXISTS `data_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(100) DEFAULT NULL,
  `gaji_pokok` varchar(100) DEFAULT NULL,
  `tj_transport` varchar(100) DEFAULT NULL,
  `uang_makan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_jabatan`
--

LOCK TABLES `data_jabatan` WRITE;
/*!40000 ALTER TABLE `data_jabatan` DISABLE KEYS */;
INSERT INTO `data_jabatan` VALUES (1,'Staff Marketing','4000000','400000','500000'),(2,'Admin','1000000','1000000','123456'),(3,'Staff RnD','5000000','500000','123456'),(4,'fwefwef','3000000','300000','123456');
/*!40000 ALTER TABLE `data_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_pegawai`
--

DROP TABLE IF EXISTS `data_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(100) DEFAULT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_pegawai`
--

LOCK TABLES `data_pegawai` WRITE;
/*!40000 ALTER TABLE `data_pegawai` DISABLE KEYS */;
INSERT INTO `data_pegawai` VALUES (1,'63872528698','ssssssssss','Laki-Laki','Staff Marketing','2010-10-26','0','wefihwifeu.jpg',2,'wokawoka','8cb2237d0679ca88db6464eac60da96345513964'),(2,'98236492374','abeeeeeeeeee','Laki-Laki','Staff Marketing','2010-10-26','0','wefihwifeu.jpg',1,'kiwiwiwiwi','5fa339bbbb1eeaced3b52e54f44576aaf0d77d96'),(11,'2837648237489','kryzystof','Laki-Laki','Staff Marketing','2010-10-26','0','wp1865944-basquiat-wallpaper.jpg',1,NULL,NULL),(12,'1111111111111','qwerty','Laki-Laki','Admin','2017-08-28','1','cropped-logo-universitas-sebelas-maret-surakarta.png',1,NULL,NULL),(13,'1111111111111','uoyoioy','Laki-Laki','Admin','2014-01-16','1','wp1865944-basquiat-wallpaper.jpg',1,NULL,NULL),(14,'1234567898765432','seiusgfwey','Laki-Laki','Staff Marketing','2005-07-26','1','wefihwifeu.jpg',1,'uadmin','8cb2237d0679ca88db6464eac60da96345513964'),(15,'1234567898765431','Tetew','Laki-Laki','Staff Marketing','2023-12-31','1','NodeMCU-pinOUT-493x5001.png',2,'brabus','75dca01832391c098332c8217cb5ca0461ced07c');
/*!40000 ALTER TABLE `data_pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hak_akses`
--

DROP TABLE IF EXISTS `hak_akses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(100) DEFAULT NULL,
  `hak_akses` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hak_akses`
--

LOCK TABLES `hak_akses` WRITE;
/*!40000 ALTER TABLE `hak_akses` DISABLE KEYS */;
INSERT INTO `hak_akses` VALUES (1,'admin',1),(2,'pegawai',2);
/*!40000 ALTER TABLE `hak_akses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `potongan_gaji`
--

DROP TABLE IF EXISTS `potongan_gaji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `potongan_gaji` (
  `id_potongan` int(11) NOT NULL AUTO_INCREMENT,
  `potongan` varchar(100) DEFAULT NULL,
  `jml_potongan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_potongan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `potongan_gaji`
--

LOCK TABLES `potongan_gaji` WRITE;
/*!40000 ALTER TABLE `potongan_gaji` DISABLE KEYS */;
INSERT INTO `potongan_gaji` VALUES (1,'Sakit',0),(2,'Izin',50000),(3,'Alpha',100000);
/*!40000 ALTER TABLE `potongan_gaji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'payday'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-31 16:22:07
