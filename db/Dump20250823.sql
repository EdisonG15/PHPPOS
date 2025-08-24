CREATE DATABASE  IF NOT EXISTS `db2025v2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db2025v2`;
-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: db2025v2
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `abonos_compra_credito`
--

DROP TABLE IF EXISTS `abonos_compra_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abonos_compra_credito` (
  `id_abono` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `id_compra_credito` int DEFAULT NULL,
  `id_movimiento_caja` int NOT NULL,
  `monto_abonado` decimal(10,2) DEFAULT NULL,
  `fecha_abono` datetime DEFAULT CURRENT_TIMESTAMP,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `observacion` text,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_abono`),
  KEY `id_compra_credito` (`id_compra_credito`),
  KEY `id_movimiento_caja` (`id_movimiento_caja`),
  CONSTRAINT `abonos_compra_credito_ibfk_1` FOREIGN KEY (`id_compra_credito`) REFERENCES `compras_credito` (`id_compra_credito`),
  CONSTRAINT `abonos_compra_credito_ibfk_2` FOREIGN KEY (`id_movimiento_caja`) REFERENCES `movimiento_caja` (`id_movimiento_caja`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abonos_compra_credito`
--

LOCK TABLES `abonos_compra_credito` WRITE;
/*!40000 ALTER TABLE `abonos_compra_credito` DISABLE KEYS */;
INSERT INTO `abonos_compra_credito` VALUES (1,NULL,5,2,1.00,'2025-08-07 22:02:44','1','duno un dolar','0'),(2,NULL,6,2,1.00,'2025-08-07 22:03:25','1','dono un dolar','1'),(3,NULL,12,2,1.00,'2025-08-10 14:30:47','1','Abonar un dolar','1'),(4,NULL,12,2,8.00,'2025-08-10 15:38:24','1','pag','1'),(5,NULL,12,2,0.80,'2025-08-10 15:38:42','1','pago total','1'),(6,NULL,5,2,5.00,'2025-08-16 15:53:58','1','pago','0'),(7,NULL,5,2,2.00,'2025-08-16 19:09:10','1','pago de creon apl','0'),(8,NULL,5,5,3.00,'2025-08-22 21:57:23','1','44','1');
/*!40000 ALTER TABLE `abonos_compra_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `abonos_credito`
--

DROP TABLE IF EXISTS `abonos_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abonos_credito` (
  `id_abono` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `id_venta_credito` int DEFAULT NULL,
  `id_movimiento_caja` int NOT NULL,
  `monto_abonado` decimal(10,2) DEFAULT NULL,
  `fecha_abono` datetime DEFAULT CURRENT_TIMESTAMP,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `observacion` text,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_abono`),
  KEY `id_venta_credito` (`id_venta_credito`),
  KEY `id_movimiento_caja` (`id_movimiento_caja`),
  CONSTRAINT `abonos_credito_ibfk_1` FOREIGN KEY (`id_venta_credito`) REFERENCES `ventas_credito` (`id_venta_credito`),
  CONSTRAINT `abonos_credito_ibfk_2` FOREIGN KEY (`id_movimiento_caja`) REFERENCES `movimiento_caja` (`id_movimiento_caja`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abonos_credito`
--

LOCK TABLES `abonos_credito` WRITE;
/*!40000 ALTER TABLE `abonos_credito` DISABLE KEYS */;
INSERT INTO `abonos_credito` VALUES (1,1,2,1,1.00,'2025-08-10 18:09:03','1','avonos','1'),(2,1,3,1,1.00,'2025-08-10 18:09:23','1','avonos','1'),(3,1,1,1,20.00,'2025-08-16 20:48:07','1','pago de cliente 0009921','0'),(4,1,2,4,6.00,'2025-08-21 21:01:13','1','boda','1'),(5,1,1,4,3.00,'2025-08-22 21:57:38','1','rrrr','1');
/*!40000 ALTER TABLE `abonos_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ajuste_lote`
--

DROP TABLE IF EXISTS `ajuste_lote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ajuste_lote` (
  `id_ajuste` int NOT NULL AUTO_INCREMENT,
  `id_lote` int NOT NULL,
  `cantidad` int NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `fecha_ajuste` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observacion` text,
  `id_usuario` int DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ajuste`),
  KEY `id_lote` (`id_lote`),
  CONSTRAINT `ajuste_lote_ibfk_1` FOREIGN KEY (`id_lote`) REFERENCES `lote_producto` (`id_lote`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ajuste_lote`
--

LOCK TABLES `ajuste_lote` WRITE;
/*!40000 ALTER TABLE `ajuste_lote` DISABLE KEYS */;
INSERT INTO `ajuste_lote` VALUES (1,62,10,'DEVOLUCION','2025-08-10 12:31:58','devolucio',1,'2025-08-10 12:31:58'),(2,66,5,'PERDIDA','2025-08-10 13:03:31','por que se me callo',1,'2025-08-10 13:03:31'),(3,29,1,'DEVOLUCION','2025-08-10 13:16:51','devolcuon',1,'2025-08-10 13:16:51'),(4,29,1,'PERDIDA','2025-08-10 13:24:03','pedida',1,'2025-08-10 13:24:03');
/*!40000 ALTER TABLE `ajuste_lote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ambiente`
--

DROP TABLE IF EXISTS `ambiente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ambiente` (
  `id_ambiente` tinyint NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_ambiente`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ambiente`
--

LOCK TABLES `ambiente` WRITE;
/*!40000 ALTER TABLE `ambiente` DISABLE KEYS */;
INSERT INTO `ambiente` VALUES (2,'PRODUCCION'),(1,'PRUEBAS');
/*!40000 ALTER TABLE `ambiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arqueo_caja`
--

DROP TABLE IF EXISTS `arqueo_caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arqueo_caja` (
  `id_arqueo_caja` int NOT NULL AUTO_INCREMENT,
  `id_caja` int NOT NULL,
  `id_usuario` int NOT NULL,
  `fecha_inicio` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_fin` datetime DEFAULT NULL,
  `monto_inicial` decimal(10,2) NOT NULL,
  `total_ingresos` decimal(10,2) DEFAULT '0.00',
  `total_egresos` decimal(10,2) DEFAULT '0.00',
  `saldo_final` decimal(10,2) DEFAULT '0.00',
  `monto_usuario` decimal(10,2) DEFAULT '0.00',
  `sobrante_caja` decimal(10,2) DEFAULT '0.00',
  `faltantes_caja` decimal(10,2) DEFAULT '0.00',
  `ObservacionApertura` text,
  `ObservacionCierre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_arqueo_caja`),
  KEY `id_caja` (`id_caja`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `arqueo_caja_ibfk_1` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id_caja`),
  CONSTRAINT `arqueo_caja_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arqueo_caja`
--

LOCK TABLES `arqueo_caja` WRITE;
/*!40000 ALTER TABLE `arqueo_caja` DISABLE KEYS */;
INSERT INTO `arqueo_caja` VALUES (1,1,1,'2025-07-29 22:01:04','2025-08-20 21:31:33',40.00,801.00,630.61,210.39,210.39,0.00,0.00,'apertura inicial',' se cerrro por corte de hoy','0'),(2,1,1,'2025-08-21 21:00:31',NULL,120.00,0.00,0.00,0.00,0.00,0.00,0.00,'por ad',NULL,'1');
/*!40000 ALTER TABLE `arqueo_caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asiento_contable`
--

DROP TABLE IF EXISTS `asiento_contable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asiento_contable` (
  `id_asiento` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `descripcion` text,
  `tipo_asiento` enum('VENTA','COMPRA','ABONO','AJUSTE','MANUAL','INVENTARIO_INICIAL') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_referencia` int DEFAULT NULL,
  `modulo_origen` varchar(50) DEFAULT NULL,
  `total_debe` decimal(10,2) DEFAULT '0.00',
  `total_haber` decimal(10,2) DEFAULT '0.00',
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `tipo_referencia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_asiento`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asiento_contable`
--

LOCK TABLES `asiento_contable` WRITE;
/*!40000 ALTER TABLE `asiento_contable` DISABLE KEYS */;
INSERT INTO `asiento_contable` VALUES (1,'2025-07-29','Inventario inicial del producto Producto 1','INVENTARIO_INICIAL',1,'PRODUCTO',30.00,30.00,'2025-07-29 19:17:36','producto'),(2,'2025-07-29','Inventario inicial del producto Producto 2','INVENTARIO_INICIAL',2,'PRODUCTO',164.00,164.00,'2025-07-29 19:19:49','producto'),(3,'2025-07-29','Inventario inicial del producto Producto 3','INVENTARIO_INICIAL',3,'PRODUCTO',100.00,100.00,'2025-07-29 19:21:31','producto'),(4,'2025-07-29','Inventario inicial del producto Producto 4','INVENTARIO_INICIAL',4,'PRODUCTO',54.00,54.00,'2025-07-29 19:24:10','producto'),(5,'2025-07-29','Inventario inicial del producto Producto 5','INVENTARIO_INICIAL',5,'PRODUCTO',18.00,18.00,'2025-07-29 19:26:20','producto'),(6,'2025-07-29','Inventario inicial del producto Producto 6','INVENTARIO_INICIAL',6,'PRODUCTO',22.00,22.00,'2025-07-29 19:28:37','producto'),(7,'2025-07-29','Inventario inicial del producto Producto 7','INVENTARIO_INICIAL',7,'PRODUCTO',71.00,71.00,'2025-07-29 19:30:12','producto'),(8,'2025-07-29','Inventario inicial del producto Producto 8','INVENTARIO_INICIAL',8,'PRODUCTO',394.00,394.00,'2025-07-29 19:32:03','producto'),(9,'2025-07-29','Inventario inicial del producto Producto 9','INVENTARIO_INICIAL',9,'PRODUCTO',288.00,288.00,'2025-07-29 19:34:25','producto'),(10,'2025-07-29','Inventario inicial del producto Producto 10','INVENTARIO_INICIAL',10,'PRODUCTO',61.00,61.00,'2025-07-29 19:35:46','producto'),(11,'2025-07-29','Inventario inicial del producto Producto 11','INVENTARIO_INICIAL',11,'PRODUCTO',174.00,174.00,'2025-07-29 20:09:01','producto'),(12,'2025-07-29','Inventario inicial del producto Producto 12','INVENTARIO_INICIAL',12,'PRODUCTO',35.00,35.00,'2025-07-29 20:10:11','producto'),(13,'2025-07-29','Inventario inicial del producto Producto 13','INVENTARIO_INICIAL',13,'PRODUCTO',94.00,94.00,'2025-07-29 20:11:48','producto'),(14,'2025-07-29','Inventario inicial del producto Producto 14','INVENTARIO_INICIAL',14,'PRODUCTO',116.00,116.00,'2025-07-29 20:13:20','producto'),(15,'2025-07-29','Inventario inicial del producto Producto 15','INVENTARIO_INICIAL',15,'PRODUCTO',170.00,170.00,'2025-07-29 20:14:31','producto'),(16,'2025-07-29','Inventario inicial del producto Producto 16','INVENTARIO_INICIAL',16,'PRODUCTO',46.00,46.00,'2025-07-29 20:16:00','producto'),(17,'2025-07-29','Inventario inicial del producto Producto 17','INVENTARIO_INICIAL',17,'PRODUCTO',146.00,146.00,'2025-07-29 20:17:15','producto'),(18,'2025-07-29','Inventario inicial del producto Producto 18','INVENTARIO_INICIAL',18,'PRODUCTO',368.00,368.00,'2025-07-29 20:18:34','producto'),(19,'2025-07-29','Inventario inicial del producto Producto 19','INVENTARIO_INICIAL',19,'PRODUCTO',345.00,345.00,'2025-07-29 20:19:43','producto'),(20,'2025-07-29','Inventario inicial del producto Producto 20','INVENTARIO_INICIAL',20,'PRODUCTO',64.00,64.00,'2025-07-29 20:21:24','producto'),(21,'2025-07-29','Inventario inicial del producto Producto 21','INVENTARIO_INICIAL',21,'PRODUCTO',75.00,75.00,'2025-07-29 20:22:45','producto'),(22,'2025-07-29','Inventario inicial del producto Producto 22','INVENTARIO_INICIAL',22,'PRODUCTO',43.00,43.00,'2025-07-29 20:25:20','producto'),(23,'2025-07-29','Inventario inicial del producto Producto 23','INVENTARIO_INICIAL',23,'PRODUCTO',103.00,103.00,'2025-07-29 20:28:02','producto'),(24,'2025-07-29','Inventario inicial del producto Producto 24','INVENTARIO_INICIAL',24,'PRODUCTO',66.00,66.00,'2025-07-29 20:30:26','producto'),(25,'2025-07-29','Inventario inicial del producto Producto 25','INVENTARIO_INICIAL',25,'PRODUCTO',50.00,50.00,'2025-07-29 20:32:24','producto'),(26,'2025-07-29','Inventario inicial del producto Producto 26','INVENTARIO_INICIAL',26,'PRODUCTO',21.00,21.00,'2025-07-29 20:35:25','producto'),(27,'2025-07-29','Inventario inicial del producto Producto 27','INVENTARIO_INICIAL',27,'PRODUCTO',55.00,55.00,'2025-07-29 21:17:07','producto'),(28,'2025-07-29','Inventario inicial del producto Producto 28','INVENTARIO_INICIAL',28,'PRODUCTO',103.00,103.00,'2025-07-29 21:18:30','producto'),(29,'2025-07-29','Inventario inicial del producto Producto 29','INVENTARIO_INICIAL',29,'PRODUCTO',66.00,66.00,'2025-07-29 21:19:46','producto'),(30,'2025-07-29','Inventario inicial del producto Producto 30','INVENTARIO_INICIAL',30,'PRODUCTO',266.00,266.00,'2025-07-29 21:21:11','producto'),(31,'2025-08-07','Ingreso de producto 9304457235099 - 7','COMPRA',NULL,'INVENTARIO',16.98,16.98,'2025-08-07 19:51:21','KARDEX'),(32,'2025-08-10','Ingreso de producto 9304457235099 - comprea algun proveedor','COMPRA',NULL,'INVENTARIO',28.80,28.80,'2025-08-10 10:37:13','KARDEX'),(33,'2025-08-10','Ingreso de producto 9304457235099 - por compras no se que','COMPRA',NULL,'INVENTARIO',17.28,17.28,'2025-08-10 10:50:03','KARDEX'),(34,'2025-08-10','Ingreso de producto 8449598633935 - por sa','COMPRA',NULL,'INVENTARIO',6.30,6.30,'2025-08-10 11:09:17','KARDEX'),(35,'2025-08-10','Ingreso de producto 8449598633935 - promocion','COMPRA',NULL,'INVENTARIO',3.60,3.60,'2025-08-10 11:14:56','KARDEX'),(36,'2025-08-10','Ajuste de stock por DEVOLUCION: devolucio','AJUSTE',30,'INVENTARIO',28.80,28.80,'2025-08-10 12:31:58','PRODUCTO'),(37,'2025-08-10','Ajuste de stock por PERDIDA: por que se me callo','AJUSTE',30,'INVENTARIO',14.40,14.40,'2025-08-10 13:03:31','PRODUCTO'),(38,'2025-08-10','Ajuste de stock por DEVOLUCION: devolcuon','AJUSTE',29,'INVENTARIO',0.90,0.90,'2025-08-10 13:16:51','PRODUCTO'),(39,'2025-08-10','Ajuste de stock por PERDIDA: pedida','AJUSTE',29,'INVENTARIO',0.90,0.90,'2025-08-10 13:24:03','PRODUCTO'),(40,'2025-08-22','Inventario inicial del producto Leche Entera','INVENTARIO_INICIAL',31,'PRODUCTO',150.00,150.00,'2025-08-22 22:03:10','producto'),(41,'2025-08-22','Inventario inicial del producto Manzanas','INVENTARIO_INICIAL',33,'PRODUCTO',40.40,40.40,'2025-08-22 22:04:22','producto'),(42,'2025-08-22','Inventario inicial del producto Pan Integral','INVENTARIO_INICIAL',34,'PRODUCTO',100.00,100.00,'2025-08-22 22:07:38','producto'),(43,'2025-08-22','Inventario inicial del producto Leche Entera','INVENTARIO_INICIAL',35,'PRODUCTO',150.00,150.00,'2025-08-22 22:08:34','producto'),(44,'2025-08-22','Inventario inicial del producto Manzanas','INVENTARIO_INICIAL',36,'PRODUCTO',40.40,40.40,'2025-08-22 22:08:34','producto'),(45,'2025-08-22','Inventario inicial del producto Pan Integral','INVENTARIO_INICIAL',37,'PRODUCTO',100.00,100.00,'2025-08-22 22:08:34','producto');
/*!40000 ALTER TABLE `asiento_contable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cajas`
--

DROP TABLE IF EXISTS `cajas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cajas` (
  `id_caja` int NOT NULL AUTO_INCREMENT,
  `numero_caja` varchar(20) NOT NULL,
  `nombre_caja` varchar(20) NOT NULL,
  `folio` varchar(20) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_caja`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cajas`
--

LOCK TABLES `cajas` WRITE;
/*!40000 ALTER TABLE `cajas` DISABLE KEYS */;
INSERT INTO `cajas` VALUES (1,'1','Gener','01','2025-04-28 16:23:09','2025-05-09 11:39:18',NULL,'1'),(2,'3323','23323','22332','2025-04-30 07:10:26','2025-04-30 19:52:07','2025-04-30 07:52:07','0'),(3,'22222','2222','222222','2025-04-30 19:18:42','2025-04-30 19:20:48','2025-04-30 07:20:48','0');
/*!40000 ALTER TABLE `cajas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `aplica_peso` int DEFAULT NULL,
  `id_usuario_creacion` int DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_usuario_actualizacion` int DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_eliminacion` int DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'sin categoria',NULL,1,'2025-07-29 19:16:15',NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` char(2) DEFAULT NULL,
  `numeroDocumento` varchar(13) DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_usuario_creacion` int DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_usuario_actualizacion` int DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_eliminacion` int DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `idx_cliente_numeroDocumento` (`numeroDocumento`),
  KEY `fk_cliente_tipo_identificacion` (`tipo_identificacion`),
  CONSTRAINT `fk_cliente_tipo_identificacion` FOREIGN KEY (`tipo_identificacion`) REFERENCES `tipo_identificacion` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'05','0102030405','Juan alarcons','Pérez Garcia','Av. Quito 123','098676554544','juan@gmail.com',1,'2025-07-29 21:51:27',NULL,'2025-08-17 09:36:35',NULL,NULL,'1'),(2,'05','0912345678','María','López','Calle 10 de Agosto','098767666776','frrrss@gmail.com',1,'2025-07-29 21:52:27',NULL,NULL,NULL,NULL,'1'),(3,'05','0809091122','Pedro','Gómez','Av. Amazonas','0809091122','juan@mail.com',1,'2025-07-29 21:53:35',NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras` (
  `IdCompra` int NOT NULL AUTO_INCREMENT,
  `IdProveedor` int DEFAULT NULL,
  `IdTienda` int DEFAULT NULL,
  `nro_boletacompras` varchar(20) DEFAULT NULL,
  `subtotalcosto` decimal(10,2) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `TotalCosto` decimal(10,2) DEFAULT NULL,
  `TipoComprobante` enum('TICKET','FACTURA','NOTA_CREDITO','NOTA_DEBITO','GUIA_REMISION','RETENCION') NOT NULL,
  `NumeroSerie` varchar(15) DEFAULT NULL,
  `NumeroFactura` varchar(15) DEFAULT NULL,
  `fecha_factura` date DEFAULT NULL,
  `id_usuario_creacion` int DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_usuario_actualizacion` int DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_anulacion` int DEFAULT NULL,
  `fecha_anulacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  `tipo_pago` enum('EFECTIVO','CREDITO','TARJETA') DEFAULT NULL,
  PRIMARY KEY (`IdCompra`),
  KEY `fk_compra_IdUsuario` (`id_usuario_creacion`),
  CONSTRAINT `fk_compra_IdUsuario` FOREIGN KEY (`id_usuario_creacion`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (1,1,NULL,'00000045',100.16,15.02,115.18,'FACTURA',NULL,'00009','2025-11-02',1,'2025-07-29 22:21:03',NULL,NULL,NULL,NULL,'1','CREDITO'),(2,2,NULL,'00000046',107.44,16.12,123.56,'FACTURA',NULL,'000009','2025-12-28',1,'2025-07-30 12:22:41',NULL,'2025-08-07 21:52:21',NULL,NULL,'1','EFECTIVO'),(3,1,NULL,'00000047',27.39,4.11,31.50,'FACTURA',NULL,'000009','2025-07-26',1,'2025-07-30 12:24:22',NULL,'2025-08-07 21:52:21',NULL,NULL,'1','EFECTIVO'),(4,2,NULL,'00000048',7.04,1.06,8.10,'FACTURA',NULL,'00009','2025-12-27',1,'2025-07-30 12:25:23',NULL,NULL,NULL,NULL,'1','EFECTIVO'),(5,1,NULL,'00000049',38.58,5.79,44.37,'FACTURA',NULL,'0002','2025-09-13',1,'2025-07-30 12:29:06',NULL,NULL,NULL,NULL,'1','CREDITO'),(6,2,NULL,'00000050',58.23,8.73,66.96,'FACTURA',NULL,'000909','2025-08-01',1,'2025-07-30 12:37:10',NULL,NULL,NULL,NULL,'1','EFECTIVO'),(7,2,NULL,'00000051',36.52,5.48,42.00,'FACTURA',NULL,'00009','2025-10-26',1,'2025-07-30 12:39:46',NULL,NULL,NULL,NULL,'1','CREDITO'),(8,1,NULL,'00000052',5.13,0.77,5.90,'FACTURA',NULL,'000099','2026-03-28',1,'2025-07-30 12:40:59',NULL,NULL,NULL,NULL,'1','EFECTIVO'),(9,2,NULL,'00000053',52.11,7.82,59.93,'FACTURA',NULL,'0009','2025-11-01',1,'2025-07-30 12:42:57',NULL,NULL,NULL,NULL,'1','CREDITO'),(10,1,NULL,'00000054',161.14,24.17,185.31,'FACTURA',NULL,'00099','2025-08-10',1,'2025-07-30 13:16:41',NULL,NULL,NULL,NULL,'1','CREDITO'),(11,2,NULL,'00000055',89.40,13.41,102.81,'FACTURA',NULL,'00077','2025-10-25',1,'2025-07-30 13:18:22',NULL,NULL,NULL,NULL,'1','CREDITO'),(12,1,NULL,'00000056',72.87,10.93,83.80,'FACTURA',NULL,'00098','2026-09-19',1,'2025-07-30 13:21:09',NULL,NULL,NULL,NULL,'1','CREDITO'),(13,2,NULL,'00000057',37.64,5.65,43.29,'FACTURA',NULL,'0000098','2026-05-03',1,'2025-07-30 13:23:20',NULL,NULL,NULL,NULL,'1','EFECTIVO'),(14,1,NULL,'00000058',210.06,31.51,241.57,'FACTURA',NULL,'000009','2026-02-01',1,'2025-07-30 13:26:32',NULL,NULL,NULL,NULL,'1','EFECTIVO'),(15,1,NULL,'00000059',29.90,4.49,34.39,'FACTURA',NULL,'000877','2026-02-22',1,'2025-07-30 13:28:45',NULL,NULL,NULL,NULL,'1','CREDITO'),(16,2,NULL,'00000060',63.00,9.45,72.45,'FACTURA',NULL,'000998','2026-01-24',1,'2025-07-30 13:30:19',NULL,NULL,NULL,NULL,'1','EFECTIVO'),(17,2,NULL,'00000061',78.05,11.71,89.76,'FACTURA',NULL,'0000887','2026-03-21',1,'2025-07-30 13:33:14',NULL,NULL,NULL,NULL,'1','CREDITO'),(18,1,NULL,'00000062',31.48,4.72,36.20,'FACTURA',NULL,'0000997','2026-11-14',1,'2025-07-30 13:35:01',NULL,NULL,NULL,NULL,'1','CREDITO'),(19,2,NULL,'00000063',22.98,3.45,26.43,'FACTURA',NULL,'0000983','2026-08-22',1,'2025-07-30 13:37:47',NULL,NULL,NULL,NULL,'1','CREDITO'),(20,1,NULL,'00000064',10.87,1.63,12.50,'FACTURA',NULL,'000000998','2026-05-31',1,'2025-07-30 13:39:16',NULL,NULL,NULL,NULL,'1','EFECTIVO'),(21,1,NULL,'00000065',7.83,1.17,9.00,'FACTURA',NULL,'0009','2026-01-17',1,'2025-08-10 13:51:49',NULL,NULL,NULL,NULL,'1','EFECTIVO'),(22,1,NULL,'00000066',8.52,1.28,9.80,'FACTURA',NULL,'0988','2025-09-09',1,'2025-08-10 13:56:25',NULL,NULL,NULL,NULL,'1','CREDITO'),(23,1,NULL,'00000067',0.85,0.13,0.98,'FACTURA',NULL,'55','2025-09-27',1,'2025-08-10 14:07:17',NULL,NULL,NULL,NULL,'1','CREDITO'),(24,1,NULL,'00000068',0.85,0.13,0.98,'FACTURA',NULL,'0909','2025-08-17',1,'2025-08-10 14:17:42',NULL,NULL,NULL,NULL,'1','EFECTIVO'),(25,1,NULL,'00000069',2.56,0.38,2.94,'FACTURA',NULL,'323','2025-09-02',1,'2025-08-10 14:18:53',NULL,'2025-08-10 15:20:58',NULL,NULL,'0','EFECTIVO'),(26,1,NULL,'00000070',2.56,0.38,2.94,'FACTURA',NULL,'322','2025-08-10',1,'2025-08-10 14:24:29',NULL,NULL,NULL,NULL,'1','CREDITO');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras_credito`
--

DROP TABLE IF EXISTS `compras_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras_credito` (
  `id_compra_credito` int NOT NULL AUTO_INCREMENT,
  `id_compra` int DEFAULT NULL,
  `nroCreditoCompra` varchar(15) DEFAULT NULL,
  `monto_total` decimal(10,2) DEFAULT NULL,
  `monto_abonado` decimal(10,2) DEFAULT NULL,
  `saldo_pendiente` decimal(10,2) DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('Pendiente','Pagado','Vencido','Otros','Inactivo','Eliminado') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Pendiente',
  PRIMARY KEY (`id_compra_credito`),
  KEY `id_compra` (`id_compra`),
  CONSTRAINT `compras_credito_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`IdCompra`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras_credito`
--

LOCK TABLES `compras_credito` WRITE;
/*!40000 ALTER TABLE `compras_credito` DISABLE KEYS */;
INSERT INTO `compras_credito` VALUES (1,1,'00000001',115.18,0.00,115.18,'2025-11-02','2025-12-27','2025-07-29 22:21:03','Pendiente'),(2,5,'00000001',44.37,0.00,44.37,'2025-09-13','2025-11-29','2025-07-30 12:29:06','Pendiente'),(3,7,'00000001',42.00,1.00,41.00,'2025-10-26','2026-02-07','2025-07-30 12:39:46','Pendiente'),(4,9,'00000001',59.93,0.00,59.93,'2025-11-01','2026-02-20','2025-07-30 12:42:57','Pendiente'),(5,10,'00000001',185.31,5.00,180.31,'2025-08-10','2026-07-03','2025-07-30 13:16:41','Pendiente'),(6,11,'00000001',102.81,1.00,101.81,'2025-10-25','2025-12-28','2025-07-30 13:18:22','Pendiente'),(7,12,'00000001',83.80,0.00,83.80,'2026-09-19','2026-05-23','2025-07-30 13:21:09','Pendiente'),(8,15,'00000001',34.39,0.00,34.39,'2026-02-22','2026-03-22','2025-07-30 13:28:45','Pendiente'),(9,17,'00000001',89.76,0.00,89.76,'2026-03-21','2026-03-21','2025-07-30 13:33:14','Pendiente'),(10,18,'00000001',36.20,0.00,36.20,'2026-11-14','2026-08-22','2025-07-30 13:35:01','Pendiente'),(11,19,'00000001',26.43,0.00,26.43,'2026-08-22','2027-04-09','2025-07-30 13:37:47','Pendiente'),(12,22,'00000001',9.80,9.80,0.00,'2025-09-09','2025-12-27','2025-08-10 13:56:25','Pagado'),(13,23,'00000001',0.98,0.00,0.98,'2025-09-27','2025-09-20','2025-08-10 14:07:17','Pendiente'),(14,26,'00000001',2.94,1.00,1.94,'2025-08-10','2025-08-10','2025-08-10 14:24:29','Pendiente');
/*!40000 ALTER TABLE `compras_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comprobantes_electronicos`
--

DROP TABLE IF EXISTS `comprobantes_electronicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comprobantes_electronicos` (
  `id_comprobante` int NOT NULL AUTO_INCREMENT,
  `id_empresa` int DEFAULT NULL,
  `tipo_documento` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_venta` int DEFAULT NULL,
  `id_cliente` int DEFAULT NULL,
  `numero_autorizacion` varchar(49) DEFAULT NULL,
  `clave_acceso` varchar(49) NOT NULL,
  `numero_documento` varchar(17) NOT NULL,
  `id_ambiente` tinyint DEFAULT NULL,
  `id_estado_emision` tinyint DEFAULT NULL,
  `fecha_emision` datetime DEFAULT NULL,
  `fecha_autorizacion` datetime DEFAULT NULL,
  `id_tipo_emision` tinyint DEFAULT '1',
  `mensaje_respuesta` text,
  `ruta_xml_generado` text,
  `ruta_xml_firmado` text,
  `ruta_xml_autorizado` text,
  `ruta_codigo_barras` text,
  `pdf_generado` text,
  `id_enviado_cliente` tinyint DEFAULT '2',
  `fecha_envio_cliente` datetime DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comprobante`),
  UNIQUE KEY `uk_clave_acceso` (`clave_acceso`),
  KEY `idx_numero_documento` (`numero_documento`),
  KEY `idx_id_venta` (`id_venta`),
  KEY `idx_id_cliente` (`id_cliente`),
  KEY `codigo_sri` (`tipo_documento`),
  KEY `id_ambiente` (`id_ambiente`),
  KEY `id_estado_emision` (`id_estado_emision`),
  KEY `id_tipo_emision` (`id_tipo_emision`),
  KEY `id_enviado_cliente` (`id_enviado_cliente`),
  CONSTRAINT `comprobantes_electronicos_ibfk_1` FOREIGN KEY (`tipo_documento`) REFERENCES `tipo_comprobante` (`codigo_sri`),
  CONSTRAINT `comprobantes_electronicos_ibfk_2` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`id_ambiente`),
  CONSTRAINT `comprobantes_electronicos_ibfk_3` FOREIGN KEY (`id_estado_emision`) REFERENCES `estado_emision` (`id_estado`),
  CONSTRAINT `comprobantes_electronicos_ibfk_4` FOREIGN KEY (`id_tipo_emision`) REFERENCES `tipo_emision` (`id_tipo_emision`),
  CONSTRAINT `comprobantes_electronicos_ibfk_5` FOREIGN KEY (`id_enviado_cliente`) REFERENCES `enviado_cliente` (`id_enviado`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprobantes_electronicos`
--

LOCK TABLES `comprobantes_electronicos` WRITE;
/*!40000 ALTER TABLE `comprobantes_electronicos` DISABLE KEYS */;
INSERT INTO `comprobantes_electronicos` VALUES (1,1,'01',1,1,'3007202501080461081400110010010000000157592970513','3007202501080461081400110010010000000157592970513','001-001-000000015',1,4,'2025-07-30 00:00:00','2025-08-03 17:42:46',1,'AUTORIZADO',NULL,'C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000015_30-07-2025_comprobante.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000015_30-07-2025_autorizacion.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000015_30-07-2025_barcode.png','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000015_30-07-2025.pdf',NULL,NULL,'2025-08-03 17:42:45'),(2,1,'01',4,2,'3007202501080461081400110010010000000165850989911','3007202501080461081400110010010000000165850989911','001-001-000000016',1,4,'2025-07-30 00:00:00','2025-08-03 17:47:06',1,'AUTORIZADO',NULL,'C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000016_30-07-2025_comprobante.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000016_30-07-2025_autorizacion.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000016_30-07-2025_barcode.png','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000016_30-07-2025.pdf',NULL,NULL,'2025-08-03 17:47:06'),(3,1,'01',10,1,'3107202501080461081400110010010000000170589533413','3107202501080461081400110010010000000170589533413','001-001-000000017',1,4,'2025-07-31 00:00:00','2025-08-03 18:17:29',1,'AUTORIZADO',NULL,'C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000017_31-07-2025_comprobante.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000017_31-07-2025_autorizacion.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000017_31-07-2025_barcode.png','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000017_31-07-2025.pdf',NULL,NULL,'2025-08-03 18:17:28'),(4,1,'01',11,3,'3107202501080461081400110010010000000188822175618','3107202501080461081400110010010000000188822175618','001-001-000000018',1,4,'2025-07-31 00:00:00','2025-08-03 18:26:15',1,'AUTORIZADO',NULL,'C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000018_31-07-2025_comprobante.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000018_31-07-2025_autorizacion.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000018_31-07-2025_barcode.png','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000018_31-07-2025.pdf',NULL,NULL,'2025-08-03 18:26:15'),(5,1,'01',12,1,'3107202501080461081400110010010000000191276510411','3107202501080461081400110010010000000191276510411','001-001-000000019',1,4,'2025-07-31 00:00:00','2025-08-03 18:33:23',1,'AUTORIZADO',NULL,'C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000019_31-07-2025_comprobante.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000019_31-07-2025_autorizacion.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000019_31-07-2025_barcode.png','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000019_31-07-2025.pdf',NULL,NULL,'2025-08-03 18:33:21'),(6,1,'01',13,3,'3107202501080461081400110010010000000204133979411','3107202501080461081400110010010000000204133979411','001-001-000000020',1,4,'2025-07-31 00:00:00','2025-08-03 19:12:31',1,'AUTORIZADO',NULL,'C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000020_31-07-2025_comprobante.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000020_31-07-2025_autorizacion.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000020_31-07-2025_barcode.png','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000020_31-07-2025.pdf',NULL,NULL,'2025-08-03 19:12:31'),(7,1,'01',14,1,'3107202501080461081400110010010000000219314978716','3107202501080461081400110010010000000219314978716','001-001-000000021',1,4,'2025-07-31 00:00:00','2025-08-03 19:58:39',1,'AUTORIZADO',NULL,'C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000021_31-07-2025_comprobante.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000021_31-07-2025_autorizacion.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000021_31-07-2025_barcode.png','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000021_31-07-2025.pdf',NULL,NULL,'2025-08-03 19:58:37'),(8,1,'01',15,2,NULL,'3107202501080461081400110010010000000228093407513','001-001-000000022',1,1,'2025-07-31 00:00:00',NULL,1,'Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-03 20:08:15'),(9,1,'01',16,3,'3107202501080461081400110010010000000238286177911','3107202501080461081400110010010000000238286177911','001-001-000000023',1,4,'2025-07-31 00:00:00','2025-08-03 20:08:52',1,'AUTORIZADO',NULL,'C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000023_31-07-2025_comprobante.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000023_31-07-2025_autorizacion.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000023_31-07-2025_barcode.png','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000023_31-07-2025.pdf',NULL,NULL,'2025-08-03 20:08:53'),(10,1,'01',17,2,'3107202501080461081400110010010000000241789367318','3107202501080461081400110010010000000241789367318','001-001-000000024',1,4,'2025-07-31 00:00:00','2025-08-03 20:43:23',1,'AUTORIZADO',NULL,'C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000024_31-07-2025_comprobante.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000024_31-07-2025_autorizacion.xml','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000024_31-07-2025_barcode.png','C:\\DocumentosApp\\2025\\08\\FACTURA_001-001-000000024_31-07-2025.pdf',NULL,NULL,'2025-08-03 20:43:22'),(11,1,'01',15,2,NULL,'3107202501080461081400110010010000000256626923113','001-001-000000025',1,6,'2025-07-31 00:00:00',NULL,1,'Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-07 21:30:48'),(12,1,'01',15,2,NULL,'3107202501080461081400110010010000000268845389910','001-001-000000026',1,6,'2025-07-31 00:00:00',NULL,1,'Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-07 21:31:15'),(13,1,'01',15,2,NULL,'3107202501080461081400110010010000000274036146217','001-001-000000027',1,6,'2025-07-31 00:00:00',NULL,1,'Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-07 21:31:22'),(14,1,'01',15,2,NULL,'3107202501080461081400110010010000000288868457213','001-001-000000028',1,2,'2025-07-31 00:00:00',NULL,1,'RECIBIDA: Factura RECIBIDA por el SRI.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-07 21:33:15'),(15,1,'01',15,2,NULL,'3107202501080461081400110010010000000290595254017','001-001-000000029',1,2,'2025-07-31 00:00:00',NULL,1,'RECIBIDA: Factura RECIBIDA por el SRI.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-07 21:33:23'),(16,1,'01',15,2,NULL,'3107202501080461081400110010010000000303661740615','001-001-000000030',1,2,'2025-07-31 00:00:00',NULL,1,'RECIBIDA: Factura RECIBIDA por el SRI.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-07 21:33:50'),(17,1,'01',21,1,NULL,'3107202501080461081400110010010000000317489576817','001-001-000000031',1,2,'2025-07-31 00:00:00',NULL,1,'RECIBIDA: Factura RECIBIDA por el SRI.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-07 21:33:58'),(18,1,'01',20,2,NULL,'3107202501080461081400110010010000000323325434711','001-001-000000032',1,2,'2025-07-31 00:00:00',NULL,1,'RECIBIDA: Factura RECIBIDA por el SRI.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-07 21:34:03'),(19,1,'01',2,3,NULL,'3007202501080461081400110010010000000332768018519','001-001-000000033',1,2,'2025-07-30 00:00:00',NULL,1,'RECIBIDA: Factura RECIBIDA por el SRI.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-07 21:34:09'),(20,1,'01',19,1,NULL,'3107202501080461081400110010010000000345352581817','001-001-000000034',1,2,'2025-07-31 00:00:00',NULL,1,'RECIBIDA: Factura RECIBIDA por el SRI.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-07 21:34:14'),(21,1,'01',18,3,NULL,'3107202501080461081400110010010000000350263764618','001-001-000000035',1,2,'2025-07-31 00:00:00',NULL,1,'RECIBIDA: Factura RECIBIDA por el SRI.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-07 21:34:20'),(22,1,'01',9,2,NULL,'3007202501080461081400110010010000000366939547916','001-001-000000036',1,6,'2025-07-30 00:00:00',NULL,1,'Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-07 21:34:27'),(23,1,'01',25,1,NULL,'1008202501080461081400110010010000000373345289815','001-001-000000037',1,6,'2025-08-10 00:00:00',NULL,1,'Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-10 19:29:54'),(24,1,'01',8,1,NULL,'3007202501080461081400110010010000000383341824011','001-001-000000038',1,6,'2025-07-30 00:00:00',NULL,1,'Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-10 19:35:20'),(25,1,'01',7,2,NULL,'3007202501080461081400110010010000000395996323811','001-001-000000039',1,1,'2025-07-30 00:00:00',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,'2025-08-10 19:50:55'),(26,1,'01',26,1,NULL,'1008202501080461081400110010010000000399019925417','001-001-000000039',1,6,'2025-08-10 00:00:00',NULL,1,'Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-10 19:52:02'),(27,1,'01',26,1,NULL,'1008202501080461081400110010010000000409074576613','001-001-000000040',1,6,'2025-08-10 00:00:00',NULL,1,'Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-08-10 20:02:26');
/*!40000 ALTER TABLE `comprobantes_electronicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credito_estado_historial`
--

DROP TABLE IF EXISTS `credito_estado_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `credito_estado_historial` (
  `id_historial` int NOT NULL AUTO_INCREMENT,
  `id_credito` int NOT NULL,
  `estado_anterior` varchar(20) DEFAULT NULL,
  `estado_nuevo` varchar(20) DEFAULT NULL,
  `fecha_cambio` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_cambio` int DEFAULT NULL,
  PRIMARY KEY (`id_historial`),
  KEY `id_credito` (`id_credito`),
  KEY `usuario_cambio` (`usuario_cambio`),
  CONSTRAINT `credito_estado_historial_ibfk_1` FOREIGN KEY (`id_credito`) REFERENCES `ventas_credito` (`id_venta_credito`),
  CONSTRAINT `credito_estado_historial_ibfk_2` FOREIGN KEY (`usuario_cambio`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credito_estado_historial`
--

LOCK TABLES `credito_estado_historial` WRITE;
/*!40000 ALTER TABLE `credito_estado_historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `credito_estado_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta_contable`
--

DROP TABLE IF EXISTS `cuenta_contable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuenta_contable` (
  `id_cuenta` int NOT NULL AUTO_INCREMENT,
  `codigo_cuenta` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` enum('ACTIVO','PASIVO','PATRIMONIO','INGRESO','GASTO') NOT NULL,
  `nivel` int DEFAULT '1',
  `padre_id` int DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`),
  UNIQUE KEY `codigo_cuenta` (`codigo_cuenta`),
  KEY `padre_id` (`padre_id`),
  CONSTRAINT `cuenta_contable_ibfk_1` FOREIGN KEY (`padre_id`) REFERENCES `cuenta_contable` (`id_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta_contable`
--

LOCK TABLES `cuenta_contable` WRITE;
/*!40000 ALTER TABLE `cuenta_contable` DISABLE KEYS */;
INSERT INTO `cuenta_contable` VALUES (1,'100','ACTIVO','ACTIVO',1,NULL),(2,'200','PASIVO','PASIVO',1,NULL),(3,'300','PATRIMONIO','PATRIMONIO',1,NULL),(4,'400','INGRESO','INGRESO',1,NULL),(5,'500','GASTO','GASTO',1,NULL),(6,'101','Caja','ACTIVO',2,1),(7,'102','Banco','ACTIVO',2,1),(8,'103','Cuentas por cobrar','ACTIVO',2,1),(9,'104','Inventario','ACTIVO',2,1),(10,'201','Cuentas por pagar','PASIVO',2,2),(11,'401','Ventas','INGRESO',2,4),(12,'402','Ingresos varios','INGRESO',2,4),(13,'403','Ingresos por ajustes de inventario','INGRESO',2,4),(14,'501','Gasto de servicios (ej. luz, agua)','GASTO',2,5),(15,'502','Pérdida por inventario','GASTO',2,5),(16,'600','Productos Bonificados','GASTO',2,5);
/*!40000 ALTER TABLE `cuenta_contable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuotas_compra_credito`
--

DROP TABLE IF EXISTS `cuotas_compra_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuotas_compra_credito` (
  `id_cuota` int NOT NULL AUTO_INCREMENT,
  `id_compra_credito` int DEFAULT NULL,
  `monto_cuota` decimal(10,2) DEFAULT NULL,
  `fecha_vencimiento` datetime DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'Pendiente',
  PRIMARY KEY (`id_cuota`),
  KEY `id_compra_credito` (`id_compra_credito`),
  CONSTRAINT `cuotas_compra_credito_ibfk_1` FOREIGN KEY (`id_compra_credito`) REFERENCES `compras_credito` (`id_compra_credito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuotas_compra_credito`
--

LOCK TABLES `cuotas_compra_credito` WRITE;
/*!40000 ALTER TABLE `cuotas_compra_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuotas_compra_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuotas_credito`
--

DROP TABLE IF EXISTS `cuotas_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuotas_credito` (
  `id_cuota` int NOT NULL AUTO_INCREMENT,
  `id_venta_credito` int DEFAULT NULL,
  `monto_cuota` decimal(10,2) DEFAULT NULL,
  `fecha_vencimiento` datetime DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'Pendiente',
  PRIMARY KEY (`id_cuota`),
  KEY `id_venta_credito` (`id_venta_credito`),
  CONSTRAINT `cuotas_credito_ibfk_1` FOREIGN KEY (`id_venta_credito`) REFERENCES `ventas_credito` (`id_venta_credito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuotas_credito`
--

LOCK TABLES `cuotas_credito` WRITE;
/*!40000 ALTER TABLE `cuotas_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuotas_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `det_compra`
--

DROP TABLE IF EXISTS `det_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_compra` (
  `IdDetCompra` int NOT NULL AUTO_INCREMENT,
  `nro_boleta` varchar(20) DEFAULT NULL,
  `IdCompra` int DEFAULT NULL,
  `IdProducto` int DEFAULT NULL,
  `codigo_barra` varchar(20) DEFAULT NULL,
  `Cantidad` float NOT NULL,
  `PrecioUnitarioCompra` decimal(10,2) DEFAULT NULL,
  `PrecioUnitarioVenta` decimal(10,2) DEFAULT NULL,
  `subtotalcosto` decimal(10,2) NOT NULL,
  `iva` decimal(10,2) NOT NULL,
  `TotalCosto` decimal(10,2) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`IdDetCompra`),
  KEY `fk_det_compra_IdCompra` (`IdCompra`),
  KEY `fk_det_compra_IdProducto` (`IdProducto`),
  CONSTRAINT `fk_det_compra_IdCompra` FOREIGN KEY (`IdCompra`) REFERENCES `compras` (`IdCompra`),
  CONSTRAINT `fk_det_compra_IdProducto` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_compra`
--

LOCK TABLES `det_compra` WRITE;
/*!40000 ALTER TABLE `det_compra` DISABLE KEYS */;
INSERT INTO `det_compra` VALUES (1,'00000045',1,8,'6197173662117',26,4.43,NULL,100.16,15.02,115.18,'2025-07-29 22:21:03',NULL,NULL,'1'),(2,'00000046',2,6,'2926458086231',50,1.39,NULL,60.43,9.07,69.50,'2025-07-30 12:22:41',NULL,NULL,'1'),(3,'00000046',2,25,'6308856421409',33,1.10,NULL,31.57,4.73,36.30,'2025-07-30 12:22:41',NULL,NULL,'1'),(4,'00000046',2,10,'5266353701024',16,1.11,NULL,15.44,2.32,17.76,'2025-07-30 12:22:41',NULL,NULL,'1'),(5,'00000047',3,2,'8132609575384',10,3.15,NULL,27.39,4.11,31.50,'2025-07-30 12:24:22',NULL,NULL,'1'),(6,'00000048',4,29,'8449598633935',10,0.81,NULL,7.04,1.06,8.10,'2025-07-30 12:25:23',NULL,NULL,'1'),(7,'00000049',5,20,'1217317286143',9,4.93,NULL,38.58,5.79,44.37,'2025-07-30 12:29:06',NULL,NULL,'1'),(8,'00000050',6,13,'6054983401054',27,2.48,NULL,58.23,8.73,66.96,'2025-07-30 12:37:10',NULL,NULL,'1'),(9,'00000051',7,24,'2925873873758',42,1.00,NULL,36.52,5.48,42.00,'2025-07-30 12:39:46',NULL,NULL,'1'),(10,'00000052',8,26,'6118736826055',5,1.18,NULL,5.13,0.77,5.90,'2025-07-30 12:40:59',NULL,NULL,'1'),(11,'00000053',9,27,'1308706855412',13,2.38,NULL,26.90,4.04,30.94,'2025-07-30 12:42:57',NULL,NULL,'1'),(12,'00000053',9,14,'7537128809938',13,2.23,NULL,25.21,3.78,28.99,'2025-07-30 12:42:57',NULL,NULL,'1'),(14,'00000054',10,23,'1689126384227',32,1.74,NULL,48.42,7.26,55.68,'2025-07-30 13:16:41',NULL,NULL,'1'),(15,'00000054',10,11,'9548887638468',29,4.47,NULL,112.72,16.91,129.63,'2025-07-30 13:16:41',NULL,NULL,'1'),(17,'00000055',11,11,'9548887638468',23,4.47,NULL,89.40,13.41,102.81,'2025-07-30 13:18:22',NULL,NULL,'1'),(18,'00000056',12,25,'6308856421409',33,1.10,NULL,31.57,4.73,36.30,'2025-07-30 13:21:09',NULL,NULL,'1'),(19,'00000056',12,1,'4278050957808',50,0.95,NULL,41.30,6.20,47.50,'2025-07-30 13:21:09',NULL,NULL,'1'),(21,'00000057',13,10,'5266353701024',39,1.11,NULL,37.64,5.65,43.29,'2025-07-30 13:23:20',NULL,NULL,'1'),(22,'00000058',14,20,'1217317286143',49,4.93,NULL,210.06,31.51,241.57,'2025-07-30 13:26:32',NULL,NULL,'1'),(23,'00000059',15,7,'3692938128315',19,1.81,NULL,29.90,4.49,34.39,'2025-07-30 13:28:45',NULL,NULL,'1'),(24,'00000060',16,2,'8132609575384',23,3.15,NULL,63.00,9.45,72.45,'2025-07-30 13:30:19',NULL,NULL,'1'),(25,'00000061',17,21,'8795369589559',48,1.87,NULL,78.05,11.71,89.76,'2025-07-30 13:33:14',NULL,NULL,'1'),(26,'00000062',18,7,'3692938128315',20,1.81,NULL,31.48,4.72,36.20,'2025-07-30 13:35:01',NULL,NULL,'1'),(27,'00000063',19,24,'2925873873758',12,1.00,NULL,10.43,1.57,12.00,'2025-07-30 13:37:47',NULL,NULL,'1'),(28,'00000063',19,10,'5266353701024',13,1.11,NULL,12.55,1.88,14.43,'2025-07-30 13:37:47',NULL,NULL,'1'),(30,'00000064',20,12,'2837419397712',5,2.50,NULL,10.87,1.63,12.50,'2025-07-30 13:39:16',NULL,NULL,'1'),(31,'00000065',21,29,'8449598633935',10,0.90,NULL,7.83,1.17,9.00,'2025-08-10 13:51:49',NULL,NULL,'1'),(32,'00000066',22,29,'8449598633935',10,0.98,NULL,8.52,1.28,9.80,'2025-08-10 13:56:25',NULL,NULL,'1'),(33,'00000067',23,29,'8449598633935',1,0.98,NULL,0.85,0.13,0.98,'2025-08-10 14:07:17',NULL,NULL,'1'),(34,'00000068',24,29,'8449598633935',1,0.98,NULL,0.85,0.13,0.98,'2025-08-10 14:17:42',NULL,NULL,'1'),(35,'00000069',25,29,'8449598633935',3,0.98,NULL,2.56,0.38,2.94,'2025-08-10 14:18:53','2025-08-10 15:20:58',NULL,'0'),(36,'00000070',26,29,'8449598633935',3,0.98,NULL,2.56,0.38,2.94,'2025-08-10 14:24:29',NULL,NULL,'1');
/*!40000 ALTER TABLE `det_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `det_venta`
--

DROP TABLE IF EXISTS `det_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_venta` (
  `IdDetalleVenta` int NOT NULL AUTO_INCREMENT,
  `nro_boleta` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `IdVenta` int DEFAULT NULL,
  `IdProducto` int DEFAULT NULL,
  `codigo_barra` varchar(25) DEFAULT NULL,
  `descripcion_producto` varchar(55) DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `cantidad_fracion` decimal(10,2) DEFAULT NULL,
  `PrecioUnidad` decimal(10,2) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `Sub_total` decimal(10,2) DEFAULT NULL,
  `total_venta` decimal(10,2) DEFAULT NULL,
  `estado_fracion_producto` char(1) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  `codigo_iva` int DEFAULT '0',
  PRIMARY KEY (`IdDetalleVenta`),
  KEY `fk_det_venta_id_venta` (`IdVenta`),
  KEY `fk_det_venta_id_producto` (`IdProducto`),
  CONSTRAINT `fk_det_venta_id_venta` FOREIGN KEY (`IdVenta`) REFERENCES `ventas` (`IdVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_venta`
--

LOCK TABLES `det_venta` WRITE;
/*!40000 ALTER TABLE `det_venta` DISABLE KEYS */;
INSERT INTO `det_venta` VALUES (1,'00000055',1,15,'8955199210909','Producto 15',3,NULL,5.47,0.00,16.41,16.41,NULL,'2025-07-30 22:23:38',NULL,NULL,'1',0),(2,'00000056',2,7,'3692938128315','Producto 7',4,NULL,6.48,3.38,22.54,25.92,NULL,'2025-07-30 22:25:02','2025-08-23 17:09:34',NULL,'1',4),(3,'00000057',3,17,'5259543058627','Producto 17',20,NULL,7.51,19.59,130.61,150.20,NULL,'2025-07-30 22:27:35','2025-08-23 17:09:34',NULL,'1',4),(4,'00000058',4,7,'3692938128315','Producto 7',15,NULL,6.48,12.68,84.52,97.20,NULL,'2025-07-30 22:30:05','2025-08-23 17:09:34',NULL,'1',4),(5,'00000059',5,23,'1689126384227','Producto 23',12,NULL,8.49,13.29,88.59,101.88,NULL,'2025-07-30 22:33:35','2025-08-23 17:09:34',NULL,'1',4),(6,'00000060',6,4,'5403521749369','Producto 4',16,NULL,9.71,0.00,155.36,155.36,NULL,'2025-07-30 22:36:58',NULL,NULL,'1',0),(7,'00000060',6,25,'6308856421409','Producto 25',15,NULL,8.32,16.28,108.52,124.80,NULL,'2025-07-30 22:36:58','2025-08-23 17:09:34',NULL,'1',4),(8,'00000060',6,16,'1818084761325','Producto 16',9,NULL,9.73,11.42,76.15,87.57,NULL,'2025-07-30 22:36:58','2025-08-23 17:09:34',NULL,'1',4),(9,'00000061',7,3,'4495711283430','Producto 3',10,NULL,6.86,0.00,68.60,68.60,NULL,'2025-07-30 22:38:30',NULL,NULL,'1',0),(10,'00000062',8,29,'8449598633935','Producto 29',17,NULL,9.20,20.40,136.00,156.40,NULL,'2025-07-30 22:40:07','2025-08-23 17:09:34',NULL,'1',4),(11,'00000063',9,13,'6054983401054','Producto 13',9,NULL,7.60,8.92,59.48,68.40,NULL,'2025-07-30 22:48:48','2025-08-23 17:09:34',NULL,'1',4),(12,'00000064',10,8,'6197173662117','Producto 8',1,NULL,5.43,0.71,4.72,5.43,NULL,'2025-07-31 20:50:05','2025-08-23 17:09:34',NULL,'1',4),(13,'00000065',11,29,'8449598633935','Producto 29',14,NULL,9.20,16.80,112.00,128.80,NULL,'2025-07-31 20:51:33','2025-08-23 17:09:34',NULL,'1',4),(14,'00000066',12,14,'7537128809938','Producto 14',2,NULL,6.72,1.75,11.69,13.44,NULL,'2025-07-31 20:52:39','2025-08-23 17:09:34',NULL,'1',4),(15,'00000067',13,23,'1689126384227','Producto 23',13,NULL,8.49,14.40,95.97,110.37,NULL,'2025-07-31 20:53:54','2025-08-23 17:09:34',NULL,'1',4),(16,'00000068',14,7,'3692938128315','Producto 7',15,NULL,6.48,12.68,84.52,97.20,NULL,'2025-07-31 20:54:39','2025-08-23 17:09:34',NULL,'1',4),(17,'00000069',15,4,'5403521749369','Producto 4',9,NULL,9.71,0.00,87.39,87.39,NULL,'2025-07-31 20:56:19',NULL,NULL,'1',0),(18,'00000070',16,28,'6068526185068','Producto 28',16,NULL,5.86,12.23,81.53,93.76,NULL,'2025-07-31 20:57:12','2025-08-23 17:09:34',NULL,'1',4),(19,'00000071',17,6,'2926458086231','Producto 6',14,NULL,7.81,14.26,95.08,109.34,NULL,'2025-07-31 20:58:08','2025-08-23 17:09:34',NULL,'1',4),(20,'00000072',18,17,'5259543058627','Producto 17',6,NULL,7.51,5.88,39.18,45.06,NULL,'2025-07-31 20:59:06','2025-08-23 17:09:34',NULL,'1',4),(21,'00000073',19,11,'9548887638468','Producto 11',8,NULL,9.76,10.18,67.90,78.08,NULL,'2025-07-31 21:02:15','2025-08-23 17:09:34',NULL,'1',4),(22,'00000073',19,15,'8955199210909','Producto 15',6,NULL,5.47,0.00,32.82,32.82,NULL,'2025-07-31 21:02:15',NULL,NULL,'1',0),(23,'00000074',20,12,'2837419397712','Producto 12',5,NULL,5.36,3.50,23.30,26.80,NULL,'2025-07-31 21:09:38','2025-08-23 17:09:34',NULL,'1',4),(24,'00000075',21,11,'9548887638468','Producto 11',4,NULL,9.76,5.09,33.95,39.04,NULL,'2025-07-31 21:10:44','2025-08-23 17:09:34',NULL,'1',4),(25,'00000076',22,12,'2837419397712','Producto 12',14,NULL,5.36,9.79,65.25,75.04,NULL,'2025-07-31 21:11:55','2025-08-23 17:09:34',NULL,'1',4),(26,'00000077',23,7,'3692938128315','Producto 7',26,NULL,6.48,21.98,146.50,168.48,NULL,'2025-08-10 17:19:40','2025-08-23 17:09:34',NULL,'0',4),(27,'00000077',23,20,'1217317286143','Producto 20',23,NULL,9.78,29.34,195.60,224.94,NULL,'2025-08-10 17:19:40','2025-08-23 17:09:34',NULL,'0',4),(28,'00000078',24,20,'1217317286143','Producto 20',23,NULL,9.78,29.34,195.60,224.94,NULL,'2025-08-10 17:59:01','2025-08-23 17:09:34',NULL,'0',4),(29,'00000078',24,7,'3692938128315','Producto 7',26,NULL,6.48,21.98,146.50,168.48,NULL,'2025-08-10 17:59:01','2025-08-23 17:09:34',NULL,'0',4),(30,'00000079',25,22,'2417534007719','Producto 22',1,NULL,8.38,1.09,7.29,8.38,NULL,'2025-08-10 19:28:38','2025-08-23 17:09:34',NULL,'1',4),(31,'00000079',25,5,'1107061968005','Producto 5',1,NULL,7.75,1.01,6.74,7.75,NULL,'2025-08-10 19:28:38','2025-08-23 17:09:34',NULL,'1',4),(32,'00000080',26,22,'2417534007719','Producto 22',1,NULL,8.38,1.09,7.29,8.38,NULL,'2025-08-10 19:51:49','2025-08-23 17:09:34',NULL,'1',4),(33,'00000080',26,1,'4278050957808','Producto 1',1,NULL,8.18,1.07,7.11,8.18,NULL,'2025-08-10 19:51:49','2025-08-23 17:09:34',NULL,'1',4),(34,'00000081',27,22,'2417534007719','Producto 22',2,NULL,8.38,2.19,14.57,16.76,NULL,'2025-08-23 12:08:22',NULL,NULL,'1',4),(35,'00000081',27,5,'1107061968005','Producto 5',2,NULL,7.75,2.02,13.48,15.50,NULL,'2025-08-23 12:08:22',NULL,NULL,'1',4);
/*!40000 ALTER TABLE `det_venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trg_det_venta_before_insert` BEFORE INSERT ON `det_venta` FOR EACH ROW BEGIN
    DECLARE v_codigo_iva INT DEFAULT 0;

    -- Solo buscamos el codigo_iva si el iva > 0
    IF NEW.iva > 0 THEN
        SELECT e.codigo_iva 
        INTO v_codigo_iva
        FROM empresa e
        WHERE e.id_empresa = 1
          AND e.estado = '1'
        LIMIT 1;  -- en caso de que haya más de una fila
    END IF;

    -- Asignamos el valor al campo de la nueva fila
    SET NEW.codigo_iva = IFNULL(v_codigo_iva, 0);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `det_venta_lote`
--

DROP TABLE IF EXISTS `det_venta_lote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_venta_lote` (
  `id_detalle_venta_stock` int NOT NULL AUTO_INCREMENT,
  `id_det_venta` int NOT NULL,
  `id_lote` int NOT NULL,
  `cantidad_vendida` int NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `ganancia_unitaria` decimal(10,2) GENERATED ALWAYS AS ((`precio_venta` - `costo_unitario`)) STORED,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_detalle_venta_stock`),
  KEY `id_det_venta` (`id_det_venta`),
  KEY `id_lote` (`id_lote`),
  CONSTRAINT `det_venta_lote_ibfk_1` FOREIGN KEY (`id_det_venta`) REFERENCES `det_venta` (`IdDetalleVenta`),
  CONSTRAINT `det_venta_lote_ibfk_2` FOREIGN KEY (`id_lote`) REFERENCES `lote_producto` (`id_lote`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_venta_lote`
--

LOCK TABLES `det_venta_lote` WRITE;
/*!40000 ALTER TABLE `det_venta_lote` DISABLE KEYS */;
INSERT INTO `det_venta_lote` (`id_detalle_venta_stock`, `id_det_venta`, `id_lote`, `cantidad_vendida`, `precio_venta`, `costo_unitario`, `estado`) VALUES (1,1,15,3,5.47,4.85,'1'),(2,2,7,4,6.48,1.81,'1'),(3,3,17,20,7.51,1.50,'1'),(4,4,7,15,6.48,1.81,'1'),(5,5,23,12,8.49,1.74,'1'),(6,6,4,16,9.71,0.92,'1'),(7,7,25,15,8.32,1.10,'1'),(8,8,16,9,9.73,0.53,'1'),(9,9,3,10,6.86,2.45,'1'),(10,10,29,17,9.20,0.81,'1'),(11,11,13,9,7.60,2.48,'1'),(12,12,8,1,5.43,4.43,'1'),(13,13,29,14,9.20,0.81,'1'),(14,14,42,2,6.72,2.23,'1'),(15,15,23,13,8.49,1.74,'1'),(16,16,7,15,6.48,1.81,'1'),(17,17,4,9,9.71,0.92,'1'),(18,18,28,16,5.86,4.91,'1'),(19,19,6,14,7.81,1.39,'1'),(20,20,17,6,7.51,1.50,'1'),(21,21,11,8,9.76,4.47,'1'),(22,22,15,6,5.47,4.85,'1'),(23,23,12,5,5.36,2.50,'1'),(24,24,11,4,9.76,4.47,'1'),(25,25,12,9,5.36,2.50,'1'),(26,25,60,5,5.36,2.50,'1'),(27,26,7,5,6.48,1.81,'0'),(28,26,53,19,6.48,1.81,'0'),(29,26,56,2,6.48,1.81,'0'),(30,27,20,13,9.78,4.93,'0'),(31,27,37,9,9.78,4.93,'0'),(32,27,52,1,9.78,4.93,'0'),(33,28,20,13,9.78,4.93,'0'),(34,28,37,9,9.78,4.93,'0'),(35,28,52,1,9.78,4.93,'0'),(36,29,7,5,6.48,1.81,'0'),(37,29,53,19,6.48,1.81,'0'),(38,29,56,2,6.48,1.81,'0'),(39,30,22,1,8.38,1.29,'1'),(40,31,5,1,7.75,0.65,'1'),(41,32,22,1,8.38,1.29,'1'),(42,33,49,1,8.18,0.95,'1'),(43,34,22,2,8.38,1.29,'1'),(44,35,5,2,7.75,0.65,'1');
/*!40000 ALTER TABLE `det_venta_lote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_asiento`
--

DROP TABLE IF EXISTS `detalle_asiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_asiento` (
  `id_detalle_asiento` int NOT NULL AUTO_INCREMENT,
  `id_asiento` int NOT NULL,
  `id_cuenta` int NOT NULL,
  `debe` decimal(10,2) DEFAULT '0.00',
  `haber` decimal(10,2) DEFAULT '0.00',
  `descripcion` text,
  `orden` int DEFAULT '0',
  PRIMARY KEY (`id_detalle_asiento`),
  KEY `id_asiento` (`id_asiento`),
  KEY `id_cuenta` (`id_cuenta`),
  CONSTRAINT `detalle_asiento_ibfk_1` FOREIGN KEY (`id_asiento`) REFERENCES `asiento_contable` (`id_asiento`),
  CONSTRAINT `detalle_asiento_ibfk_2` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta_contable` (`id_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_asiento`
--

LOCK TABLES `detalle_asiento` WRITE;
/*!40000 ALTER TABLE `detalle_asiento` DISABLE KEYS */;
INSERT INTO `detalle_asiento` VALUES (1,1,9,30.00,0.00,'Registro de inventario inicialProducto 1',1),(2,1,13,0.00,30.00,'Contrapartida por ajuste de producto Producto 1',2),(3,2,9,164.00,0.00,'Registro de inventario inicialProducto 2',1),(4,2,13,0.00,164.00,'Contrapartida por ajuste de producto Producto 2',2),(5,3,9,100.00,0.00,'Registro de inventario inicialProducto 3',1),(6,3,13,0.00,100.00,'Contrapartida por ajuste de producto Producto 3',2),(7,4,9,54.00,0.00,'Registro de inventario inicialProducto 4',1),(8,4,13,0.00,54.00,'Contrapartida por ajuste de producto Producto 4',2),(9,5,9,18.00,0.00,'Registro de inventario inicialProducto 5',1),(10,5,13,0.00,18.00,'Contrapartida por ajuste de producto Producto 5',2),(11,6,9,22.00,0.00,'Registro de inventario inicialProducto 6',1),(12,6,13,0.00,22.00,'Contrapartida por ajuste de producto Producto 6',2),(13,7,9,71.00,0.00,'Registro de inventario inicialProducto 7',1),(14,7,13,0.00,71.00,'Contrapartida por ajuste de producto Producto 7',2),(15,8,9,394.00,0.00,'Registro de inventario inicialProducto 8',1),(16,8,13,0.00,394.00,'Contrapartida por ajuste de producto Producto 8',2),(17,9,9,288.00,0.00,'Registro de inventario inicialProducto 9',1),(18,9,13,0.00,288.00,'Contrapartida por ajuste de producto Producto 9',2),(19,10,9,61.00,0.00,'Registro de inventario inicialProducto 10',1),(20,10,13,0.00,61.00,'Contrapartida por ajuste de producto Producto 10',2),(21,11,9,174.00,0.00,'Registro de inventario inicialProducto 11',1),(22,11,13,0.00,174.00,'Contrapartida por ajuste de producto Producto 11',2),(23,12,9,35.00,0.00,'Registro de inventario inicialProducto 12',1),(24,12,13,0.00,35.00,'Contrapartida por ajuste de producto Producto 12',2),(25,13,9,94.00,0.00,'Registro de inventario inicialProducto 13',1),(26,13,13,0.00,94.00,'Contrapartida por ajuste de producto Producto 13',2),(27,14,9,116.00,0.00,'Registro de inventario inicialProducto 14',1),(28,14,13,0.00,116.00,'Contrapartida por ajuste de producto Producto 14',2),(29,15,9,170.00,0.00,'Registro de inventario inicialProducto 15',1),(30,15,13,0.00,170.00,'Contrapartida por ajuste de producto Producto 15',2),(31,16,9,46.00,0.00,'Registro de inventario inicialProducto 16',1),(32,16,13,0.00,46.00,'Contrapartida por ajuste de producto Producto 16',2),(33,17,9,146.00,0.00,'Registro de inventario inicialProducto 17',1),(34,17,13,0.00,146.00,'Contrapartida por ajuste de producto Producto 17',2),(35,18,9,368.00,0.00,'Registro de inventario inicialProducto 18',1),(36,18,13,0.00,368.00,'Contrapartida por ajuste de producto Producto 18',2),(37,19,9,345.00,0.00,'Registro de inventario inicialProducto 19',1),(38,19,13,0.00,345.00,'Contrapartida por ajuste de producto Producto 19',2),(39,20,9,64.00,0.00,'Registro de inventario inicialProducto 20',1),(40,20,13,0.00,64.00,'Contrapartida por ajuste de producto Producto 20',2),(41,21,9,75.00,0.00,'Registro de inventario inicialProducto 21',1),(42,21,13,0.00,75.00,'Contrapartida por ajuste de producto Producto 21',2),(43,22,9,43.00,0.00,'Registro de inventario inicialProducto 22',1),(44,22,13,0.00,43.00,'Contrapartida por ajuste de producto Producto 22',2),(45,23,9,103.00,0.00,'Registro de inventario inicialProducto 23',1),(46,23,13,0.00,103.00,'Contrapartida por ajuste de producto Producto 23',2),(47,24,9,66.00,0.00,'Registro de inventario inicialProducto 24',1),(48,24,13,0.00,66.00,'Contrapartida por ajuste de producto Producto 24',2),(49,25,9,50.00,0.00,'Registro de inventario inicialProducto 25',1),(50,25,13,0.00,50.00,'Contrapartida por ajuste de producto Producto 25',2),(51,26,9,21.00,0.00,'Registro de inventario inicialProducto 26',1),(52,26,13,0.00,21.00,'Contrapartida por ajuste de producto Producto 26',2),(53,27,9,55.00,0.00,'Registro de inventario inicialProducto 27',1),(54,27,13,0.00,55.00,'Contrapartida por ajuste de producto Producto 27',2),(55,28,9,103.00,0.00,'Registro de inventario inicialProducto 28',1),(56,28,13,0.00,103.00,'Contrapartida por ajuste de producto Producto 28',2),(57,29,9,66.00,0.00,'Registro de inventario inicialProducto 29',1),(58,29,13,0.00,66.00,'Contrapartida por ajuste de producto Producto 29',2),(59,30,9,266.00,0.00,'Registro de inventario inicialProducto 30',1),(60,30,13,0.00,266.00,'Contrapartida por ajuste de producto Producto 30',2),(61,31,16,16.98,0.00,'Bonificación proveedor',1),(62,31,9,0.00,16.98,'Ingreso producto bonificado',2),(63,32,9,28.80,0.00,'Ingreso inventario por compra',1),(64,32,6,0.00,28.80,'Caja efectivo  por compra',2),(65,33,16,17.28,0.00,'Bonificación proveedor',1),(66,33,9,0.00,17.28,'Ingreso producto bonificado',2),(67,34,9,6.30,0.00,'Ingreso inventario por compra',1),(68,34,6,0.00,6.30,'Caja efectivo  por compra',2),(69,35,16,3.60,0.00,'Bonificación proveedor',1),(70,35,9,0.00,3.60,'Ingreso producto bonificado',2),(71,36,9,28.80,0.00,'Reposición por devolución',1),(72,36,11,0.00,28.80,'Reversión de ingreso por devolución',2),(73,37,15,14.40,0.00,'Pérdida por ajuste de inventario',1),(74,37,9,0.00,14.40,'Disminución de inventario',2),(75,38,9,0.90,0.00,'Reposición por devolución',1),(76,38,11,0.00,0.90,'Reversión de ingreso por devolución',2),(77,39,15,0.90,0.00,'Pérdida por ajuste de inventario',1),(78,39,9,0.00,0.90,'Disminución de inventario',2),(79,40,9,150.00,0.00,'Registro de inventario inicialLeche Entera',1),(80,40,13,0.00,150.00,'Contrapartida por ajuste de producto Leche Entera',2),(81,41,9,40.40,0.00,'Registro de inventario inicialManzanas',1),(82,41,13,0.00,40.40,'Contrapartida por ajuste de producto Manzanas',2),(83,42,9,100.00,0.00,'Registro de inventario inicialPan Integral',1),(84,42,13,0.00,100.00,'Contrapartida por ajuste de producto Pan Integral',2),(85,43,9,150.00,0.00,'Registro de inventario inicialLeche Entera',1),(86,43,13,0.00,150.00,'Contrapartida por ajuste de producto Leche Entera',2),(87,44,9,40.40,0.00,'Registro de inventario inicialManzanas',1),(88,44,13,0.00,40.40,'Contrapartida por ajuste de producto Manzanas',2),(89,45,9,100.00,0.00,'Registro de inventario inicialPan Integral',1),(90,45,13,0.00,100.00,'Contrapartida por ajuste de producto Pan Integral',2);
/*!40000 ALTER TABLE `detalle_asiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_devoluciones`
--

DROP TABLE IF EXISTS `detalle_devoluciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_devoluciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_movimiento_caja` int NOT NULL,
  `afectarCaja` int DEFAULT '0',
  `id_ventas` int DEFAULT NULL,
  `tipo_devolucion` enum('Venta','Compra') NOT NULL,
  `nro_ventas` varchar(20) DEFAULT NULL,
  `id_compras` int DEFAULT NULL,
  `nro_compras` varchar(20) DEFAULT NULL,
  `monto` decimal(10,2) NOT NULL,
  `descripcion` text,
  `estado` char(1) DEFAULT '1',
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_movimiento_caja` (`id_movimiento_caja`),
  CONSTRAINT `detalle_devoluciones_ibfk_1` FOREIGN KEY (`id_movimiento_caja`) REFERENCES `movimiento_caja` (`id_movimiento_caja`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_devoluciones`
--

LOCK TABLES `detalle_devoluciones` WRITE;
/*!40000 ALTER TABLE `detalle_devoluciones` DISABLE KEYS */;
INSERT INTO `detalle_devoluciones` VALUES (1,3,1,NULL,'Compra',NULL,25,'00000069',2.94,'Eliminación de compra Id: 25','1','2025-08-10 15:20:58','2025-08-20 21:15:24',NULL),(2,3,0,23,'Venta','00000077',NULL,NULL,393.42,'Devolucion de Venta Id: 23','1','2025-08-10 17:36:06',NULL,NULL),(3,3,0,24,'Venta','00000078',NULL,NULL,393.42,'Devolucion de Venta Id: 24','1','2025-08-10 18:01:54',NULL,NULL);
/*!40000 ALTER TABLE `detalle_devoluciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_gastos`
--

DROP TABLE IF EXISTS `detalle_gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_gastos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_movimiento_caja` int NOT NULL,
  `afectarCaja` int DEFAULT '0',
  `tipo_gastos` enum('Compras','Creditos','Otros') NOT NULL,
  `tipo_pago` int DEFAULT NULL,
  `id_compras` int DEFAULT NULL,
  `id_abono` int DEFAULT NULL,
  `nro_factura` varchar(25) DEFAULT NULL,
  `nro_compras` varchar(20) DEFAULT NULL,
  `nro_credito_compras` varchar(20) DEFAULT NULL,
  `monto` decimal(10,2) NOT NULL,
  `descripcion` text,
  `estado` char(1) DEFAULT '1',
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_movimiento_caja` (`id_movimiento_caja`),
  CONSTRAINT `detalle_gastos_ibfk_1` FOREIGN KEY (`id_movimiento_caja`) REFERENCES `movimiento_caja` (`id_movimiento_caja`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_gastos`
--

LOCK TABLES `detalle_gastos` WRITE;
/*!40000 ALTER TABLE `detalle_gastos` DISABLE KEYS */;
INSERT INTO `detalle_gastos` VALUES (1,2,1,'Compras',2,1,NULL,'00009','00000045','00000001',0.00,'Compra de mercaderia','1','2025-07-29 22:21:03','2025-07-30 12:31:27',NULL),(2,2,1,'Compras',1,2,NULL,'0009','00000046','00000001',123.56,'Compra de mercaderia','1','2025-07-30 12:22:41',NULL,NULL),(3,2,1,'Compras',1,3,NULL,'0009','00000047','00000001',31.50,'Compra de mercaderia','1','2025-07-30 12:24:22',NULL,NULL),(4,2,1,'Compras',1,4,NULL,'00009','00000048','00000001',8.10,'Compra de mercaderia','1','2025-07-30 12:25:23',NULL,NULL),(5,2,1,'Compras',2,5,NULL,'0002','00000049','00000001',0.00,'Compra de mercaderia','1','2025-07-30 12:29:06','2025-07-30 12:31:27',NULL),(6,2,1,'Compras',1,6,NULL,'000909','00000050','00000001',66.96,'Compra de mercaderia','1','2025-07-30 12:37:10',NULL,NULL),(7,2,1,'Compras',2,7,NULL,'00009','00000051','00000001',1.00,'Compra de mercaderia','1','2025-07-30 12:39:46',NULL,NULL),(8,2,1,'Compras',1,8,NULL,'000099','00000052','00000001',5.90,'Compra de mercaderia','1','2025-07-30 12:40:59',NULL,NULL),(9,2,1,'Compras',2,9,NULL,'0009','00000053','00000001',0.00,'Compra de mercaderia','1','2025-07-30 12:42:57','2025-07-30 15:46:30',NULL),(10,2,1,'Compras',2,10,NULL,'00099','00000054','00000001',2.00,'Compra de mercaderia','1','2025-07-30 13:16:41',NULL,NULL),(11,2,1,'Compras',2,11,NULL,'00077','00000055','00000001',0.00,'Compra de mercaderia','1','2025-07-30 13:18:22','2025-07-30 15:46:30',NULL),(12,2,1,'Compras',2,12,NULL,'00098','00000056','00000001',0.00,'Compra de mercaderia','1','2025-07-30 13:21:09','2025-07-30 15:46:30',NULL),(13,2,1,'Compras',1,13,NULL,'0000098','00000057','00000001',43.29,'Compra de mercaderia','1','2025-07-30 13:23:20',NULL,NULL),(14,2,1,'Compras',1,14,NULL,'000009','00000058','00000001',241.57,'Compra de mercaderia','1','2025-07-30 13:26:32',NULL,NULL),(15,2,1,'Compras',2,15,NULL,'000877','00000059','00000001',0.00,'Compra de mercaderia','1','2025-07-30 13:28:45','2025-07-30 15:46:31',NULL),(16,2,1,'Compras',1,16,NULL,'000998','00000060','00000001',72.45,'Compra de mercaderia','1','2025-07-30 13:30:19',NULL,NULL),(17,2,1,'Compras',2,17,NULL,'0000887','00000061','00000001',0.00,'Compra de mercaderia','1','2025-07-30 13:33:14','2025-07-30 15:46:31',NULL),(18,2,1,'Compras',2,18,NULL,'0000997','00000062','00000001',0.00,'Compra de mercaderia','1','2025-07-30 13:35:01','2025-07-30 15:46:31',NULL),(19,2,1,'Compras',2,19,NULL,'0000983','00000063','00000001',0.00,'Compra de mercaderia','1','2025-07-30 13:37:47','2025-07-30 15:46:31',NULL),(20,2,1,'Compras',1,20,NULL,'000000998','00000064','00000001',12.50,'Compra de mercaderia','1','2025-07-30 13:39:16',NULL,NULL),(21,2,1,'Creditos',1,10,1,NULL,NULL,NULL,1.00,'duno un dolar','0','2025-08-07 22:02:44','2025-08-16 19:00:21',NULL),(22,2,1,'Creditos',1,11,2,NULL,NULL,NULL,1.00,'dono un dolar','1','2025-08-07 22:03:25','2025-08-16 16:39:24',NULL),(23,2,1,'Compras',1,21,NULL,'0009','00000065','00000001',9.00,'Compra de mercaderia','1','2025-08-10 13:51:49',NULL,NULL),(24,2,0,'Compras',2,22,NULL,'0988','00000066','00000001',0.00,'Compra de mercaderia','1','2025-08-10 13:56:25',NULL,NULL),(25,2,0,'Compras',2,23,NULL,'55','00000067','00000001',0.00,'Compra de mercaderia','1','2025-08-10 14:07:17',NULL,NULL),(26,2,1,'Compras',1,24,NULL,'0909','00000068','00000001',0.98,'Compra de mercaderia','1','2025-08-10 14:17:42',NULL,NULL),(27,2,0,'Compras',1,25,NULL,'323','00000069','00000001',2.94,'Compra de mercaderia','0','2025-08-10 14:18:53','2025-08-10 15:20:58',NULL),(28,2,1,'Compras',2,26,NULL,'322','00000070','00000001',1.00,'Compra de mercaderia','1','2025-08-10 14:24:29',NULL,NULL),(29,2,1,'Creditos',1,22,3,NULL,NULL,NULL,1.00,'Abonar un dolar','1','2025-08-10 14:30:47','2025-08-16 16:39:24',NULL),(30,2,1,'Creditos',1,22,4,NULL,NULL,NULL,8.00,'pag','1','2025-08-10 15:38:24','2025-08-16 16:39:24',NULL),(31,2,1,'Creditos',1,22,5,NULL,NULL,NULL,0.80,'pago total','1','2025-08-10 15:38:42','2025-08-16 16:39:24',NULL),(32,2,1,'Creditos',1,10,6,NULL,NULL,NULL,5.00,'pago','0','2025-08-16 15:53:58','2025-08-16 19:03:04',NULL),(33,2,1,'Creditos',1,10,7,NULL,NULL,NULL,2.00,'pago de creon apl','0','2025-08-16 19:09:10','2025-08-16 19:10:00',NULL),(34,5,1,'Creditos',1,10,8,NULL,NULL,NULL,3.00,'44','1','2025-08-22 21:57:23',NULL,NULL);
/*!40000 ALTER TABLE `detalle_gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_ingresos`
--

DROP TABLE IF EXISTS `detalle_ingresos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_ingresos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_movimiento_caja` int NOT NULL,
  `tipo_ingresos` enum('Ventas','Creditos','Otros') NOT NULL,
  `tipo_pago` int DEFAULT NULL,
  `id_ventas` int DEFAULT NULL,
  `id_abono` int DEFAULT NULL,
  `nro_ventas` varchar(20) DEFAULT NULL,
  `nro_credito_ventas` varchar(20) DEFAULT NULL,
  `monto` decimal(10,2) NOT NULL,
  `descripcion` text,
  `estado` char(1) DEFAULT '1',
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_movimiento_caja` (`id_movimiento_caja`),
  CONSTRAINT `detalle_ingresos_ibfk_1` FOREIGN KEY (`id_movimiento_caja`) REFERENCES `movimiento_caja` (`id_movimiento_caja`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ingresos`
--

LOCK TABLES `detalle_ingresos` WRITE;
/*!40000 ALTER TABLE `detalle_ingresos` DISABLE KEYS */;
INSERT INTO `detalle_ingresos` VALUES (1,1,'Ventas',1,1,NULL,'00000055',NULL,16.41,'Venta de producto','1','2025-07-30 22:23:38','2025-08-21 19:48:18',NULL),(2,1,'Ventas',1,2,NULL,'00000056',NULL,25.92,'Venta de producto','1','2025-07-30 22:25:02','2025-08-21 19:48:18',NULL),(3,1,'Ventas',2,3,NULL,'00000057',NULL,1.00,'Venta de producto','1','2025-07-30 22:27:35',NULL,NULL),(4,1,'Ventas',2,4,NULL,'00000058',NULL,0.00,'Venta de producto','1','2025-07-30 22:30:05',NULL,NULL),(5,1,'Ventas',1,5,NULL,'00000059',NULL,101.88,'Venta de producto','1','2025-07-30 22:33:35','2025-08-21 19:48:18',NULL),(6,1,'Ventas',2,6,NULL,'00000060',NULL,0.00,'Venta de producto','1','2025-07-30 22:36:58',NULL,NULL),(7,1,'Ventas',1,7,NULL,'00000061',NULL,68.60,'Venta de producto','1','2025-07-30 22:38:30','2025-08-21 19:48:18',NULL),(8,1,'Ventas',2,8,NULL,'00000062',NULL,1.00,'Venta de producto','1','2025-07-30 22:40:07',NULL,NULL),(9,1,'Ventas',2,9,NULL,'00000063',NULL,0.00,'Venta de producto','1','2025-07-30 22:48:48',NULL,NULL),(10,1,'Ventas',2,10,NULL,'00000064',NULL,0.00,'Venta de producto','1','2025-07-31 20:50:05',NULL,NULL),(11,1,'Ventas',2,11,NULL,'00000065',NULL,0.00,'Venta de producto','1','2025-07-31 20:51:33',NULL,NULL),(12,1,'Ventas',2,12,NULL,'00000066',NULL,0.00,'Venta de producto','1','2025-07-31 20:52:39',NULL,NULL),(13,1,'Ventas',2,13,NULL,'00000067',NULL,0.00,'Venta de producto','1','2025-07-31 20:53:54',NULL,NULL),(14,1,'Ventas',1,14,NULL,'00000068',NULL,97.20,'Venta de producto','1','2025-07-31 20:54:39','2025-08-21 19:48:18',NULL),(15,1,'Ventas',1,15,NULL,'00000069',NULL,87.39,'Venta de producto','1','2025-07-31 20:56:19','2025-08-21 19:48:18',NULL),(16,1,'Ventas',1,16,NULL,'00000070',NULL,93.76,'Venta de producto','1','2025-07-31 20:57:12','2025-08-21 19:48:18',NULL),(17,1,'Ventas',2,17,NULL,'00000071',NULL,0.00,'Venta de producto','1','2025-07-31 20:58:08',NULL,NULL),(18,1,'Ventas',1,18,NULL,'00000072',NULL,45.06,'Venta de producto','1','2025-07-31 20:59:06','2025-08-21 19:48:18',NULL),(19,1,'Ventas',1,19,NULL,'00000073',NULL,110.90,'Venta de producto','1','2025-07-31 21:02:15','2025-08-21 19:48:18',NULL),(20,1,'Ventas',2,20,NULL,'00000074',NULL,0.00,'Venta de producto','1','2025-07-31 21:09:38',NULL,NULL),(21,1,'Ventas',2,21,NULL,'00000075',NULL,2.00,'Venta de producto','1','2025-07-31 21:10:44',NULL,NULL),(22,1,'Ventas',1,22,NULL,'00000076',NULL,75.04,'Venta de producto','1','2025-07-31 21:11:55','2025-08-21 19:48:18',NULL),(23,1,'Ventas',1,23,NULL,'00000077',NULL,393.42,'Venta de producto','0','2025-08-10 17:19:40','2025-08-21 19:48:18',NULL),(24,1,'Ventas',2,24,NULL,'00000078',NULL,0.00,'Venta de producto','0','2025-08-10 17:59:01','2025-08-10 18:01:54',NULL),(25,1,'Creditos',1,4,1,NULL,NULL,0.00,'avonos','1','2025-08-10 18:09:03','2025-08-21 19:48:18',NULL),(26,1,'Creditos',1,6,2,NULL,NULL,0.00,'avonos','1','2025-08-10 18:09:23','2025-08-21 19:48:18',NULL),(27,1,'Ventas',1,25,NULL,'00000079',NULL,16.13,'Venta de producto','1','2025-08-10 19:28:38','2025-08-21 19:48:18',NULL),(28,1,'Ventas',1,26,NULL,'00000080',NULL,16.56,'Venta de producto','1','2025-08-10 19:51:49','2025-08-21 19:48:18',NULL),(29,1,'Creditos',1,3,3,NULL,NULL,1.00,'pago de cliente 0009921','0','2025-08-16 20:48:07','2025-08-21 19:48:18',NULL),(30,4,'Creditos',1,4,4,NULL,NULL,6.00,'boda','1','2025-08-21 21:01:13',NULL,NULL),(31,4,'Creditos',1,3,5,NULL,NULL,3.00,'rrrr','1','2025-08-22 21:57:38',NULL,NULL),(32,4,'Ventas',1,27,NULL,'00000081',NULL,32.26,'Venta de producto','1','2025-08-23 12:08:22',NULL,NULL);
/*!40000 ALTER TABLE `detalle_ingresos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dinero`
--

DROP TABLE IF EXISTS `dinero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dinero` (
  `id_dinero` int NOT NULL AUTO_INCREMENT,
  `id_arqueo` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `id_caja` int DEFAULT NULL,
  `billete_100` decimal(10,2) DEFAULT NULL,
  `billete_50` decimal(10,2) DEFAULT NULL,
  `billete_20` decimal(10,2) DEFAULT NULL,
  `billete_10` decimal(10,2) DEFAULT NULL,
  `billete_5` decimal(10,2) DEFAULT NULL,
  `billete_2` decimal(10,2) DEFAULT NULL,
  `billete_1` decimal(10,2) DEFAULT NULL,
  `moneda_1` decimal(10,2) DEFAULT NULL,
  `moneda_50` decimal(10,2) DEFAULT NULL,
  `moneda_25` decimal(10,2) DEFAULT NULL,
  `moneda_10` decimal(10,2) DEFAULT NULL,
  `moneda_5` decimal(10,2) DEFAULT NULL,
  `moneda_001` decimal(10,2) DEFAULT NULL,
  `total_moneda` decimal(10,2) DEFAULT NULL,
  `total_billeta` decimal(10,2) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_dinero`),
  KEY `fk_dinero_id_arqueo` (`id_arqueo`),
  KEY `fk_dinero_id_usuario` (`id_usuario`),
  CONSTRAINT `fk_dinero_id_arqueo` FOREIGN KEY (`id_arqueo`) REFERENCES `arqueo_caja` (`id_arqueo_caja`),
  CONSTRAINT `fk_dinero_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dinero`
--

LOCK TABLES `dinero` WRITE;
/*!40000 ALTER TABLE `dinero` DISABLE KEYS */;
INSERT INTO `dinero` VALUES (1,1,1,1,1.00,1.00,1.00,3.00,1.00,0.00,4.00,1.00,0.00,0.00,3.00,1.00,4.00,1.39,209.00,'2025-08-20 21:31:33',NULL,'1');
/*!40000 ALTER TABLE `dinero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `id_Empresa` int NOT NULL AUTO_INCREMENT,
  `id_firma` int DEFAULT NULL,
  `razon_social` varchar(200) DEFAULT NULL,
  `nombre_comercial` varchar(200) DEFAULT NULL,
  `ruc` varchar(13) DEFAULT NULL,
  `direccion_matriz` varchar(300) DEFAULT NULL,
  `direccion_sucursal` varchar(300) DEFAULT NULL,
  `contribuyente_especial` varchar(50) DEFAULT NULL,
  `obligado_contabilidad` enum('SI','NO') DEFAULT NULL,
  `ambiente` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tipo_emision` char(1) DEFAULT NULL,
  `establecimiento_codigo` varchar(3) DEFAULT NULL,
  `punto_emision_codigo` varchar(3) DEFAULT NULL,
  `secuencial` int DEFAULT '1',
  `marca` varchar(100) DEFAULT NULL,
  `serie_boleta` varchar(20) DEFAULT NULL,
  `nro_correlativo_ventas` varchar(20) DEFAULT '0',
  `nro_credito_ventas` varchar(20) DEFAULT '0',
  `nro_correlativo_compras` varchar(20) DEFAULT '0',
  `nro_credito_compras` varchar(20) DEFAULT '0',
  `email` varchar(60) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `mensaje` varchar(100) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  `codigo_iva` int DEFAULT NULL,
  `logo_path` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `TipoDocumento` varchar(5) DEFAULT '01',
  `nro_boletaSri` varchar(15) DEFAULT '0',
  `mensaje_correo_cliente` varchar(255) DEFAULT NULL,
  `asunto_correo_cliente` varchar(100) DEFAULT NULL,
  `mensaje_correo_sri` varchar(255) DEFAULT NULL,
  `nombre_contacto` varchar(100) DEFAULT NULL,
  `correo_soporte` varchar(100) DEFAULT NULL,
  `forma_pago_codigo` char(2) DEFAULT NULL,
  `cod_impuesto` char(2) DEFAULT '2',
  PRIMARY KEY (`id_Empresa`),
  KEY `fk_empresa_iva` (`codigo_iva`),
  KEY `fk_tipo_documento` (`TipoDocumento`),
  KEY `fk_empresa_forma_pago` (`forma_pago_codigo`),
  KEY `fk_empresa_cod_impuesto` (`cod_impuesto`),
  CONSTRAINT `fk_empresa_cod_impuesto` FOREIGN KEY (`cod_impuesto`) REFERENCES `impuesto` (`codigo`),
  CONSTRAINT `fk_empresa_forma_pago` FOREIGN KEY (`forma_pago_codigo`) REFERENCES `forma_pago` (`codigo`),
  CONSTRAINT `fk_empresa_iva` FOREIGN KEY (`codigo_iva`) REFERENCES `porcentaje_iva` (`codigo`),
  CONSTRAINT `fk_tipo_documento` FOREIGN KEY (`TipoDocumento`) REFERENCES `tipo_comprobante` (`codigo_sri`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,NULL,'Ventas de Producto Agricola','El Agricultor','0804610814001','Esmeralda','AV Las Golondrinas',NULL,'NO','1','1','001','001',1,NULL,NULL,'00000081','00000023','00000070','0','garofaloedison8@gmail.com','0992335080',NULL,'2025-05-03 19:57:34','2025-08-23 12:08:22',NULL,'1',4,NULL,'01','40',NULL,NULL,NULL,NULL,NULL,'01','2'),(2,1,'ffffffdff','2','1234678995','barrio entre rios','das','si','SI','1','1','001','001',1,'dwww',NULL,NULL,NULL,NULL,NULL,'edisongarofalo88@gmail.com','5555555','ddddddddddd','2025-06-12 14:34:45','2025-08-23 12:08:22',NULL,'2',0,'Views/assets/imagenes/logo/logo_684b2bd5447c5.PNG','01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,2,'Proveedor anime ','Mundo del aime ','0804610014001','barrio entre rios1','Guayauqii 1','SI','NO','2','2','001','002',2,'Bleacjha ',NULL,NULL,NULL,NULL,NULL,'edisongarofalo881@gmail.com','55555551','gracias por su comras1','2025-06-12 14:41:08','2025-08-23 12:08:22',NULL,'1',2,'Views/assets/imagenes/logo/logo_684b2d54d9e4a.PNG','01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,1,'ffffffdff','Mundo del aime 1','0804610814','barrio entre rios','ffffffff','SI','SI','1','2','090','090',2,'Bleacjha 1',NULL,NULL,NULL,NULL,NULL,'edisongarofalo88@gmail.com','5555555','dffdfffffff','2025-06-12 22:09:36','2025-08-23 12:08:22',NULL,'2',4,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,'Aniemis','Salinas','0920910920191','ddddd','dndndnd','SI','SI','1','2','001','002',1,'Maee',NULL,NULL,NULL,NULL,NULL,'mariajtkm_2011@hotmail.com','(095) 918-8170','sdsdssdsddssdsdsd','2025-07-19 19:38:12','2025-08-23 12:08:22',NULL,'1',4,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,'DausukiAnime','Guaya quli','0920910920191','sadsdasdsa','ssdasdssdads','SI','SI','1','2','001','002',1,'dai',NULL,NULL,NULL,NULL,NULL,'mariajtkm_2011@hotmail.com','(095) 918-8170','ddsadsaadsadsads','2025-07-19 21:12:18','2025-08-23 12:08:22',NULL,'1',4,'','01','0',NULL,NULL,NULL,NULL,NULL,'21','2');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enviado_cliente`
--

DROP TABLE IF EXISTS `enviado_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enviado_cliente` (
  `id_enviado` tinyint NOT NULL,
  `nombre` varchar(3) NOT NULL,
  PRIMARY KEY (`id_enviado`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enviado_cliente`
--

LOCK TABLES `enviado_cliente` WRITE;
/*!40000 ALTER TABLE `enviado_cliente` DISABLE KEYS */;
INSERT INTO `enviado_cliente` VALUES (2,'NO'),(1,'SI');
/*!40000 ALTER TABLE `enviado_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_emision`
--

DROP TABLE IF EXISTS `estado_emision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_emision` (
  `id_estado` tinyint NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_estado`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_emision`
--

LOCK TABLES `estado_emision` WRITE;
/*!40000 ALTER TABLE `estado_emision` DISABLE KEYS */;
INSERT INTO `estado_emision` VALUES (4,'AUTORIZADO'),(3,'DEVUELTA'),(5,'EN_PROCESO'),(99,'ERROR_CONSULTA_SRI'),(1,'GENERADO'),(6,'NO_AUTORIZADO'),(7,'OTRO / DESCONOCIDO'),(2,'RECIBIDA');
/*!40000 ALTER TABLE `estado_emision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firma_electronica`
--

DROP TABLE IF EXISTS `firma_electronica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `firma_electronica` (
  `id_firma` int NOT NULL,
  `nombre_archivo` varchar(100) DEFAULT NULL,
  `certificado_digital` text,
  `clave_certificado` varchar(255) DEFAULT NULL,
  `fecha_inicio_vigencia` date DEFAULT NULL,
  `fecha_fin_vigencia` date DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_firma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firma_electronica`
--

LOCK TABLES `firma_electronica` WRITE;
/*!40000 ALTER TABLE `firma_electronica` DISABLE KEYS */;
/*!40000 ALTER TABLE `firma_electronica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forma_pago`
--

DROP TABLE IF EXISTS `forma_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forma_pago` (
  `codigo` char(2) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forma_pago`
--

LOCK TABLES `forma_pago` WRITE;
/*!40000 ALTER TABLE `forma_pago` DISABLE KEYS */;
INSERT INTO `forma_pago` VALUES ('01','SIN UTILIZACION DEL SISTEMA FINANCIERO'),('15','COMPENSACIÓN DE DEUDAS'),('16','TARJETA DE DÉBITO'),('17','DINERO ELECTRÓNICO'),('18','TARJETA PREPAGO'),('19','TARJETA DE CRÉDITO'),('20','OTROS CON UTILIZACIÓN DEL SISTEMA FINANCIERO'),('21','ENDOSO DE TÍTULOS');
/*!40000 ALTER TABLE `forma_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `impuesto`
--

DROP TABLE IF EXISTS `impuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `impuesto` (
  `codigo` char(2) NOT NULL,
  `impuesto` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impuesto`
--

LOCK TABLES `impuesto` WRITE;
/*!40000 ALTER TABLE `impuesto` DISABLE KEYS */;
INSERT INTO `impuesto` VALUES ('2','IVA'),('3','ICE'),('5','IRBPNR');
/*!40000 ALTER TABLE `impuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kardex`
--

DROP TABLE IF EXISTS `kardex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kardex` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario_creacion` int DEFAULT NULL,
  `id_producto` int DEFAULT NULL,
  `codigo_producto` varchar(20) DEFAULT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `concepto` text,
  `comprobante` varchar(50) DEFAULT NULL,
  `entrada_unidades` float DEFAULT NULL,
  `entrada_costo_unitario` decimal(10,2) DEFAULT NULL,
  `entrada_costo_total` decimal(10,2) DEFAULT NULL,
  `salidad_unidades` float DEFAULT NULL,
  `salidad_costo_unitario` decimal(10,2) DEFAULT NULL,
  `salidad_costo_total` decimal(10,2) DEFAULT NULL,
  `existencia_unidades` float DEFAULT NULL,
  `existencia_costo_unitario` decimal(10,2) DEFAULT NULL,
  `existencia_costo_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kardex_id_producto` (`id_producto`),
  CONSTRAINT `fk_kardex_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kardex`
--

LOCK TABLES `kardex` WRITE;
/*!40000 ALTER TABLE `kardex` DISABLE KEYS */;
INSERT INTO `kardex` VALUES (1,1,1,'4278050957808','2025-07-29 19:17:36','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,32,0.95,30.00),(2,1,2,'8132609575384','2025-07-29 19:19:49','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,52,3.15,164.00),(3,1,3,'4495711283430','2025-07-29 19:21:31','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,41,2.45,100.00),(4,1,4,'5403521749369','2025-07-29 19:24:10','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,59,0.92,54.00),(5,1,5,'1107061968005','2025-07-29 19:26:20','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,27,0.65,18.00),(6,1,6,'2926458086231','2025-07-29 19:28:37','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,1.39,22.00),(7,1,7,'3692938128315','2025-07-29 19:30:12','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,39,1.81,71.00),(8,1,8,'6197173662117','2025-07-29 19:32:03','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,89,4.43,394.00),(9,1,9,'3936665846387','2025-07-29 19:34:25','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,81,3.56,288.00),(10,1,10,'5266353701024','2025-07-29 19:35:46','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,55,1.11,61.00),(11,1,11,'9548887638468','2025-07-29 20:09:01','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,39,4.47,174.00),(12,1,12,'2837419397712','2025-07-29 20:10:11','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,14,2.50,35.00),(13,1,13,'6054983401054','2025-07-29 20:11:48','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,38,2.48,94.00),(14,1,14,'7537128809938','2025-07-29 20:13:20','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,52,2.23,116.00),(15,1,15,'8955199210909','2025-07-29 20:14:31','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,35,4.85,170.00),(16,1,16,'1818084761325','2025-07-29 20:16:00','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,87,0.53,46.00),(17,1,17,'5259543058627','2025-07-29 20:17:15','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,97,1.50,146.00),(18,1,18,'2699075385654','2025-07-29 20:18:34','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,91,4.04,368.00),(19,1,19,'4633160396667','2025-07-29 20:19:43','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,81,4.26,345.00),(20,1,20,'1217317286143','2025-07-29 20:21:24','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,13,4.93,64.00),(21,1,21,'8795369589559','2025-07-29 20:22:45','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,1.87,75.00),(22,1,22,'2417534007719','2025-07-29 20:25:20','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,33,1.29,43.00),(23,1,23,'1689126384227','2025-07-29 20:28:02','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,59,1.74,103.00),(24,1,24,'2925873873758','2025-07-29 20:30:26','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,66,1.00,66.00),(25,1,25,'6308856421409','2025-07-29 20:32:24','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,45,1.10,50.00),(26,1,26,'6118736826055','2025-07-29 20:35:25','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,18,1.18,21.00),(27,1,27,'1308706855412','2025-07-29 21:17:07','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,23,2.38,55.00),(28,1,28,'6068526185068','2025-07-29 21:18:30','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,21,4.91,103.00),(29,1,29,'8449598633935','2025-07-29 21:19:46','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,82,0.81,66.00),(30,1,30,'9304457235099','2025-07-29 21:21:11','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,94,2.83,266.00),(31,1,8,'6197173662117','2025-07-29 22:21:03','Compra de productos','00000045',26,4.43,115.18,NULL,NULL,NULL,115,4.43,624.63),(32,1,6,'2926458086231','2025-07-30 12:22:41','Compra de productos','00000046',50,1.39,69.50,NULL,NULL,NULL,66,1.39,161.24),(33,1,25,'6308856421409','2025-07-30 12:22:41','Compra de productos','00000046',33,1.10,36.30,NULL,NULL,NULL,78,1.10,122.10),(34,1,10,'5266353701024','2025-07-30 12:22:41','Compra de productos','00000046',16,1.11,17.76,NULL,NULL,NULL,71,1.11,96.57),(35,1,2,'8132609575384','2025-07-30 12:24:22','Compra de productos','00000047',10,3.15,31.50,NULL,NULL,NULL,62,3.15,226.80),(36,1,29,'8449598633935','2025-07-30 12:25:23','Compra de productos','00000048',10,0.81,8.10,NULL,NULL,NULL,92,0.81,82.62),(37,1,20,'1217317286143','2025-07-30 12:29:06','Compra de productos','00000049',9,4.93,44.37,NULL,NULL,NULL,22,4.93,152.83),(38,1,13,'6054983401054','2025-07-30 12:37:10','Compra de productos','00000050',27,2.48,66.96,NULL,NULL,NULL,65,2.48,228.16),(39,1,24,'2925873873758','2025-07-30 12:39:46','Compra de productos','00000051',42,1.00,42.00,NULL,NULL,NULL,108,1.00,150.00),(40,1,26,'6118736826055','2025-07-30 12:40:59','Compra de productos','00000052',5,1.18,5.90,NULL,NULL,NULL,23,1.18,33.04),(41,1,27,'1308706855412','2025-07-30 12:42:57','Compra de productos','00000053',13,2.38,30.94,NULL,NULL,NULL,36,2.38,116.62),(42,1,14,'7537128809938','2025-07-30 12:42:57','Compra de productos','00000053',13,2.23,28.99,NULL,NULL,NULL,65,2.23,173.94),(44,1,23,'1689126384227','2025-07-30 13:16:41','Compra de productos','00000054',32,1.74,55.68,NULL,NULL,NULL,91,1.74,214.02),(45,1,11,'9548887638468','2025-07-30 13:16:41','Compra de productos','00000054',29,4.47,129.63,NULL,NULL,NULL,68,4.47,433.59),(47,1,11,'9548887638468','2025-07-30 13:18:22','Compra de productos','00000055',23,4.47,102.81,NULL,NULL,NULL,91,4.47,509.58),(48,1,25,'6308856421409','2025-07-30 13:21:09','Compra de productos','00000056',33,1.10,36.30,NULL,NULL,NULL,111,1.10,158.40),(49,1,1,'4278050957808','2025-07-30 13:21:09','Compra de productos','00000056',50,0.95,47.50,NULL,NULL,NULL,82,0.95,125.40),(51,1,10,'5266353701024','2025-07-30 13:23:20','Compra de productos','00000057',39,1.11,43.29,NULL,NULL,NULL,110,1.11,165.39),(52,1,20,'1217317286143','2025-07-30 13:26:32','Compra de productos','00000058',49,4.93,241.57,NULL,NULL,NULL,71,4.93,591.60),(53,1,7,'3692938128315','2025-07-30 13:28:45','Compra de productos','00000059',19,1.81,34.39,NULL,NULL,NULL,58,1.81,139.37),(54,1,2,'8132609575384','2025-07-30 13:30:19','Compra de productos','00000060',23,3.15,72.45,NULL,NULL,NULL,85,3.15,340.20),(55,1,21,'8795369589559','2025-07-30 13:33:14','Compra de productos','00000061',48,1.87,89.76,NULL,NULL,NULL,88,1.87,254.32),(56,1,7,'3692938128315','2025-07-30 13:35:01','Compra de productos','00000062',20,1.81,36.20,NULL,NULL,NULL,78,1.81,177.38),(57,1,24,'2925873873758','2025-07-30 13:37:47','Compra de productos','00000063',12,1.00,12.00,NULL,NULL,NULL,120,1.00,132.00),(58,1,10,'5266353701024','2025-07-30 13:37:47','Compra de productos','00000063',13,1.11,14.43,NULL,NULL,NULL,123,1.11,150.96),(60,1,12,'2837419397712','2025-07-30 13:39:16','Compra de productos','00000064',5,2.50,12.50,NULL,NULL,NULL,19,2.50,60.00),(61,1,15,'8955199210909','2025-07-30 22:23:38','Venta de producto','00000055',NULL,NULL,NULL,3,4.85,14.55,32,4.85,155.20),(62,1,7,'3692938128315','2025-07-30 22:25:02','Venta de producto','00000056',NULL,NULL,NULL,4,1.81,7.24,74,1.81,133.94),(63,1,17,'5259543058627','2025-07-30 22:27:35','Venta de producto','00000057',NULL,NULL,NULL,20,1.50,30.00,77,1.50,115.50),(64,1,7,'3692938128315','2025-07-30 22:30:05','Venta de producto','00000058',NULL,NULL,NULL,15,1.81,27.15,59,1.81,106.79),(65,1,23,'1689126384227','2025-07-30 22:33:35','Venta de producto','00000059',NULL,NULL,NULL,12,1.74,20.88,79,1.74,137.46),(66,1,4,'5403521749369','2025-07-30 22:36:58','Venta de producto','00000060',NULL,NULL,NULL,16,0.92,14.72,43,0.92,39.56),(67,1,25,'6308856421409','2025-07-30 22:36:58','Venta de producto','00000060',NULL,NULL,NULL,15,1.10,16.50,96,1.10,105.60),(68,1,16,'1818084761325','2025-07-30 22:36:58','Venta de producto','00000060',NULL,NULL,NULL,9,0.53,4.77,78,0.53,41.34),(69,1,3,'4495711283430','2025-07-30 22:38:30','Venta de producto','00000061',NULL,NULL,NULL,10,2.45,24.50,31,2.45,75.95),(70,1,29,'8449598633935','2025-07-30 22:40:07','Venta de producto','00000062',NULL,NULL,NULL,17,0.81,13.77,75,0.81,60.75),(71,1,13,'6054983401054','2025-07-30 22:48:48','Venta de producto','00000063',NULL,NULL,NULL,9,2.48,22.32,56,2.48,138.88),(72,1,8,'6197173662117','2025-07-31 20:50:05','Venta de producto','00000064',NULL,NULL,NULL,1,4.43,4.43,114,4.43,505.02),(73,1,29,'8449598633935','2025-07-31 20:51:33','Venta de producto','00000065',NULL,NULL,NULL,14,0.81,11.34,61,0.81,49.41),(74,1,14,'7537128809938','2025-07-31 20:52:39','Venta de producto','00000066',NULL,NULL,NULL,2,2.23,4.46,63,2.23,140.49),(75,1,23,'1689126384227','2025-07-31 20:53:54','Venta de producto','00000067',NULL,NULL,NULL,13,1.74,22.62,66,1.74,114.84),(76,1,7,'3692938128315','2025-07-31 20:54:39','Venta de producto','00000068',NULL,NULL,NULL,15,1.81,27.15,44,1.81,79.64),(77,1,4,'5403521749369','2025-07-31 20:56:19','Venta de producto','00000069',NULL,NULL,NULL,9,0.92,8.28,34,0.92,31.28),(78,1,28,'6068526185068','2025-07-31 20:57:12','Venta de producto','00000070',NULL,NULL,NULL,16,4.91,78.56,5,4.91,24.55),(79,1,6,'2926458086231','2025-07-31 20:58:08','Venta de producto','00000071',NULL,NULL,NULL,14,1.39,19.46,52,1.39,72.28),(80,1,17,'5259543058627','2025-07-31 20:59:06','Venta de producto','00000072',NULL,NULL,NULL,6,1.50,9.00,71,1.50,106.50),(81,1,11,'9548887638468','2025-07-31 21:02:15','Venta de producto','00000073',NULL,NULL,NULL,8,4.47,35.76,83,4.47,371.01),(82,1,15,'8955199210909','2025-07-31 21:02:15','Venta de producto','00000073',NULL,NULL,NULL,6,4.85,29.10,26,4.85,126.10),(83,1,12,'2837419397712','2025-07-31 21:09:38','Venta de producto','00000074',NULL,NULL,NULL,5,2.50,12.50,14,2.50,35.00),(84,1,11,'9548887638468','2025-07-31 21:10:44','Venta de producto','00000075',NULL,NULL,NULL,4,4.47,17.88,79,4.47,353.13),(85,1,12,'2837419397712','2025-07-31 21:11:55','Venta de producto','00000076',NULL,NULL,NULL,14,2.50,35.00,0,2.50,0.00),(86,1,30,'9304457235099','2025-08-07 19:51:21','7',NULL,6,2.83,16.98,NULL,NULL,NULL,100,2.83,282.98),(87,1,30,'9304457235099','2025-08-10 10:37:13','comprea algun proveedor',NULL,10,2.88,28.80,NULL,NULL,NULL,110,2.83,311.78),(88,1,30,'9304457235099','2025-08-10 10:50:03','por compras no se que',NULL,6,2.88,17.28,NULL,NULL,NULL,116,2.84,329.06),(89,1,29,'8449598633935','2025-08-10 11:09:17','por sa',NULL,7,0.90,6.30,NULL,NULL,NULL,68,0.82,55.71),(90,1,29,'8449598633935','2025-08-10 11:14:56','promocion',NULL,4,0.90,3.60,NULL,NULL,NULL,72,0.82,59.31),(91,1,30,'9304457235099','2025-08-10 12:31:58','AJUSTE DE STOCK - SALIDA POR DEVOLUCION: devolucio',NULL,NULL,NULL,NULL,10,2.88,28.80,106,2.83,300.26),(92,1,30,'9304457235099','2025-08-10 12:31:58','AJUSTE DE STOCK - ENTRADA POR DEVOLUCION: devolucio',NULL,10,2.88,28.80,NULL,NULL,NULL,116,2.84,329.06),(93,1,30,'9304457235099','2025-08-10 13:03:31','AJUSTE DE STOCK - SALIDA POR PERDIDA: por que se me callo',NULL,NULL,NULL,NULL,5,2.88,14.40,111,2.83,314.66),(94,1,29,'8449598633935','2025-08-10 13:16:51','AJUSTE DE STOCK - SALIDA POR DEVOLUCION: devolcuon',NULL,NULL,NULL,NULL,1,0.90,0.90,71,0.82,58.41),(95,1,29,'8449598633935','2025-08-10 13:16:51','AJUSTE DE STOCK - ENTRADA POR DEVOLUCION: devolcuon',NULL,1,0.90,0.90,NULL,NULL,NULL,72,0.82,59.31),(96,1,29,'8449598633935','2025-08-10 13:24:03','AJUSTE DE STOCK - SALIDA POR PERDIDA: pedida',NULL,NULL,NULL,NULL,1,0.90,0.90,71,0.82,58.41),(97,1,29,'8449598633935','2025-08-10 13:51:49','Compra de productos','00000065',10,0.90,9.00,NULL,NULL,NULL,81,0.90,81.90),(98,1,29,'8449598633935','2025-08-10 13:56:25','Compra de productos','00000066',10,0.98,9.80,NULL,NULL,NULL,91,0.98,98.98),(99,1,29,'8449598633935','2025-08-10 14:07:17','Compra de productos','00000067',1,0.98,0.98,NULL,NULL,NULL,92,0.98,91.14),(100,1,29,'8449598633935','2025-08-10 14:17:42','Compra de productos','00000068',1,0.98,0.98,NULL,NULL,NULL,93,0.98,92.12),(101,1,29,'8449598633935','2025-08-10 14:18:53','Compra de productos','00000069',3,0.98,2.94,NULL,NULL,NULL,96,0.98,97.02),(102,1,29,'8449598633935','2025-08-10 14:24:29','Compra de productos','00000070',3,0.98,2.94,NULL,NULL,NULL,99,0.98,99.96),(103,1,29,'8449598633935','2025-08-10 15:20:58','Eliminación de compra Id:25','00000069',NULL,NULL,NULL,3,0.98,2.94,96,0.98,94.08),(104,1,7,'3692938128315','2025-08-10 17:19:40','Venta de producto','00000077',NULL,NULL,NULL,26,1.81,47.06,18,1.81,32.58),(105,1,20,'1217317286143','2025-08-10 17:19:40','Venta de producto','00000077',NULL,NULL,NULL,23,4.93,113.39,48,4.93,236.64),(106,1,7,'3692938128315','2025-08-10 17:36:06','Devolucion de Venta: Id23','00000077',5,1.81,9.05,NULL,NULL,NULL,23,1.81,41.63),(107,1,7,'3692938128315','2025-08-10 17:36:06','Devolucion de Venta: Id23','00000077',19,1.81,34.39,NULL,NULL,NULL,42,1.81,76.02),(108,1,7,'3692938128315','2025-08-10 17:36:06','Devolucion de Venta: Id23','00000077',2,1.81,3.62,NULL,NULL,NULL,44,1.81,79.64),(109,1,20,'1217317286143','2025-08-10 17:36:06','Devolucion de Venta: Id23','00000077',13,4.93,64.09,NULL,NULL,NULL,61,4.93,300.73),(110,1,20,'1217317286143','2025-08-10 17:36:06','Devolucion de Venta: Id23','00000077',9,4.93,44.37,NULL,NULL,NULL,70,4.93,345.10),(111,1,20,'1217317286143','2025-08-10 17:36:06','Devolucion de Venta: Id23','00000077',1,4.93,4.93,NULL,NULL,NULL,71,4.93,350.03),(112,1,20,'1217317286143','2025-08-10 17:59:01','Venta de producto','00000078',NULL,NULL,NULL,23,4.93,113.39,48,4.93,236.64),(113,1,7,'3692938128315','2025-08-10 17:59:01','Venta de producto','00000078',NULL,NULL,NULL,26,1.81,47.06,18,1.81,32.58),(114,1,20,'1217317286143','2025-08-10 18:01:54','Devolucion de Venta: Id24','00000078',13,4.93,64.09,NULL,NULL,NULL,61,4.93,300.73),(115,1,20,'1217317286143','2025-08-10 18:01:54','Devolucion de Venta: Id24','00000078',9,4.93,44.37,NULL,NULL,NULL,70,4.93,345.10),(116,1,20,'1217317286143','2025-08-10 18:01:54','Devolucion de Venta: Id24','00000078',1,4.93,4.93,NULL,NULL,NULL,71,4.93,350.03),(117,1,7,'3692938128315','2025-08-10 18:01:54','Devolucion de Venta: Id24','00000078',5,1.81,9.05,NULL,NULL,NULL,23,1.81,41.63),(118,1,7,'3692938128315','2025-08-10 18:01:54','Devolucion de Venta: Id24','00000078',19,1.81,34.39,NULL,NULL,NULL,42,1.81,76.02),(119,1,7,'3692938128315','2025-08-10 18:01:54','Devolucion de Venta: Id24','00000078',2,1.81,3.62,NULL,NULL,NULL,44,1.81,79.64),(120,1,22,'2417534007719','2025-08-10 19:28:38','Venta de producto','00000079',NULL,NULL,NULL,1,1.29,1.29,32,1.29,41.28),(121,1,5,'1107061968005','2025-08-10 19:28:38','Venta de producto','00000079',NULL,NULL,NULL,1,0.65,0.65,26,0.65,16.90),(122,1,22,'2417534007719','2025-08-10 19:51:49','Venta de producto','00000080',NULL,NULL,NULL,1,1.29,1.29,31,1.29,39.99),(123,1,1,'4278050957808','2025-08-10 19:51:49','Venta de producto','00000080',NULL,NULL,NULL,1,0.95,0.95,81,0.95,76.95),(124,1,31,'7891234567','2025-08-22 22:03:10','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,100,1.50,150.00),(125,1,33,'7891234568','2025-08-22 22:04:22','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,50.5,0.80,40.40),(126,1,34,'7891234569','2025-08-22 22:07:38','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,50,2.00,100.00),(127,1,35,'7891234562','2025-08-22 22:08:34','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,100,1.50,150.00),(128,1,36,'7891234560','2025-08-22 22:08:34','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,50.5,0.80,40.40),(129,1,37,'7891234561','2025-08-22 22:08:34','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,50,2.00,100.00),(130,1,22,'2417534007719','2025-08-23 12:08:22','Venta de producto','00000081',NULL,NULL,NULL,2,1.29,2.58,29,1.29,37.41),(131,1,5,'1107061968005','2025-08-23 12:08:22','Venta de producto','00000081',NULL,NULL,NULL,2,0.65,1.30,24,0.65,15.60);
/*!40000 ALTER TABLE `kardex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licencia`
--

DROP TABLE IF EXISTS `licencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `licencia` (
  `id_licencia` int NOT NULL AUTO_INCREMENT,
  `licencia` varchar(45) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_licencia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licencia`
--

LOCK TABLES `licencia` WRITE;
/*!40000 ALTER TABLE `licencia` DISABLE KEYS */;
INSERT INTO `licencia` VALUES (1,' DESKTOP-6M3H8KN','1');
/*!40000 ALTER TABLE `licencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licencia_alquirida`
--

DROP TABLE IF EXISTS `licencia_alquirida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `licencia_alquirida` (
  `id_licencia_alquirida` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `id_licencia` int DEFAULT NULL,
  `activacion` char(1) DEFAULT NULL,
  `direccion_mac` varchar(45) DEFAULT NULL,
  `fecha_compra` datetime DEFAULT NULL,
  `fecha_vigente` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_licencia_alquirida`),
  KEY `fk_licencia_alquirida_id_licencia` (`id_licencia`),
  KEY `fk_licencia_alquirida_id_usuario` (`id_usuario`),
  CONSTRAINT `fk_licencia_alquirida_id_licencia` FOREIGN KEY (`id_licencia`) REFERENCES `licencia` (`id_licencia`),
  CONSTRAINT `fk_licencia_alquirida_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licencia_alquirida`
--

LOCK TABLES `licencia_alquirida` WRITE;
/*!40000 ALTER TABLE `licencia_alquirida` DISABLE KEYS */;
INSERT INTO `licencia_alquirida` VALUES (2,1,1,'1',' DESKTOP-6M3H8KN','2025-03-28 17:04:42','2028-04-28 17:04:42','1');
/*!40000 ALTER TABLE `licencia_alquirida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_auditoria`
--

DROP TABLE IF EXISTS `log_auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_auditoria` (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `tabla` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `accion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `usuario_id` int DEFAULT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `detalle` text,
  `id_registro_afectado` int DEFAULT NULL,
  `modulo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_auditoria`
--

LOCK TABLES `log_auditoria` WRITE;
/*!40000 ALTER TABLE `log_auditoria` DISABLE KEYS */;
INSERT INTO `log_auditoria` VALUES (1,'medidas','Registrar',1,'2025-07-29 19:15:40','Registrar una Medidas',NULL,NULL),(2,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:17:36','Registro de producto nuevo. Código: 4278050957808, Descripción: Producto 1',1,'PRODUCTO'),(3,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:19:49','Registro de producto nuevo. Código: 8132609575384, Descripción: Producto 2',2,'PRODUCTO'),(4,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:21:31','Registro de producto nuevo. Código: 4495711283430, Descripción: Producto 3',3,'PRODUCTO'),(5,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:24:10','Registro de producto nuevo. Código: 5403521749369, Descripción: Producto 4',4,'PRODUCTO'),(6,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:26:20','Registro de producto nuevo. Código: 1107061968005, Descripción: Producto 5',5,'PRODUCTO'),(7,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:28:37','Registro de producto nuevo. Código: 2926458086231, Descripción: Producto 6',6,'PRODUCTO'),(8,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:30:12','Registro de producto nuevo. Código: 3692938128315, Descripción: Producto 7',7,'PRODUCTO'),(9,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:32:03','Registro de producto nuevo. Código: 6197173662117, Descripción: Producto 8',8,'PRODUCTO'),(10,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:34:25','Registro de producto nuevo. Código: 3936665846387, Descripción: Producto 9',9,'PRODUCTO'),(11,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:35:46','Registro de producto nuevo. Código: 5266353701024, Descripción: Producto 10',10,'PRODUCTO'),(12,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:09:01','Registro de producto nuevo. Código: 9548887638468, Descripción: Producto 11',11,'PRODUCTO'),(13,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:10:11','Registro de producto nuevo. Código: 2837419397712, Descripción: Producto 12',12,'PRODUCTO'),(14,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:11:48','Registro de producto nuevo. Código: 6054983401054, Descripción: Producto 13',13,'PRODUCTO'),(15,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:13:20','Registro de producto nuevo. Código: 7537128809938, Descripción: Producto 14',14,'PRODUCTO'),(16,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:14:31','Registro de producto nuevo. Código: 8955199210909, Descripción: Producto 15',15,'PRODUCTO'),(17,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:16:00','Registro de producto nuevo. Código: 1818084761325, Descripción: Producto 16',16,'PRODUCTO'),(18,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:17:15','Registro de producto nuevo. Código: 5259543058627, Descripción: Producto 17',17,'PRODUCTO'),(19,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:18:34','Registro de producto nuevo. Código: 2699075385654, Descripción: Producto 18',18,'PRODUCTO'),(20,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:19:43','Registro de producto nuevo. Código: 4633160396667, Descripción: Producto 19',19,'PRODUCTO'),(21,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:21:24','Registro de producto nuevo. Código: 1217317286143, Descripción: Producto 20',20,'PRODUCTO'),(22,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:22:45','Registro de producto nuevo. Código: 8795369589559, Descripción: Producto 21',21,'PRODUCTO'),(23,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:25:20','Registro de producto nuevo. Código: 2417534007719, Descripción: Producto 22',22,'PRODUCTO'),(24,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:28:02','Registro de producto nuevo. Código: 1689126384227, Descripción: Producto 23',23,'PRODUCTO'),(25,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:30:26','Registro de producto nuevo. Código: 2925873873758, Descripción: Producto 24',24,'PRODUCTO'),(26,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:32:24','Registro de producto nuevo. Código: 6308856421409, Descripción: Producto 25',25,'PRODUCTO'),(27,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:35:25','Registro de producto nuevo. Código: 6118736826055, Descripción: Producto 26',26,'PRODUCTO'),(28,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 21:17:07','Registro de producto nuevo. Código: 1308706855412, Descripción: Producto 27',27,'PRODUCTO'),(29,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 21:18:30','Registro de producto nuevo. Código: 6068526185068, Descripción: Producto 28',28,'PRODUCTO'),(30,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 21:19:46','Registro de producto nuevo. Código: 8449598633935, Descripción: Producto 29',29,'PRODUCTO'),(31,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 21:21:11','Registro de producto nuevo. Código: 9304457235099, Descripción: Producto 30',30,'PRODUCTO'),(32,'proveedor','Actualizar',1,'2025-07-29 21:47:30','Registrar un Proveedor con el id: 1',1,'Proveedor'),(33,'proveedor','Actualizar',1,'2025-07-29 21:48:59','Registrar un Proveedor con el id: 2',2,'Proveedor'),(34,'cliente','Actualizar',1,'2025-07-29 21:51:27','Registrar un Cliente con el id: 1',1,'Cliente'),(35,'cliente','Actualizar',1,'2025-07-29 21:52:27','Registrar un Cliente con el id: 2',2,'Cliente'),(36,'cliente','Actualizar',1,'2025-07-29 21:53:35','Registrar un Cliente con el id: 3',3,'Cliente'),(37,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-29 22:21:03','Compra registrada completa con ID: 1',1,'Compra'),(38,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-30 12:22:41','Compra registrada completa con ID: 2',2,'Compra'),(39,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-30 12:24:22','Compra registrada completa con ID: 3',3,'Compra'),(40,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-30 12:25:23','Compra registrada completa con ID: 4',4,'Compra'),(41,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-30 12:29:06','Compra registrada completa con ID: 5',5,'Compra'),(42,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-30 12:37:10','Compra registrada completa con ID: 6',6,'Compra'),(43,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-30 12:39:46','Compra registrada completa con ID: 7',7,'Compra'),(44,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-30 12:40:59','Compra registrada completa con ID: 8',8,'Compra'),(45,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-30 12:42:57','Compra registrada completa con ID: 9',9,'Compra'),(46,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-30 13:16:41','Compra registrada completa con ID: 10',10,'Compra'),(47,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-30 13:18:22','Compra registrada completa con ID: 11',11,'Compra'),(48,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-30 13:21:09','Compra registrada completa con ID: 12',12,'Compra'),(49,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-30 13:23:20','Compra registrada completa con ID: 13',13,'Compra'),(50,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-30 13:26:32','Compra registrada completa con ID: 14',14,'Compra'),(51,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-30 13:28:45','Compra registrada completa con ID: 15',15,'Compra'),(52,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-30 13:30:19','Compra registrada completa con ID: 16',16,'Compra'),(53,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-30 13:33:14','Compra registrada completa con ID: 17',17,'Compra'),(54,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-30 13:35:01','Compra registrada completa con ID: 18',18,'Compra'),(55,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-30 13:37:47','Compra registrada completa con ID: 19',19,'Compra'),(56,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-30 13:39:16','Compra registrada completa con ID: 20',20,'Compra'),(57,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-08-07 19:51:21','Ingreso de producto ID: 30, código: 9304457235099, tipo ingreso: PROMOCION, cantidad: 6',30,'INVENTARIO'),(58,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-08-10 10:37:13','Ingreso de producto ID: 30, código: 9304457235099, tipo ingreso: COMPRA, cantidad: 10',30,'INVENTARIO'),(59,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-08-10 10:50:03','Ingreso de producto ID: 30, código: 9304457235099, tipo ingreso: PROMOCION, cantidad: 6',30,'INVENTARIO'),(60,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-08-10 11:09:17','Ingreso de producto ID: 29, código: 8449598633935, tipo ingreso: COMPRA, cantidad: 7',29,'INVENTARIO'),(61,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-08-10 11:14:56','Ingreso de producto ID: 29, código: 8449598633935, tipo ingreso: PROMOCION, cantidad: 4',29,'INVENTARIO'),(62,'producto / lote_producto / kardex','Ajuste de stock - DEVOLUCION',1,'2025-08-10 12:31:58','Ajuste realizado al producto ID 30 con cantidad 10. Observación: devolucio. Fecha vencimiento: 2026-01-24. Nuevo stock: 106',30,'INVENTARIO'),(63,'producto / lote_producto / kardex','Ajuste de stock - PERDIDA',1,'2025-08-10 13:03:31','Ajuste realizado al producto ID 30 con cantidad 5. Observación: por que se me callo. Nuevo stock: 111',30,'INVENTARIO'),(64,'producto / lote_producto / kardex','Ajuste de stock - DEVOLUCION',1,'2025-08-10 13:16:51','Ajuste realizado al producto ID 29 con cantidad 1. Observación: devolcuon. Nuevo stock: 71',29,'INVENTARIO'),(65,'producto / lote_producto / kardex','Ajuste de stock - PERDIDA',1,'2025-08-10 13:24:03','Ajuste realizado al producto ID 29 con cantidad 1. Observación: pedida. Nuevo stock: 71',29,'INVENTARIO'),(66,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-08-10 13:51:49','Compra registrada completa con ID: 21',21,'Compra'),(67,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-08-10 13:56:25','Compra registrada completa con ID: 22',22,'Compra'),(68,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-08-10 14:07:17','Compra registrada completa con ID: 23',23,'Compra'),(69,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-08-10 14:17:42','Compra registrada completa con ID: 24',24,'Compra'),(70,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-08-10 14:18:53','Compra registrada completa con ID: 25',25,'Compra'),(71,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-08-10 14:24:29','Compra registrada completa con ID: 26',26,'Compra'),(72,'producto / lote_producto / kardex','INSERT',1,'2025-08-22 22:03:10','Registro de producto nuevo. Código: 7891234567, Descripción: Leche Entera',31,'PRODUCTO'),(73,'producto','UPDATE',1,'2025-08-22 22:03:10','Actualización del producto. ID: 150, Descripción: Pan Integral',150,'PRODUCTO'),(74,'producto / lote_producto / kardex','INSERT',1,'2025-08-22 22:04:22','Registro de producto nuevo. Código: 7891234568, Descripción: Manzanas',33,'PRODUCTO'),(75,'producto','UPDATE',1,'2025-08-22 22:04:22','Actualización del producto. ID: 150, Descripción: Pan Integral',150,'PRODUCTO'),(76,'producto / lote_producto / kardex','INSERT',1,'2025-08-22 22:07:38','Registro de producto nuevo. Código: 7891234569, Descripción: Pan Integral',34,'PRODUCTO'),(77,'producto / lote_producto / kardex','INSERT',1,'2025-08-22 22:08:34','Registro de producto nuevo. Código: 7891234562, Descripción: Leche Entera',35,'PRODUCTO'),(78,'producto / lote_producto / kardex','INSERT',1,'2025-08-22 22:08:34','Registro de producto nuevo. Código: 7891234560, Descripción: Manzanas',36,'PRODUCTO'),(79,'producto / lote_producto / kardex','INSERT',1,'2025-08-22 22:08:34','Registro de producto nuevo. Código: 7891234561, Descripción: Pan Integral',37,'PRODUCTO');
/*!40000 ALTER TABLE `log_auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lote_producto`
--

DROP TABLE IF EXISTS `lote_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lote_producto` (
  `id_lote` int NOT NULL AUTO_INCREMENT,
  `id_usuario_creacion` int DEFAULT NULL,
  `id_det_compra` int DEFAULT NULL,
  `id_producto` int NOT NULL,
  `cantidad_comprada` int DEFAULT NULL,
  `cantidad_bonificada` int NOT NULL DEFAULT '0',
  `stock_disponible` int NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `precio_compra` decimal(10,2) GENERATED ALWAYS AS ((`costo_unitario` * `cantidad_comprada`)) STORED,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_vencimiento` date DEFAULT NULL,
  `estado` int DEFAULT '1',
  `id_usuario_actualizacion` int DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_lote`),
  KEY `id_producto` (`id_producto`),
  KEY `idx_vencimiento` (`fecha_vencimiento`),
  CONSTRAINT `lote_producto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lote_producto`
--

LOCK TABLES `lote_producto` WRITE;
/*!40000 ALTER TABLE `lote_producto` DISABLE KEYS */;
INSERT INTO `lote_producto` (`id_lote`, `id_usuario_creacion`, `id_det_compra`, `id_producto`, `cantidad_comprada`, `cantidad_bonificada`, `stock_disponible`, `costo_unitario`, `fecha_registro`, `fecha_vencimiento`, `estado`, `id_usuario_actualizacion`, `fecha_actualizacion`) VALUES (1,1,NULL,1,32,0,32,0.95,'2025-07-29 19:17:36','2025-11-08',1,NULL,NULL),(2,1,NULL,2,52,0,52,3.15,'2025-07-29 19:19:49','2025-10-04',1,NULL,NULL),(3,1,NULL,3,41,0,31,2.45,'2025-07-29 19:21:31',NULL,1,NULL,'2025-07-30 22:38:30'),(4,1,NULL,4,59,0,34,0.92,'2025-07-29 19:24:10','2025-10-19',1,NULL,'2025-07-31 20:56:19'),(5,1,NULL,5,27,0,24,0.65,'2025-07-29 19:26:20','2025-10-10',1,NULL,'2025-08-23 12:08:22'),(6,1,NULL,6,16,0,2,1.39,'2025-07-29 19:28:37',NULL,1,NULL,'2025-07-31 20:58:08'),(7,1,NULL,7,39,0,5,1.81,'2025-07-29 19:30:12',NULL,1,NULL,'2025-08-10 18:01:54'),(8,1,NULL,8,89,0,88,4.43,'2025-07-29 19:32:03','2025-10-19',1,NULL,'2025-07-31 20:50:05'),(9,1,NULL,9,81,0,81,3.56,'2025-07-29 19:34:25','2025-11-02',1,NULL,NULL),(10,1,NULL,10,55,0,55,1.11,'2025-07-29 19:35:46',NULL,1,NULL,NULL),(11,1,NULL,11,39,0,27,4.47,'2025-07-29 20:09:01','2025-11-29',1,NULL,'2025-07-31 21:10:44'),(12,1,NULL,12,14,0,0,2.50,'2025-07-29 20:10:11',NULL,2,NULL,'2025-07-31 21:11:55'),(13,1,NULL,13,38,0,29,2.48,'2025-07-29 20:11:48','2025-09-07',1,NULL,'2025-07-30 22:48:48'),(14,1,NULL,14,52,0,52,2.23,'2025-07-29 20:13:20','2026-01-03',1,NULL,NULL),(15,1,NULL,15,35,0,26,4.85,'2025-07-29 20:14:31','2025-11-30',1,NULL,'2025-07-31 21:02:15'),(16,1,NULL,16,87,0,78,0.53,'2025-07-29 20:16:00',NULL,1,NULL,'2025-07-30 22:36:58'),(17,1,NULL,17,97,0,71,1.50,'2025-07-29 20:17:15',NULL,1,NULL,'2025-07-31 20:59:06'),(18,1,NULL,18,91,0,91,4.04,'2025-07-29 20:18:34','2025-12-27',1,NULL,NULL),(19,1,NULL,19,81,0,81,4.26,'2025-07-29 20:19:43',NULL,1,NULL,NULL),(20,1,NULL,20,13,0,13,4.93,'2025-07-29 20:21:24',NULL,1,NULL,'2025-08-10 18:01:54'),(21,1,NULL,21,40,0,40,1.87,'2025-07-29 20:22:45',NULL,1,NULL,NULL),(22,1,NULL,22,33,0,29,1.29,'2025-07-29 20:25:20',NULL,1,NULL,'2025-08-23 12:08:22'),(23,1,NULL,23,59,0,34,1.74,'2025-07-29 20:28:02',NULL,1,NULL,'2025-07-31 20:53:54'),(24,1,NULL,24,66,0,66,1.00,'2025-07-29 20:30:26','2025-10-26',1,NULL,NULL),(25,1,NULL,25,45,0,30,1.10,'2025-07-29 20:32:24',NULL,1,NULL,'2025-07-30 22:36:58'),(26,1,NULL,26,18,0,18,1.18,'2025-07-29 20:35:25',NULL,1,NULL,NULL),(27,1,NULL,27,23,0,23,2.38,'2025-07-29 21:17:07','2025-11-14',1,NULL,NULL),(28,1,NULL,28,21,0,5,4.91,'2025-07-29 21:18:30',NULL,1,NULL,'2025-07-31 20:57:12'),(29,1,NULL,29,82,0,49,0.81,'2025-07-29 21:19:46',NULL,1,1,'2025-08-10 13:24:03'),(30,1,NULL,30,94,0,94,2.83,'2025-07-29 21:21:11','2025-11-30',1,NULL,NULL),(31,1,1,8,26,0,26,4.43,'2025-07-29 22:21:03','2025-10-25',1,NULL,NULL),(32,1,2,6,50,0,50,1.39,'2025-07-30 12:22:41','2026-01-31',1,NULL,NULL),(33,1,3,25,33,0,33,1.10,'2025-07-30 12:22:41','2026-05-23',1,NULL,NULL),(34,1,4,10,16,0,16,1.11,'2025-07-30 12:22:41','2026-03-07',1,NULL,NULL),(35,1,5,2,10,0,10,3.15,'2025-07-30 12:24:22','2026-01-03',1,NULL,NULL),(36,1,6,29,10,0,10,0.81,'2025-07-30 12:25:23','2025-11-23',1,NULL,NULL),(37,1,7,20,9,0,9,4.93,'2025-07-30 12:29:06','2025-11-30',1,NULL,'2025-08-10 18:01:54'),(38,1,8,13,27,0,27,2.48,'2025-07-30 12:37:10','2026-01-31',1,NULL,NULL),(39,1,9,24,42,0,42,1.00,'2025-07-30 12:39:46','2026-07-04',1,NULL,NULL),(40,1,10,26,5,0,5,1.18,'2025-07-30 12:40:59','2026-03-21',1,NULL,NULL),(41,1,11,27,13,0,13,2.38,'2025-07-30 12:42:57','2025-11-22',1,NULL,NULL),(42,1,12,14,13,0,11,2.23,'2025-07-30 12:42:57','2025-11-02',1,NULL,'2025-07-31 20:52:39'),(44,1,14,23,32,0,32,1.74,'2025-07-30 13:16:41','2026-02-28',1,NULL,NULL),(45,1,15,11,29,0,29,4.47,'2025-07-30 13:16:41','2026-03-01',1,NULL,NULL),(47,1,17,11,23,0,23,4.47,'2025-07-30 13:18:22','2026-06-19',1,NULL,NULL),(48,1,18,25,33,0,33,1.10,'2025-07-30 13:21:09','2026-02-07',1,NULL,NULL),(49,1,19,1,50,0,49,0.95,'2025-07-30 13:21:09','2025-11-01',1,NULL,'2025-08-10 19:51:49'),(51,1,21,10,39,0,39,1.11,'2025-07-30 13:23:20','2026-07-04',1,NULL,NULL),(52,1,22,20,49,0,49,4.93,'2025-07-30 13:26:32','2026-05-30',1,NULL,'2025-08-10 18:01:54'),(53,1,23,7,19,0,19,1.81,'2025-07-30 13:28:45','2026-01-25',1,NULL,'2025-08-10 18:01:54'),(54,1,24,2,23,0,23,3.15,'2025-07-30 13:30:19','2026-07-25',1,NULL,NULL),(55,1,25,21,48,0,48,1.87,'2025-07-30 13:33:14','2026-10-03',1,NULL,NULL),(56,1,26,7,20,0,20,1.81,'2025-07-30 13:35:01','2026-04-04',1,NULL,'2025-08-10 18:01:54'),(57,1,27,24,12,0,12,1.00,'2025-07-30 13:37:47','2027-02-11',1,NULL,NULL),(58,1,28,10,13,0,13,1.11,'2025-07-30 13:37:47','2026-12-26',1,NULL,NULL),(60,1,30,12,5,0,0,2.50,'2025-07-30 13:39:16','2027-05-01',2,NULL,'2025-07-31 21:11:55'),(61,1,NULL,30,0,6,6,0.00,'2025-08-07 19:51:21',NULL,1,NULL,NULL),(62,1,NULL,30,10,0,0,2.88,'2025-08-10 10:37:13','2026-01-24',2,1,'2025-08-10 12:57:22'),(63,1,NULL,30,0,6,6,0.00,'2025-08-10 10:50:03','2025-09-10',1,NULL,NULL),(64,1,NULL,29,7,0,7,0.90,'2025-08-10 11:09:17',NULL,1,NULL,NULL),(65,1,NULL,29,0,4,4,0.00,'2025-08-10 11:14:56',NULL,1,NULL,NULL),(66,1,NULL,30,10,0,5,2.88,'2025-08-10 12:31:58','2026-07-25',1,1,'2025-08-10 13:03:31'),(67,1,NULL,29,1,0,1,0.90,'2025-08-10 13:16:51',NULL,1,NULL,NULL),(68,1,31,29,10,0,10,0.90,'2025-08-10 13:51:49','2025-08-24',1,NULL,NULL),(69,1,32,29,10,0,10,0.98,'2025-08-10 13:56:25','2026-01-31',1,NULL,NULL),(70,1,33,29,1,0,1,0.98,'2025-08-10 14:07:17','2025-09-14',1,NULL,NULL),(71,1,34,29,1,0,1,0.98,'2025-08-10 14:17:42','2025-10-11',1,NULL,NULL),(72,1,35,29,0,0,0,0.98,'2025-08-10 14:18:53','2025-11-15',0,NULL,'2025-08-10 15:20:58'),(73,1,36,29,3,0,3,0.98,'2025-08-10 14:24:29','2025-08-10',1,NULL,NULL),(74,1,NULL,31,100,0,100,1.50,'2025-08-22 22:03:10',NULL,1,NULL,NULL),(75,1,NULL,33,51,0,51,0.80,'2025-08-22 22:04:22','2025-12-31',1,NULL,NULL),(76,1,NULL,34,50,0,50,2.00,'2025-08-22 22:07:38',NULL,1,NULL,NULL),(77,1,NULL,35,100,0,100,1.50,'2025-08-22 22:08:34',NULL,1,NULL,NULL),(78,1,NULL,36,51,0,51,0.80,'2025-08-22 22:08:34','2025-12-31',1,NULL,NULL),(79,1,NULL,37,50,0,50,2.00,'2025-08-22 22:08:34',NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `lote_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marca` (
  `id_marca` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `id_usuario_creacion` int DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_usuario_actualizacion` int DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_eliminacion` int DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'SIN nombre',1,'2025-07-29 19:16:00',NULL,'2025-08-10 12:58:36',NULL,NULL,'1');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medidas`
--

DROP TABLE IF EXISTS `medidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medidas` (
  `id_medida` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nombre_corto` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_medida`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medidas`
--

LOCK TABLES `medidas` WRITE;
/*!40000 ALTER TABLE `medidas` DISABLE KEYS */;
INSERT INTO `medidas` VALUES (1,'UNIDAD','UND','2025-07-29 19:15:40',NULL,NULL,'1');
/*!40000 ALTER TABLE `medidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modulos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modulo` varchar(100) DEFAULT NULL,
  `padre_id` int DEFAULT NULL,
  `vista` varchar(100) DEFAULT NULL,
  `icon_menu` varchar(45) DEFAULT NULL,
  `orden` int DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (1,'Tablero Principal',0,'dashboard.php','fas fa-chart-pie',0,NULL,NULL),(2,'Roles y Perfiles',42,'Administracion/ModulosyPerfiles/modulos_perfiles.php','fas fa-tablet-alt',3,NULL,NULL),(3,'Producto',4,'Gestion/Producto/productos.php','far fa-circle',9,'2023-01-06 12:48:37',NULL),(4,'Mantenedor',0,'','fas fa-tools',4,'2023-01-06 13:02:08',NULL),(5,'Medidas',4,'Gestion/Medidas/medidas.php','far fa-circle',12,'2023-01-08 13:12:05',NULL),(6,'Categorias',4,'Gestion/Categorias/categorias.php','far fa-circle',11,'2023-01-09 12:34:34',NULL),(7,'Proveedor',4,'Gestion/Proveedor/proveedor.php','	far fa-circle',8,'2023-01-15 07:33:34',NULL),(8,'Clientes',4,'Gestion/Clientes/clientes.php','	far fa-circle',7,'2023-01-15 07:34:53',NULL),(9,'Perecederos',4,'Gestion/Perecederos/perecederos.php','	far fa-circle',10,'2023-01-15 07:35:46',NULL),(11,'Caja y Movimientos',0,'','fas fa-cash-register',15,'2023-01-15 09:43:53',NULL),(13,'Caja',11,'AdministrarCaja/Caja/caja.php','	far fa-circle',16,'2023-01-15 09:54:43',NULL),(14,'Generar Reportes',33,'Administracion/Rol/rol.php','far fa-circle',40,'2023-01-15 11:33:00',NULL),(15,'Usuarios',42,'Administracion/Usuario/usuario.php','fas fa-users',2,'2023-01-15 14:07:39',NULL),(18,'Compras',0,'','fas fa-shopping-cart',19,'2023-01-16 17:45:49',NULL),(19,'Ventas',0,'','fas fa-credit-card',25,'2023-01-16 17:46:04',NULL),(20,'Realizar Compras',18,'Compras/RealizarCompras/compras.php','far fa-circle',21,'2023-01-16 17:47:23',NULL),(21,'Ventas',19,'Ventas/RealizarVentas/realizar_ventas.php','far fa-circle',29,'2023-01-16 17:49:11',NULL),(23,'Empresa',44,'Administracion/Configuracion/empresa.php','fas fa-store-alt',37,'2023-01-18 11:18:48',NULL),(24,'Movimiento',11,'AdministrarCaja/MovimientoCaja/movimiento_cajas.php','far fa-circle',18,'2023-01-20 11:16:21',NULL),(25,'Administra Ventas',19,'Ventas/Administrar_ventas/administrar_ventas.php','far fa-circle',28,'2023-01-25 16:14:23',NULL),(27,'Administrar Crédito',18,'ComprasCredito/AdministrarCreditos/administrar_credito.php','far fa-circle',22,'2023-03-11 12:07:07',NULL),(28,'Administrar Crédito',19,'VentasCreditos/AdministrarCreditos/administrar_credito.php','far fa-circle',26,'2023-03-11 12:24:39',NULL),(30,'Administra Compras',18,'Compras/Administrar_compras/historial_de_compras.php','far fa-circle',20,'2023-03-23 17:36:57',NULL),(31,'kardex',44,'kardex/kardex_promedial_ponderado/kardex.php','fas fa-snowflake',38,'2023-03-29 11:15:26',NULL),(33,'Reportes',0,'','fas fa-file',39,'2023-10-21 20:10:31',NULL),(34,'Bajo Stock',33,'Reportes/poco_stock.php','far fa-circle',43,'2023-10-21 20:12:44',NULL),(35,'Ganancias',33,'Reportes/ganacias.php','far fa-circle',44,'2023-10-21 20:13:31',NULL),(36,'Más Vendidos',33,'Reportes/reporte_producto_mas_vendidos.php','far fa-circle',42,'2023-10-21 22:31:23',NULL),(37,'Ventas Hoy',33,'Reportes/ventas_hoy.php','far fa-circle',41,'2023-10-23 17:49:39',NULL),(38,'lote',4,'Gestion/Perecederos/lote_producto.php','far fa-circle',6,'2025-05-13 20:04:32',NULL),(39,'Marca',4,'Gestion/Marcas/marcas.php','far fa-circle',5,'2025-06-08 23:31:15',NULL),(40,'FacturacionElectronica',45,'FacturacionElectronica/facturacionElectronica.php','far fa-circle',35,'2025-07-16 06:03:27',NULL),(41,'Carga Masiva',4,'Gestion/carga_masiva/carga_masiva_productos.php','far fa-circle',13,'2025-07-25 16:24:19',NULL),(42,'Usuarios y Seguridad',0,'','fas fa-tablet-alt',1,'2025-08-23 19:40:41',NULL),(43,'Reportes e Inventario',0,'','',33,'2025-08-23 20:20:31',NULL),(44,'Inventario / Kardex',0,'','fas fa-box',36,'2025-08-23 20:27:01',NULL),(45,'Facturación',0,'','fas fa-file-invoice-dollar',34,'2025-08-23 20:29:34',NULL);
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimiento_caja`
--

DROP TABLE IF EXISTS `movimiento_caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movimiento_caja` (
  `id_movimiento_caja` int NOT NULL AUTO_INCREMENT,
  `id_arqueo` int NOT NULL,
  `tipo_movimiento` enum('Ingreso','Egreso','Devolucion','Préstamo','Ajuste') NOT NULL,
  `tipo_referencia` enum('Ingreso','Gasto','Préstamo','Devolucion') DEFAULT NULL,
  `id_usuario` int NOT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_movimiento_caja`),
  KEY `id_arqueo` (`id_arqueo`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `movimiento_caja_ibfk_1` FOREIGN KEY (`id_arqueo`) REFERENCES `arqueo_caja` (`id_arqueo_caja`),
  CONSTRAINT `movimiento_caja_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimiento_caja`
--

LOCK TABLES `movimiento_caja` WRITE;
/*!40000 ALTER TABLE `movimiento_caja` DISABLE KEYS */;
INSERT INTO `movimiento_caja` VALUES (1,1,'Ingreso','Ingreso',1,'2025-07-29 22:01:04',NULL,'1'),(2,1,'Egreso','Gasto',1,'2025-07-29 22:01:04',NULL,'1'),(3,1,'Devolucion','Devolucion',1,'2025-07-29 22:01:04',NULL,'1'),(4,2,'Ingreso','Ingreso',1,'2025-08-21 21:00:31',NULL,'1'),(5,2,'Egreso','Gasto',1,'2025-08-21 21:00:31',NULL,'1'),(6,2,'Devolucion','Devolucion',1,'2025-08-21 21:00:31',NULL,'1');
/*!40000 ALTER TABLE `movimiento_caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimientos_compra_credito`
--

DROP TABLE IF EXISTS `movimientos_compra_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movimientos_compra_credito` (
  `id_movimiento` int NOT NULL AUTO_INCREMENT,
  `id_compra_credito` int DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `tipo_movimiento` varchar(20) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha_movimiento` datetime DEFAULT NULL,
  PRIMARY KEY (`id_movimiento`),
  KEY `id_compra_credito` (`id_compra_credito`),
  CONSTRAINT `movimientos_compra_credito_ibfk_1` FOREIGN KEY (`id_compra_credito`) REFERENCES `compras_credito` (`id_compra_credito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimientos_compra_credito`
--

LOCK TABLES `movimientos_compra_credito` WRITE;
/*!40000 ALTER TABLE `movimientos_compra_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimientos_compra_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimientos_credito`
--

DROP TABLE IF EXISTS `movimientos_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movimientos_credito` (
  `id_movimiento` int NOT NULL AUTO_INCREMENT,
  `id_venta_credito` int DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `tipo_movimiento` varchar(20) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha_movimiento` datetime DEFAULT NULL,
  PRIMARY KEY (`id_movimiento`),
  KEY `id_venta_credito` (`id_venta_credito`),
  CONSTRAINT `movimientos_credito_ibfk_1` FOREIGN KEY (`id_venta_credito`) REFERENCES `ventas_credito` (`id_venta_credito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimientos_credito`
--

LOCK TABLES `movimientos_credito` WRITE;
/*!40000 ALTER TABLE `movimientos_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimientos_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_modulo`
--

DROP TABLE IF EXISTS `perfil_modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfil_modulo` (
  `idperfil_modulo` int NOT NULL AUTO_INCREMENT,
  `id_perfil` int DEFAULT NULL,
  `id_modulo` int DEFAULT NULL,
  `vista_inicio` tinyint DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`idperfil_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=581 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_modulo`
--

LOCK TABLES `perfil_modulo` WRITE;
/*!40000 ALTER TABLE `perfil_modulo` DISABLE KEYS */;
INSERT INTO `perfil_modulo` VALUES (299,1,1,1,'1'),(300,1,2,0,'1'),(301,1,38,0,'1'),(302,1,4,0,'1'),(303,1,8,0,'1'),(304,1,7,0,'1'),(305,1,3,0,'1'),(306,1,6,0,'1'),(307,1,5,0,'1'),(308,1,15,0,'1'),(309,1,30,0,'1'),(310,1,18,0,'1'),(311,1,20,0,'1'),(312,1,29,0,'1'),(313,1,26,0,'1'),(314,1,27,0,'1'),(315,1,25,0,'1'),(316,1,19,0,'1'),(317,1,21,0,'1'),(318,1,28,0,'1'),(319,1,16,0,'1'),(320,1,22,0,'1'),(321,1,23,0,'1'),(322,1,31,0,'1'),(323,1,37,0,'1'),(324,1,33,0,'1'),(325,1,36,0,'1'),(326,1,34,0,'1'),(327,1,35,0,'1'),(328,1,39,0,'1'),(538,2,1,1,'1'),(539,2,15,0,'1'),(540,2,42,0,'1'),(541,2,2,0,'1'),(542,2,39,0,'1'),(543,2,4,0,'1'),(544,2,38,0,'1'),(545,2,8,0,'1'),(546,2,7,0,'1'),(547,2,3,0,'1'),(548,2,9,0,'1'),(549,2,6,0,'1'),(550,2,5,0,'1'),(551,2,41,0,'1'),(552,2,13,0,'1'),(553,2,11,0,'1'),(554,2,12,0,'1'),(555,2,24,0,'1'),(556,2,30,0,'1'),(557,2,18,0,'1'),(558,2,20,0,'1'),(559,2,27,0,'1'),(560,2,29,0,'1'),(561,2,26,0,'1'),(562,2,28,0,'1'),(563,2,19,0,'1'),(564,2,32,0,'1'),(565,2,25,0,'1'),(566,2,21,0,'1'),(567,2,17,0,'1'),(568,2,16,0,'1'),(569,2,22,0,'1'),(570,2,40,0,'1'),(571,2,45,0,'1'),(572,2,23,0,'1'),(573,2,44,0,'1'),(574,2,31,0,'1'),(575,2,14,0,'1'),(576,2,33,0,'1'),(577,2,37,0,'1'),(578,2,36,0,'1'),(579,2,34,0,'1'),(580,2,35,0,'1');
/*!40000 ALTER TABLE `perfil_modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfiles` (
  `id_perfil` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` VALUES (1,'administrador','2025-04-28 16:45:27',NULL,NULL,'1'),(2,'Programador','2025-04-28 16:45:27',NULL,NULL,'1'),(3,'Vendedor','2025-04-28 16:45:27',NULL,NULL,'1');
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `porcentaje_iva`
--

DROP TABLE IF EXISTS `porcentaje_iva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `porcentaje_iva` (
  `codigo` int NOT NULL,
  `porcentaje` decimal(5,2) NOT NULL,
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `porcentaje_iva`
--

LOCK TABLES `porcentaje_iva` WRITE;
/*!40000 ALTER TABLE `porcentaje_iva` DISABLE KEYS */;
INSERT INTO `porcentaje_iva` VALUES (0,0.00),(2,12.00),(3,14.00),(4,15.00),(5,5.00);
/*!40000 ALTER TABLE `porcentaje_iva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `codigo_barra` varchar(13) DEFAULT NULL,
  `id_categoria_producto` int DEFAULT NULL,
  `id_marca` int DEFAULT NULL,
  `id_unidades` int DEFAULT NULL,
  `descripcion_producto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `img_producto` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Views/assets/imagenes/productos/img_por_defecto.png',
  `precio_compra_producto` decimal(10,2) DEFAULT NULL,
  `precio_venta_producto` decimal(10,2) DEFAULT NULL,
  `precio_1_producto` decimal(10,2) DEFAULT NULL,
  `precio_2_producto` decimal(10,2) DEFAULT NULL,
  `precio_fraccion` decimal(10,2) DEFAULT NULL,
  `precio_fraccion_1` decimal(10,2) DEFAULT NULL,
  `precio_fraccion_2` decimal(10,2) DEFAULT NULL,
  `lleva_iva_producto` char(1) DEFAULT NULL,
  `costo_total_producto` decimal(10,2) DEFAULT NULL,
  `stock_producto` float DEFAULT NULL,
  `unidades` float DEFAULT NULL,
  `stock_fraccion` decimal(10,2) DEFAULT NULL,
  `minimo_stock_producto` float DEFAULT NULL,
  `inventariable_producto` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '1',
  `perecedero_producto` char(1) DEFAULT NULL,
  `ventas_producto` decimal(10,2) DEFAULT NULL,
  `compra_producto` decimal(10,2) DEFAULT NULL,
  `utilidad` decimal(10,2) DEFAULT NULL,
  `ventas_fracion_producto` char(1) DEFAULT NULL,
  `id_usuario_creacion` int DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_usuario_actualizacion` int DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_eliminacion` int DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `producto_venta_cantida` decimal(10,2) DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_producto`),
  KEY `fk_producto_id_categoria_producto` (`id_categoria_producto`),
  KEY `fk_producto_id_unidades` (`id_unidades`),
  CONSTRAINT `fk_producto_id_categoria_producto` FOREIGN KEY (`id_categoria_producto`) REFERENCES `categorias` (`id_categoria`),
  CONSTRAINT `fk_producto_id_unidades` FOREIGN KEY (`id_unidades`) REFERENCES `medidas` (`id_medida`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'4278050957808',1,1,1,'Producto 1','Views/assets/imagenes/productos/img_por_defecto.png',0.95,8.18,8.50,8.20,NULL,NULL,NULL,'1',NULL,81,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 19:17:36',NULL,'2025-08-10 19:51:49',NULL,NULL,NULL,'1'),(2,'8132609575384',1,1,1,'Producto 2','Views/assets/imagenes/productos/img_por_defecto.png',3.15,9.85,10.00,10.56,NULL,NULL,NULL,'1',NULL,85,NULL,NULL,12,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 19:19:49',NULL,'2025-07-30 13:30:19',NULL,NULL,NULL,'1'),(3,'4495711283430',1,1,1,'Producto 3','Views/assets/imagenes/productos/img_por_defecto.png',2.45,6.86,6.90,6.95,NULL,NULL,NULL,'0',NULL,31,NULL,NULL,2,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 19:21:31',NULL,'2025-07-30 22:38:30',NULL,NULL,NULL,'1'),(4,'5403521749369',1,1,1,'Producto 4','Views/assets/imagenes/productos/img_por_defecto.png',0.92,9.71,9.76,9.79,NULL,NULL,NULL,'0',NULL,34,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 19:24:10',NULL,'2025-07-31 20:56:19',NULL,NULL,NULL,'1'),(5,'1107061968005',1,1,1,'Producto 5','Views/assets/imagenes/productos/img_por_defecto.png',0.65,7.75,7.79,7.78,NULL,NULL,NULL,'1',NULL,24,NULL,NULL,5,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 19:26:20',NULL,'2025-08-23 12:08:22',NULL,NULL,NULL,'1'),(6,'2926458086231',1,1,1,'Producto 6','Views/assets/imagenes/productos/img_por_defecto.png',1.39,7.81,7.89,7.88,NULL,NULL,NULL,'1',NULL,52,NULL,NULL,3,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 19:28:37',NULL,'2025-07-31 20:58:08',NULL,NULL,NULL,'1'),(7,'3692938128315',1,1,1,'Producto 7','Views/assets/imagenes/productos/img_por_defecto.png',1.81,6.48,6.79,6.90,NULL,NULL,NULL,'1',NULL,44,NULL,NULL,1,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 19:30:12',NULL,'2025-08-10 18:01:54',NULL,NULL,NULL,'1'),(8,'6197173662117',1,1,1,'Producto 8','Views/assets/imagenes/productos/img_por_defecto.png',4.43,5.43,5.70,5.50,NULL,NULL,NULL,'1',NULL,114,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 19:32:03',NULL,'2025-07-31 20:50:05',NULL,NULL,NULL,'1'),(9,'3936665846387',1,1,1,'Producto 9','Views/assets/imagenes/productos/img_por_defecto.png',3.56,8.74,8.89,8.87,NULL,NULL,NULL,'1',NULL,81,NULL,NULL,6,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 19:34:25',NULL,NULL,NULL,NULL,NULL,'1'),(10,'5266353701024',1,1,1,'Producto 10','Views/assets/imagenes/productos/img_por_defecto.png',1.11,7.64,7.80,7.86,NULL,NULL,NULL,'1',NULL,123,NULL,NULL,10,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 19:35:46',NULL,'2025-07-30 13:37:47',NULL,NULL,NULL,'1'),(11,'9548887638468',1,1,1,'Producto 11','Views/assets/imagenes/productos/img_por_defecto.png',4.47,9.76,9.78,9.98,NULL,NULL,NULL,'1',NULL,79,NULL,NULL,4,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 20:09:01',NULL,'2025-07-31 21:10:44',NULL,NULL,NULL,'1'),(12,'2837419397712',1,1,1,'Producto 12','Views/assets/imagenes/productos/img_por_defecto.png',2.50,5.36,5.46,5.57,NULL,NULL,NULL,'1',NULL,0,NULL,NULL,5,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:10:11',NULL,'2025-07-31 21:11:55',NULL,NULL,NULL,'1'),(13,'6054983401054',1,1,1,'Producto 13','Views/assets/imagenes/productos/img_por_defecto.png',2.48,7.60,7.90,7.98,NULL,NULL,NULL,'1',NULL,56,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 20:11:48',NULL,'2025-07-30 22:48:48',NULL,NULL,NULL,'1'),(14,'7537128809938',1,1,1,'Producto 14','Views/assets/imagenes/productos/img_por_defecto.png',2.23,6.72,6.84,6.98,NULL,NULL,NULL,'1',NULL,63,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 20:13:20',NULL,'2025-07-31 20:52:39',NULL,NULL,NULL,'1'),(15,'8955199210909',1,1,1,'Producto 15','Views/assets/imagenes/productos/img_por_defecto.png',4.85,5.47,5.56,5.78,NULL,NULL,NULL,'0',NULL,26,NULL,NULL,7,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 20:14:31',NULL,'2025-07-31 21:02:15',NULL,NULL,NULL,'1'),(16,'1818084761325',1,1,1,'Producto 16','Views/assets/imagenes/productos/img_por_defecto.png',0.53,9.73,9.80,9.73,NULL,NULL,NULL,'1',NULL,78,NULL,NULL,30,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:16:00',NULL,'2025-07-30 22:36:58',NULL,NULL,NULL,'1'),(17,'5259543058627',1,1,1,'Producto 17','Views/assets/imagenes/productos/img_por_defecto.png',1.50,7.51,7.89,7.97,NULL,NULL,NULL,'1',NULL,71,NULL,NULL,20,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:17:15',NULL,'2025-07-31 20:59:06',NULL,NULL,NULL,'1'),(18,'2699075385654',1,1,1,'Producto 18','Views/assets/imagenes/productos/img_por_defecto.png',4.04,8.34,8.56,8.89,NULL,NULL,NULL,'1',NULL,91,NULL,NULL,43,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 20:18:34',NULL,NULL,NULL,NULL,NULL,'1'),(19,'4633160396667',1,1,1,'Producto 19','Views/assets/imagenes/productos/img_por_defecto.png',4.26,6.15,6.65,6.60,NULL,NULL,NULL,'0',NULL,81,NULL,NULL,20,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:19:43',NULL,NULL,NULL,NULL,NULL,'1'),(20,'1217317286143',1,1,1,'Producto 20','Views/assets/imagenes/productos/img_por_defecto.png',4.93,9.78,9.86,9.98,NULL,NULL,NULL,'1',NULL,71,NULL,NULL,4,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:21:24',NULL,'2025-08-10 18:01:54',NULL,NULL,NULL,'1'),(21,'8795369589559',1,1,1,'Producto 21','Views/assets/imagenes/productos/img_por_defecto.png',1.87,7.22,7.45,7.78,NULL,NULL,NULL,'1',NULL,88,NULL,NULL,2,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:22:44',NULL,'2025-07-30 13:33:14',NULL,NULL,NULL,'1'),(22,'2417534007719',1,1,1,'Producto 22','Views/assets/imagenes/productos/img_por_defecto.png',1.29,8.38,8.78,8.67,NULL,NULL,NULL,'1',NULL,29,NULL,NULL,5,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:25:20',NULL,'2025-08-23 12:08:22',NULL,NULL,NULL,'1'),(23,'1689126384227',1,1,1,'Producto 23','Views/assets/imagenes/productos/img_por_defecto.png',1.74,8.49,8.45,8.20,NULL,NULL,NULL,'1',NULL,66,NULL,NULL,3,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:28:02',NULL,'2025-07-31 20:53:54',NULL,NULL,NULL,'1'),(24,'2925873873758',1,1,1,'Producto 24','Views/assets/imagenes/productos/img_por_defecto.png',1.00,9.00,9.10,9.13,NULL,NULL,NULL,'1',NULL,120,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 20:30:26',NULL,'2025-07-30 13:37:47',NULL,NULL,NULL,'1'),(25,'6308856421409',1,1,1,'Producto 25','Views/assets/imagenes/productos/img_por_defecto.png',1.10,8.32,8.10,8.02,NULL,NULL,NULL,'1',NULL,96,NULL,NULL,10,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:32:24',NULL,'2025-07-30 22:36:58',NULL,NULL,NULL,'1'),(26,'6118736826055',1,1,1,'Producto 26','Views/assets/imagenes/productos/img_por_defecto.png',1.18,7.31,7.56,7.60,NULL,NULL,NULL,'1',NULL,23,NULL,NULL,5,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:35:25',NULL,'2025-07-30 12:40:59',NULL,NULL,NULL,'1'),(27,'1308706855412',1,1,1,'Producto 27','Views/assets/imagenes/productos/img_por_defecto.png',2.38,6.00,6.70,6.20,NULL,NULL,NULL,'1',NULL,36,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 21:17:07',NULL,'2025-07-30 12:42:57',NULL,NULL,NULL,'1'),(28,'6068526185068',1,1,1,'Producto 28','Views/assets/imagenes/productos/img_por_defecto.png',4.91,5.86,5.98,5.90,NULL,NULL,NULL,'1',NULL,5,NULL,NULL,4,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 21:18:30',NULL,'2025-07-31 20:57:12',NULL,NULL,NULL,'1'),(29,'8449598633935',1,1,1,'Producto 29','Views/assets/imagenes/productos/img_por_defecto.png',0.98,9.20,9.60,9.67,NULL,NULL,NULL,'1',NULL,96,NULL,NULL,10,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 21:19:46',1,'2025-08-10 15:20:58',NULL,NULL,NULL,'1'),(30,'9304457235099',1,1,1,'Producto 30','Views/assets/imagenes/productos/img_por_defecto.png',2.88,8.49,8.50,8.68,NULL,NULL,NULL,'1',NULL,111,NULL,NULL,20,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 21:21:11',1,'2025-08-10 13:03:31',NULL,NULL,NULL,'1'),(31,'7891234567',1,1,1,'Leche Entera','img_leche.png',1.50,2.00,1.80,1.70,NULL,NULL,NULL,'1',NULL,100,NULL,NULL,10,'1','0',NULL,NULL,NULL,NULL,1,'2025-08-22 22:03:10',NULL,NULL,NULL,NULL,NULL,'1'),(33,'7891234568',1,1,1,'Manzanas','img_manzana.png',0.80,1.20,1.00,0.90,NULL,NULL,NULL,'0',NULL,50.5,NULL,NULL,5,'1','1',NULL,NULL,NULL,NULL,1,'2025-08-22 22:04:22',NULL,NULL,NULL,NULL,NULL,'1'),(34,'7891234569',1,1,1,'Pan Integral','',2.00,2.50,2.30,2.20,NULL,NULL,NULL,'1',NULL,50,NULL,NULL,5,'1','0',NULL,NULL,NULL,NULL,1,'2025-08-22 22:07:38',NULL,NULL,NULL,NULL,NULL,'1'),(35,'7891234562',1,1,1,'Leche Entera','',1.50,2.00,1.80,1.70,NULL,NULL,NULL,'1',NULL,100,NULL,NULL,10,'1','0',NULL,NULL,NULL,NULL,1,'2025-08-22 22:08:34',NULL,NULL,NULL,NULL,NULL,'1'),(36,'7891234560',1,1,1,'Manzanas','',0.80,1.20,1.00,0.90,NULL,NULL,NULL,'0',NULL,50.5,NULL,NULL,5,'1','1',NULL,NULL,NULL,NULL,1,'2025-08-22 22:08:34',NULL,NULL,NULL,NULL,NULL,'1'),(37,'7891234561',1,1,1,'Pan Integral','',2.00,2.50,2.30,2.20,NULL,NULL,NULL,'1',NULL,50,NULL,NULL,5,'1','0',NULL,NULL,NULL,NULL,1,'2025-08-22 22:08:34',NULL,NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedor` (
  `id_proveedor` int NOT NULL AUTO_INCREMENT,
  `ruc` varchar(13) DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `razon_social` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `direccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_usuario_creacion` int DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_usuario_actualizacion` int DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_eliminacion` int DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'0999999999001','Proveedor Uno','agripa','Calle Falsa 123','0980090688','proveedoruno@gmail.com',1,'2025-07-29 21:47:30',NULL,NULL,NULL,NULL,'1'),(2,'1098765432100','Distribuidor Central','central','Av. Mayorista 45','0980079066645','destibuidiro@gmail.com',1,'2025-07-29 21:48:59',NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sri_logs`
--

DROP TABLE IF EXISTS `sri_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sri_logs` (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `id_comprobante` int DEFAULT NULL,
  `etapa` enum('GENERACION','FIRMA','ENVIO_SRI','AUTORIZACION','ENVIO_CLIENTE') DEFAULT NULL,
  `estado_envio` varchar(50) DEFAULT NULL,
  `codigo_error` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mensaje` text,
  `tipo` enum('INFO','ERROR','ADVERTENCIA') DEFAULT 'INFO',
  `origen` varchar(50) DEFAULT 'SISTEMA',
  `fecha_log` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log`),
  KEY `id_comprobante` (`id_comprobante`),
  CONSTRAINT `sri_logs_ibfk_1` FOREIGN KEY (`id_comprobante`) REFERENCES `comprobantes_electronicos` (`id_comprobante`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sri_logs`
--

LOCK TABLES `sri_logs` WRITE;
/*!40000 ALTER TABLE `sri_logs` DISABLE KEYS */;
INSERT INTO `sri_logs` VALUES (1,1,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3007202501080461081400110010010000000157592970513','INFO',NULL,'2025-08-03 17:42:45'),(2,1,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-03 17:42:45'),(3,1,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-03 17:42:48'),(4,1,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-03 17:42:59'),(5,1,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3007202501080461081400110010010000000157592970513','INFO',NULL,'2025-08-03 17:43:02'),(6,2,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3007202501080461081400110010010000000165850989911','INFO',NULL,'2025-08-03 17:47:06'),(7,2,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-03 17:47:06'),(8,2,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-03 17:47:07'),(9,2,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-03 17:47:13'),(10,2,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3007202501080461081400110010010000000165850989911','INFO',NULL,'2025-08-03 17:47:15'),(11,3,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000170589533413','INFO',NULL,'2025-08-03 18:17:29'),(12,3,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-03 18:17:29'),(13,3,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-03 18:17:30'),(14,3,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-03 18:17:40'),(15,3,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000170589533413','INFO',NULL,'2025-08-03 18:17:43'),(16,4,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000188822175618','INFO',NULL,'2025-08-03 18:26:15'),(17,4,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-03 18:26:15'),(18,4,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-03 18:26:16'),(19,4,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-03 18:26:21'),(20,4,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000188822175618','INFO',NULL,'2025-08-03 18:26:23'),(21,5,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000191276510411','INFO',NULL,'2025-08-03 18:33:21'),(22,5,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-03 18:33:21'),(23,5,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-03 18:33:24'),(24,5,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-03 18:33:29'),(25,5,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000191276510411','INFO',NULL,'2025-08-03 18:33:31'),(26,6,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000204133979411','INFO',NULL,'2025-08-03 19:12:31'),(27,6,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-03 19:12:31'),(28,6,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-03 19:12:33'),(29,6,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-03 19:12:38'),(30,6,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000204133979411','INFO',NULL,'2025-08-03 19:12:42'),(31,7,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000219314978716','INFO',NULL,'2025-08-03 19:58:37'),(32,7,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-03 19:58:37'),(33,7,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-03 19:58:40'),(34,7,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-03 19:58:45'),(35,7,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000219314978716','INFO',NULL,'2025-08-03 19:58:49'),(36,8,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000228093407513','INFO',NULL,'2025-08-03 20:08:15'),(37,8,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-03 20:08:15'),(38,8,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-03 20:08:17'),(39,8,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-03 20:08:22'),(40,8,'AUTORIZACION','NO AUTORIZADO','SRI_NO_AUTH','Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.','ERROR',NULL,'2025-08-03 20:08:23'),(41,9,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000238286177911','INFO',NULL,'2025-08-03 20:08:53'),(42,9,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-03 20:08:53'),(43,9,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-03 20:08:54'),(44,9,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-03 20:08:58'),(45,9,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000238286177911','INFO',NULL,'2025-08-03 20:09:01'),(46,10,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000241789367318','INFO',NULL,'2025-08-03 20:43:22'),(47,10,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-03 20:43:22'),(48,10,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-03 20:43:24'),(49,10,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-03 20:43:29'),(50,10,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000241789367318','INFO',NULL,'2025-08-03 20:43:31'),(51,11,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000256626923113','INFO',NULL,'2025-08-07 21:30:48'),(52,11,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-07 21:30:48'),(53,11,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-07 21:30:56'),(54,11,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-07 21:31:03'),(55,11,'AUTORIZACION','NO AUTORIZADO','SRI_NO_AUTH','Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.','ERROR',NULL,'2025-08-07 21:31:03'),(56,12,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000268845389910','INFO',NULL,'2025-08-07 21:31:15'),(57,12,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-07 21:31:15'),(58,12,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-07 21:31:16'),(59,13,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000274036146217','INFO',NULL,'2025-08-07 21:31:22'),(60,13,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-07 21:31:22'),(61,13,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-07 21:31:29'),(62,13,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-07 21:31:39'),(63,13,'AUTORIZACION','NO AUTORIZADO','SRI_NO_AUTH','Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.','ERROR',NULL,'2025-08-07 21:31:39'),(64,12,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-07 21:31:46'),(65,12,'AUTORIZACION','NO AUTORIZADO','SRI_NO_AUTH','Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.','ERROR',NULL,'2025-08-07 21:31:47'),(66,14,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000288868457213','INFO',NULL,'2025-08-07 21:33:15'),(67,14,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-07 21:33:15'),(68,14,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-07 21:33:16'),(69,15,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000290595254017','INFO',NULL,'2025-08-07 21:33:23'),(70,15,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-07 21:33:23'),(71,15,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-07 21:33:24'),(72,16,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000303661740615','INFO',NULL,'2025-08-07 21:33:50'),(73,16,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-07 21:33:50'),(74,16,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-07 21:33:50'),(75,17,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000317489576817','INFO',NULL,'2025-08-07 21:33:58'),(76,17,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-07 21:33:58'),(77,17,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-07 21:33:58'),(78,18,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000323325434711','INFO',NULL,'2025-08-07 21:34:03'),(79,18,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-07 21:34:03'),(80,18,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-07 21:34:04'),(81,19,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3007202501080461081400110010010000000332768018519','INFO',NULL,'2025-08-07 21:34:09'),(82,19,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-07 21:34:09'),(83,19,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-07 21:34:09'),(84,20,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000345352581817','INFO',NULL,'2025-08-07 21:34:14'),(85,20,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-07 21:34:14'),(86,20,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-07 21:34:14'),(87,21,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3107202501080461081400110010010000000350263764618','INFO',NULL,'2025-08-07 21:34:20'),(88,21,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-07 21:34:20'),(89,21,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-07 21:34:21'),(90,22,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3007202501080461081400110010010000000366939547916','INFO',NULL,'2025-08-07 21:34:27'),(91,22,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-07 21:34:27'),(92,22,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-07 21:34:28'),(93,22,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-07 21:34:33'),(94,22,'AUTORIZACION','NO AUTORIZADO','SRI_NO_AUTH','Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.','ERROR',NULL,'2025-08-07 21:34:33'),(95,23,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 1008202501080461081400110010010000000373345289815','INFO',NULL,'2025-08-10 19:29:54'),(96,23,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-10 19:29:54'),(97,23,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-10 19:29:56'),(98,23,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-10 19:30:01'),(99,23,'AUTORIZACION','NO AUTORIZADO','SRI_NO_AUTH','Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.','ERROR',NULL,'2025-08-10 19:30:01'),(100,24,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3007202501080461081400110010010000000383341824011','INFO',NULL,'2025-08-10 19:35:20'),(101,24,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-10 19:35:20'),(102,24,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-10 19:35:21'),(103,24,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-10 19:35:29'),(104,24,'AUTORIZACION','NO AUTORIZADO','SRI_NO_AUTH','Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.','ERROR',NULL,'2025-08-10 19:35:29'),(105,25,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 3007202501080461081400110010010000000395996323811','INFO',NULL,'2025-08-10 19:50:55'),(106,25,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-10 19:50:55'),(107,26,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 1008202501080461081400110010010000000399019925417','INFO',NULL,'2025-08-10 19:52:02'),(108,26,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-10 19:52:02'),(109,26,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-10 19:52:10'),(110,26,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-10 19:52:15'),(111,26,'AUTORIZACION','NO AUTORIZADO','SRI_NO_AUTH','Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.','ERROR',NULL,'2025-08-10 19:52:15'),(112,26,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-10 19:53:14'),(113,26,'AUTORIZACION','NO AUTORIZADO','SRI_NO_AUTH','Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.','ERROR',NULL,'2025-08-10 19:53:15'),(114,27,'GENERACION','EXITOSO',NULL,'Factura XML generada y firmada. Clave de Acceso: 1008202501080461081400110010010000000409074576613','INFO',NULL,'2025-08-10 20:04:42'),(115,27,'ENVIO_SRI','INTENTO_ENVIO',NULL,'Intentando enviar XML al SRI.','INFO',NULL,'2025-08-10 20:04:53'),(116,27,'ENVIO_SRI','RECIBIDA',NULL,'Factura RECIBIDA por el SRI.','INFO',NULL,'2025-08-10 20:05:25'),(117,27,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-10 20:06:51'),(118,27,'AUTORIZACION','NO AUTORIZADO','SRI_NO_AUTH','Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.','ERROR',NULL,'2025-08-10 20:07:01'),(119,27,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-10 20:09:18'),(120,27,'AUTORIZACION','NO AUTORIZADO','SRI_NO_AUTH','Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.','ERROR',NULL,'2025-08-10 20:11:11'),(121,27,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-10 20:12:19'),(122,27,'AUTORIZACION','NO AUTORIZADO','SRI_NO_AUTH','Factura NO AUTORIZADA por el SRI. Estado: NO AUTORIZADO\nNo se encontraron detalles adicionales de la no autorización.','ERROR',NULL,'2025-08-10 22:03:17'),(123,1,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-23 09:13:09'),(124,1,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3007202501080461081400110010010000000157592970513','INFO',NULL,'2025-08-23 09:13:11'),(125,3,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-23 09:21:02'),(126,3,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000170589533413','INFO',NULL,'2025-08-23 09:21:02'),(127,3,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-23 09:57:39'),(128,3,'AUTORIZACION','ERROR_PDF_BARCODE','PDF_BARCODE_GEN_ERR','Error al generar PDF o código de barras: null','ERROR',NULL,'2025-08-23 09:57:40'),(129,3,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000170589533413','INFO',NULL,'2025-08-23 09:57:40'),(130,3,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-23 11:30:36'),(131,3,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000170589533413','INFO',NULL,'2025-08-23 11:30:40'),(132,3,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-23 11:35:01'),(133,3,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000170589533413','INFO',NULL,'2025-08-23 11:35:03'),(134,3,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-23 11:47:27'),(135,3,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000170589533413','INFO',NULL,'2025-08-23 11:47:31'),(136,3,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-23 11:52:30'),(137,3,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000170589533413','INFO',NULL,'2025-08-23 11:52:33'),(138,3,'AUTORIZACION','INICIADO',NULL,'Iniciando consulta de autorización al SRI.','INFO',NULL,'2025-08-23 17:57:02'),(139,3,'AUTORIZACION','AUTORIZADO',NULL,'Factura AUTORIZADA por el SRI. Número de autorización: 3107202501080461081400110010010000000170589533413','INFO',NULL,'2025-08-23 17:57:07');
/*!40000 ALTER TABLE `sri_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_comprobante`
--

DROP TABLE IF EXISTS `tipo_comprobante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_comprobante` (
  `codigo_sri` varchar(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_sri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_comprobante`
--

LOCK TABLES `tipo_comprobante` WRITE;
/*!40000 ALTER TABLE `tipo_comprobante` DISABLE KEYS */;
INSERT INTO `tipo_comprobante` VALUES ('01','FACTURA'),('03','TICKET'),('04','NOTA_CREDITO'),('05','NOTA_DEBITO'),('06','GUIA_REMISION'),('07','RETENCION');
/*!40000 ALTER TABLE `tipo_comprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_emision`
--

DROP TABLE IF EXISTS `tipo_emision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_emision` (
  `id_tipo_emision` tinyint NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_emision`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_emision`
--

LOCK TABLES `tipo_emision` WRITE;
/*!40000 ALTER TABLE `tipo_emision` DISABLE KEYS */;
INSERT INTO `tipo_emision` VALUES (2,'CONTINGENCIA'),(1,'NORMAL');
/*!40000 ALTER TABLE `tipo_emision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_identificacion`
--

DROP TABLE IF EXISTS `tipo_identificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_identificacion` (
  `codigo` char(2) NOT NULL,
  `tipo_identificacion` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_identificacion`
--

LOCK TABLES `tipo_identificacion` WRITE;
/*!40000 ALTER TABLE `tipo_identificacion` DISABLE KEYS */;
INSERT INTO `tipo_identificacion` VALUES ('04','RUC'),('05','CÉDULA'),('06','PASAPORTE'),('07','VENTA A CONSUMIDOR FINAL'),('08','IDENTIFICACIÓN DEL EXTERIOR');
/*!40000 ALTER TABLE `tipo_identificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turnos`
--

DROP TABLE IF EXISTS `turnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `turnos` (
  `id_turno` int NOT NULL AUTO_INCREMENT,
  `nombre` enum('Mañana','Tarde','Noche') NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  PRIMARY KEY (`id_turno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turnos`
--

LOCK TABLES `turnos` WRITE;
/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `turnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_turno`
--

DROP TABLE IF EXISTS `usuario_turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario_turno` (
  `id_usuario_turno` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_turno` int NOT NULL,
  PRIMARY KEY (`id_usuario_turno`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_turno` (`id_turno`),
  CONSTRAINT `usuario_turno_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `usuario_turno_ibfk_2` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_turno`
--

LOCK TABLES `usuario_turno` WRITE;
/*!40000 ALTER TABLE `usuario_turno` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_turno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `cedula` varchar(45) DEFAULT NULL,
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `apellido_usuario` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `clave` text,
  `id_perfil_usuario` int DEFAULT NULL,
  `id_caja` int NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `landmarks` varchar(200) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  `img` varchar(600) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarios_id_caja` (`id_caja`),
  CONSTRAINT `fk_usuarios_id_caja` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id_caja`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'080214555','Edison Gabriel','Garofalo Bustamante','Susan','123456',2,1,NULL,NULL,NULL,NULL,'2025-04-28 17:04:42','2025-08-23 14:34:28',NULL,'1','Views/assets/imagenes/imgUsuario/logo_684cf64563f39.PNG',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `IdVenta` int NOT NULL AUTO_INCREMENT,
  `IdTienda` int DEFAULT '1',
  `Id_caja` int DEFAULT NULL,
  `IdCliente` int DEFAULT NULL,
  `serie` varchar(45) DEFAULT NULL,
  `nro_boleta` varchar(25) DEFAULT NULL,
  `tipo_pago` enum('EFECTIVO','CREDITO','TARJETA') NOT NULL,
  `TipoDocumento` varchar(5) NOT NULL,
  `descripcion` text,
  `CantidadProducto` decimal(10,2) DEFAULT NULL,
  `CantidadTotal` decimal(10,2) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `total_venta` decimal(10,2) DEFAULT NULL,
  `ImporteRecibido` decimal(10,2) DEFAULT NULL,
  `ImporteCambio` decimal(10,2) DEFAULT NULL,
  `abono_credito` decimal(10,2) DEFAULT NULL,
  `id_usuario_creacion` int DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_usuario_actualizacion` int DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_anulacion` int DEFAULT NULL,
  `fecha_anulacion` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  `clave_acceso` varchar(50) DEFAULT NULL,
  `estado_factura` varchar(20) DEFAULT NULL,
  `fecha_autorizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`IdVenta`),
  KEY `fk_venta_cabecera_IdUsuario` (`id_usuario_creacion`),
  KEY `fk_venta_cabecera_IdCliente` (`IdCliente`),
  KEY `fk_ventas_tipo_documento` (`TipoDocumento`),
  CONSTRAINT `fk_venta_cabecera_IdCliente` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `fk_venta_cabecera_IdUsuario` FOREIGN KEY (`id_usuario_creacion`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `fk_ventas_tipo_documento` FOREIGN KEY (`TipoDocumento`) REFERENCES `tipo_comprobante` (`codigo_sri`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,1,1,1,NULL,'00000055','EFECTIVO','03',NULL,NULL,1.00,0.00,16.41,16.41,20.00,3.59,0.00,1,'2025-07-30 22:23:37',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(2,1,1,3,NULL,'00000056','EFECTIVO','03',NULL,NULL,1.00,3.38,22.54,25.92,30.00,4.08,0.00,1,'2025-07-30 22:25:02',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(3,1,1,1,NULL,'00000057','CREDITO','03',NULL,NULL,1.00,19.59,130.61,150.20,1.00,149.20,1.00,1,'2025-07-30 22:27:35',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(4,1,1,2,NULL,'00000058','CREDITO','03',NULL,NULL,1.00,12.68,84.52,97.20,0.00,97.20,0.00,1,'2025-07-30 22:30:05',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(5,1,1,3,NULL,'00000059','EFECTIVO','03',NULL,NULL,1.00,13.29,88.59,101.88,105.00,3.12,0.00,1,'2025-07-30 22:33:35',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(6,1,1,2,NULL,'00000060','CREDITO','03',NULL,NULL,3.00,27.70,340.03,367.73,0.00,367.73,0.00,1,'2025-07-30 22:36:58',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(7,1,1,2,NULL,'00000061','EFECTIVO','03',NULL,NULL,1.00,0.00,68.60,68.60,70.00,1.40,0.00,1,'2025-07-30 22:38:30',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(8,1,1,1,NULL,'00000062','CREDITO','03',NULL,NULL,1.00,20.40,136.00,156.40,1.00,155.40,1.00,1,'2025-07-30 22:40:07',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(9,1,1,2,NULL,'00000063','CREDITO','03',NULL,NULL,1.00,8.92,59.48,68.40,0.00,68.40,0.00,1,'2025-07-30 22:48:48',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(10,1,1,1,NULL,'00000064','CREDITO','03',NULL,NULL,1.00,0.71,4.72,5.43,0.00,5.43,0.00,1,'2025-07-31 20:50:05',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(11,1,1,3,NULL,'00000065','CREDITO','03',NULL,NULL,1.00,16.80,112.00,128.80,0.00,128.80,0.00,1,'2025-07-31 20:51:33',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(12,1,1,1,NULL,'00000066','CREDITO','03',NULL,NULL,1.00,1.75,11.69,13.44,0.00,13.44,0.00,1,'2025-07-31 20:52:39',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(13,1,1,3,NULL,'00000067','CREDITO','03',NULL,NULL,1.00,14.40,95.97,110.37,0.00,110.37,0.00,1,'2025-07-31 20:53:54',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(14,1,1,1,NULL,'00000068','EFECTIVO','03',NULL,NULL,1.00,12.68,84.52,97.20,100.00,2.80,0.00,1,'2025-07-31 20:54:39',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(15,1,1,2,NULL,'00000069','EFECTIVO','03',NULL,NULL,1.00,0.00,87.39,87.39,90.00,2.61,0.00,1,'2025-07-31 20:56:19',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(16,1,1,3,NULL,'00000070','EFECTIVO','03',NULL,NULL,1.00,12.23,81.53,93.76,95.00,1.24,0.00,1,'2025-07-31 20:57:12',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(17,1,1,2,NULL,'00000071','CREDITO','03',NULL,NULL,1.00,14.26,95.08,109.34,0.00,109.34,0.00,1,'2025-07-31 20:58:08',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(18,1,1,3,NULL,'00000072','EFECTIVO','03',NULL,NULL,1.00,5.88,39.18,45.06,50.00,4.94,0.00,1,'2025-07-31 20:59:06',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(19,1,1,1,NULL,'00000073','EFECTIVO','03',NULL,NULL,2.00,10.18,100.72,110.90,115.00,4.10,0.00,1,'2025-07-31 21:02:15',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(20,1,1,2,NULL,'00000074','CREDITO','03',NULL,NULL,1.00,3.50,23.30,26.80,0.00,26.80,0.00,1,'2025-07-31 21:09:38',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(21,1,1,1,NULL,'00000075','CREDITO','03',NULL,NULL,1.00,5.09,33.95,39.04,2.00,37.04,2.00,1,'2025-07-31 21:10:44',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(22,1,1,2,NULL,'00000076','EFECTIVO','03',NULL,NULL,1.00,9.79,65.25,75.04,80.00,4.96,0.00,1,'2025-07-31 21:11:55',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(23,1,1,2,NULL,'00000077','EFECTIVO','03',NULL,NULL,2.00,51.32,342.10,393.42,400.00,6.58,0.00,1,'2025-08-10 17:19:40',NULL,'2025-08-10 17:36:06',NULL,NULL,'0',NULL,NULL,NULL),(24,1,1,1,NULL,'00000078','CREDITO','03',NULL,NULL,2.00,51.32,342.10,393.42,0.00,393.42,0.00,1,'2025-08-10 17:59:01',NULL,'2025-08-10 18:01:54',NULL,NULL,'0',NULL,NULL,NULL),(25,1,1,1,NULL,'00000079','EFECTIVO','03',NULL,NULL,2.00,2.10,14.03,16.13,20.00,3.87,0.00,1,'2025-08-10 19:28:38',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(26,1,1,1,NULL,'00000080','EFECTIVO','03',NULL,NULL,2.00,2.16,14.40,16.56,20.00,3.44,0.00,1,'2025-08-10 19:51:49',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL),(27,1,1,1,NULL,'00000081','EFECTIVO','03',NULL,NULL,2.00,4.21,28.05,32.26,50.00,17.74,0.00,1,'2025-08-23 12:08:22',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_credito`
--

DROP TABLE IF EXISTS `ventas_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_credito` (
  `id_venta_credito` int NOT NULL AUTO_INCREMENT,
  `id_venta` int DEFAULT NULL,
  `id_cliente` int DEFAULT NULL,
  `nroCreditoVentas` varchar(15) DEFAULT NULL,
  `monto_total` decimal(10,2) DEFAULT NULL,
  `monto_abonado` decimal(10,2) DEFAULT NULL,
  `saldo_pendiente` decimal(10,2) DEFAULT NULL,
  `fecha_venta` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_vencimiento` date DEFAULT NULL,
  `estado` enum('Pendiente','Pagado','Vencido','Otros','Inactivo','Eliminado') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Pendiente',
  PRIMARY KEY (`id_venta_credito`),
  KEY `id_venta` (`id_venta`),
  CONSTRAINT `ventas_credito_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`IdVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_credito`
--

LOCK TABLES `ventas_credito` WRITE;
/*!40000 ALTER TABLE `ventas_credito` DISABLE KEYS */;
INSERT INTO `ventas_credito` VALUES (1,3,1,'00000011',150.20,4.00,146.20,'2025-07-30 22:27:35','2026-02-28','Pendiente'),(2,4,2,'00000012',97.20,7.00,90.20,'2025-07-30 22:30:05','2025-12-27','Pendiente'),(3,6,2,'00000013',367.73,1.00,366.73,'2025-07-30 22:36:58','2025-11-23','Pendiente'),(4,8,1,'00000014',156.40,1.00,155.40,'2025-07-30 22:40:07','2025-11-28','Pendiente'),(5,9,2,'00000015',68.40,0.00,68.40,'2025-07-30 22:48:48','2025-12-20','Pendiente'),(6,10,1,'00000016',5.43,0.00,5.43,'2025-07-31 20:50:05','2026-01-24','Pendiente'),(7,11,3,'00000017',128.80,0.00,128.80,'2025-07-31 20:51:33','2025-11-02','Pendiente'),(8,12,1,'00000018',13.44,0.00,13.44,'2025-07-31 20:52:39','2025-10-31','Pendiente'),(9,13,3,'00000019',110.37,0.00,110.37,'2025-07-31 20:53:54','2025-09-21','Pendiente'),(10,17,2,'00000020',109.34,0.00,109.34,'2025-07-31 20:58:08','2026-01-03','Pendiente'),(11,20,2,'00000021',26.80,0.00,26.80,'2025-07-31 21:09:38','2026-01-23','Pendiente'),(12,21,1,'00000022',39.04,2.00,37.04,'2025-07-31 21:10:44','2025-10-25','Pendiente'),(13,24,1,'00000023',393.42,0.00,393.42,'2025-08-10 17:59:01','2026-02-21','Pendiente');
/*!40000 ALTER TABLE `ventas_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db2025v2'
--

--
-- Dumping routines for database 'db2025v2'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_iniciar_seccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_iniciar_seccion`(in p_usuario varchar(20), in p_password varchar(20), in p_ip varchar(20),in p_opcion char(1))
begin
	

declare J_id_usuario int;
declare J_fecha datetime;

set J_fecha = (select now());
if (p_opcion=1) then

 set J_id_usuario=( select u.id_usuario
                                                from usuarios u 
                                                inner join perfiles p
                                                on u.id_perfil_usuario = p.id_perfil
                                                inner join perfil_modulo pm
                                                on pm.id_perfil = u.id_perfil_usuario
                                                inner join modulos m
                                                on m.id = pm.id_modulo
                                                where u.usuario = p_usuario
                                                and u.clave = p_password
                                                and vista_inicio = 1);
                                                
                                                
select * from licencia_alquirida li_ar inner join licencia li on
li_ar.id_licencia=li.id_licencia and li_ar.estado=1 
where  li_ar.direccion_mac=p_ip  and li_ar.id_usuario= J_id_usuario and li_ar.fecha_vigente >= J_fecha;


elseif(p_opcion=2) then
select * 
                                                from usuarios u 
                                                inner join perfiles p
                                                on u.id_perfil_usuario = p.id_perfil
                                                inner join perfil_modulo pm
                                                on pm.id_perfil = u.id_perfil_usuario
                                                inner join modulos m
                                                on m.id = pm.id_modulo
                                                where u.usuario = p_usuario
                                                and u.clave = p_password
                                                and vista_inicio = 1;
                                                
                                                end if;	
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_reporte_ventas_comparativo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_reporte_ventas_comparativo`()
BEGIN
    WITH RECURSIVE dias AS (
        -- Primer día del mes actual
        SELECT DATE_ADD(LAST_DAY(CURRENT_DATE - INTERVAL 1 MONTH), INTERVAL 1 DAY) AS fecha_dia
        UNION ALL
        -- Se van sumando días hasta el último día con ventas en el mes actual
        SELECT DATE_ADD(fecha_dia, INTERVAL 1 DAY)
        FROM dias
        WHERE fecha_dia < (
            SELECT COALESCE(MAX(DATE(fecha_registro)), CURRENT_DATE)
            FROM ventas
            WHERE estado = '1'
              AND MONTH(fecha_registro) = MONTH(CURRENT_DATE)
              AND YEAR(fecha_registro) = YEAR(CURRENT_DATE)
        )
    )
    SELECT 
        d.fecha_dia AS fecha_venta,
        COALESCE(v.total_venta, 0) AS total_venta,
        COALESCE(v_ant.total_venta, 0) AS total_venta_ant
    FROM dias d
    LEFT JOIN (
        SELECT DATE(fecha_registro) AS fecha_dia,
               SUM(ROUND(total_venta, 2)) AS total_venta
        FROM ventas
        WHERE estado = '1'
          AND MONTH(fecha_registro) = MONTH(CURRENT_DATE)
          AND YEAR(fecha_registro) = YEAR(CURRENT_DATE)
        GROUP BY DATE(fecha_registro)
    ) v ON v.fecha_dia = d.fecha_dia
    LEFT JOIN (
        SELECT DATE(fecha_registro) AS fecha_dia,
               SUM(ROUND(total_venta, 2)) AS total_venta
        FROM ventas
        WHERE estado = '1'
          AND MONTH(fecha_registro) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
          AND YEAR(fecha_registro) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
        GROUP BY DATE(fecha_registro)
    ) v_ant ON v_ant.fecha_dia = DATE_SUB(d.fecha_dia, INTERVAL 1 MONTH)
    ORDER BY fecha_venta;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_validar_licencia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_validar_licencia`(in p_usuario varchar(20), in p_password text, in p_ip varchar(30) , in p_opcion char(1))
BEGIN

declare J_id_usuario int;
declare J_fecha datetime;

set J_fecha = (select now());
if (p_opcion=1) then
 set J_id_usuario=( select u.id_usuario
                                                from usuarios u 
                                                inner join perfiles p
                                                on u.id_perfil_usuario = p.id_perfil
                                                inner join perfil_modulo pm
                                                on pm.id_perfil = u.id_perfil_usuario
                                                inner join modulos m
                                                on m.id = pm.id_modulo
                                                where u.usuario = p_usuario
                                                and u.clave = p_password
                                                and vista_inicio = 1);
                                                
                                                
select * from licencia_alquirida li_ar inner join licencia li on
li_ar.id_licencia=li.id_licencia and li_ar.estado=1 
where  li_ar.direccion_mac=p_ip  and li_ar.id_usuario= J_id_usuario and li_ar.fecha_vigente >= J_fecha;

elseif(p_opcion=2) then

select * 
                                                from usuarios u 
                                                inner join perfiles p
                                                on u.id_perfil_usuario = p.id_perfil
                                                inner join perfil_modulo pm
                                                on pm.id_perfil = u.id_perfil_usuario
                                                inner join modulos m
                                                on m.id = pm.id_modulo
                                                where u.usuario = p_usuario
                                                and u.clave = p_password
                                                and vista_inicio = 1;
                                                
                                                end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ups_AbrirCaja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ups_AbrirCaja`(

    IN p_IdUsuario INT,

    IN p_IdCaja INT,
    IN p_montoInicial DECIMAL(10,2),
    in p_observacion TEXT 
)
BEGIN

     DECLARE v_id_arqueo INT;
    DECLARE v_fecha_registro DATETIME DEFAULT NOW();
    DECLARE mensaje VARCHAR(255);
    DECLARE caja_abierta_por_usuario BOOLEAN DEFAULT FALSE;
    DECLARE caja_ya_abierta BOOLEAN DEFAULT FALSE;

    -- Paso 1: Validar si el usuario ya tiene una caja abierta
    -- Buscamos si existe algún registro de arqueo_caja para este usuario
    -- donde la fecha_fin es NULL (indicando que la caja está abierta).
    SELECT EXISTS (
        SELECT 1
        FROM arqueo_caja
        WHERE id_usuario = p_IdUsuario AND fecha_fin IS NULL
    ) INTO caja_abierta_por_usuario;

    IF caja_abierta_por_usuario THEN
        -- Si el usuario ya tiene una caja abierta, retornamos un mensaje de error.
        SET mensaje = 'Error: El usuario ya tiene una caja abierta. Por favor, cierre la caja actual antes de intentar abrir una nueva.';
        SELECT mensaje AS resultado;
    ELSE
        -- Paso 2: Si el usuario no tiene una caja abierta, validamos si la caja seleccionada ya está abierta por cualquier usuario.
        -- Buscamos si existe algún registro de arqueo_caja para esta caja
        -- donde la fecha_fin es NULL (indicando que la caja está abierta).
        SELECT EXISTS (
            SELECT 1
            FROM arqueo_caja
            WHERE id_caja = p_IdCaja AND fecha_fin IS NULL
        ) INTO caja_ya_abierta;

        IF caja_ya_abierta THEN
            -- Si la caja ya está abierta por otro usuario, retornamos un mensaje de error.
            SET mensaje = 'Error: La caja seleccionada ya se encuentra abierta por otro usuario. Por favor, seleccione otra caja o espere a que la caja actual sea cerrada.';
            SELECT mensaje AS resultado;
        ELSE
            -- Paso 3: Si ambas validaciones pasan, proceder con la apertura de caja.
            -- Insertar el nuevo registro en la tabla arqueo_caja.
            INSERT INTO arqueo_caja(id_caja,
                                    id_usuario,
                                    monto_inicial,
                                    ObservacionApertura,
                                    fecha_inicio
                                   )
            VALUES (p_IdCaja,
                    p_IdUsuario,
                    p_montoInicial,
                    p_observacion,
                    v_fecha_registro
                   );

            -- Obtener el ID del último registro insertado para los movimientos.
            SET v_id_arqueo = LAST_INSERT_ID();

            -- Insertar movimientos iniciales (Ingreso y Gasto) asociados a este arqueo.
            -- Estos son movimientos predeterminados al abrir la caja.
            INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
            VALUES (v_id_arqueo, 'Ingreso', 'Ingreso', p_IdUsuario);

            INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
            VALUES (v_id_arqueo, 'Egreso', 'Gasto', p_IdUsuario);
            
            INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
             VALUES (v_id_arqueo, 'Devolucion', 'Devolucion', p_IdUsuario);
 
            -- Si todo fue exitoso, establecer el mensaje de éxito.
            SET mensaje = 'Caja abierta con éxito.';
            SELECT mensaje AS resultado;
        END IF;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ups_EliminarAbonoCreditoCompras` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ups_EliminarAbonoCreditoCompras`(
IN p_idUsuario INT,
IN p_idAbono INT

)
proc_fin: BEGIN
    DECLARE mensaje VARCHAR(255);
    DECLARE vTotalAbono DECIMAL(10,2);
    DECLARE vIdCompraCredito INT;
    DECLARE vExiste INT;

    -- Verificamos si el abono existe y está activo
    SELECT COUNT(*)
      INTO vExiste
    FROM abonos_compra_credito
    WHERE id_abono = p_idAbono AND estado = 1;

    IF vExiste = 0 THEN
        SET mensaje = 'Abono no encontrado o ya eliminado';
        SELECT mensaje AS resultado;
        LEAVE proc_fin; -- ahora sí sale del bloque
    END IF;

    -- Obtenemos el monto del abono y la compra relacionada
    SELECT monto_abonado, id_compra_credito
      INTO vTotalAbono, vIdCompraCredito
    FROM abonos_compra_credito
    WHERE id_abono = p_idAbono;

    START TRANSACTION;

    -- Marcamos como inactivo el gasto asociado
    UPDATE detalle_gastos
       SET estado = 0
    WHERE id_abono = p_idAbono;

    -- Marcamos como inactivo el abono
    UPDATE abonos_compra_credito
       SET estado = 0
    WHERE id_abono = p_idAbono;

    -- Ajustamos los montos del crédito
    UPDATE compras_credito
       SET monto_abonado = monto_abonado - vTotalAbono,
           saldo_pendiente = saldo_pendiente + vTotalAbono
    WHERE id_compra_credito = vIdCompraCredito;

    COMMIT;

    SET mensaje = 'El abono de crédito se eliminó con éxito.';
    SELECT mensaje AS resultado;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ups_EliminarAbonoCreditoVenta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ups_EliminarAbonoCreditoVenta`(
IN p_idUsuario INT,
IN p_idAbono INT

)
proc_fin: BEGIN
    DECLARE mensaje VARCHAR(255);
    DECLARE vTotalAbono DECIMAL(10,2);
    DECLARE vIdVentasCredito INT;
    DECLARE vExiste INT;

    -- Verificamos si el abono existe y está activo
    SELECT COUNT(*)
      INTO vExiste
    FROM abonos_credito
    WHERE id_abono = p_idAbono AND estado = 1;

    IF vExiste = 0 THEN
        SET mensaje = 'Abono no encontrado o ya eliminado';
        SELECT mensaje AS resultado;
        LEAVE proc_fin; -- ahora sí sale del bloque
    END IF;

    -- Obtenemos el monto del abono y la compra relacionada
    SELECT monto_abonado, id_venta_credito
      INTO vTotalAbono, vIdVentasCredito
    FROM abonos_credito
    WHERE id_abono = p_idAbono;

    START TRANSACTION;

    -- Marcamos como inactivo el gasto asociado
    UPDATE detalle_ingresos
       SET estado = 0
    WHERE id_abono = p_idAbono;

    -- Marcamos como inactivo el abono
    UPDATE abonos_credito
       SET estado = 0
    WHERE id_abono = p_idAbono;

    -- Ajustamos los montos del crédito
    UPDATE ventas_credito 
       SET monto_abonado = monto_abonado - vTotalAbono,
           saldo_pendiente = saldo_pendiente + vTotalAbono
    WHERE id_venta_credito = vIdVentasCredito;

    COMMIT;

    SET mensaje = 'El abono de crédito se eliminó con éxito.';
    SELECT mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ups_ListarHistorialAbonoCreditoCliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ups_ListarHistorialAbonoCreditoCliente`(

IN p_id_credito  INT)
BEGIN

 IF p_id_credito IS NOT NULL THEN

	SELECT ac.id_abono AS id_abono,

                 ac.fecha_abono AS fecha_abono,

                 ac.monto_abonado AS monto_abono,

                 ac.metodo_pago  AS forma_pago,

                 ac.observacion AS comentario_referencia

                 FROM  abonos_credito ac 

          WHERE ac.id_venta_credito=p_id_credito AND ac.estado=1;

     ELSE

        SELECT 'ID de crédito no válido' AS mensaje_error;

    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ups_ListarHistorialAbonoCreditoCompras` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ups_ListarHistorialAbonoCreditoCompras`(IN p_id_credito  INT)
BEGIN



  IF p_id_credito IS NOT NULL THEN

        SELECT 

            acc.id_abono AS id_abono,

            acc.fecha_abono AS fecha_abono,

            acc.monto_abonado AS monto_abono,

            acc.metodo_pago as forma_pago,

            acc.observacion AS comentario_referencia

        FROM abonos_compra_credito acc 

        WHERE acc.id_compra_credito = p_id_credito

          AND acc.estado = 1;

    ELSE

        SELECT 'ID de crédito no válido' AS mensaje_error;

    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ajustar_stock_disminuir` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ajustar_stock_disminuir`(
        IN p_id_producto INT,
    IN p_codigo_producto VARCHAR(20),
    IN p_observacion TEXT,
    IN p_nuevo_stock INT,
    IN p_cantidad INT,
    IN p_precio_compra DECIMAL(10,2),
    IN p_tipo_ajuste VARCHAR(50), -- ('PERDIDA', 'DEVOLUCION', 'CAMBIO')
    IN p_fecha_vencimiento DATE,   -- puede ser NULL para productos no perecibles
    IN p_Nuevafecha_vencimiento DATE,
    IN p_precioCosto DECIMAL(10,2),
    IN p_id_usuario INT
)
main_block: BEGIN
    -- Declaración de variables
    DECLARE v_total_disponible INT DEFAULT 0;
    DECLARE v_resto INT DEFAULT p_cantidad;
    DECLARE done INT DEFAULT FALSE;

    DECLARE v_id_lote INT;
    DECLARE v_stock INT;

    DECLARE v_unidades_ex FLOAT;
    DECLARE v_costo_unitario_ex FLOAT;
    DECLARE v_costo_total_ex FLOAT;

    DECLARE v_unidades_salida FLOAT;
    DECLARE v_costo_unitario_salida FLOAT;
    DECLARE v_costo_total_salida FLOAT;

    DECLARE v_costo_final DECIMAL(10,2);
    DECLARE v_count_fecha INT;
    -- Variables para el asiento contable
    DECLARE v_id_asiento INT;

    -- Cursor para recorrer lotes FIFO (MOVIDO AQUÍ)
    DECLARE cur_lotes CURSOR FOR
        SELECT id_lote, stock_disponible
        FROM lote_producto
        WHERE id_producto = p_id_producto
          AND (p_precio_compra IS NULL OR costo_unitario = p_precio_compra)
          AND (p_fecha_vencimiento IS NULL OR fecha_vencimiento = p_fecha_vencimiento)
          AND estado = 1
          AND stock_disponible > 0
        ORDER BY id_lote;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE; -- MOVIDO AQUÍ

    -- Declarar un handler para errores SQL que realizará un ROLLBACK
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Si ocurre un error, revertir todos los cambios
        ROLLBACK;
        -- Mensaje de error para el usuario
        SELECT 'Error: Se ha producido un error inesperado. Los cambios han sido revertidos.' AS resultado;
    END;

    -- Iniciar la transacción
    START TRANSACTION;

    -- Eliminar espacios al inicio y fin de los parámetros de texto
    SET p_codigo_producto = LTRIM(RTRIM(p_codigo_producto));
    SET p_observacion = LTRIM(RTRIM(p_observacion));
    SET p_tipo_ajuste = LTRIM(RTRIM(p_tipo_ajuste));

    -- Validar stock disponible
    SELECT SUM(stock_disponible) INTO v_total_disponible
    FROM lote_producto
    WHERE id_producto = p_id_producto
       AND (p_precio_compra IS NULL OR costo_unitario = p_precio_compra)
       AND (p_fecha_vencimiento IS NULL OR fecha_vencimiento = p_fecha_vencimiento)
       AND estado = 1
       AND stock_disponible > 0;

    -- Si el stock es insuficiente, mostrar advertencia y salir sin realizar cambios
    IF v_total_disponible IS NULL OR v_total_disponible < p_cantidad THEN
      --  SELECT CONCAT('Warning: Stock insuficiente en lotes disponibles. Stock actual: ',
      --                IFNULL(v_total_disponible, 0)) AS resultado;
      IF p_fecha_vencimiento IS NULL THEN
        -- Producto no perecible (no tiene fecha)
        SELECT CONCAT(
            'Warning: Stock insuficiente para el producto ', p_codigo_producto,
            ', con precio compra ', IFNULL(p_precio_compra, 'Cualquiera'),
            '. Stock actual: ', IFNULL(v_total_disponible, 0)
        ) AS resultado;
    ELSE
        -- Producto perecible (con fecha de vencimiento)
        SELECT CONCAT(
            'Warning: Stock insuficiente para el producto ', p_codigo_producto,
            ', con precio compra ', IFNULL(p_precio_compra, 'Cualquiera'),
            ', fecha vencimiento ', DATE_FORMAT(p_fecha_vencimiento, '%Y-%m-%d'),
            '. Stock actual: ', IFNULL(v_total_disponible, 0)
        ) AS resultado;
    END IF;
        ROLLBACK; -- Revertir si hay un problema de stock inicial
        LEAVE main_block;
    END IF;

    -- Procesar lotes (FIFO)
    OPEN cur_lotes;
    read_loop: LOOP
        FETCH cur_lotes INTO v_id_lote, v_stock;
        IF done THEN
            LEAVE read_loop;
        END IF;

        IF v_resto <= 0 THEN
            LEAVE read_loop;
        END IF;

        IF v_resto >= v_stock THEN
            -- Usar todo el lote
            UPDATE lote_producto
            SET stock_disponible = 0, estado = 2,
                id_usuario_actualizacion = p_id_usuario
            WHERE id_lote = v_id_lote;

            INSERT INTO ajuste_lote (id_usuario, id_lote, cantidad, motivo, observacion)
            VALUES (p_id_usuario, v_id_lote, v_stock, p_tipo_ajuste, p_observacion);

            SET v_resto = v_resto - v_stock;
        ELSE
            -- Usar parte del lote
            UPDATE lote_producto
            SET stock_disponible = stock_disponible - v_resto,
                id_usuario_actualizacion = p_id_usuario
            WHERE id_lote = v_id_lote;

            UPDATE lote_producto
            SET estado = 2
            WHERE id_lote = v_id_lote AND stock_disponible = 0;

            INSERT INTO ajuste_lote (id_usuario, id_lote, cantidad, motivo, observacion)
            VALUES (p_id_usuario, v_id_lote, v_resto, p_tipo_ajuste, p_observacion);

            SET v_resto = 0;
        END IF;
    END LOOP;
    CLOSE cur_lotes;

    -- Determinar costo de salida y actualizar stock de producto
    IF p_tipo_ajuste = 'PERDIDA' THEN
        SET v_costo_final = p_precioCosto;
        -- Actualizar stock en producto
        UPDATE producto
        SET stock_producto = stock_producto - p_cantidad,
            id_usuario_actualizacion = p_id_usuario
        WHERE id_producto = p_id_producto;

    ELSEIF p_tipo_ajuste = 'DEVOLUCION' THEN
        SET v_costo_final = p_precioCosto; -- no se descuenta costo

        -- Insertar un nuevo lote para la devolución
        INSERT INTO lote_producto(
            id_usuario_creacion,
            id_producto,
            cantidad_comprada,
            stock_disponible,
            costo_unitario,
            fecha_vencimiento
        ) VALUES (
            p_id_usuario,
            p_id_producto,
            p_cantidad,
            p_cantidad,
            p_precioCosto,
            p_Nuevafecha_vencimiento
        );
        -- Para DEVOLUCION, el efecto neto en stock_producto es cero,
        -- ya que se retira stock de lotes antiguos y se añade stock como un nuevo lote.
        -- Por lo tanto, no se requiere una actualización explícita a producto.stock_producto aquí.

    ELSE -- Para 'CAMBIO' o cualquier otro tipo
        SET v_costo_final = p_precioCosto;
        -- Actualizar stock en producto (solo disminuir para 'CAMBIO' si no se maneja como 'PERDIDA')
        UPDATE producto
        SET stock_producto = stock_producto - p_cantidad,
            id_usuario_actualizacion = p_id_usuario
        WHERE id_producto = p_id_producto;
    END IF;

    -- Obtener últimas existencias del producto para el Kardex
    SELECT k.existencia_costo_unitario, k.existencia_unidades, k.existencia_costo_total
    INTO v_costo_unitario_ex, v_unidades_ex, v_costo_total_ex
    FROM kardex k
    WHERE k.id_producto = p_id_producto
    ORDER BY id DESC
    LIMIT 1;

    -- Calcular salida para el Kardex
    SET v_unidades_salida = p_cantidad; -- La cantidad que sale es p_cantidad
    SET v_costo_unitario_salida = v_costo_final;
    SET v_costo_total_salida = v_unidades_salida * v_costo_unitario_salida;

    -- Calcular nuevas existencias después de la salida
    SET v_unidades_ex = ROUND(v_unidades_ex - p_cantidad, 2);
    SET v_costo_total_ex = ROUND(v_costo_total_ex - v_costo_total_salida, 2);

    IF v_unidades_ex > 0 THEN
        SET v_costo_unitario_ex = ROUND(v_costo_total_ex / v_unidades_ex, 2);
    ELSE
        SET v_costo_unitario_ex = 0.00;
    END IF;

    -- Registrar la SALIDA en kardex
    INSERT INTO kardex(
        id_usuario_creacion,
        id_producto,
        codigo_producto,
        concepto,
        salidad_unidades,
        salidad_costo_unitario,
        salidad_costo_total,
        existencia_unidades,
        existencia_costo_unitario,
        existencia_costo_total
    )
    VALUES (
        p_id_usuario,
        p_id_producto,
        p_codigo_producto,
        CONCAT('AJUSTE DE STOCK - SALIDA POR ', p_tipo_ajuste, ': ', p_observacion),
        v_unidades_salida,
        v_costo_unitario_salida,
        v_costo_total_salida,
        v_unidades_ex,
        v_costo_unitario_ex,
        v_costo_total_ex
    );

    -- Si el ajuste es por DEVOLUCION, registrar también la ENTRADA del nuevo producto
    IF p_tipo_ajuste = 'DEVOLUCION' THEN
        -- Actualizar existencias para la entrada por devolución
        SET v_unidades_ex = ROUND(v_unidades_ex + p_cantidad, 2);
        SET v_costo_total_ex = ROUND(v_costo_total_ex + (p_cantidad * p_precioCosto), 2);
        IF v_unidades_ex > 0 THEN
            SET v_costo_unitario_ex = ROUND(v_costo_total_ex / v_unidades_ex, 2);
        ELSE
            SET v_costo_unitario_ex = 0.00;
        END IF;

        INSERT INTO kardex(
            id_usuario_creacion,
            id_producto,
            codigo_producto,
            concepto,
            entrada_unidades,
            entrada_costo_unitario,
            entrada_costo_total,
            existencia_unidades,
            existencia_costo_unitario,
            existencia_costo_total
        )
        VALUES (
            p_id_usuario,
            p_id_producto,
            p_codigo_producto,
            CONCAT('AJUSTE DE STOCK - ENTRADA POR DEVOLUCION: ', p_observacion),
            p_cantidad,
            p_precioCosto,
            p_cantidad * p_precioCosto,
            v_unidades_ex, -- existencias después del ingreso
            v_costo_unitario_ex,
            v_costo_total_ex
        );
    END IF;

    -- Registrar asiento contable solo para PERDIDA o DEVOLUCION
    IF p_tipo_ajuste IN ('PERDIDA', 'DEVOLUCION') THEN
        -- Insertar cabecera de asiento contable
        INSERT INTO asiento_contable (
            fecha,
            descripcion,
            tipo_asiento,
            id_referencia,
            modulo_origen,
            total_debe,
            total_haber,
            tipo_referencia
        ) VALUES (
            CURRENT_DATE,
            CONCAT('Ajuste de stock por ', p_tipo_ajuste, ': ', p_observacion),
            'AJUSTE',
            p_id_producto,
            'INVENTARIO',
            v_costo_total_salida,
            v_costo_total_salida,
            'PRODUCTO'
        );

        SET v_id_asiento = LAST_INSERT_ID();

        -- Insertar detalle contable
        IF p_tipo_ajuste = 'PERDIDA' THEN
            -- DEBE: Pérdida por inventario (cuenta 502, asumiendo id_cuenta 15)
            INSERT INTO detalle_asiento (id_asiento, id_cuenta, debe, descripcion, orden)
            VALUES (v_id_asiento, 15, v_costo_total_salida, 'Pérdida por ajuste de inventario', 1);

            -- HABER: Inventario (cuenta 104, asumiendo id_cuenta 9)
            INSERT INTO detalle_asiento (id_asiento, id_cuenta, haber, descripcion, orden)
            VALUES (v_id_asiento, 9, v_costo_total_salida, 'Disminución de inventario', 2);

        ELSEIF p_tipo_ajuste = 'DEVOLUCION' THEN
            -- DEBE: Inventario (cuenta 104, asumiendo id_cuenta 9)
            INSERT INTO detalle_asiento (id_asiento, id_cuenta, debe, descripcion, orden)
            VALUES (v_id_asiento, 9, v_costo_total_salida, 'Reposición por devolución', 1);

            -- HABER: Ventas (cuenta 401, asumiendo id_cuenta 11) o cliente según el caso
            INSERT INTO detalle_asiento (id_asiento, id_cuenta, haber, descripcion, orden)
            VALUES (v_id_asiento, 11, v_costo_total_salida, 'Reversión de ingreso por devolución', 2);
        END IF;
    END IF;

    -- Registrar log de auditoría
    INSERT INTO log_auditoria (
        tabla,
        accion,
        usuario_id,
        fecha,
        detalle,
        id_registro_afectado,
        modulo
    ) VALUES (
        'producto / lote_producto / kardex',
        CONCAT('Ajuste de stock - ', p_tipo_ajuste),
        p_id_usuario,
        NOW(),
        CONCAT('Ajuste realizado al producto ID ', p_id_producto,
               ' con cantidad ', p_cantidad,
               '. Observación: ', p_observacion,
               IF(p_fecha_vencimiento IS NOT NULL,
                  CONCAT('. Fecha vencimiento: ', p_fecha_vencimiento),
                  ''),
               '. Nuevo stock: ', p_nuevo_stock),
        p_id_producto,
        'INVENTARIO'
    );

    -- Si todo fue exitoso, confirmar la transacción
    COMMIT;

    -- Retornar mensaje de éxito
    SELECT 'Ajuste realizado con éxito.' AS resultado;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_AnularVenta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_AnularVenta`(
        IN p_IdVenta INT,
        IN p_id_usuario INT

)
BEGIN
    DECLARE mensaje VARCHAR(255);
    DECLARE v_nro_boleta VARCHAR(25);
    DECLARE v_id_arqueo INT;
    DECLARE v_id_movimiento INT;
    DECLARE v_id_detalle INT;
    DECLARE v_id_stock INT;
    DECLARE v_id_producto INT;
    DECLARE v_cantidad_vendida INT;
    DECLARE v_precio_venta DECIMAL(10,2);
    DECLARE v_costo_unitario DECIMAL(10,2);
    DECLARE v_codigo_barra VARCHAR(20);
    DECLARE v_total_venta DECIMAL(10,2);


      -- Kardex

    DECLARE v_stock_actual INT;
    DECLARE v_existencia_costo_total DECIMAL(10,2);

    DECLARE done INT DEFAULT FALSE;

   -- Cursor para recorrer los productos vendidos

    DECLARE cur CURSOR FOR 

     SELECT dvl.id_detalle_venta_stock, dvl.id_lote, dv.IdProducto, dvl.cantidad_vendida, dvl.precio_venta, dvl.costo_unitario, dv.codigo_barra
         FROM det_venta_lote dvl
        INNER JOIN det_venta dv ON dvl.id_det_venta = dv.IdDetalleVenta
        WHERE dv.estado = 1 AND dv.IdVenta = p_IdVenta;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;


  -- Obtener la venta y su total

    SELECT total_venta ,nro_boleta 
    INTO  v_total_venta,v_nro_boleta 
    FROM ventas  
    WHERE IdVenta = p_IdVenta
    AND estado = 1;

    -- Verificar si la venta existe y está activa

    IF EXISTS (SELECT 1 FROM ventas WHERE IdVenta = p_IdVenta AND estado = '1') THEN

   
         -- Obtener el arqueo de caja activo del usuario

        SELECT id_arqueo_caja 
        INTO v_id_arqueo
        FROM arqueo_caja
        WHERE id_usuario = p_id_usuario AND estado = 1
        ORDER BY fecha_inicio DESC

        LIMIT 1;

         IF v_id_arqueo IS NOT NULL then

     -- Obtener el movimiento de caja para devoluciones

            SELECT id_movimiento_caja 
            INTO v_id_movimiento
            FROM movimiento_caja
            WHERE id_arqueo = v_id_arqueo AND tipo_movimiento = 'Devolucion' 
            AND tipo_referencia = 'Devolucion'
            ORDER BY fecha_registro DESC

            LIMIT 1;

           
         if v_id_movimiento is null then
       
       -- Insertar movimiento en caja si no existe
          INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
          VALUES (v_id_arqueo, 'Devolucion', 'Devolucion', p_id_usuario);
       
          SET v_id_movimiento = LAST_INSERT_ID();
         end if;

        -- Revertir el stock de los productos vendidos

        OPEN cur;


        read_loop: LOOP

           FETCH cur INTO v_id_detalle, v_id_stock, v_id_producto, v_cantidad_vendida, v_precio_venta, v_costo_unitario, v_codigo_barra;


            IF done THEN 

                LEAVE read_loop;

            END IF;

            IF v_id_producto IS NOT NULL THEN

        -- Restaurar stock en stock_producto

                UPDATE lote_producto 
                SET stock_disponible = stock_disponible + v_cantidad_vendida,
                      estado=1
                WHERE id_lote = v_id_stock ;

                -- Restaurar stock en stock_producto

            UPDATE producto 
            SET stock_producto = stock_producto + v_cantidad_vendida
            WHERE id_producto = v_id_producto and estado=1;

               -- Obtener el stock actual después de la reversión

                SELECT stock_producto INTO v_stock_actual FROM producto WHERE id_producto = v_id_producto;
                
                -- Calcular existencia en Kardex

                SET v_existencia_costo_total = v_stock_actual * v_costo_unitario;


                -- Registrar entrada en Kardex

                INSERT INTO kardex (
                   id_usuario_creacion, id_producto, codigo_producto, concepto, comprobante, 
                    entrada_unidades, entrada_costo_unitario, entrada_costo_total, 
                    existencia_unidades, existencia_costo_unitario, existencia_costo_total

                ) VALUES (
                   p_id_usuario, v_id_producto, v_codigo_barra,  concat('Devolucion de Venta: Id', p_IdVenta), v_nro_boleta, 
                    v_cantidad_vendida, v_costo_unitario, v_cantidad_vendida * v_costo_unitario, 
                    v_stock_actual, v_costo_unitario, v_existencia_costo_total

                );

                -- Marcar detalle de venta stock como inactivo

                UPDATE det_venta_lote 
                SET estado = 0
                WHERE id_detalle_venta_stock = v_id_detalle AND estado = 1;
                 END IF;


        END LOOP;
        CLOSE cur;

              -- Insertar en detalle_devoluciones

        INSERT INTO detalle_devoluciones (id_movimiento_caja, tipo_devolucion, id_ventas, nro_ventas,monto,descripcion)
        VALUES (v_id_movimiento, 'Venta',p_IdVenta,v_nro_boleta, v_total_venta, concat('Devolucion de Venta Id: ', p_IdVenta));


         -- Eliminar el detalle de venta

          UPDATE det_venta 
          SET estado = 0 
          WHERE IdVenta = p_IdVenta and estado=1;

          -- Marcar la venta como anulada

        UPDATE ventas 
        SET estado = '0'
        WHERE IdVenta = p_IdVenta and estado = '1';

      
        UPDATE detalle_ingresos 
        SET estado = 0
        WHERE id_ventas = p_IdVenta and estado = 1;

        UPDATE ventas_credito 
        SET estado = 'Eliminado'
        WHERE id_venta = p_IdVenta and estado = 'Activo';


    END IF;

    END IF;

    
      SET mensaje = 'Venta eliminada correctamente.';
     SELECT mensaje AS resultado;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_cerrar_caja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_cerrar_caja`(
   IN p_id_usuario INT,
    IN p_id_caja INT,
    IN p_id_arqueo_caja INT,
    IN p_inpuBillete100 FLOAT,
    IN p_inpuBillete50 FLOAT,
    IN p_inpuBillete20 FLOAT,
    IN p_inpuBillete10 FLOAT,
    IN p_inpuBillete5 FLOAT,
    IN p_inpuBillete1 FLOAT,
    IN p_inputMoneda1 FLOAT,
    IN p_inputMoneda50 FLOAT,
    IN p_inputMoneda25 FLOAT,
    IN p_inputMoneda10 FLOAT,
    IN p_inputMoneda5 FLOAT,
    IN p_inputMoneda001 FLOAT,
    IN p_total_efectivo DECIMAL(10,2),
    IN p_inpuTotalMoneda DECIMAL(10,2),
    IN p_inpuTotalBilletes DECIMAL(10,2),
    IN p_Comentario VARCHAR(550)
)
BEGIN
    DECLARE mensaje VARCHAR(255);
    DECLARE v_total_ingresos DECIMAL(10,2) DEFAULT 0.00;
    DECLARE v_total_egresos DECIMAL(10,2) DEFAULT 0.00;
    DECLARE v_monto_inicial DECIMAL(10,2);
    DECLARE v_saldo_final DECIMAL(10,2);
    DECLARE v_diferencia DECIMAL(10,2);

    -- Manejo de errores
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Si ocurre un error, hacemos rollback y establecemos el mensaje de error
        ROLLBACK;
        SET mensaje = 'Ocurrió un error al cerrar la caja. No se realizaron cambios.';
        SELECT mensaje AS resultado;
    END;

    START TRANSACTION;

    -- Verificar si el arqueo está abierto
    IF EXISTS (
        SELECT 1 FROM arqueo_caja 
        WHERE id_arqueo_caja = p_id_arqueo_caja AND fecha_fin IS NULL AND estado = '1'
    ) THEN

        -- Obtener monto inicial
        SELECT monto_inicial INTO v_monto_inicial 
        FROM arqueo_caja WHERE id_arqueo_caja = p_id_arqueo_caja;

        -- Calcular total ingresos
        SELECT IFNULL(SUM(monto), 0) INTO v_total_ingresos
        FROM detalle_ingresos di
        INNER JOIN movimiento_caja mc ON di.id_movimiento_caja = mc.id_movimiento_caja
        WHERE mc.id_arqueo = p_id_arqueo_caja AND mc.estado = '1' AND di.estado = '1';

        -- Calcular total egresos
        SELECT IFNULL(SUM(monto), 0) INTO v_total_egresos
        FROM detalle_gastos dg
        INNER JOIN movimiento_caja mc ON dg.id_movimiento_caja = mc.id_movimiento_caja
        WHERE mc.id_arqueo = p_id_arqueo_caja AND mc.estado = '1' AND dg.estado = '1' AND afectarCaja = 1;

        -- Calcular saldo final
        SET v_saldo_final = v_monto_inicial + v_total_ingresos - v_total_egresos;

        -- Calcular diferencia
        SET v_diferencia = p_total_efectivo - v_saldo_final;

        -- Actualizar arqueo_caja
        UPDATE arqueo_caja
        SET 
            total_ingresos = v_total_ingresos,
            total_egresos = v_total_egresos,
            saldo_final = v_saldo_final,
            monto_usuario = p_total_efectivo,
            sobrante_caja = IF(v_diferencia > 0, v_diferencia, 0),
            faltantes_caja = IF(v_diferencia < 0, ABS(v_diferencia), 0),
            fecha_fin = NOW(),
            ObservacionCierre = p_Comentario,
            estado = '0'
        WHERE id_arqueo_caja = p_id_arqueo_caja;

        -- Insertar conteo de dinero
        INSERT INTO dinero (
            id_arqueo, id_usuario, id_caja,
            billete_100, billete_50, billete_20, billete_10,
            billete_5, billete_2, billete_1,
            moneda_1, moneda_50, moneda_25, moneda_10, moneda_5, moneda_001,
            total_moneda, total_billeta
        )
        VALUES (
            p_id_arqueo_caja, p_id_usuario, p_id_caja,
            p_inpuBillete100, p_inpuBillete50, p_inpuBillete20, p_inpuBillete10,
            p_inpuBillete5, 0, p_inpuBillete1,
            p_inputMoneda1, p_inputMoneda50, p_inputMoneda25, p_inputMoneda10, p_inputMoneda5, p_inputMoneda001,
            p_inpuTotalMoneda, p_inpuTotalBilletes
        );

        COMMIT;
        SET mensaje = 'Arqueo realizado con éxito.';

    ELSE
        ROLLBACK;
        SET mensaje = 'No existe un arqueo abierto.';
    END IF;

    SELECT mensaje AS resultado;
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_CierreCaja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_CierreCaja`(

     IN `p_IdUsuario` INT,

     IN `p_IdCaja` INT

)
begin
	
/* tabla*/


         /* Ingresos */

	declare v_total_fectivo_ventas Decimal(10,2);

	declare v_total_fectivo_credito Decimal(10,2);   

	declare v_total_ventas_credito Decimal(10,2);

    declare v_total_otros_ingresos Decimal(10,2);

    declare v_total_ingresos Decimal(10,2);

          /* Gastos */

    declare v_total_efectivo_compras Decimal(10,2);

    declare v_total_prestamos Decimal(10,2);

    declare v_total_pagos_compras_credito Decimal(10,2);

    declare v_total_otros_gastos Decimal(10,2);

    declare v_total_credito_compras Decimal(10,2);

    declare v_total_egresos Decimal(10,2);

             /* Ingresos */

    
    select sum(di.monto) into v_total_fectivo_ventas from detalle_ingresos di inner join movimiento_caja mc on

    di.id_movimiento_caja = mc.id_movimiento_caja and di.estado =1 and di.tipo_ingresos='Ventas' and mc.tipo_movimiento='Ingreso'

    and mc.tipo_referencia='Ingreso' inner join 

    arqueo_caja ac on ac.id_arqueo_caja = mc.id_arqueo 

    where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;


    select sum(di.monto) into v_total_fectivo_credito from detalle_ingresos di inner join movimiento_caja mc on

    di.id_movimiento_caja = mc.id_movimiento_caja and di.estado =1 and di.tipo_ingresos='Creditos' and mc.tipo_movimiento='Ingreso'

    and mc.tipo_referencia='Ingreso' inner join 

    arqueo_caja ac on ac.id_arqueo_caja = mc.id_arqueo 

    where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;


    select sum(di.monto) into  v_total_otros_ingresos from detalle_ingresos di inner join movimiento_caja mc on

    di.id_movimiento_caja = mc.id_movimiento_caja and di.estado =1 and di.tipo_ingresos='Otros' and mc.tipo_movimiento='Ingreso'

    and mc.tipo_referencia='Ingreso' inner join 

    arqueo_caja ac on ac.id_arqueo_caja = mc.id_arqueo 

    where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;

         

 select sum(vc.saldo_pendiente) into v_total_ventas_credito from ventas_credito vc 

 inner  join detalle_ingresos di on di.id_ventas= vc.id_venta 

 inner join movimiento_caja mc  on di.id_movimiento_caja = mc.id_movimiento_caja  and di.estado =1

 and  mc.tipo_movimiento='Ingreso' and mc.tipo_referencia='Ingreso' inner join 

 arqueo_caja ac on ac.id_arqueo_caja = mc.id_arqueo 

 where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;

   



            /* Gastos */


select sum(dg.monto) into v_total_efectivo_compras

from detalle_gastos dg inner join movimiento_caja mc on dg.afectarCaja=1 and dg.tipo_gastos='Compras'

and dg.id_movimiento_caja =mc.id_movimiento_caja and dg.estado=1 and mc.tipo_movimiento='Egreso'

and mc.tipo_referencia='Gasto'  

inner join arqueo_caja ac on ac.id_arqueo_caja =mc.id_arqueo 

where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;



  SET v_total_prestamos  = (0);

  SET v_total_pagos_compras_credito = (0);


select sum(dg.monto) into v_total_otros_gastos

from detalle_gastos dg inner join movimiento_caja mc on dg.afectarCaja=1 and dg.tipo_gastos='Otros'

and dg.id_movimiento_caja =mc.id_movimiento_caja and dg.estado=1 and mc.tipo_movimiento='Egreso'

and mc.tipo_referencia='Gasto'  

inner join arqueo_caja ac on ac.id_arqueo_caja =mc.id_arqueo 

where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;


      SET v_total_credito_compras = (0);

 SET v_total_ingresos=(v_total_fectivo_ventas+v_total_fectivo_credito+v_total_otros_ingresos);

 SET v_total_egresos=(

v_total_efectivo_compras+

v_total_prestamos+

v_total_pagos_compras_credito+

v_total_otros_gastos);

 
  SELECT

    IFNULL(v_total_fectivo_ventas, 0) AS total_fectivo_ventas,

    IFNULL(v_total_fectivo_credito, 0) AS total_fectivo_credito,

    IFNULL(v_total_ventas_credito, 0) AS total_ventas_credito, 

    IFNULL(v_total_otros_ingresos, 0) AS total_otros_ingresos,

    IFNULL(v_total_efectivo_compras, 0) AS total_efectivo_compras, 

    IFNULL(v_total_prestamos, 0) AS total_prestamos, 

    IFNULL( v_total_pagos_compras_credito , 0) AS  total_pagos_compras_credito , 

    IFNULL(v_total_otros_gastos, 0) AS total_otros_gastos,

    IFNULL(v_total_credito_compras, 0) AS total_credito_compras,   

    IFNULL(v_total_ingresos, 0) AS total_ingresos,

    IFNULL(v_total_egresos, 0) AS total_egresos;
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ConsultarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ConsultarProducto`()
BEGIN

	select
	'' as opcion ,
	id_producto,
	codigo_barra,
	descripcion_producto,
	precio_compra_producto,
	precio_venta_producto,
	lleva_iva_producto
from
	producto
where
	estado = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ConsultarProveedor` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ConsultarProveedor`()
BEGIN

	select
	'' as opcion,
	id_proveedor,
	ruc,
	nombre,
	razon_social,
	direccion
from
	proveedor
where
	estado = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_consultar_lotes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_consultar_lotes`(
   in p_estado INT ,
   in p_fecha_inicio DATE ,
   in p_fecha_fin DATE ,
   in p_codigo_barra VARCHAR(50) 
)
BEGIN
     -- Eliminar espacios al inicio y fin
    SET p_codigo_barra = LTRIM(RTRIM(p_codigo_barra));
	SELECT
        '' AS detalles,
        lp.id_lote AS `# Lote`,
        p.codigo_barra,
        p.perecedero_producto,
        p.descripcion_producto AS Producto,
        lp.cantidad_comprada AS `Cant. Comprada`,
        lp.cantidad_bonificada AS Bonificación,
        lp.stock_disponible AS `Stock Disponible`,
        lp.costo_unitario AS `Costo Unitario`,
        lp.precio_compra AS `Precio Total`,
        lp.fecha_registro AS `F. Compra`,
        lp.fecha_vencimiento AS `F. Vencimiento`,
        CASE 
            WHEN lp.estado = 1 THEN 'Activo'
            WHEN lp.estado = 0 THEN 'Inactivo'
        END AS Estado,
        '' AS Opciones
    FROM lote_producto lp
    INNER JOIN producto p ON lp.id_producto = p.id_producto
    WHERE 
        (p_estado = -1 OR lp.estado = p_estado)
        AND (
            (p_fecha_inicio IS NULL OR p_fecha_fin IS NULL)
            OR (
                lp.fecha_registro >= CAST(p_fecha_inicio AS DATETIME)
                AND lp.fecha_registro < DATE_ADD(CAST(p_fecha_fin AS DATETIME), INTERVAL 1 DAY)
            )
        )
        AND (p_codigo_barra = '' OR p.codigo_barra = p_codigo_barra)
      --   AND lp.stock_disponible > 0
    ORDER BY lp.fecha_registro DESC;
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_consultar_lotes_agrupados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_consultar_lotes_agrupados`(
   in p_estado INT ,
   in p_fecha_inicio DATE ,
   in p_fecha_fin DATE ,
   in p_codigo_barra VARCHAR(50) 

)
begin
	
	SELECT
    '' AS detalles,
    MIN(lp.id_lote) AS `# Lote`,
    p.codigo_barra,
    p.perecedero_producto,
    p.descripcion_producto AS Producto,
    SUM(lp.cantidad_comprada) AS `Cant. Comprada`,
    SUM(lp.cantidad_bonificada) AS Bonificación,
    SUM(lp.stock_disponible) AS `Stock Disponible`,
    -- AVG(lp.costo_unitario) AS `Costo Unitario`,
    ROUND(AVG(lp.costo_unitario), 2) AS `Costo Unitario`,

    SUM(lp.precio_compra) AS `Precio Total`,
    MIN(lp.fecha_registro) AS `F. Compra`,
    CASE 
        WHEN p.perecedero_producto = 1 THEN lp.fecha_vencimiento
        ELSE NULL
    END AS `F. Vencimiento`,
    CASE 
        WHEN lp.estado = 1 THEN 'Activo'
        WHEN lp.estado = 0 THEN 'Inactivo'
    END AS Estado,
    '' AS Opciones
FROM lote_producto lp
INNER JOIN producto p ON lp.id_producto = p.id_producto
WHERE 
    (p_estado = -1 OR lp.estado = p_estado)
    AND (
        (p_fecha_inicio IS NULL OR p_fecha_fin IS NULL)
        OR (
            lp.fecha_registro >= CAST(p_fecha_inicio AS DATETIME)
            AND lp.fecha_registro < DATE_ADD(CAST(p_fecha_fin AS DATETIME), INTERVAL 1 DAY)
        )
    )
    AND (p_codigo_barra = '' OR p.codigo_barra = p_codigo_barra)
 --     AND lp.stock_disponible > 0
GROUP BY 
    p.codigo_barra,
    p.perecedero_producto,
    p.descripcion_producto,
    CASE 
        WHEN p.perecedero_producto = 1 THEN lp.fecha_vencimiento
        ELSE NULL
    END,
    CASE 
        WHEN lp.estado = 1 THEN 'Activo'
        WHEN lp.estado = 0 THEN 'Inactivo'
    END
ORDER BY `F. Compra` DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_consultar_ventas_con_estado_sri` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_consultar_ventas_con_estado_sri`(
    IN p_fechaInicio DATE,
    IN p_fechaFin DATE
)
BEGIN
    SELECT
        v.IdVenta,
        -- Mostrar c.numero_documento si no está vacío, caso contrario usar v.nro_boleta
        CASE 
            WHEN c.numero_documento IS NOT NULL AND c.numero_documento != '' THEN c.numero_documento
            ELSE v.nro_boleta
        END AS nro_boleta_mostrar,
   
        CONCAT(cl.nombre, ' ', cl.apellido) AS nombre_cliente,
             v.total_venta,
        v.fecha_registro,
        c.clave_acceso,
        c.fecha_autorizacion,
        c.ruta_xml_autorizado,
        c.pdf_generado,
        c.id_enviado_cliente as enviado_cliente,
        ee.nombre AS estado_sri,
        CASE 
            WHEN c.id_estado_emision IS NULL THEN 'POR ENVIAR'
            ELSE ee.nombre
        END AS estado_sri_mostrar,
        '' AS opciones
    FROM ventas v
    LEFT JOIN cliente cl ON v.IdCliente = cl.id_cliente
    LEFT JOIN comprobantes_electronicos c ON v.IdVenta = c.id_venta
    LEFT JOIN estado_emision ee ON c.id_estado_emision = ee.id_estado
    WHERE DATE(v.fecha_registro) BETWEEN p_fechaInicio AND p_fechaFin
    ORDER BY v.fecha_registro DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_EditarVentaCreditos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_EditarVentaCreditos`(
 IN p_IdVenta INT,
    IN p_IdCliente INT,
    IN p_nro_boleta VARCHAR(25),
    IN p_TipoDocumento VARCHAR(25),
    IN p_total_venta DECIMAL(10,2),
    IN p_abono DECIMAL(10,2),
    IN p_fechaVence DATE,
    IN p_detalle JSON
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
    BEGIN
        ROLLBACK;
        SELECT 'Error: No se pudo editar la venta' AS resultado;
    END;

    START TRANSACTION;

    -- Paso 1: Validar existencia
    IF EXISTS (SELECT 1 FROM ventas WHERE id_venta = p_IdVenta AND tipo_pago = 'CREDITO') THEN

        -- Paso 2: Revertir stock y kardex
        CALL usp_RevertirStockYkardex(p_IdVenta); -- Puedes crear un procedimiento aparte para esto

        -- Paso 3: Eliminar detalles anteriores
        DELETE FROM det_venta_lote WHERE id_det_venta IN (SELECT id FROM det_venta WHERE IdVenta = p_IdVenta);
        DELETE FROM kardex WHERE comprobante = (SELECT nro_boleta FROM ventas WHERE id_venta = p_IdVenta);
        DELETE FROM det_venta WHERE IdVenta = p_IdVenta;
        DELETE FROM ventas_credito WHERE id_venta = p_IdVenta;

        -- Paso 4: Actualizar cabecera
        UPDATE ventas SET 
            IdCliente = p_IdCliente,
            nro_boleta = p_nro_boleta,
            TipoDocumento = p_TipoDocumento,
            total_venta = p_total_venta,
            abono_credito = p_abono
        WHERE id_venta = p_IdVenta;

        -- Paso 5: Reinsertar nuevos detalles (usa la lógica de insertar del `usp_GuardarVentaCreditos`)
        CALL usp_InsertarDetalleVenta(p_IdVenta, p_nro_boleta, p_detalle);

        -- Paso 6: Insertar nueva info de crédito
        INSERT INTO ventas_credito (id_venta, id_cliente, nroCreditoVentas, monto_total, monto_abonado, saldo_pendiente, fecha_vencimiento)
        VALUES (
            p_IdVenta, p_IdCliente, p_nro_boleta, p_total_venta, p_abono, p_total_venta - p_abono, p_fechaVence
        );

        COMMIT;
        SELECT 'Venta actualizada correctamente' AS resultado;

    ELSE
        ROLLBACK;
        SELECT 'Error: Venta no encontrada o no es de tipo crédito' AS resultado;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_EliminarCategoria` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_EliminarCategoria`(
 in p_id_categoria int ,
 in p_id_usuario int
)
begin
DECLARE mensaje VARCHAR(255);

    -- Manejo de errores inesperados
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        SET mensaje = 'Error inesperado al eliminar la categoría.';
        SELECT mensaje AS resultado;
    END;

    -- Verificar existencia y estado activo
    IF EXISTS (SELECT 1 FROM categorias WHERE id_categoria = p_id_categoria AND estado = 1 or estado=2) THEN

        -- Eliminación lógica
        UPDATE categorias
        SET 
            id_usuario_eliminacion = p_id_usuario,
            fecha_eliminacion = NOW(),
            estado = 0
        WHERE id_categoria = p_id_categoria;

        -- Auditoría (descomenta si la usas)
        -- INSERT INTO log_auditoria (tabla, accion, usuario_id, detalle)
        -- VALUES ('categorias', 'Eliminar', p_id_usuario, CONCAT('Eliminar categoría con ID: ', p_id_categoria));

        SET mensaje = 'Categoría eliminada con éxito.';
    ELSE
        SET mensaje = 'Warning: La categoría no existe o ya está eliminada.';
    END IF;

    SELECT mensaje AS resultado;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_EliminarCliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_EliminarCliente`(
  IN p_id_cliente INT,
    IN p_id_usuario INT
)
BEGIN
    DECLARE tablas VARCHAR(30) DEFAULT 'cliente';
    DECLARE mensaje VARCHAR(255);
    DECLARE existe_cliente INT DEFAULT 0;

    -- Verificar si existe el cliente activo
    SELECT COUNT(1)
    INTO existe_cliente
    FROM cliente
    WHERE id_cliente = p_id_cliente AND estado = 1 ;

    IF p_id_cliente <= 0 THEN
        SET mensaje = 'Warning: Cliente inválido.';
        
    ELSEIF existe_cliente = 0 THEN
        SET mensaje = 'Warning: El Cliente no existe o ya está eliminado.';
        
    ELSE
        -- Marcar cliente como eliminado (borrado lógico)
        UPDATE cliente
        SET
            estado = 0,
            id_usuario_eliminacion = p_id_usuario,
            fecha_eliminacion = NOW()
        WHERE id_cliente = p_id_cliente;

        INSERT INTO log_auditoria (tabla, accion, usuario_id, detalle,id_registro_afectado,modulo)
            VALUES (tablas, 'Eliminar', p_id_usuario, 
                CONCAT('Eliminar un Cliente con el id: ', p_id_cliente),p_id_cliente,'Cliente');

        SET mensaje = 'Cliente eliminado con éxito.';
    END IF;

    -- Retornar resultado
    SELECT mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_EliminarCompra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_EliminarCompra`(
                                                     IN p_IdCompra varchar(20),
                                                    IN p_id_usuario INT)
BEGIN

	 DECLARE v_venta_existente INT DEFAULT 0;
     DECLARE mensaje VARCHAR(255);
     declare  v_TOTAL decimal(10,2);
     DECLARE v_id_arqueo INT;
     DECLARE v_id_movimiento INT;
	 DECLARE v_numeroBoleta varchar(50);
	 DECLARE v_tipoPago varchar(50);
	 DECLARE afectarCaja int;
   
   -- Manejo de errores
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
    BEGIN
        SET mensaje = 'Error: Ocurrió un error al intentar eliminar la compra.';
        SELECT mensaje AS resultado;
    END;
      -- Obtener el arqueo de caja abierto

    SELECT id_arqueo_caja INTO v_id_arqueo
    FROM arqueo_caja
    WHERE id_usuario = p_id_usuario AND estado = 1
    ORDER BY fecha_inicio DESC

    LIMIT 1;

    IF v_id_arqueo IS NOT NULL then

      select c.TotalCosto, c.nro_boletacompras,c.tipo_pago
         INTO v_TOTAL ,v_numeroBoleta,v_tipoPago
         from compras c 
        where c.IdCompra=p_IdCompra 
       and c.estado=1;

    -- Marcar la compra como inactiva

    UPDATE compras 
    SET estado = 0
    WHERE IdCompra = p_IdCompra;

    -- Marcar los detalles de compra como inactivos

    UPDATE det_compra 
    SET estado = 0
    WHERE IdCompra = p_IdCompra;

       -- Marcar el detalle_gastos como inactiva

    UPDATE detalle_gastos 
    SET estado = 0 
    WHERE id_compras = p_IdCompra;

    select afectarCaja  
        INTO afectarCaja     
    from detalle_gastos where  id_compras = p_IdCompra;

    -- Insertar en el kardex como salida

        INSERT INTO kardex (
            id_usuario_creacion,
            id_producto,
            codigo_producto, 
            fecha, 
            concepto, 
            comprobante, 
            salidad_unidades, 
            salidad_costo_unitario, 
            salidad_costo_total, 
            existencia_unidades, 
            existencia_costo_unitario, 
            existencia_costo_total

        )

          SELECT 
             p_id_usuario,
            p.id_producto, 
            p.codigo_barra, 
            NOW(), 
            CONCAT('Eliminación de compra Id:', p_IdCompra), 
            dc.nro_boleta, 
            dc.Cantidad, 
            p.precio_compra_producto, 
            (dc.Cantidad * p.precio_compra_producto), 
            p.stock_producto - dc.Cantidad, 
            p.precio_compra_producto, 
            (p.stock_producto - dc.Cantidad) * p.precio_compra_producto
        FROM det_compra dc
        JOIN producto p ON p.id_producto = dc.IdProducto
        WHERE dc.IdCompra = p_IdCompra
        AND p.stock_producto >= dc.Cantidad;

    -- Devolver el stock de los productos al estado anterior

    UPDATE producto p

    JOIN (

        SELECT IdProducto, SUM(Cantidad) AS cantidad_comprada
        FROM det_compra
        WHERE IdCompra = p_IdCompra

        GROUP BY IdProducto

    ) AS detalles_compra

    ON p.id_producto = detalles_compra.IdProducto

    SET p.stock_producto = p.stock_producto - detalles_compra.cantidad_comprada;
    
    -- Ajustar el stock en stock_producto

UPDATE lote_producto lp

JOIN det_compra dc ON lp.id_producto = dc.IdProducto AND lp.costo_unitario = dc.PrecioUnitarioCompra
AND lp.id_det_compra=dc.IdDetCompra

SET lp.stock_disponible = lp.stock_disponible - dc.Cantidad,

    lp.cantidad_comprada = lp.cantidad_comprada - dc.Cantidad,
    lp.estado=0

WHERE dc.IdCompra = p_IdCompra;

     -- Obtener movimiento

    SELECT id_movimiento_caja INTO v_id_movimiento

    FROM movimiento_caja

    WHERE id_arqueo= v_id_arqueo and id_usuario = p_id_usuario AND estado = 1 and tipo_movimiento='Devolucion'

    and tipo_referencia='Devolucion'

    ORDER BY fecha_registro DESC

    LIMIT 1;

         if v_id_movimiento is null then
      -- Insertar movimiento en caja
        INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
        VALUES (v_id_arqueo, 'Devolucion', 'Devolucion', p_id_usuario);

        SET v_id_movimiento = LAST_INSERT_ID();

         end if;

    -- Insertar en detalle_devoluciones
        INSERT INTO detalle_devoluciones (id_movimiento_caja, tipo_devolucion,afectarCaja,id_compras, nro_compras,monto,descripcion)
        VALUES (v_id_movimiento, 'Compra',afectarCaja,p_IdCompra,v_numeroBoleta, v_TOTAL, CONCAT('Eliminación de compra Id: ', p_IdCompra));
  IF v_tipoPago = 'CREDITO' THEN
       UPDATE compras_credito 
       SET estado = 'Eliminado'
        WHERE id_compra = p_IdCompra;
   END IF;

  END IF;
    SET mensaje = 'Compra eliminada correctamente.';
     SELECT mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_EliminarDetalleGasto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_EliminarDetalleGasto`(

   IN p_id INT

)
BEGIN

    DECLARE mensaje VARCHAR(255);

	UPDATE detalle_gastos

    SET estado = 0

    WHERE id = p_id;



 SET mensaje = 'Gasto eliminado con éxito.';

   SELECT mensaje AS resultado;

 

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_EliminarDetalleIngreso` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_EliminarDetalleIngreso`(

IN p_id INT

)
BEGIN

   DECLARE mensaje VARCHAR(255);



	UPDATE detalle_ingresos

    SET estado = 0

    WHERE id = p_id;

 SET mensaje = 'Ingreso eliminado con éxito.';

   SELECT mensaje AS resultado;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_EliminarIngresoCaja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_EliminarIngresoCaja`(
                          in p_id_ingresos int,

                          in p_abono Decimal(10,2))
begin

	

	     DECLARE v_id_abono INT;

	     DECLARE v_id_ventas INT;

	     

	SELECT id_abono,id_ventas 

	INTO v_id_abono,v_id_ventas

    FROM detalle_ingresos

    WHERE id = p_id_ingresos   AND estado = 1

    ORDER BY fecha_registro DESC

    LIMIT 1;

	

	

     IF v_id_abono IS NOT NULL then

        

        UPDATE abonos_credito

        SET estado = 0

        WHERE id_abono  = v_id_abono  AND estado = 1;

      

        UPDATE ventas_credito 

        SET estado = 'Activo',

        monto_abonado =monto_abonado - p_abono,

        saldo_pendiente=saldo_pendiente + p_abono

        WHERE id_venta   = v_id_ventas ;

        

     END IF;

    

     UPDATE detalle_ingresos

        SET estado = 0

        WHERE id = p_id_ingresos  AND estado = 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_EliminarMedida` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_EliminarMedida`(
 in p_id_medidas int ,
 in p_id_usuario int
)
begin
    DECLARE v_fecha_eliminacion DATETIME;
    DECLARE tablas VARCHAR(30);
    DECLARE mensaje VARCHAR(255);
    DECLARE existe INT DEFAULT 0;

    SET tablas = 'medidas';
    SET v_fecha_eliminacion = NOW();

    -- Validar si la medida existe y está activa
    SELECT COUNT(*) INTO existe
    FROM medidas
    WHERE id_medida = p_id_medidas AND estado = 1;

    IF existe = 0 THEN
        SET mensaje = 'Warning: La medida no existe o ya ha sido eliminada.';
    ELSE
        -- Eliminar lógicamente la medida
        UPDATE medidas
        SET fecha_eliminacion = v_fecha_eliminacion,
            estado = 0
        WHERE id_medida = p_id_medidas;

        -- Registrar auditoría
        INSERT INTO log_auditoria (
            tabla, accion, usuario_id, detalle
        ) VALUES (
            tablas, 'Eliminar', p_id_usuario,
            CONCAT('Eliminar una Medidas con el id: ', p_id_medidas)
        );

        SET mensaje = 'Medida eliminada con éxito.';
    END IF;

    -- Devolver mensaje
    SELECT mensaje AS resultado;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_EliminarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_EliminarProducto`(
 in p_id_poducto int ,
 in p_id_usuario int
)
BEGIN
    DECLARE mensaje VARCHAR(255);
    DECLARE tablas VARCHAR(30) DEFAULT 'producto';
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        SET mensaje = 'Error: Se produjo un problema al intentar eliminar el producto.';
        SELECT mensaje AS resultado;
    END;

    -- Validación de ID de producto
    IF p_id_producto IS NULL OR p_id_producto <= 0 THEN
        SET mensaje = 'Warning: Producto inválido.';

    -- Verificación de existencia del producto y su estado
    ELSEIF NOT EXISTS (
        SELECT 1 FROM producto 
        WHERE id_producto = p_id_producto AND estado = 1
    ) THEN
        SET mensaje = 'Warning: El producto no existe o ya está eliminado.';

    -- Procedimiento de eliminación lógica
    ELSE
        UPDATE producto
        SET 
            id_usuario_eliminacion = p_id_usuario,
            fecha_eliminacion = NOW(),
            estado = 2
        WHERE id_producto = p_id_producto;

        -- Insertar en log de auditoría
        INSERT INTO log_auditoria (
            tabla,
            accion,
            usuario_id,
            fecha,
            detalle,
            id_registro_afectado,
            modulo
        )
        VALUES (
            tablas,
            'ELIMINACION_LOGICA',
            p_id_usuario,
            NOW(),
            CONCAT('El producto con ID ', p_id_producto, ' fue eliminado lógicamente.'),
            p_id_producto,
            'Producto'
        );

        SET mensaje = 'Producto eliminado con éxito.';
    END IF;

    -- Devolver resultado
    SELECT mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_EliminarProveedor` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_EliminarProveedor`(
 in p_id_proveedor int ,
 in p_id_usuario int
)
BEGIN

 DECLARE tablas VARCHAR(30) DEFAULT 'proveedor';
    DECLARE mensaje VARCHAR(255);
    DECLARE v_existe INT DEFAULT 0;

    -- Verificar si el proveedor existe y está activo
    SELECT COUNT(*) INTO v_existe
    FROM proveedor
    WHERE id_proveedor = p_id_proveedor AND estado = 1;

    IF p_id_proveedor <= 0 THEN
        SET mensaje = 'Warning: Proveedor inválido.';
    ELSEIF v_existe = 0 THEN
        SET mensaje = 'Warning: El Proveedor no existe o ya está eliminado.';
    ELSE
        -- Realizar borrado lógico
        UPDATE proveedor
        SET
            id_usuario_eliminacion = p_id_usuario,
            fecha_eliminacion = NOW(),
            estado = 0
        WHERE id_proveedor = p_id_proveedor;

        -- Registrar en log de auditoría
        INSERT INTO log_auditoria (
            tabla, accion, usuario_id, detalle, id_registro_afectado, modulo
        )
        VALUES (
            tablas,
            'Eliminar',
            p_id_usuario,
            CONCAT('Eliminar un Proveedor con el ID: ', p_id_proveedor),
            p_id_proveedor,
            'Proveedor'
        );

        SET mensaje = 'Proveedor eliminado con éxito.';
    END IF;

    -- Devolver mensaje
    SELECT mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_EliminarVentaValidacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_EliminarVentaValidacion`(

                           IN p_nroBoleta VARCHAR(20),

                           IN p_concepto VARCHAR(50),

                           IN p_IdUsuario INT

)
BEGIN

    DECLARE v_IdVenta INT;

    DECLARE v_IdVentaCredito INT;

    DECLARE v_id_arqueo INT;

    DECLARE v_id_stock INT;

    DECLARE v_id_producto INT;

    DECLARE v_cantidad_vendida INT;

    DECLARE v_stock_actual INT;

   

   

    -- Obtener ID de la venta

    SELECT IdVenta INTO v_IdVenta FROM ventas 

    WHERE CAST(nro_boleta AS CHAR) = CAST(p_nroBoleta AS CHAR) 

    AND Activo = 1;

   

       -- Obtener ID de la venta

    SELECT id_venta_credito INTO v_IdVentaCredito FROM ventas_credito 

    where id_venta= v_IdVenta

    AND estado = 'Activo' or estado='Pagado';

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ExisteCreditoVigente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ExisteCreditoVigente`(

in p_id_cliente int
)
BEGIN


select

	c.numeroDocumento,

	c.nombre,

	vc.saldo_pendiente as restante

from

	ventas_credito vc

inner join cliente c 

on

	vc.id_cliente = c.id_cliente

	and vc.estado = 'Activo'

	and c.estado = 1

	where vc.id_cliente =p_id_cliente;	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_FlitradoListadoHistorialClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_FlitradoListadoHistorialClientes`(
     IN p_fechaDesde date,

      IN p_fechaHasta date, 

     IN  p_id_cliente int)
BEGIN
IF  (p_id_cliente > 0 )then 

select  Concat('Credito Nro: ',vc.nroCreditoVentas,' - Nombre del Cliente: ',c.nombre) as nro_credito_ventas

 ,Concat(u.nombre_usuario, u.apellido_usuario)as usuario ,

  c2.nombre_caja

 ,c.telefono,ac.monto_abonado ,ac.fecha_abono 

        from abonos_credito ac  inner join ventas_credito vc on 

ac.id_venta_credito = vc.id_venta_credito inner join cliente c 

on vc.id_cliente = c.id_cliente   inner join movimiento_caja mc on mc.id_movimiento_caja =ac.id_movimiento_caja 

inner join usuarios u  on u.id_usuario =mc.id_usuario inner join arqueo_caja ac2 on ac2.id_arqueo_caja =mc.id_arqueo 

inner join cajas c2 on ac2.id_caja = c2.id_caja

where vc.id_cliente=p_id_cliente and  ac.fecha_abono between p_fechaDesde and p_fechaHasta

order by ac.id_abono ,ac.fecha_abono  desc;
else 
select  Concat('Credito Nro: ',vc.nroCreditoVentas,' - Nombre del Cliente: ',c.nombre) as nro_credito_ventas

 ,Concat(u.nombre_usuario, u.apellido_usuario)as usuario ,

  c2.nombre_caja

 ,c.telefono,ac.monto_abonado ,ac.fecha_abono 

        from abonos_credito ac  inner join ventas_credito vc on 

ac.id_venta_credito = vc.id_venta_credito inner join cliente c 

on vc.id_cliente = c.id_cliente   inner join movimiento_caja mc on mc.id_movimiento_caja =ac.id_movimiento_caja 

inner join usuarios u  on u.id_usuario =mc.id_usuario inner join arqueo_caja ac2 on ac2.id_arqueo_caja =mc.id_arqueo 

inner join cajas c2 on ac2.id_caja = c2.id_caja

where ac.fecha_abono between p_fechaDesde and p_fechaHasta

order by ac.id_abono ,ac.fecha_abono  desc;
end if ;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GetDatosProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GetDatosProducto`(
in p_codigo_producto  varchar(30)
)
BEGIN
    -- Eliminar espacios al inicio y fin
    SET p_codigo_producto = LTRIM(RTRIM(p_codigo_producto));
SELECT '' as vacio,  id_producto ,
                                                        codigo_barra,
                                                        c.id_categoria,
                                                        c.nombre_categoria,
                                                        descripcion_producto,
                                                        u.nombre_corto as unidad,
                                                        lleva_iva_producto,
                                                          '1' as cantidad,
                                                        CONCAT('$./ ',CONVERT(ROUND(precio_venta_producto,2), CHAR)) as precio_venta,
                                                        CONCAT('$./ ',CONVERT(ROUND(1*precio_venta_producto,2), CHAR)) as total,
                                                        '' as acciones,
                                                        p.precio_1_producto,
													    p.precio_2_producto
                                                FROM producto p inner join categorias c on p.id_categoria_producto = c.id_categoria
                                            inner join medidas u on u.id_medida = p.id_unidades
                                            WHERE p.codigo_barra = p_codigo_producto
                                                AND p.stock_producto > 0 and p.estado=1;
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GetDatosProductoCompras` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GetDatosProductoCompras`(

 in p_codigo_producto  varchar(30))
BEGIN
        -- Eliminar espacios al inicio y fin
    SET p_codigo_producto = LTRIM(RTRIM(p_codigo_producto));

select

	p.id_producto ,
	p.codigo_barra,
	p.descripcion_producto,
	'1' as cantidad,
	CONCAT('$./ ', convert(ROUND(p.precio_compra_producto, 2), CHAR)) as precio_compra_producto,
	CONCAT('$./ ', convert(ROUND(p.precio_venta_producto, 2), CHAR)) as precio_venta_producto

from
	producto p
inner join categorias c on
	p.id_categoria_producto = c.id_categoria
inner join medidas u on
	u.id = p.id_unidades

                                            WHERE p.codigo_barra = p_codigo_producto

                                                and activo=1;





END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GuardarCategoria` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GuardarCategoria`(
 in p_id_categoria int ,
 in p_nombre VARCHAR(50),
 in p_id_usuario int,
 in p_estado char(1))
BEGIN

    DECLARE existe_nombre INT DEFAULT 0;
    DECLARE mensaje VARCHAR(255);

    -- Eliminar espacios al inicio y fin
    SET p_nombre = LTRIM(RTRIM(p_nombre));

    -- Verifica si el nombre ya existe (excluyendo el mismo ID en caso de actualización)
    IF p_id_categoria > 0 THEN
        SELECT COUNT(*) INTO existe_nombre
        FROM categorias
        WHERE nombre_categoria = p_nombre
          AND id_categoria <> p_id_categoria;
    ELSE
        SELECT COUNT(*) INTO existe_nombre
        FROM categorias
        WHERE nombre_categoria = p_nombre;
    END IF;

    IF existe_nombre > 0 THEN
        SET mensaje = 'Warning: Ya existe una Categoria con el mismo nombre.';
    ELSE
        IF p_id_categoria > 0 THEN
            -- Actualización
            UPDATE categorias
            SET nombre_categoria = p_nombre,
                id_usuario_actualizacion=p_id_usuario,
                fecha_actualizacion=NOW(),
                estado = p_estado
            WHERE id_categoria = p_id_categoria;
                       
      --      INSERT INTO log_auditoria (tabla, accion, usuario_id, detalle)
      --      VALUES (tablas, 'Actualizar', p_id_usuario,
       --             CONCAT('Actualizar una Categoria con el id: ', p_id_categoria));

            SET mensaje = 'Categoría actualizada con éxito.';
        ELSE
            -- Inserción
            INSERT INTO categorias (nombre_categoria,id_usuario_creacion , estado)
            VALUES (p_nombre,p_id_usuario, p_estado);

        --    INSERT INTO log_auditoria (tabla, accion, usuario_id, detalle)
         --   VALUES (tablas, 'Registrar', p_id_usuario, 'Registrar una Categoria');

            SET mensaje = 'Categoría registrada con éxito.';
         
        END IF;
    END IF;

    -- Devuelve el mensaje final
    SELECT mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_guardarcliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_guardarcliente`(
    IN p_id_cliente INT,
    IN p_tipo_identificacion CHAR(2),
    IN p_numeroDocumento VARCHAR(13),
    IN p_nombre VARCHAR(100),
    IN p_apellido VARCHAR(100),
    IN p_direccion VARCHAR(100),
    IN p_telefono VARCHAR(13),
    IN p_email VARCHAR(100),
    IN p_id_usuario INT
)
BEGIN
    DECLARE mensaje VARCHAR(255);
    DECLARE existe INT DEFAULT 0;
    DECLARE existe_nombre_apellido INT DEFAULT 0;
    DECLARE tablas VARCHAR(30) DEFAULT 'cliente';
    DECLARE v_IdCliente INT  DEFAULT 0;

	-- Eliminar espacios al inicio y fin
   SET p_tipo_identificacion = LTRIM(RTRIM(p_tipo_identificacion));
   SET p_numeroDocumento = LTRIM(RTRIM(p_numeroDocumento));
   SET p_nombre = LTRIM(RTRIM(p_nombre));
   SET p_apellido = LTRIM(RTRIM(p_apellido));
   SET p_direccion = LTRIM(RTRIM(p_direccion));
   SET p_telefono = LTRIM(RTRIM(p_telefono));
   SET p_email = LTRIM(RTRIM(p_email));

    -- Validar que no exista otro cliente con mismo documento
    IF (p_id_cliente > 0) THEN
        SELECT COUNT(*) INTO existe
        FROM cliente
        WHERE numeroDocumento = p_numeroDocumento
          AND id_cliente <> p_id_cliente;
    ELSE
        SELECT COUNT(*) INTO existe
        FROM cliente
        WHERE numeroDocumento = p_numeroDocumento;
    END IF;

    -- Validación adicional por nombre y apellido
  --  SELECT COUNT(*) INTO existe_nombre_apellido
  --  FROM cliente
  --  WHERE nombre = p_nombre
  --    AND apellido = p_apellido
  --    AND id_cliente <> p_id_cliente;

    IF (existe > 0) THEN
        SET mensaje = 'Warning: El número de documento ya está registrado en otro cliente.';
     --   SET codigo = 1;
  --  ELSEIF (existe_nombre_apellido > 0) THEN
  --      SET mensaje = 'Warning: Ya existe un cliente con el mismo nombre y apellido.';
  --      SET codigo = 2;
    ELSE
        IF (p_id_cliente > 0) THEN
            UPDATE cliente
            SET
                tipo_identificacion = p_tipo_identificacion,
                numeroDocumento = p_numeroDocumento,
                nombre = p_nombre,
                apellido = p_apellido,
                direccion = p_direccion,
                telefono = p_telefono,
                email = p_email,
                id_usuario_actualizacion = p_id_usuario,
                fecha_actualizacion = NOW()
            WHERE id_cliente = p_id_cliente;

            INSERT INTO log_auditoria (tabla, accion, usuario_id, detalle,id_registro_afectado,modulo)
            VALUES (tablas, 'Actualizar', p_id_usuario, 
                CONCAT('Actualizar un Cliente con el id: ', p_id_cliente),p_id_cliente,'Cliente');
            
            SET mensaje = 'Cliente actualizado con éxito.';
        ELSE
            INSERT INTO cliente (
                tipo_identificacion,
                numeroDocumento,
                nombre,
                apellido,
                direccion,
                telefono,
                email,
                id_usuario_creacion
            ) VALUES (
                p_tipo_identificacion,
                p_numeroDocumento,
                p_nombre,
                p_apellido,
                p_direccion,
                p_telefono,
                p_email,
                p_id_usuario
            );
                        
                SET v_IdCliente = LAST_INSERT_ID();
     
            INSERT INTO log_auditoria (tabla, accion, usuario_id, detalle,id_registro_afectado,modulo)
            VALUES (tablas, 'Actualizar', p_id_usuario, 
                CONCAT('Registrar un Cliente con el id: ', v_IdCliente),v_IdCliente,'Cliente');
            
            SET mensaje = 'Cliente registrado con éxito.';
        END IF;
    END IF;

    -- Retornar mensaje y código
    SELECT mensaje AS resultado;
    
    END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GuardarCompraCreditos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GuardarCompraCreditos`(
      in p_IdUsuario int,
    in p_IdCaja int,
    in p_afectarCaja int,
    in p_IdProveedor int,
    in p_abono float,
    in p_restante float,
    in p_tipo_pago int,
    in p_TipoDocumento int,
    in p_fechaCompra date,
    in p_fechaVence date,
    in p_NumeroFactura varchar(20),
    in p_iva float,
    in p_subtotal float,
    in p_total_compra float,
    in p_Nro_compras varchar(20),
    in p_Nro_credito_compras varchar(20),
    IN p_detalle JSON)
begin

    DECLARE v_id_arqueo INT;
    DECLARE v_id_movimiento INT;
    DECLARE v_IdCompra INT;

    -- Manejador de excepciones para hacer rollback si hay un error
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Realizar ROLLBACK para deshacer cualquier cambio si ocurre un error
        ROLLBACK;
        SELECT 'Error: Error al procesar la Compra.' AS resultado;
    END;

    -- 4️⃣ Iniciar Transacción
    START TRANSACTION;

    -- Obtener el arqueo de caja abierto
    SELECT id_arqueo_caja INTO v_id_arqueo
    FROM arqueo_caja
    WHERE id_usuario = p_IdUsuario and id_caja=p_IdCaja AND estado = 1
    ORDER BY fecha_inicio DESC
    LIMIT 1;

    -- 1️⃣ Insertar en compras (cabecera)
    INSERT INTO compras(
        tipo_pago, id_usuario_creacion, IdProveedor, subtotalcosto, iva, TotalCosto, TipoComprobante,
        NumeroFactura, nro_boletacompras,fecha_factura
    ) VALUES (
        'CREDITO', p_IdUsuario, p_IdProveedor, p_subtotal, p_iva, p_total_compra, p_TipoDocumento,
        p_NumeroFactura, p_Nro_compras,p_fechaCompra
    );

    -- Obtener el ID de la compra recién insertada
    SET v_IdCompra = LAST_INSERT_ID();

    -- Actualizar correlativo de compras
    UPDATE empresa
SET 
    nro_correlativo_compras = LPAD(CAST(nro_correlativo_compras AS UNSIGNED) + 1, 8, '0'),
    nro_credito_compras     = LPAD(CAST(nro_credito_compras AS UNSIGNED) + 1, 8, '0')
WHERE id_Empresa = 1;


    IF v_id_arqueo IS NOT NULL then
        -- Obtener movimiento
        SELECT id_movimiento_caja INTO v_id_movimiento
        FROM movimiento_caja
        WHERE id_arqueo= v_id_arqueo and id_usuario = p_IdUsuario AND estado = 1 and tipo_movimiento='Egreso'
        and tipo_referencia='Gasto'
        ORDER BY fecha_registro DESC
        LIMIT 1;

        if v_id_movimiento is null then
            -- Insertar movimiento en caja
            INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
            VALUES (v_id_arqueo, 'Egreso', 'Gasto', p_IdUsuario);

            SET v_id_movimiento = LAST_INSERT_ID();
        END IF;

        -- Insertar en detalle_gastos
        INSERT INTO detalle_gastos (afectarCaja,id_movimiento_caja,tipo_gastos, tipo_pago, id_compras, nro_factura, nro_compras, nro_credito_compras,monto,descripcion)
        VALUES (p_afectarCaja,v_id_movimiento,'Compras', p_tipo_pago, v_IdCompra, p_NumeroFactura, p_Nro_compras, p_Nro_credito_compras,p_abono, 'Compra de mercaderia');
    END IF;

    -- 2️⃣ Insertar en detalle de compra
    INSERT INTO det_compra (
        IdCompra, IdProducto, Cantidad, PrecioUnitarioCompra,
        subtotalcosto, iva, TotalCosto,
        codigo_barra, nro_boleta
    )
    SELECT
        v_IdCompra,
        j.IdProducto,
        j.cantidad,
        j.PrecioUnitarioCompra,
        j.subtotalcosto,
        j.iva,
        j.TotalCosto,
        j.codigo_barra,
        p_Nro_compras
    FROM JSON_TABLE(p_detalle, '$[*]'
        COLUMNS (
            IdProducto INT PATH '$.id_producto',
            cantidad DECIMAL(10,2) PATH '$.cantidad',
            PrecioUnitarioCompra DECIMAL(10,2) PATH '$.precio_compra_producto',
            subtotalcosto DECIMAL(10,2) PATH '$.sub_total',
            iva DECIMAL(10,2) PATH '$.iva',
            TotalCosto DECIMAL(10,2) PATH '$.total',
            codigo_barra VARCHAR(25) PATH '$.codigo_producto'
        )
    ) AS j;

    -- 3️⃣ Actualizar stock en la tabla `producto`
    UPDATE producto p
    JOIN (
        SELECT
            IdProducto,
            SUM(cantidad) AS cantidad_comprada,
            MAX(PrecioUnitarioCompra) AS precio_reciente
        FROM JSON_TABLE(p_detalle, '$[*]'
            COLUMNS (
                IdProducto INT PATH '$.id_producto',
                cantidad DECIMAL(10,2) PATH '$.cantidad',
                PrecioUnitarioCompra DECIMAL(10,2) PATH '$.precio_compra_producto'
            )
        ) AS j
        GROUP BY IdProducto
    ) AS detalles_compra
    ON p.id_producto = detalles_compra.IdProducto
    SET p.stock_producto = p.stock_producto + detalles_compra.cantidad_comprada,
    p.precio_compra_producto = detalles_compra.precio_reciente;

    -- 4️⃣ Insertar en lote_producto, obteniendo id_det_compra de det_compra
    INSERT INTO lote_producto (
        id_usuario_creacion, id_det_compra, id_producto, cantidad_comprada, cantidad_bonificada, stock_disponible,
        costo_unitario, fecha_vencimiento
    )
    SELECT
        p_IdUsuario,
        dc.IdDetCompra, -- Aquí se obtiene el IdDetCompra
        dc.IdProducto,
        dc.Cantidad,
        0, -- Ajustar cantidad bonificada si aplica
        dc.Cantidad,
        dc.PrecioUnitarioCompra,
        j.vence -- Fecha de vencimiento del JSON
    FROM det_compra dc
    JOIN JSON_TABLE(p_detalle, '$[*]'
        COLUMNS (
            IdProducto INT PATH '$.id_producto',
            vence DATE PATH '$.vence'
        )
    ) AS j ON dc.IdProducto = j.IdProducto AND dc.IdCompra = v_IdCompra; -- Asegurarse de que coincida con la compra actual

    -- 5️⃣ Registrar en `kardex`
    INSERT INTO kardex (
        id_usuario_creacion,id_producto, codigo_producto, concepto, comprobante,
        entrada_unidades, entrada_costo_unitario, entrada_costo_total,
        existencia_unidades, existencia_costo_unitario, existencia_costo_total
    )
    SELECT
        p_IdUsuario,
        j.IdProducto,
        j.codigo_barra,
        'Compra de productos',
        p_Nro_compras,
        j.cantidad,
        j.PrecioUnitarioCompra,
        j.TotalCosto,
        (SELECT stock_producto FROM producto WHERE id_producto = j.IdProducto), -- Existencia antes de la compra
        j.PrecioUnitarioCompra,
        ((SELECT stock_producto FROM producto WHERE id_producto = j.IdProducto) + j.cantidad) * j.PrecioUnitarioCompra -- Nuevo costo total
    FROM JSON_TABLE(p_detalle, '$[*]'
        COLUMNS (
            IdProducto INT PATH '$.id_producto',
            cantidad DECIMAL(10,2) PATH '$.cantidad',
            PrecioUnitarioCompra DECIMAL(10,2) PATH '$.precio_compra_producto',
            TotalCosto DECIMAL(10,2) PATH '$.total',
            codigo_barra VARCHAR(25) PATH '$.codigo_producto'
        )
    ) AS j
    JOIN producto p ON p.id_producto = j.IdProducto;

    -- Insertar en compras_credito
    INSERT INTO compras_credito (
        id_compra ,nroCreditoCompra, monto_total ,monto_abonado, saldo_pendiente ,fecha_compra,fecha_vencimiento
    ) VALUES (
        v_IdCompra,p_Nro_credito_compras, p_total_compra, p_abono,p_restante,p_fechaCompra,p_fechaVence
    );

    INSERT INTO log_auditoria (tabla, accion, usuario_id, detalle, id_registro_afectado, modulo)
    VALUES (
        'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito',
        'INSERT/UPDATE',
        p_IdUsuario,
        CONCAT('Compra registrada completa con ID: ', v_IdCompra),
        v_IdCompra,
        'Compra'
    );

    -- Confirmar transacción
    COMMIT;
    SELECT 'Se ha realizado con éxito la Compra.' AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GuardarCompraEfectivo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GuardarCompraEfectivo`(
                       in p_IdUsuario int,
            in p_IdCaja int,
            in p_afectarCaja int,
            in p_IdProveedor int,
            in p_abono float,
            in p_restante float,
            in p_tipo_pago int,
            in p_TipoDocumento int,
            in p_fechaCompra date,
            in p_fechaVence date,
            in p_NumeroFactura varchar(20),
            in p_iva float,
            in p_subtotal float,
            in p_total_compra float,
            in p_Nro_compras varchar(20),
            in p_Nro_credito_compras varchar(20),
            IN p_detalle JSON)
begin


    DECLARE v_id_arqueo INT;
    DECLARE v_id_movimiento INT;
    DECLARE v_IdCompra INT;


    -- Manejador de excepciones para hacer rollback si hay un error
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Realizar ROLLBACK para deshacer cualquier cambio si ocurre un error
        ROLLBACK;
              SELECT 'Error: Error al procesar la Compra.' AS resultado;
    END;

    -- 4️⃣ Iniciar Transacción
    START TRANSACTION;

    -- Obtener el arqueo de caja abierto
    SELECT id_arqueo_caja INTO v_id_arqueo
    FROM arqueo_caja
    WHERE id_usuario = p_IdUsuario  and id_caja=p_IdCaja AND estado = 1
    ORDER BY fecha_inicio DESC
    LIMIT 1;


    -- 1️⃣ Insertar en compras (cabecera)
    INSERT INTO compras(
        tipo_pago,id_usuario_creacion, IdProveedor, subtotalcosto, iva, TotalCosto, TipoComprobante,
        NumeroFactura, nro_boletacompras,fecha_factura
    ) VALUES (
       'EFECTIVO', p_IdUsuario, p_IdProveedor, p_subtotal, p_iva, p_total_compra, p_TipoDocumento,
        p_NumeroFactura, p_Nro_compras,p_fechaCompra
    );

    -- Obtener el ID de la compra recién insertada
    SET v_IdCompra = LAST_INSERT_ID();

    -- Actualizar correlativo de compras
    UPDATE empresa
    SET nro_correlativo_compras = LPAD(nro_correlativo_compras + 1, 8, '0');


    IF v_id_arqueo IS NOT NULL then

         -- Obtener movimiento
    SELECT id_movimiento_caja INTO v_id_movimiento
    FROM movimiento_caja
    WHERE id_arqueo= v_id_arqueo and id_usuario = p_IdUsuario AND estado = 1 and tipo_movimiento='Egreso'
    and tipo_referencia='Gasto'
    ORDER BY fecha_registro DESC
    LIMIT 1;

      if v_id_movimiento is null then

        -- Insertar movimiento en caja
        INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
        VALUES (v_id_arqueo, 'Egreso', 'Gasto', p_IdUsuario);

        SET v_id_movimiento = LAST_INSERT_ID();

        END IF;

        -- Insertar en detalle_gastos
        INSERT INTO detalle_gastos (afectarCaja,id_movimiento_caja,tipo_gastos, tipo_pago, id_compras, nro_factura, nro_compras, nro_credito_compras,monto,descripcion)
        VALUES (p_afectarCaja,v_id_movimiento,'Compras', p_tipo_pago, v_IdCompra, p_NumeroFactura, p_Nro_compras, p_Nro_credito_compras,p_total_compra, 'Compra de mercaderia');

       END IF;

    -- 2️⃣ Insertar en detalle de compra
    INSERT INTO det_compra (
        IdCompra, IdProducto, Cantidad, PrecioUnitarioCompra,
         subtotalcosto, iva, TotalCosto,
        codigo_barra, nro_boleta
    )
    SELECT
        v_IdCompra,
        j.IdProducto,
        j.cantidad,
        j.PrecioUnitarioCompra,
        j.subtotalcosto,
        j.iva,
        j.TotalCosto,
        j.codigo_barra,
        p_Nro_compras
    FROM JSON_TABLE(p_detalle, '$[*]'
        COLUMNS (
            IdProducto INT PATH '$.id_producto',
            cantidad DECIMAL(10,2) PATH '$.cantidad',
            PrecioUnitarioCompra DECIMAL(10,2) PATH '$.precio_compra_producto',
            subtotalcosto DECIMAL(10,2) PATH '$.sub_total',
            iva DECIMAL(10,2) PATH '$.iva',
            TotalCosto DECIMAL(10,2) PATH '$.total',
            codigo_barra VARCHAR(25) PATH '$.codigo_producto'
        )
    ) AS j;

    -- 3️⃣ Actualizar stock en la tabla `producto`
    UPDATE producto p
    JOIN (
        SELECT
            IdProducto,
            SUM(cantidad) AS cantidad_comprada,
               MAX(PrecioUnitarioCompra) AS precio_reciente
        FROM JSON_TABLE(p_detalle, '$[*]'
            COLUMNS (
                IdProducto INT PATH '$.id_producto',
                cantidad DECIMAL(10,2) PATH '$.cantidad',
                  PrecioUnitarioCompra DECIMAL(10,2) PATH '$.precio_compra_producto'
            )
        ) AS j
        GROUP BY IdProducto
    ) AS detalles_compra
    ON p.id_producto = detalles_compra.IdProducto
    SET p.stock_producto = p.stock_producto + detalles_compra.cantidad_comprada,
        p.precio_compra_producto = detalles_compra.precio_reciente;


    -- 4️⃣ Insertar en lote_producto, obteniendo id_det_compra de det_compra
    INSERT INTO lote_producto (
        id_usuario_creacion, id_det_compra, id_producto, cantidad_comprada, cantidad_bonificada, stock_disponible,
        costo_unitario, fecha_vencimiento
    )
    SELECT
        p_IdUsuario,
        dc.IdDetCompra, -- Aquí se obtiene el IdDetCompra
        dc.IdProducto,
        dc.Cantidad,
        0, -- Ajustar cantidad bonificada si aplica
        dc.Cantidad,
        dc.PrecioUnitarioCompra,
        j.vence -- Fecha de vencimiento del JSON
    FROM det_compra dc
    JOIN JSON_TABLE(p_detalle, '$[*]'
        COLUMNS (
            IdProducto INT PATH '$.id_producto',
            vence DATE PATH '$.vence'
        )
    ) AS j ON dc.IdProducto = j.IdProducto AND dc.IdCompra = v_IdCompra; -- Asegurarse de que coincida con la compra actual

    -- 5️⃣ Registrar en `kardex`
INSERT INTO kardex (
    id_usuario_creacion,id_producto, codigo_producto, concepto, comprobante,
    entrada_unidades, entrada_costo_unitario, entrada_costo_total,
    existencia_unidades, existencia_costo_unitario, existencia_costo_total
)
SELECT
    p_IdUsuario,
    j.IdProducto,
    j.codigo_barra,
    'Compra de productos',
    p_Nro_compras,
    j.cantidad,
    j.PrecioUnitarioCompra,
    j.TotalCosto,
    (SELECT stock_producto FROM producto WHERE id_producto = j.IdProducto),  -- Existencia antes de la compra
    j.PrecioUnitarioCompra,
    ((SELECT stock_producto FROM producto WHERE id_producto = j.IdProducto) + j.cantidad) * j.PrecioUnitarioCompra -- Nuevo costo total
FROM JSON_TABLE(p_detalle, '$[*]'
    COLUMNS (
        IdProducto INT PATH '$.id_producto',
        cantidad DECIMAL(10,2) PATH '$.cantidad',
        PrecioUnitarioCompra DECIMAL(10,2) PATH '$.precio_compra_producto',
        TotalCosto DECIMAL(10,2) PATH '$.total',
        codigo_barra VARCHAR(25) PATH '$.codigo_producto'
    )
) AS j
JOIN producto p ON p.id_producto = j.IdProducto;

INSERT INTO log_auditoria (tabla, accion, usuario_id, detalle, id_registro_afectado, modulo)
VALUES (
  'compras/det_compra/producto/kardex/Movimiento en caja/gasto',
  'INSERT/UPDATE',
  p_IdUsuario,
  CONCAT('Compra registrada completa con ID: ', v_IdCompra),
  v_IdCompra,
  'Compra'
);

       -- Confirmar transacción
    COMMIT;
     SELECT 'Se realizado con éxito la Compra.' AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GuardarMarca` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GuardarMarca`(
 in p_id_marca int ,
 in p_nombre VARCHAR(50),
 in p_id_usuario int)
BEGIN

    DECLARE existe_nombre INT DEFAULT 0;
    DECLARE mensaje VARCHAR(255);
         

     -- Eliminar espacios al inicio y fin
    SET p_nombre = LTRIM(RTRIM(p_nombre));

    -- Verifica si el nombre ya existe (excluyendo el mismo ID en caso de actualización)
    IF p_id_marca > 0 THEN
        SELECT COUNT(*) INTO existe_nombre
        FROM marca
        WHERE nombre = p_nombre
          AND id_marca <> p_id_marca;
    ELSE
        SELECT COUNT(*) INTO existe_nombre
        FROM marca
        WHERE nombre = p_nombre;
    END IF;

    IF existe_nombre > 0 THEN
        SET mensaje = 'Warning: Ya existe una Marca con el mismo nombre.';
    ELSE
        IF p_id_marca > 0 THEN
            -- Actualización
            UPDATE marca
            SET nombre = p_nombre,
                id_usuario_actualizacion=p_id_usuario
            WHERE id_marca = p_id_marca;
                       
      --      INSERT INTO log_auditoria (tabla, accion, usuario_id, detalle)
      --      VALUES (tablas, 'Actualizar', p_id_usuario,
       --             CONCAT('Actualizar una Categoria con el id: ', p_id_categoria));

            SET mensaje = 'Marca actualizada con éxito.';
        ELSE
            -- Inserción
            INSERT INTO marca (nombre,id_usuario_creacion )
            VALUES (p_nombre,p_id_usuario);

        --    INSERT INTO log_auditoria (tabla, accion, usuario_id, detalle)
         --   VALUES (tablas, 'Registrar', p_id_usuario, 'Registrar una Categoria');

            SET mensaje = 'Marca registrada con éxito.';
         
        END IF;
    END IF;

    -- Devuelve el mensaje final
    SELECT mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GuardarMedidas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GuardarMedidas`( 
    IN p_id_medidas INT,
    IN p_nombre VARCHAR(200),
    IN p_nombre_corto VARCHAR(20),
    IN p_id_usuario INT
)
BEGIN
  DECLARE tablas VARCHAR(30);
    DECLARE v_count_nombre INT;
    DECLARE v_count_nombre_corto INT;
    DECLARE mensaje VARCHAR(255);

    SET tablas = 'medidas';

        -- Eliminar espacios al inicio y fin
    SET p_nombre = LTRIM(RTRIM(p_nombre));
    SET p_nombre_corto = LTRIM(RTRIM(p_nombre_corto));
        
    -- Verificar si el nombre ya existe
    IF (p_id_medidas > 0) THEN
        SELECT COUNT(*) INTO v_count_nombre
        FROM medidas
        WHERE nombre = p_nombre AND id_medida <> p_id_medidas;

        SELECT COUNT(*) INTO v_count_nombre_corto
        FROM medidas
        WHERE nombre_corto = p_nombre_corto AND id_medida <> p_id_medidas;
    ELSE
        SELECT COUNT(*) INTO v_count_nombre
        FROM medidas
        WHERE nombre = p_nombre;

        SELECT COUNT(*) INTO v_count_nombre_corto
        FROM medidas
        WHERE nombre_corto = p_nombre_corto;
    END IF;

    -- Validaciones
    IF v_count_nombre > 0 THEN
        SET mensaje = 'Warning: Ya existe una medida con el mismo nombre.';
    ELSEIF v_count_nombre_corto > 0 THEN
        SET mensaje = 'Warning: Ya existe una medida con el mismo nombre corto.';
    ELSE
        IF (p_id_medidas > 0) THEN
            UPDATE medidas
            SET nombre = p_nombre,
                nombre_corto = p_nombre_corto
            WHERE id_medida = p_id_medidas;

            INSERT INTO log_auditoria (
                tabla, accion, usuario_id, detalle
            ) VALUES (
                tablas, 'Actualizar', p_id_usuario,
                CONCAT('Actualizar una Medidas con el id: ', p_id_medidas)
            );

            SET mensaje = 'Medidas actualizada con éxito.';
        ELSE
            INSERT INTO medidas(nombre, nombre_corto)
            VALUES (p_nombre, p_nombre_corto);

            INSERT INTO log_auditoria (
                tabla, accion, usuario_id, detalle
            ) VALUES (
                tablas, 'Registrar', p_id_usuario,
                'Registrar una Medidas'
            );

            SET mensaje = 'Medidas registrada con éxito.';
        END IF;
    END IF;

    SELECT mensaje AS resultado;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GuardarMovimientoEntrada` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GuardarMovimientoEntrada`(
    IN p_id INT,
    IN p_IdUsuario INT,
    IN p_IdCaja INT,
    IN p_tipo_pago INT,
    IN p_Monto DECIMAL(10,2),
    IN p_descripcion VARCHAR(200)
)
BEGIN
    DECLARE v_id_arqueo INT;
    DECLARE v_id_movimiento INT;
    DECLARE mensaje VARCHAR(255);

    -- Obtener el arqueo de caja abierto
    SELECT id_arqueo_caja INTO v_id_arqueo
    FROM arqueo_caja
    WHERE id_usuario = p_IdUsuario AND id_caja = p_IdCaja AND estado = 1
    ORDER BY fecha_inicio DESC
    LIMIT 1;

    IF v_id_arqueo IS NOT NULL THEN

        -- Obtener movimiento
        SELECT id_movimiento_caja INTO v_id_movimiento
        FROM movimiento_caja
        WHERE id_arqueo = v_id_arqueo AND id_usuario = p_IdUsuario AND estado = 1 
              AND tipo_movimiento = 'Ingreso' AND tipo_referencia = 'Ingreso'
        ORDER BY fecha_registro DESC
        LIMIT 1;

        IF v_id_movimiento IS NULL THEN
            -- Insertar movimiento en caja
            INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
            VALUES (v_id_arqueo, 'Ingreso', 'Ingreso', p_IdUsuario);

            SET v_id_movimiento = LAST_INSERT_ID();
        END IF;

        IF p_id IS NOT NULL AND p_id > 0 THEN
            -- Actualizar ingreso existente
            UPDATE detalle_ingresos
            SET tipo_pago = p_tipo_pago,
                monto = p_Monto,
                descripcion = p_descripcion
            WHERE id = p_id;
            
            SET mensaje = 'El ingreso se actualizó con éxito.';
        ELSE
            -- Insertar nuevo ingreso
            INSERT INTO detalle_ingresos (id_movimiento_caja, tipo_ingresos, tipo_pago, monto, descripcion)
            VALUES (v_id_movimiento, 'Otros', p_tipo_pago, p_Monto, p_descripcion);
            
            SET mensaje = 'El ingreso se registró con éxito.';
        END IF;
    ELSE
        SET mensaje = 'No existe un arqueo de caja abierto para este usuario y caja.';
    END IF;

    -- Devolver el mensaje final
    SELECT mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GuardarMovimientoSalida` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GuardarMovimientoSalida`(
    IN p_id INT,
    IN p_IdUsuario INT,
    IN p_IdCaja INT,
    IN p_tipo_pago INT,
    IN p_monto DECIMAL(10,2),
    IN p_descripcion VARCHAR(200)
)
BEGIN
    DECLARE v_id_arqueo INT;
    DECLARE v_id_movimiento INT;
    DECLARE mensaje VARCHAR(255);

    -- Obtener el arqueo de caja abierto
    SELECT id_arqueo_caja INTO v_id_arqueo
    FROM arqueo_caja
    WHERE id_usuario = p_IdUsuario AND id_caja = p_IdCaja AND estado = 1
    ORDER BY fecha_inicio DESC
    LIMIT 1;

    IF v_id_arqueo IS NOT NULL THEN

        -- Obtener movimiento de egreso/gasto
        SELECT id_movimiento_caja INTO v_id_movimiento
        FROM movimiento_caja
        WHERE id_arqueo = v_id_arqueo AND id_usuario = p_IdUsuario AND estado = 1 
              AND tipo_movimiento = 'Egreso' AND tipo_referencia = 'Gasto'
        ORDER BY fecha_registro DESC
        LIMIT 1;

        IF v_id_movimiento IS NULL THEN
            -- Insertar movimiento en caja
            INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
            VALUES (v_id_arqueo, 'Egreso', 'Gasto', p_IdUsuario);

            SET v_id_movimiento = LAST_INSERT_ID();
        END IF;

        IF p_id IS NOT NULL AND p_id > 0 THEN
            -- Actualizar gasto existente
            UPDATE detalle_gastos
            SET tipo_pago = p_tipo_pago,
                monto = p_monto,
                descripcion = p_descripcion
            WHERE id = p_id;

            SET mensaje = 'El gasto se actualizó con éxito.';
        ELSE
            -- Insertar nuevo gasto
            INSERT INTO detalle_gastos (id_movimiento_caja, afectarCaja, tipo_gastos, tipo_pago, monto, descripcion)
            VALUES (v_id_movimiento, 1, 'Otros', p_tipo_pago, p_monto, p_descripcion);

            SET mensaje = 'El gasto se registró con éxito.';
        END IF;
    ELSE
        SET mensaje = 'No existe un arqueo de caja abierto para este usuario y caja.';
    END IF;

    -- Devuelve el mensaje final
    SELECT mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GuardarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GuardarProducto`(
    IN p_id_producto INT,
    IN p_codigo_barra VARCHAR(20),
    IN p_id_categoria_producto INT,
    IN p_id_marca_producto INT,
    IN p_id_unidades INT,
    IN p_descripcion_producto VARCHAR(100),
    IN p_img_producto VARCHAR(100),
    IN p_precio_compra_producto DECIMAL(10,2),
    IN p_precio_venta_producto DECIMAL(10,2),
    IN p_precio_1_producto DECIMAL(10,2),
    IN p_precio_2_producto DECIMAL(10,2),
    IN p_lleva_iva_producto INT,
    IN p_stock_producto FLOAT,
    IN p_minimo_stock_producto FLOAT,    
    IN p_perecedero_producto INT,
    IN p_id_usuario INT,
    IN p_fecha_vencimiento DATE
)
BEGIN
    DECLARE mensaje VARCHAR(255);
    DECLARE J_concepto VARCHAR(600);
    DECLARE J_IdProducto INT;
    DECLARE existe INT;
    DECLARE asiento_id INT;
    DECLARE  costo_total_producto DECIMAL(10.2);

    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
    BEGIN
        ROLLBACK;
        SELECT 'Error: interno en la base de datos.' AS resultado;
    END;

    START TRANSACTION;
    main: BEGIN
	        -- Eliminar espacios al inicio y fin
    SET p_codigo_barra = LTRIM(RTRIM(p_codigo_barra));
	SET p_descripcion_producto = LTRIM(RTRIM(p_descripcion_producto));
	SET costo_total_producto=p_stock_producto*p_precio_compra_producto;
	    -- Validación de código de barra duplicado
        IF p_id_producto > 0 THEN
            SELECT COUNT(*) INTO existe 
            FROM producto 
            WHERE codigo_barra = p_codigo_barra AND id_producto != p_id_producto;
        ELSE
            SELECT COUNT(*) INTO existe 
            FROM producto 
            WHERE codigo_barra = p_codigo_barra;
        END IF;

        IF existe > 0 THEN
            SET mensaje = 'Warning: El código de barra ya está registrado para otro producto.';
            SELECT mensaje AS resultado;
            LEAVE main;
        END IF;

        -- Actualización
        IF p_id_producto > 0 THEN
            UPDATE producto SET
                id_categoria_producto = p_id_categoria_producto,
                id_marca=p_id_marca_producto,
                id_unidades = p_id_unidades,
                descripcion_producto = p_descripcion_producto,
                precio_venta_producto = p_precio_venta_producto,
                precio_1_producto = p_precio_1_producto,
                precio_2_producto = p_precio_2_producto,
                lleva_iva_producto = p_lleva_iva_producto,
                minimo_stock_producto = p_minimo_stock_producto,
                perecedero_producto = p_perecedero_producto,
                id_usuario_actualizacion = p_id_usuario,
                 img_producto = p_img_producto
            WHERE id_producto = p_id_producto;

            -- Log auditoría
            INSERT INTO log_auditoria (
                tabla, accion, usuario_id, detalle, id_registro_afectado, modulo
            ) VALUES (
                'producto', 'UPDATE', p_id_usuario,
                CONCAT('Actualización del producto. ID: ', p_id_producto, ', Descripción: ', p_descripcion_producto),
                p_id_producto, 'PRODUCTO'
            );

            SET mensaje = 'Producto actualizado con éxito.';

        -- Inserción
        ELSE
            INSERT INTO producto (
                codigo_barra, id_categoria_producto,id_marca, id_unidades,
                descripcion_producto, img_producto, precio_compra_producto,
                precio_venta_producto, precio_1_producto, precio_2_producto,
                lleva_iva_producto, stock_producto,
                minimo_stock_producto, perecedero_producto,
                id_usuario_creacion
            ) VALUES (
                p_codigo_barra, p_id_categoria_producto, p_id_marca_producto,p_id_unidades,
                p_descripcion_producto, p_img_producto, p_precio_compra_producto,
                p_precio_venta_producto, p_precio_1_producto, p_precio_2_producto,
                p_lleva_iva_producto, p_stock_producto,
                p_minimo_stock_producto, p_perecedero_producto,
                p_id_usuario
            );

            SET J_IdProducto = LAST_INSERT_ID();
            -- Log auditoría
            INSERT INTO log_auditoria (
                tabla, accion, usuario_id, detalle, id_registro_afectado, modulo
            ) VALUES (
                'producto / lote_producto / kardex', 'INSERT', p_id_usuario,
                CONCAT('Registro de producto nuevo. Código: ', p_codigo_barra, ', Descripción: ', p_descripcion_producto),
                J_IdProducto, 'PRODUCTO'
            );
            -- Insertar lote
            IF p_perecedero_producto = 1 THEN
                INSERT INTO lote_producto (
                    id_usuario_creacion, id_producto,
                    cantidad_comprada, stock_disponible,
                    costo_unitario, fecha_vencimiento
                ) VALUES (
                    p_id_usuario, J_IdProducto,
                    p_stock_producto, p_stock_producto,
                    p_precio_compra_producto, p_fecha_vencimiento
                );
            ELSE
                INSERT INTO lote_producto (
                    id_usuario_creacion, id_producto,
                    cantidad_comprada, stock_disponible,
                    costo_unitario
                ) VALUES (
                    p_id_usuario, J_IdProducto,
                    p_stock_producto, p_stock_producto,
                    p_precio_compra_producto
                );
            END IF;

            -- Insertar en Kardex
            SET J_concepto = 'INVENTARIO INICIAL';
            INSERT INTO KARDEX (
                id_usuario_creacion, id_producto, codigo_producto,
                concepto, existencia_unidades, existencia_costo_unitario,
                existencia_costo_total
            ) VALUES (
                p_id_usuario, J_IdProducto, p_codigo_barra,
                J_concepto, p_stock_producto, p_precio_compra_producto,
                costo_total_producto
            );

            -- Asiento contable
            INSERT INTO asiento_contable (
                fecha, descripcion, tipo_asiento, id_referencia,
                modulo_origen, total_debe, total_haber, tipo_referencia
            ) VALUES (
                CURDATE(), CONCAT('Inventario inicial del producto ', p_descripcion_producto),
                'INVENTARIO_INICIAL', J_IdProducto,
                'PRODUCTO', costo_total_producto, costo_total_producto,
                'producto'
            );

            SET asiento_id = LAST_INSERT_ID();

            -- Detalle asiento - Debe
            INSERT INTO detalle_asiento (
                id_asiento, id_cuenta, debe, descripcion, orden
            ) VALUES (
                asiento_id, 9, costo_total_producto,CONCAT( 'Registro de inventario inicial', p_descripcion_producto), 1
            );

            -- Detalle asiento - Haber
            INSERT INTO detalle_asiento (
                id_asiento, id_cuenta, haber, descripcion, orden
            ) VALUES (
                asiento_id, 13, costo_total_producto, CONCAT('Contrapartida por ajuste de producto ', p_descripcion_producto), 2
            );

            SET mensaje = 'Producto registrado con éxito.';
        END IF;

        COMMIT;
        SELECT mensaje AS resultado;

    END main;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GuardarProductoLote` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GuardarProductoLote`(
    IN p_id_producto INT,
    IN p_codigo_barra VARCHAR(20),
    IN p_id_categoria_producto INT,
    IN p_id_marca_producto INT,
    IN p_id_unidades INT,
    IN p_descripcion_producto VARCHAR(100),
    IN p_img_producto VARCHAR(100),
    IN p_precio_compra_producto DECIMAL(10,2),
    IN p_precio_venta_producto DECIMAL(10,2),
    IN p_precio_1_producto DECIMAL(10,2),
    IN p_precio_2_producto DECIMAL(10,2),
    IN p_lleva_iva_producto INT,
    IN p_stock_producto DECIMAL(10,2),
    IN p_minimo_stock_producto DECIMAL(10,2),    
    IN p_perecedero_producto INT,
    IN p_id_usuario INT,
    IN p_fecha_vencimiento DATE
)
BEGIN
    DECLARE v_status VARCHAR(10);
    DECLARE v_mensaje VARCHAR(255);
    DECLARE v_sql_state VARCHAR(10);
    DECLARE v_sql_message VARCHAR(255);
    DECLARE v_j_id_producto INT;
    DECLARE v_existe INT;
    DECLARE v_asiento_id INT;
    DECLARE v_costo_total_producto DECIMAL(10,2); 
    
    -- ¡CORRECCIÓN AQUÍ! Declarar v_concepto_kardex como variable local
    DECLARE v_concepto_kardex VARCHAR(600); 

    -- Manejador de errores general para cualquier SQLEXCEPTION
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        GET DIAGNOSTICS CONDITION 1
            v_sql_state = RETURNED_SQLSTATE,
            v_sql_message = MESSAGE_TEXT;
        
        IF (@in_transaction IS NOT NULL AND @in_transaction = 1) THEN
            ROLLBACK;
            SET @in_transaction = 0;
        END IF;

        SET v_status = 'error';
        SET v_mensaje = CONCAT('Error de BD (', v_sql_state, '): ', v_sql_message);
        SELECT JSON_OBJECT('status', v_status, 'mensaje', v_mensaje) AS resultado;
    END;

    SET @in_transaction = 1;
    START TRANSACTION;

    main: BEGIN
       
	    SET p_codigo_barra = LTRIM(RTRIM(p_codigo_barra));
	    SET p_descripcion_producto = LTRIM(RTRIM(p_descripcion_producto));
	    
	    SET v_costo_total_producto = p_stock_producto * p_precio_compra_producto;

	    IF p_id_producto > 0 THEN
            SELECT COUNT(*) INTO v_existe 
            FROM producto 
            WHERE codigo_barra = p_codigo_barra AND id_producto != p_id_producto;
        ELSE
            SELECT COUNT(*) INTO v_existe 
            FROM producto 
            WHERE codigo_barra = p_codigo_barra;
        END IF;

        IF v_existe > 0 THEN
            SET v_status = 'warning';
            SET v_mensaje = 'El código de barra ya está registrado para otro producto.';
            SELECT JSON_OBJECT('status', v_status, 'mensaje', v_mensaje) AS resultado;
            LEAVE main;
        END IF;

        IF p_id_producto > 0 THEN
            UPDATE producto SET
                id_categoria_producto = p_id_categoria_producto,
                id_marca = p_id_marca_producto,
                id_unidades = p_id_unidades,
                descripcion_producto = p_descripcion_producto,
                precio_venta_producto = p_precio_venta_producto,
                precio_1_producto = p_precio_1_producto,
                precio_2_producto = p_precio_2_producto,
                lleva_iva_producto = p_lleva_iva_producto,
                minimo_stock_producto = p_minimo_stock_producto,
                perecedero_producto = p_perecedero_producto,
                id_usuario_actualizacion = p_id_usuario,
                img_producto = p_img_producto
            WHERE id_producto = p_id_producto;

            INSERT INTO log_auditoria (
                tabla, accion, usuario_id, detalle, id_registro_afectado, modulo
            ) VALUES (
                'producto', 'UPDATE', p_id_usuario,
                CONCAT('Actualización del producto. ID: ', p_id_producto, ', Descripción: ', p_descripcion_producto),
                p_id_producto, 'PRODUCTO'
            );

            SET v_status = 'success';
            SET v_mensaje = 'Producto actualizado con éxito.';

        ELSE
            INSERT INTO producto (
                codigo_barra, id_categoria_producto, id_marca, id_unidades,
                descripcion_producto, img_producto, precio_compra_producto,
                precio_venta_producto, precio_1_producto, precio_2_producto,
                lleva_iva_producto, stock_producto,
                minimo_stock_producto, perecedero_producto,
                id_usuario_creacion
            ) VALUES (
                p_codigo_barra, p_id_categoria_producto, p_id_marca_producto, p_id_unidades,
                p_descripcion_producto, p_img_producto, p_precio_compra_producto,
                p_precio_venta_producto, p_precio_1_producto, p_precio_2_producto,
                p_lleva_iva_producto, p_stock_producto,
                p_minimo_stock_producto, p_perecedero_producto,
                p_id_usuario
            );

            SET v_j_id_producto = LAST_INSERT_ID();

            INSERT INTO log_auditoria (
                tabla, accion, usuario_id, detalle, id_registro_afectado, modulo
            ) VALUES (
                'producto / lote_producto / kardex', 'INSERT', p_id_usuario,
                CONCAT('Registro de producto nuevo. Código: ', p_codigo_barra, ', Descripción: ', p_descripcion_producto),
                v_j_id_producto, 'PRODUCTO'
            );

            IF p_perecedero_producto = 1 THEN
                INSERT INTO lote_producto (
                    id_usuario_creacion, id_producto,
                    cantidad_comprada, stock_disponible,
                    costo_unitario, fecha_vencimiento
                ) VALUES (
                    p_id_usuario, v_j_id_producto,
                    p_stock_producto, p_stock_producto,
                    p_precio_compra_producto, p_fecha_vencimiento
                );
            ELSE
                INSERT INTO lote_producto (
                    id_usuario_creacion, id_producto,
                    cantidad_comprada, stock_disponible,
                    costo_unitario
                ) VALUES (
                    p_id_usuario, v_j_id_producto,
                    p_stock_producto, p_stock_producto,
                    p_precio_compra_producto
                );
            END IF;

            -- ¡CORRECCIÓN AQUÍ! Usar v_concepto_kardex
            SET v_concepto_kardex = 'INVENTARIO INICIAL'; 
            INSERT INTO KARDEX (
                id_usuario_creacion, id_producto, codigo_producto,
                concepto, existencia_unidades, existencia_costo_unitario,
                existencia_costo_total
            ) VALUES (
                p_id_usuario, v_j_id_producto, p_codigo_barra,
                v_concepto_kardex, p_stock_producto, p_precio_compra_producto,
                v_costo_total_producto
            );

            INSERT INTO asiento_contable (
                fecha, descripcion, tipo_asiento, id_referencia,
                modulo_origen, total_debe, total_haber, tipo_referencia
            ) VALUES (
                CURDATE(), CONCAT('Inventario inicial del producto ', p_descripcion_producto),
                'INVENTARIO_INICIAL', v_j_id_producto,
                'PRODUCTO', v_costo_total_producto, v_costo_total_producto,
                'producto'
            );

            SET v_asiento_id = LAST_INSERT_ID();

            INSERT INTO detalle_asiento (
                id_asiento, id_cuenta, debe, descripcion, orden
            ) VALUES (
                v_asiento_id, 9, v_costo_total_producto, CONCAT( 'Registro de inventario inicial', p_descripcion_producto), 1
            );

            INSERT INTO detalle_asiento (
                id_asiento, id_cuenta, haber, descripcion, orden
            ) VALUES (
                v_asiento_id, 13, v_costo_total_producto, CONCAT('Contrapartida por ajuste de producto ', p_descripcion_producto), 2
            );

            SET v_status = 'success';
            SET v_mensaje = 'Producto registrado con éxito.';
        END IF;

        COMMIT;
        SET @in_transaction = 0;
        
        SELECT JSON_OBJECT(
            'status', v_status,
            'mensaje', v_mensaje
        ) AS resultado;

    END main;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GuardarProveedor` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GuardarProveedor`(
    IN p_id_proveedor INT,
    IN p_ruc VARCHAR(15), 
    IN p_nombre VARCHAR(100),
    IN p_razon_social VARCHAR(100),
    IN p_telefono VARCHAR(13),
    IN p_email VARCHAR(100),
    IN p_direccion VARCHAR(100), 
    IN p_id_usuario INT
)
BEGIN
    DECLARE v_existe INT DEFAULT 0;
    DECLARE mensaje VARCHAR(255);
    DECLARE tablas VARCHAR(30) DEFAULT 'proveedor';
    DECLARE v_IdProveedor  INT DEFAULT 0;

	-- Eliminar espacios al inicio y fin
    SET p_ruc = LTRIM(RTRIM(p_ruc));
	SET p_nombre = LTRIM(RTRIM(p_nombre));
	SET p_razon_social = LTRIM(RTRIM(p_razon_social));
	SET p_telefono = LTRIM(RTRIM(p_telefono));
    SET p_email = LTRIM(RTRIM(p_email));
	SET p_direccion = LTRIM(RTRIM(p_direccion));
    -- Verificar si el RUC ya existe en otro proveedor
    IF p_id_proveedor > 0 THEN
        SELECT COUNT(*) INTO v_existe
        FROM proveedor
        WHERE ruc = p_ruc AND id_proveedor <> p_id_proveedor;
    ELSE
        SELECT COUNT(*) INTO v_existe
        FROM proveedor
        WHERE ruc = p_ruc;
    END IF;

    IF v_existe > 0 THEN
        SET mensaje = 'Warning: El RUC ingresado ya está registrado.';
    ELSEIF p_id_proveedor > 0 THEN
        -- Actualizar proveedor existente
        UPDATE proveedor
        SET
            ruc = p_ruc, 
            nombre = p_nombre,
            razon_social = p_razon_social,
            telefono = p_telefono,
            email = p_email,
            direccion = p_direccion,
            id_usuario_actualizacion = p_id_usuario,
            fecha_actualizacion = NOW()
        WHERE id_proveedor = p_id_proveedor;
    
        INSERT INTO log_auditoria (tabla, accion, usuario_id, detalle,id_registro_afectado,modulo)
            VALUES (tablas, 'Actualizar', p_id_usuario, 
                CONCAT('Actualizar un Proveedor con el id: ', p_id_proveedor),p_id_proveedor,'Proveedor');

        SET mensaje = 'Proveedor actualizado con éxito.';
    ELSE
        -- Insertar nuevo proveedor
        INSERT INTO proveedor (
            ruc, nombre, razon_social, telefono,
            email, direccion, id_usuario_creacion
        ) VALUES (
            p_ruc, p_nombre, p_razon_social, p_telefono,
            p_email, p_direccion, p_id_usuario
        );
         SET v_IdProveedor = LAST_INSERT_ID();
     
            INSERT INTO log_auditoria (tabla, accion, usuario_id, detalle,id_registro_afectado,modulo)
            VALUES (tablas, 'Actualizar', p_id_usuario, 
                CONCAT('Registrar un Proveedor con el id: ', v_IdProveedor),v_IdProveedor,'Proveedor');
        SET mensaje = 'Proveedor registrado con éxito.';
    END IF;

    -- Devolver resultado
    SELECT mensaje AS resultado;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GuardarVentaCreditos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GuardarVentaCreditos`(
 IN p_IdUsuario INT,
    IN p_IdCaja INT,
    IN p_IdCliente INT,
    IN p_nro_boleta VARCHAR(25),
    IN p_tipo_pago CHAR(30),
    IN p_TipoDocumento VARCHAR(25),
    IN p_CantidadTotal DECIMAL(10,2),
    IN p_iva DECIMAL(10,2),
    IN p_subtotal DECIMAL(10,2),
    IN p_total_venta DECIMAL(10,2),
    IN p_ImporteRecibido DECIMAL(10,2),
    IN p_ImporteCambio DECIMAL(10,2),
    IN p_nro_credito_venta VARCHAR(25),
    in p_fechaVence DATE,
    IN p_detalle JSON 
)
begin
	
	 DECLARE v_IdVenta INT;
    DECLARE v_id_detalle INT;
    DECLARE v_id_stock INT;
    DECLARE v_cantidad_disponible INT;
   
    
    DECLARE v_cantidad_restante INT;
    DECLARE v_cantidad_bonificada INT;
   
  
    DECLARE v_costo_unitario DECIMAL(10,2);
   -- Kardex
    DECLARE v_stock_actual INT;
    DECLARE v_existencia_costo_total DECIMAL(10,2);
   
    DECLARE v_id_arqueo INT;
    DECLARE v_id_movimiento INT;
   
     -- Variables para recorrer JSON
   DECLARE v_id_producto INT;
   DECLARE v_codigo_barra VARCHAR(25);
   DECLARE v_descripcion_producto VARCHAR(100);
   DECLARE v_cantidad_vender INT;
   DECLARE v_precio_unitario DECIMAL(10,2);
   DECLARE v_iva_item  DECIMAL(10,2);
   DECLARE v_subtotal_item  DECIMAL(10,2);
   DECLARE v_total_venta_item  DECIMAL(10,2);

    DECLARE done INT DEFAULT FALSE;
    
    DECLARE cur CURSOR FOR 
        SELECT 
            IdProducto, codigo_barra, descripcion_producto, cantidad, 
            PrecioUnidad, iva, Sub_total, total_venta
        FROM JSON_TABLE(p_detalle, '$[*]' 
            COLUMNS (
                IdProducto INT PATH '$.id_producto',
                codigo_barra VARCHAR(25) PATH '$.codigo_barra',
                descripcion_producto VARCHAR(100) PATH '$.descripcion_producto',
                cantidad INT PATH '$.cantidad',
                PrecioUnidad DECIMAL(10,2) PATH '$.precio_venta',
                iva DECIMAL(10,2) PATH '$.iva',
                Sub_total DECIMAL(10,2) PATH '$.subtotal',
                total_venta DECIMAL(10,2) PATH '$.total'
            )
        )AS jt;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    -- Manejador de excepciones para hacer rollback si hay un error
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
    BEGIN
        -- Realizar ROLLBACK para deshacer cualquier cambio si ocurre un error
        ROLLBACK;
      
      SELECT 'Error: Error al procesar la venta.' AS resultado;
    END;

   
    -- 4️⃣ Iniciar Transacción
    START TRANSACTION;
       -- Obtener el arqueo de caja abierto
    SELECT id_arqueo_caja INTO v_id_arqueo
    FROM arqueo_caja
    WHERE id_usuario = p_IdUsuario  and id_caja=p_IdCaja AND estado = 1
    ORDER BY fecha_inicio DESC
    LIMIT 1;
    
     IF v_id_arqueo IS NOT NULL then
      
         -- Obtener movimiento
    SELECT id_movimiento_caja INTO v_id_movimiento
    FROM movimiento_caja
    WHERE id_arqueo= v_id_arqueo and id_usuario = p_IdUsuario AND estado = 1 and tipo_movimiento='Ingreso'
    and tipo_referencia='Ingreso'
    ORDER BY fecha_registro DESC
    LIMIT 1;
    
      if v_id_movimiento is null then
        -- Insertar movimiento en caja
        INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
        VALUES (v_id_arqueo, 'Ingreso', 'Ingreso', p_IdUsuario);
        
        SET v_id_movimiento = LAST_INSERT_ID();
        END IF;

      
   
    -- 1️⃣ Insertar en ventas (cabecera)
    INSERT INTO ventas (
        id_usuario_creacion, Id_caja, IdCliente, nro_boleta, tipo_pago, 
        TipoDocumento, CantidadTotal, iva, subtotal, total_venta, 
        ImporteRecibido, ImporteCambio, abono_credito
    ) VALUES (
        p_IdUsuario, p_IdCaja, p_IdCliente, p_nro_boleta, 'CREDITO', 
        p_TipoDocumento, p_CantidadTotal, p_iva, p_subtotal, p_total_venta, 
        p_ImporteRecibido, p_ImporteCambio, p_ImporteRecibido
    );

    SET v_IdVenta = LAST_INSERT_ID();
   
           -- Insertar en detalle_ingresos
      
 INSERT INTO detalle_ingresos (id_movimiento_caja, tipo_ingresos, tipo_pago,id_ventas,nro_ventas, monto,descripcion)
        VALUES (v_id_movimiento, 'Ventas', 2, v_IdVenta,p_nro_boleta,p_ImporteRecibido,'Venta de producto');

 --  Insertar en ventas_credito

    INSERT INTO ventas_credito (

        id_venta , id_cliente ,nroCreditoVentas, monto_total ,monto_abonado ,saldo_pendiente ,fecha_vencimiento

    ) VALUES (

        v_IdVenta, p_IdCliente, p_nro_credito_venta,p_total_venta, p_ImporteRecibido, p_ImporteCambio,p_fechaVence

    );


      UPDATE empresa SET 	nro_correlativo_ventas = LPAD(nro_correlativo_ventas + 1,8,'0'),nro_credito_ventas = LPAD(nro_credito_ventas + 1,8,'0')

                  where id_Empresa=1;

   
   -- 2️⃣ Recorrer los productos vendidos
    OPEN cur;
    read_loop: LOOP
      FETCH cur INTO v_id_producto, v_codigo_barra, v_descripcion_producto, v_cantidad_vender, 
              v_precio_unitario, v_iva_item , v_subtotal_item , v_total_venta_item ;

        IF done THEN 
            LEAVE read_loop;
        END IF;
    IF v_id_producto IS NOT NULL THEN
        -- Insertar en det_venta
        INSERT INTO det_venta (
            IdVenta,nro_boleta, IdProducto, codigo_barra, descripcion_producto, cantidad, 
            PrecioUnidad, iva, Sub_total, total_venta
        ) VALUES (
            v_IdVenta,p_nro_boleta, v_id_producto, v_codigo_barra,v_descripcion_producto,v_cantidad_vender,
            v_precio_unitario, v_iva_item  , v_subtotal_item , v_total_venta_item 
        );

        SET v_id_detalle = LAST_INSERT_ID();
        SET v_cantidad_restante = v_cantidad_vender;

        -- 3️⃣ Descontar stock en FIFO
        WHILE v_cantidad_restante > 0 DO
            -- Obtener el stock más antiguo disponible para el producto
            SELECT id_lote, stock_disponible, cantidad_bonificada, costo_unitario
            INTO v_id_stock, v_cantidad_disponible, v_cantidad_bonificada, v_costo_unitario
            FROM lote_producto 
            WHERE id_producto = v_id_producto 
            AND stock_disponible > 0
            ORDER BY fecha_vencimiento ASC
            LIMIT 1;
            
       
            -- Verificar si hay bonificación disponible
      --      IF v_cantidad_bonificada > 0 THEN
      --          IF v_cantidad_restante <= v_cantidad_bonificada THEN
      --              UPDATE lote_producto
      --              SET cantidad_bonificada = cantidad_bonificada - v_cantidad_restante
      --              WHERE id_lote = v_id_stock;
      --              SET v_cantidad_restante = 0;
      --          ELSE
      --              SET v_cantidad_restante = v_cantidad_restante - v_cantidad_bonificada;
      --              UPDATE lote_producto
      --              SET cantidad_bonificada = 0
      --              WHERE id_lote = v_id_stock;
      --          END IF;
      --      END IF;

            -- Descontar del stock normal si aún hay unidades por vender
            IF v_cantidad_restante > 0 THEN
                IF v_cantidad_restante <= v_cantidad_disponible THEN
                    UPDATE lote_producto
                    SET stock_disponible = stock_disponible - v_cantidad_restante
                    WHERE id_lote = v_id_stock;
            
               UPDATE lote_producto
                    SET estado = 2
                   WHERE id_lote = v_id_stock AND stock_disponible = 0;
                    
                    -- Registrar en detalle_venta_stock
                    INSERT INTO det_venta_lote (
                       id_det_venta, id_lote , cantidad_vendida, precio_venta, costo_unitario
                    ) VALUES (
                        v_id_detalle, v_id_stock, v_cantidad_restante, v_precio_unitario, v_costo_unitario
                    );

                    SET v_cantidad_restante = 0;
                ELSE
                    UPDATE lote_producto
                    SET stock_disponible = 0
                    WHERE id_lote = v_id_stock;
                    
                     UPDATE lote_producto
                    SET estado = 2
                   WHERE id_lote = v_id_stock AND stock_disponible = 0;
                    
                    -- Registrar en detalle_venta_stock
                    INSERT INTO det_venta_lote (
                        id_det_venta, id_lote , cantidad_vendida, precio_venta, costo_unitario
                    ) VALUES (
                        v_id_detalle, v_id_stock, v_cantidad_disponible, v_precio_unitario, v_costo_unitario
                    );

                    SET v_cantidad_restante = v_cantidad_restante - v_cantidad_disponible;
                END IF;
            END IF;
        END WHILE;
       
       
       
       -- 4️⃣ Registrar salida en `kardex`
        SELECT stock_producto INTO v_stock_actual FROM producto WHERE id_producto = v_id_producto;
        SET v_stock_actual = v_stock_actual - v_cantidad_vender;
        SET v_existencia_costo_total = v_stock_actual * v_costo_unitario;

        INSERT INTO kardex (
            id_usuario_creacion,id_producto, codigo_producto, concepto, comprobante, 
            salidad_unidades, salidad_costo_unitario, salidad_costo_total, 
            existencia_unidades, existencia_costo_unitario, existencia_costo_total
        ) VALUES (
           p_IdUsuario, v_id_producto, v_codigo_barra, 'Venta de producto', p_nro_boleta, 
            v_cantidad_vender, v_costo_unitario, v_cantidad_vender * v_costo_unitario, 
            v_stock_actual, v_costo_unitario, v_existencia_costo_total
        );

        -- 5️⃣ Actualizar stock en `producto`
        UPDATE producto SET stock_producto = v_stock_actual WHERE id_producto = v_id_producto;
 
       
       ELSE
         
            -- Si el producto no existe, solo insertar en det_venta sin stock
        INSERT INTO det_venta (
            IdVenta, nro_boleta, IdProducto, codigo_barra, descripcion_producto, cantidad, 
            PrecioUnidad, iva, Sub_total, total_venta
        ) VALUES (
            v_IdVenta, p_nro_boleta, NULL, v_codigo_barra, v_descripcion_producto, v_cantidad_vender,
            v_precio_unitario, v_iva_item  , v_subtotal_item , v_total_venta_item     
        );
       END IF;
       
    END LOOP;

    CLOSE cur;
 
       END IF;
       -- Confirmar transacción
    COMMIT;
     
        SELECT 'Se realizado con éxito la venta.' AS resultado; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_GuardarVentaEfectivo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_GuardarVentaEfectivo`(
    IN p_IdUsuario INT,
    IN p_IdCaja INT,
    IN p_IdCliente INT,
    IN p_nro_boleta VARCHAR(25),
    IN p_tipo_pago CHAR(30),
    IN p_TipoDocumento VARCHAR(25),
    IN p_CantidadTotal DECIMAL(10,2),
    IN p_iva DECIMAL(10,2),
    IN p_subtotal DECIMAL(10,2),
    IN p_total_venta DECIMAL(10,2),
    IN p_ImporteRecibido DECIMAL(10,2),
    IN p_ImporteCambio DECIMAL(10,2),
    IN p_nro_credito_venta VARCHAR(25),
    in p_fechaVence DATE,
    IN p_detalle JSON 
)
begin
	
	 DECLARE v_IdVenta INT;
    DECLARE v_id_detalle INT;
    DECLARE v_id_stock INT;
    DECLARE v_cantidad_disponible INT;
   
    
    DECLARE v_cantidad_restante INT;
    DECLARE v_cantidad_bonificada INT;
   
  
    DECLARE v_costo_unitario DECIMAL(10,2);
   -- Kardex
    DECLARE v_stock_actual INT;
    DECLARE v_existencia_costo_total DECIMAL(10,2);
   
    DECLARE v_id_arqueo INT;
    DECLARE v_id_movimiento INT;
   
     -- Variables para recorrer JSON
   DECLARE v_id_producto INT;
   DECLARE v_codigo_barra VARCHAR(25);
   DECLARE v_descripcion_producto VARCHAR(100);
   DECLARE v_cantidad_vender INT;
   DECLARE v_precio_unitario DECIMAL(10,2);
   DECLARE v_iva_item  DECIMAL(10,2);
   DECLARE v_subtotal_item  DECIMAL(10,2);
   DECLARE v_total_venta_item  DECIMAL(10,2);

    DECLARE done INT DEFAULT FALSE;
    
    DECLARE cur CURSOR FOR 
        SELECT 
            IdProducto, codigo_barra, descripcion_producto, cantidad, 
            PrecioUnidad, iva, Sub_total, total_venta
        FROM JSON_TABLE(p_detalle, '$[*]' 
            COLUMNS (
                IdProducto INT PATH '$.id_producto',
                codigo_barra VARCHAR(25) PATH '$.codigo_barra',
                descripcion_producto VARCHAR(100) PATH '$.descripcion_producto',
                cantidad INT PATH '$.cantidad',
                PrecioUnidad DECIMAL(10,2) PATH '$.precio_venta',
                iva DECIMAL(10,2) PATH '$.iva',
                Sub_total DECIMAL(10,2) PATH '$.subtotal',
                total_venta DECIMAL(10,2) PATH '$.total'
            )
        )AS jt;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    -- Manejador de excepciones para hacer rollback si hay un error
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
    BEGIN
        -- Realizar ROLLBACK para deshacer cualquier cambio si ocurre un error
        ROLLBACK;
      
      SELECT 'Error: Error al procesar la venta.' AS resultado;
    END;

   
    -- 4️⃣ Iniciar Transacción
    START TRANSACTION;
       -- Obtener el arqueo de caja abierto
    SELECT id_arqueo_caja INTO v_id_arqueo
    FROM arqueo_caja
    WHERE id_usuario = p_IdUsuario  and id_caja=p_IdCaja AND estado = 1
    ORDER BY fecha_inicio DESC
    LIMIT 1;
    
     IF v_id_arqueo IS NOT NULL then
      
         -- Obtener movimiento
    SELECT id_movimiento_caja INTO v_id_movimiento
    FROM movimiento_caja
    WHERE id_arqueo= v_id_arqueo and id_usuario = p_IdUsuario AND estado = 1 and tipo_movimiento='Ingreso'
    and tipo_referencia='Ingreso'
    ORDER BY fecha_registro DESC
    LIMIT 1;
    
      if v_id_movimiento is null then
        -- Insertar movimiento en caja
        INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
        VALUES (v_id_arqueo, 'Ingreso', 'Ingreso', p_IdUsuario);
        
        SET v_id_movimiento = LAST_INSERT_ID();
        END IF;

      
   
    -- 1️⃣ Insertar en ventas (cabecera)
    INSERT INTO ventas (
        id_usuario_creacion, Id_caja, IdCliente, nro_boleta, tipo_pago, 
        TipoDocumento, CantidadTotal, iva, subtotal, total_venta, 
        ImporteRecibido, ImporteCambio, abono_credito
    ) VALUES (
        p_IdUsuario, p_IdCaja, p_IdCliente, p_nro_boleta, 'EFECTIVO', 
        p_TipoDocumento, p_CantidadTotal, p_iva, p_subtotal, p_total_venta, 
        p_ImporteRecibido, p_ImporteCambio, 0
    );

    SET v_IdVenta = LAST_INSERT_ID();
   
           -- Insertar en detalle_ingresos
      
 INSERT INTO detalle_ingresos (id_movimiento_caja, tipo_ingresos, tipo_pago,id_ventas,nro_ventas, monto,descripcion)
        VALUES (v_id_movimiento, 'Ventas', 1, v_IdVenta,p_nro_boleta,p_total_venta,'Venta de producto');

    UPDATE empresa SET 	nro_correlativo_ventas = LPAD(nro_correlativo_ventas + 1,8,'0');
   
   -- 2️⃣ Recorrer los productos vendidos
    OPEN cur;
    read_loop: LOOP
      FETCH cur INTO v_id_producto, v_codigo_barra, v_descripcion_producto, v_cantidad_vender, 
              v_precio_unitario, v_iva_item , v_subtotal_item , v_total_venta_item ;

        IF done THEN 
            LEAVE read_loop;
        END IF;
    IF v_id_producto IS NOT NULL THEN
        -- Insertar en det_venta
        INSERT INTO det_venta (
            IdVenta,nro_boleta, IdProducto, codigo_barra, descripcion_producto, cantidad, 
            PrecioUnidad, iva, Sub_total, total_venta
        ) VALUES (
            v_IdVenta,p_nro_boleta, v_id_producto, v_codigo_barra,v_descripcion_producto,v_cantidad_vender,
            v_precio_unitario, v_iva_item  , v_subtotal_item , v_total_venta_item 
        );

        SET v_id_detalle = LAST_INSERT_ID();
        SET v_cantidad_restante = v_cantidad_vender;

        -- 3️⃣ Descontar stock en FIFO
        WHILE v_cantidad_restante > 0 DO
            -- Obtener el stock más antiguo disponible para el producto
            SELECT id_lote, stock_disponible, cantidad_bonificada, costo_unitario
            INTO v_id_stock, v_cantidad_disponible, v_cantidad_bonificada, v_costo_unitario
            FROM lote_producto 
            WHERE id_producto = v_id_producto 
            AND stock_disponible > 0
            ORDER BY fecha_vencimiento ASC
            LIMIT 1;
            
       
            -- Verificar si hay bonificación disponible
         --   IF v_cantidad_bonificada > 0 THEN
          --      IF v_cantidad_restante <= v_cantidad_bonificada THEN
         --           UPDATE lote_producto
         --           SET cantidad_bonificada = cantidad_bonificada - v_cantidad_restante
         --           WHERE id_lote = v_id_stock;
         --           SET v_cantidad_restante = 0;
         --       ELSE
         --           SET v_cantidad_restante = v_cantidad_restante - v_cantidad_bonificada;
         --           UPDATE lote_producto
         --           SET cantidad_bonificada = 0
         --           WHERE id_lote = v_id_stock;
        --        END IF;
        --    END IF;

            -- Descontar del stock normal si aún hay unidades por vender
            IF v_cantidad_restante > 0 THEN
                IF v_cantidad_restante <= v_cantidad_disponible THEN
                    UPDATE lote_producto
                    SET stock_disponible = stock_disponible - v_cantidad_restante
                    WHERE id_lote = v_id_stock;
            
                   UPDATE lote_producto
                    SET estado = 2
                   WHERE id_lote = v_id_stock AND stock_disponible = 0;
                    
                    -- Registrar en detalle_venta_stock
                    INSERT INTO det_venta_lote (
                       id_det_venta, id_lote , cantidad_vendida, precio_venta, costo_unitario
                    ) VALUES (
                        v_id_detalle, v_id_stock, v_cantidad_restante, v_precio_unitario, v_costo_unitario
                    );

                    SET v_cantidad_restante = 0;
                ELSE
                    UPDATE lote_producto
                    SET stock_disponible = 0
                    WHERE id_lote = v_id_stock;
                    
                    UPDATE lote_producto
                    SET estado = 2
                   WHERE id_lote = v_id_stock AND stock_disponible = 0;
                    
                    -- Registrar en detalle_venta_stock
                    INSERT INTO det_venta_lote (
                        id_det_venta, id_lote , cantidad_vendida, precio_venta, costo_unitario
                    ) VALUES (
                        v_id_detalle, v_id_stock, v_cantidad_disponible, v_precio_unitario, v_costo_unitario
                    );

                    SET v_cantidad_restante = v_cantidad_restante - v_cantidad_disponible;
                END IF;
            END IF;
        END WHILE;
       
       
       
       -- 4️⃣ Registrar salida en `kardex`
        SELECT stock_producto INTO v_stock_actual FROM producto WHERE id_producto = v_id_producto;
        SET v_stock_actual = v_stock_actual - v_cantidad_vender;
        SET v_existencia_costo_total = v_stock_actual * v_costo_unitario;

        INSERT INTO kardex (
            id_usuario_creacion,id_producto, codigo_producto, concepto, comprobante, 
            salidad_unidades, salidad_costo_unitario, salidad_costo_total, 
            existencia_unidades, existencia_costo_unitario, existencia_costo_total
        ) VALUES (
           p_IdUsuario, v_id_producto, v_codigo_barra, 'Venta de producto', p_nro_boleta, 
            v_cantidad_vender, v_costo_unitario, v_cantidad_vender * v_costo_unitario, 
            v_stock_actual, v_costo_unitario, v_existencia_costo_total
        );

        -- 5️⃣ Actualizar stock en `producto`
        UPDATE producto SET stock_producto = v_stock_actual WHERE id_producto = v_id_producto;
 
       
       ELSE
         
            -- Si el producto no existe, solo insertar en det_venta sin stock
        INSERT INTO det_venta (
            IdVenta, nro_boleta, IdProducto, codigo_barra, descripcion_producto, cantidad, 
            PrecioUnidad, iva, Sub_total, total_venta
        ) VALUES (
            v_IdVenta, p_nro_boleta, NULL, v_codigo_barra, v_descripcion_producto, v_cantidad_vender,
            v_precio_unitario, v_iva_item  , v_subtotal_item , v_total_venta_item     
        );
       END IF;
       
    END LOOP;

    CLOSE cur;
 
       END IF;
       -- Confirmar transacción
    COMMIT;
     
        SELECT 'Se realizado con éxito la venta.' AS resultado; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_guardar_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_guardar_usuario`(
    IN p_id_usuario_logeado INT,
    IN p_id_usuario INT,
    IN p_cedula VARCHAR(45),
    IN p_nombre_usuario VARCHAR(100),
    IN p_apellido_usuario VARCHAR(100),
    IN p_usuario VARCHAR(100),
    IN p_clave TEXT,
    IN p_id_perfil_usuario INT,
    IN p_id_caja INT,
    IN p_email VARCHAR(45),
    IN p_direccion VARCHAR(45),
    IN p_telefono VARCHAR(45),
    IN p_landmarks VARCHAR(200),
    IN p_img VARCHAR(600),
    IN p_ciudad VARCHAR(100)
)
BEGIN
     DECLARE mensaje VARCHAR(255);
	IF p_id_usuario IS NULL OR p_id_usuario = 0 THEN
        -- Insertar nuevo usuario
        INSERT INTO usuarios (
            cedula,
            nombre_usuario,
            apellido_usuario,
            usuario,
            clave,
            id_perfil_usuario,
            id_caja,
            email,
            direccion,
            telefono,
            landmarks,
            img,
            ciudad
        ) VALUES (
            p_cedula,
            p_nombre_usuario,
            p_apellido_usuario,
            p_usuario,
            p_clave,
            p_id_perfil_usuario,
            p_id_caja,
            p_email,
            p_direccion,
            p_telefono,
            p_landmarks,
            p_img,
            p_ciudad
        );
 SET mensaje = 'Usuario registrada con éxito.';
    ELSE
        -- Actualizar usuario existente
        UPDATE usuarios
        SET
            cedula = p_cedula,
            nombre_usuario = p_nombre_usuario,
            apellido_usuario = p_apellido_usuario,
            usuario = p_usuario,
            clave = p_clave,
            id_perfil_usuario = p_id_perfil_usuario,
            id_caja = p_id_caja,
            email = p_email,
            direccion = p_direccion,
            telefono = p_telefono,
            landmarks = p_landmarks,
            img = p_img,
            ciudad=p_ciudad
        WHERE id_usuario = p_id_usuario;
  SET mensaje = 'Usuario actualizada con éxito';
    END IF;

SELECT mensaje AS resultado;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_InsertarDetalleVenta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_InsertarDetalleVenta`(
IN p_IdVenta INT,
    IN p_IdProducto INT,
    IN p_Cantidad INT,
    IN p_PrecioUnitario DECIMAL(10,2),
    IN p_Descuento DECIMAL(10,2),
    IN p_Total DECIMAL(10,2)
)
BEGIN
    DECLARE v_Subtotal DECIMAL(10,2);
    DECLARE v_NroBoleta VARCHAR(50);

    -- 1️⃣ Calcular subtotal
    SET v_Subtotal = (p_Cantidad * p_PrecioUnitario) - p_Descuento;

    -- 2️⃣ Insertar detalle de venta
    INSERT INTO det_venta (
        IdVenta, IdProducto, Cantidad, PrecioUnitario, Descuento, Subtotal
    ) VALUES (
        p_IdVenta, p_IdProducto, p_Cantidad, p_PrecioUnitario, p_Descuento, v_Subtotal
    );

    -- 3️⃣ Actualizar stock del producto
    UPDATE producto
    SET stock_producto = stock_producto - p_Cantidad
    WHERE id_producto = p_IdProducto;

    -- 4️⃣ Obtener número de boleta de la venta
    SELECT nro_boleta INTO v_NroBoleta
    FROM ventas
    WHERE id_venta = p_IdVenta;

    -- 5️⃣ Insertar movimiento en kardex (si aplica)
    INSERT INTO kardex (
         tipo_movimiento, id_producto, cantidad, precio_unitario, total, comprobante
    ) VALUES (
        'SALIDA', p_IdProducto, p_Cantidad, p_PrecioUnitario, p_Total, v_NroBoleta
    );

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_KardexMetodoPromedioPonderado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_KardexMetodoPromedioPonderado`(


in p_fecha_desde date, in p_fecha_hasta date, in p_codigo_barra  varchar(13) )
BEGIN



if (p_codigo_barra = '')  then 

SELECT 

    k.id,

    k.id_producto,

    k.codigo_producto,

    p.descripcion_producto,

    k.fecha,

    k.concepto,

    k.comprobante,

    k.entrada_unidades,

    k.salidad_unidades,

    k.existencia_unidades

   

FROM

    kardex  k inner join  producto p on

    k.id_producto=p.id_producto and k.codigo_producto=p.codigo_barra

   where  date( fecha) BETWEEN  p_fecha_desde and  p_fecha_hasta

   order by k.id;

 else  

 

SELECT 

    k.id,

    k.id_producto,

    k.codigo_producto,

    p.descripcion_producto,

    k.fecha,

    k.concepto,

    k.comprobante,

    k.entrada_unidades,

    k.salidad_unidades,

    k.existencia_unidades

   

FROM

    kardex  k inner join  producto p on

    k.id_producto=p.id_producto and k.codigo_producto=p.codigo_barra

   where  date( fecha) BETWEEN  p_fecha_desde and  p_fecha_hasta  and codigo_producto=p_codigo_barra

   order by k.id;



end if ;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarArqueoCaja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarArqueoCaja`(
IN p_fecha_inicio DATE,
IN p_fecha_fin DATE
)
BEGIN
SELECT
	'' AS detalles,
	ac.id_arqueo_caja,
	c.nombre_caja AS cajas,
	CONCAT(u.nombre_usuario, ' ', u.apellido_usuario) AS usuario,
	ac.fecha_inicio,
	ac.monto_inicial,
	ac.total_ingresos,
	ac.total_egresos,
	ac.saldo_final,
	ac.monto_usuario,
	ac.sobrante_caja,
	ac.faltantes_caja,
	ac.fecha_fin,
	ac.estado,
	'' AS opciones
FROM
	arqueo_caja ac
INNER JOIN usuarios u ON ac.id_usuario = u.id_usuario
INNER JOIN cajas c ON ac.id_caja = c.id_caja
WHERE
	DATE(ac.fecha_inicio) BETWEEN p_fecha_inicio AND p_fecha_fin
ORDER BY
	ac.id_arqueo_caja DESC;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarCaja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarCaja`()
BEGIN
select '' as detalles, id_caja,numero_caja,nombre_caja,folio,

fecha_registro,fecha_actualizacion,estado,''as opcion from cajas 

where estado=1 or estado=2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarCategorias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarCategorias`()
BEGIN
select
	'' as detalles,
	id_categoria,
	nombre_categoria,
	fecha_registro,
	fecha_actualizacion ,
	estado,
	'' as opciones
from
	categorias
where
	estado = 1
	or estado = 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarClientes`()
BEGIN
select ''as detalles, id_cliente, numeroDocumento,

concat(nombre,' ',apellido) as nombres, nombre,apellido ,direccion,telefono,email,fecha_registro,fecha_actualizacion, estado , '' as opciones from  cliente

 where  estado= 1 or  estado=2 ;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarCompras` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarCompras`(
    IN fechaDesde DATE,
    IN fechaHasta DATE
)
BEGIN
 SELECT 
        '' AS detalle,
        c.IdCompra,
        c.nro_boletacompras,
        c.TipoComprobante,
        CONCAT('B', c.NumeroFactura) AS Factura,
        p.nombre AS proveedor,
        p.razon_social,
        u.nombre_usuario AS Usuario,
        c.subtotalcosto,
        c.iva,
        c.TotalCosto,
        c.fecha_factura,
        c.fecha_registro,
        c.estado,
        '' AS opciones
    FROM compras c
    LEFT JOIN proveedor p ON c.IdProveedor = p.id_proveedor
    LEFT JOIN usuarios u ON c.id_usuario_creacion = u.id_usuario
    WHERE 
        (fechaDesde IS NULL OR c.fecha_registro >= fechaDesde)
        AND (fechaHasta IS NULL OR c.fecha_registro <= fechaHasta)
        AND  c.estado=1
    ORDER BY c.fecha_registro DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarComprasCredito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarComprasCredito`()
BEGIN
SELECT 
       ''as detalles,
         cc.id_compra_credito,
         c.IdCompra ,
		 cc.nroCreditoCompra,
         c.NumeroFactura,
         p.ruc,
         p.nombre ,
         p.razon_social,
         cc.monto_total,
		 cc.monto_abonado as abono,
		 cc.saldo_pendiente,
		 c.fecha_factura ,
         c.fecha_registro  as FechaRegistro,
         cc.fecha_vencimiento,
         cc.estado,
         '' as Opciones 
    FROM compras_credito cc
    JOIN compras c ON cc.id_compra = c.IdCompra 
    inner join proveedor p  on p.id_proveedor = c.IdProveedor 
    WHERE cc.estado = 'Pendiente' AND cc.saldo_pendiente > 0
    ORDER BY cc.fecha_compra;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarComprasCreditoFiltrado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarComprasCreditoFiltrado`(
     IN p_filtro VARCHAR(20),          -- 'Todos', 'Con abonos', 'Sin abonos'
    IN p_filtro_estado VARCHAR(20),   -- 'Cobrables', 'Finalizado','Todos', 'Pendiente', 'Vencido', 'Pagado', 'Inactivo'
    IN p_fecha_inicio DATE,
    IN p_fecha_fin DATE
)
BEGIN
 -- Eliminar espacios al inicio y fin
    SET p_filtro = LTRIM(RTRIM(p_filtro));
    SET p_filtro_estado = LTRIM(RTRIM(p_filtro_estado));

    SELECT 
        '' AS vacio,
        c.IdCompra,
        cc.id_compra_credito AS IdCompraCreditos,
        p.id_proveedor,
        p.nombre,
        p.razon_social,
        cc.nroCreditoCompra,
        cc.monto_total,
        cc.monto_abonado,
        cc.saldo_pendiente,
        cc.fecha_compra,
        cc.fecha_vencimiento,
        
        -- Estado real calculado
        CASE 
            WHEN cc.estado = 'Pendiente' AND cc.fecha_vencimiento < CURDATE() THEN 'Vencido'
            ELSE cc.estado
        END AS estado,

        '' AS acciones
    FROM 
        compras_credito cc 
    INNER JOIN 
        compras c ON cc.id_compra = c.IdCompra
    INNER JOIN 
        proveedor p ON c.IdProveedor = p.id_proveedor 

    WHERE 
        (
            -- Evaluamos estado calculado, no el real
            (p_filtro_estado = 'Cobrables' AND 
                (cc.estado = 'Pendiente' AND cc.fecha_vencimiento >= CURDATE()
                OR cc.estado = 'Pendiente' AND cc.fecha_vencimiento < CURDATE()
                OR cc.estado = 'Vencido') )
            OR (p_filtro_estado = 'Finalizado' AND cc.estado IN ('Pagado', 'Inactivo'))
            OR (p_filtro_estado = 'Pagado' AND cc.estado = 'Pagado')
            OR (p_filtro_estado = 'Inactivo' AND cc.estado = 'Inactivo')
            OR (p_filtro_estado = 'Pendiente' AND cc.estado = 'Pendiente' AND cc.fecha_vencimiento >= CURDATE())
            OR (p_filtro_estado = 'Vencido' AND (cc.estado = 'Pendiente' AND cc.fecha_vencimiento < CURDATE() OR cc.estado = 'Vencido'))
            OR (p_filtro_estado = 'Todos')
        )
        AND (
            (p_filtro = 'Con abonos' AND cc.monto_abonado > 0)
            OR (p_filtro = 'Sin abonos' AND cc.monto_abonado = 0)
            OR (p_filtro = 'Todos')
        )
        AND (p_fecha_inicio IS NULL OR cc.fecha_compra >= p_fecha_inicio)
        AND (p_fecha_fin IS NULL OR cc.fecha_compra <= p_fecha_fin)

        -- Filtro por saldo si aplica
        AND (
            (p_filtro_estado IN ('Cobrables', 'Pendiente', 'Vencido') AND cc.saldo_pendiente > 0)
            OR (p_filtro_estado IN ('Pagado', 'Inactivo', 'Finalizado', 'Todos'))
        )

    ORDER BY 
        cc.fecha_compra ASC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarDevoluciones` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarDevoluciones`(
                                                in p_IdUsuario INT,
                                                in p_IdCaja INT,
                                                in p_tipo_devolucion varchar(20))
BEGIN


	if (p_tipo_devolucion = 'todo')then

	select

	dd.id as idDevolucion,

	dd.id_movimiento_caja,

	dd.tipo_devolucion,

	dd.afectarCaja,

	dd.descripcion,

	dd.monto,

	'' as acciones

from

	detalle_devoluciones dd

inner join movimiento_caja mc on

	dd.id_movimiento_caja = mc.id_movimiento_caja

	and dd.estado = 1

	and mc.tipo_movimiento = 'Devolucion'

	and mc.tipo_referencia = 'Devolucion'

inner join arqueo_caja ac on

	ac.id_arqueo_caja = mc.id_arqueo

where

	ac.id_usuario = p_IdUsuario

	and ac.id_caja = p_IdCaja

	and ac.estado = 1 ;
else 

	select

	dd.id as idDevolucion,

	dd.id_movimiento_caja,

	dd.tipo_devolucion,

	dd.afectarCaja,

	dd.descripcion,

	dd.monto,

	'' as acciones

from

	detalle_devoluciones dd

inner join movimiento_caja mc on

	dd.id_movimiento_caja = mc.id_movimiento_caja

	and dd.estado = 1

	and mc.tipo_movimiento = 'Devolucion'

	and mc.tipo_referencia = 'Devolucion'

inner join arqueo_caja ac on

	ac.id_arqueo_caja = mc.id_arqueo

where

	ac.id_usuario = p_IdUsuario

	and ac.id_caja = p_IdCaja

	and ac.estado = 1

	and dd.tipo_devolucion = p_tipo_devolucion ;

end if;
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarEmpresa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarEmpresa`()
BEGIN

    SELECT 
            '' as detalles,
            id_Empresa,
            razon_social,
            nombre_comercial,
            ruc,
            marca,
            id_firma,
            direccion_matriz,
            direccion_sucursal,
            email,
            telefono,
            mensaje,
            contribuyente_especial,
            obligado_contabilidad,
            ambiente,
            tipo_emision,
            establecimiento_codigo,
            punto_emision_codigo,
            secuencial,
            codigo_iva, 
            logo_path,
            serie_boleta,
            nro_correlativo_ventas,
            nro_correlativo_compras,
            estado,
            ''as opciones from empresa where estado=1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarGastos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarGastos`( IN p_IdUsuario INT,

                                                IN p_IdCaja INT)
BEGIN
select dg.id as IdGasto, dg.id_movimiento_caja ,dg.tipo_gastos,dg.tipo_pago,dg.descripcion,dg.monto ,'' as acciones

from detalle_gastos dg inner join movimiento_caja mc on dg.afectarCaja=1 and

dg.id_movimiento_caja =mc.id_movimiento_caja and dg.estado=1 and mc.tipo_movimiento='Egreso' and mc.tipo_referencia='Gasto'  

inner join arqueo_caja ac on ac.id_arqueo_caja =mc.id_arqueo 

where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;
	END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarHistorialCredito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarHistorialCredito`()
BEGIN
select  Concat('Credito Nro: ',vc.nroCreditoVentas,' - Nombre del Cliente: ',c.nombre) as nro_credito_ventas

 ,Concat(u.nombre_usuario, u.apellido_usuario)as usuario ,

  c2.nombre_caja

 ,c.telefono,ac.monto_abonado ,ac.fecha_abono 

        from abonos_credito ac  inner join ventas_credito vc on 

ac.id_venta_credito = vc.id_venta_credito inner join cliente c 

on vc.id_cliente = c.id_cliente   inner join movimiento_caja mc on mc.id_movimiento_caja =ac.id_movimiento_caja 

inner join usuarios u  on u.id_usuario =mc.id_usuario inner join arqueo_caja ac2 on ac2.id_arqueo_caja =mc.id_arqueo 

inner join cajas c2 on ac2.id_caja = c2.id_caja

order by ac.id_abono ,ac.fecha_abono  desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarIngresos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarIngresos`(
                                              IN p_IdUsuario INT,

                                                IN p_IdCaja INT)
BEGIN
select

	di.id as idIngresos,

	di.id_movimiento_caja,

	di.tipo_ingresos,

	di.tipo_pago ,

	di.descripcion ,

	di.monto ,

	'' as acciones

from

	detalle_ingresos di

inner join movimiento_caja mc on

	di.id_movimiento_caja = mc.id_movimiento_caja

	and di.estado = 1

	and mc.tipo_movimiento = 'Ingreso'

	and mc.tipo_referencia = 'Ingreso'

inner join 

arqueo_caja ac on

	ac.id_arqueo_caja = mc.id_arqueo

where

	ac.id_usuario = p_IdUsuario

	and ac.id_caja = p_IdCaja

	and ac.estado = 1;
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_listarmarca` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_listarmarca`()
BEGIN
select
	'' as detalles,
	id_marca,
	nombre,
	fecha_registro,
	fecha_actualizacion ,
	estado,
	'' as opciones
from
	marca
where
	estado = 1
	or estado = 2;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarPerfiles` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarPerfiles`()
BEGIN
select
	id_perfil,
	descripcion,
	fecha_registro as fecha_creacion ,
	fecha_actualizacion,
	estado,
	'' as opciones
from
	perfiles
where
	estado = 1
	or estado = 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarProductos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarProductos`()
BEGIN
select 
        '' as detalles,
        id_producto,
		codigo_barra,
		id_categoria_producto,
		nombre_categoria,
        mar.id_marca,
        mar.nombre,
		descripcion_producto,
        id_unidades,
        m.nombre ,
		ROUND(precio_compra_producto,2) as precio_compra_producto,
		ROUND(precio_venta_producto,2) as precio_venta_producto,
        ROUND(precio_1_producto,2) as precio_1_producto,
        ROUND(precio_2_producto,2) as precio_2_producto,
		lleva_iva_producto,
        perecedero_producto,
	    stock_producto,
        minimo_stock_producto,
		ROUND(costo_total_producto,2) as costo_total_producto,
		p.fecha_registro as fecha_creacion_producto,
		p.fecha_actualizacion as fecha_actualizacion_producto,
		p.img_producto,
		'' as acciones
 from producto  p inner join categorias c on p.id_categoria_producto=c.id_categoria 
 inner join  medidas m on p.id_unidades=m.id_medida 
 inner join  marca mar on p.id_marca=mar.id_marca
 where p.estado=1
 	order by p.id_producto desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarProductosMasVendidos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarProductosMasVendidos`()
BEGIN

SELECT  
    p.codigo_barra,
    p.descripcion_producto,
    SUM(vd.cantidad) AS cantidad,
    ROUND(SUM(vd.total_venta), 2) AS total_venta
FROM 
    det_venta vd
INNER JOIN 
    producto p ON vd.codigo_barra = p.codigo_barra
WHERE 
    vd.estado = '1'
GROUP BY 
    p.codigo_barra, p.descripcion_producto
ORDER BY 
    total_venta DESC


limit 10;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarProductosPocoStock` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarProductosPocoStock`()
BEGIN
select p.codigo_barra,

		p.descripcion_producto,

        p.stock_producto,

        p.minimo_stock_producto

from producto p

where p.estado=1 and p.stock_producto <= p.minimo_stock_producto

order by p.stock_producto asc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarProveedor` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarProveedor`()
BEGIN
	select ''as detalles, id_proveedor,ruc,nombre,

razon_social,direccion,telefono,

email,fecha_registro,fecha_actualizacion,estado,''as opcion 

from proveedor where estado=1 or estado=2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarUnidades` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarUnidades`()
BEGIN
select

	'' as vacio ,

	m.id_medida,

	m.nombre,

	m.nombre_corto,

	m.fecha_registro,

	m.fecha_actualizacion,

	m.estado,

	'' as acciones

from

	medidas m

where

	m.estado = 1

	or m.estado = 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarUsuario`()
BEGIN

	SELECT
	'' as detalles,
	        id_usuario,
	        cedula,
            nombre_usuario,
            apellido_usuario,
            usuario,
            clave,
            id_perfil_usuario,
            id_caja,
            email,
            direccion,
            telefono,
            landmarks,
            img,
            ciudad,
	       estado,
	'' as opciones
FROM
	usuarios
WHERE
	estado = 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarVentas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarVentas`(
                                            in fechaDesde date,
                                           in fechaHasta date)
BEGIN

SELECT
  '' AS detalle,
  v.IdVenta,
  v.nro_boleta,
  v.tipo_pago,
  v.TipoDocumento,
  v.iva,
  v.subtotal,
  v.total_venta,
  CONCAT(u.nombre_usuario, ' ', u.apellido_usuario) AS usuario,
  v.fecha_registro,
  v.estado,
  '' AS opciones
FROM ventas v
JOIN usuarios u ON v.id_usuario_creacion = u.id_usuario
JOIN cliente c ON v.IdCliente = c.id_cliente
WHERE v.fecha_registro BETWEEN fechaDesde AND fechaHasta
  AND v.estado = '1'
ORDER BY v.fecha_registro DESC;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarVentasCredito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarVentasCredito`()
BEGIN

SELECT 

        vc.id_venta_credito ,

         v.IdVenta AS IdVenta ,

         c.id_cliente ,

        c.nombre ,

        vc.monto_total ,

        (  vc.monto_total- vc.saldo_pendiente)as abono,

        vc.saldo_pendiente ,

        vc.fecha_venta ,

        vc.Estado,
         v.nro_boleta,

        ''as Opciones

    FROM ventas_credito vc

    JOIN ventas v ON vc.id_venta = v.IdVenta inner join 

     cliente c on c.id_cliente =v.IdCliente 

    WHERE vc.estado = '1' AND vc.saldo_pendiente > 0

    ORDER BY vc.fecha_venta;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarVentasCreditoFiltrado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarVentasCreditoFiltrado`(
     IN p_filtro VARCHAR(20) , -- 'Todos', 'Con abonos', 'Sin abonos'
     IN p_filtro_estado VARCHAR(20),   -- 'Cobrables', 'Finalizado','Todos', 'Pendiente', 'Vencido', 'Pagado', 'Inactivo'
     IN p_fecha_inicio DATE,
     IN p_fecha_fin DATE
   )
BEGIN
 -- Limpiar espacios
    SET p_filtro = LTRIM(RTRIM(p_filtro));
    SET p_filtro_estado = LTRIM(RTRIM(p_filtro_estado));

    SELECT 
        '' AS vacio,
        vc.id_venta_credito,
        cl.id_cliente,
        CONCAT(cl.nombre, ' ', cl.apellido) AS nombre_cliente,
        vc.nroCreditoVentas,
        vc.monto_total,
        vc.monto_abonado,
        vc.saldo_pendiente,
        vc.fecha_venta,
        vc.fecha_vencimiento,
        
        -- Estado calculado en tiempo real
        CASE 
            WHEN vc.estado = 'Pendiente' AND vc.fecha_vencimiento < CURDATE() THEN 'Vencido'
            ELSE vc.estado
        END AS estado,

        '' AS acciones
    FROM 
        ventas_credito vc
    INNER JOIN 
        ventas v ON vc.id_venta = v.IdVenta
    INNER JOIN 
        cliente cl ON v.IdCliente = cl.id_cliente
    WHERE 
        (
            -- Usar estado dinámico para aplicar filtros
            (p_filtro_estado = 'Cobrables' AND 
                (vc.estado = 'Pendiente' AND vc.fecha_vencimiento >= CURDATE()
                 OR vc.estado = 'Pendiente' AND vc.fecha_vencimiento < CURDATE()
                 OR vc.estado = 'Vencido'))
            OR (p_filtro_estado = 'Finalizado' AND vc.estado IN ('Pagado', 'Inactivo'))
            OR (p_filtro_estado = 'Pagado' AND vc.estado = 'Pagado')
            OR (p_filtro_estado = 'Inactivo' AND vc.estado = 'Inactivo')
            OR (p_filtro_estado = 'Pendiente' AND vc.estado = 'Pendiente' AND vc.fecha_vencimiento >= CURDATE())
            OR (p_filtro_estado = 'Vencido' AND (vc.estado = 'Pendiente' AND vc.fecha_vencimiento < CURDATE() OR vc.estado = 'Vencido'))
            OR (p_filtro_estado = 'Todos')
        )
        AND (
            (p_filtro = 'Con abonos' AND vc.monto_abonado > 0)
            OR (p_filtro = 'Sin abonos' AND vc.monto_abonado = 0)
            OR (p_filtro = 'Todos')
        )
        AND (p_fecha_inicio IS NULL OR vc.fecha_venta >= p_fecha_inicio)
        AND (p_fecha_fin IS NULL OR vc.fecha_venta <= p_fecha_fin)
    ORDER BY 
        vc.fecha_venta ASC;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ListarVentasCreditoFinalizado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ListarVentasCreditoFinalizado`()
BEGIN


SELECT 

        vc.id_venta_credito ,

         v.IdVenta,

            c.id_cliente ,

        c.nombre ,

        vc.monto_total ,

        (  vc.monto_total- vc.saldo_pendiente)as abono,

        vc.saldo_pendiente ,

        vc.fecha_venta ,

        vc.Estado,

        ''as Opciones

    FROM ventas_credito vc

    JOIN ventas v ON vc.id_venta = v.IdVenta inner join 

     cliente c on c.id_cliente =v.IdCliente 

    WHERE vc.estado = 'Pagado'

    ORDER BY vc.fecha_venta;	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_listar_lotes_producto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_listar_lotes_producto`()
BEGIN

   select
         ''as detalles,
        lp.id_lote AS `# Lote`,
        p.descripcion_producto AS `Producto`,
        lp.cantidad_comprada AS `Cant. Comprada`,
        lp.cantidad_bonificada AS `Bonificación`,
        lp.stock_disponible AS `Stock Disponible`,
        lp.costo_unitario AS `Costo Unitario`,
        lp.precio_compra AS `Precio Total`,
        lp.fecha_registro AS `F. Compra`,
        lp.fecha_vencimiento AS `F. Vencimiento`,
        CASE 
            WHEN lp.estado = 1 THEN 'Activo'
            WHEN lp.estado = 0 THEN 'Inactivo'
            ELSE 'Desconocido'
        END AS `Estado`,
         '' as Opciones 
    FROM lote_producto lp
    INNER JOIN producto p ON lp.id_producto = p.id_producto
    ORDER BY lp.fecha_registro DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_lotes_por_vencer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_lotes_por_vencer`(IN p_Dias INT )
BEGIN

	SELECT 
	'' as expandri,
    p.id_producto,
    p.codigo_barra,
    p.descripcion_producto,
    lp.id_lote,
    lp.fecha_vencimiento,
    DATEDIFF(lp.fecha_vencimiento, CURDATE()) AS dias_para_vencer,
    lp.stock_disponible
  FROM 
    lote_producto lp
  JOIN 
    producto p ON p.id_producto = lp.id_producto
  WHERE 
    lp.fecha_vencimiento IS NOT NULL
    AND lp.estado = 1
    AND DATEDIFF(lp.fecha_vencimiento, CURDATE()) <= p_Dias;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_MovimientosCaja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_MovimientosCaja`(
   IN p_id_usuario INT,
   IN p_id_caja INT
)
BEGIN
SELECT
  ac.id_arqueo_caja,
  COALESCE(ac.monto_inicial, 0) AS monto_inicial,

  -- Ingresos por ventas
  SUM(CASE 
      WHEN mc.tipo_movimiento = 'Ingreso' AND di.tipo_ingresos = 'Ventas' THEN di.monto
      ELSE 0 
  END) AS total_ingresos_ventas,

  -- Ventas a crédito
  SUM(CASE 
      WHEN mc.tipo_movimiento = 'Ingreso' AND di.tipo_ingresos = 'Creditos' THEN di.monto
      ELSE 0 
  END) AS total_abono_credito_venta,
  
   SUM(CASE 
      WHEN mc.tipo_movimiento = 'Ingreso' AND di.tipo_ingresos = 'Otros' THEN di.monto
      ELSE 0 
  END) AS total_otros_ingresos,
  
  
(
  SELECT COALESCE(SUM(vc.saldo_pendiente), 0)
  FROM ventas_credito vc
  JOIN ventas v ON v.IdVenta = vc.id_venta
  JOIN detalle_ingresos di ON di.id_ventas = v.IdVenta and  di.tipo_ingresos='Ventas' 
    AND (di.id_abono IS NULL OR di.id_abono = '')
  JOIN movimiento_caja mc2 ON mc2.id_movimiento_caja = di.id_movimiento_caja
  WHERE vc.estado='Pendiente'
    AND mc2.id_arqueo = ac.id_arqueo_caja
    AND mc2.estado = '1'
    AND di.estado = '1'
) AS total_credito_pendiente_venta,

  -- Devoluciones de ventas (solo si afectan caja)
  SUM(CASE 
      WHEN mc.tipo_movimiento = 'Devolucion' AND dd.tipo_devolucion = 'Venta'  THEN dd.monto
      ELSE 0 
  END) AS total_devolucion_ventas,

  -- Devoluciones de compras (solo si afectan caja)
  SUM(CASE 
      WHEN mc.tipo_movimiento = 'Devolucion' AND dd.tipo_devolucion = 'Compra' AND dd.afectarCaja = 1 THEN dd.monto
      ELSE 0 
  END) AS total_devolucion_compras,

  -- Compras normales (solo si afectan caja)
  SUM(CASE 
      WHEN mc.tipo_movimiento = 'Egreso' AND dg.tipo_gastos = 'Compras' AND dg.afectarCaja = 1 THEN dg.monto
      ELSE 0 
  END) AS total_compras,

  -- Compras a crédito (solo si afectan caja)
  SUM(CASE 
      WHEN mc.tipo_movimiento = 'Egreso' AND dg.tipo_gastos = 'Creditos' AND dg.afectarCaja = 1 THEN dg.monto
      ELSE 0 
  END) AS total_abono_credito_compras,

  -- Otros gastos (solo si afectan caja)
  SUM(CASE 
      WHEN mc.tipo_movimiento = 'Egreso' AND dg.tipo_gastos = 'Otros' AND dg.afectarCaja = 1 THEN dg.monto
      ELSE 0 
  END) AS total_gastos_otros,
  (
  SELECT COALESCE(SUM(cc.saldo_pendiente), 0)
  FROM compras_credito cc
  JOIN compras c ON c.IdCompra = cc.id_compra
  JOIN detalle_gastos dg ON dg.id_compras = c.IdCompra and  dg.tipo_gastos='Compras' 
    AND (dg.id_abono IS NULL OR dg.id_abono = '')
  JOIN movimiento_caja mc2 ON mc2.id_movimiento_caja = dg.id_movimiento_caja
  WHERE cc.estado='Pendiente'
    AND mc2.id_arqueo = ac.id_arqueo_caja
    AND mc2.estado = '1'
    AND dg.estado = '1'
) AS total_credito_pendiente_compras

FROM arqueo_caja ac
JOIN movimiento_caja mc 
  ON mc.id_arqueo = ac.id_arqueo_caja AND mc.estado = '1'

LEFT JOIN detalle_ingresos di 
  ON di.id_movimiento_caja = mc.id_movimiento_caja AND di.estado = '1'

LEFT JOIN detalle_gastos dg 
  ON dg.id_movimiento_caja = mc.id_movimiento_caja AND dg.estado = '1'

LEFT JOIN detalle_devoluciones dd 
  ON dd.id_movimiento_caja = mc.id_movimiento_caja AND dd.estado = '1'

WHERE ac.fecha_fin IS NULL
  AND ac.id_caja = p_id_caja -- ID de la caja
  AND ac.id_usuario = p_id_usuario -- ID del usuario
  AND ac.estado = '1'

GROUP BY ac.id_arqueo_caja;
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_MovimientosDeCaja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_MovimientosDeCaja`(

                                            IN `p_IdUsuario` INT, 

                                            IN `p_IdCaja` INT)
begin

	declare v_MontoInicial Decimal(10,2);

	declare v_Ingresos Decimal(10,2);

    declare v_Gastos Decimal(10,2);

	declare v_IngresosCreditosXCobrar Decimal(10,2);

    declare v_GastoCreditosXPagar Decimal(10,2);

    declare v_DevolucionVenta Decimal(10,2);

    declare v_DevolucionCompra Decimal(10,2);
    
    declare ingresos_totales Decimal(10,2);

    declare egresos_totales Decimal(10,2);

    declare total_saldo Decimal(10,2);

    declare monto_inicial_mas_saldo Decimal(10,2);


	select sum(di.monto) INTO v_Ingresos from detalle_ingresos di inner join movimiento_caja mc on

    di.id_movimiento_caja = mc.id_movimiento_caja and di.estado =1 and mc.tipo_movimiento='Ingreso'

    and mc.tipo_referencia='Ingreso' inner join 

    arqueo_caja ac on ac.id_arqueo_caja = mc.id_arqueo 

   where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;

  

   select sum(vc.saldo_pendiente) INTO v_IngresosCreditosXCobrar from ventas_credito vc 

   inner join  detalle_ingresos di  on  

   vc.id_venta =di.id_ventas  and vc.estado=1 inner join movimiento_caja mc on

   mc.id_movimiento_caja =di.id_movimiento_caja and mc.tipo_movimiento='Ingreso' 

   and mc.tipo_referencia='Ingreso' inner join 

   arqueo_caja ac on ac.id_arqueo_caja = mc.id_arqueo 

   where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;

  

  select sum(cc.saldo_pendiente) INTO v_GastoCreditosXPagar from compras_credito cc inner join detalle_gastos dg on

  cc.id_compra = dg.id_compras and dg.estado=1 inner join movimiento_caja mc on

  mc.id_movimiento_caja =dg.id_movimiento_caja and mc.tipo_movimiento='Egreso' and mc.tipo_referencia='Gasto'

  inner join 

  arqueo_caja ac on ac.id_arqueo_caja = mc.id_arqueo 

  where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;

  

  select

	sum(dd.monto) into v_DevolucionVenta

	

  from

	detalle_devoluciones dd

  inner join movimiento_caja mc on

	dd.id_movimiento_caja = mc.id_movimiento_caja and 

	dd.tipo_devolucion='Venta'

	and dd.estado = 1

	and mc.tipo_movimiento = 'Devolucion'

	and mc.tipo_referencia = 'Devolucion'

inner join arqueo_caja ac on

	ac.id_arqueo_caja = mc.id_arqueo

where

	ac.id_usuario = p_IdUsuario

	and ac.id_caja = p_IdCaja

	and ac.estado = 1;



 select

	sum(dd.monto) into v_DevolucionCompra

	

from

	detalle_devoluciones dd

inner join movimiento_caja mc on

	dd.id_movimiento_caja = mc.id_movimiento_caja and 

	dd.tipo_devolucion='Compra'

	and dd.estado = 1

	and mc.tipo_movimiento = 'Devolucion'

	and mc.tipo_referencia = 'Devolucion'

inner join arqueo_caja ac on

	ac.id_arqueo_caja = mc.id_arqueo

where

	ac.id_usuario = p_IdUsuario

	and ac.id_caja = p_IdCaja

	and ac.estado = 1;

	

    select sum(dg.monto) into v_Gastos

from detalle_gastos dg inner join movimiento_caja mc on dg.afectarCaja=1 and

dg.id_movimiento_caja =mc.id_movimiento_caja and dg.estado=1 and mc.tipo_movimiento='Egreso' and mc.tipo_referencia='Gasto'  

inner join arqueo_caja ac on ac.id_arqueo_caja =mc.id_arqueo 

where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;



select

	sum(ar.monto_inicial) into v_MontoInicial

from

	arqueo_caja ar

where

	ar.estado = 1

	and ar.id_usuario = p_IdUsuario

	and ar.id_caja = p_IdCaja;



SET ingresos_totales = (IFNULL(v_Ingresos,0));

-- SET egresos_totales =(IFNULL(total_prestamos,0) + IFNULL(gastos,0) );

SET egresos_totales =(IFNULL(v_Gastos,0) );

SET total_saldo =(IFNULL(ingresos_totales,0) -IFNULL( egresos_totales,0));

SET monto_inicial_mas_saldo =(IFNULL(total_saldo,0) + IFNULL(v_MontoInicial,0));


   SELECT IFNULL(CONCAT('$./ ', FORMAT(v_MontoInicial,2)), 0) AS monto_inicial,
 
   IFNULL(CONCAT('$./ ', FORMAT(v_GastoCreditosXPagar,2)) , 0) AS total_egresos_creditos_x_pagar ,

   IFNULL(CONCAT('$./ ', FORMAT(v_IngresosCreditosXCobrar,2)) , 0) AS total_ingresos_creditos_x_cobrar ,

  
   IFNULL(CONCAT('$./ ', FORMAT(v_Ingresos ,2)), 0) AS ingresos , 


   IFNULL( CONCAT('$./ ', FORMAT(v_DevolucionCompra,2)), 0) AS total_devoluciones_compras,

   IFNULL( CONCAT('$./ ', FORMAT(v_DevolucionVenta,2)), 0) AS total_devoluciones_Ventas,

   IFNULL(CONCAT('$./ ', FORMAT(0,2)), 0) AS total_prestamos, 

   IFNULL(CONCAT('$./ ', FORMAT(v_Gastos,2)), 0) AS gastos , 

   IFNULL(CONCAT('$./ ', FORMAT(0,2)) , 0) AS  total_gasto_creditos , 


    IFNULL(CONCAT('$./ ', FORMAT(ingresos_totales,2)), 0) AS ingresos_totales,   

    IFNULL(CONCAT('$./ ', FORMAT(egresos_totales,2)), 0) AS egresos_totales,

     
        IFNULL(CONCAT('$./ ', FORMAT(total_saldo,2)), 0) AS total_saldo,

         IFNULL(CONCAT('$./ ', FORMAT(monto_inicial_mas_saldo,2)), 0) AS monto_inicial_mas_saldo

;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ObtenerDatosDashboard` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ObtenerDatosDashboard`()
BEGIN


    DECLARE v_totalProductos INT DEFAULT 0;
    DECLARE v_totalComprasInventario DECIMAL(10,2) DEFAULT 0.00;
    DECLARE v_totalVentas DECIMAL(10,2) DEFAULT 0.00;
    DECLARE v_totalCompras DECIMAL(10,2) DEFAULT 0.00;
    DECLARE v_ganancias DECIMAL(10,2) DEFAULT 0.00;
    DECLARE v_productosPocoStock INT DEFAULT 0;
    DECLARE v_ventasHoy DECIMAL(10,2) DEFAULT 0.00;

    -- Total de productos activos
    SELECT IFNULL(COUNT(*), 0)
    INTO v_totalProductos
    FROM producto  
    WHERE estado = '1';

    -- Valor total del inventario (stock * precio de compra)
    SELECT IFNULL(ROUND(SUM(p.stock_producto * p.precio_compra_producto), 2), 0.00)
    INTO v_totalComprasInventario
    FROM producto p
    WHERE p.estado = '1';

    -- Total ventas realizadas (activas)
    SELECT IFNULL(ROUND(SUM(v.total_venta), 2), 0.00)
    INTO v_totalVentas
    FROM ventas v
    WHERE v.estado = '1';

    -- Total compras registradas (activas)
    SELECT IFNULL(ROUND(SUM(c.TotalCosto), 2), 0.00)
    INTO v_totalCompras
    FROM compras c
    WHERE c.estado = '1';

    -- Total ganancias calculadas desde det_venta_lote
    SELECT IFNULL(ROUND(SUM(dvl.ganancia_unitaria * dvl.cantidad_vendida), 2), 0.00)
    INTO v_ganancias
    FROM det_venta_lote dvl
    JOIN det_venta dv ON dv.IdDetalleVenta = dvl.id_det_venta
    JOIN ventas v ON v.IdVenta = dv.IdVenta
    WHERE v.estado = '1' AND dvl.estado = '1';

    -- Productos por debajo del mínimo de stock
    SELECT IFNULL(COUNT(1), 0)
    INTO v_productosPocoStock
    FROM producto p
    WHERE p.stock_producto <= p.minimo_stock_producto AND p.estado = '1';

    -- Ventas realizadas el día de hoy
    SELECT IFNULL(ROUND(SUM(v.total_venta), 2), 0.00)
    INTO v_ventasHoy
    FROM ventas v
    WHERE v.estado = '1' AND DATE(v.fecha_registro) = CURDATE();

    -- Resultado final
    SELECT
        v_totalProductos AS totalProductos,
        CONCAT('$./ ', FORMAT(v_totalComprasInventario, 2)) AS totalComprasInventario,
        CONCAT('$./ ', FORMAT(v_totalVentas, 2)) AS totalVentas,
        CONCAT('$./ ', FORMAT(v_totalCompras, 2)) AS totalCompraRealizada,
        CONCAT('$./ ', FORMAT(v_ganancias, 2)) AS ganancias,
        v_productosPocoStock AS productosPocoStock,
        CONCAT('$./ ', FORMAT(v_ventasHoy, 2)) AS ventasHoy;
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_obtenerNroBoleta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_obtenerNroBoleta`()
BEGIN

SELECT 
  c.serie_boleta,
  LPAD(IFNULL(c.nro_correlativo_ventas + 1, 1), 8, '0') AS nro_venta,
  LPAD(IFNULL(c.nro_credito_ventas + 1, 1), 8, '0') AS nro_credito_ventas,
  LPAD(IFNULL(c.nro_correlativo_compras + 1, 1), 8, '0') AS nro_correlativo_compras,
  LPAD(IFNULL(c.nro_credito_compras + 1, 1), 8, '0') AS nro_credito_compras,
  c.razon_social,
  c.ruc,
  c.mensaje,
  c.direccion_sucursal AS direccion,
  c.marca,
  c.email,
  pi.porcentaje AS impuesto
FROM empresa c
INNER JOIN porcentaje_iva pi ON pi.codigo = c.codigo_iva
WHERE c.estado = 1
LIMIT 1;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ObtenerVentasMesActual` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ObtenerVentasMesActual`()
BEGIN
WITH RECURSIVE dias AS (
    SELECT DATE_ADD(LAST_DAY(CURRENT_DATE - INTERVAL 1 MONTH), INTERVAL 1 DAY) AS fecha_dia
    UNION ALL
    SELECT DATE_ADD(fecha_dia, INTERVAL 1 DAY)
    FROM dias
    WHERE fecha_dia < (
        SELECT MAX(DATE(fecha_registro))
        FROM ventas
        WHERE estado = '1'
          AND MONTH(fecha_registro) = MONTH(CURRENT_DATE)
          AND YEAR(fecha_registro) = YEAR(CURRENT_DATE)
    )
)
SELECT 
    d.fecha_dia AS fecha_venta,
    COALESCE(v.total_venta, 0) AS total_venta,
    COALESCE(v_ant.total_venta, 0) AS total_venta_ant
FROM dias d
LEFT JOIN (
    SELECT DATE(fecha_registro) AS fecha_dia,
           SUM(ROUND(total_venta, 2)) AS total_venta
    FROM ventas
    WHERE estado = '1'
      AND MONTH(fecha_registro) = MONTH(CURRENT_DATE)
      AND YEAR(fecha_registro) = YEAR(CURRENT_DATE)
    GROUP BY DATE(fecha_registro)
) v ON v.fecha_dia = d.fecha_dia
LEFT JOIN (
    SELECT DATE(fecha_registro) AS fecha_dia,
           SUM(ROUND(total_venta, 2)) AS total_venta
    FROM ventas
    WHERE estado = '1'
      AND MONTH(fecha_registro) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
      AND YEAR(fecha_registro) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
    GROUP BY DATE(fecha_registro)
) v_ant ON v_ant.fecha_dia = DATE_SUB(d.fecha_dia, INTERVAL 1 MONTH)
ORDER BY fecha_venta;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_obtener_factura_electronica_cabecera` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_obtener_factura_electronica_cabecera`(
  in p_Id_Venta int
)
BEGIN

SELECT 
    -- Datos de la empresa
    e.razon_social as razon_social_empresa ,
    e.nombre_comercial,
    e.ruc,
    e.direccion_matriz,
    e.direccion_sucursal AS direccion_establecimiento,
    e.establecimiento_codigo,
    e.punto_emision_codigo AS pto_emision,
    e.secuencial,
    e.ambiente,
    e.tipo_emision,
    e.codigo_iva AS codigoPorcentaje,
    e.contribuyente_especial,
    e.obligado_contabilidad,
    pi.porcentaje AS tarifa,

    -- Datos del cliente
    c.tipo_identificacion,
    c.numeroDocumento AS identificacion,
    c.nombre AS razon_social,
    c.email AS correo,

    -- Datos de la venta
    v.TipoDocumento,
    v.nro_boleta,
    v.fecha_registro AS fecha_emision,
    v.subtotal AS total_sin_impuestos,
    (v.subtotal * 0.00) AS total_descuento, -- puedes calcular descuentos si tienes
    v.subtotal AS base_imponible,
    v.iva AS valor_iva,
    v.total_venta AS importe_total,
    v.clave_acceso

FROM ventas v
INNER JOIN cliente c ON v.IdCliente = c.id_cliente
INNER JOIN empresa e ON e.estado = '1'
    AND v.estado = '1'
INNER JOIN porcentaje_iva pi ON pi.codigo = e.codigo_iva
WHERE v.IdVenta = p_Id_Venta;
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_obtener_factura_electronica_detalle` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_obtener_factura_electronica_detalle`(
  in p_Id_Venta int
)
BEGIN

	SELECT 
    dv.codigo_barra AS codigo,
    dv.descripcion_producto AS descripcion,
    dv.cantidad,
    dv.PrecioUnidad AS precio_unitario,
    0.00 AS descuento, -- Si manejas descuentos, cámbialo
    dv.Sub_total AS subtotal,
    dv.iva AS iva
FROM det_venta dv
WHERE dv.estado='1' AND dv.IdVenta = p_Id_Venta;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_RealizarArqueoCaja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_RealizarArqueoCaja`(
in p_id_arqueo_caja int ,
in p_IdCaja int,
in p_IdUsuario int ,
in p_inpuBillete100 float,
in p_inpuBillete50 float,
in p_inpuBillete20 float,
in p_inpuBillete10 float,
in p_inpuBillete5 float,
in p_inpuBillete2 float,
in p_inpuBillete1 float,
in p_inputMoneda1 float,
in p_inputMoneda50 float,
in p_inputMoneda25 float,
in p_inputMoneda10 float,
in p_inputMoneda5 float,
in p_inputMoneda001 float,
in p_total_efectivo float, 
in p_inpuTotalMoneda float,
in p_inpuTotalBilletes float,
in p_Comentario varchar(550))
BEGIN

declare v_fecha datetime;

    declare v_MontoInicial float;
    declare v_numero_venta float;
    declare v_Ingresos float;
    declare v_sobrante_cja float;
    declare v_faltantes_cja float;

    declare v_total_devoluciones float;
    declare v_total_prestamos float;
    declare v_Gastos float;

	declare v_ingresos_totales float;
    declare v_egresos_totales float;
    declare v_total_saldo float;
    declare v_monto_inicial_mas_saldo float;
     
 set v_fecha = (select now());

select
	sum(ar.monto_inicial) into v_MontoInicial
from
	arqueo_caja ar
where
	ar.estado = 1
	and ar.id_usuario = p_IdUsuario
	and ar.id_caja = p_IdCaja;


	select sum(di.monto) INTO v_Ingresos from detalle_ingresos di inner join movimiento_caja mc on
    di.id_movimiento_caja = mc.id_movimiento_caja and di.estado =1 and mc.tipo_movimiento='Ingreso'
    and mc.tipo_referencia='Ingreso' inner join 
    arqueo_caja ac on ac.id_arqueo_caja = mc.id_arqueo 
   where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;
   
 select sum(dg.monto) into v_Gastos
from detalle_gastos dg inner join movimiento_caja mc on dg.afectarCaja=1 and
dg.id_movimiento_caja =mc.id_movimiento_caja and dg.estado=1 and mc.tipo_movimiento='Egreso' and mc.tipo_referencia='Gasto'  
inner join arqueo_caja ac on ac.id_arqueo_caja =mc.id_arqueo 
where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;

set v_total_prestamos=(0);

select  count(di.id_ventas) INTO v_numero_venta from detalle_ingresos di inner join movimiento_caja mc on
    di.id_movimiento_caja = mc.id_movimiento_caja and di.estado =1 and mc.tipo_movimiento='Ingreso'
    and mc.tipo_referencia='Ingreso' inner join 
    arqueo_caja ac on ac.id_arqueo_caja = mc.id_arqueo 
   where ac.id_usuario=p_IdUsuario  and ac.id_caja=p_IdCaja  and ac.estado =1;
   
   SET v_egresos_totales =(IFNULL(v_total_prestamos,0) + IFNULL(v_Gastos,0) );
   
SET v_total_saldo =(IFNULL(v_Ingresos,0) -IFNULL( v_egresos_totales,0));
SET v_monto_inicial_mas_saldo =(IFNULL(v_total_saldo,0) + IFNULL(v_MontoInicial,2));


 
if (v_monto_inicial_mas_saldo > p_total_efectivo) then 
SET v_faltantes_cja=( IFNULL(v_monto_inicial_mas_saldo,2) - IFNULL(p_total_efectivo,0));
SET v_sobrante_cja=0;
elseif (v_monto_inicial_mas_saldo < p_total_efectivo) then
SET v_sobrante_cja=( IFNULL(p_total_efectivo,2) - IFNULL(v_monto_inicial_mas_saldo,0));
SET v_faltantes_cja=0;
else  
SET v_sobrante_cja=0;
SET v_faltantes_cja=0;
end if ;


  
UPDATE arqueo_caja 
	SET fecha_fin = v_fecha, 
        total_ingresos = v_Ingresos,
        total_egresos = v_egresos_totales,
        sobrante_caja = v_sobrante_cja,
        faltantes_caja = v_faltantes_cja,
        saldo_final = v_monto_inicial_mas_saldo,
          monto_usuario = p_total_efectivo,
          concepto = p_Comentario,
            estado = 0
	WHERE id_arqueo_caja = p_id_arqueo_caja ; 
    
    


INSERT INTO dinero(id_arqueo,id_usuario,id_caja,billete_100,billete_50,billete_20,billete_10
,billete_5,billete_2,billete_1,moneda_1,moneda_50,moneda_25,moneda_10,moneda_5,moneda_001,
total_moneda,total_billeta,activo,fecha_registro) 
                                                VALUES (p_id_arqueo_caja,
                                                        p_IdUsuario, 
                                                        p_IdCaja,
                                                        p_inpuBillete100 , 
                                                        p_inpuBillete50 ,
                                                        p_inpuBillete20 ,
                                                        p_inpuBillete10 , 
                                                        p_inpuBillete5 , 
                                                        p_inpuBillete2 , 
                                                        p_inpuBillete1 , 
                                                        p_inputMoneda1 ,
														p_inputMoneda50 , 
                                                        p_inputMoneda25 , 
                                                        p_inputMoneda10 , 
                                                        p_inputMoneda5 , 
                                                        p_inputMoneda001 ,
                                                        p_inpuTotalMoneda , 
                                                        p_inpuTotalBilletes,
                                                        1,
                                                        v_fecha
                                                       
                                                       );

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_RecuperarValorCaja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_RecuperarValorCaja`(
in p_id_usuario int , in  p_id_caja int)
BEGIN

SELECT 

  monto_usuario as  usuario

FROM

    arqueo_caja

WHERE

    id_caja = p_id_caja 

	AND estado = 0 and fecha_fin=(SELECT 

   max(fecha_fin)

FROM

    arqueo_caja

WHERE

    id_caja = p_id_caja 

	AND estado = 0);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_RegistrarAbonoCompraCredito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_RegistrarAbonoCompraCredito`(
    IN p_IdUsuario INT,
    IN p_IdCaja INT,
    IN p_IdCompra INT,
    IN p_IdCompraCredito INT,
    IN p_MontoAbonado DECIMAL(10, 2),
    IN p_Observacion VARCHAR(150),
    IN p_MetodoPago VARCHAR(50)
    )
BEGIN
     DECLARE v_SaldoPendiente DECIMAL(10, 2);
    DECLARE v_id_arqueo INT;
    DECLARE v_id_movimiento INT;
    DECLARE v_id_abono INT;

    DECLARE mensaje VARCHAR(255);

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Si ocurre algún error, revierte la transacción
        ROLLBACK;
        SET mensaje = 'Error: No se pudo registrar el abono.';
        SELECT mensaje AS resultado;
    END;

    
    START TRANSACTION;

          -- Eliminar espacios al inicio y fin
    SET p_Observacion = LTRIM(RTRIM(p_Observacion));
     SET p_MetodoPago = LTRIM(RTRIM(p_MetodoPago));
          
    -- Obtener el arqueo de caja abierto
    SELECT id_arqueo_caja INTO v_id_arqueo
    FROM arqueo_caja
    WHERE id_usuario = p_IdUsuario AND id_caja = p_IdCaja AND estado = 1
    ORDER BY fecha_inicio DESC
    LIMIT 1;

    IF v_id_arqueo IS NOT NULL THEN

        -- Obtener movimiento existente
        SELECT id_movimiento_caja INTO v_id_movimiento
        FROM movimiento_caja
       WHERE id_arqueo= v_id_arqueo and id_usuario = p_IdUsuario AND estado = 1 and tipo_movimiento='Egreso'
         and tipo_referencia='Gasto'
        ORDER BY fecha_registro DESC
        LIMIT 1;

        IF v_id_movimiento IS NULL THEN
            -- Insertar nuevo movimiento
             INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
                 VALUES (v_id_arqueo, 'Egreso', 'Gasto', p_IdUsuario);
        
        SET v_id_movimiento = LAST_INSERT_ID();
        END IF;

        -- Obtener el saldo pendiente y el id_venta
        SELECT saldo_pendiente INTO v_SaldoPendiente
        FROM compras_credito
        WHERE id_compra_credito = p_IdCompraCredito;

        -- Verificar que el abono no exceda el saldo pendiente
        IF p_MontoAbonado > v_SaldoPendiente THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'El abono no puede ser mayor al saldo pendiente';
        END IF;

           -- Insertar el abono en la tabla de abonos    

    INSERT INTO abonos_compra_credito  (id_compra_credito , id_movimiento_caja , monto_abonado , metodo_pago,observacion )

    VALUES (p_IdCompraCredito, v_id_movimiento,p_MontoAbonado, p_MetodoPago,p_Observacion);
    
    
     SET v_id_abono = LAST_INSERT_ID();

        -- Insertar en detalle_gastos
    INSERT INTO detalle_gastos (id_abono,afectarCaja,id_movimiento_caja,tipo_gastos, tipo_pago, id_compras ,monto,descripcion)

    VALUES (v_id_abono,1,v_id_movimiento,'Creditos', p_MetodoPago, p_IdCompra,p_MontoAbonado, p_Observacion);
    
    
        -- Actualizar el saldo pendiente de la compra a crédito   

    UPDATE compras_credito

    SET saldo_pendiente =  saldo_pendiente - p_MontoAbonado,

           monto_abonado= monto_abonado + p_MontoAbonado

    WHERE id_compra_credito = p_IdCompraCredito;

        -- Si ya no hay saldo pendiente, marcar como pagado
         IF  (v_SaldoPendiente - p_MontoAbonado) = 0 THEN

        UPDATE compras_credito

        SET estado = 'Pagado'

        WHERE id_compra_credito = p_IdCompraCredito;

    END IF;

    END IF;

    COMMIT;

    SET mensaje = 'Abono registrado con éxito.';
    SELECT mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_RegistrarAbonoMultipleVentaCredito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_RegistrarAbonoMultipleVentaCredito`(
   IN p_IdUsuario INT,
    IN p_IdCaja INT,
    IN p_IdCliente INT,
    IN p_MontoAbonado DECIMAL(10, 2),
    IN p_Observacion  TEXT,
    IN p_MetodoPago VARCHAR(50)
)
BEGIN
    DECLARE v_SaldoPendiente DECIMAL(10, 2);
    DECLARE v_id_arqueo INT;
    DECLARE v_id_movimiento INT;
    DECLARE v_id_abono INT;
    DECLARE v_IdVenta INT;
    DECLARE v_IdVentaCredito INT;
    DECLARE v_MontoRestante DECIMAL(10,2);
    DECLARE v_AbonoAplicado DECIMAL(10,2);
    DECLARE mensaje VARCHAR(255);
    DECLARE done INT DEFAULT 0;

    -- Cursor para recorrer los créditos pendientes
    DECLARE cur CURSOR FOR 
        SELECT id_venta_credito, saldo_pendiente, id_venta
        FROM ventas_credito
        WHERE id_cliente = p_IdCliente AND saldo_pendiente > 0
        ORDER BY fecha_venta ASC;

    -- Handler para el cursor
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

    -- Handler para excepciones SQL
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SET mensaje = 'Ocurrió un error al registrar el abono. La transacción ha sido revertida.';
        SELECT mensaje AS resultado;
    END;

    -- Inicia la transacción
    START TRANSACTION;

              -- Eliminar espacios al inicio y fin
     SET p_MetodoPago = LTRIM(RTRIM(p_MetodoPago));
              
    -- Obtener el arqueo de caja abierto
    SELECT id_arqueo_caja INTO v_id_arqueo
    FROM arqueo_caja
    WHERE id_usuario = p_IdUsuario AND id_caja = p_IdCaja AND estado = 1
    ORDER BY fecha_inicio DESC
    LIMIT 1;

    IF v_id_arqueo IS NOT NULL THEN

        -- Obtener o crear movimiento en caja
        SELECT id_movimiento_caja INTO v_id_movimiento
        FROM movimiento_caja
        WHERE id_arqueo = v_id_arqueo AND id_usuario = p_IdUsuario AND estado = 1 
              AND tipo_movimiento = 'Ingreso' AND tipo_referencia = 'Ingreso'
        ORDER BY fecha_registro DESC
        LIMIT 1;

        IF v_id_movimiento IS NULL THEN
            INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
            VALUES (v_id_arqueo, 'Ingreso', 'Ingreso', p_IdUsuario);
            SET v_id_movimiento = LAST_INSERT_ID();
        END IF;

        SET v_MontoRestante = p_MontoAbonado;

        OPEN cur;

        read_loop: LOOP
            FETCH cur INTO v_IdVentaCredito, v_SaldoPendiente, v_IdVenta;

            IF done = 1 OR v_MontoRestante <= 0 THEN
                LEAVE read_loop;
            END IF;

            IF v_MontoRestante >= v_SaldoPendiente THEN
                SET v_AbonoAplicado = v_SaldoPendiente;
            ELSE
                SET v_AbonoAplicado = v_MontoRestante;
            END IF;

            -- Insertar abono
            INSERT INTO abonos_credito (id_venta_credito, id_movimiento_caja, monto_abonado, metodo_pago,observacion)
            VALUES (v_IdVentaCredito, v_id_movimiento, v_AbonoAplicado, p_MetodoPago,p_Observacion);

            SET v_id_abono = LAST_INSERT_ID();

            -- Insertar detalle de ingreso
            INSERT INTO detalle_ingresos (id_movimiento_caja, tipo_ingresos, tipo_pago, id_ventas, id_abono, monto, descripcion)
            VALUES (v_id_movimiento, 'Creditos', p_MetodoPago, v_IdVenta, v_id_abono, v_AbonoAplicado, p_Observacion);

            -- Actualizar el crédito
            UPDATE ventas_credito
            SET saldo_pendiente = saldo_pendiente - v_AbonoAplicado,
                monto_abonado = monto_abonado + v_AbonoAplicado
            WHERE id_venta_credito = v_IdVentaCredito;

            IF v_SaldoPendiente - v_AbonoAplicado = 0 THEN
                UPDATE ventas_credito
                SET estado = 'Pagado'
                WHERE id_venta_credito = v_IdVentaCredito;
            END IF;

            SET v_MontoRestante = v_MontoRestante - v_AbonoAplicado;
        END LOOP;

        CLOSE cur;

        IF v_MontoRestante > 0 THEN
            SIGNAL SQLSTATE '45000' 
            SET MESSAGE_TEXT = 'El monto abonado excede el total de la deuda del cliente';
        END IF;

        COMMIT;
        SET mensaje = 'Abono registrado con éxito.';
        SELECT mensaje AS resultado;

    ELSE
        ROLLBACK;
        SET mensaje = 'No se encontró arqueo de caja abierto para el usuario.';
        SELECT mensaje AS resultado;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_RegistrarAbonoVentaCredito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_RegistrarAbonoVentaCredito`(
 IN p_IdUsuario INT,
    IN p_IdCaja INT,
    IN p_IdVentaCredito INT,
    IN p_Abono DECIMAL(10, 2),
    IN p_Observacion TEXT,
    IN p_MetodoPago VARCHAR(50)
)
BEGIN
    DECLARE v_SaldoPendiente DECIMAL(10, 2);
    DECLARE v_id_arqueo INT;
    DECLARE v_id_movimiento INT;
    DECLARE v_id_abono INT;
    DECLARE v_IdVenta INT;

    DECLARE mensaje VARCHAR(255);

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Si ocurre algún error, revierte la transacción
        ROLLBACK;
        SET mensaje = 'Error: No se pudo registrar el abono.';
        SELECT mensaje AS resultado;
    END;

    
    START TRANSACTION;

          -- Eliminar espacios al inicio y fin
    SET p_Observacion = LTRIM(RTRIM(p_Observacion));
     SET p_MetodoPago = LTRIM(RTRIM(p_MetodoPago));
          
    -- Obtener el arqueo de caja abierto
    SELECT id_arqueo_caja INTO v_id_arqueo
    FROM arqueo_caja
    WHERE id_usuario = p_IdUsuario AND id_caja = p_IdCaja AND estado = 1
    ORDER BY fecha_inicio DESC
    LIMIT 1;

    IF v_id_arqueo IS NOT NULL THEN

        -- Obtener movimiento existente
        SELECT id_movimiento_caja INTO v_id_movimiento
        FROM movimiento_caja
        WHERE id_arqueo = v_id_arqueo AND id_usuario = p_IdUsuario
            AND estado = 1 AND tipo_movimiento = 'Ingreso' AND tipo_referencia = 'Ingreso'
        ORDER BY fecha_registro DESC
        LIMIT 1;

        IF v_id_movimiento IS NULL THEN
            -- Insertar nuevo movimiento
            INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)
            VALUES (v_id_arqueo, 'Ingreso', 'Ingreso', p_IdUsuario);

            SET v_id_movimiento = LAST_INSERT_ID();
        END IF;

        -- Obtener el saldo pendiente y el id_venta
        SELECT saldo_pendiente, id_venta INTO v_SaldoPendiente, v_IdVenta
        FROM ventas_credito
        WHERE id_venta_credito = p_IdVentaCredito;

        -- Verificar que el abono no exceda el saldo pendiente
        IF p_Abono > v_SaldoPendiente THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'El abono no puede ser mayor al saldo pendiente';
        END IF;

        -- Insertar abono
        INSERT INTO abonos_credito (id_usuario, id_venta_credito, id_movimiento_caja, monto_abonado, metodo_pago,observacion)
        VALUES (p_IdUsuario, p_IdVentaCredito, v_id_movimiento, p_Abono, p_MetodoPago,p_Observacion);

        SET v_id_abono = LAST_INSERT_ID();

        -- Insertar detalle de ingreso
        INSERT INTO detalle_ingresos (id_movimiento_caja, tipo_ingresos, tipo_pago, id_ventas, id_abono, monto, descripcion)
        VALUES (v_id_movimiento, 'Creditos', p_MetodoPago, v_IdVenta, v_id_abono, p_Abono, p_Observacion);

        -- Actualizar la venta a crédito
        UPDATE ventas_credito
        SET saldo_pendiente = saldo_pendiente - p_Abono,
            monto_abonado = monto_abonado + p_Abono
        WHERE id_venta_credito = p_IdVentaCredito;

        -- Si ya no hay saldo pendiente, marcar como pagado
        IF v_SaldoPendiente - p_Abono = 0 THEN
            UPDATE ventas_credito
            SET estado = 'Pagado'
            WHERE id_venta_credito = p_IdVentaCredito;
        END IF;

    END IF;

    COMMIT;

    SET mensaje = 'Abono registrado con éxito.';
    SELECT mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_registrarIngresoKardex` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_registrarIngresoKardex`(
  IN p_id_producto INT, 
  IN p_codigo_producto VARCHAR(20), 
  IN p_concepto VARCHAR(100), 
  IN p_nuevo_stock INT,
  IN p_cantidad INT, 
  IN p_precio_compra DECIMAL(10,2), 
  IN p_tipo_ingreso VARCHAR(20), -- valores posibles: 'COMPRA', 'PROMOCION'
  IN p_fecha_vencimiento DATE,
  IN p_id_usuario INT
)
BEGIN
    DECLARE mensaje VARCHAR(255);
    DECLARE v_unidades_ex FLOAT;
    DECLARE v_costo_unitario_ex FLOAT;    
    DECLARE v_costo_total_ex FLOAT;
    DECLARE v_perecedero_producto INT;

    DECLARE v_unidades_entrada FLOAT;
    DECLARE v_costo_unitario_entrada FLOAT;    
    DECLARE v_costo_total_entrada FLOAT;

    DECLARE v_cantidad_comprada INT DEFAULT 0;
    DECLARE v_cantidad_bonificada INT DEFAULT 0;
    DECLARE v_costo_final DECIMAL(10,2);

    DECLARE v_id_asiento INT;
    
  

    -- Manejo de errores SQL
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
    BEGIN
        SET mensaje = 'Error al registrar ingreso de producto.';
        SELECT mensaje AS resultado;
        ROLLBACK;
    END;
    
      	-- Eliminar espacios al inicio y fin
   SET p_codigo_producto = LTRIM(RTRIM(p_codigo_producto));
   SET p_concepto = LTRIM(RTRIM(p_concepto));
   SET p_tipo_ingreso = LTRIM(RTRIM(p_tipo_ingreso));

    START TRANSACTION;

    -- Obtener existencias actuales (último registro de kardex)
    SELECT k.existencia_costo_unitario, k.existencia_unidades, k.existencia_costo_total
    INTO v_costo_unitario_ex, v_unidades_ex, v_costo_total_ex
    FROM kardex K
    WHERE K.id_producto = p_id_producto
    ORDER BY id DESC
    LIMIT 1;

    IF p_tipo_ingreso = 'COMPRA' THEN
        SET v_cantidad_comprada = p_cantidad;
        SET v_costo_final = p_precio_compra;
    ELSEIF p_tipo_ingreso = 'PROMOCION' THEN
        SET v_cantidad_bonificada = p_cantidad;
        SET v_costo_final = 0.00;
    END IF;

    SET v_unidades_entrada = (p_nuevo_stock - v_unidades_ex);
    SET v_costo_unitario_entrada = p_precio_compra;
    SET v_costo_total_entrada = v_unidades_entrada * v_costo_unitario_entrada;

    SET v_unidades_ex = ROUND(p_nuevo_stock, 2);
    SET v_costo_total_ex = ROUND(v_costo_total_ex + v_costo_total_entrada, 2);

    IF v_costo_total_ex > 0 THEN
        SET v_costo_unitario_ex = ROUND(v_costo_total_ex / v_unidades_ex, 2);
    ELSE
        SET v_costo_unitario_ex = 0.00;
    END IF;

    -- Registrar en Kardex
    INSERT INTO kardex(
        id_usuario_creacion,
        id_producto,
        codigo_producto,
        concepto,
        entrada_unidades,
        entrada_costo_unitario,
        entrada_costo_total,
        existencia_unidades,
        existencia_costo_unitario,
        existencia_costo_total
    ) VALUES (
        p_id_usuario,
        p_id_producto,
        p_codigo_producto,
        p_concepto,
        v_unidades_entrada,
        v_costo_unitario_entrada,
        v_costo_total_entrada,
        v_unidades_ex,
        v_costo_unitario_ex,
        v_costo_total_ex
    );

    -- Consultar si el producto es perecedero
    SELECT perecedero_producto INTO v_perecedero_producto 
    FROM producto 
    WHERE codigo_barra = p_codigo_producto AND id_producto = p_id_producto;

    -- Insertar en lote_producto si es perecedero o no
    IF v_perecedero_producto = 1 THEN
        INSERT INTO lote_producto(
            id_usuario_creacion,
            id_producto,
            cantidad_comprada,
            cantidad_bonificada,
            stock_disponible,
            costo_unitario,
            fecha_vencimiento
        ) VALUES (
            p_id_usuario,
            p_id_producto,
            v_cantidad_comprada,
            v_cantidad_bonificada,
            p_cantidad,
            v_costo_final,
            p_fecha_vencimiento
        );
    ELSE
        INSERT INTO lote_producto(
            id_usuario_creacion,
            id_producto,
            cantidad_comprada,
            cantidad_bonificada,
            stock_disponible,
            costo_unitario
        ) VALUES (
            p_id_usuario,
            p_id_producto,
            v_cantidad_comprada,
            v_cantidad_bonificada,
            p_cantidad,
            v_costo_final
        );
    END IF;

    -- Actualizar stock del producto
    UPDATE producto 
    SET stock_producto = stock_producto + p_cantidad,
        id_usuario_actualizacion = p_id_usuario,
        precio_compra_producto=p_precio_compra
    WHERE id_producto = p_id_producto;

    -- Registrar asiento contable
    INSERT INTO asiento_contable(
        fecha,
        descripcion,
        tipo_asiento,
        id_referencia,
        modulo_origen,
        total_debe,
        total_haber,
        fecha_creacion,
        tipo_referencia
    ) VALUES (
        CURDATE(),
        CONCAT('Ingreso de producto ', p_codigo_producto, ' - ', p_concepto),
        'COMPRA',
        NULL,
        'INVENTARIO',
        v_costo_total_entrada,
        v_costo_total_entrada,
        NOW(),
        'KARDEX'
    );

    SET v_id_asiento = LAST_INSERT_ID();

    -- Detalles del asiento según tipo ingreso
    IF p_tipo_ingreso = 'COMPRA' THEN
        -- Debe: Inventario (104)
        INSERT INTO detalle_asiento(
            id_asiento,
            id_cuenta,
            debe,
            descripcion,
            orden
        ) VALUES (
            v_id_asiento,
            9, -- cuenta inventario (ajustar según tu plan de cuentas)
            v_costo_total_entrada,
            'Ingreso inventario por compra',
            1
        );

        -- Haber: Proveedores o cuentas por pagar (ejemplo id_cuenta=201)
        INSERT INTO detalle_asiento(
            id_asiento,
            id_cuenta,
            haber,
            descripcion,
            orden
        ) VALUES (
            v_id_asiento,
            6, -- cuenta pasivo compra
            v_costo_total_entrada,
            'Caja efectivo  por compra',
            2
        );
    ELSEIF p_tipo_ingreso = 'PROMOCION' THEN
    
       
      -- Haber: Productos bonificados (600)
        INSERT INTO detalle_asiento(
            id_asiento,
            id_cuenta,
            debe,
            descripcion,
            orden
        ) VALUES (
            v_id_asiento,  
            16, -- cuenta inventario
            v_costo_total_entrada,
             'Bonificación proveedor',
            1
        );

        -- Debe: Inventario (104)
        INSERT INTO detalle_asiento(
            id_asiento,
            id_cuenta,
            haber,
            descripcion,
            orden
        ) VALUES (
            v_id_asiento,
           9, -- cuenta productos bonificados (gasto)
            v_costo_total_entrada,
            'Ingreso producto bonificado',
            2
        );
    END IF;

    -- Registrar auditoría
    INSERT INTO log_auditoria (
        tabla,
        accion,
        usuario_id,
        fecha,
        detalle,
        id_registro_afectado,
        modulo
    ) VALUES (
        'producto / lote_producto / kardex',
        'REGISTRO_INGRESO',
        p_id_usuario,
        NOW(),
        CONCAT('Ingreso de producto ID: ', p_id_producto, 
               ', código: ', p_codigo_producto, 
               ', tipo ingreso: ', p_tipo_ingreso, 
               ', cantidad: ', p_cantidad),
        p_id_producto,
        'INVENTARIO'
    );

    COMMIT;

    SET mensaje = 'Ingreso registrado con éxito.';
    SELECT mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_RegistrarKardexVencido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_RegistrarKardexVencido`(
     IN p_id_producto INT,
     in p_codigo_producto VARCHAR(20),
     IN p_observacion TEXT ,
     in p_nuevo_stock INT,
     IN p_cantidad INT,
     in p_precio_compra decimal(10,2), 
     IN p_tipo_ajuste varchar(50),-- ('PERDIDA', 'DEVOLUCION', 'CAMBIO'),
     IN p_fecha_vencimiento DATE
     )
BEGIN
    DECLARE v_total_disponible INT DEFAULT 0;
    DECLARE v_resto INT DEFAULT p_cantidad;
    DECLARE done INT DEFAULT FALSE;
                          
  -- Variables para cursor
    DECLARE v_id_lote INT;
    DECLARE v_stock INT;
  
  -- para kardex
    declare v_unidades_ex float;
	declare v_costo_unitario_ex float;    
	declare v_costo_total_ex float;

    declare v_unidades_salida float;
	declare v_costo_unitario_salida float;    
	declare v_costo_total_salida float;
    
        
  DECLARE v_cantidad_comprada INT DEFAULT 0;
  DECLARE v_cantidad_bonificada INT DEFAULT 0;
  DECLARE v_costo_final DECIMAL(10,2);
    -- Cursor para recorrer los lotes ordenados por id_lote (FIFO)
    DECLARE cur_lotes CURSOR for
    
        SELECT id_lote, stock_disponible
        FROM lote_producto
        WHERE id_producto = p_id_producto
          AND fecha_vencimiento = p_fecha_vencimiento
          AND estado = 1
          AND stock_disponible > 0
        ORDER BY id_lote;
        
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;  
  
   -- Calcular total disponible
    SELECT SUM(stock_disponible) INTO v_total_disponible
    FROM lote_producto
    WHERE id_producto = p_id_producto
      AND fecha_vencimiento = p_fecha_vencimiento
      AND estado = 1
      AND stock_disponible > 0;
    
     IF v_total_disponible IS NULL OR v_total_disponible < p_cantidad THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Stock insuficiente en lotes con esa fecha de vencimiento';
    END IF;
 
 
   
    -- Abrimos cursor
    OPEN cur_lotes;
     
     read_loop: LOOP
        FETCH cur_lotes INTO v_id_lote, v_stock;
        IF done THEN
            LEAVE read_loop;
        END IF;

        IF v_resto <= 0 THEN
            LEAVE read_loop;
        END IF;

        -- Cuánto restar en este lote
        IF v_resto >= v_stock THEN
            -- Usar todo el lote
            UPDATE lote_producto
            SET stock_disponible = 0,
                estado=0
            WHERE id_lote = v_id_lote;

            INSERT INTO ajuste_lote (id_lote, cantidad, motivo, observacion)
            VALUES (v_id_lote, v_stock, p_tipo_ajuste, p_observacion);

            SET v_resto = v_resto - v_stock;
        ELSE
            -- Usar parte del lote
            UPDATE lote_producto
            SET stock_disponible = stock_disponible - v_resto
            WHERE id_lote = v_id_lote;
            
              UPDATE lote_producto
            SET  estado=0
            WHERE id_lote = v_id_lote and stock_disponible=0;


            INSERT INTO ajuste_lote (id_lote, cantidad, motivo, observacion)
            VALUES (v_id_lote, v_resto, p_tipo_ajuste, p_observacion);

            SET v_resto = 0;
        END IF;

    END LOOP;

    CLOSE cur_lotes;   
   
     
    
        -- Lógica de separación de tipo de ingreso
  IF p_tipo_ajuste = 'PERDIDA' THEN
 --   SET v_cantidad_comprada = p_cantidad;
    SET v_costo_final = p_precio_compra;
  ELSEIF p_tipo_ajuste = 'DEVOLUCION' THEN
  --  SET v_cantidad_bonificada = p_cantidad;
    SET v_costo_final = 0.00; -- productos gratis no tienen costo
  END IF;

	/*OBTENEMOS LAS ULTIMAS EXISTENCIAS DEL PRODUCTO*/    

    SELECT k.existencia_costo_unitario , k.existencia_unidades, k.existencia_costo_total
    into v_costo_unitario_ex, v_unidades_ex, v_costo_total_ex
    FROM kardex K
    WHERE K.id_producto = p_id_producto
    ORDER BY ID DESC
    LIMIT 1;
    
    
      /*SETEAMOS LOS VALORES PARA EL REGISTRO DE SALIDA*/

    SET v_unidades_salida = (v_unidades_ex - p_nuevo_stock);
    SET v_costo_unitario_salida = v_costo_final;
    SET v_costo_total_salida = v_unidades_salida * v_costo_unitario_salida;

    
    /*SETEAMOS LAS EXISTENCIAS ACTUALES*/

    SET v_unidades_ex = ROUND(p_nuevo_stock,2);    
    SET v_costo_total_ex = ROUND(v_costo_total_ex - v_costo_total_salida,2);
    
    IF(v_costo_total_ex > 0) THEN
		SET v_costo_unitario_ex = ROUND(v_costo_total_ex/v_unidades_ex,2);
	else
		SET v_costo_unitario_ex = ROUND(0,2);

    END IF;
    
        	INSERT INTO KARDEX(id_producto,
                        codigo_producto,
                        concepto,
                        salidad_unidades,
                        salidad_costo_unitario,
                        salidad_costo_total,
                        existencia_unidades,
                        existencia_costo_unitario,
                        existencia_costo_total)

				VALUES(p_id_producto,
                         p_codigo_producto,
                        p_observacion,
                        v_unidades_salida,
                        v_costo_unitario_salida,
                        v_costo_total_salida,
                        v_unidades_ex,
                        v_costo_unitario_ex,
                        v_costo_total_ex);

            
     UPDATE producto 

	SET stock_producto = stock_producto-p_cantidad

	WHERE id_producto = p_id_producto ; 
    
    

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_registrar_o_actualizar_empresa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_registrar_o_actualizar_empresa`(
    IN p_id_empresa INT, -- Nuevo parámetro, NULL para INSERT
    IN p_razon_social VARCHAR(255),
    IN p_nombre_comercial VARCHAR(255),
    IN p_ruc VARCHAR(13),
    IN p_marca VARCHAR(255),
    IN p_forma_pago VARCHAR(13),
    IN p_direccion_matriz TEXT,
    IN p_direccion_sucursal TEXT,
    IN p_email VARCHAR(255),
    IN p_telefono VARCHAR(20),
    IN p_mensaje TEXT,
    IN p_contribuyente_especial VARCHAR(50),
    IN p_obligado_contabilidad VARCHAR(2),
    IN p_ambiente VARCHAR(1),
    IN p_tipo_emision VARCHAR(1),
    IN p_establecimiento_codigo VARCHAR(3),
    IN p_punto_emision_codigo VARCHAR(3),
    IN p_secuencial INT,
    IN p_codigo_iva INT,
    IN p_logo_path VARCHAR(255),
    IN p_id_usuario INT
)
BEGIN
  DECLARE mensaje VARCHAR(255);
	IF p_id_empresa IS NULL OR p_id_empresa = 0 THEN
        -- INSERT (Nuevo Registro)
        INSERT INTO empresa ( -- Reemplaza 'empresas' con el nombre real de tu tabla
            razon_social,
            nombre_comercial,
            ruc,
            marca,
            forma_pago_codigo,
            direccion_matriz,
            direccion_sucursal,
            email,
            telefono,
            mensaje,
            contribuyente_especial,
            obligado_contabilidad,
            ambiente,
            tipo_emision,
            establecimiento_codigo,
            punto_emision_codigo,
            secuencial,
            codigo_iva,
            logo_path
        ) VALUES (
            p_razon_social,
            p_nombre_comercial,
            p_ruc,
            p_marca,
            p_forma_pago,
            p_direccion_matriz,
            p_direccion_sucursal,
            p_email,
            p_telefono,
            p_mensaje,
            p_contribuyente_especial,
            p_obligado_contabilidad,
            p_ambiente,
            p_tipo_emision,
            p_establecimiento_codigo,
            p_punto_emision_codigo,
            p_secuencial,
            p_codigo_iva,
            p_logo_path
        );
 
         SET mensaje = 'Empresa registrada con éxito.';
    ELSE
        -- UPDATE (Actualización de Registro Existente)
        UPDATE empresa SET -- Reemplaza 'empresas'
            razon_social = p_razon_social,
            nombre_comercial = p_nombre_comercial,
            ruc = p_ruc,
            marca = p_marca,
            forma_pago_codigo = p_forma_pago,
            direccion_matriz = p_direccion_matriz,
            direccion_sucursal = p_direccion_sucursal,
            email = p_email,
            telefono = p_telefono,
            mensaje = p_mensaje,
            contribuyente_especial = p_contribuyente_especial,
            obligado_contabilidad = p_obligado_contabilidad,
            ambiente = p_ambiente,
            tipo_emision = p_tipo_emision,
            establecimiento_codigo = p_establecimiento_codigo,
            punto_emision_codigo = p_punto_emision_codigo,
            secuencial = p_secuencial,
            codigo_iva = p_codigo_iva,
            logo_path = p_logo_path -- Actualiza la ruta del logo
        WHERE id_empresa = p_id_empresa; -- Asegúrate de que 'id_empresa' sea tu clave primaria

          SET mensaje = 'Empresa actualizada con éxito';
    END IF;
             SELECT mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_RegistroMovimientoEntrada` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_RegistroMovimientoEntrada`(

in p_IdUsuario int,



                                                   in p_IdCaja int,



                                                   in p_tipo_pago int,



                                                   in p_Monto decimal(10,2),



                                                   in p_descripcion varchar(200) )
begin



	 



	 DECLARE v_id_arqueo INT;



     DECLARE v_id_movimiento INT;



 



   



	   -- Obtener el arqueo de caja abierto



    SELECT id_arqueo_caja INTO v_id_arqueo



    FROM arqueo_caja



    WHERE id_usuario = p_IdUsuario  and id_caja=p_IdCaja AND estado = 1



    ORDER BY fecha_inicio DESC



    LIMIT 1;



   



    IF v_id_arqueo IS NOT NULL then



    



          -- Obtener movimiento



    SELECT id_movimiento_caja INTO v_id_movimiento



    FROM movimiento_caja



    WHERE id_arqueo= v_id_arqueo and id_usuario = p_IdUsuario AND estado = 1 and tipo_movimiento='Ingreso'



    and tipo_referencia='Ingreso'



    ORDER BY fecha_registro DESC



    LIMIT 1;



    



      if v_id_movimiento is null then



        -- Insertar movimiento en caja



        INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)



        VALUES (v_id_arqueo, 'Ingreso', 'Ingreso', p_IdUsuario);



        



        SET v_id_movimiento = LAST_INSERT_ID();



        END IF;



     



       INSERT INTO detalle_ingresos (id_movimiento_caja, tipo_ingresos, tipo_pago, monto,descripcion)



        VALUES (v_id_movimiento, 'Otros', p_tipo_pago, p_Monto,p_descripcion);



       



       



    END IF;



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_RegistroMovimientoSalida` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_RegistroMovimientoSalida`(

                                                   in p_IdUsuario int,



                                                   in p_IdCaja int,



                                                   in p_tipo_pago int,



                                                   in p_monto decimal(10,2),



                                                   in p_descripcion varchar(200) )
begin



	 



	 DECLARE v_id_arqueo INT;



     DECLARE v_id_movimiento INT;



   



   



	   -- Obtener el arqueo de caja abierto



    SELECT id_arqueo_caja INTO v_id_arqueo



    FROM arqueo_caja



    WHERE id_usuario = p_IdUsuario  and id_caja=p_IdCaja AND estado = 1



    ORDER BY fecha_inicio DESC



    LIMIT 1;



   



    IF v_id_arqueo IS NOT NULL then



    



          -- Obtener movimiento



    SELECT id_movimiento_caja INTO v_id_movimiento



    FROM movimiento_caja



    WHERE id_arqueo= v_id_arqueo and id_usuario = p_IdUsuario AND estado = 1 and tipo_movimiento='Egreso'



    and tipo_referencia='Gasto'



    ORDER BY fecha_registro DESC



    LIMIT 1;



    



      if v_id_movimiento is null then



        -- Insertar movimiento en caja



        INSERT INTO movimiento_caja (id_arqueo, tipo_movimiento, tipo_referencia, id_usuario)



        VALUES (v_id_arqueo, 'Egreso', 'Gasto', p_IdUsuario);



        



        SET v_id_movimiento = LAST_INSERT_ID();



        END IF;



     



    -- Insertar en detalle_gastos



        INSERT INTO detalle_gastos (id_movimiento_caja,afectarCaja,tipo_gastos, tipo_pago,monto,descripcion)



        VALUES (v_id_movimiento,1,'Otros', p_tipo_pago, p_monto,p_descripcion);



   



       



    END IF;



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_RegistroProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_RegistroProducto`(
 in p_codigo_barra varchar(20),

                                                               in p_id_categoria_producto int,

                                                               in p_id_unidades int,

                                                               in p_descripcion_producto varchar(40),

                                                               in p_img_producto varchar(50),

                                                               in p_precio_compra_producto decimal(10,2),

                                                               in p_precio_venta_producto decimal(10,2),

                                                               in p_precio_1_producto decimal(10,2),

                                                               in p_precio_2_producto decimal(10,2),

                                                               in p_precio_fraccion decimal(10,2),

                                                               in p_precio_fraccion1 decimal(10,2),

                                                               in p_precio_fraccion2 decimal(10,2),

                                                               in p_unidades float,

                                                               in p_stock_fraccion float,

                                                               in p_lleva_iva_producto int,

                                                               in p_costo_total_producto decimal(10,2),

                                                               in p_stock_producto float,

                                                               in p_minimo_stock_producto float,    

                                                               in p_perecedero_producto int,

                                                               in p_ventas_producto float,

                                                               in p_ventas_fracion_producto float

                                                                 )
begin

	

	DECLARE J_fecha_registro datetime;

    declare J_concepto varchar(600);

	DECLARE J_IdProducto int;

	set J_fecha_registro = (select now());



insert

	into

	producto(codigo_barra,

	id_categoria_producto,

	id_unidades,

	descripcion_producto,

	img_producto,

	precio_compra_producto,

	precio_venta_producto,

	precio_1_producto,

	precio_2_producto,

	preccio_fraccion,

	precio_fraccion_1,

	precio_fraccion_2,

	unidades,

	stock_fraccion,

	lleva_iva_producto,

	costo_total_producto,

	stock_producto,

	minimo_stock_producto,

	perecedero_producto,

	ventas_producto,

	ventas_fracion_producto,

	fecha_creacion_producto

                           )



values (p_codigo_barra,

        p_id_categoria_producto,

        p_id_unidades,

        p_descripcion_producto,

        p_img_producto,

        p_precio_compra_producto,

        p_precio_venta_producto,

        p_precio_1_producto,

        p_precio_2_producto,

        p_precio_fraccion,

        p_precio_fraccion1,

        p_precio_fraccion2,

        p_unidades,

        p_stock_fraccion,

        p_lleva_iva_producto,

        p_costo_total_producto,

        p_stock_producto,

        p_minimo_stock_producto,    

        p_perecedero_producto,

        p_ventas_producto,

        p_ventas_fracion_producto,

        J_fecha_registro

              );

              

 SET J_IdProducto = LAST_INSERT_ID();



insert

	into

	stock_producto(

    id_producto,

	cantidad_comprada,

	stock_disponible,

	costo_unitario)

values(J_IdProducto,

       p_stock_producto,

       p_stock_producto,

       p_precio_compra_producto);

      

      set J_concepto='INVENTARIO INICIAL';

     

   INSERT INTO KARDEX (id_producto,

                       codigo_producto,

                       fecha,

                       concepto,

                       existencia_unidades,

                       existencia_costo_unitario,

                       existencia_costo_total)

               VALUES (J_IdProducto,

                       p_codigo_barra,

                       J_fecha_registro, 

                       J_concepto, 

                       p_stock_producto, 

                       p_precio_compra_producto, 

                       p_costo_total_producto);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_RegistroRol` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_RegistroRol`(
in p_descripcion varchar(100) )
BEGIN



declare fecha datetime;

set fecha = (select now());



INSERT INTO perfiles(descripcion, 

                                                                        estado, 

                                                                       

                                                                        fecha_creacion) 

                                                VALUES (p_descripcion, 

                                                        1, 

                                                      

                                                        fecha);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_reportes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_reportes`(
 in p_opcion int,
                                                    in p_fechaDesde varchar(10),
                                                    in p_fechaHasta varchar(10)
                                                   )
BEGIN

-- poco stock

if (p_opcion =1)then

select "" as vacio,p.codigo_barra,
		p.descripcion_producto,
        p.stock_producto,
        p.minimo_stock_producto
from producto p
where p.stock_producto <= p.minimo_stock_producto and p.estado='1'
order by p.stock_producto asc;

-- producto mas vendidos

elseif(p_opcion =2) then

SELECT 
    '' AS vacio,
    p.codigo_barra,
    p.descripcion_producto,
    SUM(vd.cantidad) AS cantidad,
    SUM(ROUND(vd.total_venta, 2)) AS total_venta
FROM det_venta vd
JOIN ventas v ON v.IdVenta = vd.IdVenta AND v.estado = '1'
JOIN producto p ON vd.codigo_barra = p.codigo_barra
WHERE vd.estado = '1'
  AND v.fecha_registro between p_fechaDesde AND p_fechaHasta
GROUP BY p.codigo_barra, p.descripcion_producto
ORDER BY total_venta DESC;

-- ganacias por producto

elseif(p_opcion =3) then 
SELECT 
    '' AS vacio,
    p.codigo_barra AS codigo_barra,
    p.descripcion_producto AS descripcion_producto,
    SUM(dvl.cantidad_vendida) AS total_cantidad_vendida,

    -- Promedio ponderado de venta con hasta 6 decimales y sin ceros sobrantes
    TRIM(TRAILING '0' FROM CAST(SUM(dvl.precio_venta * dvl.cantidad_vendida) / SUM(dvl.cantidad_vendida) AS DECIMAL(10,6))) AS precio_venta,

    -- Promedio ponderado de costo
    TRIM(TRAILING '0' FROM CAST(SUM(dvl.costo_unitario * dvl.cantidad_vendida) / SUM(dvl.cantidad_vendida) AS DECIMAL(10,6))) AS costo_unitario,

    -- Promedio ponderado de ganancia
    TRIM(TRAILING '0' FROM CAST(SUM((dvl.precio_venta - dvl.costo_unitario) * dvl.cantidad_vendida) / SUM(dvl.cantidad_vendida) AS DECIMAL(10,6))) AS ganancia_unitaria,

    -- Totales exactos
    SUM(dvl.precio_venta * dvl.cantidad_vendida) AS total_ventas,
    SUM(dvl.costo_unitario * dvl.cantidad_vendida) AS total_compras,
    SUM((dvl.precio_venta - dvl.costo_unitario) * dvl.cantidad_vendida) AS total_ganancia

FROM 
    ventas v
JOIN 
    det_venta dv ON v.IdVenta = dv.IdVenta
JOIN 
    det_venta_lote dvl ON dv.IdDetalleVenta = dvl.id_det_venta
JOIN 
    producto p ON dv.IdProducto = p.id_producto
WHERE 
    DATE(v.fecha_registro) BETWEEN p_fechaDesde AND p_fechaHasta
    AND v.estado = '1'
GROUP BY 
    p.codigo_barra, p.descripcion_producto
ORDER BY 
    total_ganancia DESC;


-- ventas  del dia de hoy 

elseif(p_opcion = 4) THEN

SELECT 
        CONCAT('Boleta Nro: ', v.nro_boleta, ' - Total Venta: $./ ', ROUND(dv.total_venta, 2)) AS nro_boleta,
        dv.codigo_barra,
        c.nombre_categoria,
        p.descripcion_producto,
        CONCAT(dv.cantidad, ' ', m.nombre_corto) AS cantidad,
        CONCAT('$./ ', ROUND(dv.total_venta, 2)) AS total_venta,
        dv.fecha_registro AS fecha_venta
    FROM det_venta dv
    INNER JOIN producto p ON dv.codigo_barra = p.codigo_barra
    INNER JOIN ventas v ON v.nro_boleta = dv.nro_boleta
                       AND v.IdVenta = dv.IdVenta 
                       AND v.estado = '1'
    INNER JOIN categorias c ON c.id_categoria = p.id_categoria_producto 
    INNER JOIN medidas m ON m.id_medida = p.id_unidades
    WHERE DATE(v.fecha_registro) = CURDATE()
    ORDER BY v.nro_boleta DESC;

end if;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_RevertirStockYkardex` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_RevertirStockYkardex`(
  IN p_IdVenta INT
)
BEGIN
    DECLARE v_IdProducto INT;
    DECLARE v_Cantidad INT;
    DECLARE v_IdDetVenta INT;
    DECLARE done INT DEFAULT FALSE;

    -- Cursor para recorrer los productos vendidos en esta venta
    DECLARE cur CURSOR FOR
        SELECT dv.IdProducto, dv.Cantidad, dv.id
        FROM det_venta dv
        WHERE dv.IdVenta = p_IdVenta;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    -- Abrimos cursor
    OPEN cur;

    leer_loop: LOOP
        FETCH cur INTO v_IdProducto, v_Cantidad, v_IdDetVenta;
        IF done THEN
            LEAVE leer_loop;
        END IF;

        -- 1️⃣ Reponer el stock al producto
        UPDATE producto
        SET stock_producto = stock_producto + v_Cantidad
        WHERE id_producto = v_IdProducto;

        -- 2️⃣ Reponer stock en los lotes (si manejas lotes puedes reinsertar stock en base a det_venta_lote)
        UPDATE producto_lote pl
        JOIN det_venta_lote dvl ON pl.id = dvl.id_lote
        SET pl.stock = pl.stock + dvl.cantidad
        WHERE dvl.id_det_venta = v_IdDetVenta;

    END LOOP;

    CLOSE cur;

    -- 3️⃣ Eliminar registros del kardex de esta venta
    DELETE FROM kardex
    WHERE comprobante IN (
        SELECT nro_boleta FROM ventas WHERE id_venta = p_IdVenta
    );

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_TopVentasCategorias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_TopVentasCategorias`()
BEGIN

	select cast(sum(vd.total_venta)  AS DECIMAL(8,2)) as y, c.nombre_categoria as label
    from det_venta vd inner join producto p on vd.codigo_barra = p.codigo_barra
                        inner join categorias c on c.id_categoria = p.id_categoria_producto
                        where vd.estado='1' and c.estado='1'
    group by c.nombre_categoria

    LIMIT 10;	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_top_ventas_categorias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_top_ventas_categorias`()
BEGIN

select cast(sum(vd.total_venta)  AS DECIMAL(8,2)) as y, c.nombre_categoria as label

    from det_venta vd inner join producto p on vd.codigo_barra = p.codigo_barra

                        inner join categorias c on c.id_categoria = p.id_categoria_producto

                        where vd.Activo=1

    group by c.nombre_categoria



    LIMIT 10;	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ValidarEliminacionCompra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ValidarEliminacionCompra`(
 IN p_IdCompra INT
)
validar: BEGIN -- se declara un bloque etiquetado 'validar'
    DECLARE v_total_problemas INT DEFAULT 0;
    DECLARE v_mensaje VARCHAR(255);
    DECLARE v_id_compras VARCHAR(100);
    IF NOT EXISTS (
        SELECT 1 FROM compras WHERE IdCompra = p_IdCompra AND estado = '1'
    ) THEN
        SET v_mensaje = 'La compra no existe o ya está anulada.';
        SELECT v_mensaje AS resultado;
        LEAVE validar;
    END IF;

      -- Validar si existen lotes con stock insuficiente
    SELECT COUNT(*) INTO v_total_problemas
    FROM lote_producto lp
    INNER JOIN det_compra dc ON dc.IdDetCompra = lp.id_det_compra
    WHERE dc.IdCompra = p_IdCompra
      AND lp.stock_disponible < lp.cantidad_comprada
      AND lp.estado = 1;

    IF v_total_problemas > 0 THEN
       
 select c.nro_boletacompras  INTO v_id_compras from compras c where c.IdCompra = p_IdCompra;
     SET v_mensaje = CONCAT('No se puede anular la compra: ', v_id_compras, ' lote(s) tienen stock insuficiente.');
        SELECT v_mensaje AS resultado;
        LEAVE validar;
    END IF;
    
     -- Validar si tiene abonos en crédito
    IF EXISTS (
        SELECT 1
        FROM compras_credito
        WHERE id_compra = p_IdCompra
          AND monto_abonado > 0
          AND estado NOT IN ('Eliminado', 'Inactivo')
    ) THEN
        SET v_mensaje = 'No se puede anular: la compra tiene abonos registrados.';
        SELECT v_mensaje AS resultado;
        LEAVE validar;
    END IF;
 -- Si pasa todas las validaciones
    SET v_mensaje = 'OK';
    SELECT v_mensaje AS resultado;
END validar ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ValidarEliminacionVenta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ValidarEliminacionVenta`(
  IN p_IdVenta INT,
    IN p_id_usuario INT
)
BEGIN
    DECLARE v_clave_acceso VARCHAR(50);
    DECLARE v_fecha_autorizacion DATETIME;
    DECLARE v_abonos INT;
    DECLARE v_mensaje VARCHAR(255);

    -- Validar si la venta existe
    IF NOT EXISTS (SELECT 1 FROM ventas WHERE IdVenta = p_IdVenta) THEN
        SET v_mensaje = 'La venta no existe.';
    ELSE
        -- Validar si fue autorizada por SRI
        SELECT clave_acceso, fecha_autorizacion
        INTO v_clave_acceso, v_fecha_autorizacion
        FROM ventas
        WHERE IdVenta = p_IdVenta;

        IF v_clave_acceso IS NOT NULL OR v_fecha_autorizacion IS NOT NULL THEN
            SET v_mensaje = 'La venta ya fue autorizada por el SRI. No se puede eliminar.';
        ELSE
            -- Validar si tiene abonos registrados en crédito
            SELECT COUNT(*)
            INTO v_abonos
            FROM abonos_credito ab
            JOIN ventas_credito vc ON vc.id_venta_credito = ab.id_venta_credito
            WHERE vc.id_venta = p_IdVenta AND ab.estado = '1';

            IF v_abonos > 0 THEN
                SET v_mensaje = 'La venta tiene abonos de crédito. No se puede eliminar.';
            ELSE
                SET v_mensaje = 'OK';
            END IF;
        END IF;
    END IF;

    -- Retornar resultado
    SELECT v_mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ValidarEliminarCompra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ValidarEliminarCompra`(
IN p_nroBoleta VARCHAR(20),

    IN p_IdUsuario INT

)
begin

    DECLARE v_stock_insuficiente INT DEFAULT 0;

    DECLARE v_IdCompra INT;

    DECLARE v_id_arqueo INT;

    DECLARE v_mensaje VARCHAR(255) DEFAULT '';
  

    -- 1️ Verificar que la compra exista y esté activa

    SELECT IdCompra INTO v_IdCompra

    FROM compras

    WHERE  CAST(nro_boletacompras AS CHAR) = CAST(p_nroBoleta AS CHAR)  AND Activo = 1;

    
    IF v_IdCompra IS NULL THEN

        SET v_mensaje = CONCAT(v_mensaje, 'Error: La compra no existe o ya fue eliminada. ');

    END IF;


    -- 2 Validar que el usuario tenga un arqueo de caja activo

    SELECT id_arqueo_caja INTO v_id_arqueo 

    FROM arqueo_caja 

    WHERE id_usuario = p_IdUsuario AND estado = 1 

    ORDER BY fecha_inicio DESC 

    LIMIT 1;


    IF v_id_arqueo IS NULL THEN

        SET v_mensaje = CONCAT(v_mensaje, 'Error: No hay un arqueo de caja activo para el usuario. ');

    END IF;



    --  Verificar que haya suficiente stock antes de descontarlo

    select  COUNT(*) INTO v_stock_insuficiente

    from stock_producto sp 

    inner join det_compra dc  on  sp.id_producto = dc.IdProducto 

    where dc.IdCompra= v_IdCompra  and sp.stock_disponible  < dc.Cantidad ;

    
    IF v_stock_insuficiente > 0 THEN    

        SET v_mensaje = CONCAT(v_mensaje, 'Error: No hay suficiente stock para eliminar esta compra. ');  

    END IF;

   

       -- Si hay mensajes de error, los devolvemos

    IF v_mensaje <> '' THEN

        SELECT v_mensaje AS mensaje_error;

    ELSE

        SELECT 'OK' AS mensaje_error;

    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ValidarEliminarVenta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ValidarEliminarVenta`(
    IN p_IdVenta INT,
    IN p_id_usuario INT
)
BEGIN
    DECLARE v_clave_acceso VARCHAR(50);
    DECLARE v_fecha_autorizacion DATETIME;
    DECLARE v_abonos INT;
    DECLARE v_mensaje VARCHAR(255);

    -- Validar si la venta existe
    IF NOT EXISTS (SELECT 1 FROM ventas WHERE IdVenta = p_IdVenta) THEN
        SET v_mensaje = 'La venta no existe.';
    ELSE
        -- Validar si fue autorizada por SRI
        SELECT clave_acceso, fecha_autorizacion
        INTO v_clave_acceso, v_fecha_autorizacion
        FROM ventas
        WHERE IdVenta = p_IdVenta;

        IF v_clave_acceso IS NOT NULL OR v_fecha_autorizacion IS NOT NULL THEN
            SET v_mensaje = 'La venta ya fue autorizada por el SRI. No se puede eliminar.';
        ELSE
            -- Validar si tiene abonos registrados en crédito
            SELECT COUNT(*)
            INTO v_abonos
            FROM abonos_credito ab
            JOIN ventas_credito vc ON vc.id_venta_credito = ab.id_venta_credito
            WHERE vc.id_venta = p_IdVenta AND ab.estado = '1';

            IF v_abonos > 0 THEN
                SET v_mensaje = 'La venta tiene abonos de crédito. No se puede eliminar.';
            ELSE
                SET v_mensaje = 'OK';
            END IF;
        END IF;
    END IF;

    -- Retornar resultado
    SELECT v_mensaje AS resultado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_ValidarLicencia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_ValidarLicencia`(

in p_usuario varchar(20),

in p_password text, 

in p_ip varchar(30) ,

in p_opcion char(1))
BEGIN



declare J_id_usuario int;

declare J_fecha datetime;



set J_fecha = (select now());

if (p_opcion=1) then

 set J_id_usuario=( select u.id_usuario

                                                from usuarios u 

                                                inner join perfiles p

                                                on u.id_perfil_usuario = p.id_perfil

                                                inner join perfil_modulo pm

                                                on pm.id_perfil = u.id_perfil_usuario

                                                inner join modulos m

                                                on m.id = pm.id_modulo

                                                where u.usuario = p_usuario

                                                and u.clave = p_password

                                                and vista_inicio = 1);

                                                

                                                

select * from licencia_alquirida li_ar inner join licencia li on

li_ar.id_licencia=li.id_licencia and li_ar.estado=1 

where  li_ar.direccion_mac=p_ip  and li_ar.id_usuario= J_id_usuario and li_ar.fecha_vigente >= J_fecha;



elseif(p_opcion=2) then



select * 

                                                from usuarios u 

                                                inner join perfiles p

                                                on u.id_perfil_usuario = p.id_perfil

                                                inner join perfil_modulo pm

                                                on pm.id_perfil = u.id_perfil_usuario

                                                inner join modulos m

                                                on m.id = pm.id_modulo

                                                where u.usuario = p_usuario

                                                and u.clave = p_password

                                                and vista_inicio = 1;

                                                

                                                end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_VentasCreditoAbonar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_VentasCreditoAbonar`(
IN p_id_Cliente int
)
BEGIN

SELECT 
    '' AS vacio,
    cl.id_cliente,
    CONCAT(cl.nombre, ' ', cl.apellido) AS nombre_cliente,
    SUM(vc.monto_total) AS monto_total,
    SUM(vc.monto_abonado) AS monto_abonado,
    SUM(vc.saldo_pendiente) AS saldo_pendiente,
    vc.estado
FROM 
    ventas_credito vc
INNER JOIN 
    ventas v ON vc.id_venta = v.IdVenta
INNER JOIN 
    cliente cl ON v.IdCliente = cl.id_cliente
    where vc.id_cliente= p_id_Cliente AND vc.estado='Pendiente' 
GROUP BY 
    cl.id_cliente, cl.nombre, cl.apellido, vc.estado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usp_VerificaStockProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_VerificaStockProducto`(

in p_codigo_producto varchar(50), 
in p_cantidad_a_vender float 

)
BEGIN

	        -- Eliminar espacios al inicio y fin
    SET p_codigo_producto = LTRIM(RTRIM(p_codigo_producto));
SELECT   count(*) as existe

                                                    FROM producto p

                                                   WHERE p.codigo_barra = p_codigo_producto

                                                     AND p.stock_producto >= p_cantidad_a_vender

                                                     AND p.estado = 1 ;

	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-23 18:29:43
