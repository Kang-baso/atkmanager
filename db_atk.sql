-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_atk
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

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
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `ket` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `jenis` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max` int(11) NOT NULL DEFAULT '0',
  `min` int(11) NOT NULL DEFAULT '0',
  `harga` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (1,'Ballpoint hitam tinta basah','pak',54,'Khusus tanda tangan/ paraf',NULL,0,0,0),(2,'Ballpoint hitam tinta kering','pak',15,'keperluan umum',NULL,0,0,0),(7,'Pengulek sambal','buah',5,'keperluan pantry',NULL,0,0,0),(5,'Stempel','lembar',40,'mantap',NULL,0,0,0),(6,'Lampu dinding','balon',0,'rencana belanja keperluan pameran',NULL,0,0,0);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `divisi`
--

DROP TABLE IF EXISTS `divisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisi`
--

LOCK TABLES `divisi` WRITE;
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;
/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` int(11) NOT NULL DEFAULT '0',
  `barang` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'21232f297a57a5a743894a0e4a801fc3',1,1);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `nik` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_divisi` int(11) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-10  7:01:06
