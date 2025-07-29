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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abonos_compra_credito`
--

LOCK TABLES `abonos_compra_credito` WRITE;
/*!40000 ALTER TABLE `abonos_compra_credito` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abonos_credito`
--

LOCK TABLES `abonos_credito` WRITE;
/*!40000 ALTER TABLE `abonos_credito` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ajuste_lote`
--

LOCK TABLES `ajuste_lote` WRITE;
/*!40000 ALTER TABLE `ajuste_lote` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arqueo_caja`
--

LOCK TABLES `arqueo_caja` WRITE;
/*!40000 ALTER TABLE `arqueo_caja` DISABLE KEYS */;
INSERT INTO `arqueo_caja` VALUES (1,1,1,'2025-07-28 21:02:53',NULL,80.00,0.00,0.00,0.00,0.00,0.00,0.00,'hasta ',NULL,'1');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asiento_contable`
--

LOCK TABLES `asiento_contable` WRITE;
/*!40000 ALTER TABLE `asiento_contable` DISABLE KEYS */;
INSERT INTO `asiento_contable` VALUES (1,'2025-07-28','Inventario inicial del producto Refresco Cola 2L','INVENTARIO_INICIAL',1,'PRODUCTO',10.00,10.00,'2025-07-28 20:56:35','producto'),(2,'2025-07-28','Inventario inicial del producto Leche Entera 1L','INVENTARIO_INICIAL',2,'PRODUCTO',24.00,24.00,'2025-07-28 21:00:06','producto');
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
INSERT INTO `categorias` VALUES (1,'fungisidad',NULL,1,'2025-07-28 20:54:50',NULL,NULL,NULL,NULL,'1');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'04','0908989787878','Edison Gabriel','Garofalo Bustamante','barrio','000980999898','garfolaoeedisn@gmail.com',1,'2025-07-28 21:24:25',NULL,NULL,NULL,NULL,'1');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (1,1,NULL,'00000044',19.57,2.93,22.50,'FACTURA',NULL,'009','2025-08-30',1,'2025-07-29 15:43:57',NULL,'2025-07-29 15:44:15',NULL,NULL,'0','CREDITO');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras_credito`
--

LOCK TABLES `compras_credito` WRITE;
/*!40000 ALTER TABLE `compras_credito` DISABLE KEYS */;
INSERT INTO `compras_credito` VALUES (1,1,'00000001',22.50,0.00,22.50,'2025-08-30','2025-11-01','2025-07-29 15:43:58','Eliminado');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprobantes_electronicos`
--

LOCK TABLES `comprobantes_electronicos` WRITE;
/*!40000 ALTER TABLE `comprobantes_electronicos` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_compra`
--

LOCK TABLES `det_compra` WRITE;
/*!40000 ALTER TABLE `det_compra` DISABLE KEYS */;
INSERT INTO `det_compra` VALUES (1,'00000044',1,1,'PROD0001',10,1.00,NULL,8.70,1.30,10.00,'2025-07-29 15:43:57','2025-07-29 15:44:15',NULL,'0'),(2,'00000044',1,2,'PROD0002',10,1.25,NULL,10.87,1.63,12.50,'2025-07-29 15:43:57','2025-07-29 15:44:15',NULL,'0');
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
  PRIMARY KEY (`IdDetalleVenta`),
  KEY `fk_det_venta_id_venta` (`IdVenta`),
  KEY `fk_det_venta_id_producto` (`IdProducto`),
  CONSTRAINT `fk_det_venta_id_venta` FOREIGN KEY (`IdVenta`) REFERENCES `ventas` (`IdVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_venta`
--

LOCK TABLES `det_venta` WRITE;
/*!40000 ALTER TABLE `det_venta` DISABLE KEYS */;
INSERT INTO `det_venta` VALUES (1,'00000053',1,2,'PROD0002','Leche Entera 1L',2,NULL,1.50,0.39,2.61,3.00,NULL,'2025-07-28 21:33:35','2025-07-29 14:19:45',NULL,'0'),(2,'00000053',1,1,'PROD0001','Refresco Cola 2L',2,NULL,1.50,0.39,2.61,3.00,NULL,'2025-07-28 21:33:35','2025-07-29 14:19:45',NULL,'0'),(3,'00000054',2,2,'PROD0002','Leche Entera 1L',3,NULL,1.50,0.59,3.91,4.50,NULL,'2025-07-28 21:48:21','2025-07-29 14:16:03',NULL,'0'),(4,'00000054',2,1,'PROD0001','Refresco Cola 2L',3,NULL,1.50,0.59,3.91,4.50,NULL,'2025-07-28 21:48:21','2025-07-29 14:16:03',NULL,'0');
/*!40000 ALTER TABLE `det_venta` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_venta_lote`
--

LOCK TABLES `det_venta_lote` WRITE;
/*!40000 ALTER TABLE `det_venta_lote` DISABLE KEYS */;
INSERT INTO `det_venta_lote` (`id_detalle_venta_stock`, `id_det_venta`, `id_lote`, `cantidad_vendida`, `precio_venta`, `costo_unitario`, `estado`) VALUES (1,1,2,2,1.50,1.20,'0'),(2,2,1,2,1.50,1.00,'0'),(3,3,2,3,1.50,1.20,'0'),(4,4,1,3,1.50,1.00,'0');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_asiento`
--

LOCK TABLES `detalle_asiento` WRITE;
/*!40000 ALTER TABLE `detalle_asiento` DISABLE KEYS */;
INSERT INTO `detalle_asiento` VALUES (1,1,9,10.00,0.00,'Registro de inventario inicialRefresco Cola 2L',1),(2,1,13,0.00,10.00,'Contrapartida por ajuste de producto Refresco Cola 2L',2),(3,2,9,24.00,0.00,'Registro de inventario inicialLeche Entera 1L',1),(4,2,13,0.00,24.00,'Contrapartida por ajuste de producto Leche Entera 1L',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_devoluciones`
--

LOCK TABLES `detalle_devoluciones` WRITE;
/*!40000 ALTER TABLE `detalle_devoluciones` DISABLE KEYS */;
INSERT INTO `detalle_devoluciones` VALUES (1,3,0,2,'Venta','00000054',NULL,NULL,9.00,'Devolucion de Venta Id: 2','1','2025-07-29 13:58:56',NULL,NULL),(2,3,0,2,'Venta','00000054',NULL,NULL,9.00,'Devolucion de Venta Id: 2','1','2025-07-29 14:16:03',NULL,NULL),(3,3,0,1,'Venta','00000053',NULL,NULL,6.00,'Devolucion de Venta Id: 1','1','2025-07-29 14:19:45',NULL,NULL),(4,3,0,NULL,'Compra',NULL,1,'00000044',22.50,'Eliminación de compra Id: 1','1','2025-07-29 15:44:15',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_gastos`
--

LOCK TABLES `detalle_gastos` WRITE;
/*!40000 ALTER TABLE `detalle_gastos` DISABLE KEYS */;
INSERT INTO `detalle_gastos` VALUES (1,2,0,'Compras',2,1,NULL,'009','00000044','00000001',0.00,'Compra de mercaderia','0','2025-07-29 15:43:57','2025-07-29 15:44:15',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ingresos`
--

LOCK TABLES `detalle_ingresos` WRITE;
/*!40000 ALTER TABLE `detalle_ingresos` DISABLE KEYS */;
INSERT INTO `detalle_ingresos` VALUES (1,1,'Ventas',1,1,NULL,'00000053',NULL,10.00,'Venta de producto','0','2025-07-28 21:33:35','2025-07-29 14:19:45',NULL),(2,1,'Ventas',2,2,NULL,'00000054',NULL,1.00,'Venta de producto','0','2025-07-28 21:48:21','2025-07-29 13:58:56',NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dinero`
--

LOCK TABLES `dinero` WRITE;
/*!40000 ALTER TABLE `dinero` DISABLE KEYS */;
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
INSERT INTO `empresa` VALUES (1,NULL,'Ventas de Producto Agricola','El Agricultor','0804610814001','Esmeralda','AV Las Golondrinas',NULL,'NO','1','1','001','001',1,NULL,NULL,'00000054','00000010','00000044','0','garofaloedison8@gmail.com','0992335080',NULL,'2025-05-03 19:57:34','2025-07-29 15:43:57',NULL,'1',4,NULL,'01','14',NULL,NULL,NULL,NULL,NULL,'01','2'),(2,1,'ffffffdff','2','1234678995','barrio entre rios','das','si','SI','1','1','001','001',1,'dwww',NULL,NULL,NULL,NULL,NULL,'edisongarofalo88@gmail.com','5555555','ddddddddddd','2025-06-12 14:34:45','2025-07-29 15:43:57',NULL,'2',0,'Views/assets/imagenes/logo/logo_684b2bd5447c5.PNG','01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,2,'Proveedor anime ','Mundo del aime ','0804610014001','barrio entre rios1','Guayauqii 1','SI','NO','2','2','001','002',2,'Bleacjha ',NULL,NULL,NULL,NULL,NULL,'edisongarofalo881@gmail.com','55555551','gracias por su comras1','2025-06-12 14:41:08','2025-07-29 15:43:57',NULL,'1',2,'Views/assets/imagenes/logo/logo_684b2d54d9e4a.PNG','01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,1,'ffffffdff','Mundo del aime 1','0804610814','barrio entre rios','ffffffff','SI','SI','1','2','090','090',2,'Bleacjha 1',NULL,NULL,NULL,NULL,NULL,'edisongarofalo88@gmail.com','5555555','dffdfffffff','2025-06-12 22:09:36','2025-07-29 15:43:57',NULL,'2',4,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,'Aniemis','Salinas','0920910920191','ddddd','dndndnd','SI','SI','1','2','001','002',1,'Maee',NULL,NULL,NULL,NULL,NULL,'mariajtkm_2011@hotmail.com','(095) 918-8170','sdsdssdsddssdsdsd','2025-07-19 19:38:12','2025-07-29 15:43:57',NULL,'1',4,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,'DausukiAnime','Guaya quli','0920910920191','sadsdasdsa','ssdasdssdads','SI','SI','1','2','001','002',1,'dai',NULL,NULL,NULL,NULL,NULL,'mariajtkm_2011@hotmail.com','(095) 918-8170','ddsadsaadsadsads','2025-07-19 21:12:18','2025-07-29 15:43:57',NULL,'1',4,'','01','0',NULL,NULL,NULL,NULL,NULL,'21','2');
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kardex`
--

LOCK TABLES `kardex` WRITE;
/*!40000 ALTER TABLE `kardex` DISABLE KEYS */;
INSERT INTO `kardex` VALUES (1,1,1,'PROD0001','2025-07-28 20:56:35','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,10,1.00,10.00),(2,1,2,'PROD0002','2025-07-28 21:00:06','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,1.20,24.00),(3,1,2,'PROD0002','2025-07-28 21:33:35','Venta de producto','00000053',NULL,NULL,NULL,2,1.20,2.40,18,1.20,21.60),(4,1,1,'PROD0001','2025-07-28 21:33:35','Venta de producto','00000053',NULL,NULL,NULL,2,1.00,2.00,8,1.00,8.00),(5,1,2,'PROD0002','2025-07-28 21:48:21','Venta de producto','00000054',NULL,NULL,NULL,3,1.20,3.60,15,1.20,18.00),(6,1,1,'PROD0001','2025-07-28 21:48:21','Venta de producto','00000054',NULL,NULL,NULL,3,1.00,3.00,5,1.00,5.00),(7,1,2,'PROD0002','2025-07-29 14:16:03','Devolucion de Venta: Id2','00000054',3,1.20,3.60,NULL,NULL,NULL,18,1.20,21.60),(8,1,1,'PROD0001','2025-07-29 14:16:03','Devolucion de Venta: Id2','00000054',3,1.00,3.00,NULL,NULL,NULL,8,1.00,8.00),(9,1,2,'PROD0002','2025-07-29 14:19:45','Devolucion de Venta: Id1','00000053',2,1.20,2.40,NULL,NULL,NULL,20,1.20,24.00),(10,1,1,'PROD0001','2025-07-29 14:19:45','Devolucion de Venta: Id1','00000053',2,1.00,2.00,NULL,NULL,NULL,10,1.00,10.00),(11,1,1,'PROD0001','2025-07-29 15:43:57','Compra de productos','00000044',10,1.00,10.00,NULL,NULL,NULL,20,1.00,30.00),(12,1,2,'PROD0002','2025-07-29 15:43:57','Compra de productos','00000044',10,1.25,12.50,NULL,NULL,NULL,30,1.25,50.00),(14,1,1,'PROD0001','2025-07-29 15:44:15','Eliminación de compra Id:1','00000044',NULL,NULL,NULL,10,1.00,10.00,10,1.00,10.00),(15,1,2,'PROD0002','2025-07-29 15:44:15','Eliminación de compra Id:1','00000044',NULL,NULL,NULL,10,1.25,12.50,20,1.25,25.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=331 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_auditoria`
--

LOCK TABLES `log_auditoria` WRITE;
/*!40000 ALTER TABLE `log_auditoria` DISABLE KEYS */;
INSERT INTO `log_auditoria` VALUES (1,'medidas','registrar',1,'2025-04-29 17:35:16','Registrar una Medidas',NULL,NULL),(2,'medidas','Actualizar',1,'2025-04-29 17:36:54','Actualizar una Medidas con el id:9',NULL,NULL),(3,'medidas','Eliminar',1,'2025-04-29 17:54:12','Eliminar una Medidas con el id:5',NULL,NULL),(4,'medidas','registrar',1,'2025-04-29 17:54:59','Registrar una Medidas',NULL,NULL),(5,'medidas','Actualizar',1,'2025-04-29 17:55:12','Actualizar una Medidas con el id:10',NULL,NULL),(6,'medidas','registrar',1,'2025-04-29 18:04:28','Registrar una Medidas',NULL,NULL),(7,'medidas','Actualizar',1,'2025-04-29 18:05:16','Actualizar una Medidas con el id: 11',NULL,NULL),(8,'medidas','Eliminar',1,'2025-04-29 18:08:26','Eliminar una Medidas con el id: 11',NULL,NULL),(9,'categorias','registrar',1,'2025-04-29 19:24:51','Registrar una Categoria',NULL,NULL),(10,'categorias','registrar',1,'2025-04-29 19:31:07','Registrar una Categoria',NULL,NULL),(11,'categorias','registrar',1,'2025-04-29 20:04:52','Registrar una Categoria',NULL,NULL),(12,'categorias','Actualizar',1,'2025-04-29 20:05:12','Actualizar una Categoria con el id: 5',NULL,NULL),(13,'categorias','Actualizar',1,'2025-04-29 20:30:49','Actualizar una Categoria con el id: 5',NULL,NULL),(14,'categorias','registrar',1,'2025-04-29 20:31:03','Registrar una Categoria',NULL,NULL),(15,'categorias','Eliminar',1,'2025-04-29 20:31:17','Eliminar una categoria con el id: 6',NULL,NULL),(16,'producto','registrar',1,'2025-04-30 10:49:35','Registrar una Producto',NULL,NULL),(17,'producto','registrar',1,'2025-04-30 10:53:12','Registrar una Producto',NULL,NULL),(18,'producto','registrar',1,'2025-04-30 11:05:11','Registrar una Producto',NULL,NULL),(19,'producto','registrar',1,'2025-04-30 11:24:26','Registrar una Producto',NULL,NULL),(20,'producto','registrar',1,'2025-04-30 11:27:38','Registrar una Producto',NULL,NULL),(21,'producto','registrar',1,'2025-04-30 11:38:06','Registrar una Producto',NULL,NULL),(22,'producto','registrar',1,'2025-04-30 11:42:01','Registrar una Producto',NULL,NULL),(23,'producto','registrar',1,'2025-04-30 11:42:13','Registrar una Producto',NULL,NULL),(24,'producto','registrar',1,'2025-04-30 11:42:27','Registrar una Producto',NULL,NULL),(25,'producto','registrar',1,'2025-04-30 11:44:22','Registrar una Producto',NULL,NULL),(26,'producto','registrar',1,'2025-04-30 11:48:32','Registrar una Producto',NULL,NULL),(27,'producto','registrar',1,'2025-04-30 11:49:20','Registrar una Producto',NULL,NULL),(28,'producto','registrar',1,'2025-04-30 11:51:16','Registrar una Producto',NULL,NULL),(29,'producto','registrar',1,'2025-04-30 11:57:29','Registrar una Producto',NULL,NULL),(30,'producto','registrar',1,'2025-04-30 12:05:11','Registrar una Producto',NULL,NULL),(31,'producto','Actualizar',1,'2025-04-30 13:43:04','Actualizar un Producto con el id: 1',NULL,NULL),(32,'producto','registrar',1,'2025-04-30 13:46:44','Registrar una Producto',NULL,NULL),(33,'producto','Actualizar',1,'2025-04-30 13:49:31','Actualizar un Producto con el id: 2',NULL,NULL),(34,'producto','Actualizar',1,'2025-04-30 13:51:40','Actualizar un Producto con el id: 2',NULL,NULL),(35,'producto','registrar',1,'2025-04-30 15:00:31','Registrar una Producto',NULL,NULL),(36,'producto','Actualizar',1,'2025-04-30 15:01:05','Actualizar un Producto con el id: 3',NULL,NULL),(37,'proveedor','registrar',1,'2025-04-30 16:33:47','Registrar un Proveedor',NULL,NULL),(38,'proveedor','Actualizar',1,'2025-04-30 16:34:53','Actualizar un Proveedor con el id: 1',NULL,NULL),(39,'medidas','Eliminar',1,'2025-04-30 16:43:48','Eliminar una Medidas con el id: 10',NULL,NULL),(40,'medidas','Eliminar',1,'2025-04-30 16:52:31','Eliminar una Medidas con el id: 11',NULL,NULL),(41,'categorias','Eliminar',1,'2025-04-30 16:52:55','Eliminar una categoria con el id: 6',NULL,NULL),(42,'proveedor','Actualizar',1,'2025-04-30 17:04:03','Actualizar un Proveedor con el id: 1',NULL,NULL),(43,'proveedor','Eliminar',1,'2025-04-30 17:09:54','Eliminar un Proveedor con el id: 1',NULL,NULL),(44,'cliente','registrar',1,'2025-04-30 18:35:50','Registrar un Cliente',NULL,NULL),(45,'cliente','Actualizar',1,'2025-04-30 18:43:34','Actualizar un Cliente con el id: 1',NULL,NULL),(46,'cliente','Eliminar',1,'2025-04-30 19:08:07','Eliminar un Cliente con el id: 1',NULL,NULL),(47,'cliente','registrar',1,'2025-04-30 19:54:01','Registrar un Cliente',NULL,NULL),(48,'producto','Actualizar',1,'2025-05-03 10:23:23','Actualizar un Producto con el id: 1',NULL,NULL),(49,'producto','registrar',1,'2025-05-05 16:20:59','Registrar una Producto',NULL,NULL),(50,'producto','registrar',1,'2025-05-05 16:21:22','Registrar una Producto',NULL,NULL),(51,'producto','Actualizar',1,'2025-05-06 14:07:13','Actualizar un Producto con el id: 4',NULL,NULL),(52,'medidas','registrar',1,'2025-05-09 08:51:36','Registrar una Medidas',NULL,NULL),(53,'medidas','Actualizar',1,'2025-05-09 08:52:07','Actualizar una Medidas con el id: 12',NULL,NULL),(54,'categorias','registrar',1,'2025-05-09 09:23:13','Registrar una Categoria',NULL,NULL),(55,'categorias','Actualizar',1,'2025-05-09 09:30:45','Actualizar una Categoria con el id: 7',NULL,NULL),(56,'categorias','registrar',1,'2025-05-09 09:30:53','Registrar una Categoria',NULL,NULL),(57,'categorias','Actualizar',1,'2025-05-09 09:31:02','Actualizar una Categoria con el id: 8',NULL,NULL),(58,'cliente','registrar',1,'2025-05-09 10:58:07','Registrar un Cliente',NULL,NULL),(59,'cliente','Actualizar',1,'2025-05-09 10:59:39','Actualizar un Cliente con el id: 3',NULL,NULL),(60,'proveedor','registrar',1,'2025-05-09 11:04:38','Registrar un Proveedor',NULL,NULL),(61,'proveedor','Actualizar',1,'2025-05-09 11:05:19','Actualizar un Proveedor con el id: 2',NULL,NULL),(62,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-05-15 14:51:40','Compra registrada completa con ID: 18',18,'Compra'),(63,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compras a credito','INSERT/UPDATE',1,'2025-05-15 15:10:06','Compra registrada completa con ID: 1',1,'Compra'),(64,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compras a credito','INSERT/UPDATE',1,'2025-05-15 15:10:08','Compra registrada completa con ID: 1',1,'Compra'),(65,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compras a credito','INSERT/UPDATE',1,'2025-05-15 15:10:09','Compra registrada completa con ID: 1',1,'Compra'),(66,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compras a credito','INSERT/UPDATE',1,'2025-05-15 15:10:09','Compra registrada completa con ID: 1',1,'Compra'),(67,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compras a credito','INSERT/UPDATE',1,'2025-05-15 15:10:10','Compra registrada completa con ID: 1',1,'Compra'),(68,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compras a credito','INSERT/UPDATE',1,'2025-05-15 15:10:10','Compra registrada completa con ID: 1',1,'Compra'),(69,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-05-15 15:11:51','Compra registrada completa con ID: 21',21,'Compra'),(70,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-05-15 15:13:18','Compra registrada completa con ID: 23',23,'Compra'),(71,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-05-15 15:14:25','Compra registrada completa con ID: 24',24,'Compra'),(72,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-05-15 15:58:50','Compra registrada completa con ID: 25',25,'Compra'),(73,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-05-15 16:51:55','Compra registrada completa con ID: 26',26,'Compra'),(74,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-05-16 13:31:31','Compra registrada completa con ID: 28',28,'Compra'),(75,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-05-16 17:43:02','Compra registrada completa con ID: 29',29,'Compra'),(76,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-05-16 18:17:24','Compra registrada completa con ID: 30',30,'Compra'),(77,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-05-16 18:44:15','Compra registrada completa con ID: 31',31,'Compra'),(78,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-05-16 18:48:01','Compra registrada completa con ID: 32',32,'Compra'),(79,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-05-16 18:52:49','Compra registrada completa con ID: 33',33,'Compra'),(80,'medidas','Registrar',1,'2025-05-24 14:03:13','Registrar una Medidas',NULL,NULL),(81,'medidas','Actualizar',1,'2025-05-24 14:03:36','Actualizar una Medidas con el id: 13',NULL,NULL),(82,'medidas','Eliminar',1,'2025-05-24 14:34:20','Eliminar una Medidas con el id: 13',NULL,NULL),(83,'medidas','Eliminar',1,'2025-05-24 14:35:00','Eliminar una Medidas con el id: 12',NULL,NULL),(84,'medidas','Eliminar',1,'2025-05-24 15:09:15','Eliminar una Medidas con el id: 10',NULL,NULL),(85,'medidas','Actualizar',1,'2025-05-24 17:08:01','Actualizar una Medidas con el id: 9',NULL,NULL),(86,'medidas','Actualizar',1,'2025-05-24 17:10:55','Actualizar una Medidas con el id: 9',NULL,NULL),(87,'medidas','Registrar',1,'2025-05-24 17:11:07','Registrar una Medidas',NULL,NULL),(88,'medidas','Actualizar',1,'2025-05-24 17:11:20','Actualizar una Medidas con el id: 14',NULL,NULL),(89,'medidas','Actualizar',1,'2025-05-24 17:48:57','Actualizar una Medidas con el id: 1',NULL,NULL),(90,'medidas','Registrar',1,'2025-05-24 17:51:57','Registrar una Medidas',NULL,NULL),(91,'medidas','Actualizar',1,'2025-05-24 17:52:19','Actualizar una Medidas con el id: 15',NULL,NULL),(92,'medidas','Eliminar',1,'2025-05-24 17:53:11','Eliminar una Medidas con el id: 13',NULL,NULL),(93,'cliente','Actualizar',1,'2025-05-24 20:36:07','Registrar un Cliente con el id: 7',7,'Cliente'),(94,'cliente','Actualizar',1,'2025-05-24 20:36:44','Actualizar un Cliente con el id: 7',7,'Cliente'),(95,'cliente','Eliminar',1,'2025-05-24 20:37:02','Eliminar un Cliente con el id: 7',7,'Cliente'),(96,'proveedor','Actualizar',1,'2025-05-24 21:41:11','Registrar un Proveedor con el id: 3',3,'Proveedor'),(97,'proveedor','Actualizar',1,'2025-05-24 21:46:44','Registrar un Proveedor con el id: 4',4,'Proveedor'),(98,'proveedor','Actualizar',1,'2025-05-24 21:49:09','Actualizar un Proveedor con el id: 3',3,'Proveedor'),(99,'proveedor','Actualizar',1,'2025-05-24 21:51:16','Actualizar un Proveedor con el id: 3',3,'Proveedor'),(100,'proveedor','Actualizar',1,'2025-05-24 21:51:37','Actualizar un Proveedor con el id: 4',4,'Proveedor'),(101,'proveedor','Actualizar',1,'2025-05-24 21:54:12','Registrar un Proveedor con el id: 5',5,'Proveedor'),(102,'proveedor','Actualizar',1,'2025-05-24 21:54:31','Actualizar un Proveedor con el id: 5',5,'Proveedor'),(103,'proveedor','Eliminar',1,'2025-05-24 21:54:48','Eliminar un Proveedor con el ID: 5',5,'Proveedor'),(105,'producto / lote_producto / kardex','INSERT',1,'2025-05-25 17:42:46','Registro de producto nuevo. Código: 05151515151, Descripción: sdsssssdd',11,'PRODUCTO'),(106,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-05-25 20:13:23','Ingreso de producto ID: 9, código: 7501033210778, tipo ingreso: COMPRA, cantidad: 5',9,'INVENTARIO'),(107,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-05-25 20:13:49','Ingreso de producto ID: 7, código: 525452312, tipo ingreso: COMPRA, cantidad: 5',7,'INVENTARIO'),(108,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-05-26 17:31:53','Ingreso de producto ID: 9, código: 7501033210778, tipo ingreso: COMPRA, cantidad: 1',9,'INVENTARIO'),(109,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-05-26 17:32:08','Ingreso de producto ID: 9, código: 7501033210778, tipo ingreso: PROMOCION, cantidad: 1',9,'INVENTARIO'),(110,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-05-26 22:08:57','Ingreso de producto ID: 7, código: 525452312, tipo ingreso: COMPRA, cantidad: 1',7,'INVENTARIO'),(111,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-05-26 22:09:08','Ingreso de producto ID: 9, código: 7501033210778, tipo ingreso: COMPRA, cantidad: 1',9,'INVENTARIO'),(112,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-05-27 09:36:51','Ingreso de producto ID: 4, código: 00004, tipo ingreso: COMPRA, cantidad: 1',4,'INVENTARIO'),(113,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-05-27 09:39:48','Ingreso de producto ID: 4, código: 00004, tipo ingreso: COMPRA, cantidad: 3',4,'INVENTARIO'),(114,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-05-27 09:40:06','Ingreso de producto ID: 4, código: 00004, tipo ingreso: COMPRA, cantidad: 1',4,'INVENTARIO'),(115,'producto / lote_producto / kardex','Ajuste de stock - DEVOLUCION',1,'2025-05-27 10:24:25','Ajuste realizado al producto ID 4 con cantidad 4. Observación: debolucion. Fecha vencimiento: 2025-05-27. Nuevo stock: 24',4,'INVENTARIO'),(116,'producto / lote_producto / kardex','INSERT',1,'2025-05-27 11:25:32','Registro de producto nuevo. Código: 0000089, Descripción: Producod',12,'PRODUCTO'),(117,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-05-27 11:27:40','Ingreso de producto ID: 12, código: 0000089, tipo ingreso: COMPRA, cantidad: 2',12,'INVENTARIO'),(118,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-05-27 11:28:00','Ingreso de producto ID: 12, código: 0000089, tipo ingreso: PROMOCION, cantidad: 2',12,'INVENTARIO'),(119,'producto / lote_producto / kardex','Ajuste de stock - PERDIDA',1,'2025-05-27 11:37:44','Ajuste realizado al producto ID 12 con cantidad 10. Observación: fsffffffffd. Nuevo stock: 4',12,'INVENTARIO'),(120,'producto / lote_producto / kardex','Ajuste de stock - DEVOLUCION',1,'2025-05-27 11:42:22','Ajuste realizado al producto ID 9 con cantidad 10. Observación: ffdfdffdfdfffdfd. Nuevo stock: 11',9,'INVENTARIO'),(121,'producto / lote_producto / kardex','Ajuste de stock - PERDIDA',1,'2025-05-27 11:42:52','Ajuste realizado al producto ID 9 con cantidad 5. Observación: hhhjhjhj. Nuevo stock: 6',9,'INVENTARIO'),(122,'producto / lote_producto / kardex','Ajuste de stock - DEVOLUCION',1,'2025-05-27 11:46:36','Ajuste realizado al producto ID 9 con cantidad 2. Observación: dddd. Nuevo stock: 4',9,'INVENTARIO'),(123,'producto / lote_producto / kardex','Ajuste de stock - PERDIDA',1,'2025-05-27 11:47:02','Ajuste realizado al producto ID 12 con cantidad 1. Observación: eee. Nuevo stock: 3',12,'INVENTARIO'),(124,'producto / lote_producto / kardex','Ajuste de stock - DEVOLUCION',1,'2025-05-27 11:47:27','Ajuste realizado al producto ID 9 con cantidad 3. Observación: dddd. Nuevo stock: 1',9,'INVENTARIO'),(125,'producto / lote_producto / kardex','INSERT',1,'2025-05-27 12:19:52','Registro de producto nuevo. Código: 051516461002, Descripción: gfrrrrfrfrrfrf',13,'PRODUCTO'),(126,'producto / lote_producto / kardex','INSERT',1,'2025-05-27 12:26:47','Registro de producto nuevo. Código: 0100444, Descripción: 4404404',14,'PRODUCTO'),(127,'producto','UPDATE',1,'2025-05-27 12:27:13','Actualización del producto. ID: 9, Descripción: SPEED STICK',9,'PRODUCTO'),(128,'proveedor','Actualizar',1,'2025-05-30 18:27:49','Registrar un Proveedor con el id: 6',6,'Proveedor'),(129,'proveedor','Actualizar',1,'2025-05-30 18:33:55','Registrar un Proveedor con el id: 7',7,'Proveedor'),(130,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-05-30 22:46:10','Compra registrada completa con ID: 34',34,'Compra'),(131,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-05-30 23:18:35','Compra registrada completa con ID: 35',35,'Compra'),(132,'cliente','Actualizar',1,'2025-05-31 20:00:55','Registrar un Cliente con el id: 8',8,'Cliente'),(133,'producto / lote_producto / kardex','INSERT',1,'2025-06-07 23:00:16','Registro de producto nuevo. Código: 211662626, Descripción: ffdffddffddfffff',15,'PRODUCTO'),(134,'producto / lote_producto / kardex','INSERT',1,'2025-06-07 23:01:55','Registro de producto nuevo. Código: 00000888, Descripción: pruenabbsbssasa',16,'PRODUCTO'),(135,'medidas','Registrar',1,'2025-06-08 17:13:29','Registrar una Medidas',NULL,NULL),(136,'medidas','Actualizar',1,'2025-06-08 17:13:47','Actualizar una Medidas con el id: 16',NULL,NULL),(137,'medidas','Actualizar',1,'2025-06-08 17:14:03','Actualizar una Medidas con el id: 16',NULL,NULL),(138,'medidas','Registrar',1,'2025-06-08 17:16:46','Registrar una Medidas',NULL,NULL),(139,'medidas','Registrar',1,'2025-06-08 17:18:05','Registrar una Medidas',NULL,NULL),(140,'medidas','Registrar',1,'2025-06-08 17:53:37','Registrar una Medidas',NULL,NULL),(141,'medidas','Registrar',1,'2025-06-08 18:14:13','Registrar una Medidas',NULL,NULL),(142,'medidas','Registrar',1,'2025-06-08 18:34:15','Registrar una Medidas',NULL,NULL),(143,'producto / lote_producto / kardex','INSERT',1,'2025-06-08 21:15:43','Registro de producto nuevo. Código: 02502555, Descripción: Dell 14 ispiro',17,'PRODUCTO'),(144,'producto','UPDATE',1,'2025-06-08 21:27:34','Actualización del producto. ID: 17, Descripción: Dell 14 ispiro',17,'PRODUCTO'),(145,'producto / lote_producto / kardex','INSERT',1,'2025-06-08 23:24:17','Registro de producto nuevo. Código: 0599999, Descripción: modelo 13 dd',18,'PRODUCTO'),(146,'producto','UPDATE',1,'2025-06-08 23:25:22','Actualización del producto. ID: 18, Descripción: modelo 13 dd',18,'PRODUCTO'),(147,'producto','UPDATE',1,'2025-06-08 23:25:40','Actualización del producto. ID: 18, Descripción: modelo 13 dd',18,'PRODUCTO'),(148,'producto / lote_producto / kardex','INSERT',1,'2025-06-09 16:54:29','Registro de producto nuevo. Código: 054844558844, Descripción: Canande fuente de vida',19,'PRODUCTO'),(149,'producto','UPDATE',1,'2025-06-09 16:55:02','Actualización del producto. ID: 19, Descripción: Canande fuente de vida',19,'PRODUCTO'),(150,'producto','UPDATE',1,'2025-06-09 16:55:19','Actualización del producto. ID: 19, Descripción: Canande fuente de vida',19,'PRODUCTO'),(151,'producto','UPDATE',1,'2025-06-09 16:57:19','Actualización del producto. ID: 19, Descripción: Canande fuente de vida',19,'PRODUCTO'),(152,'producto','UPDATE',1,'2025-06-09 16:58:33','Actualización del producto. ID: 19, Descripción: Canande fuente de vida',19,'PRODUCTO'),(153,'producto','UPDATE',1,'2025-06-09 16:59:03','Actualización del producto. ID: 19, Descripción: Canande fuente de vida',19,'PRODUCTO'),(154,'producto / lote_producto / kardex','INSERT',1,'2025-06-09 17:14:25','Registro de producto nuevo. Código: 00331316114, Descripción: aMSLMSLSLAMSALALS',20,'PRODUCTO'),(155,'producto','UPDATE',1,'2025-06-09 17:14:45','Actualización del producto. ID: 20, Descripción: aMSLMSLSLAMSALALS',20,'PRODUCTO'),(156,'producto','UPDATE',1,'2025-06-09 17:15:01','Actualización del producto. ID: 20, Descripción: aMSLMSLSLAMSALALS',20,'PRODUCTO'),(157,'producto','UPDATE',1,'2025-06-11 16:47:24','Actualización del producto. ID: 1, Descripción: Dell 14p',1,'PRODUCTO'),(158,'producto / lote_producto / kardex','INSERT',1,'2025-06-13 16:08:54','Registro de producto nuevo. Código: 264646, Descripción: dcckscdkcdmdcmdkds',21,'PRODUCTO'),(159,'producto / lote_producto / kardex','INSERT',1,'2025-06-13 18:09:32','Registro de producto nuevo. Código: 012115, Descripción: dsssfdssdfsdfsdfssfsfd',22,'PRODUCTO'),(160,'producto / lote_producto / kardex','INSERT',1,'2025-06-13 18:15:16','Registro de producto nuevo. Código: 031512, Descripción: wedewewew',23,'PRODUCTO'),(161,'producto','UPDATE',1,'2025-06-13 18:47:06','Actualización del producto. ID: 23, Descripción: 1113',23,'PRODUCTO'),(162,'producto','UPDATE',1,'2025-06-13 19:58:43','Actualización del producto. ID: 21, Descripción: dcckscdkcdmdcmdkds',21,'PRODUCTO'),(163,'producto','UPDATE',1,'2025-06-13 20:52:28','Actualización del producto. ID: 23, Descripción: 1113',23,'PRODUCTO'),(164,'producto','UPDATE',1,'2025-06-13 20:52:45','Actualización del producto. ID: 22, Descripción: dsssfdssdfsdfsdfssfsfd',22,'PRODUCTO'),(165,'producto','UPDATE',1,'2025-06-13 20:52:56','Actualización del producto. ID: 23, Descripción: 1113',23,'PRODUCTO'),(166,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-06-13 20:54:41','Ingreso de producto ID: 22, código: 012115, tipo ingreso: COMPRA, cantidad: 10',22,'INVENTARIO'),(167,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-06-13 20:55:15','Ingreso de producto ID: 23, código: 031512, tipo ingreso: COMPRA, cantidad: 4',23,'INVENTARIO'),(168,'producto','UPDATE',1,'2025-06-13 22:23:35','Actualización del producto. ID: 21, Descripción: dcckscdkcdmdcmdkds',21,'PRODUCTO'),(169,'medidas','Registrar',1,'2025-06-14 09:58:56','Registrar una Medidas',NULL,NULL),(170,'medidas','Registrar',1,'2025-06-14 10:12:12','Registrar una Medidas',NULL,NULL),(171,'producto','UPDATE',1,'2025-06-14 10:41:44','Actualización del producto. ID: 23, Descripción: 1113',23,'PRODUCTO'),(172,'producto','UPDATE',1,'2025-06-14 10:44:07','Actualización del producto. ID: 22, Descripción: dsssfdssdfsdfsdfssfsfd',22,'PRODUCTO'),(173,'medidas','Registrar',1,'2025-06-14 18:42:19','Registrar una Medidas',NULL,NULL),(174,'producto / lote_producto / kardex','INSERT',1,'2025-06-14 18:46:23','Registro de producto nuevo. Código: 0032655655, Descripción: Glyphosate Isopropylamine salt (480 g/l)',24,'PRODUCTO'),(175,'producto / lote_producto / kardex','INSERT',1,'2025-06-14 18:47:40','Registro de producto nuevo. Código: 00321, Descripción: SDDSDSDSDSD',25,'PRODUCTO'),(176,'medidas','Registrar',1,'2025-06-15 08:37:01','Registrar una Medidas',NULL,NULL),(177,'producto / lote_producto / kardex','INSERT',1,'2025-06-15 08:38:15','Registro de producto nuevo. Código: 34464646, Descripción: bbjugugugugugugugu',26,'PRODUCTO'),(178,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-06-16 18:19:32','Ingreso de producto ID: 26, código: 34464646, tipo ingreso: COMPRA, cantidad: 5',26,'INVENTARIO'),(179,'cliente','Actualizar',1,'2025-06-16 18:20:27','Registrar un Cliente con el id: 9',9,'Cliente'),(180,'medidas','Registrar',1,'2025-07-13 14:10:35','Registrar una Medidas',NULL,NULL),(181,'medidas','Registrar',1,'2025-07-13 14:15:38','Registrar una Medidas',NULL,NULL),(182,'medidas','Registrar',1,'2025-07-13 14:26:36','Registrar una Medidas',NULL,NULL),(183,'producto / lote_producto / kardex','INSERT',1,'2025-07-13 14:31:26','Registro de producto nuevo. Código: 00001, Descripción: BATHUTIC - 1L',27,'PRODUCTO'),(184,'producto / lote_producto / kardex','INSERT',1,'2025-07-13 14:50:21','Registro de producto nuevo. Código: 00002, Descripción: Solfoxidante fungicida - Acaricida',28,'PRODUCTO'),(185,'producto / lote_producto / kardex','INSERT',1,'2025-07-13 15:06:02','Registro de producto nuevo. Código: 00009, Descripción: SPARKO - 100 G',29,'PRODUCTO'),(186,'producto / lote_producto / kardex','INSERT',1,'2025-07-13 15:08:23','Registro de producto nuevo. Código: 09088, Descripción: aFEPASA',30,'PRODUCTO'),(187,'producto / lote_producto / kardex','INSERT',1,'2025-07-13 15:13:46','Registro de producto nuevo. Código: 000010, Descripción: Adame',31,'PRODUCTO'),(188,'producto','UPDATE',1,'2025-07-13 15:20:12','Actualización del producto. ID: 31, Descripción: Adame 1',31,'PRODUCTO'),(189,'producto','UPDATE',1,'2025-07-13 15:20:48','Actualización del producto. ID: 30, Descripción: Afepasa',30,'PRODUCTO'),(190,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-07-13 15:23:46','Ingreso de producto ID: 30, código: 09088, tipo ingreso: COMPRA, cantidad: 10',30,'INVENTARIO'),(191,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-07-13 15:25:41','Ingreso de producto ID: 30, código: 09088, tipo ingreso: PROMOCION, cantidad: 2',30,'INVENTARIO'),(192,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-07-13 15:58:45','Ingreso de producto ID: 30, código: 09088, tipo ingreso: PROMOCION, cantidad: 3',30,'INVENTARIO'),(193,'producto / lote_producto / kardex','Ajuste de stock - DEVOLUCION',1,'2025-07-13 16:03:08','Ajuste realizado al producto ID 30 con cantidad 3. Observación: debolu. Fecha vencimiento: 2025-10-25. Nuevo stock: 28',30,'INVENTARIO'),(194,'producto / lote_producto / kardex','Ajuste de stock - PERDIDA',1,'2025-07-13 16:05:46','Ajuste realizado al producto ID 30 con cantidad 7. Observación: por perdida. Nuevo stock: 21',30,'INVENTARIO'),(195,'proveedor','Actualizar',1,'2025-07-13 16:17:27','Registrar un Proveedor con el id: 8',8,'Proveedor'),(196,'proveedor','Actualizar',1,'2025-07-13 16:17:41','Actualizar un Proveedor con el id: 8',8,'Proveedor'),(197,'proveedor','Actualizar',1,'2025-07-13 16:18:03','Actualizar un Proveedor con el id: 8',8,'Proveedor'),(198,'cliente','Actualizar',1,'2025-07-13 16:19:27','Registrar un Cliente con el id: 10',10,'Cliente'),(199,'cliente','Actualizar',1,'2025-07-13 16:20:00','Actualizar un Cliente con el id: 10',10,'Cliente'),(200,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-13 20:57:14','Compra registrada completa con ID: 36',36,'Compra'),(201,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-13 21:08:50','Compra registrada completa con ID: 37',37,'Compra'),(202,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-13 21:21:36','Compra registrada completa con ID: 38',38,'Compra'),(203,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-14 14:44:11','Compra registrada completa con ID: 39',39,'Compra'),(204,'producto / lote_producto / kardex','INSERT',1,'2025-07-19 17:31:34','Registro de producto nuevo. Código: 000011, Descripción: por ssss',32,'PRODUCTO'),(205,'producto / lote_producto / kardex','INSERT',1,'2025-07-19 17:42:40','Registro de producto nuevo. Código: 0000099, Descripción: ewwewewewewew',33,'PRODUCTO'),(206,'producto / lote_producto / kardex','INSERT',1,'2025-07-19 17:48:27','Registro de producto nuevo. Código: 0090909, Descripción: sssswswswwswsws',34,'PRODUCTO'),(207,'producto / lote_producto / kardex','INSERT',1,'2025-07-19 17:55:14','Registro de producto nuevo. Código: 00012, Descripción: dewdmewiefwnfnfkewfefef',35,'PRODUCTO'),(208,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-19 17:58:35','Compra registrada completa con ID: 40',40,'Compra'),(209,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-21 12:16:29','Compra registrada completa con ID: 41',41,'Compra'),(210,'producto','UPDATE',1,'2025-07-22 19:01:03','Actualización del producto. ID: 27, Descripción: BATHUTIC - 1swaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddL',27,'PRODUCTO'),(211,'producto','UPDATE',1,'2025-07-22 19:04:58','Actualización del producto. ID: 27, Descripción: BATHUTIC queso con pollo y mantega',27,'PRODUCTO'),(212,'producto','UPDATE',1,'2025-07-22 19:05:23','Actualización del producto. ID: 27, Descripción: BATHUTIC queso con',27,'PRODUCTO'),(213,'producto','UPDATE',1,'2025-07-22 19:09:38','Actualización del producto. ID: 27, Descripción: BATHUTIC queso',27,'PRODUCTO'),(214,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-22 19:34:34','Compra registrada completa con ID: 42',42,'Compra'),(215,'producto / lote_producto / kardex','INSERT',1,'2025-07-23 23:16:25','Registro de producto nuevo. Código: 00999, Descripción: eweewwwewewew',36,'PRODUCTO'),(216,'producto / lote_producto / kardex','Ajuste de stock - DEVOLUCION',1,'2025-07-24 09:02:05','Ajuste realizado al producto ID 27 con cantidad 5. Observación: pormfecha de vencimi le le entrog al proveedor. Fecha vencimiento: 2025-09-28. Nuevo stock: 13',27,'INVENTARIO'),(217,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-24 10:27:31','Compra registrada completa con ID: 43',43,'Compra'),(218,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-24 10:32:51','Compra registrada completa con ID: 44',44,'Compra'),(219,'proveedor','Actualizar',1,'2025-07-24 11:07:19','Registrar un Proveedor con el id: 9',9,'Proveedor'),(220,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-24 11:09:19','Compra registrada completa con ID: 45',45,'Compra'),(221,'proveedor','Actualizar',1,'2025-07-24 11:18:32','Registrar un Proveedor con el id: 10',10,'Proveedor'),(222,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-24 11:19:36','Compra registrada completa con ID: 46',46,'Compra'),(223,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-24 20:26:30','Compra registrada completa con ID: 47',47,'Compra'),(224,'cliente','Actualizar',1,'2025-07-24 21:41:53','Registrar un Cliente con el id: 11',11,'Cliente'),(225,'cliente','Actualizar',1,'2025-07-24 21:54:45','Registrar un Cliente con el id: 12',12,'Cliente'),(226,'proveedor','Actualizar',1,'2025-07-24 23:35:58','Actualizar un Proveedor con el id: 8',8,'Proveedor'),(227,'cliente','Actualizar',1,'2025-07-24 23:41:23','Actualizar un Cliente con el id: 12',12,'Cliente'),(228,'producto','UPDATE',1,'2025-07-25 13:01:38','Actualización del producto. ID: 150, Descripción: Pan Integral',150,'PRODUCTO'),(229,'producto','UPDATE',1,'2025-07-25 13:19:23','Actualización del producto. ID: 150, Descripción: Pan Integral',150,'PRODUCTO'),(230,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 13:27:36','Registro de producto nuevo. Código: 099090808, Descripción: porororrorrojro',50,'PRODUCTO'),(231,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 13:31:04','Registro de producto nuevo. Código: 09098080809, Descripción: ssnkdfjfdkdjdks',51,'PRODUCTO'),(232,'producto','UPDATE',1,'2025-07-25 13:32:23','Actualización del producto. ID: 150, Descripción: Pan Integral',150,'PRODUCTO'),(233,'producto','UPDATE',1,'2025-07-25 13:37:29','Actualización del producto. ID: 150, Descripción: Pan Integral',150,'PRODUCTO'),(234,'producto','UPDATE',1,'2025-07-25 13:38:16','Actualización del producto. ID: 150, Descripción: Pan Integral',150,'PRODUCTO'),(235,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 13:52:49','Registro de producto nuevo. Código: 7891234567, Descripción: Leche Entera',61,'PRODUCTO'),(236,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 13:52:49','Registro de producto nuevo. Código: 7891234568, Descripción: Manzanas',62,'PRODUCTO'),(237,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 13:52:49','Registro de producto nuevo. Código: 7891234569, Descripción: Pan Integral',63,'PRODUCTO'),(238,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 13:55:17','Registro de producto nuevo. Código: 7891234567, Descripción: Leche Entera',64,'PRODUCTO'),(239,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 13:55:17','Registro de producto nuevo. Código: 7891234568, Descripción: Manzanas',65,'PRODUCTO'),(240,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 13:55:17','Registro de producto nuevo. Código: 7891234569, Descripción: Pan Integral',66,'PRODUCTO'),(241,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 14:40:39','Registro de producto nuevo. Código: 7891234567, Descripción: Leche Entera',68,'PRODUCTO'),(242,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 14:40:39','Registro de producto nuevo. Código: 7891234568, Descripción: Manzanas',69,'PRODUCTO'),(243,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 14:40:39','Registro de producto nuevo. Código: 7891234569, Descripción: Pan Integral',70,'PRODUCTO'),(244,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 14:49:39','Registro de producto nuevo. Código: 7891234570, Descripción: Leche Entera',72,'PRODUCTO'),(245,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 14:49:39','Registro de producto nuevo. Código: 7891234571, Descripción: Manzanas',73,'PRODUCTO'),(246,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 14:49:39','Registro de producto nuevo. Código: 7891234572, Descripción: Pan Integral',74,'PRODUCTO'),(247,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 15:06:02','Registro de producto nuevo. Código: 7891234573, Descripción: Leche Entera',75,'PRODUCTO'),(248,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 15:13:41','Registro de producto nuevo. Código: 7891234576, Descripción: Leche Entera',76,'PRODUCTO'),(249,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 15:13:41','Registro de producto nuevo. Código: 7891234577, Descripción: Manzanas',77,'PRODUCTO'),(250,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 15:13:41','Registro de producto nuevo. Código: 7891234578, Descripción: Pan Integral',78,'PRODUCTO'),(251,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 15:24:09','Registro de producto nuevo. Código: 7891234579, Descripción: Leche Entera',79,'PRODUCTO'),(252,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 15:24:09','Registro de producto nuevo. Código: 7891234581, Descripción: Manzanas',80,'PRODUCTO'),(253,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 15:24:09','Registro de producto nuevo. Código: 7891234582, Descripción: Pan Integral',81,'PRODUCTO'),(254,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 15:25:20','Registro de producto nuevo. Código: 7891234583, Descripción: Leche Entera',82,'PRODUCTO'),(255,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 15:25:20','Registro de producto nuevo. Código: 7891234584, Descripción: Manzanas',83,'PRODUCTO'),(256,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 15:25:20','Registro de producto nuevo. Código: 7891234585, Descripción: Pan Integral',84,'PRODUCTO'),(257,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 16:32:24','Registro de producto nuevo. Código: 7891234586, Descripción: Leche Entera',85,'PRODUCTO'),(258,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 16:32:24','Registro de producto nuevo. Código: 7891234587, Descripción: Manzanas',86,'PRODUCTO'),(259,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 16:32:24','Registro de producto nuevo. Código: 7891234588, Descripción: Pan Integral',87,'PRODUCTO'),(260,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 16:37:51','Registro de producto nuevo. Código: 7891234589, Descripción: Leche Entera',88,'PRODUCTO'),(261,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 16:37:51','Registro de producto nuevo. Código: 7891234590, Descripción: Manzanas',89,'PRODUCTO'),(262,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 16:37:51','Registro de producto nuevo. Código: 7891234591, Descripción: Pan Integral',90,'PRODUCTO'),(263,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 17:33:08','Registro de producto nuevo. Código: PROD0002, Descripción: Arroz Grano Oro 1Kg',103,'PRODUCTO'),(264,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 17:33:08','Registro de producto nuevo. Código: PROD0003, Descripción: Leche Entera 1L',104,'PRODUCTO'),(265,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 17:33:08','Registro de producto nuevo. Código: PROD0004, Descripción: Detergente Ropa 1Kg',105,'PRODUCTO'),(266,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 17:33:09','Registro de producto nuevo. Código: PROD0005, Descripción: Agua Embotellada 500ml',106,'PRODUCTO'),(267,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 17:33:09','Registro de producto nuevo. Código: PROD0006, Descripción: Yogurt Frutado 250g',107,'PRODUCTO'),(268,'producto / lote_producto / kardex','INSERT',1,'2025-07-25 17:33:09','Registro de producto nuevo. Código: PROD0007, Descripción: Galletas Chispas 100g',108,'PRODUCTO'),(269,'medidas','Registrar',1,'2025-07-26 16:19:11','Registrar una Medidas',NULL,NULL),(270,'medidas','Registrar',1,'2025-07-26 16:25:35','Registrar una Medidas',NULL,NULL),(271,'medidas','Actualizar',1,'2025-07-26 16:26:03','Actualizar una Medidas con el id: 2',NULL,NULL),(272,'medidas','Actualizar',1,'2025-07-26 16:26:50','Actualizar una Medidas con el id: 2',NULL,NULL),(273,'medidas','Eliminar',1,'2025-07-26 16:53:08','Eliminar una Medidas con el id: 2',NULL,NULL),(274,'medidas','Actualizar',1,'2025-07-26 16:53:21','Actualizar una Medidas con el id: 2',NULL,NULL),(275,'proveedor','Actualizar',1,'2025-07-26 17:34:53','Registrar un Proveedor con el id: 1',1,'Proveedor'),(276,'proveedor','Actualizar',1,'2025-07-26 17:35:27','Actualizar un Proveedor con el id: 1',1,'Proveedor'),(277,'proveedor','Actualizar',1,'2025-07-26 17:36:11','Actualizar un Proveedor con el id: 1',1,'Proveedor'),(278,'medidas','Registrar',1,'2025-07-26 17:59:55','Registrar una Medidas',NULL,NULL),(279,'medidas','Actualizar',1,'2025-07-26 18:00:17','Actualizar una Medidas con el id: 3',NULL,NULL),(280,'proveedor','Actualizar',1,'2025-07-26 18:07:18','Registrar un Proveedor con el id: 2',2,'Proveedor'),(281,'proveedor','Actualizar',1,'2025-07-26 18:10:16','Registrar un Proveedor con el id: 3',3,'Proveedor'),(282,'proveedor','Eliminar',1,'2025-07-26 18:12:42','Eliminar un Proveedor con el ID: 2',2,'Proveedor'),(283,'cliente','Actualizar',1,'2025-07-26 18:22:52','Registrar un Cliente con el id: 1',1,'Cliente'),(284,'cliente','Actualizar',1,'2025-07-26 18:23:30','Actualizar un Cliente con el id: 1',1,'Cliente'),(285,'cliente','Actualizar',1,'2025-07-26 18:27:24','Registrar un Cliente con el id: 2',2,'Cliente'),(286,'medidas','Registrar',1,'2025-07-26 19:38:15','Registrar una Medidas',NULL,NULL),(287,'medidas','Registrar',1,'2025-07-26 19:42:31','Registrar una Medidas',NULL,NULL),(288,'producto / lote_producto / kardex','INSERT',1,'2025-07-27 09:27:35','Registro de producto nuevo. Código: Producto1, Descripción: de arroz x',1,'PRODUCTO'),(289,'producto / lote_producto / kardex','INSERT',1,'2025-07-27 09:45:19','Registro de producto nuevo. Código: 0090909090909, Descripción: Anime de portada',2,'PRODUCTO'),(290,'producto','UPDATE',1,'2025-07-27 09:47:42','Actualización del producto. ID: 2, Descripción: Anime de portada1',2,'PRODUCTO'),(291,'producto','UPDATE',1,'2025-07-27 10:12:37','Actualización del producto. ID: 1, Descripción: de arroz x',1,'PRODUCTO'),(292,'producto / lote_producto / kardex','INSERT',1,'2025-07-27 11:50:23','Registro de producto nuevo. Código: 00900089809, Descripción: producto de prueba',3,'PRODUCTO'),(293,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-07-27 12:12:37','Ingreso de producto ID: 1, código: Producto1, tipo ingreso: COMPRA, cantidad: 10',1,'INVENTARIO'),(294,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-07-27 12:40:15','Ingreso de producto ID: 1, código: Producto1, tipo ingreso: COMPRA, cantidad: 12',1,'INVENTARIO'),(295,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-07-27 12:43:30','Ingreso de producto ID: 1, código: Producto1, tipo ingreso: PROMOCION, cantidad: 5',1,'INVENTARIO'),(296,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-07-27 14:44:31','Ingreso de producto ID: 1, código: Producto1, tipo ingreso: PROMOCION, cantidad: 4',1,'INVENTARIO'),(297,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-07-27 14:54:40','Ingreso de producto ID: 2, código: 0090909090909, tipo ingreso: COMPRA, cantidad: 1',2,'INVENTARIO'),(298,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-07-27 15:00:12','Ingreso de producto ID: 2, código: 0090909090909, tipo ingreso: PROMOCION, cantidad: 5',2,'INVENTARIO'),(299,'producto / lote_producto / kardex','Ajuste de stock - DEVOLUCION',1,'2025-07-27 15:16:19','Ajuste realizado al producto ID 1 con cantidad 4. Observación: devoluncion de fecha 2025-11-29. Fecha vencimiento: 2025-11-29. Nuevo stock: 37',1,'INVENTARIO'),(300,'producto / lote_producto / kardex','Ajuste de stock - PERDIDA',1,'2025-07-27 15:21:32','Ajuste realizado al producto ID 1 con cantidad 10. Observación: devolucion. Nuevo stock: 31',1,'INVENTARIO'),(301,'producto / lote_producto / kardex','Ajuste de stock - PERDIDA',1,'2025-07-27 15:41:50','Ajuste realizado al producto ID 2 con cantidad 1. Observación: peridida. Nuevo stock: 25',2,'INVENTARIO'),(302,'producto / lote_producto / kardex','Ajuste de stock - PERDIDA',1,'2025-07-27 15:54:40','Ajuste realizado al producto ID 2 con cantidad 2. Observación: perid idada dañado. Nuevo stock: 23',2,'INVENTARIO'),(303,'producto / lote_producto / kardex','REGISTRO_INGRESO',1,'2025-07-27 16:08:42','Ingreso de producto ID: 2, código: 0090909090909, tipo ingreso: COMPRA, cantidad: 1',2,'INVENTARIO'),(304,'producto / lote_producto / kardex','Ajuste de stock - PERDIDA',1,'2025-07-27 16:09:03','Ajuste realizado al producto ID 1 con cantidad 1. Observación: dddsssssssss. Nuevo stock: 30',1,'INVENTARIO'),(305,'producto / lote_producto / kardex','INSERT',1,'2025-07-27 16:34:21','Registro de producto nuevo. Código: 0909090909, Descripción: fdfdfdfdggfgfgd',4,'PRODUCTO'),(306,'producto','UPDATE',1,'2025-07-27 16:34:40','Actualización del producto. ID: 4, Descripción: fdfdfdfdggfgfgd',4,'PRODUCTO'),(307,'producto','UPDATE',1,'2025-07-27 16:35:09','Actualización del producto. ID: 4, Descripción: fdfdfdfdggfgfgd',4,'PRODUCTO'),(308,'producto','UPDATE',1,'2025-07-27 16:40:29','Actualización del producto. ID: 4, Descripción: fdfdfdfdggfgfgd',4,'PRODUCTO'),(309,'producto / lote_producto / kardex','Ajuste de stock - PERDIDA',1,'2025-07-27 16:47:01','Ajuste realizado al producto ID 1 con cantidad 1. Observación: 2222222. Nuevo stock: 29',1,'INVENTARIO'),(310,'producto / lote_producto / kardex','Ajuste de stock - PERDIDA',1,'2025-07-27 16:53:08','Ajuste realizado al producto ID 1 con cantidad 1. Observación: peridmsis dia 23. Nuevo stock: 28',1,'INVENTARIO'),(311,'producto / lote_producto / kardex','Ajuste de stock - DEVOLUCION',1,'2025-07-27 16:56:32','Ajuste realizado al producto ID 1 con cantidad 5. Observación: sssssss. Fecha vencimiento: 2027-05-23. Nuevo stock: 23',1,'INVENTARIO'),(312,'producto / lote_producto / kardex','Ajuste de stock - PERDIDA',1,'2025-07-27 17:10:03','Ajuste realizado al producto ID 1 con cantidad 1. Observación: 1. Nuevo stock: 27',1,'INVENTARIO'),(313,'producto / lote_producto / kardex','Ajuste de stock - DEVOLUCION',1,'2025-07-27 17:10:39','Ajuste realizado al producto ID 1 con cantidad 1. Observación: dddddddddpe4o 23. Fecha vencimiento: 2027-05-23. Nuevo stock: 26',1,'INVENTARIO'),(314,'proveedor','Actualizar',1,'2025-07-27 17:54:04','Registrar un Proveedor con el id: 4',4,'Proveedor'),(315,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-27 17:54:11','Compra registrada completa con ID: 1',1,'Compra'),(316,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-27 18:09:17','Compra registrada completa con ID: 2',2,'Compra'),(317,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-27 18:28:28','Compra registrada completa con ID: 3',3,'Compra'),(318,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-27 18:35:26','Compra registrada completa con ID: 4',4,'Compra'),(319,'compras/det_compra/producto/kardex/Movimiento en caja/gasto','INSERT/UPDATE',1,'2025-07-27 21:19:56','Compra registrada completa con ID: 5',5,'Compra'),(320,'medidas','Eliminar',1,'2025-07-28 08:37:03','Eliminar una Medidas con el id: 4',NULL,NULL),(321,'cliente','Eliminar',1,'2025-07-28 08:48:46','Eliminar un Cliente con el id: 2',2,'Cliente'),(322,'cliente','Eliminar',1,'2025-07-28 08:52:46','Eliminar un Cliente con el id: 2',2,'Cliente'),(323,'cliente','Eliminar',1,'2025-07-28 08:53:40','Eliminar un Cliente con el id: 2',2,'Cliente'),(324,'proveedor','Eliminar',1,'2025-07-28 08:55:05','Eliminar un Proveedor con el ID: 4',4,'Proveedor'),(325,'medidas','Registrar',1,'2025-07-28 20:54:25','Registrar una Medidas',NULL,NULL),(326,'producto / lote_producto / kardex','INSERT',1,'2025-07-28 20:56:35','Registro de producto nuevo. Código: PROD0001, Descripción: Refresco Cola 2L',1,'PRODUCTO'),(327,'producto / lote_producto / kardex','INSERT',1,'2025-07-28 21:00:06','Registro de producto nuevo. Código: PROD0002, Descripción: Leche Entera 1L',2,'PRODUCTO'),(328,'cliente','Actualizar',1,'2025-07-28 21:24:25','Registrar un Cliente con el id: 1',1,'Cliente'),(329,'proveedor','Actualizar',1,'2025-07-29 15:43:02','Registrar un Proveedor con el id: 1',1,'Proveedor'),(330,'compras/det_compra/producto/kardex/Movimiento en caja/gasto/compra a credito','INSERT/UPDATE',1,'2025-07-29 15:43:58','Compra registrada completa con ID: 1',1,'Compra');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lote_producto`
--

LOCK TABLES `lote_producto` WRITE;
/*!40000 ALTER TABLE `lote_producto` DISABLE KEYS */;
INSERT INTO `lote_producto` (`id_lote`, `id_usuario_creacion`, `id_det_compra`, `id_producto`, `cantidad_comprada`, `cantidad_bonificada`, `stock_disponible`, `costo_unitario`, `fecha_registro`, `fecha_vencimiento`, `estado`, `id_usuario_actualizacion`, `fecha_actualizacion`) VALUES (1,1,NULL,1,10,0,10,1.00,'2025-07-28 20:56:35','2025-10-05',1,NULL,'2025-07-29 14:19:45'),(2,1,NULL,2,20,0,20,1.20,'2025-07-28 21:00:06','2026-07-05',1,NULL,'2025-07-29 14:19:45'),(3,1,1,1,0,0,0,1.00,'2025-07-29 15:43:57','2025-08-31',0,NULL,'2025-07-29 15:44:15'),(4,1,2,2,0,0,0,1.25,'2025-07-29 15:43:57','2025-10-05',0,NULL,'2025-07-29 15:44:15');
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
INSERT INTO `marca` VALUES (1,'Agripa',1,'2025-07-28 20:54:38',NULL,NULL,NULL,NULL,'1');
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
INSERT INTO `medidas` VALUES (1,'KILOGRAMOS','KG','2025-07-28 20:54:25',NULL,NULL,'1');
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (1,'Tablero Principal',0,'dashboard.php','fas fa-tachometer-alt',0,NULL,NULL),(2,'Roles y Perfiles',0,'Administracion/ModulosyPerfiles/modulos_perfiles.php','fas fa-tablet-alt',1,NULL,NULL),(3,'Producto',4,'Gestion/Producto/productos.php','far fa-circle',7,'2023-01-06 12:48:37',NULL),(4,'Mantenedor',0,'','fas fa-tachometer-alt',2,'2023-01-06 13:02:08',NULL),(5,'Medidas',4,'Gestion/Medidas/medidas.php','far fa-circle',10,'2023-01-08 13:12:05',NULL),(6,'Categorias',4,'Gestion/Categorias/categorias.php','far fa-circle',9,'2023-01-09 12:34:34',NULL),(7,'Proveedor',4,'Gestion/Proveedor/proveedor.php','	far fa-circle',6,'2023-01-15 07:33:34',NULL),(8,'Clientes',4,'Gestion/Clientes/clientes.php','	far fa-circle',5,'2023-01-15 07:34:53',NULL),(9,'Perecederos',4,'Gestion/Perecederos/perecederos.php','	far fa-circle',8,'2023-01-15 07:35:46',NULL),(10,'prueva',0,'Gestion/Producto/productos.php','',12,'2023-01-15 07:38:28',NULL),(11,'Administrar Caja',0,'','fas fa-cash-register',13,'2023-01-15 09:43:53',NULL),(12,'ArqueoCaja',11,'AdministrarCaja/ArqueoCaja/arqueo_caja.php','	far fa-circle',15,'2023-01-15 09:54:10',NULL),(13,'Caja',11,'AdministrarCaja/Caja/caja.php','	far fa-circle',14,'2023-01-15 09:54:43',NULL),(14,'Rol',0,'Administracion/Rol/rol.php','fas fa-cash-register',17,'2023-01-15 11:33:00',NULL),(15,'Usuarios',0,'Administracion/Usuario/usuario.php','fas fa-users',18,'2023-01-15 14:07:39',NULL),(16,'VentasCreditos',0,'','fas fa-credit-card',29,'2023-01-16 12:44:30',NULL),(17,'AdministrarCreditos',16,'VentasCreditos/AdministrarCreditos/administrar_creditos.php','far fa-circle',31,'2023-01-16 12:46:05',NULL),(18,'Compras',0,'','fas fa-dolly',19,'2023-01-16 17:45:49',NULL),(19,'Ventas',0,'','fas fa-cart-plus',25,'2023-01-16 17:46:04',NULL),(20,'Realizar Compras',18,'Compras/RealizarCompras/compras.php','far fa-circle',21,'2023-01-16 17:47:23',NULL),(21,'Ventas',19,'Ventas/RealizarVentas/realizar_ventas.php','far fa-circle',28,'2023-01-16 17:49:11',NULL),(22,'HistorialAbonos',16,'VentasCreditos/HistorialAbonos/historial_abonos.php','far fa-circle',32,'2023-01-17 10:16:03',NULL),(23,'Empresa',0,'Administracion/Configuracion/empresa.php','fas fa-store-alt',33,'2023-01-18 11:18:48',NULL),(24,'Movimiento',11,'AdministrarCaja/MovimientoCaja/movimiento_cajas.php','far fa-circle',16,'2023-01-20 11:16:21',NULL),(25,'Administra Ventas',19,'Ventas/Administrar_ventas/administrar_ventas.php','far fa-circle',27,'2023-01-25 16:14:23',NULL),(26,'Compras al Credito',0,'','fas fa-credit-card',22,'2023-03-11 12:03:44',NULL),(27,'Administrar Creditos',26,'ComprasCredito/AdministrarCreditos/administrar_credito.php','far fa-circle',24,'2023-03-11 12:07:07',NULL),(28,'Administrar Creditos',16,'VentasCreditos/AdministrarCreditos/administrar_credito.php','far fa-circle',30,'2023-03-11 12:24:39',NULL),(29,'Historial Credito',26,'ComprasCredito/HistorialAbonos/historial_abono.php','far fa-circle',23,'2023-03-19 12:34:53',NULL),(30,'Administra Compras',18,'Compras/Administrar_compras/historial_de_compras.php','far fa-circle',20,'2023-03-23 17:36:57',NULL),(31,'kardex',0,'kardex/kardex_promedial_ponderado/kardex.php','fas fa-snowflake',34,'2023-03-29 11:15:26',NULL),(32,'Administrar Factura',19,'Ventas/Administrar_ventas/administrar_factura.php','far fa-circle',26,'2023-04-21 17:13:56',NULL),(33,'Reportes',0,'','fas fa-file',35,'2023-10-21 20:10:31',NULL),(34,'Producto Poco Stock',33,'Reportes/poco_stock.php','far fa-circle',38,'2023-10-21 20:12:44',NULL),(35,'Ganacias',33,'Reportes/ganacias.php','far fa-circle',39,'2023-10-21 20:13:31',NULL),(36,'Producto mas Vendidos',33,'Reportes/reporte_producto_mas_vendidos.php','far fa-circle',37,'2023-10-21 22:31:23',NULL),(37,'Ventas Hoy',33,'Reportes/ventas_hoy.php','far fa-circle',36,'2023-10-23 17:49:39',NULL),(38,'lote',4,'Gestion/Perecederos/lote_producto.php','far fa-circle',4,'2025-05-13 20:04:32',NULL),(39,'Marca',4,'Gestion/Marcas/marcas.php','far fa-circle',3,'2025-06-08 23:31:15',NULL),(40,'FacturacionElectronica',0,'FacturacionElectronica/facturacionElectronica.php','fas fa-file-invoice-dollar',40,'2025-07-16 06:03:27',NULL),(41,'Carga Masiva',4,'Gestion/carga_masiva/carga_masiva_productos.php','far fa-circle',11,'2025-07-25 16:24:19',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimiento_caja`
--

LOCK TABLES `movimiento_caja` WRITE;
/*!40000 ALTER TABLE `movimiento_caja` DISABLE KEYS */;
INSERT INTO `movimiento_caja` VALUES (1,1,'Ingreso','Ingreso',1,'2025-07-28 21:02:53',NULL,'1'),(2,1,'Egreso','Gasto',1,'2025-07-28 21:02:53',NULL,'1'),(3,1,'Devolucion','Devolucion',1,'2025-07-29 13:58:56',NULL,'1');
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
) ENGINE=InnoDB AUTO_INCREMENT=408 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_modulo`
--

LOCK TABLES `perfil_modulo` WRITE;
/*!40000 ALTER TABLE `perfil_modulo` DISABLE KEYS */;
INSERT INTO `perfil_modulo` VALUES (299,1,1,1,'1'),(300,1,2,0,'1'),(301,1,38,0,'1'),(302,1,4,0,'1'),(303,1,8,0,'1'),(304,1,7,0,'1'),(305,1,3,0,'1'),(306,1,6,0,'1'),(307,1,5,0,'1'),(308,1,15,0,'1'),(309,1,30,0,'1'),(310,1,18,0,'1'),(311,1,20,0,'1'),(312,1,29,0,'1'),(313,1,26,0,'1'),(314,1,27,0,'1'),(315,1,25,0,'1'),(316,1,19,0,'1'),(317,1,21,0,'1'),(318,1,28,0,'1'),(319,1,16,0,'1'),(320,1,22,0,'1'),(321,1,23,0,'1'),(322,1,31,0,'1'),(323,1,37,0,'1'),(324,1,33,0,'1'),(325,1,36,0,'1'),(326,1,34,0,'1'),(327,1,35,0,'1'),(328,1,39,0,'1'),(368,2,1,1,'1'),(369,2,2,0,'1'),(370,2,39,0,'1'),(371,2,4,0,'1'),(372,2,38,0,'1'),(373,2,8,0,'1'),(374,2,7,0,'1'),(375,2,3,0,'1'),(376,2,9,0,'1'),(377,2,6,0,'1'),(378,2,5,0,'1'),(379,2,13,0,'1'),(380,2,11,0,'1'),(381,2,12,0,'1'),(382,2,24,0,'1'),(383,2,14,0,'1'),(384,2,15,0,'1'),(385,2,30,0,'1'),(386,2,18,0,'1'),(387,2,20,0,'1'),(388,2,29,0,'1'),(389,2,26,0,'1'),(390,2,27,0,'1'),(391,2,32,0,'1'),(392,2,19,0,'1'),(393,2,25,0,'1'),(394,2,21,0,'1'),(395,2,28,0,'1'),(396,2,16,0,'1'),(397,2,17,0,'1'),(398,2,22,0,'1'),(399,2,23,0,'1'),(400,2,31,0,'1'),(401,2,37,0,'1'),(402,2,33,0,'1'),(403,2,36,0,'1'),(404,2,34,0,'1'),(405,2,35,0,'1'),(406,2,40,0,'1'),(407,2,41,0,'1');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'PROD0001',1,1,1,'Refresco Cola 2L','Views/assets/imagenes/productos/img_por_defecto.png',1.00,1.50,1.30,1.40,NULL,NULL,NULL,'1',NULL,10,NULL,NULL,5,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-28 20:56:35',NULL,'2025-07-29 15:44:15',NULL,NULL,NULL,'1'),(2,'PROD0002',1,1,1,'Leche Entera 1L','Views/assets/imagenes/productos/img_por_defecto.png',1.25,1.50,1.40,1.56,NULL,NULL,NULL,'1',NULL,20,NULL,NULL,5,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-28 21:00:06',NULL,'2025-07-29 15:44:15',NULL,NULL,NULL,'1');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'0090940394494','susan gomez','Porveedor amor','Salinas ecuador','09800900933','susangomez@gmail.com',1,'2025-07-29 15:43:02',NULL,NULL,NULL,NULL,'1');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sri_logs`
--

LOCK TABLES `sri_logs` WRITE;
/*!40000 ALTER TABLE `sri_logs` DISABLE KEYS */;
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
INSERT INTO `usuarios` VALUES (1,'080214555','Edison','Garofalo','Jeily','123456',2,1,NULL,NULL,NULL,NULL,'2025-04-28 17:04:42','2025-04-28 18:48:24',NULL,'1',NULL,NULL),(2,'087666622','Susanw777','777','Susan7','3c2a6eb64cc629de76c419308830c53bbe63b874f6a526f7cd784182b33a2f5f3daaab47b5bde5868b82e4dd3b521d147a7542292b689acdf60122b97e99523f',3,1,'garofalo@gmail.com','sssddssddssdddsdsds','55555557777',NULL,'2025-04-30 07:25:09','2025-06-13 00:11:02',NULL,'1',NULL,NULL),(3,'0804610814','0','Garofalo','Edison','123',3,1,'edisongarofalo88@gmail.com','sssddssdd','202 555 0111','','2025-06-12 22:11:32','2025-06-13 23:10:45',NULL,'1','Views/assets/imagenes/imgUsuario/logo_684cf64563f39.PNG','Esmeralda'),(4,'0804610814','Susan','Gomez','Edison','123',2,1,'edisongarofalo88@gmail.com','barrio entre rios','202 555 0111','Via la T','2025-06-12 22:15:18','2025-06-13 00:19:06',NULL,'2','Views/assets/imagenes/imgUsuario/logo_684b97c69e16c.PNG','Esmeraldas'),(5,'0080009089891','Susan 1','Gomez 1','Pamela1','12345',3,1,'garofaloedison20241@gmail.com','salinas1','202 555 01115','','2025-07-26 18:30:23','2025-07-26 18:34:17',NULL,'1','','Esmeralas 1');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,1,1,1,NULL,'00000053','EFECTIVO','03',NULL,NULL,2.00,0.78,5.22,6.00,10.00,4.00,0.00,1,'2025-07-28 21:33:35',NULL,'2025-07-29 14:19:45',NULL,NULL,'0',NULL,NULL,NULL),(2,1,1,1,NULL,'00000054','CREDITO','03',NULL,NULL,2.00,1.18,7.82,9.00,1.00,8.00,1.00,1,'2025-07-28 21:48:21',NULL,'2025-07-29 14:16:03',NULL,NULL,'0',NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_credito`
--

LOCK TABLES `ventas_credito` WRITE;
/*!40000 ALTER TABLE `ventas_credito` DISABLE KEYS */;
INSERT INTO `ventas_credito` VALUES (1,2,1,'00000010',9.00,1.00,8.00,'2025-07-28 21:48:21','2025-10-24','Pendiente');
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
        SELECT CONCAT('Warning: Stock insuficiente en lotes disponibles. Stock actual: ',
                      IFNULL(v_total_disponible, 0)) AS resultado;
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
            SET stock_disponible = 0, estado = 0,
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
            SET estado = 0
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
                SET stock_disponible = stock_disponible + v_cantidad_vendida
                WHERE id_lote = v_id_stock and estado=1;

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
        INSERT INTO detalle_devoluciones (id_movimiento_caja, tipo_devolucion, id_compras, nro_compras,monto,descripcion)
        VALUES (v_id_movimiento, 'Compra',p_IdCompra,v_numeroBoleta, v_TOTAL, CONCAT('Eliminación de compra Id: ', p_IdCompra));
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

    SET estado = 2

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

    SET estado = 2

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

        SET estado = 2

        WHERE id_abono  = v_id_abono  AND estado = 1;

      

        UPDATE ventas_credito 

        SET estado = 'Activo',

        monto_abonado =monto_abonado - p_abono,

        saldo_pendiente=saldo_pendiente + p_abono

        WHERE id_venta   = v_id_ventas ;

        

     END IF;

    

     UPDATE detalle_ingresos

        SET estado = 2

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
        VALUES (v_id_movimiento, 'Ventas', 1, v_IdVenta,p_nro_boleta,p_ImporteRecibido,'Venta de producto');

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
      WHEN mc.tipo_movimiento = 'Devolucion' AND dd.tipo_devolucion = 'Venta' AND dd.afectarCaja = 1 THEN dd.monto
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



SELECT 
    v.fecha_dia AS fecha_venta,
    v.total_venta,

    IFNULL((
        SELECT SUM(ROUND(v2.total_venta, 2))
        FROM ventas v2
        WHERE v2.estado = '1'
            AND DATE(v2.fecha_registro) = DATE_SUB(v.fecha_dia, INTERVAL 1 MONTH)
    ), 0) AS total_venta_ant

FROM (
    SELECT 
        DATE(fecha_registro) AS fecha_dia,
        SUM(ROUND(total_venta, 2)) AS total_venta
    FROM ventas
    WHERE estado = '1'
        AND fecha_registro >= DATE_ADD(LAST_DAY(NOW() - INTERVAL 1 MONTH), INTERVAL 1 DAY)
        AND fecha_registro <= LAST_DAY(CURRENT_DATE)
    GROUP BY DATE(fecha_registro)
) v
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
    INSERT INTO detalle_gastos (afectarCaja,id_movimiento_caja,tipo_gastos, tipo_pago, id_compras ,monto,descripcion)

    VALUES (1,v_id_movimiento,'Creditos', p_MetodoPago, p_IdCompra,p_MontoAbonado, p_Observacion);
    
    
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
 '' as vacio,
    p.codigo_barra AS 'codigo_barra',
    p.descripcion_producto AS 'descripcion_producto',
    SUM(dvl.cantidad_vendida) AS 'total_cantidad_vendida',
    ROUND(AVG(dvl.precio_venta), 2) AS 'precio_venta',
    ROUND(AVG(dvl.costo_unitario), 2) AS 'costo_unitario',
    ROUND(AVG(dvl.ganancia_unitaria), 2) AS 'ganancia_unitaria',
    SUM(dvl.precio_venta * dvl.cantidad_vendida) AS 'total_ventas',
    SUM(dvl.costo_unitario * dvl.cantidad_vendida) AS 'total_compras',
    SUM((dvl.precio_venta - dvl.costo_unitario) * dvl.cantidad_vendida) AS 'total_ganancia'
FROM 
    ventas v
JOIN 
    det_venta dv ON v.IdVenta = dv.IdVenta
JOIN 
    det_venta_lote dvl ON dv.IdDetalleVenta = dvl.id_det_venta
JOIN 
    producto p ON dv.IdProducto = p.id_producto
WHERE 
    date(v.fecha_registro) BETWEEN p_fechaDesde AND p_fechaHasta
    AND v.estado = '1'
GROUP BY 
    p.codigo_barra, p.descripcion_producto
ORDER BY 
    SUM((dvl.precio_venta - dvl.costo_unitario) * dvl.cantidad_vendida) DESC;



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
        SET v_mensaje = CONCAT('No se puede anular: ', v_total_problemas, ' lote(s) tienen stock insuficiente.');
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

-- Dump completed on 2025-07-29 16:01:35
