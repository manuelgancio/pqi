-- MySQL dump 10.14  Distrib 5.5.52-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: pakete2
-- ------------------------------------------------------
-- Server version	5.5.52-MariaDB

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
-- Table structure for table `articulo`
--

DROP TABLE IF EXISTS `articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulo` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `fecha_a` date DEFAULT NULL,
  `contenido` varchar(7000) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `contador_a` int(11) DEFAULT NULL,
  `id_s` int(11) DEFAULT NULL,
  `art_d` tinyint(1) DEFAULT NULL,
  `imagen` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_a`),
  KEY `id_s` (`id_s`),
  CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`id_s`) REFERENCES `seccion` (`id_s`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulo`
--

LOCK TABLES `articulo` WRITE;
/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `articulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cl` int(11) NOT NULL AUTO_INCREMENT,
  `corre_c` varchar(100) DEFAULT NULL,
  `pass_c` varchar(300) DEFAULT NULL,
  `edo_cl` tinyint(1) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cl`),
  KEY `id_p` (`id_p`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `persona` (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `id_cm` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(150) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_c` date DEFAULT NULL,
  PRIMARY KEY (`id_cm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edicion`
--

DROP TABLE IF EXISTS `edicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edicion` (
  `id_ed` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(80) DEFAULT NULL,
  `fecha_ed` date DEFAULT NULL,
  `id_e` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ed`),
  KEY `id_e` (`id_e`),
  CONSTRAINT `edicion_ibfk_1` FOREIGN KEY (`id_e`) REFERENCES `empleado` (`id_e`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edicion`
--

LOCK TABLES `edicion` WRITE;
/*!40000 ALTER TABLE `edicion` DISABLE KEYS */;
/*!40000 ALTER TABLE `edicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `id_e` int(11) NOT NULL AUTO_INCREMENT,
  `e_correo` varchar(60) DEFAULT NULL,
  `pass_e` varchar(300) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `seccion` varchar(50) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_e`),
  KEY `id_p` (`id_p`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `persona` (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `espacio`
--

DROP TABLE IF EXISTS `espacio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `espacio` (
  `id_esp` int(11) NOT NULL AUTO_INCREMENT,
  `ubicacion` int(11) DEFAULT NULL,
  `seccion` varchar(50) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_esp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espacio`
--

LOCK TABLES `espacio` WRITE;
/*!40000 ALTER TABLE `espacio` DISABLE KEYS */;
/*!40000 ALTER TABLE `espacio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examina`
--

DROP TABLE IF EXISTS `examina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examina` (
  `id_cm` int(11) NOT NULL DEFAULT '0',
  `id_e` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cm`),
  KEY `id_e` (`id_e`),
  CONSTRAINT `examina_ibfk_1` FOREIGN KEY (`id_cm`) REFERENCES `comentario` (`id_cm`),
  CONSTRAINT `examina_ibfk_2` FOREIGN KEY (`id_e`) REFERENCES `empleado` (`id_e`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examina`
--

LOCK TABLES `examina` WRITE;
/*!40000 ALTER TABLE `examina` DISABLE KEYS */;
/*!40000 ALTER TABLE `examina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gratis`
--

DROP TABLE IF EXISTS `gratis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gratis` (
  `id_cg` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cg`),
  KEY `id_cl` (`id_cl`),
  CONSTRAINT `gratis_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id_cl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gratis`
--

LOCK TABLES `gratis` WRITE;
/*!40000 ALTER TABLE `gratis` DISABLE KEYS */;
/*!40000 ALTER TABLE `gratis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hace`
--

DROP TABLE IF EXISTS `hace`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hace` (
  `id_cm` int(11) NOT NULL DEFAULT '0',
  `id_cl` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cm`),
  KEY `id_cl` (`id_cl`),
  CONSTRAINT `hace_ibfk_1` FOREIGN KEY (`id_cm`) REFERENCES `comentario` (`id_cm`),
  CONSTRAINT `hace_ibfk_2` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id_cl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hace`
--

LOCK TABLES `hace` WRITE;
/*!40000 ALTER TABLE `hace` DISABLE KEYS */;
/*!40000 ALTER TABLE `hace` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hay`
--

DROP TABLE IF EXISTS `hay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hay` (
  `id_pub` int(11) NOT NULL DEFAULT '0',
  `id_esp` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pub`,`id_esp`),
  KEY `id_esp` (`id_esp`),
  CONSTRAINT `hay_ibfk_1` FOREIGN KEY (`id_pub`) REFERENCES `publicidad` (`id_pub`),
  CONSTRAINT `hay_ibfk_2` FOREIGN KEY (`id_esp`) REFERENCES `espacio` (`id_esp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hay`
--

LOCK TABLES `hay` WRITE;
/*!40000 ALTER TABLE `hay` DISABLE KEYS */;
/*!40000 ALTER TABLE `hay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago`
--

DROP TABLE IF EXISTS `pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago` (
  `id_cp` int(11) NOT NULL AUTO_INCREMENT,
  `ntarj` int(11) DEFAULT NULL,
  `id_cl` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cp`),
  KEY `id_cl` (`id_cl`),
  CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id_cl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `id_p` int(11) NOT NULL AUTO_INCREMENT,
  `p_nomb` varchar(50) DEFAULT NULL,
  `p_ap` varchar(50) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicidad`
--

DROP TABLE IF EXISTS `publicidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicidad` (
  `id_pub` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_d` date DEFAULT NULL,
  `fecha_h` date DEFAULT NULL,
  `publicacion` varchar(1000) DEFAULT NULL,
  `id_e` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pub`),
  KEY `id_e` (`id_e`),
  CONSTRAINT `publicidad_ibfk_1` FOREIGN KEY (`id_e`) REFERENCES `empleado` (`id_e`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicidad`
--

LOCK TABLES `publicidad` WRITE;
/*!40000 ALTER TABLE `publicidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seccion` (
  `id_s` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `contador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_s`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suscripcion`
--

DROP TABLE IF EXISTS `suscripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suscripcion` (
  `id_sus` int(11) NOT NULL AUTO_INCREMENT,
  `plan` int(1) DEFAULT NULL,
  `fecha_d` date DEFAULT NULL,
  `fecha_h` date DEFAULT NULL,
  `id_cp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sus`),
  KEY `id_cp` (`id_cp`),
  CONSTRAINT `suscripcion_ibfk_1` FOREIGN KEY (`id_cp`) REFERENCES `pago` (`id_cp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suscripcion`
--

LOCK TABLES `suscripcion` WRITE;
/*!40000 ALTER TABLE `suscripcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `suscripcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suspende`
--

DROP TABLE IF EXISTS `suspende`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suspende` (
  `id_sp` int(11) NOT NULL DEFAULT '0',
  `motivo` varchar(50) DEFAULT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `id_e` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sp`),
  KEY `id_cl` (`id_cl`),
  KEY `id_e` (`id_e`),
  CONSTRAINT `suspende_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id_cl`),
  CONSTRAINT `suspende_ibfk_2` FOREIGN KEY (`id_e`) REFERENCES `empleado` (`id_e`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suspende`
--

LOCK TABLES `suspende` WRITE;
/*!40000 ALTER TABLE `suspende` DISABLE KEYS */;
/*!40000 ALTER TABLE `suspende` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiene`
--

DROP TABLE IF EXISTS `tiene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiene` (
  `id_cm` int(11) NOT NULL DEFAULT '0',
  `id_a` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cm`,`id_a`),
  KEY `id_a` (`id_a`),
  CONSTRAINT `tiene_ibfk_1` FOREIGN KEY (`id_cm`) REFERENCES `comentario` (`id_cm`),
  CONSTRAINT `tiene_ibfk_2` FOREIGN KEY (`id_a`) REFERENCES `articulo` (`id_a`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiene`
--

LOCK TABLES `tiene` WRITE;
/*!40000 ALTER TABLE `tiene` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiene` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiene_s`
--

DROP TABLE IF EXISTS `tiene_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiene_s` (
  `id_s` int(11) NOT NULL DEFAULT '0',
  `id_ed` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_s`),
  KEY `id_ed` (`id_ed`),
  CONSTRAINT `tiene_s_ibfk_1` FOREIGN KEY (`id_s`) REFERENCES `seccion` (`id_s`),
  CONSTRAINT `tiene_s_ibfk_2` FOREIGN KEY (`id_ed`) REFERENCES `edicion` (`id_ed`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiene_s`
--

LOCK TABLES `tiene_s` WRITE;
/*!40000 ALTER TABLE `tiene_s` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiene_s` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-14 16:17:13
