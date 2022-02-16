-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 192.168.10.10    Database: shop
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Điện thoại di động','Các loại điện thoại di động','category-1.jpg','2021-05-18 08:00:36','2021-05-23 10:00:23'),(2,'Laptop','Laptop văn phòng và laptop gaming','category-2_1.jpg','2021-05-18 08:00:36','2021-05-23 10:00:23'),(3,'Máy ảnh',NULL,'category-3.jpg','2021-05-18 08:00:36','2021-05-23 10:00:23'),(4,'Tai nghe','Có dây và không dây','category-4.jpg','2021-05-18 08:00:36','2021-05-23 10:00:23'),(5,'Phụ kiện','Các loại tai nghe, sạc, dây cáp ...','category-5.png','2021-05-18 08:00:36','2021-05-23 10:00:23');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `body` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (19,'thang111220@gmail.com','Thắng Nguyễn Doãn','Chỉnh sửa giao diện','2021-08-09 04:05:20');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (25,'thang111220','$2y$10$a6NF.lX3gNtXozH.g/U8sOH1Dvrx.tw.9ozBkxOuEffF2Pof8eV/G','Nguyễn Doãn Thắng','thang111220@gmail.com',1,'0355234584','Công viên phần mềm Quang, QTSC Building 1, Trung, P Q.12',NULL,'2021-08-08 13:03:08','2021-08-09 02:56:27'),(26,'tham1','$2y$10$lVYv.0qa6t/6f6PyJ6wGue7Ges.L67OL9p8oD8kpiQh7GRY01xlHa','Hoàng Trần Thám','tham@gmail.com',1,'0355234333','Quận 1',NULL,'2021-08-08 13:43:14','2021-08-08 13:43:14'),(27,'admin','$2y$10$zIdshb.7ZPzBLthDw1QPS.B8FyS4sb..a/6oAawsxocmLCc7jOYsm','Thắng Nguyễn Doãn','nhom2@gmail.com',1,'0355234584','Công viên phần mềm Quang, QTSC Building 1, Trung, P Q.12',NULL,'2021-08-09 02:26:57','2021-08-09 03:41:48'),(28,'duy123','$2y$10$BmFm.znh8idqZiqKVktfa.0mYJZwc3RNioRvY/N/2mAYDdhhBXDbi','Nguyễn Trường Duy','duy@gmail.com',1,'0355234555','Công viên phần mềm Quang, QTSC Building 1, Trung, P Q.12',NULL,'2021-08-09 02:52:17','2021-08-09 02:52:17');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exports`
--

DROP TABLE IF EXISTS `exports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exports` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `product_id` bigint NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `exports_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exports`
--

LOCK TABLES `exports` WRITE;
/*!40000 ALTER TABLE `exports` DISABLE KEYS */;
INSERT INTO `exports` VALUES (11,182,9999,'2021-08-08 06:44:03','2021-08-08 06:57:37'),(12,183,5000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(13,184,7890,'2021-08-08 06:44:03','2021-08-08 06:58:16'),(14,185,7000,'2021-08-08 06:55:07','2021-08-08 05:49:12'),(15,186,1000,'2021-08-08 06:55:07','2021-08-08 05:49:12'),(16,187,2000,'2021-08-08 06:55:07','2021-08-08 05:49:12'),(17,188,3000,'2021-08-08 06:55:07','2021-08-08 05:49:12'),(18,189,4000,'2021-08-08 06:55:07','2021-08-08 05:49:12'),(19,190,5555,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(20,191,8888,'2021-08-08 06:44:03','2021-08-08 06:58:01'),(21,192,4321,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(22,193,3578,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(23,194,2123,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(24,195,4789,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(25,196,999,'2021-08-08 06:44:03','2021-08-08 06:57:26'),(26,197,8888,'2021-08-08 06:44:03','2021-08-08 08:21:30'),(27,198,975,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(28,199,2345,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(29,200,6543,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(30,201,3435,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(31,202,7689,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(32,203,8765,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(33,204,4567,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(34,205,4562,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(35,206,3423,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(36,207,234,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(37,208,231,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(38,209,666,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(39,210,7643,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(40,211,3442,'2021-08-08 06:44:03','2021-08-08 05:49:12');
/*!40000 ALTER TABLE `exports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imports`
--

DROP TABLE IF EXISTS `imports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imports` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `product_id` bigint NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `imports_ibfk_1` (`product_id`),
  CONSTRAINT `imports_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imports`
--

LOCK TABLES `imports` WRITE;
/*!40000 ALTER TABLE `imports` DISABLE KEYS */;
INSERT INTO `imports` VALUES (11,182,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(12,183,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(13,184,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(14,185,10000,'2021-08-08 06:55:07','2021-08-08 05:49:12'),(15,186,10000,'2021-08-08 06:55:07','2021-08-08 05:49:12'),(16,187,10000,'2021-08-08 06:55:07','2021-08-08 05:49:12'),(17,188,10000,'2021-08-08 06:55:07','2021-08-08 05:49:12'),(18,189,10000,'2021-08-08 06:55:07','2021-08-08 05:49:12'),(19,190,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(20,191,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(21,192,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(22,193,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(23,194,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(24,195,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(25,196,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(26,197,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(27,198,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(28,199,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(29,200,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(30,201,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(31,202,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(32,203,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(33,204,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(34,205,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(35,206,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(36,207,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(37,208,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(38,209,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(39,210,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12'),(40,211,10000,'2021-08-08 06:44:03','2021-08-08 05:49:12');
/*!40000 ALTER TABLE `imports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `order_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `quantity` int NOT NULL,
  `unit_price` decimal(19,0) NOT NULL,
  `date_allocated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (49,32,198,1,3590000,NULL),(50,32,188,2,18900000,NULL),(51,32,187,1,18000000,NULL),(52,32,186,1,26000000,NULL),(53,33,198,1,3590000,NULL),(54,33,186,1,26000000,NULL),(55,34,186,1,18200000,NULL),(56,34,188,1,17010000,NULL),(59,36,187,1,18000000,NULL),(60,36,199,1,3590000,NULL),(61,37,185,1,40000000,NULL),(62,38,187,2,18000000,NULL);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `customer_id` bigint NOT NULL,
  `ship_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type_id` bigint NOT NULL,
  `paid_date` datetime DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `payment_type_id` (`payment_type_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (32,25,'Đăk Lăk',2,NULL,4,'Giao luc·','2021-08-08 15:56:05','2021-08-08 16:02:00'),(33,25,'Công viên phần mềm Quang, QTSC Building 1, Trung, P Q.12',2,'2021-08-08 00:00:00',3,'','2021-08-08 15:56:47','2021-08-08 16:01:55'),(34,25,'Công viên phần mềm Quang, QTSC Building 1, Trung, P Q.12',1,NULL,2,'','2021-08-08 16:01:19','2021-08-08 16:01:57'),(36,25,'Công viên phần mềm Quang, QTSC Building 1, Trung, P Q.12',1,'2021-08-09 00:00:00',3,'','2021-08-08 16:03:41','2021-08-09 02:57:24'),(37,25,'Công viên phần mềm Quang, QTSC Building 1, Trung, P Q.12',1,NULL,1,'','2021-08-09 02:43:29','2021-08-09 02:43:29'),(38,28,'Công viên phần mềm Quang, QTSC Building 1, Trung, P Q.12',2,NULL,1,'','2021-08-09 02:53:19','2021-08-09 02:53:19');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_types`
--

DROP TABLE IF EXISTS `payment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_types` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `payment_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_types`
--

LOCK TABLES `payment_types` WRITE;
/*!40000 ALTER TABLE `payment_types` DISABLE KEYS */;
INSERT INTO `payment_types` VALUES (1,'credit card',NULL,NULL,NULL,NULL),(2,'cash',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `payment_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_discounts`
--

DROP TABLE IF EXISTS `product_discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_discounts` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `product_id` bigint NOT NULL,
  `discount_name` varchar(255) NOT NULL,
  `discount_amount` double NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_discounts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_discounts`
--

LOCK TABLES `product_discounts` WRITE;
/*!40000 ALTER TABLE `product_discounts` DISABLE KEYS */;
INSERT INTO `product_discounts` VALUES (9,186,'flash_deal',30,'2021-08-03 00:00:00','2021-08-30 00:00:00'),(10,183,'flash_deal',20,'2021-08-03 00:00:00','2021-08-30 00:00:00'),(11,188,'discount',10,'2021-08-03 00:00:00','2021-08-30 00:00:00'),(12,190,'discount',15,'2021-08-03 00:00:00','2021-08-30 00:00:00'),(13,204,'discount',5,'2021-08-03 00:00:00','2021-08-30 00:00:00'),(14,209,'discount',40,'2021-08-03 00:00:00','2021-08-30 00:00:00'),(15,210,'discount',35,'2021-08-03 00:00:00','2021-08-30 00:00:00'),(16,182,'discount',50,'2021-08-03 00:00:00','2021-08-10 00:00:00');
/*!40000 ALTER TABLE `product_discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `product_id` bigint NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (195,182,'samsung-galaxy-s20-fan-edition-xanh-duong-1-org.jpg'),(196,182,'samsung-galaxy-s20-fan-edition-xanh-la-1-org.jpg'),(197,183,'vivo-y12s-4gb-128gb-den-1-org.jpg'),(198,183,'vivo-y12s-4gb-128gb-xanh-1-org.jpg'),(199,184,'samsung-galaxy-z-fold-2-den-1-org.jpg'),(200,185,'iphone-12-pro-max-1-org.jpg'),(201,185,'iphone-12-pro-max-bac-1-org.jpg'),(202,185,'iphone-12-pro-max-xanh-duong-1-org.jpg'),(203,186,'oppo-find-x3-pro-den-1-org (1).jpg'),(204,186,'oppo-find-x3-pro-den-1-org.jpg'),(205,187,'samsung-galaxy-s21-plus-bac-1-org.jpg'),(206,187,'samsung-galaxy-s21-plus-den-1-org.jpg'),(207,188,'lenovo-ideapad-slim-5-15itl05-i5-82fg001pvn-1-org.jpg'),(208,189,'lenovo-ideapad-3-15itl6-i5-82h80042vn-1-org.jpg'),(209,190,'acer-aspire-7-a715-41g-r150-r7-nhq8ssv004-1-org.jpg'),(210,191,'hp-pavilion-15-eg0505tu-i5-46m02pa-1-1-org.jpg'),(211,192,'dell-g3-15-i7-p89f002bwh-1-org.jpg'),(212,193,'asus-uf-gaming-fx506lh-i5-hn002t-1-org.jpg'),(213,194,'7e0d04be45f07ebc76ce26202289372f.jpg'),(214,194,'40344b41ed4c5818980ef42dd830ea64.jpg'),(215,194,'841563664f04c6c558df6a611ec0a070.jpg'),(217,195,'2.u2751.d20170517.t161921.875626.jpg'),(218,195,'3.u2751.d20170517.t161921.907756.jpg'),(219,196,'6afaeb8f4a16069134778b0916d8603f.jpg'),(220,197,'590decb3fa3d2fd863525f4d5957dea8.jpg'),(221,197,'66981efb487d6bf5fe179410b8fa318b.jpg'),(222,198,'80d71bd46ebaee7c1ec192d74fa48aba.jpg'),(223,198,'439cba6305da21036d8f0a673644e8bd.jpg'),(224,199,'6b2fc550d3c6c778f85e1e35d581fb23.jpg'),(225,199,'26aa986528474e8ab664c4aebbaadd2d.jpg'),(226,200,'bluetooth-tws-oppo-enco-buds-eti81-1-org.jpg'),(227,201,'tai-nghe-chup-tai-gaming-mozardx-ds904-71-den-2-org.jpg'),(228,202,'tai-nghe-gaming-rapoo-vh500-71-den-2-2-org.jpg'),(229,203,'bluetooth-true-wireless-beats-studio-buds-mj503-do-1-org.jpg'),(230,204,'chup-tai-mozard-ip-360-hong-2-org.jpg'),(231,204,'chup-tai-mozard-ip-360-xanh-ngoc-2-org.jpg'),(232,205,'ep-rapoo-ep28-den-2-2-org.jpg'),(233,206,'93cfeaf5844f57040f827e3512873a5d.jpg'),(234,207,'bluetooth-jbl-flip-5-xanh-duong-1-org.jpg'),(235,208,'cap-lightning-1m-ava-ltpl-01x-xanh-205620-015605.jpg'),(236,208,'cap-lightning-1m-ava-ltpl-01x-xanh-205620-015615.jpg'),(237,209,'chuot-co-day-genius-dx-125-den-1-13.jpg'),(238,209,'chuot-co-day-genius-dx-125-den--2.jpg'),(239,210,'pin-sac-du-phong-7500mah-ava-ds630-den-1-org.jpg'),(240,210,'pin-sac-du-phong-7500mah-ava-ds630-xanh-navy-1-org.jpg'),(241,211,'cap-lightning-mfi-12m-aukey-cb-bal6-den-1-fixx2.jpg'),(242,211,'cap-lightning-mfi-12m-aukey-cb-bal6-den3.jpg');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_reviews` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `product_id` bigint NOT NULL,
  `customer_id` bigint NOT NULL,
  `rating` double NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_reviews`
--

LOCK TABLES `product_reviews` WRITE;
/*!40000 ALTER TABLE `product_reviews` DISABLE KEYS */;
INSERT INTO `product_reviews` VALUES (18,199,26,4,'Thiết kế đẹp',1,'2021-08-08 13:49:54','2021-08-08 13:49:54'),(20,199,26,4,'Thiết kế lạ mắt',1,'2021-08-08 13:53:57','2021-08-08 13:53:57'),(22,187,26,2,'Giá sản phẩm hơi đắt',1,'2021-08-08 13:55:04','2021-08-08 13:55:04'),(24,187,26,3,'Xài tạm ổn',1,'2021-08-08 13:57:11','2021-08-08 13:57:11'),(31,182,26,5,'Điện thoại đẹp giá rẻ',1,'2021-08-08 14:53:48','2021-08-08 14:53:48'),(32,185,25,5,'Điện thoại xịn',1,'2021-08-09 02:43:15','2021-08-09 02:43:15'),(33,184,25,1,'Thiết kế xấu, quá đắt',1,'2021-08-09 02:47:32','2021-08-09 02:47:32'),(34,187,28,5,'Màu đẹp',1,'2021-08-09 02:52:59','2021-08-09 02:52:59'),(35,186,25,4,'Giảm giá nhiều, chơi game mượt',1,'2021-08-09 02:55:02','2021-08-09 02:55:02'),(36,207,25,3,'Âm thanh không tốt',1,'2021-08-09 02:55:51','2021-08-09 02:55:51');
/*!40000 ALTER TABLE `product_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `product_code` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `standard_cost` decimal(19,0) NOT NULL,
  `list_price` decimal(19,0) NOT NULL,
  `status` tinyint DEFAULT '1',
  `is_new` tinyint DEFAULT '0',
  `category_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (182,'PSSS20FE','Điện thoại Samsung Galaxy S20 FE ','samsung-galaxy-s20-fan-edition-090320-040338-600x600_1.jpg','Samsung đã giới thiệu đến người dùng thành viên mới của dòng điện thoại thông minh S20 Series đó chính là Samsung Galaxy S20 FE. Đây là mẫu flagship cao cấp quy tụ nhiều tính năng mà Samfan yêu thích, hứa hẹn sẽ mang lại trải nghiệm cao cấp của dòng Galaxy S với mức giá dễ tiếp cận hơn.',10000000,14999999,1,1,1,'2021-08-07 14:12:41','2021-08-09 03:02:11'),(183,'PVVY12S','Điện thoại Vivo Y12s (4GB/128GB)','vivo-y12s-den-new-600x600-600x600.jpg','Vivo Y12s chiếc điện thoại với nhiều ưu điểm về ngoại hình bắt mắt, cấu hình đủ dùng, viên pin khủng đi kèm mức giá tương đối dễ tiếp cận hứa hẹn sẽ mang tới trải nghiệm giải trí tuyệt vời trên thiết bị di động.',3000000,45000000,1,1,1,'2021-08-07 14:17:19','2021-08-07 14:17:19'),(184,'PSSZF2','Điện thoại Samsung Galaxy Z Fold2 5G','samsung-galaxy-z-fold-2-den-600x600.jpg','Galaxy Z Fold 2 là tên gọi chính thức của điện thoại màn hình gập cao cấp của Samsung. Với nhiều nâng cấp tiên phong về thiết kế, hiệu năng và camera, hứa hẹn đây sẽ là một siêu phẩm thành công tiếp theo đến từ “ông trùm” sản xuất điện thoại lớn nhất thế giới. ',40000000,50000000,1,1,1,'2021-08-07 14:18:47','2021-08-07 14:18:47'),(185,'PIP12PM','Điện thoại iPhone 12 Pro Max 128GB','iphone-12-pro-max-xanh-duong-new-600x600-600x600.jpg','iPhone 12 Pro Max 128 GB một siêu phẩm smartphone đến từ Apple. Máy có một hiệu năng hoàn toàn mạnh mẽ đáp ứng tốt nhiều nhu cầu đến từ người dùng và mang trong mình một thiết kế đầy vuông vức, sang trọng.',30000000,40000000,1,1,1,'2021-08-07 14:21:00','2021-08-07 14:21:00'),(186,'POPX3P','Điện thoại OPPO Find X3 Pro 5G','oppo-find-x3-pro-black-001-1-600x600.jpg','OPPO đã làm khuynh đảo thị trường smartphone khi cho ra đời chiếc điện thoại OPPO Find X3 Pro 5G. Đây là một sản phẩm có thiết kế độc đáo, sở hữu cụm camera khủng, cấu hình thuộc top đầu trong thế giới Android.',20000000,26000000,1,1,1,'2021-08-07 14:22:30','2021-08-07 14:22:30'),(187,'PSSS21','Điện thoại Samsung Galaxy S21+ 5G 256GB','samsung-galaxy-s21-plus-256gb-bac-600x600-600x600.jpg','Đắm chìm trong vẻ đẹp tuyệt tác đến từ Samsung Galaxy S21+ 5G 256 GB, làm chủ cuộc chơi với hiệu năng hàng đầu, cụm camera chuyên nghiệp cùng tốc độ 5G bức phá mọi giới hạn, mẫu điện thoại cho bạn thỏa sức khám phá cuộc sống, thể hiện cá tính theo cách riêng của mình.',15555555,18000000,1,1,1,'2021-08-07 14:24:17','2021-08-07 14:24:17'),(188,'LLIS5','Laptop Lenovo IdeaPad Slim 5 15ITL05 i5','lenovo-ideapad-slim-5-15itl05-i5-82fg001pvn-144320-064322-600x600.jpg','Sở hữu thiết kế mỏng nhẹ và thanh lịch, Lenovo IdeaPad Slim 5 15ITL05 i5 1135G7 (82FG001PVN) không chỉ là một mẫu laptop thời trang, mà còn mang trên mình sức mạnh vô cùng mạnh mẽ đến từ bộ vi xử lý Intel Core i5 thế hệ thứ 11 giúp bạn hoàn thành xuất sắc mọi công việc.',17900000,18900000,1,1,2,'2021-08-07 15:03:56','2021-08-07 15:06:51'),(189,'LLI315IT','Laptop Lenovo IdeaPad 3 15ITL6 i5','lenovo-ideapad-3-15itl6-i5-82h80042vn-600x600.jpg','Laptop Lenovo IdeaPad 3 15ITL6 i5 (82H800042VN) với thiết kế mỏng nhẹ đẹp mắt cùng hiệu năng ổn định giúp bạn hoàn thành công việc một cách nhanh chóng, hiệu quả.',170000000,17900000,1,0,2,'2021-08-07 15:09:11','2021-08-07 15:09:41'),(190,'LAA7A715','Laptop Acer Aspire 7 Gaming A715','acer-aspire-7-a715-41g-r150-r7-nhq8ssv004-600x600.jpg','Acer Aspire 7 A715 41G R150 R7 (NH.Q8SSV.004) được thiết kế gọn gàng với cấu hình mạnh mẽ nhờ CPU AMD Ryzen 7 và card đồ hoạ NVIDIA GeForce GTX 1650Ti giúp tối ưu trải nghiệm chơi game, đáp ứng đa dạng nhu cầu sử dụng',20000000,22999000,1,0,2,'2021-08-07 15:11:50','2021-08-07 15:11:50'),(191,'LHPP15','Laptop HP Pavilion 15 eg0505TU','hp-pavilion-15-eg0505tu-i5-46m02pa-15-600x600.jpg','Hiệu năng làm việc và học tập mạnh mẽ đến từ HP Pavilion 15 eg0505TU i5 1135G7 (46M02PA) cùng kiểu dáng thanh lịch là bạn đồng hành lý tưởng, đáp ứng mọi nhu cầu hàng ngày của người dùng.',18000000,19000000,1,0,2,'2021-08-07 15:13:42','2021-08-07 15:13:42'),(192,'LDG315','Laptop Dell G3 15 i7 (P89F002BWH)','dell-g3-15-i7-p89f002bwh-16-600x600.jpg','Laptop Dell G3 15 i7 (P89F002BWH) thuộc dòng laptop gaming với cấu hình mạnh mẽ, thiết kế trang nhã và rất sang trọng, dễ lựa chọn cho cả người đi đọc, đi làm, là 1 phiên bản tốt để lựa chọn cho cả nhu cầu làm việc, học tập và chơi game giải trí.',29999999,32500000,1,0,2,'2021-08-07 15:15:18','2021-08-07 15:15:18'),(193,'LATUFFX506','Asus TUF Gaming FX506LH (HN002T)','asus-uf-gaming-fx506lh-i5-hn002t-15-600x600.jpg','Với sự mạnh mẽ, bền bỉ từ thiết kế vẻ ngoài lẫn bên trong cấu hình, Asus TUF Gaming FX506LH (HN002T) sẽ là một trợ thủ đắc lực của bạn trong trò chơi yêu thích và cả những tác vụ nặng khác.&#13;&#10;Đa nhiệm mượt mà với Chip Intel Core i5 thế hệ 10 tiêu chuẩn gaming&#13;&#10;Asus TUF Gaming được trang bị chip Intel Comet Lake 10300H cho hiệu năng ổn định, chiến game cực chất với 4 nhân 8 luồng cùng xung nhịp ép lên đến 4.5 GHz nhờ công nghệ Turbo Boost.',22999990,23450000,1,0,2,'2021-08-07 15:16:58','2021-08-07 15:16:58'),(194,'CFIM11','Máy Ảnh Lấy Liền Fujifilm Instax Mini 11','4ce70573e21973f17af79638df5ee18b.jpg','Thiết kế trẻ trung, năng động&#13;&#10;Máy Ảnh Lấy Liền Fujifilm Instax Mini 11 được thiết kế với vẻ ngoài mỏng hơn và nhẹ hơn so với Mini 9 phù hợp để bạn sử dụng khi tham gia các bữa tiệc, du lịch hay dã ngoại,… Bên cạnh đó, Mini 11 có thiết kế thân tròn, hoàn toàn vừa vặn trong tay để bạn có thể dễ dàng sử dụng. Ngoài ra, với vẻ ngoài thời trang, tươi mới cùng 5 tone màu khác nhau đem lại cho bạn nhiều sự lựa chọn hơn.',1700000,1790000,1,0,3,'2021-08-07 15:22:52','2021-08-07 15:22:52'),(195,'CCPG7X','Máy Ảnh Canon Powershot G7X Mark II','1.u2751.d20170517.t161921.837229.jpg','Cảm biến CMOS Sensor 20MP Màn hình LCD cảm ứng Kết nối Wi-Fi, NFC, Bluetooth Chống rung Dynamic IS, Time-Lapse Khẩu độ f/1.8 - f/2.8&#13;&#10;Thiết kế nhỏ gọn&#13;&#10;Máy Ảnh Canon Powershot G7X Mark II là dòng máy ảnh du lịch với thiết kế vô cùng nhỏ gọn, có thể nằm gọn trong lòng bàn tay, cho phép bạn bỏ vào túi trong những lúc di chuyển. Chiếc máy ảnh là sự kết hợp giữa những đường nét sắc cạnh, bổ sung thêm báng cầm giúp người sử dụng cầm chắc tay hơn.&#13;&#10;Cảm biến CMOS 1 inch 20MP',10000000,11990000,1,0,3,'2021-08-07 15:33:57','2021-08-08 06:50:11'),(196,'CCEOS300D','Máy Ảnh Canon EOS 3000D + Lens EF-S 18','d32666da2671015ffb0e522f2585525d.jpg','Cảm biến 18MP APS-C CMOS Chíp xử lý hình ảnh DIGIC 4+ ISO 100 - 6400 (Có thể mở rộng đến 12.800) Màn hình LCD 3.0&#34; 230,000 điểm ảnh Quay phim Full HD 1080p 30 fps Chụp liên tục 3 hình/ giây Hệ thống đo nét tiên tiến với 9 điểm Hỗ trợ thẻ SD/SDHC/SDXC Hỗ trợ kết nối wifi Ống kính EF-S 18-55mm f/3.5-5.6 IS III',80000000,8990000,1,0,3,'2021-08-07 15:37:52','2021-08-07 15:37:52'),(197,'CFIM9','Máy Ảnh Selfie Lấy Liền Fujifilm Instax Mini 9','e3514315976272ac3a7e5a2db82f9109.jpg','Máy Ảnh Selfie Lấy Liền Fujifilm Instax Mini 9 Clear Yellow được thiết kế nhỏ gọn, với vẻ ngoài cực &#34;cute&#34; và cực &#34;cool&#34;. Sở hữu ngoại hình với đường cong khỏe khoắn, mạnh mẽ nhưng khá ngộ nghĩnh và đáng yêu. Nhỏ gọn và trọng lượng siêu nhẹ máy thích hợp cho việc mang theo bên mình khi chơi hay đi du lịch mà không hề gặp bất kỳ khó khăn nào. Máy với nhiều màu sắc bắt mắt cùng với kiểu dáng hiện đại, lạ mắt còn là món phụ kiện để bạn tha hồ mix với những bộ cánh thời trang, để bạn tự tin xuống phố và tha hồ thể hiện cá tính thời trang của mình.',1700000,1790800,1,0,3,'2021-08-07 15:46:26','2021-08-08 05:30:50'),(198,'CFIISQ6','Máy Ảnh Lấy Liền Fujifilm Instax SQ6','6de151889f372f7271f50a92a701c6f6.jpg','Máy ảnh analog instax đầu tiên sử dụng khổ vuông&#13;&#10;Máy ảnh lấy liền Fujifilm Instax SQ6 là chiếc máy ảnh analog Instax đầu tiên trên thế giới sử dụng khổ film vuông, với chất lượng ảnh chụp tốt cùng kiểu dáng thiết kế đẹp mắt và ấn tượng, thích hợp cho các bạn trẻ sành điệu và phong cách.',3000000,3590000,1,1,3,'2021-08-07 15:56:07','2021-08-07 15:56:07'),(199,'CFIISQ1','Máy Ảnh Fujifilm Instax Square SQ1','7fd55ce0ec5037d79647fcc81d9c1e10.jpg','Thiết kế vuông vắn, gam màu trẻ trung&#13;&#10;Máy Ảnh Fujifilm Instax Square SQ1 được thiết kế với định dạng vuông đặc trưng của dòng máy Instax Square nhưng Instax SQ1 là phiên bản nâng cấp hơn về mặt thời trang. Những gam màu trẻ trung, hiện đại hoàn toàn ghi điểm trong mắt các tín đồ Instax.&#13;&#10;Hơn thế nữa, Instax SQ1 ra mắt với 3 màu sắc hoàn toàn mới lạ, bao gồm: Terracotta Orange, Glacier Blue và Chalk White. Đặc biệt màu Glacier Blue rất bắt trend và thiết kế phủ nhám mang lại ánh nhìn sang trọng cho người dùng. Chất lượng vỏ máy bằng nhựa dẻo tạo cảm giác chắc chắn và đường gân ở bên tay phải giúp bạn cảm thấy thoải mái khi cầm.&#13;&#10;',3000000,3590000,1,1,3,'2021-08-07 15:58:14','2021-08-08 13:14:34'),(200,'HBTWO','Tai nghe Bluetooth True Wireless Buds ETI81','bluetooth-tws-oppo-enco-buds-eti81-ava-1-600x600.jpg','Thiết kế nhỏ gọn, đeo êm ái, dễ mang theo. &#13;&#10;Mang đến chất âm sống động với driver 8 mm, mã hóa âm thanh AAC.&#13;&#10;Kết nối Bluetooth 5.2 cho khoảng cách dùng trong 10 m. &#13;&#10;Yên tâm khi luyện tập thể thao với chuẩn chống nước, bụi IP54.&#13;&#10;Dùng tai nghe liên tục 6 giờ, với hộp sạc cho 24 giờ, nạp pin đầy cho cả hộp sạc và tai nghe là 2.5 giờ.&#13;&#10;Sử dụng cảm ứng chạm tùy chỉnh nhận/kết thúc cuộc gọi, phát/dừng nhạc, chuyển bài hát,...',700000,789000,1,0,4,'2021-08-08 01:46:24','2021-08-08 06:49:48'),(201,'HGMXDS','Tai nghe chụp tai Gaming MozardX DS904','tai-nghe-chup-tai-gaming-mozardx-ds904-71-den-avatar-1-600x600.jpg','Tai nghe được thiết kế dành riêng cho các tín đồ chơi game.&#13;&#10;Chụp tai và quai đeo có lớp đệm êm tạo cảm giác thoải mái khi sử dụng thời gian dài.&#13;&#10;Trang bị công nghệ âm thanh vòm 7.1 cho âm thanh sống động cho trải nghiệm các game đỉnh cao.&#13;&#10;Màn loa âm thanh lớn 40mm tạo ra âm thanh hoàn chỉnh và chi tiết hơn.&#13;&#10;Jack kết nối USB phù hợp cho laptop, máy tính để bàn (PC),... ',700000,754000,1,0,4,'2021-08-08 01:55:34','2021-08-08 06:47:24'),(202,'HGRVH500','Tai nghe Gaming Rapoo VH500 7.1','tai-nghe-gaming-rapoo-vh500-71-den-avatar-1-600x600.jpg','Tai nghe được thiết kế dành riêng cho các tín đồ chơi game.&#13;&#10;Thiết kế độc đáo choàng đầu với hệ thống treo nhẹ mang cảm giác thoải mái.&#13;&#10;Âm thanh 7.1 chuyên nghiệp rõ ràng mang khả năng định vị, đèn nền RGB độc đáo.&#13;&#10;Thiết kế cách âm với cúp tai mềm thoải mái.&#13;&#10;Jack kết nối USB phù hợp cho laptop, máy tính để bàn (PC),... ',800000,890000,1,0,4,'2021-08-08 01:57:19','2021-08-08 01:57:19'),(203,'HBTWMJ503','Tai nghe Bluetooth True Wireless MJ503','bluetooth-true-wireless-beats-studio-buds-mj503-do-ava-600x600.jpg','Nhỏ gọn, độc đáo, đầy trẻ trung và phong cách.&#13;&#10;Hỗ trợ Bluetooth 5.0 Class-1 đem tới kết nối nhanh chóng ổn định.&#13;&#10;Dễ dàng ghép nối với cả thiết bị iOS và Android.&#13;&#10;Trang bị công nghệ chống ồn chủ động ANC và Transparency mode (Xuyên âm).&#13;&#10;Sử dụng thoải mái khi luyện tập thể thao với chuẩn chống mồ hôi và nước IPX4.&#13;&#10;Pin sạc cho 8 giờ sử dụng (5 giờ khi bật ANC) trên tai nghe và 16 giờ trên hộp sạc (10 giờ khi bật ANC) .&#13;&#10;Hỗ trợ sạc nhanh Fast Fuel với 5 phút đem tới 1 giờ sử dụng thêm.&#13;&#10;Tích hợp trợ lý ảo Siri điều khiển với khẩu lệch &#34;Hey Siri&#34;.',3400000,3900000,1,0,4,'2021-08-08 01:58:51','2021-08-08 06:47:24'),(204,'HMIP360','Tai nghe chụp tai Mozard IP-360','chup-tai-mozard-ip-360-600x600.jpg','Tai nghe chụp tai sang trọng, dây dài 1.5 m, dễ sử dụng. &#13;&#10;Khớp nối có thể kéo ra đến 3 cm cho tai nghe đeo phù hợp hơn.&#13;&#10;Âm thanh trong trẻo với màng loa đường kính 40 mm. &#13;&#10;Có mic thoại, nút điều khiển để nghe/nhận cuộc gọi, phát/dừng chơi nhạc, tăng/giảm âm lượng.&#13;&#10;Kết nối được nhiều điện thoại, máy tính bảng với jack cắm 3.5 mm.',130000,187000,1,0,4,'2021-08-08 02:00:13','2021-08-08 02:00:13'),(205,'HEP28','Tai nghe Có Dây EP Rapoo EP28','tai-nghe-ep-rapoo-ep28-den-600x600.jpg','Tai nghe thiết kế gọn nhẹ với kiểu dáng trẻ trung, năng động.&#13;&#10;Tai nghe dạng nút giúp cách âm tốt với bên ngoài.&#13;&#10;Chất âm to rõ, độ trễ thấp khi chơi game.&#13;&#10;Giọng thoại trong trẻo nhờ tích hợp mic thoại.&#13;&#10;Đệm tai tròn, chất liệu silicone mềm mại, dễ đeo vào tai.&#13;&#10;Dây dài 120 cm thoải mái để vừa dùng máy vừa nghe nhạc.',180000,210000,1,0,4,'2021-08-08 02:01:28','2021-08-08 02:01:28'),(206,'GUL','Gamepad có dây USB cho máy tính','pixlr-bg-result.png','Gamepad USB cho máy tính&#13;&#10;&#13;&#10;- Thiết bị hỗ trợ : sử dụng cho máy tính , Laptop , Điện thoại , máy tính bảng&#13;&#10;&#13;&#10;- Hệ điều Hành Hỗ trợ :  Android + Window&#13;&#10;- Sản phẩm cho cảm giác thoải mái và hỗ trợ nhiều game trên thị trường',140000,245000,1,0,5,'2021-08-08 02:06:55','2021-08-08 06:46:29'),(207,'SBJBLF5','Loa kết nối Bluetooth JBL Flip 5','jbl-flip-5_1.jpg','Kiểu sáng nhỏ gọn, phủ vải chống thấm nước, viền cao su chịu va đập. &#13;&#10;Công suất 20 W, driver racetrack-shaped cho âm thanh chân thật. &#13;&#10;Sử dụng được  trong 12 giờ, sạc đầy trong tầm 2.5 giờ qua cổng Type-C. &#13;&#10;Kết nối Bluetooth 4.2 mượt mà trong phạm vi 10 m. &#13;&#10;Đạt tiêu chuẩn chống nước IPX7. &#13;&#10;Tính năng PartyBoost kết nối nhiều loa, cho bữa tiệc thêm hấp dẫn. &#13;&#10;Điều khiển nút nhấn dễ chỉnh phát/dừng chơi nhạc, tăng giảm âm lượng, bật/tắt nguồn, bật/tắt Bluetooth.',1800000,2549000,1,0,5,'2021-08-08 02:12:14','2021-08-08 06:46:06'),(208,'LTPL01','Cáp Lightning 1m AVA LTPL-01X Xanh','cap-lightning-1m-ava-ltpl-01x-xanh-avatar-ava-600x600.jpg','Thiết kế đẹp mắt, dây dài 1 m, bền bỉ.&#13;&#10;Cổng Lightning dùng cho dòng iPhone 5, iPad 4 trở lên.&#13;&#10;Đầu vào USB phù hợp với các thiết bị adapter, laptop, pc, pin sạc dự phòng,...&#13;&#10;Sử dụng truyền dữ liệu, sạc pin nhanh chóng, dòng sạc tối đa 5V - 2.4A tương đương 12 W.&#13;&#10;Kết nối dễ dàng giữa điện thoại với PC, laptop, adapter, sạc dự phòng...',50000,70000,1,0,5,'2021-08-08 02:13:59','2021-08-08 02:13:59'),(209,'MGDX125','Chuột có dây Genius DX-125 Đen','chuot-co-day-genius-dx-125-den01-600x600.jpg','Chuột có dây Genius DX-125 Đen có thiết kế phù hợp cho cả người thuận tay trái và tay phải. ',40000,189000,1,0,5,'2021-08-08 02:16:08','2021-08-08 02:16:08'),(210,'BCAVA','Pin sạc dự phòng 7500 mAh AVA DS630','pin-sac-du-phong-7500mah-ava-ds630-avatar-1-600x600.jpg','Thiết kế đơn giản, cứng cáp.&#13;&#10;Sử dụng lõi pin Li-Ion an toàn.&#13;&#10;Nguồn ra 2 cổng USB 5V - 2.1A.&#13;&#10;Dung lượng 7500 mAh cho hiệu suất sạc 64%.&#13;&#10;Sạc được cho mọi điện thoại và máy tính bảng tương thích.',140000,175000,1,0,5,'2021-08-08 02:18:11','2021-08-08 02:18:11'),(211,'CBBAL6','Cáp Lightning MFI 1.2 m AUKEY CB-BAL6 Đen','cap-lightning-mfi-12m-aukey-cb-bal6-den-avatar-1-600x600.jpg','Thiết kế đơn giản, bền bỉ với chất liệu nylon bên ngoài.&#13;&#10;Cáp đạt chứng chỉ MFI (Made for iPhone/iPad/iPod) của Apple.&#13;&#10;Cổng lightning dùng cho dòng iPhone 5, iPad 4 trở lên.&#13;&#10;Dùng để chép dữ liệu hay sạc pin (dùng với adapter riêng).&#13;&#10;Tốc độ dòng sạc tối đa 12 W(5V - 2.4A) sạc nhanh chóng.&#13;&#10;Đầu nối nhôm 90 độ giúp cho bạn linh hoạt khi sử dụng.&#13;&#10;Dây dài 1.2 m thoải mái để bạn vừa sạc vừa dùng máy lúc cần thiết.',200000,399000,1,0,5,'2021-08-08 02:20:11','2021-08-08 02:20:11');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset_password`
--

DROP TABLE IF EXISTS `reset_password`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reset_password` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(50) NOT NULL,
  `num_check` int NOT NULL DEFAULT '0',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset_password`
--

LOCK TABLES `reset_password` WRITE;
/*!40000 ALTER TABLE `reset_password` DISABLE KEYS */;
INSERT INTO `reset_password` VALUES (17,'thang111220@gmail.com','136953e096d81bed5da4107d4ebe3c49',0,'2021-08-09 01:59:32');
/*!40000 ALTER TABLE `reset_password` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `send_product_info`
--

DROP TABLE IF EXISTS `send_product_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `send_product_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `send_product_info`
--

LOCK TABLES `send_product_info` WRITE;
/*!40000 ALTER TABLE `send_product_info` DISABLE KEYS */;
INSERT INTO `send_product_info` VALUES (11,'thang111220@gmail.com');
/*!40000 ALTER TABLE `send_product_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-09 11:16:30
