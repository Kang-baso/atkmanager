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
  `img` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no-image.png',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (1,'Ballpoint hitam tinta basah','pak',54,'Khusus tanda tangan/ paraf',NULL,0,0,0,'ballpoint-black.jpg'),(2,'Ballpoint hitam tinta kering','pak',15,'keperluan umum',NULL,0,0,0,'no-image.png'),(7,'Lakban','BUAH',7,'keperluan pantry',NULL,0,0,0,'no-image.png'),(5,'Stempel','lembar',40,'mantap',NULL,0,0,0,'no-image.png'),(6,'Penghapus Pencil','DOS',0,'Keperluan gambar',NULL,0,0,0,'no-image.png'),(8,'Kertas HVS','PAK',0,'',NULL,0,0,0,'no-image.png'),(9,'hekter','buah',0,'',NULL,0,0,0,'no-image.png'),(10,'Spidol Hitam','DOS',0,'',NULL,0,0,0,'no-image.png'),(11,'Spidol Biru','DOS',0,'',NULL,0,0,0,'no-image.png'),(12,'Penggaris Lurus','DOS',0,'',NULL,0,0,0,'no-image.png'),(13,'Kertas Postit','DOS',0,'',NULL,0,0,0,'no-image.png'),(14,'Penggaris Segi Tiga','PAK',0,'',NULL,0,0,0,'no-image.png');
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisi`
--

LOCK TABLES `divisi` WRITE;
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;
INSERT INTO `divisi` VALUES (1,'Non Divisi','Khusus Direksi'),(2,'Keuangan',''),(3,'Pemasaran',''),(4,'Humas','');
/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permintaan`
--

DROP TABLE IF EXISTS `permintaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permintaan` (
  `nomor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `status` int(11) NOT NULL DEFAULT '0',
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nik` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permintaan`
--

LOCK TABLES `permintaan` WRITE;
/*!40000 ALTER TABLE `permintaan` DISABLE KEYS */;
INSERT INTO `permintaan` VALUES ('nomor-12345','tes tes saja bos',0,'2017-09-13 13:32:51','0123456789'),('4545-yajshdf','rutin',0,'2017-09-13 13:37:49','0123456789'),('1111-tambahan-2017','tambahan bos',0,'2017-09-13 13:48:25','0123456789');
/*!40000 ALTER TABLE `permintaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permintaan_d`
--

DROP TABLE IF EXISTS `permintaan_d`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permintaan_d` (
  `nomor_permintaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jml_minta` int(11) NOT NULL,
  `jml_setuju` int(11) NOT NULL DEFAULT '0',
  `ket_tolak` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  PRIMARY KEY (`nomor_permintaan`,`id_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permintaan_d`
--

LOCK TABLES `permintaan_d` WRITE;
/*!40000 ALTER TABLE `permintaan_d` DISABLE KEYS */;
INSERT INTO `permintaan_d` VALUES ('nomor-12345',11,3,0,'-'),('nomor-12345',6,2,0,'-'),('nomor-12345',10,4,0,'-'),('nomor-12345',5,1,0,'-'),('4545-yajshdf',1,3,0,'-'),('4545-yajshdf',2,2,0,'-'),('4545-yajshdf',9,1,0,'-'),('1111-tambahan-2017',13,4,0,'-'),('1111-tambahan-2017',7,6,0,'-'),('1111-tambahan-2017',12,3,0,'-');
/*!40000 ALTER TABLE `permintaan_d` ENABLE KEYS */;
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
  `posisi` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_divisi` int(11) NOT NULL,
  `nik_atasan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('0123456789','Pak Direktur Cabang','12345','085208520852','r41l_86@yahoo.com',NULL,1,'');
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

-- Dump completed on 2017-09-14 14:44:42
