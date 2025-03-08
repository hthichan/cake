-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: cake
-- ------------------------------------------------------
-- Server version	8.0.41
USE cake;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','admin','$2y$10$jsoee1Y1g3vKHx4ji.y3UeSXUv/Vw9ADqFhTb7MU1ZKdT.vyVeBra',NULL,NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `cart_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_items_product_id_foreign` (`product_id`),
  KEY `cart_items_cart_id_foreign` (`cart_id`),
  CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

LOCK TABLES `cart_items` WRITE;
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
INSERT INTO `cart_items` VALUES (10,87,1,1,'2025-02-11 09:39:19','2025-02-11 09:39:19'),(11,88,1,1,'2025-02-11 09:39:21','2025-02-11 09:39:21');
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned NOT NULL,
  `item_count` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_customer_id_foreign` (`customer_id`),
  CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,2,2,'2025-02-07 01:23:01','2025-02-11 09:39:21');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Bánh kem',NULL,NULL),(2,'Bánh kem bơ',NULL,NULL),(3,'Bánh mousse',NULL,NULL),(4,'Bánh phụ kiện',NULL,NULL),(5,'Bánh sinh nhật',NULL,NULL),(6,'Bánh valentine',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (2,'Hồ Thích An','0987654321',NULL,NULL,'Hà Nội','bho02022003@gmail.com','$2y$10$mBIuxPIK4GGBKzApJJ97WepjonWiBql2WliMVqAaFwBU6RxuAHfXa','2025-02-07 01:22:49',NULL,'2025-02-07 01:21:19','2025-02-07 01:22:49');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluates`
--

DROP TABLE IF EXISTS `evaluates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evaluates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `rating` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `customer_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluates_product_id_foreign` (`product_id`),
  KEY `evaluates_customer_id_foreign` (`customer_id`),
  CONSTRAINT `evaluates_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `evaluates_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluates`
--

LOCK TABLES `evaluates` WRITE;
/*!40000 ALTER TABLE `evaluates` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `news_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_product_id_foreign` (`product_id`),
  KEY `images_news_id_foreign` (`news_id`),
  CONSTRAINT `images_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (25,'FRUIT_CAKE.jpg',25,NULL,NULL,NULL),(26,'GREENTEA_CAKE_3.jpg',26,NULL,NULL,NULL),(27,'COCONUT_CAKE.jpg',27,NULL,NULL,NULL),(28,'CAPUCCINO.jpg',28,NULL,NULL,NULL),(29,'TIRAMISU_VUÔNG.jpg',29,NULL,NULL,NULL),(30,'RED_VELVET_CAKE_VUÔNG.jpg',30,NULL,NULL,NULL),(31,'TIRAMISU_CAKE.jpg',31,NULL,NULL,NULL),(32,'TIRAMISU.jpg',32,NULL,NULL,NULL),(33,'FRESH_FRUIT_CAKE.jpg',33,NULL,NULL,NULL),(34,'FRUIT_CAKE_2.jpg',34,NULL,NULL,NULL),(35,'DARK_CHOCOLATE_CREAM_CAKE.jpg',35,NULL,NULL,NULL),(36,'BLUE_BERRY_CHOCOLATE_CAKE.jpg',36,NULL,NULL,NULL),(37,'RED_VELVET_CAKE_2.jpg',37,NULL,NULL,NULL),(38,'RED_VELVET_CAKE_01.jpg',38,NULL,NULL,NULL),(39,'BLUBERRY_FRESH_CREAM_CAKE.jpg',39,NULL,NULL,NULL),(40,'CARAMEL_MOIST_CHOCOLATE_CAKE.jpg',40,NULL,NULL,NULL),(41,'FRESH_CREAM_CAKE_2.jpg',41,NULL,NULL,NULL),(42,'GREENTEA_CAKE_LOVE.jpg',42,NULL,NULL,NULL),(43,'FRESH_FRUIT_CREAM_CAKE.jpg',43,NULL,NULL,NULL),(44,'CHOCOLATE_HEART_CAKE.jpg',44,NULL,NULL,NULL),(45,'MOIST_CHOCOLATE_CAKE_HÌNH_VUÔNG.jpg',45,NULL,NULL,NULL),(46,'GREEN_TEA_FOUR_LOVE.jpg',46,NULL,NULL,NULL),(47,'DELI_HEART_CAKE.jpg',47,NULL,NULL,NULL),(48,'CHOCOLATE_FRESH_CREAM_CAKE.jpg',48,NULL,NULL,NULL),(49,'GREEN_TEA_CAKE_chữ_nhật.jpg',49,NULL,NULL,NULL),(50,'FRUIT_CAKE_(C.Nhật).jpg',50,NULL,NULL,NULL),(51,'RED_VELVET_HEART_CAKE_3.jpg',51,NULL,NULL,NULL),(52,'MOIST_CHOCOLATE_CAKE_02.jpg',52,NULL,NULL,NULL),(53,'TIRAMISU_CHỮ_NHẬT.jpg',53,NULL,NULL,NULL),(54,'STRAWBERRY_HEART_CAKE.jpg',54,NULL,NULL,NULL),(55,'TIRAMISU_FOUR_LOVE.jpg',55,NULL,NULL,NULL),(56,'CHOCOLATE_TIRAMISU_chữ_nhật.jpg',56,NULL,NULL,NULL),(57,'STRAWBERRY_CAKE.jpg',57,NULL,NULL,NULL),(58,'TIRAMISU_XÙ.jpg',58,NULL,NULL,NULL),(59,'RED_VELVET_FOUR_LOVE.jpg',59,NULL,NULL,NULL),(60,'DELI_CAKE_2.jpg',60,NULL,NULL,NULL),(61,'DELI_CAKE_1.jpg',61,NULL,NULL,NULL),(62,'RED_VELVET_CAKE_03.jpg',62,NULL,NULL,NULL),(63,'MOIST_CHOCOLATE_FOUR_LOVE.jpg',63,NULL,NULL,NULL),(64,'WHITE_CHOCOLATE_SPRING_CAKE.jpg',64,NULL,NULL,NULL),(65,'CAPUCCINO_CHỮ_NHẬT.jpg',65,NULL,NULL,NULL),(66,'BLUE_BERRY_CAKE.jpg',66,NULL,NULL,NULL),(67,'DARK_CHOCOLATE_CAKE.jpg',67,NULL,NULL,NULL),(69,'DARK_CHOCOLATE_COCONUT.jpg',69,NULL,NULL,NULL),(70,'MOKA_CAKE.jpg',70,NULL,NULL,NULL),(71,'OPERA_vuông.jpg',71,NULL,NULL,NULL),(72,'PRALINE_2.jpg',72,NULL,NULL,NULL),(73,'WHITE_CHOCOLATE_AND_COCONUT_CAKE.jpg',73,NULL,NULL,NULL),(74,'WHITE_CHOCOLATE_CAKE.jpg',74,NULL,NULL,NULL),(75,'BLUE_BERRY_MOUSSE.jpg',75,NULL,NULL,NULL),(76,'CARAMEL_CHOCOLATE_MOUSSE.jpg',76,NULL,NULL,NULL),(77,'CHERRY_CHEESE_MOUSSE.jpg',77,NULL,NULL,NULL),(78,'HAWAI_MOUSSE.jpg',78,NULL,NULL,NULL),(79,'PASSION_MOUSSE_CHANH_LEO.jpg',79,NULL,NULL,NULL),(80,'RASPBERRY_CREAM_CHEESE_MOUSSE.jpg',80,NULL,NULL,NULL),(81,'ELSA_CHOCOLATE_TINY_CAKE.jpg',81,NULL,NULL,NULL),(82,'GRAY_MOUSE_CHOCOLATE_TINY_CAKE.jpg',82,NULL,NULL,NULL),(83,'HELLO_KITTY_CHOCOLATE_TINY_CAKE.jpg',83,NULL,NULL,NULL),(84,'SPIDER_MAN_CHOCOLATE_TINY_CAKE.jpg',84,NULL,NULL,NULL),(85,'THE_CARS_CHOCOLATE_TINY_CAKE.jpg',85,NULL,NULL,NULL),(86,'THE_UNICONS_CHOCOLATE_TINY_CAKE.jpg',86,NULL,NULL,NULL),(87,'BÁNH_3D_DOREMON.jpg',87,NULL,NULL,NULL),(88,'BÁNH_IN_ẢNH.jpg',88,NULL,NULL,NULL),(92,'BÁNH_IN_ẢNH_CON_VẬT.jpg',92,NULL,NULL,NULL),(93,'BÁNH_IN_ẢNH_DOREMON.jpg',93,NULL,NULL,NULL),(94,'BÁNH_IN_ẢNH_NGƯỜI_MÁY.jpg',94,NULL,NULL,NULL),(95,'BÁNH_VẼ.jpg',95,NULL,NULL,NULL),(111,'BÁNH_IN_ẢNH_BÉ_GÁI.jpg',111,NULL,NULL,NULL),(112,'BÁNH_IN_ẢNH_ELSA.jpg',112,NULL,NULL,NULL),(113,'BÁNH_IN_ẢNH_ELSA_&_ANNA.jpg',113,NULL,NULL,NULL),(114,'RED_VELVET_HEART_CAKE.jpg',114,NULL,NULL,NULL),(115,'STRAWBERRY_HEART_CAKE.jpg',115,NULL,NULL,NULL),(116,'DELI_HEART_CAKE.jpg',116,NULL,NULL,NULL),(117,'HAPPY_HEART_CAKE.jpg',117,NULL,NULL,NULL),(118,'SPECIAL_HEART_CAKE.jpg',118,NULL,NULL,NULL),(119,'CHOCOLATE_HEART_CAKE.jpg',119,NULL,NULL,NULL),(120,'GREENTEA_CAKE_LOVE.jpg',120,NULL,NULL,NULL),(121,'RED_VELVET_HEART_CAKE_2.jpg',121,NULL,NULL,NULL),(122,'LOTUS_HEART_CAKE.jpg',122,NULL,NULL,NULL),(123,'RED_VELVET_HEART_CAKE.jpg',123,NULL,NULL,NULL);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_01_14_085200_create_categories_table',1),(6,'2025_01_14_085238_create_promotions_table',1),(7,'2025_01_14_085300_create_admins_table',1),(8,'2025_01_14_085314_create_products_table',1),(9,'2025_01_14_085417_create_customers_table',1),(10,'2025_01_14_085432_create_carts_table',1),(11,'2025_01_14_085648_create_cart_items_table',1),(12,'2025_01_14_085713_create_orders_table',1),(13,'2025_01_14_085729_create_order_details_table',1),(14,'2025_01_14_085754_create_news_table',1),(15,'2025_01_14_085809_create_images_table',1),(16,'2025_01_14_085842_create_evaluates_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--
DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_admin_id_foreign` (`admin_id`),
  CONSTRAINT `news_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `order_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_product_id_foreign` (`product_id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (3,112,14,1,'2025-02-09 20:57:39','2025-02-09 20:57:39'),(4,87,15,1,'2025-02-11 09:38:16','2025-02-11 09:38:16');
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned NOT NULL,
  `order_date` date NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Đã đặt',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (14,2,'2025-02-10','tiền mặt','Hà Nội','Đã đặt','2025-02-09 20:57:39','2025-02-09 20:57:39'),(15,2,'2025-02-11','tiền mặt','Hà Nội','Đã đặt','2025-02-11 09:38:16','2025-02-11 09:38:16');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `promotion_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_promotion_id_foreign` (`promotion_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (25,1,NULL,'FRUIT CAKE',NULL,300000,NULL,NULL),(26,1,NULL,'GREENTEA CAKE 3',NULL,240000,NULL,NULL),(27,1,NULL,'COCONUT CAKE',NULL,300000,NULL,NULL),(28,1,NULL,'CAPUCCINO',NULL,300000,NULL,NULL),(29,1,NULL,'TIRAMISU VUÔNG',NULL,330000,NULL,NULL),(30,1,NULL,'RED VELVET CAKE VUÔNG',NULL,360000,NULL,NULL),(31,1,NULL,'TIRAMISU CAKE',NULL,240000,NULL,NULL),(32,1,NULL,'TIRAMISU',NULL,240000,NULL,NULL),(33,1,NULL,'FRESH FRUIT CAKE',NULL,300000,NULL,NULL),(34,1,NULL,'FRUIT CAKE 2',NULL,300000,NULL,NULL),(35,1,NULL,'DARK CHOCOLATE CREAM CAKE',NULL,270000,NULL,NULL),(36,1,NULL,'BLUE BERRY CHOCOLATE CAKE',NULL,300000,NULL,NULL),(37,1,NULL,'RED VELVET CAKE 2',NULL,330000,NULL,NULL),(38,1,NULL,'RED VELVET CAKE 01',NULL,400000,NULL,NULL),(39,1,NULL,'BLUBERRY FRESH CREAM CAKE',NULL,360000,NULL,NULL),(40,1,NULL,'CARAMEL MOIST CHOCOLATE CAKE',NULL,400000,NULL,NULL),(41,1,NULL,'FRESH CREAM CAKE 2',NULL,300000,NULL,NULL),(42,1,NULL,'GREENTEA CAKE LOVE',NULL,300000,NULL,NULL),(43,1,NULL,'FRESH FRUIT CREAM CAKE',NULL,400000,NULL,NULL),(44,1,NULL,'CHOCOLATE HEART CAKE',NULL,400000,NULL,NULL),(45,1,NULL,'MOIST CHOCOLATE CAKE HÌNH VUÔNG',NULL,360000,NULL,NULL),(46,1,NULL,'GREEN TEA FOUR LOVE',NULL,400000,NULL,NULL),(47,1,NULL,'DELI HEART CAKE',NULL,400000,NULL,NULL),(48,1,NULL,'CHOCOLATE FRESH CREAM CAKE',NULL,440000,NULL,NULL),(49,1,NULL,'GREEN TEA CAKE chữ nhật',NULL,480000,NULL,NULL),(50,1,NULL,'FRUIT CAKE (C.Nhật)',NULL,720000,NULL,NULL),(51,1,NULL,'RED VELVET HEART CAKE 3',NULL,400000,NULL,NULL),(52,1,NULL,'MOIST CHOCOLATE CAKE 02',NULL,400000,NULL,NULL),(53,1,NULL,'TIRAMISU CHỮ NHẬT',NULL,480000,NULL,NULL),(54,1,NULL,'STRAWBERRY HEART CAKE',NULL,440000,NULL,NULL),(55,1,NULL,'TIRAMISU FOUR LOVE',NULL,400000,NULL,NULL),(56,1,NULL,'CHOCOLATE TIRAMISU chữ nhật',NULL,530000,NULL,NULL),(57,1,NULL,'STRAWBERRY CAKE',NULL,360000,NULL,NULL),(58,1,NULL,'TIRAMISU XÙ',NULL,240000,NULL,NULL),(59,1,NULL,'RED VELVET FOUR LOVE',NULL,440000,NULL,NULL),(60,1,NULL,'DELI CAKE 2',NULL,400000,NULL,NULL),(61,1,NULL,'DELI CAKE 1',NULL,400000,NULL,NULL),(62,1,NULL,'RED VELVET CAKE 03',NULL,400000,NULL,NULL),(63,1,NULL,'MOIST CHOCOLATE FOUR LOVE',NULL,440000,NULL,NULL),(64,1,NULL,'WHITE CHOCOLATE SPRING CAKE',NULL,800000,NULL,NULL),(65,1,NULL,'CAPUCCINO CHỮ NHẬT',NULL,480000,NULL,NULL),(66,1,NULL,'BLUE BERRY CAKE',NULL,400000,NULL,NULL),(67,2,NULL,'DARK CHOCOLATE CAKE',NULL,400000,NULL,NULL),(69,2,NULL,'DARK CHOCOLATE COCONUT',NULL,330000,NULL,NULL),(70,2,NULL,'MOKA CAKE',NULL,330000,NULL,NULL),(71,2,NULL,'OPERA vuông',NULL,360000,NULL,NULL),(72,2,NULL,'PRALINE 2',NULL,400000,NULL,NULL),(73,2,NULL,'WHITE CHOCOLATE AND COCONUT CAKE',NULL,330000,NULL,NULL),(74,2,NULL,'WHITE CHOCOLATE CAKE',NULL,330000,NULL,NULL),(75,3,NULL,'BLUE BERRY MOUSSE',NULL,380000,NULL,NULL),(76,3,NULL,'CARAMEL CHOCOLATE MOUSSE',NULL,380000,NULL,NULL),(77,3,NULL,'CHERRY CHEESE MOUSSE',NULL,380000,NULL,NULL),(78,3,NULL,'HAWAI MOUSSE',NULL,380000,NULL,NULL),(79,3,NULL,'PASSION MOUSSE CHANH LEO',NULL,380000,NULL,NULL),(80,3,NULL,'RASPBERRY CREAM CHEESE MOUSSE',NULL,380000,NULL,NULL),(81,4,NULL,'ELSA CHOCOLATE TINY CAKE',NULL,250000,NULL,NULL),(82,4,NULL,'GRAY MOUSE CHOCOLATE TINY CAKE',NULL,250000,NULL,NULL),(83,4,NULL,'HELLO KITTY CHOCOLATE TINY CAKE',NULL,250000,NULL,NULL),(84,4,NULL,'SPIDER MAN CHOCOLATE TINY CAKE',NULL,250000,NULL,NULL),(85,4,NULL,'THE CARS CHOCOLATE TINY CAKE',NULL,250000,NULL,NULL),(86,4,NULL,'THE UNICONS CHOCOLATE TINY CAKE',NULL,250000,NULL,NULL),(87,5,NULL,'BÁNH 3D DOREMON',NULL,250000,NULL,NULL),(88,5,NULL,'BÁNH IN ẢNH',NULL,250000,NULL,NULL),(92,5,NULL,'BÁNH IN ẢNH CON VẬT',NULL,250000,NULL,NULL),(93,5,NULL,'BÁNH IN ẢNH DOREMON',NULL,250000,NULL,NULL),(94,5,NULL,'BÁNH IN ẢNH NGƯỜI MÁY',NULL,250000,NULL,NULL),(95,5,NULL,'BÁNH VẼ',NULL,250000,NULL,NULL),(111,5,NULL,'BÁNH IN ẢNH BÉ GÁI',NULL,250000,NULL,NULL),(112,5,NULL,'BÁNH IN ẢNH ELSA',NULL,250000,NULL,NULL),(113,5,NULL,'BÁNH IN ẢNH ELSA & ANNA',NULL,250000,NULL,NULL),(114,6,NULL,'RED VELVET HEART CAKE',NULL,400000,NULL,NULL),(115,6,NULL,'STRAWBERRY HEART CAKE',NULL,440000,NULL,NULL),(116,6,NULL,'DELI HEART CAKE',NULL,400000,NULL,NULL),(117,6,NULL,'HAPPY HEART CAKE',NULL,400000,NULL,NULL),(118,6,NULL,'SPECIAL HEART CAKE',NULL,440000,NULL,NULL),(119,6,NULL,'CHOCOLATE HEART CAKE',NULL,400000,NULL,NULL),(120,6,NULL,'GREENTEA CAKE LOVE',NULL,300000,NULL,NULL),(121,6,NULL,'RED VELVET HEART CAKE 2',NULL,400000,NULL,NULL),(122,6,NULL,'LOTUS HEART CAKE',NULL,400000,NULL,NULL),(123,6,NULL,'RED VELVET HEART CAKE',NULL,400000,NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promotions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `discount_percentage` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotions`
--

LOCK TABLES `promotions` WRITE;
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;-- 
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
-- SET TIME_ZONE=@OLD_TIME_ZONE ;

-- /*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
-- /*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
-- /*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- /*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-16 10:13:22
