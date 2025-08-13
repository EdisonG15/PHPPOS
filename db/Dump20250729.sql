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
-- Dumping data for table `abonos_compra_credito`
--

LOCK TABLES `abonos_compra_credito` WRITE;
/*!40000 ALTER TABLE `abonos_compra_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `abonos_compra_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `abonos_credito`
--

LOCK TABLES `abonos_credito` WRITE;
/*!40000 ALTER TABLE `abonos_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `abonos_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ajuste_lote`
--

LOCK TABLES `ajuste_lote` WRITE;
/*!40000 ALTER TABLE `ajuste_lote` DISABLE KEYS */;
/*!40000 ALTER TABLE `ajuste_lote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ambiente`
--

LOCK TABLES `ambiente` WRITE;
/*!40000 ALTER TABLE `ambiente` DISABLE KEYS */;
INSERT INTO `ambiente` VALUES (2,'PRODUCCION'),(1,'PRUEBAS');
/*!40000 ALTER TABLE `ambiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `arqueo_caja`
--

LOCK TABLES `arqueo_caja` WRITE;
/*!40000 ALTER TABLE `arqueo_caja` DISABLE KEYS */;
/*!40000 ALTER TABLE `arqueo_caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `asiento_contable`
--

LOCK TABLES `asiento_contable` WRITE;
/*!40000 ALTER TABLE `asiento_contable` DISABLE KEYS */;
INSERT INTO `asiento_contable` VALUES (1,'2025-07-29','Inventario inicial del producto Producto 1','INVENTARIO_INICIAL',1,'PRODUCTO',30.00,30.00,'2025-07-29 19:17:36','producto'),(2,'2025-07-29','Inventario inicial del producto Producto 2','INVENTARIO_INICIAL',2,'PRODUCTO',164.00,164.00,'2025-07-29 19:19:49','producto'),(3,'2025-07-29','Inventario inicial del producto Producto 3','INVENTARIO_INICIAL',3,'PRODUCTO',100.00,100.00,'2025-07-29 19:21:31','producto'),(4,'2025-07-29','Inventario inicial del producto Producto 4','INVENTARIO_INICIAL',4,'PRODUCTO',54.00,54.00,'2025-07-29 19:24:10','producto'),(5,'2025-07-29','Inventario inicial del producto Producto 5','INVENTARIO_INICIAL',5,'PRODUCTO',18.00,18.00,'2025-07-29 19:26:20','producto'),(6,'2025-07-29','Inventario inicial del producto Producto 6','INVENTARIO_INICIAL',6,'PRODUCTO',22.00,22.00,'2025-07-29 19:28:37','producto'),(7,'2025-07-29','Inventario inicial del producto Producto 7','INVENTARIO_INICIAL',7,'PRODUCTO',71.00,71.00,'2025-07-29 19:30:12','producto'),(8,'2025-07-29','Inventario inicial del producto Producto 8','INVENTARIO_INICIAL',8,'PRODUCTO',394.00,394.00,'2025-07-29 19:32:03','producto'),(9,'2025-07-29','Inventario inicial del producto Producto 9','INVENTARIO_INICIAL',9,'PRODUCTO',288.00,288.00,'2025-07-29 19:34:25','producto'),(10,'2025-07-29','Inventario inicial del producto Producto 10','INVENTARIO_INICIAL',10,'PRODUCTO',61.00,61.00,'2025-07-29 19:35:46','producto'),(11,'2025-07-29','Inventario inicial del producto Producto 11','INVENTARIO_INICIAL',11,'PRODUCTO',174.00,174.00,'2025-07-29 20:09:01','producto'),(12,'2025-07-29','Inventario inicial del producto Producto 12','INVENTARIO_INICIAL',12,'PRODUCTO',35.00,35.00,'2025-07-29 20:10:11','producto'),(13,'2025-07-29','Inventario inicial del producto Producto 13','INVENTARIO_INICIAL',13,'PRODUCTO',94.00,94.00,'2025-07-29 20:11:48','producto'),(14,'2025-07-29','Inventario inicial del producto Producto 14','INVENTARIO_INICIAL',14,'PRODUCTO',116.00,116.00,'2025-07-29 20:13:20','producto'),(15,'2025-07-29','Inventario inicial del producto Producto 15','INVENTARIO_INICIAL',15,'PRODUCTO',170.00,170.00,'2025-07-29 20:14:31','producto'),(16,'2025-07-29','Inventario inicial del producto Producto 16','INVENTARIO_INICIAL',16,'PRODUCTO',46.00,46.00,'2025-07-29 20:16:00','producto'),(17,'2025-07-29','Inventario inicial del producto Producto 17','INVENTARIO_INICIAL',17,'PRODUCTO',146.00,146.00,'2025-07-29 20:17:15','producto'),(18,'2025-07-29','Inventario inicial del producto Producto 18','INVENTARIO_INICIAL',18,'PRODUCTO',368.00,368.00,'2025-07-29 20:18:34','producto'),(19,'2025-07-29','Inventario inicial del producto Producto 19','INVENTARIO_INICIAL',19,'PRODUCTO',345.00,345.00,'2025-07-29 20:19:43','producto'),(20,'2025-07-29','Inventario inicial del producto Producto 20','INVENTARIO_INICIAL',20,'PRODUCTO',64.00,64.00,'2025-07-29 20:21:24','producto'),(21,'2025-07-29','Inventario inicial del producto Producto 21','INVENTARIO_INICIAL',21,'PRODUCTO',75.00,75.00,'2025-07-29 20:22:45','producto'),(22,'2025-07-29','Inventario inicial del producto Producto 22','INVENTARIO_INICIAL',22,'PRODUCTO',43.00,43.00,'2025-07-29 20:25:20','producto'),(23,'2025-07-29','Inventario inicial del producto Producto 23','INVENTARIO_INICIAL',23,'PRODUCTO',103.00,103.00,'2025-07-29 20:28:02','producto'),(24,'2025-07-29','Inventario inicial del producto Producto 24','INVENTARIO_INICIAL',24,'PRODUCTO',66.00,66.00,'2025-07-29 20:30:26','producto'),(25,'2025-07-29','Inventario inicial del producto Producto 25','INVENTARIO_INICIAL',25,'PRODUCTO',50.00,50.00,'2025-07-29 20:32:24','producto'),(26,'2025-07-29','Inventario inicial del producto Producto 26','INVENTARIO_INICIAL',26,'PRODUCTO',21.00,21.00,'2025-07-29 20:35:25','producto'),(27,'2025-07-29','Inventario inicial del producto Producto 27','INVENTARIO_INICIAL',27,'PRODUCTO',55.00,55.00,'2025-07-29 21:17:07','producto'),(28,'2025-07-29','Inventario inicial del producto Producto 28','INVENTARIO_INICIAL',28,'PRODUCTO',103.00,103.00,'2025-07-29 21:18:30','producto'),(29,'2025-07-29','Inventario inicial del producto Producto 29','INVENTARIO_INICIAL',29,'PRODUCTO',66.00,66.00,'2025-07-29 21:19:46','producto'),(30,'2025-07-29','Inventario inicial del producto Producto 30','INVENTARIO_INICIAL',30,'PRODUCTO',266.00,266.00,'2025-07-29 21:21:11','producto');
/*!40000 ALTER TABLE `asiento_contable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cajas`
--

LOCK TABLES `cajas` WRITE;
/*!40000 ALTER TABLE `cajas` DISABLE KEYS */;
INSERT INTO `cajas` VALUES (1,'1','Gener','01','2025-04-28 16:23:09','2025-05-09 11:39:18',NULL,'1'),(2,'3323','23323','22332','2025-04-30 07:10:26','2025-04-30 19:52:07','2025-04-30 07:52:07','0'),(3,'22222','2222','222222','2025-04-30 19:18:42','2025-04-30 19:20:48','2025-04-30 07:20:48','0');
/*!40000 ALTER TABLE `cajas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'sin categoria',NULL,1,'2025-07-29 19:16:15',NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'05','0102030405','Juan g','Pérez','Av. Quito 123','098676554544','juan@gmail.com',1,'2025-07-29 21:51:27',NULL,NULL,NULL,NULL,'1'),(2,'05','0912345678','María','López','Calle 10 de Agosto','098767666776','frrrss@gmail.com',1,'2025-07-29 21:52:27',NULL,NULL,NULL,NULL,'1'),(3,'05','0809091122','Pedro','Gómez','Av. Amazonas','0809091122','juan@mail.com',1,'2025-07-29 21:53:35',NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `compras_credito`
--

LOCK TABLES `compras_credito` WRITE;
/*!40000 ALTER TABLE `compras_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `comprobantes_electronicos`
--

LOCK TABLES `comprobantes_electronicos` WRITE;
/*!40000 ALTER TABLE `comprobantes_electronicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `comprobantes_electronicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `credito_estado_historial`
--

LOCK TABLES `credito_estado_historial` WRITE;
/*!40000 ALTER TABLE `credito_estado_historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `credito_estado_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cuenta_contable`
--

LOCK TABLES `cuenta_contable` WRITE;
/*!40000 ALTER TABLE `cuenta_contable` DISABLE KEYS */;
INSERT INTO `cuenta_contable` VALUES (1,'100','ACTIVO','ACTIVO',1,NULL),(2,'200','PASIVO','PASIVO',1,NULL),(3,'300','PATRIMONIO','PATRIMONIO',1,NULL),(4,'400','INGRESO','INGRESO',1,NULL),(5,'500','GASTO','GASTO',1,NULL),(6,'101','Caja','ACTIVO',2,1),(7,'102','Banco','ACTIVO',2,1),(8,'103','Cuentas por cobrar','ACTIVO',2,1),(9,'104','Inventario','ACTIVO',2,1),(10,'201','Cuentas por pagar','PASIVO',2,2),(11,'401','Ventas','INGRESO',2,4),(12,'402','Ingresos varios','INGRESO',2,4),(13,'403','Ingresos por ajustes de inventario','INGRESO',2,4),(14,'501','Gasto de servicios (ej. luz, agua)','GASTO',2,5),(15,'502','Pérdida por inventario','GASTO',2,5),(16,'600','Productos Bonificados','GASTO',2,5);
/*!40000 ALTER TABLE `cuenta_contable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cuotas_compra_credito`
--

LOCK TABLES `cuotas_compra_credito` WRITE;
/*!40000 ALTER TABLE `cuotas_compra_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuotas_compra_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cuotas_credito`
--

LOCK TABLES `cuotas_credito` WRITE;
/*!40000 ALTER TABLE `cuotas_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuotas_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `det_compra`
--

LOCK TABLES `det_compra` WRITE;
/*!40000 ALTER TABLE `det_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `det_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `det_venta`
--

LOCK TABLES `det_venta` WRITE;
/*!40000 ALTER TABLE `det_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `det_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `det_venta_lote`
--

LOCK TABLES `det_venta_lote` WRITE;
/*!40000 ALTER TABLE `det_venta_lote` DISABLE KEYS */;
/*!40000 ALTER TABLE `det_venta_lote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detalle_asiento`
--

LOCK TABLES `detalle_asiento` WRITE;
/*!40000 ALTER TABLE `detalle_asiento` DISABLE KEYS */;
INSERT INTO `detalle_asiento` VALUES (1,1,9,30.00,0.00,'Registro de inventario inicialProducto 1',1),(2,1,13,0.00,30.00,'Contrapartida por ajuste de producto Producto 1',2),(3,2,9,164.00,0.00,'Registro de inventario inicialProducto 2',1),(4,2,13,0.00,164.00,'Contrapartida por ajuste de producto Producto 2',2),(5,3,9,100.00,0.00,'Registro de inventario inicialProducto 3',1),(6,3,13,0.00,100.00,'Contrapartida por ajuste de producto Producto 3',2),(7,4,9,54.00,0.00,'Registro de inventario inicialProducto 4',1),(8,4,13,0.00,54.00,'Contrapartida por ajuste de producto Producto 4',2),(9,5,9,18.00,0.00,'Registro de inventario inicialProducto 5',1),(10,5,13,0.00,18.00,'Contrapartida por ajuste de producto Producto 5',2),(11,6,9,22.00,0.00,'Registro de inventario inicialProducto 6',1),(12,6,13,0.00,22.00,'Contrapartida por ajuste de producto Producto 6',2),(13,7,9,71.00,0.00,'Registro de inventario inicialProducto 7',1),(14,7,13,0.00,71.00,'Contrapartida por ajuste de producto Producto 7',2),(15,8,9,394.00,0.00,'Registro de inventario inicialProducto 8',1),(16,8,13,0.00,394.00,'Contrapartida por ajuste de producto Producto 8',2),(17,9,9,288.00,0.00,'Registro de inventario inicialProducto 9',1),(18,9,13,0.00,288.00,'Contrapartida por ajuste de producto Producto 9',2),(19,10,9,61.00,0.00,'Registro de inventario inicialProducto 10',1),(20,10,13,0.00,61.00,'Contrapartida por ajuste de producto Producto 10',2),(21,11,9,174.00,0.00,'Registro de inventario inicialProducto 11',1),(22,11,13,0.00,174.00,'Contrapartida por ajuste de producto Producto 11',2),(23,12,9,35.00,0.00,'Registro de inventario inicialProducto 12',1),(24,12,13,0.00,35.00,'Contrapartida por ajuste de producto Producto 12',2),(25,13,9,94.00,0.00,'Registro de inventario inicialProducto 13',1),(26,13,13,0.00,94.00,'Contrapartida por ajuste de producto Producto 13',2),(27,14,9,116.00,0.00,'Registro de inventario inicialProducto 14',1),(28,14,13,0.00,116.00,'Contrapartida por ajuste de producto Producto 14',2),(29,15,9,170.00,0.00,'Registro de inventario inicialProducto 15',1),(30,15,13,0.00,170.00,'Contrapartida por ajuste de producto Producto 15',2),(31,16,9,46.00,0.00,'Registro de inventario inicialProducto 16',1),(32,16,13,0.00,46.00,'Contrapartida por ajuste de producto Producto 16',2),(33,17,9,146.00,0.00,'Registro de inventario inicialProducto 17',1),(34,17,13,0.00,146.00,'Contrapartida por ajuste de producto Producto 17',2),(35,18,9,368.00,0.00,'Registro de inventario inicialProducto 18',1),(36,18,13,0.00,368.00,'Contrapartida por ajuste de producto Producto 18',2),(37,19,9,345.00,0.00,'Registro de inventario inicialProducto 19',1),(38,19,13,0.00,345.00,'Contrapartida por ajuste de producto Producto 19',2),(39,20,9,64.00,0.00,'Registro de inventario inicialProducto 20',1),(40,20,13,0.00,64.00,'Contrapartida por ajuste de producto Producto 20',2),(41,21,9,75.00,0.00,'Registro de inventario inicialProducto 21',1),(42,21,13,0.00,75.00,'Contrapartida por ajuste de producto Producto 21',2),(43,22,9,43.00,0.00,'Registro de inventario inicialProducto 22',1),(44,22,13,0.00,43.00,'Contrapartida por ajuste de producto Producto 22',2),(45,23,9,103.00,0.00,'Registro de inventario inicialProducto 23',1),(46,23,13,0.00,103.00,'Contrapartida por ajuste de producto Producto 23',2),(47,24,9,66.00,0.00,'Registro de inventario inicialProducto 24',1),(48,24,13,0.00,66.00,'Contrapartida por ajuste de producto Producto 24',2),(49,25,9,50.00,0.00,'Registro de inventario inicialProducto 25',1),(50,25,13,0.00,50.00,'Contrapartida por ajuste de producto Producto 25',2),(51,26,9,21.00,0.00,'Registro de inventario inicialProducto 26',1),(52,26,13,0.00,21.00,'Contrapartida por ajuste de producto Producto 26',2),(53,27,9,55.00,0.00,'Registro de inventario inicialProducto 27',1),(54,27,13,0.00,55.00,'Contrapartida por ajuste de producto Producto 27',2),(55,28,9,103.00,0.00,'Registro de inventario inicialProducto 28',1),(56,28,13,0.00,103.00,'Contrapartida por ajuste de producto Producto 28',2),(57,29,9,66.00,0.00,'Registro de inventario inicialProducto 29',1),(58,29,13,0.00,66.00,'Contrapartida por ajuste de producto Producto 29',2),(59,30,9,266.00,0.00,'Registro de inventario inicialProducto 30',1),(60,30,13,0.00,266.00,'Contrapartida por ajuste de producto Producto 30',2);
/*!40000 ALTER TABLE `detalle_asiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detalle_devoluciones`
--

LOCK TABLES `detalle_devoluciones` WRITE;
/*!40000 ALTER TABLE `detalle_devoluciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_devoluciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detalle_gastos`
--

LOCK TABLES `detalle_gastos` WRITE;
/*!40000 ALTER TABLE `detalle_gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detalle_ingresos`
--

LOCK TABLES `detalle_ingresos` WRITE;
/*!40000 ALTER TABLE `detalle_ingresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_ingresos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dinero`
--

LOCK TABLES `dinero` WRITE;
/*!40000 ALTER TABLE `dinero` DISABLE KEYS */;
/*!40000 ALTER TABLE `dinero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,NULL,'Ventas de Producto Agricola','El Agricultor','0804610814001','Esmeralda','AV Las Golondrinas',NULL,'NO','1','1','001','001',1,NULL,NULL,'00000054','00000010','00000044','0','garofaloedison8@gmail.com','0992335080',NULL,'2025-05-03 19:57:34','2025-07-29 15:43:57',NULL,'1',4,NULL,'01','14',NULL,NULL,NULL,NULL,NULL,'01','2'),(2,1,'ffffffdff','2','1234678995','barrio entre rios','das','si','SI','1','1','001','001',1,'dwww',NULL,NULL,NULL,NULL,NULL,'edisongarofalo88@gmail.com','5555555','ddddddddddd','2025-06-12 14:34:45','2025-07-29 15:43:57',NULL,'2',0,'Views/assets/imagenes/logo/logo_684b2bd5447c5.PNG','01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,2,'Proveedor anime ','Mundo del aime ','0804610014001','barrio entre rios1','Guayauqii 1','SI','NO','2','2','001','002',2,'Bleacjha ',NULL,NULL,NULL,NULL,NULL,'edisongarofalo881@gmail.com','55555551','gracias por su comras1','2025-06-12 14:41:08','2025-07-29 15:43:57',NULL,'1',2,'Views/assets/imagenes/logo/logo_684b2d54d9e4a.PNG','01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,1,'ffffffdff','Mundo del aime 1','0804610814','barrio entre rios','ffffffff','SI','SI','1','2','090','090',2,'Bleacjha 1',NULL,NULL,NULL,NULL,NULL,'edisongarofalo88@gmail.com','5555555','dffdfffffff','2025-06-12 22:09:36','2025-07-29 15:43:57',NULL,'2',4,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,'Aniemis','Salinas','0920910920191','ddddd','dndndnd','SI','SI','1','2','001','002',1,'Maee',NULL,NULL,NULL,NULL,NULL,'mariajtkm_2011@hotmail.com','(095) 918-8170','sdsdssdsddssdsdsd','2025-07-19 19:38:12','2025-07-29 15:43:57',NULL,'1',4,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,'DausukiAnime','Guaya quli','0920910920191','sadsdasdsa','ssdasdssdads','SI','SI','1','2','001','002',1,'dai',NULL,NULL,NULL,NULL,NULL,'mariajtkm_2011@hotmail.com','(095) 918-8170','ddsadsaadsadsads','2025-07-19 21:12:18','2025-07-29 15:43:57',NULL,'1',4,'','01','0',NULL,NULL,NULL,NULL,NULL,'21','2');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `enviado_cliente`
--

LOCK TABLES `enviado_cliente` WRITE;
/*!40000 ALTER TABLE `enviado_cliente` DISABLE KEYS */;
INSERT INTO `enviado_cliente` VALUES (2,'NO'),(1,'SI');
/*!40000 ALTER TABLE `enviado_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `estado_emision`
--

LOCK TABLES `estado_emision` WRITE;
/*!40000 ALTER TABLE `estado_emision` DISABLE KEYS */;
INSERT INTO `estado_emision` VALUES (4,'AUTORIZADO'),(3,'DEVUELTA'),(5,'EN_PROCESO'),(99,'ERROR_CONSULTA_SRI'),(1,'GENERADO'),(6,'NO_AUTORIZADO'),(7,'OTRO / DESCONOCIDO'),(2,'RECIBIDA');
/*!40000 ALTER TABLE `estado_emision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `firma_electronica`
--

LOCK TABLES `firma_electronica` WRITE;
/*!40000 ALTER TABLE `firma_electronica` DISABLE KEYS */;
/*!40000 ALTER TABLE `firma_electronica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `forma_pago`
--

LOCK TABLES `forma_pago` WRITE;
/*!40000 ALTER TABLE `forma_pago` DISABLE KEYS */;
INSERT INTO `forma_pago` VALUES ('01','SIN UTILIZACION DEL SISTEMA FINANCIERO'),('15','COMPENSACIÓN DE DEUDAS'),('16','TARJETA DE DÉBITO'),('17','DINERO ELECTRÓNICO'),('18','TARJETA PREPAGO'),('19','TARJETA DE CRÉDITO'),('20','OTROS CON UTILIZACIÓN DEL SISTEMA FINANCIERO'),('21','ENDOSO DE TÍTULOS');
/*!40000 ALTER TABLE `forma_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `impuesto`
--

LOCK TABLES `impuesto` WRITE;
/*!40000 ALTER TABLE `impuesto` DISABLE KEYS */;
INSERT INTO `impuesto` VALUES ('2','IVA'),('3','ICE'),('5','IRBPNR');
/*!40000 ALTER TABLE `impuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `kardex`
--

LOCK TABLES `kardex` WRITE;
/*!40000 ALTER TABLE `kardex` DISABLE KEYS */;
INSERT INTO `kardex` VALUES (1,1,1,'4278050957808','2025-07-29 19:17:36','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,32,0.95,30.00),(2,1,2,'8132609575384','2025-07-29 19:19:49','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,52,3.15,164.00),(3,1,3,'4495711283430','2025-07-29 19:21:31','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,41,2.45,100.00),(4,1,4,'5403521749369','2025-07-29 19:24:10','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,59,0.92,54.00),(5,1,5,'1107061968005','2025-07-29 19:26:20','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,27,0.65,18.00),(6,1,6,'2926458086231','2025-07-29 19:28:37','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,1.39,22.00),(7,1,7,'3692938128315','2025-07-29 19:30:12','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,39,1.81,71.00),(8,1,8,'6197173662117','2025-07-29 19:32:03','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,89,4.43,394.00),(9,1,9,'3936665846387','2025-07-29 19:34:25','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,81,3.56,288.00),(10,1,10,'5266353701024','2025-07-29 19:35:46','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,55,1.11,61.00),(11,1,11,'9548887638468','2025-07-29 20:09:01','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,39,4.47,174.00),(12,1,12,'2837419397712','2025-07-29 20:10:11','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,14,2.50,35.00),(13,1,13,'6054983401054','2025-07-29 20:11:48','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,38,2.48,94.00),(14,1,14,'7537128809938','2025-07-29 20:13:20','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,52,2.23,116.00),(15,1,15,'8955199210909','2025-07-29 20:14:31','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,35,4.85,170.00),(16,1,16,'1818084761325','2025-07-29 20:16:00','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,87,0.53,46.00),(17,1,17,'5259543058627','2025-07-29 20:17:15','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,97,1.50,146.00),(18,1,18,'2699075385654','2025-07-29 20:18:34','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,91,4.04,368.00),(19,1,19,'4633160396667','2025-07-29 20:19:43','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,81,4.26,345.00),(20,1,20,'1217317286143','2025-07-29 20:21:24','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,13,4.93,64.00),(21,1,21,'8795369589559','2025-07-29 20:22:45','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,40,1.87,75.00),(22,1,22,'2417534007719','2025-07-29 20:25:20','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,33,1.29,43.00),(23,1,23,'1689126384227','2025-07-29 20:28:02','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,59,1.74,103.00),(24,1,24,'2925873873758','2025-07-29 20:30:26','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,66,1.00,66.00),(25,1,25,'6308856421409','2025-07-29 20:32:24','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,45,1.10,50.00),(26,1,26,'6118736826055','2025-07-29 20:35:25','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,18,1.18,21.00),(27,1,27,'1308706855412','2025-07-29 21:17:07','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,23,2.38,55.00),(28,1,28,'6068526185068','2025-07-29 21:18:30','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,21,4.91,103.00),(29,1,29,'8449598633935','2025-07-29 21:19:46','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,82,0.81,66.00),(30,1,30,'9304457235099','2025-07-29 21:21:11','INVENTARIO INICIAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,94,2.83,266.00);
/*!40000 ALTER TABLE `kardex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `licencia`
--

LOCK TABLES `licencia` WRITE;
/*!40000 ALTER TABLE `licencia` DISABLE KEYS */;
INSERT INTO `licencia` VALUES (1,' DESKTOP-6M3H8KN','1');
/*!40000 ALTER TABLE `licencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `licencia_alquirida`
--

LOCK TABLES `licencia_alquirida` WRITE;
/*!40000 ALTER TABLE `licencia_alquirida` DISABLE KEYS */;
INSERT INTO `licencia_alquirida` VALUES (2,1,1,'1',' DESKTOP-6M3H8KN','2025-03-28 17:04:42','2028-04-28 17:04:42','1');
/*!40000 ALTER TABLE `licencia_alquirida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `log_auditoria`
--

LOCK TABLES `log_auditoria` WRITE;
/*!40000 ALTER TABLE `log_auditoria` DISABLE KEYS */;
INSERT INTO `log_auditoria` VALUES (1,'medidas','Registrar',1,'2025-07-29 19:15:40','Registrar una Medidas',NULL,NULL),(2,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:17:36','Registro de producto nuevo. Código: 4278050957808, Descripción: Producto 1',1,'PRODUCTO'),(3,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:19:49','Registro de producto nuevo. Código: 8132609575384, Descripción: Producto 2',2,'PRODUCTO'),(4,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:21:31','Registro de producto nuevo. Código: 4495711283430, Descripción: Producto 3',3,'PRODUCTO'),(5,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:24:10','Registro de producto nuevo. Código: 5403521749369, Descripción: Producto 4',4,'PRODUCTO'),(6,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:26:20','Registro de producto nuevo. Código: 1107061968005, Descripción: Producto 5',5,'PRODUCTO'),(7,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:28:37','Registro de producto nuevo. Código: 2926458086231, Descripción: Producto 6',6,'PRODUCTO'),(8,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:30:12','Registro de producto nuevo. Código: 3692938128315, Descripción: Producto 7',7,'PRODUCTO'),(9,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:32:03','Registro de producto nuevo. Código: 6197173662117, Descripción: Producto 8',8,'PRODUCTO'),(10,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:34:25','Registro de producto nuevo. Código: 3936665846387, Descripción: Producto 9',9,'PRODUCTO'),(11,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 19:35:46','Registro de producto nuevo. Código: 5266353701024, Descripción: Producto 10',10,'PRODUCTO'),(12,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:09:01','Registro de producto nuevo. Código: 9548887638468, Descripción: Producto 11',11,'PRODUCTO'),(13,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:10:11','Registro de producto nuevo. Código: 2837419397712, Descripción: Producto 12',12,'PRODUCTO'),(14,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:11:48','Registro de producto nuevo. Código: 6054983401054, Descripción: Producto 13',13,'PRODUCTO'),(15,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:13:20','Registro de producto nuevo. Código: 7537128809938, Descripción: Producto 14',14,'PRODUCTO'),(16,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:14:31','Registro de producto nuevo. Código: 8955199210909, Descripción: Producto 15',15,'PRODUCTO'),(17,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:16:00','Registro de producto nuevo. Código: 1818084761325, Descripción: Producto 16',16,'PRODUCTO'),(18,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:17:15','Registro de producto nuevo. Código: 5259543058627, Descripción: Producto 17',17,'PRODUCTO'),(19,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:18:34','Registro de producto nuevo. Código: 2699075385654, Descripción: Producto 18',18,'PRODUCTO'),(20,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:19:43','Registro de producto nuevo. Código: 4633160396667, Descripción: Producto 19',19,'PRODUCTO'),(21,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:21:24','Registro de producto nuevo. Código: 1217317286143, Descripción: Producto 20',20,'PRODUCTO'),(22,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:22:45','Registro de producto nuevo. Código: 8795369589559, Descripción: Producto 21',21,'PRODUCTO'),(23,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:25:20','Registro de producto nuevo. Código: 2417534007719, Descripción: Producto 22',22,'PRODUCTO'),(24,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:28:02','Registro de producto nuevo. Código: 1689126384227, Descripción: Producto 23',23,'PRODUCTO'),(25,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:30:26','Registro de producto nuevo. Código: 2925873873758, Descripción: Producto 24',24,'PRODUCTO'),(26,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:32:24','Registro de producto nuevo. Código: 6308856421409, Descripción: Producto 25',25,'PRODUCTO'),(27,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 20:35:25','Registro de producto nuevo. Código: 6118736826055, Descripción: Producto 26',26,'PRODUCTO'),(28,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 21:17:07','Registro de producto nuevo. Código: 1308706855412, Descripción: Producto 27',27,'PRODUCTO'),(29,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 21:18:30','Registro de producto nuevo. Código: 6068526185068, Descripción: Producto 28',28,'PRODUCTO'),(30,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 21:19:46','Registro de producto nuevo. Código: 8449598633935, Descripción: Producto 29',29,'PRODUCTO'),(31,'producto / lote_producto / kardex','INSERT',1,'2025-07-29 21:21:11','Registro de producto nuevo. Código: 9304457235099, Descripción: Producto 30',30,'PRODUCTO'),(32,'proveedor','Actualizar',1,'2025-07-29 21:47:30','Registrar un Proveedor con el id: 1',1,'Proveedor'),(33,'proveedor','Actualizar',1,'2025-07-29 21:48:59','Registrar un Proveedor con el id: 2',2,'Proveedor'),(34,'cliente','Actualizar',1,'2025-07-29 21:51:27','Registrar un Cliente con el id: 1',1,'Cliente'),(35,'cliente','Actualizar',1,'2025-07-29 21:52:27','Registrar un Cliente con el id: 2',2,'Cliente'),(36,'cliente','Actualizar',1,'2025-07-29 21:53:35','Registrar un Cliente con el id: 3',3,'Cliente');
/*!40000 ALTER TABLE `log_auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `lote_producto`
--

LOCK TABLES `lote_producto` WRITE;
/*!40000 ALTER TABLE `lote_producto` DISABLE KEYS */;
INSERT INTO `lote_producto` (`id_lote`, `id_usuario_creacion`, `id_det_compra`, `id_producto`, `cantidad_comprada`, `cantidad_bonificada`, `stock_disponible`, `costo_unitario`, `fecha_registro`, `fecha_vencimiento`, `estado`, `id_usuario_actualizacion`, `fecha_actualizacion`) VALUES (1,1,NULL,1,32,0,32,0.95,'2025-07-29 19:17:36','2025-11-08',1,NULL,NULL),(2,1,NULL,2,52,0,52,3.15,'2025-07-29 19:19:49','2025-10-04',1,NULL,NULL),(3,1,NULL,3,41,0,41,2.45,'2025-07-29 19:21:31',NULL,1,NULL,NULL),(4,1,NULL,4,59,0,59,0.92,'2025-07-29 19:24:10','2025-10-19',1,NULL,NULL),(5,1,NULL,5,27,0,27,0.65,'2025-07-29 19:26:20','2025-10-10',1,NULL,NULL),(6,1,NULL,6,16,0,16,1.39,'2025-07-29 19:28:37',NULL,1,NULL,NULL),(7,1,NULL,7,39,0,39,1.81,'2025-07-29 19:30:12',NULL,1,NULL,NULL),(8,1,NULL,8,89,0,89,4.43,'2025-07-29 19:32:03','2025-10-19',1,NULL,NULL),(9,1,NULL,9,81,0,81,3.56,'2025-07-29 19:34:25','2025-11-02',1,NULL,NULL),(10,1,NULL,10,55,0,55,1.11,'2025-07-29 19:35:46',NULL,1,NULL,NULL),(11,1,NULL,11,39,0,39,4.47,'2025-07-29 20:09:01','2025-11-29',1,NULL,NULL),(12,1,NULL,12,14,0,14,2.50,'2025-07-29 20:10:11',NULL,1,NULL,NULL),(13,1,NULL,13,38,0,38,2.48,'2025-07-29 20:11:48','2025-09-07',1,NULL,NULL),(14,1,NULL,14,52,0,52,2.23,'2025-07-29 20:13:20','2026-01-03',1,NULL,NULL),(15,1,NULL,15,35,0,35,4.85,'2025-07-29 20:14:31','2025-11-30',1,NULL,NULL),(16,1,NULL,16,87,0,87,0.53,'2025-07-29 20:16:00',NULL,1,NULL,NULL),(17,1,NULL,17,97,0,97,1.50,'2025-07-29 20:17:15',NULL,1,NULL,NULL),(18,1,NULL,18,91,0,91,4.04,'2025-07-29 20:18:34','2025-12-27',1,NULL,NULL),(19,1,NULL,19,81,0,81,4.26,'2025-07-29 20:19:43',NULL,1,NULL,NULL),(20,1,NULL,20,13,0,13,4.93,'2025-07-29 20:21:24',NULL,1,NULL,NULL),(21,1,NULL,21,40,0,40,1.87,'2025-07-29 20:22:45',NULL,1,NULL,NULL),(22,1,NULL,22,33,0,33,1.29,'2025-07-29 20:25:20',NULL,1,NULL,NULL),(23,1,NULL,23,59,0,59,1.74,'2025-07-29 20:28:02',NULL,1,NULL,NULL),(24,1,NULL,24,66,0,66,1.00,'2025-07-29 20:30:26','2025-10-26',1,NULL,NULL),(25,1,NULL,25,45,0,45,1.10,'2025-07-29 20:32:24',NULL,1,NULL,NULL),(26,1,NULL,26,18,0,18,1.18,'2025-07-29 20:35:25',NULL,1,NULL,NULL),(27,1,NULL,27,23,0,23,2.38,'2025-07-29 21:17:07','2025-11-14',1,NULL,NULL),(28,1,NULL,28,21,0,21,4.91,'2025-07-29 21:18:30',NULL,1,NULL,NULL),(29,1,NULL,29,82,0,82,0.81,'2025-07-29 21:19:46',NULL,1,NULL,NULL),(30,1,NULL,30,94,0,94,2.83,'2025-07-29 21:21:11','2025-11-30',1,NULL,NULL);
/*!40000 ALTER TABLE `lote_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'SIN nombre',1,'2025-07-29 19:16:00',NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `medidas`
--

LOCK TABLES `medidas` WRITE;
/*!40000 ALTER TABLE `medidas` DISABLE KEYS */;
INSERT INTO `medidas` VALUES (1,'UNIDAD','UND','2025-07-29 19:15:40',NULL,NULL,'1');
/*!40000 ALTER TABLE `medidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (1,'Tablero Principal',0,'dashboard.php','fas fa-tachometer-alt',0,NULL,NULL),(2,'Roles y Perfiles',0,'Administracion/ModulosyPerfiles/modulos_perfiles.php','fas fa-tablet-alt',1,NULL,NULL),(3,'Producto',4,'Gestion/Producto/productos.php','far fa-circle',7,'2023-01-06 12:48:37',NULL),(4,'Mantenedor',0,'','fas fa-tachometer-alt',2,'2023-01-06 13:02:08',NULL),(5,'Medidas',4,'Gestion/Medidas/medidas.php','far fa-circle',10,'2023-01-08 13:12:05',NULL),(6,'Categorias',4,'Gestion/Categorias/categorias.php','far fa-circle',9,'2023-01-09 12:34:34',NULL),(7,'Proveedor',4,'Gestion/Proveedor/proveedor.php','	far fa-circle',6,'2023-01-15 07:33:34',NULL),(8,'Clientes',4,'Gestion/Clientes/clientes.php','	far fa-circle',5,'2023-01-15 07:34:53',NULL),(9,'Perecederos',4,'Gestion/Perecederos/perecederos.php','	far fa-circle',8,'2023-01-15 07:35:46',NULL),(10,'prueva',0,'Gestion/Producto/productos.php','',12,'2023-01-15 07:38:28',NULL),(11,'Administrar Caja',0,'','fas fa-cash-register',13,'2023-01-15 09:43:53',NULL),(12,'ArqueoCaja',11,'AdministrarCaja/ArqueoCaja/arqueo_caja.php','	far fa-circle',15,'2023-01-15 09:54:10',NULL),(13,'Caja',11,'AdministrarCaja/Caja/caja.php','	far fa-circle',14,'2023-01-15 09:54:43',NULL),(14,'Rol',0,'Administracion/Rol/rol.php','fas fa-cash-register',17,'2023-01-15 11:33:00',NULL),(15,'Usuarios',0,'Administracion/Usuario/usuario.php','fas fa-users',18,'2023-01-15 14:07:39',NULL),(16,'VentasCreditos',0,'','fas fa-credit-card',29,'2023-01-16 12:44:30',NULL),(17,'AdministrarCreditos',16,'VentasCreditos/AdministrarCreditos/administrar_creditos.php','far fa-circle',31,'2023-01-16 12:46:05',NULL),(18,'Compras',0,'','fas fa-dolly',19,'2023-01-16 17:45:49',NULL),(19,'Ventas',0,'','fas fa-cart-plus',25,'2023-01-16 17:46:04',NULL),(20,'Realizar Compras',18,'Compras/RealizarCompras/compras.php','far fa-circle',21,'2023-01-16 17:47:23',NULL),(21,'Ventas',19,'Ventas/RealizarVentas/realizar_ventas.php','far fa-circle',28,'2023-01-16 17:49:11',NULL),(22,'HistorialAbonos',16,'VentasCreditos/HistorialAbonos/historial_abonos.php','far fa-circle',32,'2023-01-17 10:16:03',NULL),(23,'Empresa',0,'Administracion/Configuracion/empresa.php','fas fa-store-alt',33,'2023-01-18 11:18:48',NULL),(24,'Movimiento',11,'AdministrarCaja/MovimientoCaja/movimiento_cajas.php','far fa-circle',16,'2023-01-20 11:16:21',NULL),(25,'Administra Ventas',19,'Ventas/Administrar_ventas/administrar_ventas.php','far fa-circle',27,'2023-01-25 16:14:23',NULL),(26,'Compras al Credito',0,'','fas fa-credit-card',22,'2023-03-11 12:03:44',NULL),(27,'Administrar Creditos',26,'ComprasCredito/AdministrarCreditos/administrar_credito.php','far fa-circle',24,'2023-03-11 12:07:07',NULL),(28,'Administrar Creditos',16,'VentasCreditos/AdministrarCreditos/administrar_credito.php','far fa-circle',30,'2023-03-11 12:24:39',NULL),(29,'Historial Credito',26,'ComprasCredito/HistorialAbonos/historial_abono.php','far fa-circle',23,'2023-03-19 12:34:53',NULL),(30,'Administra Compras',18,'Compras/Administrar_compras/historial_de_compras.php','far fa-circle',20,'2023-03-23 17:36:57',NULL),(31,'kardex',0,'kardex/kardex_promedial_ponderado/kardex.php','fas fa-snowflake',34,'2023-03-29 11:15:26',NULL),(32,'Administrar Factura',19,'Ventas/Administrar_ventas/administrar_factura.php','far fa-circle',26,'2023-04-21 17:13:56',NULL),(33,'Reportes',0,'','fas fa-file',35,'2023-10-21 20:10:31',NULL),(34,'Producto Poco Stock',33,'Reportes/poco_stock.php','far fa-circle',38,'2023-10-21 20:12:44',NULL),(35,'Ganacias',33,'Reportes/ganacias.php','far fa-circle',39,'2023-10-21 20:13:31',NULL),(36,'Producto mas Vendidos',33,'Reportes/reporte_producto_mas_vendidos.php','far fa-circle',37,'2023-10-21 22:31:23',NULL),(37,'Ventas Hoy',33,'Reportes/ventas_hoy.php','far fa-circle',36,'2023-10-23 17:49:39',NULL),(38,'lote',4,'Gestion/Perecederos/lote_producto.php','far fa-circle',4,'2025-05-13 20:04:32',NULL),(39,'Marca',4,'Gestion/Marcas/marcas.php','far fa-circle',3,'2025-06-08 23:31:15',NULL),(40,'FacturacionElectronica',0,'FacturacionElectronica/facturacionElectronica.php','fas fa-file-invoice-dollar',40,'2025-07-16 06:03:27',NULL),(41,'Carga Masiva',4,'Gestion/carga_masiva/carga_masiva_productos.php','far fa-circle',11,'2025-07-25 16:24:19',NULL);
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `movimiento_caja`
--

LOCK TABLES `movimiento_caja` WRITE;
/*!40000 ALTER TABLE `movimiento_caja` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimiento_caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `movimientos_compra_credito`
--

LOCK TABLES `movimientos_compra_credito` WRITE;
/*!40000 ALTER TABLE `movimientos_compra_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimientos_compra_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `movimientos_credito`
--

LOCK TABLES `movimientos_credito` WRITE;
/*!40000 ALTER TABLE `movimientos_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimientos_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `perfil_modulo`
--

LOCK TABLES `perfil_modulo` WRITE;
/*!40000 ALTER TABLE `perfil_modulo` DISABLE KEYS */;
INSERT INTO `perfil_modulo` VALUES (299,1,1,1,'1'),(300,1,2,0,'1'),(301,1,38,0,'1'),(302,1,4,0,'1'),(303,1,8,0,'1'),(304,1,7,0,'1'),(305,1,3,0,'1'),(306,1,6,0,'1'),(307,1,5,0,'1'),(308,1,15,0,'1'),(309,1,30,0,'1'),(310,1,18,0,'1'),(311,1,20,0,'1'),(312,1,29,0,'1'),(313,1,26,0,'1'),(314,1,27,0,'1'),(315,1,25,0,'1'),(316,1,19,0,'1'),(317,1,21,0,'1'),(318,1,28,0,'1'),(319,1,16,0,'1'),(320,1,22,0,'1'),(321,1,23,0,'1'),(322,1,31,0,'1'),(323,1,37,0,'1'),(324,1,33,0,'1'),(325,1,36,0,'1'),(326,1,34,0,'1'),(327,1,35,0,'1'),(328,1,39,0,'1'),(368,2,1,1,'1'),(369,2,2,0,'1'),(370,2,39,0,'1'),(371,2,4,0,'1'),(372,2,38,0,'1'),(373,2,8,0,'1'),(374,2,7,0,'1'),(375,2,3,0,'1'),(376,2,9,0,'1'),(377,2,6,0,'1'),(378,2,5,0,'1'),(379,2,13,0,'1'),(380,2,11,0,'1'),(381,2,12,0,'1'),(382,2,24,0,'1'),(383,2,14,0,'1'),(384,2,15,0,'1'),(385,2,30,0,'1'),(386,2,18,0,'1'),(387,2,20,0,'1'),(388,2,29,0,'1'),(389,2,26,0,'1'),(390,2,27,0,'1'),(391,2,32,0,'1'),(392,2,19,0,'1'),(393,2,25,0,'1'),(394,2,21,0,'1'),(395,2,28,0,'1'),(396,2,16,0,'1'),(397,2,17,0,'1'),(398,2,22,0,'1'),(399,2,23,0,'1'),(400,2,31,0,'1'),(401,2,37,0,'1'),(402,2,33,0,'1'),(403,2,36,0,'1'),(404,2,34,0,'1'),(405,2,35,0,'1'),(406,2,40,0,'1'),(407,2,41,0,'1');
/*!40000 ALTER TABLE `perfil_modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` VALUES (1,'administrador','2025-04-28 16:45:27',NULL,NULL,'1'),(2,'Programador','2025-04-28 16:45:27',NULL,NULL,'1'),(3,'Vendedor','2025-04-28 16:45:27',NULL,NULL,'1');
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `porcentaje_iva`
--

LOCK TABLES `porcentaje_iva` WRITE;
/*!40000 ALTER TABLE `porcentaje_iva` DISABLE KEYS */;
INSERT INTO `porcentaje_iva` VALUES (0,0.00),(2,12.00),(3,14.00),(4,15.00),(5,5.00);
/*!40000 ALTER TABLE `porcentaje_iva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'4278050957808',1,1,1,'Producto 1','Views/assets/imagenes/productos/img_por_defecto.png',0.95,8.18,8.50,8.20,NULL,NULL,NULL,'1',NULL,32,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 19:17:36',NULL,NULL,NULL,NULL,NULL,'1'),(2,'8132609575384',1,1,1,'Producto 2','Views/assets/imagenes/productos/img_por_defecto.png',3.15,9.85,10.00,10.56,NULL,NULL,NULL,'1',NULL,52,NULL,NULL,12,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 19:19:49',NULL,NULL,NULL,NULL,NULL,'1'),(3,'4495711283430',1,1,1,'Producto 3','Views/assets/imagenes/productos/img_por_defecto.png',2.45,6.86,6.90,6.95,NULL,NULL,NULL,'0',NULL,41,NULL,NULL,2,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 19:21:31',NULL,NULL,NULL,NULL,NULL,'1'),(4,'5403521749369',1,1,1,'Producto 4','Views/assets/imagenes/productos/img_por_defecto.png',0.92,9.71,9.76,9.79,NULL,NULL,NULL,'0',NULL,59,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 19:24:10',NULL,NULL,NULL,NULL,NULL,'1'),(5,'1107061968005',1,1,1,'Producto 5','Views/assets/imagenes/productos/img_por_defecto.png',0.65,7.75,7.79,7.78,NULL,NULL,NULL,'1',NULL,27,NULL,NULL,5,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 19:26:20',NULL,NULL,NULL,NULL,NULL,'1'),(6,'2926458086231',1,1,1,'Producto 6','Views/assets/imagenes/productos/img_por_defecto.png',1.39,7.81,7.89,7.88,NULL,NULL,NULL,'1',NULL,16,NULL,NULL,3,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 19:28:37',NULL,NULL,NULL,NULL,NULL,'1'),(7,'3692938128315',1,1,1,'Producto 7','Views/assets/imagenes/productos/img_por_defecto.png',1.81,6.48,6.79,6.90,NULL,NULL,NULL,'1',NULL,39,NULL,NULL,1,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 19:30:12',NULL,NULL,NULL,NULL,NULL,'1'),(8,'6197173662117',1,1,1,'Producto 8','Views/assets/imagenes/productos/img_por_defecto.png',4.43,5.43,5.70,5.50,NULL,NULL,NULL,'1',NULL,89,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 19:32:03',NULL,NULL,NULL,NULL,NULL,'1'),(9,'3936665846387',1,1,1,'Producto 9','Views/assets/imagenes/productos/img_por_defecto.png',3.56,8.74,8.89,8.87,NULL,NULL,NULL,'1',NULL,81,NULL,NULL,6,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 19:34:25',NULL,NULL,NULL,NULL,NULL,'1'),(10,'5266353701024',1,1,1,'Producto 10','Views/assets/imagenes/productos/img_por_defecto.png',1.11,7.64,7.80,7.86,NULL,NULL,NULL,'1',NULL,55,NULL,NULL,10,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 19:35:46',NULL,NULL,NULL,NULL,NULL,'1'),(11,'9548887638468',1,1,1,'Producto 11','Views/assets/imagenes/productos/img_por_defecto.png',4.47,9.76,9.78,9.98,NULL,NULL,NULL,'1',NULL,39,NULL,NULL,4,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 20:09:01',NULL,NULL,NULL,NULL,NULL,'1'),(12,'2837419397712',1,1,1,'Producto 12','Views/assets/imagenes/productos/img_por_defecto.png',2.50,5.36,5.46,5.57,NULL,NULL,NULL,'1',NULL,14,NULL,NULL,5,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:10:11',NULL,NULL,NULL,NULL,NULL,'1'),(13,'6054983401054',1,1,1,'Producto 13','Views/assets/imagenes/productos/img_por_defecto.png',2.48,7.60,7.90,7.98,NULL,NULL,NULL,'1',NULL,38,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 20:11:48',NULL,NULL,NULL,NULL,NULL,'1'),(14,'7537128809938',1,1,1,'Producto 14','Views/assets/imagenes/productos/img_por_defecto.png',2.23,6.72,6.84,6.98,NULL,NULL,NULL,'1',NULL,52,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 20:13:20',NULL,NULL,NULL,NULL,NULL,'1'),(15,'8955199210909',1,1,1,'Producto 15','Views/assets/imagenes/productos/img_por_defecto.png',4.85,5.47,5.56,5.78,NULL,NULL,NULL,'0',NULL,35,NULL,NULL,7,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 20:14:31',NULL,NULL,NULL,NULL,NULL,'1'),(16,'1818084761325',1,1,1,'Producto 16','Views/assets/imagenes/productos/img_por_defecto.png',0.53,9.73,9.80,9.73,NULL,NULL,NULL,'1',NULL,87,NULL,NULL,30,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:16:00',NULL,NULL,NULL,NULL,NULL,'1'),(17,'5259543058627',1,1,1,'Producto 17','Views/assets/imagenes/productos/img_por_defecto.png',1.50,7.51,7.89,7.97,NULL,NULL,NULL,'1',NULL,97,NULL,NULL,20,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:17:15',NULL,NULL,NULL,NULL,NULL,'1'),(18,'2699075385654',1,1,1,'Producto 18','Views/assets/imagenes/productos/img_por_defecto.png',4.04,8.34,8.56,8.89,NULL,NULL,NULL,'1',NULL,91,NULL,NULL,43,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 20:18:34',NULL,NULL,NULL,NULL,NULL,'1'),(19,'4633160396667',1,1,1,'Producto 19','Views/assets/imagenes/productos/img_por_defecto.png',4.26,6.15,6.65,6.60,NULL,NULL,NULL,'0',NULL,81,NULL,NULL,20,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:19:43',NULL,NULL,NULL,NULL,NULL,'1'),(20,'1217317286143',1,1,1,'Producto 20','Views/assets/imagenes/productos/img_por_defecto.png',4.93,9.78,9.86,9.98,NULL,NULL,NULL,'1',NULL,13,NULL,NULL,4,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:21:24',NULL,NULL,NULL,NULL,NULL,'1'),(21,'8795369589559',1,1,1,'Producto 21','Views/assets/imagenes/productos/img_por_defecto.png',1.87,7.22,7.45,7.78,NULL,NULL,NULL,'1',NULL,40,NULL,NULL,2,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:22:44',NULL,NULL,NULL,NULL,NULL,'1'),(22,'2417534007719',1,1,1,'Producto 22','Views/assets/imagenes/productos/img_por_defecto.png',1.29,8.38,8.78,8.67,NULL,NULL,NULL,'1',NULL,33,NULL,NULL,5,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:25:20',NULL,NULL,NULL,NULL,NULL,'1'),(23,'1689126384227',1,1,1,'Producto 23','Views/assets/imagenes/productos/img_por_defecto.png',1.74,8.49,8.45,8.20,NULL,NULL,NULL,'1',NULL,59,NULL,NULL,3,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:28:02',NULL,NULL,NULL,NULL,NULL,'1'),(24,'2925873873758',1,1,1,'Producto 24','Views/assets/imagenes/productos/img_por_defecto.png',1.00,9.00,9.10,9.13,NULL,NULL,NULL,'1',NULL,66,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 20:30:26',NULL,NULL,NULL,NULL,NULL,'1'),(25,'6308856421409',1,1,1,'Producto 25','Views/assets/imagenes/productos/img_por_defecto.png',1.10,8.32,8.10,8.02,NULL,NULL,NULL,'1',NULL,45,NULL,NULL,10,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:32:24',NULL,NULL,NULL,NULL,NULL,'1'),(26,'6118736826055',1,1,1,'Producto 26','Views/assets/imagenes/productos/img_por_defecto.png',1.18,7.31,7.56,7.60,NULL,NULL,NULL,'1',NULL,18,NULL,NULL,5,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 20:35:25',NULL,NULL,NULL,NULL,NULL,'1'),(27,'1308706855412',1,1,1,'Producto 27','Views/assets/imagenes/productos/img_por_defecto.png',2.38,6.00,6.70,6.20,NULL,NULL,NULL,'1',NULL,23,NULL,NULL,10,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 21:17:07',NULL,NULL,NULL,NULL,NULL,'1'),(28,'6068526185068',1,1,1,'Producto 28','Views/assets/imagenes/productos/img_por_defecto.png',4.91,5.86,5.98,5.90,NULL,NULL,NULL,'1',NULL,21,NULL,NULL,4,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 21:18:30',NULL,NULL,NULL,NULL,NULL,'1'),(29,'8449598633935',1,1,1,'Producto 29','Views/assets/imagenes/productos/img_por_defecto.png',0.81,9.20,9.60,9.67,NULL,NULL,NULL,'1',NULL,82,NULL,NULL,10,'1','0',NULL,NULL,NULL,NULL,1,'2025-07-29 21:19:46',NULL,NULL,NULL,NULL,NULL,'1'),(30,'9304457235099',1,1,1,'Producto 30','Views/assets/imagenes/productos/img_por_defecto.png',2.83,8.49,8.50,8.68,NULL,NULL,NULL,'1',NULL,94,NULL,NULL,20,'1','1',NULL,NULL,NULL,NULL,1,'2025-07-29 21:21:11',NULL,NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'0999999999001','Proveedor Uno','agripa','Calle Falsa 123','0980090688','proveedoruno@gmail.com',1,'2025-07-29 21:47:30',NULL,NULL,NULL,NULL,'1'),(2,'1098765432100','Distribuidor Central','central','Av. Mayorista 45','0980079066645','destibuidiro@gmail.com',1,'2025-07-29 21:48:59',NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sri_logs`
--

LOCK TABLES `sri_logs` WRITE;
/*!40000 ALTER TABLE `sri_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `sri_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tipo_comprobante`
--

LOCK TABLES `tipo_comprobante` WRITE;
/*!40000 ALTER TABLE `tipo_comprobante` DISABLE KEYS */;
INSERT INTO `tipo_comprobante` VALUES ('01','FACTURA'),('03','TICKET'),('04','NOTA_CREDITO'),('05','NOTA_DEBITO'),('06','GUIA_REMISION'),('07','RETENCION');
/*!40000 ALTER TABLE `tipo_comprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tipo_emision`
--

LOCK TABLES `tipo_emision` WRITE;
/*!40000 ALTER TABLE `tipo_emision` DISABLE KEYS */;
INSERT INTO `tipo_emision` VALUES (2,'CONTINGENCIA'),(1,'NORMAL');
/*!40000 ALTER TABLE `tipo_emision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tipo_identificacion`
--

LOCK TABLES `tipo_identificacion` WRITE;
/*!40000 ALTER TABLE `tipo_identificacion` DISABLE KEYS */;
INSERT INTO `tipo_identificacion` VALUES ('04','RUC'),('05','CÉDULA'),('06','PASAPORTE'),('07','VENTA A CONSUMIDOR FINAL'),('08','IDENTIFICACIÓN DEL EXTERIOR');
/*!40000 ALTER TABLE `tipo_identificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `turnos`
--

LOCK TABLES `turnos` WRITE;
/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `turnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario_turno`
--

LOCK TABLES `usuario_turno` WRITE;
/*!40000 ALTER TABLE `usuario_turno` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_turno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'080214555','Edison','Garofalo','Jeily','123456',2,1,NULL,NULL,NULL,NULL,'2025-04-28 17:04:42','2025-04-28 18:48:24',NULL,'1',NULL,NULL),(2,'087666622','Susanw777','777','Susan7','3c2a6eb64cc629de76c419308830c53bbe63b874f6a526f7cd784182b33a2f5f3daaab47b5bde5868b82e4dd3b521d147a7542292b689acdf60122b97e99523f',3,1,'garofalo@gmail.com','sssddssddssdddsdsds','55555557777',NULL,'2025-04-30 07:25:09','2025-06-13 00:11:02',NULL,'1',NULL,NULL),(3,'0804610814','0','Garofalo','Edison','123',3,1,'edisongarofalo88@gmail.com','sssddssdd','202 555 0111','','2025-06-12 22:11:32','2025-06-13 23:10:45',NULL,'1','Views/assets/imagenes/imgUsuario/logo_684cf64563f39.PNG','Esmeralda'),(4,'0804610814','Susan','Gomez','Edison','123',2,1,'edisongarofalo88@gmail.com','barrio entre rios','202 555 0111','Via la T','2025-06-12 22:15:18','2025-06-13 00:19:06',NULL,'2','Views/assets/imagenes/imgUsuario/logo_684b97c69e16c.PNG','Esmeraldas'),(5,'0080009089891','Susan 1','Gomez 1','Pamela1','12345',3,1,'garofaloedison20241@gmail.com','salinas1','202 555 01115','','2025-07-26 18:30:23','2025-07-26 18:34:17',NULL,'1','','Esmeralas 1');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ventas_credito`
--

LOCK TABLES `ventas_credito` WRITE;
/*!40000 ALTER TABLE `ventas_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas_credito` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-29 21:56:05
